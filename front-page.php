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
				<div class="projects-first-pair">
					<div class="project-wrapper fade-in from-left slide-in">
						<div class="image-wrapper">
							<img src="https://picsum.photos/seed/1702227117452/300/300" alt="">
						</div>
						<div class="project-title">Project 1</div>
						<div class="project-blurb">I'm a great project</div>
						<button class="read-more">More</button>
					</div>
					<div class="project-wrapper fade-in from-right slide-in">
						<div class="image-wrapper">
							<img src="https://picsum.photos/seed/1702227195824/300/300" alt="">
						</div>
						<div class="project-title">Project 2</div>
						<div class="project-blurb">I'm a great project</div>
						<button class="read-more">More</button>
					</div>
				</div>
				<div class="projects-second-pair">
					<div class="project-wrapper fade-in from-left slide-in">
						<div class="image-wrapper">
							<img src="https://picsum.photos/seed/1702227214671/300/300" alt="">
						</div>
						<div class="project-title">Project 3</div>
						<div class="project-blurb">I'm a great project</div>
						<button class="read-more">More</button>
					</div>
					<div class="project-wrapper fade-in from-right slide-in">
						<div class="image-wrapper">
							<img src="https://picsum.photos/seed/1702227225965/300/300" alt="">
						</div>
						<div class="project-title">Project 4</div>
						<div class="project-blurb">I'm a great project</div>
						<button class="read-more">More</button>
					</div>
				</div>
			</div>
			<div class="contact-container">
				<h2 class="contact-title">Get in touch!</h2>
				<p class="contact-blurb">Got a question or want to work together?</p>
				<div class="contact-form-wrapper">
					<form action="" id="contact-form">
						<div class="first-last-wrapper">
							<div class="first-name-wrapper form-control">
								<label for="fname">First Name</label>
								<input type="text" id="fname" name="fname">
								<div class="error-wrapper">
									<i class="fas fa-check-circle"></i>
									<i class="fas fa-exclamation-circle"></i>
									<small class="error-message">Error</small>
								</div>
							</div>
							<div class="second-name-wrapper form-control">
								<label for="sname">Second Name</label>
								<input type="text" id="sname" name="sname">
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
								<small class="error-message">Error</small>
							</div>
						</div>
						<div class="email-subject-wrapper">
							<div class="email-wrapper form-control">
								<label for="email">Email</label>
								<input type="email" id="email" name="email">
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
								<small class="error-message">Error</small>
							</div>
							<div class="subject-wrapper form-control">
								<label for="subject">Subject</label>
								<input type="text" id="subject" name="subject">
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
								<small class="error-message">Error</small>
							</div>
						</div>
						<div class="message-wrapper">
							<div class="message-wrapper form-control">
								<label for="message">Message</label>
								<textarea name="message" id="message" cols="30" rows="10"></textarea>
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
								<small class="error-message">Error</small>
							</div>
						</div>
						<div class="submit-wrapper">
							<input type="submit" value="Submit">
						</div>
					</form>
				</div>
			</div>
		</div>


	</main><!-- #main -->

<?php
get_footer();
