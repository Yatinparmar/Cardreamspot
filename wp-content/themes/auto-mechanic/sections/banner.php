<?php
if ( ! get_theme_mod( 'auto_mechanic_enable_banner_section', false ) ) {
	return;
}

$auto_mechanic_slider_content_ids  = array();
$auto_mechanic_slider_content_type = get_theme_mod( 'auto_mechanic_banner_slider_content_type', 'post' );

for ( $i = 1; $i <= 3; $i++ ) {
	$auto_mechanic_slider_content_ids[] = get_theme_mod( 'auto_mechanic_banner_slider_content_' . $auto_mechanic_slider_content_type . '_' . $i );
}
$auto_mechanic_banner_slider_args = array(
	'post_type'           => $auto_mechanic_slider_content_type,
	'post__in'            => array_filter( $auto_mechanic_slider_content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 3 ),
	'ignore_sticky_posts' => true,
);
$auto_mechanic_banner_slider_args = apply_filters( 'auto_mechanic_banner_section_args', $auto_mechanic_banner_slider_args );

auto_mechanic_render_banner_section( $auto_mechanic_banner_slider_args );

/**
 * Render Banner Section.
 */
function auto_mechanic_render_banner_section( $auto_mechanic_banner_slider_args ) {     ?>

	<section id="auto_mechanic_banner_section" class="banner-section banner-style-1">
		<?php
		if ( is_customize_preview() ) :
			auto_mechanic_section_link( 'auto_mechanic_banner_section' );
		endif;
		?>
		<div class="banner-section-wrapper">
			<?php
			$auto_mechanic_query = new WP_Query( $auto_mechanic_banner_slider_args );
			if ( $auto_mechanic_query->have_posts() ) :
				?>
				<div class="asterthemes-banner-wrapper banner-slider auto-mechanic-carousel-navigation" data-slick='{"autoplay": false }'>
					<?php
					$i = 1;
					while ( $auto_mechanic_query->have_posts() ) :
						$auto_mechanic_query->the_post();
						$auto_mechanic_button_label = get_theme_mod( 'auto_mechanic_banner_button_label_' . $i, '' );
						$auto_mechanic_button_link  = get_theme_mod( 'auto_mechanic_banner_button_link_' . $i, '' );
						$auto_mechanic_button_link  = ! empty( $auto_mechanic_button_link ) ? $auto_mechanic_button_link : get_the_permalink();
						?>
						<div class="banner-single-outer">
							<div class="banner-single">
								<div class="banner-img">
									<?php the_post_thumbnail( 'full' ); ?>
								</div>
								<div class="banner-caption">
									<div class="asterthemes-wrapper">
										<div class="banner-catption-wrapper">
											<h1 class="banner-caption-title">
												<?php the_title(); ?>
											</h1>
											<div class="mag-post-excerpt">
												<?php the_excerpt(); ?>
											</div>
											<?php if ( ! empty( $auto_mechanic_button_label ) ) { ?>
												<div class="banner-slider-btn">
													<a href="<?php echo esc_url( $auto_mechanic_button_link ); ?>" class="asterthemes-button"><?php echo esc_html( $auto_mechanic_button_label ); ?></a>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						$i++;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<?php
			endif;
			?>
		</div>
	</section>

	<?php
}
