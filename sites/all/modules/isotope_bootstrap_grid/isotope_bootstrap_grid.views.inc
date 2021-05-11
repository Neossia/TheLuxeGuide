<?php
/**
 * @file
 * Provide views data and handlers for isotope_bootstrap_grid.module.
 */

/**
 * Implements hook_views_plugins().
 */
function isotope_bootstrap_grid_views_plugins() {
  return array(
    'style' => array(
      'isotope_bootstrap_grid' => array(
        'title' => t('Isotope bootstrap grid'),
        'handler' => 'ViewsStyleIsotopeBootstrapGrid',
        'uses options' => TRUE,
        'help' => t("Display content in Isotope Bootstrap layout."),
        'theme' => 'views_view_isotope_bootstrap_grid',
        'type' => 'normal',
        'uses row plugin' => TRUE,
        'uses row class' => TRUE,
        'uses fields' => TRUE,
        'uses grouping' => FALSE,
      ),
    ),
  );
}

