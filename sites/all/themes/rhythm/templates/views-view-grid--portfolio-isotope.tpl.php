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
$columns = isset($view->style_plugin->options['columns']) ? $view->style_plugin->options['columns'] : 3;
global $projects_categories;
$class = isset($column_classes[0][0]) ? $column_classes[0][0] : '';
?>
<?php if(count($view->result) > 0 && !empty($projects_categories)): ?>
  <div class="works-filter font-alt align-center">
    <a href="#" class="filter active" data-filter="*"><?php print t('All works'); ?></a>
    <?php  foreach($projects_categories as $id => $category): ?>
      <a href="#" class="filter" data-filter=".<?php print $id; ?>"><?php print $category; ?></a>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<ul class="works-grid work-grid-<?php print $columns; ?> clearfix font-alt <?php print $class; ?>" id="work-grid">
  <?php foreach ($rows as $row_number => $columns): ?>
    <?php foreach ($columns as $column_number => $item): ?>
      <?php print $item; ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
</ul>

<?php if ($pager): ?>
  <?php print $pager; ?>
<?php endif; ?>

<?php if ($attachment_after): ?>
  <div class="attachment attachment-after">
    <?php print $attachment_after; ?>
  </div>
<?php endif; ?>

<?php if ($more): ?>
  <?php print $more; ?>
<?php endif; ?>

<?php if ($footer): ?>
  <div class="view-footer">
    <?php print $footer; ?>
  </div>
<?php endif; ?>

<?php if ($feed_icon): ?>
  <div class="feed-icon">
    <?php print $feed_icon; ?>
  </div>
<?php endif; ?>
