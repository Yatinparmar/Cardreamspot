<?php

/**
 * Active Callbacks
 *
 * @package auto_mechanic
 */

// Theme Options.
function auto_mechanic_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'auto_mechanic_enable_pagination' )->value() );
}
function auto_mechanic_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'auto_mechanic_enable_breadcrumb' )->value() );
}

// Header Options.
function auto_mechanic_is_topbar_enabled( $control ) {
	return ( $control->manager->get_Setting( 'auto_mechanic_enable_topbar' )->value() );
}

// Banner Slider Section.
function auto_mechanic_is_banner_slider_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'auto_mechanic_enable_banner_section' )->value() );
}
function auto_mechanic_is_banner_slider_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'auto_mechanic_banner_slider_content_type' )->value();
	return ( auto_mechanic_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function auto_mechanic_is_banner_slider_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'auto_mechanic_banner_slider_content_type' )->value();
	return ( auto_mechanic_is_banner_slider_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Car Services section.
function auto_mechanic_is_services_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'auto_mechanic_enable_services_section' )->value() );
}