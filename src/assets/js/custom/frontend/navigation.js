/**
 * Adds slideout menu functionality.
 */
( function($) {
	const slideout = $('.slideout');
	const body = $('body');
	const slideoutSubmenu = $('.slideout-submenu');
	const slideoutSubmenuLink = $('.slideout-submenu-link');
	const burgerBtn = $('.burger-wrapper');

		burgerBtn.on('click', function() {
			console.log("Clicked!");
			toggle.slideout.css('display', 'block');
		});


}(jQuery) );
