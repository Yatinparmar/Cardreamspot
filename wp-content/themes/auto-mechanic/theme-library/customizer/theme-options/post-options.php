<?php

/**
 * Post Options
 *
 * @package auto_mechanic
 */

$wp_customize->add_section(
	'auto_mechanic_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'auto-mechanic' ),
		'panel' => 'auto_mechanic_theme_options',
	)
);

// Post Options - Hide Feature Image.
$wp_customize->add_setting(
	'auto_mechanic_post_hide_feature_image',
	array(
		'default'           => false,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_post_hide_feature_image',
		array(
			'label'   => esc_html__( 'Hide Featured Image', 'auto-mechanic' ),
			'section' => 'auto_mechanic_post_options',
		)
	)
);

// Post Options - Hide Post Heading.
$wp_customize->add_setting(
	'auto_mechanic_post_hide_post_heading',
	array(
		'default'           => false,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_post_hide_post_heading',
		array(
			'label'   => esc_html__( 'Hide Post Heading', 'auto-mechanic' ),
			'section' => 'auto_mechanic_post_options',
		)
	)
);

// Post Options - Hide Post Content.
$wp_customize->add_setting(
	'auto_mechanic_post_hide_post_content',
	array(
		'default'           => false,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_post_hide_post_content',
		array(
			'label'   => esc_html__( 'Hide Post Content', 'auto-mechanic' ),
			'section' => 'auto_mechanic_post_options',
		)
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'auto_mechanic_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'auto-mechanic' ),
			'section' => 'auto_mechanic_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'auto_mechanic_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'auto-mechanic' ),
			'section' => 'auto_mechanic_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'auto_mechanic_post_hide_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'auto-mechanic' ),
			'section' => 'auto_mechanic_post_options',
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
			'section' => 'auto_mechanic_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'auto_mechanic_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'auto-mechanic' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'auto_mechanic_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'auto-mechanic' ),
		'section'  => 'auto_mechanic_post_options',
		'settings' => 'auto_mechanic_post_related_post_label',
		'type'     => 'text',
	)
);

// Post Options - Hide Related Posts.
$wp_customize->add_setting(
	'auto_mechanic_post_hide_related_posts',
	array(
		'default'           => false,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Hide Related Posts', 'auto-mechanic' ),
			'section' => 'auto_mechanic_post_options',
		)
	)
);
