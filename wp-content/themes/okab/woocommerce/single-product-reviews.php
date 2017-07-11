<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
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
 * @version     2.3.2
 */

GLOBAL $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( ! comments_open() ) {
	return;
}

$dima_demo         = dima_helper::dima_get_demo();
$dima_demo_comment = 'dima_' . $dima_demo . '_comment';

$placeholder_name       = ' placeholder="' . esc_html__( 'Your Name *', 'okab' ) . '"';
$placeholder_email      = ' placeholder="' . esc_html__( 'Your Email *', 'okab' ) . '"';
$placeholder_comment    = ' placeholder="' . esc_html__( 'Your Review *', 'okab' ) . '"';
$dima_allowed_HTML_tags = array(
	'a'      => array(
		'href'        => array(),
		'class'       => array(),
		'style'       => array(),
		'title'       => array(),
		'data-filter' => array(),
	),
	'div'    => array(
		'class' => array(),
		'style' => array(),
	),
	'span'   => array(
		'class' => array(),
		'value' => array(),
		'style' => array(),
	),
	'h4'     => array(
		'class' => array(),
		'style' => array(),
	),
	'br'     => array(),
	'p'      => array(
		'class' => array(),
		'style' => array(),
	),
	'button' => array(
		'class' => array(),
		'style' => array(),
	),
	'li'     => array(
		'class' => array(),
		'style' => array(),
	),
	'ol'     => array(
		'class' => array(),
		'style' => array(),
	),
	'ul'     => array(
		'class' => array(),
		'style' => array(),
	),
	'source' => array(
		'class' => array(),
		'style' => array(),
		'src'   => array(),
		'type'  => array()
	),
	'img'    => array(
		'class'  => array(),
		'id'     => array(),
		'style'  => array(),
		'alt'    => array(),
		'src'    => array(),
		'srcset' => array(),
		'height' => array(),
		'width'  => array(),
	),
	'i'      => array(
		'class' => array(),
		'style' => array(),
	),
	'dl'     => array(
		'class' => array(),
		'style' => array(),
	),
	'dd'     => array(
		'class' => array(),
		'style' => array(),
	),
	'dt'     => array(
		'class' => array(),
		'style' => array(),
	),
);
?>

<div id="reviews">
	<div id="comments" class="dima-reviews-list">

		<h4 class="dima-reviews-header">
			<?php
			if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_rating_count() ) ) {
				printf( _n( '%s review for %s', '%s reviews for %s', $count, 'okab' ), $count, get_the_title() );
			} else {
				_e( 'Reviews', 'okab' );
			}
			?>
		</h4>

		<?php if ( have_comments() ) : ?>
			<ol class="dima-comment">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => $dima_demo_comment ) ) ); ?>
			</ol>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<nav class="woocommerce-pagination">
					<?php
					paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
						'prev_text' => '&larr;',
						'next_text' => '&rarr;',
						'type'      => 'list',
					) ) );
					?>
				</nav>
			<?php endif; ?>
		<?php else : ?>
			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'okab' ); ?></p>
		<?php endif; ?>

	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">

				<?php

				$commenter = wp_get_current_commenter();

				$comment_form = array(
					'title_reply'         => have_comments() ? wp_kses( __( '<span>Add a Review</span>', 'okab' ), $dima_allowed_HTML_tags ) : esc_html__( 'Be the First to Review', 'okab' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
					'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'okab' ),
					'comment_notes_after' => '',
					'fields'              => array(
						'author' => '<p class="comment-form-author">'
						            . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $placeholder_name . ' aria-required="true" /></p>',
						'email'  => '<p class="comment-form-email">'
						            . '<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $placeholder_email . ' aria-required="true" /></p>',
					),
					'label_submit'        => esc_html__( 'Submit Review', 'okab' ),
					'logged_in_as'        => '',
					'comment_field'       => ''
				);

				if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {

					$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Rating', 'okab' ) . '</label><select name="rating" id="rating">
            <option value="">' . esc_html__( 'Rate&hellip;', 'okab' ) . '</option>
            <option value="5">' . esc_html__( 'Perfect', 'okab' ) . '</option>
            <option value="4">' . esc_html__( 'Good', 'okab' ) . '</option>
            <option value="3">' . esc_html__( 'Average', 'okab' ) . '</option>
            <option value="2">' . esc_html__( 'Not that bad', 'okab' ) . '</option>
            <option value="1">' . esc_html__( 'Very Poor', 'okab' ) . '</option>
          </select></p>';

				}

				$comment_form['comment_field'] .= '<p class="comment-form-comment">'
				                                  . '<textarea id="comment" name="comment" cols="45" rows="8"' . $placeholder_comment . ' aria-required="true"></textarea></p>';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );

				?>

			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'okab' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>