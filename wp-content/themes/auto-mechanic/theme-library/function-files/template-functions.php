<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package auto_mechanic
 */

function auto_mechanic_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	$classes[] = auto_mechanic_sidebar_layout();

	return $classes;
}
add_filter( 'body_class', 'auto_mechanic_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function auto_mechanic_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'auto_mechanic_pingback_header' );


/**
 * Get all posts for customizer Post content type.
 */
function auto_mechanic_get_post_choices() {
	$auto_mechanic_choices = array( '' => esc_html__( '--Select--', 'auto-mechanic' ) );
	$args    = array( 'numberposts' => -1 );
	$auto_mechanic_posts   = get_posts( $args );

	foreach ( $auto_mechanic_posts as $post ) {
		$id             = $post->ID;
		$title          = $post->post_title;
		$auto_mechanic_choices[ $id ] = $title;
	}

	return $auto_mechanic_choices;
}

/**
 * Get all pages for customizer Page content type.
 */
function auto_mechanic_get_page_choices() {
	$auto_mechanic_choices = array( '' => esc_html__( '--Select--', 'auto-mechanic' ) );
	$pages   = get_pages();

	foreach ( $pages as $page ) {
		$auto_mechanic_choices[ $page->ID ] = $page->post_title;
	}

	return $auto_mechanic_choices;
}

if ( ! function_exists( 'auto_mechanic_excerpt_length' ) ) :
	/**
	 * Excerpt length.
	 */
	function auto_mechanic_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		return get_theme_mod( 'auto_mechanic_excerpt_length', 20 );
	}
endif;
add_filter( 'excerpt_length', 'auto_mechanic_excerpt_length', 999 );

if ( ! function_exists( 'auto_mechanic_excerpt_more' ) ) :
	/**
	 * Excerpt more.
	 */
	function auto_mechanic_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'auto_mechanic_excerpt_more' );

if ( ! function_exists( 'auto_mechanic_sidebar_layout' ) ) {
	/**
	 * Get sidebar layout.
	 */
	function auto_mechanic_sidebar_layout() {
		$auto_mechanic_sidebar_position      = get_theme_mod( 'auto_mechanic_sidebar_position', 'right-sidebar' );
		$auto_mechanic_sidebar_position_post = get_theme_mod( 'auto_mechanic_post_sidebar_position', 'right-sidebar' );
		$auto_mechanic_sidebar_position_page = get_theme_mod( 'auto_mechanic_page_sidebar_position', 'right-sidebar' );

		if ( is_single() ) {
			$auto_mechanic_sidebar_position = $auto_mechanic_sidebar_position_post;
		} elseif ( is_page() ) {
			$auto_mechanic_sidebar_position = $auto_mechanic_sidebar_position_page;
		}

		return $auto_mechanic_sidebar_position;
	}
}

if ( ! function_exists( 'auto_mechanic_is_sidebar_enabled' ) ) {
	/**
	 * Check if sidebar is enabled.
	 */
	function auto_mechanic_is_sidebar_enabled() {
		$auto_mechanic_sidebar_position      = get_theme_mod( 'auto_mechanic_sidebar_position', 'right-sidebar' );
		$auto_mechanic_sidebar_position_post = get_theme_mod( 'auto_mechanic_post_sidebar_position', 'right-sidebar' );
		$auto_mechanic_sidebar_position_page = get_theme_mod( 'auto_mechanic_page_sidebar_position', 'right-sidebar' );

		$auto_mechanic_sidebar_enabled = true;
		if ( is_home() || is_archive() || is_search() ) {
			if ( 'no-sidebar' === $auto_mechanic_sidebar_position ) {
				$auto_mechanic_sidebar_enabled = false;
			}
		} elseif ( is_single() ) {
			if ( 'no-sidebar' === $auto_mechanic_sidebar_position || 'no-sidebar' === $auto_mechanic_sidebar_position_post ) {
				$auto_mechanic_sidebar_enabled = false;
			}
		} elseif ( is_page() ) {
			if ( 'no-sidebar' === $auto_mechanic_sidebar_position || 'no-sidebar' === $auto_mechanic_sidebar_position_page ) {
				$auto_mechanic_sidebar_enabled = false;
			}
		}
		return $auto_mechanic_sidebar_enabled;
	}
}

if ( ! function_exists( 'auto_mechanic_get_homepage_sections ' ) ) {
	/**
	 * Returns homepage sections.
	 */
	function auto_mechanic_get_homepage_sections() {
		$sections = array(
			'banner'  => esc_html__( 'Banner Section', 'auto-mechanic' ),
			'car-services' => esc_html__( 'Car Services Section', 'auto-mechanic' ),
		);
		return $sections;
	}
}

/**
 * Renders customizer section link
 */
function auto_mechanic_section_link( $section_id ) {
	$auto_mechanic_section_name      = str_replace( 'auto_mechanic_', ' ', $section_id );
	$auto_mechanic_section_name      = str_replace( '_', ' ', $auto_mechanic_section_name );
	$auto_mechanic_starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $auto_mechanic_section_name ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $auto_mechanic_starting_notation . $section_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}

/**
 * Adds customizer section link css
 */
