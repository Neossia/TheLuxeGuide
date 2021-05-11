<?php
	global $base_url;
	$admin = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
?>
<div class="bg-white">
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
		<h1 class="uppercase letter-spacing-3 align-center no-margin">Add a Service</h1>
		<br>
		<br>
	<?php endif; ?>
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-offset-1 col-md-10">
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Global Home Information</h3>
					<br>
					<?php print render($form['title']); ?>
					<?php print render($form['field_title']); ?>
					<div class="checkbox-col-3"><?php print render($form['field_category_tab']); ?></div>
					<div class="bg-medium-grey padding-15">
						<?php print render($form['field_seo_title']); ?>
						<?php print render($form['field_meta_description']); ?>
					</div>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">SEO Generated Information</h3>
					<br>
					<?php print render($form['field_seo_title_generated']); ?>
					<?php print render($form['field_meta_description_generated']); ?>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Banner</h3>
					<br>
					<p class="custom-field-description align-center font-size-12">Upload a high definition image for Banner. <strong>This will appear on the brand page itself.</strong>
					<br>
					Image size should be: <strong>(1800x600)</strong> Upload size is <strong>300 KB</strong> or less.</p>
					<br>
					<div class="align-center margin-auto-input">
						<?php print render($form['field_image']); ?>
					</div>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Global Home Tab</h3>
					<br>
					<?php print render($form['body']); ?>
					<?php print render($form['field_middle_content']); ?>
					<?php print render($form['field_lower_content']); ?>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Unique Content per Country and Area</h3>
					<br>
					<?php print render($form['field_area_details']); ?>
				</div>
				<br>
				<br>
				<div>
					<h3 class="no-margin uppercase">Additional Settings</h3>
					<br>
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
</div>
<div class=""><?php print drupal_render_children($form);?></div>