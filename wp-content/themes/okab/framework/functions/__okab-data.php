<?php
/**
 * Get OKAB Options
 *
 * @package Dima Framework
 * @subpackage Functions
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

/**
 * Get Content Layout
 */
if ( ! function_exists( 'dima_get_content_layout' ) ):

	/**
	 * [Checks if the global content layout is "full-width" Or "mini",
	 * then it go through all possible pages to determine the correct layout for that template]
	 */
	function dima_get_content_layout() {

		$default_content_layout      = dima_helper::dima_get_option( 'dima_layout_content' );
		$default_shop_content_layout = dima_helper::dima_get_option( 'dima_shop_layout' );
		$default_bbp_content_layout  = dima_helper::dima_get_option( 'dima_layout_bbpress_content' );
		$section_layout              = dima_get_section_layout_meta();

		if ( $section_layout == 'full-width' && ( is_singular( 'page' ) || is_singular( 'dima-portfolio' ) ) ) {
			return "no-sidebar";
		}

		//with sidebar
		if ( is_page_template( 'template-right-sidebar.php' ) ) {
			$layout = 'right-sidebar';
		} elseif ( is_page_template( 'template-left-sidebar.php' ) ) {
			$layout = 'left-sidebar';
		} elseif ( is_page_template( 'template-no-sidebar.php' ) ) {
			$layout = 'no-sidebar';
		} elseif ( $default_content_layout != 'no-sidebar' OR $default_content_layout != 'mini' ) {

			if ( is_home() ) {
				$opt    = dima_helper::dima_get_option( 'dima_blog_layout' );
				$layout = ( $opt == '' ) ? $default_content_layout : $opt;

			} elseif ( dima_helper::dima_is_product() ) {
				$opt    = get_post_meta( get_the_ID(), '_dima_product_layout', true );
				$layout = ( $opt == '' ) ? $default_shop_content_layout : $opt;
			} elseif ( dima_helper::dima_is_bbpress() ) {
				$layout = $default_bbp_content_layout;
			} elseif ( is_singular( 'page' ) ) {
				$opt    = get_post_meta( get_the_ID(), '_dima_page_layout', true );
				$layout = ( $opt == '' ) ? $default_content_layout : $opt;
			} elseif ( is_singular( 'post' ) ) {
				$opt    = get_post_meta( get_the_ID(), '_dima_post_layout', true );
				$opt    = ( $opt == '' ) ? dima_helper::dima_get_option( 'dima_blog_layout' ) : $opt;
				$layout = ( $opt == '' ) ? $default_content_layout : $opt;

			} elseif ( is_singular( 'dima-portfolio' ) ) {
				$opt    = get_post_meta( get_the_ID(), '_dima_portfolio_layout', true );
				$layout = ( $opt == '' ) ? $default_content_layout : $opt;
			} elseif ( is_404() ) {
				$layout = 'full-width';
			} elseif ( is_archive() ) {
				if ( dima_helper::dima_is_shop() || dima_helper::dima_is_product_category() || dima_helper::dima_is_product_tag() ) {
					$opt    = dima_helper::dima_get_option( 'dima_shop_layout' );
					$layout = ( $opt == '' ) ? $default_content_layout : $opt;
				} else {
					$layout = $default_content_layout;
				}
			} else {
				$layout = $default_content_layout;
			}
		} else {
			$layout = $default_content_layout;
		}
		if ( $layout == '' ) {
			$layout = $default_content_layout;
		}

		return $layout;
	}
endif;

/**
 * Get Section Layout (Apply only on pages & portfolio )
 * Based on options selected in metabox.
 */
if ( ! function_exists( 'dima_get_section_layout_meta' ) ):
	/**
	 * @return string
	 */
	function dima_get_section_layout_meta() {
		$default_section_layout = "";
		if ( is_singular( 'page' ) ) {
			$meta   = get_post_meta( get_the_ID(), '_dima_page_section_fullwidth', true );
			$layout = ( $meta == 'on' ) ? 'full-width' : $default_section_layout;

		} elseif ( is_singular( 'dima-portfolio' ) ) {
			$meta   = get_post_meta( get_the_ID(), '_dima_portfolio_section_fullwidth', true );
			$layout = ( $meta == 'on' ) ? 'full-width' : $default_section_layout;
		} else {
			$layout = $default_section_layout;
		}

		return $layout;
	}
endif;

/**
 * Get Site Layoutclasses based on options selected in customization and metabox
 */
if ( ! function_exists( 'dima_get_site_layout' ) ):

	function dima_get_site_layout() {
		$default_site_layout = dima_helper::dima_get_option( 'dima_layout_site' );
		//if ( $default_site_layout != 'full-width' ) {

		if ( is_home() ) {
			$layout = $default_site_layout;
		} elseif ( is_singular( 'page' ) ) {
			$meta = get_post_meta( get_the_ID(), '_dima_page_site_layout', true );

			switch ( $meta ) {
				case 'full-widt':
					$layout = 'full-width';
					break;
				case 'boxed':
					$layout = 'boxed';
					break;

				default:
					$layout = $default_site_layout;
					break;
			}

		} else {
			$layout = $default_site_layout;
		}

		/*} else {
			$layout = $default_site_layout;
		}*/
		if ( $layout == 'framed' ) {
			$layout = 'boxed framed';
		}

		return $layout;
	}
endif;