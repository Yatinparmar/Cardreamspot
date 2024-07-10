<?php

/**
 * 404 page
 *
 * @package auto_mechanic
 */


/*=========================================
404 Page
=========================================*/
$wp_customize->add_section(
	'404_pg_options', array(
		'title' => esc_html__( '404 Page', 'auto-mechanic' ),
		'panel' => 'auto_mechanic_theme_options',
	)
);

/*=========================================
404 Page
=========================================*/
$wp_customize->add_setting(
	'auto_mechanic_pg_404_head_options'
		,array(
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'auto_mechanic_sanitize_text',
	)
);

$wp_customize->add_control(
'auto_mechanic_pg_404_head_options',
	array(
		'type' => 'hidden',
		'label' => __('404 Page','auto-mechanic'),
		'section' => '404_pg_options',
	)
);

//  Title // 
$wp_customize->add_setting(
	'auto_mechanic_pg_404_ttl',
	array(
        'default'			=> __('404 Page Not Found','auto-mechanic'),
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'auto_mechanic_sanitize_html',
	)
);	

$wp_customize->add_control( 
	'auto_mechanic_pg_404_ttl',
	array(
	    'label'   => __('Title','auto-mechanic'),
	    'section' => '404_pg_options',
		'type'           => 'text',
	)  
);

//  Description // 
$wp_customize->add_setting(
	'auto_mechanic_pg_404_text',
	array(
        'default'			=> __('Apologies, but the page you are seeking cannot be found.','auto-mechanic'),
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'auto_mechanic_sanitize_html',
	)
);	

$wp_customize->add_control( 
	'auto_mechanic_pg_404_text',
	array(
	    'label'   => __('Description','auto-mechanic'),
	    'section' => '404_pg_options',
		'type'           => 'text',
	)  
);

//  Button Label // 
$wp_customize->add_setting(
	'auto_mechanic_pg_404_btn_lbl',
	array(
        'default'			=> __('Go Back Home','auto-mechanic'),
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'auto_mechanic_sanitize_html',
	)
);	

$wp_customize->add_control( 
	'auto_mechanic_pg_404_btn_lbl',
	array(
	    'label'   => __('Button Label','auto-mechanic'),
	    'section' => '404_pg_options',
		'type'           => 'text',
	)  
);


//  Link // 
$wp_customize->add_setting(
	'auto_mechanic_pg_404_btn_link',
	array(
        'default'			=> esc_url( home_url( '/' )),
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'auto_mechanic_sanitize_url',
	)
);	

$wp_customize->add_control( 
	'auto_mechanic_pg_404_btn_link',
	array(
	    'label'   => __('Link','auto-mechanic'),
	    'section' => '404_pg_options',
		'type'           => 'text',
	)  
);
