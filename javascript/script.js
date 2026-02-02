(() => {
	// javascript/script.js
	(function ($) {
		window.onload = function () {
			$(document).ready(function () {
				tourSlider();
			});
		};
    function tourSlider() {
     
        	var swiper = new Swiper(".mySwiper", {
        		slidesPerView: 1,
        		spaceBetween: 20,
        		loop: true,
        		autoplay: {
        			delay: 3000,
        			disableOnInteraction: false,
        		},
        		navigation: {
        			nextEl: ".swiper-button-next",
        			prevEl: ".swiper-button-prev",
        		}
        	});
        
    }
  
	})(jQuery);
})();
