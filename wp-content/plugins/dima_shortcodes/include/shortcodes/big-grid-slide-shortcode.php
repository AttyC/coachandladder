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
 * - dima_shortcode_blog()
 * Classes list:
 */
class DIMA_BigGridSlide {
	private $query = '';
	const POST_LIMIT = 5;

	public function __construct() {
		add_shortcode( 'big-grid-slide', array( $this, 'dima_shortcode_blog' ) );
	}

	function dima_shortcode_blog( $atts ) {

		extract( shortcode_atts( array(
			'id'           => '',
			'hover_style'  => 'hover-two',
			'style'        => '',
			'blog_style'   => 'slide_two',
			'count'        => 3,
			'category'     => '',
			'tag'          => '',
			'offset'       => '',
			'order'        => '',
			'mouse_wheel'  => 'false',
			'loop'         => 'false',
			'navigation'   => 'false',
			'auto_play'    => 'false',
			'pagination'   => 'false',
			'animation'    => 'fade',
			'items_margin' => '',
		), $atts, 'big-grid-slide' ) );

		$template    = dima_helper::dima_get_demo();
		$hover_style = ( $hover_style != '' ) ? ' ' . esc_attr( $hover_style ) : ' hover-two';
		$category    = ( $category != '' ) ? $category : '';
		$tag         = ( $tag != '' ) ? $tag : '';
		$count       = ( $count != '' ) ? $count : 3;
		$order       = ( $order != '' ) ? $order : '';

		switch ( $blog_style ) {
			case'slide_one':
				$POST_ARRAY = array(
					'template'     => $template,
					'blog_style'   => $blog_style,
					'count'        => $count,
					'class'        => ' dima-big-grid-slide-one',
					'pagination'   => ( $pagination == 'true' ),
					'auto_play'    => ( $auto_play == 'true' ),
					'navigation'   => ( $navigation == 'true' ),
					'loop'         => ( $loop == 'true' ),
					'mouse_wheel'  => ( $mouse_wheel == 'true' ),
					'items'        => '2',
					'items_phone'  => '2',
					'items_tablet' => '2',
					'animation'    => $animation,
					'items_margin' => ( $items_margin == '' ) ? 2 : $items_margin,
				);
				break;
			case'slide_two':
				$POST_ARRAY = array(
					'template'     => $template,
					'blog_style'   => $blog_style,
					'count'        => $count,
					'class'        => ' dima-big-grid-slide-two',
					'pagination'   => ( $pagination == 'true' ),
					'auto_play'    => ( $auto_play == 'true' ),
					'navigation'   => ( $navigation == 'true' ),
					'loop'         => ( $loop == 'true' ),
					'mouse_wheel'  => ( $mouse_wheel == 'true' ),
					'items'        => '2',
					'items_phone'  => '1',
					'items_tablet' => '2',
					'items_margin' => ( $items_margin == '' ) ? 2 : $items_margin,
				);
				break;
			case'slide_three':
				$POST_ARRAY = array(
					'template'     => $template,
					'blog_style'   => $blog_style,
					'count'        => $count,
					'class'        => ' dima-big-grid-slide-three',
					'pagination'   => ( $pagination == 'true' ),
					'auto_play'    => ( $auto_play == 'true' ),
					'navigation'   => ( $navigation == 'true' ),
					'loop'         => ( $loop == 'true' ),
					'mouse_wheel'  => ( $mouse_wheel == 'true' ),
					'items'        => '3',
					'items_phone'  => '1',
					'items_tablet' => '2',
					'items_margin' => ( $items_margin == '' ) ? 2 : $items_margin,
				);
				break;
			case 'slide_for':
				$POST_ARRAY = array(
					'template'     => $template,
					'blog_style'   => $blog_style,
					'count'        => $count,
					'class'        => ' dima-big-grid-slide-for',
					'pagination'   => ( $pagination == 'true' ),
					'auto_play'    => ( $auto_play == 'true' ),
					'navigation'   => ( $navigation == 'true' ),
					'loop'         => ( $loop == 'true' ),
					'mouse_wheel'  => ( $mouse_wheel == 'true' ),
					'items'        => '4',
					'items_phone'  => '1',
					'items_tablet' => '2',
					'items_margin' => ( $items_margin == '' ) ? 0 : $items_margin,
				);
				break;

		}

		switch ( $order ) {
			case 'top-view':
				$order_array = array(
					'meta_key' => 'dima_post_views_count',
					'orderby'  => 'meta_value_num',
					'order'    => 'DESC'
				);
				break;
			case 'popular':
				$order_array = array(
					'orderby' => 'comment_count',
					'order'   => 'DESC'
				);
				break;
			//Latest
			default:
				$order_array = array( 'orderby' => 'date' );
				break;
		}
		$array_query = array(
			'post_type'      => "post",
			'posts_per_page' => "{$count}",
			'offset'         => "{$offset}",
			'category_name'  => "{$category}",
			'tag'            => "{$tag}",
		);
		$merge       = array_merge( $array_query, $order_array );
		$dima_query  = new WP_Query( $merge );
		$this->query = $dima_query;

		if ( is_archive() ) {
			global $wp_query;
			$dima_query = $wp_query;
		}

		$ARG_ARRAY = array(
			'blog_style'  => $blog_style,
			'hover_style' => $hover_style,
		);

		ob_start();
		$this->Blog_Style( $POST_ARRAY, $dima_query, $ARG_ARRAY );

		return ob_get_clean();
	}

