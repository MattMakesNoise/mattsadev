<?php
/**
 * The front page template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mattsadev
 */

get_header();
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
				<div class="project-wrapper">
					<div class="image-wrapper fade-in from-left slide-in">
						<img src="https://picsum.photos/seed/1702227117452/300/300" alt="">
					</div>
					<div class="project-title">Project 1</div>
				</div>
				<div class="project-wrapper">
					<div class="image-wrapper fade-in from-right slide-in">
						<img src="https://picsum.photos/seed/1702227195824/300/300" alt="">
					</div>
					<div class="project-title">Project 2</div>
				</div>
				<div class="project-wrapper">
					<div class="image-wrapper fade-in from-left slide-in">
						<img src="https://picsum.photos/seed/1702227214671/300/300" alt="">
					</div>
					<div class="project-title">Project 3</div>
				</div>
				<div class="project-wrapper">
					<div class="image-wrapper fade-in from-right slide-in">
						<img src="https://picsum.photos/seed/1702227225965/300/300" alt="">
					</div>
					<div class="project-title">Project 4</div>
				</div>
			</div>
			<div class="contact-container">
				<div class="contact-title">Get in touch!</div>
				<?php
					echo do_shortcode(
						'[contact-form-7 id="62a785a" title="Contact form 1"]'
					);
				?>
			</div>
		</div>


	</main><!-- #main -->

<?php
get_footer();
