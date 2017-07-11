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

?>

<div data-product-id="product-<?php the_ID(); ?>" <?php post_class( $args['post_class'] ); ?>>
	<?php wc_get_template_part( 'content', 'product' ); ?>
</div>
