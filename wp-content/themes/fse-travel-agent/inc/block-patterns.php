<?php
/**
 * Block Patterns
 *
 * @package fse_travel_agent
 * @since 1.0
 */

function fse_travel_agent_register_block_patterns() {
	$block_pattern_categories = array(
		'fse-travel-agent' => array( 'label' => esc_html__( 'FSE Travel Agent', 'fse-travel-agent' ) ),
		'pages'       => array( 'label' => esc_html__( 'Pages', 'fse-travel-agent' ) ),
	);

	$block_pattern_categories = apply_filters( 'fse_travel_agent_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'fse_travel_agent_register_block_patterns', 9 );