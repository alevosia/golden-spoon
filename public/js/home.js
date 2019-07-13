$('body').css('opacity', 0);
$(document).ready(function() {
    $('body').animate({ opacity: 1 }, 1000);
});

/* Waypoints */
const waypoints = $('.img-fluid').waypoint({
	handler:function(direction) {
		if ($(this.element).css('opacity') !== 1) {
			$(this.element).animate({ opacity: 1 }, 700);
		}
	},
	offset: '60%'
});

/* Clients Carousel */
const $carousel = $('.main-gallery');

$carousel.on('ready.flickity', function() {
	setInterval(function() {
		if (!document.hidden) {
			$('.main-gallery').flickity('next');
		}
	}, 2000);
});

$carousel.flickity({
	wrapAround: true,
	imagesLoaded: true
});

$('#bestseller-button').click(function(e) {
	e.preventDefault();
	
	$('html, body').animate({
		scrollTop: window.innerHeight - 15
	}, 800);
	
	setTimeout(function() {
		const button = document.getElementById('bestseller-button');
		button.blur();
	}, 800);
});
