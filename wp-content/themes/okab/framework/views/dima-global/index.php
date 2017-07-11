<?php
/**
 * @package Dima Framework
 * @subpackage views global
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

$excerpt = esc_attr( dima_helper::dima_get_option( 'dima_blog_blog_excerpt' ) );

if ( is_home() ) {
	duma_blog_shortcode_theme();
} elseif ( is_archive() ) {
	if ( ! isset( $post->post_type ) ) {
		return;
	}
	if ( $post->post_type == 'dima-portfolio' && DIMA_SHORTCODES_IS_ACTIVE ) {
		echo do_shortcode( '[portfolio portfolio_style="grid" type="portfolio" column="2" no_margin="false"]' );
	} else {
		duma_blog_shortcode_theme();
	}
} elseif ( is_search() ) {
	duma_blog_shortcode_theme( true );
}