<?php

function dima_google_analytics_enqueue_admin_styles( $hook ) {

	if ( $hook == 'okab_page_pixeldima-google-analytics' ) {

		wp_enqueue_style( 'dima-google-analytics-css', DIMA_GOOGLE_ANALYTICS_URL . '/css/style.css', null, null, 'all' );

	}

}

add_action( 'admin_enqueue_scripts', 'dima_google_analytics_enqueue_admin_styles' );