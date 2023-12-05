jQuery(document).ready(function($) {
	let typingTimer;
	const doneTypingInterval = 500;
	const searchInput = $('#wp-block-search__input-1');

	searchInput.on('keyup', function() {
		clearTimeout(typingTimer);
		if ($(this).val()) {
			typingTimer = setTimeout(ajaxSearch, doneTypingInterval);
		}
	});

	function ajaxSearch() {
		const query = searchInput.val();

		$.ajax({
			type: 'POST',
			url: ajax_object.ajax_url,
			data: {
				action: 'search',
				query: query
			},
			success: function(response) {
				// Replace the default search results container with the AJAX response
				$('.widget_search .search-results').html(response);
			}
		});
	}
});
