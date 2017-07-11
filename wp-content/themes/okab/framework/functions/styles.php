<?php
/**
 * Theme styles , include style bsed on demo name.
 * include google font url.
 *
 * @package Dima Framework
 * @subpackage Functions
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'dima_global_styles' ) ) :

	function dima_global_styles() {
		$is_custom_fonts    = dima_helper::dima_get_option( 'dima_custom_font' ) == '1';
		$dima_css_dir       = '/framework/asset/site/css/';
		$dima_css_style_dir = '/framework/asset/site/css/styles/';
		$demo               = dima_demo_name::get_installed_demo();
		$dima_design        = dima_helper::dima_get_option( 'dima_dark_style' );


		switch ( $demo ) {
			case 'business':
				$rtl = is_rtl() ? '-rtl' : '';
				$ext = '';
				break;
			case 'business_rtl':
				$demo = 'business';
				$rtl  = is_rtl() ? '-rtl' : '';
				$ext  = '';
				break;
			case 'business_finance':
				$demo = 'business_finance';
				$rtl  = is_rtl() ? '-rtl' : '';
				$ext  = '';
				break;
			case 'okab':
				$rtl = is_rtl() ? '-rtl' : '';
				$ext = ( $dima_design == 'dark' ) ? '-dark' : '';
				break;
			default:
				$rtl = is_rtl() ? '-rtl' : '';
				$ext = '';
		}

		$body_font_family           = dima_helper::dima_get_option( 'dima_body_font_list' );
		$body_font_weight_and_style = dima_helper::dima_get_option( 'dima_body_weights_list' );
		$body_font_weight           = $body_font_weight_and_style;//dima_get_font_weight()

		$heading_font_family           = dima_helper::dima_get_option( 'dima_heading_font_list' );
		$heading_font_weight_and_style = dima_helper::dima_get_option( 'dima_heading_weights_list' );
		$heading_font_weight           = $heading_font_weight_and_style;

		$logo_font_family           = dima_helper::dima_get_option( 'dima_logo_font_list' );
		$logo_font_weight_and_style = dima_helper::dima_get_option( 'dima_logo_weights_list' );
		$logo_font_weight           = $logo_font_weight_and_style;

		$navbar_font_family           = dima_helper::dima_get_option( 'dima_navbar_font_list' );
		$navbar_font_weight_and_style = dima_helper::dima_get_option( 'dima_navbar_weights_list' );
		$navbar_font_weight           = $navbar_font_weight_and_style;

		$protocol = is_ssl() ? 'https' : 'http';

		if ( $is_custom_fonts ) {
			$subsets = dima_helper::dima_get_option( 'dima_body_subsets_list' );

			$custom_font_args = array(
				'family' => $body_font_family . ':' . $body_font_weight . '|'
				            . $logo_font_family . ':' . $logo_font_weight . '|'
				            . $navbar_font_family . ':' . $navbar_font_weight . '|'
				            . $heading_font_family . ':' . $heading_font_weight,
				'subset' => $subsets
			);

			$body_font_arabic    = dima_is_arabic_font( $body_font_family );
			$heading_font_arabic = dima_is_arabic_font( $heading_font_family );
			$logo_font_arabic    = dima_is_arabic_font( $logo_font_family );
			$menu_font_arabic    = dima_is_arabic_font( $navbar_font_family );

			$get_custom_font_family = add_query_arg( $custom_font_args, $protocol . '://fonts.googleapis.com/css' );

			//RTL
			if ( $body_font_arabic != '' ) {
				wp_enqueue_style( 'dima-body-font-custom', $body_font_arabic, null, DIMA_VERSION, 'all' );
			}
			if ( $heading_font_arabic != '' ) {
				wp_enqueue_style( 'dima-heading-font-custom', $heading_font_arabic, null, DIMA_VERSION, 'all' );
			}
			if ( $menu_font_arabic != '' ) {
				wp_enqueue_style( 'dima-menu-font-custom', $menu_font_arabic, null, DIMA_VERSION, 'all' );
			}
			if ( $logo_font_arabic != '' ) {
				wp_enqueue_style( 'dima-logo-font-custom', $logo_font_arabic, null, DIMA_VERSION, 'all' );
			}
			//! RTL
			wp_enqueue_style( 'dima-font-custom', $get_custom_font_family, null, DIMA_VERSION, 'all' );
		} else {
			/**
			 * Set default font based on the direction and demo name
			 */

			if ( is_rtl() ) {
				$body_default_font    = 'Droid Arabic Naskh';
				$heading_default_font = 'Droid Arabic Kufi';
				$subsets              = 'arabic,latin,latin-ext';
			} else {
				switch ( $demo ) {
					case 'business':
						$body_default_font    = 'Open Sans';
						$heading_default_font = 'Open Sans';
						break;
					case 'business_finance':
						$body_default_font    = 'Open Sans';
						$heading_default_font = 'Open Sans';
						break;
					case 'construction':
						$body_default_font    = 'Hind';
						$heading_default_font = 'Montserrat';
						break;
					case 'minimal_portfolio':
						$body_default_font    = 'Lato';
						$heading_default_font = 'Lato';
						break;
					case 'app':
						$body_default_font    = 'Roboto';
						$heading_default_font = 'Roboto';
						break;
					case 'resume':
						$body_default_font    = 'Open Sans';
						$heading_default_font = ' Fjalla One';
						break;
					case 'restaurant':
						$body_default_font    = 'Arimo';
						$heading_default_font = 'Hindo';
						break;
					case 'shop':
						$body_default_font    = 'Open Sans';
						$heading_default_font = 'Montserrat';
						break;
					case 'cosmetic':
						$body_default_font    = 'Hind';
						$heading_default_font = 'Montserrat';
						break;
					case 'hosting':
						$body_default_font    = 'Open Sans';
						$heading_default_font = 'Open Sans';
						break;
					case 'magazine':
						$body_default_font    = 'Open Sans';
						$heading_default_font = 'Open Sans';
						break;
					case 'minimal_blog':
						$body_default_font    = 'Lato';
						$heading_default_font = 'Open Sans';
						break;
					case 'photography':
						$body_default_font    = 'Raleway';
						$heading_default_font = 'Raleway';
						break;
					default:
						$body_default_font    = 'Lato';
						$heading_default_font = 'Open Sans';
						break;
				}
				$subsets = 'latin,latin-ext';
			}

			$menu_default_font = $heading_default_font;

			$default_font_args = array(
				'family' => $body_default_font . ':' . $body_font_weight . '|'
				            . $heading_default_font . ':' . $logo_font_weight . '|'
				            . $menu_default_font . ':' . $navbar_font_weight . '|'
				            . $heading_default_font . ':' . $heading_font_weight,
				'subset' => $subsets
			);

			$get_default_font_family = add_query_arg( $default_font_args, $protocol . '://fonts.googleapis.com/css' );

			wp_enqueue_style( 'dima-font', $get_default_font_family, null, DIMA_VERSION, 'all' );
		}

		/**include Icons font**/
		//wp_enqueue_style( 'font-awesome', DIMA_TEMPLATE_URL . '/framework/asset/site/css/font-awesome.css', array(), DIMA_VERSION );
		wp_enqueue_style( 'font-awesome', 'https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css', array(), DIMA_VERSION );
		wp_enqueue_style( 'simple-line-icons', DIMA_TEMPLATE_URL . $dima_css_dir . 'simple-line-icons.css', array(), DIMA_VERSION );
		//Register styles.
		wp_enqueue_style( 'okab-style', DIMA_TEMPLATE_URL . $dima_css_style_dir . $demo . '/style' . $ext . $rtl . '.css', array(), DIMA_VERSION );
		wp_register_style( 'mediaelement-css', DIMA_TEMPLATE_URL . $dima_css_style_dir . $demo . '/mediaelementplayer.css', array(), DIMA_VERSION );

		if ( DIMA_WC_IS_ACTIVE ) {
			wp_deregister_style( 'woocommerce-layout' );
			wp_deregister_style( 'woocommerce-general' );
			wp_deregister_style( 'woocommerce-smallscreen' );
			wp_enqueue_style( 'dima-woocommerce-style', DIMA_TEMPLATE_URL . $dima_css_style_dir . $demo . '/woocommerce-style' . $ext . $rtl . '.css', null, DIMA_VERSION, 'screen' );
		}
		if ( DIMA_BBPRESS_IS_ACTIVE ) {
			wp_enqueue_style( 'dima-bbpress', DIMA_TEMPLATE_URL . $dima_css_style_dir . $demo . '/bbpress-style.css', null, DIMA_VERSION, 'screen' );
		}
		if ( DIMA_GRAVITY_FORMS_IS_ACTIVE ) {
			wp_enqueue_style( 'dima-gravity-forms', DIMA_TEMPLATE_URL . $dima_css_style_dir . $demo . '/gf-style' . $ext . '.css', null, DIMA_VERSION, 'screen' );
		}
		if ( DIMA_CONTACT_FORM_7_IS_ACTIVE ) {
			wp_deregister_style( 'contact-form-7' );
		}
		if ( DIMA_KB_IS_ACTIVE ) {
			wp_enqueue_style( 'dima-gravity-forms', DIMA_TEMPLATE_URL . $dima_css_style_dir . $demo . '/kb-style' . $rtl . '.css', null, DIMA_VERSION, 'screen' );
		}
	}

