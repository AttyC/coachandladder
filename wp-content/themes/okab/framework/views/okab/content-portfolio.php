<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
if ( is_singular() && ! is_page() ) {
	$args = dima_helper::get_featured_args_portfolio();
} else {
	$args = dima_helper::get_featured_args_portfolio( $this );
}

$scaling = '';
if ( $args['blog_type'] == 'grid' ) {
	$scaling = "portfolio_grid";
}
?>

<article <?php post_class( $args['post_class'] ); ?> >
	<?php dima_helper::dima_get_admin_edit();?>

	<?php if ( dima_helper::dima_is_single_portfolio() ) : ?>

		<?php dima_helper::dima_get_view( 'dima-global', 'content', '' ); ?>

	<?php else : ?>
		<?php
		dima_featured_portfolio( array(
			'post_type' => $args['blog_type'],
			'img_hover' => $args['img_hover'],
			'elm_hover' => $args['elm_hover'],
			'no_border' => $args['no_border'],
		) );
		?>
	<?php endif; ?>

</article>
