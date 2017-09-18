"use strict";

jQuery (function ($){
	console.time('cache');
	if ( jQuery.browser.mobile ){
		$('body.h-style-2 #site-header').affix({
			offset: {
				top: 100,
			}
		});
	}

	$('.go-to-top').on('click', function(e){ 
    	e.preventDefault();
        $('html,body').animate({ scrollTop: 0 }, 2000);
        return false; 
    });

	if ($('#camera_wrap_1').length>0){
		$('#camera_wrap_1').camera({
			thumbnails: false,
			piePosition: 'leftBottom',
			time: 5000
		});
	}

	/* Corporate Page Auto Height */
	function auto_height(object){
		var width = $(window).width();
		var cnt_height = $(object).height();
		if( width >= 992 ) {
			$(object).find(".background-imgholder").css("height", cnt_height);
		} else {

		}	
	}

	window.setInterval(function(){
		jQuery('body.corporate_page #site-header').affix({
			offset: {
				top: parseInt(jQuery('#camera_wrap_1').innerHeight(), 10)+30 //$('#site-header').outerHeight()
			}
		});
	}, 1500);


	$('.block-corporate-background').each(function(){
		auto_height($(this));
	});

	$('.cardview-carousel .owl-carousel').owlCarousel({
		loop: true,
		margin: 10,
		navText: ['<i class="fa fa-long-arrow-left"></i>','<i class="fa fa-long-arrow-right"></i>'],
		nav: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1
			},
			480: {
				items: 2
			},
			600: {
				items: 3,
			},
			992: {
				items: 4,
				margin: 30
			}
		}
	});


	$('.top-news-carousel .owl-carousel').owlCarousel({
		loop: true,
		margin: 10,
		navText: ['<i class="fa fa-long-arrow-left"></i>','<i class="fa fa-long-arrow-right"></i>'],
		nav: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			600: {
				items: 2,
			},
			992: {
				items: 2,
				loop: false,
				margin: 20
			},
			1060: {
				items: 3,
				loop: false,
				margin: 20
			}
		}
	});

	$('.recent-commented-carousel').owlCarousel({
		loop: true,
		margin: 10,
		navText: ['<i class="fa fa-long-arrow-left"></i>','<i class="fa fa-long-arrow-right"></i>'],
		nav: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			600: {
				items: 2,
			},
			992: {
				items: 4,
				margin: 30
			}
		}
	});

	$('.category-featured').owlCarousel({
		loop: true,
		margin: 10,
		navText: ['<i class="fa fa-long-arrow-left"></i>','<i class="fa fa-long-arrow-right"></i>'],
		nav: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
			}
		}
	});

	$('body').on('click', '.reactions li a.reaction', function(e){
		e.preventDefault();
		var $obj = $(this);
		var $objR = $obj.parents('.reactions');
		var $objL = $obj.parents('li');
		$objR.find('li.active').removeClass('active');
		$objL.addClass('active');
	});

	$('body').on('keyup', '.line-control .form-control', function(){
		var $text = $(this);
		console.log($text.val());
		if ($text.val().length>0){
			$text.parents('.line-control').addClass('active');
		}else{
			$text.parents('.line-control').removeClass('active');
		}
	});
	
	$('body').on('click', '.btn-send', function() {
		$(this).toggleClass('clicked');
		window.setTimeout(function(){
			$('.btn-send').toggleClass('clicked');
		}, 5000);
	});

	/*===SKILL BAR===*/
    /*===ODO METER BAR===*/
    $('[data-scrollview="true"]').each(function () {
        var e = $(this), t = scrollMonitor.create(e, -20);
        t.enterViewport(function () {
            $(e).find("[data-animation=true]").each(function () {
                var e = $(this).attr("data-animation-type"), t = $(this);
                if (!$(t).hasClass("contentAnimated")){
                    if ("number" == e) {
                        var a = parseInt($(t).attr("data-number"), 10);
                        var commas = function (e) {
                            return e.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
                        };
                        $({animateNumber: 0}).animate({animateNumber: a}, {
                            duration: 1e3,
                            easing: "swing",
                            step: function () {
                                var e = commas(Math.ceil(this.animateNumber));
                                $(t).text(e).addClass("contentAnimated")
                            }
                        })
                    }else if ("progress" == e) {
                        var a = parseInt($(t).attr("data-progress"), 10);
                        var progressBarWidth = a * $(t).width() / 100;
                        $({animateNumber: 0}).animate({animateNumber: progressBarWidth}, {
                            duration: 3000,
                            easing: "swing",
                            step: function () {
                                $(t).find('div').css({'width':this.animateNumber}).html('<div class="progress-num">' + a + "%</div>");
                                $(t).addClass("contentAnimated");
                            }
                        })
                    }
                }
            })
        })
    });



	$('.slide-wrapper').each(function(i, o){
		var slideFor = $(o).find('.slide-for');
		var slideNav = $(o).find('.slide-nav');

		// The slider being synced must be initialized first
		$(slideFor).slick({
			//autoplay: 1,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			asNavFor: '#slide-nav-' + $(o).data('slide')
		});
		$(slideNav).slick({
			slidesToShow: jQuery.browser.mobile?3:5,
			slidesToScroll: 1,
			asNavFor: '#slide-for-' + $(o).data('slide'),
			dots: false,
			focusOnSelect: true,
			arrows:true,
			vertical:false,
			horizonalSwiping:true,
			centerMode:true,
			centerPadding:'0%',
			prevArrow:'<button type="button" class="owl-prev"><i class="fa fa-angle-left"></i></button>',
			nextArrow:'<button type="button" class="owl-next"><i class="fa fa-angle-right"></i></button>'
		});
	});


	console.timeEnd('cache');
});

