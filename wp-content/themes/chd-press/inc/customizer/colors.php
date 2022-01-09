<?php
/**
 *	CustomColors Control for Theme
 */

function chdp_colors_customize_register( $wp_customize ) {

	$wp_customize->add_setting(
		'chdp-primary-color', array(
			'default'	=>	'#063444',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'chdp-primary-color', array(
				'label'		=>	esc_html__('Primary Color', 'chd-press'),
				'section'	=>	'colors',
				'settings'	=>	'chdp-primary-color',
				'priority'	=>	30
			)
		)
	);

	$wp_customize->add_setting(
		'chdp-sec-color', array(
			'default'	=>	'#F4AC45',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'chdp-sec-color', array(
				'label'		=>	esc_html__('Secondary Color', 'chd-press'),
				'section'	=>	'colors',
				'settings'	=>	'chdp-sec-color',
				'priority'	=>	40
			)
		)
	);

	$wp_customize->add_setting(
		'chdp-footer-links-color', array(
			'default'	=>	'#fff',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'chdp-footer-links-color', array(
				'label'		=>	esc_html__('Footer Links Color', 'chd-press'),
				'section'	=>	'colors',
				'settings'	=>	'chdp-footer-links-color',
				'priority'	=>	45
			)
		)
	);

	$wp_customize->add_setting(
		'chdp-footer-bg', array(
			'default'	=>	'#191308',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'chdp-footer-bg', array(
				'label'		=>	esc_html__(' Footer Background', 'chd-press'),
				'section'	=>	'colors',
				'settings'	=>	'chdp-footer-bg',
				'priority'	=>	50
			)
		)
	);
}
add_action( 'customize_register', 'chdp_colors_customize_register' );
