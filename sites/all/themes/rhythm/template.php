
<?php

/**
 * Custom Templates for node forms().
 */
function rhythm_theme() {
  return array(
    'page_node_form' => array(
      'arguments' => array(
        'form' => NULL,
      ),
      'template' => 'rhythm_sub/templates/basic page/page-node-form', // set the path here if not in root theme directory
      'render element' => 'form',
    ),
    'listings_node_form' => array(
      'arguments' => array(
        'form' => NULL,
      ),
      'template' => 'rhythm_sub/templates/listings/listings-node-form', // set the path here if not in root theme directory
      'render element' => 'form',
    ),
    'directory_categories_node_form' => array(
      'arguments' => array(
        'form' => NULL,
      ),
      'template' => 'rhythm_sub/templates/directory categories/directory-categories-node-form', // set the path here if not in root theme directory
      'render element' => 'form',
    ),
    'directory_sub_categories_node_form' => array(
      'arguments' => array(
        'form' => NULL,
      ),
      'template' => 'rhythm_sub/templates/directory sub categories/directory-sub-categories-node-form', // set the path here if not in root theme directory
      'render element' => 'form',
    ),
    'services_node_form' => array(
      'arguments' => array(
        'form' => NULL,
      ),
      'template' => 'rhythm_sub/templates/services/services-node-form', // set the path here if not in root theme directory
      'render element' => 'form',
    ),
    'professionals_node_form' => array(
      'arguments' => array(
        'form' => NULL,
      ),
      'template' => 'rhythm_sub/templates/professionals/professionals-node-form', // set the path here if not in root theme directory
      'render element' => 'form',
    ),
    'professionals_country_node_form' => array(
      'arguments' => array(
        'form' => NULL,
      ),
      'template' => 'rhythm_sub/templates/professionals country/professionals-country-node-form', // set the path here if not in root theme directory
      'render element' => 'form',
    ),
    'article_node_form' => array(
      'arguments' => array(
        'form' => NULL,
      ),
      'template' => 'rhythm_sub/templates/article/article-country-node-form', // set the path here if not in root theme directory
      'render element' => 'form',
    ),
    'country_node_form' => array(
      'arguments' => array(
        'form' => NULL,
      ),
      'template' => 'rhythm_sub/templates/country/country-node-form', // set the path here if not in root theme directory
      'render element' => 'form',
    ),
    'models_projects_node_form' => array(
      'arguments' => array(
        'form' => NULL,
      ),
      'template' => 'rhythm_sub/templates/model projects/models-projects-node-form.tpl.php', // set the path here if not in root theme directory
      'render element' => 'form',
    ),
    'contact_us_entityform_edit_form' => array (
      'render element' => 'form',
      'template' => 'rhythm_sub/templates/entityform/contact_us_entityform',
    ),
    'request_contact_entityform_edit_form' => array (
      'render element' => 'form',
      'template' => 'rhythm_sub/templates/entityform/request_contact_entityform',
    ),
    'add_a_listing_entityform_edit_form' => array (
      'render element' => 'form',
      'template' => 'rhythm_sub/templates/entityform/add_a_listing_entityform',
    )
  );
}

/**
 * Removes front page's default message ('No front page content has been created yet.')
 */
function rhythm_preprocess_page(&$vars) {
  if (drupal_is_front_page()) {
    unset($vars['page']['content']['system_main']['default_message']); //will remove message "no front page content is created"
    drupal_set_title(''); //removes welcome message (page title)
  }
}

/**
 * Changes the Username placeholder on user_login form.')
 */
function rhythm_form_alter( &$form, &$form_state, $form_id )
{
    if (in_array( $form_id, array('user_login', 'user_login_block')))
    {
        $form['name']['#attributes']['placeholder'] = t( 'Email Address' );
        $form['pass']['#attributes']['placeholder'] = t( 'Password' );
    }
    if (in_array( $form_id, array('user_register_form')))
    {
        $form['account']['name']['#attributes']['placeholder'] = t( 'Username' );
        $form['account']['mail']['#attributes']['placeholder'] = t( 'Email Address' );
        $form['account']['pass']['#attributes']['placeholder'] = t( 'Password' );
        $form['account']['pass1']['#attributes']['placeholder'] = t( 'Confirm Password' );
    }

    if(in_array($form_id, array('inquire_entityform_edit_form')))
    {
      $form['actions']['submit']['#attributes']['class'][] = 'btn-block';
    }

    if(in_array($form_id, array('listings_node_form')))
    { 
      /* $form['field_overnight_capacity']['#type'] = 'number';
      $form['field_day_cruise_capacity']['#type'] = 'number';
      $form['field_cabin']['#type'] = 'number';
      $form['field_bathroom']['#type'] = 'number';  */
      $form['field_overnight_capacity']['und'][0]['value']['#attributes']['type'] = 'number';
      $form['field_day_cruise_capacity']['und'][0]['value']['#attributes']['type'] = 'number';
      $form['field_cabin']['und'][0]['value']['#attributes']['type'] = 'number';
      $form['field_bathroom']['und'][0]['value']['#attributes']['type'] = 'number';
      $form['field_max_speed']['und'][0]['value']['#attributes']['type'] = 'number';
      $form['field_cruise_speed']['und'][0]['value']['#attributes']['type'] = 'number';
      $form['field_cruise_range']['und'][0]['value']['#attributes']['type'] = 'number';
      $form['field_beam']['und'][0]['value']['#attributes']['type'] = 'number';
      $form['field_weight']['und'][0]['value']['#attributes']['type'] = 'number';
      $form['field_draft']['und'][0]['value']['#attributes']['type'] = 'number';
      $form['field_length']['und'][0]['value']['#attributes']['type'] = 'number';
      $form['field_number_of_crew_beds']['und'][0]['value']['#attributes']['type'] = 'number';
      $form['field_engine']['und'][0]['value']['#attributes']['type'] = 'number';
      
    } 

}

