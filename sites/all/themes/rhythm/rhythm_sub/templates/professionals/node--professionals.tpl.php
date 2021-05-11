<?php
	global $base_url;
	global $user;
	$path = drupal_get_path_alias('node/' . $node->nid);
	$current_alias = drupal_get_path_alias('node/' . $node->nid);
	$admin = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
	$img_style = 'image_gallery';
	$image_default_uri = "public://LXVAnonDefaultImage.jpg";
	$image_banner_default = image_style_url($img_style, $image_default_uri);
	if(!empty($content['field_image'])) {
		$image_banner = image_style_url($img_style, $node->field_image[LANGUAGE_NONE][0]['uri']);
	}
	$img_style_logo_small = 'professional_logo';
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

	$old_str = [" in @AREA,", " @AREA,", " in @AREA", " @AREA", " in @COUNTRY", " @COUNTRY"];
	$new_str = ["", "", "", "", "", ""];

?>
<?php if (empty($admin) ? FALSE : TRUE) : ?>
	<div class="position-fixed z-index-above no-right">
		<div class="align-center padding-20">
			<div class="inline-block">
				<a class="btn btn-mod btn-deep-sky-blue btn-small btn-circle scroll" target="_blank" href="<?php print $base_url; ?>/node/<?php print $node->nid; ?>/edit">Edit Page</a>
			</div>
		</div>
	</div>
<?php endif; ?>
<div class="row-eq-height clearfix">
	<div class="col-md-6 no-padding">
		<div class="full-width">
		<?php

			if(!empty($node->field_professional_video['und'][0]['value'])):

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
					if(!empty($content['field_thumbnail'])):
						print render($content['field_thumbnail']);
					else:
						print "<img src=". $image_banner_default .">";
					endif; 
				endif;
				
			else:
				if(!empty($content['field_thumbnail'])):
					print render($content['field_thumbnail']);
				else:
					print "<img src=". $image_banner_default .">";
				endif; 
			endif;

		?>
		</div>
	</div>
	<div class="col-md-6 no-padding column-vertical-align bg-white align-center border-bottom-grey">
		<div class="padding-20">
			<?php if(!empty($content['field_logo'])) : ?>
				<div><img src="<?php print $logo_small; ?>" /></div>
				<br>
			<?php endif; ?>
			<h1 class="no-margin padding-10 uppercase no-padding-top no-padding-left no-padding-right display-inline-block fw-600"><?php print($title); ?></h1>
			<?php if(!empty($content['field_sub_category_connected'])): ?>
				<div class="uppercase font-size-12 font-size-10-sm letter-spacing-3 padding-10 no-padding-top no-padding-left no-padding-right fw-600">
					<?php
						$items = field_get_items('node', $node, 'field_sub_category_connected');
						foreach ($items as $item) {
							$val_sub_category = $item['target_id'];
							$node_sub_category = node_load($val_sub_category);
							$title_sub_category = $node_sub_category->title;
							$sub_value_array[] = $title_sub_category;
						}
						$sub_category_val = implode(', ', $sub_value_array);
						print $sub_category_val;
					?>
				</div>
			<?php endif; ?>
			<?php if(!empty($node->field_website)) : ?>
				<?php 
					$http = array("https://", "http://");
					$web_link = str_replace($http, "", $node->field_website['und'][0]['value']);
				?>
				<div class="fw-600 padding-10 no-padding-top no-padding-left no-padding-right"><a href="http:\\<?php print trim($web_link); ?>" rel="nofollow" target="_blank"><i class="fas fa-fw fa-globe"></i> Website</a></div>
			<?php endif; ?>
			<div><a class="btn btn-mod btn-medium btn-round scroll" href="#inquire"><i class="fa fa-fw fa-envelope-o"></i> Message Now</a></div>
		</div>
	</div>
