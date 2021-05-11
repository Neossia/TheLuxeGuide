<!-- GET ACTUAL LINK -->
<?php 
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$url_part = explode('/', $actual_link);
?>
<!-- END GET ACTUAL LINK -->
<?php 
	global $base_url;
	global $user;
	$nid = arg(1);
	$node = node_load($nid);
	$node_author = user_load($node->uid);
	$path = drupal_get_path_alias('node/' . $node->nid);
	$alias = drupal_get_path_alias('node/' .$nid);
	$current_alias = drupal_get_path_alias('node/' . $node->nid);
	$admin = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
	if(!empty($view->style_plugin->rendered_fields)) {
		$view_fields = $view->style_plugin->rendered_fields;

		$current_year = date("Y");
		$old_str = [" in @AREA,", " @AREA,", " in @AREA", " @AREA", " in @COUNTRY", " @COUNTRY", " @YEAR"];
		if(!empty($view->style_plugin->rendered_fields)) {
			$country = $view_fields[0]['title_1'];
		}
		else{
			$country = basename($_SERVER['HTTP_REFERER']);
		}
		$new_str = ["", "", "", "", "", " in $country", " $current_year"];
	}

	$img_style = 'full_width_banner';
	$image_default_uri = "public://LXVAnonDefaultImage.jpg";
	$image_banner_default = image_style_url($img_style, $image_default_uri);
	if(!empty($node->field_image)) {
		$image_banner = image_style_url($img_style, $node->field_image[LANGUAGE_NONE][0]['uri']);
	}
	$img_style_logo_small = 'small';
	$image_logo_default = image_style_url($img_style_logo_small, $image_default_uri);
	if(!empty($node->field_logo)) {
		$logo_small = image_style_url($img_style_logo_small, $node->field_logo[LANGUAGE_NONE][0]['uri']);
	}
?>
<!-- Check array -->
<?php /* print_r($node->field_professional_description); */ ?>


