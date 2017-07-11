<?php

function dima_google_analytics_enqueue_admin_scripts( $hook ) {
	if ( $hook == 'okab_page_pixeldima-google-analytics' ) {

		wp_enqueue_script( 'dima-google-analytics-js', DIMA_GOOGLE_ANALYTICS_URL . '/js/main.js', array( 'jquery' ), null, true );

	}

}

add_action( 'admin_enqueue_scripts', 'dima_google_analytics_enqueue_admin_scripts' );