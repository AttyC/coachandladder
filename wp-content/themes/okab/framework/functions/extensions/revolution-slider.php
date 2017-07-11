<?php
/**
 * DIMA Framework
 * WARNING: This file is part of the DIMA Core Framework.
 * Do not edit the core files.
 *
 * @package Dima Framework
 * @subpackage Extensions
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

// Plugin setup for theme compatibility.
// Remove Meta Boxes

if ( ! function_exists( 'dima_revolution_slider_remove_meta_boxes' ) ) :

	function dima_revolution_slider_remove_meta_boxes() {

		if ( is_admin() ) {
			foreach ( get_post_types() as $post_type ) {
				remove_meta_box( 'mymetabox_revslider_0', $post_type, 'normal' );
			}
		}

	}

	add_action( 'do_meta_boxes', 'dima_revolution_slider_remove_meta_boxes' );

endif;


// Get Slider Data
function dima_revolution_slider_list() {
	$rs      = new RevSlider();
	$sliders = $rs->getArrSliders();
	$data    = array();
	foreach ( $sliders as $s ) {
		$key                    = 'dima-revolution-slider-' . $s->getAlias();
		$data[ $key ]['id']     = $s->getID();
		$data[ $key ]['slug']   = $s->getAlias();
		$data[ $key ]['name']   = $s->getTitle();
		$data[ $key ]['source'] = 'Revolution Slider';
	}

	return $data;
}

function dima_revolution_slider_add_slider_meta( $meta ) {
	return array_merge( $meta, dima_revolution_slider_list() );
}

add_filter( 'dima_sliders_meta', 'dima_revolution_slider_add_slider_meta' );