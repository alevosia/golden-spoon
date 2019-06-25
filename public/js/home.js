$(document).ready(function() {
	console.log('Document is ready.');
});

/* Clients Carousel */
const $carousel = $('.main-gallery');

$carousel.on('ready.flickity', function() {
	console.log('Main gallery is ready!');
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
		scrollTop: $('#products-section').offset().top + 1
	}, 800);
	
	setTimeout(function() {
		const button = document.getElementById('bestseller-button');
		button.blur();
	}, 800);
});
