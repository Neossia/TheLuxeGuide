<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">  <!--<![endif]-->
<?php 
  // In case then we show maintenance page in demo view
  if(!isset($site_name)) {
    template_preprocess_maintenance_page($variables);
    extract($variables);
  }
  nikadevs_cms_preprocess_html($variables);
  template_process_maintenance_page($variables);
  template_process($variables, '');
  extract($variables);
?>
<head>

  <?php print $head; ?>

  <title><?php print $head_title; ?></title>
  <meta name="author" content="http://themeforest.net/user/NikaDevs">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">

  <?php print $styles; ?>

</head>
<body class="maintenance-page <?php print $classes; ?>" <?php print $attributes;?>>

  <div class="page" id="top">

    <div class="js-height-full" >
      <div class="home-content container">
          <div class="home-text">
              <div class="hs-cont">

                  <div class="hs-wrap">
                      
                      <div class="hs-line-12 font-alt mb-10">
                          <?php print t('Sorry'); ?>
                      </div>
                      
                      <div class="hs-line-6 no-transp font-alt mb-40">
                          <?php print t('We are currently under construction!'); ?>
                      </div>
                      
                      <?php print isset($messages) ? $messages : ''; ?>

                      <p>
                        <?php print isset($content) ? $content : variable_get('maintenance_mode_message', ''); ?>
                      </p>
                      
                  </div>

                  
              </div>
          </div>
      </div>
    </div>

    <nav class="main-nav dark transparent stick-fixed js-transparent">
        <div class="full-wrapper relative clearfix">
            <div class="nav-logo-wrap local-scroll">
                <a href="<?php print $front_page; ?>" class="logo">
                    <img src="<?php print $logo; ?>" alt="">
                </a>
            </div>
            <div class="mobile-nav" style="height: 75px; line-height: 75px; width: 75px;">
                <i class="fa fa-bars"></i>
            </div>
            <!-- Main Menu -->
            <div class="inner-nav desktop-nav">
                <ul class="clearlist scroll-nav local-scroll" style="max-height: 437px;">
                  <li class="active"><a href="mailto:<?php print variable_get('site_mail'); ?>" style="height: 75px; line-height: 75px;"><i class="fa fa-envelope"></i> <?php print variable_get('site_mail'); ?></a></li>
                  <?php if(theme_get_setting('phone')): ?>
                    <li><a href="#" style="height: 75px; line-height: 75px;"><i class="fa fa-phone"></i> <?php print theme_get_setting('phone'); ?></a></li>                
                  <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
  
  </div>

  <?php print $scripts; ?>

</body>
</html>
