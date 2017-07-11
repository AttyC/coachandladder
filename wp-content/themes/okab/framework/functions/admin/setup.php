<?php
/**
 * Sets up theme defaults
 *
 * @package Dima Framework
 * @subpackage Admin
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! isset( $content_width ) ) :
	$content_width = dima_helper::dima_get_option( 'dima_content_max_width' );;
endif;

if ( ! function_exists( 'dima_setup_theme' ) ) :
	/**
	 *
	 */
	function dima_setup_theme() {

		// Translations
		load_theme_textdomain( 'okab', DIMA_TEMPLATE_PATH . '/languages' );

		//	Title Tag
		add_theme_support( 'title-tag' );

		// Enables Automatic Feed Links for post and comment in the head
		add_theme_support( 'automatic-feed-links' );

		// Allows a theme to register support "Post Formats"
		add_theme_support( 'post-formats', array( 'link', 'gallery', 'quote', 'image', 'video', 'audio', 'chat' ) );

		// Theme support for featured images and thumbnail sizes.
		add_theme_support( 'post-thumbnails' );
		// WordPress menus.
		// OKAB use two menu in two locations

		add_theme_support( 'customize-selective-refresh-widgets' );

		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'okab' ),
			'footer'  => esc_html__( 'Footer Menu', 'okab' )
		) );

		// Featured images.
		// add_image_size ( string $name, int $width, int $height, bool|array $crop = false )
		global $dima_theme_image_sizes;
		$dima_theme_image_sizes = array(
			'100x100'   => 'dima-thumbnails-small',
			'846x498'   => 'dima-post-standard-image',
			'350x230'   => 'dima-side-magazine-image',
			'110x73'    => 'dima-small-magazine-image',
			'585x343'   => 'dima-side-post-image',
			'585x9999'  => 'dima-massonry-image',
			'585x585'   => 'dima-portfolio-grid-image',
			'1110x9999' => 'dima-big-image-single',
		);

		$dima_theme_image_sizes_array = apply_filters( 'dima_theme_image_sizes', $dima_theme_image_sizes );
		$crop                         = apply_filters( 'dima_post_thumbnails_crop', true );

		if ( is_array( $dima_theme_image_sizes_array ) ) {
			foreach ( $dima_theme_image_sizes_array as $image_size_dimensions => $image_size_name ) {
				$dimensions = explode( 'x', $image_size_dimensions );

				if ( in_array( $image_size_name, array( 'dima-portfolio-image-single' ) ) ) {
					$crop = false;
				}
				if ( in_array( $image_size_name, array( 'dima-massonry-image' ) ) ) {
					$crop = false;
				}
				if ( in_array( $image_size_name, array( 'dima-big-image-single' ) ) ) {
					$crop = false;
				}
				add_image_size( $image_size_name, $dimensions[0], $dimensions[1], $crop );

				$crop = apply_filters( 'dima_post_thumbnails_crop', true );
			}
		}


		//Adding WooCommerce Support to theme
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		//add_theme_support( 'wc-product-gallery-zoom' );
		//add_theme_support( 'wc-product-gallery-slider' );

	}

	add_action( 'after_setup_theme', 'dima_setup_theme' );
endif;

/*-----------------------------------------------------------------------------------*/
/*	Editor Style
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'dima_add_editor_styles' );
function dima_add_editor_styles() {
	add_editor_style( get_stylesheet_uri() );
}