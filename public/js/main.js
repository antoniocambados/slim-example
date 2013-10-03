$(document).ready(function() {
	// Set full-height sections
	function set_full_height (selector) {
		$(selector).each(function(i, e) {
			$(e).height('auto');
			$(e).height(Math.max($(e).height(), $(window).height()));
		});
	};

	// Fire on resize
	$(window).resize(function() {
		set_full_height(".full-height-wrapper");
	}).resize();
});