<?php
	global $base_url;
	global $user;
	$path = drupal_get_path_alias('node/' . $node->nid);
	$current_alias = drupal_get_path_alias('node/' . $node->nid);
	$admin = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
	$img_style = 'full_width_banner';
	$image_default_uri = "public://LXVAnonDefaultImage.jpg";
	$image_banner_default = image_style_url($img_style, $image_default_uri);
	if(!empty($content['field_image'])) {
		$image_banner = image_style_url($img_style, $node->field_image[LANGUAGE_NONE][0]['uri']);
	}
	$img_style_logo_small = 'small';
	$image_logo_default = image_style_url($img_style_logo_small, $image_default_uri);
	if(!empty($content['field_logo'])) {
		$logo_small = image_style_url($img_style_logo_small, $node->field_logo[LANGUAGE_NONE][0]['uri']);
	}
	$feature_details = module_invoke('views', 'block_view', 'field_collection-featured_details');
	$referer = $_SERVER['HTTP_REFERER'];
	$page_alias = drupal_get_path_alias('node/' . $node->nid);
	$actual_link = $base_url. '/' . $page_alias;

	if(($referer == $actual_link) || (empty($referer))){
		$referer = $base_url . '/luxury-directory';
	}
?>



<?php 
	$brand_nid = $node->field_global_professional[LANGUAGE_NONE][0]['target_id']; 
	$brand = node_load($brand_nid);
	$brand_alias = drupal_get_path_alias('node/' . $brand_nid);

	$field_type_of_product_brand = field_info_field('field_pro_parent_category');
	$type_of_product_brand_items = field_get_items('node', $brand, 'field_pro_parent_category');
	if(!empty($type_of_product_brand_items)){
		foreach ($type_of_product_brand_items as $item) {
			$category_node = node_load($item['target_id']);
			$type_of_product_brand_array[] = $category_node->title;
		}
		$ref_type_of_prod_brand = implode(", " , $type_of_product_brand_array);
	}

	$field_country_origin = field_info_field('field_country_text');
	$field_country_origin_items = field_get_items('node', $brand, 'field_country_text');
	if(!empty($field_country_origin_items)){
		foreach ($field_country_origin_items as $item) {
			$country_origin_array[] = $item['value'];
		}
		$ref_country_origin = implode(", " , $country_origin_array);
	
	}


	$field_year_creation = field_info_field('field_year');
	$field_year_creation_items = field_get_items('node', $brand, 'field_year');
	if(!empty($field_year_creation_items)){
		foreach ($field_year_creation_items as $item) {
			$ref_year_creation = $item['value'];
		}
	}

	$field_website = field_info_field('field_website');
	$field_website_items = field_get_items('node', $brand, 'field_website');
	if(!empty($field_website_items)){
		foreach ($field_website_items as $item) {
			$ref_website = $item['value'];
		}
	}

	$field_brand_body_items = field_get_items('node', $brand, 'body');
	if(!empty($field_brand_body_items)){
		foreach ($field_brand_body_items as $item) {
			$ref_brand_body = $item['value'];
		}
	}

	$field_brand_general_body_items = field_get_items('node', $brand, 'field_description');
	if(!empty($field_brand_general_body_items)){
		foreach ($field_brand_general_body_items as $item) {
			$ref_brand_general_body = $item['value'];
		}
	}

	$url = explode('/', $path);
	$country = basename($path);
	array_pop($url);
	$strip_url = implode('/', $url); 
?>


<?php /* if (empty($admin) ? FALSE : TRUE) : ?>
	<div class="position-fixed z-index-above no-right">
		<div class="align-center padding-20">
			<div class="inline-block">
				<a class="btn btn-mod btn-deep-sky-blue btn-small btn-circle scroll" target="_blank" href="<?php print $base_url; ?>/node/<?php print $node->nid; ?>/edit">Edit Page</a>
			</div>
		</div>
	</div>
<?php endif; */ ?>