function onScrollInit2( items ) {
	items.each( function() {
		var osElement = $(this),

		osAnimationClass = osElement.attr('data-os-animation'),
		osAnimationDelay = osElement.attr('data-os-animation-delay');

		var osTrigger = osElement;

		osTrigger.waypoint(function() {
		  		osElement.addClass('animated').addClass(osAnimationClass);
		  	},{
		      triggerOnce: true,
		      offset: '5%'
			}
		);
	});
}

function onScrollInit( items, trigger ) {
	items.each( function() {
		var osElement = $(this),

		osAnimationClass = osElement.attr('data-os-animation'),
		osAnimationDelay = osElement.attr('data-os-animation-delay');

		var osTrigger = ( trigger ) ? trigger : osElement;

		osTrigger.waypoint(function() {
		  		osElement.addClass('animated').addClass(osAnimationClass);
		  	},{
		      triggerOnce: true,
		      offset: '90%'
			}
		);
	});
}

jQuery(document).ready(function($) {
	new WOW().init();
});

jQuery (window).ready(function($){
	$(".nicescroll").niceScroll({cursorcolor:'transparent',cursorwidth:'3px',cursorborder:'',railpadding:{top:5,right:0,left:5,bottom:5}});

	$('.flexslider-wrapper').each(function(i, o){
		var idThumb = $(o).find('.item-thumbs');
		var idSlide = $(o).find('.item-slides');

		var idDirection = idThumb.data('dir');


		// The slider being synced must be initialized first
		$(idThumb).flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			itemWidth: 210,
			itemMargin: 10,
			asNavFor: idSlide,
			prevText: "",
	    	nextText: ""
		});

		$(idSlide).flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			sync: idThumb,
			prevText: "",
	    	nextText: ""
		});
	});

	
})


// remove image attrs on document ready (except first image in slider)
jQuery(document).ready(function($) {

	$('.portfolio-slide img').imagesLoaded(function() {
		//Home Slider
		if ( jQuery('.portfolio-slide').length ) {
			jQuery('.portfolio-slide').each(function() {
				var productImgSlider = jQuery(this),
					productImgSliderContainer = productImgSlider.closest('.full-slider-container');
					
				productImgSlider.owlCarousel({
					items: 3,
					loop: true,
					nav: true,
					navText: ['<i class="fa fa-angle-left"><i>','<i class="fa fa-angle-right"><i>'],
					navRewind: false,
					dots:false,
					responsive:{
                        0:{
                           items:1
					    },
                        450:{
                           items:2
					    },
					    700:{
					    	items:3
					    },
					    1600:{
					    	items:4
					    },
					    1920:{
					    	items:6
					    }
					}
				});
			});
		}
	});

	$('.slide-first-img').imagesLoaded(function() {
		//Home Slider
		if ( jQuery('.full-slider').length ) {
			jQuery('.full-slider').each(function() {
				var productImgSlider = jQuery(this),
					productImgSliderContainer = productImgSlider.closest('.full-slider-container');
					
				productImgSlider.owlCarousel({
					items: 3,
					loop: true,
					nav: false,
					navText: ['<i class="fa fa-angle-left"><i>','<i class="fa fa-angle-right"><i>'],
					navRewind: false,
					dots:false,
					autoplay:true,
					autoplayTimeout:3000,
					responsive:{
                        0:{
                           items:2
					    },
					    500:{
					    	items:3
					    },
					    992:{
					    	items:4
					    },
					    1600:{
					    	items:5
					    },
					    1920:{
					    	items:6
					    }
					}
				});
			});
		}
	});
});