endif;

add_action( 'wp_enqueue_scripts', 'dima_global_styles' );

if ( ! function_exists( 'dima_admin_styles' ) ) :
	function dima_admin_styles( $hook ) {
		$rtl = '';
		$rtl .= is_rtl() ? '-rtl' : '';
		//include global admin style for pixeldima
		wp_enqueue_style( 'pixeldima-global', DIMA_TEMPLATE_URL . '/framework/asset/admin/css/pixeldima' . $rtl . '.css', null, DIMA_VERSION, 'all' );
		wp_enqueue_style( 'pixeldima-global' );

		//include meta style
		if ( $hook == 'post.php' || $hook == 'post-new.php' || $hook == 'edit-tags.php' ) {
			wp_enqueue_style( 'dima-meta', DIMA_TEMPLATE_URL . '/framework/asset/admin/css/meta' . $rtl . '.css', null, DIMA_VERSION, 'all' );
		}
		//include vc style
		if ( DIMA_VISUAL_COMOPSER_IS_ACTIVE ) {
			wp_enqueue_style( 'dima-visual-composer', DIMA_TEMPLATE_URL . '/framework/asset/admin/css/visual-composer.css', null, DIMA_VERSION, 'all' );
		}
	}
endif;

add_action( 'admin_enqueue_scripts', 'dima_admin_styles' );

