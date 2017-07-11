<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.3
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">


        <div class="ok-row">
            <div class="ok-md-8 ok-xsd-12 columns">
                <div class="dima-data-table-wrap cart-table">
					<?php do_action( 'woocommerce_before_cart_table' ); ?>
                    <table class="shop_table shop_table_responsive cart" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="product-thumbnail"></th>
                            <th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
                            <th class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
                            <th class="product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
                            <th class="product-subtotal"><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
                            <th class="product-remove"></th>
                        </tr>
                        </thead>
                        <tbody>
						<?php do_action( 'woocommerce_before_cart_contents' ); ?>

						<?php
						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

							$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

								?>

                                <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                                    <td class="product-thumbnail">
										<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
										if ( ! $_product->is_visible() ) {
											echo $thumbnail;
										} else {
											printf( '<a href="%s">%s</a>', $_product->get_permalink( $cart_item ), $thumbnail );
										}
										?>
                                    </td>

                                    <td class="product-name"
                                        data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                                        <div class="cart-item-details">
											<?php
											if ( ! $_product->is_visible() ) {
												echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
											} else {
												echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a  href="%s">%s</a>', $_product->get_permalink( $cart_item ), $_product->get_title() ), $cart_item, $cart_item_key );
											}

											// Meta data
											echo WC()->cart->get_item_data( $cart_item );

											// Backorder notification
											if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
												echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'okab' ) . '</p>';
											}
											?>
                                        </div>
                                    </td>

                                    <td class="product-price"
                                        data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
										<?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
                                    </td>

                                    <td class="product-quantity"
                                        data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
										<?php
										if ( $_product->is_sold_individually() ) {
											$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
										} else {
											$product_quantity = woocommerce_quantity_input( array(
												'input_name'  => "cart[{$cart_item_key}][qty]",
												'input_value' => $cart_item['quantity'],
												'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
												'min_value'   => '0'
											), $_product, false );
										}
										echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
										?>
                                    </td>

                                    <td class="product-subtotal">
										<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
                                    </td>
                                    <td class="product-remove">
										<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<h6><a class="remove" href="%s" title="%s"><i class="fa fa-times"></i></a></h6>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'okab' ) ), $cart_item_key ); ?>
                                    </td>

                                </tr>

								<?php

							}

						}

						do_action( 'woocommerce_cart_contents' );
						?>
                        </tbody>

                    </table>
                </div>
				<?php do_action( 'woocommerce_after_cart_contents' ); ?>
            </div>

            <div class="ok-md-4 ok-xsd-12">
                <div class="dima-box coupon-box">
                    <h4 class="box-titel"><?php esc_html_e( 'Cart Totals', 'woocommerce' ); ?></h4>
                    <div class="actions">
						<?php if ( wc_coupons_enabled() ) { ?>
                            <div class="coupon action-group">
                                <label for="coupon_code"><?php esc_html_e( 'Coupon', 'okab' ); ?>:</label>
                                <input name="coupon_code" type="text" class="input-text" id="coupon_code" value=""
                                       placeholder="<?php _e( 'Coupon code', 'okab' ); ?>"/>
                                <input type="submit"
                                       class="di_header no-bottom-margin dima-button button-block small fill"
                                       name="apply_coupon" value="<?php _e( 'Apply Coupon', 'okab' ); ?>"/>
								<?php do_action( 'woocommerce_cart_coupon' ); ?>
                            </div>
						<?php } ?>
                    </div>
					<?php do_action( 'woocommerce_after_cart_contents' ); ?>
                    <div class="cart-collaterals">

						<?php woocommerce_cart_totals(); ?>

                        <div class="update action-group">
                            <input type="submit" class="di_header dima-button button-block small fill"
                                   name="update_cart" value="<?php _e( 'Update Cart', 'okab' ); ?>"/>
							<?php do_action( 'woocommerce_cart_actions' ); ?>
                        </div>
						<?php wp_nonce_field( 'woocommerce-cart' ); ?>
                        <input type="submit"
                               class="checkout-button no-bottom-margin dima-button button-block small fill alt wc-forward"
                               name="proceed" value="<?php _e( 'Proceed to Checkout', 'okab' ); ?> &rarr;"/>
                    </div>
                </div>
            </div>

        </div><!-- .row -->

		<?php do_action( 'woocommerce_after_cart_table' ); ?>

    </form>
    <div class="cart-collaterals">
		<?php
		/**
		 * woocommerce_cart_collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action( 'woocommerce_cart_collaterals' );
		?>
    </div>
<?php do_action( 'woocommerce_after_cart' ); ?>