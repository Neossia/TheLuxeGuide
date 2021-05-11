<?php
/**
 * @file
 * rhythm_commerce.features.inc
 */

/**
 * Implements hook_views_api().
 */
function rhythm_commerce_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_image_default_styles().
 */
function rhythm_commerce_image_default_styles() {
  $styles = array();

  // Exported image style: product_263x335.
  $styles['product_263x335'] = array(
    'label' => 'Product (263x335)',
    'effects' => array(
      3 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 263,
          'height' => 335,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: product_70x70.
  $styles['product_70x70'] = array(
    'label' => 'Product (70x70)',
    'effects' => array(
      4 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 70,
          'height' => 70,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: product_main_360x459.
  $styles['product_main_360x459'] = array(
    'label' => 'Product Main (360x459)',
    'effects' => array(
      1 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 360,
          'height' => 459,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: product_small_68x86.
  $styles['product_small_68x86'] = array(
    'label' => 'Product Small (68x86)',
    'effects' => array(
      2 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 68,
          'height' => 86,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  return $styles;
}

/**
 * Implements hook_node_info().
 */
function rhythm_commerce_node_info() {
  $items = array(
    'nd_product_display' => array(
      'name' => t('Product Display'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
