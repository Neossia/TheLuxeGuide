<?php

/**
 * @file
 * Calls results to administration's pages.
 */

/**
 * Form constructor for Module Weight form.
 *
 * @param array $form
 *   The form element.
 * @param array $form_state
 *   The form state.
 */
function modules_weight_admin_config_page_form(array $form, array &$form_state) {
  $form['modules']['#tree'] = TRUE;

  // Loading the helper functions file.
  module_load_include('inc', 'modules_weight', 'modules_weight.helpers');

  // Getting the config to know if we should show or not the core modules.
  $show_system_modules = variable_get('modules_weight_show_system_modules');
  // Getting the module list.
  $modules = _modules_weight_modules_list($show_system_modules);
  // Iterate over each of the modules.
  foreach ($modules as $module_name => $module) {
    // The rows info.
    // Module name.
    $form['modules'][$module_name]['name'] = array(
      '#markup' => $module['name'],
    );
    // Module description.
    $form['modules'][$module_name]['description'] = array(
      '#markup' => $module['description'],
    );
    // Module weight.
    $form['modules'][$module_name]['weight'] = array(
      '#type' => 'weight',
      '#default_value' => $module['weight'],
      '#delta' => _modules_weight_prepare_delta($module['weight']),
    );
    // Module package.
    $form['modules'][$module_name]['package'] = array(
      '#markup' => $module['package'],
    );
  }
  // The form button.
  $form['actions'] = array('#type' => 'actions');
  $form['actions']['submit'] = array('#type' => 'submit', '#value' => t('Save Changes'));
  return $form;
}

/**
 * Form submit handler for the modules_weight_admin_config_page_form form.
 *
 * @param array $form
 *   The form element.
 * @param array $form_state
 *   The form state.
 */
function modules_weight_admin_config_page_form_submit(array $form, array &$form_state) {
  // The modules information.
  $modules_info = $form_state['values']['modules'];
  // Doing the array unidimensional.
  $new_weight_value = array_combine(array_keys($modules_info), array_column($modules_info, 'weight'));
  // Getting the config to know if we should show or not the core modules.
  $show_core_modules = variable_get('modules_weight_show_system_modules');
  // The old values information.
  $old_modules_info = _modules_weight_modules_list($show_core_modules);
  // Doing the array unidimensional.
  $old_weight_value = array_combine(array_keys($old_modules_info), array_column($old_modules_info, 'weight'));

  if ($new_weight_value == $old_weight_value) {
    // Printing message if there are not module that has changed.
    drupal_set_message(t("You don't have changed the weight for any module."), 'warning');
  }
  else {
    // Loading the helper functions file.
    module_load_include('inc', 'modules_weight', 'modules_weight.helpers');

    // Getting the changed modules.
    $changed = array_diff_assoc($new_weight_value, $old_weight_value);

    // Printing the update message.
    drupal_set_message(t('The modules weight was updated.'));

    foreach ($changed as $module_name => $weight) {
      // Setting the new weight.
      _modules_weight_module_set_weight($module_name, $weight);

      $variables = [
        '@module_name' => system_get_info('module', $module_name)['name'],
        '@weight' => $weight,
      ];
      // Printing information about the modules weight.
      drupal_set_message(t('@module_name have now as weight: @weight', $variables));
    }
  }
}

/**
 * Form constructor for Module Weight Configuration form.
 *
 * @param array $form
 *   The form element.
 * @param array $form_state
 *   The form state.
 */
function modules_weight_configuration_form(array $form, array &$form_state) {
  $form['modules_weight_show_system_modules'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show system modules'),
    '#return_value' => 1,
    '#default_value' => variable_get('modules_weight_show_system_modules'),
    '#description' => t("Cautions: This module just display non-core modules by default, if you check this option you will be able to change the core modules weight and as you might notice, all core modules has 0 as weight value by default."),
  );

  return system_settings_form($form);
}
