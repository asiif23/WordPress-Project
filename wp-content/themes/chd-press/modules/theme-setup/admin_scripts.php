<?php
/**
 *	Scripts and Styles for Admin area and Customizer
 */

function chdp_customize_control_scripts() {

	wp_enqueue_script("chdp-customize-control-js", esc_url(get_template_directory_uri() . "/resources/js/customize_controls.js"), array(), CHDP_VERSION, true );

}
add_action("customize_controls_enqueue_scripts", "chdp_customize_control_scripts");


function chdp_custom_admin_styles() {

	global $pagenow;
    
	$allowed = array('post.php', 'post-new.php', 'customize.php');

	if (!in_array($pagenow, $allowed)) {
		return;
	}

    wp_enqueue_style( 'chdp-admin-css', esc_url( get_template_directory_uri() . '/resources/theme-styles/css/admin.css' ), array(), CHDP_VERSION );

}
add_action( 'admin_enqueue_scripts', 'chdp_custom_admin_styles' );
