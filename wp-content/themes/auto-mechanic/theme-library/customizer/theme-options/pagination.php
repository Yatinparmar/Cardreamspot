<?php

/**
 * Pagination
 *
 * @package auto_mechanic
 */

$wp_customize->add_section(
	'auto_mechanic_pagination',
	array(
		'panel' => 'auto_mechanic_theme_options',
		'title' => esc_html__( 'Pagination', 'auto-mechanic' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'auto_mechanic_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'auto-mechanic' ),
			'section'  => 'auto_mechanic_pagination',
			'settings' => 'auto_mechanic_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'auto_mechanic_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'auto_mechanic_sanitize_select',
	)
);

$wp_customize->add_control(
	'auto_mechanic_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'auto-mechanic' ),
		'section'         => 'auto_mechanic_pagination',
		'settings'        => 'auto_mechanic_pagination_type',
		'active_callback' => 'auto_mechanic_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'auto-mechanic' ),
			'numeric' => __( 'Numeric', 'auto-mechanic' ),
		),
	)
);
