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
			<p>A keen interest in both front-end and back-end development, strong communication skills, attention to detail and a fantastic work ethic.</p>
			<p>Having always been intrigued by web development and following a Covid related redundancy, I decided to pursue this further and enrolled on the Netmatters SCS Scheme. This helped me to build a solid foundation in the skills required for entry into the industry.</p>
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
						<?php
						$skill_level = get_post_meta( get_the_ID(), 'skill_level', true );

						// Calculate the number of fully filled pills
						$full_pills = floor( $skill_level );

						// Calculate the remaining percentage for a partially filled pill
						$partial_fill = ( $skill_level - $full_pills ) * 100;

						// Output fully filled pills
						for ( $i = 0; $i < $full_pills; $i++ ) {
							echo '<div class="level level-full">
									<div class="level-fill"></div>
								  </div>';
						}

						// Output partially filled pill
						if ( $partial_fill > 0 ) {
							echo '<div class="level level-partial">
									<div class="level-fill" style="width:' . $partial_fill . '%;"></div>
									<div class="level-fill" style="width:' . $partial_fill . '%;"></div>
								  </div>';
						}

						// Output remaining empty pills
						for ( $i = $full_pills + ($partial_fill > 0 ? 1 : 0); $i < 5; $i++ ) {
							echo '<div class="level level-empty">
                					<div class="level-fill"></div>
              					  </div>';
						}
						?>
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
