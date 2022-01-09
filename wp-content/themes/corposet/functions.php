<?php

/**
 * Corposet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Corposet
 */
define('CORPOSET_ASSETS', trailingslashit(get_template_directory_uri(). '/assets/'));
define('CORPOSET_DIR', trailingslashit(get_template_directory('/')));
define('CORPOSET_INCLUDE', CORPOSET_DIR . 'inc/');
define('CORPOSET_BASE_DIR', CORPOSET_INCLUDE . 'core/');

require  CORPOSET_BASE_DIR . "class-corposet-public.php";
require CORPOSET_BASE_DIR . "class-corposet-admin.php";
require CORPOSET_INCLUDE . "customizer/class-corposet-pro-info-control.php";

$corposet_front = new Corposet_Public();
add_action('after_setup_theme', array($corposet_front, 'setup_theme'));

add_filter('wp_tag_cloud', array($corposet_front, 'set_tag_cloud_sizes'));
add_filter( 'wp_generate_tag_cloud_data', array($corposet_front, 'extend_tag_cloud'),12,1);

$corposet_admin = new Corposet_Admin();
add_action('customize_register', array( $corposet_admin, 'corposet_pro_info' ));
add_action('customize_preview_init', array($corposet_admin, 'corposet_preview_register'));
add_action('customize_controls_print_scripts', array($corposet_admin, 'shapro_theme_customizer'));

require CORPOSET_INCLUDE . 'custom-header.php';
/**
 * Custom template tags for this theme.
 */
require CORPOSET_INCLUDE . 'template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require CORPOSET_INCLUDE . 'template-functions.php';

/**
 * Register Widget WordPress.
 */
require CORPOSET_INCLUDE . 'widget/widgets-register-sidebars.php';
require CORPOSET_INCLUDE . 'widget/corposet-recent-post-widget.php';

/**
 * Customizer
 * Custom functions that act independently of the theme templates.
 */
require_once CORPOSET_INCLUDE . 'plugin-install.php';

/* Header */
require CORPOSET_INCLUDE . 'customizer/customizer_header.php';

/* Footer */
require CORPOSET_INCLUDE . 'customizer/customizer_footer.php';

/* Recommended plugin */
require CORPOSET_INCLUDE . 'customizer/customizer_recommended_plugin.php';

/* Toggle */
require CORPOSET_INCLUDE . 'customizer/customizer_toggle.php';

/* Header */
require CORPOSET_INCLUDE . 'customizer/customizer_general.php';

/*
 * Breadcrumb
 */
require CORPOSET_INCLUDE . 'customizer/customizer_breadcrumb.php';

require_once CORPOSET_INCLUDE . 'class-corposet-bootstrap-navwalker.php';