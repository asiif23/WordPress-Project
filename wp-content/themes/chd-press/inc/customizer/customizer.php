<?php
/**
 * CHD Press Theme Customizer
 *
 * @package CHD Press
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function chdp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//$wp_customize->register_control_type( '\WPTRT\Customize\Control\ColorAlpha' );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'chdp_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'chdp_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'chdp_customize_register' );

/**
 *	Add Controls for different Sections
 */
require_once get_template_directory() . '/inc/customizer/sanitization.php';
require_once get_template_directory() . '/inc/customizer/custom_controls.php';
require_once get_template_directory() . '/inc/customizer/general.php';
require_once get_template_directory() . '/inc/customizer/header.php';
require_once get_template_directory() . '/inc/customizer/layouts.php';
require_once get_template_directory() . '/inc/customizer/footer.php';
require_once get_template_directory() . '/inc/customizer/colors.php';
require_once get_template_directory() . '/inc/customizer/featured-areas.php';
require_once get_template_directory() . '/inc/customizer/featured-category.php';
require_once get_template_directory() . '/inc/customizer/featured-news.php';
require_once get_template_directory() . '/inc/customizer/featured-posts.php';
require_once get_template_directory() . '/inc/customizer/top-bar.php';

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function chdp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function chdp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function chdp_customize_preview_js() {
	wp_enqueue_script( 'chdp-customizer', esc_url(get_template_directory_uri() . '/resources/js/customizer.js'), array( 'customize-preview' ), CHDP_VERSION, true );
}
add_action( 'customize_preview_init', 'chdp_customize_preview_js' );
