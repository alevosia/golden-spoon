$('body').css('opacity', 0);
$(document).ready(function() {
    $('body').animate({ opacity: 1 }, 800);
});

/* Waypoints */

// timeline animation
const fadeins = $('.fadein-left, .fadein-right').waypoint({
	handler:function(direction) {
		if (!$(this.element).hasClass('visible')) {
			$(this.element).addClass('visible');
		}
	},
	offset: '90%'
});

// Mission, Vision, History
const headings = $('.heading-text').waypoint({
	handler:function(direction) {
		if ($(this.element).css('opacity') !== 1) {
			$(this.element).animate({ opacity: 1 }, 700);
		}
	},
	offset: '90%'
});