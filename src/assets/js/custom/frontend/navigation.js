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
			console.log('Clicked!');
			slideOut.css('display', 'block').css('width', '250px');
			pageWrapper.css('margin-left', '250px');
			burgerBtn.data('click-bound', true);
			overlay.css('display', 'block');
		});
	}

	closeBtn.on('click', function() {
		slideOut.css('width', '0');
		pageWrapper.css('margin-left', '0').css('opacity', '1');
		overlay.css('display', 'none');
	});

}(jQuery) );
