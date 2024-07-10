<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package auto_mechanic
 */

?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>

	<?php 
	if ( ! is_active_sidebar( 'sidebar-1' )) { ?>
		<aside id="secondary" class="widget-area">
			<section id="Search" class="widget widget_block widget_archive " >
				<h2 class="widget-title"><?php esc_html_e('Search', 'auto-mechanic'); ?></h2>
				<?php get_search_form(); ?>
			</section>
			<section id="woocommerce_archives" class="widget widget_block widget_archive">
			<h2 class="widget-title"><?php esc_html_e('Product Archives', 'auto-mechanic'); ?></h2>
			<ul>
				<?php
				// Get WooCommerce product archives
				$product_archives = wp_get_archives(array(
					'type'            => 'monthly',
					'post_type'       => 'product',
					'show_post_count' => true,
					'echo'            => false, // Return archives as a string instead of echoing
				));

				// Display WooCommerce product archives
				if ($product_archives) {
					echo $product_archives;
				} else {
					echo '<li>' . esc_html__('No product archives found.', 'auto-mechanic') . '</li>';
				}
				?>
			</ul>
		</section>

		<section id="categories" class="widget widget_categories" role="complementary">
		    <h2 class="widget-title"><?php esc_html_e('Categories', 'auto-mechanic'); ?></h2>
		    <ul>
		        <?php
		       // Get WooCommerce categories
				$woocommerce_categories = get_terms(array(
					'taxonomy'   => 'product_cat', // WooCommerce product category taxonomy
					'hide_empty' => true, // Hide empty categories
				));

				// Check if categories exist
				if (!empty($woocommerce_categories)) {
					foreach ($woocommerce_categories as $category) {
						echo '<a href="' . get_term_link($category) . '">' . $category->name . '</a><br>';
					}
				} else {
					echo 'No categories found.';
				}
							
		        ?>
		    </ul>
		</section>
		<section id="tags" class="widget widget_tag_cloud" role="complementary">
		    <h2 class="widget-title"><?php esc_html_e('Tags', 'auto-mechanic'); ?></h2>
			<?php
			$woocommerce_tags = get_terms(array(
				'taxonomy'   => 'product_tag', // WooCommerce product tag taxonomy
				'hide_empty' => true, // Hide empty tags
			));

			if ($woocommerce_tags) {
				echo '<div class="tag-cloud">';
				foreach ($woocommerce_tags as $tag) {
					$tag_link = get_term_link($tag);
					echo '<a href="' . esc_url($tag_link) . '" class="tag-link">' . esc_html($tag->name) . '</a>';
				}
				echo '</div>';
			} else {
				echo '<p>No tags found.</p>';
			}
			?>
		</section>
		<section id="recent-posts" class="widget" role="complementary">
		    <h2 class="widget-title"><?php esc_html_e('Recent Posts', 'auto-mechanic'); ?></h2>
		    <ul class="recent-posts-list">
		<?php
			$recent_products = wc_get_products(array(
				'limit' => 5, // Adjust the number of products to display
				'status' => 'publish',
				'orderby' => 'date',
				'order' => 'DESC',
			));

			foreach ($recent_products as $product) :
			?>
				<li>
					<a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a>
				</li>
			<?php
			endforeach;
			?>
		    </ul>
		</section>
	</aside><!-- #secondary -->
<?php } ?>
