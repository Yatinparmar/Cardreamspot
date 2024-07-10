<?php
/**
 * FSE Travel Agent functions and definitions
 *
 * @package fse_travel_agent
 * @since 1.0
 */

if ( ! function_exists( 'fse_travel_agent_support' ) ) :
	function fse_travel_agent_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}
endif;

add_action( 'after_setup_theme', 'fse_travel_agent_support' );

if ( ! function_exists( 'fse_travel_agent_styles' ) ) :
	function fse_travel_agent_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_enqueue_style(
			'fse-travel-agent-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);
		// Enqueue the 'cr-animate-style' stylesheet
		wp_enqueue_style( 'cr-animate-style', 
			get_template_directory_uri() . '/assets/css/animate.min.css', 
			array(), 
			$theme_version, 
			'all' 
		);
		
		// Enqueue the 'cr-themeanimate-js' script, dependent on jQuery
		wp_enqueue_script( 'cr-themeanimate-js', 
			get_template_directory_uri() . '/assets/js/themeanimate.js', 
			array( 'jquery' ), 
			$theme_version, true 
		);
	}
endif;

add_action( 'wp_enqueue_scripts', 'fse_travel_agent_styles' );

/* Theme Credit link */
define('FSE_TRAVEL_AGENT_BUY_NOW',__('https://www.cretathemes.com/gutenberg/travel-agent-wordpress-theme/','fse-travel-agent'));
define('FSE_TRAVEL_AGENT_PRO_DEMO',__('https://www.cretathemes.com/preview/fse-travel-agent/','fse-travel-agent'));
define('FSE_TRAVEL_AGENT_THEME_DOC',__('https://www.cretathemes.com/pro-guide/fse-travel-agent/','fse-travel-agent'));
define('FSE_TRAVEL_AGENT_SUPPORT',__('https://wordpress.org/support/theme/fse-travel-agent','fse-travel-agent'));
define('FSE_TRAVEL_AGENT_REVIEW',__('https://wordpress.org/support/theme/fse-travel-agent/reviews/#new-post','fse-travel-agent'));


// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

// Add block styles
require get_template_directory() . '/inc/block-styles.php';

// Block Filters
require get_template_directory() . '/inc/block-filters.php';

// Svg icons
require get_template_directory() . '/inc/icon-function.php';

// Get Started.
require get_template_directory() . '/inc/get-started/get-started.php';