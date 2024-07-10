<?php

if ( ! get_theme_mod( 'auto_mechanic_enable_services_section', false ) ) {
	return;
}

$args = '';

auto_mechanic_render_service_section( $args );

/**
 * Render Service Section.
 */
function auto_mechanic_render_service_section( $args ) { ?>
	<section id="auto_mechanic_trending_section" class="asterthemes-frontpage-section trending-section trending-style-1">
		<?php
		if ( is_customize_preview() ) :
			auto_mechanic_section_link( 'auto_mechanic_service_section' );
		endif; ?>

		<div class="asterthemes-wrapper">
			<div class="services-section">
				<?php
					$auto_mechanic_heading_services_section = get_theme_mod( 'auto_mechanic_heading_services_section', '' );
					if ( ! empty( $auto_mechanic_heading_services_section ) ) { ?>

					<h3><?php echo esc_html( $auto_mechanic_heading_services_section ); ?></h3>
				<?php } ?>
				<div class="tab">
			        <?php $auto_mechanic_featured_post = get_theme_mod('auto_mechanic_services_number', '');
			          	for ( $auto_mechanic_j = 1; $auto_mechanic_j <= $auto_mechanic_featured_post; $auto_mechanic_j++ ){ ?>
		          		<button class="tablinks" onclick="auto_mechanic_services_tab(event, '<?php $auto_mechanic_main_id = get_theme_mod('auto_mechanic_services_text'.$auto_mechanic_j); $auto_mechanic_tab_id = str_replace(' ', '-', $auto_mechanic_main_id); echo $auto_mechanic_tab_id; ?> ')">
			          	<?php echo esc_html(get_theme_mod('auto_mechanic_services_text'.$auto_mechanic_j)); ?></button>
			        <?php }?>
		      	</div>

		  	  	<?php for ( $auto_mechanic_j = 1; $auto_mechanic_j <= $auto_mechanic_featured_post; $auto_mechanic_j++ ){ ?>
			        <div id="<?php $auto_mechanic_main_id = get_theme_mod('auto_mechanic_services_text'.$auto_mechanic_j); $auto_mechanic_tab_id = str_replace(' ', '-', $auto_mechanic_main_id); echo $auto_mechanic_tab_id; ?>"  class="tabcontent">
			        	<div class="services_main_box">
					        <?php $args = array(
								'post_type' => 'post',
								'post_status' => 'publish',
								'category_name' =>  get_theme_mod('auto_mechanic_services_category'.$auto_mechanic_j),
								'posts_per_page' => 9,
							); ?>
						    <?php $auto_mechanic_arr_posts = new WP_Query( $args );
						    	if ( $auto_mechanic_arr_posts->have_posts() ) :
						      	while ( $auto_mechanic_arr_posts->have_posts() ) :
						        $auto_mechanic_arr_posts->the_post();
						        ?>
						        <div class="services_inner_box">
									<?php if ( has_post_thumbnail() ) :
										the_post_thumbnail();
									endif; ?>
									<div class="services_content_box">
						        		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						        		<?php the_excerpt(); ?>
						            </div>
						        </div>
						      	<?php
						    endwhile;
						    wp_reset_postdata();
						    endif; ?>
					   	</div>
					</div>
				<?php }?>
			</div>
		</div>
	</section>
	<?php
}
