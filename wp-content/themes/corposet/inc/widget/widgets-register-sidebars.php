<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corposet_widgets_init() {

    register_sidebar([
        'name' => esc_html__('Sidebar Area', 'corposet'),
        'id' => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget corposet-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ]);

    register_sidebar([
        'name' => esc_html__('Footer Area', 'corposet'),
        'id' => 'footer_widget_area',
        'before_widget' => '<div class="col-md-3"><div id="%1$s" class="widget corposet-widget %2$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h4 class="widget-title widget-title-1">',
        'after_title' => '</h4>',
    ]);

    register_sidebar([
        'name' => esc_html__('WooCommerce Sidebar Area', 'corposet'),
        'id' => 'woocommerce',
        'description' => esc_html__('Drap and drop WooCommerce widgets here', 'corposet'),
        'before_widget' => '<div id="%1$s" class="widget corposet-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ]);

    register_sidebar([
        'name' => esc_html__('Header Area', 'corposet'),
        'id' => 'header_callout_area',
        'description' => esc_html__('Drap and drop Header Callout widgets here', 'corposet'),
        'before_widget' => '<div class="col-md-3"><div id="%1$s" class="widget corposet-widget %2$s">',
        'after_widget' => '</div></div>',
    ]);
}

add_action('widgets_init', 'corposet_widgets_init');
