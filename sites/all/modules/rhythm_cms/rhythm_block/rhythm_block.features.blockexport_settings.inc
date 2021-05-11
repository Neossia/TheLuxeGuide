<?php
/**
 * @file
 * rhythm_block.features.blockexport_settings.inc
 */

/**
 * Implements hook_default_blockexport_settings().
 */
function rhythm_block_default_blockexport_settings() {
  $export = array();
  $export['block'][] = array(
  'bid' => 1,
  'module' => 'system',
  'delta' => 'main',
  'theme' => 'bartik',
  'status' => 1,
  'weight' => 0,
  'region' => 'content',
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 2,
  'module' => 'user',
  'delta' => 'login',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 3,
  'module' => 'system',
  'delta' => 'navigation',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 4,
  'module' => 'system',
  'delta' => 'management',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 1,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 5,
  'module' => 'system',
  'delta' => 'help',
  'theme' => 'bartik',
  'status' => 1,
  'weight' => 0,
  'region' => 'help',
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 6,
  'module' => 'node',
  'delta' => 'syndicate',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 7,
  'module' => 'node',
  'delta' => 'recent',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 1,
);
  $export['block'][] = array(
  'bid' => 8,
  'module' => 'system',
  'delta' => 'powered-by',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => -8,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 9,
  'module' => 'system',
  'delta' => 'user-menu',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 10,
  'module' => 'system',
  'delta' => 'main-menu',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 11,
  'module' => 'user',
  'delta' => 'new',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 1,
);
  $export['block'][] = array(
  'bid' => 12,
  'module' => 'user',
  'delta' => 'online',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 13,
  'module' => 'menu',
  'delta' => 'devel',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 14,
  'module' => 'search',
  'delta' => 'form',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/new-web-design-trends-2015-year
content/minimalistic-design-forever-1
blog-sidebar-left
blog-sidebar-right
blog-2-columns
blog-masonry-2-columns',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 15,
  'module' => 'devel',
  'delta' => 'execute_php',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 16,
  'module' => 'devel',
  'delta' => 'switch_user',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 17,
  'module' => 'devel',
  'delta' => 'execute_php',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -17,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 18,
  'module' => 'devel',
  'delta' => 'switch_user',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -9,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 19,
  'module' => 'menu',
  'delta' => 'devel',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -18,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 20,
  'module' => 'node',
  'delta' => 'recent',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -11,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 1,
);
  $export['block'][] = array(
  'bid' => 21,
  'module' => 'node',
  'delta' => 'syndicate',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -8,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 22,
  'module' => 'search',
  'delta' => 'form',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -23,
  'region' => 'sidebar',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/new-web-design-trends-2015-year
content/minimalistic-design-forever-1
blog-sidebar-left
blog-sidebar-right
blog-2-columns
blog-masonry-2-columns',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 23,
  'module' => 'system',
  'delta' => 'help',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -25,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 24,
  'module' => 'system',
  'delta' => 'main',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -18,
  'region' => 'content',
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 25,
  'module' => 'system',
  'delta' => 'main-menu',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -16,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 26,
  'module' => 'system',
  'delta' => 'management',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -15,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 27,
  'module' => 'system',
  'delta' => 'navigation',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -14,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 28,
  'module' => 'system',
  'delta' => 'powered-by',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -13,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 29,
  'module' => 'system',
  'delta' => 'user-menu',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -1,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 30,
  'module' => 'user',
  'delta' => 'login',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -2,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 31,
  'module' => 'user',
  'delta' => 'new',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 1,
);
  $export['block'][] = array(
  'bid' => 32,
  'module' => 'user',
  'delta' => 'online',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => 1,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 33,
  'module' => 'rhythm_cms',
  'delta' => 'menu',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => 'content/header-white',
  'title' => '',
  'cache' => 4,
);
  $export['block'][] = array(
  'bid' => 34,
  'module' => 'rhythm_cms',
  'delta' => 'page_title',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 4,
);
  $export['block'][] = array(
  'bid' => 35,
  'module' => 'rhythm_cms',
  'delta' => 'page_title_simple',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 4,
);
  $export['block'][] = array(
  'bid' => 36,
  'module' => 'rhythm_cms',
  'delta' => 'search_1',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 8,
);
  $export['block'][] = array(
  'bid' => 37,
  'module' => 'rhythm_cms',
  'delta' => 'search_2',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 8,
);
  $export['block'][] = array(
  'bid' => 38,
  'module' => 'rhythm_cms',
  'delta' => 'breadcrumb',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 4,
);
  $export['block'][] = array(
  'bid' => 39,
  'module' => 'rhythm_cms',
  'delta' => 'menu',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -10,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => 'content/header-white',
  'title' => '',
  'cache' => 4,
);
  $export['block'][] = array(
  'bid' => 40,
  'module' => 'rhythm_cms',
  'delta' => 'page_title',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -19,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 4,
);
  $export['block'][] = array(
  'bid' => 41,
  'module' => 'rhythm_cms',
  'delta' => 'page_title_simple',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -20,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 4,
);
  $export['block'][] = array(
  'bid' => 42,
  'module' => 'rhythm_cms',
  'delta' => 'search_1',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -22,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 8,
);
  $export['block'][] = array(
  'bid' => 43,
  'module' => 'rhythm_cms',
  'delta' => 'search_2',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -21,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 8,
);
  $export['block'][] = array(
  'bid' => 44,
  'module' => 'rhythm_cms',
  'delta' => 'breadcrumb',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -23,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 4,
);
  $export['block'][] = array(
  'bid' => 45,
  'module' => 'tb_megamenu',
  'delta' => 'devel',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 46,
  'module' => 'tb_megamenu',
  'delta' => 'main-menu',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 47,
  'module' => 'tb_megamenu',
  'delta' => 'management',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 48,
  'module' => 'tb_megamenu',
  'delta' => 'navigation',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 49,
  'module' => 'tb_megamenu',
  'delta' => 'user-menu',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 50,
  'module' => 'tb_megamenu',
  'delta' => 'devel',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -7,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 51,
  'module' => 'tb_megamenu',
  'delta' => 'main-menu',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -6,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 52,
  'module' => 'tb_megamenu',
  'delta' => 'management',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -5,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 53,
  'module' => 'tb_megamenu',
  'delta' => 'navigation',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -4,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 54,
  'module' => 'tb_megamenu',
  'delta' => 'user-menu',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -3,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 55,
  'module' => 'block',
  'delta' => 1,
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/header-dark-transparent',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 56,
  'module' => 'block',
  'delta' => 1,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -52,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/header-dark-transparent',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 57,
  'module' => 'block',
  'delta' => 2,
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/header-white-transparent',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 58,
  'module' => 'block',
  'delta' => 2,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -51,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/header-white-transparent',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 59,
  'module' => 'block',
  'delta' => 3,
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/header-white
content/contact-2
content/services-3
content/faq-2',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 60,
  'module' => 'block',
  'delta' => 3,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -53,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/header-white
content/contact-2
content/services-3
content/faq-2',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 61,
  'module' => 'block',
  'delta' => 4,
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => 'content/header-white-transparent
content/header-white
content/header-dark-transparent
content/contact-1
content/contact-2
content/landing-page
content/main-demo
node/7/*
content/all-demos
node/119
node/119*
content/about-us-1
content/services-1
content/services-2
content/services-3
content/team-1
content/faq-1
content/faq-2
content/pricing-1
gallery*
portfolio-promo
blog*
portfolio-item*',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 62,
  'module' => 'block',
  'delta' => 4,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -54,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 0,
  'pages' => 'content/header-white-transparent
content/header-white
content/header-dark-transparent
content/contact-1
content/contact-2
content/landing-page
content/main-demo
node/7/*
content/all-demos
node/119
node/119*
content/about-us-1
content/services-1
content/services-2
content/services-3
content/team-1
content/faq-1
content/faq-2
content/pricing-1
gallery*
portfolio-promo
blog*
portfolio-item*',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 63,
  'module' => 'commerce_cart',
  'delta' => 'cart',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'shop*',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 64,
  'module' => 'commerce_cart',
  'delta' => 'cart',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -22,
  'region' => 'sidebar',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'shop*',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 65,
  'module' => 'comment',
  'delta' => 'recent',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 1,
);
  $export['block'][] = array(
  'bid' => 66,
  'module' => 'comment',
  'delta' => 'recent',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => -12,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 1,
);
  $export['block'][] = array(
  'bid' => 67,
  'module' => 'views',
  'delta' => 'related_products-block',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 68,
  'module' => 'views',
  'delta' => 'related_products-block',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -54,
  'region' => 'bottom',
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 69,
  'module' => 'block',
  'delta' => 5,
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => '4-columns-shop
product*
blog-3-columns
blog-4-columns
blog-masonry-3-columns
blog-masonry-4-columns
portfolio-item*',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 70,
  'module' => 'block',
  'delta' => 5,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -28,
  'region' => 'content_full',
  'custom' => 0,
  'visibility' => 1,
  'pages' => '4-columns-shop
product*
blog-3-columns
blog-4-columns
blog-masonry-3-columns
blog-masonry-4-columns
portfolio-item*',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 71,
  'module' => 'views',
  'delta' => 'shop_categories-block',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -20,
  'region' => 'sidebar',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'shop*
blog-sidebar-left
blog-sidebar-right
blog-2-columns
blog-masonry-2-columns',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 72,
  'module' => 'views',
  'delta' => 'shop_categories-block',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'shop*
blog-sidebar-left
blog-sidebar-right
blog-2-columns
blog-masonry-2-columns',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 73,
  'module' => 'views',
  'delta' => 'products_best_sellers-block',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -18,
  'region' => 'sidebar',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'shop*',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 74,
  'module' => 'views',
  'delta' => 'products_best_sellers-block',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => 'shop*',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 75,
  'module' => 'views',
  'delta' => 'products_tags-block',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'shop*
content/new-web-design-trends-2015-year
content/minimalistic-design-forever-1
blog-sidebar-left
blog-sidebar-right
blog-2-columns
blog-masonry-2-columns',
  'title' => 'Tags',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 76,
  'module' => 'views',
  'delta' => 'products_tags-block',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -17,
  'region' => 'sidebar',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'shop*
content/new-web-design-trends-2015-year
content/minimalistic-design-forever-1
blog-sidebar-left
blog-sidebar-right
blog-2-columns
blog-masonry-2-columns',
  'title' => 'Tags',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 77,
  'module' => 'views',
  'delta' => 'products_comments-block',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -15,
  'region' => 'sidebar',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'shop*',
  'title' => 'Comments',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 78,
  'module' => 'views',
  'delta' => 'products_comments-block',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => 'shop*',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 79,
  'module' => 'block',
  'delta' => 6,
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'shop*
content/new-web-design-trends-2015-year
content/minimalistic-design-forever-1
blog-sidebar-left
blog-sidebar-right
blog-2-columns
blog-masonry-2-columns',
  'title' => 'Text Widget',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 80,
  'module' => 'block',
  'delta' => 6,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -13,
  'region' => 'sidebar',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'shop*
content/new-web-design-trends-2015-year
content/minimalistic-design-forever-1
blog-sidebar-left
blog-sidebar-right
blog-2-columns
blog-masonry-2-columns',
  'title' => 'Text Widget',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 81,
  'module' => 'views',
  'delta' => 'archive-block',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -12,
  'region' => 'sidebar',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'shop*
content/new-web-design-trends-2015-year
content/minimalistic-design-forever-1
blog-sidebar-left
blog-sidebar-right
blog-2-columns
blog-masonry-2-columns',
  'title' => 'Archive',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 82,
  'module' => 'views',
  'delta' => 'archive-block',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'shop*
content/new-web-design-trends-2015-year
content/minimalistic-design-forever-1
blog-sidebar-left
blog-sidebar-right
blog-2-columns
blog-masonry-2-columns',
  'title' => 'Archive',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 83,
  'module' => 'views',
  'delta' => '-exp-shop_2_columns-page',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -20,
  'region' => 'sidebar',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'shop*',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 84,
  'module' => 'views',
  'delta' => '-exp-shop_2_columns-page',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => '',
  'custom' => 0,
  'visibility' => 0,
  'pages' => 'shop*',
  'title' => '',
  'cache' => 1,
);
  $export['block'][] = array(
  'bid' => 85,
  'module' => 'rhythm_cms',
  'delta' => 'products_filter',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'shop*',
  'title' => 'Filter by Price',
  'cache' => 4,
);
  $export['block'][] = array(
  'bid' => 86,
  'module' => 'rhythm_cms',
  'delta' => 'products_filter',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -21,
  'region' => 'sidebar',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'shop*',
  'title' => 'Filter by Price',
  'cache' => 4,
);
  $export['block'][] = array(
  'bid' => 87,
  'module' => 'block',
  'delta' => 7,
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => '4-columns-shop',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 88,
  'module' => 'block',
  'delta' => 7,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -53,
  'region' => 'bottom',
  'custom' => 0,
  'visibility' => 1,
  'pages' => '4-columns-shop',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 89,
  'module' => 'views',
  'delta' => 'products_comments-block_1',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -14,
  'region' => 'sidebar',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/new-web-design-trends-2015-year
content/minimalistic-design-forever-1
blog-sidebar-left
blog-sidebar-right
blog-2-columns
blog-masonry-2-columns',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 90,
  'module' => 'views',
  'delta' => 'products_comments-block_1',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/new-web-design-trends-2015-year
content/minimalistic-design-forever-1
blog-sidebar-left
blog-sidebar-right
blog-2-columns
blog-masonry-2-columns',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 91,
  'module' => 'views',
  'delta' => 'shop_categories-block_1',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -19,
  'region' => 'sidebar',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/new-web-design-trends-2015-year
content/minimalistic-design-forever-1',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 92,
  'module' => 'views',
  'delta' => 'shop_categories-block_1',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/new-web-design-trends-2015-year
content/minimalistic-design-forever-1',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 93,
  'module' => 'views',
  'delta' => 'last_posts-block',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -16,
  'region' => 'sidebar',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/new-web-design-trends-2015-year
content/minimalistic-design-forever-1
blog-sidebar-left
blog-sidebar-right
blog-2-columns
blog-masonry-2-columns',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 94,
  'module' => 'views',
  'delta' => 'last_posts-block',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/new-web-design-trends-2015-year
content/minimalistic-design-forever-1
blog-sidebar-left
blog-sidebar-right
blog-2-columns
blog-masonry-2-columns',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 95,
  'module' => 'block',
  'delta' => 8,
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'blog-3-columns
blog-masonry-3-columns
blog-masonry-4-columns',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 96,
  'module' => 'block',
  'delta' => 8,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -29,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'blog-3-columns
blog-masonry-3-columns
blog-masonry-4-columns',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 97,
  'module' => 'block',
  'delta' => 9,
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'blog-3-columns
blog-masonry-3-columns
blog-masonry-4-columns',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 98,
  'module' => 'block',
  'delta' => 9,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -28,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'blog-3-columns
blog-masonry-3-columns
blog-masonry-4-columns',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 99,
  'module' => 'block',
  'delta' => 10,
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'blog-3-columns
blog-4-columns
blog-masonry-3-columns
blog-masonry-4-columns',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 100,
  'module' => 'block',
  'delta' => 10,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -54,
  'region' => 'bottom',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'blog-3-columns
blog-4-columns
blog-masonry-3-columns
blog-masonry-4-columns',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 101,
  'module' => 'views',
  'delta' => 'team-block',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 102,
  'module' => 'views',
  'delta' => 'team-block',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 103,
  'module' => 'views',
  'delta' => 'team-block_1',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 104,
  'module' => 'views',
  'delta' => 'team-block_1',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 105,
  'module' => 'views',
  'delta' => 'portfolio_promo-block',
  'theme' => 'bartik',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 106,
  'module' => 'views',
  'delta' => 'portfolio_promo-block',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 107,
  'module' => 'locale',
  'delta' => 'language',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 108,
  'module' => 'block',
  'delta' => 11,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -49,
  'region' => 'footer',
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 109,
  'module' => 'block',
  'delta' => 12,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -51,
  'region' => 'footer',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/pricing-1
content/pricing-2
content/landing-page',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 110,
  'module' => 'block',
  'delta' => 13,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -50,
  'region' => 'footer',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/team-1
content/team-2
content/about-us-2
content/main-demo
portfolio*',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 111,
  'module' => 'block',
  'delta' => 14,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -52,
  'region' => 'footer',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/contact-1
node/119
node/119*',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 112,
  'module' => 'block',
  'delta' => 15,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -27,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/contact-1',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 113,
  'module' => 'block',
  'delta' => 16,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -26,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/contact-2',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 114,
  'module' => 'block',
  'delta' => 17,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -49,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/landing-page',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 115,
  'module' => 'views',
  'delta' => 'shop_2_columns-block_1',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 116,
  'module' => 'views',
  'delta' => 'blog_grid-block_1',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 117,
  'module' => 'block',
  'delta' => 18,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -47,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/main-demo',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 118,
  'module' => 'block',
  'delta' => 19,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -46,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/1',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 119,
  'module' => 'block',
  'delta' => 20,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -45,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/2',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 120,
  'module' => 'block',
  'delta' => 21,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -44,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/3',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 121,
  'module' => 'block',
  'delta' => 22,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -43,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/4',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 122,
  'module' => 'block',
  'delta' => 23,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -41,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/6',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 123,
  'module' => 'block',
  'delta' => 24,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -40,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/7',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 124,
  'module' => 'block',
  'delta' => 25,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -42,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/5',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 125,
  'module' => 'block',
  'delta' => 26,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -39,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/8',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 126,
  'module' => 'block',
  'delta' => 27,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -38,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/9',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 127,
  'module' => 'block',
  'delta' => 28,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -36,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/11',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 128,
  'module' => 'md_slider',
  'delta' => 'mega-slider-1',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -21,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/12',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 129,
  'module' => 'block',
  'delta' => 29,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -37,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/10',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 130,
  'module' => 'block',
  'delta' => 30,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -35,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/14',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 131,
  'module' => 'block',
  'delta' => 31,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -34,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/15',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 132,
  'module' => 'block',
  'delta' => 32,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -33,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/16',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 133,
  'module' => 'block',
  'delta' => 33,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -32,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/17',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 134,
  'module' => 'block',
  'delta' => 34,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -31,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/7/18',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 135,
  'module' => 'views',
  'delta' => 'portfolio_boxed-block_1',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 136,
  'module' => 'block',
  'delta' => 35,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -30,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/all-demos',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 137,
  'module' => 'block',
  'delta' => 36,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -24,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 138,
  'module' => 'menu',
  'delta' => 'menu-one-page',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 139,
  'module' => 'tb_megamenu',
  'delta' => 'menu-one-page',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 140,
  'module' => 'block',
  'delta' => 37,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -19,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/1',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 141,
  'module' => 'block',
  'delta' => 38,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -18,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/2',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 142,
  'module' => 'block',
  'delta' => 39,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -17,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/3',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 143,
  'module' => 'block',
  'delta' => 40,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -16,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/4',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 144,
  'module' => 'block',
  'delta' => 41,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -15,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/5',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 145,
  'module' => 'block',
  'delta' => 42,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -20,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/6',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 146,
  'module' => 'block',
  'delta' => 43,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -10,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/7',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 147,
  'module' => 'block',
  'delta' => 44,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -13,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/8',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 148,
  'module' => 'block',
  'delta' => 45,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -11,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/9',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 149,
  'module' => 'block',
  'delta' => 46,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -12,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/10',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 150,
  'module' => 'block',
  'delta' => 47,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -14,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/11',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 151,
  'module' => 'block',
  'delta' => 48,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -9,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/14',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 152,
  'module' => 'block',
  'delta' => 49,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -21,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/15',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 153,
  'module' => 'block',
  'delta' => 50,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -23,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/16',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 154,
  'module' => 'block',
  'delta' => 51,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -22,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/17',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 155,
  'module' => 'block',
  'delta' => 52,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -8,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'node/119/18',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 156,
  'module' => 'block',
  'delta' => 53,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -48,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/about-us-1',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 157,
  'module' => 'block',
  'delta' => 54,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -6,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/services-1',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 158,
  'module' => 'block',
  'delta' => 55,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -5,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/services-2',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 159,
  'module' => 'block',
  'delta' => 56,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -4,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/team-1',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 160,
  'module' => 'block',
  'delta' => 57,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -7,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/faq-1',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 161,
  'module' => 'block',
  'delta' => 58,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -53,
  'region' => 'footer',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/faq-2',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 162,
  'module' => 'block',
  'delta' => 59,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -50,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'content/pricing-1
gallery*',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 163,
  'module' => 'block',
  'delta' => 60,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => 0,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'portfolio-promo',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 164,
  'module' => 'block',
  'delta' => 61,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => 0,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'blog*',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 165,
  'module' => 'block',
  'delta' => 62,
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => 0,
  'region' => 'top',
  'custom' => 0,
  'visibility' => 1,
  'pages' => 'portfolio-item*',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 166,
  'module' => 'views',
  'delta' => 'related_projects-block',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -54,
  'region' => 'bottom',
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 167,
  'module' => 'rhythm_cms',
  'delta' => 'project_next_prev',
  'theme' => 'rhythm_sub',
  'status' => 1,
  'weight' => -54,
  'region' => 'footer',
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => 4,
);
  $export['block'][] = array(
  'bid' => 168,
  'module' => 'menu',
  'delta' => 'features',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block'][] = array(
  'bid' => 169,
  'module' => 'tb_megamenu',
  'delta' => 'features',
  'theme' => 'rhythm_sub',
  'status' => 0,
  'weight' => 0,
  'region' => -1,
  'custom' => 0,
  'visibility' => 0,
  'pages' => '',
  'title' => '',
  'cache' => -1,
);
  $export['block_custom'][] = array(
  'bid' => 1,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" different_values="0" search="1" cart="1" language="1"]
[/nd_menu]
[nd_header fid="1" type="bg-dark-alfa-50" breadcrumbs="1" description="LOREM IPSUM DOLOR SIT AMET CONSECTETUR" different_values="0" size="home-section parallax-2 fixed-height-small"]
[/nd_header]
 ',
  'info' => 'Header Dark Transparent',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 2,
  'body' => '[nd_menu menu="main-menu" type="white" transparent="1" different_values="0" fid="3" search="1" cart="1" language="1"]
[/nd_menu]
[nd_header fid="2" type="bg-light-alfa-30" breadcrumbs="1" description="LOREM IPSUM DOLOR SIT AMET CONSECTETUR" different_values="0" size="home-section parallax-2 fixed-height-small"]
[/nd_header]
 ',
  'info' => 'Header White Transparent',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 3,
  'body' => '[nd_menu menu="main-menu" fid="3" type="white" transparent="0" different_values="0" search="1" cart="1" language="1"]
[/nd_menu]
[nd_header type="bg-gray-lighter" breadcrumbs="1" description="LOREM IPSUM DOLOR SIT AMET CONSECTETUR" different_values="0" size="small-section"]
[/nd_header]
 ',
  'info' => 'Header White',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 4,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="0" different_values="0" search="1" cart="1" language="1"]
[/nd_menu]
[nd_header type="bg-gray-lighter" breadcrumbs="1" description="LOREM IPSUM DOLOR SIT AMET CONSECTETUR" different_values="0" size="small-section"]
[/nd_header]
 ',
  'info' => 'Header Dark MAIN',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 5,
  'body' => '<hr class="full-width mb-140 mt-140">',
  'info' => 'Separator hr',
  'format' => 'shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 6,
  'body' => '[html format="nd_ckeditor" different_values="0" extra_classes="widget-body widget-text clearfix"]<p><img alt="" class="img-circle left img-left" src="http://local.rhythm.nikadevs.com/sites/rhythm.nikadevs.com/files/user-avatar.png" style="height: 70px; width: 70px; margin: 0px 10px 10px 0px;">Consectetur adipiscing elit. Quisque magna ante eleifend eleifend. Purus ut dignissim consectetur, nulla erat ultrices purus, ut consequat sem elit non sem. Quisque magna ante eleifend eleifend.</p>[/html]
 ',
  'info' => 'Text Widget',
  'format' => 'shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 7,
  'body' => '[row different_values="0"]
[col tablet="6" desktop="3" wide="3" different_values="0"]
[nd_block admin_url="admin/structure/block/manage/commerce_cart/cart/configure" different_values="0"]
[/nd_block]
[/col]
[col tablet="6" desktop="3" wide="3" different_values="0"]
[nd_block admin_url="admin/structure/block/manage/views/products_tags-block/configure" different_values="0"]
[/nd_block]
[nd_block admin_url="admin/structure/block/manage/block/6/configure" different_values="0"]
[/nd_block]
[/col]
[col tablet="6" desktop="3" wide="3" different_values="0"]
[nd_block admin_url="admin/structure/block/manage/views/shop_categories-block/configure" different_values="0"]
[/nd_block]
[nd_block admin_url="admin/structure/block/manage/rhythm_cms/products_filter/configure" different_values="0"]
[/nd_block]
[/col]
[col tablet="6" desktop="3" wide="3" different_values="0"]
[nd_block admin_url="admin/structure/block/manage/views/products_best_sellers-block/configure" different_values="0"]
[/nd_block]
[/col]
[/row]
 ',
  'info' => 'Shop 4 Columns',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 8,
  'body' => '[nd_container different_values="0" style_margin_top="70" style_margin_bottom="-30"]
[nd_block admin_url="admin/structure/block/manage/search/form/configure" different_values="0"]
[/nd_block]
[/nd_container]
 ',
  'info' => 'Search Box',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 9,
  'body' => '[nd_hr style_margin_top="40" style_margin_bottom="0" different_values="0"]
[/nd_hr]
 ',
  'info' => 'Hr Separator',
  'format' => 'shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 10,
  'body' => '[row different_values="0"]
[col tablet="6" desktop="3" wide="3" different_values="0"]
[nd_block admin_url="admin/structure/block/manage/views/shop_categories-block_1/configure" different_values="0"]
[/nd_block]
[/col]
[col tablet="6" desktop="3" wide="3" different_values="0"]
[nd_block admin_url="admin/structure/block/manage/views/products_tags-block/configure" different_values="0"]
[/nd_block]
[/col]
[col tablet="6" desktop="3" wide="3" different_values="0"]
[nd_block admin_url="admin/structure/block/manage/views/archive-block/configure" different_values="0"]
[/nd_block]
[/col]
[col tablet="6" desktop="3" wide="3" different_values="0"]
[nd_block admin_url="admin/structure/block/manage/block/6/configure" different_values="0"]
[/nd_block]
[/col]
[/row]
 ',
  'info' => 'Blog 3 Columns',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 11,
  'body' => '[nd_bg color="bg-gray" slider="0" banner="0" different_values="0" style_padding_bottom="60" style_padding_top="140"]
[nd_container text_align="center" different_values="0"]
[nd_div different_values="0" style_margin_bottom="30" animation="fadeInUp"]
[nd_image fid="53" type="0" hover="None" shadow="0" border="0" different_values="0" width="78" height="30"]
[/nd_image]
[/nd_div]
[nd_icon icon="fa fa-facebook" boxed="0" different_values="0" link="https://www.facebook.com/nikadevs" type="Bordered"]
[/nd_icon]
[nd_icon icon="fa fa-twitter" boxed="0" different_values="0" link="https://www.twitter.com/nikadevs" type="Bordered"]
[/nd_icon]
[nd_icon icon="fa fa-behance" boxed="0" different_values="0" link="https://www.twitter.com/nikadevs" type="Bordered"]
[/nd_icon]
[nd_icon icon="fa fa-linkedin" boxed="0" different_values="0" link="https://www.twitter.com/nikadevs" type="Bordered"]
[/nd_icon]
[nd_icon icon="fa fa-pinterest" boxed="0" different_values="0" link="https://www.twitter.com/nikadevs" type="Bordered"]
[/nd_icon]
[html format="nd_ckeditor" different_values="0" style_padding_top="110"]<div class="footer-text footer">	<!-- Copyright -->	<div class="footer-copy font-alt">		<a href="http://themeforest.net/user/NikaDevs/portfolio" target="_blank">© Rhythm 2014</a>.</div>	<!-- End Copyright -->	<div class="footer-made">		Made with love for great people.</div></div>[/html]
[/nd_container]
[/nd_bg]
 ',
  'info' => 'Footer',
  'format' => 'shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 12,
  'body' => '[nd_bg banner="1" fid="55" color="bg-dark" slider="0" different_values="0" extra_classes="page-section" full_height="0" scroll_icon="0" style_padding_top="0" style_padding_bottom="0"]
[nd_container extra_classes="relative" different_values="0"]
[row different_values="0"]
[col tablet="6" different_values="0"]
[html format="nd_ckeditor" different_values="0"]<div class="mt-140 mt-lg-80 mb-140 mb-lg-80"><div class="banner-content"><h3 class="banner-heading font-alt">Looking for exclusive digital services?</h3><div class="banner-decription"> Proin fringilla augue at maximus vestibulum. Nam pulvinar vitae neque et porttitor. Integer non dapibus diam, ac eleifend lectus. </div><div class="local-scroll"><a class="btn btn-mod btn-w btn-medium btn-round" href="#contact">Lets talk</a></div></div></div>[/html]
[/col]
[col extra_style="visibility: visible; animation-name: fadeInUp;" extra_classes="banner-image wow fadeInUp animated" tablet="6" different_values="0"]
[nd_image type="0" different_values="0" border="0" shadow="0" hover="None" fid="56"]
[/nd_image]
[/col]
[/row]
[/nd_container]
[/nd_bg]
 ',
  'info' => 'Looking for exclusive',
  'format' => 'shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 13,
  'body' => '[nd_bg color="bg-dark" slider="0" banner="0" different_values="0" text_align="center" style_padding_top="60" style_padding_bottom="60"]
[nd_title title="Want to work with us?" size="h4" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" weight="fw-300"]
[/nd_title]
[nd_button button_type="gray" block="0" display="round" size="medium" text="JOIN NOW" link="http://rhythm.nikadevs.com" invert="0" different_values="0"]
[/nd_button]
[/nd_bg]
 ',
  'info' => 'Want to work with us?',
  'format' => 'shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 14,
  'body' => '[nd_gmap type="roadmap" overlay="1" address="Belt Parkway, Queens, NY, United States" different_values="0"]
[/nd_gmap]
 ',
  'info' => 'Gmap: Contact',
  'format' => 'shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 15,
  'body' => '[nd_menu menu="main-menu" type="white" transparent="0" search="1" cart="1" language="1" different_values="0" fid="3"]
[/nd_menu]
[nd_header fid="57" size="page-section" type="bg-dark-alfa-70" breadcrumbs="1" description="WE\'RE ALWAYS OPEN TO TALK TO GOOD PEOPLE" different_values="0"]
[/nd_header]
 ',
  'info' => 'Contact Header',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 16,
  'body' => '[nd_gmap type="roadmap" overlay="0" address="Belt Parkway, Queens, NY, United States" different_values="0"]
[/nd_gmap]
 ',
  'info' => 'Gmap: Contact Top',
  'format' => 'shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 17,
  'body' => '[nd_menu menu="main-menu" type="white" transparent="0" search="1" cart="1" language="1" different_values="0" fid="3"]
[/nd_menu]
[nd_header fid="16" size="page-section" type="bg-dark-alfa-30" breadcrumbs="1" description="LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING" different_values="0"]
[/nd_header]
 ',
  'info' => 'Header Landing',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 18,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="1" different_values="0" fid="78" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0"]
[nd_title title="THOMAS RHYTHM" size="h1_big" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="80"]
[/nd_title]
[nd_title title="Extraordinary art studio &amp; creative minimalism lovers" size="h6_big" alignment=" align-center" styled="0" uppercase="0" color="white" different_values="0"]
[/nd_title]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Main Demo',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 19,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-90" slider="0" banner="0" different_values="0" fid="15" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_styled" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="gray" block="0" display="round" size="medium" text="SEE MORE" invert="0" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="gray" block="0" display="round" size="medium" text="PLAY REEL" invert="0" different_values="0"]
[/nd_button]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Image Parallax 1',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 20,
  'body' => '[nd_menu menu="main-menu" type="white" transparent="1" search="1" cart="1" language="1" different_values="0" fid="3"]
[/nd_menu]
[nd_bg color="bg-gray" slider="0" banner="0" different_values="0" fid="2" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="black" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_styled" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="black" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button block="0" display="round" size="medium" text="SEE MORE" invert="0" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button block="0" display="round" size="medium" text="PLAY REEL" invert="0" different_values="0"]
[/nd_button]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Image Parallax 2',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 21,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="1" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h1_80" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Image Parallax 3',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 22,
  'body' => '[nd_menu menu="main-menu" type="white" transparent="1" search="1" cart="1" language="1" different_values="0" fid="3"]
[/nd_menu]
[nd_bg color="bg-gray" slider="0" banner="0" different_values="0" fid="40" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="BRANDING / DESIGN / DEVELOPMENT / PHOTO" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="black" different_values="0"]
[/nd_title]
[nd_title title="WE LOVE DESIGN" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="black" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button block="0" display="round" size="medium" text="SEE MORE" invert="0" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button block="0" display="round" size="medium" text="PLAY REEL" invert="0" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Image Parallax 4',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 23,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-50" slider="0" banner="0" different_values="0" fid="80" full_height="0" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="BRANDING / DESIGN / DEVELOPMENT / PHOTO" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Fullwidth Image',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 24,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="1" different_values="0" fid="81" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="WE ARE JUST CRATIVE PEOPLE" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title size="h2_64" alignment=" align-center" styled="0" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[nd_text_rotator text="Rhythm Creative Studio,We Have Magic Skills,We Love Smart Design" different_values="0" text_line_1="Rhythm Creative Studio" op="Add new row" text_line_2="We Have Magic Skills" text_line_3="We Love Smart Design"]
[/nd_text_rotator]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Text Rotator',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 25,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="1" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Image Parallax 5',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 26,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_slider slide_anim="fullwidth" different_values="0"]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="81" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="54" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="1" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[/nd_slider]
 ',
  'info' => 'Header: Slider Fullscreen',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 27,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_slider slide_anim="fullwidth-zoom" different_values="0"]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="54" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="81" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="1" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[/nd_slider]
 ',
  'info' => 'Header: Slider Zoom Effect',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 28,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_slider slide_anim="fullwidth-bg" different_values="0"]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="82" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_64" alignment=" align-center" styled="0" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="83" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_64" alignment=" align-center" styled="0" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="81" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_64" alignment=" align-center" styled="0" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[/nd_slider]
 ',
  'info' => 'Header: Slider Background',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 29,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_slider slide_anim="fullwidth" different_values="0"]
[nd_bg color="bg-dark-alfa-90" slider="0" banner="0" different_values="0" fid="15" full_height="0" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="Hello &amp; Welcome" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="circle" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="circle" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[nd_bg color="bg-dark-alfa-50" slider="0" banner="0" different_values="0" fid="14" full_height="0" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="Hello &amp; Welcome" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="amazing design" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="circle" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="1" full_height="0" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="Hello &amp; Welcome" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="rhythm creative studio" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="circle" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="circle" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider]
 ',
  'info' => 'Header: Slider Fullwidth',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 30,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-50" slider="0" banner="0" different_values="0" fid="83" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_icon icon="fa fa-play" size="32" boxed="0" link="http://vimeo.com/50201327" type="Big Icon" different_values="0"]
[/nd_icon]
[nd_title title="CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_title title="BRANDING / DESIGN / DEVELOPMENT / PHOTO" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: With Play Button',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 31,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-50" slider="0" banner="0" different_values="0" full_height="0" scroll_icon="0" video="http://youtu.be/I6jmZ5plZ3o" fid="82"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="BRANDING / DESIGN / DEVELOPMENT / PHOTO" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: BG Video Fullwidth',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 32,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_bg color="bg-pattern-over" slider="0" banner="0" different_values="0" full_height="1" scroll_icon="0" video="http://youtu.be/I6jmZ5plZ3o" fid="82"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="WE ARE JUST CRATIVE PEOPLE" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h1_80" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: BG Video FullScreen 1',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 33,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_bg color="bg-pattern-over" slider="0" banner="0" different_values="0" full_height="1" scroll_icon="0" video="http://youtu.be/I6jmZ5plZ3o" fid="82"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="WE ARE JUST CRATIVE PEOPLE" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title size="h1_80" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[nd_text_rotator text_line_1="RHYTHM CREATIVE STUDIO" text_line_2="WE HAVE MAGIC SKILLS" text_line_3="WE LOVE SMART DESIGN" op="Add new row" different_values="0"]
[/nd_text_rotator]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: BG Video FullScreen 2',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 34,
  'body' => '[nd_menu menu="main-menu" type="white" transparent="0" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_div vertical_align="1" different_values="0" text_align="center" style_padding_top="140" style_padding_bottom="140"]
[nd_container different_values="0"]
[nd_title title="BRANDING / DESIGN / DEVELOPMENT / PHOTO" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="black" different_values="0"]
[/nd_title]
[nd_title title="CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="black" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="0" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="0" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[nd_view admin_url="admin/structure/views/view/portfolio_boxed/edit/block_1" different_values="0"]
[/nd_view]
[nd_bg color="bg-dark" slider="0" banner="0" different_values="0" text_align="center" style_padding_top="60" style_padding_bottom="60"]
[nd_title title="LIKE OUR CREATIVE WORKS?" size="h4_styled" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white"]
[/nd_title]
[nd_button button_type="gray" block="0" display="round" size="medium" text="start project" link="http://rhythm.nikadevs.com" invert="0" different_values="0"]
[/nd_button]
[/nd_bg]
 ',
  'info' => 'Header: Agency Header',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 35,
  'body' => '[nd_menu menu="main-menu" type="dark" transparent="1" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="1" full_height="0" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="RHYTHM — MULTIPURPOSE ONE / MULTI PAGE DRUPAL THEME" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="choose your demo" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="Multi Page" invert="1" style_margin_right="8" different_values="0" link="#multipage"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="one page" invert="1" different_values="0" link="#onepage"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: All Demos',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 36,
  'body' => '[nd_menu menu="menu-one-page" type="dark" transparent="1" search="0" cart="0" language="0" different_values="0" id="home"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="1" different_values="0" fid="78" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0"]
[nd_title title="THOMAS RHYTHM" size="h1_big" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="80"]
[/nd_title]
[nd_title title="Extraordinary art studio &amp; creative minimalism lovers" size="h6_big" alignment=" align-center" styled="0" uppercase="0" color="white" different_values="0"]
[/nd_title]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Main Demo OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 37,
  'body' => '[nd_menu menu="menu-one-page" type="dark" transparent="1" search="0" cart="0" language="0" different_values="0" id="home"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-90" slider="0" banner="0" different_values="0" fid="15" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_styled" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="gray" block="0" display="round" size="medium" text="SEE MORE" invert="0" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="gray" block="0" display="round" size="medium" text="PLAY REEL" invert="0" different_values="0"]
[/nd_button]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Image Parallax 1 OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 38,
  'body' => '[nd_menu menu="menu-one-page" type="white" transparent="1" search="0" cart="0" language="0" different_values="0" fid="3" id="home"]
[/nd_menu]
[nd_bg color="bg-gray" slider="0" banner="0" different_values="0" fid="2" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="black" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_styled" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="black" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button block="0" display="round" size="medium" text="SEE MORE" invert="0" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button block="0" display="round" size="medium" text="PLAY REEL" invert="0" different_values="0"]
[/nd_button]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Image Parallax 2 OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 39,
  'body' => '[nd_menu menu="menu-one-page" type="dark" transparent="1" search="0" cart="0" language="0" different_values="0" id="home"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="1" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h1_80" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Image Parallax 3 OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 40,
  'body' => '[nd_menu menu="menu-one-page" type="white" transparent="1" search="0" cart="0" language="0" different_values="0" fid="3" id="home"]
[/nd_menu]
[nd_bg color="bg-gray" slider="0" banner="0" different_values="0" fid="40" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="BRANDING / DESIGN / DEVELOPMENT / PHOTO" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="black" different_values="0"]
[/nd_title]
[nd_title title="WE LOVE DESIGN" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="black" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button block="0" display="round" size="medium" text="SEE MORE" invert="0" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button block="0" display="round" size="medium" text="PLAY REEL" invert="0" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Image Parallax 4 OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 41,
  'body' => '[nd_menu menu="menu-one-page" type="dark" transparent="1" search="0" cart="0" language="0" different_values="0" id="home"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="1" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Image Parallax 5 OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 42,
  'body' => '[nd_menu menu="menu-one-page" type="dark" transparent="1" search="0" cart="0" language="0" different_values="0" id="home"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-50" slider="0" banner="0" different_values="0" fid="80" full_height="0" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="BRANDING / DESIGN / DEVELOPMENT / PHOTO" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Fullwidth Image OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 43,
  'body' => '[nd_menu menu="menu-one-page" type="dark" transparent="1" search="0" cart="0" language="0" different_values="0" id="home"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="1" different_values="0" fid="81" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="WE ARE JUST CRATIVE PEOPLE" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title size="h2_64" alignment=" align-center" styled="0" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[nd_text_rotator text="Rhythm Creative Studio,We Have Magic Skills,We Love Smart Design" different_values="0" text_line_1="Rhythm Creative Studio" op="Add new row" text_line_2="We Have Magic Skills" text_line_3="We Love Smart Design"]
[/nd_text_rotator]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: Text Rotator OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 44,
  'body' => '[nd_menu menu="menu-one-page" type="dark" transparent="1" search="0" cart="0" language="0" different_values="0" id="home"]
[/nd_menu]
[nd_slider slide_anim="fullwidth" different_values="0"]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="81" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="54" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="1" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[/nd_slider]
 ',
  'info' => 'Header: Slider Fullscreen OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 45,
  'body' => '[nd_menu menu="menu-one-page" type="dark" transparent="1" search="0" cart="0" language="0" different_values="0" id="home"]
[/nd_menu]
[nd_slider slide_anim="fullwidth-zoom" different_values="0"]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="54" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="81" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="1" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[/nd_slider]
 ',
  'info' => 'Header: Slider Zoom Effect OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 46,
  'body' => '[nd_menu menu="menu-one-page" type="dark" transparent="1" search="0" cart="0" language="0" different_values="0" id="home"]
[/nd_menu]
[nd_slider slide_anim="fullwidth" different_values="0"]
[nd_bg color="bg-dark-alfa-90" slider="0" banner="0" different_values="0" fid="15" full_height="0" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="Hello &amp; Welcome" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="circle" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="circle" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[nd_bg color="bg-dark-alfa-50" slider="0" banner="0" different_values="0" fid="14" full_height="0" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="Hello &amp; Welcome" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="amazing design" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="circle" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="1" full_height="0" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="Hello &amp; Welcome" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="rhythm creative studio" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="circle" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="circle" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider]
 ',
  'info' => 'Header: Slider Fullwidth OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 47,
  'body' => '[nd_menu menu="menu-one-page" type="dark" transparent="1" search="0" cart="0" language="0" different_values="0" id="home"]
[/nd_menu]
[nd_slider slide_anim="fullwidth-bg" different_values="0"]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="82" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_64" alignment=" align-center" styled="0" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="83" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_64" alignment=" align-center" styled="0" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[nd_slider_item different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="81" full_height="1" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="UNIQUE EXPERIENCE WITH" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h2_64" alignment=" align-center" styled="0" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider_item]
[/nd_slider]
 ',
  'info' => 'Header: Slider Background OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 48,
  'body' => '[nd_menu menu="menu-one-page" type="dark" transparent="1" search="0" cart="0" language="0" different_values="0" id="home"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-50" slider="0" banner="0" different_values="0" fid="83" full_height="1" scroll_icon="1"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_icon icon="fa fa-play" size="32" boxed="0" link="http://vimeo.com/50201327" type="Big Icon" different_values="0"]
[/nd_icon]
[nd_title title="CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_title title="BRANDING / DESIGN / DEVELOPMENT / PHOTO" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: With Play Button OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 49,
  'body' => '[nd_menu menu="menu-one-page" type="dark" transparent="1" search="0" cart="0" language="0" different_values="0" id="home"]
[/nd_menu]
[nd_bg color="bg-dark-alfa-50" slider="0" banner="0" different_values="0" full_height="0" scroll_icon="0" video="http://youtu.be/I6jmZ5plZ3o" fid="82"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="BRANDING / DESIGN / DEVELOPMENT / PHOTO" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: BG Video Fullwidth OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 50,
  'body' => '[nd_menu menu="menu-one-page" type="dark" transparent="1" search="0" cart="0" language="0" different_values="0" id="home"]
[/nd_menu]
[nd_bg color="bg-pattern-over" slider="0" banner="0" different_values="0" full_height="1" scroll_icon="0" video="http://youtu.be/I6jmZ5plZ3o" fid="82"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="WE ARE JUST CRATIVE PEOPLE" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="RHYTHM CREATIVE STUDIO" size="h1_80" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: BG Video FullScreen 1 OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 51,
  'body' => '[nd_menu menu="menu-one-page" type="dark" transparent="1" search="0" cart="0" language="0" different_values="0" id="home"]
[/nd_menu]
[nd_bg color="bg-pattern-over" slider="0" banner="0" different_values="0" full_height="1" scroll_icon="0" video="http://youtu.be/I6jmZ5plZ3o" fid="82"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="WE ARE JUST CRATIVE PEOPLE" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title size="h1_80" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[nd_text_rotator text_line_1="RHYTHM CREATIVE STUDIO" text_line_2="WE HAVE MAGIC SKILLS" text_line_3="WE LOVE SMART DESIGN" op="Add new row" different_values="0"]
[/nd_text_rotator]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
 ',
  'info' => 'Header: BG Video FullScreen 2 OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 52,
  'body' => '[nd_menu menu="menu-one-page" type="white" transparent="0" search="0" cart="0" language="0" different_values="0" id="home"]
[/nd_menu]
[nd_div vertical_align="1" different_values="0" text_align="center" style_padding_top="140" style_padding_bottom="140"]
[nd_container different_values="0"]
[nd_title title="BRANDING / DESIGN / DEVELOPMENT / PHOTO" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="black" different_values="0"]
[/nd_title]
[nd_title title="CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="black" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="round" size="medium" text="SEE MORE" invert="0" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="round" size="medium" text="PLAY REEL" invert="0" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[nd_view admin_url="admin/structure/views/view/portfolio_boxed/edit/block_1" different_values="0"]
[/nd_view]
[nd_bg color="bg-dark" slider="0" banner="0" different_values="0" text_align="center" style_padding_top="60" style_padding_bottom="60"]
[nd_title title="LIKE OUR CREATIVE WORKS?" size="h4_styled" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white"]
[/nd_title]
[nd_button button_type="gray" block="0" display="round" size="medium" text="start project" link="http://rhythm.nikadevs.com" invert="0" different_values="0"]
[/nd_button]
[/nd_bg]
 ',
  'info' => 'Header: Agency Header OnePage',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 53,
  'body' => '[nd_menu menu="main-menu" type="white" transparent="0" search="1" cart="1" language="1" different_values="0" fid="3"]
[/nd_menu]
[nd_header fid="54" size="page-section" type="bg-dark-alfa-50" breadcrumbs="1" different_values="0"]
[/nd_header]
 ',
  'info' => 'Header: About Us',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 54,
  'body' => '[nd_menu menu="main-menu" type="white" transparent="0" search="1" cart="1" language="1" different_values="0" fid="3"]
[/nd_menu]
[nd_header fid="84" size="page-section" type="bg-dark-alfa-30" breadcrumbs="1" different_values="0" description="WE PROVIDE THE BEST DIGITAL SOLUTIONS" title="services"]
[/nd_header]
 ',
  'info' => 'Header: Services 1',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 55,
  'body' => '[nd_menu menu="main-menu" type="white" transparent="0" search="1" cart="1" language="1" different_values="0" fid="3"]
[/nd_menu]
[nd_header fid="80" size="page-section" type="bg-dark-alfa-70" breadcrumbs="1" different_values="0" description="WE PROVIDE THE BEST DIGITAL SOLUTIONS" title="services"]
[/nd_header]
 ',
  'info' => 'Header: Services 2',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 56,
  'body' => '[nd_menu menu="main-menu" type="white" transparent="0" search="1" cart="1" language="1" different_values="0" fid="3"]
[/nd_menu]
[nd_header fid="2" size="page-section" type="bg-light-alfa-30" breadcrumbs="1" different_values="0" description="WE PROVIDE THE BEST DIGITAL SOLUTIONS" title="services"]
[/nd_header]
 ',
  'info' => 'Header: Team 1',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 57,
  'body' => '[nd_menu menu="main-menu" type="white" transparent="0" search="1" cart="1" language="1" different_values="0" fid="3"]
[/nd_menu]
[nd_header fid="1" size="page-section" type="bg-dark-alfa-30" breadcrumbs="1" different_values="0" description="FREQUENTLY ASKED QUESTIONS" title="FAQ"]
[/nd_header]
 ',
  'info' => 'Header: Faq 1 ',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 58,
  'body' => '[nd_bg color="bg-dark-lighter" slider="0" banner="0" different_values="0" text_align="center" style_padding_top="60" style_padding_bottom="60" full_height="0" scroll_icon="0"]
[nd_title title="DID NOT FIND THE RIGHT ANSWER?" size="h4" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" spacing="ls-03"]
[/nd_title]
[nd_button button_type="gray" block="0" display="round" size="medium" text="contact us" link="http://rhythm.nikadevs.com" invert="0" different_values="0"]
[/nd_button]
[/nd_bg]
 ',
  'info' => 'Did not find the right answer?',
  'format' => 'shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 59,
  'body' => '[nd_menu menu="main-menu" type="white" transparent="0" different_values="0" search="1" cart="1" language="1" fid="3"]
[/nd_menu]
[nd_header type="bg-gray-lighter" breadcrumbs="1" description="LOREM IPSUM DOLOR SIT AMET CONSECTETUR" different_values="0" size="small-section"]
[/nd_header]
 ',
  'info' => 'Header All White',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 60,
  'body' => '[nd_menu menu="main-menu" type="white" transparent="0" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_slider slide_anim="fullwidth" different_values="0"]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="1" full_height="0" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="we are just creative people" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="Rhythm CREATIVE STUDIO" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="circle" size="small" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="circle" size="small" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[nd_bg color="bg-dark-alfa-50" slider="0" banner="0" different_values="0" fid="14" full_height="0" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="Hello &amp; Welcome" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="amazing design" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="circle" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[nd_bg color="bg-dark-alfa-30" slider="0" banner="0" different_values="0" fid="1" full_height="0" scroll_icon="0"]
[nd_div vertical_align="1" different_values="0" text_align="center"]
[nd_container different_values="0"]
[nd_title title="Hello &amp; Welcome" size="h4_styled" alignment=" align-center" styled="1" uppercase="0" color="white" different_values="0"]
[/nd_title]
[nd_title title="rhythm creative studio" size="h2_42" alignment=" align-center" styled="1" uppercase="1" different_values="0" color="white" style_margin_top="50" style_margin_bottom="50"]
[/nd_title]
[nd_button button_type="border" block="0" display="circle" size="medium" text="SEE MORE" invert="1" style_margin_right="8" different_values="0"]
[/nd_button]
[nd_button button_type="border" block="0" display="circle" size="medium" text="PLAY REEL" invert="1" different_values="0"]
[/nd_button]
[/nd_container]
[/nd_div]
[/nd_bg]
[/nd_slider]
 ',
  'info' => 'Header: Portfolio Promo',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 61,
  'body' => '[nd_menu menu="main-menu" fid="3" type="white" transparent="0" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_header fid="55" size="small-section" type="bg-dark" breadcrumbs="1" description="WE SHARE OUR BEST IDEAS IN OUR BLOG" different_values="0" title="Blog"]
[/nd_header]
 ',
  'info' => 'Header: Blog',
  'format' => 'dynamic_shortcodes',
);
  $export['block_custom'][] = array(
  'bid' => 62,
  'body' => '[nd_menu menu="main-menu" fid="3" type="white" transparent="0" search="1" cart="1" language="1" different_values="0"]
[/nd_menu]
[nd_header fid="17" size="page-section" type="bg-dark-alfa-30" breadcrumbs="1" description="LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT" different_values="0"]
[/nd_header]
 ',
  'info' => 'Header: Single Portfolio',
  'format' => 'dynamic_shortcodes',
);
  $export['block_node_type'][] = array(
  'module' => 'rhythm_cms',
  'delta' => 'project_next_prev',
  'type' => 'nd_portfolio',
);
  $export['block_node_type'][] = array(
  'module' => 'views',
  'delta' => 'related_projects-block',
  'type' => 'nd_portfolio',
);
  $export['block_node_type'][] = array(
  'module' => 'views',
  'delta' => 'related_products-block',
  'type' => 'nd_product_display',
);
return $export;
}
