<?php

/*
Plugin Name: DIMA Portfolio
Plugin URI: http://pixeldima.com/
Description: Add Portfolio posts to your existing site in minutes.
Version: 1.0.2
Author: PixelDima
Author URI: http://pixeldima.com/
Text Domain: dima-portfolio
Domain Path: /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

//will check if version 5.3 below and throw error
if ( version_compare( PHP_VERSION, '5.3.0', '<' ) ) {
	deactivate_plugins( plugin_basename( dirname( __FILE__ ) ) );
	wp_die( __( 'The minimum PHP version required for this plugin is 5.3.0 Please upgrade the PHP version or contact your hosting provider to activate the plugin.', 'dima-portfolio' ) );
}

require_once( 'includes/class-dima-portfolio-i18n.php' );
require_once( 'includes/class-dima-portfolio-core.php' );

define( 'DIMA_CUSTOM_POST_VERSION', '1.0.2' );
define( 'DIMA_CUSTOM_POST_URL', plugins_url( '', __FILE__ ) );
define( 'DIMA_CUSTOM_POST_TEMPLATE_URI', get_template_directory_uri() );
