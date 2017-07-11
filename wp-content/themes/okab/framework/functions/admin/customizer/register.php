<?php

/**
 * Sets up the options for Customizer.
 *
 *
 * @package Dima Framework
 * @subpackage Admin customizer
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

/**
 * Class and Function List:
 * Function list:
 * - dima_register_theme_customizer_options()
 * - dima_customizer_controls_list()
 * - dima_customizer_options_list()
 * Classes list:
 */

/**
 * [Functions to register Options into customizer. using "customize_register" hook]
 *
 * @param  [WP_Customize_Manager] $wp_customize [WP_Customize_Manager instance]
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function dima_register_theme_customizer_options( $wp_customize ) {
	GLOBAL $dima_customizer_data;
	$customizer_path = DIMA_TEMPLATE_PATH . '/framework/functions/admin/customizer';
	include_once $customizer_path . '/choices.php';

	/*[2]=================================================*/
	$allowed_tags = array(
		'strong' => array(),
		'br'     => array(),
		'em'     => array(),
		'p'      => array( 'a' => true ),
		'a'      => array(
			'href'   => true,
			'target' => true,
			'title'  => true,
		)
	);

	//sanitize_callback functions
	function dima_validate_color( $value ) {
		$value = str_replace( ' ', '', $value );
		if ( empty( $value ) || is_array( $value ) ) {
			return 'rgba(0,0,0,0)';
		}
		// check hex color
		if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $value ) ) {
			return $value;
		} //check RGBA color
		elseif ( false !== strpos( $value, 'rgba' ) ) {
			sscanf( $value, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );

			return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
		} //check RGB color
		elseif ( false !== strpos( $value, 'rgb' ) ) {
			sscanf( $value, 'rgb(%d,%d,%d)', $red, $green, $blue );

			return 'rgb(' . $red . ',' . $green . ',' . $blue . ')';
		} else {
			return false;
		}
	}

	function dima_validate_slider( $value ) {
		if ( is_numeric( $value ) ) {
			return $value;
		} else {
			return false;
		}
	}

	function dima_validate_image( $value ) {
		return esc_url_raw( $value );
	}

	function dima_validate_radio( $value ) {
		if ( filter_var( $value, FILTER_VALIDATE_URL ) === false ) {
			return sanitize_key( $value );
		} else {
			return $value;
		}
	}

	function dima_validate_attr( $value ) {
		return esc_attr( $value );
	}

	function dima_validate_url( $value ) {
		return esc_url_raw( $value );
	}

	function dima_validate_textarea( $value ) {
		return esc_textarea( $value );
	}

	function dima_validate_html( $value ) {
		return esc_html( $value );
	}

	function dima_return_false( $value ) {
		return $value;
	}

	/**
	 * Out - Sections
	 */
	$i                  = 0;
	$DIMA['sections'][] = array(
		'dima_customizer_section_templates',
		esc_html__( 'Demos', 'okab' ),
		++ $i,
		''
	);
	$DIMA['sections'][] = array(
		'dima_customizer_section_layout',
		esc_html__( 'Site Layout and design', 'okab' ),
		++ $i,
		''
	);
	$DIMA['sections'][] = array(
		'dima_customizer_section_typography',
		esc_html__( 'Typography', 'okab' ),
		++ $i,
		''
	);
	$DIMA['panel'][]    = array(
		'dima_customizer_panel_header',
		esc_html__( 'Header', 'okab' ),
		esc_html__( 'Header', 'okab' ),
		++ $i,
	);
	//zaida zid taakad
	$DIMA['sections'][] = array(
		'dima_customizer_section_navbar',
		esc_html__( 'Header', 'okab' ),
		++ $i,
		'dima_customizer_panel_header'
	);
	$DIMA['sections'][] = array(
		'dima_customizer_section_navbar_style',
		esc_html__( 'Header Style', 'okab' ),
		++ $i,
		'dima_customizer_panel_header'
	);
	$DIMA['sections'][] = array(
		'dima_customizer_section_navbar_logo',
		esc_html__( 'Logo', 'okab' ),
		++ $i,
		'dima_customizer_panel_header'
	);
	$DIMA['sections'][] = array(
		'dima_customizer_section_navbar_logo_rtl',
		esc_html__( 'Logo (RTL)', 'okab' ),
		++ $i,
		'dima_customizer_panel_header'
	);
	$DIMA['sections'][] = array(
		'dima_customizer_section_navbar_menu',
		esc_html__( 'Menu', 'okab' ),
		++ $i,
		'dima_customizer_panel_header'
	);
	$DIMA['sections'][] = array(
		'dima_customizer_section_navbar_topbar',
		esc_html__( 'Topbar', 'okab' ),
		++ $i,
		'dima_customizer_panel_header'
	);
	$DIMA['sections'][] = array(
		'dima_customizer_section_navbar_breaking',
		esc_html__( 'Breaking', 'okab' ),
		++ $i,
		'dima_customizer_panel_header'
	);
	$DIMA['sections'][] = array(
		'dima_customizer_section_navbar_breadcrumbs',
		esc_html__( 'Breadcrumbs', 'okab' ),
		++ $i,
		'dima_customizer_panel_header'
	);
	$DIMA['sections'][] = array( 'dima_customizer_section_blog', esc_html__( 'Blog', 'okab' ), ++ $i, '' );
	$DIMA['sections'][] = array( 'dima_customizer_section_sidebar', esc_html__( 'Sidebar', 'okab' ), ++ $i, '' );
	$DIMA['sections'][] = array( 'dima_customizer_section_wc', esc_html__( 'WooCommerce', 'okab' ), ++ $i, '' );
	$DIMA['sections'][] = array( 'dima_customizer_section_bbp', esc_html__( 'bbPress', 'okab' ), ++ $i, '' );


	$DIMA['panel'][] = array(
		'dima_customizer_panel_footer',
		esc_html__( 'Footer', 'okab' ),
		esc_html__( 'Footer', 'okab' ),
		++ $i,
	);

	$DIMA['sections'][] = array(
		'dima_customizer_section_footer',
		esc_html__( 'Footer', 'okab' ),
		++ $i,
		'dima_customizer_panel_footer'
	);
	$DIMA['sections'][] = array(
		'dima_customizer_section_footer_widget',
		esc_html__( 'Widgets', 'okab' ),
		++ $i,
		'dima_customizer_panel_footer'
	);
	$DIMA['sections'][] = array( 'dima_customizer_section_social', esc_html__( 'Social', 'okab' ), ++ $i, '' );
	$DIMA['sections'][] = array( 'dima_customizer_global', esc_html__( 'Site icon & SEO', 'okab' ), ++ $i, '' );
	$DIMA['sections'][] = array(
		'dima_customizer_related_projects',
		esc_html__( 'Portfolio & Related Projects', 'okab' ),
		++ $i,
		''
	);
	$DIMA['sections'][] = array( 'dima_customizer_section_code', esc_html__( 'Code Fields', 'okab' ), 150, '' );
	$DIMA['sections'][] = array( 'dima_customizer_section_custom', esc_html__( 'Custom', 'okab' ), 150, '' );

	/**
	 * Options
	 */

	$DIMA['settings'][] = array( 'dima_layout_site', 'postMessage', 'dima_return_false', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_layout_site',
		'radio-image',
		esc_html__( 'Site Layout', 'okab' ),
		'dima_customizer_section_layout',
		$Choices_site_layouts,
		''
	);

	$DIMA['settings'][] = array( 'dima_layout_content', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_layout_content',
		'radio-image',
		esc_html__( 'Content Layout', 'okab' ),
		'dima_customizer_section_layout',
		$Choices_of_content_layouts,
		''
	);

	$DIMA['settings'][] = array( 'dima_header_navbar_position', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_header_navbar_position',
		'radio-image',
		esc_html__( 'Header Style', 'okab' ),
		'dima_customizer_section_navbar_style',
		$Choices_navbar_position,
		''
	);

	$DIMA['settings'][] = array( 'dima_header_navbar_animation', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_header_navbar_animation',
		'radio',
		esc_html__( 'Navbar Animation', 'okab' ),
		'dima_customizer_section_navbar_style',
		$Choices_navbar_animation,
		''
	);

	$DIMA['settings'][] = array( 'dima_header_navbar_offset_by_px', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_header_navbar_offset_by_px',
		'text',
		esc_html__( 'Offset By Pixels', 'okab' ),
		'dima_customizer_section_navbar_style',
		''
	);

	$DIMA['settings'][] = array( 'dima_header_navbar_offset_by_id', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_header_navbar_offset_by_id',
		'text',
		esc_html__( 'Offset By Elemnt Target', 'okab' ),
		'dima_customizer_section_navbar_style',
		''
	);

	$DIMA['settings'][] = array( 'dima_header_navbar_transparent', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_header_navbar_transparent',
		'radio_button_set',
		esc_html__( 'Navbar Transparent', 'okab' ),
		'dima_customizer_section_navbar_style',
		$Choices_on_off,
		''
	);
	$DIMA['settings'][] = array( 'dima_header_search_enable', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_header_search_enable',
		'radio_button_set',
		esc_html__( 'Search', 'okab' ),
		'dima_customizer_section_navbar_menu',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_max_height', 'refresh', 'dima_validate_slider' );
	$DIMA['controls'][] = array(
		'dima_navbar_max_height',
		'slider',
		esc_html__( 'Navbar height (px)', 'okab' ),
		$Choices_navbar_hight,
		'dima_customizer_section_navbar_style',
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_shrink_height', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_navbar_shrink_height',
		'text',
		esc_html__( 'Navbar Shrink (px)', 'okab' ),
		'dima_customizer_section_navbar_style',
		''
	);

	//====================================
	//RTL
	$DIMA['settings'][] = array( 'dima_header_logo_width', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_header_logo_width_rtl',
		'text',
		esc_html__( 'Logo Width (px)', 'okab' ),
		'dima_customizer_section_navbar_logo_rtl',
		''
	);

	$DIMA['settings'][] = array( 'dima_header_logo_rtl', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_header_logo_rtl',
		'image',
		esc_html__( 'Upload Your Logo', 'okab' ),
		'dima_customizer_section_navbar_logo_rtl',
		''
	);

	$DIMA['settings'][] = array( 'dima_header_sticky_logo_rtl', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_header_sticky_logo_rtl',
		'image',
		esc_html__( 'Upload Your Sticky Logo', 'okab' ),
		'dima_customizer_section_navbar_logo_rtl',
		''
	);

	$DIMA['settings'][] = array( 'dima_header_mobile_logo_rtl', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_header_mobile_logo_rtl',
		'image',
		esc_html__( 'Upload Your Mobile Logo', 'okab' ),
		'dima_customizer_section_navbar_logo_rtl',
		''
	);

	$DIMA['settings'][] = array( 'dima_header_logo_retina_rtl', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_header_logo_retina_rtl',
		'image',
		esc_html__( 'Upload Your Logo (Retina Version @2x)', 'okab' ),
		'dima_customizer_section_navbar_logo_rtl',
		''
	);
	$DIMA['settings'][] = array( 'dima_header_sticky_logo_retina_rtl', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_header_sticky_logo_retina_rtl',
		'image',
		esc_html__( 'Upload Your Sticky Logo (Retina Version @2x)', 'okab' ),
		'dima_customizer_section_navbar_logo_rtl',
		''
	);

	$DIMA['settings'][] = array( 'dima_header_mobile_logo_retina_rtl', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_header_mobile_logo_retina_rtl',
		'image',
		esc_html__( 'Upload Your Mobile Logo (Retina Version @2x)', 'okab' ),
		'dima_customizer_section_navbar_logo_rtl',
		''
	);
	//!RTL
	$DIMA['settings'][] = array( 'dima_logo_position', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_logo_position',
		'radio-image',
		esc_html__( 'Logo Position', 'okab' ),
		'dima_customizer_section_navbar_logo',
		$Choices_logo_position,
		''
	);

	$DIMA['settings'][] = array( 'dima_header_logo_width', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_header_logo_width',
		'text',
		esc_html__( 'Logo Width (px)', 'okab' ),
		'dima_customizer_section_navbar_logo',
		''
	);

	$DIMA['settings'][] = array( 'dima_header_logo', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_header_logo',
		'image',
		esc_html__( 'Upload Your Logo', 'okab' ),
		'dima_customizer_section_navbar_logo',
		''
	);

	$DIMA['settings'][] = array( 'dima_header_sticky_logo', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_header_sticky_logo',
		'image',
		esc_html__( 'Upload Your Sticky Logo', 'okab' ),
		'dima_customizer_section_navbar_logo',
		''
	);

	$DIMA['settings'][] = array( 'dima_header_mobile_logo', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_header_mobile_logo',
		'image',
		esc_html__( 'Upload Your Mobile Logo', 'okab' ),
		'dima_customizer_section_navbar_logo',
		''
	);

	$DIMA['settings'][] = array( 'dima_header_logo_retina', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_header_logo_retina',
		'image',
		esc_html__( 'Upload Your Logo (Retina Version @2x)', 'okab' ),
		'dima_customizer_section_navbar_logo',
		''
	);
	$DIMA['settings'][] = array( 'dima_header_sticky_logo_retina', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_header_sticky_logo_retina',
		'image',
		esc_html__( 'Upload Your Sticky Logo (Retina Version @2x)', 'okab' ),
		'dima_customizer_section_navbar_logo',
		''
	);

	$DIMA['settings'][] = array( 'dima_header_mobile_logo_retina', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_header_mobile_logo_retina',
		'image',
		esc_html__( 'Upload Your Mobile Logo (Retina Version @2x)', 'okab' ),
		'dima_customizer_section_navbar_logo',
		''
	);

	//====================================

	$DIMA['settings'][] = array( 'dima_navbar_background_color', 'postMessage', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_navbar_background_color',
		'color-alpha',
		esc_html__( 'NavBar Background Color', 'okab' ),
		'dima_customizer_section_navbar_menu',
		''
	);
	$DIMA['settings'][] = array( 'dima_logo_on_top_background_color', 'postMessage', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_logo_on_top_background_color',
		'color-alpha',
		esc_html__( 'Menu Background Color', 'okab' ),
		'dima_customizer_section_navbar_menu',
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_background_color_after', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_navbar_background_color_after',
		'color-alpha',
		esc_html__( 'NavBar Background Color after fixed', 'okab' ),
		'dima_customizer_section_navbar_menu',
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_text_color', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_navbar_text_color',
		'color-alpha',
		esc_html__( 'NavBar Text Color', 'okab' ),
		'dima_customizer_section_navbar_menu',
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_text_color_after', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_navbar_text_color_after',
		'color-alpha',
		esc_html__( 'NavBar Text Color after fixed', 'okab' ),
		'dima_customizer_section_navbar_menu',
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_text_hover_color', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_navbar_text_hover_color',
		'color-alpha',
		esc_html__( 'NavBar Text Hover Color', 'okab' ),
		'dima_customizer_section_navbar_menu',
		''
	);

	//Submenu
	$DIMA['settings'][] = array( 'dima_submenu_bg_color', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_submenu_bg_color',
		'color-alpha',
		esc_html__( 'Sub-Menu Background Color', 'okab' ),
		'dima_customizer_section_navbar_menu',
		''
	);

	$DIMA['settings'][] = array( 'dima_submenu_text_color', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_submenu_text_color',
		'color-alpha',
		esc_html__( 'Sub-Menu Text Color', 'okab' ),
		'dima_customizer_section_navbar_menu',
		''
	);

	$DIMA['settings'][] = array( 'dima_submenu_text_hover_color', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_submenu_text_hover_color',
		'color-alpha',
		esc_html__( 'Sub-Menu Text Hover Color', 'okab' ),
		'dima_customizer_section_navbar_menu',
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_background_image', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_navbar_background_image',
		'image',
		esc_html__( 'NavBar Background Image', 'okab' ),
		'dima_customizer_section_navbar_menu',
		esc_html__( 'Work with Fixed Right & Fixed Left menu', 'okab' )
	);


	$DIMA['settings'][] = array( 'dima_transparent_navbar_background_color', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_transparent_navbar_background_color',
		'color-alpha',
		esc_html__( 'Transparent NavBar Background Color', 'okab' ),
		'dima_customizer_section_navbar_menu',
		''
	);

	$DIMA['settings'][] = array( 'dima_transparent_navbar_text_color', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_transparent_navbar_text_color',
		'color-alpha',
		esc_html__( 'Transparent NavBar Text Color', 'okab' ),
		'dima_customizer_section_navbar_menu',
		''
	);


	//!Submenu


	/*--!NavBar--*/

	$DIMA['settings'][] = array( 'dima_navbar_topbar', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_navbar_topbar',
		'radio_button_set',
		esc_html__( 'Topbar', 'okab' ),
		'dima_customizer_section_navbar_topbar',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_topbar_background', 'postMessage', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_navbar_topbar_background',
		'color-alpha',
		esc_html__( 'TopBar Background Color', 'okab' ),
		'dima_customizer_section_navbar_topbar',
		''
	);
	$DIMA['settings'][] = array( 'dima_navbar_topbar_color', 'postMessage', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_navbar_topbar_color',
		'color-alpha',
		esc_html__( 'TopBar Text Color', 'okab' ),
		'dima_customizer_section_navbar_topbar',
		''
	);
	/*TOPBAR*/

	$DIMA['settings'][] = array( 'dima_navbar_option_address_display_topbar', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_navbar_option_address_display_topbar',
		'radio_button_set',
		esc_html__( 'Address Display', 'okab' ),
		'dima_customizer_section_navbar_topbar',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_option_tel_display_topbar', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_navbar_option_tel_display_topbar',
		'radio_button_set',
		esc_html__( 'Phone Display', 'okab' ),
		'dima_customizer_section_navbar_topbar',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_option_today_display_topbar', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_navbar_option_today_display_topbar',
		'radio_button_set',
		esc_html__( 'Today\'s Date', 'okab' ),
		'dima_customizer_section_navbar_topbar',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_option_myaccount_display_topbar', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_navbar_option_myaccount_display_topbar',
		'radio_button_set',
		esc_html__( 'My Account', 'okab' ),
		'dima_customizer_section_navbar_topbar',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_option_social_display_topbar', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_navbar_option_social_display_topbar',
		'radio_button_set',
		esc_html__( 'Social Networking', 'okab' ),
		'dima_customizer_section_navbar_topbar',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_option_address_text_topbar', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_navbar_option_address_text_topbar',
		'text',
		esc_html__( 'Address', 'okab' ),
		'dima_customizer_section_navbar_topbar',
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_option_tel_text_topbar', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_navbar_option_tel_text_topbar',
		'text',
		esc_html__( 'Phone', 'okab' ),
		'dima_customizer_section_navbar_topbar',
		''
	);

	//http://codex.wordpress.org/Formatting_Date_and_Time
	$DIMA['settings'][] = array( 'dima_navbar_option_today_text_topbar', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_navbar_option_today_text_topbar',
		'text',
		esc_html__( 'Today\'s Date Format', 'okab' ),
		'dima_customizer_section_navbar_topbar',
		wp_kses( __( 'For more details see <a href="https://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Formatting Date and Time</a>', 'okab' ), $allowed_tags )
	);


	/**/


	$DIMA['settings'][] = array( 'dima_page_title_display', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_page_title_display',
		'radio_button_set',
		esc_html__( 'Page Title Display', 'okab' ),
		'dima_customizer_section_navbar_breadcrumbs',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_breadcrumb_position', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_breadcrumb_position',
		'radio_button_set',
		esc_html__( 'Page Title Style', 'okab' ),
		'dima_customizer_section_navbar_breadcrumbs',
		$Choices_breadcrumb,
		''
	);

	$DIMA['settings'][] = array( 'dima_breadcrumb_display', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_breadcrumb_display',
		'radio_button_set',
		esc_html__( 'Breadcrumbs Display', 'okab' ),
		'dima_customizer_section_navbar_breadcrumbs',
		$Choices_on_off,
		''
	);
	$DIMA['settings'][] = array( 'dima_breadcrumb_background_image', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_breadcrumb_background_image',
		'image',
		esc_html__( 'Breadcrumbs Background Image', 'okab' ),
		'dima_customizer_section_navbar_breadcrumbs',
		''
	);


	/* <  News > */
	$DIMA['settings'][] = array( 'dima_news_display', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_news_display',
		'radio_button_set',
		esc_html__( 'Breaking News Bar', 'okab' ),
		'dima_customizer_section_navbar_breaking',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_news_display_home', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_news_display_home',
		'radio_button_set',
		esc_html__( 'Show in Homepage Only', 'okab' ),
		'dima_customizer_section_navbar_breaking',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_news_title', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_news_title',
		'text',
		esc_html__( 'News Title', 'okab' ),
		'dima_customizer_section_navbar_breaking',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_news_count', 'postMessage', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_news_count',
		'text',
		esc_html__( 'News Count', 'okab' ),
		'dima_customizer_section_navbar_breaking',
		''
	);

	$DIMA['settings'][] = array( 'dima_news_animation', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_news_animation',
		'radio_button_set',
		esc_html__( 'News Animation', 'okab' ),
		'dima_customizer_section_navbar_breaking',
		$Choices_slide_animation,
		''
	);

	$DIMA['settings'][] = array( 'dima_news_title_bg', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_news_title_bg',
		'color-alpha',
		esc_html__( 'News Title background Color', 'okab' ),
		'dima_customizer_section_navbar_breaking',
		''
	);

	$DIMA['settings'][] = array( 'dima_news_title_text_color', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_news_title_text_color',
		'color-alpha',
		esc_html__( 'News Title Text Color', 'okab' ),
		'dima_customizer_section_navbar_breaking',
		''
	);

	$DIMA['settings'][] = array( 'dima_news_text_bg', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_news_text_bg',
		'color-alpha',
		esc_html__( 'News background Color', 'okab' ),
		'dima_customizer_section_navbar_breaking',
		''
	);

	$DIMA['settings'][] = array( 'dima_news_text_color', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_news_text_color',
		'color-alpha',
		esc_html__( 'News Text Color', 'okab' ),
		'dima_customizer_section_navbar_breaking',
		''
	);

	$DIMA['settings'][] = array( 'dima_news_query', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_news_query',
		'radio_button_set',
		esc_html__( 'News Query Type', 'okab' ),
		'dima_customizer_section_navbar_breaking',
		$Choices_news_query_type,
		''
	);

	$DIMA['settings'][] = array( 'dima_news_cat_list', 'postMessage', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_news_cat_list',
		'multiple-select',
		esc_html__( 'Categories', 'okab' ),
		'dima_customizer_section_navbar_breaking',
		$Choices_category,
		''
	);

	$DIMA['settings'][] = array( 'dima_news_tag_list', 'postMessage', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_news_tag_list',
		'text',
		esc_html__( 'Tag', 'okab' ),
		'dima_customizer_section_navbar_breaking',
		''
	);


	$DIMA['settings'][] = array( 'dima_demo_name', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_demo_name',
		'radio',
		esc_html__( 'Select your demo', 'okab' ),
		'dima_customizer_section_templates',
		$Choices_demo,
		esc_html__( 'If you change the main demo,you will need to Import your demo customizer file, to set up all options correctly based on your demo selected.', 'okab' )
	);

	/* < (5) Body Backgound > */
	$DIMA['settings'][] = array( 'dima_body_background_color', 'postMessage', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_body_background_color',
		'color-alpha',
		esc_html__( 'Body Background', 'okab' ),
		'dima_customizer_section_layout',
		''
	);

	/* < (6) Body Background Pattern > */
	$DIMA['settings'][] = array( 'dima_body_background_pattern', 'postMessage', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_body_background_pattern',
		'image',
		esc_html__( 'Body Background Pattern', 'okab' ),
		'dima_customizer_section_layout',
		''
	);

	/* < (7) Body Background Image > */
	$DIMA['settings'][] = array( 'dima_body_background_image', 'postMessage', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_body_background_image',
		'image',
		esc_html__( 'Body Background Image', 'okab' ),
		'dima_customizer_section_layout',
		''
	);

	/* < (9) box margin > */
	$DIMA['settings'][] = array( 'dima_boxed_margin', 'postMessage', 'dima_validate_slider' );
	$DIMA['controls'][] = array(
		'dima_boxed_margin',
		'slider',
		esc_html__( 'Top & Bottom Margin (px)', 'okab' ),
		$Choices_boxed_margin,
		'dima_customizer_section_layout',
		''
	);

	/* < (8) content width > */
	$DIMA['settings'][] = array( 'dima_content_width', 'postMessage', 'dima_validate_slider' );
	$DIMA['controls'][] = array(
		'dima_content_width',
		'slider',
		esc_html__( 'Site Content Width (%)', 'okab' ),
		$Choices_sizing_content_width,
		'dima_customizer_section_layout',
		''
	);

	/* < (9) box width > */
	$DIMA['settings'][] = array( 'dima_content_max_width', 'postMessage', 'dima_validate_slider' );
	$DIMA['controls'][] = array(
		'dima_content_max_width',
		'slider',
		esc_html__( 'Site Max Content Width (px)', 'okab' ),
		$Choices_max_sizing_content_width,
		'dima_customizer_section_layout',
		''
	);

	$DIMA['settings'][] = array( 'dima_loading', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_loading',
		'radio_button_set',
		esc_html__( 'Loading Screen', 'okab' ),
		'dima_customizer_section_layout',
		$Choices_on_off,
		''
	);
	$DIMA['settings'][] = array( 'dima_dark_style', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_dark_style',
		'radio_button_set',
		esc_html__( 'Site Style', 'okab' ),
		'dima_customizer_section_layout',
		$Choices_dark_light,
		''
	);
	$DIMA['settings'][] = array( 'dima_smoothscroll', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_smoothscroll',
		'radio_button_set',
		esc_html__( 'Smooth Scroll', 'okab' ),
		'dima_customizer_section_layout',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_main_color', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_main_color',
		'color-alpha',
		esc_html__( 'Main color', 'okab' ),
		'dima_customizer_section_layout',
		''
	);


	/*==TypoGraphy==*/
	/*--Body--*/

	$DIMA['settings'][] = array( 'dima_custom_font', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_custom_font',
		'radio_button_set',
		esc_html__( 'Custom Fonts', 'okab' ),
		'dima_customizer_section_typography',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_body_font_list', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_body_font_list',
		'select',
		esc_html__( 'Body Font', 'okab' ),
		'dima_customizer_section_typography',
		$list_all_google_font_name,
		''
	);

	$DIMA['settings'][] = array(
		'dima_body_font_and_weight_list',
		$list_font_weights_and_name,
		'postMessage',
		'dima_return_false'
	);
	$DIMA['settings'][] = array( 'dima_body_weights_list', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_body_weights_list',
		'multi_check',
		esc_html__( 'Body Font Weights ( Included )', 'okab' ),
		'dima_customizer_section_typography',
		$list_all_font_weights,
		''
	);

	//$DIMA['settings'][] = array( 'dima_body_font_and_weight_list', $list_font_weights_and_name, 'postMessage','dima_return_false' );
	$DIMA['settings'][] = array( 'dima_body_weight_selected', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_body_weight_selected',
		'radio',
		esc_html__( 'Body Font Weights', 'okab' ),
		'dima_customizer_section_typography',
		$list_all_font_weight_selected,
		''
	);


	$DIMA['settings'][] = array( 'dima_body_subsets_list', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_body_subsets_list',
		'multi_check',
		esc_html__( 'Font Subsets', 'okab' ),
		'dima_customizer_section_typography',
		$list_font_subsets,
		''
	);

	$DIMA['settings'][] = array( 'dima_body_text_size', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_body_text_size',
		'text',
		esc_html__( 'Body Font Size (px)', 'okab' ),
		'dima_customizer_section_typography',
		''
	);

	$DIMA['settings'][] = array( 'dima_body_text_color', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_body_text_color',
		'color',
		esc_html__( 'Body text color', 'okab' ),
		'dima_customizer_section_typography',
		''
	);

	$DIMA['settings'][] = array( 'dima_body_link_color', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_body_link_color',
		'color',
		esc_html__( 'Text Link color', 'okab' ),
		'dima_customizer_section_typography',
		''
	);

	$DIMA['settings'][] = array( 'dima_body_link_color_hover', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_body_link_color_hover',
		'color',
		esc_html__( 'Text Link Hover color', 'okab' ),
		'dima_customizer_section_typography',
		''
	);

	/*--!Body--*/


	/*--headings--*/

	$DIMA['settings'][] = array( 'dima_heading_text_style', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_heading_text_style',
		'font_style',
		esc_html__( 'Heading Font Style', 'okab' ),
		'dima_customizer_section_typography',
		$Choices_font_style,
		''
	);

	$DIMA['settings'][] = array( 'dima_heading_font_list', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_heading_font_list',
		'select',
		esc_html__( 'Headings Font', 'okab' ),
		'dima_customizer_section_typography',
		$list_all_google_font_name,
		''
	);

	$DIMA['settings'][] = array(
		'dima_heading_font_and_weight_list',
		$list_font_weights_and_name,
		'postMessage',
		'dima_return_false'
	);
	$DIMA['settings'][] = array( 'dima_heading_weights_list', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_heading_weights_list',
		'multi_check',
		esc_html__( 'Heading Font Weights ( Included )', 'okab' ),
		'dima_customizer_section_typography',
		$list_all_font_weights,
		''
	);

	$DIMA['settings'][] = array( 'dima_heading_weight_selected', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_heading_weight_selected',
		'radio',
		esc_html__( 'Heading Font Weights', 'okab' ),
		'dima_customizer_section_typography',
		$list_all_font_weight_selected,
		''
	);


	$DIMA['settings'][] = array( 'dima_heading_letter_spacing', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_heading_letter_spacing',
		'text',
		esc_html__( 'Headings Letter Spacing (px)', 'okab' ),
		'dima_customizer_section_typography',
		''
	);

	$DIMA['settings'][] = array( 'dima_heading_text_color', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_heading_text_color',
		'color',
		esc_html__( 'Headings color', 'okab' ),
		'dima_customizer_section_typography',
		''
	);


	/*--!headings--*/

	/*--Menu--*/
	$DIMA['settings'][] = array( 'dima_navbar_text_style', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_navbar_text_style',
		'font_style',
		esc_html__( 'Navbar Font Style', 'okab' ),
		'dima_customizer_section_typography',
		$Choices_font_style,
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_font_list', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_navbar_font_list',
		'select',
		esc_html__( 'Navbar Font', 'okab' ),
		'dima_customizer_section_typography',
		$list_all_google_font_name,
		''
	);


	$DIMA['settings'][] = array(
		'dima_navbar_font_and_weight_list',
		$list_font_weights_and_name,
		'postMessage',
		'dima_return_false'
	);
	$DIMA['settings'][] = array( 'dima_navbar_weights_list', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_navbar_weights_list',
		'multi_check',
		esc_html__( 'Navbar Font Weights ( Included )', 'okab' ),
		'dima_customizer_section_typography',
		$list_all_font_weights,
		''
	);

	$DIMA['settings'][] = array( 'dima_navbar_weight_selected', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_navbar_weight_selected',
		'radio',
		esc_html__( 'Navbar Font Weights', 'okab' ),
		'dima_customizer_section_typography',
		$list_all_font_weight_selected,
		''
	);


	$DIMA['settings'][] = array( 'dima_navbar_text_size', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_navbar_text_size',
		'text',
		esc_html__( 'Navbar Font Size (px)', 'okab' ),
		'dima_customizer_section_typography',
		''
	);

	/*--logo--*/

	$DIMA['settings'][] = array( 'dima_logo_text_style', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_logo_text_style',
		'font_style',
		esc_html__( 'Logo Font Style', 'okab' ),
		'dima_customizer_section_typography',
		$Choices_font_style,
		''
	);

	$DIMA['settings'][] = array( 'dima_logo_font_list', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_logo_font_list',
		'select',
		esc_html__( 'Logo Font Weights ( Included )', 'okab' ),
		'dima_customizer_section_typography',
		$list_all_google_font_name,
		''
	);

	$DIMA['settings'][] = array(
		'dima_logo_font_and_weight_list',
		$list_font_weights_and_name,
		'postMessage',
		'dima_return_false'
	);
	$DIMA['settings'][] = array( 'dima_logo_weights_list', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_logo_weights_list',
		'multi_check',
		esc_html__( 'Logo Font Weights ( Included )', 'okab' ),
		'dima_customizer_section_typography',
		$list_all_font_weights,
		''
	);

	$DIMA['settings'][] = array( 'dima_logo_weight_selected', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_logo_weight_selected',
		'radio',
		esc_html__( 'Logo Font Weights', 'okab' ),
		'dima_customizer_section_typography',
		$list_all_font_weight_selected,
		''
	);


	$DIMA['settings'][] = array( 'dima_logo_text_size', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_logo_text_size',
		'text',
		esc_html__( 'Logo Font Size (px)', 'okab' ),
		'dima_customizer_section_typography',
		''
	);

	$DIMA['settings'][] = array( 'dima_logo_letter_spacing', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_logo_letter_spacing',
		'text',
		esc_html__( 'Logo Letter Spacing (px)', 'okab' ),
		'dima_customizer_section_typography',
		''
	);

	$DIMA['settings'][] = array( 'dima_logo_text_color', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_logo_text_color',
		'color',
		esc_html__( 'Logo Text Color', 'okab' ),
		'dima_customizer_section_typography',
		''
	);

	/*--!logo--*/

	/*--BLOG--*/

	$DIMA['settings'][] = array( 'dima_blog_style', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_blog_style',
		'radio-image',
		esc_html__( 'Posts Style', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_of_blog_styles,
		''
	);

	$DIMA['settings'][] = array( 'dima_blog_layout', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_blog_layout',
		'radio-image',
		esc_html__( 'Content Layout', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_of_section_layouts,
		''
	);

	$DIMA['settings'][] = array( 'dima_blog_masonry_columns', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_blog_masonry_columns',
		'radio',
		esc_html__( 'Columns', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_masonry_columns,
		''
	);


	$DIMA['settings'][] = array( 'dima_blog_enable_full_post_index', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_blog_enable_full_post_index',
		'radio_button_set',
		esc_html__( 'Full Post Content on Index', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_blog_blog_excerpt', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_blog_blog_excerpt',
		'text',
		esc_html__( 'Excerpt Limit', 'okab' ),
		'dima_customizer_section_blog',
		esc_html__( 'Displayed Post Excerpt', 'okab' ),
		''
	);

	$DIMA['settings'][] = array( 'dima_blog_enable_post_meta', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_blog_enable_post_meta',
		'radio_button_set',
		esc_html__( 'Display Post Meta', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_blog_enable_post_meta_cat', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_blog_enable_post_meta_cat',
		'radio_button_set',
		esc_html__( 'Display Categories Meta', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_blog_enable_post_meta_viwe', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_blog_enable_post_meta_viwe',
		'radio_button_set',
		esc_html__( 'Display Views Meta', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_blog_enable_featured_image', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_blog_enable_featured_image',
		'radio_button_set',
		esc_html__( 'Remove Featured Image', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_hover_overlay_bg', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_hover_overlay_bg',
		'color-alpha',
		esc_html__( 'Blog Hover Overlay Color', 'okab' ),
		'dima_customizer_section_blog',
		esc_html__( 'This hover will apply on portfolio and blog.', 'okab' ),
		''
	);

	$DIMA['settings'][] = array( 'dima_elm_hover', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_elm_hover',
		'radio',
		esc_html__( 'Blog Element Hover Effects ', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_element_hover,
		''
	);

	$DIMA['settings'][] = array( 'dima_img_hover', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_img_hover',
		'radio',
		esc_html__( 'Blog Image Hover Effects ', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_image_hover,
		''
	);

	$DIMA['settings'][] = array( 'dima_pagination_post', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_pagination_post',
		'radio_button_set',
		esc_html__( 'Display Previous/Next Pagination ', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_shear_icons_post', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shear_icons_post',
		'radio_button_set',
		esc_html__( 'Display Social Share Icons', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_author_post', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_author_post',
		'radio_button_set',
		esc_html__( 'Display Author Box', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_post_related_display', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_post_related_display',
		'radio_button_set',
		esc_html__( 'Display Related Posts', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_post_related_is_slide', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_post_related_is_slide',
		'radio_button_set',
		esc_html__( 'Related Posts Is Slide', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_post_related_columns', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_post_related_columns',
		'radio',
		esc_html__( 'Related Posts Columns', 'okab' ),
		'dima_customizer_section_blog',
		$Choices_masonry_columns,
		''
	);

	$DIMA['settings'][] = array( 'dima_post_related_count', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_post_related_count',
		'text',
		esc_html__( 'Related Posts Count', 'okab' ),
		'dima_customizer_section_blog',
		''
	);

	/*--!BLOG--*/

	/*--Sidebar*/

	$DIMA['settings'][] = array( 'dima_sidebar_widget_header_size', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_sidebar_widget_header_size',
		'text',
		esc_html__( 'Header text size', 'okab' ),
		'dima_customizer_section_sidebar',
		''
	);

	$DIMA['settings'][] = array( 'dima_sidebar_widget_header_uppercase', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_sidebar_widget_header_uppercase',
		'font_style',
		esc_html__( 'Font Style', 'okab' ),
		'dima_customizer_section_sidebar',
		$Choices_font_style,
		''
	);

	$DIMA['settings'][] = array( 'dima_sidebar_widget_body_size', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_sidebar_widget_body_size',
		'text',
		esc_html__( 'Body/Link Text Size', 'okab' ),
		'dima_customizer_section_sidebar',
		''
	);

	$DIMA['settings'][] = array( 'dima_sidebar_widget_body_uppercase', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_sidebar_widget_body_uppercase',
		'font_style',
		esc_html__( 'Font Style', 'okab' ),
		'dima_customizer_section_sidebar',
		$Choices_font_style,
		''
	);


	/*--!Sidebar*/

	/*--!Woo*/

	$DIMA['settings'][] = array( 'dima_shop_menu', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_menu',
		'radio_button_set',
		esc_html__( 'Navbar Menu', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_menu_price', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_menu_price',
		'radio_button_set',
		esc_html__( 'Cart Price', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_sub_menu', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_sub_menu',
		'radio_button_set',
		esc_html__( 'Menu Cart Display', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_on_off,
		''
	);


	$DIMA['settings'][] = array( 'dima_shop_layout', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_layout',
		'radio-image',
		esc_html__( 'Shop Layout', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_of_content_shop_layouts,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_columns', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_columns',
		'radio',
		esc_html__( 'Shop Columns', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_masonry_columns,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_posts_per_page', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_shop_posts_per_page',
		'text',
		esc_html__( 'Posts Per Page', 'okab' ),
		'dima_customizer_section_wc',
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_sort', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_sort',
		'radio_button_set',
		esc_html__( 'OKAB Sort', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_product_layout', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_product_layout',
		'radio_button_set',
		esc_html__( 'Product Layout', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_shop_product_layout,
		''
	);

	//Single
	$DIMA['settings'][] = array( 'dima_shop_product_tap_display', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_product_tap_display',
		'radio_button_set',
		esc_html__( 'Product Tabs', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_description_tap_display', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_description_tap_display',
		'radio_button_set',
		esc_html__( 'Description Tab', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_info_tap_display', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_info_tap_display',
		'radio_button_set',
		esc_html__( 'Additional Information Tab', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_reviews_tap_display', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_reviews_tap_display',
		'radio_button_set',
		esc_html__( 'Reviews Tab', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_shear_icons_shop', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shear_icons_shop',
		'radio_button_set',
		esc_html__( 'Show Social Share Icons', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_slide_animation', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_slide_animation',
		'radio_button_set',
		esc_html__( 'Slide Animation Type', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_slide_animation,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_related_products_display', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_related_products_display',
		'radio_button_set',
		esc_html__( 'Related Products', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_related_product_columns', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_related_product_columns',
		'radio',
		esc_html__( 'Related Product Columns', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_masonry_columns,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_related_product_count', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_shop_related_product_count',
		'text',
		esc_html__( 'Related Product Post Count', 'okab' ),
		'dima_customizer_section_wc',
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_upsells_display', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_upsells_display',
		'radio_button_set',
		esc_html__( 'Upsells', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_upsells_columns', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_upsells_columns',
		'radio',
		esc_html__( 'Upsell Columns', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_masonry_columns,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_upsells_count', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_shop_upsells_count',
		'text',
		esc_html__( 'Upsell Post Count', 'okab' ),
		'dima_customizer_section_wc',
		''
	);
	//cart
	$DIMA['settings'][] = array( 'dima_shop_cart_display', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_cart_display',
		'radio_button_set',
		esc_html__( 'Cross Sells', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_cart_columns', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_shop_cart_columns',
		'radio',
		esc_html__( 'Cross Sells Columns', 'okab' ),
		'dima_customizer_section_wc',
		$Choices_masonry_columns,
		''
	);

	$DIMA['settings'][] = array( 'dima_shop_cart_count', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_shop_cart_count',
		'text',
		esc_html__( 'Cross Sells Post Count', 'okab' ),
		'dima_customizer_section_wc',
		''
	);


	/*--!Woo*/

	/*Widgetbar*/

	/*!Widgetbar*/

	/*Footer*/

	$DIMA['settings'][] = array( 'dima_footer_big', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_footer_big',
		'radio_button_set',
		esc_html__( 'Big Footer', 'okab' ),
		'dima_customizer_section_footer',
		$Choices_on_off,
		''
	);


	$DIMA['settings'][] = array( 'dima_footer_bottom_center', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_footer_bottom_center',
		'radio_button_set',
		esc_html__( 'Footer In Center', 'okab' ),
		'dima_customizer_section_footer',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_bottom', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_footer_bottom',
		'radio_button_set',
		esc_html__( 'Small Footer', 'okab' ),
		'dima_customizer_section_footer',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_menu_display', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_footer_menu_display',
		'radio_button_set',
		esc_html__( 'Footer Menu', 'okab' ),
		'dima_customizer_section_footer',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_content_top_bg', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_footer_content_top_bg',
		'color-alpha',
		esc_html__( 'Footer Background Color', 'okab' ),
		'dima_customizer_section_footer',
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_content_bottom_bg', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_footer_content_bottom_bg',
		'color-alpha',
		esc_html__( 'Small Footer Background Color', 'okab' ),
		'dima_customizer_section_footer',
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_content_body_color', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_footer_content_body_color',
		'color',
		esc_html__( 'Small Footer Text Color', 'okab' ),
		'dima_customizer_section_footer',
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_content_link_color', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_footer_content_link_color',
		'color',
		esc_html__( 'Small Footer Link Color', 'okab' ),
		'dima_customizer_section_footer',
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_go_to_top', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_footer_go_to_top',
		'radio_button_set',
		esc_html__( 'Back To The Top Arrow', 'okab' ),
		'dima_customizer_section_footer',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_content_display', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_footer_content_display',
		'radio_button_set',
		esc_html__( 'Copyright Info', 'okab' ),
		'dima_customizer_section_footer',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array(
		'dima_footer_content_text',
		'refresh',
		'dima_return_false'
	);
	$DIMA['controls'][] = array(
		'dima_footer_content_text',
		'textarea',
		esc_html__( 'Copyright Content', 'okab' ),
		'dima_customizer_section_footer',
		''
	);

	/*widget*/
	$DIMA['settings'][] = array( 'dima_footer_widget_areas', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_footer_widget_areas',
		'radio',
		esc_html__( 'Footer Widget Areas', 'okab' ),
		'dima_customizer_section_footer_widget',
		$Choices_widget_areas,
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_widget_header_size', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_footer_widget_header_size',
		'text',
		esc_html__( 'Widget Header text size', 'okab' ),
		'dima_customizer_section_footer_widget',
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_widget_header_uppercase', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_footer_widget_header_uppercase',
		'font_style',
		esc_html__( 'Widget Header Font Style', 'okab' ),
		'dima_customizer_section_footer_widget',
		$Choices_font_style,
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_widget_body_size', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_footer_widget_body_size',
		'text',
		esc_html__( 'Widget Body/Link Text Size', 'okab' ),
		'dima_customizer_section_footer_widget',
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_widget_body_uppercase', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_footer_widget_body_uppercase',
		'font_style',
		esc_html__( 'Font Style', 'okab' ),
		'dima_customizer_section_footer_widget',
		$Choices_font_style,
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_widget_header_color', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_footer_widget_header_color',
		'color',
		esc_html__( 'Widget Header Color', 'okab' ),
		'dima_customizer_section_footer_widget',
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_widget_body_color', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_footer_widget_body_color',
		'color',
		esc_html__( 'Widget Text Color', 'okab' ),
		'dima_customizer_section_footer_widget',
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_widget_link_color', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_footer_widget_link_color',
		'color',
		esc_html__( 'Widget Link Color', 'okab' ),
		'dima_customizer_section_footer_widget',
		''
	);

	$DIMA['settings'][] = array( 'dima_footer_widget_border_color', 'refresh', 'dima_validate_color' );
	$DIMA['controls'][] = array(
		'dima_footer_widget_border_color',
		'color',
		esc_html__( 'Widget Border Color', 'okab' ),
		'dima_customizer_section_footer_widget',
		''
	);

	/**
	 * For wordpress under 4.7
	 * WP-UNDER-4.7
	 */
	if ( ! function_exists( "wp_get_custom_css" ) ) {
		$DIMA['settings'][] = array( 'dima_custom_style', 'refresh', 'dima_return_false' );
		$DIMA['controls'][] = array(
			'dima_custom_style',
			'textarea',
			esc_html__( 'CSS', 'okab' ),
			'dima_customizer_section_custom',
			''
		);
	}

	$DIMA['settings'][] = array( 'dima_custom_js', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_custom_js',
		'textarea',
		esc_html__( 'JavaScript', 'okab' ),
		'dima_customizer_section_custom',
		''
	);

	$DIMA['settings'][] = array( 'dima_space_before_head', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_space_before_head',
		'textarea',
		esc_html__( 'Space before &lt;/head&gt;', 'okab' ),
		'dima_customizer_section_code',
		esc_html__( 'Only accepts javascript code wrapped with &lt;script&gt;  tags and HTML markup that is valid inside the &lt;head&gt;  tag.', 'okab' )
	);

	$DIMA['settings'][] = array( 'dima_space_before_body', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_space_before_body',
		'textarea',
		esc_html__( 'Space before &lt;/body&gt;', 'okab' ),
		'dima_customizer_section_code',
		esc_html__( 'Only accepts javascript code, wrapped with &lt;script&gt; tags and valid HTML markup inside the &lt;body&gt; tag.', 'okab' )
	);

	$DIMA['settings'][] = array( 'dima_google_map_api_key', 'refresh', 'dima_validate_textarea' );
	$DIMA['controls'][] = array(
		'dima_google_map_api_key',
		'text',
		esc_html__( 'Gooele Map API Key', 'okab' ),
		'dima_customizer_section_code',
		esc_html__( '', 'okab' )
	);


	/*!widget*/

	/*!Footer*/

	/*social*/

	$DIMA['settings'][] = array( 'dima_social_facebook', 'refresh', 'dima_validate_url' );
	$DIMA['controls'][] = array(
		'dima_social_facebook',
		'text',
		esc_html__( 'Facebook', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	$DIMA['settings'][] = array( 'dima_social_twitter', 'refresh', 'dima_validate_url' );
	$DIMA['controls'][] = array(
		'dima_social_twitter',
		'text',
		esc_html__( 'Twitter', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	$DIMA['settings'][] = array( 'dima_social_googleplus', 'refresh', 'dima_validate_url' );
	$DIMA['controls'][] = array(
		'dima_social_googleplus',
		'text',
		esc_html__( 'Google+', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	$DIMA['settings'][] = array( 'dima_social_linkedin', 'refresh', 'dima_validate_url' );
	$DIMA['controls'][] = array(
		'dima_social_linkedin',
		'text',
		esc_html__( 'linkedin', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	$DIMA['settings'][] = array( 'dima_social_youtube', 'refresh', 'dima_validate_url' );
	$DIMA['controls'][] = array(
		'dima_social_youtube',
		'text',
		esc_html__( 'Youtube', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	$DIMA['settings'][] = array( 'dima_social_vimeo', 'refresh', 'dima_validate_url' );
	$DIMA['controls'][] = array(
		'dima_social_vimeo',
		'text',
		esc_html__( 'Vimeo', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	$DIMA['settings'][] = array( 'dima_social_foursquare', 'refresh', 'dima_validate_url' );
	$DIMA['controls'][] = array(
		'dima_social_foursquare',
		'text',
		esc_html__( 'Foursquare', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	$DIMA['settings'][] = array( 'dima_social_tumblr', 'refresh', 'dima_validate_url' );
	$DIMA['controls'][] = array(
		'dima_social_tumblr',
		'text',
		esc_html__( 'Tumblr', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	$DIMA['settings'][] = array( 'dima_social_instagram', 'refresh', 'dima_validate_url' );
	$DIMA['controls'][] = array(
		'dima_social_instagram',
		'text',
		esc_html__( 'Instagram', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	$DIMA['settings'][] = array( 'dima_social_dribbble', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_social_dribbble',
		'text',
		esc_html__( 'Dribbble', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	$DIMA['settings'][] = array( 'dima_social_flickr', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_social_flickr',
		'text',
		esc_html__( 'Flickr', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	$DIMA['settings'][] = array( 'dima_social_behance', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_social_behance',
		'text',
		esc_html__( 'Behance', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	$DIMA['settings'][] = array( 'dima_social_pinterest', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_social_pinterest',
		'text',
		esc_html__( 'Pinterest', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	$DIMA['settings'][] = array( 'dima_social_whatsapp', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_social_whatsapp',
		'text',
		esc_html__( 'Whatsapp', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	$DIMA['settings'][] = array( 'dima_social_soundcloud', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_social_soundcloud',
		'text',
		esc_html__( 'Soundcloud', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	$DIMA['settings'][] = array( 'dima_social_rss', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_social_rss',
		'text',
		esc_html__( 'RSS', 'okab' ),
		'dima_customizer_section_social',
		''
	);

	/*social*/

	//WP-UNDER-4.3
	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
		$DIMA['settings'][] = array( 'dima_favicon', 'refresh', 'dima_validate_image' );
		$DIMA['controls'][] = array(
			'dima_favicon',
			'image',
			esc_html__( 'Upload Favicon', 'okab' ),
			'dima_customizer_global',
			wp_kses( __( 'There are many favicon generators available online, such as  <a href="http://www.convertico.com/" target="_blank" title="Convertico">Convertico</a> and <a href="http://www.favicon.co.uk/" target="_blank" title="Favicon.co.uk">Favicon.co.uk</a>.', 'okab' ), $allowed_tags )
		);
	}

	$DIMA['settings'][] = array( 'dima_iphone_icon', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_iphone_icon',
		'image',
		esc_html__( 'Apple iPhone Icon', 'okab' ),
		'dima_customizer_global',
		esc_html__( 'Icon for Apple iPhone (57px x 57px)', 'okab' )
	);

	$DIMA['settings'][] = array( 'dima_iphone_retina_icon', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_iphone_retina_icon',
		'image',
		esc_html__( 'Apple iPhone Retina Icon', 'okab' ),
		'dima_customizer_global',
		esc_html__( 'Icon for Apple iPhone Retina Version (120px x 120px)', 'okab' )
	);

	$DIMA['settings'][] = array( 'dima_ipad_icon', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_ipad_icon',
		'image',
		esc_html__( 'Apple iPad Icon', 'okab' ),
		'dima_customizer_global',
		esc_html__( 'Icon for Apple iPhone (72px x 72px)', 'okab' )
	);

	$DIMA['settings'][] = array( 'dima_ipad_retina_icon', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_ipad_retina_icon',
		'image',
		esc_html__( 'Apple iPad Retina Icon', 'okab' ),
		'dima_customizer_global',
		esc_html__( 'Icon for Apple iPad Retina Version (144px x 144px)', 'okab' )
	);


	$DIMA['settings'][] = array( 'dima_open_graph_meta_tag', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_open_graph_meta_tag',
		'radio_button_set',
		esc_html__( 'Open Graph', 'okab' ),
		'dima_customizer_global',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_opengraph_image', 'refresh', 'dima_validate_image' );
	$DIMA['controls'][] = array(
		'dima_opengraph_image',
		'image',
		esc_html__( 'Upload opengraph image', 'okab' ),
		'dima_customizer_global',
		esc_html__( 'Image URL which should represent your object within the graph.', 'okab' )
	);


	$DIMA['settings'][] = array( 'dima_projects_related_display', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_projects_related_display',
		'radio_button_set',
		esc_html__( 'Display Related Projects', 'okab' ),
		'dima_customizer_related_projects',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_projects_related_style', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_projects_related_style',
		'radio_button_set',
		esc_html__( 'Related Projects Style', 'okab' ),
		'dima_customizer_related_projects',
		$Choices_related_projects_style,
		''
	);

	$DIMA['settings'][] = array( 'dima_projects_related_columns', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_projects_related_columns',
		'radio',
		esc_html__( 'Related Projects Columns', 'okab' ),
		'dima_customizer_related_projects',
		$Choices_masonry_columns,
		''
	);

	$DIMA['settings'][] = array( 'dima_projects_related_count', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_projects_related_count',
		'text',
		esc_html__( 'Related Projects Count', 'okab' ),
		'dima_customizer_related_projects',
		''
	);

	$DIMA['settings'][] = array( 'dima_projects_related_elm_hover', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_projects_related_elm_hover',
		'radio',
		esc_html__( 'Related Projects Element Hover Effects ', 'okab' ),
		'dima_customizer_related_projects',
		$Choices_element_hover_related_projects,
		''
	);


	$DIMA['settings'][] = array( 'dima_projects_related_img_hover', 'refresh', 'dima_return_false' );
	$DIMA['controls'][] = array(
		'dima_projects_related_img_hover',
		'radio',
		esc_html__( 'Related Projects Image Hover Effects ', 'okab' ),
		'dima_customizer_related_projects',
		$Choices_image_hover,
		''
	);

	$DIMA['settings'][] = array( 'dima_projects_related_border', 'refresh', 'dima_validate_radio' );
	$DIMA['controls'][] = array(
		'dima_projects_related_border',
		'radio_button_set',
		esc_html__( 'Related Projects Border on Hover', 'okab' ),
		'dima_customizer_related_projects',
		$Choices_on_off,
		''
	);

	$DIMA['settings'][] = array( 'dima_projects_slug_name', 'refresh', 'dima_validate_attr' );
	$DIMA['controls'][] = array(
		'dima_projects_slug_name',
		'text',
		esc_html__( 'Portfolio Slug name', 'okab' ),
		'dima_customizer_related_projects',
		'',
	);

	if ( DIMA_BBPRESS_IS_ACTIVE ) {
		$DIMA['settings'][] = array( 'dima_layout_bbpress_content', 'refresh', 'dima_validate_radio' );
		$DIMA['controls'][] = array(
			'dima_layout_bbpress_content',
			'radio-image',
			esc_html__( 'Content Layout', 'okab' ),
			'dima_customizer_section_bbp',
			$Choices_of_content_layouts,
			''
		);
	}

	dima_customizer_controls_list( $DIMA, $wp_customize, $dima_customizer_data );
}


GLOBAL $dima_customizer_data;
/**
 * [List of Controls]
 *
 * @param  [array 2D] $DIMA     [Content 4 type of variables 1: Settings 2: Sections 3: Controls  3: Panel]
 * @param  [type] $wp_customize [WP_Customize_Manager instance]
 */
function dima_customizer_controls_list( $DIMA, $wp_customize, $customizer_data ) {
	/** @var wpdb $wpdb */

	foreach ( $DIMA['panel'] as $panel ) {
		$wp_customize->add_panel(
			$panel[0],
			array(
				'title'       => $panel[1],
				'description' => $panel[2],
				'priority'    => $panel[3]
			)
		);
	}

	/**
	 * Out - Sections.
	 */

	foreach ( $DIMA['sections'] as $section ) {
		$wp_customize->add_section(
			$section[0],
			array(
				'title'    => $section[1],
				'priority' => $section[2],
				'panel'    => $section[3]
			)
		);
	}

	/**
	 * Out - Settings
	 */

	foreach ( $DIMA['settings'] as $setting ) {
		$wp_customize->add_setting(
			$setting[0],
			array(
				'type'              => 'option',
				'default'           => $customizer_data[ $setting[0] ],
				'transport'         => $setting[1],
				'sanitize_callback' => $setting[2]
			)
		);
	}

	foreach ( $DIMA['controls'] as $control ) {

		static $priority = 1;
		/**
		 * 1-radio - select
		 * 3-radio_button_set
		 * 4-multi_check
		 * 5-checkbox - text
		 * 6-textarea
		 * 7-slider
		 * 8-color
		 * 9-image
		 */
		if ( $control[1] == 'radio' || $control[1] == 'select' ) {
			$wp_customize->add_control(
				$control[0],
				array(
					'type'        => $control[1],
					'label'       => $control[2],
					'section'     => $control[3],
					'choices'     => $control[4],
					'description' => $control[5],
					'priority'    => $priority
				)
			);
		} elseif ( $control[1] == 'radio_button_set' ) {

			$wp_customize->add_control(
				new dima_custom_control_radio_button_set(
					$wp_customize,
					$control[0],
					array(
						'type'        => $control[1],
						'label'       => $control[2],
						'section'     => $control[3],
						'choices'     => $control[4],
						'description' => $control[5],
						'priority'    => $priority
					)
				) );
		} elseif ( $control[1] == 'radio-image' ) {
			$wp_customize->add_control(
				new dima_custom_control_radio_image(
					$wp_customize,
					$control[0],
					array(
						'type'        => $control[1],
						'label'       => $control[2],
						'section'     => $control[3],
						'choices'     => $control[4],
						'description' => $control[5],
						'priority'    => $priority
					)
				) );
		} elseif ( $control[1] == 'font_style' ) {
			$wp_customize->add_control(
				new dima_custom_control_font_style(
					$wp_customize,
					$control[0],
					array(
						'type'        => $control[1],
						'label'       => $control[2],
						'section'     => $control[3],
						'choices'     => $control[4],
						'description' => $control[5],
						'priority'    => $priority
					)
				) );
		} elseif ( $control[1] == 'multi_check' ) {
			$wp_customize->add_control(
				new dima_custom_control_multi_check(
					$wp_customize,
					$control[0],
					array(
						'type'        => $control[1],
						'label'       => $control[2],
						'section'     => $control[3],
						'choices'     => $control[4],
						'description' => $control[5],
						'priority'    => $priority
					)
				)
			);
		} elseif ( $control[1] == 'multiple-select' ) {
			$wp_customize->add_control(
				new dima_custom_control_multiple_select(
					$wp_customize,
					$control[0],
					array(
						'type'        => $control[1],
						'label'       => $control[2],
						'section'     => $control[3],
						'choices'     => $control[4],
						'description' => $control[5],
						'priority'    => $priority
					)
				)
			);
		} elseif ( $control[1] == 'checkbox' || $control[1] == 'text' ) {
			$wp_customize->add_control(
				$control[0],
				array(
					'type'        => $control[1],
					'label'       => $control[2],
					'section'     => $control[3],
					'description' => $control[4],
					'priority'    => $priority
				)
			);
		} elseif ( $control[1] == 'textarea' ) {

			$wp_customize->add_control(
				new dima_custom_control_textarea(
					$wp_customize,
					$control[0],
					array(
						'label'       => $control[2],
						'section'     => $control[3],
						'settings'    => $control[0],
						'description' => $control[4],
						'priority'    => $priority
					)
				)
			);
		} elseif ( $control[1] == 'slider' ) {
			$wp_customize->add_control(
				new dima_custom_control_slider(
					$wp_customize,
					$control[0],
					array(
						'label'       => $control[2],
						'section'     => $control[4],
						'settings'    => $control[0],
						'choices'     => $control[3],
						'description' => $control[5],
						'priority'    => $priority
					)
				)
			);
		} elseif ( $control[1] == 'color' ) {
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					$control[0],
					array(
						'label'       => $control[2],
						'settings'    => $control[0],
						'section'     => $control[3],
						'description' => $control[4],
						'priority'    => $priority
					)
				)
			);
		} elseif ( $control[1] == 'color-alpha' ) {
			$wp_customize->add_control(
				new dima_custom_control_color_alpha(
					$wp_customize,
					$control[0],
					array(
						'label'       => $control[2],
						'settings'    => $control[0],
						'section'     => $control[3],
						'description' => $control[4],
						'priority'    => $priority
					)
				)
			);
		} elseif ( $control[1] == 'image' ) {
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					$control[0],
					array(
						'label'       => $control[2],
						'section'     => $control[3],
						'settings'    => $control[0],
						'description' => $control[4],
						'priority'    => $priority
					)
				)
			);
		}

		$priority ++;
	}

	/**
	 * Selective Refresh for Custom Options
	 */
	//Logo
	$wp_customize->selective_refresh->add_partial( 'dima_header_logo', array(
		'selector'        => '.site-title a',
		'render_callback' => 'okab_customize_partial_blogname',
	) );
	//Menu
	$wp_customize->selective_refresh->add_partial( 'dima_header_search_enable', array(
		'selector'        => '.dima-navbar-wrap .dima-nav',
		'render_callback' => 'okab_customize_partial_blogname',
	) );

	//sidebar
	$wp_customize->selective_refresh->add_partial( 'dima_layout_content', array(
		'selector'        => '.dima-sidebar',
		'render_callback' => 'okab_customize_partial_blogname',
	) );

	//copyright
	$wp_customize->selective_refresh->add_partial( 'dima_footer_content_text', array(
		'selector'        => '.dima-footer .copyright ',
		'render_callback' => 'okab_customize_partial_blogname',
	) );
	//Footer menu
	$wp_customize->selective_refresh->add_partial( 'dima_footer_menu_display', array(
		'selector'        => '.dima-footer .dima-menu ',
		'render_callback' => 'okab_customize_partial_blogname',
	) );
	//****//
}

add_action( 'customize_register', 'dima_register_theme_customizer_options' );

