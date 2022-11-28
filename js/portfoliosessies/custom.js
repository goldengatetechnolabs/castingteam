
window.onload = Viewport();

function Viewport() {
	if (screen.width < 480) {
		var mvp = document.getElementById('Viewport');
		mvp.setAttribute('content','user-scalable=no,width=480');
	}
}



$(function() {

	$(document).mouseup(function (e) {
		var div = $(".top-bar__menu");
		if (!div.is(e.target) && div.has(e.target).length === 0) {
			div.removeClass('open');
			$('.main-menu__nav').slideUp('slow');
			$('.main-menu__handle').removeAttr('style');
			$('.hamburger-icon span').removeAttr('style');
		}

		if (!$(".locationmenu").is(e.target) && $(".locationmenu").has(e.target).length === 0) {
			$(".locationmenu").removeClass('open');
			$('.locationmenu').removeClass('mouseenter');
		}
	});

	$(document).on('click','.js-videoPoster',function(e) {
		e.preventDefault();
		var poster = $(this),
			wrapper = poster.closest('.js-videoWrapper');
		videoPlay(wrapper);
	});

	// general
	var $body = $('body');
	var $window = $(window);

	// location menu
	var $locMenu = $('.locationmenu');
	var $langArrow = $('.locationmenu__arrow');
	var $langItems = $('.locationmenu__list-item');
	var $langActive = $('.locationmenu__list-item--active');

	// main-menu__small-nav
	var $smallNavMenu = $('.main-menu__small-nav');
	var $smallNavArrow = $('.main-menu__small-nav__arrow');
	var $smallNavItems = $('.main-menu__small-nav__list-item');
	var $smallNavActive = $('.main-menu__small-nav__list-item--active');

	// Main menu
	var $barMenu = $('.top-bar__menu');
	var $mainMenu = $('.main-menu');

	// new talent
	var $newTalentItem = $('.new-talent__item');

	// animation
	var $animation_elements = $('.fadein');

	// utility variables
	var nr = 0;

	// functions
	function hasTouch() {
		return 'ontouchstart' in document.documentElement || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
	}

	$(document).ready(function () {

		loaderFadeOut();

		// Check if device has touch
		if (hasTouch()) {
			// do something touchy
			console.log('has touch');
		}

		// Move menu arrow function
		function moveArrow(current) {
			$langArrow.animate({
				left: current[0].offsetLeft + current[0].offsetWidth / 2 - 5
			}, 200);
		}
		function moveArrowSmallNav(current) {
			var left = current[0].offsetLeft;
			var w = current.width();
			$smallNavArrow.animate({
				left: current[0].offsetLeft + current[0].offsetWidth / 2 - 5
			}, 200);
		}

		if ( $('ul').is('locationmenu__list') ) {

			// Move arrow to selected language on page load
			moveArrow($langActive);
			moveArrowSmallNav($smallNavActive);

			// Move arrow on hover menu item
			$langItems.on('mouseenter', function (event) {
				moveArrow($(event.currentTarget));
			});
			$smallNavItems.on('mouseenter', function (event) {
				moveArrowSmallNav($(event.currentTarget));
			});

			// Go back to original position
			$locMenu.on('mouseleave', function (event) {
				moveArrow($langActive);
			});
			$smallNavMenu.on('mouseleave', function (event) {
				moveArrowSmallNav($smallNavActive);
			});


			$window.on('resize', function(){
				var $langActive = $('.locationmenu__list-item--active');
				var $smallNavActive = $('.main-menu__small-nav__list-item--active');
				moveArrow($langActive);
				moveArrowSmallNav($smallNavActive);
			});
		}


		$('.locationmenu').on('mouseenter', function () {
			$('.locationmenu').addClass('mouseenter');
			return false;
		});
		$('.locationmenu').on('mouseleave', function () {
			$('.locationmenu').removeClass('mouseenter');
			return false;
		});
		$('.locationmenu').on('click', 'span', function () {
			if ($('.locationmenu').hasClass('open')) {
				$('.locationmenu').removeClass('open');
				$('.locationmenu').removeClass('mouseenter');
			}
			else $('.locationmenu').addClass('open');
			return false;
		});

		// Slide down fade-in

		$window.on('scroll', check_if_in_view);
		$window.on('scroll resize', check_if_in_view);
		$window.trigger('scroll');
		$window.on('resize', Viewport);
		$window.on('resize', function () {
			setTimeout(function(){
				if($('div').is('.grid')) $('.grid').masonry( 'reloadItems' );
				if($('div').is('.grid')) $('.grid').masonry( 'layout' );
			}, 500);
		});

		responsivePage();
		$window.on('resize', responsivePage);

		$barMenu.on('mouseenter', function () {
			$barMenu.addClass('mouseenter');
			var $smallNavActive = $('.main-menu__small-nav__list-item--active');
			if ( $('ul').is('locationmenu__list') ) { moveArrowSmallNav($smallNavActive); }
			return false;
		});
		$barMenu.on('mouseleave', function () {
			$barMenu.removeClass('mouseenter');
			return false;
		});
		$('.main-menu__handle').click(function () {
			var $smallNavActive = $('.main-menu__small-nav__list-item--active');
			if ( $('ul').is('locationmenu__list') ) { moveArrowSmallNav($smallNavActive); }
			if ($barMenu.hasClass('open')) {
				$barMenu.removeClass('open');
				$barMenu.removeClass('mouseenter');
			}
			else $barMenu.addClass('open');
			return false;
		});

		// New talent
		$newTalentItem.hover(function (event) {
			$(event.currentTarget).find('.profile__caption').show().animate({ opacity: 1 }, 150);
		}, function (event) {
			$(event.currentTarget).find('.profile__caption').animate({ opacity: 0 }, 800, function (event) {
				//$(event.currentTarget).hide();
			});
		});

		$newTalentItem.bind('touchstart', function (event) {
			//some action
		});
		$newTalentItem.bind('touchend', function (event) {
			//set timeout and action
		});

		// Slick slider
		$('.slider').slick({
			infinite: true,
			autoplay: true,
			autoplaySpeed: 10000,
			dots: true
		});

		setTimeout(function() {
			var ind = $('.slider').slick('slickNext');
			$('.slider').slick('slickGoTo', ind);
		}, 3500);

		function check_if_in_view() {
			var window_height = $window.innerHeight();
			var window_top_position = $window.scrollTop();
			var window_bottom_position = window_top_position + window_height;

			$.each($animation_elements, function () {
				var $element = $(this);
				var element_height = $element.outerHeight();
				var element_top_position = $element.offset().top;
				var element_bottom_position = element_top_position + element_height;

				//check to see if this current container is within viewport
				if (element_bottom_position >= window_top_position && element_top_position <= window_bottom_position) {
					$element.addClass('in-view');
				}
				// else {
				// 	$element.removeClass('in-view');
				// }
			});
		}

		$('a[href^="#"]').click(function(){
			var el = $(this).attr('href');
			$('html, body').animate({scrollTop: $(el).offset().top}, 2000);
			return false;
		});

		if($('div').is('.grid')) {
			var $grid = $('.grid').masonry({
				columnWidth: '.grid-sizer',
				itemSelector: '.grid-item',
				percentPosition: true
			});
			$('.grid').on( 'layoutComplete',
				function( event, laidOutItems ) {
					$('.grid-item').css('opacity', '1');
				}
			);
			gridRender();
		}

		$('[data-fancybox="inline"]').fancybox({
			arrows: false,
			buttons: false,
		});

		$('.grid-more').on('click', '.button', function(){
			gridRender();
			return false;
		});

	}); // End of document.ready
});


