<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see        http://docs.woothemes.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce;

$items_in_cart = array();

if ( $woocommerce->cart->get_cart() && is_array( $woocommerce->cart->get_cart() ) ) {
	foreach ( $woocommerce->cart->get_cart() as $cart ) {
		$items_in_cart[] = $cart['product_id'];
	}
}

$id      = get_the_ID();
$in_cart = in_array( $id, $items_in_cart );
if ( $in_cart ) {
	$class = ' added';
} else {
	$class = '';
}


echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<li><a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s">%s</a></li>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( $product->get_id() ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		$product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart add_to_cart_button' . $class : '',
		esc_attr( $product->product_type ),
		''
	),
	$product );



