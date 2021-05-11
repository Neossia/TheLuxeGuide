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

	$img_style = 'image_gallery';
	$image_default_uri = "public://LXVAnonDefaultImage.jpg";
	$image_banner_default = image_style_url($img_style, $image_default_uri);
	if(!empty($node->field_image)) {
		$image_banner = image_style_url($img_style, $node->field_image[LANGUAGE_NONE][0]['uri']);
	}
	
	$img_style_logo_small = 'professional_logo';
	$image_logo_default = image_style_url($img_style_logo_small, $image_default_uri);
	if(!empty($node->field_logo)) {
		$logo_small = image_style_url($img_style_logo_small, $node->field_logo[LANGUAGE_NONE][0]['uri']);
	}

	$img_style_gallery = 'image_gallery';
	$image_thumbnail_default = image_style_url($img_style_gallery, $image_default_uri);
	if(!empty($node->field_thumbnail)) {
		$thumbnail = image_style_url($img_style_gallery, $node->field_thumbnail[LANGUAGE_NONE][0]['uri']);
	}
	$current_year = date("Y");
	$old_str = [" in @AREA,", " @AREA,", " in @AREA", " @AREA", " in @COUNTRY", " @COUNTRY", " @YEAR"];
	$new_str = ["", "", "", "", "", "", " $current_year"];
?>
<!-- Check array -->
<?php /* print_r($node->field_email); */ ?>


