$(document).ready(function() {
	$('.main-gallery').flickity({
		contain: true,
		wrapAround: true,
	});
	
	setInterval(function() {
		if (!document.hidden) {
			$('.main-gallery').flickity('next');
		}
	}, 2000);
});

$('#bestseller-button').click(function(e) {
	$('html, body').animate({
		scrollTop: $('#products-section').offset().top + 1
	}, 800);
	
	setTimeout(function() {
		const button = document.getElementById('bestseller-button');
		button.blur();
	}, 800);
});
