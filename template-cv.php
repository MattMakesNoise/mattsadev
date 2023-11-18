<?php
/**
 * Template Name: CV Template
 *
 * @package mattsadev
 */
get_header();

$skills = new WP_Query(
	array(
		'post_type'      => 'skills',
		'posts_per_page' => -1,
		'order'          => 'DESC',
		'meta_key'       => 'skill_level',
		'orderby'        => 'meta_value_num',
	)
);
if ( $skills->have_posts() ) :
?>
	<main id="primary" class="site-main">
		<div class="header">

		</div>
		<div class="blurb">

		</div>
		<div class="skills-cards-container">
			<?php
			while ( $skills->have_posts() ) :
				$skills->the_post();
			?>
			<div class="skill-card">
				<div class="skill-card-logo-wrapper">
					<div class="skill-card-logo">
						<img src="<?php echo get_template_directory_uri() . '/src/assets/images/logos/' . get_post_meta( get_the_ID(), 'skill_logo', true ) . '.png' ?>" alt="">
					</div>
				</div>
				<div class="skill-level-container">
					<div class="level-container">
						<div class="level level-one"></div><div class="level level-two"></div><div class="level level-three"></div><div class="level level-four"></div><div class="level level-five"></div>
<!--						<div class="level">--><?php //echo get_post_meta( get_the_ID(), 'skill_level', true ) ?><!--</div>-->
					</div>
				</div>
				<div class="skill-card-header">
					<h2><?php the_title(); ?></h2>
				</div>
				<div class="skill-card-body">
					<?php the_content(); ?>
				</div>
			</div>
			<?php
			endwhile;
			?>
		</div>
	</main>
<?php endif;

wp_reset_postdata();
get_footer();
?>
