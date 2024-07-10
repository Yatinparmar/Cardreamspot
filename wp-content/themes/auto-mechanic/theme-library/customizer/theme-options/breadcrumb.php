<?php

/**
 * Breadcrumb
 *
 * @package auto_mechanic
 */

$wp_customize->add_section(
	'auto_mechanic_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'auto-mechanic' ),
		'panel' => 'auto_mechanic_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'auto_mechanic_enable_breadcrumb',
	array(
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'auto-mechanic' ),
			'section' => 'auto_mechanic_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'auto_mechanic_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'auto_mechanic_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'auto-mechanic' ),
		'active_callback' => 'auto_mechanic_is_breadcrumb_enabled',
		'section'         => 'auto_mechanic_breadcrumb',
	)
);
