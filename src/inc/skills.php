<?php
/**
 * Skills custom post type and custom fields.
 *
 * @package mattsadev
 */

namespace Mattsadev\Inc;
class Skills {
	public static function init(): void {
		add_action( 'init', [ self::class, 'create_skills_post_type' ] );
		add_action( 'init', [ self::class, 'register_skills_meta' ] );
		add_action( 'add_meta_boxes', [ self::class, 'skills_meta_boxes' ] );
		add_action( 'save_post_skills', [ self::class, 'save_skills_meta_box' ] );
	}

	/**
	 * Creates skills custom post type.
	 *
	 * @return void
	 * @since 0.1.0
	 */
	public static function create_skills_post_type(): void {
		register_post_type('skills',
			array(
				'labels' => array(
					'name' => __('Skills'),
					'singular_name' => __('Skill'),
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'skills'),
				'menu_icon' => 'dashicons-hammer'
			)
		);
	}

	/**
	 * Registers skills custom fields.
	 *
	 * @return void
	 * @since 0.1.0
	 */
	public static function register_skills_meta(): void {
		// Register skill level field
		register_post_meta('skills', 'skill_level', array(
			'type' => 'integer',
			'single' => true,
			'show_in_rest' => true,
		));

		// Register skill logo field
		register_post_meta('skills', 'skill_logo', array(
			'type' => 'string',
			'single' => true,
			'show_in_rest' => true,
		));
	}

	/**
	 * Adds custom meta boxes to skills custom post type.
	 *
	 * @return void
	 * @since 0.1.0
	 */
	public static function skills_meta_boxes(): void {
		add_meta_box(
			'skill-level',
			'Skill Level',
			[ self::class, 'skill_level_meta_box' ],
			'skills',
			'side',
			'low'
		);

		add_meta_box(
			'skill-logo',
			'Skill Logo',
			[ self::class, 'skill_logo_meta_box' ],
			'skills',
			'side',
			'low'
		);
	}

	/**
	 * Outputs skill level meta box.
	 *
	 * @return void
	 * @since 0.1.0
	 */
	public static function skill_level_meta_box(): void {
		global $post;
		$level = get_post_meta($post->ID, 'skill_level', true);
		?>
		<label for="skill-level">Skill Level</label>
		<input type="number" name="skill-level" id="skill-level" value="<?php echo $level; ?>" step="0.5">
		<?php
	}

	/**
	 * Outputs skill logo meta box.
	 *
	 * @return void
	 * @since 0.1.0
	 */
	public static function skill_logo_meta_box(): void {
		global $post;
		$logo = get_post_meta($post->ID, 'skill_logo', true);
		?>
		<label for="skill-logo">Skill Logo</label>
		<input type="text" name="skill-logo" id="skill-logo" value="<?php echo $logo; ?>">
		<?php
	}

	/**
	 * Saves skill level and skill logo meta boxes.
	 *
	 * @since 0.1.0
	 *
	 *@param int $post_id The ID of the post being saved.
	 *
	 * @return void
	 */
	public static function save_skills_meta_box( int $post_id ): void {
		if ( array_key_exists( 'skill-level', $_POST ) ) {
			update_post_meta(
				$post_id,
				'skill_level',
				$_POST[ 'skill-level' ]
			);
		}

		if ( array_key_exists( 'skill-logo', $_POST ) ) {
			update_post_meta(
				$post_id,
				'skill_logo',
				$_POST[ 'skill-logo' ]
			);
		}
	}
}
