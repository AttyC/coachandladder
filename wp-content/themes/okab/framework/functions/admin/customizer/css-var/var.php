<?php
/**
 * Class and Function List:
 * Function list:
 * - navbar_padding()
 * - text_style()
 * Classes list:
 */

/**
 * Genirated CSS
 *
 * @package PHP-CSS
 * @subpackage var
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

/**
 * @param $var_nav_font_size
 * @param $NavHeight
 *
 * @return string
 */
function navbar_padding( $var_nav_font_size, $NavHeight ) {
	$top = ( $NavHeight - $var_nav_font_size ) / 2 + "px";

	return "$top" . "px";
}

function get_font_family_and_weight( $family = '', $weight = '' ) {
	$is_custom_fonts = dima_helper::dima_get_option( 'dima_custom_font' ) == '1';
	$output          = '';
	if ( $is_custom_fonts ) {
		if ( ! empty( $family ) ) {
			$output = "font-family: \"{$family}\",\"Helvetica Neue\",Helvetica,sans-serif;";
		}
		if ( ! empty( $weight ) ) {
			$output .= "font-weight: {$weight};";
		}
	}

	return $output;
}

function text_style( $styles, $important = '' ) {
	// Prepare variable
	$font_styles = "";

	if ( '' !== $styles && false !== $styles ) {
		// Convert string into array
		$styles_array = explode( '|', $styles );

		// If $important is in use, give it a space
		if ( $important && '' !== $important ) {
			$important = " " . $important;
		}

		// Use in_array to find values in strings. Otherwise, display default text

		// Font weight
		if ( in_array( 'bold', $styles_array ) ) {
			$font_styles .= "font-weight: bold{$important}; ";
		} else {
			$font_styles .= "font-weight: normal{$important}; ";
		}

		// Font style
		if ( in_array( 'italic', $styles_array ) ) {
			$font_styles .= "font-style: italic{$important}; ";
		} else {
			$font_styles .= "font-style: normal{$important}; ";
		}

		// Text-transform
		if ( in_array( 'uppercase', $styles_array ) ) {
			$font_styles .= "text-transform: uppercase{$important}; ";
		} else {
			$font_styles .= "text-transform: inherit{$important}; ";
		}

		// Text-decoration
		if ( in_array( 'underline', $styles_array ) ) {
			$font_styles .= "text-decoration: underline{$important}; ";
		} else {
			$font_styles .= "text-decoration: none{$important}; ";
		}
	}

	return esc_html( $font_styles );
}

$var_body_background_color   = dima_helper::dima_get_option( 'dima_body_background_color' );
$var_body_background_pattern = dima_helper::dima_get_option( 'dima_body_background_pattern' );
$var_body_background_image   = dima_helper::dima_get_option( 'dima_body_background_image' );
$var_container_width         = dima_helper::dima_get_option( 'dima_content_width' );
$var_container_max_width     = dima_helper::dima_get_option( 'dima_content_max_width' );
$var_header_logo_width       = dima_helper::dima_get_option( 'dima_header_logo_width' );
$var_boxed_margin            = dima_helper::dima_get_option( 'dima_boxed_margin' );
$var_body_text_color         = dima_helper::dima_get_option( 'dima_body_text_color' );
$var_body_link_color         = dima_helper::dima_get_option( 'dima_body_link_color' );
$var_body_link_color_hover   = dima_helper::dima_get_option( 'dima_body_link_color_hover' );
$var_main_color              = dima_helper::dima_get_option( 'dima_main_color' );

/**/
$var_nav_height_with_topbar              = intval( dima_helper::dima_get_option( 'dima_navbar_max_height' ) ) + 34;
$var_nav_height                          = dima_helper::dima_get_option( 'dima_navbar_max_height' );
$var_nav_height_shrink                   = dima_helper::dima_get_option( 'dima_navbar_shrink_height' );
$var_nav_height_after_shrink             = intval( $var_nav_height - $var_nav_height_shrink );
$var_nav_height_after_shrink_with_topbar = intval( $var_nav_height_with_topbar - $var_nav_height_shrink );
$var_nav_font_size                       = dima_helper::dima_get_option( 'dima_navbar_text_size' );
$var_nav_font_Bg_color                   = dima_helper::dima_get_option( 'dima_navbar_background_color' );
$var_nav_logo_on_top_background_color    = dima_helper::dima_get_option( 'dima_logo_on_top_background_color' );
$var_transparent_nav_font_Bg_color       = dima_helper::dima_get_option( 'dima_transparent_navbar_background_color' );
$var_transparent_nav_font_text_color     = dima_helper::dima_get_option( 'dima_transparent_navbar_text_color' );
$var_nav_font_Bg_color_after             = dima_helper::dima_get_option( 'dima_navbar_background_color_after' );
$var_nav_font_color                      = dima_helper::dima_get_option( 'dima_navbar_text_color' );
$var_nav_font_color_after                = dima_helper::dima_get_option( 'dima_navbar_text_color_after' );
$var_nav_font_color_hover                = dima_helper::dima_get_option( 'dima_navbar_text_hover_color' );

//submenu
$var_submenu_bg_color         = dima_helper::dima_get_option( 'dima_submenu_bg_color' );
$var_submenu_text_color       = dima_helper::dima_get_option( 'dima_submenu_text_color' );
$var_submenu_text_hover_color = dima_helper::dima_get_option( 'dima_submenu_text_hover_color' );
//!submenu

