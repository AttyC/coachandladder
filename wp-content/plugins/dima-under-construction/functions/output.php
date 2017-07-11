<?php


function dima_uc_output( $original_template ) {

	require( DIMA_UNDER_CONSTRUCTION_PATH . '/functions/options.php' );

	if ( isset( $dima_uc_enable ) && $dima_uc_enable == 1 && ! is_user_logged_in() ) {

		status_header( 503 );

		return DIMA_UNDER_CONSTRUCTION_PATH . '/views/site/under-construction.php';

	} else {

		return $original_template;

	}

}

add_filter( 'template_include', 'dima_uc_output' );