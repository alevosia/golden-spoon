$('body').css('opacity', 0);
$(document).ready(function() {
    $('body').animate({ opacity: 1 }, 800);
});

/* Waypoints */
const icons = $('.card-img, li').waypoint({
	handler:function(direction) {
		if ($(this.element).css('opacity') !== 1) {
			$(this.element).animate({ opacity: 1 }, 700);
		}
	},
	offset: '75%'
});