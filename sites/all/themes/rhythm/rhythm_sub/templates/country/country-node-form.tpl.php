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
		<h1 class="uppercase letter-spacing-3 align-center no-margin">Add a Country</h1>
		<br>
		<br>
	<?php endif; ?>
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-offset-1 col-md-10">
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Basic Information</h3>
					<br>
					<?php print render($form['title']); ?>
					<?php print render($form['field_geo_location']); ?>
					<?php print render($form['body']); ?>
				</div>
				<br>
				<br>
				<?php if (empty($admin) ? FALSE : TRUE) : ?>
					<div class="bg-light-grey border-radius-3 padding-15">
						<h3 class="no-margin uppercase">SEO</h3>
						<br>
						<?php print render($form['field_seo_title']); ?>
						<?php print render($form['field_meta_description']); ?>
						<?php print render($form['additional_settings']); ?>
					</div>
					<br>
					<br>
				<?php endif; ?>
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
</div>