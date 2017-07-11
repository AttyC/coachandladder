<?php
/*

Plugin Name: DIMA-Shortcodes
Plugin URI: http://pixeldima.com/
Version: 1.0.0
Author: PixelDima
Author URI: http://pixeldima.com/
Text Domain: dimashortcodes

*/

/**
 * Class and Function List:
 * Function list:
 * - dima_shortcode_woo()
 * Classes list:
 */

/**
 * Class DIMA_Woo_Shortcode
 */
class DIMA_Woo_Shortcode {
	private $is_paging = true;

	public function __construct() {
		add_shortcode( 'dima_woo', array( $this, 'dima_shortcode_woo' ) );
	}

	function dima_shortcode_woo( $atts ) {
		ob_start();
		extract( shortcode_atts( array(
			'post_class'       => '',
			'woo_style'        => '',
			'count'            => 6,
			'column'           => 2,
			'category'         => '',
			'slide_pagination' => true,
			'auto_play'        => false,
			'filters'          => 'true',
			'paging'           => 'false',
			'orderby'          => 'title',
			'order'            => 'desc',
			'dark'             => '',
			'ajax'             => '',
		), $atts, 'dima_woo' ) );

		wp_enqueue_script( 'magnific-js' );

		$template   = dima_helper::dima_get_demo();
		$post_class = ( $post_class != '' ) ? ' ' . esc_attr( $post_class ) : '';
		$category   = ( $category != '' ) ? $category : '';
		$filters    = ( $filters != 'true' ) ? 'false' : 'true';
		$count      = ( $count != '' ) ? $count : 6;
		$dark       = ( $dark == '' ) ? 'true' : $dark;
		$paging     = ( $paging != 'true' ) ? false : true;

		$this->is_paging = $paging;

		$is_slide = false;
		if ( $dark == "true" ) {
			$dark = " owl-darck";
		} else {
			$dark = "";
		}
		$meta_query = WC()->query->get_meta_query();

		if ( $woo_style == 'slide' ) {
			$woo_style = "grid";
			$is_slide  = true;
			$filters   = 'false';
			wp_enqueue_script( 'dima-owl' );
		}

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$array_query = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'orderby'             => $orderby,
			'order'               => $order,
			'posts_per_page'      => $count,
			'meta_query'          => $meta_query,
			'paged'               => "{$paged}",
			'product_cat'         => "{$category}"
		);

		$WP_Query = new WP_Query( $array_query );

		$ARG_ARRAY = array(
			'blog_type'  => $woo_style,
			'post_class' => $post_class,
		);

		$filters_array = array(
			'filters'  => $filters,
			'category' => $category,
		);

		$clm = dima_get_clm( $column );

		$POST_ARRAY = array(
			'template'     => $template,
			'is_slide'     => $is_slide,
			'column'       => $column,
			'clm'          => $clm,
			'count'        => $count,
			'pagination'   => $slide_pagination,
			'auto_play'    => $auto_play,
			'items'        => $column,
			'items_margin' => '',
			'navigation'   => 'false',
			'loop'         => 'false',
			'mouse_wheel'  => 'false',
			'items_phone'  => '',
			'items_tablet' => '',
			'dark'         => $dark,
		);

		if ( $is_slide == "1" ) {
			$this->slide( $POST_ARRAY, $WP_Query, $ARG_ARRAY );
		} elseif ( $woo_style == 'grid' ) {
			$this->grid( $POST_ARRAY, $WP_Query, $ARG_ARRAY, $filters_array );
		} else {
			$this->list_style( $POST_ARRAY, $WP_Query, $ARG_ARRAY );
		}

