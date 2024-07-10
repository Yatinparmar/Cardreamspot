<?php

/**
 * Footer Options
 *
 * @package auto_mechanic
 */

$wp_customize->add_section(
	'auto_mechanic_footer_options',
	array(
		'panel' => 'auto_mechanic_theme_options',
		'title' => esc_html__( 'Footer Options', 'auto-mechanic' ),
	)
);
	// column // 
$wp_customize->add_setting(
	'auto_mechanic_footer_widget_column',
	array(
        'default'			=> '4',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'auto_mechanic_sanitize_select',
		
	)
);	

$wp_customize->add_control(
	'auto_mechanic_footer_widget_column',
	array(
	    'label'   		=> __('Select Widget Column','auto-mechanic'),
	    'section' 		=> 'auto_mechanic_footer_options',
		'type'			=> 'select',
		'choices'        => 
		array(
			'' => __( 'None', 'auto-mechanic' ),
			'1' => __( '1 Column', 'auto-mechanic' ),
			'2' => __( '2 Column', 'auto-mechanic' ),
			'3' => __( '3 Column', 'auto-mechanic' ),
			'4' => __( '4 Column', 'auto-mechanic' )
		) 
	) 
);
$wp_customize->add_setting(
	'auto_mechanic_footer_copyright_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'auto_mechanic_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'auto-mechanic' ),
		'section'  => 'auto_mechanic_footer_options',
		'settings' => 'auto_mechanic_footer_copyright_text',
		'type'     => 'textarea',
	)
);
//  Image // 
$wp_customize->add_setting('footer_background_color_setting', array(
    'default' => '#1f1f1f',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background_color_setting', array(
    'label' => __('Footer Background Color', 'auto-mechanic'),
    'section' => 'auto_mechanic_footer_options',
)));

// Footer Background Image Setting
$wp_customize->add_setting('footer_background_image_setting', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_background_image_setting', array(
    'label' => __('Footer Background Image', 'auto-mechanic'),
    'section' => 'auto_mechanic_footer_options',
)));
// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'auto_mechanic_scroll_top',
	array(
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
		'default'           => true,
	)
);
// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'auto_mechanic_scroll_top',
	array(
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'auto-mechanic' ),
			'section' => 'auto_mechanic_footer_options',
		)
	)
);
// icon // 
$wp_customize->add_setting(
	'auto_mechanic_scroll_btn_icon',
	array(
        'default' => 'fas fa-chevron-up',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Aster_Change_Icon_Control($wp_customize, 
	'auto_mechanic_scroll_btn_icon',
	array(
	    'label'   		=> __('Scroll Top Icon','auto-mechanic'),
	    'section' 		=> 'auto_mechanic_footer_options',
		'iconset' => 'fa',
	))  
);