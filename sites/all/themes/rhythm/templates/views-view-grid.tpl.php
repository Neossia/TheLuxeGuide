<?php

/**
 * @file
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
// Match Column numbers to Bootsrap class
$columns_classes = array(1 => 12, 2 => 6, 3 => 4, 4 => 3, 6 => 2, 12 => 1);
$bootsrap_class = isset($columns_classes[$view->style_plugin->options['columns']]) ? $columns_classes[$view->style_plugin->options['columns']] : 3;
$delay_attr = '';
?>
<?php foreach ($rows as $row_number => $columns): ?>
  <div class = "row<?php if ($row_classes[$row_number]) { print ' ' . $row_classes[$row_number];  } ?>" >
    <?php foreach ($columns as $column_number => $item): ?>
      <?php
        if(isset($column_classes[$row_number][$column_number]) && strpos($column_classes[$row_number][$column_number], 'animation-delay') !== FALSE) {
          $column_classes[$row_number][$column_number] .= ' fadeInUp';
          $delay = isset($delay) ? $delay + 0.1 : 0.1;
          $delay_attr = ' data-wow-delay = "' . $delay . 's" ';
        }
      ?>
      <div class = "col-md-<?php print $bootsrap_class; ?><?php if ($column_classes[$row_number][$column_number]) { print ' ' . $column_classes[$row_number][$column_number];  } ?>" <?php print $delay_attr; ?>>
        <?php print $item; ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php endforeach; ?>