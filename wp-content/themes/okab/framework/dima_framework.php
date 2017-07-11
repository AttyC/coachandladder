<?php
/**
 * DIMA Framework
 *
 * A flexible Wordpress Framework, created by PixelDima
 *
 * This file includes the superobject class and loads the parameters neccessary for the backend pages.
 * A new $dima superobject is then created that holds all data necessary for either front or backend, depending what page you are browsing
 *
 * @package Dima Framework
 * @author        PixelDima
 * @copyright    Copyright (c) PixelDima
 * @link        http://pixeldima.com
 * @since        Version 1.0.0
 * @version    1.0.0
 */

define( 'DIMA_FRAMEWORK_VERSION', "1.0.0" );

/**
 * Define Global Variables.
 */
define( 'DIMA_THEME_NAME', "Okab" );
define( 'DIMA_VERSION', dima_helper::dima_get_theme( 'Version' ) );
define( 'DIMA_SITE_URL', site_url() );
define( 'DIMA_TEMPLATE_PATH', get_template_directory() );
define( 'DIMA_TEMPLATE_URL', get_template_directory_uri() );
define( 'DIMA_VISUAL_COMOPSER_IS_ACTIVE', defined( 'WPB_VC_VERSION' ) );
define( 'DIMA_REVOLUTION_SLIDER_IS_ACTIVE', class_exists( 'RevSlider' ) );
define( 'DIMA_GRAVITY_FORMS_IS_ACTIVE', class_exists( 'GFForms' ) );
define( 'DIMA_CONTACT_FORM_7_IS_ACTIVE', class_exists( 'WPCF7_ContactForm' ) );
define( 'DIMA_WC_IS_ACTIVE', class_exists( 'WC_API' ) );
define( 'DIMA_KB_IS_ACTIVE', class_exists( 'Pressapps_Knowledge_Base' ) );
define( 'DIMA_SHORTCODES_IS_ACTIVE', class_exists( 'DIMA_SHORTCODES' ) );
define( 'DIMA_BBPRESS_IS_ACTIVE', class_exists( 'bbPress' ) );

$uploads = wp_upload_dir();
/**
 * Upload dir
 */
define( 'DIMA_WPCONTENT_DIR', $uploads['basedir'] );

/**
 * Upload url
 */
define( 'DIMA_WPCONTENT_URL', $uploads['baseurl'] );

?>