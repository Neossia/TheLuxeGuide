<?php
	global $base_url;
	global $user;
	$admin_role = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
	$admin_main = array_intersect(array('administrator'), array_values($user->roles));
	$image_default_uri = "public://LXVAnonDefaultImage.jpg";
	$img_style_logo_small = 'small';
	$image_logo_default = image_style_url($img_style_logo_small, $image_default_uri);

	if(!empty($content['field_thumbnail'])) {
		$logo_small = image_style_url($img_style_logo_small, $node->field_thumbnail[LANGUAGE_NONE][0]['uri']);
	}
	$referer = $_SERVER['HTTP_REFERER'];
	$page_alias = drupal_get_path_alias('node/' . $node->nid);
	$actual_link = $base_url. '/' . $page_alias;

	if(($referer == $actual_link) || (empty($referer))){
		$referer = $base_url . '/philippines/luxury-lifestyle-magazines';
	}
?>

<?php if (empty($admin_role) ? FALSE : TRUE) : ?>
	<div class="position-fixed z-index-above no-right">
		<div class="align-center padding-20">
			<a class="btn btn-mod btn-deep-sky-blue btn-small btn-circle scroll" target="_blank" href="<?php print $base_url; ?>/node/<?php print $node->nid; ?>/edit">Edit Page</a>
		</div>
	</div>
