<?php
/**
 * Custom comment output for comments.
 * 
 * @package Mattsadev
 * @since 1.0.0
 */

namespace Mattsadev\Inc;

class Comments_Callback {
    public static function comment_callback( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment; ?>

            <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
                <div class="comment-author vcard">
                    <?php echo get_avatar( $comment ); ?>
                    <div class="comment-author-name-meta__wrapper">
                        <?php printf( 
                                __('<cite class="fn">%s</cite>'), get_comment_author_link()
                            ) 
                        ?>
                        <div class="comment-meta commentmetadata">
                            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?>
                        </div>
                    </div>
                </div>
                <?php comment_text() ?>
                <div class="reply">
                    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>

        <?php
    }
}