<?php if(!empty($brand->field_image[LANGUAGE_NONE][0]['uri'])): ?>
	<?php $image_banner = image_style_url($img_style, $brand->field_image[LANGUAGE_NONE][0]['uri']); ?>
	<div class="full-width festive-filter padding-100 padding-60-sm no-padding-left no-padding-right align-center page-section bg-scroll banner-section" style="background-image: url(<?php print $image_banner; ?>);">
		<div class="container">
			<div class="col-md-6 col-centered no-float bg-white-opacity padding-40">
				<h1 class="no-margin padding-10 no-padding-top no-padding-left no-padding-right display-inline-block fw-600">
					<?php print $node->title . " " . ucfirst($country); ?>
				</h1>
				<div class="uppercase font-size-12 font-size-10-sm letter-spacing-3">
					<span class="fw-600">Professional</span>
				</div>
			</div>
		</div>
	</div>
	<?php else: ?>
	<div class="full-width festive-filter padding-100 padding-60-sm no-padding-left no-padding-right align-center page-section bg-scroll banner-section" style="background-image: url(<?php print $image_banner_default; ?>);">
		<div class="container">
			<div class="col-md-6 col-centered no-float bg-white-opacity padding-40">
				<h1 class="no-margin padding-10 no-padding-top no-padding-left no-padding-right display-inline-block fw-600">
					<?php print $node->title . " " . ucfirst($country); ?>
				</h1>
				<div class="uppercase font-size-12 font-size-10-sm letter-spacing-3">
					<span class="fw-600">Professional</span>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<div class="border-bottom-grey border-top-grey">
	<ul class="bg-white uppercase custom-nav-bars nav nav-tabs align-center font-size-12 no-padding" role="tablist">
		<li class="active"><a href="<?php print  $base_url . '/' . $path; ?>">Home</a></li>
		<li><a href="<?php print  $base_url . '/' . $strip_url . '/' . $country . '/media'; ?>">Magazine</a></li>
		<li><a href="<?php print  $base_url . '/' . $strip_url . '/' . $country . '/for-sale'; ?>">Buy & Sell</a></li>
		<li><a href="<?php print  $base_url . '/' . $strip_url . '/' . $country . '/for-rent'; ?>">For Rent</a></li>
		<li><a href="<?php print  $base_url . '/' . $strip_url . '/' . $country . '/experience'; ?>">Experiences</a></li>
		<li><a href="<?php print  $base_url . '/' . $strip_url . '/' . $country . '/events'; ?>">Events Agenda</a></li>
	</ul>