loader();

function loader() {
	var w_right = $('.header__right').width();
	$('.header__right').find('.slider').width(w_right);
	$('.header__right').addClass('FadeRight');
}
function loaderFadeOut() {
	setTimeout(function() {
		$('.preloader_inner').fadeOut();
	}, 1500);
	setTimeout(function() {
		$('.preloader').fadeOut();
	}, 2500);
	setTimeout(function() {
		$('.header__right').removeClass('FadeRight');
	}, 3000);
	setTimeout(function() {
		$('.top-bar').removeClass('FadeOut');
		$('.header__discover').removeClass('FadeOut');
		$('.slick-dots').css('opacity', '1');
		$('.header__right').find('.slider').removeAttr('style');
	}, 3300);
}

function videoPlay(wrapper) {
	var iframe = wrapper.find('.js-videoIframe');
	var src = iframe.data('src');
	wrapper.addClass('videoWrapperActive');
	iframe.attr('src',src);
}

function responsivePage() {
	/* Responsive Menu */ /* desktop / tablet / mobile */
	var winWidth = $(window).width(),
		winHeight = $(window).outerHeight(),
		_menu = $('.main-menu'),
		_menuHeight = 660;

	if (winWidth > 980) {
		_menu.addClass('desktop').removeClass('tablet').removeClass('mobile');
	}
	else if (winWidth > 800) {
		_menu.removeClass('desktop').addClass('tablet').removeClass('mobile');
	}
	else {
		_menu.removeClass('desktop').removeClass('tablet').addClass('mobile');
	}


	/* Responsive Slick */
	// var stHeight = $('.slick-track').height();
	// $('.video-container').css('height', stHeight + 'px');
}

