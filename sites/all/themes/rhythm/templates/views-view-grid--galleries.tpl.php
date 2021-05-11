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
$grid_cols = isset($view->style_plugin->options['columns']) ? $view->style_plugin->options['columns'] : 2;
?>
<section class = "page-section bg-dark-lighter pt-10 pb-0">
  <div class = "relative">
    <ul class = "works-grid work-grid-<?php print $grid_cols; ?> work-grid-gut clearfix font-alt hide-titles">
      <?php foreach ($rows as $row_number => $columns): ?>
        <?php foreach ($columns as $column_number => $item): ?>
          <li class = "work-item mix photography">
            <?php print $item; ?>
          </li>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </ul>
  </div>
</section>