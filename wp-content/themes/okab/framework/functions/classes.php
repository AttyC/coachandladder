<?php
/**
 * Outputs custom classes for various elements,
 * sometimes based on options selected in customization.
 * sometimes based on options set on meta boxes.
 *
 * @package Dima Framework
 * @subpackage Functions
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 * TABLE OF CONTENTS
 *
 * - Body Classes
 * - Content classes
 * - Sidebar classes
 * - Navbar Class
 * - footer class
 *
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter that return body class
 */
if ( ! function_exists( 'dima_body_class' ) ):
	function dima_body_class( $output ) {

		$layout                = dima_get_site_layout();
		$is_blog               = is_home();
		$entry_id              = get_the_ID();
		$is_blog_style_masonry = esc_attr( dima_helper::dima_get_option( 'dima_blog_style' ) );

		$custom_class = esc_attr( get_post_meta( $entry_id, '_dima_entry_body_css_class', true ) );

		$output[] .= "$layout";

		if ( ! function_exists( 'dima_post_class' ) ):
			function dima_post_class( $output ) {
				switch ( has_post_thumbnail() ) {
					case true:
						$output[] .= 'has-post-thumbnail';
						break;
					case false:
						$output[] .= 'no-post-thumbnail';
						break;
				}

				return $output;
			}

			add_filter( 'post_class', 'dima_post_class' );
		endif;

		switch ( dima_get_header_positioning() ) {

			case 'static-top':
				$output[] .= 'dima-navbar-static-active';
				break;
			case 'fixed-top':
				$output[] .= 'dima-navbar-fixed-top-active';
				break;
			case 'fixed-left':

				$output[] .= 'vertical-menu vertical-menu-start';
				break;
			case 'fixed-right':
				$output[] .= 'vertical-menu vertical-menu-end';
				break;
		}

		if ( dima_is_one_page_navigation() ) {
			$output[] .= 'dima-one-page-navigation-active';
		}

		if ( dima_is_transparent_navigation() ) {
			$output[] .= 'dima-transparent-navigation-active';
		}

		/**
		 * Content layout.
		 */

		switch ( dima_get_content_layout() ) {
			case 'right-sidebar':
				$output[] .= 'right-content-sidebar-active';
				break;
			case 'left-sidebar':
				$output[] .= 'left-sidebar-content-active';
				break;
			case 'full-width':
				$output[] .= 'dima-full-width-active';
				break;
			case 'mini':
				$output[] .= 'dima-mini-width-active';
				break;
		}

		if ( dima_get_header_positioning() != "fixed-left" && dima_get_header_positioning() != "fixed-right" ) {

			switch ( dima_get_logo_positioning() ) {
				case 'logo-on-top' :
					$output[] .= 'dima-navbar-top-active';
					break;
				case 'logo-on-center' :
					$output[] .= 'dima-navbar-center-active';
					break;
			}
		}


		/**
		 * Blog and posts.
		 */
		if ( $is_blog ) {
			if ( $is_blog_style_masonry == 'masonry' ) {
				$output[] .= 'dima-masonry-active dima-blog-masonry-active';
			} elseif ( $is_blog_style_masonry == 'timeline' ) {
				$output[] .= 'dima-blog-timeline-active';
			} else {
				$output[] .= 'dima-blog-standard-active';
			}
		}

		if ( $custom_class != '' && ! is_home() ) {
			$output[] .= $custom_class;
		}

		return $output;
	}

	add_filter( 'body_class', 'dima_body_class' );
endif;


/**
 * Content class
 */
if ( ! function_exists( 'dima_main_content_class' ) ):

	/**
	 * [Get content classes based on options selected in customization and meta box']
	 */
	function dima_main_content_class() {
		switch ( dima_get_content_layout() ) {
			case 'right-sidebar':
				$output = ' dima-container float-start ';
				break;
			case 'left-sidebar':
				$output = ' dima-container float-end';
				break;
			case 'full-width':
				$output = ' dima-container full';
				break;
			case 'mini':
				$output = 'mini-width';
				break;
			default:
				$output = 'dima-container full';
				break;
		}
		echo $output;
	}
endif;

/**
 * Post Content class
 */
