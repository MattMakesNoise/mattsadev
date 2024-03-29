<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mattsadev
 */

use Mattsadev\Inc\Template_Tags;

?>

<article id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>">
	<div class="featured-img-wrapper">
		<?php Template_Tags::post_thumbnail(); ?>
	</div>

	<div class="post-content-wrapper">

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					Template_Tags::posted_on();
					Template_Tags::posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

        <div class="entry-content">
            <?php
                the_content();
            ?>
        </div><!-- .entry-content -->
		</div>
</article><!-- #post-<?php the_ID(); ?> -->
