(() => {
	// javascript/script.js
	(function ($) {
		window.onload = function () {
			$(document).ready(function () {
				tourSlider();
				faqAccordion();
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

	function faqAccordion() {
		const triggers = document.querySelectorAll('.faq-question');

                            function collapseAll(exceptId) {
                                triggers.forEach(btn => {
                                    if (btn.id !== exceptId) {
                                        btn.setAttribute('aria-expanded', 'false');
                                        const panelId = btn.getAttribute('aria-controls');
                                        const panel = document.getElementById(panelId);
                                        if (panel) panel.hidden = true;
                                    }
                                });
                            }

                            triggers.forEach(btn => {
                                btn.addEventListener('click', () => {
                                    const expanded = btn.getAttribute('aria-expanded') === 'true';
                                    if (expanded) {
                                        btn.setAttribute('aria-expanded', 'false');
                                        document.getElementById(btn.getAttribute('aria-controls')).hidden = true;
                                    } else {
                                        collapseAll(btn.id);
                                        btn.setAttribute('aria-expanded', 'true');
                                        document.getElementById(btn.getAttribute('aria-controls')).hidden = false;
                                    }
                                });
                            });
	}
  
	})(jQuery);
})();