		return ob_get_clean();
	}

	/**
	 * @param $POST_ARRAY
	 * @param $query_
	 * @param $ARG_ARRAY
	 */
	function slide( $POST_ARRAY, $query_, $ARG_ARRAY ) {
		if ( empty( $query_ ) ) {
			$query_ = new WP_Query( array( 'orderby' => 'date' ) );
		}

		$js_data = array(
			'pagination'   => ( $POST_ARRAY['pagination'] == 'true' ) ? true : false,
			'auto_play'    => ( $POST_ARRAY['auto_play'] == 'true' ) ? true : false,
			'navigation'   => false,
			'loop'         => false,
			'mouse_wheel'  => false,
			'items'        => ( $POST_ARRAY['items'] == '' ) ? 1 : $POST_ARRAY['items'],
			'items_phone'  => ( $POST_ARRAY['items_phone'] == '' ) ? 1 : $POST_ARRAY['items_phone'],
			'items_tablet' => ( $POST_ARRAY['items_tablet'] == '' ) ? 2 : $POST_ARRAY['items_tablet'],
			'items_margin' => ( $POST_ARRAY['items_margin'] == '' ) ? 0 : $POST_ARRAY['items_margin'],
			'is_rtl'       => is_rtl()
		);

		$owl_class         = 'dima-slide-warp owl-carousel owl-theme owl-rtl ' . $POST_ARRAY['dark'] . ' ';
		$data              = dima_creat_data_attributes( 'owl_slider', $js_data );
		$POST_ARRAY['clm'] = '';
		?>
		<div class="products-grids products-slide <?php echo "$owl_class";
		echo " ";
		?>" <?php echo "$data"; ?>>
			<?php
			if ( $query_->have_posts() ):
				while ( $query_->have_posts() ):
					$query_->the_post();
					dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'content', 'woo', $ARG_ARRAY );
				endwhile;
				wp_reset_postdata();
			else:
				dima_helper::dima_get_view( 'global', '_content-none' );
			endif;
			?>
		</div>
		<?php wp_reset_query(); ?>
		<?php
	}

	function list_style( $POST_ARRAY, $query_, $ARG_ARRAY ) {
		if ( empty( $query_ ) ) {
			$query_ = new WP_Query( array( 'orderby' => 'date' ) );
		}
		$owl_class     = '';
		$iso_container = '';
		?>
		<div class="<?php echo "$owl_class";
		echo " ";
		echo $iso_container; ?>">
			<?php
			if ( $query_->have_posts() ):
				?>
				<ul class="ok-clm-warp products-list"><?php

				while ( $query_->have_posts() ):
					$query_->the_post();
					dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'content', 'woo', $ARG_ARRAY );
				endwhile;
				?></ul><?php

				wp_reset_postdata();
			else:
				dima_helper::dima_get_view( 'global', '_content-none' );
			endif;
			?>
		</div>
		<?php
		if ( $this->is_paging ) {
			dima_pagination( $query_ );
		}
		?>
		<?php wp_reset_query(); ?>
		<?php
	}

	function grid( $POST_ARRAY, $query_, $ARG_ARRAY, $filters_array ) {
		if ( empty( $query_ ) ) {
			$query_ = new WP_Query( array( 'orderby' => 'date' ) );
		}
		$owl_class     = '';
		$iso_container = '';

		if ( is_archive() || is_home() || ( is_singular() && is_page() ) ) {
			$ARG_ARRAY['post_class'] .= " isotope-item";
			$ARG_ARRAY['post_class'] .= ' ' . $POST_ARRAY['clm'];
			$iso_container = 'dima-isotope-container ';
		}

		?>
		<?php
		dima_portfolio_filters( $filters_array, "woo" );
		?>
		<div id="dima-isotope-container" class="<?php echo "$owl_class";
		echo " ";
		echo $iso_container; ?>">
			<?php
			if ( $query_->have_posts() ):
				woocommerce_product_loop_start();
				while ( $query_->have_posts() ):
					$query_->the_post();
					dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'content', 'woo', $ARG_ARRAY );
				endwhile;
				woocommerce_product_loop_end();
				wp_reset_postdata();
			else:
				dima_helper::dima_get_view( 'global', '_content-none' );
			endif;
			?>
		</div>
		<?php
		if ( $this->is_paging ) {
			dima_pagination( $query_ );
		}
		?>
		<?php wp_reset_query(); ?>
		<?php
	}

}

new DIMA_Woo_Shortcode();
?>