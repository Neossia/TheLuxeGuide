<?php print render($form['field_message']); ?>
<div class="clearfix row">
	<div class="col-md-2">
		<?php print render($form['field_honorifics']); ?>
	</div>
	<div class="col-md-5">
		<?php print render($form['field_first_name']); ?>
	</div>
	<div class="col-md-5">
		<?php print render($form['field_last_name']); ?>
	</div>
</div>
<div class="clearfix row">
	<div class="col-md-6">
		<?php print render($form['field_email']); ?>
	</div>
	<div class="col-md-6">
		<?php print render($form['field_contact_number']); ?>
	</div>
	<div class="col-md-6">
		<?php print render($form['field_location_text']); ?>
	</div>
	<div class="col-md-6">
		<?php print render($form['field_location_request_text']); ?>
	</div>
	<div class="col-md-6">
		<?php print render($form['field_area_code']); ?>
	</div>
	<div class="col-md-6">
		<?php print render($form['field_company_name']); ?>
	</div>
</div>
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