	public function Blog_Style( $POST_ARRAY, $wp_query, $ARG_ARRAY ) {
		if ( empty( $wp_query ) ) {
			$wp_query = new WP_Query( array( 'orderby' => 'date' ) );
		}
		if ( $ARG_ARRAY['blog_style'] == 'slide_one' ) {
			$this->slide_one( $POST_ARRAY, $wp_query, $ARG_ARRAY );
		} else {
			$this->slide_global( $POST_ARRAY, $wp_query, $ARG_ARRAY );
		}
	}

	function slide_one( $POST_ARRAY, $wp_query, $ARG_ARRAY ) {
		$js_data = array(
			'animation'      => $POST_ARRAY['animation'],
			'slideshowSpeed' => '7000',
			'slideSpeed'     => '600',
			'controlNav'     => false,
			'directionNav'   => true,
			'slideshow'      => false,
			'random'         => true,
		);

		$owl_class = 'flexslider sample-slide small-control ';
		$data      = dima_creat_data_attributes( 'slider', $js_data );
		?>
		<div
			class="<?php echo "$owl_class"; ?> boxed-blog dima-big-grid-wrapper boxed-blog clearfix <?php echo $ARG_ARRAY['hover_style'];
			echo $POST_ARRAY['class'] ?>" <?php echo "$data"; ?>>
			<ul class="slides">

				<?php
				if ( $wp_query->have_posts() ) {
					while ( $wp_query->have_posts() ):
						?>
						<li class="slide-item main-post"><?php
						$wp_query->the_post();
						dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'big-grid-content', 'main', $ARG_ARRAY );
						?></li><?php
					endwhile;
					wp_reset_postdata();
				} else {
					dima_helper::dima_get_view( 'global', '_content-none' );
				} ?>
			</ul>
		</div>
		<?php
		wp_reset_query();
	}

	function slide_global( $POST_ARRAY, $wp_query, $ARG_ARRAY ) {
		$js_data = array(
			'pagination'   => ( $POST_ARRAY['pagination'] == 'true' ),
			'auto_play'    => ( $POST_ARRAY['auto_play'] == 'true' ),
			'navigation'   => ( $POST_ARRAY['navigation'] == 'true' ),
			'loop'         => ( $POST_ARRAY['loop'] == 'true' ),
			'mouse_wheel'  => ( $POST_ARRAY['mouse_wheel'] == 'true' ),
			'items'        => $POST_ARRAY['items'],
			'items_phone'  => $POST_ARRAY['items_phone'],
			'items_tablet' => $POST_ARRAY['items_tablet'],
			'items_margin' => $POST_ARRAY['items_margin'],
			'is_rtl'       => is_rtl()
		);

		$owl_class = 'owl-carousel owl-theme owl-rtl owl-darck ';
		$data      = dima_creat_data_attributes( 'owl_slider', $js_data );
		?>
		<div
			class="<?php echo "$owl_class"; ?> boxed-blog dima-big-grid-wrapper boxed-blog clearfix <?php echo $ARG_ARRAY['hover_style'];
			echo $POST_ARRAY['class'] ?>" <?php echo "$data"; ?>>

			<?php
			if ( $wp_query->have_posts() ) {
				while ( $wp_query->have_posts() ):
					?>
					<div class="main-post"><?php
					$wp_query->the_post();
					if ( $ARG_ARRAY['blog_style'] == 'slide_for' ) {
						dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'big-grid-content', 'list', $ARG_ARRAY );
					} else {
						dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'big-grid-content', 'main', $ARG_ARRAY );
					}
					?></div><?php
				endwhile;
				wp_reset_postdata();
			} else {
				dima_helper::dima_get_view( 'global', '_content-none' );
			} ?>
		</div>
		<?php
		wp_reset_query();
	}

}

new DIMA_BigGridSlide();
?>