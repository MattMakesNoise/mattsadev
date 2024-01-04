<?php
/**
 * Adds the functionality to switch the site logo dependent on the colour theme
 */

namespace Mattsadev\Inc;

use JetBrains\PhpStorm\NoReturn;
use Mattsadev\Main;

class Logo_Switch {
	/**
	 * Init class
	 *
	 * @return void
	 * @since 0.1.0
	 */
	public static function init(): void {
		add_action( 'wp_ajax_update_logo', [ self::class, 'update_logo' ] );
		add_action( 'wp_ajax_nopriv_update_logo', [ self::class, 'update_logo' ] );
	}

	/**
	 * AJAX call to change logo on colour theme toggle.
	 *
	 * @return void
	 */
	#[NoReturn] public static function update_logo() {
		$light_logo_path = Main::instance()->stylesheet_uri . '/src/assets/images/site_logo/matt-jones-writes-code-logo-light-mode.png';
		$dark_logo_path = Main::instance()->stylesheet_uri . '/src/assets/images/site_logo/matt-jones-writes-code-logo-dark-mode.png';

		echo json_encode(
			array(
				'light_logo_url' => $light_logo_path,
				'dark_logo_url'  => $dark_logo_path
			)
		);
		die();
	}
}