<?php endif; ?>
<br>
<div class="container">
	<?php 
		$breadcrumb = module_invoke("views", "block_view", "view_block-breadcrumbs_article");
		print render($breadcrumb['content']);
	?>
	<br>
	<br>
	<div class="clearfix row row-eq-height">

		<div class="col-md-12">
			<div class="bg-white padding-40 border-radius-3">
					<div>
						<?php if(!empty($content['field_video_link'])) : ?>
							<?php $video_field = trim(render($content['field_video_link'])); ?>
							<?php if (strpos($video_field,'youtu.be') || strpos($video_field,'www.youtube.com') == true): ?>
								<?php
									$old_str = ["youtu.be", "watch?v="];
									$new_str = ["www.youtube.com/embed", "embed/"];
									$str_replace_video = str_replace($old_str, $new_str, $video_field);
									$video = substr($video_field, strpos($video_field, "=") + 1);
								?>
								<div class="embed-responsive embed-responsive-size-16x9 bg-black">
									<iframe class="embed-responsive-item" src="<?php print $str_replace_video; ?>?controls=0&showinfo=0&rel=0&autoplay=0&loop=1&mute=0&playlist=<?php print $video; ?>" frameborder="0" allowfullscreen></iframe>
								</div>
							<?php else: ?>
								<?php
									$video_field = trim(render($content['field_video_link']));
									$str_replace_video = str_replace("vimeo.com", "player.vimeo.com/video", $video_field);
									$video = substr($video_field, strpos($video_field, "=") + 1);
								?>
								<div class="embed-responsive embed-responsive-size-16x9 bg-black">
									<iframe class="embed-responsive-item" src="<?php print $str_replace_video; ?>?autoplay=0&amp;loop=1" allowfullscreen="" frameborder="0" mozallowfullscreen="" width="100%" height="700" webkitallowfullscreen=""></iframe>
								</div>
							<?php endif; ?>
							<br>
						<?php endif; ?>
						<?php if(!empty($content['field_image'])) : ?>
							<div class="align-center"><?php print render($content['field_image']); ?></div>
							<br>
						<?php endif; ?>
					</div>
					<div>
						<h1 class="font-size-24 font-size-22-sm no-margin align-center padding-10 no-padding-top no-padding-left no-padding-right"><?php print($title);?></h1>
						<div class="align-center">
							<?php 

								if(!empty($content['field_pro_parent_category'])) : 
									$items = field_get_items('node', $node, 'field_pro_parent_category');
									foreach ($items as $item) {
										$pcid = $item['target_id'];
										$pc_node = node_load($pcid);
										$pc_array[] = $pc_node->title;
									}
									$category_type =  implode(" | " , $pc_array);
								endif; 
							

								if(!empty($content['field_type_of_contribution'])) : 

									$field = field_info_field('field_type_of_contribution');
									$items = field_get_items('node', $node, 'field_type_of_contribution');
									foreach ($items as $item) {
										$tc_array[] = $field['settings']['allowed_values'][$item['value']];
									}
									$type_of_contrib =  implode(" | " , $tc_array);

								endif; 

								if(!empty($content['field_type_of_file'])) : 

									$field = field_info_field('field_type_of_file');
									$items = field_get_items('node', $node, 'field_type_of_file');
									foreach ($items as $item) {
										$ts_array[] = $field['settings']['allowed_values'][$item['value']];
									}
									$type_of_support =  implode(" | " , $ts_array);
								
								endif; 

							?>
							
							<div class="font-alt padding-10 no-padding-bottom fw-500">
								<?php if(!empty($content['field_type_of_contribution'])) : ?> 
									<?php print $type_of_contrib; ?>
								<?php else: ?>
									<?php print node_type_get_name($type); ?> 
								<?php endif; ?>
								
								<?php if(!empty($content['field_pro_parent_category'])) : ?> 
									| <?php print $category_type; ?> 
								<?php endif; ?>

								<?php if(!empty($content['field_type_of_file'])) : ?> 
									| <?php print $type_of_support; ?> 
								<?php endif; ?>

								<?php if(!empty($content['field_global'])) : ?>
									<?php if($node->field_global['und'][0]['value'] == 1) : ?> 
										| <?php print "Global"; ?> 
									<?php else: ?>
										| <?php print "Philippines"; ?>
									<?php endif; ?>
								<?php endif; ?>
							</div>

							<div class="font-alt padding-10 fw-500 font-size-12">
								Posted on <?php print date('d F Y', $node->created) ?>
								<?php if(!empty($node->field_global_professional['und'][0]['entity']->title)): ?>
								by 
								<span class="uppercase">
									<?php print $node->field_global_professional['und'][0]['entity']->title; ?>
								</span>
								<?php endif; ?>
							</div>
								
							<div class="display-inline-block vertical-align-middle padding-20">
								<?php
									$block = module_invoke('sharethis', 'block_view', 'sharethis_block');
									print render($block['content']);
								?>
							</div>
						</div>
					</div>
					<?php if(!empty($content['body'])) : ?>
						<div><?php print render($content['body']); ?></div>
					<?php endif; ?>
				</div>
				<br>
				<br>
				<?php
					$block = module_invoke('views', 'block_view', 'field_collection-top_articles');
					print render($block['content']);
				?>
				<?php if(!empty($content['field_images'])) : ?>
					<div class="bg-white padding-30 border-radius-3">
						<h3 class="no-margin uppercase">
							Gallery
						</h3>
						<br>
						<div class="clearfix row">
							<?php
								$block = module_invoke('views', 'block_view', 'gallery-gallery_grid');
								print render($block['content']);
							?>
						</div>
					</div>
					<br>
					<br>
				<?php endif; ?>
				<?php if(!empty($content['field_professionals_connected'])) : ?>
					<div class="bg-white padding-30 border-radius-3">
						<h3 class="no-margin uppercase">
							Linked Professionals
						</h3>
						<br>
						<div class="clearfix row">
							<?php
								$block = module_invoke('views', 'block_view', 'professional-connected_short_bio_2');
								print render($block['content']);
							?>
						</div>
					</div>
					<br>
					<br>
				<?php endif; ?>
				<?php
					$similar_article = module_invoke('views', 'block_view', 'article-similar_article');
				?>
				<?php if($similar_article): ?>
					<div>
						<h3 class="no-margin uppercase">
							Similar Magazines
						</h3>
						<br>
						<?php print render($similar_article['content']); ?>
					</div>
				<?php endif; ?>
				<?php if(!empty($content['field_follow_links'])) : ?>
					<div class="bg-white padding-30 border-radius-3">
						<h3 class="no-margin uppercase">
							Follow Links
						</h3>
						<br>
						<?php print render($content['field_follow_links']); ?>
					</div>
					<br>
					<br>
				<?php endif; ?>
			</div>
		<!-- <div class="col-md-3 js-sticky-container">
			<div class="js-sticky">
				<div class="bg-white padding-10 border-radius-3">
					<div class="uppercase font-size-14 padding-10 no-padding-left no-padding-right fw-600">Posted on <?php print date('M d, Y', $node->created) ?> By:</div>
					<?php
						$block = module_invoke('views', 'block_view', 'professional-short_bio');
						print render($block['content']);
					?>
				</div>
				<br>
				<?php if(!empty($content['field_professionals_connected'])) : ?>
					<div class="bg-white padding-10 border-radius-3">
						<div class="uppercase font-size-14 padding-10 no-padding-left no-padding-right fw-600">Linked Professionals</div>
						<?php 
							$block = module_invoke('views', 'block_view', 'professional-connected');
							print render($block['content']);
						?>
					</div>
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
			</div>
		</div> -->
		
	</div>
</div>
<?php if ($node->status == 0): ?>
	<div class=" alert error"><i class="fa fa-lg fa-exclamation-triangle"></i> This page is pending and still waiting for approval therefore not viewable by others.</div>
	<!-- Unpublish Modal -->
	<div id="status-modal" class="modal fade" role="dialog">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-body rtecenter font-size-12 color-red">
		      	This page is pending and still waiting for approval therefore not viewable by others.
		      </div>
		    </div>
		</div>
	</div>
<?php endif; ?>