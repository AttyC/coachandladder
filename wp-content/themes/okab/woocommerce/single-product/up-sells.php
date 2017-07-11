<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
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
	wc_get_template( 'woocommerce/single-product/w1-up-sells.php' );

	return;
}


GLOBAL $product, $woocommerce_loop;

$upsells = $product->get_upsells();

if ( sizeof( $upsells ) == 0 ) {
	return;
}

$enable                      = esc_attr( dima_helper::dima_get_option( 'dima_shop_related_products_display' ) );
$columns                     = esc_attr( dima_helper::dima_get_option( 'dima_shop_related_product_columns' ) );
$woocommerce_loop['columns'] = $columns;

if ( $upsells && $enable ) : ?>
    <section class="up-sells upsells products">

        <div class="ok-md-12 columns-<?php echo $columns ?>">
            <hr>
            <div class="upsells products">

                <h4><?php esc_html_e( 'You may also like&hellip;', 'woocommerce' ) ?></h4>
                <div class="double-clear"></div>
				<?php woocommerce_product_loop_start(); ?>

				<?php foreach ( $upsells as $upsell ) : ?>

					<?php
					$post_object = get_post( $upsell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

				<?php endforeach; ?>

				<?php woocommerce_product_loop_end(); ?>

            </div>
        </div>
    </section>
<?php endif;

wp_reset_postdata();