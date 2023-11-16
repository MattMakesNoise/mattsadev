<?php
/**
 * Template Name: CV Template
 *
 * @package mattsadev
 */
// Skills cards array
$cards = array(
	array(
		'title' => 'HTML',
		'level' => 4,
		'logo' => 'html-logo',
		'body' => 'Blah blah HTML, blah-blah-blah'
	),
	array(
		'title' => 'CSS/SCSS',
		'level' => 4,
		'logo' => 'css-logo',
		'body' => 'Blah blah CSS, blah-blah-blah SCSS'
	),
	array(
		'title' => 'Javascript/ jQuery',
		'level' => 3.5,
		'logo' => 'javascript-logo',
		'body' => 'Blah blah Javascript, blah-blah-blah jQuery'
	),
	array(
		'title' => 'PHP',
		'level' => 3.5,
		'logo' => 'php-logo',
		'body' => 'Blah blah PHP, blah-blah-blah'
	),
	array(
		'title' => 'GIT',
		'level' => 3,
		'logo' => 'github-logo',
		'body' => 'Blah blah GIT, blah-blah-blah'
	),
	array(
		'title' => 'MySQL',
		'level' => 3,
		'logo' => 'mysql-logo',
		'body' => 'Blah blah MySQL, blah-blah-blah'
	),
	array(
		'title' => 'Vue',
		'level' => 2,
		'logo' => 'vue-logo',
		'body' => 'Blah blah Vue, blah-blah-blah'
	),
	array(
		'title' => 'React',
		'level' => 2,
		'logo' => 'react-logo',
		'body' => 'Blah blah React, blah-blah-blah'
	),
	array(
		'title' => 'Wordpress',
		'level' => 2,
		'logo' => 'wordpress-logo',
		'body' => 'Blah blah Wordpress, blah-blah-blah',
	),
);

get_header();
?>

<main id="primary" class="site-main">
	<div class="header">

	</div>
	<div class="blurb">

	</div>
	<div class="cards-container">
		<?php
		foreach ( $cards as $card  ) {
			?>
			<div class="card">
				<div class="card-logo-wrapper">
					<div class="card-logo">
						<img src="<?php echo get_template_directory_uri() . '/src/assets/images/logos/' . $card['logo'] . '.png' ?>" alt="">
					</div>
				</div>
				<div class="card-header">
					<h2><?php echo $card['title']; ?></h2>
				</div>
				<div class="skills-container">
					<div class="level-container">
						<div class="level" style="width: <?php echo $card['level'] * 20; ?>%;"></div>
					</div>
				</div>
				<div class="card-body">
					<?php echo $card['body']; ?>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</main>

<?php
get_footer();
?>
