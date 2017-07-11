<?php

/**
 * Class and Function List:
 * Function list:
 * - dima_shortcode_related_portfolio()
 * Classes list:
 */
class DIMA_RelatedPortfolio {

	public function __construct() {
		add_shortcode( 'related_portfolio', array( $this, 'dima_shortcode_related_portfolio' ) );
	}

	function dima_shortcode_related_portfolio( $atts ) {

		extract( shortcode_atts( array(
			'id'              => '',
			'is_slide'        => false,
			'class'           => '',
			'style'           => '',
			'column'          => 3,
			'items_margin'    => 30,
			'portfolio_style' => '',
			'count'           => 6,
			'img_hover'       => '',
			'elm_hover'       => '',
			'no_margin'       => 'false',
			'no_border'       => 'false',
		), $atts, 'related_portfolio' ) );

		$class = ( $class != '' ) ? 'boxed-blog blog-list ' . esc_attr( $class ) : 'boxed-blog blog-list';

		$elm_hover = ( $elm_hover != '' ) ? $elm_hover : '';
		$img_hover = ( $img_hover != '' ) ? $img_hover : '';
		$no_margin = ( $no_margin != 'true' ) ? 'false' : 'true';
		$no_border = ( $no_border != 'true' ) ? 'false' : 'true';

		$clm = dima_get_clm( $column );

		if ( $portfolio_style == 'slide' ) {
			$portfolio_style = "grid";
			$is_slide        = true;
			wp_enqueue_script( 'dima-owl' );
		} else {
			$is_slide = false;
		}

		$ARG_ARRAY = array(
			'is_slide'     => $is_slide,
			'column'       => $column,
			'clm'          => $clm,
			'count'        => $count,
			'pagination'   => 'true',
			'auto_play'    => 'true',
			'navigation'   => 'false',
			'loop'         => 'false',
			'mouse_wheel'  => 'false',
			'items'        => $column,
			'items_phone'  => '',
			'items_tablet' => '',
			'items_margin' => $items_margin,
			'no_margin'    => $no_margin,
			'no_border'    => $no_border,
			'elm_hover'    => $elm_hover,
			'img_hover'    => $img_hover,
			'post_class'   => $class,
			'blog_type'    => $portfolio_style
		);

		ob_start();

		$this->related_portfolio( $ARG_ARRAY );

		return ob_get_clean();
	}

	public static function related_portfolio( $ARG_ARRAY ) {
		$related_portfolio = dima_helper::dima_get_post_related_posts( $ARG_ARRAY['count'], 'dima-portfolio' );
		$owl_class         = '';
		$data              = '';
		$ok_row            = 'ok-row ';
		$template          = dima_helper::dima_get_demo();

		if ( $related_portfolio ) {
			$js_data = array(
				'pagination'   => ( $ARG_ARRAY['pagination'] == 'true' ),
				'auto_play'    => ( $ARG_ARRAY['auto_play'] == 'true' ),
				'navigation'   => ( $ARG_ARRAY['navigation'] == 'true' ),
				'loop'         => ( $ARG_ARRAY['loop'] == 'true' ),
				'mouse_wheel'  => ( $ARG_ARRAY['mouse_wheel'] == 'true' ),
				'items'        => ( $ARG_ARRAY['items'] == '' ) ? 1 : $ARG_ARRAY['items'],
				'items_phone'  => ( $ARG_ARRAY['items_phone'] == '' ) ? 1 : $ARG_ARRAY['items_phone'],
				'items_tablet' => ( $ARG_ARRAY['items_tablet'] == '' ) ? 2 : $ARG_ARRAY['items_tablet'],
				'items_margin' => ( $ARG_ARRAY['items_margin'] == '' ) ? 0 : $ARG_ARRAY['items_margin'],
				'is_rtl'       => is_rtl()
			);

			if ( $ARG_ARRAY['is_slide'] ) {
				$owl_class        = 'owl-carousel owl-theme owl-rtl owl-darck ';
				$data             = dima_creat_data_attributes( 'owl_slider', $js_data );
				$ARG_ARRAY['clm'] = '';
				$ok_row           = '';
				$iso_container    = '';
			} else {
				$iso_container = 'dima-isotope-container ';
			}
			$ARG_ARRAY['post_class'] = ' isotope-item ' . $ARG_ARRAY['clm'];

			$owl_class .= $ok_row;
			?>

			<div class="<?php echo "$owl_class";
			echo $ARG_ARRAY['no_margin'];
			echo " ";
			echo $iso_container; ?>" <?php echo "$data"; ?>>
				<?php
				if ( $related_portfolio->have_posts() ):
					while ( $related_portfolio->have_posts() ):
						$related_portfolio->the_post();
						dima_helper::dima_get_view_with_args( $template, 'content', 'related-portfolio', $ARG_ARRAY );
					endwhile;
					wp_reset_postdata();
				else:
					dima_helper::dima_get_view( 'global', '_content-none' );
				endif;
				?>
			</div>
			<?php
		}
	}
}

new DIMA_RelatedPortfolio();
?>