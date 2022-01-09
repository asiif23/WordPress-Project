<?php
/**
 * Controls for the Header Section
 */

function chdp_header_customize_register( $wp_customize ) {

	$wp_customize->get_section("title_tagline")->panel	=	"chdp_header";
	$wp_customize->get_section("header_image")->panel	=	"chdp_header";
	//$wp_customize->get_section("widgets-sidebar-header")->panel = "chdp_header";

	$wp_customize->add_panel(
		"chdp_header", array(
			"title"	=>	esc_html__("Header", 'chd-press'),
			"priority"	=>	10
		)
	);

	$wp_customize->add_section(
		"chdp_header_options", array(
			"title"		=>	esc_html__("Header Options", 'chd-press'),
			"panel"		=>	"chdp_header",
			"priority"	=>	80
		)
	);

	$wp_customize->add_setting(
		"chdp_header_style", array(
			"default"			=>	'style_1',
			"sanitize_callback"	=>	"chdp_sanitize_radio"
		)
	);

	$wp_customize->add_control(
		"chdp_header_style", array(
			"label"		=>	esc_html__("Header Styles", 'chd-press'),
			"type"		=>	"radio",
			"section"	=>	"chdp_header_options",
			"priority"	=>	5,
			"choices"	=>	array(
				'style_1'	=>	esc_html__("Style 1", 'chd-press'),
				'style_2'	=>	esc_html__("Style 2", 'chd-press'),
				'style_3'	=>	esc_html__("Style 3", 'chd-press')
			)
		)
	);

	$wp_customize->add_setting(
		'chdp-header-overlay-color' , array(
			'default'           => 'rgba(0,0,0,0.3)', // Use any HEX or RGBA value.
			'transport'         => 'refresh',
			'sanitize_callback' => 'chdp_sanitize_coloralpha'
		)
	);

	$wp_customize->add_control(
		new ColorAlpha(
			$wp_customize, 'chdp-header-overlay-color', [
				'label'      => __( 'Header Overlay Color', 'chd-press' ),
				'section'    => 'chdp_header_options',
				'settings'   => 'chdp-header-overlay-color',
				'priority'	 =>	60
			]
		)
	);

	$wp_customize->add_setting(
		'chdp_sticky_menu_enable', array(
			'default'	=>	'',
			'sanitize_callback'	=> 'chdp_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'chdp_sticky_menu_enable', array(
			'label'		=>	__('Enable Sticky Navigation', 'chd-press'),
			'type'		=>	'checkbox',
			'section'	=>	'chdp_header_options',
			'priority'	=>	40
		)
	);

	$wp_customize->add_setting(
		'chdp_header_ad_widget', array(
			'default'	=>	'',
			'sanitize_callback'	=>	'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		new chdp_Custom_Button_Control (
			$wp_customize, 'chdp_header_ad_widget', array(
				'label'		=>	__('Edit Ad Wudget', 'chd-press'),
				'type'		=>	'chdp-link',
				'section'	=>	'chdp_header_options',
				'settings'	=>	'chdp_header_ad_widget',
				'priority'	=>	50,
			)
		)
	);

	$header_control = $wp_customize->get_control( 'chdp_header_ad_widget' );

    $header_control->active_callback = function( $control ) {
        $setting = $control->manager->get_setting( 'chdp_header_style' );
        if (  $setting->value() == 'style_2' ) {
            return true;
        } else {
            return false;
        }
    };
}

add_action("customize_register", "chdp_header_customize_register");
