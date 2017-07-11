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
 * - dima_shortcode_portfolio()
 * Classes list:
 */

/**
 * Class DIMA_Portfolio_Shortcode
 */
class DIMA_Portfolio_Shortcode {

	private $G_pagination = true;

	public function __construct() {
		add_shortcode( 'portfolio', array( $this, 'dima_shortcode_portfolio' ) );
	}

	function dima_shortcode_portfolio( $atts ) {
		ob_start();
		extract( shortcode_atts( array(
			'id'               => '',
			'style'            => '',
			'post_class'       => '',
			'portfolio_style'  => '',
			'count'            => 6,
			'column'           => 2,
			'img_hover'        => '',
			'elm_hover'        => '',
			'no_margin'        => 'false',
			'no_border'        => 'false',
			'category'         => '',
			'dark'             => '',
			'items_margin'     => 30,
			'slide_pagination' => true,
			'auto_play'        => false,
			'filters'          => 'true',
			'offset'           => '',
			'ajax'             => '',
			'paging'           => 'false',
		), $atts, 'portfolio' ) );

		wp_enqueue_script( 'magnific-js' );

		$template   = dima_helper::dima_get_demo();
		$post_class = ( $post_class != '' ) ? ' ' . esc_attr( $post_class ) : '';
		$category   = ( $category != '' ) ? $category : '';
		$elm_hover  = ( $elm_hover != '' ) ? $elm_hover : '';
		$img_hover  = ( $img_hover != '' ) ? $img_hover : '';
		$no_margin  = ( $no_margin != 'true' ) ? 'false' : 'true';
		$no_border  = ( $no_border != 'true' ) ? 'false' : 'true';
		$filters    = ( $filters != 'true' ) ? 'false' : 'true';
		$paging     = ( $paging != 'true' ) ? false : true;
		$dark       = ( $dark == '' ) ? 'true' : $dark;
		$is_slide   = false;

		$this->is_paging = $paging;

		if ( $portfolio_style == 'slide' ) {
			$portfolio_style = "grid";
			$is_slide        = true;
			$filters         = 'false';
			wp_enqueue_script( 'dima-owl' );
		}

		if ( $dark == "true" ) {
			$dark = " owl-darck";
		} else {
			$dark = "";
		}

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		if ( $offset != '' && $paging == true ) {
			$offset = ( $paged - $offset ) * $count;
		}

		if ( $paging ) {
			$array_query = array(
				'post_type'          => 'dima-portfolio',
				'posts_per_page'     => "{$count}",
				'paged'              => "{$paged}",
				'offset'             => "{$offset}",
				'portfolio-category' => "{$category}"
			);
			$WP_Query    = new WP_Query( $array_query );
		} else {
			$WP_Query           = new WP_Query( array(
				'post_type'          => 'dima-portfolio',
				'posts_per_page'     => "{$count}",
				'offset'             => "{$offset}",
				'portfolio-category' => "{$category}"
			) );
			$this->G_pagination = false;
		}

		if ( is_archive() ) {
			global $wp_query;
			$WP_Query = $wp_query;
		}

		$ARG_ARRAY = array(
			'no_margin'  => $no_margin,
			'no_border'  => $no_border,
			'elm_hover'  => $elm_hover,
			'img_hover'  => $img_hover,
			'blog_type'  => $portfolio_style,
			'post_class' => $post_class,
		);

		$filters_array = array(
			'filters'  => $filters,
			'category' => $category,
		);

		$clm        = dima_get_clm( $column );
		$POST_ARRAY = array(
			'template'     => $template,
			'is_slide'     => $is_slide,
			'column'       => $column,
			'clm'          => $clm,
			'count'        => $count,
			'pagination'   => $slide_pagination,
			'auto_play'    => $auto_play,
			'navigation'   => 'false',
			'loop'         => 'false',
			'mouse_wheel'  => 'false',
			'items'        => $column,
			'items_phone'  => '',
			'items_tablet' => '',
			'items_margin' => $items_margin,
			'dark'         => $dark,
		);

		$this->portfolio_type( $POST_ARRAY, $WP_Query, $ARG_ARRAY, $filters_array );

		return ob_get_clean();

	}

