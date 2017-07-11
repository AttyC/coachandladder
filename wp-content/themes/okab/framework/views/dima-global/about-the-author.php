<?php
/**
 * @package Dima Framework
 * @subpackage views global
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
if ( dima_helper::dima_get_option( 'dima_author_post' ) == '1' ) {
	echo dima_shortcode_author_theme( '[id="' . get_the_author_meta( 'ID' ) . '" title=""]' );
}