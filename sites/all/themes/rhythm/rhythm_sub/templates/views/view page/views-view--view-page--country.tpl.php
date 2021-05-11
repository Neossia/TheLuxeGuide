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
	if(!empty($view->style_plugin->rendered_fields)){
		$view_fields = $view->style_plugin->rendered_fields;
	}

	$img_style = 'image_gallery';
	$img_style_logo_small = 'professional_logo';
	
	// Call the parent category id
	$parent_category_nid = !empty($node->field_pro_parent_category['und'][0]['target_id']) 
								? $node->field_pro_parent_category['und'][0]['target_id'] 
								: 	(
										!empty($node->field_global_professional['und'][0]['target_id']) 
											? node_load($node->field_global_professional['und'][0]['target_id'])->field_pro_parent_category['und'][0]['target_id'] 
											: 0
									);
	
	$parent_category = node_load($parent_category_nid);
	$parent_path = drupal_get_path_alias('node/' . $parent_category_nid);
	

	if(!empty($view->style_plugin->rendered_fields)) {
		$url_title = $view_fields[0]['title_1'];
		$url_title_lower = strtolower($url_title); 
		$new_url_title = str_replace(" ","-", $url_title_lower);

		$current_year = date("Y");
		$old_str = [" in @AREA,", " @AREA,", " in @AREA", " @AREA", " in @COUNTRY", " @COUNTRY", " @YEAR", "@YEAR"];
		if(!empty($view->style_plugin->rendered_fields)) {
			$country = $view_fields[0]['title_1'];
		}
		else{
			$country = basename($_SERVER['HTTP_REFERER']);
		}
		$new_str = ["", "", "", "", "", " in $country", " $current_year", "$current_year"];
	}


?>
<?php
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$node_title =  basename($actual_link);
	$new_title = str_replace("-"," ",$node_title);
	$query = new EntityFieldQuery();


	$entities = $query->entityCondition('entity_type', 'node')
	->propertyCondition('type', 'area')
	->propertyCondition('title', $new_title. '%', 'like')
	->propertyCondition('status', 1)
	->range(0,1)
	->execute();

	if (!empty($entities['node'])) {
		$area = reset($entities['node'])->nid;
		$area_node = node_load($area);
		
		if(isset($area_node->field_geo_location['und']['0']['lat']) && !empty($area_node->field_geo_location['und']['0']['lat'])):
			print '<div class="hide main-lat">' . $area_node->field_geo_location['und']['0']['lat'] . '</div>';
		endif;
		
		if(isset($area_node->field_geo_location['und']['0']['lon']) && !empty($area_node->field_geo_location['und']['0']['lon'])):
			print '<div class="hide main-lon">' . $area_node->field_geo_location['und']['0']['lon'] . '</div>';
		endif;
	}
?>

