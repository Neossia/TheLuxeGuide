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
$image = _get_node_field($row, 'field_field_images');
$path = isset($image[0]) ? $image[0]['raw']['uri'] : '';
?>

<section class="page-section fixed-height-small pt-0 pb-0 bg-dark-alfa-30" data-background="<?php print file_create_url($path); ?>">
  <div class="js-height-parent container relative" style="height: 600px;">
    <div class="home-content">
        <div class="home-text">
            <?php print _views_field($fields, 'title'); ?>
            <div>
                <a href="<?php print _views_field($fields, 'path'); ?>" class="btn btn-mod btn-border-w btn-medium btn-round"><?php print t('View Project'); ?></a>
            </div>
            <?php _print_views_fields($fields); ?>
        </div>
    </div>      
  </div>
</section>