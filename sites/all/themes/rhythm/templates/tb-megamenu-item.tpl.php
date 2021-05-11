<?php
  $item['link']['#attributes']['class'][] = $submenu ? ' mn-has-sub' : '';
  $angle_class = $item['link']['depth'] == 1 ? 'down' : 'right right';
  $href = strpos($item['link']['href'], "_anchor_") !== false ? str_replace("http://_anchor_", '#', $item['link']['href']) : url($item['link']['href'], $item['link']['options']);
  // Remove the current URL link, so anchor will be processed by Smooth Scroll JS correctly
  if (strpos($href, url($_GET['q'])) === 0) {
    $href = str_replace(url($_GET['q']) . '#', '#', $href);
  }

  $classes .= strpos($item['link']['href'], "_anchor_") !== false ? ' local-scroll' : '';
  $classes .= $item_config['alignsub'] ? ' align-menu-' . $item_config['alignsub'] : '';
?>
<li class="<?php print trim($classes); ?>" <?php print $attributes;?>>
  <?php if(!empty($item_config['caption'])) : ?>
    <a class="mn-group-title" style="height: 97px; line-height: 75px;"><?php print t($item_config['caption']);?></a>
  <?php endif;?>
  <a href="<?php print in_array($item['link']['href'], array('<nolink>')) ? "#" : $href; ?>" <?php print drupal_attributes($item['link']['#attributes']); ?>>
    <?php if(!empty($item_config['xicon'])) : ?>
      <span><i class="<?php print $item_config['xicon'];?> fa-sm"></i></span>
    <?php endif;?>    
    <?php print t($item['link']['link_title']);?>
    <?php print $submenu ? '<i class="fa toggle-menu-icon fa-angle-' . $angle_class . '"></i>' : ''; ?>  
  </a>
  <?php print $submenu ? $submenu : ''; ?>
</li>
