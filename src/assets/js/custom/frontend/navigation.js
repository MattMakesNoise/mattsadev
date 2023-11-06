/**
 * Adds slideout menu functionality.
 */
( function($) {
	const slideOut = $('#slideout');
	const pageWrapper = $('#page-wrapper');
	const overlay = $('#overlay');
	const burgerBtn = $('#burger-wrapper');
	const closeBtn = $('.close-button');

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
