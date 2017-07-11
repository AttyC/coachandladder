<?php
/**
 * Theme scripts , include js.
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

add_action( 'wp_enqueue_scripts', 'dima_global_scripts', 10 );
add_action( 'admin_enqueue_scripts', 'dima_admin_scripts_meta_box' );
add_action( 'customize_preview_init', 'dima_customizer_scripts' );
add_action( 'customize_controls_print_footer_scripts', 'dima_customizer_control_scripts' );

if ( ! function_exists( 'dima_global_scripts' ) ) :
	function dima_global_scripts() {
		if ( ! is_admin() && ! in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ) {
			$dima_smoothscroll = dima_helper::dima_get_option( 'dima_smoothscroll' );

			//Global
			wp_register_script( 'dima-load-js', DIMA_TEMPLATE_URL . '/framework/asset/site/js/core/load.js', array( 'jquery' ), DIMA_VERSION, false );
			wp_enqueue_script( 'dima-load-js' );

			wp_register_script( 'modernizr-js', DIMA_TEMPLATE_URL . '/framework/asset/site/js/core/modernizr-custom.js', array( 'jquery' ), DIMA_VERSION, false );
			wp_enqueue_script( 'modernizr-js' );

			wp_register_script( 'dima-js-lib', DIMA_TEMPLATE_URL . '/framework/asset/site/js/libs.min.js', array( 'jquery' ), DIMA_VERSION, false );
			wp_enqueue_script( 'dima-js-lib' );

			wp_register_script( 'easing-js', DIMA_TEMPLATE_URL . '/framework/asset/site/js/core/jquery.easing.1.3.js', array( 'jquery' ), DIMA_VERSION, false );
			wp_enqueue_script( 'easing-js' );

			wp_register_script( 'imagesloaded-js', DIMA_TEMPLATE_URL . '/framework/asset/site/js/core/imagesloaded.pkgd.min.js', array( 'jquery' ), DIMA_VERSION, false );
			wp_enqueue_script( 'imagesloaded-js' );

			wp_register_script( 'pd-smoothscroll-js', DIMA_TEMPLATE_URL . '/framework/asset/site/js/specific/smoothscroll.js', array( 'jquery' ), DIMA_VERSION, false );
			if ( $dima_smoothscroll == '1' ) {
				wp_enqueue_script( 'pd-smoothscroll-js' );
			}

			wp_register_script( 'respond-js', DIMA_TEMPLATE_URL . '/framework/asset/site/js/core/respond.src.js', array( 'jquery' ), DIMA_VERSION, false );
			wp_enqueue_script( 'respond-js' );

			//depending on shortcodes
			wp_register_script( 'video-js', DIMA_TEMPLATE_URL . '/framework/asset/site/js/specific/video.js', array( 'jquery' ), DIMA_VERSION, false );
			wp_register_script( 'bigvideo-js', DIMA_TEMPLATE_URL . '/framework/asset/site/js/specific/bigvideo.js', array( 'jquery' ), DIMA_VERSION, false );
			wp_register_script( 'magnific-js', DIMA_TEMPLATE_URL . '/framework/asset/site/js/specific/jquery.magnific-popup.min.js', array( 'jquery' ), DIMA_VERSION, false );
			wp_enqueue_script( 'magnific-js' );
			wp_register_script( 'dima-flexslider', DIMA_TEMPLATE_URL . '/framework/asset/site/js/module/jquery.flexslider.js', array( 'jquery' ), DIMA_VERSION, true );
			wp_register_script( 'dima-owl', DIMA_TEMPLATE_URL . '/framework/asset/site/js/module/owl.carousel.js', array( 'jquery' ), DIMA_VERSION, true );
			wp_register_script( 'mediaelement-js', DIMA_TEMPLATE_URL . '/framework/asset/site/js/specific/mediaelement/mediaelement-and-player.min.js', array( 'jquery' ), DIMA_VERSION, false );

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
			if ( DIMA_WC_IS_ACTIVE ) {
				wp_enqueue_script( 'dima-flexslider' );
			}

			wp_register_script( 'dima-js-main', DIMA_TEMPLATE_URL . '/framework/asset/site/js/main.js', array( 'jquery' ), DIMA_VERSION, false );
			wp_enqueue_script( 'dima-js-main' );

			wp_register_script( 'dima-js-wp-main', DIMA_TEMPLATE_URL . '/framework/asset/site/js/wp-main.js', array( 'jquery' ), DIMA_VERSION, false );
			wp_enqueue_script( 'dima-js-wp-main' );
		}
	}

endif;

if ( ! function_exists( 'dima_admin_scripts_meta_box' ) ) :
	function dima_admin_scripts_meta_box( $hook ) {
		GLOBAL $wp_customize;

		if ( isset( $wp_customize ) ) {
			return;
		}

		wp_enqueue_script( 'okab-pixeldima-global-js', DIMA_TEMPLATE_URL . '/framework/asset/admin/js/okab-pixeldima-global.js', array( 'jquery' ), DIMA_VERSION, true );

		if ( strpos( $hook, 'pixeldima-customizer-backup' ) != false ) {
			wp_enqueue_script( 'okab-customizer-backup-js', DIMA_TEMPLATE_URL . '/framework/asset/admin/js/okab-customizer-backup.js', array( 'jquery' ), DIMA_VERSION, true );
		}

		if ( strpos( $hook, 'pixeldima-demo' ) != false ) {
			$allowed_tags = array(
				'strong' => array(),
				'br'     => array(),
				'em'     => array()
			);

			wp_register_script( 'dima-demo-content-js', DIMA_TEMPLATE_URL . '/framework/asset/admin/js/dima-demo-content.js', array( 'jquery' ), DIMA_VERSION, true );
			wp_localize_script( 'dima-demo-content-js', 'DimaDemoAlert', array(
				'msg_debug'             => ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ),
				'msg_start'             => esc_html__( 'Let&apos;s go!', 'okab' ),
				'msg_working'           => esc_html__( 'Working...!', 'okab' ),
				'msg_warning'           => wp_kses( __( '<strong>Warning</strong><br> Importing demo data will overwrite your Customizer settings.<br>Importing data is recommended on fresh installs only.<br>Importing on sites with content or importing twice will duplicate menus, sliders, widget.</em>', 'okab' ), $allowed_tags ),
				'msg_conferm'           => wp_kses( __( '<br><br><strong>Are you sure you want to proceed?</strong><br><em>(It will take a few minutes to complete)</em>', 'okab' ), $allowed_tags ),
				'msg_timeoutA'          => esc_html__( 'Please wait...!', 'okab' ),
				'msg_timeoutB'          => esc_html__( 'Hang in there, trying to reconnect...', 'okab' ),
				'msg_timeoutC'          => esc_html__( 'Experiencing technical difficulties...', 'okab' ),
				'msg_fail'              => esc_html__( 'We&apos;re sorry, but the demo data could not be imported.', 'okab' ),
				'msg_complete'          => esc_html__( 'All done. Have fun!', 'okab' ),
				//this msg only for okab demo
				'msg_okab'              => wp_kses( __( '<br><em><strong>Okab Demo Requirement</strong><br>-Memory Limit of 256 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes, contact form 7,DIMA Portfolio, Revolution Slider and Woocommerce must be activated.<em>', 'okab' ), $allowed_tags ),
				'msg_business'          => wp_kses( __( '<br><em><strong>Business Demo Requirement</strong><br>-Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes,DIMA Portfolio, Revolution Slider and contact form 7 must be activated.<em>', 'okab' ), $allowed_tags ),
				'business_finance'      => wp_kses( __( '<br><em><strong>Business Finance Demo Requirement</strong><br>-Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes,DIMA Portfolio, Revolution Slider and contact form 7 must be activated.<em>', 'okab' ), $allowed_tags ),
				'business_consulting'   => wp_kses( __( '<br><em><strong>Consulting Demo Requirement</strong><br>-Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes,DIMA Portfolio, Revolution Slider and contact form 7 must be activated.<em>', 'okab' ), $allowed_tags ),
				'msg_app'               => wp_kses( __( '<br><em><strong>App Demo Requirement</strong><br>-Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes, DIMA Portfolio, Revolution Slider and contact form 7 must be activated.<em>', 'okab' ), $allowed_tags ),
				'msg_resume'            => wp_kses( __( '<br><em><strong>Resume Demo Requirement</strong><br>-Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes, contact form 7 must be activated.<em>', 'okab' ), $allowed_tags ),
				'msg_business_rtl'      => wp_kses( __( '<br><em><strong>Business (RTL) Demo Requirement</strong><br>-Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes, DIMA Portfolio, Revolution Slider and contact form 7 must be activated.<em>', 'okab' ), $allowed_tags ),
				'msg_minimal_portfolio' => wp_kses( __( '<br><em><strong>Minimal Portfolio Demo Requirement</strong><br>-Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes, DIMA Portfolio, contact form 7 must be activated.<em>', 'okab' ), $allowed_tags ),
				'msg_hosting'           => wp_kses( __( '<br><em><strong>Hosting Demo Requirement</strong><br>-Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes, DIMA Portfolio, contact form 7 must be activated.<em>', 'okab' ), $allowed_tags ),
				'msg_magazine'          => wp_kses( __( '<br><em><strong>Magazine Demo Requirement</strong><br>-Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes, DIMA Portfolio, contact form 7 must be activated.<em>', 'okab' ), $allowed_tags ),
				'msg_minimal_blog'      => wp_kses( __( '<br><em><strong>Minimal Blog Demo Requirement</strong><br>-Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes, DIMA Portfolio, contact form 7 must be activated.<em>', 'okab' ), $allowed_tags ),
				'msg_photography'       => wp_kses( __( '<br><em><strong>Photography Demo Requirement</strong><br>-Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes, DIMA Portfolio, contact form 7 must be activated.<em>', 'okab' ), $allowed_tags ),
				'msg_construction'      => wp_kses( __( '<br><em><strong>Construction Demo Requirement</strong><br>-Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes, DIMA Portfolio, Revolution Slider and contact form 7 must be activated.<em>', 'okab' ), $allowed_tags ),
				'msg_shop'              => wp_kses( __( '<br><em><strong>Shop Demo Requirement</strong><br>-Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes, DIMA Portfolio, Woocommerce, Revolution Slider and contact form 7 must be activated.<em>', 'okab' ), $allowed_tags ),
				'msg_cosmetic'          => wp_kses( __( '<br><em><strong>Cosmetic Demo Requirement</strong><br>-Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes, DIMA Portfolio, Woocommerce, Revolution Slider and contact form 7 must be activated.<em>', 'okab' ), $allowed_tags ),
				'msg_restaurant'        => wp_kses( __( '<br><em><strong>Restaurant Demo Requirement</strong><br>-Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.<br>-Dima Shoretcodes, DIMA Portfolio, Revolution Slider and contact form 7 must be activated.<em>', 'okab' ), $allowed_tags ),
			) );
			wp_enqueue_script( 'dima-demo-content-js' );
		}

		if ( $hook == 'post.php' || $hook == 'post-new.php' || $hook == 'edit-tags.php' ) {
			wp_enqueue_script( 'dima-meta-js', DIMA_TEMPLATE_URL . '/framework/asset/admin/js/dima-meta-boxes.js', array(
				'jquery',
				'media-upload',
				'thickbox'
			), DIMA_VERSION, true );
		}

		if ( $hook == 'post.php' || $hook == 'post-new.php' ) {
			wp_enqueue_script( 'jquery-ui-datepicker' );
		}

	}
endif;

if ( ! function_exists( 'dima_customizer_control_scripts' ) ) :
	function dima_customizer_control_scripts() {
		wp_enqueue_script( 'dima-customizer-control-js', DIMA_TEMPLATE_URL . '/framework/asset/admin/js/okab-custom-controls.js', array( 'jquery' ), DIMA_VERSION, false );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker-alpha', DIMA_TEMPLATE_URL . '/framework/asset/admin/js/wp-color-picker-alpha.js', array(
			'jquery',
			'wp-color-picker'
		), DIMA_VERSION, true );
	}
endif;


if ( ! function_exists( 'dima_customizer_scripts' ) ) :
	function dima_customizer_scripts() {
		wp_enqueue_script( 'dima-customizer-js', DIMA_TEMPLATE_URL . '/framework/asset/admin/js/okab-customizer.js', array(
			'jquery',
			'customize-preview'
		), DIMA_VERSION, true );
	}
endif;



