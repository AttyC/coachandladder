<?php
/**
 * Functions pertaining to content output.
 *
 * @package global
 * @subpackage 1-content
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

/**
 * @param $toggle
 * @param $trigger
 * @param $placement
 * @param string $title
 * @param string $content
 *
 * @return string
 */
function dima_tooltip_data( $toggle, $trigger, $placement, $title = '', $content = '' ) {

	if ( ! in_array( $toggle, array( 'tooltip', 'popover' ) ) ) {
		return '';
	}

	$params = array(
		'data-toggle'    => ( $toggle == 'tooltip' ) ? 'tooltip' : 'popover',
		'data-trigger'   => $trigger,
		'data-placement' => $placement,
		'data-title'     => $title,
		'data-content'   => $content
	);

	return implode_key( $params );
}

/**
 * @param array $pieces
 *
 * @return string
 */
function implode_key( $pieces = array() ) {

	$keys = array_keys( $pieces );
	$val  = array_values( $pieces );
	$par  = "";
	for ( $i = 0; $i < sizeof( $val ); $i ++ ) {
		if ( ! empty( $val[ $i ] ) ) {
			$par .= $keys[ $i ] . "=\"" . $val[ $i ] . "\" ";
		}
	}

	return $par;
}


/**
 * @param $output
 *
 * @return array
 */
function dima_shortcodes_add_body_class( $output ) {

	$version = str_replace( '.', '_', DIMA_SHORTCODES_VERSION );

	$output[] = 'dima-shortcodes-version' . $version;

	return $output;

}

add_filter( 'body_class', 'dima_shortcodes_add_body_class', 9999 );

// Allow shortcodes in widgets.
add_filter( 'widget_text', 'do_shortcode' );

function dima_get_admin_media_post() {
	$id        = vc_post_param( 'content' );
	$back_post = get_post( $id );
	$post_mime = $back_post->post_mime_type;

	$back_url = $back_icon = '';
	if ( strpos( $post_mime, 'image/' ) !== false ) {
		$background_url = wp_get_attachment_thumb_url( $id );
		$back_url       = ( $background_url != '' ) ? 'background-image: url(' . $background_url . ');' : '';
	} else if ( strpos( $post_mime, 'pattern/' ) !== false ) {
		$background_url = wp_get_attachment_thumb_url( $id );
		$back_url       = ( $background_url != '' ) ? 'background-image: url(' . $background_url . ');' : '';
	} else if ( strpos( $post_mime, 'video/' ) !== false ) {
		$back_icon = '<i class="fa fa-media-play" />';
	} else {
		switch ( $post_mime ) {
			case 'oembed/flickr':
			case 'oembed/instagram':
			case 'oembed/Imgur':
			case 'oembed/photobucket':
				$back_oembed = wp_oembed_get( $back_post->guid );
				preg_match_all( '/src="([^"]*)"/i', $back_oembed, $img_src );
				$back_url = ( isset( $img_src[1][0] ) ) ? 'background-image: url(' . str_replace( '"', '', $img_src[1][0] ) . ');' : '';
				break;

			case 'oembed/vimeo':
			case 'oembed/youtube':
				$back_icon = '<i class="fa fa-social-' . str_replace( 'oembed/', '', $post_mime ) . '" />';
				break;
		}
	}

	echo json_encode( array(
		'back_url'  => $back_url,
		'back_icon' => $back_icon,
		'back_mime' => $post_mime
	) );
	die();
}

add_action( 'wp_ajax_dima_get_media_post', 'dima_get_admin_media_post' );
