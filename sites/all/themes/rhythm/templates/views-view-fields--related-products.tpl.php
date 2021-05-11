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
?>   
<div class="post-prev-img">
    
  <?php print $fields['field_images']->content; ?>
  
  <?php if (isset($fields['field_sale_text']->content)): ?>
    <div class="intro-label">
        <span class="label label-danger bg-red"><?php print t($fields['field_sale_text']->content); ?></span>
    </div>
  <?php endif; ?>
    
</div>

<div class="post-prev-title font-alt align-center">
  <?php print $fields['title']->content; ?>
</div>

<div class="post-prev-text align-center">
  <?php if (isset($fields['field_old_price']->content)): ?>
    <del><?php print $fields['field_old_price']->content; ?></del>
    &nbsp;
  <?php endif; ?>
  <strong><?php print $fields['commerce_price']->content; ?></strong>
</div>

<div class="post-prev-more align-center">
  <?php print $fields['add_to_cart_form']->content; ?>
</div>

<?php _print_views_fields($fields, array('field_images', 'field_sale_text', 'title', 'field_old_price', 'commerce_price', 'add_to_cart_form'));?>