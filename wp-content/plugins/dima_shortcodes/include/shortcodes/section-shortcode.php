<?php

/**
 * Class and Function List:
 * Function list:
 * - dima_shortcode_portfolio()
 * Classes list:
 */
class DIMA_Section_Shortcode {

	public function __construct() {
		add_shortcode( 'section', array( $this, 'dima_shortcode_section' ) );
	}

	function dima_shortcode_section( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'id'                     => '',
			'style'                  => '',
			'class'                  => '',
			'bg_color'               => '',
			'bg_image'               => '',
			'bg_pattern'             => '',
			'cover'                  => '',
			'fixed_parallax'         => false,
			'parallax'               => false,
			'video'                  => false,
			'full_width'             => false,
			'no_padding'             => false,
			'top_and_bottom_padding' => '',
			'left_and_right_padding' => '',
		), $atts, 'section' ) );

		wp_enqueue_script( 'magnific-js' );
		wp_enqueue_script( 'dima-owl' );
		$section_content = '';
		$padding         = '';
		if ( ! empty( $top_and_bottom_padding ) && empty( $left_and_right_padding ) ) {
			$padding .= 'style="padding-top:' . $top_and_bottom_padding . 'px; padding-bottom:' . $top_and_bottom_padding . 'px;"';
		} elseif ( empty( $top_and_bottom_padding ) && ! empty( $left_and_right_padding ) ) {
			$padding .= 'style="padding-right:' . $left_and_right_padding . 'px; padding-left:' . $left_and_right_padding . 'px;"';
		} elseif ( ! empty( $top_and_bottom_padding ) && ! empty( $left_and_right_padding ) ) {
			$padding .= 'style="padding: ' . $top_and_bottom_padding . ' ' . $left_and_right_padding . 'px;"';
		}

		$id         = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '" ' : '';
		$class      = ( $class != '' ) ? ' ' . esc_attr( $class ) : '';
		$bg_color   = ( $bg_color != '' ) ? 'data-bg-color="' . esc_attr( $bg_color ) . '"' : '';
		$cover      = ( $cover == 'true' ) ? '<div class="dima-section-cover"></div>' : '';
		$bg_image   = ( $bg_image != '' ) ? '' . esc_attr( $bg_image ) . '' : '';
		$style      = ( $style != '' ) ? 'style="' . $style . '"' : '';
		$bg_pattern = ( $bg_pattern != '' ) ? $bg_pattern : '';
		$bg_class   = ( $bg_pattern != '' ) ? ' background-image-hide dima-pattern-image' : ' background-image-hide background-cover';

		if ( ! $full_width ) {
			$content_global = '<div class="container page-section">'
			                  . do_shortcode( $content )
			                  . '</div>';
		} else {
			$content_global = '<div class="page-section">'
			                  . do_shortcode( $content )
			                  . '</div>';
		}

		if ( $no_padding ) {
			$section_content = 'no-padding-section ';
		}

		if ( empty( $bg_image ) && empty( $bg_pattern ) ) {
			$output = '<section ' . $id . ' class="' . $class . 'section" ' . $bg_color . ' ' . $style . '>'
			          . '<div class="' . $section_content . 'page-section-content overflow-hidden" ' . $padding . '>'
			          . $content_global
			          . '</div>'
			          . '</section>';
		} else {
			$bg_image = ( $bg_image == '' ) ? $bg_pattern : $bg_image;

			if ( $parallax ) {
				$output = '<section ' . $id . ' class="' . $class . 'section" ' . $style . '>'
				          . '<div class="page-section-content overflow-hidden" ' . $padding . '>'
				          . '<div class="' . $bg_class . ' parallax-background">'
				          . '<img class="background-image" src="' . $bg_image . '">'
				          . '</div>'
				          . '' . $cover . ''
				          . $content_global
				          . '</div>'
				          . '</section>';
			} elseif ( $fixed_parallax ) {
				$output = '<section ' . $id . ' class="' . $class . 'section" ' . $style . '>'
				          . '<div class="page-section-content overflow-hidden" ' . $padding . '>'
				          . '<div class="fixed-parallax ' . $bg_class . '">'
				          . '<img class="background-image" src="' . $bg_image . '">'
				          . '</div>'
				          . '' . $cover . ''
				          . $content_global
				          . '</div>'
				          . '</section>';
			} else {
				$output = '<section ' . $id . ' class="' . $class . 'section" ' . $style . '>'
				          . '<div class="page-section-content overflow-hidden" ' . $padding . '>'
				          . '<div class="' . $bg_class . '">'
				          . '<img class="background-image" src="' . $bg_image . '">'
				          . '</div>'
				          . '' . $cover . ''
				          . $content_global
				          . '</div>'
				          . '</section>';
			}
		}

		if ( ! empty( $video ) ) {
			wp_enqueue_script( 'video-js' );
			wp_enqueue_script( 'bigvideo-js' );

			$output = '<section ' . $id . ' class="' . $class . ' section" ' . $style . '>'
			          . '<div class="page-section-content overflow-hidden" ' . $padding . '>'
			          . '' . $cover . ''
			          . '<div class="' . $bg_class . ' parallax-background video-wrap" data-video-wrap="' . $video . '" data-img-wrap="' . $bg_image . '">'
			          . '</div>'
			          . $content_global
			          . '</div>'
			          . '</section>';
		}

		return $output;
	}
}

new DIMA_Section_Shortcode();