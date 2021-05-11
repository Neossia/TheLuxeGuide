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
global $counter;
$counter = !isset($counter) ? 0 : ++$counter;
if ($counter) { print '<hr class="mt-0 mb-0">'; }
$images = _views_field($fields, 'field_images');
?>
<section class="mb-140 mt-140">
  <div class="container relative">
    <div class="row">
      <?php if($counter % 2): ?>  
        <div class="col-md-5 col-lg-4 mb-sm-40">
          <div class="text">
            <?php _print_views_fields($fields); ?>
          </div>
        </div>
        <div class="col-md-7 col-lg-offset-1">
          <?php print $images; ?>
        </div>
      <?php else: ?>
        <div class="col-md-7 mb-sm-40">
          <?php print $images; ?>
        </div>
        <div class="col-md-5 col-lg-4 col-lg-offset-1">              
          <div class="text">
            <?php _print_views_fields($fields); ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>