function _count_comments($val) {
  return isset($val['#comment']);
}

function _views_field(&$fields, $field) {
  if(isset($fields[$field]->content)) {
    $output = $fields[$field]->content;
    unset($fields[$field]);
    return $output;
  }
}

function _print_views_fields($fields, $exceptions = array()) {
  //global $one; if(!$one) { dpm($fields); $one = 1; }

  foreach ($fields as $field_name => $field) {
    if (!in_array($field_name, $exceptions)) {
      print $field->content;
    }
  }
}

function rhythm_image_style($variables) {
  $variables['alt'] = empty($variables['alt']) ? 'Alt' : $variables['alt'];
  return theme_image_style($variables);
}

function rhythm_image($variables) {
  $variables['alt'] = empty($variables['alt']) ? 'Alt' : $variables['alt'];
  return theme_image($variables);
}

/**
 * Implementation of hook_preprocess_html().
 */
function rhythm_preprocess_html(&$variables) {
  drupal_add_css('//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,300,700|Dosis:300,400,700|Josefin+Sans:300,400,500,600,700', array('type' => 'external', 'cache' => FALSE));
  drupal_add_css(drupal_get_path('theme', 'rhythm_sub') . '/css/custom.css', array('group' => CSS_THEME));
  if(theme_get_setting('retina')) {
    drupal_add_js(drupal_get_path('theme', 'rhythm') . '/js/jquery.retina.js');
  }
  drupal_add_js(array(
    'theme_path' => drupal_get_path('theme', 'rhythm'),
    'base_path' => base_path(),
  ), 'setting');
}

/**
 * Overrides theme_menu_tree().
 */
function rhythm_menu_tree(&$variables) {
  return '<ul class = "default-menu clearlist">' . $variables['tree'] . '</ul>';
}

/**
 * Overrides theme_menu_tree().
 */
function rhythm_menu_tree__main_menu(&$variables) {
  return $variables['tree'];
}

