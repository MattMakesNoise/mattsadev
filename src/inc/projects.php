<?php
/**
 * Projects custom post type and custom fields.
 *
 * @package mattsadev
 */

namespace Mattsadev\Inc;

class Projects {
	public static function init(): void {
		add_action( 'init', [ self::class, 'create_projects_post_type' ] );
		add_action( 'init', [ self::class, 'register_projects_meta' ] );
		add_action( 'add_meta_boxes', [ self::class, 'projects_meta_boxes' ] );
		add_action( 'save_post_projects', [ self::class, 'save_projects_meta_box' ] );
	}

	/**
	 * Creates projects custom post type.
	 *
	 * @return void
	 * @since 0.1.0
	 */
	public static function create_projects_post_type(): void {
		register_post_type('projects',
			array(
				'labels' => array(
					'name' => __('Projects'),
					'singular_name' => __('Project'),
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'projects'),
				'menu_icon' => 'dashicons-media-code'
			)
		);
	}

	/**
	 * Registers projects custom fields.
	 *
	 * @return void
	 * @since 0.1.0
	 */
	public static function register_projects_meta(): void {
		// Register project url field
		register_post_meta('projects', 'project_url', array(
			'type' => 'string',
			'single' => true,
			'show_in_rest' => true,
		));

		// Register project image field
		register_post_meta('projects', 'project_image', array(
			'type' => 'string',
			'single' => true,
			'show_in_rest' => true,
		));
	}

	/**
	 * Adds custom meta boxes to projects custom post type.
	 *
	 * @return void
	 * @since 0.1.0
	 */
	public static function projects_meta_boxes(): void {
		add_meta_box(
			'project-url',
			'Project URL',
			[ self::class, 'project_url_meta_box' ],
			'projects',
			'side',
			'low'
		);

		add_meta_box(
			'project-image',
			'Project Image',
			[ self::class, 'project_image_meta_box' ],
			'projects',
			'side',
			'low'
		);
	}

	/**
	 * Outputs project level meta box.
	 *
	 * @return void
	 * @since 0.1.0
	 */
	public static function project_url_meta_box(): void {
		global $post;
		$url = get_post_meta($post->ID, 'project_url', true);
		?>
		<label for="project-url">Project URL</label>
		<input type="text" name="project-url" id="project-url" value="<?php echo $url; ?>">
		<?php
	}

	/**
	 * Outputs project image meta box.
	 *
	 * @return void
	 * @since 0.1.0
	 */
	public static function project_image_meta_box(): void {
		global $post;
		$image = get_post_meta($post->ID, 'project_image', true);
		?>
		<label for="project-image">Project Image</label>
		<input type="text" name="project-image" id="project-image" value="<?php echo $image; ?>">
		<?php
	}

	/**
	 * Saves project url and project image meta boxes.
	 *
	 * @since 0.1.0
	 *
	 *@param int $post_id The ID of the post being saved.
	 *
	 * @return void
	 */
	public static function save_projects_meta_box( int $post_id ): void {
		if ( array_key_exists( 'project-url', $_POST ) ) {
			update_post_meta(
				$post_id,
				'project_url',
				$_POST[ 'project-url' ]
			);
		}

		if ( array_key_exists( 'project-image', $_POST ) ) {
			update_post_meta(
				$post_id,
				'project_image',
				$_POST[ 'project-image' ]
			);
		}
	}
}
