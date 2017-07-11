<?php
/**
 * Setup : Include all admin pages
 *
 * @package Dima Framework
 * @subpackage Admin Setup
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$addn_path = DIMA_TEMPLATE_PATH . '/framework/functions/admin/pixeldima-setup';

function pixeldima_setup_get_link_home() {
	return admin_url( 'admin.php?page=pixel-dima-dashboard' );
}


// Require Files
require_once( $addn_path . '/pixeldima-setup-settings.php' );
require_once( $addn_path . '/page-home.php' );
require_once( $addn_path . '/page-customizer-backup.php' );
require_once( $addn_path . '/page-demo-content.php' );
require_once( $addn_path . '/page-okab-plugins.php' );
require_once( $addn_path . '/page_system_status.php' );


// Setup Menu
function pixeldima_setup_add_menu() {
	add_theme_page(
		'OKAB: Home',
		'OKAB',
		'manage_options',
		'pixel-dima-dashboard',
		'pixeldima_setup_page_home'
	);

	add_theme_page(
		'OKAB: Plugins',
		esc_html__( 'OKAB Plugins', 'okab' ),
		'manage_options',
		'pixeldima-setup-plugins',
		'pixeldima_setup_plugins'
	);
}

add_action( 'admin_menu', 'pixeldima_setup_add_menu' );


// Activation Redirect
function pixeldima_setup_redirect() {
	if ( isset( $_GET['activated'] ) ) {
		wp_redirect( pixeldima_setup_get_link_home() );
	}
}

add_action( 'admin_init', 'pixeldima_setup_redirect' );