<?php
/**
 * @file
 * rhythm_content.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function rhythm_content_taxonomy_default_vocabularies() {
  return array(
    'blog_category' => array(
      'name' => 'Blog Category',
      'machine_name' => 'blog_category',
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
  );
}
