<?php
/**
 * DIMA Framework
 * WARNING: This file is part of the DIMA Core Framework.
 * Do not edit the core files.
 *
 * @package Dima Framework
 * @subpackage Extensions
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;// Exit if accessed directly.
}


if ( ! class_exists( 'DIMA_Woo_Controller' ) ) {
	/**
	 * Main Class.
	 *
	 * Class DIMA_Woo_Controller
	 * @version    1.0.0
	 */
	class DIMA_Woo_Controller {
		function __construct() {
			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
			remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );

			//Remove Rating
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ); // 1

			//Remove Add to cart button
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); // 2
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

			//Remove sale badge.
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
			remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

			add_filter( 'woocommerce_show_page_title', 'dima_wc_shop_title', 10 );
			add_filter( 'woocommerce_product_tabs', 'dima_wc_add_remove_product_tabs', 98 );

			/* Remove extra cart totals from the hook 2.3.8 woo */
			remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );

		}
	}
}

if ( dima_helper::dima_get_option( "dima_shop_sort" ) == '1' ) {

	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 30 );

	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

	add_action( 'woocommerce_before_shop_loop', 'dima_wc_ordering', 30 );
	add_action( 'woocommerce_get_catalog_ordering_args', 'dima_wc_get_catalog_ordering_args', 20 );
}
//Call woo construct
$DIMA_WOO_Controller = new DIMA_Woo_Controller();


/**
 * Define image sizes
 */
function dima_wc_image_size() {

	$catalog = array(
		'width'  => '582',// px
		'height' => '650',// px
		'crop'   => 1
	);

	$single = array(
		'width'  => '582',// px
		'height' => '650',// px
		'crop'   => 1
	);

	$thumbnail = array(
		'width'  => '106',// px
		'height' => '116',// px
		'crop'   => 1
	);
	// Product category thumbs
	update_option( 'shop_catalog_image_size', $catalog );
	// Single product image
	update_option( 'shop_single_image_size', $single );
	// Image gallery thumbs
	update_option( 'shop_thumbnail_image_size', $thumbnail );

}

add_action( 'admin_init', 'dima_wc_image_size', 1 );

if ( isset( $_GET['activated'] ) ) {
	// set image dimensions upon theme activation
	add_action( 'after_switch_theme', 'dima_wc_image_size', 1 );
}

// Small thumbnail size.
function dima_wc_single_product_small_thumbnail_size() {
	return 'shop_single';
}

add_filter( 'single_product_small_thumbnail_size', 'dima_wc_single_product_small_thumbnail_size' );

function dima_wc_shop_title() {
	return false;
}

//single-product
add_action( 'woocommerce_single_product_summary', 'dima_wc_single_product_summary_start', 1 );
add_action( 'woocommerce_single_product_summary', 'dima_wc_single_product_summary_end', 100 );


function dima_wc_single_product_summary_start() {
	echo '<div class="ok-md-5 ok-xsd-12 product-shop">';
}

function dima_wc_single_product_summary_end() {
	echo '</div>';
}


/**
 * Shop product thumbnails.
 */
function dima_wc_product_thumbnails() {
	$id    = get_the_ID();
	$thumb = apply_filters( 'single_product_catalog_thumbnail_size', 'shop_catalog' );

	global $product;
	$gallery          = get_post_meta( $id, '_product_image_gallery', true );
	$attachment_image = '';
	if ( ! empty( $gallery ) ) {
		$gallery          = explode( ',', $gallery );
		$first_image_id   = $gallery[0];
		$attachment_image = wp_get_attachment_image( $first_image_id, $thumb, false, array( 'class' => 'hover-image' ) );
	}
	$featurd_image = get_the_post_thumbnail( $id, $thumb );
	?>
    <div class="product-img">
		<?php
		dima_helper::dima_get_admin_edit();
		?>
        <div class="fix-chrome">
			<?php
			if ( empty( $featurd_image ) ) { ?>
                <figure>
					<?php echo $attachment_image ?>
                </figure>

				<?php
			} else {
				?>
                <figure>
					<?php echo $featurd_image ?>
                </figure>

                <figure class="product-change-images">
					<?php echo $attachment_image ?>
                </figure>
			<?php }
			?>
            <div class="post-icon link_overlay">

                <ul class="icons-media">
					<?php if ( $product->is_in_stock() ) {
						?>
                        <li>
                            <a href="<?php echo get_the_permalink() ?>">
                                <i class="fa fa-link"></i>
                            </a>
                        </li>
						<?php
						if ( $product->price != '' ) {
							if ( ! dima_woocommerce_version_check( '3.0.0' ) ) {
								woocommerce_get_template( 'loop/add-to-cart.php' );
							} else {
								wc_get_template( 'loop/add-to-cart.php' );
							}
						}
					} ?>
					<?php ?>
                </ul>
                <a class="default-link" href="<?php echo get_the_permalink() ?>">
                    <span class="topaz-hover"></span>
                </a>

            </div>
			<?php woocommerce_show_product_sale_flash(); ?>
        </div>
    </div>
	<?php
}

