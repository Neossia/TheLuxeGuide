<?php
	$node = menu_get_object();
	$tl_verify = 0;
	global $user;
	global $base_url;
	$admin = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
	if(isset($_GET['tlid']) && isset($_GET['mcid'])) {
		$query = new EntityFieldQuery;
		$result = $query->entityCondition('entity_type', 'node')
						->entityCondition('bundle', 'directory_categories')
						->propertyCondition('status', NODE_PUBLISHED)
						->propertyCondition('nid', $_GET['mcid'])
						->execute();
		if (!empty($result['node'])) {
			$main_category_node = node_load($_GET['mcid']);
			$main_category_nid = $main_category_node->nid;	
		}

		$pro_query = new EntityFieldQuery;
		$pro_result = $pro_query->entityCondition('entity_type', 'node')
						->entityCondition('bundle', 'professionals')
						->propertyCondition('status', NODE_PUBLISHED)
						->propertyCondition('nid', $_GET['pid'])
						->execute();
		if (!empty($pro_result['node'])) {
			$professional_node = node_load($_GET['pid']);
			$professional_nid = $professional_node->nid;
		}

		
		$listing_type_id = $_GET['tlid'];
		$field_tl = field_info_field('field_category_tab');
		$tl_allowed_values = list_allowed_values($field_tl);
		foreach($tl_allowed_values as $key => $value){
			if($listing_type_id == $key){
				$listing_type_name = $value;
				$tl_verify = 1;
			}
		}
	}
