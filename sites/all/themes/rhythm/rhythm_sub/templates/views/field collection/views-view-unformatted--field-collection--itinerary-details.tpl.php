<?php 	
	$img_style = 'image_gallery'; 
	$image_banner_default_uri = "public://LXVAnonDefaultImage.jpg";
	$image_banner_default = image_style_url($img_style, $image_banner_default_uri); 

	$count = 1;
	$arr_rows = $view->style_plugin->rendered_fields; 
	
	foreach ($arr_rows as $key => $arr_row): 
?>
	<?php /* if(!empty($arr_row['field_thumbnail'])): */ ?>
		<div class="bg-white">
			<div class="clearfix row-eq-height">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<?php if(!empty($arr_row['field_thumbnail'])): ?>
						<div class="align-center full-width festive-filter"><?php print $arr_row['field_thumbnail']; ?></div>
					<?php else: ?>
						<div class="align-center full-width festive-filter"><img src="<?php print $image_banner_default; ?>"></div>
					<?php endif; ?>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12 no-padding">
					<div class="clearfix">
						<div class="col-xs-12 col-sm-12 col-md-11 overflow-height-container">
							<h4 class="padding-5 no-padding-bottom no-padding-left no-padding-right no-margin align-left fw-700 font-size-14"><?php print $arr_row['field_title']; ?></h4>
							<?php if(!empty($arr_row['field_description'])): ?>
								<div class="padding-10 no-padding-bottom no-padding-left no-padding-right align-justify font-size-11"><?php print $arr_row['field_description']; ?></div>
							<?php endif; ?>
							<?php if(!empty($arr_row['field_accommodation'])): ?>
								<div class="padding-10 no-padding-bottom no-padding-left no-padding-right fw-600 uppercase font-size-11">Accommodations:</div>
								<div class="align-justify font-size-11"><?php print $arr_row['field_accommodation']; ?></div>
							<?php endif; ?>
							<?php if(!empty($arr_row['field_meals'])): ?>
								<div class="padding-10 no-padding-bottom no-padding-left no-padding-right fw-600 uppercase font-size-11">Meals:</div>
								<div class="align-justify font-size-11"><?php print $arr_row['field_meals']; ?></div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="border-bottom-custom"></div>
		<br>
	<?php /* else: ?>
		<div class="bg-white">
			<div class="padding-15 no-padding-top no-padding-bottom">
				<h4 class="no-margin uppercase align-center fw-600"><?php print $arr_row['field_title']; ?></h4>
				<br>
				<?php if(!empty($arr_row['field_description'])): ?>
					<br>
					<div class="align-justify"><?php print $arr_row['field_description']; ?></div>
				<?php endif; ?>
				<?php if(!empty($arr_row['field_accommodation'])): ?>
					<br>
					<div class="fw-600 uppercase">Accommodations:</div>
					<div class="align-justify"><?php print $arr_row['field_accommodation']; ?></div>
				<?php endif; ?>
				<?php if(!empty($arr_row['field_meals'])): ?>
					<br>
					<div class="fw-600 uppercase">Meals:</div>
					<div class="align-justify"><?php print $arr_row['field_meals']; ?></div>
				<?php endif; ?>
				<br>
			</div>
		</div>
	<?php endif; */ ?>
<?php endforeach;?>