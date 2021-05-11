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

<div class="bg-white padding-40 align-center">
	<h1 class="no-margin padding-10 no-padding-top no-padding-left no-padding-right display-inline-block fw-600"><?php print($node->title); ?> Guide</h1>
	<div class="font-size-12 font-size-10-sm letter-spacing-3">
		<h4 class="no-margin">Luxury Directory in <?php print render($content['field_country_area']); ?></h4>
	</div>
</div>
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
<?php
	$block = module_invoke('block', 'block_view', '74');
	if ($block):
?>
	<?php print render($block['content']); ?>
<?php endif; ?>
<?php
	$block = module_invoke('block', 'block_view', '76');
	if ($block):
?>
	<?php print render($block['content']); ?>
<?php endif; ?>
<?php
	$block = module_invoke('block', 'block_view', '75');
	if ($block):
?>
	<?php print render($block['content']); ?>
<?php endif; ?>
<?php
	$block = module_invoke('block', 'block_view', '77');
	if ($block):
?>
	<?php print render($block['content']); ?>
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