if ( ! function_exists( 'customizer_controls' ) ) :
	/**
	 * [Add Style to customizer controls 'customizer-controls.css']
	 */
	function customizer_controls() {
		wp_enqueue_style( 'dima_global_styles', DIMA_TEMPLATE_URL . '/framework/asset/admin/css/customizer-controls.css', array(), DIMA_VERSION, 'screen' );
	}
endif;

add_action( 'customize_controls_print_styles', 'customizer_controls' );


if ( ! function_exists( 'dima_is_arabic_font' ) ) :
	function dima_is_arabic_font( $font_family ) {

		switch ( $font_family ) {
			case 'Noto Arabic Naskh' :
				return 'http://fonts.googleapis.com/earlyaccess/notonaskharabic.css';
				break;
			case 'Noto Naskh Arabic' :
				return 'http://fonts.googleapis.com/earlyaccess/notonaskharabic.css';
				break;
			case 'Noto Kufi Arabic' :
				return 'http://fonts.googleapis.com/earlyaccess/notokufiarabic.css';
				break;
			case 'Noto Nastaliq Urdu' :
				return 'http://fonts.googleapis.com/earlyaccess/notonastaliqurdu.css';
				break;
			case 'Lateef' :
				return 'https://fonts.googleapis.com/css?family=Lateef';
				break;
			default:
				return '';
		}

	}
endif;