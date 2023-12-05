<?php
/**
 * AJAX search for blogs
 *
 * @package mattsadev
 */

namespace Mattsadev\Inc;

use WP_Query;

class Search {

	/**
	 * Init hooks.
	 *
	 * @return void
	 * @since 0.1.0
	 */
	public static function init(): void {
		add_action( 'wp_ajax_nopriv_search', [ self::class, 'search' ] );
		add_action( 'wp_ajax_search', [ self::class, 'search' ] );
	}

	/**
	 * Search for blogs.
	 *
	 * @return void
	 * @since 0.1.0
	 */
	public static function search(): void {
		$query = $_POST['query'];

		$args = array(
			's' => $query,
			'post_type' => 'post',
		);

		$search_query = new WP_Query( $args );

		if ( $search_query->have_posts() ) :
			while ( $search_query->have_posts() ) : $search_query->the_post();
				the_title('<h2>', '</h2>');
				the_excerpt();
			endwhile;
		else :
			echo 'No results found';
		endif;

		wp_reset_postdata();

		die();
	}
}
