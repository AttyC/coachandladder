<?php
/**
 * Setup : Include all admin pages
 *
 * @package Dima_Framework
 * @subpackage admin
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 * @copyright    (c) Copyright by PixelDima
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_settings_path = DIMA_TEMPLATE_PATH . '/framework/functions/admin/pixeldima-setup';

function pixeldima_sc_get_link_plugins() {
	return admin_url( 'admin.php?page=pixeldima-setup-plugins' );
}

// Require Files
if ( class_exists( "dima_helper" ) ) {
	require_once( $theme_settings_path . '/pixeldima-setup-settings.php' );
	require_once( $theme_settings_path . '/page-customizer-backup.php' );
	require_once( $theme_settings_path . '/page-demo-content.php' );
	require_once( $theme_settings_path . '/page-okab-plugins.php' );
	require_once( $theme_settings_path . '/page_system_status.php' );
}

// Setup Menu
function pixeldima_sc_setup_add_menu() {
	add_menu_page( 'OKAB: Home', 'OKAB', 'manage_options', 'pixel-dima-dashboard', 'pixeldima_setup_page_home', null, 3 );
	add_submenu_page( 'pixel-dima-dashboard', 'OKAB: Home', esc_html__( 'Welcome', 'okab' ), 'manage_options', 'pixel-dima-dashboard', 'pixeldima_setup_page_home' );
	add_submenu_page( 'pixel-dima-dashboard', 'OKAB: Demos', esc_html__( 'Install Demos', 'okab' ), 'manage_options', 'pixeldima-demo', 'pixeldima_setup_demo_content' );
	add_submenu_page( 'pixel-dima-dashboard', 'OKAB: Plugins', esc_html__( 'Plugins', 'okab' ), 'manage_options', 'pixeldima-setup-plugins', 'pixeldima_setup_plugins' );
	add_submenu_page( 'pixel-dima-dashboard', 'OKAB: backup', esc_html__( 'Customizer Backup', 'okab' ), 'manage_options', 'pixeldima-customizer-backup', 'pixeldima_page_customizer_backup' );
	add_submenu_page( 'pixel-dima-dashboard', 'OKAB: system', esc_html__( 'System Status', 'okab' ), 'manage_options', 'pixeldima-customizer-system', 'pixeldima_setup_page_system_status' );
}

add_action( 'admin_menu', 'pixeldima_sc_setup_add_menu' );
