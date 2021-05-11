<?php $img_style = 'image_gallery'; ?>
<?php $image_banner_default_uri = "public://LXVDefaultImage.jpg" ?>
<?php $image_banner_default = image_style_url($img_style, $image_banner_default_uri); ?>
<?php
	$count = 1;
	$arr_rows = $view->style_plugin->rendered_fields; ?>
		<?php
		foreach ($arr_rows as $key => $arr_row): ?>
			<?php if(!empty($arr_row['field_thumbnail'])): ?>
				<?php if (($count % 2) == 0): ?>
					<div class="bg-white">
						<div class="clearfix row-eq-height">
							<div class="col-md-6 col-md-push-6 col-sm-12 col-xs-12 no-padding column-vertical-align">
								<?php if(!empty($arr_row['field_thumbnail'])): ?>
									<div class="align-center full-width festive-filter"><?php print $arr_row['field_thumbnail']; ?></div>
								<?php else: ?>
									<div class="align-center full-width festive-filter"><img src="<?php print $image_banner_default; ?>"></div>
								<?php endif; ?>
							</div>
							<div class="col-md-6 col-md-pull-6 col-sm-12 col-xs-12 no-padding column-vertical-align">	
								<br>
								<div class="clearfix">
									<div class="col-md-10 col-md-offset-1 overflow-height-container">
										<h4 class="no-margin uppercase align-center fw-500"><?php print $arr_row['field_title']; ?></h4>
										<?php if(!empty($arr_row['field_description'])): ?>
											<br>
											<div class="align-justify"><?php print $arr_row['field_description']; ?></div>
										<?php endif; ?>
									</div>
								</div>
								<br>
							</div>
						</div>
					</div>
				<?php else: ?>
					<div class="bg-white">
						<div class="clearfix row-eq-height">
							<div class="col-md-6 col-sm-12 col-xs-12 no-padding column-vertical-align">
								<?php if(!empty($arr_row['field_thumbnail'])): ?>
									<div class="align-center full-width festive-filter"><?php print $arr_row['field_thumbnail']; ?></div>
								<?php else: ?>
									<div class="align-center full-width festive-filter"><img src="<?php print $image_banner_default; ?>"></div>
								<?php endif; ?>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12 no-padding column-vertical-align">
								<br>
								<div class="clearfix">
									<div class="col-md-10 col-md-offset-1 overflow-height-container">
										<h4 class="no-margin uppercase align-center fw-500"><?php print $arr_row['field_title']; ?></h4>
										<?php if(!empty($arr_row['field_description'])): ?>
											<br>
											<div class="align-justify"><?php print $arr_row['field_description']; ?></div>
										<?php endif; ?>
									</div>
								</div>
								<br>
							</div>
						</div>
					</div>
			    <?php endif; ?>
			<?php else: ?>
				<div class="bg-white">
					<div class="padding-15 no-padding-top no-padding-bottom">
						<br>
						<h4 class="no-margin uppercase align-center fw-500"><?php print $arr_row['field_title']; ?></h4>
						<br>
						<?php if(!empty($arr_row['field_description'])): ?>
							<br>
							<div class="align-justify"><?php print $arr_row['field_description']; ?></div>
						<?php endif; ?>
						<br>
					</div>
				</div>
			<?php endif; ?>
<?php $count++;endforeach;?>