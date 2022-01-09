<?php
/**
 *  File for Custom CSS
 */

function chdp_custom_css() {

    $primary_width           = 100 - get_theme_mod('chdp_sidebar_width', '25') . '%';
    $secondary_width         = get_theme_mod('chdp_sidebar_width', '25') . '%';
    $header_overlay_color    = get_theme_mod('chdp-header-overlay-color');

    $css = "";

    $css .= "@media screen and (min-width: 992px) {";

    if (is_home() && is_active_sidebar('sidebar-1') && get_theme_mod('chdp_blog_sidebar_enable', 1) !== '' ) {
        $css .= 'body.blog #primary  {width: ' . esc_html( $primary_width ) . ';}';
        $css .= 'body.blog #secondary {width: ' . esc_html( $secondary_width ) . ';}';
    }

    if (is_single() && is_active_sidebar('sidebar-single') && get_theme_mod('chdp_single_sidebar_enable', 1) !== '' ) {
        $css .= 'body.single-post #primary {width: ' . esc_html( $primary_width ) . ';}';
        $css .= 'body.single-post #secondary {width: ' . esc_html( $secondary_width ) . ';}';
    }

    if (is_search() && is_active_sidebar('sidebar-1') && get_theme_mod('chdp_search_sidebar_enable', 1) !== '' ) {
        $css .= 'body.search #primary {width: ' . esc_html( $primary_width ) . ';}';
        $css .= 'body.search #secondary {width: ' . esc_html( $secondary_width ) . ';}';
    }

    if (is_archive() && is_active_sidebar('sidebar-1') && get_theme_mod('chdp_archive_sidebar_enable', 1) !== '' ) {
        $css .= 'body.archive #primary {width: ' . esc_html( $primary_width ) . ';}';
        $css .= 'body.archive #secondary {width: ' . esc_html( $secondary_width ) . ';}';
    }

    if (!is_front_page() && is_page() && is_active_sidebar('sidebar-page') && get_post_meta(get_the_ID(), 'enable-sidebar', true) !== '' ) {
        $css .= 'body.page-template-default #primary {width: ' . esc_html( $primary_width ) . ';}';
        $css .= 'body.page-template-default #secondary {width: ' . esc_html( $secondary_width ) . ';}';
    }

	$css .= "}";

	if ( is_user_logged_in() ) {
	    $css .= '#panel-top-bar {margin-top: 46px}';
    }

    $css .= '#header-image:before {background-color: ' . esc_html( $header_overlay_color ) . '}';

     wp_add_inline_style( 'chdp-main-style', wp_strip_all_tags($css) );

 }
 add_action('wp_enqueue_scripts', 'chdp_custom_css');
