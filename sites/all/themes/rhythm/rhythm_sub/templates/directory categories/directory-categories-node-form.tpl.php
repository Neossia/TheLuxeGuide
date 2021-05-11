<?php
	global $base_url;
	hide($form['actions']['delete']);
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
		<h1 class="uppercase letter-spacing-3 align-center no-margin">Directory Categories Page</h1>
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
					<h3 class="no-margin uppercase">Media Tab</h3>
					<br>
					<?php print render($form['field_media_title']); ?>
					<?php print render($form['field_media_description']); ?>
					<?php print render($form['field_media_middle_content']); ?>
					<?php print render($form['field_media_lower_content']); ?>
					<div class="bg-medium-grey padding-15">
						<?php print render($form['field_media_seo_title']); ?>
						<?php print render($form['field_media_meta_desc']); ?>
					</div>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Professional Tab</h3>
					<br>
					<?php print render($form['field_pro_title']); ?>
					<?php print render($form['field_pro_description']); ?>
					<?php print render($form['field_pro_middle_content']); ?>
					<?php print render($form['field_pro_lower_content']); ?>
					<div class="bg-medium-grey padding-15">
						<?php print render($form['field_pro_seo_title']); ?>
						<?php print render($form['field_pro_meta_desc']); ?>
					</div>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Buy & Sell Tab</h3>
					<br>
					<?php print render($form['field_buy_sell_title']); ?>
					<?php print render($form['field_buy_sell_description']); ?>
					<?php print render($form['field_buy_sell_middle_content']); ?>
					<?php print render($form['field_buy_sell_lower_content']); ?>
					<div class="bg-medium-grey padding-15">
						<?php print render($form['field_buy_sell_seo_title']); ?>
						<?php print render($form['field_buy_sell_meta_desc']); ?>
					</div>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Rental Tab</h3>
					<br>
					<?php print render($form['field_rent_title']); ?>
					<?php print render($form['field_rent_description']); ?>
					<?php print render($form['field_rent_middle_content']); ?>
					<?php print render($form['field_rent_lower_content']); ?>
					<div class="bg-medium-grey padding-15">
						<?php print render($form['field_rent_seo_title']); ?>
						<?php print render($form['field_rent_meta_desc']); ?>
					</div>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Model & Pricelist Tab</h3>
					<br>
					<?php print render($form['field_model_title']); ?>
					<?php print render($form['field_model_description']); ?>
					<?php print render($form['field_model_middle_content']); ?>
					<?php print render($form['field_model_lower_content']); ?>
					<div class="bg-medium-grey padding-15">
						<?php print render($form['field_model_seo_title']); ?>
						<?php print render($form['field_model_meta_desc']); ?>
					</div>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Travels Tab</h3>
					<br>
					<?php print render($form['field_experience_title']); ?>
					<?php print render($form['field_experience_description']); ?>
					<?php print render($form['field_experience_middle_content']); ?>
					<?php print render($form['field_experience_lower_content']); ?>
					<div class="bg-medium-grey padding-15">
						<?php print render($form['field_experience_seo_title']); ?>
						<?php print render($form['field_experience_meta_desc']); ?>
					</div>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Event Agenda Tab</h3>
					<br>
					<?php print render($form['field_event_title']); ?>
					<?php print render($form['field_event_description']); ?>
					<?php print render($form['field_event_middle_content']); ?>
					<?php print render($form['field_event_lower_content']); ?>
					<div class="bg-medium-grey padding-15">
						<?php print render($form['field_event_seo_title']); ?>
						<?php print render($form['field_event_meta_desc']); ?>
					</div>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Deals & Experiences Tab</h3>
					<br>
					<?php print render($form['field_deals_title']); ?>
					<?php print render($form['field_deals_description']); ?>
					<?php print render($form['field_deals_middle_content']); ?>
					<?php print render($form['field_deals_lower_content']); ?>
					<div class="bg-medium-grey padding-15">
						<?php print render($form['field_deals_seo_title']); ?>
						<?php print render($form['field_deals_meta_desc']); ?>
					</div>
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
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Areas to Generate</h3>
					<br>
					<div class="checkbox-col-3">
						<?php print render($form['field_area']); ?>
					</div>
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
<div class="hide"><?php print drupal_render_children($form);?></div>