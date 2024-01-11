<?php
/**
 * Custom comment walker for the theme.
 * 
 * @package WordPress
 * @subpackage Mattsadev
 * @since 1.0.0
 */

namespace Mattsadev\Inc;

use Walker_Comment;

class Comment_Walker extends Walker_Comment {
    protected function html5_comment( $comment, $depth, $args ) {
        $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

        ?>
        <<?php echo $tag; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                <footer class="comment-meta">
                    <div class="comment-author vcard">
                        <?php
                        $comment_author_url = get_comment_author_url( $comment );
                        $comment_author     = get_comment_author( $comment );
                        $avatar             = get_avatar( $comment, $args['avatar_size'] );
                        if ( 0 !== $args['avatar_size'] ) {
                            if ( empty( $comment_author_url ) ) {
                                echo wp_kses_post( $avatar );
                            } else {
                                printf( '<a href="%s" rel="external nofollow" class="url">', $comment_author_url ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Escaped in https://developer.wordpress.org/reference/functions/get_comment_author_url/
                                echo wp_kses_post( $avatar );
                            }
                        }

                        printf(
                            '<span class="fn">%1$s</span><span class="screen-reader-text says">%2$s</span>',
                            esc_html( $comment_author ),
                            /* translators: Hidden accessibility text. */
                            esc_html__( 'says:', 'mattsadev' )
                        );
                        ?>
                        </a>
                    </div><!-- .comment-author -->

                    <div class="comment-metadata">
                        <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                            <time datetime="<?php comment_time( 'c' ); ?>">
                                <?php
                                /* translators: 1: Comment date, 2: Comment time. */
                                printf(
                                    esc_html__( '%1$s at %2$s', 'mattsadev' ),
                                    get_comment_date( '', $comment ),
                                    get_comment_time()
                                );
                                ?>
                            </time>
                        </a>
                        <?php
                        edit_comment_link( esc_html__( 'Edit', 'mattsadev' ), '<span class="edit-link">', '</span>' );
                        ?>
                    </div><!-- .comment-metadata -->

                    <?php if ( '0' === $comment->comment_approved ) : ?>
                        <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'mattsadev' ); ?></p>
                    <?php endif; ?>
                </footer><!-- .comment-meta -->

                <div class="comment-content entry-content">
                    <?php

    }


}