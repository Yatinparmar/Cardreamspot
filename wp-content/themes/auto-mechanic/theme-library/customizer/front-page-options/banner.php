<?php

/**
 * Banner Section
 *
 * @package auto_mechanic
 */

$wp_customize->add_section(
	'auto_mechanic_banner_section',
	array(
		'panel'    => 'auto_mechanic_front_page_options',
		'title'    => esc_html__( 'Banner Section', 'auto-mechanic' ),
		'priority' => 10,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'auto_mechanic_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'auto_mechanic_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Auto_Mechanic_Toggle_Switch_Custom_Control(
		$wp_customize,
		'auto_mechanic_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'auto-mechanic' ),
			'section'  => 'auto_mechanic_banner_section',
			'settings' => 'auto_mechanic_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'auto_mechanic_enable_banner_section',
		array(
			'selector' => '#auto_mechanic_banner_section .section-link',
			'settings' => 'auto_mechanic_enable_banner_section',
		)
	);
}

// Banner Section - Banner Slider Content Type.
$wp_customize->add_setting(
	'auto_mechanic_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'auto_mechanic_sanitize_select',
	)
);

$wp_customize->add_control(
	'auto_mechanic_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Slider Content Type', 'auto-mechanic' ),
		'section'         => 'auto_mechanic_banner_section',
		'settings'        => 'auto_mechanic_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'auto_mechanic_is_banner_slider_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'auto-mechanic' ),
			'post' => esc_html__( 'Post', 'auto-mechanic' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {

	// Banner Section - Select Banner Post.
	$wp_customize->add_setting(
		'auto_mechanic_banner_slider_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'auto_mechanic_banner_slider_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'auto-mechanic' ), $i ),
			'section'         => 'auto_mechanic_banner_section',
			'settings'        => 'auto_mechanic_banner_slider_content_post_' . $i,
			'active_callback' => 'auto_mechanic_is_banner_slider_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => auto_mechanic_get_post_choices(),
		)
	);

	// Banner Section - Select Banner Page.
	$wp_customize->add_setting(
		'auto_mechanic_banner_slider_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'auto_mechanic_banner_slider_content_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Page %d', 'auto-mechanic' ), $i ),
			'section'         => 'auto_mechanic_banner_section',
			'settings'        => 'auto_mechanic_banner_slider_content_page_' . $i,
			'active_callback' => 'auto_mechanic_is_banner_slider_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => auto_mechanic_get_page_choices(),
		)
	);

	// Banner Section - Button Label.
	$wp_customize->add_setting(
		'auto_mechanic_banner_button_label_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'auto_mechanic_banner_button_label_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Button Label %d', 'auto-mechanic' ), $i ),
			'section'         => 'auto_mechanic_banner_section',
			'settings'        => 'auto_mechanic_banner_button_label_' . $i,
			'type'            => 'text',
			'active_callback' => 'auto_mechanic_is_banner_slider_section_enabled',
		)
	);

	// Banner Section - Button Link.
	$wp_customize->add_setting(
		'auto_mechanic_banner_button_link_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'auto_mechanic_banner_button_link_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Button Link %d', 'auto-mechanic' ), $i ),
			'section'         => 'auto_mechanic_banner_section',
			'settings'        => 'auto_mechanic_banner_button_link_' . $i,
			'type'            => 'url',
			'active_callback' => 'auto_mechanic_is_banner_slider_section_enabled',
		)
	);
}
