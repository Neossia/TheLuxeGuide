<?php
/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
global $projects_categories;
$categories = array();  
if(isset($row->field_field_portfolio_category) && !empty($row->field_field_portfolio_category)) {
  foreach($row->field_field_portfolio_category as $taxonomy) {
    $category = $taxonomy['raw']['taxonomy_term']->name;
    $category_id = $view->vid . '-' . $taxonomy['raw']['taxonomy_term']->tid;
    $projects_categories[$category_id] = $category;
    $categories[] = $category_id;
  }
}
$image = _get_node_field($row, 'field_field_images');
$path = isset($image[0]) ? $image[0]['raw']['uri'] : '';
$href = _views_field($fields, 'path');
$class = 'work-ext-link';
$text = t('View Project');
?>
<li class="work-item mix <?php print implode(' ', $categories); ?>">
  <a href="<?php print $href; ?>" class="<?php print $class; ?>">
    <div class="work-img">
      <?php print _views_field($fields, 'field_images'); ?>
    </div>
    <div class="work-intro">
      <h3 class="work-title"><?php print _views_field($fields, 'title'); ?></h3>
      <div class="work-descr">
        <?php print $text; ?>
      </div>
      <?php _print_views_fields($fields); ?>
    </div>
  </a>
</li>