<?php

// =============================================================================
// WOOCOMMERCE/SINGLE-PRODUCT/TABS/TABS.PHP
// -----------------------------------------------------------------------------
// @version 2.4.0
// =============================================================================

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) :
	//$tab_num = count( $tabs );

	?>

	<?php if ( dima_helper::dima_get_option( 'dima_shop_product_tap_display' ) == '1' ) : ?>

	<div class="ok-md-12 woocommerce-tabs dima-tabs dima-tab-style">
		<ul class="dima-tab-nav top" id="dima-tab-nav">

			<?php foreach ( $tabs as $key => $tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab tab">
					<a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
				</li>
			<?php endforeach; ?>

		</ul>
		<div class="dima-tab-content">

			<?php foreach ( $tabs as $key => $tab ) : ?>
				<div class="tab-pane clearfix dima-tab_content dima-<?php echo esc_attr( $key ); ?>"
				     id="tab-<?php echo esc_attr( $key ); ?>">
					<?php call_user_func( $tab['callback'], $key, $tab ); ?>
				</div>
			<?php endforeach; ?>

		</div>
	</div>

<?php endif; ?>

<?php endif; ?>