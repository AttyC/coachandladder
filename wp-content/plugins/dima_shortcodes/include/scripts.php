<?php

function dima_shortcodes_site_scripts() {
	if ( class_exists( "dima_helper" ) ) {
		$APIKEY = dima_helper::dima_get_option( 'dima_google_map_api_key' );
	}
	wp_register_script( 'vendor-google-maps', 'http://maps.googleapis.com/maps/api/js?key=' . $APIKEY . '', array( 'jquery' ), DIMA_SHORTCODES_VERSION, true );
	wp_register_script( 'dima-shortcodes-site', DIMA_SHORTCODES_URL . '/js/dima-shortcodes.js', array( 'jquery' ), DIMA_SHORTCODES_VERSION, true );
	wp_enqueue_script( 'dima-shortcodes-site' );

}

add_action( 'wp_enqueue_scripts', 'dima_shortcodes_site_scripts' );

if ( ! function_exists( 'dima_shortcodes_site_styles' ) ) :
	function dima_shortcodes_site_styles() {

		wp_register_script( 'dima-vc-admin-js', DIMA_SHORTCODES_URL . '/js/js_composer_extend.js', array( 'jquery' ), DIMA_SHORTCODES_VERSION, true );
		wp_enqueue_script( 'dima-vc-admin-js' );

		if ( DIMA_VISUAL_COMOPSER_IS_ACTIVE ) {
			if ( is_rtl() ) {
				wp_enqueue_style( 'dima-vc-admin-css', DIMA_SHORTCODES_URL . '/css/vc_admin_rtl.css', false, DIMA_SHORTCODES_VERSION, 'all' );
			} else {
				wp_enqueue_style( 'dima-vc-admin-css', DIMA_SHORTCODES_URL . '/css/vc_admin.css', false, DIMA_SHORTCODES_VERSION, 'all' );
			}
			wp_enqueue_style( 'dima-vc-admin-css' );
		}
	}
endif;

add_action( 'vc_backend_editor_render', 'dima_shortcodes_site_styles' );