add_action( 'woocommerce_before_shop_loop_item_title', 'dima_wc_product_thumbnails', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'dima_wc_shop_start', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'dima_add_to_cart_list_style', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'dima_wc_shop_end', 10 );

function dima_wc_shop_start() {
	echo '<div class="dima-product-content">';
}

function dima_wc_shop_end() {
	echo '</div>';
}

function dima_add_to_cart_list_style() {
	global $post, $product;

	?>
    <div class="entry-content post-content">
        <div class="product-excerpt-container">
			<?php echo do_shortcode( $post->post_excerpt ); ?>
        </div>
        <div class="social-media social-medium">
            <ul class="inline clearfix">
				<?php if ( $product->is_in_stock() ) {
					?>
                    <li>
                        <a href="<?php echo get_the_permalink() ?>">
                            <i class="fa fa-link"></i>
                        </a>
                    </li>
					<?php
				} ?>
				<?php
				if ( ! dima_woocommerce_version_check( '3.0.0' ) ) {
					woocommerce_get_template( 'loop/add-to-cart.php' );
				} else {
					wc_get_template( 'loop/add-to-cart.php' );
				}
				?>
            </ul>
        </div>

    </div>
	<?php
}

/**
 * Product wrapper
 */
function dima_wc_single_product_start() {
	echo '<div class="dima-woocommerce-wrap"><div class="product-details ok-row dima-woocommerce-container">';
}

add_action( 'woocommerce_before_single_product', 'dima_wc_single_product_start', 10 );

function dima_wc_single_product_end() {
	echo '</div></div>';
}

add_action( 'woocommerce_after_single_product', 'dima_wc_single_product_end', 10 );


/**
 * No shipping available alert
 * @return string
 */
function dima_wc_cart_no_shipping_available_html() {
	if ( is_cart() ) {
		return '<div class="woocommerce-info dima-alert dima-alert-info fade in"><p>' . esc_html__( 'There doesn&lsquo;t seem to be any available shipping methods. Please double check your address, or contact us if you need any help.', 'okab' ) . '</p></div>';
	} else {
		return '<p>' . esc_html__( 'There doesn&lsquo;t seem to be any available shipping methods. Please double check your address, or contact us if you need any help.', 'okab' ) . '</p>';
	}
}