<!-------------------------------------------------------- Directory -------------------------------------------------------->
<?php if($node->type =='directory_categories'): ?>
	<!-- GET ACTUAL LINK -->
	<?php 
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$url_part = explode('/', $actual_link);
	?>
	<!-- Check array -->
	<?php if(!empty($view->style_plugin->rendered_fields)): ?>
		<div class="bg-white align-center padding-30 border-bottom-grey">
			<h2 class="no-margin fw-600"><?php print($node->title); ?></h2>
			<?php /*
				$block = module_invoke('menu', 'block_view', 'menu-category');
				$menu = '';
				$menuItems = menu_tree_page_data('menu-category'); 
				foreach($menuItems as $key => $m) {
				   if ($m['link']['in_active_trail'] && $menuItems[$key]['below']) {
				       $menu = menu_tree_output($menuItems[$key]['below']);
				   }  
				}
			*/ ?>
			<!-- <div><?php print render($block['content']); ?></div> -->
		</div>
		<?php if(!empty($node->field_category_tab)) : ?>
			<?php
				if(!empty($view->style_plugin->rendered_fields)) {
					$url_title = $view_fields[0]['title_1'];
					$url_title_lower = strtolower($url_title); 
					$new_url_title = str_replace(" ","-", $url_title_lower);
				}
			?>
			<div class="border-bottom-grey">
				<ul class="bg-white uppercase custom-nav-bars nav nav-tabs align-center font-size-12 no-padding" role="tablist">
					<li><a href="<?php print  $base_url . '/' . $path ;?>">Global</a></li>
					<?php
						$items = field_get_items('node', $node, 'field_category_tab');
						foreach ($items as $item) :
					?>
						<?php if ($item['value'] == "2"): ?>
							<li><a href="<?php print  $base_url . '/' . $path . '/media' . '/' . $new_url_title; ?>">Magazine</a></li>
						<?php endif;?>
						<?php if ($item['value'] == "3"): ?>
							<li class="active"><a href="<?php print  $base_url . '/' . $path . '/professionals' . '/' . $new_url_title ;?>">Professionals</a></li>
						<?php endif;?>
						<?php if ($item['value'] == "4"): ?>
							<li><a href="<?php print  $base_url . '/' . $path . '/for-sale' . '/' . $new_url_title; ?>">For Sale</a></li>
						<?php endif;?>
						<?php if ($item['value'] == "5"): ?>
							<li><a href="<?php print  $base_url . '/' . $path . '/for-rent' . '/' . $new_url_title; ?>">For Rent</a></li>
						<?php endif;?>
						<?php if ($item['value'] == "7"): ?>
							<li><a href="<?php print  $base_url . '/' . $path . '/experience' . '/' . $new_url_title; ?>">Experiences</a></li>
						<?php endif;?>
						<?php if ($item['value'] == "8"): ?>
							<li><a href="<?php print  $base_url . '/' . $path . '/events' . '/' . $new_url_title; ?>">Agenda</a></li>
						<?php endif;?>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
		<br>
		<div class="container">
			<?php 
				$breadcrumb = module_invoke("views", "block_view", "view_block-breadcrumbs_directory");
				print render($breadcrumb['content']);
			?>
			<br>
			<br>
			<div class="row clearfix row-eq-height">
				<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 js-sticky-container">
					<div class="js-sticky">
						<div class="bg-white border-radius-3 box-shadow">
							<h3 class="font-size-24 no-margin font-alt fw-600 border-bottom-grey padding-10">Location</h3>
							<div class="padding-15 jump-nav-area">
								<?php
									$block = module_invoke('views', 'block_view', 'view_block-country_jump_nav');
									print render($block['content']);
								?>
							</div>
						</div>
						<br>
						<br>
						<?php
							$rent_sub_category_links = module_invoke('views', 'block_view', 'directory-pro_sub_category_country_link');
							if ($rent_sub_category_links):
						?>
							<div class="bg-white border-radius-3 box-shadow">
								<h3 class="font-size-24 no-margin font-alt fw-600 border-bottom-grey padding-15">Type of Professionals</h3>
								<div class="padding-15 overflow-auto sidenav-class"><ul class="arrow-ul"><?php print render($rent_sub_category_links['content']); ?></ul></div>
							</div>
							<br>
							<br>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-xs-12 col-md-9 col-lg-9 col-xl-9">
					<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
						<?php if(!empty($node->field_pro_title)): ?>
							<?php $title_field = trim(render($node->field_pro_title['und']['0']['value'])); ?>
							<?php
								$str_replace_title = str_replace($old_str, $new_str, $title_field);
								$new_title = substr($str_replace_title, strpos($str_replace_title, $title_field));
							?>
							<h1 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30"><?php print $new_title; ?></h1>
						<?php endif; ?>
						<?php if(!empty($node->field_pro_description)): ?>
							<?php $description_field = trim(render($node->field_pro_description['und'][0]['value'])); ?>
							<?php
								$str_replace_description = str_replace($old_str, $new_str, $description_field);
								$new_description = substr($str_replace_description, strpos($str_replace_description, $description_field));
							?>
							<div class="padding-30"><?php print $new_description; ?></div>
						<?php endif; ?>
					</div>
					<br>
					<br>
					<br>
					<?php
						$block = module_invoke('views', 'block_view', 'directory-pro_directory');
						if ($block):
					?>
						<?php print render($block['content']); ?>
						<br>
						<div class="border-bottom-custom"></div>
						<br>
						<br>
						<br>
					<?php endif; ?>
					<?php if(!empty($node->field_pro_middle_content)): ?>
						<div class="bg-white border-radius-3 box-shadow">
							<?php $middle_content_field = trim(render($node->field_pro_middle_content['und'][0]['value'])); ?>
							<?php
								$str_replace_middle_content = str_replace($old_str, $new_str, $middle_content_field);
								$new_middle_content = substr($str_replace_middle_content, strpos($str_replace_middle_content, $middle_content_field));
							?>
							<div class="padding-30"><?php print $new_middle_content; ?></div>
						</div>
						<br>
						<br>
						<br>
					<?php endif; ?>
					<div class="bg-white border-radius-3 padding-15 box-shadow">
						<div class="row clearfix">
							<div class="col-md-6 col-centered no-float vertical-align-middle">
								<img style="" typeof="foaf:Image" src="https://www.theluxeguide.com/sites/default/files/general/TLGLogoWhite.jpeg" alt="Register at The Luxe Guide" title="">
							</div>
							<div class="col-md-6 col-centered no-float vertical-align-middle padding-15">
								<h3 class="uppercase no-margin rtecenter fw-500 padding-10 no-padding-top no-padding-left no-padding-right">Register on The Luxe Guide</h3>
								<br>
								<p class="align-center">Be part of The Luxe Guide and experience the world of luxury. For more details email us at <span class="fw-600"><a href="mailto:contact@theluxeguide.com">contact@theluxeguide.com</a></span></p>
							</div>
						</div>
					</div>
					<br>
					<br>
					<br>
					<?php if(!empty($node->field_pro_lower_content)): ?>
						<div class="bg-white border-radius-3 box-shadow">
							<?php $lower_content_field = trim(render($node->field_pro_lower_content['und'][0]['value'])); ?>
							<?php
								$str_replace_lower_content = str_replace($old_str, $new_str, $lower_content_field);
								$new_lower_content = substr($str_replace_lower_content, strpos($str_replace_lower_content, $lower_content_field));
							?>
							<div class="padding-30"><?php print $new_lower_content; ?></div>
						</div>
						<br>
						<br>
						<br>
					<?php endif; ?>
					<?php
						$block = module_invoke('views', 'block_view', 'article_unique_content-area_category_professional');
						if ($block):
					?>
						<?php print render($block['content']); ?>
						<br>
						<br>
						<br>
					<?php endif; ?>
					<!-- Contact Us Entity Form -->
					<div class="bg-white padding-15 border-radius-3 box-shadow">
						<div id="inquire">
							<div class="row clearfix align-center">
								<div class="col-md-10 col-centered no-float align-left">
									<div class="padding-60 no-padding-left no-padding-right">
										<h4 class="no-margin-top uppercase no-margin font-size-20 align-center">Request - Inquiry</h4>
										<p class="padding-10 no-padding-left no-padding-right no-padding-bottom font-size-12 align-center">If you didn't find the right information on this page, you can also send us an inquiry that we will share to all our partners.</p>
										<br>
										<?php
											$contact_us = module_invoke('entityform_block', 'block_view', 'request_contact');
											print render($contact_us['content']);
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End of Contact Us Entity Form -->
					<br>
					<br>
					<br>
					<?php /*
						$country_block = module_invoke('views', 'block_view', 'directory-country_area_directory_tab_link');
						$area = !empty($country_block) ? $country_block : module_invoke('views', 'block_view', 'directory-area_directory_tab_links');

						if ($area):
					?>
						<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
							<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30">City Tags</h3>
							<div class="padding-30"><?php print render($area['content']); ?></div>
						</div>
						<br>
						<br>
						<br>
					<?php endif; */ ?>
					<?php
						$block = module_invoke('views', 'block_view', 'directory-ph_country_area_directory_link');
						if ($block):
					?>
						<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
							<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30">Philippines</h3>
							<div class="padding-30"><?php print render($block['content']); ?></div>
						</div>
						<br>
						<br>
						<br>
					<?php endif;?>
				</div>
			</div>
		</div>
	<?php else: ?>
		<?php drupal_goto('page-404'); ?>
	<?php endif; ?>
<?php endif; ?>
<!-------------------------------------------------------- End of Directory -------------------------------------------------------->