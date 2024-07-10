<?php

/**
 * Excerpt
 *
 * @package auto_mechanic
 */

$wp_customize->add_section(
	'auto_mechanic_excerpt_options',
	array(
		'panel' => 'auto_mechanic_theme_options',
		'title' => esc_html__( 'Excerpt', 'auto-mechanic' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'auto_mechanic_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'auto_mechanic_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'auto-mechanic' ),
		'section'     => 'auto_mechanic_excerpt_options',
		'settings'    => 'auto_mechanic_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 200,
			'step' => 1,
		),
	)
);