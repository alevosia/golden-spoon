$(document).ready(function() {
	//fitty('#salabat-heading');
    $('.main-gallery').flickity({
        // options
        contain: true,
        wrapAround: true,
	});
	
	setInterval(function() {
		if (!document.hidden) {
			$('.main-gallery').flickity('next');
		}
	}, 2000);
});

$('#navbar-toggler').click(function() {
	
})

// Smooth Scroll
$('a.nav-link').click(function(e) {
	if (this.hash) {
		e.preventDefault();

		const hash = this.hash;

		$('html, body').animate(
			{
				scrollTop: $(hash).offset().top
			},
			800
		);
	}
});

$('#bestseller-button').click(function(e) {
	$('html, body').animate(
		{
			scrollTop: $('#products-section').offset().top + 1
		},
		800
	);

	/*
    $(this).animate({
        top: '100%'
    }, 800);*/

	setTimeout(function() {
		const button = document.getElementById('bestseller-button');
		button.blur();
		console.log('Blurred!');
	}, 800);
});
