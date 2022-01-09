<?php
/**
 * Enqueue scripts and styles.
 */

function chdp_scripts() {

		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:400,700|Open+Sans:400,700&display=swap', array(), CHDP_VERSION );
	wp_enqueue_style( 'chdp-style', get_stylesheet_uri(), array(), CHDP_VERSION);
	wp_style_add_data( 'chdp-style', 'rtl', 'replace' );

	wp_enqueue_script('jquery-ui-tabs');

	wp_enqueue_style( 'chdp-main-style', esc_url(get_template_directory_uri() . '/resources/theme-styles/css/default.css'), array(), CHDP_VERSION);

	wp_enqueue_style( 'bootstrap', esc_url(get_template_directory_uri() . '/resources/bootstrap/bootstrap.css'), array(), CHDP_VERSION);

	wp_enqueue_style( 'owl', esc_url(get_template_directory_uri() . '/resources/owl/owl.carousel.css'), array(), CHDP_VERSION);

	wp_enqueue_style( 'mag-popup', esc_url(get_template_directory_uri() . '/resources/magnific-popup/magnific-popup.css'), array(), CHDP_VERSION);

	wp_enqueue_style( 'font-awesome', esc_url(get_template_directory_uri() . '/resources/fonts/font-awesome.css'), array(), CHDP_VERSION);

	wp_enqueue_script( 'big-slide', esc_url(get_template_directory_uri() . '/resources/js/bigSlide.js'), array('jquery'), CHDP_VERSION);

	wp_enqueue_script( 'chdp-custom-js', esc_url(get_template_directory_uri() . '/resources/js/custom.js'), array('jquery'), CHDP_VERSION);

	wp_enqueue_script( 'owl-js', esc_url(get_template_directory_uri() . '/resources/js/owl.carousel.js'), array('jquery'), CHDP_VERSION);

	wp_enqueue_script( 'mag-lightbox-js', esc_url(get_template_directory_uri() . '/resources/js/jquery.magnific-popup.min.js'), array('jquery'), CHDP_VERSION);

	wp_enqueue_script( 'chdp-navigation', esc_url(get_template_directory_uri() . '/resources/js/navigation.js'), array(), CHDP_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'chdp_scripts' );


/**
 *	Localize Customizer Data to make Theme Settings available in custom.js
 */
 function chdp_localize_settings() {

	 $data = array(
		 'stickyNav'	=>	esc_html( get_theme_mod('chdp_sticky_menu_enable', '') )
	 );

	 wp_localize_script( 'chdp-custom-js', 'chdp', $data );

 }
 add_action('wp_enqueue_scripts', 'chdp_localize_settings');
