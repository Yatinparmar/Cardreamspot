<?php

/**
 * Header Options
 *
 * @package auto_mechanic
 */

// General Options
$wp_customize->add_section(
	'auto_mechanic_general_options',
	array(
		'panel' => 'auto_mechanic_theme_options',
		'title' => esc_html__( 'General Options', 'auto-mechanic' ),
	)
);

// General Options - Enable Preloader.
$wp_customize->add_setting(
	'auto_mechanic_enable_preloader',
	array(
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_enable_preloader',
		array(
			'label'   => esc_html__( 'Enable Preloader', 'auto-mechanic' ),
			'section' => 'auto_mechanic_general_options',
		)
	)
);

// Site Title - Enable Setting.
$wp_customize->add_setting(
	'auto_mechanic_enable_site_title_setting',
	array(
		'default'           => true,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_enable_site_title_setting',
		array(
			'label'    => esc_html__( 'Disable Site Title', 'auto-mechanic' ),
			'section'  => 'title_tagline',
			'settings' => 'auto_mechanic_enable_site_title_setting',
		)
	)
);

// Tagline - Enable Setting.
$wp_customize->add_setting(
	'auto_mechanic_enable_tagline_setting',
	array(
		'default'           => false,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_enable_tagline_setting',
		array(
			'label'    => esc_html__( 'Enable Tagline', 'auto-mechanic' ),
			'section'  => 'title_tagline',
			'settings' => 'auto_mechanic_enable_tagline_setting',
		)
	)
);

$wp_customize->add_section(
	'auto_mechanic_header_options',
	array(
		'panel' => 'auto_mechanic_theme_options',
		'title' => esc_html__( 'Header Options', 'auto-mechanic' ),
	)
);

// Header Options - Enable Topbar.
$wp_customize->add_setting(
	'auto_mechanic_enable_topbar',
	array(
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_enable_topbar',
		array(
			'label'   => esc_html__( 'Enable Topbar', 'auto-mechanic' ),
			'section' => 'auto_mechanic_header_options',
		)
	)
);

// Header Options - Welcome Text.
$wp_customize->add_setting(
	'auto_mechanic_welcome_topbar_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'auto_mechanic_welcome_topbar_text',
	array(
		'label'           => esc_html__( 'Topbar Text', 'auto-mechanic' ),
		'section'         => 'auto_mechanic_header_options',
		'type'            => 'text',
		'active_callback' => 'auto_mechanic_is_topbar_enabled',
	)
);


// icon // 
$wp_customize->add_setting(
	'auto_mechanic_topbar_btn_icon',
	array(
        'default' => 'fas fa-microphone',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Aster_Change_Icon_Control($wp_customize, 
	'auto_mechanic_topbar_btn_icon',
	array(
	    'label'   		=> __('Scroll Top Icon','auto-mechanic'),
	    'section' 		=> 'auto_mechanic_header_options',
		'iconset' => 'fa',
	))  
);