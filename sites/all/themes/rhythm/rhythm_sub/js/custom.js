(function($) {
	$(document).ready(function(){

		
		var main_lat = $(".main-lat").html();
		var main_lon = $(".main-lon").html();
		
		$("#edit-field-geofield-distance-origin-lat").val(main_lat);
		$("#edit-field-geofield-distance-origin-lon").val(main_lon);
		$("#edit-submit-directory").click();
		
		/*
		* Remove the default 'N/A' option for non-required fields on the DD Service Availability Survey
		*/
		$('#listings-node-form div.form-type-radios').each(function() {
			$(this).not(':has(label:has(span.form-required))').find('div.form-radios').children().first().remove();
		});
		/*
		$("#edit-field-category-tab option[value='1']").remove();
		$("#edit-field-category-tab option[value='2']").remove();
		$("#edit-field-category-tab option[value='3']").remove();
	
		$('#edit-field-category-tab').find('[data-option-array-index="1"]').remove();
		$('#edit-field-category-tab').find('[data-option-array-index="2"]').remove();
		$('#edit-field-category-tab').find('[data-option-array-index="3"]').remove();
		*/
		$('.show-form').click(function(){
			var professional_id = $("#edit-field-global-professional-und  option:selected").val();
			var listing_type = $("#edit-field-category-tab-und  option:selected").val();
			var main_category = $("#edit-field-pro-parent-category-und  option:selected").val();
			

			//var baseUrl = document.location.origin;
			var baseUrl = "/node/add/listings";
			window.location = baseUrl + "?pid=" +  professional_id + "&tlid=" +  listing_type + "&mcid=" + main_category;
		});

		function sticky_sidebar(){
			if ($(window).width() >= 991){  
				if($('.js-sticky-container').html() != null){
					/*var div_top = $('.js-sticky-container').offset().top;
					var nav_height = $('.nav-container').height();
					var offset_top = parseFloat(div_top) - parseFloat(nav_height);*/
					$('.js-sticky').stick_in_parent({
						'parent': $('.js-sticky-container'),
						'offset_top': 92
					}).on("sticky_kit:stick", function(e){
						$(this).parent().css('height', 'auto');
						/* $(this).parent().css('background', '#f8f8f8'); */
					}).on('sticky_kit:bottom', function(e) {
						$(this).parent().css('position', 'relative');
					}).on('sticky_kit:unbottom', function(e) {
						$(this).parent().css('position', 'relative');
					});
				}
			}else{
				if($('.js-sticky-container').html() != null){
					$(".js-sticky").trigger("sticky_kit:detach");
				}
			}
		}
		
		function stopSidebarCarousel() {
			if($('.js-sticky-container').html() != null){
				var owl = $('.js-sticky-container').find('.owl-carousel');
				owl.trigger('destroy.owl.carousel');
			}
			if($('.js-sticky-container').find('.sidebar-exposed-container').html() != null){
				if($('.filter-btn-sticky').html() != null){
					$('.filter-btn-sticky').addClass('hide'); 
				}
			}
		}

		function displayFilterSidebar(){
			if($('.sidebar-exposed-container').html() != null){
				$('.sidebar-exposed-container').closest('.js-sticky-container').addClass("filter-sidebar-container");
			}
		}

		function hideFilterSidebar(){
			if($('.sidebar-exposed-container').html() != null){
				$('.sidebar-exposed-container').closest('.js-sticky-container').removeClass("filter-sidebar-container");
				$('.sidebar-exposed-container').closest('.js-sticky-container').removeClass("show-filter-sidebar-container");
			}
		}
		$('.filter-btn-sticky').click(function(){
			$('.sidebar-exposed-container').closest('.js-sticky-container').toggleClass("show-filter-sidebar-container");
		});

		if ( $(window).width() < 991 ) {
			startSidebarCarousel();
			displayFilterSidebar();
		} else {
			stopSidebarCarousel();
			hideFilterSidebar();
		}

		$(window).resize(function(){
			sticky_sidebar();
			if ( $(window).width() < 991 ) {
				startSidebarCarousel();
				displayFilterSidebar();
			}
			else {
				stopSidebarCarousel();
				hideFilterSidebar();
			}
		});
	});
	$(document).ready(function(){
		$('#edit-type option').each(function(){
		  	var li_clone = $('.custom-type-filter').find('li').first().clone();
		  	var label = $(this).text() , value = $(this).val() ;
		  	$(li_clone).find('a').attr('data-type', value);
		    $(li_clone).find('a').text(label);
		    if($(this).is(':selected')){
		    	$(li_clone).addClass('active');
		    }
		    $('.custom-type-filter').append(li_clone);

		});
		$('.custom-type-filter').find('li').first().remove().once();

		$('.custom-type-filter').find('li').click(function(){
			var type_value = $(this).find('a').attr("data-type");
			
			$(this).closest('.dealer-custom-filter').find('#edit-type  option[value=' + type_value + ']').attr('selected','selected');
			$(this).closest('.dealer-custom-filter').find('#edit-type').val(type_value).change();
			
			
			$(this).closest('.dealer-custom-filter').find('#edit-field-marketplace-product-type-value  option[value=' + type_value + ']').attr('selected','selected');
			$(this).closest('.dealer-custom-filter').find('#edit-field-marketplace-product-type-value').val(type_value).change();
			
			$(this).closest('.dealer-custom-filter').find('.submit-ajax-loader').removeClass('hide');
			$(this).closest('.dealer-custom-filter').find('.view-content').addClass('hide');
			$(this).closest('.dealer-custom-filter').find('.pagination').addClass('hide');
			$(this).closest('.dealer-custom-filter').find('.views-exposed-widgets').attr('style','display: block !important');
		});

		$('.dealer-custom-filter').find('.status-filter li').click(function(){
			var status_value = $(this).find('a').attr("data-status-type");
			$(this).closest('.dealer-custom-filter').find('#edit-status option[value=' + status_value + ']').attr('selected','selected');
			$(this).closest('.dealer-custom-filter').find('#edit-status').val(status_value).change();
			$(this).closest('.dealer-custom-filter').find('.submit-ajax-loader').removeClass('hide');
			$(this).closest('.dealer-custom-filter').find('.view-content').addClass('hide');
			$(this).closest('.dealer-custom-filter').find('.pagination').addClass('hide');
			$(this).closest('.dealer-custom-filter').find('.views-exposed-widgets').attr('style','display: block !important');
		});

		$('.views-exposed-widget').each(function(){
			if($(this).find('.form-group').css('display') == 'none' )  { 
				$(this).addClass('hide');
			} 
			else { 
				$(this).removeClass('hide');
			}
		});

		var max = 0;
		$('.btn-mod-medium-flag').each(function(){
			var c_width = parseInt($(this).find('.flag-wrapper').width());
			console.log(c_width);
			if (c_width > max) {
				max = c_width;
			}
		});
		if(max !== 0){
			$('.btn-mod-medium-flag').each(function(){
		  	$(this).find('.flag').css('min-width', max);
		  });	
		}
	});
	/*$(document).ajaxStart(function() {
		if($('.loader-container').html() != null){
			$('.loader-container').removeClass('hide');
			$('.loader-container').find('.loader').removeClass('hide');
		}
	});*/
	$(document).ajaxComplete(function() {
		if($('.sidebar-exposed-container').html() != null){
			$('.sidebar-exposed-container').closest('.js-sticky-container').removeClass("show-filter-sidebar-container");
		}
		/*if($('.loader-container').html() != null){
			$('.loader-container').addClass('hide');
			$('.loader-container').find('.loader').addClass('hide');
		}*/
		$('#edit-type option').each(function(){
		  	var li_clone = $('.custom-type-filter').find('li').first().clone();
		  	var label = $(this).text() , value = $(this).val() ;
		  	$(li_clone).find('a').attr('data-type', value);
		    $(li_clone).find('a').text(label);
		    $('.custom-type-filter').append(li_clone);
		});
		$('.dealer-custom-filter').find('submit-ajax-loader').addClass('hide');
		$('.dealer-custom-filter').find('.view-content').removeClass('hide');
		$('.dealer-custom-filter').find('.pagination').removeClass('hide');
		var active_type = $('.dealer-custom-filter').find("#edit-type option:selected").val();
		$("[data-type='" + active_type + "']").closest('li').addClass('active');
		$('.custom-type-filter').find('li').first().remove().once();

		$('.dealer-custom-filter').find('.status-filter li').click(function(){
			var status_value = $(this).find('a').attr("data-status-type");
			$(this).closest('.dealer-custom-filter').find('#edit-status option[value=' + status_value + ']').attr('selected','selected');
			$(this).closest('.dealer-custom-filter').find('#edit-status').val(status_value).change();
			$(this).closest('.dealer-custom-filter').find('.submit-ajax-loader').removeClass('hide');
			$(this).closest('.dealer-custom-filter').find('.submit-ajax-loader').removeClass('hide');
			$(this).closest('.dealer-custom-filter').find('.views-exposed-widgets').attr('style','display: block !important');
		});

		$('.custom-type-filter').find('li').click(function(){
			var status_value = $(this).find('a').attr("data-type");
			$(this).closest('.dealer-custom-filter').find('#edit-type  option[value=' + status_value + ']').attr('selected','selected');
			$(this).closest('.dealer-custom-filter').find('#edit-type').val(status_value).change();
			$(this).closest('.dealer-custom-filter').find('#edit-field-marketplace-product-type-value option[value=' + status_value + ']').attr('selected','selected');
			$(this).closest('.dealer-custom-filter').find('#edit-field-marketplace-product-type-value').val(status_value).change();
			$(this).closest('.dealer-custom-filter').find('.submit-ajax-loader').removeClass('hide');
			$(this).closest('.dealer-custom-filter').find('.view-content').addClass('hide');
			$(this).closest('.dealer-custom-filter').find('.pagination').addClass('hide');
			$(this).closest('.dealer-custom-filter').find('.views-exposed-widgets').attr('style','display: block !important');
		});

		$('.views-exposed-widget').each(function(){
			if($(this).find('.form-group').css('display') == 'none' )  { 
				$(this).addClass('hide');
			} 
			else { 
				$(this).removeClass('hide');
			}
		});
		var max = 0;
		$('.btn-mod-medium-flag').each(function(){
			var c_width = parseInt($(this).find('.flag-wrapper').width());
			if (c_width > max) {
				max = c_width;
			}
		});
		if(max !== 0){
			$('.btn-mod-medium-flag').each(function(){
		  	$(this).find('.flag').css('min-width', max);
		  });	
		}
	});

	// Inherit wrap content max width
	$(document).ready(function(){
		var max = 0;
		$('.wrap-content').each(function(){
			var c_width = parseInt($(this).width());
			if (c_width > max) {
				max = c_width;
			}
		});
		if(max !== 0){
			$('.wrap-content').each(function(){
		  	$(this).css('min-width', max);
		  });
		}
	});

	$(document).ajaxComplete(function(){
		var max = 0;
		$('.wrap-content').each(function(){
			var c_width = parseInt($(this).width());
			if (c_width > max) {
				max = c_width;
			}
		});
		if(max !== 0){
			$('.wrap-content').each(function(){
		  	$(this).css('min-width', max);
		  });
		}
	});

	// Drop Down Menu
    /* $(document).ready(function() {

		 $('#menu-select').click(function(){
			$( "#drop-down-menu" ).slideToggle('fast');
		});

	}); */

	// Drop Down Menu
	/* $(document).ready(function() {
		$('.drop-down-menu li a').click(function(){
			$(this).closest('li').find('ul').slideToggle();
		});
		$('.drop-down-menu-nav li a').click(function(){
			$(this).closest('li').find('ul').slideToggle();
		});
	}); */

	// Screen Height Sidebar Navigation
	$(document).ready(function() {
		var screen_height = $(window).height() - 47;
		$('.main-sidebar-nav').css({
			height: screen_height + "px",
		});
		$(window).resize(function() {
			var screen_height = $(window).height() - 47;
			$('.main-sidebar-nav').css({
				height: screen_height + "px",
			});
		});
	});

	// Height Top Navigation
	$(document).ready(function() {
		var nav_height = $('.top-nav').height();
		$('.top-nav-container').css({
			height: nav_height + "px",
		});
		$(window).resize(function() {
			var nav_height = $('.top-nav').height();
			$('.top-nav-container').css({
				height: nav_height + "px",
			});
		});
	});

	// Youtube Embed Autoplay Modal
	$(document).ready(function() {
	    $(".video-modal").click(function () {
		    var theModal = $(this).data("target"),
		    videoSRC = $(this).attr("data-video"),
		    videoPL = $(this).attr("data-playlist"),
		    videoSRCauto = videoSRC + "?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&mute=0&playlist=" + videoPL;
		    $(theModal + ' iframe').attr('src', videoSRCauto);
		    $(theModal + ' button.close').click(function () {
		 	   $(theModal + ' iframe').attr('src', videoSRC);
		    });
	    });
	});

	 // Smooth Scroll
	$(document).ready(function(){
		$('.scroll').click(function() {
			$('html, body').animate({
				scrollTop: $( $.attr(this, 'href') ).offset().top 
			}, 500);
			return false;
		});
	});

	// Mobile Navigation Bar
	$(document).ready(function() {
		$(".mobile-nav").click(function() {
		 	$('.mobile-nav-bar').toggleClass("active-nav", "slow");
		});
    });

	// Main Sidebar Navigation Show and Hide
	$(document).ready(function() {
		$(".main-sidebar-nav-bar").click(function() {
			$('.main-sidebar-nav-bar').toggleClass("active-nav", "slow");
			$('.main-sidebar-nav-container').toggleClass("show-main-sidebar-nav", "slow");
		});
		/* if ($(".front").length) {
		    $(".front").find(".main-sidebar-nav-bar").addClass("active-nav", "slow");
		    $('.main-sidebar-nav-container').addClass("show-main-sidebar-nav", "slow");
		} */
	});

	// Main Top Navigation Show and Hide
	$(document).ready(function() {
		$(".main-top-nav-bar").click(function() {
			$('.main-top-nav-bar').toggleClass("active-nav", "slow");
			$('.main-top-nav-container').toggleClass("show-main-top-nav", "slow");
		});
	});

	// Check If Node Status Is Unpublished
	$(document).ready(function() {
	    $(window).on('load',function() {
        	$('#status-modal').modal('show');
    	});
    });

	// Left Sidebar Navigation Show, Hide, and Screen Resize
	$(document).ready(function() {
        $('.left-sidebar-nav').click(function(){
            $('.left-sidebar-nav-container').slideToggle('slow').toggleClass('hide-left-sidebar-nav');
        });
		var alterClass = function() {
	    	var screen_width = document.body.clientWidth;
	    	if (screen_width < 991) {
	      		$('.left-sidebar-nav-container').addClass('hide-left-sidebar-nav');
	    	} 
	    	else if (screen_width >= 991) {
	      		$('.left-sidebar-nav-container').removeClass('hide-left-sidebar-nav');
	      		$('.left-sidebar-nav-container').show();
	    	};
	  	};
	  	$(window).resize(function(){
	  		alterClass();
	 	});
	  	//Fire it when the page first loads:
	  	alterClass();
	});

	$(document).ready(function() {
	    $('.btnNext').click(function(){
	    	var required = 0;
	    	
	    	$(this).closest('.tab-pane').find('.form-required').each(function(){
	    		if($(this).closest('.form-wrapper').css('display') !== 'none'){
	    			var input = $(this).closest('.form-item').find(':input');
		    		var chosen = $(this).closest('.form-item').find('.chosen-container');
		    		var checkbox = $(this).closest('.form-item').find("input[type=checkbox]");
		    		var radio = $(this).closest('.form-item').find("input[type=radio]");
					if(($(input).val() == "") || ($(input).val() == "_none")){
			    		required ++;
			    		if(chosen.length > 0){
			    			chosen.addClass('error');
			    		}else{
			    			input.addClass('error');
			    		}
				   	}
				   	if(checkbox.length > 0){
				   		var checked_checkbox = checkbox.filter(':checked').length;
				   		if(checked_checkbox == 0){
					   		required ++;
					   	}
				   	}
				   	if(radio.length > 0){
				   		var checked_radio = radio.filter(':checked').length;
				   		console.log(checked_radio);
				   		if(checked_radio == 0){
					   		required ++;
					   	}
				   	}
				}
	    	});

	    	if(required == 0){
	    		$('.alert.error.steps-required').remove();
				$(this).closest('.tab-pane').find('.error').each(function(){
					$(this).removeClass('error');
				});
	    		$('.nav-tabs > .active').next('li').find('a').trigger('click');
	    	}
	    	else{
    			$("form").append('<div class="alert error steps-required">Fill up the required field/s with valid answer</div>');
    			var required = 0;
	    	}
		});

		$('.btnPrevious').click(function(){
			$('.nav-tabs > .active').prev('li').find('a').trigger('click');
			$('.alert.error.steps-required').remove();
		});
    });

    $(document).ready(function() {
		/* $('.menu-select').click(function(){
			$(this).closest('.menu-block-wrapper').find('.drop-down-menu').slideToggle('fast');
		});

		$('.drop-down-menu a').click(function(){
			$(this).closest('.menu-block-wrapper').find('.menu-select').text($(this).text());
			$(this).closest('.menu-block-wrapper').find('.drop-down-menu').hide();
			$(this).addClass('current');
		});

		$(document).on('click', function (e) {
		    if ($(e.target).closest('.menu-block-wrapper').length === 0) {
		        $('.drop-down-menu').slideUp('fast');
		    }
		}); */

		/* $(document).mouseup(function (e){
			var container = $('.menu-block-wrapper').find('.drop-down-menu'); // YOUR CONTAINER SELECTOR
			if (!container.is(e.target) && container.has(e.target).length === 0) {
				container.hide();
				container.slideUp();
			}
			var container = $('.menu-block-wrapper').find('.menu-select'); // YOUR CONTAINER SELECTOR
			if (container.is(e.target) && container.has(e.target).length === 0) {
				
				$('.menu-block-wrapper').find('.drop-down-menu').hide();
				console.log('hellow orld');
			}
		}); */
		
		$('ul.drop-down-menu').each(function(){
			var active_trail = 0
			$('>li a', this).each(function(){
				if($(this).hasClass( "active-trail" )){
					active_trail++;
					$(this).addClass('current');
					$(this).closest('.menu-block-wrapper').find('.menu-select').text($(this).text()).append(' <i class="fas fa-caret-down"> </i>');
					console.log(active_trail++);
				}
			});
			if(active_trail == 0){
				$(this).closest('.menu-block-wrapper').find('.menu-select').text($('>li a', this).first().text()).append(' <i class="fas fa-caret-down"> </i>');
			}
			//$('>li', this).first().remove();
		});

		$('.off-carousel-3-column-mobile').each(function(){
			$(this).find('.owl-item').addClass('col-md-4 col-sm-4 col-xs-4 col-centered no-float');
		});

		$('.off-carousel-3-column-mobile').each(function(){
			$(this).find('.owl-item').removeAttr("style");
		});
	});

    // Custom Quick Access Navigation
    $(document).ready(function() {
    	$('.custom-select').click(function(){
    		$(this).find('.select-items').slideToggle();
    	});
		$('.custom-select').find('.select-item').click(function(){
			var option_label = $(this).text();
			var option_value = $(this).attr("data-val");
			var option_type = $(this).attr("data-type");
			$(this).closest('.custom-select').find('.select-selected').text(option_label);
			$(this).closest('.custom-select').find('select option[value="' + option_value + '"]').attr('selected','selected');
			$(this).closest('.custom-select').find('select').val(option_value).change();
		});

		$('.profile-custom-select').click(function(){
    		$(this).find('.profile-select-items').slideToggle();
    	});
		

		$('.level-1-select').find('option').each(function() {
			if($(this).is(':selected')){
				var option_type = $(this).attr("data-type");
				$('.level-2-select').each(function(){
					if(option_type == $(this).attr("data-type")){
						$(this).removeClass('hide');
					}
					else{
						$(this).addClass('hide');
					}
				});
			}
		});


		$('.level-1-select').find('.select-item').click(function(){
			var option_type = $(this).attr("data-type");
			$('.level-2-select').each(function(){
				if(option_type == $(this).attr("data-type")){
			      	$(this).removeClass('hide');
			    }
			    else{
			    	$(this).addClass('hide');
			    }
			});
		});


		$('.level-2-select').find('option').each(function() {
			if($(this).is(':selected')){
				var option_type = $(this).attr("data-type");
				$('.level-3-select').each(function(){
					if(option_type == $(this).attr("data-type")){
						$(this).removeClass('hide');
					}
					else{
						$(this).addClass('hide');
					}
				});
			}
		});

		$('.level-2-select').find('.select-item').click(function(){
			var option_type = $(this).attr("data-type");
			$('.level-3-select').each(function(){
				if(option_type == $(this).attr("data-type")){
			      	$(this).removeClass('hide');
			    }
			    else{
			    	$(this).addClass('hide');
			    }
			});
		});

		var baseUrl = document.location.origin;
		var selected_country = "";
		var selected_type = "";
		$(".level-1-select").find('select').change(function(){
			selected_country = "philippines";
		});
		$(".quick-access-menu").find('select').change(function(){
			if ($( this ).hasClass("country-list")) {
				selected_country  = $(this).find("option:selected").val();
			}
			if ($( this ).hasClass("type-list")) {
				selected_type  = $(this).find("option:selected").val();
			}
			$('.submit-quick-access').attr('href', baseUrl + "/" + selected_country + "/" + selected_type);
		});

	});

	// Custom Nav Tabs
	$(document).ready(function(){
	    $('.custom-tab-container.active').show(); //initially show the `tab container` which has active class
	})

	//click event to each `tabs` element
		$('.custom-nav-tabs').on('click',function(e){
		e.preventDefault();
		$('.custom-nav-tabs').removeClass('active'); //remove active class from all the tabs
		$(this).addClass('active'); //add active to current clicked element
		var target=$(this).attr('href'); //get its href attrbute
		$('.custom-tab-container').hide().removeClass('active'); //remove active from tab container and hide all of them
		$(target).show().addClass('active'); //show target tab and add active class to it
	});


	/* $(document).ready(function(){
	
		$(document).on("click touchstart", "div.collapse-link", function(){
			// Get the target ID...
			$(this).parent().find(".read-more").text($(this).parent().find(".read-more").text() == 'See more' ? 'See Less' : 'See more');
			const target = $(this).data("target");
			$(target).removeClass("first_diplay");
			$(target).toggleClass("display");
		});

		$(document).on("click touchstart", "div.read-more", function(){
			// Get the target ID...
			$(this).text($(this).text() == 'See more' ? 'See Less' : 'See more');
			const target = $(this).data("id");
			$("#"+ target).removeClass("first_diplay");
			$("#"+ target).toggleClass("display");
		});

	}); */

	

})(this.jQuery);