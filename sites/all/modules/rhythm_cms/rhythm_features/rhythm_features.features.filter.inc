<?php
/**
 * @file
 * rhythm_features.features.filter.inc
 */

/**
 * Implements hook_filter_default_formats().
 */
function rhythm_features_filter_default_formats() {
  $formats = array();

  // Exported format: Dynamic Shortcodes.
  $formats['dynamic_shortcodes'] = array(
    'format' => 'dynamic_shortcodes',
    'name' => 'Dynamic Shortcodes',
    'cache' => 0,
    'status' => 1,
    'weight' => -9,
    'filters' => array(
      'shortcode_dynamic' => array(
        'weight' => 0,
        'status' => 1,
        'settings' => array(
          'nd_header' => 1,
          'nd_menu' => 1,
          'nd_container' => 1,
          'nd_div' => 1,
          'row' => 1,
          'col' => 1,
          'nd_view' => 1,
          'nd_block' => 1,
          'nd_node' => 1,
          'html' => 1,
          'nd_progress' => 1,
          'nd_button' => 1,
          'nd_bg' => 1,
          'nd_feature' => 1,
          'nd_text_n_tooltip' => 1,
          'nd_icon' => 1,
          'nd_message' => 1,
          'nd_slider' => 1,
          'nd_slider_item' => 1,
          'nd_image' => 1,
          'nd_tabs' => 1,
          'nd_tab' => 1,
          'nd_quote' => 1,
          'nd_video' => 1,
          'nd_pricing_table' => 1,
          'nd_pricing_item' => 1,
          'nd_title' => 1,
          'nd_hr' => 1,
          'nd_accordions' => 1,
          'nd_accordion' => 1,
          'nd_gmap' => 1,
          'nd_counter' => 1,
          'nd_text_rotator' => 1,
        ),
      ),
    ),
  );

  // Exported format: CKEditor.
  $formats['nd_ckeditor'] = array(
    'format' => 'nd_ckeditor',
    'name' => 'CKEditor',
    'cache' => 1,
    'status' => 1,
    'weight' => -8,
    'filters' => array(),
  );

  // Exported format: Shortcodes.
  $formats['shortcodes'] = array(
    'format' => 'shortcodes',
    'name' => 'Shortcodes',
    'cache' => 1,
    'status' => 1,
    'weight' => -10,
    'filters' => array(
      'shortcode' => array(
        'weight' => 0,
        'status' => 1,
        'settings' => array(
          'nd_header' => 1,
          'nd_menu' => 0,
          'nd_container' => 1,
          'nd_div' => 1,
          'row' => 1,
          'col' => 1,
          'nd_view' => 0,
          'nd_block' => 0,
          'nd_node' => 0,
          'html' => 1,
          'nd_progress' => 1,
          'nd_button' => 1,
          'nd_bg' => 1,
          'nd_feature' => 1,
          'nd_text_n_tooltip' => 1,
          'nd_icon' => 1,
          'nd_message' => 1,
          'nd_slider' => 1,
          'nd_slider_item' => 1,
          'nd_image' => 1,
          'nd_tabs' => 1,
          'nd_tab' => 1,
          'nd_quote' => 1,
          'nd_video' => 1,
          'nd_pricing_table' => 1,
          'nd_pricing_item' => 1,
          'nd_title' => 1,
          'nd_hr' => 1,
          'nd_accordions' => 1,
          'nd_accordion' => 1,
          'nd_gmap' => 1,
          'nd_counter' => 1,
          'nd_text_rotator' => 1,
        ),
      ),
    ),
  );

  return $formats;
}
