<?php

/**
 * The main template file
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package auto_mechanic
 */

get_header();

$auto_mechanic_column = get_theme_mod( 'auto_mechanic_archive_column_layout', 'column-3' );
?>
<main id="primary" class="site-main">

	<?php

	if ( is_home() && ! is_front_page() ) {

		do_action( 'auto_mechanic_breadcrumb' );

	}

	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) :
			?>
			<header>
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</header>
			<?php
		endif;
		?>

		<div class="auto-mechanic-archive-layout grid-layout <?php echo esc_attr( $auto_mechanic_column ); ?>">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			?>
		</div>
		<?php
		do_action( 'auto_mechanic_posts_pagination' );

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
	

</main>

<?php
if ( auto_mechanic_is_sidebar_enabled() ) {
	get_sidebar();
}

get_footer();
