$(document).ready(function() {
	// Set full-height sections
	function set_full_height(selector) {
		$(window).resize(function() {
			$(selector).each(function(index) {
				window_height   = $(window).height();
				selector_height = $(this).height();
				$(this).height( (selector_height > window_height) ? selector_height : window_height );
			});
		});
		$(window).resize();
	};

	set_full_height(".full-height-wrapper");
});