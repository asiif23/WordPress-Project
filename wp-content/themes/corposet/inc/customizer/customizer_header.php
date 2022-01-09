<?php
function corposet_header_customizer_setting( $wp_customize ){
		 $wp_customize->add_panel(
		 'corposet_header_setting',
			array(
				'priority'      => 40,
				'capability' =>'edit_theme_options',
				'title' => __('Header','corposet'),
				)
		);

	/*--- Title Tagline ----*/ 
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','corposet'),
			'panel'  		=> 'corposet_header_setting',
		)
    );


    $wp_customize->add_section(
			'top_header',
			array(
				// 'priority' => 12,
				'title'    => __( 'Top Header', 'corposet' ),
				'panel'    => 'corposet_header_setting',
			)
		);

		$wp_customize->add_setting(
			'hire_us_btn_enable_disable',
			array(
				'default'    => '1',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'corposet_switch_sanitization'
			)
		);

		$wp_customize->add_control(
			new Corposet_Toggle_Switch_Custom_Control(
				$wp_customize,
				'hire_us_btn_enable_disable',
				array(
					'label'   => __( 'Display Button', 'corposet' ),
					'priority' => 14,
					'section' => 'top_header',
				)
			)
		);

		$wp_customize->add_setting(
			'hire_btn_text',
			array(
				'sanitize_callback' => 'sanitize_textarea_field'
			)
		);
		$wp_customize->add_control(
			'hire_btn_text',
			array(
				'label'       => __( 'Button Text', 'corposet' ),
				'section'     => 'top_header',
				'type'        => 'text',
				'priority' => 15,
				'input_attrs' => array(
					'class' => 'my-custom-class',
					'style' => 'border: 1px solid rebeccapurple',
				),
			)
		);

		$wp_customize->add_setting(
			'hire_btn_link',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '#',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			'hire_btn_link',
			array(
				'label'   => __( 'Link', 'corposet' ),
				'priority' => 15,
				'section' => 'top_header',
				'type'    => 'text',
			)
		);

		/**
		 * Search
		 */
		$wp_customize->add_setting(
			'topbar_search_icon_display',
			array(
				'transport'         => 'refresh',
				'default'           => 1,
				'sanitize_callback' => 'corposet_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Corposet_Toggle_Switch_Custom_Control(
				$wp_customize,
				'topbar_search_icon_display',
				array(
					'priority' => 12,
					'label'   => __( 'Display search icon', 'corposet' ),
					'section' => 'top_header',
				)
			)
		);
		/**
		 * Scrollbar
		 */
		$wp_customize->add_section(
			'corposet_scrollbar_btn',
			array(
				'title' => __( 'Scrollbar Button', 'corposet' ),
				'panel' => 'corposet_gen_setting',
			// 'priority' => 0,
			)
		);
		$wp_customize->add_setting(
			'scrollbar_display',
			array(
				'default'   => 1,
				'transport' => 'refresh',
				'sanitize_callback' => 'corposet_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Corposet_Toggle_Switch_Custom_Control(
				$wp_customize,
				'scrollbar_display',
				array(
					'priority' => 1,
					'label'    => __( 'Display', 'corposet' ),
					'section'  => 'corposet_scrollbar_btn',
				)
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'scrollbar_display',
			array(
				'selector'        => 'body > a.scrollup',
				'settings'        => 'scrollbar_display',
				'render_callback' => function () {
					return get_theme_mod( 'scrollbar_display' );
				},
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => 'header > div.nav-wapper > nav > div > div.site-branding-text > h1',
				'settings'        => 'blogname',
				'render_callback' => function () {
					return get_theme_mod( 'blogname' );
				},
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => 'header > div.nav-wapper > nav > div > div.site-branding-text > p',
				'settings'        => 'blogdescription',
				'render_callback' => function () {
					return get_theme_mod( 'blogdescription' );
				},
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'custom_logo',
			array(
				'selector'        => 'header > div.nav-wapper > nav > div > a',
				'settings'        => 'custom_logo',
				'render_callback' => function () {
					return get_theme_mod( 'custom_logo' );
				},
			)
		);
		


		
	}
add_action( 'customize_register', 'corposet_header_customizer_setting' );