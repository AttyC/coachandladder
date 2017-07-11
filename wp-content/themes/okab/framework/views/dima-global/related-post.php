<?php
/**
 * @package Dima Framework
 * @subpackage views global
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

$is_related =  dima_helper::dima_get_option( 'dima_post_related_display' )  == '1';
$is_slide   =  dima_helper::dima_get_option( 'dima_post_related_is_slide' )  == '1';
$columns    =  dima_helper::dima_get_option( 'dima_post_related_columns' );
$count      =  dima_helper::dima_get_option( 'dima_post_related_count' ) ;
if ( $is_slide ) {
	$is_slide_class = " related-posts-slide";
}
?>
<?php if ( $is_related && DIMA_SHORTCODES_IS_ACTIVE ) { ?>
	<div class="related-posts related-posts-slide box<?php echo esc_attr( $is_slide_class ); ?> clearfix">
		<h5 class="related-posts-title"><?php esc_html_e( 'Related Posts', 'okab' ); ?></h5>
		<?php echo do_shortcode( '[related_posts column="' . esc_attr( $columns ) . '" count="' . esc_attr( $count ) . '" is_slide="' . esc_attr( $is_slide ) . '"]' ) ?>
	</div>
<?php } ?>