<?php
	global $base_url;
	global $user;
	$path = drupal_get_path_alias('node/' . $node->nid);
	$current_alias = drupal_get_path_alias('node/' . $node->nid);
	$admin = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
	$img_style = 'full_width_banner';
	$image_default_uri = "public://LXVAnonDefaultImage.jpg";
	$image_banner_default = image_style_url($img_style, $image_default_uri);
	
	$parent_category_nid = $node->field_pro_parent_category['und'][0]['target_id']; 
	$parent_category = node_load($parent_category_nid);
	
	if(!empty($parent_category->field_image['und'][0]['uri'])) {
		$image_banner = image_style_url($img_style, $parent_category->field_image['und'][0]['uri']);
	}

	$parent_path = drupal_get_path_alias('node/' . $parent_category->nid);

	/* $old_str = [" in @AREA,", " @AREA,", " in @AREA", " @AREA", " @COUNTRY"];
	$new_str = ["", "", "", "", ""]; */
	$current_year = date("Y");
	$old_str = [" in @AREA,", " @AREA,", " in @AREA", " @AREA", " in @COUNTRY", " @COUNTRY", " @YEAR", "@YEAR"];
	$new_str = ["", "", "", "", "", "", " $current_year", "$current_year"];

	// Get the actual link
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$url_part = explode('/', $actual_link);
?>

<div class="bg-white align-center padding-30 border-bottom-grey">
	<h2 class="no-margin fw-600"><?php print($parent_category->title);?></h2>