function rhythm_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  if (strpos($element['#href'], "_anchor_") !== false) {
    $element['#localized_options']['attributes']['data-scroll-to'] = str_replace("http://_anchor_", '#', $element['#href']);
    $element['#href'] = str_replace("http://_anchor_", '//' . $_SERVER['HTTP_HOST'] . request_uri() . '#', $element['#href']);
  }
  if ($element['#below']) {
    $element['#localized_options']['attributes']['class'][] = 'mn-has-sub';
    $angle_class = $element['#original_link']['depth'] == 1 ? 'down' : 'right right';
    $element['#title'] .= ' <i class="fa fa-angle-' . $angle_class . '"></i>';
    unset($element['#below']['#theme_wrappers']);
    $sub_menu = '<ul class = "mn-sub">' . drupal_render($element['#below']) . '</ul>';
  }
  $element['#localized_options']['html'] = TRUE;
  if(isset($element['#localized_options']['attributes']['class']) && in_array('active-trail', $element['#localized_options']['attributes']['class'])) {
    $element['#localized_options']['attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li>' . $output . $sub_menu . "</li>\n";
}

function rhythm_menu_popup(array $items) {
  $output = '';
  foreach(element_children($items) as $i) {
    $output .= rhythm_menu_popup_link($items[$i]);
  }
  return $output;
}

function rhythm_menu_popup_link($element) {
  $sub_menu = '';
  if (strpos($element['#href'], "_anchor_") !== false) {
    $element['#localized_options']['attributes']['data-scroll-to'] = str_replace("http://_anchor_", '#', $element['#href']);
    $element['#href'] = str_replace("http://_anchor_", '//' . $_SERVER['HTTP_HOST'] . request_uri() . '#', $element['#href']);
  }
  if ($element['#below']) {
    $element['#localized_options']['attributes']['class'][] = 'fm-has-sub';
    $element['#title'] .= ' <i class="fa fa-angle-down"></i>';
    $sub_menu = '<ul class = "fm-sub">' . rhythm_menu_popup($element['#below']) . '</ul>';
  }
  $element['#localized_options']['html'] = TRUE;
  if(isset($element['#localized_options']['attributes']['class']) && in_array('active-trail', $element['#localized_options']['attributes']['class'])) {
    $element['#localized_options']['attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li>' . $output . $sub_menu . "</li>\n";
}

/**
 * Overrides theme_menu_tree for custom drop down navigation().
 */
/** Function drop down menu **/
function rhythm_menu_tree__custom_drop_down_function(&$variables) {
  return '<ul class = "clearlist drop-down-menu">' . $variables['tree'] . '</ul>';
}

function rhythm_menu_link__custom_drop_down_function(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  if (strpos($element['#href'], "_anchor_") !== false) {
    $element['#localized_options']['attributes']['data-scroll-to'] = str_replace("http://_anchor_", '#', $element['#href']);
    $element['#href'] = str_replace("http://_anchor_", '//' . $_SERVER['HTTP_HOST'] . request_uri() . '#', $element['#href']);
  }
  if ($element['#below']) {
    $element['#localized_options']['attributes']['class'][] = 'drop-down-has-sub clearfix';
    $angle_class = $element['#original_link']['depth'] == 1 ? 'down' : 'right right';
    $element['#title'] .= ' <span class="right"><i class="fa fa-angle-' . $angle_class . '"></i></span>';
    unset($element['#below']['#theme_wrappers']);
    $sub_menu = '<ul class = "drop-down-sub">' . drupal_render($element['#below']) . '</ul>';
  }
  $element['#localized_options']['html'] = TRUE;
  if(isset($element['#localized_options']['attributes']['class']) && in_array('active-trail', $element['#localized_options']['attributes']['class'])) {
    $element['#localized_options']['attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li>' . $output . $sub_menu . "</li>\n";
}
/** End of function drop down menu **/

/** Function owl carousel slider menu **/
function rhythm_menu_tree__custom_owl_carousel_slider_function(&$variables) {
  return '<div class="slider-wrapper"><div class = "slider-menu custom-item-carousel owl-carousel owl-loaded owl-drag display-block">' . $variables['tree'] . '</div></div>';
}

function rhythm_menu_link__custom_owl_carousel_slider_function(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if (strpos($element['#href'], "_anchor_") !== false) {
    $element['#localized_options']['attributes']['data-scroll-to'] = str_replace("http://_anchor_", '#', $element['#href']);
    $element['#href'] = str_replace("http://_anchor_", '//' . $_SERVER['HTTP_HOST'] . request_uri() . '#', $element['#href']);
  }
  $element['#localized_options']['html'] = TRUE;
  if(isset($element['#localized_options']['attributes']['class']) && in_array('active-trail', $element['#localized_options']['attributes']['class'])) {
    $element['#localized_options']['attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<div class="align-center font-size-12 letter-spacing-2">' . $output . $sub_menu . "</div>\n";
}
/** End of function owl carousel slider menu **/

/** Function menu tree drop down menu top navigation**/
function rhythm_menu_tree__custom_drop_down_nav_function(&$variables) {
  return '<ul class = "clearlist drop-down-menu-nav">' . $variables['tree'] . '</ul>';
}

function rhythm_menu_link__custom_drop_down_nav_function(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if (strpos($element['#href'], "_anchor_") !== false) {
    $element['#localized_options']['attributes']['data-scroll-to'] = str_replace("http://_anchor_", '#', $element['#href']);
    $element['#href'] = str_replace("http://_anchor_", '//' . $_SERVER['HTTP_HOST'] . request_uri() . '#', $element['#href']);
  }

  if ($element['#below']) {
    $element['#localized_options']['attributes']['class'][] = 'drop-down-nav-has-sub clearfix';
    $angle_class = $element['#original_link']['depth'] == 1 ? 'down' : 'right right';
    $element['#title'] .= ' <i class="fa fa-angle-' . $angle_class . '"></i>';
    unset($element['#below']['#theme_wrappers']);
    $sub_menu = '<ul class = "drop-down-nav-sub">' . drupal_render($element['#below']) . '</ul>';
  }
  $element['#localized_options']['html'] = TRUE;
  if(isset($element['#localized_options']['attributes']['class']) && in_array('active-trail', $element['#localized_options']['attributes']['class'])) {
    $element['#localized_options']['attributes']['class'][] = 'active';
  }
  if (strpos(url($element['#href']), 'page-no-link')) {
    $output = '<a class="cursor-pointer">' . $element['#title'] . '</a>';
  } else {
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  }
  return '<li>' . $output . $sub_menu . "</li>\n";
}
/** End of function menu tree drop down menu top navigation **/

/**
 * Overrides theme_menu_tree for custom drop down navigation().
 */
/** Function custom dynamic menu **/
function rhythm_menu_tree__menu_block__1(&$variables) {
  return '<div class="slider-wrapper"><div class ="slider-menu menu-item-full-carousel owl-carousel owl-loaded owl-drag display-block">' . $variables['tree'] . '</div></div>';
}
function rhythm_menu_tree__menu_block__2(&$variables) {
  return '<div class="slider-wrapper"><div class ="slider-menu menu-item-short-carousel owl-carousel owl-loaded owl-drag display-block">' . $variables['tree'] . '</div></div>';
}
function rhythm_menu_tree__menu_block__3(&$variables) {
  return '<div class="slider-wrapper"><div class ="slider-menu menu-item-short-carousel owl-carousel owl-loaded owl-drag display-block">' . $variables['tree'] . '</div></div>';
}
function rhythm_menu_tree__menu_block(&$variables) {
 return '<div><span class="menu-select"></span><ul class = "clearlist drop-down-menu">' . $variables['tree'] . '</ul></div>';
}
/*
function rhythm_menu_tree__menu_block__4(&$variables) {
 return '<div><span class="menu-select"></span><ul class = "clearlist drop-down-menu">' . $variables['tree'] . '</ul></div>';
}
function rhythm_menu_tree__menu_block__5(&$variables) {
 return '<div><span class="menu-select"></span><ul class = "clearlist drop-down-menu">' . $variables['tree'] . '</ul></div>';
}
function rhythm_menu_tree__menu_block__6(&$variables) {
 return '<div><span class="menu-select"></span><ul class = "clearlist drop-down-menu">' . $variables['tree'] . '</ul></div>';
}
function rhythm_menu_tree__menu_block__7(&$variables) {
 return '<div><span class="menu-select"></span><ul class = "clearlist drop-down-menu">' . $variables['tree'] . '</ul></div>';
}
*/


function rhythm_menu_link__menu_block(&$variables) {
  $element = $variables['element'];
  if (strpos($element['#href'], "_anchor_") !== false) {
    $element['#localized_options']['attributes']['data-scroll-to'] = str_replace("http://_anchor_", '#', $element['#href']);
    $element['#href'] = str_replace("http://_anchor_", '//' . $_SERVER['HTTP_HOST'] . request_uri() . '#', $element['#href']);
  }
  $element['#localized_options']['html'] = TRUE;
  if(isset($element['#localized_options']['attributes']['class']) && in_array('active-trail', $element['#localized_options']['attributes']['class'])) {
    $element['#localized_options']['attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li>' . $output . "</li>\n";
}


function rhythm_menu_link__menu_block__1(&$variables) {
  $element = $variables['element'];
  if (strpos($element['#href'], "_anchor_") !== false) {
    $element['#localized_options']['attributes']['data-scroll-to'] = str_replace("http://_anchor_", '#', $element['#href']);
    $element['#href'] = str_replace("http://_anchor_", '//' . $_SERVER['HTTP_HOST'] . request_uri() . '#', $element['#href']);
  }
  $element['#localized_options']['html'] = TRUE;
  if(isset($element['#localized_options']['attributes']['class']) && in_array('active-trail', $element['#localized_options']['attributes']['class'])) {
    $element['#localized_options']['attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<div class="align-center">' . $output . "</div>\n";
}
function rhythm_menu_link__menu_block__2(&$variables) {
  $element = $variables['element'];
  if (strpos($element['#href'], "_anchor_") !== false) {
    $element['#localized_options']['attributes']['data-scroll-to'] = str_replace("http://_anchor_", '#', $element['#href']);
    $element['#href'] = str_replace("http://_anchor_", '//' . $_SERVER['HTTP_HOST'] . request_uri() . '#', $element['#href']);
  }
  $element['#localized_options']['html'] = TRUE;
  if(isset($element['#localized_options']['attributes']['class']) && in_array('active-trail', $element['#localized_options']['attributes']['class'])) {
    $element['#localized_options']['attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<div class="align-center">' . $output . "</div>\n";
}
function rhythm_menu_link__menu_block__3(&$variables) {
  $element = $variables['element'];
  if (strpos($element['#href'], "_anchor_") !== false) {
    $element['#localized_options']['attributes']['data-scroll-to'] = str_replace("http://_anchor_", '#', $element['#href']);
    $element['#href'] = str_replace("http://_anchor_", '//' . $_SERVER['HTTP_HOST'] . request_uri() . '#', $element['#href']);
  }
  $element['#localized_options']['html'] = TRUE;
  if(isset($element['#localized_options']['attributes']['class']) && in_array('active-trail', $element['#localized_options']['attributes']['class'])) {
    $element['#localized_options']['attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<div class="align-center">' . $output . "</div>\n";
}

/*
function rhythm_menu_link__menu_block__4(&$variables) {
  $element = $variables['element'];
  if (strpos($element['#href'], "_anchor_") !== false) {
    $element['#localized_options']['attributes']['data-scroll-to'] = str_replace("http://_anchor_", '#', $element['#href']);
    $element['#href'] = str_replace("http://_anchor_", '//' . $_SERVER['HTTP_HOST'] . request_uri() . '#', $element['#href']);
  }
  $element['#localized_options']['html'] = TRUE;
  if(isset($element['#localized_options']['attributes']['class']) && in_array('active-trail', $element['#localized_options']['attributes']['class'])) {
    $element['#localized_options']['attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li>' . $output . "</li>\n";
}
function rhythm_menu_link__menu_block__5(&$variables) {
  $element = $variables['element'];
  if (strpos($element['#href'], "_anchor_") !== false) {
    $element['#localized_options']['attributes']['data-scroll-to'] = str_replace("http://_anchor_", '#', $element['#href']);
    $element['#href'] = str_replace("http://_anchor_", '//' . $_SERVER['HTTP_HOST'] . request_uri() . '#', $element['#href']);
  }
  $element['#localized_options']['html'] = TRUE;
  if(isset($element['#localized_options']['attributes']['class']) && in_array('active-trail', $element['#localized_options']['attributes']['class'])) {
    $element['#localized_options']['attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li>' . $output . "</li>\n";
}

function rhythm_menu_link__menu_block__6(&$variables) {
  $element = $variables['element'];
  if (strpos($element['#href'], "_anchor_") !== false) {
    $element['#localized_options']['attributes']['data-scroll-to'] = str_replace("http://_anchor_", '#', $element['#href']);
    $element['#href'] = str_replace("http://_anchor_", '//' . $_SERVER['HTTP_HOST'] . request_uri() . '#', $element['#href']);
  }
  $element['#localized_options']['html'] = TRUE;
  if(isset($element['#localized_options']['attributes']['class']) && in_array('active-trail', $element['#localized_options']['attributes']['class'])) {
    $element['#localized_options']['attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li>' . $output . "</li>\n";
}


function rhythm_menu_link__menu_block__7(&$variables) {
  $element = $variables['element'];
  if (strpos($element['#href'], "_anchor_") !== false) {
    $element['#localized_options']['attributes']['data-scroll-to'] = str_replace("http://_anchor_", '#', $element['#href']);
    $element['#href'] = str_replace("http://_anchor_", '//' . $_SERVER['HTTP_HOST'] . request_uri() . '#', $element['#href']);
  }
  $element['#localized_options']['html'] = TRUE;
  if(isset($element['#localized_options']['attributes']['class']) && in_array('active-trail', $element['#localized_options']['attributes']['class'])) {
    $element['#localized_options']['attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li>' . $output . "</li>\n";
}

*/
/**
 * Overrides theme_menu_tree for custom drop down navigation().
 */
/** Function custom dynamic menu **/
function rhythm_menu_tree__custom_dynamic_theme_function(&$variables) {
  return '<div class="padding-5 no-padding-left no-padding-right"><span class="menu-select"></span><ul class = "clearlist drop-down-menu">' . $variables['tree'] . '</ul></div>';
}

function rhythm_menu_link__custom_dynamic_theme_function(array $variables) {
  global $base_url;
  $element = $variables['element'];
  if (strpos($element['#href'], "_anchor_") !== false) {
    $element['#localized_options']['attributes']['data-scroll-to'] = str_replace("http://_anchor_", '#', $element['#href']);
    $element['#href'] = str_replace("http://_anchor_", '//' . $_SERVER['HTTP_HOST'] . request_uri() . '#', $element['#href']);
  }
  $element['#localized_options']['html'] = TRUE;
  if(isset($element['#localized_options']['attributes']['class']) && in_array('active-trail', $element['#localized_options']['attributes']['class'])) {
    $element['#localized_options']['attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);

  if($element['#original_link']['depth'] >= 1 && $element['#original_link']['depth'] <= 2) {
    return '<li class="align-center letter-spacing-3 font-alt fw-600">' . $output . "</li>\n";
  }
  elseif($element['#original_link']['depth'] >=3) {
    return '<li>' . $output . "</li>\n";
  }
}
/** End of function custom dynamic menu **/

/** Function custom category menu **/
function rhythm_menu_tree__custom_category_theme_function(&$variables) {
  return '<div id="menu-select" class="position-relative menu-select">Change Category <i class="fa fa-caret-down" aria-hidden="true"></i><ul id="drop-down-menu" class = "clearlist drop-down-menu">' . $variables['tree'] . '</ul></div>';
}
/** End of function custom dynamic menu **/

/** Override menu **/
function rhythm_menu_tree__user_menu(&$variables) {
  return rhythm_menu_tree__custom_drop_down_nav_function($variables);
}

function rhythm_menu_link__user_menu(array $variables) {
  return rhythm_menu_link__custom_drop_down_nav_function($variables);
}

function rhythm_menu_tree__menu_main_navigation(&$variables) {
  return rhythm_menu_tree__custom_dynamic_theme_function($variables);
}

function rhythm_menu_link__menu_main_navigation(array $variables) {
  return rhythm_menu_link__custom_dynamic_theme_function($variables);
}

function rhythm_menu_tree__menu_website_menu(&$variables) {
  return rhythm_menu_tree__custom_drop_down_function($variables);
}

function rhythm_menu_link__menu_website_menu(array $variables) {
  return rhythm_menu_link__custom_drop_down_function($variables);
}

function rhythm_menu_tree__menu_profile_menu(&$variables) {
  return rhythm_menu_tree__custom_owl_carousel_slider_function($variables);
}

function rhythm_menu_link__menu_profile_menu(array $variables) {
  return rhythm_menu_link__custom_owl_carousel_slider_function($variables);
}

function rhythm_menu_tree__menu_public_profile_menu(&$variables) {
  return rhythm_menu_tree__custom_owl_carousel_slider_function($variables);
}

function rhythm_menu_link__menu_public_profile_menu(array $variables) {
  return rhythm_menu_link__custom_owl_carousel_slider_function($variables);
}

function rhythm_menu_tree__menu_category(&$variables) {
  return rhythm_menu_tree__custom_category_theme_function($variables);
}

function rhythm_menu_link__menu_category(array $variables) {
  return rhythm_menu_link__custom_dynamic_theme_function($variables);
}

/** End of override menu **/
/** 
 * End of overrides theme_menu_tree for custom drop down navigation(). 
 */

/**
 * Overrides theme_menu_local_tasks().
 */
function rhythm_menu_local_tasks(array $variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<div class = "align-center padding-20 no-padding-left no-padding-right"><ul class="nav nav-tabs tpl-minimal-tabs">';
    $variables['primary']['#suffix'] = '</ul></div>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<div class = "align-center mb-40 mb-xxs-30"><ul class="nav nav-tabs tpl-minimal-tabs">';
    $variables['secondary']['#suffix'] = '</ul></div>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;
}

function rhythm_fivestar_static($variables) {
  $rating  = $variables['rating'] / 20;
  $output = '';
  for($i = 1; $i <= 5; $i++) {
    $output .= $rating >= $i ? '<i class="fa fa-star"></i>' : ($rating + 0.5 >= $i ? '<i class="fa fa-star-half-o"></i>' : '<i class="fa fa-star-o"></i>');
  }
  return $output;
}

/**
 * Display a static fivestar value as stars with a title and description.
 */
function rhythm_fivestar_static_element($variables) {
  return $variables['star_display'];
}

/**
 * Update status messages
*/
function rhythm_status_messages($variables) {
  $display = $variables['display'];
  $output = '<div class = "row"><div class = "col-md-8 col-md-offset-2">';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
  );
  $types = array(
    'status' => 'success',
    'error' => 'error',
    'warning' => 'notice',
  );
  $icons = array(
    'status' => 'check-circle-o',
    'error' => 'fa-exclamation-triangle',
    'warning' => 'fa-times-circle',
  ); 
  foreach (drupal_get_messages($display) as $type => $messages) {
    $output .= "<div class=\"alert " . $types[$type] . "\">\n<i class=\"fa fa-lg fa-" . $icons[$type] . "\"></i>";
    if (!empty($status_heading[$type])) {
      $output .= '<h2 class="element-invisible">' . $status_heading[$type] . "</h2>\n";
    }
    if (count($messages) > 1) {
      foreach ($messages as $message) {
        $output .= '<p>' . $message . "</p>\n";
      }
    }
    else {
      $output .= $messages[0];
    }
    $output .= "</div>\n";
  }
  $output .= '</div></div>';
  return $output;
}

/**
 * Implementation of hook_css_alter().
 */
function rhythm_css_alter(&$css) {
  // Disable standart css from ubercart
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.messages.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
  unset($css[drupal_get_path('module', 'search') . '/search.css']);
  /* unset($css[drupal_get_path('module', 'commerce_checkout') . '/theme/commerce_checkout.theme.css']); */
}

/**
 *  Implements theme_textarea().
 */
function rhythm_textarea($variables) {
  $element = $variables['element'];
  element_set_attributes($element, array('id', 'name', 'cols', 'rows'));
  _form_set_class($element, array('form-textarea'));

  $wrapper_attributes = array(
    'class' => array('form-textarea-wrapper', 'form-group'),
  );

  // Add resizable behavior.
  if (!empty($element['#resizable'])) {
    drupal_add_library('system', 'drupal.textarea');
    $wrapper_attributes['class'][] = 'resizable';
  }

  $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
  $output .= '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
  $output .= '</div>';
  return $output;
}

/**
 *  Implements theme_select().
 */
function rhythm_select($variables) {
  $element = $variables['element'];
  element_set_attributes($element, array('id', 'name', 'size'));
  if($element['#title_display'] == 'none') {
    //$element['#options'][''] = $element['#title'];
  }
  _form_set_class($element, array('form-select'));

  $output = '<select' . drupal_attributes($element['#attributes']) . '>' . form_select_options($element) . '</select>';
  $output = '<div class = "form-group">' . $output . '</div>';
  return $output;
}

/**
 * Theme function to render an email component.
 */
function aurum_webform_email($variables) {
  $element = $variables['element'];

  // This IF statement is mostly in place to allow our tests to set type="text"
  // because SimpleTest does not support type="email".
  if (!isset($element['#attributes']['type'])) {
    $element['#attributes']['type'] = 'email';
  }

  // Convert properties to attributes on the element if set.
  foreach (array('id', 'name', 'value', 'size') as $property) {
    if (isset($element['#' . $property]) && $element['#' . $property] !== '') {
      $element['#attributes'][$property] = $element['#' . $property];
    }
  }
  _form_set_class($element, array('form-text', 'form-email'));
  
  $output = '<input' . drupal_attributes($element['#attributes']) . ' />';

  if(isset($element['#nd_icon'])) {
    $size_class = in_array('input-lg', $element['#attributes']['class']) ? ' pi-input-with-icon-lg' : '';
    $size_class .= in_array('input-sm', $element['#attributes']['class']) ? ' pi-input-with-icon-sm' : '';
    $output = '<div class="pi-input-with-icon' . $size_class .'"><div class="pi-input-icon"><i class="' . $element['#nd_icon'] . '"></i></div>' . $output .  '</div>';
  }

  return $output;
}

/**
 *  Implements theme_password().
 */
function rhythm_password($variables) {
 $element = $variables['element'];
  $element['#attributes']['type'] = 'password';
  element_set_attributes($element, array('id', 'name', 'size', 'maxlength'));
  _form_set_class($element, array('form-control', 'input-md', 'round'));

  $output = '<input' . drupal_attributes($element['#attributes']) . ' />';

  $output = '<div class = "form-group">' . $output . '</div>';
  return $output;
}

/**
 * Implements hook_preprocess_button().
 */
function rhythm_preprocess_button(&$vars) {
  $gray_buttons = array(t('Update cart'), t('Checkout'));
  if (isset($vars['element']['#add_black'])) {
    $vars['element']['#attributes']['class'][] = 'btn-large';
  }
  else if(in_array($vars['element']['#value'], $gray_buttons)) {
    $vars['element']['#attributes']['class'][] = 'btn-small';
    $vars['element']['#attributes']['class'][] = 'btn-gray';
  }
  elseif (!isset($vars['element']['#attributes']['class']) || (!in_array('btn-large', $vars['element']['#attributes']['class'])) && !in_array('btn-small', $vars['element']['#attributes']['class'])) {
    $vars['element']['#attributes']['class'][] = 'btn-medium';
  }
  $vars['element']['#attributes']['class'][] = 'btn btn-mod btn-round';
  if ($vars['element']['#value'] == '<none>') {
    $vars['element']['#attributes']['class'][] = 'hidden';
  }
}

/**
 * Implements hook_button().
 */
function rhythm_button($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'submit';
  element_set_attributes($element, array('id', 'name', 'value'));

  $element['#attributes']['class'][] = 'form-' . $element['#button_type'];
  if (!empty($element['#attributes']['disabled'])) {
    $element['#attributes']['class'][] = 'form-button-disabled';
  }

  $suffix = '';
  if (!isset($element['#add_black']) && $element['#value'] == t('Add to cart')) {
    $suffix = '<button class="btn btn-mod btn-gray btn-round"><i class="fa fa-shopping-cart"></i> ' . t($element['#value']) . '</button>';
    $element['#attributes']['class'][] = 'hidden';
  }


  return '<input' . drupal_attributes($element['#attributes']) . ' />' . $suffix;
}

/**
 * Update breadcrumbs
*/
function rhythm_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {

    if (!drupal_is_front_page() && !empty($breadcrumb)) {
      $node_title = filter_xss(menu_get_active_title(), array());
      if($node_title) {
        $breadcrumb[] = t($node_title);
      }
    }
    if(arg(0) == 'gallery-images') {
      $term = taxonomy_term_load(arg(1));
      $breadcrumb[] = $term->name;
    }
    if (count($breadcrumb) > 1) {
      $align = isset($variables['align']) ? $variables['align'] : 'align-right';
      $output = '<div class="mod-breadcrumbs font-alt ' . $align . '">';
      $output .= implode(' / ', $breadcrumb);
      $output .= '</div>';
      return $output;
    }
  }
}

/**
 * Implements hook_preprocess_form().
 */
function rhythm_preprocess_form(&$variables) {
  $variables['element']['#attributes']['class'][] = 'form';
}

/**
 * Implements hook_preprocess_table().
 */
function rhythm_preprocess_table(&$variables) {
  //dpm($variables);
  //$variables['element']['#attributes']['class'][] = 'form';
}

/**
 * Implements hook_element_info_alter().
 */
function rhythm_element_info_alter(&$elements) {
  if(strpos($_GET['q'], 'ajax') !== FALSE) {
    return;
  }
  foreach ($elements as &$element) {
    if (!empty($element['#input'])) {
      $element['#process'][] = '_rhythm_process_input';
    }
  }
}

function _rhythm_process_input(&$element, &$form_state) {
  $types = array(
    'textarea',
    'textfield',
    'webform_email',
    'webform_number',
    'select',
    'password',
    'password_confirm',
  );
  $element['#wrapper_attributes']['class'][] = 'form-group';
  if (!empty($element['#type']) && (in_array($element['#type'], $types))) {
    if (isset($element['#title']) && $element['#title_display'] != 'none' && $element['#type'] != 'select') {
      /* $element['#attributes']['placeholder'] = $element['#title']; */
      /* $element['#title_display'] = 'none'; */
    }
    if (!isset($element['#attributes']['class']) || !is_array($element['#attributes']['class']) || (!in_array('input-lg', $element['#attributes']['class'])) && !in_array('input-sm', $element['#attributes']['class'])) {
      $element['#attributes']['class'][] = 'input-md';
    }
    $element['#attributes']['class'][] = 'form-control round';
  }

  return $element;
}

/**
 *  Implements theme_textfield().
 */
function rhythm_textfield($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = isset($element['#attributes']['type']) ? $element['#attributes']['type'] : 'text';

  element_set_attributes($element, array(
    'id',
    'name',
    'value',
    'size',
    'maxlength',
  ));
  if ($element['#autocomplete_path'] && drupal_valid_path($element['#autocomplete_path'])) {
    drupal_add_library('system', 'drupal.autocomplete');
    $element['#attributes']['class'][] = 'form-autocomplete';
    $attributes = array();
    $attributes['type'] = 'hidden';
    $attributes['id'] = $element['#attributes']['id'] . '-autocomplete';
    $attributes['value'] = url($element['#autocomplete_path'], array('absolute' => TRUE));
    $attributes['disabled'] = 'disabled';
    $attributes['class'][] = 'autocomplete';
    $output = '<input' . drupal_attributes($element['#attributes']) . ' />';
    $output = '<div class="input-group">' . $output . '<span class="input-group-addon"><i class = "fa fa-refresh"></i></span></div>';
    $output .= '<input' . drupal_attributes($attributes) . ' />';
  }
  else {
     $output = '<input' . drupal_attributes($element['#attributes']) . ' />';
  } 
  if(isset($element['#nd_icon'])) {
    $size_class = in_array('input-lg', $element['#attributes']['class']) ? ' pi-input-with-icon-lg' : '';
    $size_class .= in_array('input-sm', $element['#attributes']['class']) ? ' pi-input-with-icon-sm' : '';
    $output = '<div class="pi-input-with-icon' . $size_class .'"><div class="pi-input-icon"><i class="' . $element['#nd_icon'] . '"></i></div>' . $output .  '</div>';
  }
  return $output;
}

/**
 * Implements theme_field()
 *
 * Make field items a comma separated unordered list
 */
function rhythm_field__properties($variables) {
  $rows = array();
  $rows[] = array('data' => array(t('Parameter'), t('Value')), 'no_striping' => TRUE, 'class' => array('bold'));
  foreach ($variables['items'] as $items) {
    foreach (element_children($items) as $i) {
      $item = $items[$i];
      if (isset($item['#markup'])) {
        $rows[] = array('data' => array(t($item['#title']), t($item['#markup'])), 'no_striping' => TRUE);
      }
    }
  }
  return theme('table', array(
    'rows' => $rows,
    'attributes' => array('class' => array('table', 'table-bordered', 'table-striped')))
  );
}

/**
 * Implements theme_field()
 *
 * Make field items a comma separated unordered list
 */
function rhythm_field($variables) {
  $output = '';
  $output .= $variables['label_hidden'] ? '' : ($variables['label'] . ': ');
  $field_output = array();
  // Render the items as a comma separated inline list
  for ($i = 0; $i < count($variables['items']); $i++) {
    if(!isset($variables['items'][$i]['#printed']) || (isset($variables['items'][$i]['#printed']) && !$variables['items'][$i]['#printed'])) {
      $field_output[] = drupal_render($variables['items'][$i]);
    }
  }
  $output .= implode(', ', $field_output);
  // Render the top-level DIV.
  $output = '<div class="' . $variables ['classes'] . '"' . $variables ['attributes'] . '>' . $output . '</div>';
  return $output;
}

function rhythm_field__image($variables) {
  $output = '';
  $output .= $variables['label_hidden'] ? '' : ( '<span class = "field-label">' . $variables['label'] . ': </span>');
  $field_output = array();
  // Render the items as a comma separated inline list
  for ($i = 0; $i < count($variables['items']); $i++) {
    if(!isset($variables['items'][$i]['#printed']) || (isset($variables['items'][$i]['#printed']) && !$variables['items'][$i]['#printed'])) {
     $output .= drupal_render($variables['items'][$i]);
    }
    // For product teaser show only first image
    if($variables['element']['#entity_type'] == 'commerce_product' && $variables['element']['#view_mode'] == 'node_teaser') {
      break;
    }
  }
  // Render the top-level DIV.
  $output = '<div class="' . $variables ['classes'] . '"' . $variables ['attributes'] . '>' . $output . '</div>';
  return $output;
}

/**
 * Implements theme_field()
 *
 * Make field items a comma separated unordered list
 */
function rhythm_field__taxonomy_term_reference($variables) {
  $output = '';
  $output .= $variables['label_hidden'] ? '' : ('<b>' . $variables['label'] . '<span class = "colon">:</span> </b>');
  // Render the items as a comma separated inline list
  for ($i = 0; $i < count($variables['items']); $i++) {
    if(!isset($variables['items'][$i]['#printed']) || (isset($variables['items'][$i]['#printed']) && !$variables['items'][$i]['#printed'])) {
      $output .= drupal_render($variables['items'][$i]) . (($i == count($variables['items']) - 1) ? '' : ', ');
    }
  }
  // Render the top-level DIV.
  $output = '<div class="' . $variables ['classes'] . '"' . $variables ['attributes'] . '>' . $output . '</div>';
  return $output;
}

/**
 * Implements theme_field()
 */
function rhythm_field__field_sale_text($variables) {
  $output = '';
  if(count($variables['items'])) {
    for ($i = 0; $i < count($variables['items']); $i++) {
      $output .= '<div class="intro-label"><span class="label label-danger bg-red">' . $variables['items'][$i]['#markup']  . '</span></div>';
    }
  }
  return $output;
}

/**
 * Implements theme_field()
 */
function rhythm_field__field_old_price($variables) {
  $output = '';
  if(count($variables['items'])) {
    for ($i = 0; $i < count($variables['items']); $i++) {
      $output .= '<del>' . $variables['items'][$i]['#markup']  . '</del>&nbsp;';
    }
  }
  return $output;
}

function rhythm_url_outbound_alter(&$path, &$options, $original_path) {
  $alias = drupal_get_path_alias($original_path);
  $url = parse_url($alias);
  if (isset($url['fragment'])) {
    //set path without the fragment
    $path = isset($url['path']) ? $url['path'] : '';

    //prevent URL from re-aliasing
    $options['alias'] = TRUE;

    //set fragment
    $options['fragment'] = $url['fragment'];
  }
}

function rhythm_link($variables) {
  if($variables['text'] == t('View cart')) {
    $variables['options']['attributes']['class'][] = 'btn btn-mod btn-border btn-small btn-round';
  }
  return '<a href="' . check_plain(url($variables['path'], $variables['options'])) . '"' . drupal_attributes($variables['options']['attributes']) . '>' . ($variables['options']['html'] ? $variables['text'] : check_plain($variables['text'])) . '</a>';
}

function rhythm_pager($variables) {
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next ›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => array('pager-first'),
        'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => array('pager-previous'),
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => array('pager-current'),
            'data' => '<a href = "#" class = "active">' . $i . '</a>',
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array('pager-next'),
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => array('pager-last'),
        'data' => $li_last,
      );
    }
    $output = '<div class = "pagination">';
    $output .= theme('item_list', array(
      'items' => $items,
      'attributes' => array('class' => array('pager')),
    ));
    $output .= '</div>';
    return $output;
  }
}

function rhythm_pager_link($variables) {
  $text = $variables['text'];
  $page_new = $variables['page_new'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $attributes = $variables['attributes'];

  $page = isset($_GET['page']) ? $_GET['page'] : '';
  if ($new_page = implode(',', pager_load_array($page_new[$element], $element, explode(',', $page)))) {
    $parameters['page'] = $new_page;
  }

  $query = array();
  if (count($parameters)) {
    $query = drupal_get_query_parameters($parameters, array());
  }
  if ($query_pager = pager_get_query_parameters()) {
    $query = array_merge($query, $query_pager);
  }

  // Set each pager link title
  if (!isset($attributes['title'])) {
    static $titles = NULL;
    if (!isset($titles)) {
      $titles = array(
        t('«') => t('Go to first page'),
        t('‹') => t('Go to previous page'),
        t('›') => t('Go to next page'),
        t('»') => t('Go to last page'),
      );
    }
    if (isset($titles[$text])) {
      $attributes['title'] = $titles[$text];
    }
    elseif (is_numeric($text)) {
      $attributes['title'] = t('Go to page @number', array('@number' => $text));
    }
  }
  $replace_titles = array(
    t('« first') => '<i class="fa fa-angle-double-left"></i>',
    t('‹ previous') => '<i class="fa fa-angle-left"></i>',
    t('next ›') => '<i class="fa fa-angle-right"></i>',
    t('last »') => '<i class="fa fa-angle-double-right"></i>',
  );
  $text = isset($replace_titles[$text]) ? $replace_titles[$text] : check_plain($text);

  $attributes['href'] = url($_GET['q'], array('query' => $query));
  return '<a' . drupal_attributes($attributes) . '>' . $text . '</a>';
}

/**
* Theme the privatemsg list field.
*
* @see theme_privatemsg_list_field()
*/
function rhythm_privatemsg_list_field__subject($variables) {
  $thread = $variables['thread'];
  $field = array();
  $options = array();
  $is_new = '';
  if (!empty($thread['is_new'])) {
    $is_new = theme('mark', array('type' => MARK_NEW));
    $options['fragment'] = 'new';
  }
  $options['attributes']['class'] = array('privatemsg-list-message-link');
  $subject = $thread['subject'];
  if ($thread['has_tokens']) {
    $message = privatemsg_message_load($thread['thread_id']);
    $subject = privatemsg_token_replace($subject, array('privatemsg_message' => $message), array('sanitize' => TRUE, 'privatemsg-show-span' => FALSE));
  }
  if (!isset($message)) {
    $message = privatemsg_message_load($thread['thread_id']);
  }

  $user_picture_msg = theme('user_picture', array('account' => $message->author));

  if(empty($user_picture_msg)){
    $img_style = 'thumbnail'; 
    $image_thumbnail_default_uri = "public://LXVDefaultImage.jpg";
    $image_thumbnail_default = image_style_url($img_style, $image_thumbnail_default_uri); 
    $user_picture_msg = '<img src="' . $image_thumbnail_default . '">';
  }

  // We will add user picture here.
  $field['data'] =  '<div class="col-md-6 no-padding col-centered no-float vertical-align-middle"><div class="col-md-2 no-padding col-centered no-float vertical-align-middle">' .  $user_picture_msg .'</div><div class="col-md-10 col-centered no-float vertical-align-middle align-left">'. theme('username', array('account' => $message->author)) .'</div></div>';
 
  // Then we will append the subject.
  $field['data'] .= '<div class="col-md-6 col-centered no-float vertical-align-middle">' . l($subject, 'messages/view/' . $thread['thread_id'], $options) . $is_new .'</div>';

  $field['class'][] = 'privatemsg-list-subject clearfix';
  return $field;
}