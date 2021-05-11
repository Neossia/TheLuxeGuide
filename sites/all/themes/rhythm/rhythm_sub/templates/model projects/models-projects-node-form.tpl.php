<?php
	global $base_url;
	hide($form['actions']['delete']);
?>
<?php if($node = menu_get_object()): ?>
	<?php
		$page_title = $node->title;
		$page_id = $node->nid;
		$alias = drupal_get_path_alias('node/' . $node->nid);
	?>
	<br>
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-offset-1 col-md-10">
				<div class="row clearfix">
					<div class="col-md-10 col-sm-12 col-xs-12">
						<br>
						<h1 class="no-margin"><?php print $page_title; ?></h1>
						<div class="font-size-12">Reference ID: <?php print $page_id; ?></div>
						<br>
					</div>
					<div class="col-md-2 col-sm-12 col-xs-12">
						<br>
						<div><a class="btn btn-mod btn-deep-sky-blue btn-small btn-circle uppercase full-width" target = "_blank" href="<?php print $base_url . '/' . $alias; ?>">View Page </a></div>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
<?php else: ?>
	<br>
	<br>
	<h1 class="uppercase letter-spacing-3 align-center no-margin">Models & Projects</h1>
	<br>
	<br>
<?php endif; ?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-offset-1 col-md-10">
			<div class="bg-white border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Basic Information</h3>
				<br>
				<?php print render($form['title']); ?>
				<?php print render($form['field_global_professional']); ?>
				<?php print render($form['field_pro_parent_category']); ?>
				<?php print render($form['field_sub_category_connected']); ?>
				<?php print render($form['field_teaser_description']); ?>
				<?php print render($form['body']); ?>
			</div>
			<br>
			<br>
			<div class="bg-white border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Variants</h3>
				<br>
				<?php print render($form['field_currency']); ?>
				<?php print render($form['field_variants_and_price']); ?>
				<br>
				<?php print render($form['field_agent_commission']); ?>
				<?php print render($form['field_commission_rate']); ?>
			</div>
			<br>
			<br>
			<div class="bg-white border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Highlights</h3>
				<br>
				<?php print render($form['field_feature_details']); ?>
			</div>
			<br>
			<br>
			<div class="bg-white border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Add Visuals</h3>
				<br>
				<!----------------------------- Gallery -------------------------------->
				<h4 class="no-margin uppercase">Gallery</h4>
				<br>
				<p class="custom-field-description font-size-10">Upload a high definition image for gallery.<strong>This will appear on the lower part of the brand page.</strong>
				<br>
				Image size should be: <strong>(800x600)</strong> Upload size is <strong>300 KB</strong> or less.</p>
				<?php print render($form['field_images']); ?>
				<br>
				<!----------------------------- Thumbnail -------------------------------->
				<h4 class="no-margin uppercase">Thumbnail</h4>
				<br>
				<p class="custom-field-description font-size-10">Upload a high definition image for thumbnail.<strong>This will appear on the brand directories.</strong>
				<br>
				Image size should be: <strong>(800x600)</strong> Upload size is <strong>300 KB</strong> or less.</p>
				<?php print render($form['field_thumbnail']); ?>
				<br>
				<!----------------------------- Video Links -------------------------------->
				<h4 class="no-margin uppercase">Youtube | Vimeo Video Link</h4>
				<br>
				<p class="custom-field-description font-size-10">Copy and paste the link of your YouTube or Vimeo link.</p>
				<?php print render($form['field_video_link']); ?>
				<br>
			</div>
			<br>
			<br>
			<div class="bg-white border-radius-3 padding-15">
				<h3 class="no-margin uppercase">LXV Fields</h3>
				<br>
				<?php print render($form['field_ref_number']); ?>
				<?php print render($form['field_professionals_connected']); ?>
			</div>
			<br>
			<br>
			<div class="bg-white border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Area</h3>
				<br>
				<div clas="item-col-3">
					<?php print render($form['field_area']); ?>
				</div>
			</div>
			<br>
			<br>
			
			<div class="bg-white border-radius-3 padding-15">
				<h3 class="no-margin uppercase">SEO</h3>
				<br>
				<?php print render($form['field_seo_title']); ?>
				<?php print render($form['field_meta_description']); ?>
				<?php print render($form['additional_settings']); ?>
			</div>
			<br>
			<br>
		</div>
	</div>
</div>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-offset-3 col-md-6">
			<div class="align-center full-width-btn">
				<?php print drupal_render($form['actions']['submit']); ?>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<div class="hide"><?php print drupal_render_children($form);?></div>