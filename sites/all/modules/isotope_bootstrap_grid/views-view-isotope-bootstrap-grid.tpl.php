<?php
/**
 * @file
 * Default view template to display content in a Isotope Bootstrap Grid layout.
 */
?>
<div <?php print drupal_attributes($container_atts); ?>>
  <?php foreach ($items as $i => $item) : ?>
    <?php $class_index = $i - 2; ?>
    <div class="<?php if ($item['class']) print ' ' . implode(' ', $item['class']); ?><?php if ($class_index > -1) print ' ' . $classes_array[$class_index]; ?>">
      <?php print $item['data']; ?>
    </div>
  <?php endforeach; ?>
</div>