?>
<!-- BEGINNING OF ADD NODE CODE -->
<?php if (strpos(request_path(), '/add') !== FALSE): ?>
	<br>
	<br>
	<div class="container form">
		<div class="row clearfix">
			<div class="col-md-offset-1 col-md-10">
				<?php if((!empty($professional_nid)) && (!empty($main_category_node)) && ($tl_verify == 1)): ?>
					<h1 class="uppercase letter-spacing-3 align-center no-margin">Create <?php print $main_category_node->title . " " . $listing_type_name; ?></h1>
					<br>
					<br>

					<!-- Start Experience & Deals Tab -->
					<?php if(($listing_type_id == "7") || ($listing_type_id == "10")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<br>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<br>
							<?php print render($form['field_teaser_description']); ?>
							<?php print render($form['body']); ?>
							<?php print render($form['field_duration_days']); ?>
							<?php print render($form['field_departure_area']); ?>
							<?php print render($form['field_arrival_area']); ?>
							<?php print render($form['field_number_of_person']); ?>
							<?php print render($form['field_visited_area']); ?>
							<?php print render($form['field_pwd_friendly']); ?>	
							<?php print render($form['field_languages_available']); ?>
							
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Itinerary</h3>
							<br>
							<?php print render($form['field_itinerary_type']); ?>
							<?php print render($form['field_short_itinerary']); ?>
							<?php print render($form['field_itinerary_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rates & Packages</h3>
							<br>
							<?php print render($form['field_currency']); ?>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey color-red">To Remove</div>
								<p class="custom-field-description font-size-10">Transfer to variant section if fields are available.</p>
								<br>
								<?php /* print render($form['field_price']); ?>
								<?php print render($form['field_price_label']); ?>
								<?php print render($form['field_discount_offered']); ?>
								<?php print render($form['field_inclusions']); ?>
								<?php print render($form['field_add_ons']); */ ?>
								<div class="font-alt uppercase border-bottom-grey color-red">End of To Remove</div>
							</div>
							<br> -->
							<?php print render($form['field_variants_and_price']); ?>
							<br>
							<?php print render($form['field_agent_commission']); ?>
							<?php print render($form['field_commission_rate']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Add-ons</h3>
							<br>
							<?php print render($form['field_add_ons_prices']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Validity</h3>
							<br>
							<?php print render($form['field_number_of_voucher']); ?>
							<?php print render($form['field_start_validity']); ?>
							<?php print render($form['field_end_validity']); ?>
							<?php print render($form['field_redeem']); ?>
						</div>
						<br>
						<br>

						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Terms & Conditions</h3>
							<br>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey">To Remove</div>
									<p class="custom-field-description font-size-10">Transfer to terms and conditions multiple fields.</p>
									<br>
									<?php /* print render($form['field_terms_and_conditions']); */ ?>
								<div class="font-alt uppercase border-bottom-grey">End To Remove</div>
								<br>
							</div> -->
							<?php print render($form['field_terms_and_conditions_multi']); ?>
						</div>
						<br>
						<br>
					<!-- End Experience & Deals Tab -->

					<!-- Aviation for Sale -->
					<?php elseif(($main_category_nid == "339152") && ($listing_type_id == "4")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<br>
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_passenger']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_date_last_flight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight_carrying']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_hours_of_flight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_flying_range']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_engines']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_flying_speed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_length']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_odometer']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_condition']); ?>
								</div>
							</div>
							<br>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rate</h3>
							<br>
							<div class="row clearfix">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_currency']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price_label']); ?>
								</div>
							</div>
							<?php print render($form['field_rates_details']); ?>
							<?php print render($form['field_inclusions']); ?>
							<?php print render($form['field_exclusions']); ?>
							<?php print render($form['field_add_ons']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Date Added</h3>
							<div class="row clearfix">
								<?php print render($form['field_date_added']); ?>
							</div>
						</div>
						<br>
						<br>
					
					<!-- End Aviation For Sale -->

					<!-- Aviation for Rent -->
					<?php elseif(($main_category_nid == "339152") && ($listing_type_id == "5")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<br>
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_passenger']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_date_last_flight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight_carrying']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_hours_of_flight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_flying_range']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_engines']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_flying_speed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_length']); ?>
								</div>
							</div>
							<br>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rates & Packages</h3>
							<br>
							<?php print render($form['field_currency']); ?>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey color-red">To Remove</div>
								<p class="custom-field-description font-size-10">Transfer to variant section if fields are available.</p>
								<br>
								<?php /* print render($form['field_price']); ?>
								<?php print render($form['field_price_label']); ?>
								<?php print render($form['field_discount_offered']); ?>
								<?php print render($form['field_rates_details']); ?>
								<?php print render($form['field_inclusions']); ?>
								<?php print render($form['field_add_ons']); */ ?>
								<div class="font-alt uppercase border-bottom-grey color-red">End of To Remove</div>
							</div>
							<br> -->
							<?php print render($form['field_variants_and_price']); ?>
							<br>
							<?php print render($form['field_agent_commission']); ?>
							<?php print render($form['field_commission_rate']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Add-ons</h3>
							<br>
							<?php print render($form['field_add_ons_prices']); ?>
						</div>
						<br>
						<br>

						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Terms & Conditions</h3>
							<br>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey">To Remove</div>
									<p class="custom-field-description font-size-10">Transfer to terms and conditions multiple fields.</p>
									<br>
									<?php /* print render($form['field_terms_and_conditions']); */ ?>
								<div class="font-alt uppercase border-bottom-grey">End To Remove</div>
								<br>
							</div> -->
							<?php print render($form['field_terms_and_conditions_multi']); ?>
						</div>
						<br>
						<br>
					
					<!-- End Aviation For Rent -->

					<!-- Aviation Models -->
					<?php elseif(($main_category_nid == "339152") && ($listing_type_id == "1")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<br>
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_passenger']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_date_last_flight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight_carrying']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_hours_of_flight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_flying_range']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_engines']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_flying_speed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_length']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year_start']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year_end']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_produced_units']); ?>
								</div>
							</div>
							<br>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
					<!-- End Aircraft Models -->

					<!-- Car for Sale -->
					<?php elseif(($main_category_nid == "339154") && ($listing_type_id == "4")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<br>
							<h3 class="no-margin uppercase">Criterias</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_name']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_model']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_condition']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_odometer']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_engine']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_model_year']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_seating_capacity']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_seller_type']); ?>
								</div>
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_horsepower']); */ ?>
								</div> -->
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_transmission']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_fuel_type']); ?>
								</div>
								<!-- <div class="col-md-3 col-sm-12 col-xs-12 align-left">
								<?php /* print render($form['field_variant']); ?>
								</div> -->
								<!-- <div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_registration_year']); */ ?>
								</div> -->
							</div>
							<br>
							<br>
							<h3 class="no-margin uppercase">Description</h3>
							<?php 
								print render($form['title']); 
								print render($form['field_teaser_description']);
								print render($form['body']); 
							?>
							<br>
							<br>
							<h3 class="no-margin uppercase">Location</h3>
							<?php 
								print render($form['field_country_area']);
								print render($form['field_area']); 
							?> 
							<br>
							<br>
							<h3 class="no-margin uppercase">Rate</h3>
							<br>
							<div class="row clearfix">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_currency']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price_label']); ?>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Date Added</h3>
							<div class="row clearfix">
								<?php print render($form['field_date_added']); ?>
							</div>
						</div>
						<br>
						<br>
					
					<!-- End Car For Sale -->

					<!-- Car for Rent -->
					<?php elseif(($main_category_nid == "339154") && ($listing_type_id == "5")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Description</h3>
							<?php 
								print render($form['title']); 
								print render($form['field_teaser_description']);
								print render($form['body']); 
							?>
							<br>
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_name']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_model']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_model_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year_refit']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_units']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_seating_capacity']); ?>
								</div>
							</div>
							<br>
							<div class="checkbox-col-3">
								<?php print render($form['field_type_of_car_rental']); ?>
							</div>
							<br>
							<h3 class="no-margin uppercase">Location</h3>
							<div class="clearfix row">
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_country_area']); ?>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_area']); ?> 
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_chauffeured_amenities']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rates & Packages</h3>
							<br>
							<?php print render($form['field_currency']); ?>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey color-red">To Remove</div>
								<p class="custom-field-description font-size-10">Transfer to variant section if fields are available.</p>
								<br>
								<?php /* print render($form['field_price']); ?>
								<?php print render($form['field_price_label']); ?>
								<?php print render($form['field_discount_offered']); ?>
								<?php print render($form['field_rates_details']); ?>
								<?php print render($form['field_inclusions']); ?>
								<?php print render($form['field_add_ons']); */ ?>
								<div class="font-alt uppercase border-bottom-grey color-red">End of To Remove</div>
							</div>
							<br> -->
							<?php print render($form['field_variants_and_price']); ?>
							<br>
							<?php print render($form['field_agent_commission']); ?>
							<?php print render($form['field_commission_rate']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Add-ons</h3>
							<br>
							<?php print render($form['field_add_ons_prices']); ?>
						</div>
						<br>
						<br>

						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Terms & Conditions</h3>
							<br>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey">To Remove</div>
									<p class="custom-field-description font-size-10">Transfer to terms and conditions multiple fields.</p>
									<br>
									<?php /* print render($form['field_terms_and_conditions']); */ ?>
								<div class="font-alt uppercase border-bottom-grey">End To Remove</div>
								<br>
							</div> -->
							<?php print render($form['field_terms_and_conditions_multi']); ?>
						</div>
						<br>
						<br>
					
					<!-- End Car For Rent -->

					<!-- Car Model -->
					<?php elseif(($main_category_nid == "339154") && ($listing_type_id == "1")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<br>
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_name']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_model']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_model_year']); ?>
								</div>
							</div>
							<br>
							<div class="clearfix row">
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_engine']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_engines']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cc_motorcycle']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_torque']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_autonomy']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_acceleration']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_transmission']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_length']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight_power_ratio']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_passenger']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_fuel_type']); ?>
								</div>
							</div>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Production</h3>
							<br>
							<div class="padding-5">
								<?php print render($form['field_concept_model']); ?>
							</div>
							<div class="bg-light-grey padding-5">
								<div class="clearfix row">
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_past_model']); ?>
									</div>
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_past_model_year_start']); ?>
									</div>
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_past_model_year_end']); ?>
									</div>
								</div>
							</div>
							<br>
							<div class="bg-light-grey padding-5">
								<div class="clearfix row">
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_current_model']); ?>
									</div>
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_current_model_year_start']); ?>
									</div>
								</div>
							</div>
							<br>
							<div class="bg-light-grey padding-5">
								<div class="clearfix row">
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_future_model']); ?>
									</div>
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_future_model_year_start']); ?>
									</div>
								</div>
							</div>
							<br>
							<div class="bg-light-grey padding-5">
								<div class="clearfix row">
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_limited_production']); ?>
									</div>
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_units']); ?>
									</div>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Manufacturer Suggested Retail Price</h3>
							<br>
							<?php print render($form['field_manufacturer_srp']); ?>	
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Variants & Pricelist Factory</h3>
							<br>
							<?php print render($form['field_variants_and_price']); ?>	
						</div>
						<br>
						<br>
					<!-- End Car Model -->

					<!-- Yacht for Sale -->
					<?php elseif(($main_category_nid == "339155")  && ($listing_type_id == "4")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php 
								print render($form['title']);
							 	print render($form['field_teaser_description']); 
								print render($form['body']);
							?>
							<br>
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_name']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_model']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_designer']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year_refit']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_condition']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_new_availability']); ?>
								</div>
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_sleepover_capacity']); */ ?>
								</div> -->
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_max_capacity']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_builder']); */ ?>
								</div> -->
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_overnight_capacity']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_day_cruise_capacity']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cabin']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_bathroom']); ?>
								</div>
							</div>							
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">General Details</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_max_speed']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cruise_speed']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cruise_range']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_beam']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_draft']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_length']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_crew_beds‎']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_engine']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_engine_hours']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_fuel_consumption']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_hull_material']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_superstructure_material']); ?>
								</div>
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_child_allowed']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_smoking_allowed']); */ ?>
								</div> -->
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_horsepower']); */ ?>
								</div> -->
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Amenities</h3>
							<br>
							<div class="clearfix row">
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php /* print render($form['field_jacuzzi']); */ ?>
								</div> -->
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_hot_tub']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_gym']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_swimming_pool']); ?>
								</div>
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php /* print render($form['field_video_game']); */ ?>
								</div> -->
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_steam_room']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_helipad']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_bbq']); ?>
								</div>
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php /* print render($form['field_wifi']); */ ?>
								</div> -->
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_cinema']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kitchen']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_maker']); ?>
								</div>
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php /* print render($form['field_board_game']); */ ?>
								</div> -->
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_tv']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_elevator']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_sound_system']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_air_condition']); ?>
								</div>
							</div>
							<?php /* print render($form['field_amenities_details']); */ ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Location</h3>
							<br>
							<?php 
								print render($form['field_country_area']); 
							 	print render($form['field_area']); 
							?> 
						</div>
						<br>
						<br>
						<!-- <div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Guest Capacity & Rooms</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_cabin']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_bathroom']); */ ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_bedroom']); */ ?>
								</div>
							</div>
							<?php /* print render($form['field_rooms_details']); */ ?>
						</div> -->
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Water Toys & Outdoor Activities</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_ski_adult']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_ski_child']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_fishing_rod']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_beach_club']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_diving_equipment']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_underwater_camera']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_slide']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_swim_platform']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_windsurfer']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_wakeboard']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_deep_fishing_equipment']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item"> 
									<?php print render($form['field_diving_compressors']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_jetski']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_paddle_board']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_scurfer']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_snorkel_gear']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_inflatable_platform']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kiteboard']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_seabob']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kayak']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_floating_mat']); ?>
								</div>
							</div>
							<?php print render($form['field_water_sports_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Dinghies</h3>
							<br>
							<?php print render($form['field_dinghies']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rate</h3>
							<br>
							<div class="row clearfix">
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_currency']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price_label']); ?>
								</div>
							</div>
							<?php print render($form['field_rates_details']); ?>
							<?php print render($form['field_inclusions']); ?>
							<?php print render($form['field_exclusions']); ?>
							<?php print render($form['field_add_ons']); ?>
							<?php print render($form['field_charter_rates']); ?>
							<?php print render($form['field_charter_exclusions']); ?>
							<?php print render($form['field_charter_inclusions']); ?>
							<?php print render($form['field_charter_rules']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Date Added</h3>
							<div class="row clearfix">
								<?php print render($form['field_date_added']); ?>
							</div>
						</div>
						<br>
						<br>
					
					<!-- End Yacht For Sale -->

					<!-- Yacht for Rent -->
					<?php elseif(($main_category_nid == "339155")  && ($listing_type_id == "5")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
							<?php print render($form['field_builder']); ?>
							<?php print render($form['field_designer']); ?>
							<br>
							
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_name']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_model']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year_refit']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_sleepover_capacity']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_length']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cruise_speed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_max_capacity']); ?>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">General Details</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_max_speed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_beam']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_fuel_consumption']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_child_allowed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_smoking_allowed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_horsepower']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cruise_range']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_draft']); ?>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Amenities</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_jacuzzi']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_hot_tub']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_gym']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_video_game']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_steam_room']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_helipad']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_wifi']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_cinema']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_swimming_pool']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_maker']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_board_game']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_tv']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_elevator']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_sound_system']); ?>
								</div>
							</div>
							<?php print render($form['field_amenities_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Guest Capacity & Rooms</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4">
									<?php print render($form['field_cabin']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_bedroom']); ?>
								</div>
								<div class="col-md-4">
									<?php print render($form['field_bathroom']); ?>
								</div>
							</div>
							<?php print render($form['field_rooms_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Water Toys & Outdoor Activities</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_ski_adult']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_ski_child']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_fishing_rod']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_beach_club']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_diving_equipment']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_underwater_camera']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_slide']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_swim_platform']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_windsurfer']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_wakeboard']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_deep_fishing_equipment']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item"> 
									<?php print render($form['field_diving_compressors']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_jetski']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_paddle_board']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_scurfer']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_snorkel_gear']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_inflatable_platform']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kiteboard']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_seabob']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kayak']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_floating_mat']); ?>
								</div>
							</div>
							<?php print render($form['field_water_sports_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Meals & Drinks</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_coffee_machine']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kitchen']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_wine_cooler']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_bbq']); ?>
								</div>
							</div>
							<?php print render($form['field_meals_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Dinghies</h3>
							<br>
							<?php print render($form['field_dinghies']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">The Crew</h3>
							<br>
							<?php print render($form['field_languages_available']); ?>
							<?php print render($form['field_crew']); ?>
							<?php print render($form['field_crew_details']); ?>
							<?php print render($form['field_country_text']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rates & Packages</h3>
							<br>
							<?php print render($form['field_currency']); ?>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey color-red">To Remove</div>
								<p class="custom-field-description font-size-10">Transfer to variant section if fields are available.</p>
								<br>
								<?php /* print render($form['field_price']); ?>
								<?php print render($form['field_price_label']); ?>
								<?php print render($form['field_discount_offered']); ?>
								<?php print render($form['field_rates_details']); ?>
								<?php print render($form['field_inclusions']); ?>
								<?php print render($form['field_exclusions']); ?>
								<?php print render($form['field_add_ons']); ?>
								<?php print render($form['field_charter_rates']); ?>
								<?php print render($form['field_charter_exclusions']); ?>
								<?php print render($form['field_charter_inclusions']); ?>
								<?php print render($form['field_charter_rules']); */ ?>
								<div class="font-alt uppercase border-bottom-grey color-red">End of To Remove</div>
							</div>
							<br> -->
							<?php print render($form['field_variants_and_price']); ?>
							<br>
							<?php print render($form['field_agent_commission']); ?>
							<?php print render($form['field_commission_rate']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Add-ons</h3>
							<br>
							<?php print render($form['field_add_ons_prices']); ?>
						</div>
						<br>
						<br>

						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Terms & Conditions</h3>
							<br>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey">To Remove</div>
									<p class="custom-field-description font-size-10">Transfer to terms and conditions multiple fields.</p>
									<br>
									<?php /* print render($form['field_terms_and_conditions']); */ ?>
								<div class="font-alt uppercase border-bottom-grey">End To Remove</div>
								<br>
							</div> -->
							<?php print render($form['field_terms_and_conditions_multi']); ?>
						</div>
						<br>
						<br>
					<!-- End Yacht For Rent -->

					<!-- Yacht Model -->
					<?php elseif(($main_category_nid == "339155")  && ($listing_type_id == "1")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
							<?php print render($form['field_builder']); ?>
							<?php print render($form['field_designer']); ?>
							<?php print render($form['field_delivery_period_new_model']); ?>
							<br>
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_name']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_model']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year_refit']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_sleepover_capacity']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_length']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cruise_speed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_max_capacity']); ?>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">General Details</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_max_speed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_beam']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_fuel_consumption']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_child_allowed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_smoking_allowed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_horsepower']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cruise_range']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_draft']); ?>
								</div>
								<!-- <div class="col-md-3 col-sm-12 col-xs-12 align-left">
								<?php /* print render($form['field_variant']); ?>
								</div> -->
								<!-- <div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_registration_year']); */ ?>
								</div> -->
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Amenities</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_jacuzzi']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_hot_tub']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_gym']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_video_game']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_steam_room']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_helipad']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_wifi']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_cinema']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_swimming_pool']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_maker']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_board_game']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_tv']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_elevator']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_sound_system']); ?>
								</div>
							</div>
							<?php print render($form['field_amenities_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Guest Capacity & Rooms</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4">
									<?php print render($form['field_cabin']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_bedroom']); ?>
								</div>
								<div class="col-md-4">
									<?php print render($form['field_bathroom']); ?>
								</div>
							</div>
							<?php print render($form['field_rooms_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Water Toys & Outdoor Activities</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_ski_adult']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_ski_child']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_fishing_rod']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_beach_club']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_diving_equipment']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_underwater_camera']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_slide']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_swim_platform']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_windsurfer']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_wakeboard']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_deep_fishing_equipment']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item"> 
									<?php print render($form['field_diving_compressors']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_jetski']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_paddle_board']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_scurfer']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_snorkel_gear']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_inflatable_platform']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kiteboard']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_seabob']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kayak']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_floating_mat']); ?>
								</div>
							</div>
							<?php print render($form['field_water_sports_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Dinghies</h3>
							<br>
							<?php print render($form['field_dinghies']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Manufacturer Suggested Retail Price</h3>
							<br>
							<?php print render($form['field_manufacturer_srp']); ?>	
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Variants & Pricelist Factory</h3>
							<br>
							<?php print render($form['field_variants_and_price']); ?>	
						</div>
						<br>
						<br>
					<!-- End Yacht Model -->

					<!-- Experiences & Activities OR Travel and Getaway -->
					<?php elseif( (($main_category_nid == "380159")) || ($main_category_nid == "339187")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<br>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
							<?php print render($form['field_duration_days']); ?>
							<?php print render($form['field_departure_area']); ?>
							<?php print render($form['field_arrival_area']); ?>
							<?php print render($form['field_visited_area']); ?>
							<?php print render($form['field_child_policy']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rate</h3>
							<br>
							<div class="row clearfix">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_currency']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price_label']); ?>
								</div>
							</div>
							<?php print render($form['field_rates_details']); ?>
							<?php print render($form['field_inclusions']); ?>
							<?php print render($form['field_exclusions']); ?>
							<?php print render($form['field_add_ons']); ?>
						</div>
						<br>
						<br>
					<!-- End Experiences & Activities OR Travel and Getaway -->

					<!-- Estate for Rent & Sale -->
					<?php elseif(($main_category_nid == "339156")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_land_size']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_floor_aera']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_building']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_staff_room']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_parking']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_renovation_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_beach_length']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_car_space']); ?>
								</div>
							</div>
							<?php print render($form['title']); ?>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<?php print render($form['field_status_development']); ?>
							<?php print render($form['field_rfo_date']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_type_of_estate']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_authenticity_documents']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_property_style']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_property_private_amenities']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_village_building_amenities']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_payment_conditions']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<?php print render($form['field_nearest_landmark']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="clearfix row">
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_bedroom']); ?>
								</div>
								<div class="col-md-6">
									<?php print render($form['field_bathroom']); ?>
								</div>
							</div>
							<?php print render($form['field_rooms_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rates & Packages</h3>
							<br>
							<?php print render($form['field_currency']); ?>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey color-red">To Remove</div>
								<p class="custom-field-description font-size-10">Transfer to variant section if fields are available.</p>
								<br>
								<?php /* print render($form['field_price']); ?>
								<?php print render($form['field_price_label']); ?>
								<?php print render($form['field_discount_offered']); ?>
								<?php print render($form['field_rates_details']); ?>
								<?php print render($form['field_inclusions']); ?>
								<?php print render($form['field_exclusions']); ?>
								<?php print render($form['field_add_ons']); */ ?>
								<div class="font-alt uppercase border-bottom-grey color-red">End of To Remove</div>
							</div>
							<br> -->
							<?php print render($form['field_variants_and_price']); ?>
							<br>
							<?php print render($form['field_agent_commission']); ?>
							<?php print render($form['field_commission_rate']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Add-ons</h3>
							<br>
							<?php print render($form['field_add_ons_prices']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Date Added</h3>
							<div class="row clearfix">
								<?php print render($form['field_date_added']); ?>
							</div>
						</div>
						<br>
						<br>
					<!-- End Estate For Rent & Sale -->

					<!-- Event Venue for Rent -->
					<?php elseif(($main_category_nid == "339188")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_seating_capacity']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_max_capacity']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_overnight_capacity']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_indoor_surface']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_outdoor_surface']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
							</div>
							<br>
							<?php print render($form['title']); ?>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_type_of_event_venue']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_event_venue_amenities']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rate</h3>
							<br>
							<div class="row clearfix">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_currency']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price_label']); ?>
								</div>
							</div>
							<?php print render($form['field_rates_details']); ?>
							<?php print render($form['field_inclusions']); ?>
							<?php print render($form['field_exclusions']); ?>
							<?php print render($form['field_add_ons']); ?>
						</div>
						<br>
						<br>
						
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Terms & Conditions</h3>
							<br>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey">To Remove</div>
									<p class="custom-field-description font-size-10">Transfer to terms and conditions multiple fields.</p>
									<br>
									<?php /* print render($form['field_terms_and_conditions']); */ ?>
								<div class="font-alt uppercase border-bottom-grey">End To Remove</div>
								<br>
							</div> -->
							<?php print render($form['field_terms_and_conditions_multi']); ?>
						</div>
						<br>
						<br>
					<!-- End Event Venue For Rent -->

					<!-- Vacation & Resort for Rent -->
					<?php elseif(($main_category_nid == "339186")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['title']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_room_size']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_indoor_surface']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_outdoor_surface']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_resort_total_surface']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year_built']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_check_in_time']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_check_out_time']); ?>
								</div>
							</div>
							<br>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?>
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_type_of_luxury_retreats']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Accommodations</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_bedroom']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_bathroom']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_adult']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_kids']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_king_size_bed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_queen_size_bed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_singe_size_bed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_sofa_bed']); ?>
								</div>
								<!-- <div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_total_number_of_beds']); */ ?>
								</div> -->
							</div>
							<br>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_villa_room_facilities']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_bathroom_toiletries']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_comfort_entertainment']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_dining']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_layout_furnishing']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_clothing_laundry']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rates & Packages</h3>
							<br>
							<?php print render($form['field_currency']); ?>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey color-red">To Remove</div>
								<p class="custom-field-description font-size-10">Transfer to variant section if fields are available.</p>
								<br>
								<?php /* print render($form['field_price']); ?>
								<?php print render($form['field_price_label']); ?>
								<?php print render($form['field_discount_offered']); ?>
								<?php print render($form['field_rates_details']); ?>
								<?php print render($form['field_inclusions']); ?>
								<?php print render($form['field_exclusions']); ?>
								<?php print render($form['field_add_ons']); */ ?>
								<div class="font-alt uppercase border-bottom-grey color-red">End of To Remove</div>
							</div>
							<br> -->
							<?php print render($form['field_variants_and_price']); ?>
							<br>
							<?php print render($form['field_agent_commission']); ?>
							<?php print render($form['field_commission_rate']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Add-ons</h3>
							<br>
							<?php print render($form['field_add_ons_prices']); ?>
						</div>
						<br>
						<br>
					<!-- End Vacation & Resort For Rent -->

					<!-- Watches -->
					<?php elseif(($main_category_nid == "397644")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<?php print render($form['title']); ?>
							<?php print render($form['field_country_area']); ?>
							<?php print render($form['field_area']); ?>
							<div class="clearfix row">
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_gender']); ?>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_case_material']); ?>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_case_diameter']); ?>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_movements']); ?>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_condition']); ?>
								</div>
							</div>		
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rate</h3>
							<br>
							<div class="row clearfix">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_currency']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price_label']); ?>
								</div>
							</div>
						</div>
						<br>
						<br>
					<?php endif; ?>
					<!-- End Watches -->

					<!-- GENERAL FIELDS -->
					<div class="bg-white border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Contact Info</h3>
						<br>
						<?php print render($form['field_contact_number']); ?>
						<?php print render($form['field_address_text']); ?>
						<?php print render($form['field_website']); ?>
						<?php print render($form['field_email']); ?>
					</div>
					<br>
					<br>
					<div class="bg-white border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Add Visuals</h3>
						<br>
						<!----------------------------- Gallery -------------------------------->
						<h4 class="no-margin uppercase">Gallery</h4>
						<br>
						<p class="custom-field-description font-size-10">Upload a high definition image for gallery.<strong>This will appear on the lower part of the brand page.</strong>
						<br>
						Image size should be: <strong>(800x600)</strong> Upload size is <strong>300 KB</strong> or less.</p>
						<?php print render($form['field_images']); ?>
						<br>
						<!----------------------------- Thumbnail -------------------------------->
						<h4 class="no-margin uppercase">Thumbnail</h4>
						<br>
						<p class="custom-field-description font-size-10">Upload a high definition image for thumbnail.<strong>This will appear on the brand directories.</strong>
						<br>
						Image size should be: <strong>(800x600)</strong> Upload size is <strong>300 KB</strong> or less.</p>
						<?php print render($form['field_thumbnail']); ?>
						<br>
						<!----------------------------- Video Links -------------------------------->
						<h4 class="no-margin uppercase">Youtube | Vimeo Video Link</h4>
						<br>
						<p class="custom-field-description font-size-10">Copy and paste the link of your YouTube or Vimeo link.</p>
						<?php print render($form['field_video_link']); ?>
						<br>
					</div>
					<br>
					<br>
					<div class="bg-white border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Highlights</h3>
						<br>
						<?php print render($form['field_feature_details']); ?>
					</div>
					<br>
					<br>
					<?php if (empty($admin) ? FALSE : TRUE) : ?>
						<div class="lxv-fields bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">LXV Fields</h3>
							<br>
							<?php print render($form['field_ref_number']); ?>
							<?php print render($form['field_google_drive']); ?>
							<br>

							<div class="clearfix row">
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_luxury_level']); ?>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_rarity']); ?>
								</div>
							</div>
							<br>
							<?php print render($form['field_luxe_guide_exclusive']); ?>
							<br>
							<?php print render($form['field_luxe_guide_specials']); ?>
							<?php print render($form['field_models_connected']); ?>
							<?php print render($form['field_linked_listings']); ?>
							<?php print render($form['field_booking_link']); ?>
							<?php print render($form['field_professionals_connected']); ?>
							<?php print render($form['field_seo_title']); ?>
							<?php print render($form['field_meta_description']); ?>
							<?php print render($form['additional_settings']); ?>
						</div>
					<?php endif; ?>
					<br>
					<br>
					<!-- Additional Classifications -->
					<div class="bg-white border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Related Main Classes</h3>
						<br>
						<?php print render($form['field_sub_category_connected']); ?>
					</div>
					<br>
					<br>
					<!-- End Additional Classifications -->
					<!-- Additional Classifications -->
					<div class="bg-white border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Additional Classifications</h3>
						<br>
						<?php print render($form['field_additional_classifications']); ?>
					</div>
					<br>
					<br>
					<!-- END GENERAL FIELDS -->
					
					<div>
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
				<?php else: ?>
					<h1 class="uppercase letter-spacing-3 align-center no-margin">Add a Listings</h1> 
					<br>
					<br>
					<div class="bg-white border-radius-3 padding-15">
						<h4 class="no-margin uppercase">Posting Profile</h4>
						<br>
						<div class="custom-field-description align-center font-size-12">
							Professionals and Individuals can post on The Luxe Guide.
						</div>
						<br>
						<?php print render($form['field_global_professional']); ?>
						<div class="align-center">
							<a class="btn btn-mod btn-round uppercase" target="_blank" href="<?php print $base_url; ?>/node/add/professionals">Create Professional Page Now</a>
						</div>
						<?php print render($form['field_pro_parent_category']); ?>
						<?php print render($form['field_category_tab']); ?>
						<div class="btn btn-mod btn-deep-sky-blue btn-circle show-form"> NEXT </div>
					</div>
					<br>
					<br>
					<?php hide($form); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<br>
