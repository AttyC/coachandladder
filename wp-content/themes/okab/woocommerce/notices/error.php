<?php
/**
 * Show error messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/error.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! $messages ) {
	return;
}

?>

<ul class="woocommerce-error dima-alert dima-alert-error fade in">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<i class="fa fa-times "></i>
	<div class="overflow-hidden">
		<?php foreach ( $messages as $message ) : ?>
			<li><?php echo wp_kses_post( $message ); ?></li>
		<?php endforeach; ?>
	</div>
</ul>