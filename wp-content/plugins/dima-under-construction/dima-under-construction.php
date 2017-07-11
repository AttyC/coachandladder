<?php

/*

Plugin Name: Dima &ndash; Under Construction
Plugin URI: http://pixledima.com
Description: Creates a 'Under Construction' page that will show for all users who are not logged in. Useful for developing a site on a live server, without the world being able to see it.
Version: 1.0.0
Author: PixelDima
Author URI: http://pixledima.com
Text Domain: _dima_

*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'DIMA_UNDER_CONSTRUCTION_VERSION', '1.0.0' );
define( 'DIMA_UNDER_CONSTRUCTION_URL', plugins_url( '', __FILE__ ) );
define( 'DIMA_UNDER_CONSTRUCTION_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

$DIMA_G_UC_OPTIONS = array();

/**
 * Setup Menu
 */
function dima_under_construction_options_page() {
	require( 'views/admin/options-page.php' );
}

function dima_under_construction_menu() {
	add_submenu_page( 'pixel-dima-dashboard', __( 'Under Construction', '_dima_' ), __( 'Under Construction', '_dima_' ), 'manage_options', 'pixeldima-under-construction', 'dima_under_construction_options_page' );
}

add_action( 'admin_menu', 'dima_under_construction_menu', 100 );


/**
 * Initialize
 */
function dima_under_construction_init() {
	load_plugin_textdomain( '_dima_', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
	require( 'functions/enqueue/styles.php' );
	require( 'functions/enqueue/scripts.php' );
	require( 'functions/notices.php' );
	require( 'functions/output.php' );
}

$THEME_ARRY = array( 'okab Child', 'OKAB', 'PixelDima' );
if ( in_array( wp_get_theme(), $THEME_ARRY ) ) {
	add_action( 'init', 'dima_under_construction_init' );
}
