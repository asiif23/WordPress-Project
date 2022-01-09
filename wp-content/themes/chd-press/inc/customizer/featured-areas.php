<?php
/**
 *	Featured Areas Panel
 */
function chdp_featured_areas_customize_register( $wp_customize ) {
	
	$wp_customize->add_panel(
		'chdp-featured-areas', array(
			'title'		=>	__('Featured Areas', 'chd-press'),
			'priority'	=>	30
		)
	);
	
}
add_action('customize_register', 'chdp_featured_areas_customize_register');