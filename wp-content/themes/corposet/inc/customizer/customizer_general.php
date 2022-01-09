<?php

function corposet_gen_customizer_setting($wp_customize) {

    /* General */
    $wp_customize->add_panel(
            'corposet_gen_setting',
            [
                'priority' => 30,
                'capability' => 'edit_theme_options',
                'title' => __('General', 'corposet'),
            ]
    );

    /* Blog Section */
    $wp_customize->add_section(
            'corposet_general_blog_Section',
            [
                'priority' => 1,
                'title' => __('Blogs', 'corposet'),
                'panel' => 'corposet_gen_setting',
            ]
    );

    /* Color Section */
    $wp_customize->add_section(
            'colors',
            [
                'priority' => 1,
                'title' => __('Colors', 'corposet'),
                'panel' => 'corposet_gen_setting',
            ]
    );


    $wp_customize->add_setting('widgetTags',
    [
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'corposet_switch_sanitization'
    ]
    );
    $wp_customize->add_control(new Corposet_Toggle_Switch_Custom_Control($wp_customize, 'widgetTags',
            [
        'label' => __('Widget Tags with theme style', 'corposet'),
        'section' => 'colors'
            ]
    ));

    $wp_customize->get_setting('background_color')->default = '#f0f0f1';

    $wp_customize->add_setting('corposet_excerpt_or_content',
            [
                'default' => esc_html__('excerpt', 'corposet'),
                'sanitize_callback' => 'corposet_sanitize_select'
            ]
    );

    $wp_customize->add_control('corposet_excerpt_or_content',
            [
                'label' => esc_html__('Choose Options', 'corposet'),
                'section' => 'corposet_general_blog_Section',
                'type' => 'radio',
                'choices' => [
                    'excerpt' => esc_html__('Excerpt', 'corposet'),
                    'content' => esc_html__('Content', 'corposet'),
                ]
            ]
    );

    $wp_customize->add_setting('corposet_characters_option_length', [
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'corposet_sanitize_select',
        'default' => 'custom',
    ]);

    $wp_customize->add_control('corposet_characters_option_length', [
        'type' => 'select',
        'section' => 'corposet_general_blog_Section', // Add a default or your own section
        'label' => __('Characters length', 'corposet'),
        'description' => __('Recommended to use custom lenght (35 character). This character length would be same for the Homepage template.', 'corposet'),
        'choices' => [
            'default' => __('Default', 'corposet'),
            'custom' => __('Custom', 'corposet'),
        ],
    ]);

    $wp_customize->add_setting('corposet_characters_length',
            [
                'default' => 35,
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'absint',
            ]
    );
    $wp_customize->add_control('corposet_characters_length',
            [
                'label' => esc_html__('Length', 'corposet'),
                'section' => 'corposet_general_blog_Section',
                'active_callback' => 'corposet_for_custom_len',
                'input_attrs' => ['min' => 10, 'max' => 250, 'step' => 1],
                'type' => 'number',
            ]
    );

//    date
    $wp_customize->add_setting('date_meta_display',
            [
                'default' => true,
                'sanitize_callback' => 'corposet_switch_sanitization'
            ]
    );
    $wp_customize->add_control(new Corposet_Toggle_Switch_Custom_Control($wp_customize, 'date_meta_display',
                    [
                'label' => __('Date', 'corposet'),
                'section' => 'corposet_general_blog_Section'
                    ]
    ));

//    author
    $wp_customize->add_setting('author_meta_display',
            [
                'default' => true,
                'sanitize_callback' => 'corposet_switch_sanitization'
            ]
    );
    $wp_customize->add_control(new Corposet_Toggle_Switch_Custom_Control($wp_customize, 'author_meta_display',
                    [
                'label' => __('Author', 'corposet'),
                'section' => 'corposet_general_blog_Section'
                    ]
    ));

//    category
    $wp_customize->add_setting('cat_meta_display',
            [
                'default' => true,
                'sanitize_callback' => 'corposet_switch_sanitization'
            ]
    );
    $wp_customize->add_control(new Corposet_Toggle_Switch_Custom_Control($wp_customize, 'cat_meta_display',
                    [
                'label' => __('Category', 'corposet'),
                'section' => 'corposet_general_blog_Section'
                    ]
    ));

    //Button: Read More
    $wp_customize->add_setting('corposet_readmore_button_txt', [
        'capability' => 'edit_theme_options',
        'default' => 'Read More',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('corposet_readmore_button_txt', [
        'type' => 'text',
        'section' => 'corposet_general_blog_Section', // Add a default or your own section
        'label' => __('Button Text', 'corposet'),
        'description' => __('Note: Button text will be same for the blog section of homepage template', 'corposet'),
    ]);

    if (!function_exists('corposet_for_custom_len')) {

        function corposet_for_custom_len($control) {
            if ($control->manager->get_setting('corposet_characters_option_length')->value() == 'custom') {
                return true;
            }
            return false;
        }

    }

    if (!function_exists('corposet_switch_sanitization')) {

        function corposet_switch_sanitization($input) {
            if (true === $input) {
                return 1;
            } else {
                return 0;
            }
        }

    }

    if (!function_exists('corposet_sanitize_select')) {

        function corposet_sanitize_select($input, $setting) {
            $input = sanitize_key($input);
            $choices = $setting->manager->get_control($setting->id)->choices;
            return ( array_key_exists($input, $choices) ? $input : $setting->default );
        }

    }
}

add_action('customize_register', 'corposet_gen_customizer_setting');
