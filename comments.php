<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mattsadev
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

if ( $comments ) {

	?>

	<div id="comments" class="comments-area">

		<?php
		$comments_count = get_comments_number();
		?>

		<div class="comments-header">
			<h2 class="comments-title">
				Comments
				<h3 class="comments-subtitle">
					<?php
					if ( ! have_comments() ) {
						_e( 'Leave a comment', 'mattsadev' );
					} elseif ( '1' === $comments_count ) {
						/* translators: %s: Post title. */
						printf( _x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'mattsadev' ), get_the_title() );
					} else {
						printf(
							/* translators: 1: Number of comments, 2: Post title. */
							_nx(
								'%1$s reply on &ldquo;%2$s&rdquo;',
								'%1$s replies on &ldquo;%2$s&rdquo;',
								$comments_count,
								'comments title',
								'mattsadev'
							),
							number_format_i18n( $comments_count ),
							get_the_title()
						);
					}

					?>
				</h3>
			</h2><!-- .comments-title -->

		</div><!-- .comments-header -->

		<ul class="comments-body">

			<?php
			wp_list_comments(
				array(
					'callback'    => 'Mattsadev\Inc\Comments_Callback::comment_callback',
					'avatar_size' => 120,
				)
			);

			$comment_pagination = paginate_comments_links(
				array(
					'echo'      => false,
					'end_size'  => 0,
					'mid_size'  => 0,
					'next_text' => __( 'Newer Comments', 'mattsadev' ) . ' <span aria-hidden="true">&rarr;</span>',
					'prev_text' => '<span aria-hidden="true">&larr;</span> ' . __( 'Older Comments', 'mattsadev' ),
				)
			);

			if ( $comment_pagination ) {
				$pagination_classes = '';

				// If we're only showing the "Next" link, add a class indicating so.
				if ( ! str_contains( $comment_pagination, 'prev page-numbers' ) ) {
					$pagination_classes = ' only-next';
				}
				?>

				<nav class="comments-pagination pagination<?php echo $pagination_classes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>" aria-label="<?php esc_attr_e( 'Comments', 'mattsadev' ); ?>">
					<?php echo wp_kses_post( $comment_pagination ); ?>
				</nav>

				<?php
			}
			?>

		</ul><!-- .comments-body -->

	</div><!-- #comments -->

	<?php
}

if ( comments_open() || pings_open() ) {

	comment_form(
		array(
			'class_form'         => 'section-inner',
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		)
	);

} elseif ( is_single() ) {
	?>

	<div class="comment-respond" id="respond">

		<p class="comments-closed"><?php _e( 'Comments are closed.', 'mattsadev' ); ?></p>

	</div><!-- #respond -->

	<?php
}