<!-------------------------------------------------------- Directory -------------------------------------------------------->
<?php if($node->type =='directory_categories'): ?>
	<!-- GET ACTUAL LINK -->
	<?php 
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$url_part = explode('/', $actual_link);
	?>
	<!-- Check array -->
	<?php /* print_r($node->field_area_details); */ ?>
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
			<div class="border-bottom-grey">
				<ul class="bg-white uppercase custom-nav-bars nav nav-tabs align-center font-size-12 no-padding" role="tablist">
					<li class="active"><a href="<?php print  $base_url . '/' . $path ;?>">Global</a></li>
					<?php
						$items = field_get_items('node', $node, 'field_category_tab');
						foreach ($items as $item) :
					?>
						<?php if ($item['value'] == "2"): ?>
							<li><a href="<?php print  $base_url . '/' . $path . '/media' . '/' . $new_url_title; ?>">Magazine</a></li>
						<?php endif;?>
						<?php if ($item['value'] == "3"): ?>
							<li><a href="<?php print  $base_url . '/' . $path . '/professionals' . '/' . $new_url_title; ?>">Professionals</a></li>
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
			
			<div class="bg-white border-radius-3 box-shadow">
				<?php if(!empty($node->field_title['und']['0']['value'])): ?>
					<?php $title_field = trim(render($node->field_title['und']['0']['value'])); ?>
					<?php
						$str_replace_title = str_replace($old_str, $new_str, $title_field);
						$new_title = substr($str_replace_title, strpos($str_replace_title, $title_field));
					?>

				<h1 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30"><?php print $new_title; ?></h1>
				<?php endif; ?>
				<?php if(!empty($node->body)): ?>
					<?php $description_field = trim(render($node->body['und'][0]['value'])); ?>
					<?php
						$str_replace_description = str_replace($old_str, $new_str, $description_field);
						$new_description = substr($str_replace_description, strpos($str_replace_description, $description_field));
					?>
					<div class="padding-30"><?php print $new_description; ?></div>
				<?php endif; ?>
				<div class="padding-15 jump-nav-area">
					<div class="row clearfix align-center">
						<div class="col-md-3 col-centered no-float align-left">
							<?php
								$block = module_invoke('views', 'block_view', 'view_block-country_jump_nav');
								print render($block['content']);
							?>
							<br>
						</div>
					</div>
				</div>
			</div>
			<br>
			<br>
			<br>

			<?php
				$block = module_invoke('views', 'block_view', 'directory-featured_listing_deals_experiences');
				if ($block):
			?>
				<div class="row clearfix">
					<div class="col-md-9 col-sm-9 col-xs-9"><h3 class="no-margin font-alt font-size-24 fw-600">Latest Listings for Experiences</h3></div>
					<div class="col-md-3 col-sm-3 col-xs-3 align-right"><a href="<?php print  $base_url . '/' . $path . '/experience'  . '/' . $new_url_title ;?>" class="fw-600">See All <i class="fa fa-angle-double-right"></i></a></div>
				</div>
				<br>
				<div class="padding-15 no-padding-bottom"><?php print render($block['content']); ?></div>
				<br>
				<div class="border-bottom-custom"></div>
				<br>
				<br>
				<br>
			<?php endif; ?>

			
			<?php
				$block = module_invoke('views', 'block_view', 'directory-featured_listing_sale');
				if ($block):
			?>	
				<div class="row clearfix">
					<div class="col-md-9 col-sm-9 col-xs-9"><h3 class="no-margin font-alt font-size-24 fw-600">Latest Listings for Sale</h3></div>
					<div class="col-md-3 col-sm-3 col-xs-3 align-right"><a href="<?php print  $base_url . '/' . $path . '/for-sale' . '/' . $new_url_title ;?>" class="fw-600">See All <i class="fa fa-angle-double-right"></i></a></div>
				</div>
				<br>
				<?php print render($block['content']); ?>
				<br>
				<div class="border-bottom-custom"></div>
				<br>
				<br>
				<br>
			<?php endif; ?>
			<?php
				$block = module_invoke('views', 'block_view', 'directory-featured_listing_rent');
				if ($block):
			?>
				<div class="row clearfix">
					<div class="col-md-9 col-sm-9 col-xs-9"><h3 class="no-margin font-alt font-size-24 fw-600">Latest Listings for Rent</h3></div>
					<div class="col-md-3 col-sm-3 col-xs-3 align-right"><a href="<?php print  $base_url . '/' . $path . '/for-rent' . '/' . $new_url_title ;?>" class="fw-600">See All <i class="fa fa-angle-double-right"></i></a></div>
				</div>
				<br>
				<?php print render($block['content']); ?>
				<br>
				<div class="border-bottom-custom"></div>
				<br>
				<br>
				<br>
			<?php endif; ?>
			
			<?php
				$block = module_invoke('views', 'block_view', 'directory-featured_pro');
				if ($block):
			?>
				<div class="row clearfix">
					<div class="col-md-9 col-sm-9 col-xs-9"><h3 class="no-margin font-alt font-size-24 fw-600">Latest Professionals</h3></div>
					<div class="col-md-3 col-sm-3 col-xs-3 align-right"><a href="<?php print  $base_url . '/' . $path . '/professionals' . '/' . $new_url_title; ?>" class="fw-600">See All <i class="fa fa-angle-double-right"></i></a></div>
				</div>
				<br>
				<?php print render($block['content']); ?>
				<br>
				<div class="border-bottom-custom"></div>
				<br>
				<br>
				<br>
			<?php endif; ?>

			<?php
				$block = module_invoke('views', 'block_view', 'directory-latest_article');
				if ($block):
			?>
				<div class="row clearfix">
					<div class="col-md-9 col-sm-9 col-xs-9"><h3 class="no-margin font-alt font-size-24 fw-600">Latest News</h3></div>
					<div class="col-md-3 col-sm-3 col-xs-3 align-right"><a href="<?php print  $base_url . '/' . $path . '/media' . '/' . $new_url_title; ?>" class="fw-600">See All <i class="fa fa-angle-double-right"></i></a></div>
				</div>
				<br>
				<div class="align-center"><?php print render($block['content']); ?></div>
				<br>
				<div class="border-bottom-custom"></div>
				<br>
				<br>
				<br>
			<?php endif; ?>
			<?php if(!empty($node->field_middle_content)): ?>
				<div class="bg-white border-radius-3 box-shadow">
					<?php $middle_content_field = trim(render($node->field_middle_content['und'][0]['value'])); ?>
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
			<?php if(!empty($node->field_lower_content)): ?>
				<div class="bg-white border-radius-3 box-shadow">
					<?php $lower_content_field = trim(render($node->field_lower_content['und'][0]['value'])); ?>
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

			<?php
				$block = module_invoke('views', 'block_view', 'article_unique_content-area_category');
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
	<?php else: ?>
		<?php drupal_goto('page-404'); ?>
	<?php endif; ?>
<?php endif; ?>
<!-------------------------------------------------------- End of Directory -------------------------------------------------------->


