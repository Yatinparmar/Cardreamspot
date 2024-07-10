<?php

/**
 * Sidebar Position
 *
 * @package auto_mechanic
 */

$wp_customize->add_section(
	'auto_mechanic_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'auto-mechanic' ),
		'panel' => 'auto_mechanic_theme_options',
	)
);

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'auto_mechanic_sidebar_position',
	array(
		'sanitize_callback' => 'auto_mechanic_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'auto_mechanic_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'auto-mechanic' ),
		'section' => 'auto_mechanic_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'auto-mechanic' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'auto-mechanic' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'auto-mechanic' ),
		),
	)
);

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'auto_mechanic_post_sidebar_position',
	array(
		'sanitize_callback' => 'auto_mechanic_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'auto_mechanic_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'auto-mechanic' ),
		'section' => 'auto_mechanic_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'auto-mechanic' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'auto-mechanic' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'auto-mechanic' ),
		),
	)
);

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'auto_mechanic_page_sidebar_position',
	array(
		'sanitize_callback' => 'auto_mechanic_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'auto_mechanic_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'auto-mechanic' ),
		'section' => 'auto_mechanic_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'auto-mechanic' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'auto-mechanic' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'auto-mechanic' ),
		),
	)
);
