<?php

/**
 * Render homepage sections.
 */
function auto_mechanic_homepage_sections() {
	$auto_mechanic_homepage_sections = array_keys( auto_mechanic_get_homepage_sections() );

	foreach ( $auto_mechanic_homepage_sections as $auto_mechanic_section ) {
		require get_template_directory() . '/sections/' . $auto_mechanic_section . '.php';
	}
}