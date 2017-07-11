<?php

/*
Plugin Name: DIMA-Shortcodes
Plugin URI: http://pixeldima.com/
Description: This plugin is required to run OKAB as it includes all of our shortcode functionality, which is tightly integrated into the theme.
Version: 1.2.3
Author: PixelDima
Author URI: http://pixeldima.com/
Text Domain: dimashortcodes
*/

/**
 *
 */
class DIMA_SHORTCODES {

	function __construct() {
		add_action( 'init', array( $this, 'dima_shortcodes_core_init' ) );
	}

	function dima_shortcodes_core_init() {
		load_plugin_textdomain( 'dimashortcodes', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		require_once( 'include/helper.php' );
		require_once( 'include/shortcodes.php' );
		require_once( 'include/scripts.php' );
		require_once( 'include/pixeldima-setup/setup.php' );
	}

}

$THEME_ARRY = array( 'okab Child', 'OKAB', 'PixelDima' );
if ( in_array( wp_get_theme(), $THEME_ARRY ) ) {
	new DIMA_SHORTCODES;
} else {
	add_action( 'admin_notices', 'dima_active_okab_theme' );
}
function dima_active_okab_theme() {
	?>
    <div class="notice notice-error is-dismissible">
        <p><?php esc_html_e( 'DIMA SHORTCODES plugin required OKAB Theme to be activated as the main theme', 'dima_shortcodes' ); ?></p>
    </div>
	<?php
}

define( 'DIMA_SHORTCODES_NAME', 'dima_shortcodes' );
define( 'DIMA_SHORTCODES_VERSION', '1.2.0' );
define( 'DIMA_SHORTCODES_URL', plugins_url( '', __FILE__ ) );
define( 'DIMA_SHORTCODES_TEMPLATE_URI', get_template_directory_uri() );