<!-------------------------------------------------------- Sub Directory -------------------------------------------------------->
<?php if($node->type =='directory_sub_categories'): ?>
	<?php 
		// GET the link
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		
		// Split the string into an array using a delimiter
		$url_part = explode('/', $actual_link);

		$parent_category_nid = $node->field_pro_parent_category['und'][0]['target_id']; 
		$parent_category = node_load($parent_category_nid);

	?>
	<?php if(!empty($view->style_plugin->rendered_fields)): ?>
		<div class="bg-white align-center padding-30 border-bottom-grey">
			<h2 class="no-margin fw-600 padding-10 no-padding-top no-padding-left no-padding-right"><?php print($parent_category->title); ?></h2>
			<?php
				/* $block = module_invoke('menu', 'block_view', 'menu-category');
				$menu = '';
				$menuItems = menu_tree_page_data('menu-category'); 
				foreach($menuItems as $key => $m) {
				   if ($m['link']['in_active_trail'] && $menuItems[$key]['below']) {
				       $menu = menu_tree_output($menuItems[$key]['below']);
				   }
				} */
			?>
			<!-- <div><?php /* print render($block['content']); */ ?></div> -->
		</div>
		<?php if(!empty($parent_category->field_category_tab['und'][0]['value'])): ?>
			<div class="border-bottom-grey">
				<ul class="bg-white uppercase custom-nav-bars nav nav-tabs align-center font-size-12 no-padding" role="tablist">
					<li <?php print(($url_part[5] == "global") ? 'class="active"' : ''); ?>><a href="<?php print  $base_url . '/' . $parent_path ;?>">Global</a></li>
					<?php
						$items = field_get_items('node', $parent_category, 'field_category_tab');
						foreach ($items as $item) :
					?>
						<?php if ($item['value'] == "2"): ?>
							<li <?php print(($url_part[5] == "media") ? 'class="active"' : ''); ?>><a href="<?php print  $base_url . '/' . $parent_path . '/media' . '/' . $new_url_title ;?>">Magazine</a></li>
						<?php endif;?>
						<?php if ($item['value'] == "3"): ?>
							<li <?php print(($url_part[5] == "professionals") ? 'class="active"' : ''); ?>><a href="<?php print  $base_url . '/' . $parent_path . '/professionals' . '/' . $new_url_title ;?>">Professionals</a></li>
						<?php endif;?>
						<?php if ($item['value'] == "4"): ?>
							<li <?php print(($url_part[5] == "for-sale") ? 'class="active"' : ''); ?>><a href="<?php print  $base_url . '/' . $parent_path . '/for-sale' . '/' . $new_url_title ;?>">For Sale</a></li>
						<?php endif;?>
						<?php if ($item['value'] == "5"): ?>
							<li <?php print(($url_part[5] == "for-rent") ? 'class="active"' : ''); ?>><a href="<?php print  $base_url . '/' . $parent_path . '/for-rent' . '/' . $new_url_title ;?>">For Rent</a></li>
						<?php endif;?>
						<?php if ($item['value'] == "6"): ?>
							<li <?php print(($url_part[5] == "real-estate") ? 'class="active"' : ''); ?>><a href="<?php print  $base_url . '/' . $parent_path . '/real-estate' . '/' . $new_url_title ;?>">Real Estate</a></li>
						<?php endif;?>
						<?php if ($item['value'] == "7"): ?>
							<li <?php print(($url_part[5] == "experience" || $url_part[5] == "experiences") ? 'class="active"' : ''); ?>><a href="<?php print  $base_url . '/' . $parent_path . '/experience' . '/' . $new_url_title ;?>">Experiences</a></li>
						<?php endif;?>
						<?php if ($item['value'] == "8"): ?>
							<li <?php print(($url_part[5] == "events") ? 'class="active"' : ''); ?>><a href="<?php print  $base_url . '/' . $parent_path . '/events' . '/' . $new_url_title ;?>">Agenda</a></li>
						<?php endif;?>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
		<br>
		<div class="container">
			<?php 
				$breadcrumb = module_invoke("views", "block_view", "view_block-breadcrumbs_sub_directory");
				print render($breadcrumb['content']);
			?>
			<br>
			<br>
			<div class="row clearfix row-eq-height">
				<div class="col-md-3 js-sticky-container">
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
						$items = field_get_items('node', $node, 'field_category_tab');
						foreach ($items as $item) :
					?>
						<!-- Professional -->
						<?php if ($item['value'] == "3"): ?>
							<?php
								$block = module_invoke('views', 'block_view', 'directory-pro_sub_category_country_link');
								if ($block):
							?>
								<div class="bg-white border-radius-3 box-shadow">
									<div class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">Type of Professional</div>
									<div class="padding-15"><ul class="arrow-ul"><?php print render($block['content']); ?></ul></div>
								</div>
								<br>
								<br>
								<br>
							<?php endif; ?>
						<?php endif;?>
						<!-- End of professional -->
						<!-- For Sale -->
						<?php if ($item['value'] == "4"): ?>
							<?php
								$block = module_invoke('views', 'block_view', 'directory-sale_sub_category_country_link');
								if ($block):
							?>
								<div class="bg-white border-radius-3 box-shadow">
									<div class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">Type of Buy & Sell</div>
									<div class="padding-15"><ul class="arrow-ul"><?php print render($block['content']); ?></ul></div>
								</div>
								<br>
								<br>
								<br>
							<?php endif; ?>
						<?php endif;?>
						<!-- End of for sale -->
						<!-- For Rent -->
						<?php if ($item['value'] == "5"): ?>
							<?php
								$block = module_invoke('views', 'block_view', 'directory-rent_sub_category_country_link');
								if ($block):
							?>
								<div class="bg-white border-radius-3 box-shadow">
									<div class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">Type of Rental</div>
									<div class="padding-15"><ul class="arrow-ul"><?php print render($block['content']); ?></ul></div>
								</div>
								<br>
								<br>
								<br>
							<?php endif; ?>
						<?php endif;?>
						<!-- End of for rent -->
						<!-- Experiences -->
						<?php if ($item['value'] == "7"): ?>
							<?php
								$block = module_invoke('views', 'block_view', 'directory-country_experience_sub_category_link');
								if ($block):
							?>
								<div class="bg-white border-radius-3 box-shadow">
									<div class="font-size-24 no-margin font-alt fw-600 border-bottom-grey padding-15">Type of Experiences</div>
									<div class="padding-15"><ul class="arrow-ul"><?php print render($block['content']); ?></ul></div>
								</div>
								<br>
								<br>
							<?php endif; ?>
						<?php endif;?>
						<!-- End of Experiences -->
					</div>
				</div>
				<div class="col-md-9">
					<div class="bg-white border-radius-3 box-shadow">
						<?php if(!empty($node->field_title[LANGUAGE_NONE][0]['value'])): ?>
							<?php 
								$title_field = trim(render($node->field_title[LANGUAGE_NONE][0]['value'])); 
								$str_replace_title = str_replace($old_str, $new_str, $title_field);
								$new_title = substr($str_replace_title, strpos($str_replace_title, $title_field));
							?>
							<h1 class="no-margin font-alt align-center font-size-24 fw-600 border-bottom-grey padding-15">
								<?php print $new_title; ?>
							</h1>
						<?php endif; ?>
						<?php if(!empty($node->body)): ?>
							<?php 
								$description_field = trim(render($node->body[LANGUAGE_NONE][0]['value'])); 
								$str_replace_description = str_replace($old_str, $new_str, $description_field);
								$new_description = substr($str_replace_description, strpos($str_replace_description, $description_field));
							?>
							<div class="padding-15"><?php print $new_description; ?></div>
						<?php endif; ?>
						<!-- <div class="padding-15 jump-nav-area">
							<div class="row clearfix align-center">
								<div class="col-md-3 col-centered no-float align-left">
									<?php
										$country_jump_navblock = module_invoke('views', 'block_view', 'view_block-country_jump_nav');
										if($country_jump_navblock):
											print render($country_jump_navblock['content']);
										endif;	
									?>
								</div>
							</div>
						</div> -->
					</div>
					<br>
					<br>
					<br>
					<?php endforeach; ?>
					<?php if(!empty($node->field_category_tab)): ?>
						<?php 
							$items = field_get_items('node', $node, 'field_category_tab');
							foreach ($items as $item) :
						?>
							<!-- Professional -->
							<?php if ($item['value'] == "3"): ?>
								<?php
									$block = module_invoke('views', 'block_view', 'directory-pro_sub_directory');
									if ($block):
								?>
									<?php print render($block['content']); ?>
									<br>
								<?php endif; ?>
							<?php endif; ?>
							<!-- End of professional -->
							<!-- For sale -->
							<?php if ($item['value'] == "4"): ?>
								<?php
									$block = module_invoke('views', 'block_view', 'directory-area_sale_sub_directory');
									if ($block):
								?>
									<?php print render($block['content']); ?>
									<br>
								<?php endif; ?>
								<?php
									$additional_directory_block = module_invoke('views', 'block_view', 'directory-area_addl_sale_sub_category');
									if ($additional_directory_block):
										print render($additional_directory_block['content']); 
									endif; 
								?>
							<?php endif;?>
							<!-- End of for sale -->
							<!-- For rent -->
							<?php if ($item['value'] == "5"): ?>
								<?php
									$block = module_invoke('views', 'block_view', 'directory-area_rent_sub_directory');
									if ($block):
								?>
									<?php print render($block['content']); ?>
									<br>
								<?php endif; ?>
								<!-- Additional For rent category -->
								<?php
									$additional_directory_block = module_invoke('views', 'block_view', 'directory-area_addl_rent_sub_category');
									if ($additional_directory_block):
										print render($additional_directory_block['content']); 
									endif; 
								?>
								<!-- End of additional For rent category -->
							<?php endif;?>
							<!-- End of for rent -->

							<!-- Experiences -->
							<?php if ($item['value'] == "7"): ?>
								<?php
									$block = module_invoke('views', 'block_view', 'directory-area_experience_sub_directory');
									if ($block):
								 		print render($block['content']);
									endif; 
								?>

								<!-- Additional experience category -->
								<?php
									$additional_directory_block = module_invoke('views', 'block_view', 'directory-area_addl_experience_sub_category');
									if ($additional_directory_block):
								?>
									<!-- <h3 class="no-margin font-alt font-size-24 fw-600">Other Experiences</h3>
									<br> -->
									<?php print render($additional_directory_block['content']); ?>	
								<?php endif; ?>
								<!-- End of additional experience category -->

							<?php endif;?>
							<!-- End of Experiences -->
						<?php endforeach; ?>
					<?php endif; ?>

					<?php if(!empty($node->field_middle_content)): ?>
						<div class="bg-white border-radius-3 box-shadow">
							<?php $middle_content_field = trim(render($node->field_middle_content['und'][0]['value'])); ?>
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
					<?php if(!empty($node->field_lower_content)): ?>
						<div class="bg-white border-radius-3 box-shadow">
							<?php $lower_content_field = trim(render($node->field_lower_content['und'][0]['value'])); ?>
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
					<?php
						$block = module_invoke('views', 'block_view', 'field_collection-country_content');
						if ($block):
					?>
						<div class="bg-white border-radius-3 box-shadow">
							<div class="padding-15"><?php print render($block['content']); ?></div>
						</div>
						<br>
						<br>
						<br>
					<?php endif; ?>
					<?php
						$block = module_invoke('views', 'block_view', 'field_collection-area_content');
						if ($block):
					?>
						<div class="bg-white border-radius-3 box-shadow">
							<div class="padding-15"><?php print render($block['content']); ?></div>
						</div>
						<br>
						<br>
						<br>
					<?php endif; ?>
					<?php
						$block = module_invoke('views', 'block_view', 'article_unique_content-area_sub_category');
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
					<?php /*
						$country_block = module_invoke('views', 'block_view', 'directory-country_area_directory_link');
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
				</div>
			</div>
		</div>
	<?php else: ?>
		<?php drupal_goto('page-404'); ?>
	<?php endif; ?>
<?php endif; ?>
<!-------------------------------------------------------- End of Sub Directory -------------------------------------------------------->


<!-------------------------------------------------------- Professional -------------------------------------------------------->
<?php if($node->type =='professionals'): ?>
	<?php
		$image_default_uri = "public://LXVAnonDefaultImage.jpg";
		$image_banner_default = image_style_url($img_style, $image_default_uri);
		// Brand image banner
		$image_banner =  !empty($node->field_thumbnail) ? image_style_url($img_style, $node->field_thumbnail[LANGUAGE_NONE][0]['uri']) : $image_banner_default;
		$logo_default = image_style_url($img_style_logo_small, $image_default_uri);
		// Brand logo
		$logo_small = !empty($node->field_logo) ? image_style_url($img_style_logo_small, $node->field_logo[LANGUAGE_NONE][0]['uri']) : $logo_default;	
		// Country
		$country = !empty($view_fields) ? $view_fields[0]['title_1'] : basename($_SERVER['HTTP_REFERER']);
	?>
	<?php if(!empty($view->style_plugin->rendered_fields)): ?>
		<div class="row-eq-height clearfix">
			<div class="col-md-6 no-padding">
				<div class="full-width">
					<div class="field field-name-field-thumbnail field-type-image field-label-hidden">
						<?php

							if(!empty($node->field_professional_video['und'][0]['value']) && isset($node->field_professional_video['und'][0]['value'])):

								$video_link = $node->field_professional_video['und'][0]['value'];
								$parse_video = parse_url($video_link);
								$pattern_one = "/vimeo/";
								$pattern_two = "/youtube/";
								$check_if_vimeo = preg_match($pattern_one, $parse_video['host']);
								$check_if_youtube = preg_match($pattern_two, $parse_video['host']);

								if($check_if_youtube == true):
									
									if(!empty($parse_video['query'])):
										$youtube_parameter = $parse_video['query'];
										parse_str($youtube_parameter, $param);
										$youtube_id = $param['v'];
										$youtube_link = "https://www.youtube.com/embed/" . $param['v'];
									else:
										$youtube_explode = explode("/", $video_link);
										$youtube_id = end($youtube_explode);
										$youtube_link = $video_link;
									endif;

							?>
							<div class="video-container">
								<iframe src="<?php print $youtube_link; ?>?rel=0&autoplay=1&mute=1&controls=1&loop=1&showinfo=0&playsinline=1&playlist=<?php print $youtube_id; ?>" frameborder="0" allow="autoplay; fullscreen; encrypted-media" allowfullscreen="true" class="gallery_video" allowfullscreen></iframe>
							</div>
							<?php

								/* elseif($check_if_vimeo == true):

							?>
								<div class="video-container">
									<iframe src="<?php print render($node->field_video_link['und'][0]['value']); ?>?autoplay=1&controls=0&output=embed" frameborder="0" allow="autoplay; fullscreen; encrypted-media" allowfullscreen="true" class="gallery_video"></iframe>
								</div>
							<?php  */

								else:
									print "<img src=". $image_banner .">";
								endif;
								
							else:
								print "<img src=". $image_banner .">";
							endif;

						?>
					</div>
				</div>
			</div>
			<div class="col-md-6 no-padding column-vertical-align bg-white align-center border-bottom-grey">
				<div class="padding-30">
					<?php if(!empty($node->field_logo)): ?>
						<div class="padding-10 no-padding-top no-padding-left no-padding-right"><img src="<?php print $logo_small; ?>" /></div>
						<br>
					<?php endif; ?>
					<h1 class="no-margin padding-10 uppercase no-padding-top no-padding-left no-padding-right display-inline-block fw-600"><?php print($node->title); ?> <?php print $country; ?></h1>
					<?php if(!empty($node->field_sub_category_connected)): ?>
						<div class="uppercase font-size-12 font-size-10-sm letter-spacing-3 padding-10 no-padding-top no-padding-left no-padding-right fw-600">
							<?php
								$field_sub_category_connected_items = field_get_items('node', $node, 'field_sub_category_connected');

								foreach ($field_sub_category_connected_items as $item) :
									$val_sub_category = $item['target_id'];
									$node_sub_category = node_load($val_sub_category);
									$title_sub_category = $node_sub_category->title;
									$sub_value_array[] = $title_sub_category;
								endforeach;
								$sub_category_val = implode(', ', $sub_value_array);
								print $sub_category_val;
							?>
						</div>
					<?php endif; ?>
					<?php if(!empty($node->field_website)) : ?>
						<div class="fw-600 padding-10 no-padding-top no-padding-left no-padding-right">
							<?php 
								$http_string = array("https://", "http://");
								$web_link = str_replace($http_string, "", $node->field_website['und'][0]['value']);
							?>
							<a href="http:\\<?php print trim($web_link); ?>" target="_blank" rel="nofollow"><i class="fas fa-fw fa-globe"></i> Website</a>
						</div>
					<?php endif; ?>
					<div>
						<a class="btn btn-mod btn-medium btn-round scroll" href="#inquire">
							<i class="fa fa-fw fa-envelope-o"></i> Message Now
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="border-bottom-grey">
			<ul class="bg-white uppercase custom-nav-bars nav nav-tabs align-center font-size-12 no-padding" role="tablist">
				<li class="active"><a href="<?php print  $base_url . '/' . $path;?>">Global</a></li>
				<li><a href="<?php print  $base_url . '/' . $path . '/media' . '/' . $new_url_title; ?>">Magazine</a></li>
				<?php 
				
					if(isset($node->field_premium_professional['und'][0]['value']) && !empty($node->field_premium_professional['und'][0]['value'])):
						if($node->field_premium_professional['und'][0]['value'] == 1):
				?>
					<li><a href="<?php print  $base_url . '/' . $path . '/affiliate-business'; ?>">Affiliated Business</a></li>
				<?php 
						endif;
					endif;
				?>
				<li><a href="<?php print  $base_url . '/' . $path . '/for-sale' . '/' . $new_url_title; ?>">For Sale</a></li>
				<li><a href="<?php print  $base_url . '/' . $path . '/for-rent' . '/' . $new_url_title; ?>">For Rent</a></li>
				<li><a href="<?php print  $base_url . '/' . $path . '/travels' . '/' . $new_url_title; ?>">Experiences</a></li>
				<li><a href="<?php print  $base_url . '/' . $path . '/events' . '/' . $new_url_title; ?>">Events Agenda</a></li>
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
			<div class="bg-white border-radius-3 box-shadow">
				<h2 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30">About <?php print($node->title);?> <?php print $country; ?></h2>
				<div class="padding-30">
					<?php if((!empty($node->field_pro_parent_category)) || (!empty($node->field_heritage)) || (!empty($node->field_year)) || (!empty($node->field_brand_name))) : ?>
						<?php if(!empty($node->field_pro_parent_category)) : ?>
							<div class="padding-5 no-padding-left no-padding-right no-padding-top">Category: 
								<span class="fw-600">
									<?php 
										$items = field_get_items('node', $node, 'field_pro_parent_category');
										if(!empty($items)):
											foreach ($items as $item) {
												$val_category = $item['target_id'];
												$node_category = node_load($val_category);
												$cat_path_alias = drupal_get_path_alias('node/' . $val_category);
												$title_category = $node_category->title;
												$cat_value_array[] = "<a href='". $base_url . "/" . $cat_path_alias ."' target='_blank'>" . $title_category . "</a>";
											}

											$main_categories = implode(', ', $cat_value_array);
										endif;
		
										$sub_items = field_get_items('node', $node, 'field_sub_category_connected');
										if(!empty($sub_items)):
											foreach ($sub_items as $sub_item) {
												$val_sub_category = $sub_item['target_id'];
												$node_sub_category = node_load($val_sub_category);
												$node_sub_path_alias = drupal_get_path_alias('node/' . $val_sub_category);
												$title_sub_category = $node_sub_category->title;
												$sub_value_array_2[] = "<a href='". $base_url . "/" . $node_sub_path_alias ."' target='_blank'>" . $title_sub_category . "</a>";
											}
											
											$sub_categoriess = implode(', ', $sub_value_array_2);
										endif;

										if(!empty($main_categories) && !empty($sub_categoriess)){
											print $main_categories . " - " . $sub_categoriess;
										}elseif(!empty($main_categories)){
											print $main_categories;
										}
									?>
								</span>
							</div>
						<?php  endif; ?>
						<?php if(!empty($node->field_brand_name)) : ?>
							<div class="padding-5 no-padding-left no-padding-right no-padding-top">Brand Name: <span class="fw-600"><?php print render($node->field_brand_name[LANGUAGE_NONE][0]['value']); ?></span></div>
						<?php endif; ?>
						<?php if(!empty($node->field_heritage)) : ?>
							<div class="padding-5 no-padding-left no-padding-right no-padding-top">Heritage: 
								<span class="fw-600">
									<?php
										$field_heritage_items = field_get_items('node', $node, 'field_heritage');

										foreach ($field_heritage_items as $item) :
											$val_category = $item['target_id'];
											$node_category = node_load($val_category);
											$title_category = $node_category->title;
											$field_heritage[] = $title_category;
										endforeach;

										print implode(', ', $field_heritage); 
									?>
								</span>
							</div>
						<?php endif; ?>
						<?php if(!empty($node->field_year)) : ?>
							<div class="padding-5 no-padding-left no-padding-right no-padding-top">Established: <span class="fw-600"><?php print $node->field_year[LANGUAGE_NONE][0]['value']; ?></span></div>
						<?php endif; ?>
					<?php endif; ?>
					<?php if(!empty($node->body)) : ?>
						<div>
							<?php 
								$node_wiki = render($node->body[LANGUAGE_NONE][0]['value']);
								$old_keyword = ["@COUNTRY"];
								$new_keyword   = ['worldwide'];
								$new_wiki = str_ireplace($old_keyword, $new_keyword, $node_wiki); 
								print $new_wiki; 
							?>
						</div>
					<?php endif; ?> 
				</div>
			</div>
			<br>
			<br>
			<br>
			<?php
				$official_experience = module_invoke('views', 'block_view', 'professional-feature_official_experience');
				$unofficial_experience = module_invoke('views', 'block_view', 'professional-feature_unofficial_experience');
			?>
			<?php if($official_experience || $unofficial_experience): ?>
				<div>
					<div class="no-margin font-alt font-size-24 fw-600">Latest Experiences</div>
					<br>
					<?php print render($official_experience['content']); ?>
					<?php print render($unofficial_experience['content']); ?>
				</div>
				<br>
			<?php endif; ?>
			<?php
				$official_marketplace = module_invoke('views', 'block_view', 'professional-feature_official_marketplace');
				$unofficial_marketplace = module_invoke('views', 'block_view', 'professional-feature_unofficial_marketplace');
			?>
			<?php if($official_marketplace || $unofficial_marketplace): ?>
				<div>
					<div class="no-margin font-alt font-size-24 fw-600">Latest For Sale</div>
					<br>
					<?php print render($official_marketplace['content']); ?>
					<?php print render($unofficial_marketplace['content']); ?>
				</div>
				<br>
			<?php endif; ?>
			<?php
				$official_rental = module_invoke('views', 'block_view', 'professional-feature_official_rental');
				$unofficial_rental = module_invoke('views', 'block_view', 'professional-feature_unofficial_rental');
			?>
			<?php if($official_rental || $unofficial_rental): ?>
				<div>
					<div class="no-margin font-alt font-size-24 fw-600">Latest For Rent</div>
					<br>
					<?php print render($official_rental['content']); ?>
					<?php print render($unofficial_rental['content']); ?>
				</div>
				<br>
			<?php endif; ?>
			
			<?php
				$official_article = module_invoke('views', 'block_view', 'professional-latest_article_official');
				$unofficial_article = module_invoke('views', 'block_view', 'professional-latest_article_unofficial');
			?>
			<?php  if($official_article || $unofficial_article): ?>
				<div>
					<h3 class="no-margin font-alt font-size-24 fw-600">Latest Magazine</h3>
					<br>
					<?php print render($official_article['content']); ?>
					<?php print render($unofficial_article['content']); ?>
				</div>
				<br>
			<?php endif; ?>
			<?php
				/* $official_event = module_invoke('views', 'block_view', 'professional-feature_official_event');
				$unofficial_event = module_invoke('views', 'block_view', 'professional-feature_unofficial_event');
			?>
			<?php if($official_event || $unofficial_event): ?>
				<div>
					<div class="no-margin font-alt font-size-24 fw-600">Latest Events</div>
					<br>
					<?php print render($official_event['content']); ?>
					<?php print render($unofficial_event['content']); ?>
				</div>
				<br>
			<?php endif; */ ?>
			<?php 
				$feature_details = module_invoke('views', 'block_view', 'field_collection-featured_details');
				if(!empty($feature_details)) : 
			?>
				<div class="bg-white border-radius-3 box-shadow">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">Highlights</h3>
					<?php 
						print render($feature_details['content']); 
					?>
				</div>
				<br>
				<br>
				<br>
			<?php endif; ?>
			<?php if(!empty($node->field_elfsight_instagram)) : ?>
				<div class="bg-white border-radius-3 no-padding-top box-shadow">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30">Instagram</h3>
					<div class="padding-30 no-padding-bottom"><?php print render($node->field_elfsight_instagram[LANGUAGE_NONE][0]['value']); ?></div>
				</div>
				<br>
				<br>
				<br>
			<?php endif; ?>
			<?php if(!empty($node->field_elfsight_facebook)) : ?>
				<div class="bg-white border-radius-3 box-shadow">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30">Facebook</h3>
					<div class="padding-30"><?php print render($node->field_elfsight_facebook[LANGUAGE_NONE][0]['value']); ?></div>
				</div>
				<br>
				<br>
				<br>
			<?php endif; ?>
			<?php if(!empty($node->field_elfsight_youtube)) : ?>
				<div class="bg-white border-radius-3 box-shadow">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30">Youtube</h3>
					<div class="padding-10"><?php print render($node->field_elfsight_youtube[LANGUAGE_NONE][0]['value']); ?></div>
				</div>
				<br>
				<br>
				<br>
			<?php endif; ?>
			<?php 
				$block = module_invoke('views', 'block_view', 'gallery-gallery_grid');
				if(!empty($node->field_images)) : 
			?>
				<div class="bg-white border-radius-3 box-shadow">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30">Gallery</h3>
					<div class="padding-30">
						<?php
							print render($block['content']);
						?>
					</div>
				</div>
				<br>
				<br>
				<br>
			<?php endif; ?>
			<!-- Contact Us Entity Form -->
			<div class="bg-white padding-15 border-radius-3 box-shadow">
				<div id="inquire">
					<div class="row clearfix align-center">
						<div class="col-md-10 col-centered no-float align-left">
							<div class="padding-30 no-padding-left no-padding-right">
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
			<br>
			<br>
			<br>
			<!-- End of Contact Us Entity Form -->
			<?php if((!empty($node->field_current_models)) || (!empty($node->field_description))) : ?>
				<div class="bg-white border-radius-3 box-shadow">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30"><?php print($node->title);?>'s Famous Brand Models</h3>
					<div class="padding-30">
						<?php 
							if(!empty($node->field_current_models[LANGUAGE_NONE][0]['value'])) : 
							 	print render($node->field_current_models[LANGUAGE_NONE][0]['value']);
						 	endif;
							
							if(!empty($node->field_description[LANGUAGE_NONE][0]['value'])) : 
								$descript = render($node->field_description[LANGUAGE_NONE][0]['value']);
								
								if($descript):
									$description_field = trim($descript);
									$str_replace_field_description = str_replace($old_str, $new_str, $description_field);
									print substr($str_replace_field_description, strpos($str_replace_field_description, $description_field));
								endif;

							endif;
						?>
					</div>
				</div>
				<br>
				<br>
				<br>
			<?php endif; ?>
			<?php if(!empty($node->field_premium_professional)): ?>
				<?php if($node->field_premium_professional['und'][0]['value'] == 1): ?>
					<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
						<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30">Philippines</h3>
						<div class="padding-30">
							<div class="font-size-18"><a href="<?php print $base_url . '/' . $path . '/philippines'; ?>">Go to Philippines page <i class="fa fa-angle-double-right"></i></a></div>
							<br>
							<div class="row clearfix">
								<div class="col-md-3"><a href="<?php print $base_url . '/' . $path . '/manila'; ?>">Manila</a></div>
								<div class="col-md-3"><a href="<?php print $base_url . '/' . $path . '/cebu-city'; ?>">Cebu</a></div>
							</div>
						</div>
					</div>
					<br>
					<br>
					<br>
				<?php endif; ?>
			<?php endif; ?>
			<?php
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
			<?php endif; ?>

			<?php /*
				$city_tags = module_invoke('views', 'block_view', 'directory-country_area_directory_link');
				if (!empty($city_tags)):
			?>
				<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30">City Tags</h3>
					<div class="padding-30"><?php print render($city_tags['content']); ?></div>
				</div>
				<br>
				<br>
				<br>
			<?php endif; */ ?>
		</div>
	<?php else: ?>
		<?php drupal_goto('page-404'); ?>
	<?php endif; ?>
<?php endif; ?>
<!-------------------------------------------------------- End of Professional -------------------------------------------------------->