<?php
/**
 * CHD Press functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CHD Press
 */

if ( ! defined( 'CHDP_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'CHDP_VERSION', '1.0.1' );
}

if ( ! function_exists( 'chdp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function chdp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CHD Press, use a find and replace
		 * to change 'chd-press' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'chd-press', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Sliding Menu', 'chd-press' ),
				'menu-2' => esc_html__( 'Desktop Menu', 'chd-press'),
				'menu-3' => esc_html__( 'Top Menu', 'chd-press')
			)
		);

		/*
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
				'chdp_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Custom Image sizes for the theme
		add_image_size('chdp_square_thumb', 500, 500, true);
		add_image_size('chdp_blog_thumb', 700, 490, true);
		add_image_size('chdp_800x500', 800, 500, true);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			apply_filters(
				'chdp_custom_logo_args', array(
					'height'      => 60,
					'width'       => 240,
					'flex-width'  => true,
					'flex-height' => true,
				)
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'chdp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chdp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'chdp_content_width', 640 );
}
add_action( 'after_setup_theme', 'chdp_content_width', 0 );

/**
 * Register widget area.
 */
require get_template_directory() . '/modules/theme-setup/register_sidebars.php';


/**
 *	Enqueue Front-end Theme Scripts and Styles
 */
require get_template_directory() . '/modules/theme-setup/enqueue_scripts.php';

/**
 *	Enqueue Back-end Theme Scripts and Styles
 */
 require get_template_directory() . '/modules/theme-setup/admin_scripts.php';

/**
 *	Functions for the masthead.
 */
 require get_template_directory() . '/inc/masthead.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 *	Custom CSS
 */
require get_template_directory() . '/inc/css-mods.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 *	Custom Color
 */
require get_template_directory() . '/inc/colors.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 *	Add Alpha Color Control Package
 */
 require get_template_directory() . '/inc/ColorAlpha.php';

/**
 *	Add Menu Walker
 */
require get_template_directory() . '/inc/walker.php';

/**
 *	The Meta Box for the Page
 */

require get_template_directory() . '/inc/metabox/display-options.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 *	Custom Widgets
 */
require get_template_directory() . '/inc/widgets/recent-posts.php';
