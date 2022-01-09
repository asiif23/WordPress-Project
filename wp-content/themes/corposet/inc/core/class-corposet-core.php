<?php

class Corposet_Core {

    function __construct() {
        $this->define_hooks();
    }

    /**
     * Register all of the hooks related to the functionality
     * of the theme setup.
     *
     * @access   private
     */
    private function define_hooks() {

        $front_end = new Corposet_public();
        // add_action('init', array($front_end, 'wp_register'));
        //add_action('wp_enqueue_scripts',array($front_end,'corposet_scripts_function'));
        // add_action('wp_enqueue_scripts', array($front_end, 'enqueue_styles'));
        // add_action('wp_enqueue_scripts', array($front_end, 'enqueue_scripts'));
        add_action('after_setup_theme', array($front_end, 'setup_theme'));
        add_action('widgets_init', array($front_end, 'initialize_widgets'));
        add_filter('woocommerce_show_page_title', array($front_end, 'shop_title_hide'));

	$admin = new Corposet_Admin();
	/**
	 * @todo customizer
	 */
	add_action( 'customize_register', array( $admin, 'corposet_pro_info' ) );
	add_action( 'customize_preview_init', array($admin, 'corposet_preview_register') );
	add_action( 'customize_controls_print_scripts', array($admin, 'shapro_theme_customizer') );
    }

}