function auto_mechanic_section_link_css() {
	if ( is_customize_preview() ) {
		?>
		<style type="text/css">
			.section-link {
				visibility: hidden;
				background-color: black;
				position: relative;
				top: 80px;
				z-index: 99;
				left: 40px;
				color: #fff;
				text-align: center;
				font-size: 20px;
				border-radius: 10px;
				padding: 20px 10px;
				text-transform: capitalize;
			}

			.section-link-title {
				padding: 0 10px;
			}

			.banner-section {
				position: relative;
			}

			.banner-section .section-link {
				position: absolute;
				top: 100px;
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'auto_mechanic_section_link_css' );

/**
 * Breadcrumb.
 */
function auto_mechanic_breadcrumb( $args = array() ) {
	if ( ! get_theme_mod( 'auto_mechanic_enable_breadcrumb', true ) ) {
		return;
	}

	$args = array(
		'show_on_front' => false,
		'show_title'    => true,
		'show_browse'   => false,
	);
	breadcrumb_trail( $args );
}
add_action( 'auto_mechanic_breadcrumb', 'auto_mechanic_breadcrumb', 10 );

/**
 * Add separator for breadcrumb trail.
 */
function auto_mechanic_breadcrumb_trail_print_styles() {
	$auto_mechanic_breadcrumb_separator = get_theme_mod( 'auto_mechanic_breadcrumb_separator', '/' );

	$style = '
		.trail-items li::after {
			content: "' . $auto_mechanic_breadcrumb_separator . '";
		}'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	$style = apply_filters( 'auto_mechanic_breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", '  ' ), '', $style ) ) );

	if ( $style ) {
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $style . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_head', 'auto_mechanic_breadcrumb_trail_print_styles' );

/**
 * Pagination for archive.
 */
function auto_mechanic_render_posts_pagination() {
	$auto_mechanic_is_pagination_enabled = get_theme_mod( 'auto_mechanic_enable_pagination', true );
	if ( $auto_mechanic_is_pagination_enabled ) {
		$auto_mechanic_pagination_type = get_theme_mod( 'auto_mechanic_pagination_type', 'default' );
		if ( 'default' === $auto_mechanic_pagination_type ) :
			the_posts_navigation();
		else :
			the_posts_pagination();
		endif;
	}
}
add_action( 'auto_mechanic_posts_pagination', 'auto_mechanic_render_posts_pagination', 10 );

/**
 * Pagination for single post.
 */
function auto_mechanic_render_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span>&#10229;</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-title">%title</span> <span>&#10230;</span>',
		)
	);
}
add_action( 'auto_mechanic_post_navigation', 'auto_mechanic_render_post_navigation' );

/**
 * Adds footer copyright text.
 */

function auto_mechanic_output_footer_copyright_content() {
    $auto_mechanic_theme_data = wp_get_theme();
    $auto_mechanic_copyright_text = get_theme_mod('auto_mechanic_footer_copyright_text');

    if (!empty($auto_mechanic_copyright_text)) {
        $auto_mechanic_text = $auto_mechanic_copyright_text;
    } else {
        $auto_mechanic_default_text = '<a href="'. esc_url(__('https://asterthemes.com/products/free-auto-repair-wordpress-theme/','auto-mechanic')) . '" target="_blank"> ' . esc_html($auto_mechanic_theme_data->get('Name')) . '</a>' . '&nbsp;' . esc_html__('by', 'auto-mechanic') . '&nbsp;<a target="_blank" href="' . esc_url($auto_mechanic_theme_data->get('AuthorURI')) . '">' . esc_html(ucwords($auto_mechanic_theme_data->get('Author'))) . '</a>';
        $auto_mechanic_default_text .= sprintf(esc_html__(' | Powered by %s', 'auto-mechanic'), '<a href="' . esc_url(__('https://wordpress.org/', 'auto-mechanic')) . '" target="_blank">WordPress</a>. ');

        $auto_mechanic_text = $auto_mechanic_default_text;
    }
    ?>
    <span><?php echo wp_kses_post($auto_mechanic_text); ?></span>
    <?php
}
add_action('auto_mechanic_footer_copyright', 'auto_mechanic_output_footer_copyright_content');


if ( ! function_exists( 'auto_mechanic_footer_widget' ) ) :
function auto_mechanic_footer_widget() {
	$auto_mechanic_footer_widget_column	= get_theme_mod('auto_mechanic_footer_widget_column','4'); 
		if ($auto_mechanic_footer_widget_column == '4') {
			$column = '3';
		} elseif ($auto_mechanic_footer_widget_column == '3') {
			$column = '4';
		} elseif ($auto_mechanic_footer_widget_column == '2') {
			$column = '6';
		} else{
			$column = '12';
		}
	if($auto_mechanic_footer_widget_column !==''): 
	?>
	<div class="dt_footer-widgets">
		
    <div class="footer-widgets-column">
    	<?php
		$auto_mechanic_footer_widget_column = get_theme_mod('auto_mechanic_footer_widget_column','4');
	for ($i=1; $i<=$auto_mechanic_footer_widget_column; $i++) { ?>
        <?php if ( is_active_sidebar( 'auto-mechanic-footer-widget-' .$i ) ) : ?>
            <div class="footer-one-column" >
                <?php dynamic_sidebar( 'auto-mechanic-footer-widget-'.$i); ?>
            </div>
        <?php endif; ?>
        <?php  } ?>
    </div>

</div>
	<?php 
	endif; } 
endif;
add_action( 'auto_mechanic_footer_widget', 'auto_mechanic_footer_widget' );