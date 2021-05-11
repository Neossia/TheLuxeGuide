<?php
	global $user;
	$admin_role = array_intersect(array('administrator'), array_values($user->roles));
	$web_admin = array_intersect(array('website admin'), array_values($user->roles));
?>
<?php if (empty($admin_role) ? FALSE : TRUE) : ?>
	<?php print drupal_render_children($form);?>
<?php elseif (empty($web_admin) ? FALSE : TRUE) : ?>
	<?php hide($form['regions']); ?>
	<?php hide($form['visibility']); ?>
	<?php hide($form['visibility_title']); ?>
	<div class="container">
	<br>
	<div class="custom-accordion"><?php print render($form['dexp_block_settings']); ?></div>
	<br>
		<div class="bg-light-grey border-radius-3 padding-15">
			<?php print render($form['settings']); ?>
		</div>
	</div>
	<br>
	<div class="centered"><?php print drupal_render_children($form);?></div>
	<br>
<?php endif; ?>
