<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mattsadev
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://kit.fontawesome.com/16607d9d5e.js" crossorigin="anonymous"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="slideout">
	<div class="slideout-inner">
		<a href="#" class="close-button">&times;</a>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'nav-menu',
				'menu_id'        => 'primary-menu',
			)
		);
		?>
	</div>
</div><!-- #site-navigation -->

<div id="page-wrapper">
	<div id="overlay"></div>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'mattsadev' ); ?></a>

	<header id="site-header">
		<div class="header-wrapper">
			<button id="burger-wrapper" class="menu-btn">
                <span class="burger-box">
                    <span class="burger-inner"></span>
                </span>
			</button>

			<div class="site-branding">
				<a href="<?php echo home_url() ?>">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/site_logo/matt-jones-writes-code-logo-light-mode.webp' ?>"  alt="site-logo"/>
				</a>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'nav-menu',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->

			<div id="colour-switch-wrapper">
				<input type="checkbox" name="theme_switch" id="switch">
				<label for="switch" class="switch-label">Toggle Colour Mode</label>
				<div class="colour-switch">
					<div class="pill">
						<span class="pill-inner"><i class="fa fa-sun-o" aria-hidden="true"></i><i class="fa fa-moon-o" aria-hidden="true"></i></span>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #site-header -->
	<div class="content-wrapper"><!-- Closed in footer.php -->