$var_nav_font_uppercase     = text_style( dima_helper::dima_get_option( 'dima_navbar_text_style' ) );
$var_nav_font_weights       = dima_helper::dima_get_option( 'dima_navbar_weights_list' );
$var_nav_font_slected       = dima_helper::dima_get_option( 'dima_navbar_weight_selected' );
$var_nav_font_family        = dima_helper::dima_get_option( 'dima_navbar_font_list' );
$var_header_navbar_position = dima_get_header_positioning();

//TOPBAR
$var_nav_topbar       = dima_helper::dima_get_option( 'dima_navbar_topbar' );
$var_nav_topbar_bg    = dima_helper::dima_get_option( 'dima_navbar_topbar_background' );
$var_nav_topbar_color = dima_helper::dima_get_option( 'dima_navbar_topbar_color' );

//BODY
$var_body_font_size            = dima_helper::dima_get_option( 'dima_body_text_size' );
$var_body_font_weights         = dima_helper::dima_get_option( 'dima_body_weights_list' );
$var_body_font_weight_selected = dima_helper::dima_get_option( 'dima_body_weight_selected' );
$var_body_font_family          = dima_helper::dima_get_option( 'dima_body_font_list' );

//LOGO
$var_logo_font_uppercase = text_style( dima_helper::dima_get_option( 'dima_logo_text_style' ) );
$var_logo_font_color     = dima_helper::dima_get_option( 'dima_logo_text_color' );
$var_logo_font_size      = intval( dima_helper::dima_get_option( 'dima_logo_text_size' ) );
$var_logo_letter_spacing = dima_helper::dima_get_option( 'dima_logo_letter_spacing' );
$var_logo_font_weights   = dima_helper::dima_get_option( 'dima_logo_weights_list' );
$var_logo_font_selcted   = dima_helper::dima_get_option( 'dima_logo_weight_selected' );
$var_logo_font_family    = dima_helper::dima_get_option( 'dima_logo_font_list' );

//HEADER
$var_heading_font_uppercase = text_style( dima_helper::dima_get_option( 'dima_heading_text_style' ) );
$var_heading_font_color     = dima_helper::dima_get_option( 'dima_heading_text_color' );
$var_heading_letter_spacing = dima_helper::dima_get_option( 'dima_heading_letter_spacing' );
$var_heading_font_Weights   = dima_helper::dima_get_option( 'dima_heading_weights_list' );
$var_heading_font_selected  = dima_helper::dima_get_option( 'dima_heading_weight_selected' );
$var_heading_font_family    = dima_helper::dima_get_option( 'dima_heading_font_list' );

//BLOG
$var_hover_overlay_bg = dima_helper::dima_get_option( 'dima_hover_overlay_bg' );

//footer
$var_top_footer_bg_color      = dima_helper::dima_get_option( 'dima_footer_content_top_bg' );
$var_bottom_footer_bg_color   = dima_helper::dima_get_option( 'dima_footer_content_bottom_bg' );
$var_bottom_footer_text_color = dima_helper::dima_get_option( 'dima_footer_content_body_color' );
$var_bottom_footer_link_color = dima_helper::dima_get_option( 'dima_footer_content_link_color' );
//WIDGET

$var_widget_header_text_size = dima_helper::dima_get_option( 'dima_footer_widget_header_size' );
$var_widget_header_uppercase = text_style( dima_helper::dima_get_option( 'dima_footer_widget_header_uppercase' ) );
$var_widget_body_text_size   = intval( dima_helper::dima_get_option( 'dima_footer_widget_body_size' ) );
$var_widget_body_uppercase   = text_style( dima_helper::dima_get_option( 'dima_footer_widget_body_uppercase' ) );
$var_widget_header_color     = dima_helper::dima_get_option( 'dima_footer_widget_header_color' );
$var_widget_body_color       = dima_helper::dima_get_option( 'dima_footer_widget_body_color' );
$var_widget_link_color       = dima_helper::dima_get_option( 'dima_footer_widget_link_color' );
$var_widget_border_color     = dima_helper::dima_get_option( 'dima_footer_widget_border_color' );

//SIDEBAR WIDGET
$var_widget_sidebar_header_text_size = intval( dima_helper::dima_get_option( 'dima_sidebar_widget_header_size' ) );
$var_widget_sidebar_header_uppercase = text_style( dima_helper::dima_get_option( 'dima_sidebar_widget_header_uppercase' ) );
$var_widget_sidebar_body_text_size   = intval( dima_helper::dima_get_option( 'dima_sidebar_widget_body_size' ) );
$var_widget_sidebar_body_uppercase   = text_style( dima_helper::dima_get_option( 'dima_sidebar_widget_body_uppercase' ) );

//Breaking News
$dima_news_title_bg         = dima_helper::dima_get_option( 'dima_news_title_bg' );
$dima_news_title_text_color = dima_helper::dima_get_option( 'dima_news_title_text_color' );
$dima_news_text_bg          = dima_helper::dima_get_option( 'dima_news_text_bg' );
$dima_news_text_color       = dima_helper::dima_get_option( 'dima_news_text_color' );
