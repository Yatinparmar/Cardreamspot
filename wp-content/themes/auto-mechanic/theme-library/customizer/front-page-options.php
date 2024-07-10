<?php

/**
 * Front Page Options
 *
 * @package Auto Mechanic
 */

$wp_customize->add_panel(
	'auto_mechanic_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'auto-mechanic' ),
		'priority' => 20,
	)
);

// Banner Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/banner.php';

// Car Service Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/car-services.php';