var THEMEVISION = THEMEVISION || {};

(function($) {
	
	"use strict";
	
	THEMEVISION.initialize = {

		init: function(){
			
			THEMEVISION.initialize.responsiveClasses();
			THEMEVISION.initialize.slider();
			THEMEVISION.initialize.goToTop();
			
		},
		
		responsiveClasses: function(){
			var jRes = jRespond([
				{
					label: 'smallest',
					enter: 0,
					exit: 479
				},{
					label: 'handheld',
					enter: 480,
					exit: 767
				},{
					label: 'tablet',
					enter: 768,
					exit: 991
				},{
					label: 'laptop',
					enter: 992,
					exit: 1199
				},{
					label: 'desktop',
					enter: 1200,
					exit: 10000
				}
			]);
			jRes.addFunc([
				{
					breakpoint: 'desktop',
					enter: function() { $body.addClass('device-lg'); },
					exit: function() { $body.removeClass('device-lg'); }
				},{
					breakpoint: 'laptop',
					enter: function() { $body.addClass('device-md'); },
					exit: function() { $body.removeClass('device-md'); }
				},{
					breakpoint: 'tablet',
					enter: function() { $body.addClass('device-sm'); },
					exit: function() { $body.removeClass('device-sm'); }
				},{
					breakpoint: 'handheld',
					enter: function() { $body.addClass('device-xs'); },
					exit: function() { $body.removeClass('device-xs'); }
				},{
					breakpoint: 'smallest',
					enter: function() { $body.addClass('device-xxs'); },
					exit: function() { $body.removeClass('device-xxs'); }
				}
			]);
		},
		
		slider: function() {
			if( agama.slider_enable ) {
				
				if( agama.headerStyle == 'transparent' && true == agama.is_admin_bar_showing ) {
					var $height = THEMEVISION.initialize.height() - 32;
				} else if( agama.headerStyle == 'transparent' && ! agama.is_admin_bar_showing ) {
					var $height = THEMEVISION.initialize.height();
				}
				
				if( agama.headerStyle == 'default' && true == agama.is_admin_bar_showing ) {
					var $height = THEMEVISION.initialize.height() - 32 - $header.height();
				} else if( agama.headerStyle == 'default' && ! agama.is_admin_bar_showing ) {
					var $height = THEMEVISION.initialize.height() - $header.height();
				}
				
				if( agama.headerStyle == 'sticky' && true == agama.is_admin_bar_showing ) {
					var $height = THEMEVISION.initialize.height() - 32 - $header.height();
				} else if( agama.headerStyle == 'sticky' && ! agama.is_admin_bar_showing ) {
					var $height = THEMEVISION.initialize.height() - $header.height();
				}
				
				if( agama.slider_height > 0 ) {
					var $height = agama.slider_height;
				}
				
				if( $('#agama_slider').hasClass('camera_wrap') ) {
					$slider.camera({
						height: $height + 'px',
						loader: 'bar',
						loaderColor: agama.primaryColor,
						overlay: false,
						fx: 'simpleFade',
						time: agama.slider_time,
						pagination: false,
						thumbnails: false,
						transPeriod: 1000,
						overlayer: false,
						playPause: false,
						hover: false,
					});
				}
			}
		},
		
		goToTop: function(){
			$goToTopEl.click(function() {
				$('body,html').stop(true).animate({scrollTop:0},400);
				return false;
			});
		},
		
		goToTopScroll: function(){
			if( $body.hasClass('device-lg') || $body.hasClass('device-md') || $body.hasClass('device-sm') ) {
				if($window.scrollTop() > 450) {
					$goToTopEl.fadeIn();
				} else {
					$goToTopEl.fadeOut();
				}
			}
		},
		
		width: function() {
			return $window.width();
		},
		
		height: function() {
			if( $window.width() < 601 ) {
				return $window.height();
			} else {
				return $window.height();
			}
		}
	};
	
	THEMEVISION.header = {
		
		init: function() {
			
			THEMEVISION.header.header_v1();
			THEMEVISION.header.superfish();
			THEMEVISION.header.mobilemenu();
			
		},
		
		header_v1: function() {
			if( agama.headerStyle == 'transparent' ) {
				if( ! agama.headerImage && ! agama.slider_enable || agama.slider_enable && $('#agama_slider').hasClass('camera_wrap') == false ) {
					$headerV1.css('position', 'relative');
					$window.on('scroll', function() {
						if( jQuery(this).scrollTop() > 1 ) {
							$headerV1.css('position', 'fixed');
						}
						else if( jQuery(this).scrollTop() < 1 ) {
							$headerV1.css('position', 'relative');
						}
					});
				}
			}
		},
		
		superfish: function() {
			
			jQuery('.sticky-nav').superfish({
				popUpSelector: 'ul',
				delay: 250,
				speed: 350,
				animation: {opacity:'show',height:'show'},
				animationOut:  {opacity:'hide',height:'hide'},
				cssArrows: false
			});
			
			jQuery('.top-nav-menu').superfish({
				popUpSelector: 'ul',
				delay: 250,
				speed: 350,
				animation: {opacity:'show',height:'show'},
				animationOut:  {opacity:'hide',height:'hide'},
				cssArrows: false
			});
			
			jQuery('.nav-menu').superfish({
				popUpSelector: 'ul',
				delay: 250,
				speed: 350,
				animation: {opacity:'show',height:'show'},
				animationOut:  {opacity:'hide',height:'hide'},
				cssArrows: false
			});
			
		},
		
		topsocial: function(){
			if( $topSocialEl.length > 0 ){
				if( $body.hasClass('device-md') || $body.hasClass('device-lg') ) {
					$topSocialEl.show();
					$topSocialEl.find('a').css({width: 40});

					$topSocialEl.find('.tv-text').each( function(){
						var $clone = $(this).clone().css({'visibility': 'hidden', 'display': 'inline-block', 'font-size': '13px', 'font-weight':'bold'}).appendTo($body),
							cloneWidth = $clone.innerWidth() + 52;
						$(this).parent('a').attr('data-hover-width',cloneWidth);
						$clone.remove();
					});

					$topSocialEl.find('a').hover(function() {
						if( $(this).find('.tv-text').length > 0 ) {
							$(this).css({width: $(this).attr('data-hover-width')});
						}
					}, function() {
						$(this).css({width: 40});
					});
				} else {
					$topSocialEl.show();
					$topSocialEl.find('a').css({width: 40});

					$topSocialEl.find('a').each(function() {
						var topIconTitle = $(this).find('.tv-text').text();
						$(this).attr('title', topIconTitle);
					});

					$topSocialEl.find('a').hover(function() {
						$(this).css({width: 40});
					}, function() {
						$(this).css({width: 40});
					});

					if( $body.hasClass('device-xxs') ) {
						$topSocialEl.hide();
						$topSocialEl.slice(0, 8).show();
					}
				}
			}
		},
		
		mobilemenu: function(){
			$(".mobile-menu ul.menu > li.menu-item-has-children").each(function(index) {
				var menuItemId = "mobile-menu-submenu-item-" + index;
				$('.mobile-menu ul.sub-menu').id = index;
				$('<button class="dropdown-toggle collapsed" data-toggle="collapse" data-target="#' + menuItemId + '"></button>').insertAfter($(this).children("a"));
				
				$(this).children("ul").prop("id", menuItemId);
				$(this).children("ul").addClass("collapse");

				$("#" + menuItemId).on("show.bs.collapse", function() {
					$(this).parent().addClass("open");
				});
				$("#" + menuItemId).on("hidden.bs.collapse", function() {
					$(this).parent().removeClass("open");
				});
			});
			$('.mobile-menu-toggle.collapsed').click(function() {
				$('nav.mobile-menu').slideToggle();
			});
			$window.on('resize', function(){
				if( $window.width() > 992 ) {
					$('nav.mobile-menu').hide();
				}
			});
		}
		
	};
	
	THEMEVISION.widgets = {
		
		init: function() {
			
			THEMEVISION.widgets.animations();
			THEMEVISION.widgets.animonscroll();
			
		},
		
		animations: function(){
			var $dataAnimateEl = $('[data-animate]');
			if( $dataAnimateEl.length > 0 ){
				if( $body.hasClass('device-lg') || $body.hasClass('device-md') || $body.hasClass('device-sm') ){
					$dataAnimateEl.each(function(){
						var element = $(this),
							animationDelay = element.attr('data-delay'),
							animationDelayTime = 0;

						if( animationDelay ) { animationDelayTime = Number( animationDelay ) + 500; } else { animationDelayTime = 500; }

						if( !element.hasClass('animated') ) {
							element.addClass('not-animated');
							var elementAnimation = element.attr('data-animate');
							element.appear(function () {
								setTimeout(function() {
									element.removeClass('not-animated').addClass( elementAnimation + ' animated');
								}, animationDelayTime);
							},{accX: 0, accY: -120},'easeInCubic');
						}
					});
				}
			}
		},
		
		animonscroll: function() {
			$("[data-animonscroll]").css("opacity", "0");
			$(window).scroll( function(){
				$("[data-animonscroll]").each( function(i){
					
					var bottom_of_object = $(this).position().top + $(this).outerHeight();
					var bottom_of_window = $(window).scrollTop() + $(window).height();
					
					var element = $(this),
					animationscroll = element.attr('data-animonscroll'),
					animationDelay = element.attr('data-delay'),
					animationDelayTime = 0;

					if( ! animationscroll ) { animationscroll = 'fadeIn'; }
					if( animationDelay ) { animationDelayTime = Number( animationDelay ) + 0 } else { animationDelayTime = 0; }
					
					bottom_of_window = bottom_of_window - animationDelayTime;  
				  
					if( bottom_of_window > bottom_of_object ){
						
						$(this).animate({'opacity':'1'},500).addClass('animated '+animationscroll);
						
					}
				}); 
			});
		}
		
	};
	
	THEMEVISION.extras = {
		
		init: function(){
			
			THEMEVISION.extras.tipsntabs();
			THEMEVISION.extras.customclasses();
			THEMEVISION.extras.bbPress();
			THEMEVISION.extras.contact7form();
			
		},
		
		tipsntabs: function(){
			
			$('[data-toggle="tooltip"]').tooltip();
  
			$('#tabs a:first').tab('show'); // Show first tab by default
		  
			$('#tabs a').click(function (e) {
				e.preventDefault()
				$(this).tab('show');
			})
			
		},
		
		customclasses: function(){
			
			if( $('a').hasClass('comment-reply-link') ) {
				$('a.comment-reply-link').append('<i class="fa fa-reply"></i>');
			}
			
		},
		
		bbPress: function(){
			
			$('#bbp_search').addClass('sm-form-control');
			$('#bbp_topic_title').addClass('sm-form-control');
			
		},
		
		contact7form: function() {
			
			$('.wpcf7-form-control').css('width', 'auto');
			$('.wpcf7-form-control').addClass('sm-form-control');
			$('.wpcf7-submit').removeClass('sm-form-control');
			
		}
		
	};
	
	THEMEVISION.isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
		Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
		any: function() {
			return (THEMEVISION.isMobile.Android() || THEMEVISION.isMobile.BlackBerry() || THEMEVISION.isMobile.iOS() || THEMEVISION.isMobile.Opera() || THEMEVISION.isMobile.Windows());
		}
	};
	
	// Document on resize
	THEMEVISION.documentOnResize = {
		
		init: function(){
			
			var t = setTimeout( function(){
				THEMEVISION.header.topsocial();
			}, 500 );
			
		}
		
	};
	
	// Document on ready
	THEMEVISION.documentOnReady = {
		
		init: function(){
			
			THEMEVISION.initialize.init();
			THEMEVISION.header.init();
			THEMEVISION.widgets.init();
			THEMEVISION.extras.init();
			THEMEVISION.documentOnReady.windowscroll();
			
		},
		
		windowscroll: function(){
			
			$window.on( 'scroll', function(){
				
				THEMEVISION.initialize.goToTopScroll();
				
				// Sticky Header Class
				if(jQuery(this).scrollTop() > 1){ 
					
					// If sticky header & top navigation enabled
					if( agama.headerStyle == 'sticky' && agama.top_navigation ) {
						
						$body.addClass("top-bar-out");
						$topbar.hide();
					}
					
					$header.addClass("shrinked");
					$stickyHeader.addClass("sticky-header-shrink");
					
				}else{
					
					// If sticky header & top navigation enabled
					if( agama.headerStyle == 'sticky' && agama.top_navigation ) {
						$body.removeClass("top-bar-out");
						$topbar.show();
					}
					
					$header.removeClass("shrinked");
					$stickyHeader.removeClass("sticky-header-shrink");
				}

			});
			
		}
		
	};
	
	// Document on load
	THEMEVISION.documentOnLoad = {
		
		init: function(){
			
			THEMEVISION.header.topsocial();
		
		}
		
	};
	
	var $window	 		= $(window),
		$document		= $(document),
		$body	 		= $('body'),
		$wpadminbar		= $('#wpadminbar'),
		$topbar			= $('#top-bar'),
		$header			= $('#masthead'),
		$headerV1		= $('.header_v1 .sticky-header'),
		$headerImage	= $('.header-image'),
		$slider			= $('#agama_slider'),
		$stickyHeader 	= $('.sticky-header'),
		$topSocialEl 	= $('#top-social').find('li'),
		$goToTopEl		= $('#toTop');
		
	$(document).ready( THEMEVISION.documentOnReady.init );
	$window.load( THEMEVISION.documentOnLoad.init );
	$window.on( 'resize', THEMEVISION.documentOnResize.init );
	
})(jQuery);