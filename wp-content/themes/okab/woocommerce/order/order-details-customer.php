<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see        http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! dima_woocommerce_version_check( '3.0.0' ) ) {
	wc_get_template( 'woocommerce/order/w2-order-details-customer.php' );

	return;
}
?>
<div class="woocommerce-customer-details box">
    <header><h4 class="box-titel"><?php esc_html_e( 'Customer Details', 'woocommerce' ); ?></h4></header>
    <table class="shop_table customer_details">
		<?php if ( $order->get_customer_note() ) : ?>
            <tr>
                <th><?php esc_html_e( 'Note:', 'woocommerce' ); ?></th>
                <td><?php echo wptexturize( $order->get_customer_note() ); ?></td>
            </tr>
		<?php endif; ?>

		<?php if ( $order->get_billing_email() ) : ?>
            <tr>
                <th><?php esc_html_e( 'Email:', 'woocommerce' ); ?></th>
                <td><?php echo esc_html( $order->get_billing_email() ); ?></td>
            </tr>
		<?php endif; ?>

		<?php if ( $order->get_billing_phone() ) : ?>
            <tr>
                <th><?php esc_html_e( 'Telephone:', 'woocommerce' ); ?></th>
                <td><?php echo esc_html( $order->get_billing_phone() ); ?></td>
            </tr>
		<?php endif; ?>

		<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>
    </table>
</div>
<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>
    <div class="double-clear"></div>
<div class="col2-set addresses ok-row">

    <div class="col-1 ok-md-6">
        <div class="box">
			<?php endif; ?>

            <header class="title">
                <h4 class="box-titel"><?php esc_html_e( 'Billing Address', 'woocommerce' ); ?></h4>
            </header>
            <address>
				<?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : esc_html__( 'N/A', 'woocommerce' ); ?>
            </address>

			<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

        </div><!-- /.col-1 -->
    </div>

    <div class="col-2 ok-md-6">
        <div class="box">
            <header class="title">
                <h4 class="box-titel"><?php esc_html_e( 'Shipping Address', 'woocommerce' ); ?></h4>
            </header>
            <address>
				<?php echo ( $address = $order->get_formatted_shipping_address() ) ? $address : esc_html__( 'N/A', 'woocommerce' ); ?>
            </address>
        </div><!-- /.col-2 -->
    </div>
</div><!-- /.col2-set -->

<?php endif; ?>
