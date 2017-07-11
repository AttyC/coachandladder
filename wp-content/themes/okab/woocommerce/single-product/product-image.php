<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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
 * @version 3.0.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Fallback to WC.2x Versions.
if ( ! dima_woocommerce_version_check( '3.0.0' ) ) {
	wc_get_template( 'woocommerce/single-product/w2-product-image.php' );

	return;
}


global $post, $product;
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . $placeholder,
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );

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
    <div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>"
         data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">

        <figure id="slider"
                class="woocommerce-product-gallery__wrapper flexslider flex-viewport sample-slide small-control"
                data-flex-animation="<?php echo esc_attr( $animation ) ?>">

            <ul class="slides">
				<?php
				$attributes = array(
					'title'                   => $image_title,
					'data-src'                => $full_size_image[0],
					'data-large_image'        => $full_size_image[0],
					'data-large_image_width'  => $full_size_image[1],
					'data-large_image_height' => $full_size_image[2],
				);

				if ( has_post_thumbnail() ) {
					$html = '<li data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="slide-item woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
					$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
					$html .= '</a></li>';
				} else {
					$html = '<li class="woocommerce-product-gallery__image--placeholder">';
					$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
					$html .= '</li>';
				}

				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

				/*----------------------*/
				$attributes = array(
					'title'                   => $image_title,
					'data-src'                => $full_size_image[0],
					'data-large_image'        => $full_size_image[0],
					'data-large_image_width'  => $full_size_image[1],
					'data-large_image_height' => $full_size_image[2],
				);

				$attachment_ids = $product->get_gallery_image_ids();

				foreach ( $attachment_ids as $attachment_id ) {
					$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
					$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
					$image_title     = get_post_field( 'post_excerpt', $attachment_id );

					$html = '<li data-thumb="' . esc_url( $thumbnail[0] ) . '" class="slide-item woocommerce-product-gallery__image slide"><a href="' . esc_url( $full_size_image[0] ) . '">';
					$html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
					$html .= '</a></li>';

					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );

				}
				?>
            </ul>
        </figure>

		<?php do_action( 'woocommerce_product_thumbnails' ); ?>

    </div>
</div>