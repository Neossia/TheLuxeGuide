<?php
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function rhythm_form_system_theme_settings_alter(&$form, &$form_state) {
  drupal_add_css(drupal_get_path('theme', 'rhythm') . '/css/theme-settings.css');
  $form['options'] = array(
    '#type' => 'vertical_tabs',
    '#default_tab' => 'main',
    '#weight' => '-10',
    '#title' => t('Rhythm Theme settings'),
  );

  if(module_exists('nikadevs_cms')) {
    $form['options']['nd_layout_builder'] = nikadevs_cms_layout_builder();
  }
  else {
    drupal_set_message('Enable NikaDevs CMS module to use layout builder.');
  }

  $form['options']['main'] = array(
    '#type' => 'fieldset',
    '#title' => t('Main settings'),
  );
  $form['options']['main']['retina'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable Retina Script'),
    '#default_value' => theme_get_setting('retina'),
    '#description'   => t("Only for retina displays and for manually added images. The script will check if the same image with suffix @2x exists and will show it."),
  );
  $form['options']['main']['loader_image'] = array(
    '#type' => 'checkbox',
    '#title' => t('Page loading GIF image'),
    '#default_value' => theme_get_setting('loader_image'),
  );
  $form['options']['main']['phone'] = array(
    '#type' => 'textfield',
    '#title' => t('Phone'),
    '#default_value' => theme_get_setting('phone'),
  );

  $form['options']['gmap'] = array(
    '#type' => 'fieldset',
    '#title' => t('Google Map Settings'),
  );
  $form['options']['gmap']['gmap_key'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Maps API Key'),
    '#default_value' => theme_get_setting('gmap_key') ? theme_get_setting('gmap_key') : '',
    '#description' => 'More information: <a href = "https://developers.google.com/maps/documentation/javascript/get-api-key">https://developers.google.com/maps/documentation/javascript/get-api-key</a>'
  );

  $form['#submit'][] = 'rhythm_settings_submit';
}

/**
 * Save settings data.
 */
function rhythm_settings_submit($form, &$form_state) {
  //$page_404 = $form_state['input']['page_404'] == 3 ? 'page-404-bg' : 'page-404';
  //variable_set('site_404', $page_404);
}