</div>
<?php if(!empty($parent_category->field_category_tab['und'][0]['value'])): ?>
	<div class="border-bottom-grey">
		<ul class="bg-white uppercase custom-nav-bars nav nav-tabs align-center font-size-12 no-padding" role="tablist">
			<li><a href="<?php print  $base_url . '/' . $parent_path ;?>">Home</a></li>
			<?php 
				$items = field_get_items('node', $parent_category, 'field_category_tab');
				foreach ($items as $item) :
			?>
				<?php if ($item['value'] == "2"): ?>
					<li><a href="<?php print  $base_url . '/' . $parent_path . '/media' ;?>">Magazine</a></li>
				<?php endif;?>
				<?php if ($item['value'] == "3"): ?>
					<?php if(!empty($url_part[5])): ?>
						<?php if($url_part[5] == "professionals"): ?>
							<li class="active"><a href="<?php print  $base_url . '/' . $parent_path . '/professionals' ;?>">Professionals</a></li>
						<?php else: ?>
							<li><a href="<?php print  $base_url . '/' . $parent_path . '/professionals' ;?>">Professionals</a></li>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif;?>
				<?php if ($item['value'] == "4"): ?>
					<?php if(!empty($url_part[5])): ?>
						<?php if($url_part[5] == "for-sale"): ?>
							<li class="active"><a href="<?php print  $base_url . '/' . $parent_path . '/for-sale' ;?>">For Sale</a></li>
						<?php else: ?>
							<li><a href="<?php print  $base_url . '/' . $parent_path . '/for-sale' ;?>">For Sale</a></li>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif;?>
				<?php if ($item['value'] == "5"): ?>
					<?php if(!empty($url_part[5])): ?>
						<?php if($url_part[5] == "for-rent"): ?>
							<li class="active"><a href="<?php print  $base_url . '/' . $parent_path . '/for-rent' ;?>">For Rent</a></li>
						<?php else: ?>
							<li><a href="<?php print  $base_url . '/' . $parent_path . '/for-rent' ;?>">For Rent</a></li>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif;?>
				<?php if ($item['value'] == "6"): ?>
					<li><a>Real Estate</a></li>
				<?php endif;?>
				<?php if ($item['value'] == "7"): ?>
					<?php if(!empty($url_part[5])): ?>
						<?php if($url_part[5] == "experience" || $url_part[5] == "experiences"): ?>
							<li class="active"><a href="<?php print  $base_url . '/' . $parent_path . '/experience' ;?>">Experiences</a></li>
						<?php else: ?>
							<li><a href="<?php print  $base_url . '/' . $parent_path . '/experience' ;?>">Experiences</a></li>
						<?php endif;?>
					<?php endif; ?>
				<?php endif;?>
				<?php if ($item['value'] == "8"): ?>
					<?php if(!empty($url_part[5])): ?>
						<?php if($url_part[5] == "events"): ?>
							<li class="active"><a href="<?php print  $base_url . '/' . $parent_path . '/events' ;?>">Agenda</a></li>
						<?php else: ?>
							<li><a href="<?php print  $base_url . '/' . $parent_path . '/events' ;?>">Agenda</a></li>
						<?php endif;?>
					<?php endif; ?>
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
		<div class="col-12 col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3 js-sticky-container">
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
				<?php if(!empty($content['field_category_tab'])) : ?>
					<?php 
						$items = field_get_items('node', $node, 'field_category_tab');
						foreach ($items as $item) :
					?>
						<!-- Professional -->
						<?php if ($item['value'] == "3"): ?>
							<?php
								$block = module_invoke('views', 'block_view', 'directory-pro_sub_category_link');
								if ($block):
							?>
								<div class="bg-white border-radius-3 box-shadow box-shadow">
									<div class="font-size-24 no-margin font-alt fw-600 border-bottom-grey padding-15">Type of Professional</div>
									<div class="padding-15"><ul class="arrow-ul"><?php print render($block['content']); ?></ul></div>
								</div>
								<br>
								<br>
							<?php endif; ?>
						<?php endif;?>
						<!-- End of professional -->
						<!-- For Sale -->
						<?php if ($item['value'] == "4"): ?>
							<?php
								$block = module_invoke('views', 'block_view', 'directory-sale_sub_category_link');
								if ($block):
							?>
								<div class="bg-white border-radius-3 box-shadow box-shadow">
									<div class="font-size-24 no-margin font-alt fw-600 border-bottom-grey padding-15">Type of Buy & Sell</div>
									<div class="padding-15"><ul class="arrow-ul"><?php print render($block['content']); ?></ul></div>
								</div>
								<br>
								<br>
							<?php endif; ?>
						<?php endif;?>
						<!-- End of for sale -->
						<!-- For Rent -->
						<?php if ($item['value'] == "5"): ?>
							<?php
								$block = module_invoke('views', 'block_view', 'directory-rent_sub_category_link');
								if ($block):
							?>
								<div class="bg-white border-radius-3 box-shadow">
									<div class="font-size-24 no-margin font-alt fw-600 border-bottom-grey padding-15">Type of Rental</div>
									<div class="padding-15"><ul class="arrow-ul"><?php print render($block['content']); ?></ul></div>
								</div>
								<br>
								<br>
							<?php endif; ?>
						<?php endif;?>
						<!-- End of for rent -->
						<!-- Experiences -->
						<?php if ($item['value'] == "7"): ?>
							<?php
								$block = module_invoke('views', 'block_view', 'directory-experience_sub_category_link');
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
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-xs-12 col-md-9 col-lg-9 col-xl-9">
			<div class="bg-white border-radius-3 box-shadow">
				<?php if(!empty($content['field_title'])) : ?>
					<?php 
						$title_field = trim(render($content['field_title']));
						$str_replace_title = str_replace($old_str, $new_str, $title_field);
						$new_title = substr($str_replace_title, strpos($str_replace_title, $title_field));
					?>
					<h1 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30"><?php print $new_title; ?></h1>
				<?php endif; ?>
				<?php if(!empty($content['body'])) : ?>
					<?php 
						$description_field = trim(render($content['body'])); 
						$str_replace_description = str_replace($old_str, $new_str, $description_field);
						$new_description = substr($str_replace_description, strpos($str_replace_description, $description_field));
					?>
					<div class="padding-30"><?php print $new_description; ?></div>
				<?php endif; ?>
				<!-- <div class="padding-15 jump-nav-area">
					<div class="row clearfix align-center">
						<div class="col-md-3 col-centered no-float align-left">
							<?php
								$block = module_invoke('views', 'block_view', 'view_block-jump_nav');
								print render($block['content']);
							?>
							<br>
						</div>
					</div>
				</div> -->
			</div>
			<br>
			<br>
			<?php if(!empty($content['field_category_tab'])) : ?>
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
					<!-- For Sale -->
					<?php if ($item['value'] == "4"): ?>
						<?php
							$block = module_invoke('views', 'block_view', 'directory-sale_sub_directory');
							if ($block):
						?>
							<?php print render($block['content']); ?>
							<br>
						<?php endif; ?>
						<!-- Additional for sale category -->
						<?php
							$additional_directory_block = module_invoke('views', 'block_view', 'directory-additional_for_sale_sub_category');
							if ($additional_directory_block):
								print render($additional_directory_block['content']);
							endif; 
						?>
						<!-- End of additional for sale category -->
						<br>
						<div class="border-bottom-custom"></div>
						<br>
						<br>
					<?php endif;?>
					<!-- End of for sale -->
					<!-- For rent -->
					<?php if ($item['value'] == "5"): ?>
						<?php
							$block = module_invoke('views', 'block_view', 'directory-rent_sub_directory');
							if ($block):
						?>
							<?php print render($block['content']); ?>
							<br>
						<?php endif; ?>
						<!-- Additional for rent category -->
						<?php
							$additional_directory_block = module_invoke('views', 'block_view', 'directory-additional_for_rent_sub_category');
							if ($additional_directory_block):
								print render($additional_directory_block['content']);
							endif; 
						?>
						<!-- End of additional for rent category -->
						<br>
						<div class="border-bottom-custom"></div>
						<br>
					<?php endif;?>
					<!-- End of for rent -->
					<!-- Experience -->
					<?php if ($item['value'] == "7"): ?>
						<?php
							$block = module_invoke('views', 'block_view', 'directory-experience_sub_directory');
							if ($block):
						?>
							<?php print render($block['content']); ?>
							<br>
						<?php endif; ?>
						<!-- Additional experience category -->
						<?php
							$additional_directory_block = module_invoke('views', 'block_view', 'directory-additional_sub_experience_category');
							if ($additional_directory_block):
						?>
							<?php print render($additional_directory_block['content']); ?>	
						<?php endif; ?>
						<!-- End of additional experience category -->
						<br>
						<div class="border-bottom-custom"></div>
						<br>
					<?php endif;?>
					<!-- End of experience -->
				<?php endforeach; ?>
			<?php endif; ?>
			<?php if(!empty($content['field_middle_content'])) : ?>
				<div class="bg-white border-radius-3 box-shadow">
					<?php $middle_content_field = trim(render($content['field_middle_content'])); ?>
					<?php
						$str_replace_middle_content = str_replace($old_str, $new_str, $middle_content_field);
						$new_middle_content = substr($str_replace_middle_content, strpos($str_replace_middle_content, $middle_content_field));
					?>
					<div class="padding-30"><?php print $new_middle_content; ?></div>
				</div>
				<br>
				<br>
			<?php endif; ?>
			<div class="bg-white border-radius-3 padding-15 box-shadow">
				<div class="row clearfix">
					<div class="col-md-5 col-centered no-float vertical-align-middle">
						<img style="" typeof="foaf:Image" src="https://www.theluxeguide.com/sites/default/files/general/TLGLogoWhite.jpeg" alt="Register at The Luxe Guide" title="">
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
			<?php if(!empty($content['field_lower_content'])) : ?>
				<div class="bg-white border-radius-3 box-shadow">
					<?php $lower_content_field = trim(render($content['field_lower_content'])); ?>
					<?php
						$str_replace_lower_content = str_replace($old_str, $new_str, $lower_content_field);
						$new_lower_content = substr($str_replace_lower_content, strpos($str_replace_lower_content, $lower_content_field));
					?>
					<div class="padding-30"><?php print $new_lower_content; ?></div>
				</div>
				<br>
				<br>
			<?php endif; ?>
			<?php
				$block = module_invoke('views', 'block_view', 'article_unique_content-sub_category');
				if ($block):
			?>
				<?php print render($block['content']); ?>
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
				$country_directory_linkblock = module_invoke('views', 'block_view', 'directory-country_directory_tab_link');
				if ($country_directory_linkblock):
			?>
				<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15 padding-left-30 padding-right-30">Choose a Country</h3>
					<div class="padding-30"><?php print render($country_directory_linkblock['content']); ?></div>
				</div>
				<br>
				<br>
			<?php endif; */ ?>
		</div>
	</div>
</div>