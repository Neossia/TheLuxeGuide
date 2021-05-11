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
?>
<?php if (empty($admin_role) ? FALSE : TRUE) : ?>
	<div class="position-fixed z-index-above no-right">
		<div class="align-center padding-20">
			<a class="btn btn-mod btn-deep-sky-blue btn-small btn-circle scroll" target="_blank" href="<?php print $base_url; ?>/node/<?php print $node->nid; ?>/edit">Edit Page</a>
		</div>
	</div>
<?php endif; ?>
<?php if(!empty($content['field_image'])): ?>
	<div class="full-width festive-filter padding-100 padding-60-sm no-padding-left no-padding-right align-center page-section bg-scroll banner-section" style="background-image: url(<?php print $image_banner; ?>);">
		<div class="container">
			<div class="col-md-6 col-centered no-float bg-white-opacity padding-40">
				<h1 class="no-margin padding-10 no-padding-top no-padding-left no-padding-right display-inline-block fw-600"><?php print($node->title); ?></h1>
			</div>
		</div>
	</div>
	<?php else: ?>
	<div class="full-width festive-filter padding-100 padding-60-sm no-padding-left no-padding-right align-center page-section bg-scroll banner-section" style="background-image: url(<?php print $image_banner_default; ?>);">
		<div class="container">
			<div class="col-md-6 col-centered no-float bg-white-opacity padding-40">
				<h1 class="no-margin padding-10 no-padding-top no-padding-left no-padding-right display-inline-block fw-600"><?php print($node->title); ?></h1>
			</div>
		</div>
	</div>
<?php endif; ?>
<br>
<br>
<?php if(!empty($content['body'])) : ?>
	<div class="container">
		<div class="bg-white border-radius-3 padding-15">
			<?php print render($content['body']); ?>
		</div>
	</div>
	<br>
	<br>
<?php endif; ?>
<?php if(!empty($content['field_php_filter'])) : ?>
	<?php print render($content['field_php_filter']); ?>
<?php endif; ?>
<?php if(!empty($content['field_content'])) : ?>
	<div class="clearfix"><?php print render($content['field_content']); ?></div>
<?php endif; ?>
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
