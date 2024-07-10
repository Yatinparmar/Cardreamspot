<?php
/**
 * Getting Started Page.
 *
 * @package auto_mechanic
 */

if( ! function_exists( 'auto_mechanic_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function auto_mechanic_getting_started_menu(){	
	add_theme_page(
		__( 'Getting Started', 'auto-mechanic' ),
		__( 'Getting Started', 'auto-mechanic' ),
		'manage_options',
		'auto-mechanic-getting-started',
		'auto_mechanic_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'auto_mechanic_getting_started_menu' );

if( ! function_exists( 'auto_mechanic_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function auto_mechanic_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_auto-mechanic-getting-started' != $hook ) return;

    wp_enqueue_style( 'auto-mechanic-getting-started', get_template_directory_uri() . '/resource/css/getting-started.css', false, AUTO_MECHANIC_VERSION );

    wp_enqueue_script( 'auto-mechanic-getting-started', get_template_directory_uri() . '/resource/js/getting-started.js', array( 'jquery' ), AUTO_MECHANIC_VERSION, true );
}
endif;
add_action( 'admin_enqueue_scripts', 'auto_mechanic_getting_started_admin_scripts' );

if( ! function_exists( 'auto_mechanic_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function auto_mechanic_getting_started_page(){ 
	$auto_mechanic_theme = wp_get_theme();?>
	<div class="wrap getting-started">
		<div class="intro-wrap">
			<div class="intro cointaner">
				<div class="intro-content">
					<h3><?php echo esc_html( 'Welcome to', 'auto-mechanic' );?> <span class="theme-name"><?php echo esc_html( AUTO_MECHANIC_THEME_NAME ); ?></span></h3>
					<p class="about-text">
						<?php
						// Remove last sentence of description.
						$auto_mechanic_description = explode( '. ', $auto_mechanic_theme->get( 'Description' ) );

						array_pop( $auto_mechanic_description );

						$auto_mechanic_description = implode( '. ', $auto_mechanic_description );

						echo esc_html( $auto_mechanic_description . '.' );
					?></p>
					<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'Customize', 'auto-mechanic' ); ?></a>
			        <a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/auto-mechanic/reviews/#new-post' ); ?>" title="<?php esc_attr_e( 'Visit the Review', 'auto-mechanic' ); ?>" target="_blank">
			            <?php esc_html_e( 'REVIEW', 'auto-mechanic' ); ?>
			        </a>
			        <a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/auto-mechanic/' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'auto-mechanic' ); ?>" target="_blank">
			            <?php esc_html_e( 'CONTACT SUPPORT', 'auto-mechanic' ); ?>
			        </a>
				</div>
				<div class="intro-img">
					<img src="<?php echo esc_url(get_template_directory_uri()) .'/screenshot.png'; ?>" />
				</div>
				
			</div>
		</div>

		<div class="cointaner panels">
			<ul class="inline-list">
				<li class="current">
                    <a id="help" href="javascript:void(0);">
                        <?php esc_html_e( 'Getting Started', 'auto-mechanic' ); ?>
                    </a>
                </li>
				<li>
                    <a id="free-pro-panel" href="javascript:void(0);">
                        <?php esc_html_e( 'Free Vs Pro', 'auto-mechanic' ); ?>
                    </a>
                </li>
			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/help-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/free-vs-pro-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/link-panel.php'; ?>
			</div>
		</div>
	</div>
	<?php
}
endif;