function gridRender() {

	$.ajax({
		url: '../../../grid/GridContent.json',
		method: 'POST',
		data: '',
		success: function(data) {

			data = shuffle(data);

			var items = data,
				item_active = $('.grid .grid-item'),
				length_items = items.length,
				length_active = item_active.length;

			var i_start = length_active,
				i_end = length_active + 24;

			if(length_items - length_active < 24) {
				i_end = length_items;
			}

			for (var i = i_start; i < i_end; i++) {
				var $item = $('<div/>', {
					class: 'grid-item',
					'data-id': i,
				});

				if (data[i]['type'] == 'video') {
					var $iframe_wrapper = $('<div/>', {
						class: 'grid-iframe-wrapper',
						'data-id': i,
					});
					var $iframe = $('<iframe/>', {
						src: data[i]['src'],
						frameborder: '0',
						allow: 'autoplay; encrypted-media',
						allowfullscreen: 'true',
					});

					$iframe_wrapper.append($iframe);
					$item.append($iframe_wrapper);
				}
				else if (data[i]['type'] == 'inline') {
					var $a;
					var $overlay = '<div class="grid-item__overlay">' + data[i]['title'] + '</div>';
					var $img = $('<img/>', { src: data[i]['image'], });

					if($(window).width() > 480) {
						var $fancybox = '<div style="display: none;" class="grid-fancybox" id="grid-fancybox-' + i + '">' +
										  '<div class="grid-fancybox__img"><img src="' + data[i]['image'] + '"></div>' +
										  '<div class="grid-fancybox__title">' + data[i]['title'] + '</div>' +
						                '</div>';
						$item.append($fancybox);

						$a = $('<a/>', {
							'data-fancybox': '',
							'data-src': '#grid-fancybox-' + i,
							href: 'javascript:;',
						});
						$a.append($img);
						$a.append($overlay);
				        $item.append($a);
					}
					else {
						$item.append($img);
						$item.append($overlay);
					}
				}
				else {
					var $img = $('<img/>', { src: data[i]['image'], });
					$item.append($img);
				}

				$('.grid').append( $item );
				$('.grid').masonry( 'reloadItems' );
				$('.grid').masonry( 'layout' );
			}

			setTimeout(function(){
				$('.grid').masonry( 'reloadItems' );
				$('.grid').masonry( 'layout' );

				$('[data-fancybox]').fancybox({
					baseTpl: '<div class="fancybox-container" role="dialog" tabindex="-1">' +
								'<div class="fancybox-bg"></div>' +
								'<div class="fancybox-inner">' +
								  '<div class="fancybox-stage"></div>' +
								'</div>' +
							  '</div>',
					afterLoad: function(instance) {
						var current = instance.group[instance.currIndex];
						var h_window = $(window).height();
						var w_content = instance.$refs.container.find('.grid-fancybox.fancybox-content').width();
						var h_content = instance.$refs.container.find('.grid-fancybox.fancybox-content').height();
						var h_title = instance.$refs.container.find('.grid-fancybox .grid-fancybox__title').height();

						if (h_content > h_window) {
							h_new = h_window * 0.9;
							h_img = h_new - 20 - h_title;
							instance.$refs.container.find('.grid-fancybox .grid-fancybox__img img').height(h_img);
						}
					},
				});
			}, 1000);

			if (length_items - length_active - 24 > 0) $('.grid-more').addClass('show');
			else $('.grid-more').removeClass('show');
		},
	});
}

function shuffle(array) {
	let currentIndex = array.length,  randomIndex;

	// While there remain elements to shuffle...
	while (currentIndex != 0) {

		// Pick a remaining element...
		randomIndex = Math.floor(Math.random() * currentIndex);
		currentIndex--;

		// And swap it with the current element.
		[array[currentIndex], array[randomIndex]] = [
			array[randomIndex], array[currentIndex]];
	}

	return array;
}
