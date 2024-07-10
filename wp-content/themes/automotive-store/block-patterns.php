<?php
/**
 * Automotive Store: Block Patterns
 *
 * @since Automotive Store 1.0.1
 */

/**
 * Registers block patterns and categories.
 *
 * @since Automotive Store 1.0.1
 *
 * @return void
 */
function automotive_store_register_block_patterns() {
	$block_pattern_categories = array(
		'automotive-store'    => array( 'label' => __( 'Automotive Store', 'automotive-store' ) ),
	);

	$block_pattern_categories = apply_filters( 'automotive_store_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'automotive_store_register_block_patterns', 9 );
