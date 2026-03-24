jQuery(document).ready(function ($) {
	var $homeSlider = $('.home-slider');

	$homeSlider.slick({
		lazyLoad: 'ondemand',
		autoplay: true,
		autoplaySpeed: 6000,
		fade: true,
		cssEase: 'linear',
		dots: false,
		arrows: false,
		infinite: true,
		adaptiveHeight: true
	});

	$homeSlider.find('img').on('load', function () {
		$homeSlider.slick('setPosition');
	});

	$(window).on('load', function () {
		$homeSlider.slick('setPosition');
	});
});
