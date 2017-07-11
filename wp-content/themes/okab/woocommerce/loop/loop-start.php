<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
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
 * @version     2.0.0
 */
?>
<?php
$product_view = dima_helper::dima_get_option( 'dima_shop_product_layout' );//'products-grids'
$product_view = $product_view == 'grid' ? 'products-grids' : 'products-list';

//$product_view = 'products-grids'; 
$columns = dima_helper::dima_get_option( 'dima_shop_columns' );

?>
<?php $columns = dima_helper::dima_get_option( 'dima_shop_columns' ); ?>
<?php $column_class = ( is_shop() || is_product_category() || is_product_tag() ) ? ' columns-' . $columns : ''; ?>

<?php
if ( isset( $_SERVER['QUERY_STRING'] ) ) {
	parse_str( $_SERVER['QUERY_STRING'], $params );
	if ( isset( $params['product_view'] ) ) {
		$product_view = $params['product_view'];
	}
}
?>
<div class="clear"></div>
<?php
if ( $product_view == 'products-grids' ) {
?>
<div class="ok-clm-warp products-grids <?php echo esc_attr( $column_class ) ?>" id="rows">
	<?php
	} else {
		?>
		<div class="products-list" <?php echo esc_attr( $column_class ) ?>" id="rows">
		<?php
	}

	?>
