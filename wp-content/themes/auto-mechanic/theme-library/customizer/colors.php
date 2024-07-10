<?php

/**
 * Color Option
 *
 * @package auto_mechanic
 */

// Primary Color.
$wp_customize->add_setting(
	'primary_color',
	array(
		'default'           => '#e02f5a',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'    => __( 'Primary Color', 'auto-mechanic' ),
			'section'  => 'colors',
			'priority' => 5,
		)
	)
);
