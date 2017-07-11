<?php

/**
 * Class and Function List:
 * Function list:
 *-dima_shortcode_portfolio()
 * Classes list:
 */
class DIMA_Banner_Shortcode {

	public function __construct() {
		add_shortcode( 'dima_banner', array( $this, 'dima_shortcode_banner' ) );
	}

	function dima_shortcode_banner( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'bg_image'   => '',
			'link'       => '',
			'target'     => '',
			'text_color' => 'light',
			'text_align' => 'center',
			'flaot'      => 'center',
			'text_width' => '60%',
			'height'     => '300px',
			'hover'      => '',
			'animation'  => '',
			'delay'      => '',
			'offset'     => '',
			'parallax'   => false,
			'bg_video'   => false,//
			'id'         => '',
			'style'      => '',
			'class'      => ''
		), $atts, 'dima_banner' ) );

		ob_start();


		$id         = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '" ' : '';
		$class      = ( $class != '' ) ? ' ' . esc_attr( $class ) : '';
		$bg_image   = ( $bg_image != '' ) ? '' . esc_attr( $bg_image ) . '' : '';
		$style      = ( $style != '' ) ? 'style="' . $style . '"' : '';
		$bg_class   = ' background-image-hide background-cover';
		$animation  = ( $animation != '' ) ? 'data-animate=' . $animation . '' : '';
		$text_width = ( $text_width != '' ) ? 'style="width:' . $text_width . '"' : '';
		$delay      = ( $delay != '' ) ? ' data-delay=' . $delay . '' : '';
		$offset     = ( $offset != '' ) ? ' data-offset=' . $offset . '' : '';
		$hover      = ( $hover == 'true' ) ? ' overlay' : '';
		$flaot      = ( $flaot != '' ) ? ' ' . $flaot : 'center';

		if ( is_numeric( $bg_image ) ) {
			$bg_image_info = wp_get_attachment_image_src( $bg_image, 'full' );
			$bg_image      = $bg_image_info[0];
		}

		$start_link = "";
		$end_link   = "";
		if ( $target ) {
			$target = 'target="' . $target . '"';
		}
		if ( $link ) {
			$start_link = '<a href="' . $link . '" ' . $target . '>';
			$end_link   = '</a>';
		};

		//=========
		$color = ( $text_color != 'light' ) ? 'bg-light' : 'bg-dark';

		switch ( $text_align ) {
			case 'end' :
				$text_align = ' text-end';
				break;
			case 'start' :
				$text_align = ' text-start';
				break;
			case 'center' :
				$text_align = ' text-center';
				break;
			default :
				$text_align = '';
		}

		//=========
		$content_global = '' . $start_link
		                  . '<div class="dima-banner page-section ' . $color . '' . $hover . '" data-height=' . $height . ' ' . $animation . '' . $delay . '' . $offset . '> '
		                  . '<div class="banner-inner text-vertical-center ' . $flaot . '' . $text_align . '" ' . $text_width . '  > '
		                  . '<div class="dima-inner-wrap"> '
		                  . do_shortcode( $content )
		                  . '</div > '
		                  . '</div > '
		                  . '</div > '
		                  . $end_link;

		if ( empty( $bg_image ) && empty( $bg_pattern ) ) {
			$output = '<div ' . $id . ' class="' . $class . 'section" ' . $style . ' > '
			          . '<div class="page-section-content overflow-hidden" > '
			          . $content_global
			          . '</div > '
			          . '</div > ';
		} else {
			$bg_image = ( $bg_image == '' ) ? $bg_pattern : $bg_image;

			if ( $parallax == 'parallax' ) {
				$output = ' <div ' . $id . ' class="' . $class . 'section" ' . $style . ' > '
				          . '<div class="page-section-content overflow-hidden" > '
				          . '<div class="' . $bg_class . ' parallax-background" data-bg-image="' . $bg_image . '"> '
				          . '</div > '
				          . $content_global
				          . '</div > '
				          . '</div > ';
			} elseif ( $parallax == 'fixed_parallax' ) {
				$output = '<div ' . $id . ' class="' . $class . 'section" ' . $style . ' > '
				          . '<div class="page-section-content overflow-hidden" > '
				          . '<div class="fixed-parallax ' . $bg_class . '" data-bg-image="' . $bg_image . '"> '
				          . '</div > '
				          . $content_global
				          . '</div > '
				          . '</div > ';
			} else {
				$output = '<div ' . $id . ' class="' . $class . 'section" ' . $style . ' > '
				          . '<div class="page-section-content overflow-hidden" > '
				          . '<div class="' . $bg_class . '" data-bg-image="' . $bg_image . '"> '
				          . '</div > '
				          . $content_global
				          . '</div > '
				          . '</div > ';
			}
		}

		if ( ! empty( $bg_video ) ) {
			wp_enqueue_script( 'video-js' );
			wp_enqueue_script( 'bigvideo-js' );

			$output = ' <div ' . $id . ' class="' . $class . 'section" ' . $style . ' > '
			          . '<div class="page-section-content overflow-hidden" > '
			          . '' . $cover . ''
			          . ' <div class="' . $bg_class . ' parallax-background video-wrap" data-video-wrap = "' . $video . '" data-img-wrap = "' . $bg_image . '" > '
			          . '</div> '
			          . $content_global
			          . '</div> '
			          . '</div> ';
		}

		return $output;
	}
}

new DIMA_Banner_Shortcode();

?>