	/**
	 * @param $POST_ARRAY
	 * @param $WP_Query
	 * @param $ARG_ARRAY
	 * @param $filters_array
	 */
	public function portfolio_type( $POST_ARRAY, $WP_Query, $ARG_ARRAY, $filters_array ) {
		if ( empty( $WP_Query ) ) {
			$WP_Query = new WP_Query( array( 'orderby' => 'date' ) );
		}
		if ( $ARG_ARRAY['blog_type'] != '' ) {
			$this->{$ARG_ARRAY['blog_type']}( $POST_ARRAY, $WP_Query, $ARG_ARRAY, $filters_array );
		} else {
			$this->grid( $POST_ARRAY, $WP_Query, $ARG_ARRAY, $filters_array );
		}
	}


	/**
	 * @param $POST_ARRAY
	 * @param $portfolio
	 * @param $ARG_ARRAY
	 * @param $filters_array
	 */
	function grid( $POST_ARRAY, $portfolio, $ARG_ARRAY, $filters_array ) {

		$owl_class     = '';
		$data          = '';
		$iso_container = '';

		if ( is_archive() || is_home() || ( is_singular() && is_page() ) ) {
			$ARG_ARRAY['post_class'] .= " isotope-item";
			if ( $POST_ARRAY['is_slide'] != 'true' ) {
				$ARG_ARRAY['post_class'] .= ' ' . $POST_ARRAY['clm'];
				$iso_container = 'dima-isotope-container ';
			}
		}

		if ( $ARG_ARRAY['no_margin'] == 'true' ) {
			$ARG_ARRAY['no_margin'] = " isotope-no-margin ";
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

		if ( $POST_ARRAY['is_slide'] == 'true' ) {
			$owl_class         = 'dima-slide-warp owl-carousel owl-theme owl-rtl' . $POST_ARRAY['dark'] . ' ';
			$data              = dima_creat_data_attributes( 'owl_slider', $js_data );
			$POST_ARRAY['clm'] = '';
		}
		?>
		<?php dima_portfolio_filters( $filters_array ); ?>
		<div id="dima-isotope-container" class="<?php echo "$owl_class";
		echo $ARG_ARRAY['no_margin'];
		echo " ";
		echo $iso_container; ?>boxed-blog blog-list" <?php echo "$data"; ?>>
			<?php
			if ( $portfolio->have_posts() ):
				while ( $portfolio->have_posts() ):
					$portfolio->the_post();
					dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'content', 'portfolio', $ARG_ARRAY );
				endwhile;
				wp_reset_postdata();
			else:
				dima_helper::dima_get_view( 'global', '_content-none' );
			endif;
			?>
		</div>
		<?php
		if ( $this->G_pagination ) {
			dima_pagination( $portfolio );
		}
		?>
		<?php wp_reset_query(); ?>
		<?php
	}

	/**
	 * @param $POST_ARRAY
	 * @param $portfolio
	 * @param $ARG_ARRAY
	 * @param $filters_array
	 */
	function masonry( $POST_ARRAY, $portfolio, $ARG_ARRAY, $filters_array ) {
		if ( is_archive() || is_home() || ( is_singular() && is_page() ) ) {
			$ARG_ARRAY['post_class'] .= " isotope-item";
			$ARG_ARRAY['post_class'] .= ' ' . $POST_ARRAY['clm'];
		}

		if ( $ARG_ARRAY['no_margin'] == 'true' ) {
			$ARG_ARRAY['no_margin'] = " isotope-no-margin ";
		}
		?>
		<?php dima_portfolio_filters( $filters_array ); ?>
		<div class="boxed-blog blog-list">
			<div id="dima-isotope-container"
			     class="<?php echo $ARG_ARRAY['no_margin'] ?>dima-isotope-container isotope masonry boxed-protfolio">
				<?php
				if ( $portfolio->have_posts() ):
					while ( $portfolio->have_posts() ):
						$portfolio->the_post();
						dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'content', 'portfolio', $ARG_ARRAY );
					endwhile;
					wp_reset_postdata();
				else:
					dima_helper::dima_get_view( 'global', '_content-none' );
				endif;
				?>
			</div>
		</div>
		<?php
		if ( $this->G_pagination ) {
			dima_pagination( $portfolio );
		}
		?>
		<?php wp_reset_query(); ?>
		<?php
	}


}

new DIMA_Portfolio_Shortcode();
?>