if ( ! function_exists( 'dima_pots_content_class' ) ):

	/**
	 * [Get content classes based on options selected in customization and meta box']
	 */
	function dima_pots_content_class() {
		$output         = "entry-content post-content text-start box";
		$is_custom_menu = get_post_meta( get_the_ID(), '_dima_post_custom_menu', true );

		if ( $is_custom_menu == 'on' ) {
			$output .= " custom-post";
		}
		echo $output;
	}
endif;

/**
 * Sidebar class
 */
if ( ! function_exists( 'dima_sidebar_class' ) ):

	/**
	 * [Get sidebar classes based on options selected in customization and metabox 'aside class dima_sidebar_class()']
	 */
	function dima_sidebar_class() {
		switch ( dima_get_content_layout() ) {
			case 'right-sidebar':
				$output = 'dima-sidebar hidden-tm hidden float-end';
				break;
			case 'left-sidebar':
				$output = 'dima-sidebar hidden-tm hidden float-start';
				break;
			default:
				$output = 'dima-sidebar hidden-tm hidden float-end';
		}
		echo $output;
	}
endif;

/**
 * Navbar Class
 * [Get navbar positioning classes based on options selected in customization]
 */
if ( ! function_exists( 'dima_navbar_class' ) ) :
	function dima_navbar_class() {
		switch ( dima_get_header_positioning() ) {
			case 'fixed-left' :
				$output = 'dima-navbar dima-navbar-vertical ';
				break;
			case 'fixed-right' :
				$output = 'dima-navbar dima-navbar-vertical ';
				break;
			case 'floating' :
				$output = 'dima-navbar dima-floating-menu container ';
				break;
			default :
				$output = 'dima-navbar ';
				break;
		}

		switch ( dima_get_header_animation() ) {
			case 'fixed-top' :
				$output .= 'fix-one ';
				break;
			case 'fixed-top-offset' :
				$output .= 'fix-two ';
				break;
			default :
				$output .= '';
				break;
		}

		if ( dima_is_transparent_navigation() ) {
			$output .= "dima-navbar-transparent";
		}
		echo $output;
	}
endif;

if ( ! function_exists( 'dima_navbar_wrap_desk_class' ) ):

	/**
	 * Logo potition.
	 */
	function dima_navbar_wrap_desk_class() {
		$is_topbar        = esc_attr( dima_helper::dima_get_option( 'dima_navbar_topbar' ) ) == '1';
		$logo_positioning = dima_get_logo_positioning();
		$nav_positioning  = esc_attr( dima_helper::dima_get_header_style() );
		$output           = 'dima-navbar-wrap desk-nav ';

		if ( ( $is_topbar && $logo_positioning != 'logo-on-top' ) && ( $nav_positioning != 'fixed-right' && $nav_positioning != 'fixed-left' ) ) {
			$output .= 'dima-topbar-active ';
		}
		if ( $nav_positioning == 'floating' ) {
			$output .= 'dima-floating-header ';
		}

		switch ( dima_get_logo_positioning() ) {
			case 'logo-on-top' :
				$output .= 'dima-navbar-top ';
				break;
			case 'logo-on-center' :
				$output .= 'dima-navbar-center ';
				break;
			case 'logo-on-inline' :
				$output .= 'dima-navbar-inline ';
				break;
			default :
				$output .= '';
				break;
		}
		echo $output;
	}
endif;

if ( ! function_exists( 'dima_navbar_wrap_mobile_class' ) ):
	/**
	 * [Get sidebar classes based on options selected in customization 'aside class dima_sidebar_class()']
	 */
	function dima_navbar_wrap_mobile_class() {
		$is_topbar = esc_attr( dima_helper::dima_get_option( 'dima_navbar_topbar' ) ) == '1';
		if ( $is_topbar ) {
			$output = 'dima-navbar-wrap mobile-nav dima-topbar-active';
		} else {
			$output = 'dima-navbar-wrap mobile-nav';
		}
		echo $output;
	}
endif;
/**
 * footer class
 */
if ( ! function_exists( 'dima_footer_class' ) ):
	/**
	 * [Get footer classes based on options selected in customization']
	 */
	function dima_footer_class() {
		$is_center = esc_attr( dima_helper::dima_get_option( 'dima_footer_bottom_center' ) ) == '1';
		if ( $is_center ) {
			$output = 'dima-footer text-center';
		} else {
			$output = 'dima-footer';
		}
		echo $output;
	}
endif;

