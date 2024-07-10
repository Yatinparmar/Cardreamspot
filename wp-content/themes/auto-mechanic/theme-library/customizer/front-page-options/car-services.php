<?php

/**
 * Car Services Section
 *
 * @package auto_mechanic
 */

$wp_customize->add_section(
	'auto_mechanic_services_section',
	array(
		'panel'    => 'auto_mechanic_front_page_options',
		'title'    => esc_html__( 'Car Services Section', 'auto-mechanic' ),
		'priority' => 10,
	)
);

// Services Section - Enable Section.
$wp_customize->add_setting(
	'auto_mechanic_enable_services_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_enable_services_section',
		array(
			'label'    => esc_html__( 'Enable Services Section', 'auto-mechanic' ),
			'section'  => 'auto_mechanic_services_section',
			'settings' => 'auto_mechanic_enable_services_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'auto_mechanic_enable_services_section',
		array(
			'selector' => '#auto_mechanic_menus_section .section-link',
			'settings' => 'auto_mechanic_enable_services_section',
		)
	);
}

// Car Services Section
$wp_customize->add_setting(
	'auto_mechanic_heading_services_section',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'auto_mechanic_heading_services_section',
	array(
		'label'           => esc_html__( 'Heading', 'auto-mechanic' ),
		'section'         => 'auto_mechanic_services_section',
		'settings'        => 'auto_mechanic_heading_services_section',
		'type'            => 'text',
		'active_callback' => 'auto_mechanic_is_services_section_enabled',
	)
);

$wp_customize->add_setting(
	'auto_mechanic_services_number',
	array(
	    'default'=> '',
	    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control(
	'auto_mechanic_services_number',
	array(
	    'label' => esc_html__('No of Tabs to show','auto-mechanic'),
	    'section'=> 'auto_mechanic_services_section',
	    'type' => 'number',
	    'input_attrs' => array(
	    'step'  => 1,
			'min'  => 0,
			'max'  => 4,
	    ),
	    'active_callback' => 'auto_mechanic_is_services_section_enabled',
	)
);

$featured_post = get_theme_mod('auto_mechanic_services_number','');
for ( $j = 1; $j <= $featured_post; $j++ ) {

    $wp_customize->add_setting(
    	'auto_mechanic_services_text'.$j,
    	array(
	        'default'=> '',
	        'sanitize_callback' => 'sanitize_text_field'
    	)
    );
    $wp_customize->add_control(
    	'auto_mechanic_services_text'.$j,
    	array(
	        'label' => esc_html__('Tab ','auto-mechanic').$j,
	        'section'=> 'auto_mechanic_services_section',
	        'type'=> 'text',
	        'active_callback' => 'auto_mechanic_is_services_section_enabled',
    	)
    );

    $auto_mechanic_categories = get_categories();
        $cat_posts = array();
            $i = 0;
            $cat_posts[]='Select';
        foreach($auto_mechanic_categories as $category){
            if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_posts[$category->slug] = $category->name;
    }

    $wp_customize->add_setting(
    	'auto_mechanic_services_category'.$j,
    	array(
	        'default'   => 'select',
	        'sanitize_callback' => 'auto_mechanic_sanitize_choices',
    	)
    );
    $wp_customize->add_control(
    	'auto_mechanic_services_category'.$j,
    	array(
	        'type'    => 'select',
	        'choices' => $cat_posts,
	        'label' => __('Select Category to display Services','auto-mechanic'),
	        'section' => 'auto_mechanic_services_section',
	        'active_callback' => 'auto_mechanic_is_services_section_enabled',
    	)
    );
}