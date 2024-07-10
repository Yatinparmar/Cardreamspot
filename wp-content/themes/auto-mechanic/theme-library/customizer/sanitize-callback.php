<?php

function auto_mechanic_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$auto_mechanic_choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $auto_mechanic_choices ) ? $input : $setting->default );
}

function auto_mechanic_sanitize_switch( $input ) {
	if ( true === $input ) {
		return true;
	} else {
		return false;
	}
}
function auto_mechanic_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/**
 * Sanitize HTML input.
 *
 * @param string $input HTML input to sanitize.
 * @return string Sanitized HTML.
 */
function auto_mechanic_sanitize_html( $input ) {
    return wp_kses_post( $input );
}

/**
 * Sanitize URL input.
 *
 * @param string $input URL input to sanitize.
 * @return string Sanitized URL.
 */
function auto_mechanic_sanitize_url( $input ) {
    return esc_url_raw( $input );
}