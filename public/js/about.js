$('body').css('opacity', 0);
$(document).ready(function() {
    $('body').animate({ opacity: 1 }, 800);
});

/* Waypoints */

const fadeins = $('.fadein-left, .fadein-right').waypoint({
	handler:function(direction) {
		if (!$(this.element).hasClass('visible')) {
			$(this.element).addClass('visible');
		}
	},
	offset: '75%'
});

const headings = $('.heading-text').waypoint({
	handler:function(direction) {
		if ($(this.element).css('opacity') !== 1) {
			$(this.element).animate({ opacity: 1 }, 700);
		}
	},
	offset: '75%'
});