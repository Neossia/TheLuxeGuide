<?php print render($form['field_full_name']); ?>
<?php print render($form['field_listing_type']); ?>
<?php print render($form['field_nature_of_listing']); ?>
<?php print render($form['field_location_text']); ?>
<?php print render($form['field_contact_number']); ?>
<?php print render($form['field_email']); ?>
<div class="align-center">
	<?php print render($form['field_accept_newsletter']); ?>
	<br>
	<?php print drupal_render($form['actions']['captcha']);?>
	<br>
	<div class="padding-5 no-padding-left no-padding-right no-padding-bottom"><?php print drupal_render($form['actions']['submit']); ?></div>
</div>
<div class="hide">
	<?php print drupal_render_children($form); ?>
</div>