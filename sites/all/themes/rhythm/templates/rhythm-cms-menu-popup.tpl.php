<div class="fm-logo-wrap local-scroll">
    <a href="<?php print url('<front>'); ?>" class="logo"><img src="<?php print $logo; ?>" alt="" /></a>
</div>

<a href="#" class="fm-button"><span></span><?php print t('Menu'); ?></a>

<div class="fm-wrapper" id="fullscreen-menu">
  <div class="fm-wrapper-sub">
    <div class="fm-wrapper-sub-sub">
      <ul class="fm-menu-links local-scroll">
        <?php 
          $main_menu_tree = module_exists('i18n_menu') ? i18n_menu_translated_tree($menu) : menu_tree($menu);
          print rhythm_menu_popup($main_menu_tree);
        ?>
      </ul>
    </div>
  </div>
</div>