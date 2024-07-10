<?php

/**
 * Single Post Options
 *
 * @package auto_mechanic
 */

$wp_customize->add_section(
	'auto_mechanic_single_post_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'auto-mechanic' ),
		'panel' => 'auto_mechanic_theme_options',
	)
);


// Post Options - Hide Date.
$wp_customize->add_setting(
	'auto_mechanic_single_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_single_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'auto-mechanic' ),
			'section' => 'auto_mechanic_single_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'auto_mechanic_single_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_single_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'auto-mechanic' ),
			'section' => 'auto_mechanic_single_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'auto_mechanic_single_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_single_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'auto-mechanic' ),
			'section' => 'auto_mechanic_single_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'auto_mechanic_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'auto-mechanic' ),
			'section' => 'auto_mechanic_single_post_options',
		)
	)
);
