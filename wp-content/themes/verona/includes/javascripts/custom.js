/*global jQuery:true*/
/*Jquery NoConflict */
jQuery(document).ready(function($) {

/*-----------------------------------------------------------------------------------*/
/*	Responsive Nav for Header
/*-----------------------------------------------------------------------------------*/
"use strict"; jQuery.fn.justtext = function() { return $(this) .clone() .children() .remove() .end() .text(); };

	var $mainNav    = $('.main-menu > div').children('ul');
	var optionsList = '<option value="" selected>Navigation...</option>';

	$mainNav.find('li a').each(function() {
			var $this   = $(this),
							$anchor = $this,
							depth   = $this.parents('ul').length - 1,
							indent  = '';
			if( depth ) {
					while( depth > 0 ) {
							indent += ' - ';
							depth--;
					}
			}$('.responsive-nav').find('span').remove();
			optionsList += '<option value="' + $anchor.attr('href') + '">' + indent + ' ' + $anchor.justtext() + '</option>';
	}).end().last()
					.after('<select class="responsive-nav">' + optionsList + '</select>');

	$('.responsive-nav').on('change', function() {
			window.location = $(this).val();
	});

/* ---------------------------------------------------------------------- */
/*  Navigation menu and it's options
/* ---------------------------------------------------------------------- */

	jQuery(document).ready(function($) {
		$("header ul li").hover(function(){
		$(this).addClass("hover");
		$('ul:first',this).css('visibility', 'visible');
	}, function(){
		$(this).removeClass("hover");
		$('ul:first',this).css('visibility', 'hidden');
	});

	// Supefish Menu
	$('header nav ul li, .main-menu').superfish({
		delay:       1000,
		animation:     {opacity:'show'},
		animationOut:  {opacity:'hide'},
		speed:       'normal',
		speedOut:    'slow',
		cssArrows:  true
	});
});

// Check if menu has icon
	$('header ul.sub-menu li').each( function() {
		if ($(this).hasClass('icon') ) {
			$(this).children('a').css("border-left", "1px solid white");
		} else {
			$(this).css("padding-left", "3px");
		}
	});

/* ---------------------------------------------------------------------- */
/*	Isotope
/* ---------------------------------------------------------------------- */

$(function(){

	var $container = $('.food-menu');

	$container.imagesLoaded( function(){
		$container.isotope({
			layoutMode: 'masonry',
			itemSelector: 'li.food-menu-item',
			animationEngine: 'jquery',
			animationOptions: {
				duration: parseInt(isotope_vars.isotope_easing_speed),
				queue: false,
				easing: isotope_vars.isotope_easing
			},
			// filter: '*'
		});
	});

	// filter items when filter link is clicked
	$('.food-menu-categories li a').click(function(){
		// select current
		$('.food-menu-categories li a').removeClass('selected');
		$(this).addClass('selected');

		var selector = $(this).attr('data-filter');
		$container.isotope({ filter: selector });
		return false;
	});

	// $container.isotope('updateSortData').isotope();

});


	// FlexSlider
	$('.flexslider').flexslider({
		/*global flex_vars*/
		directionNav: "true",
		slideshow: flex_vars.slideshow,
		slideshowSpeed: flex_vars.slideshow_duration,
		controlNav: "",
		animation: flex_vars.slider_animation
	});

/* ------------------------------------------------------------------------ */
/* Coffee grid & resto image hovers
/* ------------------------------------------------------------------------ */

	$('.photoset-grid-custom').photosetGrid({
		// Set the gutter between columns and rows
		gutter: '15px',
		rel: 'print-gallery',

		onInit: function(){},
		onComplete: function(){
			// Show the grid after it renders
			$('.photoset-grid-custom').attr('style', '');
		}
	});

	$('.photoset-row.cols-1').hover(function() {
		$(this).find('.details-link').stop().animate({'bottom' : $(this).height()/2-25, 'opacity' : 1}, 260, 'easeInSine');
	}, function(){
		$(this).find('.details-link').stop().animate({'bottom' : -25, 'opacity' : 0}, 560, 'easeOutSine');
	});
	$('.photoset-row.cols-2').hover(function() {
		$(this).find('.details-link').stop().animate({'bottom' : $(this).height()/2-15, 'opacity' : 1}, 260, 'easeInSine');
		}, function() {
		$(this).find('.details-link').stop().animate({'bottom' : -25, 'opacity' : 0}, 560, 'easeOutSine');
	});
	$('.photoset-row.cols-3, .photoset-row.cols-4').hover(function() {
		$(this).find('.details-link').stop().animate({'bottom' : $(this).height()/2-5, 'opacity' : 1}, 260, 'easeInSine');
		$(this).find('.thumb-link').stop().animate({'top' : $(this).height()/2-35, 'opacity' : 1}, 260, 'easeInSine');
		}, function() {
		$(this).find('.details-link').stop().animate({'bottom' : -25, 'opacity' : 0}, 560, 'easeOutSine');
		$(this).find('.thumb-link').stop().animate({'top' : -25, 'opacity' : 0}, 560, 'easeOutSine');
	});
	$('.boxe').hover(function() {
		$(this).find('.hover-card').stop().animate({'opacity' : 0.8}, 100, 'easeInSine');
		$(this).find('.thumb-link').stop().animate({'top' : $(this).height()/2-35, 'opacity' : 1}, 260, 'easeInSine');
	}, function(){
		$(this).find('.hover-card').stop().animate({'opacity' : 0}, 300, 'easeOutSine');
		$(this).find('.thumb-link').stop().animate({'top' : -25, 'opacity' : 0}, 560, 'easeOutSine');
	});

	$('li.latest-blog-post img, .image-wrapper a img, .blog-post-featured-image, .related-coffees img').hover(function(){
		$(this).stop(true, true).animate({opacity:'0.8'}, 200);
	},function(){
		$(this).stop(true, true).animate({opacity:'1'}, 300);
	});

/* ------------------------------------------------------------------------ */
/* Placeholders
/* ------------------------------------------------------------------------ */
	$('input[name="mc_mv_EMAIL"]').val('enter your e-mail address');
	$('input[name="mc_mv_EMAIL"]').focus(function () {
		$(this).val('');
	});

/* ------------------------------------------------------------------------ */
/* Responsive Videos
/* ------------------------------------------------------------------------ */
	$(".sidebar-widget, .video-shortcode, .videos").fitVids();

/* ------------------------------------------------------------------------ */
/* Responsive Lightbox
/* ------------------------------------------------------------------------ */
	$('.image-wrapper a').magnificPopup({
		type:'image',
		removalDelay: 300,
		mainClass: 'mfp-fade mfp-no-margins',
		closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        image: {
            verticalFit: true
        }
  	});

/* ------------------------------------------------------------------------ */
/* Misc
/* ------------------------------------------------------------------------ */
	// Pricing tables
	if('.featured') {
    	$('.pricing-table').css('padding', '30px 0');
	}

	//Only for demo
	if('.logo.centered') {
		$('.tagline').css('padding-top', '50px');
	}

	// Alert shortcode close
	$('.close').click(function(e) {
		e.preventDefault();
		$(this).parent().fadeOut(800, 'linear');
	});

});
/* EOF */