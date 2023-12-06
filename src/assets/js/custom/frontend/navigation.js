/**
 * Adds slideout menu functionality.
 */
( function($) {
	const slideOut = $('#slideout');
	const pageWrapper = $('#page-wrapper');
	const overlay = $('#overlay');
	const burgerBtn = $('#burger-wrapper');
	const closeBtn = $('.close-button');
	const root = $(document.documentElement);
	const colourSwitcher = $('input[name=theme_switch]');
	const colourSwitcherToggle = $('.colour-switch');

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
	});

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

	if(!colourSwitcherToggle.data('click-bound')) {
		colourSwitcherToggle.on('click', function() {
			console.log('clicked');
			colourSwitcher.prop('checked', !colourSwitcher.prop('checked')).change();
			colourSwitcherToggle.toggleClass('pill-shifted');

			if(colourSwitcherToggle.hasClass('pill-shifted')) {
				colourSwitcherToggle.css('justify-content', 'flex-end');
			} else {
				colourSwitcherToggle.css('justify-content', 'flex-start');
			}
		});
	}

}(jQuery) );
