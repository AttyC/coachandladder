<?php

require( DIMA_GOOGLE_ANALYTICS_PATH . '/functions/options.php' );

function dima_google_analytics_output() {
	require( DIMA_GOOGLE_ANALYTICS_PATH . '/views/google-analytics.php' );
}

if ( isset( $dima_google_analytics_enable ) && $dima_google_analytics_enable == 1 ) {
	add_action( 'wp_' . $dima_google_analytics_position, 'dima_google_analytics_output', 9999 );
}