( function($) {
	const slideOut = $('#slideout');
	const pageWrapper = $('#page-wrapper');
	const overlay = $('#overlay');
	const burgerBtn = $('#burger-wrapper');
	const closeBtn = $('.close-button');
	const root = $(document.documentElement);
	const colourSwitcher = $('input[name=theme_switch]');
	const colourSwitcherToggle = $('.colour-switch');
	const logoDiv = $('.site-branding a img');

	/**
	 * Adds theme colour switch functionality.
	 */
	if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
		root.attr("data-theme", "dark");
		colourSwitcher.prop("checked", true);
	} else {
		root.attr("data-theme", "light");
		colourSwitcher.prop("checked", false);
	}

	// switch theme if checkbox is engaged
	colourSwitcher.on("change", function () {
		root.attr("data-theme", this.checked ? "dark" : "light");

		// Change logo with theme
		$.ajax({
			type: 'POST',
			url: ajax_object.ajax_url,
			data: {
				action: 'update_logo'
			},
			success: function (response) {
				try {
					const data = JSON.parse(response);
					if (data.dark_logo_url) {

					}
					if (root.attr("data-theme") === "dark") {
						logoDiv.attr("src", data.dark_logo_url);
					} else {
						logoDiv.attr("src", data.light_logo_url);
					}
				} catch (error) {
					console.error("Error parsing JSON response: ", error);
				}
			}
		})
	});

	if(!colourSwitcherToggle.data('click-bound')) {
		colourSwitcherToggle.on('click', function() {
			colourSwitcher.prop('checked', !colourSwitcher.prop('checked')).change();
			colourSwitcherToggle.toggleClass('pill-shifted');

			if(colourSwitcherToggle.hasClass('pill-shifted')) {
				colourSwitcherToggle.css('justify-content', 'flex-end');
			} else {
				colourSwitcherToggle.css('justify-content', 'flex-start');
			}
		});
	}

	/**
	 * Adds slideout menu functionality.
	 */
	if(!burgerBtn.data('click-bound')) {
		burgerBtn.on('click', function() {
			slideOut.css('display', 'block').css('width', '150px');
			pageWrapper.css('left', '150px');
			burgerBtn.data('click-bound', true);
			overlay.css('display', 'block');
		});
	}

	closeBtn.on('click', function() {
		slideOut.css('width', '0');
		pageWrapper.css('left', '0').css('opacity', '1');
		overlay.css('display', 'none');
	});
}(jQuery) );
