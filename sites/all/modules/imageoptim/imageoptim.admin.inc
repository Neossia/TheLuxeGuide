<?php

/**
 * @file
 * Administration UI for ImageOptim module.
 */

/**
 * Settings form page callback handler.
 */
function imageoptim_admin_form() {
  $form = array();
  $form['info_module'] = array(
    '#markup' => t('You can add the ImageOptim effect on <a href="@url">image styles</a>. The image is sent to ImageOptim web service using an HTTP Request, if you want to save outgoing bandwidth add a previous scale effect to limit image size.', array('@url' => url('admin/config/media/image-styles'))),
  );

  $form['imageoptim_username'] = array(
    '#type' => 'textfield',
    '#title' => 'API Key',
    '#description' => t('<a href="@url">Image Optim</a> API Key or username.', array('@url' => 'https://imageoptim.com')),
    '#default_value' => variable_get('imageoptim_username'),
    '#required' => TRUE,
  );
  $form['imageoptim_presave'] = array(
    '#type' => 'checkbox',
    '#title' => t('Optimize images on file upload'),
    '#description' => t('If you check this, the optimitzation will run on every uploaded image with default settings. This is an aggressive optimitzation strategy and you will lose the original un-optimized image file. This is useful if you are using direct server images in content instead of image styles. The optimitzation process will fired in every image file_presave.'),
    '#return_value' => 1,
    '#default_value' => variable_get('imageoptim_presave', 0),
  );

  $form['defaults'] = array(
    '#type' => 'fieldset',
    '#title' => t('Default settings'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['defaults']['imageoptim_timeout'] = array(
    '#type' => 'textfield',
    '#title' => 'Timeout',
    '#description' => t('Maximum time allowed to spend on optimization in seconds. If not set the default value is 30 seconds.'),
    '#default_value' => variable_get('imageoptim_timeout'),
    '#element_validate' => array('element_validate_integer_positive'),
    '#field_suffix' => t('seconds'),
    '#size' => 10,
  );
  $form['defaults']['imageoptim_quality'] = array(
    '#type' => 'select',
    '#title' => t('Image quality'),
    '#description' => t('Higher quality images cost more bandwidth and download slowly. Lower quality images are faster and take less disk space.'),
    '#default_value' => variable_get('imageoptim_quality', 'medium'),
    '#options' => array(
      'lossless' => t('Lossless'),
      'high' => t('High'),
      'medium' => t('Medium'),
      'low' => t('Low'),
    ),
  );

  $form['manual_run'] = array(
    '#type' => 'fieldset',
    '#title' => t('Manual optimization'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );

  $timestamp = variable_get('imageoptim_last_manual_run', 0);
  $all_images = imageoptim_get_files(0, 'count');
  $new_images = imageoptim_get_files($timestamp, 'count');
  $last_run = ($timestamp == 0) ? t('never') : format_date($timestamp);

  $markup = '<p>' . t('This will try to optimiza all or new image files since last manual optimitzation run. The system cannot detect if an image it\'s optimitzed or not, so they will try to optimize all images using default settings. Be careful, this can drain your optimization monthly quota. Image styles are not included in this process, add an image effects to optimize <a href="@url">image styles</a>. You can use this feature to optimize old files and enable the optimization on upload to ensure that all new files are optimized.', array(
    '@url' => url('admin/config/media/image-styles'),
  )) . '</p>';
  $markup .= '<p>' . t('@all_images images detected, @new_images since last manual execution on: @last_run.', array(
    '@all_images' => $all_images,
    '@new_images' => $new_images,
    '@last_run' => $last_run,
  )) . '</p>';

  $form['manual_run']['info_run'] = array(
    '#markup' => $markup,
  );
  $form['manual_run']['all'] = array(
    '#type' => 'submit',
    '#value' => t('Optimize all @all_images images', array(
      '@all_images' => $all_images,
    )),
    '#submit' => array('imageoptim_manual_run_all'),
  );
  $form['manual_run']['new'] = array(
    '#type' => 'submit',
    '#value' => t('Optimize new @new_images images', array(
      '@new_images' => $new_images,
    )),
    '#submit' => array('imageoptim_manual_run_new'),
  );

  return system_settings_form($form);
}

/**
 * Get or count image files to be optimitzed.
 */
function imageoptim_get_files($timestamp, $action = 'get') {
  $mimetypes = imageoptim_supported_mimetypes();

  $query = new EntityFieldQuery();
  $query->entityCondition('entity_type', 'file')
    ->propertyCondition('status', 1)
    ->propertyCondition('filemime', $mimetypes, 'IN')
    ->propertyCondition('timestamp', $timestamp, '>');

  if ($action == 'count') {
    return $query->count()->execute();
  }
  else {
    $fids = $query->execute();
    return isset($fids['file']) ? array_keys($fids['file']) : NULL;
  }
}

/**
 * Optimize all images in file_manage.
 */
function imageoptim_manual_run_all() {
  imageoptim_manual_run();
}

/**
 * Optimize new images since last manual run.
 */
function imageoptim_manual_run_new() {
  $timestamp = variable_get('imageoptim_last_manual_run', 0);
  imageoptim_manual_run($timestamp);
}

/**
 * Manual image optimization execution.
 */
function imageoptim_manual_run($timestamp = 0) {

  $files = imageoptim_get_files($timestamp);
  if ($files) {
    $options = imageoptim_compose_options();

    $ok = $fail = 0;
    foreach ($files as $fid) {
      $file = file_load($fid);
      if (imageoptim_optimize_image($file->uri, $options)) {
        $ok++;
      }
      else {
        $fail++;
      }
    }

    variable_set('imageoptim_last_manual_run', time());
    drupal_set_message(t('@ok images optimitzed successfully and @fail failed.', array('@ok' => $ok, '@fail' => $fail)));
  }
}
