<?php

/**
 * Auto Mechanic Theme Customizer
 *
 * @package auto_mechanic
 */

// Sanitize callback.
require get_template_directory() . '/theme-library/customizer/sanitize-callback.php';

// Active Callback.
require get_template_directory() . '/theme-library/customizer/active-callback.php';

// Custom Controls.
require get_template_directory() . '/theme-library/customizer/custom-controls/custom-controls.php';

// icon Controls.
require get_template_directory() . '/theme-library/customizer/custom-controls/icon-control.php';

function auto_mechanic_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'auto_mechanic_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'auto_mechanic_customize_partial_blogdescription',
			)
		);
	}

	// Upsell Section.
	$wp_customize->add_section(
		new Auto_Mechanic_Upsell_Section(
			$wp_customize,
			'upsell_section',
			array(
				'title'            => __( 'Auto Mechanic Pro', 'auto-mechanic' ),
				'button_text'      => __( 'Buy Pro', 'auto-mechanic' ),
				'url'              => 'https://asterthemes.com/products/mechanic-wordpress-theme/',
				'background_color' => '#e02f5a',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

	// Theme Options.
	require get_template_directory() . '/theme-library/customizer/theme-options.php';

	// Front Page Options.
	require get_template_directory() . '/theme-library/customizer/front-page-options.php';

	// Colors.
	require get_template_directory() . '/theme-library/customizer/colors.php';

}
add_action( 'customize_register', 'auto_mechanic_customize_register' );

function auto_mechanic_customize_partial_blogname() {
	bloginfo( 'name' );
}

function auto_mechanic_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function auto_mechanic_customize_preview_js() {
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'auto-mechanic-customizer', get_template_directory_uri() . '/resource/js/customizer' . $min . '.js', array( 'customize-preview' ), AUTO_MECHANIC_VERSION, true );
}
add_action( 'customize_preview_init', 'auto_mechanic_customize_preview_js' );

function auto_mechanic_custom_control_scripts() {
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'auto-mechanic-custom-controls-css', get_template_directory_uri() . '/resource/css/custom-controls' . $min . '.css', array(), '1.0', 'all' );

	wp_enqueue_script( 'auto-mechanic-custom-controls-js', get_template_directory_uri() . '/resource/js/custom-controls' . $min . '.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'auto_mechanic_custom_control_scripts' );
