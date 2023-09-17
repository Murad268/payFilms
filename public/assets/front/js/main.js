;(function ($) {
	'use strict'

	/*=============================================
		=    		 Preloader			      =
	=============================================*/
	function preloader() {
		$('#preloader').delay(0).fadeOut()
	}

	$(window).on('load', function () {
		preloader()
		mainSlider()
		aosAnimation()
		wowAnimation()
	})

	$(document).ready(() => {
		if (window.location.pathname == '/peroplay/account.php') {
			// alert("salam")
		}
	})

	let ipaddress = ''
	$.get('https://www.cloudflare.com/cdn-cgi/trace', function (data) {
		// Convert key-value pairs to JSON
		// https://stackoverflow.com/a/39284735/452587
		data = data
			.trim()
			.split('\n')
			.reduce(function (obj, pair) {
				pair = pair.split('=')
				return (obj[pair[0]] = pair[1]), obj
			}, {})
		ipaddress = data.ip
	})

	$('#update-password').click(() => {
		if (
			$('#oldpass').val() == '' ||
			$('#newpass').val() == '' ||
			$('#newpassagain').val() == ''
		) {
			notie.alert({
				type: 3,
				text: 'Bütün xanaları doldurun!',
				position: 'bottom',
			})
		} else {
			$.ajax({
				type: 'POST',
				url: 'functions/update-password.php',
				data: `oldpass=${$('#oldpass').val()}&newpass=${$(
					'#newpass'
				).val()}&newpassagain=${$('#newpassagain').val()}`,
				success: function (result) {
					if (result == 'success') {
						$('#oldpass').val('')
						$('#newpass').val('')
						$('#newpassagain').val('')
						notie.alert({
							type: 1,
							text: 'Şifrəniz uğurla dəyişdirildi!',
							position: 'bottom',
						})
					} else if (result == 'passwords do not match') {
						notie.alert({
							type: 3,
							text: 'Köhnə şifrəniz səhvdir!',
							position: 'bottom',
						})
					} else if (result == 'new passwords do not match') {
						notie.alert({
							type: 3,
							text: 'Yeni şifrələr bir biri ilə eyni deyil!',
							position: 'bottom',
						})
					}
				},
			})
		}
	})

	$('.contact-btn').click(() => {
		if (
			$('.contact-name').val() == '' ||
			$('.contact-email').val() == '' ||
			$('.contact-subject').val() == '' ||
			$('.contact-message').val() == ''
		) {
			notie.alert({
				type: 3,
				text: 'Bütün xanaları doldurun!',
				position: 'bottom',
			})
		} else {
			$.ajax({
				type: 'POST',
				url: 'functions/send-message.php',
				data: `name=${$('.contact-name').val()}&email=${$(
					'.contact-email'
				).val()}&subject=${$('.contact-subject').val()}&message=${$(
					'.contact-message'
				).val()}&ip=${ipaddress}`,
				success: function (result) {
					if (result) {
						$('.contact-name').val('')
						$('.contact-email').val('')
						$('.contact-subject').val('')
						$('.contact-message').val('')
						notie.alert({
							type: 1,
							text: 'Mesajınız uğurla göndərildi!',
							position: 'bottom',
						})
					} else {
						notie.alert({
							type: 3,
							text: 'Mesajınız göndərilmədi!',
							position: 'bottom',
						})
					}
				},
			})
		}
	})

	$('#register-submit').click(() => {
		registerFunc()
	})

	$('#register-passwordRepeat').on('keypress', function (e) {
		if (e.which == 13) {
			registerFunc()
		}
	})

	$('#login-submit').click(() => {
		loginFunc()
	})

	$('#login-password').on('keypress', function (e) {
		if (e.which == 13) {
			loginFunc()
		}
	})

	function registerFunc() {
		document.querySelector('.spinner-container').classList.add('active')
		let emailControl = 0
		if (
			$('#register-name').val() == '' ||
			$('#register-email').val() == '' ||
			$('#register-phone').val() == '' ||
			$('#register-password').val() == '' ||
			$('#register-passwordRepeat').val() == ''
		) {
			notie.alert({
				type: 3,
				text: 'Bütün xanaları doldurun!',
				position: 'bottom',
			})
			document.querySelector('.spinner-container').classList.remove('active')
		} else if (
			$('#register-password').val() != $('#register-passwordRepeat').val()
		) {
			notie.alert({
				type: 3,
				text: 'Şifrələr bir biri ilə uyğun deyil!',
				position: 'bottom',
			})
			document.querySelector('.spinner-container').classList.remove('active')
		} else if ($('#register-password').val().length < 8) {
			notie.alert({
				type: 3,
				text: 'Şifrə minimum 8 simvoldan ibarət olmalıdır!',
				position: 'bottom',
			})
			document.querySelector('.spinner-container').classList.remove('active')
		} else {
			for (let i = 0; i < $('#register-email').val().length; i++) {
				if ($('#register-email').val()[i] == '@') {
					$.ajax({
						type: 'POST',
						url: 'functions/login-control.php',
						data: `register=1&login=0&name=${$(
							'#register-name'
						).val()}&email=${$('#register-email').val()}&phone=${$(
							'#register-phone'
						).val()}&password=${$('#register-password').val()}&ip=${ipaddress}`,
						success: function (result) {
							if (result) {
								if (result == 'have a user') {
									notie.alert({
										type: 3,
										text: 'Belə bir istifadəçi sistemdə mövcutdur!',
										position: 'bottom',
									})
									document
										.querySelector('.spinner-container')
										.classList.remove('active')
								} else if (result[result.length - 1] == '4') {
									notie.alert({
										type: 2,
										text: 'Belə bir istifadəçi sistemdə mövcutdur! Lakin istifadəçi emaili təstiqlənməyib. Təstiq kodu yenidən göndərildi',
										position: 'bottom',
									})
									document
										.querySelector('.spinner-container')
										.classList.remove('active')
								} else if (result[result.length - 1] == true) {
									$('#register-name').val('')
									$('#register-email').val('')
									$('#register-phone').val('')
									$('#register-password').val('')
									$('#register-passwordRepeat').val('')
									notie.alert({
										type: 1,
										text: 'Aktivasiya kodu elektron poçtunuza göndərildi! 2 saniyə sonra giriş səhifəsinə yönləndirilirsizniz..',
										position: 'bottom',
									})
									document
										.querySelector('.spinner-container')
										.classList.remove('active')

									setTimeout(() => {
										window.location.href = 'login.php'
									}, 2000)
								}
							} else {
								notie.alert({
									type: 3,
									text: 'Bilinməyən bir xəta baş verdi!',
									position: 'bottom',
								})
								document
									.querySelector('.spinner-container')
									.classList.remove('active')
							}
						},
					})
					emailControl = 0
					break
				} else {
					emailControl = 1
				}
			}
		}
		if (emailControl == 1) {
			notie.alert({
				type: 3,
				text: 'E-poçt forması düzgün deyil!',
				position: 'bottom',
			})
		}
	}

	function loginFunc() {
		document.querySelector('.spinner-container').classList.add('active')
		if ($('#login-email').val() == '' || $('#login-password').val() == '') {
			notie.alert({
				type: 3,
				text: 'Bütün xanaları doldurun!',
				position: 'bottom',
			})
			document.querySelector('.spinner-container').classList.remove('active')
		} else {
			$.ajax({
				type: 'POST',
				url: 'functions/login-control.php',
				data: `register=0&login=1&email=${$('#login-email').val()}&password=${$(
					'#login-password'
				).val()}`,
				success: function (result) {
					if (result[result.length - 1] == 3) {
						$('#login-email').val('')
						$('#login-password').val('')
						notie.alert({
							type: 2,
							text: 'Hesab mövcuddur. Lakin təstiq edilməyib. Təstiqlənmə kodu yenidən elektron poçtunuza göndərildi',
							position: 'bottom',
						})
						document
							.querySelector('.spinner-container')
							.classList.remove('active')
					} else if (result == 1) {
						$('#login-email').val('')
						$('#login-password').val('')
						notie.alert({
							type: 1,
							text: 'Uğurla daxil oldunuz! Yönləndirilirsiniz...',
							position: 'bottom',
						})
						setTimeout(() => {
							window.location.reload()
						}, 1000)
						document
							.querySelector('.spinner-container')
							.classList.remove('active')
					} else {
						notie.alert({
							type: 3,
							text: 'İstifadəçi məlumatları düzgün deyil!',
							position: 'bottom',
						})
						document
							.querySelector('.spinner-container')
							.classList.remove('active')
					}
				},
			})
		}
	}

	/*=============================================
		=          Data Background               =
	=============================================*/
	$('[data-background]').each(function () {
		$(this).css(
			'background-image',
			'url(' + $(this).attr('data-background') + ')'
		)
	})

	/*=============================================
		=    		Mobile Menu			      =
	=============================================*/
	//SubMenu Dropdown Toggle
	if ($('.menu-area li.menu-item-has-children ul').length) {
		$('.menu-area .navigation li.menu-item-has-children').append(
			'<div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>'
		)
	}
	//Mobile Nav Hide Show
	if ($('.mobile-menu').length) {
		var mobileMenuContent = $('.menu-area .main-menu').html()
		$('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent)

		//Dropdown Button
		$('.mobile-menu li.menu-item-has-children .dropdown-btn').on(
			'click',
			function () {
				$(this).toggleClass('open')
				$(this).prev('ul').slideToggle(500)
			}
		)
		//Menu Toggle Btn
		$('.mobile-nav-toggler').on('click', function () {
			$('body').addClass('mobile-menu-visible')
		})

		//Menu Toggle Btn
		$('.menu-backdrop, .mobile-menu .close-btn').on('click', function () {
			$('body').removeClass('mobile-menu-visible')
		})
	}

	/*=============================================
		=     Menu sticky & Scroll to top      =
	=============================================*/
	$(window).on('scroll', function () {
		var scroll = $(window).scrollTop()
		if (scroll < 245) {
			$('#sticky-header').removeClass('sticky-menu')
			$('.scroll-to-target').removeClass('open')
		} else {
			$('#sticky-header').addClass('sticky-menu')
			$('.scroll-to-target').addClass('open')
		}
	})

	/*=============================================
		=    		 Scroll Up  	         =
	=============================================*/
	if ($('.scroll-to-target').length) {
		$('.scroll-to-target').on('click', function () {
			var target = $(this).attr('data-target')
			// animate
			$('html, body').animate(
				{
					scrollTop: $(target).offset().top,
				},
				1000
			)
		})
	}

	/*=============================================
		=             Main Slider                =
	=============================================*/
	function mainSlider() {
		var BasicSlider = $('.slider-active')
		BasicSlider.on('init', function (e, slick) {
			var $firstAnimatingElements = $('.slider-item:first-child').find(
				'[data-animation]'
			)
			doAnimations($firstAnimatingElements)
		})
		BasicSlider.on(
			'beforeChange',
			function (e, slick, currentSlide, nextSlide) {
				var $animatingElements = $(
					'.slider-item[data-slick-index="' + nextSlide + '"]'
				).find('[data-animation]')
				doAnimations($animatingElements)
			}
		)
		BasicSlider.slick({
			autoplay: true,
			autoplaySpeed: 5000,
			dots: false,
			fade: true,
			arrows: false,
			responsive: [
				{ breakpoint: 767, settings: { dots: false, arrows: false } },
			],
		})

		function doAnimations(elements) {
			var animationEndEvents =
				'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend'
			elements.each(function () {
				var $this = $(this)
				var $animationDelay = $this.data('delay')
				var $animationType = 'animated ' + $this.data('animation')
				$this.css({
					'animation-delay': $animationDelay,
					'-webkit-animation-delay': $animationDelay,
				})
				$this.addClass($animationType).one(animationEndEvents, function () {
					$this.removeClass($animationType)
				})
			})
		}
	}

	/*=============================================
		=         Up Coming Movie Active        =
	=============================================*/
	$('.ucm-active').owlCarousel({
		loop: true,
		margin: 30,
		items: 4,
		autoplay: false,
		autoplayTimeout: 5000,
		autoplaySpeed: 1000,
		navText: [
			'<i class="fas fa-angle-left"></i>',
			'<i class="fas fa-angle-right"></i>',
		],
		nav: true,
		dots: false,
		responsive: {
			0: {
				items: 1,
				nav: false,
			},
			575: {
				items: 2,
				nav: false,
			},
			768: {
				items: 2,
				nav: false,
			},
			992: {
				items: 3,
			},
			1200: {
				items: 4,
			},
		},
	})
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		$('.ucm-active').trigger('refresh.owl.carousel')
	})

	/*=============================================
		=         Up Coming Movie Active        =
	=============================================*/
	$('.ucm-active-two').owlCarousel({
		loop: true,
		margin: 45,
		items: 5,
		autoplay: false,
		autoplayTimeout: 5000,
		autoplaySpeed: 1000,
		navText: [
			'<i class="fas fa-angle-left"></i>',
			'<i class="fas fa-angle-right"></i>',
		],
		nav: true,
		dots: false,
		responsive: {
			0: {
				items: 1,
				nav: false,
				margin: 30,
			},
			575: {
				items: 2,
				nav: false,
				margin: 30,
			},
			768: {
				items: 2,
				nav: false,
				margin: 30,
			},
			992: {
				items: 3,
				margin: 30,
			},
			1200: {
				items: 5,
			},
		},
	})
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		$('.ucm-active-two').trigger('refresh.owl.carousel')
	})

	/*=============================================
		=    		Brand Active		      =
	=============================================*/
	$('.brand-active').slick({
		dots: false,
		infinite: true,
		speed: 1000,
		autoplay: true,
		arrows: false,
		slidesToShow: 6,
		slidesToScroll: 2,
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 5,
					slidesToScroll: 1,
					infinite: true,
				},
			},
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					arrows: false,
				},
			},
			{
				breakpoint: 575,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					arrows: false,
				},
			},
		],
	})

	/*=============================================
		=         Gallery-active           =
	=============================================*/
	$('.gallery-active').slick({
		centerMode: true,
		centerPadding: '350px',
		slidesToShow: 1,
		prevArrow:
			'<span class="slick-prev"><i class="fas fa-caret-left"></i> previous</span>',
		nextArrow:
			'<span class="slick-next">Next <i class="fas fa-caret-right"></i></span>',
		appendArrows: '.slider-nav',
		responsive: [
			{
				breakpoint: 1800,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerPadding: '220px',
					infinite: true,
				},
			},
			{
				breakpoint: 1500,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerPadding: '180px',
					infinite: true,
				},
			},
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerPadding: '160px',
					arrows: false,
					infinite: true,
				},
			},
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 1,
					centerPadding: '60px',
					arrows: false,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerPadding: '0px',
					arrows: false,
				},
			},
			{
				breakpoint: 575,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerPadding: '0px',
					arrows: false,
				},
			},
		],
	})

	/*=============================================
		=    		Odometer Active  	       =
	=============================================*/
	$('.odometer').appear(function (e) {
		var odo = $('.odometer')
		odo.each(function () {
			var countNumber = $(this).attr('data-count')
			$(this).html(countNumber)
		})
	})

	/*=============================================
		=    		Magnific Popup		      =
	=============================================*/
	$('.popup-image').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true,
		},
	})

	/* magnificPopup video view */
	$('.popup-video').magnificPopup({
		type: 'iframe',
	})

	/*=============================================
		=    		Isotope	Active  	      =
	=============================================*/
	$('.tr-movie-active').imagesLoaded(function () {
		// init Isotope
		var $grid = $('.tr-movie-active').isotope({
			itemSelector: '.grid-item',
			percentPosition: true,
			masonry: {
				columnWidth: '.grid-sizer',
			},
		})
		// filter items on button click
		$('.tr-movie-menu-active').on('click', 'button', function () {
			var filterValue = $(this).attr('data-filter')
			$grid.isotope({ filter: filterValue })
		})
	})
	//for menu active class
	$('.tr-movie-menu-active button').on('click', function (event) {
		$(this).siblings('.active').removeClass('active')
		$(this).addClass('active')
		event.preventDefault()
	})

	/*=============================================
		=    		 Aos Active  	         =
	=============================================*/
	function aosAnimation() {
		AOS.init({
			duration: 1000,
			mirror: true,
			once: true,
			disable: 'mobile',
		})
	}

	/*=============================================
		=    		 Wow Active  	         =
	=============================================*/
	function wowAnimation() {
		var wow = new WOW({
			boxClass: 'wow',
			animateClass: 'animated',
			offset: 0,
			mobile: false,
			live: true,
		})
		wow.init()
	}
})(jQuery)
