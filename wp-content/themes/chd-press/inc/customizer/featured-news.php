<?php
/**
 *
 *	Featured News Section - contains a Slider and a Tab with 3 categories
 *
 */
function chdp_featured_news_customize_register( $wp_customize ) {

	$wp_customize->add_section(
		'chdp_featured_news', array(
			'title'		=>	__('Featured Banner', 'chd-press'),
			'priority'	=>	5,
			'panel'		=>	'chdp-featured-areas'
		)
	);

	$wp_customize->add_setting(
		'chdp-featured-news-front-enable', array(
			'default'		=>	'',
			'sanitize_callback'	=>	'chdp_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'chdp-featured-news-front-enable', array(
			'label'		=>	__('Enable on Front Page', 'chd-press'),
			'description'	=>	__('If Front Page is set as blog page, then this setting will override', 'chd-press'),
			'type'		=>	'checkbox',
			'priority'	=>	10,
			'section'	=>	'chdp_featured_news',
		)
	);

	$wp_customize->add_setting(
		'chdp-featured-news-blog-enable', array(
			'default'		=>	'',
			'sanitize_callback'	=>	'chdp_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'chdp-featured-news-blog-enable', array(
			'label'		=>	__('Enable on Blog Page', 'chd-press'),
			'type'		=>	'checkbox',
			'priority'	=>	20,
			'section'	=>	'chdp_featured_news',
		)
	);

	$wp_customize->add_setting(
		'chdp-featured-news-slider-title', array(
			'default'		=>	'Featured',
			'sanitize_callback'	=>	'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'chdp-featured-news-slider-title', array(
			'label'		=>	__('Banner Slider Title', 'chd-press'),
			'priority'	=>	28,
			'section'	=>	'chdp_featured_news',
		)
	);

	$wp_customize->add_setting(
		'chdp-featured-news-slider', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint'
		)
	);

	$wp_customize->add_control(
		new chdp_WP_Customize_Category_Control(
			$wp_customize, 'chdp-featured-news-slider', array(
				'label'			=>	__('Category for Slider', 'chd-press'),
				'description'	=>	__('Category to be shown in Slider', 'chd-press'),
				'priority'		=>	30,
				'section'		=>	'chdp_featured_news'
			)
		)
	);

	$wp_customize->add_setting(
		'chdp-featured-news-slider-count', array(
			'default'		=>	3,
			'sanitize_callback'	=>	'absint'
		)
	);

	$wp_customize->add_control(
		'chdp-featured-news-slider-count', array(
			'label'		=>	__('Number of Posts to show in the Slider', 'chd-press'),
			'type'		=>	'number',
			'priority'	=>	31,
			'section'	=>	'chdp_featured_news',
		)
	);

	$wp_customize->add_control(
		new chdp_Separator_Control(
			$wp_customize, 'chdp_featured_news_separator', array(
				'settings'	=>	array(),
				'priority'	=>	35,
				'section'	=>	'chdp_featured_news'
			)
		)
	);

	$wp_customize->add_setting(
		'chdp-featured-news-list-title', array(
			'default'		=>	'Popular',
			'sanitize_callback'	=>	'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'chdp-featured-news-list-title', array(
			'label'		=>	__('Banner Thumbs Title', 'chd-press'),
			'priority'	=>	38,
			'section'	=>	'chdp_featured_news',
		)
	);

	$wp_customize->add_setting(
		'chdp-featured-news-list', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint'
		)
	);

	$wp_customize->add_control(
		new chdp_WP_Customize_Category_Control(
			$wp_customize, 'chdp-featured-news-list', array(
				'label'			=>	__('Category for the Grid Area', 'chd-press'),
				'description'	=>	__('Category to be shown in Grid Area', 'chd-press'),
				'priority'		=>	40,
				'section'		=>	'chdp_featured_news'
			)
		)
	);

	$wp_customize->add_control(
		new chdp_Separator_Control(
			$wp_customize, 'chdp_featured_news_separator_2', array(
				'settings'	=>	array(),
				'priority'	=>	45,
				'section'	=>	'chdp_featured_news'
			)
		)
	);

	$wp_customize->add_setting(
		'chdp-featured-news-car-title', array(
			'default'		=>	'Trending',
			'sanitize_callback'	=>	'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'chdp-featured-news-car-title', array(
			'label'		=>	__('Banner List Title', 'chd-press'),
			'priority'	=>	48,
			'section'	=>	'chdp_featured_news',
		)
	);

	$wp_customize->add_setting(
		'chdp-featured-news-carousel', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint'
		)
	);

	$wp_customize->add_control(
		new chdp_WP_Customize_Category_Control(
			$wp_customize, 'chdp-featured-news-carousel', array(
				'label'			=>	__('Category for the Carousel', 'chd-press'),
				'description'	=>	__('Category to be shown in Carousel', 'chd-press'),
				'priority'		=>	50,
				'section'		=>	'chdp_featured_news'
			)
		)
	);
}
add_action( 'customize_register', 'chdp_featured_news_customize_register' );
