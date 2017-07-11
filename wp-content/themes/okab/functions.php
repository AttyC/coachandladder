<?php
/**
 * Okab functions and definitions
 *
 * @package Okab
 * @subpackage 0-function
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
$dima_framework_path  = get_template_directory() . '/framework';
$dima_functions_path  = get_template_directory() . '/framework/functions';
$dima_admin_path      = get_template_directory() . '/framework/functions/admin';
$dima_tmg_path        = get_template_directory() . '/framework/functions/admin/tmg';
$dima_extensions_path = get_template_directory() . '/framework/functions/extensions';
$dima_plugins_path    = get_template_directory() . '/framework/plugins';
$dima_widgets_path    = get_template_directory() . '/framework/functions/widgets';

/**
 * Helpers
 */

require_once( $dima_functions_path . '/helper.php' );
require_once( $dima_framework_path . '/dima_framework.php' );
require_once( $dima_functions_path . '/__okab-data.php' );
require_once( $dima_functions_path . '/template-shortcode.php' );

/**
 * specific functions.
 */
require_once( $dima_functions_path . '/__okab-template.php' );

/**
 * Admin
 */
require_once( $dima_admin_path . '/setup.php' );
require_once( $dima_admin_path . '/meta/setup.php' );
require_once( $dima_admin_path . '/widgets.php' );
require_once( $dima_admin_path . '/customizer/setup.php' );
require_once( $dima_admin_path . '/pixeldima-setup/setup.php' );

/**
 * Enqueue scripts and styles.
 */
require_once( $dima_functions_path . '/scripts.php' );
require_once( $dima_functions_path . '/styles.php' );

/**
 * Global Function
 */
require_once( $dima_functions_path . '/featured.php' );
require_once( $dima_functions_path . '/pagination.php' );
require_once( $dima_functions_path . '/navbar.php' );
require_once( $dima_functions_path . '/content.php' );
require_once( $dima_functions_path . '/classes.php' );
require_once( $dima_functions_path . '/class-breadcrumbs.php' );


/**
 * Plugins
 */
require_once( $dima_extensions_path . '/dima-mega-menu/dima-mega-menu.php' );


/**
 * Implement the Custom Header feature.
 */
require_once( $dima_tmg_path . '/activation.php' );
require_once( $dima_tmg_path . '/registration.php' );
require_once( $dima_tmg_path . '/updates.php' );

/**
 * Widgets
 */
require_once( $dima_widgets_path . '/widget-about.php' );
require_once( $dima_widgets_path . '/widget-twitter.php' );
require_once( $dima_widgets_path . '/widget-facebook.php' );
require_once( $dima_widgets_path . '/widget-instagram.php' );
require_once( $dima_widgets_path . '/widget-login.php' );
require_once( $dima_widgets_path . '/widget-feedburner.php' );
require_once( $dima_widgets_path . '/widget-social.php' );
require_once( $dima_widgets_path . '/widget-tabs.php' );
require_once( $dima_widgets_path . '/widget-news.php' );
require_once( $dima_widgets_path . '/widget-ads.php' );
require_once( $dima_widgets_path . '/widget-adsense.php' );
require_once( $dima_widgets_path . '/widget-text-html.php' );
require_once( $dima_widgets_path . '/widget-slider.php' );

if ( ! function_exists( 'dima_set_post_views' ) ) {
	function dima_set_post_views( $postID ) {
		$count_key = 'dima_post_views_count';
		$count     = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
		} else {
			$count ++;
			update_post_meta( $postID, $count_key, $count );
		}
	}
}

if ( DIMA_VISUAL_COMOPSER_IS_ACTIVE ) {
	require_once( $dima_extensions_path . '/visual-composer.php' );
}
if ( DIMA_WC_IS_ACTIVE ) {
	require_once( $dima_extensions_path . '/woocommerce.php' );
}
if ( DIMA_KB_IS_ACTIVE ) {
	require_once( $dima_extensions_path . '/knowledge-base.php' );
}
if ( DIMA_BBPRESS_IS_ACTIVE ) {
	require_once( $dima_extensions_path . '/bbpress.php' );
}
if ( DIMA_REVOLUTION_SLIDER_IS_ACTIVE ) {
	require_once( $dima_extensions_path . '/revolution-slider.php' );
}