<?php endif; ?>
<!-- END OF ADD NODE CODE -->


<!-- BEGINNING OF EDIT NODE CODE -->
<?php if (strpos(request_path(), '/edit') !== FALSE): ?>
	<?php
		$page_title = $node->title;
		$page_id = $node->nid;
		$category_id_edit = $node->field_pro_parent_category[LANGUAGE_NONE][0]['target_id'];
		$listing_type_id_edit = $node->field_category_tab[LANGUAGE_NONE][0]['value'];
		$alias = drupal_get_path_alias('node/' . $node->nid);
	?>
	<br>
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
				<br>
				<br>
				<div class="row clearfix">
					<div class="bg-white border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Professional Page</h3>
						<br>
						<?php print render($form['field_global_professional']); ?>
					</div>
					<br>
					<br>
					<div class="bg-white border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Main Classifications</h3>
						<br>
						<?php print render($form['field_pro_parent_category']); ?>
						<?php print render($form['field_category_tab']); ?>
						<?php /* print render($form['field_sub_category_connected']); */ ?>
					</div>
					<br>
					<br>

					<!-- Start Experience & Deals Tab -->
					<?php if(($listing_type_id_edit == "7") || ($listing_type_id_edit == "10")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<br>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<br>
							<?php print render($form['field_teaser_description']); ?>
							<?php print render($form['body']); ?>
							<?php print render($form['field_duration_days']); ?>
							<?php print render($form['field_departure_area']); ?>
							<?php print render($form['field_arrival_area']); ?>
							<?php print render($form['field_number_of_person']); ?>
							<?php print render($form['field_visited_area']); ?>
							<?php print render($form['field_pwd_friendly']); ?>	
							<?php print render($form['field_languages_available']); ?>
							
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Itinerary</h3>
							<br>
							<?php print render($form['field_itinerary_type']); ?>
							<?php print render($form['field_short_itinerary']); ?>
							<?php print render($form['field_itinerary_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rates & Packages</h3>
							<br>
							<?php print render($form['field_currency']); ?>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey color-red">To Remove</div>
								<p class="custom-field-description font-size-10">Transfer to variant section if fields are available.</p>
								<br>
								<?php /* print render($form['field_price']); ?>
								<?php print render($form['field_price_label']); ?>
								<?php print render($form['field_discount_offered']); ?>
								<?php print render($form['field_inclusions']); ?>
								<?php print render($form['field_add_ons']); */ ?>
								<div class="font-alt uppercase border-bottom-grey color-red">End of To Remove</div>
							</div>
							<br> -->
							<?php print render($form['field_variants_and_price']); ?>
							<br>
							<?php print render($form['field_agent_commission']); ?>
							<?php print render($form['field_commission_rate']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Add-ons</h3>
							<br>
							<?php print render($form['field_add_ons_prices']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Validity</h3>
							<br>
							<?php print render($form['field_number_of_voucher']); ?>
							<?php print render($form['field_start_validity']); ?>
							<?php print render($form['field_end_validity']); ?>
							<?php print render($form['field_redeem']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Terms & Conditions</h3>
							<br>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey">To Remove</div>
									<p class="custom-field-description font-size-10">Transfer to terms and conditions multiple fields.</p>
									<br>
									<?php /* print render($form['field_terms_and_conditions']); */ ?>
								<div class="font-alt uppercase border-bottom-grey">End To Remove</div>
								<br>
							</div> -->
							<?php print render($form['field_terms_and_conditions_multi']); ?>
						</div>
						<br>
						<br>
					
					<!-- End Experience & Deals Tab -->

					<!-- Aviation for Sale -->
					<?php elseif(($category_id_edit == "339152") && ($listing_type_id_edit == "4")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<br>
							
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_passenger']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_date_last_flight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight_carrying']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_hours_of_flight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_flying_range']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>

								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_engines']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_flying_speed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_length']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_odometer']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_condition']); ?>
								</div>
							</div>
							<br>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rate</h3>
							<br>
							<div class="row clearfix">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_currency']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price_label']); ?>
								</div>
							</div>
							<?php print render($form['field_rates_details']); ?>
							<?php print render($form['field_inclusions']); ?>
							<?php print render($form['field_exclusions']); ?>
							<?php print render($form['field_add_ons']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Date Added</h3>
							<div class="row clearfix">
								<?php print render($form['field_date_added']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Date Renewed</h3>
							<div class="row clearfix">
								<?php print render($form['field_renew_date']); ?>
							</div>
						</div>
						<br>
						<br>

					<!-- End Aviation For Sale -->

					<!-- Aviation for Rent -->
					<?php elseif(($category_id_edit == "339152") && ($listing_type_id_edit == "5")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<br>
							
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_passenger']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_date_last_flight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight_carrying']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_hours_of_flight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_flying_range']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_engines']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_flying_speed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_length']); ?>
								</div>
							</div>
							<br>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rates & Packages</h3>
							<br>
							<?php print render($form['field_currency']); ?>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey color-red">To Remove</div>
								<p class="custom-field-description font-size-10">Transfer to variant section if fields are available.</p>
								<br>
								<?php /* print render($form['field_price']); ?>
								<?php print render($form['field_price_label']); ?>
								<?php print render($form['field_discount_offered']); ?>
								<?php print render($form['field_rates_details']); ?>
								<?php print render($form['field_inclusions']); ?>
								<?php print render($form['field_exclusions']); ?>
								<?php print render($form['field_add_ons']); */ ?>
								<div class="font-alt uppercase border-bottom-grey color-red">End of To Remove</div>
							</div>
							<br> -->
							<?php print render($form['field_variants_and_price']); ?>
							<br>
							<?php print render($form['field_agent_commission']); ?>
							<?php print render($form['field_commission_rate']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Add-ons</h3>
							<br>
							<?php print render($form['field_add_ons_prices']); ?>
						</div>
						<br>
						<br>

						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Terms & Conditions</h3>
							<br>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey">To Remove</div>
									<p class="custom-field-description font-size-10">Transfer to terms and conditions multiple fields.</p>
									<br>
									<?php /* print render($form['field_terms_and_conditions']); */ ?>
								<div class="font-alt uppercase border-bottom-grey">End To Remove</div>
								<br>
							</div> -->
							<?php print render($form['field_terms_and_conditions_multi']); ?>
						</div>
						<br>
						<br>
					<!-- End Aviation For Rent -->

					<!-- Aviation Models -->
					<?php elseif(($category_id_edit == "339152") && ($listing_type_id_edit == "11")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<br>
							
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_passenger']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_date_last_flight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight_carrying']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_hours_of_flight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_flying_range']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_engines']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_flying_speed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_length']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year_start']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year_end']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_produced_units']); ?>
								</div>
							</div>
							<br>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
						
					
					<!-- End Aircraft Models -->

					<!-- Car for Sale -->
					<?php elseif(($category_id_edit == "339154") && ($listing_type_id_edit == "4")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<br>
							<h3 class="no-margin uppercase">Criterias</h3>
							<br>
							<div class="clearfix row">
							<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_name']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_model']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_condition']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_odometer']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_engine']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_model_year']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_seating_capacity']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_seller_type']); ?>
								</div>
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_horsepower']); */ ?>
								</div> -->
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_transmission']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_fuel_type']); ?>
								</div>
								<!-- <div class="col-md-3 col-sm-12 col-xs-12 align-left">
								<?php /*  print render($form['field_variant']); ?>
								</div> -->
								<!-- <div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_registration_year']); */ ?>
								</div> -->
							</div>
							<br>
							<br>
							<h3 class="no-margin uppercase">Description</h3>
							<?php 
								print render($form['title']); 
								print render($form['field_teaser_description']);
								print render($form['body']); 
							?>
							<br>
							<br>
							<h3 class="no-margin uppercase">Location</h3>
							<?php 
								print render($form['field_country_area']);
								print render($form['field_area']); 
							?> 
							<br>
							<br>
							<h3 class="no-margin uppercase">Rate</h3>
							<br>
							<div class="row clearfix">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_currency']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price_label']); ?>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Date Added</h3>
							<div class="row clearfix">
								<?php print render($form['field_date_added']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Date Renewed</h3>
							<div class="row clearfix">
								<?php print render($form['field_renew_date']); ?>
							</div>
						</div>
						<br>
						<br>

					<!-- End Car For Sale -->

					<!-- Car for Rent -->
					<?php elseif(($category_id_edit == "339154") && ($listing_type_id_edit == "5")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Description</h3>
							<?php 
								print render($form['title']);
								print render($form['field_teaser_description']);
								print render($form['body']); 
							?>
							<br>
							
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_name']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_model']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_model_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year_refit']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_units']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_seating_capacity']); ?>
								</div>
							</div>
							<br>
							<div class="checkbox-col-3">
								<?php print render($form['field_type_of_car_rental']); ?>
							</div>
							<br>
							<h3 class="no-margin uppercase">Location</h3>
							<div class="clearfix row">
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_country_area']); ?>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_area']); ?> 
								</div>
							</div>
							
						</div>
						<!-- <br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							
						</div> -->
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_chauffeured_amenities']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rates & Packages</h3>
							<br>
							<?php print render($form['field_currency']); ?>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey color-red">To Remove</div>
								<p class="custom-field-description font-size-10">Transfer to variant section if fields are available.</p>
								<br>
								<?php /* print render($form['field_price']); ?>
								<?php print render($form['field_price_label']); ?>
								<?php print render($form['field_discount_offered']); ?>
								<?php print render($form['field_rates_details']); ?>
								<?php print render($form['field_inclusions']); ?>
								<?php print render($form['field_exclusions']); ?>
								<?php print render($form['field_add_ons']); */ ?>
								<div class="font-alt uppercase border-bottom-grey color-red">End of To Remove</div>
							</div>
							<br> -->
							<?php print render($form['field_variants_and_price']); ?>
							<br>
							<?php print render($form['field_agent_commission']); ?>
							<?php print render($form['field_commission_rate']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Add-ons</h3>
							<br>
							<?php print render($form['field_add_ons_prices']); ?>
						</div>
						<br>
						<br>
						
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Terms & Conditions</h3>
							<br>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey">To Remove</div>
									<p class="custom-field-description font-size-10">Transfer to terms and conditions multiple fields.</p>
									<br>
									<?php /* print render($form['field_terms_and_conditions']); */ ?>
								<div class="font-alt uppercase border-bottom-grey">End To Remove</div>
								<br>
							</div> -->
							<?php print render($form['field_terms_and_conditions_multi']); ?>
						</div>
						<br>
						<br>
					<!-- End Car For Rent -->

					<!-- Car Model -->
					<?php elseif(($category_id_edit == "339154") && ($listing_type_id_edit == "11")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<br>
							
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_name']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_model']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_model_year']); ?>
								</div>
							</div>
							<br>
							<div class="clearfix row">
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_engine']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_engines']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cc_motorcycle']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_torque']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_autonomy']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_acceleration']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_transmission']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_length']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight_power_ratio']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_passenger']); ?>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_fuel_type']); ?>
								</div>
							</div>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Production</h3>
							<br>
							<div class="padding-5">
								<?php print render($form['field_concept_model']); ?>
							</div>
							<div class="bg-light-grey padding-5">
								<div class="clearfix row">
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_past_model']); ?>
									</div>
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_past_model_year_start']); ?>
									</div>
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_past_model_year_end']); ?>
									</div>
								</div>
							</div>
							<br>
							<div class="bg-light-grey padding-5">
								<div class="clearfix row">
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_current_model']); ?>
									</div>
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_current_model_year_start']); ?>
									</div>
								</div>
							</div>
							<br>
							<div class="bg-light-grey padding-5">
								<div class="clearfix row">
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_future_model']); ?>
									</div>
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_future_model_year_start']); ?>
									</div>
								</div>
							</div>
							<br>
							<div class="bg-light-grey padding-5">
								<div class="clearfix row">
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_limited_production']); ?>
									</div>
									<div class="col-md-4 col-sm-12 col-xs-12 align-left">
										<?php print render($form['field_units']); ?>
									</div>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Manufacturer Suggested Retail Price</h3>
							<br>
							<?php print render($form['field_manufacturer_srp']); ?>	
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Variants & Pricelist Factory</h3>
							<br>
							<?php print render($form['field_variants_and_price']); ?>	
						</div>
						<br>
						<br>
					
					<!-- End Car Model -->

					<!-- Yacht for Sale -->
					<?php elseif(($category_id_edit == "339155")  && ($listing_type_id_edit == "4")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php 
								print render($form['title']);
								print render($form['field_teaser_description']);
								print render($form['body']); 
							?>
							<br>
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_brand_name']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_model']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_builder']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_designer']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year_refit']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_sleepover_capacity']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_length']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cruise_speed']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_max_capacity']); */ ?>
								</div> -->
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_name']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_model']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_designer']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year_refit']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_condition']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_new_availability']); ?>
								</div>
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_sleepover_capacity']); */ ?>
								</div> -->
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_max_capacity']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_builder']); */ ?>
								</div> -->
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_overnight_capacity']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_day_cruise_capacity']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cabin']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_bathroom']); ?>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">General Details</h3>
							<br>
							<div class="clearfix row">
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_max_speed']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_beam']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_fuel_consumption']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_child_allowed']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_smoking_allowed']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_horsepower']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cruise_range']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_draft']); */ ?>
								</div> -->
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_max_speed']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cruise_speed']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cruise_range']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_beam']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_draft']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_length']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_crew_beds‎']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_engine']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_engine_hours']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_fuel_consumption']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_hull_material']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_superstructure_material']); ?>
								</div>
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_child_allowed']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_smoking_allowed']); */ ?>
								</div> -->
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_horsepower']); */ ?>
								</div> -->
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Amenities</h3>
							<br>
							<div class="clearfix row">
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php /* print render($form['field_jacuzzi']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_hot_tub']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_gym']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_video_game']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_steam_room']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_helipad']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_wifi']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_cinema']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_swimming_pool']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_maker']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_board_game']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_tv']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_elevator']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_sound_system']); */ ?>
								</div> -->
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php /* print render($form['field_jacuzzi']); */ ?>
								</div> -->
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_hot_tub']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_gym']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_swimming_pool']); ?>
								</div>
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php /* print render($form['field_video_game']); */ ?>
								</div> -->
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_steam_room']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_helipad']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_bbq']); ?>
								</div>
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php /* print render($form['field_wifi']); */ ?>
								</div> -->
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_cinema']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kitchen']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_maker']); ?>
								</div>
								<!-- <div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php /* print render($form['field_board_game']); */ ?>
								</div> -->
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_tv']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_elevator']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_sound_system']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_air_condition']); ?>
								</div>
							</div>
							<?php /* print render($form['field_amenities_details']); */ ?>
						</div>
						<br>
						<br>
						<!-- <div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Guest Capacity & Rooms</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-12">
									<?php /* print render($form['field_cabin']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_bedroom']); ?>
								</div>
								<div class="col-md-12">
									<?php print render($form['field_bathroom']); ?>
								</div>
							</div>
							<?php print render($form['field_rooms_details']); */ ?>
						</div> -->
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Location</h3>
							<br>
							<?php
								print render($form['field_country_area']); 
								print render($form['field_area']); 
							?> 
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Water Toys & Outdoor Activities</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_ski_adult']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_ski_child']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_fishing_rod']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_beach_club']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_diving_equipment']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_underwater_camera']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_slide']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_swim_platform']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_windsurfer']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_wakeboard']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_deep_fishing_equipment']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item"> 
									<?php print render($form['field_diving_compressors']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_jetski']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_paddle_board']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_scurfer']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_snorkel_gear']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_inflatable_platform']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kiteboard']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_seabob']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kayak']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_floating_mat']); ?>
								</div>
							</div>
							<?php print render($form['field_water_sports_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Dinghies</h3>
							<br>
							<?php print render($form['field_dinghies']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rate</h3>
							<br>
							<div class="row clearfix">
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_currency']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price']); ?>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price_label']); ?>
								</div>
							</div>
							<?php print render($form['field_rates_details']); ?>
							<?php print render($form['field_inclusions']); ?>
							<?php print render($form['field_exclusions']); ?>
							<?php print render($form['field_add_ons']); ?>
							<?php print render($form['field_charter_rates']); ?>
							<?php print render($form['field_charter_exclusions']); ?>
							<?php print render($form['field_charter_inclusions']); ?>
							<?php print render($form['field_charter_rules']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Date Added</h3>
							<div class="row clearfix">
								<?php print render($form['field_date_added']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Date Renewed</h3>
							<div class="row clearfix">
								<?php print render($form['field_renew_date']); ?>
							</div>
						</div>
						<br>
						<br>
					
					<!-- End Yacht For Sale -->

					<!-- Yacht for Rent -->
					<?php elseif(($category_id_edit == "339155")  && ($listing_type_id_edit == "5")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
							<?php print render($form['field_builder']); ?>
							<?php print render($form['field_designer']); ?>
							<br>
							
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_name']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_model']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year_refit']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_sleepover_capacity']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_length']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cruise_speed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_max_capacity']); ?>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">General Details</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_max_speed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_beam']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_fuel_consumption']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_child_allowed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_smoking_allowed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_horsepower']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cruise_range']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_draft']); ?>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Amenities</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_jacuzzi']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_hot_tub']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_gym']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_video_game']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_steam_room']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_helipad']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_wifi']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_cinema']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_swimming_pool']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_maker']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_board_game']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_tv']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_elevator']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_sound_system']); ?>
								</div>
							</div>
							<?php print render($form['field_amenities_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Guest Capacity & Rooms</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4">
									<?php print render($form['field_cabin']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_bedroom']); ?>
								</div>
								<div class="col-md-4">
									<?php print render($form['field_bathroom']); ?>
								</div>
							</div>
							<?php print render($form['field_rooms_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Water Toys & Outdoor Activities</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_ski_adult']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_ski_child']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_fishing_rod']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_beach_club']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_diving_equipment']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_underwater_camera']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_slide']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_swim_platform']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_windsurfer']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_wakeboard']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_deep_fishing_equipment']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item"> 
									<?php print render($form['field_diving_compressors']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_jetski']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_paddle_board']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_scurfer']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_snorkel_gear']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_inflatable_platform']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kiteboard']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_seabob']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kayak']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_floating_mat']); ?>
								</div>
							</div>
							<?php print render($form['field_water_sports_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Meals & Drinks</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_coffee_machine']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kitchen']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_wine_cooler']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_bbq']); ?>
								</div>
							</div>
							<?php print render($form['field_meals_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Dinghies</h3>
							<br>
							<?php print render($form['field_dinghies']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">The Crew</h3>
							<br>
							<?php print render($form['field_languages_available']); ?>
							<?php print render($form['field_crew']); ?>
							<?php print render($form['field_crew_details']); ?>
							<?php print render($form['field_country_text']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rates & Packages</h3>
							<br>
							<?php print render($form['field_currency']); ?>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey color-red">To Remove</div>
								<p class="custom-field-description font-size-10">Transfer to variant section if fields are available.</p>
								<br>
								<?php /* print render($form['field_price']); ?>
								<?php print render($form['field_price_label']); ?>
								<?php print render($form['field_discount_offered']); ?>
								<?php print render($form['field_rates_details']); ?>
								<?php print render($form['field_inclusions']); ?>
								<?php print render($form['field_exclusions']); ?>
								<?php print render($form['field_add_ons']); ?>
								<?php print render($form['field_charter_rates']); ?>
								<?php print render($form['field_charter_exclusions']); ?>
								<?php print render($form['field_charter_inclusions']); ?>
								<?php print render($form['field_charter_rules']); */ ?>
								<div class="font-alt uppercase border-bottom-grey color-red">End of To Remove</div>
							</div>
							<br> -->
							<?php print render($form['field_variants_and_price']); ?>
							<br>
							<?php print render($form['field_agent_commission']); ?>
							<?php print render($form['field_commission_rate']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Add-ons</h3>
							<br>
							<?php print render($form['field_add_ons_prices']); ?>
						</div>
						<br>
						<br>
						
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Terms & Conditions</h3>
							<br>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey">To Remove</div>
									<p class="custom-field-description font-size-10">Transfer to terms and conditions multiple fields.</p>
									<br>
									<?php /* print render($form['field_terms_and_conditions']); */ ?>
								<div class="font-alt uppercase border-bottom-grey">End To Remove</div>
								<br>
							</div> -->
							<?php print render($form['field_terms_and_conditions_multi']); ?>
						</div>
						<br>
						<br>
					<!-- End Yacht For Rent -->

					<!-- Yacht Model -->
					<?php elseif(($category_id_edit == "339155")  && ($listing_type_id_edit == "11")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
							<?php print render($form['field_builder']); ?>
							<?php print render($form['field_designer']); ?>
							<?php print render($form['field_delivery_period_new_model']); ?>
							<br>
							
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_name']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_brand_model']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year_refit']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_sleepover_capacity']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_length']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cruise_speed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_max_capacity']); ?>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">General Details</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_max_speed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_beam']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_weight']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_fuel_consumption']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_child_allowed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_smoking_allowed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_horsepower']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_cruise_range']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_draft']); ?>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Amenities</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_jacuzzi']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_hot_tub']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_gym']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_video_game']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_steam_room']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_helipad']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_wifi']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_cinema']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_swimming_pool']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_maker']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_board_game']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_tv']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_elevator']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_sound_system']); ?>
								</div>
							</div>
							<?php print render($form['field_amenities_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Guest Capacity & Rooms</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4">
									<?php print render($form['field_cabin']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_bedroom']); ?>
								</div>
								<div class="col-md-4">
									<?php print render($form['field_bathroom']); ?>
								</div>
							</div>
							<?php print render($form['field_rooms_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Water Toys & Outdoor Activities</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_ski_adult']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_water_ski_child']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_fishing_rod']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_beach_club']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_diving_equipment']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_underwater_camera']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_slide']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_swim_platform']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_windsurfer']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_wakeboard']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_deep_fishing_equipment']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item"> 
									<?php print render($form['field_diving_compressors']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_jetski']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_paddle_board']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_scurfer']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_snorkel_gear']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_inflatable_platform']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kiteboard']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_seabob']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_kayak']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left no-label-form-item">
									<?php print render($form['field_floating_mat']); ?>
								</div>
							</div>
							<?php print render($form['field_water_sports_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<h3 class="no-margin uppercase">Dinghies</h3>
							<br>
							<?php print render($form['field_dinghies']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Manufacturer Suggested Retail Price</h3>
							<br>
							<?php print render($form['field_manufacturer_srp']); ?>	
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Variants & Pricelist Factory</h3>
							<br>
							<?php print render($form['field_variants_and_price']); ?>	
						</div>
						<br>
						<br>		
					<!-- End Yacht Model -->

					<!-- Experiences & Activities OR Travel and Getaway -->
					<?php elseif( (($category_id_edit == "380159")) || ($category_id_edit == "339187")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<br>
							<?php print render($form['title']); ?>
							<br>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
							<?php print render($form['field_duration_days']); ?>
							<?php print render($form['field_departure_area']); ?>
							<?php print render($form['field_arrival_area']); ?>
							<?php print render($form['field_visited_area']); ?>
							<?php print render($form['field_child_policy']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rates & Packages</h3>
							<br>
							<?php print render($form['field_currency']); ?>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey color-red">To Remove</div>
								<p class="custom-field-description font-size-10">Transfer to variant section if fields are available.</p>
								<br>
								<?php /* print render($form['field_price']); ?>
								<?php print render($form['field_price_label']); ?>
								<?php print render($form['field_discount_offered']); ?>
								<?php print render($form['field_rates_details']); ?>
								<?php print render($form['field_inclusions']); ?>
								<?php print render($form['field_exclusions']); ?>
								<?php print render($form['field_add_ons']); */ ?>
								<div class="font-alt uppercase border-bottom-grey color-red">End of To Remove</div>
							</div>
							<br> -->
							<?php print render($form['field_variants_and_price']); ?>
							<br>
							<?php print render($form['field_agent_commission']); ?>
							<?php print render($form['field_commission_rate']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Add-ons</h3>
							<br>
							<?php print render($form['field_add_ons_prices']); ?>
						</div>
						<br>
						<br>
					
					<!-- End Experiences & Activities OR Travel and Getaway -->

					<!-- Estate for Rent & Sale -->
					<?php elseif(($category_id_edit == "339156")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_land_size']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_floor_aera']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_building']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_staff_room']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_parking']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_renovation_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_beach_length']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_car_space']); ?>
								</div>
							</div>
							<?php print render($form['title']); ?>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<?php print render($form['field_status_development']); ?>
							<?php print render($form['field_rfo_date']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_type_of_estate']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_authenticity_documents']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_property_style']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_property_private_amenities']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_village_building_amenities']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_payment_conditions']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<?php print render($form['field_nearest_landmark']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="clearfix row">
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_bedroom']); ?>
								</div>
								<div class="col-md-6">
									<?php print render($form['field_bathroom']); ?>
								</div>
							</div>
							<?php print render($form['field_rooms_details']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rates & Packages</h3>
							<br>
							<?php print render($form['field_currency']); ?>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey color-red">To Remove</div>
								<p class="custom-field-description font-size-10">Transfer to variant section if fields are available.</p>
								<br>
								<?php /* print render($form['field_price']); ?>
								<?php print render($form['field_price_label']); ?>
								<?php print render($form['field_discount_offered']); ?>
								<?php print render($form['field_rates_details']); ?>
								<?php print render($form['field_inclusions']); ?>
								<?php print render($form['field_exclusions']); ?>
								<?php print render($form['field_add_ons']); */ ?>
								<div class="font-alt uppercase border-bottom-grey color-red">End of To Remove</div>
							</div>
							<br> -->
							<?php print render($form['field_variants_and_price']); ?>
							<br>
							<?php print render($form['field_agent_commission']); ?>
							<?php print render($form['field_commission_rate']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Add-ons</h3>
							<br>
							<?php print render($form['field_add_ons_prices']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Date Added</h3>
							<div class="row clearfix">
								<?php print render($form['field_date_added']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Date Renewed</h3>
							<div class="row clearfix">
								<?php print render($form['field_renew_date']); ?>
							</div>
						</div>
						<br>
						<br>
							
					<!-- End Estate For Rent & Sale -->

					<!-- Event Venue for Rent -->
					<?php elseif(($category_id_edit == "339188")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_seating_capacity']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_max_capacity']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_overnight_capacity']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_indoor_surface']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_outdoor_surface']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
							</div>
							<br>
							<?php print render($form['title']); ?>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_type_of_event_venue']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_event_venue_amenities']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rates & Packages</h3>
							<br>
							<?php print render($form['field_currency']); ?>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey color-red">To Remove</div>
								<p class="custom-field-description font-size-10">Transfer to variant section if fields are available.</p>
								<br>
								<?php /* print render($form['field_price']); ?>
								<?php print render($form['field_price_label']); ?>
								<?php print render($form['field_discount_offered']); ?>
								<?php print render($form['field_rates_details']); ?>
								<?php print render($form['field_inclusions']); ?>
								<?php print render($form['field_exclusions']); ?>
								<?php print render($form['field_add_ons']); */ ?>
								<div class="font-alt uppercase border-bottom-grey color-red">End of To Remove</div>
							</div>
							<br> -->
							<?php print render($form['field_variants_and_price']); ?>
							<br>
							<?php print render($form['field_agent_commission']); ?>
							<?php print render($form['field_commission_rate']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Add-ons</h3>
							<br>
							<?php print render($form['field_add_ons_prices']); ?>
						</div>
						<br>
						<br>		
					<!-- End Event Venue For Rent -->

					<!-- Vacation & Resort for Rent -->
					<?php elseif(($category_id_edit == "339186")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['title']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_room_size']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_indoor_surface']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_outdoor_surface']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_resort_total_surface']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year_built']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_check_in_time']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_check_out_time']); ?>
								</div>
							</div>
							<?php print render($form['field_country_area']); ?> <?php print render($form['field_area']); ?> 
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_type_of_luxury_retreats']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Accommodations</h3>
							<br>
							<div class="clearfix row">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_bedroom']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_bathroom']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_adult']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_number_of_kids']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_king_size_bed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_queen_size_bed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_singe_size_bed']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_sofa_bed']); ?>
								</div>
								<!-- <div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php /* print render($form['field_total_number_of_beds']); */ ?>
								</div> -->
							</div>
							<br>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_villa_room_facilities']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_bathroom_toiletries']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_comfort_entertainment']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_dining']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_layout_furnishing']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<div class="checkbox-col-3">
								<?php print render($form['field_clothing_laundry']); ?>
							</div>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rates & Packages</h3>
							<br>
							<?php print render($form['field_currency']); ?>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey color-red">To Remove</div>
								<p class="custom-field-description font-size-10">Transfer to variant section if fields are available.</p>
								<br>
								<?php /* print render($form['field_price']); ?>
								<?php print render($form['field_price_label']); ?>
								<?php print render($form['field_discount_offered']); ?>
								<?php print render($form['field_rates_details']); ?>
								<?php print render($form['field_inclusions']); ?>
								<?php print render($form['field_exclusions']); ?>
								<?php print render($form['field_add_ons']); */ ?>
								<div class="font-alt uppercase border-bottom-grey color-red">End of To Remove</div>
							</div>
							<br> -->
							<?php print render($form['field_variants_and_price']); ?>
							<br>
							<?php print render($form['field_agent_commission']); ?>
							<?php print render($form['field_commission_rate']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Add-ons</h3>
							<br>
							<?php print render($form['field_add_ons_prices']); ?>
						</div>
						<br>
						<br>

						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Terms & Conditions</h3>
							<br>
							<!-- <div class="color-red fw-600">
								<div class="font-alt uppercase border-bottom-grey">To Remove</div>
									<p class="custom-field-description font-size-10">Transfer to terms and conditions multiple fields.</p>
									<br>
									<?php /* print render($form['field_terms_and_conditions']); */ ?>
								<div class="font-alt uppercase border-bottom-grey">End To Remove</div>
								<br>
							</div> -->
							<?php print render($form['field_terms_and_conditions_multi']); ?>
						</div>
						<br>
						<br>

					<!-- End Vacation & Resort For Rent -->
					
					<!-- Watches -->
					<?php elseif(($category_id_edit == "397644")): ?>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Short Specifics</h3>
							<br>
							<?php print render($form['title']); ?>
							<?php print render($form['field_country_area']); ?>
							<?php print render($form['field_area']); ?>
							<div class="clearfix row">
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_gender']); ?>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_year']); ?>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_case_material']); ?>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_case_diameter']); ?>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_movements']); ?>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_condition']); ?>
								</div>
							</div>		
							<?php print render($form['field_teaser_description']); ?>
							
							<?php print render($form['body']); ?>
						</div>
						<br>
						<br>
						<div class="bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">Rate</h3>
							<br>
							<div class="row clearfix">
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_currency']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price']); ?>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_price_label']); ?>
								</div>
							</div>
						</div>
						<br>
						<br>
					<?php endif; ?>
					<!-- End Watches -->
					
					<!-- GENERAL FIELDS -->

					<div class="bg-white border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Contact Info</h3>
						<br>
						<?php print render($form['field_contact_number']); ?>
						<?php print render($form['field_address_text']); ?>
						<?php print render($form['field_website']); ?>
						<?php print render($form['field_email']); ?>
					</div>
					<br>
					<br>
					<div class="bg-white border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Add Visuals</h3>
						<br>
						<!----------------------------- Gallery -------------------------------->
						<h4 class="no-margin uppercase">Gallery</h4>
						<br>
						<p class="custom-field-description font-size-10">Upload a high definition image for gallery.<strong>This will appear on the lower part of the brand page.</strong>
						<br>
						Image size should be: <strong>(800x600)</strong> Upload size is <strong>300 KB</strong> or less.</p>
						<?php print render($form['field_images']); ?>
						<br>
						<!----------------------------- Thumbnail -------------------------------->
						<h4 class="no-margin uppercase">Thumbnail</h4>
						<br>
						<p class="custom-field-description font-size-10">Upload a high definition image for thumbnail.<strong>This will appear on the brand directories.</strong>
						<br>
						Image size should be: <strong>(800x600)</strong> Upload size is <strong>300 KB</strong> or less.</p>
						<?php print render($form['field_thumbnail']); ?>
						<br>
						<!----------------------------- Video Links -------------------------------->
						<h4 class="no-margin uppercase">Youtube | Vimeo Video Link</h4>
						<br>
						<p class="custom-field-description font-size-10">Copy and paste the link of your YouTube or Vimeo link.</p>
						<?php print render($form['field_video_link']); ?>
						<br>
					</div>
					<br>
					<br>
					<div class="bg-white border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Highlights</h3>
						<br>
						<?php print render($form['field_feature_details']); ?>
					</div>
					<br>
					<br>
					<?php if (empty($admin) ? FALSE : TRUE) : ?>
						<div class="lxv-fields bg-white border-radius-3 padding-15">
							<h3 class="no-margin uppercase">LXV Fields</h3>
							<br>
							<?php print render($form['field_ref_number']); ?>
							<?php print render($form['field_google_drive']); ?>
							<br>

							<div class="clearfix row">
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_luxury_level']); ?>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 align-left">
									<?php print render($form['field_rarity']); ?>
								</div>
							</div>
							<br>
							<?php print render($form['field_luxe_guide_exclusive']); ?>
							<br>
							<?php print render($form['field_luxe_guide_specials']); ?>
							<?php print render($form['field_models_connected']); ?>
							<?php print render($form['field_linked_listings']); ?>
							<?php print render($form['field_booking_link']); ?>
							<?php print render($form['field_professionals_connected']); ?>
							<?php print render($form['field_seo_title']); ?>
							<?php print render($form['field_meta_description']); ?>
							<?php print render($form['additional_settings']); ?>
						</div>
					<?php endif; ?>
					<br>
					<br>
					<!-- Additional Classifications -->
					<div class="bg-white border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Related Main Classes</h3>
						<br>
						<?php print render($form['field_sub_category_connected']); ?>
					</div>
					<br>
					<br>
					<!-- End Additional Classifications -->
					<!-- Additional Classifications -->
					<div class="bg-white border-radius-3 padding-15">
						<h3 class="no-margin uppercase">Additional Classifications</h3>
						<br>
						<?php print render($form['field_additional_classifications']); ?>
					</div>
					<br>
					<br>
					<!-- END GENERAL FIELDS -->
				</div>
			</div>
		</div>
	</div>
	<br>
	<div>
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
<?php endif; ?>
<!-- END OF EDIT NODE CODE -->

<div class="hide"><?php print drupal_render_children($form);?></div>