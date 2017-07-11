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


if ( ! defined( 'ABSPATH' ) ) {
	die;// Exit if accessed directly.
}

function remove_kb_widgets() {
	unregister_sidebar( 'pakb-main' );
}

add_action( 'widgets_init', 'remove_kb_widgets', 11 );

if ( ! function_exists( 'dima_kb_widgets_init' ) ) {
	function dima_kb_widgets_init() {

		register_sidebar( array(
			'name'          => esc_html__( 'Knowledge Base Main', 'okab' ),
			'id'            => 'kb-widget-area',
			'description'   => esc_html__( 'This widget area uses in the Knowledge Base pages.', 'okab' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );
	}
}

add_action( 'widgets_init', 'dima_kb_widgets_init' );


