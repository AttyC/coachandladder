<?php
//work in woo 2.4

?>
<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php
GLOBAL $product;
$product_view = 'products-grids';
$review_count = $product->get_review_count();
?>

<?php
if ( isset( $_SERVER['QUERY_STRING'] ) ) {
	parse_str( $_SERVER['QUERY_STRING'], $params );
	if ( isset( $params['product_view'] ) ) {
		$product_view = $params['product_view'];
	}
}

?>

<header class="entry-header">
	<div class="product-content">
		<a href="<?php the_permalink(); ?>">
			<h5 class="product-name"><?php the_title(); ?></h5>
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
	</div>
</header>