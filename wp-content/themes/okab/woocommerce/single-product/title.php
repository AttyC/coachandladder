<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woothemes.com/document/template-structure/
 * @author     WooThemes
 * @package    WooCommerce/Templates
 * @version    1.6.4
 */
//work in woo 2.4

?>
<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php
GLOBAL $product;
$review_count = $product->get_review_count();
?>


<header class="entry-header">
	<a href="<?php the_permalink(); ?>">
		<?php
		the_title( '<h3  class="product_title entry-title product-name">', '</h3>' );
		?>
	</a>
	<?php

	$rating = $product->get_rating_html();
	if ( ! empty( $rating ) ) {
		echo '<div class="star-rating-container aggregate">' . $rating . '</div>';
	} else {
		?>
		<div class="star-rating"
		     title="<?php echo sprintf( esc_html__( 'Rated %d out of 5', 'okab' ), $rating ) ?>"></div>
		<?php

	}
	if ( $review_count == 0 ) {
		echo '<span class="review-link">(<span class="count">' . $review_count . ' </span>' . esc_html__( 'Customer reviews', 'okab' ) . ')</span>';
	} else {
		echo '<span class="review-link">(<span class="count">' . $review_count . ' </span>' . esc_html__( 'Customers reviews', 'okab' ) . ')</span>';
	}
	?>
</header>