<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

if ( is_singular() && ! is_page() ) {
	$args = dima_helper::get_featured_args();
} else {
	$args = dima_helper::get_featured_args( $this );
}
?>
<article <?php post_class( $args['post_class'] ); ?> >

	<?php if ( $args['show_image'] ) {
		$post_format = get_post_format();

		switch ( $post_format ) {
			case 'video':
				dima_featured_video();
				break;

			case 'gallery':
				dima_featured_gallery( array(
					'post_type' => $args['blog_type'],
				) );
				break;

			default:
				dima_featured_image( array(
					'post_type' => $args['blog_type'],
					'img_hover' => $args['img_hover'],
					'elm_hover' => $args['elm_hover'],
					'no_border' => $args['no_border'],
				) );
				break;
		}
	} ?>

	<?php dima_get_entry_meta( $args['meta'] ); ?>

	<div class="<?php dima_pots_content_class(); ?>">
		<?php dima_helper::dima_get_view( 'okab', '_content', 'post-header' ); ?>
		<?php dima_get_post_content( $args['is_full_post_content_blog'], $args['words'] ); ?>
		<?php dima_helper::dima_get_view( 'okab', '_content', 'post-footer' ); ?>
	</div>

</article>

