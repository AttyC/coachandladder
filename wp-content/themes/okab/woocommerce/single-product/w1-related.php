<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woothemes.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

GLOBAL $product, $woocommerce_loop;

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) {
	return;
}

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => $posts_per_page,
	'orderby'             => $orderby,
	'post__in'            => $related,
	'post__not_in'        => array( $product->id )
) );

$products                    = new WP_Query( $args );
$enable                      = esc_attr( dima_helper::dima_get_option( 'dima_shop_related_products_display' ) );
$columns                     = esc_attr( dima_helper::dima_get_option( 'dima_shop_related_product_columns' ) );
$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() && $enable == '1' ) : ?>

	<div class="ok-md-12 related products columns-<?php echo $columns ?>">

		<hr>

		<h3><?php esc_html_e( 'Related Products', 'okab' ); ?></h3>

		<div class="double-clear"></div>
		<?php woocommerce_product_loop_start(); ?>
		<?php while ( $products->have_posts() ) : $products->the_post(); ?>
			<?php wc_get_template_part( 'content', 'product' ); ?>
		<?php endwhile; ?>
		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();