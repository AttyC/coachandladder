<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$enable  = esc_attr( dima_helper::dima_get_option( 'dima_shop_cart_display' ) );
$count   = esc_attr( dima_helper::dima_get_option( 'dima_shop_cart_count' ) );
$columns = esc_attr( dima_helper::dima_get_option( 'dima_shop_cart_columns' ) );

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => apply_filters( 'woocommerce_cross_sells_total', $count ),
	'orderby'             => $orderby,
	'post__in'            => $crosssells,
	'meta_query'          => $meta_query
);


if ( $cross_sells && $enable == '1' ) : ?>
    <div class="dima-clear"></div>
    <div class="cross-sells columns-<?php echo $columns; ?>">
        <hr>
        <h3><?php _e( 'You may be interested in&hellip;', 'woocommerce' ) ?></h3>
        <div class="double-clear"></div>
		<?php woocommerce_product_loop_start(); ?>

		<?php foreach ( $cross_sells as $cross_sell ) : ?>

			<?php
			$post_object = get_post( $cross_sell->get_id() );

			setup_postdata( $GLOBALS['post'] =& $post_object );

			wc_get_template_part( 'content', 'product' ); ?>

		<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

    </div>

<?php endif;

wp_reset_query();