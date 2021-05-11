(function() {
  
  var $ = jQuery;

  Drupal.behaviors.table_responsive = {
    attach: function (context, settings) {
       $('.table', context).wrap('<div class = "table-responsive"></div>');
    }
  };

  Drupal.behaviors.required_fix = {
    attach: function (context, settings) {
       $('*[required="required"]', context).each(function() {
        $(this).after('<span class = "required-span">*</span>');
       });
    }
  };

  Drupal.behaviors.href_click = {
    attach: function (context, settings) {
       $('a[href="#"]', context).click(function() {
        return false;
       });
    }
  };



  Drupal.behaviors.cart_remove_wrap = {
    attach: function (context, settings) {
      $('.cart-remove-wrap a', context).click(function() {
        $(this).parent().find('input').click();
        return false;
      });
    }
  };

  Drupal.behaviors.products_filter = {
    attach: function (context, settings) {
      if($('#block-rhythm-cms-products-filter').length > 0 && $('#edit-commerce-price-amount-wrapper').length > 0) {
        $('#edit-commerce-price-amount-wrapper').hide();
        $('.products-filter-from input').val($('#edit-commerce-price-amount-wrapper #edit-commerce-price-amount-min').val());
        $('.products-filter-to input').val($('#edit-commerce-price-amount-wrapper #edit-commerce-price-amount-max').val());
        $('#block-rhythm-cms-products-filter button').click(function() {
          $('#edit-commerce-price-amount-wrapper #edit-commerce-price-amount-min').val($('.products-filter-from input').val());
          $('#edit-commerce-price-amount-wrapper #edit-commerce-price-amount-max').val($('.products-filter-to input').val());
          $('#edit-commerce-price-amount-wrapper').closest('form').submit();
          return false;
        });
      }
    }
  };

  Drupal.behaviors.product_zoom = {
    attach: function (context, settings) {
        $(".lightbox-gallery-3", context).magnificPopup({
            gallery: {
                enabled: true,
                tCounter: '<span class="mfp-counter">%curr% ' + Drupal.t('of') + ' %total%</span>' // markup of counter
            }
        });
    }
  };

  Drupal.behaviors.tb_megamenu_align = {
    attach: function (context, settings) {
      $('.mega-align-right .mn-sub', context).addClass('to-left');
    }
  };

  $(document).ready(function(){
	
    /* Accordion Function for the listings */
		$(document).on("click", "div.collapse-link", function(){
			// Get the target ID...
			$(this).parent().find(".read-more").text($(this).parent().find(".read-more").text() == 'See more' ? 'See Less' : 'See more');
			const target = $(this).data("target");
			$(target).removeClass("first_diplay");
			$(target).toggleClass("display");
		});

		$(document).on("click", "div.read-more", function(){
			// Get the target ID...
			$(this).text($(this).text() == 'See more' ? 'See Less' : 'See more');
			const target = $(this).data("id");
			$("#"+ target).removeClass("first_diplay");
			$("#"+ target).toggleClass("display");
		});
    /* Accordion Function for the listings */

    // Options for OWL Carousel
  function bigger_size_owl_carousel()
  {
    return {
      singleItem:true,
      items: 1,
      loop: true,
      margin:10,
      nav: true,
      autoHeight: false,
      autoHeightClass: 'owl-height',
      dots: false,
      navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
    };
  }

  function small_size_owl_carousel()
  {
    return {
      singleItem:true,
      items: 1,
      autoplay: true,
      autoPlaySpeed: 3000,
      autoPlayTimeout: 3000,
      autoplayHoverPause: true,
      loop: true,
      margin:10,
      nav: true,
      autoHeight: false,
      autoHeightClass: 'owl-height',
      dots: false,
      navText : ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    };
  }
  
  $(document).ajaxComplete(function(){
    $(".single-carousel.thumbnail-carousel").trigger('destroy.owl.carousel');
    $(".single-carousel.professional-carousel").trigger('destroy.owl.carousel');

    if ($(window).width() > 720) {
      // Owl Carousel
      $(".single-carousel.owl-carousel.thumbnail-carousel").owlCarousel(bigger_size_owl_carousel());
    }else{
      // Owl Carousel
      $(".single-carousel.owl-carousel.thumbnail-carousel").owlCarousel(small_size_owl_carousel());
    }
    
    if ($(window).width() > 720) {
      $(".single-carousel.owl-carousel.professional-carousel").owlCarousel(bigger_size_owl_carousel());
    }else{
      $(".single-carousel.owl-carousel.professional-carousel").owlCarousel(small_size_owl_carousel());
    }

  });

  if ($(window).width() > 720) {
    // Owl Carousel
    $(".single-carousel.owl-carousel.thumbnail-carousel").owlCarousel(bigger_size_owl_carousel());
  }else{
    // Owl Carousel
    $(".single-carousel.owl-carousel.thumbnail-carousel").owlCarousel(small_size_owl_carousel());
  }
  
  if ($(window).width() > 720) {
    $(".single-carousel.owl-carousel.professional-carousel").owlCarousel(bigger_size_owl_carousel());
  }else{
    $(".single-carousel.owl-carousel.professional-carousel").owlCarousel(small_size_owl_carousel());
  }

    var string_value = $(".article-body");
    var string_length = 200;

    truncate(string_value, string_length);

    function truncate(string, length){
      if(string.text().length > length){
        $val = string.text().substring(0, length) + '...';
      }else{
        $val = string.text();
      }

      string.html($val);
    }    
	});

}());