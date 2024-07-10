<?php
/**
 * Auto Mechanic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package auto_mechanic
 */

if ( ! defined( 'AUTO_MECHANIC_VERSION' ) ) {
	define( 'AUTO_MECHANIC_VERSION', '1.0.0' );
}
$auto_mechanic_theme_data = wp_get_theme();

if( ! defined( 'AUTO_MECHANIC_THEME_NAME' ) ) define( 'AUTO_MECHANIC_THEME_NAME', $auto_mechanic_theme_data->get( 'Name' ) );

if ( ! function_exists( 'auto_mechanic_setup' ) ) :
	
	function auto_mechanic_setup() {
		
		load_theme_textdomain( 'auto-mechanic', get_template_directory() . '/languages' );

		add_theme_support( 'woocommerce' );

		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'auto-mechanic' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'woocommerce',
			)
		);

		add_theme_support(
			'custom-background',
			apply_filters(
				'auto_mechanic_custom_background_args',
				array(
					'default-color' => '101010',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'auto_mechanic_setup' );

function auto_mechanic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'auto_mechanic_content_width', 640 );
}
add_action( 'after_setup_theme', 'auto_mechanic_content_width', 0 );

function auto_mechanic_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'auto-mechanic' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'auto-mechanic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		)
	);

	// Regsiter 4 footer widgets.
	$auto_mechanic_footer_widget_column = get_theme_mod('auto_mechanic_footer_widget_column','4');
	for ($i=1; $i<=$auto_mechanic_footer_widget_column; $i++) {
		register_sidebar( array(
			'name' => __( 'Footer  ', 'auto-mechanic' )  . $i,
			'id' => 'auto-mechanic-footer-widget-' . $i,
			'description' => __( 'The Footer Widget Area', 'auto-mechanic' )  . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<div class="widget-header"><h4 class="widget-title">',
			'after_title' => '</h4></div>',
		) );
	}
}
add_action( 'widgets_init', 'auto_mechanic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function auto_mechanic_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Slick style.
	wp_enqueue_style( 'auto-mechanic-slick-style', get_template_directory_uri() . '/resource/css/slick' . $min . '.css', array(), '1.8.1' );

	// Fontawesome style.
	wp_enqueue_style( 'auto-mechanic-fontawesome-style', get_template_directory_uri() . '/resource/css/fontawesome' . $min . '.css', array(), '5.15.4' );

	// Main style.
	wp_enqueue_style( 'auto-mechanic-style', get_template_directory_uri() . '/style.css', array(), AUTO_MECHANIC_VERSION );

	// Navigation script.
	wp_enqueue_script( 'auto-mechanic-navigation-script', get_template_directory_uri() . '/resource/js/navigation' . $min . '.js', array(), AUTO_MECHANIC_VERSION, true );

	// Slick script.
	wp_enqueue_script( 'auto-mechanic-slick-script', get_template_directory_uri() . '/resource/js/slick' . $min . '.js', array( 'jquery' ), '1.8.1', true );

	// Custom script.
	wp_enqueue_script( 'auto-mechanic-custom-script', get_template_directory_uri() . '/resource/js/custom.js', array( 'jquery' ), AUTO_MECHANIC_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Include the file.
	require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

	// Load the webfont.
	wp_enqueue_style(
		'play',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap' ),
		array(),
		'1.0'
	);

	// Load the webfont.
	wp_enqueue_style(
		'readex',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap' ),
		array(),
		'1.0'
	);

}
add_action( 'wp_enqueue_scripts', 'auto_mechanic_scripts' );

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'auto_mechanic_loop_columns', 999);
if (!function_exists('auto_mechanic_loop_columns')) {
	function auto_mechanic_loop_columns() {
		return 3; // 3 products per row
	}
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/theme-library/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/theme-library/function-files/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/theme-library/function-files/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/theme-library/customizer.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/theme-library/function-files/class-breadcrumb-trail.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/theme-library/function-files/woocommerce.php';
}

/**
 * Getting Started
*/
require get_template_directory() . '/theme-library/getting-started/getting-started.php';


/**
 * GET STRAT FUNCTION
 */

function auto_mechanic_getpage_css($hook) {
	wp_enqueue_script( 'auto-mechanic-admin-script', get_template_directory_uri() . '/resource/js/auto-mechanic-admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script( 'auto-mechanic-admin-script', 'auto_mechanic_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
    wp_enqueue_style( 'auto-mechanic-notice-style', get_template_directory_uri() . '/resource/css/notice.css' );
}

add_action( 'admin_enqueue_scripts', 'auto_mechanic_getpage_css' );


add_action('wp_ajax_auto_mechanic_dismissable_notice', 'auto_mechanic_dismissable_notice');
function auto_mechanic_switch_theme() {
    delete_user_meta(get_current_user_id(), 'auto_mechanic_dismissable_notice');
}
add_action('after_switch_theme', 'auto_mechanic_switch_theme');
function auto_mechanic_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'auto_mechanic_dismissable_notice', true);
    die();
}

function auto_mechanic_deprecated_hook_admin_notice() {

    $auto_mechanic_dismissed = get_user_meta(get_current_user_id(), 'auto_mechanic_dismissable_notice', true);
    if ( !$auto_mechanic_dismissed) { ?>
        <div class="getstrat updated notice notice-success is-dismissible notice-get-started-class">
	    	
	    	<div class="at-admin-content" ><h2><?php esc_html_e('Welcome to Auto Mechanic', 'auto-mechanic'); ?></h2>
                <p><?php _e('Explore the features of our Pro Theme and take your Garage journey to the next level.', 'auto-mechanic'); ?></p>
                <p ><?php _e('Get Started With Theme By Clicking On Getting Started.', 'auto-mechanic'); ?><p>
                <div style="display: flex; justify-content: center;">

	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=auto-mechanic-getting-started' )); ?>"><?php esc_html_e( 'Get started', 'auto-mechanic' ) ?></a>
                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://demo.asterthemes.com/auto-mechanic/"><?php esc_html_e('View Demo', 'auto-mechanic') ?></a>
                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://asterthemes.com/products/mechanic-wordpress-theme/"><?php esc_html_e('Buy Now', 'auto-mechanic') ?></a>
                </div>
            </div>
            <div class="at-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'auto_mechanic_deprecated_hook_admin_notice' );


//Admin Notice For Getstart
function auto_mechanic_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}
function disable_woo_commerce_sidebar() {
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10); 
}
add_action('init', 'disable_woo_commerce_sidebar');
