<?php
/**
 *  Customizer Section for Footer
 */

 function chdp_customize_register_footer( $wp_customize ) {

    $wp_customize->add_section(
        'chdp_footer_section', array(
            'title'    => esc_html__('Footer', 'chd-press'),
            'priority' => 30,
        )
    );

    $wp_customize->add_setting(
        'chdp_footer_cols', array(
            'default'  => 4,
            'sanitize_callback'    => 'absint'
        )
    );
     
    $wp_customize->add_control(
	    new chdp_Image_Radio_Control(
		    $wp_customize, 'chdp_footer_cols', array(
			    'label'    =>  esc_html__('Select the Footer Layout', 'chd-press'),
	            'section'  =>  'chdp_footer_section',
	            'priority' => 5,
	            'type'	   => 'image-radio',
	            'choices'	=>	array(
		            '1'	=>	array(
			            'name'	=>	esc_html__('1 Column', 'chd-press'),
			            'image'	=>  esc_url(get_template_directory_uri() . '/resources/images/1-column.png'),
		            ),
		            '2'	=>	array(
			            'name'	=>	esc_html__('2 Columns', 'chd-press'),
			            'image'	=>  esc_url(get_template_directory_uri() . '/resources/images/2-columns.png'),
		            ),
		            '3'	=>	array(
			            'name'	=>	esc_html__('3 Columns', 'chd-press'),
			            'image'	=>  esc_url(get_template_directory_uri() . '/resources/images/3-columns.png'),
		            ),
		            '4'	=>	array(
			            'name'	=>	esc_html__('4 Columns', 'chd-press'),
			            'image'	=> esc_url(get_template_directory_uri() . '/resources/images/4-columns.png'),
		            ),
	            )
	        )
	    )
    );

     $wp_customize->add_setting(
         'chdp_footer_text', array(
             'default'  => '',
             'sanitize_callback'    =>  'sanitize_text_field'
         )
     );

     $wp_customize->add_control(
         'chdp_footer_text', array(
             'label'    =>  esc_html__('Custom Footer Text', 'chd-press'),
             'description'  =>  esc_html__('Will show Default Text if empty', 'chd-press'),
             'priority' =>  10,
             'type'     =>  'text',
             'section'  => 'chdp_footer_section'
         )
     );
 }
 add_action('customize_register', 'chdp_customize_register_footer');