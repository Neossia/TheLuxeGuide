<?php
	global $base_url;
	global $str_username;
	$user_id = arg(1);
	$user_page = user_load(arg(1));
	$admin_role = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
	$seller_role = array_intersect(array('seller'), array_values($user_page->roles));
	$prof_role = array_intersect(array('professional dealer'), array_values($user_page->roles));
	$username = $user->name;
	$str_username = str_replace(' ', '-', strtolower($username));
	$img_style_logo_small = 'small';
	$image_default_uri = "public://LXVAnonDefaultImage.jpg";
	$image_logo_default = image_style_url($img_style_logo_small, $image_default_uri);
?>
<div class="bg-white">
	<div class="padding-10">
		<div class="display-flex clearfix">
			<div class="col-md-10 col-sm-10 col-xs-9 col-centered no-float display-inline-block vertical-align-middle">
				<h1 class="no-margin padding-10 no-padding-top no-padding-left no-padding-right display-inline-block fw-600 font-size-16-sm"><?php print render($user_page->field_first_name['und']['0']['value']); ?> <?php print render($user_page->field_last_name['und']['0']['value']); ?></h1>
				<div class="uppercase font-size-12 font-size-10-sm letter-spacing-3">
					<span class="color-deep-sky-blue fw-600">Profile</span>
				</div>
			</div>
		</div>
	</div>
</div>
<ul class="bg-dark-grey color-white custom-nav-bars nav nav-tabs align-center font-size-12" role="tablist">
	<li role="presentation" class="active col-md-2 no-padding"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
	<li role="presentation" class="col-md-2 no-padding"><a href="#propages" aria-controls="propages" role="tab" data-toggle="tab">Professional Pages</a></li>
	<li role="presentation" class="col-md-2 no-padding"><a href="#listings" aria-controls="listings" role="tab" data-toggle="tab">Listings</a></li>
</ul>
<div class="padding-60 padding-15-sm no-padding-top no-padding-bottom">
	<div class="row clearfix">
		<div class="col-md-9">
			<br>
			<br>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="home">
					<?php if(!empty($user_page->field_image)): ?>
						<?php 
							$user_item = user_load($user_page->uid);
							$user_banner = theme('image_style', array('style_name' => 'full_width_banner', 'path' => $user_page->field_image[LANGUAGE_NONE][0]['uri']));
							if(!empty($user_banner)):
						?>
							<div class="full-width festive-filter border-radius-img-top-left-3 border-radius-img-top-right-3"><?php print $user_banner; ?></div>
						<?php endif; ?>
					<?php endif; ?>
					<div class="bg-white padding-15 border-radius-3">
						<div class="no-margin font-alt font-size-24 fw-600"><?php print render($user_page->field_first_name['und']['0']['value']); ?> <?php print render($user_page->field_last_name['und']['0']['value']); ?></div>
						<?php if(!empty($user_page->field_description)): ?>
							<br>
							<div><?php print $user_page->field_description['und'][0]['value']; ?></div>
						<?php endif; ?>
					</div>
					<br>
					<br>
					<?php
						$block = module_invoke('views', 'block_view', 'profile-pro_pages');
						if ($block):
					?>
						<div class="bg-white no-padding-bottom border-radius-3">
							<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">Professional Pages</h3>
							<br>
							<div class="padding-15 no-padding-bottom"><?php print render($block['content']); ?></div>
						</div>
						<br>
						<br>
					<?php endif; ?>
					<?php
						$block = module_invoke('views', 'block_view', 'profile-listings');
						if ($block):
					?>
						<div class="bg-white no-padding-bottom border-radius-3">
							<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">Listings</h3>
							<br>
							<div class="padding-15 no-padding-bottom"><?php print render($block['content']); ?></div>
						</div>
						<br>
						<br>
					<?php endif; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="propages">
					<?php
						$block = module_invoke('views', 'block_view', 'profile-pro_pages');
						if ($block):
					?>
						<div class="bg-white no-padding-bottom border-radius-3">
							<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">Professional Pages</h3>
							<br>
							<div class="padding-15 no-padding-bottom"><?php print render($block['content']); ?></div>
						</div>
						<br>
						<br>
					<?php endif; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="listings">
					<?php
						$block = module_invoke('views', 'block_view', 'profile-listings');
						if ($block):
					?>
						<div class="bg-white no-padding-bottom border-radius-3">
							<h3 class="no-margin font-alt font-size-24 fw-600 border-bottom-grey padding-15">Listings</h3>
							<br>
							<div class="padding-15 no-padding-bottom"><?php print render($block['content']); ?></div>
						</div>
						<br>
						<br>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<br>
			<br>
		</div>
	</div>
</div>