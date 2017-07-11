<?php

function wp_enqueue_color_picker() {
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
}

add_action( 'admin_enqueue_scripts', 'wp_enqueue_color_picker' );

/**
 * @param $hook
 * Enqueue Admin Scripts
 */
function dima_under_construction_enqueue_admin_scripts( $hook ) {

	if ( $hook == 'okab_page_pixeldima-under-construction' ) {

		wp_enqueue_script( 'dima-under-construction-admin-js', DIMA_UNDER_CONSTRUCTION_URL . '/js/admin/main.js', array( 'jquery' ), null, true );

	}

}

add_action( 'admin_enqueue_scripts', 'dima_under_construction_enqueue_admin_scripts' );