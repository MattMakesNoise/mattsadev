<?php
/**
 * @since 0.1.0
 */
use Mattsadev\Main;

require_once( __DIR__ ) . '/config.php';
require_once( __DIR__ ) . '/vendor/autoload_packages.php';
/**
 * Get the theme instance.
 *
 * @since 0.1.0
 * @return Main
 */
function mattsadev(): Main {
	return Main::instance();
}

// Init
mattsadev()->init();
