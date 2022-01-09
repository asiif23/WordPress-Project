<?php
/**
 *  Customizer File for all the sanitization functions
 */


function chdp_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}


function chdp_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}


function chdp_sanitize_float( $number, $setting ) {

    $atts = $setting->manager->get_control( $setting->id )->input_attrs;
    $min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
    $max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
    $step = ( isset( $atts['step'] ) ? $atts['step'] : 0.1 );
    $number = floor($number / $atts['step']) * $atts['step'];
    return ( $min <= $number && $number <= $max ) ? $number : $setting->default;
}


function chdp_sanitize_select( $input, $setting ) {

    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible select options
    $choices = $setting->manager->get_control( $setting->id )->choices;

    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}


function chdp_sanitize_radio( $input, $setting ) {

	// Ensure input is a slug
	$input = sanitize_key( $input );

	// Get list of choices from the control
	// associated with the setting
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it;
	// otherwise, return the default
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


 function chdp_sanitize_link( $input ) {
	 $input = wp_kses( $input, array(
						'a' => array(
							'href'	=>	array(),
							'class'	=>	array()
						),
						'div'	=>	array(
							'id'	=>	array()
						),
						'label'		=>	array(),
						'p'			=>	array()
					)
				);

	return $input;
 }


 function chdp_sanitize_category( $input ) {
     if ( term_exists(get_cat_name( $input ), 'category') )
         return $input;
     else
         return '';
 }


 function chdp_sanitize_coloralpha( $value ) {
 	// This pattern will check and match 3/6/8-character hex, rgb, rgba, hsl, & hsla colors.
 	$pattern = '/^(#[\da-f]{3}|\#[\da-f]{6}|\#[\da-f]{8}|rgba\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)(,\s*(0\.\d+|1))\)|hsla\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)(,\s*(0\.\d+|1))\)|rgb\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)|hsl\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)\))$/';
    \preg_match( $pattern, $value, $matches );
 	// Return the 1st match found.
 	if ( isset( $matches[0] ) ) {
 		if ( is_string( $matches[0] ) ) {
 			return $matches[0];
 		}
 		if ( is_array( $matches[0] ) && isset( $matches[0][0] ) ) {
 			return $matches[0][0];
 		}
 	}
 	// If no match was found, return an empty string.
 	return '';
 }
