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
		<div class="content">

			<div class="contact-container">
				<div class="contact-header">
					<img src="<?php echo get_template_directory_uri() . '/src/assets/images/IMG_1677.JPG' ?>" alt="">
				</div>
				<div class="contacts-wrapper">
					<div class="contact-title">
						<h3>Connect</h3>
					</div>
					<div class="contacts-container">
						<div class="linkedin-container">
							<i class="fa fa-linkedin-square" aria-hidden="true"></i><a href="#" target="_blank">LinkedIn</a>
						</div>
						<div class="twitter-container">
							<i class="fa fa-twitter-square" aria-hidden="true"></i><a href="#" target="_blank">Twitter</a>
						</div>
					</div>
				</div>
			</div>

			<div class="summary-container">
				<h2 class="summary-heading">Summary</h2>
				<div class="summary-body">
					<p>A keen interest in both front-end and back-end development, strong communication skills, attention to detail and a fantastic work ethic.</p>
					<p>Having always been intrigued by web development and following a Covid related redundancy, I decided to pursue this further and enrolled on the Netmatters SCS Scheme. This helped me to build a solid foundation in the skills required for entry into the industry.</p>
					<p>Having worked as a developer for 18 months, developing themes and plugins for WordPress I now have a solid grasp of the fundamentals, version control, writing documentation and working collaboratively.</p>
					<p>A previous work history in a variety of different roles shows a proven ability to
						not only motivate myself but also others to achieve high standards, additionally
						demonstrating that I can communicate effectively with colleagues as well as
						clients.</p>
				</div>
			</div>

			<div class="skills-key-container">
				<div class="skills-key-header">
					<h3>Skills Key</h3>
				</div>
				<div class="skills-first-pair-wrapper">
					<div class="skills-level">
						<h4>Expert</h4>
						<div class="skill-level-container">
							<div class="level-container">
								<div class="level level-full">
									<div class="level-fill"></div>
								</div>
								<div class="level level-full">
									<div class="level-fill"></div>
								</div>
								<div class="level level-full">
									<div class="level-fill"></div>
								</div>
								<div class="level level-full">
									<div class="level-fill"></div>
								</div>
								<div class="level level-full">
									<div class="level-fill"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="skills-level">
						<h4>Secured</h4>
						<div class="skill-level-container">
							<div class="level-container">
								<div class="level level-full">
									<div class="level-fill"></div>
								</div>
								<div class="level level-full">
									<div class="level-fill"></div>
								</div>
								<div class="level level-full">
									<div class="level-fill"></div>
								</div>
								<div class="level level-full">
									<div class="level-fill"></div>
								</div>
								<div class="level level-empty">
									<div class="level-fill"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="skills-second-pair-wrapper">

					<div class="skills-level">
						<h4>Proficient</h4>
						<div class="skill-level-container">
							<div class="level-container">
								<div class="level level-full">
									<div class="level-fill"></div>
								</div>
								<div class="level level-full">
									<div class="level-fill"></div>
								</div>
								<div class="level level-full">
									<div class="level-fill"></div>
								</div>
								<div class="level level-empty">
									<div class="level-fill"></div>
								</div>
								<div class="level level-empty">
									<div class="level-fill"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="skills-level">
						<h4>Intermediate</h4>
						<div class="skill-level-container">
							<div class="level-container">
								<div class="level level-full">
									<div class="level-fill"></div>
								</div>
								<div class="level level-full">
									<div class="level-fill"></div>
								</div>
								<div class="level level-empty">
									<div class="level-fill"></div>
								</div>
								<div class="level level-empty">
									<div class="level-fill"></div>
								</div>
								<div class="level level-empty">
									<div class="level-fill"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="skills-level">
					<h4>Basic</h4>
					<div class="skill-level-container">
						<div class="level-container">
							<div class="level level-full">
								<div class="level-fill"></div>
							</div>
							<div class="level level-empty">
								<div class="level-fill"></div>
							</div>
							<div class="level level-empty">
								<div class="level-fill"></div>
							</div>
							<div class="level level-empty">
								<div class="level-fill"></div>
							</div>
							<div class="level level-empty">
								<div class="level-fill"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="skills-cards-container">
				<?php
				while ( $skills->have_posts() ) :
					$skills->the_post();
					?>
					<div class="skill-card">
						<div class="skill-card-logo-wrapper">
							<div class="skill-card-logo">
								<img src="<?php echo get_template_directory_uri() . '/assets/images/logos/' . get_post_meta( get_the_ID(), 'skill_logo', true ) . '.webp' ?>" alt="">
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
									echo '<div class="level level-full hidden">
										<div class="level-fill"></div>
									  </div>';
								}

								// Output partially filled pill
								if ( $partial_fill > 0 ) {
									echo '<div class="level level-partial hidden">
										<div class="level-fill" style="width:' . $partial_fill . '%;"></div>
										<div class="level-fill" style="width:' . $partial_fill . '%;"></div>
									  </div>';
								}

								// Output remaining empty pills
								for ( $i = $full_pills + ($partial_fill > 0 ? 1 : 0); $i < 5; $i++ ) {
									echo '<div class="level level-empty hidden">
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

			<div class="experience-container">
				<h2 class="experience-heading">Experience</h2>
				<div class="experience-body">
					<div class="experience-item">
						<h4>Developer - Zipline</h4>
						<div class="experience-content">
							<p>May 2022 - Nov 2023</p>
							<ul>
								<li>Intensive specially tailored training programme under the supervision of senior developers. 40 hours per week to simulate employment as a web developer and prepare for employment.</li>
								<li>Studied front-end and back-end development, UI/UX design, OOP and databases.</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="experience-body">
					<div class="experience-item">
						<h4>Website Administrator - Freelance</h4>
						<div class="experience-content">
							<p>Sept 2021 - May 2022</p>
							<ul>
								<li>Intensive specially tailored training programme under the supervision of senior developers. 40 hours per week to simulate employment as a web developer and prepare for employment.</li>
								<li>Studied front-end and back-end development, UI/UX design, OOP and databases.</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="experience-body">
					<div class="experience-item">
						<h4>Live Sound Engineer - Freelance</h4>
						<div class="experience-content">
							<p>2003 - Present</p>
							<ul>
								<li>Intensive specially tailored training programme under the supervision of senior developers. 40 hours per week to simulate employment as a web developer and prepare for employment.</li>
								<li>Studied front-end and back-end development, UI/UX design, OOP and databases.</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="experience-body">
					<div class="experience-item">
						<h4>Senior Technician - The Old Market</h4>
						<div class="experience-content">
							<p>2010 - 2019</p>
							<ul>
								<li>Intensive specially tailored training programme under the supervision of senior developers. 40 hours per week to simulate employment as a web developer and prepare for employment.</li>
								<li>Studied front-end and back-end development, UI/UX design, OOP and databases.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="education-container">
				<div class="education-header">
					<h3>Education</h3>
				</div>
				<div class="education-body">
					<div class="education-item">
						<h4>Netmatters SCS Scheme</h4>
						<div class="education-content">
							<p>March 2021 - May 2022</p>
							<ul>
								<li>Intensive specially tailored training programme under the supervision of senior developers. 40 hours per week to simulate employment as a web developer and prepare for employment.</li>
								<li>Studied front-end and back-end development, UI/UX design, OOP and databases.</li>
							</ul>
						</div>
					</div>
					<div class="education-item">
						<h4>Confetti School of Recording, Nottingham</h4>
						<div class="education-content">
							<p>2001 - 2003</p>
							<ul>
								<li>HND Sound Engineering and Music Production - Merit</li>
							</ul>
						</div>
					</div>
					<div class="education-item">
						<h4>Hewett & Access to Music, Norwich</h4>
						<div class="education-content">
							<p>1998 - 2001</p>
							<ul>
								<li>BTEC in Contemporary and Popular Music - Merit</li>
								<li>A Level Music Technology - C</li>
							</ul>
						</div>
					</div>
					<div class="education-item">
						<h4>Reepham High School, Norfolk</h4>
						<div class="education-content">
							<p>1993 - 1998</p>
							<ul>
								<li>9 GCSEs Grade A* to C including Maths and English</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>

<?php endif;

wp_reset_postdata();
get_footer();
?>
