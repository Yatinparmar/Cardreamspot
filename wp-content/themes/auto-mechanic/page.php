<?php

/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package auto_mechanic
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	do_action( 'auto_mechanic_breadcrumb' );
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );
		
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

</main>

<?php
if ( auto_mechanic_is_sidebar_enabled() ) {
	get_sidebar();
}
get_footer();
