<?php

/**
 * Implement hook_rules_action_info().
 */
function redirect_rules_action_info() {
  $actions = array(
    'redirect_set' => array(
      'label' => t('Create or update redirect'),
      'group' => t('Redirect'),
      'base' => 'redirect_action_redirect_set',
      'parameter' => array(
        'source' => array(
          'type' => 'text',
          'label' => t('Source (from)'),
          'description' => t("Enter an internal Drupal path or path alias to redirect (e.g. %example1 or %example2). Fragment anchors (e.g. %anchor) are <strong>not</strong> allowed.", array('%example1' => 'node/123', '%example2' => 'taxonomy/term/123', '%anchor' => '#anchor')),
        ),
        'redirect' => array(
          'type' => 'text',
          'label' => t('Redirect (to)'),
          'description' => t('Enter an internal Drupal path, path alias, or complete external URL (like http://example.com/) to redirect to. Use %front to redirect to the front page.', array('%front' => '<front>')),
        ),
        'status_code' => array(
          'type' => 'integer',
          'label' => t('Status code'),
          'default value' => 0,
          'options list' => 'redirect_rules_get_status_codes_options',
        ),
        'language' => array(
          'type' => 'token',
          'label' => t('Language'),
          'description' => t('If specified, the language for which the URL alias applies.'),
          'options list' => 'entity_metadata_language_list',
          'optional' => TRUE,
          'default value' => LANGUAGE_NONE,
        ),
        'replace' => array(
          'type' => 'boolean',
          'label' => t('Replace existing redirect'),
          'description' => t('Update existing redirect with the same source path and language.'),
          'default value' => TRUE,
        ),
        'override_path' => array(
          'type' => 'boolean',
          'label' => t('Override valid path'),
          'description' => t('If disabled overriding of existind Drupal path will not be allowed.'),
          'default value' => FALSE,
        ),
      ),
    ),
  );

  return $actions;
}

/**
 * Get options list of redirect status codes.
*/
function redirect_rules_get_status_codes_options() {
  return array(0 => t('Default (@default)', array('@default' => variable_get('redirect_default_status_code', 301)))) + redirect_status_code_options();
}

/**
 * The action function for redirect_action_hello_user.
 */
function redirect_action_redirect_set($source, $redirect, $status_code, $language, $replace, $override_path) {
  // Check if the source is not empty.
  if (empty($source)) {
    throw new RulesEvaluationException('The source path is empty.');
  }

  // Check that the source contains no URL fragment.
  if (strpos($source, '#') !== FALSE) {
    throw new RulesEvaluationException('The source path cannot contain an URL fragment anchor.');
  }

  // Disallow redirections from the frontpage.
  if ($source === '<front>') {
    throw new RulesEvaluationException('The source path cannot be the front page.');
  }

  // Check if source is not external.
  if (url_is_external($source)) {
    throw new RulesEvaluationException('The source path cannot be external url.');
  }

  // Remove slash from beginning of source.
  if ($source[0] == '/') {
    $source = substr($source, 1);
  }

  // Cannot create redirects for valid paths (and aliases).
  if (!$override_path) {
    $menu_item = menu_get_item($source);
    if (($menu_item && $menu_item['page_callback'] != 'redirect_redirect' && $source == $menu_item['path']) || drupal_lookup_path('source', $source)) {
      throw new RulesEvaluationException('The source path %path is likely a valid path. It is preferred to create URL aliases for existing paths rather than redirects.', array('%path' => $value));
    }
  }

  // Find existing redirect or create new object.
  $redirect_obj = redirect_load_by_source($source, $language);

  // Cancel if replace is not allowed and existing redirect found.
  if (!$replace && $redirect_obj) {
    return;
  }

  // Create new object if redirect does not exists.
  if (!$redirect_obj) {
    $redirect_obj = new stdClass();
    redirect_object_prepare($redirect_obj);
  }

  // Set our redirect parameters.
   $redirect_obj->source = $source;
   $redirect_obj->redirect = $redirect;
   $redirect_obj->status_code = $status_code;
   $redirect_obj->language = $language;

  // Save the redirect.
  redirect_save($redirect_obj);
}