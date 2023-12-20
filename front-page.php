<?php
/**
 * The front page template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mattsadev
 */

get_header();

$projects = new WP_Query(
	array(
		'post_type'      => 'projects',
		'posts_per_page' => -1,
		'order'          => 'DESC',
		// 'meta_key'       => 'project_level',
		// 'orderby'        => 'meta_value_num',
	)
);

$base_url = \Mattsadev\Main::instance()->stylesheet_uri . 'src/assets/images/projects/';

if ( $projects->have_posts() ) :
?>

	<main id="primary" class="site-main">
		<div class="content">
			<div class="hero-container">
				<section aria-label="Newest Photos">
					<div class="carousel" data-carousel>
						<button class="carousel-button prev" data-carousel-button="prev">&#60</button>
						<button class="carousel-button next" data-carousel-button="next">&#62</button>
						<ul data-slides>
							<li class="slide" data-active="true">
								<img src="https://picsum.photos/seed/1702287946690/600/300" alt="">
							</li>
							<li class="slide">
								<img src="https://picsum.photos/seed/1702287956193/600/300" alt="">
							</li>
							<li class="slide">
								<img src="https://picsum.photos/seed/1702287957682/600/300" alt="">
							</li>
						</ul>
						<div class="carousel-dots">
							<div class="carousel-dot active" data-carousel-dot="1"></div>
							<div class="carousel-dot" data-carousel-dot="2"></div>
							<div class="carousel-dot" data-carousel-dot="3"></div>
						</div>
					</div>
				</section>
			</div>
			<div class="projects-container">
				<?php
					while ( $projects->have_posts() ) :
						$projects->the_post();
				?>
				<div class="project-wrapper hidden">
					<div class="image-wrapper">
						<img src="<?php echo $base_url . get_post_meta( get_the_ID(), 'project_image', true ) . '.png' ?>" alt="">
					</div>
					<h4 class="project-title"><?php echo the_title() ?></h4>
					<div class="project-blurb"><?php echo the_content() ?></div>
					<button class="read-more"><a href="<?php echo get_post_meta( get_the_ID(), 'project_url', true ) ?>" target="_blank">View Site</a></button>
				</div>
				<?php
					endwhile;
				?>
			</div>
			<div class="contact-container">
				<div class="contact-title">
					<h3 class="contact-title">Get in touch!</h3>
				</div>
				<div class="contact-form-wrapper">
					<?php
						echo do_shortcode(
							'[contact-form-7 id="de5e44f" title="Get in touch!"]'
						);
					?>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php endif;

wp_reset_postdata();
get_footer();
