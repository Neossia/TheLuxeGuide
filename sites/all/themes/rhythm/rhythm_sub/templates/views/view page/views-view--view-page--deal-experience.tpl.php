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
<?php /* print_r($node->field_email); */ ?>

<!-- Directory -->
<?php if(($node->type =='directory_categories') || ($node->type =='directory_sub_categoriess')): ?>
	<?php
		$current_year = date("Y");
		$old_str = [" in @AREA,", " @AREA,", " in @AREA", " @AREA", " in @COUNTRY", " @COUNTRY", " @YEAR"];
		$new_str = ["", "", "", "", "", "", " $current_year"];
	?>
	<?php /* if(!empty($node->field_image)): ?>
		<div class="full-width festive-filter padding-100 padding-60-sm no-padding-left no-padding-right align-center page-section bg-scroll banner-section" style="background-image: url(<?php print $image_banner; ?>);">
			<div class="container">
				<div class="col-md-6 col-centered no-float bg-white-opacity padding-40">
					<h2 class="no-margin padding-10 no-padding-top no-padding-left no-padding-right display-inline-block fw-600"><?php print($node->title); ?> Guide</h2>
					<div class="uppercase font-size-12 font-size-10-sm letter-spacing-3">
						<span class="fw-600">Luxury Directory</span>
					</div>
				</div>
			</div>
		</div>
	<?php else: ?>
		<div class="full-width festive-filter padding-100 padding-60-sm no-padding-left no-padding-right align-center page-section bg-scroll banner-section" style="background-image: url(<?php print $image_banner_default; ?>);">
			<div class="container">
				<div class="col-md-6 col-centered no-float bg-white-opacity padding-40">
					<h2 class="no-margin padding-10 no-padding-top no-padding-left no-padding-right display-inline-block fw-600"><?php print($node->title); ?> Guide</h2>
					<div class="uppercase font-size-12 font-size-10-sm letter-spacing-3">
						<span class="fw-600">Luxury Directory</span>
					</div>
				</div>
			</div>
		</div>
	<?php endif; */ ?>
	<div class="bg-white align-center padding-30 border-bottom-grey">
		<h2 class="no-margin fw-600 padding-10 no-padding-top no-padding-left no-padding-right"><?php print($node->title); ?></h2>
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
		<div class="border-bottom-grey">
			<ul class="bg-white uppercase custom-nav-bars nav nav-tabs align-center font-size-12 no-padding" role="tablist">
				<li><a href="<?php print  $base_url . '/' . $path ;?>">Home</a></li>
				<?php 
					$items = field_get_items('node', $node, 'field_category_tab');
					foreach ($items as $item) :
				?>
					<?php if ($item['value'] == "1"): ?>
						<li><a href="<?php print  $base_url . '/' . $path . '/models-pricelist' ;?>">Models & Pricelist</a></li>
					<?php endif;?>
					<?php if ($item['value'] == "2"): ?>
						<li><a href="<?php print  $base_url . '/' . $path . '/media' ;?>">Magazine</a></li>
					<?php endif;?>
					<?php if ($item['value'] == "3"): ?>
						<li><a href="<?php print  $base_url . '/' . $path . '/professionals' ;?>">Professionals</a></li>
					<?php endif;?>
					<?php if ($item['value'] == "4"): ?>
						<li><a href="<?php print  $base_url . '/' . $path . '/for-sale' ;?>">For Sale</a></li>
					<?php endif;?>
					<?php if ($item['value'] == "5"): ?>
						<li><a href="<?php print  $base_url . '/' . $path . '/for-rent' ;?>">For Rent</a></li>
					<?php endif;?>
					<?php if ($item['value'] == "6"): ?>
						<li><a href="<?php print  $base_url . '/' . $path . '/sell' ;?>">Sell</a></li>
					<?php endif;?>
					<?php if ($item['value'] == "7"): ?>
						<li><a href="<?php print  $base_url . '/' . $path . '/travels' ;?>">Travels</a></li>
					<?php endif;?>
					<?php if ($item['value'] == "8"): ?>
						<li><a href="<?php print  $base_url . '/' . $path . '/events' ;?>">Events Agenda</a></li>
					<?php endif;?>
					<?php if ($item['value'] == "10"): ?>
						<li class="active"><a href="<?php print  $base_url . '/' . $path . '/deals-experiences' ;?>">Deals & Experiences</a></li>
					<?php endif;?>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
	<div class="container">
		<br>
		<br>
		<div class="row clearfix row-eq-height">
			<div class="col-md-3 js-sticky-container">
				<div class="js-sticky">
					<div class="bg-white border-radius-3 box-shadow">
						<div class="font-size-16 no-margin font-alt fw-600 border-bottom-grey padding-15">Choose a Location</div>
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
						$block = module_invoke('views', 'block_view', 'directory-deals_sub_category_link');
						if ($block):
					?>
						<div class="bg-white border-radius-3 box-shadow">
							<div class="font-size-16 no-margin font-alt fw-600 border-bottom-grey padding-15">Type of Deals & Experience</div>
							<div class="padding-15"><ul class="arrow-ul"><?php print render($block['content']); ?></ul></div>
						</div>
						<br>
						<br>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-9">
				<?php if((!empty($node->field_deals_title)) || (!empty($node->field_deals_description))) : ?>
					<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
						<?php if(!empty($node->field_deals_title)): ?>
							<?php $title_field = trim(render($node->field_deals_title['und']['0']['value'])); ?>
							<?php
								$str_replace_title = str_replace($old_str, $new_str, $title_field);
								$new_title = substr($str_replace_title, strpos($str_replace_title, $title_field));
							?>
							<h1 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15"><?php print $new_title; ?></h1>
						<?php endif; ?>
						<?php if(!empty($node->field_deals_description)): ?>
							<?php $description_field = trim(render($node->field_deals_description['und'][0]['value'])); ?>
							<?php
								$str_replace_description = str_replace($old_str, $new_str, $description_field);
								$new_description = substr($str_replace_description, strpos($str_replace_description, $description_field));
							?>
							<div class="padding-15"><?php print $new_description; ?></div>
						<?php endif; ?>
					</div>
					<br>
					<br>
					<br>
				<?php endif; ?>
				<?php
					$block = module_invoke('views', 'block_view', 'directory-deals_directory');
					if ($block):
				?>
					<?php print render($block['content']); ?>
					<br>
				<?php endif; ?>
				<?php
					$sub_block = module_invoke('views', 'block_view', 'directory-deals_sub_directory');
					if ($sub_block):
				?>
					<?php print render($sub_block['content']); ?>
					<br>
				<?php endif; ?>
				<?php $additional_directory_block = module_invoke('views', 'block_view', 'directory-additional_deals_category'); ?>
				<?php if ($additional_directory_block): ?>
					<h3 class="no-margin font-alt font-size-24 fw-600">Other Experiences and Deals</h3>
					<br>
					<?php print render($additional_directory_block['content']); ?>
					<br>
				<?php endif; ?>
				<?php if(!empty($node->field_deals_middle_content)): ?>
					<div class="bg-white border-radius-3 box-shadow">
						<?php $middle_content_field = trim(render($node->field_deals_middle_content['und'][0]['value'])); ?>
						<?php
							$str_replace_middle_content = str_replace($old_str, $new_str, $middle_content_field);
							$new_middle_content = substr($str_replace_middle_content, strpos($str_replace_middle_content, $middle_content_field));
						?>
						<div class="padding-15"><?php print $new_middle_content; ?></div>
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
				<?php if(!empty($node->field_deals_lower_content)): ?>
					<div class="bg-white border-radius-3 box-shadow">
						<?php $lower_content_field = trim(render($node->field_deals_lower_content['und'][0]['value'])); ?>
						<?php
							$str_replace_lower_content = str_replace($old_str, $new_str, $lower_content_field);
							$new_lower_content = substr($str_replace_lower_content, strpos($str_replace_lower_content, $lower_content_field));
						?>
						<div class="padding-15"><?php print $new_lower_content; ?></div>
					</div>
					<br>
					<br>
					<br>
				<?php endif; ?>
				<!-- Contact Us Entity Form -->
				<div class="bg-white padding-15 border-radius-3">
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
				<?php
					$block = module_invoke('views', 'block_view', 'directory-country_directory_link');
					if ($block):
				?>
					<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
						<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">Country Tags</h3>
						<div class="padding-15"><?php print render($block['content']); ?></div>
					</div>
					<br>
					<br>
					<br>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>
<!-- End of Directory -->