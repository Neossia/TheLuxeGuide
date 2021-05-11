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
	$old_str = [" in @AREA,", " @AREA,", " in @AREA", " @AREA", " @COUNTRY"];
	$new_str = ["", "", "", "", ""];
?>
<!-- GET ACTUAL LINK -->
<?php 
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$url_part = explode('/', $actual_link);
?>
<!-- END GET ACTUAL LINK -->
<?php  if (empty($admin) ? FALSE : TRUE) : ?>
	<div class="position-fixed z-index-above no-right">
		<div class="align-center padding-20">
			<div class="inline-block">
				<a class="btn btn-mod btn-deep-sky-blue btn-small btn-circle scroll" target="_blank" href="<?php print $base_url; ?>/node/<?php print $node->nid; ?>/edit">Edit Page</a>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php /* if(!empty($content['field_image'])): ?>
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
<br>
<?php if ($url_part[3] == "all-categories") : ?>
	<?php if(!empty($content['field_title'])) : ?>
		<?php $title_field = trim(render($content['field_title'])); ?>
		<?php
			$str_replace_title = str_replace($old_str, $new_str, $title_field);
			$new_title = substr($str_replace_title, strpos($str_replace_title, $title_field));
		?>
		<h1 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15"><?php print $new_title; ?></h1>
	<?php endif; ?>
	<?php if(!empty($content['body'])) : ?>
		<?php $description_field = trim(render($content['body'])); ?>
		<?php
			$str_replace_description = str_replace($old_str, $new_str, $description_field);
			$new_description = substr($str_replace_description, strpos($str_replace_description, $description_field));
		?>
		<div class="padding-15"><?php print $new_description; ?></div>
	<?php endif; ?>
<?php else: ?>
	<div class="container">
		<?php 
			$breadcrumb = module_invoke("views", "block_view", "service-breadcrumbs");
			print render($breadcrumb['content']);
		?>
		<br>
		<div class="row clearfix row-eq-height">
			<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 js-sticky-container">
				<div class="js-sticky">
					<br>
					<?php if(!empty($content['field_category_tab'])) : ?>
						<?php 
							$items = field_get_items('node', $node, 'field_category_tab');
							foreach ($items as $item) :
						?>
							<!-- Magazine -->
							<?php if ($item['value'] == "2"): ?>
								<div class="bg-white border-radius-3 box-shadow">
									<div class="font-size-16 no-margin font-alt fw-600 border-bottom-grey padding-15">Type of Magazine</div>
									<div class="padding-15">
										<ul class="arrow-ul">
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/aircrafts-aviation/media' ;?>">Aviation</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/cars-motors/media' ;?>">Cars & Motors</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/directory/private-event-planning/media' ;?>">Events</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/hotels-luxury-retreats/media' ;?>">Hotels & Retreats</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/real-estate/media' ;?>">Real Estate</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/travels-overnight-getaways/media' ;?>">Travel & Experiences</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/yachts-watercrafts/media' ;?>">Yachts & Watercraft</a></li>
										</ul>
									</div>
								</div>
								<br>
								<br>
							<?php endif; ?>
							<!-- End of magazine -->
							<!-- Professional -->
							<?php if ($item['value'] == "3"): ?>
								<div class="bg-white border-radius-3 box-shadow">
									<div class="font-size-16 no-margin font-alt fw-600 border-bottom-grey padding-15">Type of Top Brands</div>
									<div class="padding-15">
										<ul class="arrow-ul">
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/aircrafts-aviation/professionals' ;?>">Aviation</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/cars-motors/professionals' ;?>">Cars & Motors</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/directory/private-event-planning/professionals' ;?>">Events</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/hotels-luxury-retreats/professionals' ;?>">Hotels & Retreats</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/real-estate/professionals' ;?>">Real Estate</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/travels-overnight-getaways/professionals' ;?>">Travel & Experiences</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/yachts-watercrafts/professionals' ;?>">Yachts & Watercraft</a></li>
										</ul>
									</div>
								</div>
								<br>
								<br>
							<?php endif; ?>
							<!-- End of professional -->
							<!-- For sale -->
							<?php if ($item['value'] == "4"): ?>
								<div class="bg-white border-radius-3 box-shadow">
									<div class="font-size-16 no-margin font-alt fw-600 border-bottom-grey padding-15">Type of Buy & Sell</div>
									<div class="padding-15">
										<ul class="arrow-ul">
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/aircrafts-aviation/for-sale' ;?>">Aviation</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/cars-motors/for-sale' ;?>">Cars & Motors</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/directory/private-event-planning/for-sale' ;?>">Events</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/hotels-luxury-retreats/for-sale' ;?>">Hotels & Retreats</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/real-estate/for-sale' ;?>">Real Estate</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/travels-overnight-getaways/for-sale' ;?>">Travel & Experiences</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/yachts-watercrafts/for-sale' ;?>">Yachts & Watercraft</a></li>
										</ul>
									</div>
								</div>
								<br>
								<br>
							<?php endif; ?>
							<!-- End of for sale -->
							<!-- For rent -->
							<?php if ($item['value'] == "5"): ?>
								<div class="bg-white border-radius-3 box-shadow">
									<div class="font-size-16 no-margin font-alt fw-600 border-bottom-grey padding-15">Type of Rental</div>
									<div class="padding-15">
										<ul class="arrow-ul">
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/aircrafts-aviation/for-rent' ;?>">Aviation</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/cars-motors/for-rent' ;?>">Cars & Motors</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/directory/private-event-planning/for-rent' ;?>">Events</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/hotels-luxury-retreats/for-rent' ;?>">Hotels & Retreats</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/real-estate/for-rent' ;?>">Real Estate</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/travels-overnight-getaways/for-rent' ;?>">Travel & Experiences</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/yachts-watercrafts/for-rent' ;?>">Yachts & Watercraft</a></li>
										</ul>
									</div>
								</div>
								<br>
								<br>
							<?php endif; ?>
							<!-- End of for rent -->
							<!-- For travel -->
							<?php if ($item['value'] == "7"): ?>
								<div class="bg-white border-radius-3 box-shadow">
									<div class="font-size-16 no-margin font-alt fw-600 border-bottom-grey padding-15">Type of Travel & Experiences</div>
									<div class="padding-15">
										<ul class="arrow-ul">
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/aircrafts-aviation/experience' ;?>">Aviation</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/cars-motors/experience' ;?>">Cars & Motors</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/private-event-planning/experience' ;?>">Event Planning</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/travel-luxury-retreats/experience' ;?>">Travel & Luxury Retreats</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/yachts-watercrafts/experience' ;?>">Yachts & Watercraft</a></li>
										</ul>
									</div>
								</div>
								<br>
								<br>
							<?php endif; ?>
							<!-- End of for travel -->
							<!-- For Event -->
							<?php if ($item['value'] == "8"): ?>
								<div class="bg-white border-radius-3 box-shadow">
									<div class="font-size-16 no-margin font-alt fw-600 border-bottom-grey padding-15">Type of Events</div>
									<div class="padding-15">
										<ul class="arrow-ul">
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/aircrafts-aviation/events' ;?>">Aviation</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/cars-motors/events' ;?>">Cars & Motors</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/directory/private-event-planning/events' ;?>">Events</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/hotels-luxury-retreats/events' ;?>">Hotels & Retreats</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/real-estate/events' ;?>">Real Estate</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/travels-overnight-getaways/events' ;?>">Travel & Experiences</a></li>
											<li class="padding-5 no-padding-top no-padding-left no-padding-right display-block-link"><a href="<?php print  $base_url . '/' . 'directory/yachts-watercrafts/events' ;?>">Yachts & Watercraft</a></li>
										</ul>
									</div>
								</div>
								<br>
								<br>
							<?php endif; ?>
							<!-- End of for event -->
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-12 col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
				<br>
				<div class="bg-white border-radius-3 box-shadow">
					<h1 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15"><?php print($title);?></h1>
					<?php if(!empty($content['body'])) : ?>
						<?php $description_field = trim(render($content['body'])); ?>
						<?php
							$str_replace_description = str_replace($old_str, $new_str, $description_field);
							$new_description = substr($str_replace_description, strpos($str_replace_description, $description_field));
						?>
						<div class="padding-15"><?php print $new_description; ?></div>
					<?php endif; ?>
					<?php if(!empty($content['field_category_tab'])) : ?>
						<?php
							$items = field_get_items('node', $node, 'field_category_tab');
							foreach ($items as $item) :
						?>
							<!-- Magazine -->
							<?php if ($item['value'] == "2"): ?>
								<?php
									$block = module_invoke('views', 'block_view', 'article-all_articles');
									if ($block):
								?>
									<div class="padding-15 no-padding-bottom"><?php print render($block['content']); ?></div>
									<br>
									<br>
								<?php endif; ?>
							<?php endif; ?>
							<!-- End of magazine -->
							<!-- Professional -->
							<?php if ($item['value'] == "3"): ?>
								<?php
									$block = module_invoke('views', 'block_view', 'service-pro_directory');
									if ($block):
								?>
									<div class="padding-15 no-padding-bottom"><?php print render($block['content']); ?></div>
									<br>
									<br>
								<?php endif; ?>
							<?php endif; ?>
							<!-- End of professional -->
							<!-- For sale -->
							<?php if ($item['value'] == "4"): ?>
								<?php
									$block = module_invoke('views', 'block_view', 'service-sale_directory');
									if ($block):
								?>
									<div class="padding-15 no-padding-bottom"><?php print render($block['content']); ?></div>
									<br>
									<br>
								<?php endif; ?>
							<?php endif; ?>
							<!-- End of for sale -->
							<!-- For rent -->
							<?php if ($item['value'] == "5"): ?>
								<?php
									$block = module_invoke('views', 'block_view', 'service-rent_directory');
									if ($block):
								?>
									<div class="padding-15 no-padding-bottom"><?php print render($block['content']); ?></div>
									<br>
									<br>
								<?php endif; ?>
							<?php endif; ?>
							<!-- End of for rent -->
							<!-- For travel -->
							<?php if ($item['value'] == "7"): ?>
								<?php
									$block = module_invoke('views', 'block_view', 'service-experience_directory');
									if ($block):
								?>
									<div class="padding-15 no-padding-bottom"><?php print render($block['content']); ?></div>
									<br>
									<br>
								<?php endif; ?>
							<?php endif; ?>
							<!-- End of for travel -->
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
				<br>
				<br>
			</div>
		</div>
	</div>
<?php endif; ?>