</div>
<div class="padding-60 padding-15-sm no-padding-top no-padding-bottom">
	<div class="row clearfix">
		<div class="col-md-9">
			<br>
			<br>
			<div class="bg-white padding-15 border-radius-3">
				<div class="no-margin font-alt font-size-24 fw-600">About <?php print($title);?></div> 
				<?php if((!empty($ref_type_of_prod_brand)) || (!empty($ref_country_origin)) || (!empty($ref_year_creation)) || (!empty($ref_website)) || (!empty($content['field_website']))) : ?>
					<br>
					<?php if(!empty($ref_type_of_prod_brand)) : ?>
						<div class="padding-5 no-padding-left no-padding-right no-padding-top"><span class="fw-600 color-deep-sky-blue">Category:</span> <?php print $ref_type_of_prod_brand; ?></div>
					<?php endif; ?>
					<?php if(!empty($ref_country_origin)) : ?>
						<div class="padding-5 no-padding-left no-padding-right no-padding-top"><span class="fw-600 color-deep-sky-blue">Heritage:</span> <?php print $ref_country_origin; ?></div>
					<?php endif; ?>
					<?php if(!empty($ref_year_creation)) : ?>
						<div class="padding-5 no-padding-left no-padding-right no-padding-top"><span class="fw-600 color-deep-sky-blue">Established:</span> <?php print $ref_year_creation; ?></div>
					<?php endif; ?>
					<?php if((!empty($content['field_website']))): ?>
						<div class="padding-5 no-padding-left no-padding-right no-padding-top"><span class="fw-600 color-deep-sky-blue">Official Website:</span><a href="<?php print render($content['field_website']); ?>" target="blank_" class="color-deep-sky-blue"> Visit <?php print($title);?> Website</a></div>
					<?php else: ?>
						<?php if(!empty($ref_website)) : ?>
							<div class="padding-5 no-padding-left no-padding-right no-padding-top"><span class="fw-600 color-deep-sky-blue">Official Website:</span><a href="<?php print $ref_website; ?>" target="blank_" class="color-deep-sky-blue"> Visit <?php print($title);?> Website</a></div>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
				<?php if(!empty($content['body'])) : ?>
					<div class="align-justify">
						<h2 class="no-margin fw-500 uppercase font-size-18">About <?php print($title);?> <?php print render($content['field_country_area']); ?></h2>
						<br>
						<?php print render($content['body']); ?>
					</div>
				<?php endif; ?>
				<?php if(!empty($ref_brand_body)) : ?>
					<br>
					<div class="align-justify">
						<br>
						<?php 
							$node_country = render($content['field_country_area']);
							$old_keyword = ["@COUNTRY", "'Country'"];
							$new_keyword   = [$node_country, $node_country];
							$new_body = str_ireplace($old_keyword, $new_keyword, $ref_brand_body); 
							print $new_body;
						?>
					</div>
					<br>
				<?php endif; ?>
				<?php if(!empty($ref_brand_general_body)) : ?>
					<div class="align-justify">
						<br>
						<?php 
							$node_country = render($content['field_country_area']);
							$old_keyword = ["@COUNTRY", "'Country'"];
							$new_keyword   = [$node_country, $node_country];
							$new_general_body = str_ireplace($old_keyword, $new_keyword, $ref_brand_general_body); 
								print $new_general_body;
						?>
					</div>
					<br>
				<?php endif; ?>
			</div>
			<br>
			<br>
			<?php if(!empty($brand->field_elfsight_instagram[LANGUAGE_NONE][0]['value'])): ?>
				<div class="bg-white padding-15 border-radius-3 no-padding-top">
					<?php print $brand->field_elfsight_instagram[LANGUAGE_NONE][0]['value']; ?>
				</div>
				<br>
				<br>
			<?php endif; ?>
			<?php if(!empty($brand->field_elfsight_facebook[LANGUAGE_NONE][0]['value'])): ?>
				<div class="bg-white padding-15 border-radius-3">
					<?php print $brand->field_elfsight_facebook[LANGUAGE_NONE][0]['value']; ?>
				</div>
				<br>
				<br>
			<?php endif; ?>
			<?php if(!empty($brand->field_elfsight_youtube[LANGUAGE_NONE][0]['value'])): ?>
				<div class="bg-white padding-15 border-radius-3">
					<?php print $brand->field_elfsight_youtube[LANGUAGE_NONE][0]['value']; ?>
				</div>
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
		</div>
		<div class="col-md-3 js-sticky-container">
			<div class="js-sticky">
				<br>
				<br>
				<div class="bg-white padding-10 border-radius-3">
					<div class="column-vertical-align">
						<div class="clearfix align-center">
							<div class="display-inline-block vertical-align-middle">
								<div class="uppercase font-size-14 padding-10 fw-600">Share Now</div>
							</div>
							<div class="display-inline-block vertical-align-middle">
								<?php
									$block = module_invoke('sharethis', 'block_view', 'sharethis_block');
									print render($block['content']);
								?>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="bg-white border-radius-3">
					<div class="clearfix padding-10">
						<div class="display-inline-block vertical-align-middle">
							<?php if(!empty($content['field_logo'])) : ?>
								<img src="<?php print $logo_small; ?>" />
							<?php else: ?>
								<img src="<?php print $image_logo_default ; ?>">
							<?php endif; ?>
						</div>
						<div class="display-inline-block vertical-align-middle padding-5 padding-5-sm">
							<div class="no-margin padding-5 no-padding-top no-padding-left no-padding-right display-inline-block fw-600 font-alt font-size-20"><?php print($title);?></div>
							<div class="uppercase font-size-12 font-size-10-sm letter-spacing-3">
								<span class="color-deep-sky-blue fw-600">Professional</span>
							</div>
						</div>
					</div>
					<?php if(!empty($content['field_website'])) : ?>
						<div class="fw-600 padding-10 border-top-grey"><a href="<?php print render($content['field_website']); ?>" target="_blank"><i class="fas fa-fw fa-globe"></i> Website</a></div>
					<?php endif; ?>
					<?php if(!empty($content['field_contact_number'])) : ?>
						<div class="fw-600 padding-10 border-top-grey"><a class="cursor-pointer" data-toggle="modal" data-target="#contact-number"><i class="fas fa-fw fa-phone"></i> Contact Phone</a></div>
					<?php endif; ?>
					<?php if(!empty($content['field_email'])) : ?>
						<div class="fw-600 padding-10 border-top-grey"><a class="cursor-pointer" data-toggle="modal" data-target="#email"><i class="fas fa-fw fa-envelope"></i> Contact Email</a></div>
					<?php endif; ?>
				</div>
				<br>
				<br>
			</div>
		</div>
	</div>
</div>
<?php if(!empty($content['field_contact_number'])) : ?>
	<div id="contact-number" class="modal fade" role="dialog">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-body rtecenter">
		      	<?php print render($content['field_contact_number']); ?>
		      </div>
		    </div>
		</div>
	</div>
<?php endif; ?>
<?php if(!empty($content['field_email'])) : ?>
	<div id="email" class="modal fade" role="dialog">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-body rtecenter">
		      	<?php print render($content['field_email']); ?>
		      </div>
		    </div>
		</div>
	</div>
<?php endif; ?>