<?php if(request_uri() == '/maintenance' && strpos($_SERVER['HTTP_HOST'], 'nikadevs') !== FALSE) { include('maintenance-page.tpl.php'); exit(); } ?>
<!DOCTYPE html>
<html  lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name=viewport content="width=device-width, initial-scale=1">
  <!-- Google Webmaster Verification -->
  <meta name="google-site-verification" content="YkEX9lp-M6wlKJvZ0S0IcR4cpHnZ491fv8Tgb15dXNQ" />
  <!-- End of Google Webmaster Verification -->
  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131242824-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    
    gtag('config', 'UA-131242824-1');
  </script>
  <!-- End Google Analytics -->
  <!-- MailerLite Universal -->
  <script>
  (function(m,a,i,l,e,r){ m['MailerLiteObject']=e;function f(){
  var c={ a:arguments,q:[]};var r=this.push(c);return "number"!=typeof r?r:f.bind(c.q);}
  f.q=f.q||[];m[e]=m[e]||f.bind(f.q);m[e].q=m[e].q||f.q;r=a.createElement(i);
  var _=a.getElementsByTagName(i)[0];r.async=1;r.src=l+'?v'+(~~(new Date().getTime()/1000000));
  .parentNode.insertBefore(r,);})(window, document, 'script', 'https://static.mailerlite.com/js/universal.js', 'ml');

  var ml_account = ml('accounts', '730383', 'u1y2u1b0u2', 'load');
  </script>
  <!-- End MailerLite Universal -->
  <?php print $styles; ?>
  <?php if (stripos($_SERVER['HTTP_HOST'], "nikadevs") !== FALSE && module_exists('nikadevs_dev')) include DRUPAL_ROOT . '/' . drupal_get_path('module', 'nikadevs_dev') . '/g_analytics/rhythm.js'; ?>
</head>
<body class="appear-animate <?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="main-wrap">
    <?php if(theme_get_setting('loader_image')): ?>
      <!-- Page Loader -->        
      <div class="page-loader">
          <div class="loader"><?php print t('Loading...'); ?></div>
      </div>
      <!-- End Page Loader -->
    <?php endif; ?>
    <?php print $page_top; ?>
    <?php print $page; ?>
    <script src="//maps.googleapis.com/maps/api/js?key=<?php print theme_get_setting('gmap_key'); ?>" type="text/javascript"></script>
    <?php print $scripts; ?>
    <!--[if lt IE 10]><script type="text/javascript" src="<?php print base_path() . drupal_get_path('theme', 'rhythm'); ?>/js/placeholder.js"></script><![endif]-->
    <?php print $page_bottom; ?>
  </div>
</body>
</html>