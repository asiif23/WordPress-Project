<?php
/**
 *	Customizer Controls for Sidebar
**/

function chdp_sidebr_customize_register( $wp_customize ) {

	$wp_customize->add_panel(
		"chdp_layouts_panel", array(
			"title"			=>	esc_html__("Layouts", 'chd-press'),
			"description"	=>	esc_html__("Layout Settings for the Theme", 'chd-press'),
			"priority"		=>	20
		)
	);

	$wp_customize->add_section(
		"chdp_blog", array(
			"title"			=>	esc_html__("Blog", 'chd-press'),
			"description"	=>	esc_html__("Control the Layout Settings for the Blog Page", 'chd-press'),
			"priority"		=>	10,
			"panel"			=>	"chdp_layouts_panel"
		)
	);

	$wp_customize->add_setting(
		'chdp_blog_layout', array(
			'default'	=>	'default',
			'sanitize_callback'	=>	'chdp_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'chdp_blog_layout', array(
			'label'		=>	__('Blog Layout', 'chd-press'),
			'type'		=>	'select',
			'section'	=>	'chdp_blog',
			'priority'	=>	3,
			'choices'	=>	array(
				'default'		=>	__('Default', 'chd-press'),
				'col_2'		=>	__('2 Columns', 'chd-press'),
				'col_3'		=>	__('3 Columns', 'chd-press')
			)
		)
	);

	$wp_customize->add_setting(
		"chdp_blog_sidebar_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"chdp_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"chdp_blog_sidebar_enable", array(
			"label"		=>	esc_html__("Enable Sidebar for Blog Page.", 'chd-press'),
			"type"		=>	"checkbox",
			"section"	=>	"chdp_blog",
			"priority"	=>	5
		)
	);



	$wp_customize->add_setting(
     "chdp_blog_sidebar_layout", array(
       "default"  => "right",
       "sanitize_callback"  => "chdp_sanitize_radio",
     )
   );

   $wp_customize->add_control(
	   new chdp_Image_Radio_Control(
		   $wp_customize, "chdp_blog_sidebar_layout", array(
			   "label"		=>	esc_html__("Blog Layout", 'chd-press'),
			   "type"		=>	"chdp-image-radio",
			   "section"	=> "chdp_blog",
			   "settings"	=> "chdp_blog_sidebar_layout",
			   "priority"	=> 10,
			   "choices"	=>	array(
					"left"		=>	array(
						"name"	=>	esc_html__("Left Sidebar", 'chd-press'),
						"image"	=>	esc_url(get_template_directory_uri() . "/resources/images/left-sidebar.png")
					),
					"right"		=>	array(
						"name"	=>	esc_html__("Right Sidebar", 'chd-press'),
						"image"	=>	esc_url(get_template_directory_uri() . "/resources/images/right-sidebar.png")
					)
			   )
		   )
	   )
   );

    $sidebar_controls = array_filter( array(
        $wp_customize->get_control( 'chdp_blog_sidebar_layout' ),
    ) );
    foreach ( $sidebar_controls as $control ) {
        $control->active_callback = function( $control ) {
            $setting = $control->manager->get_setting( 'chdp_blog_sidebar_enable' );
            if (  $setting->value() ) {
                return true;
            } else {
                return false;
            }
        };
    }

    $wp_customize->add_setting(
	    'chdp-blog-excerpt-length', array(
		    'default'			=>	15,
		    'sanitize_callback'	=>	'absint'
	    )
    );

    $wp_customize->add_control(
	    'chdp-blog-excerpt-length', array(
		    'label'		=>	__('Excerpt Length', 'chd-press'),
		    'description'	=>	__('This works for blog, archives, and Search page', 'chd-press'),
		    'type'		=>	'number',
		    'section'	=>	'chdp_blog',
		    'priority'	=>	13
	    )
    );

	$wp_customize->add_section(
		"chdp_single", array(
			"title"			=>	esc_html__("Single", 'chd-press'),
			"description"	=>	esc_html__("Control the Layout Settings for the Single Post Page", 'chd-press'),
			"priority"		=>	20,
			"panel"			=>	"chdp_layouts_panel"
		)
	);

	$wp_customize->add_setting(
		"chdp_single_featured_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"chdp_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"chdp_single_featured_enable", array(
			"label"		=>	esc_html__("Enable Featured Image", 'chd-press'),
			"type"		=>	"checkbox",
			"section"	=>	"chdp_single",
			"priority"	=>	3
		)
	);

	$wp_customize->add_setting(
		"chdp_single_sidebar_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"chdp_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"chdp_single_sidebar_enable", array(
			"label"		=>	esc_html__("Enable Sidebar for Posts", 'chd-press'),
			"type"		=>	"checkbox",
			"section"	=>	"chdp_single",
			"priority"	=>	5
		)
	);

	$wp_customize->add_setting(
     "chdp_single_sidebar_layout", array(
       "default"  => "right",
       "sanitize_callback"  => "chdp_sanitize_radio",
     )
   );

   $wp_customize->add_control(
	   new chdp_Image_Radio_Control(
		   $wp_customize, "chdp_single_sidebar_layout", array(
			   "label"		=>	esc_html__("Single Post Layout", 'chd-press'),
			   "type"		=>	"chdp-image-radio",
			   "section"	=> "chdp_single",
			   "Settings"	=> "chdp_single_sidebar_layout",
			   "priority"	=> 10,
			   "choices"	=>	array(
					"left"		=>	array(
						"name"	=>	esc_html__("Left Sidebar", 'chd-press'),
						"image"	=>	esc_url(get_template_directory_uri() . "/resources/images/left-sidebar.png")
					),
					"right"		=>	array(
						"name"	=>	esc_html__("Right Sidebar", 'chd-press'),
						"image"	=>	esc_url(get_template_directory_uri() . "/resources/images/right-sidebar.png")
					)
			   )
		   )
	   )
   );

   $sidebar_controls = array_filter( array(
        $wp_customize->get_control( 'chdp_single_sidebar_layout' ),
    ) );
    foreach ( $sidebar_controls as $control ) {
        $control->active_callback = function( $control ) {
            $setting = $control->manager->get_setting( 'chdp_single_sidebar_enable' );
            if (  $setting->value() ) {
                return true;
            } else {
                return false;
            }
        };
    }

    $wp_customize->add_setting(
		"chdp_single_citation_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"chdp_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"chdp_single_citation_enable", array(
			"label"		=>	esc_html__("Enable Image Citations in Posts", 'chd-press'),
			"type"		=>	"checkbox",
			"section"	=>	"chdp_single",
			"priority"	=>	15
		)
	);

   $wp_customize->add_setting(
		"chdp_single_navigation_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"chdp_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"chdp_single_navigation_enable", array(
			"label"		=>	esc_html__("Enable Post Navigation", 'chd-press'),
			"type"		=>	"checkbox",
			"section"	=>	"chdp_single",
			"priority"	=>	15
		)
	);

	$wp_customize->add_setting(
		"chdp_single_related_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"chdp_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"chdp_single_related_enable", array(
			"label"		=>	esc_html__("Enable Related Posts Section", 'chd-press'),
			"type"		=>	"checkbox",
			"section"	=>	"chdp_single",
			"priority"	=>	20
		)
	);

	$wp_customize->add_setting(
		"chdp_single_author_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"chdp_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"chdp_single_author_enable", array(
			"label"		=>	esc_html__("Enable Author Box", 'chd-press'),
			"type"		=>	"checkbox",
			"section"	=>	"chdp_single",
			"priority"	=>	25
		)
	);

	$wp_customize->add_section(
		"chdp_search", array(
			"title"			=>	esc_html__("Search", 'chd-press'),
			"description"	=>	esc_html__("Layout Settings for the Search Page", 'chd-press'),
			"priority"		=>	30,
			"panel"			=>	"chdp_layouts_panel"
		)
	);

	$wp_customize->add_setting(
		'chdp_search_layout', array(
			'default'			=>	'default',
			'sanitize_callback'	=>	'chdp_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'chdp_search_layout', array(
			'label'		=>	__('Search Page Layout', 'chd-press'),
			'type'		=>	'select',
			'section'	=>	'chdp_search',
			'priority'	=>	3,
			'choices'	=>	array(
				'default'		=>	__('Default', 'chd-press'),
				'col_2'		=>	__('2 Columns', 'chd-press'),
				'col_3'		=>	__('3 Columns', 'chd-press')
			)
		)
	);

	$wp_customize->add_setting(
		"chdp_search_sidebar_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"chdp_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"chdp_search_sidebar_enable", array(
			"label"		=>	esc_html__("Enable Sidebar for Search Page", 'chd-press'),
			"type"		=>	"checkbox",
			"section"	=>	"chdp_search",
			"priority"	=>	5
		)
	);

	$wp_customize->add_setting(
     "chdp_search_sidebar_layout", array(
       "default"  => "right",
       "sanitize_callback"  => "chdp_sanitize_radio",
     )
   );

   $wp_customize->add_control(
	   new chdp_Image_Radio_Control(
		   $wp_customize, "chdp_search_sidebar_layout", array(
			   "label"		=>	esc_html__("Arc Page Layout", 'chd-press'),
			   "type"		=>	"chdp-image-radio",
			   "section"	=> "chdp_search",
			   "Settings"	=> "chdp_search_sidebar_layout",
			   "priority"	=> 10,
			   "choices"	=>	array(
					"left"		=>	array(
						"name"	=>	esc_html__("Left Sidebar", 'chd-press'),
						"image"	=>	esc_url(get_template_directory_uri() . "/resources/images/left-sidebar.png")
					),
					"right"		=>	array(
						"name"	=>	esc_html__("Right Sidebar", 'chd-press'),
						"image"	=>	esc_url(get_template_directory_uri() . "/resources/images/right-sidebar.png")
					)
			   )
		   )
	   )
   );

   $sidebar_controls = array_filter( array(
        $wp_customize->get_control( 'chdp_search_sidebar_layout' ),
    ) );
    foreach ( $sidebar_controls as $control ) {
        $control->active_callback = function( $control ) {
            $setting = $control->manager->get_setting( 'chdp_search_sidebar_enable' );
            if (  $setting->value() ) {
                return true;
            } else {
                return false;
            }
        };
    }

   $wp_customize->add_section(
		"chdp_archive", array(
			"title"			=>	esc_html__("Archive", 'chd-press'),
			"description"	=>	esc_html__("Layout Settings for the Archives", 'chd-press'),
			"priority"		=>	40,
			"panel"			=>	"chdp_layouts_panel"
		)
	);

	$wp_customize->add_setting(
		'chdp_archive_layout', array(
			'default'	=>	'default',
			'sanitize_callback'	=>	'chdp_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'chdp_archive_layout', array(
			'label'		=>	__('Blog Layout', 'chd-press'),
			'type'		=>	'select',
			'section'	=>	'chdp_archive',
			'priority'	=>	3,
			'choices'	=>	array(
				'default'		=>	__('Default', 'chd-press'),
				'col_2'		=>	__('2 Columns', 'chd-press'),
				'col_3'		=>	__('3 Columns', 'chd-press')
			)
		)
	);

	$wp_customize->add_setting(
		"chdp_archive_sidebar_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"chdp_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"chdp_archive_sidebar_enable", array(
			"label"		=>	esc_html__("Enable Sidebar for Archives", 'chd-press'),
			"type"		=>	"checkbox",
			"section"	=>	"chdp_archive",
			"priority"	=>	5
		)
	);

	$wp_customize->add_setting(
     "chdp_archive_sidebar_layout", array(
       "default"  => "right",
       "sanitize_callback"  => "chdp_sanitize_radio",
     )
   );

   $wp_customize->add_control(
	   new chdp_Image_Radio_Control(
		   $wp_customize, "chdp_archive_sidebar_layout", array(
			   "label"		=>	esc_html__("Archives Layout", 'chd-press'),
			   "type"		=>	"chdp-image-radio",
			   "section"	=> "chdp_archive",
			   "Settings"	=> "chdp_archive_sidebar_layout",
			   "priority"	=> 10,
			   "choices"	=>	array(
					"left"		=>	array(
						"name"	=>	esc_html__("Left Sidebar", 'chd-press'),
						"image"	=>	esc_url(get_template_directory_uri() . "/resources/images/left-sidebar.png")
					),
					"right"		=>	array(
						"name"	=>	esc_html__("Right Sidebar", 'chd-press'),
						"image"	=>	esc_url(get_template_directory_uri() . "/resources/images/right-sidebar.png")
					)
			   )
		   )
	   )
   );

   $sidebar_controls = array_filter( array(
        $wp_customize->get_control( 'chdp_search_sidebar_layout' ),
    ) );
    foreach ( $sidebar_controls as $control ) {
        $control->active_callback = function( $control ) {
            $setting = $control->manager->get_setting( 'chdp_search_sidebar_enable' );
            if (  $setting->value() ) {
                return true;
            } else {
                return false;
            }
        };
    }
}
add_action("customize_register", "chdp_sidebr_customize_register");
