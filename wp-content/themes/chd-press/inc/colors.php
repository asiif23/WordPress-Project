<?php
/**
 *	Function to provide custom colors to the theme
 */

function chdp_custom_colors() {

	$primary_color		=	get_theme_mod( 'chdp-primary-color', '#063444' );
	$secondary_color	=	get_theme_mod( 'chdp-sec-color', '#f4ac45' );
	$footer_links		=	get_theme_mod( 'chdp-footer-links-color', '#ffffff' );
	$footer_bg			=	get_theme_mod( 'chdp-footer-bg', '#191308' );

	$output = '';

	$output .=
	'ins,
	.nav-wrapper,
	#menu,
	.main-navigation ul#menu-desktop ul,
	#chdp-featured-news .slider-post-wrapper .posted-on a,
	#chdp-featured-news #chdp-featured-news-list-container .posted-on a,
	#chdp-featured-posts .chdp-featured-post-date,
	#colophon,
	[class^=chdp-search] form,
	#chdp-featured-cat .featured-cat-thumb h2
	{background-color: ' . esc_html( $primary_color ) . '}';


	$output .=
	'article .entry-meta a,
	article .blog-footer a,
	.nav-links a,
	#secondary .widget ul li a,
	.chdp-pagination .nav-links > a,
	.widget_block ul a, .widget_block ol a
	{color: ' . esc_html( $primary_color ) . ' !important}';

	$output .=
	'blockquote
	{border-color: ' . esc_html( $primary_color ) . '}';

	$output .=
	'button.top-menu-mobile
	{background-color: ' . esc_html( $secondary_color ) . ' !important}';

	$output .=
	'#footer-sidebar .widget-title
	{color: ' . esc_html( $secondary_color ) . ' !important}';

	$output .=
	'#footer-sidebar .widget a
	{color: ' . esc_html( $footer_links ) . '}';

	$output .=
	'#footer-sidebar
	{background-color: ' . esc_html( $footer_bg ) . '}';

	wp_add_inline_style( 'chdp-main-style', $output );

}
add_action( 'wp_enqueue_scripts', 'chdp_custom_colors' );
