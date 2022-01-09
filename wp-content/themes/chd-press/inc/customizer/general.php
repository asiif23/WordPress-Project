<?php
/**
 *	Customizer Controls for General Settings for the theme
 */
 
function chdp_general_customize_register( $wp_customize ) {
	
	$wp_customize->add_section(
		"chdp_general_options", array(
			"title"			=>	esc_html__("General", "chd-press"),
			"description"	=>	esc_html__("General Settings for the Theme", "chd-press"),
			"priority"		=>	5
		)
	);
	
	$wp_customize->add_setting(
        'chdp_sidebar_width', array(
            'default'    =>  25,
            'sanitize_callback'  =>  'absint'
        )
    );

    $wp_customize->add_control(
        new chdp_Range_Value_Control(
            $wp_customize, 'chdp_sidebar_width', array(
	            'label'         =>	esc_html__( 'Sidebar Width', 'chd-press' ),
            	'type'          => 'chdp-range-value',
            	'section'       => 'chdp_general_options',
            	'settings'      => 'chdp_sidebar_width',
                'priority'		=>  5,
            	'input_attrs'   => array(
            		'min'            => 25,
            		'max'            => 40,
            		'step'           => 1,
            		'suffix'         => '%', //optional suffix
				),
            )
        )
    );
    
    $wp_customize->add_setting(
	    'chdp_site_layout', array(
		    'default'			=>	'box',
		    'sanitize_callback'	=>	'chdp_sanitize_select'
	    )
    );
    
    $wp_customize->add_control(
	    'chdp_site_layout', array(
		    'label'		=>	__('Site Layout', 'chd-press'),
		    'type'		=>	'select',
		    'section'	=>	'chdp_general_options',
		    'priority'	=>	10,
		    'choices'	=>	array(
			    'box'	=>	__('Box Layout', 'chd-press'),
			    'full'	=>	__('Full Width Layout', 'chd-press')
		    )
	    )
    );
}
add_action("customize_register", "chdp_general_customize_register");