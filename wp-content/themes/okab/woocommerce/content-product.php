<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

// Check stock status
$out_of_stock = get_post_meta( $post->ID, '_stock_status', true ) == 'outofstock';

// Extra post classes
$classes   = array();
$classes[] = 'dima-product';
$classes[] = 'hentry';

if ( $out_of_stock ) {
	$classes[] = 'out-of-stock';
}

?>
<div <?php post_class( $classes ); ?> >

	<?php
	do_action( 'woocommerce_before_shop_loop_item' );
	do_action( 'woocommerce_before_shop_loop_item_title' );
	?>

    <header class="entry-header">
        <div class="product-content">
            <a href="<?php the_permalink(); ?>">
                <h6 class="product-name"><?php the_title(); ?></h6>
            </a>
			<?php

			if ( ! dima_woocommerce_version_check( '3.0.0' ) ) {
				$rating = $product->get_rating_html();
			} else {
				$rating = wc_get_rating_html( $product->get_average_rating() );
			}
			if ( ! empty( $rating ) ) {
				echo '<div class="star-rating-container aggregate">' . $rating . '</div>';
			} else {
				?>
                <div class="star-rating"
                     title="<?php echo sprintf( esc_html__( 'Rated %d out of 5', 'okab' ), $rating ) ?>"></div>
				<?php
			}
			if ( $review_count == 0 ) {
				echo '<span class="review-link">(<span class="count">' . $review_count . ' </span>' . esc_html__( 'Customer review', 'okab' ) . ')</span>';
			} else {
				echo '<span class="review-link">(<span class="count">' . $review_count . ' </span>' . esc_html__( 'Customers reviews', 'okab' ) . ')</span>';
			}
			?>
        </div>
    </header>

	<?php
	do_action( 'woocommerce_after_shop_loop_item_title' );
	do_action( 'woocommerce_after_shop_loop_item' );
	?>

</div>