<!-------------------------------------------------------- Directory -------------------------------------------------------->
<?php if(($node->type =='directory_categories') || ($node->type =='directory_sub_categoriess')): ?>

	<div class="bg-white align-center padding-30 border-bottom-grey">
		<h2 class="no-margin fw-600 padding-10 no-padding-top no-padding-left no-padding-right"><?php print($node->title); ?></h2>
		<?php /*
			$menu_block = module_invoke('menu', 'block_view', 'menu-category');
			$menu = '';
			$menuItems = menu_tree_page_data('menu-category'); 
			foreach($menuItems as $key => $m) {
			   if ($m['link']['in_active_trail'] && $menuItems[$key]['below']) {
			       $menu = menu_tree_output($menuItems[$key]['below']);
			   }  
			}
		*/ ?>
		<!-- <div class="col-md-2 col-centered no-float vertical-align-top"><?php print render($menu_block['content']); ?></div> -->
	</div>
	<?php if(!empty($node->field_category_tab)) : ?>
		<div class="border-bottom-grey">
			<ul class="bg-white uppercase custom-nav-bars nav nav-tabs align-center font-size-12 no-padding" role="tablist">
				<li><a href="<?php print  $base_url . '/' . $path ;?>">Home</a></li>
				<?php 
					$items = field_get_items('node', $node, 'field_category_tab');
					foreach ($items as $item) :
				?>
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
						<li class="active"><a href="<?php print  $base_url . '/' . $path . '/for-rent' ;?>">For Rent</a></li>
					<?php endif;?>
					<?php if ($item['value'] == "7"): ?>
						<li><a href="<?php print  $base_url . '/' . $path . '/experience' ;?>">Experiences</a></li>
					<?php endif;?>
					<?php if ($item['value'] == "8"): ?>
						<li><a href="<?php print  $base_url . '/' . $path . '/events' ;?>">Agenda</a></li>
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
								$block = module_invoke('views', 'block_view', 'view_block-jump_nav');
								print render($block['content']);
							?>
						</div>
					</div>
					<br>
					<br>
					<?php
						$rent_sub_category_links = module_invoke('views', 'block_view', 'directory-rent_sub_category_link');
						if ($rent_sub_category_links):
					?>
						<div class="bg-white border-radius-3 box-shadow">
							<h3 class="font-size-24 no-margin font-alt fw-600 border-bottom-grey padding-15">Type of Rental</h3>
							<div class="padding-15 overflow-auto sidenav-class"><ul class="arrow-ul"><?php print render($rent_sub_category_links['content']); ?></ul></div>
						</div>
						<br>
						<br>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-xs-12 col-md-9 col-lg-9 col-xl-9">
				<?php if((!empty($node->field_rent_title)) || (!empty($node->field_rent_description))) : ?>
					<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
						<?php if(!empty($node->field_rent_title)): ?>
							<?php 
								$title_field = trim(render($node->field_rent_title['und']['0']['value']));
								$str_replace_title = str_replace($old_str, $new_str, $title_field);
								$new_title = substr($str_replace_title, strpos($str_replace_title, $title_field));
							?>
							<h1 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30"><?php print $new_title; ?></h1>
						<?php endif; ?>
						<?php if(!empty($node->field_rent_description)): ?>
							<?php
								$description_field = trim(render($node->field_rent_description['und'][0]['value']));
								$str_replace_description = str_replace($old_str, $new_str, $description_field);
								$new_description = substr($str_replace_description, strpos($str_replace_description, $description_field));
							?>
							<div class="padding-30"><?php print $new_description; ?></div>
						<?php endif; ?>
						<!-- <div class="padding-15 no-padding-top">
							<div class="row clearfix align-center">
								<div class="col-12 col-sm-6 col-xs-12 col-md-4 col-centered no-float align-center jump-nav-area vertical-align-top">
									<?php
										$block = module_invoke('views', 'block_view', 'view_block-jump_nav');
										print render($block['content']);
									?>
									<br>
								</div>
								<?php
									$class_block = module_invoke('views', 'block_view', 'directory-rent_sub_category_link');
									if ($class_block):
								?>
									<div class="col-12 col-sm-6 col-xs-12 col-md-4 col-centered no-float align-center vertical-align-top">
										<div id="menu-select" class="position-relative menu-select uppercase">Type of Rental
											<ul id="drop-down-menu" class = "clearlist drop-down-menu"><?php print render($class_block['content']); ?></ul>
										</div>
										<br>
									</div>
								<?php endif; ?>
							</div>
						</div> -->
					</div>
					<br>
					<br>
					<br>
				<?php endif; ?>
				<?php
					$block = module_invoke('views', 'block_view', 'directory-rent_directory');
					if ($block):
				?>
					<?php print render($block['content']); ?>
					<br>
					<?php
						$additional_for_rent_block = module_invoke('views', 'block_view', 'directory-additional_for_rent_category');
						if ($additional_for_rent_block):
					 		print render($additional_for_rent_block['content']);
						endif;
					?>
					<div class="border-bottom-custom"></div>
					<br>
					<br>
					<br>
				<?php endif; ?>
				<?php if(!empty($node->field_rent_middle_content)): ?>
					<div class="bg-white border-radius-3 box-shadow">
						<?php 
							$middle_content_field = trim(render($node->field_rent_middle_content['und'][0]['value']));
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
						<div class="col-md-5 col-centered no-float vertical-align-middle">
							<img typeof="foaf:Image" src="https://www.theluxeguide.com/sites/default/files/general/TLGLogoWhite.jpeg" alt="Register at The Luxe Guide" title="">
						</div>
						<div class="col-md-7 col-centered no-float vertical-align-middle padding-15">
							<h3 class="uppercase no-margin rtecenter fw-500 padding-10 no-padding-top no-padding-left no-padding-right">Register on The Luxe Guide</h3>
							<br>
							<p class="align-center">Be part of The Luxe Guide and experience the world of luxury. For more details email us at <span class="fw-600"><a href="mailto:contact@theluxeguide.com">contact@theluxeguide.com</a></span></p>
						</div>
					</div>
				</div>
				<br>
				<br>
				<br>
				<?php if(!empty($node->field_rent_lower_content)): ?>
					<div class="bg-white border-radius-3 box-shadow">
						<?php $lower_content_field = trim(render($node->field_rent_lower_content['und'][0]['value'])); ?>
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
					$block = module_invoke('views', 'block_view', 'article_unique_content-category_rent');
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
				<?php
					$block = module_invoke('views', 'block_view', 'directory-ph_area_directory_link');
					if ($block):
				?>
					<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
						<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30">Philippines</h3>
						<div class="padding-30">
							<div class="font-size-18"><a href="<?php print $actual_link . '/philippines'; ?>">Go to Philippines page <i class="fa fa-angle-double-right"></i></a></div>
							<br>
							<?php print render($block['content']); ?>
						</div>
					</div>
					<br>
					<br>
					<br>
				<?php endif;?>
				<?php /*
					$block = module_invoke('views', 'block_view', 'directory-country_directory_tab_link');
					if ($block):
				?>
					<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
						<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30">Choose a Country</h3>
						<div class="padding-30"><?php print render($block['content']); ?></div>
					</div>
					<br>
					<br>
					<br>
				<?php endif; */ ?>
			</div>
		</div>
	</div>