</div>
<div class="border-bottom-grey">
	<ul class="bg-white uppercase custom-nav-bars nav nav-tabs align-center font-size-12 no-padding" role="tablist">
		<li class="active"><a href="<?php print  $base_url . '/' . $path ;?>">Home</a></li>
		<li><a href="<?php print  $base_url . '/' . $path . '/media'; ?>">Magazine</a></li>
		<?php 
			if(isset($node->field_premium_professional['und'][0]['value']) && !empty($node->field_premium_professional['und'][0]['value'])):
				if($node->field_premium_professional['und'][0]['value'] == 1): 
		?>
			<li><a href="<?php print  $base_url . '/' . $path . '/affiliate-business'; ?>">Affiliated Business</a></li>
		<?php 
				endif;
			endif; 
		?>
		<li><a href="<?php print  $base_url . '/' . $path . '/for-sale'; ?>">For Sale</a></li>
		<li><a href="<?php print  $base_url . '/' . $path . '/for-rent'; ?>">For Rent</a></li>
		<li><a href="<?php print  $base_url . '/' . $path . '/experience'; ?>">Experiences</a></li>
		<li><a href="<?php print  $base_url . '/' . $path . '/events'; ?>">Events Agenda</a></li>
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
		<div class="padding-30">
			<h2 class="no-margin font-alt font-size-24 fw-600">About <?php print($title);?></h2>
			<?php if((!empty($content['field_pro_parent_category'])) || (!empty($content['field_heritage'])) || (!empty($content['field_year'])) || (!empty($content['field_brand_name']))) : ?>
				<br>
				<?php if(!empty($content['field_pro_parent_category'])) : ?>
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
				<?php endif; ?>
				<?php if(!empty($content['field_brand_name'])) : ?>
					<div class="padding-5 no-padding-left no-padding-right no-padding-top">Brand Name: <span class="fw-600"><?php print render($content['field_brand_name']); ?></span></div>
				<?php endif; ?>
				<?php if(!empty($content['field_heritage'])) : ?>
					<div class="padding-5 no-padding-left no-padding-right no-padding-top">Heritage: <span class="fw-600"><?php print render($content['field_heritage']); ?></span></div>
				<?php endif; ?>
				<?php if(!empty($content['field_year'])) : ?>
					<div class="padding-5 no-padding-left no-padding-right no-padding-top">Established: <span class="fw-600"><?php print render($content['field_year']); ?></span></div>
				<?php endif; ?>
			<?php endif; ?>
			<?php if(!empty($content['body'])) : ?>
				<br>
				<?php 
					$node_wiki = render($content['body']);
					$old_keyword = ["@COUNTRY"];
					$new_keyword   = ['worldwide'];
					$new_wiki = str_ireplace($old_keyword, $new_keyword, $node_wiki); 
					print $new_wiki;
				?>
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
    <?php if($official_article || $unofficial_article): ?>
		<div>
			<div class="no-margin font-alt font-size-24 fw-600">Latest Magazine</div>
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
	<?php if(!empty($content['field_feature_details'])) : ?>
		<div class="bg-white border-radius-3 box-shadow">
			<div class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">Highlights</div>
			<?php print render($feature_details['content']); ?>
		</div>
		<br>
		<br>
		<br>
	<?php endif; ?>
	<?php if(!empty($content['field_elfsight_instagram'])) : ?>
		<div class="no-margin font-alt font-size-24 fw-600">Instagram</div>
		<br>
		<div><?php print render($content['field_elfsight_instagram']['#items'][0]['value']); ?></div>
		<br>
	<?php endif; ?>
	<?php if(!empty($content['field_elfsight_facebook'])) : ?>
		<div class="no-margin font-alt font-size-24 fw-600">Facebook</div>
		<br>
		<div><?php print render($content['field_elfsight_facebook']['#items'][0]['value']); ?></div>
		<br>
		<br>
		<br>
	<?php endif; ?>
	<?php if(!empty($content['field_elfsight_youtube'])) : ?>
		<div class="no-margin font-alt font-size-24 fw-600">Youtube</div>
		<br>
		<div><?php print render($content['field_elfsight_youtube']['#items'][0]['value']); ?></div>
		<br>
		<br>
		<br>
	<?php endif; ?>
	<?php if(!empty($content['field_images'])) : ?>
		<div class="no-margin font-alt font-size-24 fw-600">Gallery</div>
		<br>
		<?php
			$block = module_invoke('views', 'block_view', 'gallery-gallery_grid');
			print render($block['content']);
		?>
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
	<?php if((!empty($content['field_current_models'])) || (!empty($content['field_description']))) : ?>
		<div class="bg-white border-radius-3 box-shadow">
			<div class="padding-30">
				<div class="no-margin font-alt font-size-24 fw-600"><?php print($title);?>'s Famous Brand Models</div>
				<br>
				<?php if(!empty($content['field_current_models'])) : ?>
					<?php 
						$models_field = trim(render($content['field_current_models']));
						$str_replace_field_models = str_replace($old_str, $new_str, $models_field);
						$new_field_models = substr($str_replace_field_models, strpos($str_replace_field_models, $models_field));
						print $new_field_models;
					?>
					<?php print render($content['field_current_models']); ?>
				<?php endif; ?>
				<?php if(!empty($content['field_description'])) : ?>
					<?php 
						$description_field = trim(render($content['field_description']));
						$str_replace_field_description = str_replace($old_str, $new_str, $description_field);
						$new_field_description = substr($str_replace_field_description, strpos($str_replace_field_description, $description_field));
						print $new_field_description;
					?>
				<?php endif; ?>
			</div>
		</div>
		<br>
		<br>
		<br>
	<?php endif; ?>
	<?php if(!empty($content['field_premium_professional'])) : ?>
		<?php if($node->field_premium_professional['und'][0]['value'] == 1): ?>
			<?php
				$block = module_invoke('views', 'block_view', 'directory-ph_country_area_directory_link');
				if ($block):
			?>
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
	<?php endif; ?>
	<?php if(!empty($content['field_premium_professional'])) : ?>
		<?php if($node->field_premium_professional['und'][0]['value'] == 1): ?>
			<?php if(!empty($content['field_country_area'])) : ?>
				<?php
					$block = module_invoke('views', 'block_view', 'professional-country_links');
					if ($block):
				?>
					<div class="bg-white no-padding-bottom border-radius-3 box-shadow">
						<div class="padding-30">
							<div class="no-margin font-alt font-size-24 fw-600">Choose a Country</div>
							<br>
							<?php print render($block['content']); ?>
						</div>
					</div>
					<br>
					<br>
					<br>
				<?php endif; ?>
			<?php endif; ?>	
		<?php endif; ?>	
	<?php endif; ?>	
</div>