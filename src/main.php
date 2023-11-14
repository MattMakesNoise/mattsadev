<?php
/**
 * Zipline custom theme class.
 *
 * @since 0.1.0
 */
namespace Mattsadev;

use Mattsadev\Inc\Search;
use Mattsadev\Inc\Template_Tags;

/**
 * @since 0.1.0
 */
final class Main {
	/**
	 * Singleton instance of theme.
	 *
	 * @since ZLTheme 0.1.0
	 * @var   Main
	 */
	protected static $instance = null;

	/**
	 * @since 0.1.0
	 * @var string File path to child theme directory.
	 */
	public $stylesheet_dir;

	/**
	 * @since 0.1.0
	 * @var string URI to child theme directory.
	 */
	public $stylesheet_uri;

	/**
	 * @since 0.1.0
	 * @var string File path to source directory.
	 */
	public $theme_dir;

	/**
	 * @since 0.1.0
	 * @var string Theme version
	 */
	public $version = '0.1.0';

	/**
	 * Setup class.
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
	}

	/**
	 * Creates or returns an instance of this class.
	 *
	 * @since 0.1.0
	 * @return Main
	 */
	public static function instance(): Main {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * WordPress init hooks
	 *
	 * @since 0.1.0
	 */
	public function wp_init() {
	}

	/**
	 * Setup theme.
	 *
	 * @since 0.1.0
	 */
	public function init() {
		$theme = wp_get_theme();

		$this->version = $theme->get( 'Version' );

		$this->stylesheet_dir = get_stylesheet_directory() . '/';
		$this->stylesheet_uri = get_stylesheet_directory_uri() . '/';

		$this->theme_dir = $this->stylesheet_dir . 'src/';

		$this->init_hooks();
	}

	/**
	 * Init theme hooks.
	 *
	 * @since 0.1.0
	 */
	protected function init_hooks() {
		add_action( 'wp_enqueue_scripts',    [ $this, 'wp_enqueue_scripts' ], 999 );
		add_action( 'login_enqueue_scripts', [ $this, 'wp_enqueue_scripts' ], 999);
		add_action( 'after_setup_theme',     [ $this, 'early_setup' ], 9 );
		add_action( 'after_setup_theme',     [ $this, 'setup' ], 20 );
		add_action( 'widgets_init', 		 [ $this, 'register_sidebars' ] );
		add_action( 'init',                  [ $this, 'wp_init' ] );
		add_filter( 'body_class',            [ $this, 'add_slug_to_body_class' ], 10, 1 );
		add_action( 'wp_footer',             [ $this, 'output_livereload_script' ] );

		Template_Tags::init();

		Search::init();
	}

	/**
	 * Sets up theme defaults and registers support for various WordPress features, earlier init than default.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 0.1.0
	 */
	public function early_setup() {
		$this->hide_admin_bar();

		$this->register_menus();
	}

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 0.1.0
	 */
	public function setup() {
		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mattsadev, use a find and replace
		 * to change 'mattsadev' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mattsadev', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'mattsadev_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}

	/**
	 * Enqueue scripts and stylesheets.
	 *
	 * @since 0.1.0
	 */
	public function wp_enqueue_scripts(): void {
		// $min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '.min' : '';

		/**
		 * Enqueue styles.
		 */
		wp_enqueue_style(
			'mattsadev',
			get_stylesheet_directory_uri() . '/assets/css/frontend.css',
			[],
			$this->version
		);

		wp_enqueue_style(
			'google_font',
			'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,600&display=swap',
			[],
			false
		);

		/**
		 * Enqueue scripts.
		 */
		if ( ! is_admin() ) {
			wp_enqueue_script(
				'mattsadev-frontend',
				get_stylesheet_directory_uri() . '/assets/js/frontend/frontend.min.js',
				[ 'jquery' ],
				$this->version,
				true
			);

			wp_localize_script(
				'mattsadev-frontend',
				'ajax_object',
				[
					'ajax_url' => admin_url('admin-ajax.php'),
					'nonce'   => wp_create_nonce('ajax-nonce'),
				]
			);
		} else {
			wp_enqueue_script(
				'mattsadev-admin',
				get_stylesheet_directory_uri() . '/assets/js/admin/admin.min.js',
				[ 'jquery' ],
				$this->version,
				true
			);
		}
	}

	/**
	 * Register widget areas.
	 *
	 * @since 0.1.0
	 */
	public function register_sidebars() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'mattsadev' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'mattsadev' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}

	/**
	 * Register custom menu locations for theme.
	 *
	 * @return void
	 * @since 0.1.0
	 */
	public function register_menus(): void {
		register_nav_menus(
			array(
				'nav-menu' => esc_html__( 'Nav Menu', 'mattsadev' ),
			)
		);
	}

	/**
	 * Add page slug to body class.
	 *
	 * @since 0.1.0
	 */
	public function add_slug_to_body_class( $classes ) {
		global $post;

		if ( isset( $post ) ) {
			$classes[] = $post->post_name;
		}

		return $classes;
	}

	/**
	 * Output BrowserSync script if localhost.
	 *
	 * @since 0.1.0
	 */
	public function output_livereload_script() {
		if ( ! isset( $_SERVER['REMOTE_ADDR'] ) || $_SERVER['REMOTE_ADDR'] !== '127.0.0.1' ) {
			return;
		}
		?>

		<script id="__bs_script__">//<![CDATA[
			document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.17.5'><\/script>".replace("HOST", location.hostname));
			//]]></script>

		<?php
	}

	/**
	 * Hide the admin bar for all users
	 *
	 * @since 0.1.0
	 */
	public function hide_admin_bar() {
		show_admin_bar( false );
	}
}
