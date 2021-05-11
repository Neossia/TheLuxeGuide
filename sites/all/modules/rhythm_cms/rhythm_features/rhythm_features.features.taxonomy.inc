<?php
/**
 * @file
 * rhythm_features.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function rhythm_features_taxonomy_default_vocabularies() {
  return array(
    'blog_category' => array(
      'name' => 'Blog Category',
      'machine_name' => 'blog_category',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
    'category' => array(
      'name' => 'Category',
      'machine_name' => 'category',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
    'gallery' => array(
      'name' => 'Gallery',
      'machine_name' => 'gallery',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
    'portfolio_category' => array(
      'name' => 'Portfolio Category',
      'machine_name' => 'portfolio_category',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
    'project' => array(
      'name' => 'Project',
      'machine_name' => 'project',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
  );
}
