<?php
function chdp_customize_register_social( $wp_customize ) {
		// Social Icons
	$wp_customize->add_section('chdp_social_section', array(
			'title' 	=> esc_html__( 'Top Bar', 'chd-press' ),
			'priority' 	=> 70,
			'panel'		=> 'chdp_header'
	));

	$wp_customize->add_setting(
		'chdp_top_bar_enable', array(
			'default'	=>	'',
			'sanitize_callback'	=>	'chdp_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'chdp_top_bar_enable', array(
			'label'	=>	__('Enable Top Bar', 'chd-press'),
			'type'	=>	'checkbox',
			'section'	=>	'chdp_social_section',
			'priority'	=>	1
		)
	);

	$wp_customize->add_setting(
		'chdp_top_menu_enable', array(
			'default'	=>	'',
			'sanitize_callback'	=>	'chdp_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'chdp_top_menu_enable', array(
			'label'	=>	__('Enable Quick Links Menu', 'chd-press'),
			'type'	=>	'checkbox',
			'section'	=>	'chdp_social_section',
			'priority'	=>	2
		)
	);

	$wp_customize->add_setting(
		'chdp_social_enable', array(
			'default'	=>	'',
			'sanitize_callback'	=>	'chdp_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'chdp_social_enable', array(
			'label'	=>	__('Enable Social Icons', 'chd-press'),
			'type'	=>	'checkbox',
			'section'	=>	'chdp_social_section',
			'priority'	=>	5
		)
	);

	$social_networks = array( //Redefinied in Sanitization Function.
					'none' 			=> esc_html__('-','chd-press'),
					'facebook-f' 	=> esc_html__('Facebook', 'chd-press'),
					'twitter' 		=> esc_html__('Twitter', 'chd-press'),
					'instagram' 	=> esc_html__('Instagram', 'chd-press'),
					'linkedin'		=> esc_html__('LinkedIn', 'chd-press'),
					'rss' 			=> esc_html__('RSS Feeds', 'chd-press'),
					'pinterest-p' 	=> esc_html__('Pinterest', 'chd-press'),
					'vimeo' 		=> esc_html__('Vimeo', 'chd-press'),
					'youtube' 		=> esc_html__('Youtube', 'chd-press'),
					'flickr' 		=> esc_html__('Flickr', 'chd-press'),
				);


    $social_count = count($social_networks);

	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

		$wp_customize->add_setting(
			'chdp_social_'.$x, array(
				'sanitize_callback' => 'chdp_sanitize_social',
				'default' 			=> 'none',
				'sanitize_callback'	=>	'chdp_sanitize_social'
			));

		$wp_customize->add_control( 'chdp_social_' . $x, array(
					'settings' 	=> 'chdp_social_'.$x,
					'label' 	=> esc_html__('Icon ','chd-press') . $x,
					'section' 	=> 'chdp_social_section',
					'type' 		=> 'select',
					'choices' 	=> $social_networks,
		) );

		$wp_customize->add_setting(
			'chdp_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'chdp_social_url' . $x, array(
			'label' 		=> esc_html__('Icon ','chd-press') . $x . esc_html__(' Url','chd-press'),
					'settings' 		=> 'chdp_social_url' . $x,
					'section' 		=> 'chdp_social_section',
					'type' 			=> 'url',
					'choices' 		=> $social_networks,
		));

	endfor;

}
add_action( 'customize_register', 'chdp_customize_register_social' );


function chdp_sanitize_social( $input ) {
	$social_networks = array(
				'none' ,
				'facebook-f',
				'twitter',
				'instagram',
				'linkedin',
				'rss',
				'pinterest-p',
				'vimeo',
				'youtube',
				'flickr'
			);
	if ( in_array($input, $social_networks) )
		return $input;
	else
		return '';
}
