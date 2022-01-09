<?php

function corposet_customizer_breadcrumb($wp_customize) {
    $wp_customize->add_section(
            'corposet_breadcrumb_setting',
            array(
                'title' => esc_html__('Archive page title', 'corposet'),
                'description' => esc_html__('Here you can set the prefix to the breadcrumb title for all Archive pages or can leave empty', 'corposet'),
            )
    );

    $wp_customize->add_setting(
            'corposet_archive_prefix',
            array(
                'default' => esc_html__('Archive:', 'corposet'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control('corposet_archive_prefix', array(
        'label' => esc_html__('Archive', 'corposet'),
        'section' => 'corposet_breadcrumb_setting',
        'type' => 'text'
    ));

    $wp_customize->add_setting(
            'corposet_category_prefix',
            array(
                'default' => esc_html__('Category:', 'corposet'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control('corposet_category_prefix', array(
        'label' => esc_html__('Category', 'corposet'),
        'section' => 'corposet_breadcrumb_setting',
        'type' => 'text'
    ));

    $wp_customize->add_setting(
            'corposet_tag_prefix',
            array(
                'default' => esc_html__('Tag:', 'corposet'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control('corposet_tag_prefix', array(
        'label' => esc_html__('Tag', 'corposet'),
        'section' => 'corposet_breadcrumb_setting',
        'type' => 'text'
    ));

    $wp_customize->add_setting(
            'corposet_author_prefix',
            array(
                'default' => esc_html__('All posts by:', 'corposet'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control('corposet_author_prefix', array(
        'label' => esc_html__('Author', 'corposet'),
        'section' => 'corposet_breadcrumb_setting',
        'type' => 'text'
    ));

    $wp_customize->add_setting(
            'corposet_search_prefix',
            array(
                'default' => esc_html__('Search results for:', 'corposet'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control('corposet_search_prefix', array(
        'label' => esc_html__('Search', 'corposet'),
        'section' => 'corposet_breadcrumb_setting',
        'type' => 'text'
    ));

    $wp_customize->add_setting(
            'corposet_404_prefix',
            array(
                'default' => esc_html__('404: Page not found', 'corposet'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control('corposet_404_prefix', array(
        'label' => esc_html__('404', 'corposet'),
        'section' => 'corposet_breadcrumb_setting',
        'type' => 'text'
    ));

    $wp_customize->add_setting(
            'corposet_shop_prefix',
            array(
                'default' => esc_html__('Shop', 'corposet'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control('corposet_shop_prefix', array(
        'label' => esc_html__('Shop', 'corposet'),
        'section' => 'corposet_breadcrumb_setting',
        'type' => 'text'
    ));
}

add_action('customize_register', 'corposet_customizer_breadcrumb');
