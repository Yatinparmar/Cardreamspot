<?php
/**
 * Block Styles
 *
 * @package fse_travel_agent
 * @since 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	function fse_travel_agent_register_block_styles() {

		//Wp Block Padding Zero
		register_block_style(
			'core/group',
			array(
				'name'  => 'fse-travel-agent-padding-0',
				'label' => esc_html__( 'No Padding', 'fse-travel-agent' ),
			)
		);

		//Wp Block Post Author Style
		register_block_style(
			'core/post-author',
			array(
				'name'  => 'fse-travel-agent-post-author-card',
				'label' => esc_html__( 'Theme Style', 'fse-travel-agent' ),
			)
		);

		//Wp Block Button Style
		register_block_style(
			'core/button',
			array(
				'name'         => 'fse-travel-agent-button',
				'label'        => esc_html__( 'Plain', 'fse-travel-agent' ),
			)
		);

		//Post Comments Style
		register_block_style(
			'core/post-comments',
			array(
				'name'         => 'fse-travel-agent-post-comments',
				'label'        => esc_html__( 'Theme Style', 'fse-travel-agent' ),
			)
		);

		//Latest Comments Style
		register_block_style(
			'core/latest-comments',
			array(
				'name'         => 'fse-travel-agent-latest-comments',
				'label'        => esc_html__( 'Theme Style', 'fse-travel-agent' ),
			)
		);


		//Wp Block Table Style
		register_block_style(
			'core/table',
			array(
				'name'         => 'fse-travel-agent-wp-table',
				'label'        => esc_html__( 'Theme Style', 'fse-travel-agent' ),
			)
		);


		//Wp Block Pre Style
		register_block_style(
			'core/preformatted',
			array(
				'name'         => 'fse-travel-agent-wp-preformatted',
				'label'        => esc_html__( 'Theme Style', 'fse-travel-agent' ),
			)
		);

		//Wp Block Verse Style
		register_block_style(
			'core/verse',
			array(
				'name'         => 'fse-travel-agent-wp-verse',
				'label'        => esc_html__( 'Theme Style', 'fse-travel-agent' ),
			)
		);
	}
	add_action( 'init', 'fse_travel_agent_register_block_styles' );
}