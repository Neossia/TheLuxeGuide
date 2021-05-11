<?php
/**
 * @file
 * rhythm_features.features.inc
 */

/**
 * Implements hook_views_api().
 */
function rhythm_features_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_image_default_styles().
 */
function rhythm_features_image_default_styles() {
  $styles = array();

  // Exported image style: blog_1140x642.
  $styles['blog_1140x642'] = array(
    'label' => 'Blog (1140x642)',
    'effects' => array(
      5 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 1140,
          'height' => 642,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: blog_360x195.
  $styles['blog_360x195'] = array(
    'label' => 'Blog (360x195)',
    'effects' => array(
      6 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 360,
          'height' => 195,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: blog_360xauto.
  $styles['blog_360xauto'] = array(
    'label' => 'Blog (360xauto)',
    'effects' => array(
      7 => array(
        'name' => 'image_scale',
        'data' => array(
          'width' => 360,
          'height' => '',
          'upscale' => 1,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: gallery_165x106.
  $styles['gallery_165x106'] = array(
    'label' => 'Gallery (165x106)',
    'effects' => array(
      12 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 165,
          'height' => 106,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: gallery_263x169.
  $styles['gallery_263x169'] = array(
    'label' => 'Gallery (263x169)',
    'effects' => array(
      11 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 263,
          'height' => 169,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: gallery_360x232.
  $styles['gallery_360x232'] = array(
    'label' => 'Gallery (360x232)',
    'effects' => array(
      10 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 360,
          'height' => 232,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: gallery_555x357.
  $styles['gallery_555x357'] = array(
    'label' => 'Gallery (555x357)',
    'effects' => array(
      9 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 555,
          'height' => 357,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: logo_autox67.
  $styles['logo_autox67'] = array(
    'label' => 'Logo (autox67)',
    'effects' => array(
      20 => array(
        'name' => 'image_scale',
        'data' => array(
          'width' => '',
          'height' => 67,
          'upscale' => 1,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: person_360x438.
  $styles['person_360x438'] = array(
    'label' => 'Person (360x438)',
    'effects' => array(
      8 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 360,
          'height' => 438,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: portfolio_285x183.
  $styles['portfolio_285x183'] = array(
    'label' => 'Portfolio (285x183)',
    'effects' => array(
      16 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 285,
          'height' => 183,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: portfolio_325xauto.
  $styles['portfolio_325xauto'] = array(
    'label' => 'Portfolio (325xauto)',
    'effects' => array(
      18 => array(
        'name' => 'image_scale',
        'data' => array(
          'width' => 325,
          'height' => '',
          'upscale' => 1,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: portfolio_378x243.
  $styles['portfolio_378x243'] = array(
    'label' => 'Portfolio (378x243)',
    'effects' => array(
      15 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 378,
          'height' => 243,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: portfolio_570x367.
  $styles['portfolio_570x367'] = array(
    'label' => 'Portfolio (570x367)',
    'effects' => array(
      14 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 570,
          'height' => 367,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: portfolio_650xauto.
  $styles['portfolio_650xauto'] = array(
    'label' => 'Portfolio (650xauto)',
    'effects' => array(
      17 => array(
        'name' => 'image_scale',
        'data' => array(
          'width' => 650,
          'height' => '',
          'upscale' => 1,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: portfolio_653x368.
  $styles['portfolio_653x368'] = array(
    'label' => 'Portfolio (653x368)',
    'effects' => array(
      13 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 653,
          'height' => 368,
          'retinafy' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: portfolio_900xauto.
  $styles['portfolio_900xauto'] = array(
    'label' => 'Portfolio (900xauto)',
    'effects' => array(
      19 => array(
        'name' => 'image_scale',
        'data' => array(
          'width' => 900,
          'height' => '',
          'upscale' => 1,
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
function rhythm_features_node_info() {
  $items = array(
    'gallery_item' => array(
      'name' => t('Gallery Item'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'nd_blog' => array(
      'name' => t('Blog'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'nd_page' => array(
      'name' => t('Page'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'nd_person' => array(
      'name' => t('Person'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'nd_portfolio' => array(
      'name' => t('Portfolio'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'webform' => array(
      'name' => t('Webform'),
      'base' => 'node_content',
      'description' => t('Create a new form or questionnaire accessible to users. Submission results and statistics are recorded and accessible to privileged users.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
