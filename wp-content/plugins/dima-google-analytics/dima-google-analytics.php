<?php
/*

Plugin Name: Dima &ndash; Google Analytics
Plugin URI: http://pixledima.com
Description: Connect Google Analytics with WordPress by adding your Google Analytics tracking code.
Version: 1.0.0
Author: PixelDima
Author URI: http://pixledima.com
Text Domain: _dima_

*/

if ( ! defined( 'WPINC' ) ) {
	die;
}
$DIMA_GL_GA_OPTIONS = array();

define( 'DIMA_GOOGLE_ANALYTICS_VERSION', '1.0.0' );
define( 'DIMA_GOOGLE_ANALYTICS_URL', plugins_url( '', __FILE__ ) );
define( 'DIMA_GOOGLE_ANALYTICS_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

function dima_google_analytics_options_page() {
	require( 'views/options-page.php' );
}

function dima_google_analytics_menu() {
	add_submenu_page( 'pixel-dima-dashboard', __( 'Google Analytics', '_dima_' ), __( 'Google Analytics', '_dima_' ), 'manage_options', 'pixeldima-google-analytics', 'dima_google_analytics_options_page' );
}

add_action( 'admin_menu', 'dima_google_analytics_menu', 999 );

function dima_google_analytics_admin_notices() { ?>

	<?php if ( isset( $_POST['dima_google_analytics_submitted'] ) ) : ?>
		<?php if ( strip_tags( $_POST['dima_google_analytics_submitted'] ) == 'submitted' && current_user_can( 'manage_options' ) ) : ?>

			<div class="updated">
				<p><?php _e( 'All settings have been successfully saved.', '_DIMA_' ); ?></p>
			</div>

		<?php endif; ?>
	<?php endif; ?>

<?php }

add_action( 'admin_notices', 'dima_google_analytics_admin_notices' );

function dima_google_analytics_init() {
	load_plugin_textdomain( '_dima_', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
	require( 'functions/styles.php' );
	require( 'functions/scripts.php' );
	require( 'functions/output.php' );
}

add_action( 'init', 'dima_google_analytics_init' );