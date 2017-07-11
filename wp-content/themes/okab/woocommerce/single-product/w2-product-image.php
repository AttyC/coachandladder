<?php
/**
 * Single Product Image
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $woocommerce, $product;
wp_enqueue_script( 'dima-flexslider' );
$animation = dima_helper::dima_get_option( 'dima_shop_slide_animation' );
$animation = ( $animation != '' ) ? $animation : 'fade';

$global_fullwidth = esc_attr( dima_helper::dima_get_option( 'dima_layout_content' ) );
$fullwidth        = esc_attr( dima_helper::dima_get_option( 'dima_shop_layout' ) );
if ( $fullwidth == "" ) {
	$fullwidth = $global_fullwidth;
}

if ( $fullwidth == "no-sidebar" ) {
	$fullwidth = true;
} else {
	$fullwidth = false;
}

$opt = esc_attr( get_post_meta( get_the_ID(), '_dima_product_layout', true ) );
if ( $opt == "no-sidebar" && ( is_singular() && ! is_page() ) ) {
	$fullwidth = true;
}
$grid = ( ! $fullwidth ) ? 'ok-md-7 ok-xsd-12' : 'ok-md-5 ok-xsd-12';
?>
<div class="<?php echo esc_attr( $grid ) ?>">
    <div class="images">
        <div class="post-img">
            <div id="slider" class="flexslider flex-viewport sample-slide small-control"
                 data-flex-animation="<?php echo esc_attr( $animation ) ?>">

                <ul class="slides">
					<?php
					$attachment_count = count( $product->get_gallery_attachment_ids() );

					if ( $attachment_count > 0 ) {
						$gallery = '[product-gallery]';
					} else {
						$gallery = '[]';
					}

					if ( has_post_thumbnail() ) {

						$props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
						$image = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
							'title' => $props['title'],
							'alt'   => $props['alt'],
						) );

						echo apply_filters( 'woocommerce_single_product_image_html'
							, sprintf( '<li><a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto%s">%s</a></li>'
								, esc_url( $props['url'] ), esc_attr( $props['caption'] ), $gallery, $image )
							, $post->ID );
					} else {
						echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li class="flex-img"><img src="%s" alt="Placeholder" /></li>', wc_placeholder_img_src() ), $post->ID );
					}

					$attachment_ids = $product->get_gallery_attachment_ids();

					$loop = 0;

					foreach ( $attachment_ids as $attachment_id ) {
						$classes[] = 'image-' . $attachment_id;

						$image_link = wp_get_attachment_url( $attachment_id );

						if ( ! $image_link ) {
							continue;
						}
						$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ) );
						$image_class = esc_attr( implode( ' ', $classes ) );
						$image_title = esc_attr( get_the_title( $attachment_id ) );

						echo apply_filters( 'woocommerce_single_product_image_html',
							sprintf( '<li class="slide-item"><a href="%s" itemprop="image" class="flex-img woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a></li>',
								$image_link, $image_title, $image )
							, $attachment_id
							, $post->ID
							, $image_class );
						$loop ++;
					}
					?>
                </ul>
            </div>

			<?php do_action( 'woocommerce_product_thumbnails' ); ?>

        </div>
    </div>
</div>