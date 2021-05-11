<?php
	global $base_url;
	global $user;
	$path = drupal_get_path_alias('node/' . $node->nid);
	$current_alias = drupal_get_path_alias('node/' . $node->nid);
	$super_admin = array_intersect(array('administrator'), array_values($user->roles));
	$admin = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
	$img_style = 'full_width_banner';
	$image_default_uri = "public://LXVAnonDefaultImage.jpg";
	$image_banner_default = image_style_url($img_style, $image_default_uri);
	if(!empty($content['field_image'])) {
		$image_banner = image_style_url($img_style, $node->field_image[LANGUAGE_NONE][0]['uri']);
	}
	$feature_details = module_invoke('views', 'block_view', 'field_collection-featured_details');
	$page_alias = drupal_get_path_alias('node/' . $node->nid);
	$actual_link = $base_url. '/' . $page_alias;
	$img_style_gallery = 'image_gallery';
	$image_thumbnail_default = image_style_url($img_style_gallery, $image_default_uri);
	if(!empty($node->field_thumbnail)) {
		$thumbnail = image_style_url($img_style_gallery, $node->field_thumbnail[LANGUAGE_NONE][0]['uri']);
	}

?>
<?php if (empty($admin) ? FALSE : TRUE) : ?>
	<div class="position-fixed z-index-above no-right">
		<div class="align-center padding-20">
			<div class="inline-block">
				<a class="btn btn-mod btn-deep-sky-blue btn-small btn-circle scroll" target="_blank" href="<?php print $base_url; ?>/node/<?php print $node->nid; ?>/edit">Edit Page</a> | <a class="btn btn-mod btn-small btn-circle scroll" target="_blank" href="<?php print $base_url; ?>/node/<?php print $node->nid; ?>/delete">Delete Page</a>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="row-eq-height clearfix">
	<div class="col-md-6 no-padding">

		<?php
			if(!empty($node->field_video_link['und'][0]['value'])):

				$video_link = $node->field_video_link['und'][0]['value'];
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
						<iframe src="<?php print $youtube_link; ?>?autoplay=1&mute=1&controls=1&loop=1&playlist=<?php print $youtube_id; ?>" frameborder="0" allow="autoplay; fullscreen; encrypted-media" allowfullscreen="true" class="gallery_video"></iframe>
					</div>
				<?php else: ?>
					<?php if(!empty($node->field_thumbnail)): ?>
						<img src="<?php print $thumbnail; ?>" />
					<?php else: ?>
						<img src="<?php print $image_banner_default; ?>" />
					<?php endif; ?>
				<?php endif; ?>
			<?php else: ?>
				<?php if(!empty($node->field_thumbnail)): ?>
					<img src="<?php print $thumbnail; ?>" />
				<?php else: ?>
					<img src="<?php print $image_banner_default; ?>" />
				<?php endif; ?>
			<?php endif; ?>
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
		<li class="active"><a href="<?php print  $base_url . '/' . $path ;?>">Home</a></li>
		<li><a href="<?php print  $base_url . '/' . $path . '/media'; ?>">News</a></li>
		<li><a href="<?php print  $base_url . '/' . $path . '/professionals'; ?>">Dealers</a></li>
		<li><a href="<?php print  $base_url . '/' . $path . '/for-sale'; ?>">For Sale</a></li>
		<li><a href="<?php print  $base_url . '/' . $path . '/for-rent'; ?>">For Rent</a></li>
		<li><a href="<?php print  $base_url . '/' . $path . '/experience'; ?>">Experiences</a></li>
		<!--<li><a href="<?php print  $base_url . '/' . $path . '/#'; ?>">Request</a></li>
		<li><a href="<?php print  $base_url . '/' . $path . '/events'; ?>">Events Agenda</a></li>-->
	</ul>
