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
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Fallback to old
if ( ! dima_woocommerce_version_check( '3.0.0' ) ) {
	wc_get_template( 'woocommerce/single-product/w1-related.php' );

	return;
}

$enable                      = esc_attr( dima_helper::dima_get_option( 'dima_shop_related_products_display' ) );
$columns                     = esc_attr( dima_helper::dima_get_option( 'dima_shop_related_product_columns' ) );
$woocommerce_loop['columns'] = $columns;

if ( $related_products ) : ?>

    <section class="related products">
        <div class="ok-md-12 related products columns-<?php echo $columns ?>">
            <h4><?php esc_html_e( 'Related products', 'woocommerce' ); ?></h4>
            <span class="dima-divider noor-line"></span>
            <div class="double-clear"></div>
			<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				$post_object = get_post( $related_product->get_id() );

				setup_postdata( $GLOBALS['post'] =& $post_object );

				wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>

			<?php woocommerce_product_loop_end(); ?>
        </div>
    </section>

<?php endif;

wp_reset_postdata();