<?php endif; ?>
<!-------------------------------------------------------- End of Directory -------------------------------------------------------->


<!-------------------------------------------------------- Professional -------------------------------------------------------->
<?php if($node->type =='professionals'): ?>
	<div class="row-eq-height clearfix">
		<div class="col-md-6 no-padding">
			<div class="full-width">
				<?php if(!empty($node->field_thumbnail)): ?>
					<img src="<?php print $thumbnail; ?>" />
				<?php else: ?>
					<img src="<?php print $image_banner_default; ?>" />
				<?php endif; ?>
			</div>
		</div>
		<div class="col-md-6 no-padding column-vertical-align bg-white align-center border-bottom-grey">
			<div class="padding-30">
				<?php if(!empty($node->field_logo)) : ?>
					<div class="padding-10 no-padding-top no-padding-left no-padding-right"><img src="<?php print $logo_small; ?>" /></div>
					<br>
				<?php endif; ?>
				<h1 class="no-margin padding-10 uppercase no-padding-top no-padding-left no-padding-right display-inline-block fw-600"><?php print($node->title); ?></h1>
				<?php if(!empty($node->field_sub_category_connected)) : ?>
					<div class="uppercase font-size-12 font-size-10-sm letter-spacing-3 padding-10 no-padding-top no-padding-left no-padding-right fw-600">
						<?php
							$items = field_get_items('node', $node, 'field_sub_category_connected');
							foreach ($items as $item) {
								$val = $item['target_id'];
								$node_sub = node_load($val);
								$title_category = $node_sub->title;
								$value_array[] = $title_category;
							}
							print implode(', ', $value_array);
						?>
					</div>
				<?php endif; ?>
				<?php if(!empty($node->field_website)) : ?>
					<?php 
						$http = array("https://", "http://");
						$web_link = str_replace($http, "", $node->field_website['und'][0]['value']);	
					?>
					<div class="fw-600 padding-10 no-padding-top no-padding-left no-padding-right"><a href="http:\\<?php print($web_link); ?>" target="_blank" rel="nofollow"><i class="fas fa-fw fa-globe"></i> Website</a></div>
				<?php endif; ?>
				<div><a class="btn btn-mod btn-medium btn-round scroll" href="#inquire"><i class="fa fa-fw fa-envelope-o"></i> Message Now</a></div>
			</div>
		</div>
	</div>
	<div class="border-bottom-grey">
		<ul class="bg-white uppercase custom-nav-bars nav nav-tabs align-center font-size-12 no-padding" role="tablist">
			<li><a href="<?php print  $base_url . '/' . $path;?>">Home</a></li>
			<li><a href="<?php print  $base_url . '/' . $path . '/media'; ?>">Magazine</a></li>
			<?php if($node->field_premium_professional['und'][0]['value'] == 1): ?>
				<li><a href="<?php print  $base_url . '/' . $path . '/affiliate-business'; ?>">Affiliated Business</a></li>
			<?php endif; ?>
			<li><a href="<?php print  $base_url . '/' . $path . '/for-sale'; ?>">For Sale</a></li>
			<li class="active"><a href="<?php print  $base_url . '/' . $path . '/for-rent' ;?>">For Rent</a></li>
			<li><a href="<?php print  $base_url . '/' . $path . '/experience'; ?>">Experiences</a></li>
			<li><a href="<?php print  $base_url . '/' . $path . '/events'; ?>">Event Agenda</a></li>
		</ul>
	</div>
	<br>
	<div class="container">
		<?php 
			$breadcrumb = module_invoke("views", "block_view", "view_block-breadcrumbs_professionals");
			print render($breadcrumb['content']);
		?>
		<br>
		<br>
		<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
			<div class="padding-30">
				<?php if(!empty($node->field_rent_title)): ?>
					<?php $title_field = trim(render($node->field_rent_title['und']['0']['value'])); ?>
					<?php
						$str_replace_title = str_replace($old_str, $new_str, $title_field);
						$new_title = substr($str_replace_title, strpos($str_replace_title, $title_field));
					?>
					<h2 class="no-margin font-alt font-size-24 fw-600"><?php print $new_title; ?></h2>
				<?php else: ?>
					<h2 class="no-margin font-alt font-size-24 fw-600">Explore our <?php print $current_year; ?> selection of best <?php print($node->title); ?> for rent.</h2>
				<?php endif; ?>	
				<?php if(!empty($node->field_rent_description)): ?>
					<?php $description_field = trim(render($node->field_rent_description['und'][0]['value'])); ?>
					<?php
						$str_replace_description = str_replace($old_str, $new_str, $description_field);
						$new_description = substr($str_replace_description, strpos($str_replace_description, $description_field));
					?>
					<br>
					<?php print $new_description; ?>
				<?php else: ?>
					<br>
					<p>Stay informed with the latest <?php print($node->title); ?> Models & Pricelist and subscribe to The Luxe Guide Newsletter:<br>
					- <?php print($node->title); ?> models<br>
					- <?php print($node->title); ?> price<br>
					- <?php print($node->title); ?> pricelist<br>
					- Most expensive <?php print($node->title); ?><br>
					- latest <?php print($node->title); ?> models<br>
					- <?php print($node->title); ?> cost</p>
				<?php endif; ?>
			</div>
		</div>
		<br>
		<br>
		<br>
		<?php
			$official = module_invoke('views', 'block_view', 'professional-pro_official_rental');
			$unofficial = module_invoke('views', 'block_view', 'professional-pro_unofficial_rental');
		?>
		<?php if($official || $unofficial): ?>
			<h3 class="no-margin font-alt font-size-24 fw-600"><?php print($node->title); ?> Rentals</h3>
			<br>
			<div><?php print render($official['content']); ?></div>
			<div><?php print render($unofficial['content']); ?></div>
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
		<?php if(!empty($node->field_premium_professional)): ?>
			<?php if($node->field_premium_professional['und'][0]['value'] == 1): ?>
				<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30">Philippines</h3>
					<div class="padding-30">
						<div class="font-size-18"><a href="<?php print $base_url . '/' . $path . '/philippines'; ?>">Go to Philippines page <i class="fa fa-angle-double-right"></i></a></div>
						<br>
						<div class="row clearfix">
							<div class="col-md-3"><a href="<?php print $actual_link . '/manila'; ?>">Manila</a></div>
							<div class="col-md-3"><a href="<?php print $actual_link . '/cebu-city'; ?>">Cebu</a></div>
						</div>
					</div>
				</div>
				<br>
				<br>
				<br>
			<?php endif; ?>
		<?php endif; ?>
		<?php /*
			$block = module_invoke('views', 'block_view', 'professional-country_links');
			if ($block):
		?>
			<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
				<div class="padding-30">
					<div class="no-margin font-alt font-size-24 fw-600">Country Tags</div>
					<br>
					<?php print render($block['content']); ?>
				</div>
			</div>
			<br>
			<br>
			<br>
		<?php endif; */ ?>
	</div>
	<?php if(!empty($node->field_contact_number)) : ?>
	<div id="contact-number" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body rtecenter">
					<?php print($node->field_contact_number['und']['0']['value']); ?>
					
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if(!empty($node->field_email)) : ?>
	<div id="email" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body rtecenter">
					<?php print($node->field_email['und']['0']['email']); ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>
