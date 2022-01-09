<?php
/**
 *	Featured Category Featured Area
 */

function chdp_featured_category_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'chdp-featured-cat', array(
			'title'		=>	__('Featured Category', 'chd-press'),
			'priority'	=>	10,
			'panel'		=>	'chdp-featured-areas'
		)
	);

    $wp_customize->add_setting(
		'chdp-featured-cat-title', array(
			'default'		=>	'Featured Category',
			'sanitize_callback'	=>	'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'chdp-featured-cat-title', array(
			'label'		=>	__('Featured Category Title', 'chd-press'),
			'priority'	=>	5,
			'section'	=>	'chdp-featured-cat',
		)
	);

	$wp_customize->add_setting(
		'chdp-featured-cat', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint'
		)
	);

	$wp_customize->add_control(
		new chdp_WP_Customize_Category_Control(
			$wp_customize, 'chdp-featured-cat', array(
				'label'		=>	__('Category', 'chd-press'),
				'description'	=>	__('Category whose posts need to be featured', 'chd-press'),
				'priority'		=>	10,
				'section'		=>	'chdp-featured-cat'
			)
		)
	);

	$wp_customize->add_setting(
		'chdp-featured-cat-front-enable', array(
			'default'		=>	'',
			'sanitize_callback'	=>	'chdp_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'chdp-featured-cat-front-enable', array(
			'label'		=>	__('Enable on Front Page', 'chd-press'),
			'description'	=>	__('If Front Page is set as blog page, then this setting will override', 'chd-press'),
			'type'		=>	'checkbox',
			'priority'	=>	20,
			'section'	=>	'chdp-featured-cat',
		)
	);

	$wp_customize->add_setting(
		'chdp-featured-cat-blog-enable', array(
			'default'		=>	'',
			'sanitize_callback'	=>	'chdp_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'chdp-featured-cat-blog-enable', array(
			'label'		=>	__('Enable on Blog Page', 'chd-press'),
			'type'		=>	'checkbox',
			'priority'	=>	30,
			'section'	=>	'chdp-featured-cat',
		)
	);
}
add_action('customize_register', 'chdp_featured_category_customize_register');
