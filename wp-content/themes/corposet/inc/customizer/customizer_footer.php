<?php
function corposet_footer_customizer_setting( $wp_customize ){
	$wp_customize->add_panel(
		'corposet_footer_setting',
		array(
			// 'priority'   => 40,
			'capability' => 'edit_theme_options',
			'title'      => __( 'Footer', 'corposet' ),
		)
	);

	$wp_customize->add_section(
		'corposet_footer_bar',
		array(
			'title' => __( 'Footer Bar', 'corposet' ),
			'panel' => 'corposet_footer_setting',
		// 'priority' => 2,
		)
	);		

	$wp_customize->add_setting(
		'copyright_display',
		array(
			'default'   => true,
			'transport' => 'refresh',
			'sanitize_callback' => 'corposet_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Corposet_Toggle_Switch_Custom_Control(
			$wp_customize,
			'copyright_display',
			array(
				'label'   => __( 'Display', 'corposet' ),
				'section' => 'corposet_footer_bar',
			)
		)
	);

	$wp_customize->add_setting(
		'copyright_text',
		array(
			/* translators: 1: theme name, 2: theme url. */
			'default'           => sprintf( esc_html__( 'Theme: %1$s by %2$s', 'corposet' ), 'Corposet', '<a href="https://unibirdtech.com/">Unibird Tech</a>' ),
			'transport'         => 'refresh',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		'copyright_text',
		array(
			'label'   => __( 'Copyright Text', 'corposet' ),
			'section' => 'corposet_footer_bar',
			'type'    => 'textarea',
		)
	);
		/**
		 * copyright_text
		 */
		$wp_customize->selective_refresh->add_partial(
			'copyright_text',
			array(
				'selector'        => 'footer div.col-md-6.copyright-text',
				'settings'        => 'copyright_text',
				'render_callback' => function () {
					return get_theme_mod( 'copyright_text' );
				},
			)
		);
		/**
		 * hire_btn_text
		 */
		$wp_customize->selective_refresh->add_partial(
			'hire_btn_text',
			array(
				'selector'        => 'header a.btn.btn-default.quote_btn',
				'settings'        => 'hire_btn_text',
				'render_callback' => function () {
					return get_theme_mod( 'hire_btn_text' );
				},
			)
		);
		/**
		 * topbar_search_icon_display
		 */
		$wp_customize->selective_refresh->add_partial(
			'topbar_search_icon_display',
			array(
				'selector'        => 'header a.\#',
				'settings'        => 'topbar_search_icon_display',
				'render_callback' => function () {
					return get_theme_mod( 'topbar_search_icon_display' );
				},
			)
		);


    
		
	}
add_action( 'customize_register', 'corposet_footer_customizer_setting' );