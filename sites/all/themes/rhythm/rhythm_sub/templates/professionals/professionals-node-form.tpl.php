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
		<h1 class="uppercase letter-spacing-3 align-center no-margin">Add a Professional</h1>
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
					<?php print render($form['field_year']); ?>
					<?php print render($form['field_heritage']); ?>
					<?php print render($form['field_teaser_description']); ?>
					<?php print render($form['field_short_teaser_description']); ?>
					<?php print render($form['body']); ?>
					<?php print render($form['field_history']); ?>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Contact Information (For The Luxe Guide Only)</h3>
					<br>
					<?php print render($form['field_full_name']); ?>
					<?php print render($form['field_position']); ?>
					<?php print render($form['field_email']); ?>
					<?php print render($form['field_contact_number']); ?>
					<?php print render($form['field_country_operation']); ?>
					<?php print render($form['field_contact_channel']); ?>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Social Medias (Will be displayed on your page)</h3>
					<br>
					<?php print render($form['field_followers_count']); ?>
					<?php print render($form['field_website']); ?>
					<?php print render($form['field_facebook']); ?>
					<?php print render($form['field_instagram']); ?>
					<?php print render($form['field_youtube']); ?>
					<?php print render($form['field_tiktok']); ?>
					<?php print render($form['field_google_id']); ?>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Featured Highlights</h3>
					<br>
					<?php print render($form['field_feature_details']); ?>
				</div>
				<br>
				<br>
				<!-- <div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Banner</h3>
					<br>
					<p class="custom-field-description align-center font-size-12">Upload a high definition image for Banner. <strong>This will appear on the brand page itself.</strong>
					<br>
					Image size should be: <strong>(1800x600)</strong> Upload size is <strong>300 KB</strong> or less.</p>
					<br>
					<div class="align-center margin-auto-input">
						<?php /* print render($form['field_image']); */ ?>
					</div>
				</div>
				<br>
				<br> -->
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Thumbnail</h3>
					<br>
					<p class="custom-field-description align-center font-size-12">Upload a high definition image for Banner. <strong>This will appear on the brand page itself.</strong>
					<br>
					Image size should be: <strong>(800x600)</strong> Upload size is <strong>300 KB</strong> or less.</p>
					<br>
					<div class="align-center margin-auto-input">
						<?php print render($form['field_thumbnail']); ?>
					</div>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Logo</h3>
					<br>
					<p class="custom-field-description align-center font-size-12">Upload a high definition image for Logo.
					<br>
					Image size should be: <strong>(480x480)</strong> Upload size is <strong>300 KB</strong> or less.</p>
					<br>
					<div class="align-center margin-auto-input">
						<?php print render($form['field_logo']); ?>
					</div>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Gallery</h3>
					<br>
					<p class="custom-field-description font-size-10">Upload a high definition image for gallery.
					<br>
					Image size should be: <strong>(800x600)</strong> Upload size is <strong>300 KB</strong> or less.</p>
					<br>
					<div class="align-center margin-auto-input">
						<?php print render($form['field_images']); ?>
					</div>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Linked Businesses</h3>
					<br>
					<?php print render($form['field_affiliation']); ?>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Terms and Conditions</h3>
					<br>
					<p class="custom-field-description">Thanks for your interest in The Luxe Guide. Aside from being the most complete directory of  luxury professionals in the world, our main goal is to create a real bespoke relationship with each professionals, understand their needs and provide them the perfect tools to gain online visibility and awareness. </p>

					<p class="custom-field-description">Each professional will have an account specialist to assist assist theim in creating the most efficient content and marketing campaigns.</p>
					<br>
					<div class="clearfix">
						<div class="col-md-1 no-padding align-center"><?php print render($form['field_term_1']); ?></div>
						<div class="col-md-11 no-paddding custom-field-description font-size-10">
							I understand that The Luxe Guide has the right to refuse any professional page at its own choice. 
						</div>
					</div>
					<div class="clearfix">
						<div class="col-md-1 no-padding align-center"><?php print render($form['field_term_2']); ?></div>
						<div class="col-md-11 no-paddding custom-field-description font-size-10">
							I understand that all pages created on The Luxe Guide and content added or links belongs to The Luxe Guide. Deleting or content will need to be approved by The Luxe Guide.
						</div>
					</div>
					<div class="clearfix">
						<div class="col-md-1 no-padding align-center"><?php print render($form['field_term_3']); ?></div>
						<div class="col-md-11 no-paddding custom-field-description font-size-10">
							I understand that The Luxe Guide will review every listing, event, or any contribution. Only the ones high quality content, pictures and videos will be validated. The Luxe Guide has also the right to refuse any posting at its own notice without any explanation.
						</div>
					</div>
				</div>
				<br>
				<br>
				<?php if (empty($admin) ? FALSE : TRUE) : ?>
					<h3 class="no-margin uppercase align-center">Neossia Field Only</h3>
					<br>
					<br>
					<div class="bg-light-grey border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Reference Number & Google Drive</h3>
						<br>
						<?php print render($form['field_ref_number']); ?>
						<?php print render($form['field_google_drive']); ?>
					</div>
					<br>
					<br>
					<div class="bg-light-grey border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Services</h3>
						<br>
						<?php print render($form['field_pro_parent_category']); ?>
						<?php print render($form['field_category_tab']); ?>
						<?php print render($form['field_sub_category_connected']); ?>
					</div>
					<br>
					<br>
					<div class="bg-light-grey border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Luxury Level</h3>
						<br>
						<?php print render($form['field_luxury_level']); ?>
					</div>
					<br>
					<br>
					<div class="bg-light-grey border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Elfsight</h3>
						<br>
						<?php print render($form['field_elfsight_facebook']); ?>
						<?php print render($form['field_elfsight_instagram']); ?>
						<?php print render($form['field_elfsight_youtube']); ?>
					</div>
					<br>
					<br>
					<div class="bg-light-grey border-radius-3 padding-15">
						<h3 class="no-margin uppercase">SEO</h3>
						<br>
						<?php print render($form['field_premium_professional']); ?>
						<br>
						<div class="bg-medium-grey padding-15">
							<h3 class="no-margin uppercase">Global SEO</h3>
							<br>
							<p class="custom-field-description font-size-12">Do <b class="color-red">not</b> use @YEAR, @COUNTRY, @AREA</p>
							<br>
							<?php print render($form['field_seo_title']); ?>
							<?php print render($form['field_meta_description']); ?>
						</div>
						<br>
						<div class="bg-medium-grey padding-15">
							<h3 class="no-margin uppercase">SEO generated information per location </h3>
							<br>
							<p class="custom-field-description font-size-12"><b class="color-green">Use</b> @YEAR, @COUNTRY, @AREA</p>
							<br>
							<?php print render($form['field_seo_title_generated']); ?>
							<?php print render($form['field_meta_description_generated']); ?>
						</div>
					</div>
					<br>
					<br>
					<div class="bg-light-grey border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Old fields from import and generation</h3>
						<?php print render($form['field_brand_name']); ?>
						<?php print render($form['field_brand_uniqueness']); ?>
						<?php print render($form['field_current_models']); ?>
						<?php print render($form['field_description']); ?>
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
					<h3 class="no-margin uppercase">Experience Tab</h3>
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
					<h3 class="no-margin uppercase">Countries</h3>
					<br>
					<?php print render($form['field_country_area']); ?>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Areas</h3>
					<br>
					<?php print render($form['field_area']); ?>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Video</h3>
					<br>
					<?php print render($form['field_professional_video']); ?>
				</div>
				<br>
				<br>
				<?php endif; ?>
				<div class="bg-light-grey border-radius-3 padding-15">
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
	<div class="hide"><?php print drupal_render_children($form);?></div>
</div>