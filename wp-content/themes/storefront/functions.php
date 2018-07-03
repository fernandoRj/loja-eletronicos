<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version' => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce = require 'inc/woocommerce/class-storefront-woocommerce.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-storefront-nux-starter-content.php';
	}
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */

 
 
 function add_theme_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
 
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
  wp_enqueue_style( 'css', get_template_directory_uri() . '/css/css.css');
 
wp_enqueue_script('jquery-3.2.1', get_template_directory_uri() . '/js/jquery-3.2.1.js');
wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js');

  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
  
  
    
  
  
  
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


require_once('wp-bootstrap-navwalker.php');


add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'pesquisa', 'your_text_domain' ),
        'id' => 'pesquisa',
		'before_widget' => '<div>',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>'
    ) );
}




register_nav_menus( array(
        'primary' => __( 'second Menu', 'THEMENAME' ),
) );



