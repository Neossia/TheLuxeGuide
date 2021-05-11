<?php
	global $base_url;
	global $user;
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
	$referer = $_SERVER['HTTP_REFERER'];
	$page_alias = drupal_get_path_alias('node/' . $node->nid);
	$actual_link = $base_url. '/' . $page_alias;

	if(($referer == $actual_link) || (empty($referer))){
		$referer = $base_url . '/luxury-directory';
	}
	$main_category_nid = $node->field_pro_parent_category['und'][0]['target_id'];

	$listing_type_id = $node->field_category_tab['und'][0]['value'];
	
	// This is a temporary solution to change the category name
	if($listing_type_id == 4){
		$category_tab = "For Sale";
	}else{
		$category_tab = $content['field_category_tab'];
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


<div class="clearfix" style="margin-bottom: 15px;">
	<div class="col-md-6 no-padding">
		<?php

			$block = module_invoke('views', 'block_view', 'gallery-gallery_main_image');

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
		<?php

				/* elseif($check_if_vimeo == true):

		?>
				<div class="video-container">
					<iframe src="<?php print render($node->field_video_link['und'][0]['value']); ?>?autoplay=1&controls=0&output=embed" frameborder="0" allow="autoplay; fullscreen; encrypted-media" allowfullscreen="true" class="gallery_video"></iframe>
				</div>
		<?php  */

				else:
					print render($block['content']);
				endif;
				
			else:
				print render($block['content']);
			endif;

		?>
	</div>
	<div class="col-md-6 no-padding">
		<?php
			$block = module_invoke('views', 'block_view', 'gallery-gallery_top_image');
			print render($block['content']);
		?>
	</div>
</div> 

<div class="container">
	<?php 
		$breadcrumb = module_invoke("views", "block_view", "view_block-breadcrumbs_listings");
		print render($breadcrumb['content']);
	?>
	<br>
	<br>
	<div class="row clearfix row-eq-height">
		<div class="col-md-3 col-md-push-9 js-sticky-container full-width-btn">
			<div class="js-sticky">
				<div class="bg-white border-radius-3">
					<div class="padding-15">
						<?php
							$side_single_variant = module_invoke('views', 'block_view', 'field_collection-sidebar_single_variant_price');
							
							if($side_single_variant):
						?>
							<?php print render($side_single_variant['content']); ?>
						<?php else: ?>
							<?php if(!empty($content['field_price'])) : ?>
								<div class="padding-10 no-padding-left no-padding-right align-center">
									<!-- <div class="fw-600">FROM</div> -->
									<?php if(!empty($content['field_price'])) : ?>
										<div class="font-size-20 fw-600"><?php print render($content['field_currency']); ?> <?php print render($content['field_price']); ?></div>
									<?php endif; ?>
									<?php if(!empty($content['field_price_label'])) : ?>
										<div class="fw-600 color-grey"><?php print render($content['field_price_label']); ?></div>
									<?php endif; ?>
								</div>
							<?php else: ?>
								<div class="padding-10 no-padding-left no-padding-right">
									<div class="font-size-20 fw-600">Price on Request</div>
								</div>
							<?php endif; ?>
						<?php endif; ?>	
						<!-- <?php if(!empty($content['field_start_validity'])) : ?>
							<div class="padding-5 no-padding-left no-padding-right">
								<div class="uppercase fw-600"><i class="fas fa-clock"></i> Voucher Validity:</div>
								<div><?php print render($content['field_start_validity']); ?> - <?php print render($content['field_end_validity']); ?></div>
							</div>
						<?php endif; ?> -->
						<?php if(!empty($content['field_number_of_voucher'])) : ?>
							<div class="padding-5 no-padding-left no-padding-right">
								<div class="uppercase fw-600"><i class="fas fa-ticket-alt"></i> Remaining Vouchers:</div>
								<div><?php print render($content['field_number_of_voucher']); ?> Vouchers</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_redeem'])) : ?>
							<div class="padding-5 no-padding-left no-padding-right">
								<div class="uppercase fw-600"><i class="fas fa-file-alt"></i> Redeem:</div>
								<div><?php print render($content['field_redeem']); ?></div>
							</div>
						<?php endif; ?>
						<!-- <br> -->
						<?php
							/* $block = module_invoke('entityform_block', 'block_view', 'inquire');
							if ($block):
						 		print render($block['content']); 
							endif;  */ 
						?>
						<!-- <div>	
							<a class="btn btn-mod btn-medium btn-round full-width scroll" href="#inquire">
								<i class="fa fa-fw fa-envelope-o"></i> Inquire Now
							</a>
						</div> -->
						<!-- <br> -->
					</div>
				</div>
				<br>
				<div class="visible-md-block visible-lg-block visible-xl-block">
					<div class="bg-white border-radius-3">
						<div class="padding-15">
							<?php
								$author = module_invoke('views', 'block_view', 'professional-short_bio');
								if($author):
							?>
							<div class="padding-10">
								<?php print render($category_tab); ?> By:
							</div>
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
							<!-- <?php /* if(!empty($content['field_contact_number'])) : ?>
								<div class="padding-10">
									<a href="tel:<?php print render($content['field_contact_number']); ?>" class="btn btn-mod btn-medium btn-round full-width">
										<span class="fa fa-phone"></span>
										<?php print render($content['field_contact_number']); ?>
									</a>
								</div>
							<?php endif; ?> -->
							<!--<?php if(!empty($content['field_email'])) : ?>
								<div class="padding-10">
									<a class="btn btn-mod btn-medium btn-round full-width" href="mailto:<?php print render($content['field_email']['#items']['0']['email']); ?>">
										<span class="fa fa-fw fa-envelope-o"></span> Send Mail Here
									</a>
								</div>
							<?php endif; */ ?>-->
						</div>
					</div>
					<br>
					<br>
					<?php if(!empty($content['field_redirect'])) : ?>
						<div class="bg-white border-radius-3">
							<h4 class="no-margin font-alt font-size-20 fw-600 border-bottom-grey padding-15 align-center">Book Now</h4>
							<div class="padding-15">
								<?php $redirect_field = trim(render($content['field_redirect'])); ?>
								<a class="btn btn-mod full-width btn-round btn-medium" href="//<?php print $redirect_field; ?>" target="_blank">Go to Website</a>
							</div>
						</div>
						<br>
						<br>
					<?php endif; ?>
					<?php if(!empty($content['field_commission_rate'])) : ?>
						<div class="bg-white border-radius-3">
							<div class="padding-15">
								<div class="inline-block font-size-12 uppercase">Agent Commission Offered:</div>
								<div class="inline-block font-size-24 align-center fw-600">
									<?php print render($content['field_commission_rate']); ?>%
								</div>
							</div>
						</div>
						<br>
						<br>
					<?php endif; ?>
					
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
				<?php
					/* $author = module_invoke('views', 'block_view', 'professional-short_bio');
					if($author): */
				?>
				<!-- <div class="bg-white border-radius-3">
					<div class="padding-15">
						
							<div class="padding-10">
								<?php /* print render($category_tab); ?> By:
							</div>
							<div class="padding-10">
								<?php print render($author['content']); */ ?>
							</div>
						<?php /* if(!empty($content['field_contact_number'])) : ?>
							<div class="padding-10">
								<a href="tel:<?php print render($content['field_contact_number']); ?>" class="btn btn-mod btn-medium btn-round full-width">
									<span class="fa fa-phone"></span>
									<?php print render($content['field_contact_number']); ?>
								</a>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_email'])) : ?>
							<div class="padding-10">
								<a class="btn btn-mod btn-medium btn-round full-width" href="mailto:<?php print render($content['field_email']['#items']['0']['email']); ?>">
									<span class="fa fa-fw fa-envelope-o"></span> Send Mail Here
								</a>
							</div>
						<?php endif; */ ?>
					</div>
				</div>
				<br>
				<br> 
				<?php /* endif; */ ?>
				<?php /* if(!empty($content['field_redirect'])) : ?>
					<div class="bg-white border-radius-3">
						<h4 class="no-margin font-alt font-size-20 fw-600 border-bottom-grey padding-15 align-center">Book Now</h4>
						<div class="padding-15">
							<?php $redirect_field = trim(render($content['field_redirect'])); ?>
							<a class="btn btn-mod full-width btn-round btn-medium" href="//<?php print $redirect_field; ?>" target="_blank">Go to Website</a>
						</div>
					</div>
					<br>
					<br>
				<?php endif; ?>
				<?php if(!empty($content['field_commission_rate'])) : ?>
					<div class="bg-white border-radius-3">
						<div class="padding-15">
							<div class="inline-block font-size-12 uppercase">Agent Commission Offered:</div>
							<div class="inline-block font-size-24 align-center fw-600">
								<?php print render($content['field_commission_rate']); ?>%
							</div>
						</div>
					</div>
					<br>
					<br>
				<?php endif; */ ?>
				
				<div class="bg-white padding-10 border-radius-3">
					<div class="column-vertical-align">
						<div class="clearfix align-center">
							<div class="display-inline-block vertical-align-middle">
								<div class="uppercase font-size-14 padding-10 fw-600">Share Now</div>
							</div>
							<div class="display-inline-block vertical-align-middle">
								<?php
									/* $block = module_invoke('sharethis', 'block_view', 'sharethis_block');
									print render($block['content']); */
								?>
							</div>
						</div>
					</div>
				</div>
				<br>
				<br> -->
			</div>
		</div>
		<div class="col-md-9 col-md-pull-3">
			<div class="bg-white padding-40 border-radius-3">
				<div class="align-center">
					<div class="fw-500">
						<div class="inline-block">
							<?php print render($category_tab); ?> 
						</div>
						<?php if(!empty($content['field_pro_parent_category'])): ?> 
						/ 
						<div class="inline-block">
							<?php print render($content['field_pro_parent_category']); ?>	
						</div>
						<?php endif; ?>
					</div>
					<div class="no-margin padding-5 no-padding-left no-padding-right font-alt font-size-24 fw-500"><?php print($title);?></div>
					<?php if((!empty($content['field_country_area'])) || (!empty($content['field_area']))) : ?>
						<div class="fw-500 italic-font">
							<!-- <i class="fas fa-map-marker-alt"></i> --> 
							<?php if(!empty($content['field_area'])): ?>
								<div class="inline-block"><?php print render($content['field_area']); ?></div>
							<?php endif; ?>
							<?php if((!empty($content['field_country_area'])) && (!empty($content['field_area']))) : ?>
								- 
							<?php endif; ?>
							<?php if(!empty($content['field_country_area'])): ?>
								<div class="inline-block"><?php print render($content['field_country_area']); ?></div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<!-- <div class="fw-500">
						<div class="inline-block">
							<?php /* print render($category_tab); ?>
						</div> 
						| 
						<div class="inline-block">
							<?php print render($content['field_pro_parent_category']) */ ?>	
						</div>
					</div> -->
				</div>
				<!-- EXPERIENCE -->
				<?php if(($listing_type_id == "7")): ?>
					<?php if(!empty($content['field_ref_number'])) : ?>
						<div class="row padding-10 no-padding-top no-padding-bottom">
							<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-500 font-size-12 uppercase">Ref Number: </span>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-600 font-size-12"><?php print render($content['field_ref_number']); ?></span>
							</div> 
						</div>
					<?php endif; ?>
					<?php if(!empty($content['field_number_of_person'])) : ?>
						<div class="row padding-10 no-padding-top no-padding-bottom">
							<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-500 font-size-12 uppercase">Max Number of Person: </span>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-600 font-size-12"><?php print render($content['field_number_of_person']); ?></span>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($content['field_languages_available'])) : ?>
						<div class="row padding-10 no-padding-top no-padding-bottom">
							<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-500 font-size-12 uppercase">Languages Available: </span>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-600 font-size-12"><?php print render($content['field_languages_available']); ?></span>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($content['field_luxury_level'])) : ?>
						<div class="row padding-10 no-padding-top no-padding-bottom">
							<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-500 font-size-12 uppercase">Luxury Level: </span>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-600 font-size-12"><?php print render($content['field_luxury_level']); ?></span>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($content['field_duration_days']) && !empty($content['field_duration_type'])) : ?>
						<div class="row padding-10 no-padding-top no-padding-bottom">
							<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-500 font-size-12 uppercase">Duration: </span>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-600 font-size-12"><?php print render($content['field_duration_days']); ?> <?php print render($content['field_duration_type']); ?></span>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($content['field_departure_area'])) : ?>
						<div class="row padding-10 no-padding-top no-padding-bottom">
							<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-500 font-size-12 uppercase">Departure Point: </span>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-600 font-size-12"><?php print render($content['field_departure_area']); ?></span>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($content['field_arrival_area'])) : ?>
						<div class="row padding-10 no-padding-top no-padding-bottom">
							<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-500 font-size-12 uppercase">Arrival Point: </span>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-600 font-size-12"><?php print render($content['field_arrival_area']); ?></span>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($content['field_visited_area'])) : ?>
						<div class="row padding-10 no-padding-top no-padding-bottom">
							<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-500 font-size-12 uppercase">Visited Area: </span>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-600 font-size-12"><?php print render($content['field_visited_area']); ?></span>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($content['field_pwd_friendly'])) : ?>
						<div class="row padding-10 no-padding-top no-padding-bottom">
							<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-500 font-size-12 uppercase">Wheelchair Accessible: </span>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
								<span class="fw-600 font-size-12"><?php print render($content['field_pwd_friendly']); ?></span>
							</div>
						</div>
					<?php endif; ?>
					
				<!-- EXPERIENCE -->
				
				<!-- Aircraft for Sale -->
				<?php elseif(($main_category_nid == "339152") && ($listing_type_id == "4")): ?>
					<br>
					<div class="clearfix">
						<?php if(!empty($content['field_ref_number'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Ref Number: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_ref_number']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_number_of_passenger'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Number of Passengers: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_number_of_passenger']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_date_last_flight'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Date Last Flight: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_date_last_flight']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_weight_carrying'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Weight Carrying (kg): </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_weight_carrying']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_hours_of_flight'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Hours of Flight: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_hours_of_flight']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_flying_range'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Flying Range (nm): </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_flying_range']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_year'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Year: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_year']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_number_of_engines'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Number of Engines: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_number_of_engines']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_flying_speed'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Flying Speed (kts): </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_flying_speed']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_length'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Length: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_length']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_odometer'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Odometer: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_odometer']); ?> km</span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_condition'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Condition: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_condition']); ?></span>
								</div>
							</div>
						<?php endif; ?>
					</div>
				
				<!-- End Aircraft for Sale --> 

				<!-- Aircraft for Rent -->
				<?php elseif(($main_category_nid == "339152") && ($listing_type_id == "5")): ?>
					<br>
					<div class="clearfix">
						<?php if(!empty($content['field_ref_number'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Ref Number: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_ref_number']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_number_of_passenger'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Number of Passengers: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_number_of_passenger']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_date_last_flight'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Date Last Flight: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_date_last_flight']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_weight_carrying'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Weight Carrying (kg): </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_weight_carrying']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_hours_of_flight'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Hours of Flight: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_hours_of_flight']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_flying_range'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Flying Range (nm): </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_flying_range']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_year'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Year: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_year']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_number_of_engines'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Number of Engines: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_number_of_engines']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_flying_speed'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Flying Speed (kts): </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_flying_speed']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_length'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Length: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_length']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
					</div>
				
				<!-- End Aircraft for Rent --> 
			
				<!-- Car for Sale -->
				<?php elseif(($main_category_nid == "339154") && ($listing_type_id == "4")): ?>
					<br>
					<div class="clearfix">
						<?php if(!empty($content['field_ref_number'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Ref Number: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_ref_number']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_brand_name'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Brand Name: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_brand_name']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_brand_model'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Brand Model: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_brand_model']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_model_year'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Year: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_model_year']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_variant'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Variant: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_variant']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_registration_year'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Registration Year: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_registration_year']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_seating_capacity'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Seating Capacity: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_seating_capacity']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_engine'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Engine: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_engine']); ?>hp</span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_odometer'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Odometer: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_odometer']); ?>km</span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_fuel_type'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Fuel Type: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_fuel_type']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_transmission'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Transmission: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_transmission']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_condition'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Condition: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_condition']); ?></span>
								</div>
							</div>
						<?php endif; ?>
					</div>
				
				<!-- End Car for Rent -->

				<!-- Car for Rent -->
				<?php elseif(($main_category_nid == "339154") && ($listing_type_id == "5")): ?>
					<br>
					<div class="clearfix">
						<?php if(!empty($content['field_ref_number'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Ref Number: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_ref_number']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_brand_name'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Brand Name: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_brand_name']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_brand_model'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Brand Model: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_brand_model']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_model_year'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Model Year: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_model_year']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_year_refit'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Year Refit: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_year_refit']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_units'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Units: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_units']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_seating_capacity'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Seating Capacity: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_seating_capacity']); ?></span>
								</div> 
							</div>
						<?php endif; ?>
					</div>
				
				<!-- End Car for Rent -->

				<!-- Yacht for Sale -->
				<?php elseif(($main_category_nid == "339155") && ($listing_type_id == "4")): ?>
					<br>
					<div class="clearfix">
						<?php if(!empty($content['field_ref_number'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Ref Number: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_ref_number']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_brand_name'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Brand Name: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_brand_name']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_brand_model'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Brand Model: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_brand_model']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_builder'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Builder: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_builder']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_designer'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Designer: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_designer']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_year'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Year: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_year']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_year_refit'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Year Refit: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_year_refit']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_condition'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Condition: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_condition']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_length'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Length: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_length']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_brand_new_availability'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Availability: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_brand_new_availability']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_cruise_speed'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Cruise Speed: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_cruise_speed']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_overnight_capacity'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Overnight Capacity: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_overnight_capacity']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_day_cruise_capacity'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Cruise Capacity: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_day_cruise_capacity']); ?></span>
								</div>
							</div>
						<?php endif; ?>
					</div>
				
				<!-- End Yacht for Sale -->

				<!-- Yacht for Rent -->
				<?php elseif(($main_category_nid == "339155") && ($listing_type_id == "5")): ?>
					<br>
					<div class="clearfix">
						<?php if(!empty($content['field_ref_number'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Ref Number: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_ref_number']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_brand_name'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Brand Name: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_brand_name']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_brand_model'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Brand Model: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_brand_model']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_year'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Year: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_year']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_year_refit'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Year Refit: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_year_refit']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_sleepover_capacity'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Sleepover Capacity: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_sleepover_capacity']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_length'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Length: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_length']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_cruise_speed'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Cruise Speed: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_cruise_speed']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_max_capacity'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Max Capacity: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_max_capacity']); ?></span>
								</div>
							</div>
						<?php endif; ?>
					</div>
				
				<!-- End Yacht for Rent -->

				<!-- Estate for Rent / Sale -->
				<?php elseif(($main_category_nid == "339156")): ?>
					<br>
					<div class="clearfix">
						<?php if(!empty($content['field_ref_number'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Ref Number: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_ref_number']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_land_size'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Land Size: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_land_size']); ?> sqm</span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_floor_aera'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Floor Area: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_floor_aera']); ?> sqm</span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_building'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Number of Buildings: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_building']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_staff_room'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Number of Staff Room: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_staff_room']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_bedroom'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Number of Bedroom: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_bedroom']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_bathroom'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Number of Bathroom: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_bathroom']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_parking'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Number of Parking: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_parking']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_year'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Year Built: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_year']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_renovation_year'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Renovation Year: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_renovation_year']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_beach_length'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Beach Length: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_beach_length']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_car_space'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Car Space: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_car_space']); ?></span>
								</div>
							</div>
						<?php endif; ?>
					</div>
				
				<!-- End Estate for Rent / Sale -->

				<!-- Hotel & Reteates Rent -->
				<?php elseif(($main_category_nid == "339186") && ($listing_type_id == "5")): ?>
					<br>
					<div class="clearfix">
						<?php if(!empty($content['field_ref_number'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Ref Number: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_ref_number']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_bedroom'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Bedroom(s): </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_bedroom']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_bathroom'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Bathrooms: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_bathroom']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_number_of_adult'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Number of Adults: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_number_of_adult']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_number_of_kids'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Number of Kids: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_number_of_kids']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_king_size_bed'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">King Size Bed: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_king_size_bed']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_queen_size_bed'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Queen Size Bed: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_queen_size_bed']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_singe_size_bed'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Single Bed: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_singe_size_bed']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_sofa_bed'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Sofa Bed: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_sofa_bed']); ?></span>
								</div>
							</div>
						<?php endif; ?>
					</div>

				<!-- Hotel & Reteates Rent -->


				<!-- Watches for Rent/Sale -->
				<?php elseif(($main_category_nid == "397644")): ?>
					<br>
					<div class="clearfix">
						<?php if(!empty($content['field_gender'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Gender: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_gender']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_year'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Year: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_year']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_case_material'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Case Material: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_case_material']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_case_diameter'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Case Diameter: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_case_diameter']); ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($content['field_movements'])) : ?>
							<div class="row padding-10 no-padding-top no-padding-bottom">
								<div class="col-md-3 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-500 font-size-12 uppercase">Movements: </span>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-6 align-left padding-5">
									<span class="fw-600 font-size-12"><?php print render($content['field_movements']); ?></span>
								</div>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<!-- Watches for Rent/Sale -->


				<?php if(!empty($content['body'])) : ?>
					<div class="font-size-14 padding-20 no-padding-left no-padding-right no-padding-bottom">
						<h3 class="no-margin fw-bold uppercase font-size-14">Description</h3>
						<br>
						<?php print render($content['body']); ?>
					</div>
				<?php endif; ?>

				<?php if(!empty($content['field_child_policy'])) : ?>
					<br>
					<div>
						<div class="fw-600 uppercase">Child Policy</div>
						<div><?php print render($content['field_child_policy']); ?></div>
					</div>
				<?php endif; ?>
				<?php if(!empty($content['field_luxe_guide_specials'])) : ?>
					<br>
					<div class="clearfix row-eq-height">
						<div class="col-md-3 column-vertical-align">
							<div class="fw-600 uppercase">The Luxe Guide Specials</div>
						</div>
						<div class="col-md-9">
							<div class="item-list">
								<ul>
									<?php
										$items = field_get_items('node', $node, 'field_luxe_guide_specials');
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
				<?php endif; ?>
			</div>
			<br>
			<br>
			<!-- Yacht General Details -->
			<?php if((($main_category_nid == "339155")) && ((!empty($content['field_max_speed'])) || (!empty($content['field_beam'])) || (!empty($content['field_weight'])) || (!empty($content['field_fuel_consumption'])) || (!empty($content['field_child_allowed'])) || (!empty($content['field_smoking_allowed'])) || (!empty($content['field_engine'])) || (!empty($content['field_cruise_range'])) || (!empty($content['field_draft'])) || !empty($content['field_number_of_crew_beds‎']))): ?>
				<div class="bg-white border-radius-3">
						<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">General Details</h3>
						<div class="padding-15">
							<div class="clearfix row align-center">
								<?php if(!empty($content['field_max_speed'])) : ?>
									<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div class="color-deep-sky-blue fw-600 uppercase">Top Speed</div>
										<div><?php print render($content['field_max_speed']); ?></div>
									</div>
								<?php endif; ?>
								<?php if(!empty($content['field_beam'])) : ?>
									<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div class="color-deep-sky-blue fw-600 uppercase">Beam</div>
										<div><?php print render($content['field_beam']); ?></div>
									</div>
								<?php endif; ?>
								<?php if(!empty($content['field_weight'])) : ?>
									<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div class="color-deep-sky-blue fw-600 uppercase">Weight</div>
										<div><?php print render($content['field_weight']); ?></div>
									</div>
								<?php endif; ?>
								<?php if(!empty($content['field_fuel_consumption'])) : ?>
									<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div class="color-deep-sky-blue fw-600 uppercase">Fuel Consumption</div>
										<div><?php print render($content['field_fuel_consumption']); ?></div>
									</div>
								<?php endif; ?>
								<?php if(!empty($content['field_child_allowed'])) : ?>
									<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div class="color-deep-sky-blue fw-600 uppercase">Child Allowed</div>
										<div><?php print render($content['field_child_allowed']); ?></div>
									</div>
								<?php endif; ?>
								<?php if(!empty($content['field_horsepower'])) : ?>
									<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div class="color-deep-sky-blue fw-600 uppercase">Horsepower</div>
										<div><?php print render($content['field_horsepower']); ?></div>
									</div>
								<?php endif; ?>
								<?php if(!empty($content['field_cruise_range'])) : ?>
									<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div class="color-deep-sky-blue fw-600 uppercase">Cruise Range</div>
										<div><?php print render($content['field_cruise_range']); ?></div>
									</div>
								<?php endif; ?>
								<?php if(!empty($content['field_cruise_range'])) : ?>
									<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div class="color-deep-sky-blue fw-600 uppercase">Cruise Range</div>
										<div><?php print render($content['field_cruise_range']); ?></div>
									</div>
								<?php endif; ?>
								<?php if(!empty($content['field_draft'])) : ?>
									<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div class="color-deep-sky-blue fw-600 uppercase">Draft</div>
										<div><?php print render($content['field_draft']); ?></div>
									</div>
								<?php endif; ?>
								<?php if(!empty($content['field_number_of_crew_beds‎'])) : ?>
									<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div class="color-deep-sky-blue fw-600 uppercase">Crew Beds</div>
										<div><?php print render($content['field_number_of_crew_beds‎']); ?></div>
									</div>
								<?php endif; ?>
								<?php if(!empty($content['field_engine'])) : ?>
									<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div class="color-deep-sky-blue fw-600 uppercase">Total Engine Power</div>
										<div><?php print render($content['field_engine']); ?> hp</div>
									</div>
								<?php endif; ?>
								<?php if(!empty($content['field_engine_hours'])) : ?>
									<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div class="color-deep-sky-blue fw-600 uppercase">Engine Hours</div>
										<div><?php print render($content['field_engine_hours']); ?> H</div>
									</div>
								<?php endif; ?>
								<?php if(!empty($content['field_fuel_consumption'])) : ?>
									<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div class="color-deep-sky-blue fw-600 uppercase">Fuel Consumption</div>
										<div><?php print render($content['field_fuel_consumption']); ?> L/H</div>
									</div>
								<?php endif; ?>
								<?php if(!empty($content['field_hull_material'])) : ?>
									<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div class="color-deep-sky-blue fw-600 uppercase">Hull Material</div>
										<div><?php print render($content['field_hull_material']); ?></div>
									</div>
								<?php endif; ?>
								<?php if(!empty($content['field_superstructure_material'])) : ?>
									<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div class="color-deep-sky-blue fw-600 uppercase">Superstructure Material</div>
										<div><?php print render($content['field_superstructure_material']); ?></div>
									</div>
								<?php endif; ?>
							</div>
						</div>
				</div>
				<br>
				<br>
			<?php endif; ?>
			<!-- End Yacht General Details -->

			<!-- Yacht Amenities -->
			<?php if((($main_category_nid == "339155")) && ((!empty($content['field_jacuzzi'])) || (!empty($content['field_hot_tub'])) || (!empty($content['field_gym'])) || (!empty($content['field_video_game'])) || (!empty($content['field_steam_room'])) || (!empty($content['field_helipad'])) || (!empty($content['field_wifi'])) || (!empty($content['field_cinema'])) || (!empty($content['field_swimming_pool']))  || (!empty($content['field_water_maker']))  || (!empty($content['field_board_game'])) || (!empty($content['field_tv'])) || (!empty($content['field_elevator'])) || (!empty($content['field_sound_system'])) || (!empty($content['field_amenities_details'])) || !empty($content['field_air_condition']))): ?>
					<div class="bg-white border-radius-3">
						<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">Amenities</h3>
						<div class="padding-15">
							<div class="clearfix row align-center">
								
								<?php if(!empty($content['field_jacuzzi'])): ?>
									<?php if($content['field_jacuzzi'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Jacuzzi</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_hot_tub'])): ?>
									<?php if($content['field_hot_tub'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Hot Tub</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_gym'])): ?>
									<?php if($content['field_gym'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Gym</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_video_game'])): ?>
									<?php if($content['field_video_game'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Video Game</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>


								<?php if(!empty($content['field_steam_room'])): ?>
									<?php if($content['field_steam_room'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Steam Game</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_helipad'])): ?>
									<?php if($content['field_helipad'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Helipad</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_wifi'])): ?>
									<?php if($content['field_wifi'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Internet Access</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_cinema'])): ?>
									<?php if($content['field_cinema'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Cinema</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_swimming_pool'])): ?>
									<?php if($content['field_swimming_pool'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Swimming Pool</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_water_maker'])): ?>
									<?php if($content['field_water_maker'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Water Maker</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_board_game'])): ?>
									<?php if($content['field_board_game'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Board Game</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_tv'])): ?>
									<?php if($content['field_tv'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> TV</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_elevator'])): ?>
									<?php if($content['field_elevator'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Elevator</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_sound_system'])): ?>
									<?php if($content['field_sound_system'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Sound System</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>
								
								<?php if(!empty($content['field_air_condition'])): ?>
									<?php if($content['field_air_condition'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Air Condition</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>
							</div>
							<!-- Amenities Popup -->
							<?php if ((!empty($content['field_jacuzzi'])) || (!empty($content['field_hot_tub'])) || (!empty($content['field_gym'])) || (!empty($content['field_video_game'])) || (!empty($content['field_steam_room'])) || (!empty($content['field_helipad'])) || (!empty($content['field_wifi'])) || (!empty($content['field_cinema'])) || (!empty($content['field_swimming_pool']))  || (!empty($content['field_water_maker']))  || (!empty($content['field_board_game'])) || (!empty($content['field_tv'])) || (!empty($content['field_elevator'])) || (!empty($content['field_sound_system'])) || !empty($content['field_air_condition']) ): ?>
									<div class="padding-15 align-center">
										<a class="btn btn-mod btn-border btn-round btn-small" data-toggle="modal" data-target="#amenitiesdesc">Show all Amenities</a>
									</div>
									<div class="modal fade" id="amenitiesdesc" tabindex="-1" role="dialog" aria-labelledby="amenitiesdesc" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<h5 class="modal-title" id="exampleModalLongTitle">Yacht Amenities</h5>
												</div>
												<div class="modal-body">
													<div class="padding-40">
														<?php if(!empty($content['field_jacuzzi'])): ?>
															<?php if($content['field_jacuzzi'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Jacuzzi</div>
																<div><?php print render($content['field_jacuzzi'][0]['#item']['second']); ?></div>
															<?php endif; ?>
															<br>
														<?php endif; ?>

														<?php if(!empty($content['field_hot_tub'])): ?>
															<?php if($content['field_hot_tub'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Hot Tub</div>
																<div><?php print render($content['field_hot_tub'][0]['#item']['second']); ?></div>
															<?php endif; ?>
															<br>
														<?php endif; ?>

														<?php if(!empty($content['field_gym'])): ?>
															<?php if($content['field_gym'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Gym</div>
																<div><?php print render($content['field_gym'][0]['#item']['second']); ?></div>
															<?php endif; ?>
															<br>
														<?php endif; ?>

														<?php if(!empty($content['field_video_game'])): ?>
															<?php if($content['field_video_game'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Video Game</div>
																<div><?php print render($content['field_video_game'][0]['#item']['second']); ?></div>
															<?php endif; ?>
															<br>
														<?php endif; ?>

														<?php if(!empty($content['field_steam_room'])): ?>
															<?php if($content['field_steam_room'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Steam Game</div>
																<div><?php print render($content['field_steam_room'][0]['#item']['second']); ?></div>
															<?php endif; ?>
															<br>
														<?php endif; ?>

														<?php if(!empty($content['field_helipad'])): ?>
															<?php if($content['field_helipad'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Helipad</div>
																<div><?php print render($content['field_helipad'][0]['#item']['second']); ?></div>
															<?php endif; ?>
															<br>
														<?php endif; ?>

														<?php if(!empty($content['field_wifi'])): ?>
															<?php if($content['field_wifi'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Internet Access</div>
																<div><?php print render($content['field_wifi'][0]['#item']['second']); ?></div>
															<?php endif; ?>
															<br>
														<?php endif; ?>

														<?php if(!empty($content['field_cinema'])): ?>
															<?php if($content['field_cinema'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Cinema</div>
																<div><?php print render($content['field_cinema'][0]['#item']['second']); ?></div>
															<?php endif; ?>
															<br>
														<?php endif; ?>

														<?php if(!empty($content['field_swimming_pool'])): ?>
															<?php if($content['field_swimming_pool'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Swimming Pool</div>
																<div><?php print render($content['field_swimming_pool'][0]['#item']['second']); ?></div>
															<?php endif; ?>
															<br>
														<?php endif; ?>

														<?php if(!empty($content['field_water_maker'])): ?>
															<?php if($content['field_water_maker'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Water Maker</div>
																<div><?php print render($content['field_water_maker'][0]['#item']['second']); ?></div>
															<?php endif; ?>
															<br>
														<?php endif; ?>

														<?php if(!empty($content['field_board_game'])): ?>
															<?php if($content['field_board_game'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Board Game</div>
																<div><?php print render($content['field_board_game'][0]['#item']['second']); ?></div>
															<?php endif; ?>
															<br>
														<?php endif; ?>

														<?php if(!empty($content['field_tv'])): ?>
															<?php if($content['field_tv'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> TV</div>
																<div><?php print render($content['field_tv'][0]['#item']['second']); ?></div>
															<?php endif; ?>
															<br>
														<?php endif; ?>

														<?php if(!empty($content['field_elevator'])): ?>
															<?php if($content['field_elevator'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Elevator</div>
																<div><?php print render($content['field_elevator'][0]['#item']['second']); ?></div>
															<?php endif; ?>
															<br>
														<?php endif; ?>

														<?php if(!empty($content['field_sound_system'])): ?>
															<?php if($content['field_sound_system'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Sound System</div>
																<div><?php print render($content['field_sound_system'][0]['#item']['second']); ?></div>
															<?php endif; ?>
															<br>
														<?php endif; ?>

														<?php if(!empty($content['field_air_condition'])): ?>
															<?php if($content['field_air_condition'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Sound System</div>
																<div><?php print render($content['field_air_condition'][0]['#item']['second']); ?></div>
															<?php endif; ?>
															<br>
														<?php endif; ?>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
							<?php endif; ?>
							<!-- End Amenities Popup -->
							<?php if(!empty($content['field_amenities_details'])) : ?>
								<br>
								<?php print render($content['field_amenities_details']); ?>
							<?php endif; ?>
						</div>
					</div>
					<br>
					<br>
			<?php endif; ?>
			<!-- End Yacht Amenities -->

			<!-- Yacht Guest and Room Capacity -->
			<?php if((($main_category_nid == "339155")) && ((!empty($content['field_cabin'])) || (!empty($content['field_bedroom'])) || (!empty($content['field_bathroom'])) || (!empty($content['field_rooms_details']))) ) : ?>
				<div class="bg-white border-radius-3">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">Guest Capacity & Rooms</h3>
					<div class="padding-15">
						<div class="clearfix row align-center">
							<?php if(!empty($content['field_cabin'])) : ?>
								<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
									<div class="color-deep-sky-blue fw-600 uppercase">Number of Cabins</div>
									<div><?php print render($content['field_cabin']); ?></div>
								</div>
							<?php endif; ?>
							<?php if(!empty($content['field_bedroom'])) : ?>
								<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
									<div class="color-deep-sky-blue fw-600 uppercase">Number of Bedrooms</div>
									<div><?php print render($content['field_bedroom']); ?></div>
								</div>
							<?php endif; ?>
							<?php if(!empty($content['field_bathroom'])) : ?>
								<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
									<div class="color-deep-sky-blue fw-600 uppercase">Number of Bathrooms</div>
									<div><?php print render($content['field_bathroom']); ?></div>
								</div>
							<?php endif; ?>
						</div>
						<?php if(!empty($content['field_rooms_details'])) : ?>
							<br>
							<?php print render($content['field_rooms_details']); ?>
						<?php endif; ?>
					</div>
				</div>
				<br>
				<br>
			<?php endif; ?>
			<!-- End Yacht Guest and Room Capacity -->

			<!-- Yacht Watersports & Activities -->
			<?php if((($main_category_nid == "339155")) && ((!empty($content['field_water_ski_adult'])) || (!empty($content['field_water_ski_child'])) || (!empty($content['field_fishing_rod'])) || (!empty($content['field_beach_club'])) || (!empty($content['field_diving_equipment'])) || (!empty($content['field_underwater_camera'])) || (!empty($content['field_slide'])) || (!empty($content['field_swim_platform'])) || (!empty($content['field_windsurfer']))  || (!empty($content['field_wakeboard']))  || (!empty($content['field_deep_fishing_equipment'])) || (!empty($content['field_diving_compressors'])) || (!empty($content['field_jetski'])) || (!empty($content['field_paddle_board'])) || (!empty($content['field_scurfer']))  || (!empty($content['field_snorkel_gear'])) || (!empty($content['field_inflatable_platform'])) || (!empty($content['field_kiteboard'])) || (!empty($content['field_seabob'])) ||  (!empty($content['field_kayak'])) ||  (!empty($content['field_field_floating_matkayak'])))): ?>
					<div class="bg-white border-radius-3">
						<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">Watersports & Outdoor Activities</h3>
						<div class="padding-15">
							<div class="clearfix row align-center">
								
								<?php if(!empty($content['field_water_ski_adult'])): ?>
									<?php if($content['field_water_ski_adult'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Water Ski Adult</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_water_ski_child'])): ?>
									<?php if($content['field_water_ski_child'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Water Ski Child</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_fishing_rod'])): ?>
									<?php if($content['field_fishing_rod'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Fishing Rod</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_beach_club'])): ?>
									<?php if($content['field_beach_club'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Beach Club</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>


								<?php if(!empty($content['field_diving_equipment'])): ?>
									<?php if($content['field_diving_equipment'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Diving Equipment</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_underwater_camera'])): ?>
									<?php if($content['field_underwater_camera'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Underwater Camera</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_slide'])): ?>
									<?php if($content['field_slide'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Slide</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_swim_platform'])): ?>
									<?php if($content['field_swim_platform'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Swim Platform</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_windsurfer'])): ?>
									<?php if($content['field_windsurfer'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Windsurfer</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_wakeboard'])): ?>
									<?php if($content['field_wakeboard'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Wakeboard</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_deep_fishing_equipment'])): ?>
									<?php if($content['field_deep_fishing_equipment'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Deep Fishing Equipment</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_diving_compressors'])): ?>
									<?php if($content['field_diving_compressors'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Diving Compressors</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_jetski'])): ?>
									<?php if($content['field_jetski'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Jetski</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_paddle_board'])): ?>
									<?php if($content['field_paddle_board'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Paddle Board</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_scurfer'])): ?>
									<?php if($content['field_scurfer'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Scurfer</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_snorkel_gear'])): ?>
									<?php if($content['field_snorkel_gear'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Snorkel Gear</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_inflatable_platform'])): ?>
									<?php if($content['field_inflatable_platform'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Inflatable Platform</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_kiteboard'])): ?>
									<?php if($content['field_kiteboard'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Kiteboard</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_seabob'])): ?>
									<?php if($content['field_seabob'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Seabob</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_kayak'])): ?>
									<?php if($content['field_kayak'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Kayak</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if(!empty($content['field_floating_mat'])): ?>
									<?php if($content['field_floating_mat'][0]['#item']['first'] != FALSE): ?>
										<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
											<div class="fw-600"><i class="fas fa-check"></i> Floating Mat</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>
							</div>
							<!-- Watersports & Activities Popup -->
							<?php if((!empty($content['field_water_ski_adult'])) || (!empty($content['field_water_ski_child'])) || (!empty($content['field_fishing_rod'])) || (!empty($content['field_beach_club'])) || (!empty($content['field_diving_equipment'])) || (!empty($content['field_underwater_camera'])) || (!empty($content['field_slide'])) || (!empty($content['field_swim_platform'])) || (!empty($content['field_windsurfer']))  || (!empty($content['field_wakeboard']))  || (!empty($content['field_deep_fishing_equipment'])) || (!empty($content['field_diving_compressors'])) || (!empty($content['field_jetski'])) || (!empty($content['field_paddle_board'])) || (!empty($content['field_scurfer']))  || (!empty($content['field_snorkel_gear'])) || (!empty($content['field_inflatable_platform'])) || (!empty($content['field_kiteboard'])) || (!empty($content['field_seabob'])) ||  (!empty($content['field_kayak'])) ||  (!empty($content['field_field_floating_matkayak']))): ?>
									<div class="padding-10 align-center">
										<a class="btn btn-mod btn-border btn-round btn-small" data-toggle="modal" data-target="#watersportsdesc">Show all Watesports & Activities</a>
									</div>
									<div class="modal fade" id="watersportsdesc" tabindex="-1" role="dialog" aria-labelledby="watersportsdesc" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<h5 class="modal-title" id="exampleModalLongTitle">Watersports & Outdoor Activites</h5>
												</div>
												<div class="modal-body">
													<div class="padding-40">
														<?php if(!empty($content['field_water_ski_adult'])): ?>
															<?php if($content['field_water_ski_adult'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Water Ski Adult</div>
																<div><?php print render($content['field_water_ski_adult'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_water_ski_child'])): ?>
															<?php if($content['field_water_ski_child'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Water Ski Child</div>
																<div><?php print render($content['field_water_ski_child'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_fishing_rod'])): ?>
															<?php if($content['field_fishing_rod'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Fishing Rod</div>
																<div><?php print render($content['field_fishing_rod'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_beach_club'])): ?>
															<?php if($content['field_beach_club'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Beach Club</div>
																<div><?php print render($content['field_beach_club'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>


														<?php if(!empty($content['field_diving_equipment'])): ?>
															<?php if($content['field_diving_equipment'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Diving Equipment</div>
																<div><?php print render($content['field_diving_equipment'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_underwater_camera'])): ?>
															<?php if($content['field_underwater_camera'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Underwater Camera</div>
																<div><?php print render($content['field_underwater_camera'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_slide'])): ?>
															<?php if($content['field_slide'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Slide</div>
																<div><?php print render($content['field_slide'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_swim_platform'])): ?>
															<?php if($content['field_swim_platform'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Swim Platform</div>
																<div><?php print render($content['field_swim_platform'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_windsurfer'])): ?>
															<?php if($content['field_windsurfer'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Windsurfer</div>
																<div><?php print render($content['field_windsurfer'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_wakeboard'])): ?>
															<?php if($content['field_wakeboard'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Wakeboard</div>
																<div><?php print render($content['field_wakeboard'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_deep_fishing_equipment'])): ?>
															<?php if($content['field_deep_fishing_equipment'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Deep Fishing Equipment</div>
																<div><?php print render($content['field_deep_fishing_equipment'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_diving_compressors'])): ?>
															<?php if($content['field_diving_compressors'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Diving Compressors</div>
																<div><?php print render($content['field_diving_compressors'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_jetski'])): ?>
															<?php if($content['field_jetski'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Jetski</div>
																<div><?php print render($content['field_jetski'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_scurfer'])): ?>
															<?php if($content['field_scurfer'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Scurfer</div>
																<div><?php print render($content['field_scurfer'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_paddle_board'])): ?>
															<?php if($content['field_paddle_board'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Paddle Board</div>
																<div><?php print render($content['field_paddle_board'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_snorkel_gear'])): ?>
															<?php if($content['field_snorkel_gear'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Snorkel Gear</div>
																<div><?php print render($content['field_snorkel_gear'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_inflatable_platform'])): ?>
															<?php if($content['field_inflatable_platform'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Inflatable Platform</div>
																<div><?php print render($content['field_inflatable_platform'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_kiteboard'])): ?>
															<?php if($content['field_kiteboard'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Kiteboard</div>
																<div><?php print render($content['field_kiteboard'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_seabob'])): ?>
															<?php if($content['field_seabob'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Seabob</div>
																<div><?php print render($content['field_seabob'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_kayak'])): ?>
															<?php if($content['field_kayak'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Kayak</div>
																<div><?php print render($content['field_kayak'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>

														<?php if(!empty($content['field_floating_mat'])): ?>
															<?php if($content['field_floating_mat'][0]['#item']['first'] != FALSE): ?>
																<div class="color-deep-sky-blue fw-600 uppercase"><i class="fas fa-check"></i> Floating Mat</div>
																<div><?php print render($content['field_floating_mat'][0]['#item']['second']); ?></div>
															<?php endif; ?>
														<?php endif; ?>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
							<?php endif; ?>
							<!-- End Watersports & Activities Popup -->
							<?php if(!empty($content['field_water_sports_details'])) : ?>
								<br>
								<?php print render($content['field_water_sports_details']); ?>
							<?php endif; ?>
						</div>
					</div>
					<br>
					<br>
			<?php endif; ?>
			<!-- End Yacht Watersports & Activities -->

			<!-- Yacht Meals and Drinks -->
			<?php if((($main_category_nid == "339155")) && ((!empty($content['field_coffee_machine'])) || (!empty($content['field_kitchen'])) || (!empty($content['field_wine_cooler'])) || (!empty($content['field_bbq'])) || (!empty($content['field_rooms_details']))) ) : ?>
				<div class="bg-white border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Meals & Drinks</h3>
					<div class="padding-15">
						<div class="clearfix row">

							<?php if(!empty($content['field_coffee_machine'])) : ?>
								<?php if($content['field_coffee_machine'][0]['#item']['first'] != FALSE): ?>
									<div class="col-md-3 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div><span class="fw-600"><i class="fas fa-check"></i></span> Coffee Machine</div>
									</div>
								<?php endif; ?>
							<?php endif; ?>

							<?php if(!empty($content['field_kitchen'])) : ?>
								<?php if($content['field_kitchen'][0]['#item']['first'] != FALSE): ?>
									<div class="col-md-3 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div><span class="fw-600"><i class="fas fa-check"></i></span> Kitchen</div>
									</div>
								<?php endif; ?>
							<?php endif; ?>

							<?php if(!empty($content['field_wine_cooler'])) : ?>
								<?php if($content['field_wine_cooler'][0]['#item']['first'] != FALSE): ?>
									<div class="col-md-3 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div><span class="fw-600"><i class="fas fa-check"></i></span> Wine Cooler</div>
									</div>
								<?php endif; ?>
							<?php endif; ?>

							<?php if(!empty($content['field_bbq'])) : ?>
								<?php if($content['field_bbq'][0]['#item']['first'] != FALSE): ?>
									<div class="col-md-3 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
										<div><span class="fw-600"><i class="fas fa-check"></i></span> BBQ</div>
									</div>
								<?php endif; ?>
							<?php endif; ?>

						</div>
						<?php if(!empty($content['field_meals_details'])) : ?>
							<br>
							<?php print render($content['field_meals_details']); ?>
						<?php endif; ?>
					</div>		
				</div>
				<br>
				<br>
			<?php endif; ?>
			<!-- End Yacht Meals and Drinks -->

			<!-- Yacht Crew -->
			<?php if((($main_category_nid == "339155")) && ((!empty($content['field_coffee_machine'])) || (!empty($content['field_kitchen'])) || (!empty($content['field_wine_cooler'])) || (!empty($content['field_bbq'])) || (!empty($content['field_rooms_details']))) ) : ?>
				<div class="bg-white border-radius-3 padding-15">
					<h3 class="no-margin uppercase">The Crew</h3>
					<div class="padding-15">
						<div class="clearfix row align-center">
							<?php if(!empty($content['field_languages_available'])) : ?>
								<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
									<div class="color-deep-sky-blue fw-600 uppercase">Language(s)</div>
									<div><?php print render($content['field_languages_available']); ?></div>
								</div>
							<?php endif; ?>

							<?php if(!empty($content['field_crew'])) : ?>
								<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
									<div class="color-deep-sky-blue fw-600 uppercase">Number of Crews</div>
									<div><?php print render($content['field_crew']); ?></div>
								</div>
							<?php endif; ?>

							<?php if(!empty($content['field_country_text'])) : ?>
								<div class="col-md-4 col-sm-6 col-xs-6 align-center padding-5 col-centered no-float vertical-align-top">
									<div class="color-deep-sky-blue fw-600 uppercase">Countries Operations</div>
									<div><?php print render($content['field_country_text']); ?></div>
								</div>
							<?php endif; ?>
						</div>
						<?php if(!empty($content['field_crew_details'])) : ?>
							<br>
							<?php print render($content['field_crew_details']); ?>
						<?php endif; ?>
					</div>
				</div>
				<br>
				<br>
			<?php endif; ?>
			<!-- End Yacht Crew -->

			<!-- Chauffeured Amenities -->
			<?php if(!empty($content['field_chauffeured_amenities'])) : ?>
				<div class="bg-white border-radius-3">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">Chauffeured Amenities</h3>
					<div class="padding-15">
						<div class="clearfix">
							<?php
								$field = field_info_field('field_chauffeured_amenities');
								$items = field_get_items('node', $node, 'field_chauffeured_amenities');
								foreach ($items as $item):
							?>
								<div class="col-md-4 col-sm-12 col-xs-12 align-center padding-5">
									<div class="bg-light-grey padding-10 border-radius-3"><i class="fas fa-check color-deep-sky-blue"></i> <?php print $field['settings']['allowed_values'][$item['value']]; ?> </div>
								</div>
							<?php endforeach;?>
						</div>
					</div>
				</div>
				<br>
				<br>
			<?php endif; ?>
			<!-- End of Chauffeured Amenities -->

			<div class="visible-xs-block visible-sm-block">
				<div class="bg-white border-radius-3">
					<div class="padding-15">
						<?php
							$author = module_invoke('views', 'block_view', 'professional-short_bio');
							if($author):
						?>
						<div class="padding-10">
							<?php print render($category_tab); ?> By:
						</div>
						<div class="padding-10">
							<?php print render($author['content']); ?>
						</div>
						<?php endif; ?>
						<div class="padding-10 no-padding-left no-padding-right">
							<h3 class="no-margin text-center fw-600 padding-5 no-padding-left no-padding-right font-size-16">Inquire Now</h3>
							<?php
								$block = module_invoke('entityform_block', 'block_view', 'inquire');
								if ($block):
									print render($block['content']);
								endif; 
							?>
						</div>
						<!-- <?php /* if(!empty($content['field_contact_number'])) : ?>
							<div class="padding-10">
								<a href="tel:<?php print render($content['field_contact_number']); ?>" class="btn btn-mod btn-medium btn-round full-width">
									<span class="fa fa-phone"></span>
									<?php print render($content['field_contact_number']); ?>
								</a>
							</div>
						<?php endif; ?> -->
						<!--<?php if(!empty($content['field_email'])) : ?>
							<div class="padding-10">
								<a class="btn btn-mod btn-medium btn-round full-width" href="mailto:<?php print render($content['field_email']['#items']['0']['email']); ?>">
									<span class="fa fa-fw fa-envelope-o"></span> Send Mail Here
								</a>
							</div>
						<?php endif; */ ?>-->
					</div>
				</div>
				<br>
				<br>
				<?php if(!empty($content['field_redirect'])) : ?>
					<div class="bg-white border-radius-3">
						<h4 class="no-margin font-alt font-size-20 fw-600 border-bottom-grey padding-15 align-center">Book Now</h4>
						<div class="padding-15">
							<?php $redirect_field = trim(render($content['field_redirect'])); ?>
							<a class="btn btn-mod full-width btn-round btn-medium" href="//<?php print $redirect_field; ?>" target="_blank">Go to Website</a>
						</div>
					</div>
					<br>
					<br>
				<?php endif; ?>
				<?php if(!empty($content['field_commission_rate'])) : ?>
					<div class="bg-white border-radius-3">
						<div class="padding-15">
							<div class="inline-block font-size-12 uppercase">Agent Commission Offered:</div>
							<div class="inline-block font-size-24 align-center fw-600">
								<?php print render($content['field_commission_rate']); ?>%
							</div>
						</div>
					</div>
					<br>
					<br>
				<?php endif; ?>
				
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

			<?php if(!empty($content['field_short_itinerary'])) : ?>
				<div class="bg-white border-radius-3">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-20">Itinerary</h3>
					<br>
					<?php print render($content['field_short_itinerary']); ?>
					<br>
				</div>
				<br>
				<br>
				<br>
			<?php endif; ?>
			
			<?php
				$itinerary_details = module_invoke('views', 'block_view', 'field_collection-itinerary_details');
				if(!empty($itinerary_details)):
			?>
				<div class="bg-white border-radius-3">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-20">Itinerary</h3>
					<br>
					<?php print render($itinerary_details['content']); ?>
				</div>
				<!-- <br>
				<div class="border-bottom-custom"></div>
				<br> -->
				<br>
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
					<h3 class="no-margin font-alt font-size-24 fw-600">Rates & Packages</h3>
					<br>
					<?php print render($variant_packages['content']); ?>
				</div>
				<br>
				<div class="border-bottom-custom"></div>
				<br>
				<br>
			<?php endif; ?>

			<?php
				$add_on_packages = module_invoke('views', 'block_view', 'field_collection-add_ons_packages');
				if(!empty($add_on_packages)):
			?>
				<div>
					<h3 class="no-margin font-alt font-size-24 fw-600">Add-ons & Upgrades</h3>
					<br>
					<?php print render($add_on_packages['content']); ?>
				</div>
				<br>
				<div class="border-bottom-custom"></div>
				<br>
				<br>
			<?php endif; ?>


			<?php /* if(!empty($content['field_rates_details'])) : ?>
				<div class="bg-white border-radius-3">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-20">Rate Details</h3>
					<div class="padding-40">
						<?php print render($content['field_rates_details']); ?>
					</div>
				</div>
				<br>
				<br>
				<br>
			<?php endif; ?>

			<?php if(!empty($content['field_inclusions'])) : ?>
				<div class="bg-white border-radius-3">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-20">Inclusion</h3>
					<div class="padding-40">
						<?php print render($content['field_inclusions']); ?>
					</div>
				</div>
				<br>
				<br>
				<br>
			<?php endif; */ ?>

			<?php /* if(!empty($content['field_exclusions'])) : ?>
				<div class="bg-white border-radius-3">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-20">Exclusion</h3>
					<div class="padding-40">
						<?php print render($content['field_exclusions']); ?>
					</div>
				</div>
				<br>
				<br>
				<br>
			<?php endif; */ ?>

			<?php /* if(!empty($content['field_add_ons'])) : ?>
				<div class="bg-white border-radius-3">
					<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-20">Add Ons</h3>
					<div class="padding-40">
						<?php print render($content['field_add_ons']); ?>
					</div>
				</div>
				<br>
				<br>
				<br>
			<?php endif; */ ?>

			
			<?php if(!empty($content['field_professionals_connected'])) : ?>
				<h3 class="no-margin font-alt font-size-24 fw-600 align-center padding-20">Linked Professionals</h3>
				<br>
				<div class="row align-center">
					<?php
						$block = module_invoke('views', 'block_view', 'professional-connected_short_bio');
						print render($block['content']);
					?>
				</div>
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

			<?php if(!empty($content['field_images'])) : ?>
				<h3 class="no-margin font-alt font-size-24 fw-600 align-center padding-20">Gallery</h3>
				<br>
				<div class="row align-center">
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
	
	<!-- Contact Us Entity Form -->
	<!-- <div class="bg-white padding-40 border-radius-3">
		<div id="inquire">
			<div class="row clearfix align-center">
				<div class="col-xs-12 col-sm-12 col-md-12 col-centered no-float align-left">
					<div class="padding-60 no-padding-left no-padding-right">
						<h4 class="no-margin-top uppercase no-margin font-size-20 align-center">Enquire now</h4>
						<p class="padding-10 no-padding-left no-padding-right no-padding-bottom font-size-12 align-center">Fill in the form and we will get back to you as soon as possible.</p>
						<br>
						<?php
							$contact_us = module_invoke('entityform_block', 'block_view', 'contact_us');
							print render($contact_us['content']);
						?>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- End of Contact Us Entity Form -->
</div>