<!-------------------------------------------------------- End of Professional -------------------------------------------------------->


<!-------------------------------------------------------- Models & Projects -------------------------------------------------------->
<?php if($node->type =='models_projects'): ?>
	<div class="row-eq-height clearfix">
		<div class="col-md-6 no-padding">
			<div class="full-width">
				<?php if(!empty($node->field_thumbnail)): ?>
					<img src="<?php print $thumbnail; ?>" />
				<?php else: ?>
					<img src="<?php print $image_banner_default; ?>" />
				<?php endif; ?>
			</div>
		</div>
		<div class="col-md-6 no-padding column-vertical-align bg-white align-center border-bottom-grey">
			<div class="padding-30">
				<?php if(!empty($node->field_logo)) : ?>
					<div class="padding-10 no-padding-top no-padding-left no-padding-right"><img src="<?php print $logo_small; ?>" /></div>
					<br>
				<?php endif; ?>
				<h1 class="no-margin padding-10 uppercase no-padding-top no-padding-left no-padding-right display-inline-block fw-600"><?php print($node->title); ?></h1>
				<?php if(!empty($node->field_sub_category_connected)) : ?>
					<div class="uppercase font-size-12 font-size-10-sm letter-spacing-3 padding-10 no-padding-top no-padding-left no-padding-right fw-600">
						<?php
							$items = field_get_items('node', $node, 'field_sub_category_connected');
							foreach ($items as $item) {
								$val = $item['target_id'];
								$node_sub = node_load($val);
								$title_category = $node_sub->title;
								$value_array[] = $title_category;
							}
							print implode(', ', $value_array);
						?>
					</div>
				<?php endif; ?>
				<div class="padding-15 jump-nav-area">
					<div class="row clearfix align-center">
						<div class="col-md-3 col-centered no-float align-left">
							<?php
								$block = module_invoke('views', 'block_view', 'view_block-jump_nav');
								print render($block['content']);
							?>
							<br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="border-bottom-grey">
		<ul class="bg-white uppercase custom-nav-bars nav nav-tabs align-center font-size-12 no-padding" role="tablist">
			<li><a href="<?php print  $base_url . '/' . $path;?>">Home</a></li>
			<li><a href="<?php print  $base_url . '/' . $path . '/media'; ?>">News</a></li>
			<li><a href="<?php print  $base_url . '/' . $path . '/professionals'; ?>">Dealers</a></li>
			<li><a href="<?php print  $base_url . '/' . $path . '/for-sale'; ?>">For Sale</a></li>
			<li class="active"><a href="<?php print  $base_url . '/' . $path . '/for-rent' ;?>">For Rent</a></li>
			<li><a href="<?php print  $base_url . '/' . $path . '/experience'; ?>">Experiences</a></li>
			<!--<li><a href="<?php print  $base_url . '/' . $path . '/#'; ?>">Request</a></li>
			<li><a href="<?php print  $base_url . '/' . $path . '/events'; ?>">Event Agenda</a></li>-->
		</ul>
	</div>
	<br>
	<div class="container">
		<?php 
			$breadcrumb = module_invoke("views", "block_view", "view_block-breadcrumbs_professionals");
			print render($breadcrumb['content']);
		?>
		<br>
		<br>
		<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
			<div class="padding-30">
				<?php if(!empty($node->field_rent_title)): ?>
					<?php $title_field = trim(render($node->field_rent_title['und']['0']['value'])); ?>
					<?php
						$str_replace_title = str_replace($old_str, $new_str, $title_field);
						$new_title = substr($str_replace_title, strpos($str_replace_title, $title_field));
					?>
					<h2 class="no-margin font-alt font-size-24 fw-600"><?php print $new_title; ?></h2>
				<?php else: ?>
					<h2 class="no-margin font-alt font-size-24 fw-600">Explore our <?php print $current_year; ?> selection of best <?php print($node->title); ?> for rent.</h2>
				<?php endif; ?>	
				<?php if(!empty($node->field_rent_description)): ?>
					<?php $description_field = trim(render($node->field_rent_description['und'][0]['value'])); ?>
					<?php
						$str_replace_description = str_replace($old_str, $new_str, $description_field);
						$new_description = substr($str_replace_description, strpos($str_replace_description, $description_field));
					?>
					<br>
					<?php print $new_description; ?>
				<?php else: ?>
					<br>
					<p>Stay informed with the latest <?php print($node->title); ?> Models & Pricelist and subscribe to The Luxe Guide Newsletter:<br>
					- <?php print($node->title); ?> models<br>
					- <?php print($node->title); ?> price<br>
					- <?php print($node->title); ?> pricelist<br>
					- Most expensive <?php print($node->title); ?><br>
					- latest <?php print($node->title); ?> models<br>
					- <?php print($node->title); ?> cost</p>
				<?php endif; ?>
			</div>
		</div>
		<br>
		<br>
		<br>
		<?php
			$rent = module_invoke('views', 'block_view', 'models_projects-all_rent');
		?>
		<?php if($rent): ?>
			<div class="no-margin font-alt font-size-24 fw-600"><?php print($node->title); ?> Rentals</div>
			<br>
			<div><?php print render($rent['content']); ?></div>
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
	</div>
	<?php if(!empty($node->field_contact_number)) : ?>
	<div id="contact-number" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body rtecenter">
					<?php print($node->field_contact_number['und']['0']['value']); ?>
					
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if(!empty($node->field_email)) : ?>
	<div id="email" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body rtecenter">
					<?php print($node->field_email['und']['0']['email']); ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>
<!-------------------------------------------------------- End of Models & Projects -------------------------------------------------------->