add_filter( 'woocommerce_cart_no_shipping_available_html', 'dima_wc_cart_no_shipping_available_html' );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 10 );
add_action( 'woocommerce_after_single_product_summary', 'dima_wc_related_products', 20 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display', 10 );
add_action( 'woocommerce_after_single_product_summary', 'dima_wc_upsells', 21 );

//********************/
//*      Navbar      */
//********************/

/**
 * Cart
 */
if ( ! function_exists( 'dima_wc_navbar_cart' ) ) :
	function dima_wc_navbar_cart( $show_sub_menu = "1" ) {

		$cart_price = dima_helper::dima_get_option( 'dima_shop_menu_price' );
		$cart_menu  = dima_helper::dima_get_option( 'dima_shop_sub_menu' );

		ob_start();
		$data = array(
			'total' => WC()->cart->get_cart_total(),
			'count' => WC()->cart->cart_contents_count
		);

		global $woocommerce;

		$cart_output = '<li class="shopping-btn menu-item-has-children cart_wrapper">';

		$cart_output .= '<a  href="' . dima_get_cart_url() . '" class="start-border">';
		$_total      = '';
		if ( $cart_price == '1' ) {
			$_total = '<span class="total">' . $data['total'] . '</span>';
		}
		$number      = '<span class="badge-number">' . $data['count'] . '</span>' . $_total;
		$cart_output .= '<span class="shop-icon"><i class="fa fa-shopping-bag"></i>' . $number . '</span></a>';

		if ( $cart_menu == '1' && $show_sub_menu == '1' ) {
			$cart_output .= '<ul class="sub-menu with-border product_list_widget">';
			foreach ( $woocommerce->cart->cart_contents as $cart_item ) {
				$product_link = get_permalink( $cart_item['product_id'] );
				$thumbnail_id = ( $cart_item['variation_id'] ) ? $cart_item['variation_id'] : $cart_item['product_id'];
				$cart_output  .= '<li>';
				$cart_output  .= '<a class="attachment-shop_thumbnail"  href="' . $product_link . '" title="' . $cart_item['data']->post->post_title . '">';
				$cart_output  .= get_the_post_thumbnail( $thumbnail_id, 'shop_thumbnail' );
				$cart_output  .= sprintf( '<span class="title text-start">%s</span>', $cart_item['data']->post->post_title );
				$cart_output  .= '<span class="text-start">';
				$cart_output  .= '</a>';
				$cart_output  .= sprintf( '<span class="amount">%s &times; %s</span>', $cart_item['quantity'], $woocommerce->cart->get_product_subtotal( $cart_item['data'], 1 ) );
				$cart_output  .= '</span>';
				$cart_output  .= '</li>';
			}

			$cart_output .= '<li>'
			                . '<p> ' . esc_html__( "Subtotal :", "okab" ) . '<span class="float-end">' . $data['total'] . '</span>'
			                . '</p>'
			                . '</li>'
			                . '<li>'
			                . '<a class="dima-cart dima-button di_header button-block fill" href="' . dima_get_cart_url() . '">' . esc_html__( 'View Cart', 'okab' ) . '</a>'
			                . '<a class="dima-checkout dima-button button-block fill no-bottom-margin" href="' . dima_get_checkout_url() . '">' . esc_html__( 'Checkout', 'okab' ) . '</a>'
			                . '</li>'
			                . '</ul>';
		}

		$social = ob_get_clean();

		return $cart_output . $social;
	}
endif;

// Cart fragment.
// Make Issuse with the cart sub menu.
Add_filter( 'woocommerce_add_to_cart_fragments', 'dima_wc_navbar_cart_fragment' );
function dima_wc_navbar_cart_fragment( $fragments ) {
	ob_start();
	$social                     = ob_get_clean();
	$header_top_cart            = dima_wc_navbar_cart() . $social;
	$fragments['.shopping-btn'] = $header_top_cart;

	return $fragments;
}

function dima_wc_ordering() {

	if ( isset( $_SERVER['QUERY_STRING'] ) ) {
		parse_str( $_SERVER['QUERY_STRING'], $params );
		$query_string = '?' . $_SERVER['QUERY_STRING'];
	} else {
		$query_string = '';
	}

	$dima_query_orderby = ! empty( $params['product_orderby'] ) ? $params['product_orderby'] : 'default';

	if ( ! empty( $params['product_order'] ) ) {
		$order = $params['product_order'];
	} else {
		switch ( $dima_query_orderby ) {
			case 'date':
				$order = 'desc';
				break;
			case 'price':
				$order = 'asc';
				break;
			case 'popularity':
				$order = 'asc';
				break;
			case 'rating':
				$order = 'desc';
				break;
			case 'name':
				$order = 'asc';
				break;
			case 'default':
				$order = 'asc';
				break;
		}
	}

	switch ( $dima_query_orderby ) {
		case 'date':
			$order_text = esc_html__( 'Date', 'okab' );
			break;
		case 'price':
			$order_text = esc_html__( 'Price', 'okab' );
			break;
		case 'popularity':
			$order_text = esc_html__( 'Popularity', 'okab' );
			break;
		case 'rating':
			$order_text = esc_html__( 'Rating', 'okab' );
			break;
		case 'name':
			$order_text = esc_html__( 'Name', 'okab' );
			break;
		case 'default':
			$order_text = esc_html__( 'Default Order', 'okab' );
			break;
	}

	$html_output = '<div class="ok-row dima-ordering">';
	$html_output .= '<div class="ok-md-5 ok-xsd-12">';
	$html_output .= '<div class="dima-show social-media social-medium">'
	                . '<ul class="inline clearfix">'
	                . '<li class="no-bottom-margin di-grids"><a href="' . dima_helper::dima_add_url_parameter( $query_string, 'product_view', 'products-grids' ) . '"><i class="fa fa-th"></i></a>'
	                . '</li>'
	                . '<li class="no-bottom-margin di-list"><a href="' . dima_helper::dima_add_url_parameter( $query_string, 'product_view', 'products-list' ) . '"><i class="fa fa-list"></i></a>'
	                . '</li>'
	                . '</ul>'
	                . '</div>'
	                . '</div>';

	$html_output .= '<div class="ok-md-7 ok-xsd-12 dima-orderby-container">';
	$html_output .= '<div class="sort-order float-end dima-show social-media social-medium">';
	$html_output .= '<ul class="inline clearfix">';

	if ( $order == 'desc' ):
		$html_output .= '<li class="desc"><a href="' . dima_helper::dima_add_url_parameter( $query_string, 'product_order', 'asc' ) . '"><i class="fa fa-long-arrow-down"></i></a></li>';
	endif;

	if ( $order == 'asc' ):
		$html_output .= '<li class="asc"><a href="' . dima_helper::dima_add_url_parameter( $query_string, 'product_order', 'desc' ) . '"><i class="fa fa-long-arrow-up"></i></a></li>';
	endif;

	$html_output .= '</ul>';
	$html_output .= '</div>';

	$html_output .= '<ul class="float-end orderby dima-order-dropdown">';
	$html_output .= '<li>';
	$html_output .= '<span class="li-current"><span class="li-current-content"><a>' . esc_html__( 'Sort by', 'okab' ) . ' <strong>' . $order_text . '</strong></a></span></span>';
	$html_output .= '<ul>';
	$html_output .= '<li class="' . ( ( $dima_query_orderby == 'default' ) ? 'current' : '' ) . '"><a href="' . dima_helper::dima_add_url_parameter( $query_string, 'product_orderby', 'default' ) . '">' . esc_html__( 'Sort by', 'okab' ) . ' <strong>' . esc_html__( 'Default Order', 'okab' ) . '</strong></a></li>';
	$html_output .= '<li class="' . ( ( $dima_query_orderby == 'name' ) ? 'current' : '' ) . '"><a href="' . dima_helper::dima_add_url_parameter( $query_string, 'product_orderby', 'name' ) . '">' . esc_html__( 'Sort by', 'okab' ) . ' <strong>' . esc_html__( 'Name', 'okab' ) . '</strong></a></li>';
	$html_output .= '<li class="' . ( ( $dima_query_orderby == 'price' ) ? 'current' : '' ) . '"><a href="' . dima_helper::dima_add_url_parameter( $query_string, 'product_orderby', 'price' ) . '">' . esc_html__( 'Sort by', 'okab' ) . ' <strong>' . esc_html__( 'Price', 'okab' ) . '</strong></a></li>';
	$html_output .= '<li class="' . ( ( $dima_query_orderby == 'date' ) ? 'current' : '' ) . '"><a href="' . dima_helper::dima_add_url_parameter( $query_string, 'product_orderby', 'date' ) . '">' . esc_html__( 'Sort by', 'okab' ) . ' <strong>' . esc_html__( 'Date', 'okab' ) . '</strong></a></li>';
	$html_output .= '<li class="' . ( ( $dima_query_orderby == 'popularity' ) ? 'current' : '' ) . '"><a href="' . dima_helper::dima_add_url_parameter( $query_string, 'product_orderby', 'popularity' ) . '">' . esc_html__( 'Sort by', 'okab' ) . ' <strong>' . esc_html__( 'Popularity', 'okab' ) . '</strong></a></li>';
	$html_output .= '<li class="' . ( ( $dima_query_orderby == 'rating' ) ? 'current' : '' ) . '"><a href="' . dima_helper::dima_add_url_parameter( $query_string, 'product_orderby', 'rating' ) . '">' . esc_html__( 'Sort by', 'okab' ) . ' <strong>' . esc_html__( 'Rating', 'okab' ) . '</strong></a></li>';
	$html_output .= '</ul>';
	$html_output .= '</li>';
	$html_output .= '</ul>';
	$html_output .= '</div>';
	$html_output .= '</div>';
	$html_output .= '<hr>';

	echo $html_output;
}

/**
 * @param $args
 *
 * @return mixed
 */
function dima_wc_get_catalog_ordering_args( $args ) {
	//Get URL query string
	//  1-product_orderby
	//  2-product_order
	if ( isset( $_SERVER['QUERY_STRING'] ) ) {
		parse_str( $_SERVER['QUERY_STRING'], $params );
	}

	//Get query value
	$dima_query_orderby = ! empty( $params['product_orderby'] ) ? $params['product_orderby'] : 'default';
	$dima_query_order   = ! empty( $params['product_order'] ) ? $params['product_order'] : 'ASC';
	$orderby            = $meta_key = '';

	switch ( $dima_query_orderby ) {
		case 'date':
			$orderby  = 'date';
			$order    = 'DESC';
			$meta_key = '';
			break;
		case 'price':
			$orderby  = 'meta_value_num';
			$order    = 'ASC';
			$meta_key = '_price';
			break;
		case 'popularity':
			$orderby  = 'meta_value_num';
			$order    = 'ASC';
			$meta_key = 'total_sales';
			break;
		case 'rating':
			$orderby  = 'meta_value_num';
			$order    = 'DESC';
			$meta_key = 'average_rating';
			break;
		case 'name':
			$orderby  = 'title';
			$order    = 'ASC';
			$meta_key = '';
			break;
		case 'default':
			return $args;
			break;
	}

	switch ( $dima_query_order ) {
		case 'desc':
			$order = 'DESC';
			break;
		case 'asc':
			$order = 'ASC';
			break;
		default:
			$order = 'ASC';
			break;
	}

	$args['orderby']  = $orderby;
	$args['order']    = $order;
	$args['meta_key'] = $meta_key;

	/**
	 * Sorting by rating
	 */
	if ( $dima_query_orderby == 'rating' ) {
		$args['orderby']  = 'menu_order title';
		$args['order']    = $order == 'DESC' ? 'DESC' : 'ASC';
		$args['order']    = strtoupper( $args['order'] );
		$args['meta_key'] = '';
		add_filter( 'posts_clauses', 'dima_order_by_rating' );
	}

	return $args;
}

/**
 * Order by rating post clauses.
 * from class-wc-query.php
 * @access public
 *
 * @param array $args
 *
 * @return array
 */
function dima_order_by_rating( $args ) {
	global $wpdb;

	$args['fields'] .= ", AVG( $wpdb->commentmeta.meta_value ) as average_rating ";

	$args['where'] .= " AND ( $wpdb->commentmeta.meta_key = 'rating' OR $wpdb->commentmeta.meta_key IS null ) ";

	$args['join'] .= "
    LEFT OUTER JOIN $wpdb->comments ON($wpdb->posts.ID = $wpdb->comments.comment_post_ID)
    LEFT JOIN $wpdb->commentmeta ON($wpdb->comments.comment_ID = $wpdb->commentmeta.comment_id)";

	$_order = isset( $_GET['product_order'] ) ? $_GET['product_order'] : '';
	$order  = woocommerce_clean( $_order );
	$order  = $order == 'asc' ? 'asc' : 'desc';
	$order  = strtoupper( $order );

	$args['orderby'] = "average_rating {$order}, $wpdb->posts.post_date DESC";

	$args['groupby'] = "$wpdb->posts.ID";

	return $args;
}


/**
 * Add/remove product tabs.
 *
 * @param $tabs
 *
 * @return mixed
 */
function dima_wc_add_remove_product_tabs( $tabs ) {
	if ( dima_helper::dima_get_option( 'dima_shop_description_tap_display' ) == '0' ) {
		unset( $tabs['description'] );
	}

	if ( dima_helper::dima_get_option( 'dima_shop_info_tap_display' ) == '0' ) {
		unset( $tabs['additional_information'] );
	}

	if ( dima_helper::dima_get_option( 'dima_shop_reviews_tap_display' ) == '0' ) {
		unset( $tabs['reviews'] );
	}

	return $tabs;
}

/* Check WooCommerce Version */
if ( ! function_exists( 'dima_woocommerce_version_check' ) ) {
	function dima_woocommerce_version_check( $version = '2.6' ) {
		global $woocommerce;
		if ( version_compare( $woocommerce->version, $version, ">=" ) ) {
			return true;
		}

		return false;
	}
}

/**
 * Columns and posts per page
 * @return mixed|void
 */
function dima_wc_shop_columns() {
	return dima_helper::dima_get_option( 'dima_shop_columns' );
}

add_filter( 'loop_shop_columns', 'dima_wc_shop_columns' );

/**
 * Set woo post number par page
 * @return mixed|void
 */
function dima_wc_shop_posts_per_page() {
	return dima_helper::dima_get_option( 'dima_shop_posts_per_page' );
}

add_filter( 'loop_shop_per_page', 'dima_wc_shop_posts_per_page' );


/**
 * Related Products
 */
function dima_wc_related_products() {
	$count   = dima_helper::dima_get_option( 'dima_shop_columns' );
	$columns = dima_helper::dima_get_option( 'dima_shop_columns' );
	$args    = array(
		'posts_per_page' => $count,
		'columns'        => $columns,
		'orderby'        => 'rand'
	);
	woocommerce_related_products( $args, true, true );
}

/**
 * Upsells
 */
function dima_wc_upsells() {
	$count   = dima_helper::dima_get_option( 'dima_shop_upsells_count' );
	$columns = dima_helper::dima_get_option( 'dima_shop_upsells_columns' );
	woocommerce_upsell_display( $count, $columns, 'rand' );
}


//********Hellper*********//

/**
 * Get Cart url
 * @return string
 */
function dima_get_cart_url() {
	$link = wc_get_cart_url();

	return $link;
}


/**
 * Get Checkout url
 * @return string
 */
function dima_get_checkout_url() {
	$link = wc_get_checkout_url();

	return $link;
}