</div>
<br>
<div class="container">
	<?php 
		$breadcrumb = module_invoke("views", "block_view", "view_block-breadcrumbs_listings");
		print render($breadcrumb['content']);
	?>
	<br>
	<br>
	<div class="row clearfix row-eq-height">
		<div class="col-md-3 col-md-push-9 js-sticky-container full-width-btn">
			<?php if(isMobile()): ?>
				<div class="bg-white border-radius-3">
					<div class="padding-15">
						<?php
							$side_single_variant = module_invoke('views', 'block_view', 'field_collection-sidebar_single_variant_price');
							
							if($side_single_variant):
						?>
							<?php print render($side_single_variant['content']); ?>
						<?php else: ?>
							<div class="padding-10 no-padding-left no-padding-right">
								<div class="font-size-20 fw-600">Price on Request</div>
							</div>
						<?php endif; ?>	
						<div class="align-center font-size-10 uppercase fw-600">Agent Commission Offered: <?php print render($content['field_commission_rate']); ?>%</div>
						<br>
					</div>
				</div>
				<br>
			<?php else: ?>
				<div class="js-sticky">
					<div class="bg-white border-radius-3">
						<div class="padding-15">
							<?php
								$side_single_variant = module_invoke('views', 'block_view', 'field_collection-sidebar_single_variant_price');
								
								if($side_single_variant):
							?>
								<?php print render($side_single_variant['content']); ?>
							<?php else: ?>
								<div class="padding-10 no-padding-left no-padding-right">
									<div class="font-size-20 fw-600">Price on Request</div>
								</div>
							<?php endif; ?>	
							<div class="align-center font-size-10 uppercase fw-600">Agent Commission Offered: <?php print render($content['field_commission_rate']); ?>%</div>
							<br>

							<?php
								$author = module_invoke('views', 'block_view', 'professional-short_bio');
								if($author):
							?>
								<div class="padding-10">
									<?php print render($author['content']); ?>
								</div>
							<?php endif; ?>
							<div class="padding-10 no-padding-left no-padding-right">
								<h3 class="no-margin text-center fw-600 padding-5 no-padding-top no-padding-left no-padding-right font-size-16">Inquire Now</h3>
								<?php
									$block = module_invoke('entityform_block', 'block_view', 'inquire');
									if ($block):
										print render($block['content']);
									endif; 
								?>
							</div>
						</div>
					</div>
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
					<br>
				</div>
			<?php endif; ?>
			
		</div>
		<div class="col-md-9 col-md-pull-3">
			<div class="bg-white padding-40 border-radius-3">
				<div class="align-center">
					<div class="no-margin padding-5 no-padding-left no-padding-right font-alt font-size-24 fw-500"><?php print($title);?></div>
				</div>			

				<?php if(!empty($content['body'])) : ?>
					<div class="font-size-14 padding-20 no-padding-left no-padding-right no-padding-bottom">
						<h3 class="no-margin fw-bold uppercase font-size-14">Description</h3>
						<br>
						<?php print render($content['body']); ?>
					</div>
				<?php endif; ?>

			</div>
			<br>
			<br>
			<?php if(isMobile()): ?>
				<div class="bg-white border-radius-3">
					<div class="padding-15">
						<?php
							$author = module_invoke('views', 'block_view', 'professional-short_bio');
							if($author):
						?>
							<div class="padding-10">
								<?php print render($author['content']); ?>
							</div>
						<?php endif; ?>
						<div class="padding-10 no-padding-left no-padding-right">
							<h3 class="no-margin text-center fw-600 padding-5 no-padding-top no-padding-left no-padding-right font-size-16">Inquire Now</h3>
							<?php
								$block = module_invoke('entityform_block', 'block_view', 'inquire');
								if ($block):
									print render($block['content']);
								endif; 
							?>
						</div>
					</div>
				</div>
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
			<?php endif; ?>
			<?php if(!empty($content['field_professionals_connected'])) : ?>
				<h3 class="no-margin font-alt font-size-24 fw-600 padding-20 no-padding-left no-padding-right">Official Dealers</h3>
				<br>
				<div>
					<?php
						$block = module_invoke('views', 'block_view', 'models_projects-latest_professional');
						print render($block['content']);
					?>
				</div>
				<br>
			<?php endif; ?>

			<?php if(!empty($feature_details)) : ?>
				<div class="bg-white border-radius-3">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-20">Highlights</h3>
					<?php print render($feature_details['content']); ?>
				</div>
				<br>
				<br>
				<br>
			<?php endif; ?>

			<?php
				$variant_packages = module_invoke('views', 'block_view', 'field_collection-variant_packages');
				if(!empty($variant_packages)):
			?>
				<div>
					<h3 class="no-margin font-alt font-size-24 fw-600">Variants</h3>
					<br>
					<?php print render($variant_packages['content']); ?>
				</div>
				<br>
				<div class="border-bottom-custom"></div>
				<br>
				<br>
			<?php endif; ?>

			<?php if(!empty($content['field_terms_and_conditions_multi'])) : ?>
				<div class="bg-white border-radius-3">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">Terms & Conditions</h3>
					<div class="item-list padding-40 no-padding-top no-padding-bottom">
						<div class="padding-10">
							<ul class="bullet-ul">
								<?php
									$items = field_get_items('node', $node, 'field_terms_and_conditions_multi');
									if(!empty($items)):
									foreach ($items as $item):
								?>
									<li><?php print $item['value']; ?></li>
									<?php endforeach;?>
								<?php endif;?>
							</ul>
						</div>
					</div>
				</div>
				<br>
				<br>
				<br>
			<?php endif; ?>
			<?php
				$block = module_invoke('views', 'block_view', 'models_projects-latest_news');
			?>
			<?php if(!empty($block)) : ?>
				<h3 class="no-margin font-alt font-size-24 fw-600 padding-20 no-padding-left no-padding-right">Latest News</h3>
				<br>
				<div>
					<?php print render($block['content']); ?>
				</div>
				<br>
			<?php endif; ?>

			<?php if(!empty($content['field_images'])) : ?>
				<h3 class="no-margin font-alt font-size-24 fw-600 align-center padding-20">Gallery</h3>
				<br>
				<div class="align-center">
					<?php
						$block = module_invoke('views', 'block_view', 'gallery-gallery_grid');
						print render($block['content']);
					?>
				</div>
				<br>
				<br>
				<br>
			<?php endif; ?>
		</div>
	</div>
</div>