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
class DIMA_BigGrid {
	private $query = '';

	public function __construct() {
		add_shortcode( 'big-grid', array( $this, 'dima_shortcode_blog' ) );
	}

	function dima_shortcode_blog( $atts ) {

		extract( shortcode_atts( array(
			'id'          => '',
			'hover_style' => 'hover-two',
			'style'       => '',
			'blog_style'  => 'one',
			'count'       => 3,
			'category'    => '',
			'tag'         => '',
			'offset'      => '',
			'order'       => '',
		), $atts, 'big-grid' ) );

		$template    = dima_helper::dima_get_demo();
		$hover_style = ( $hover_style != '' ) ? ' ' . esc_attr( $hover_style ) : ' hover-two';
		$category    = ( $category != '' ) ? $category : '';
		$tag         = ( $tag != '' ) ? $tag : '';
		$count       = ( $count != '' ) ? $count : 3;
		$order       = ( $order != '' ) ? $order : '';

		switch ( $blog_style ) {
			case'one':
				$count = 3;
				break;
			case'two':
				$count = 6;
				break;
			case'three':
				$count = 5;
				break;
			case'style_for':
				$count = 3;
				break;
			case'five':
				$count = 2;
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


		$POST_ARRAY = array(
			'template'     => $template,
			'blog_style'   => $blog_style,
			'count'        => $count,
			'pagination'   => 'true',
			'auto_play'    => 'true',
			'navigation'   => 'false',
			'loop'         => 'false',
			'mouse_wheel'  => 'false',
			'items_phone'  => '',
			'items_tablet' => '',
		);
		ob_start();
		$this->Blog_Style( $POST_ARRAY, $dima_query, $ARG_ARRAY );

		return ob_get_clean();
	}

	public function Blog_Style( $POST_ARRAY, $wp_query, $ARG_ARRAY ) {
		if ( empty( $wp_query ) ) {
			$wp_query = new WP_Query( array( 'orderby' => 'date' ) );
		}
		if ( $POST_ARRAY['blog_style'] != '' ) {
			$this->{$POST_ARRAY['blog_style']}( $POST_ARRAY, $wp_query, $ARG_ARRAY );
		} else {
			$this->one( $POST_ARRAY, $wp_query, $ARG_ARRAY );
		}
	}

	function one( $POST_ARRAY, $wp_query, $ARG_ARRAY ) {
		$POST_LIMIT = 8;
		?>
		<div
			class="dima-big-grid-wrapper dima-big-grid-one boxed-blog clearfix <?php echo $ARG_ARRAY['hover_style'] ?>">
			<?php
			if ( $wp_query->have_posts() ) {
				?>
				<div class="main-post"><?php
					$wp_query->the_post();
					dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'big-grid-content', 'main', $ARG_ARRAY );
					?></div>
				<div class="posts-list">
					<?php
					for ( $i = 1; $wp_query->have_posts() && $POST_LIMIT > $i; $i ++ ) {
						$wp_query->the_post();
						dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'big-grid-content', 'list', $ARG_ARRAY );
					}
					?>
				</div>
				<?php
				wp_reset_postdata();
			} else {
				dima_helper::dima_get_view( 'global', '_content-none' );
			}
			?>
		</div>
		<?php
		wp_reset_query();
	}

	function one_padding( $POST_ARRAY, $wp_query, $ARG_ARRAY ) {
		$POST_LIMIT = 8;
		?>
		<div
			class="dima-big-grid-wrapper dima-big-grid-one-padding boxed-blog clearfix <?php echo $ARG_ARRAY['hover_style'] ?>">
			<?php
			if ( $wp_query->have_posts() ) {
				?>
				<div class="main-post"><?php
					$wp_query->the_post();
					dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'big-grid-content', 'main', $ARG_ARRAY );
					?></div>
				<div class="posts-list">
					<?php
					for ( $i = 1; $wp_query->have_posts() && $POST_LIMIT > $i; $i ++ ) {
						$wp_query->the_post();
						dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'big-grid-content', 'list', $ARG_ARRAY );
					}
					?>
				</div>
				<?php
				wp_reset_postdata();
			} else {
				dima_helper::dima_get_view( 'global', '_content-none' );
			}
			?>
		</div>
		<?php
		wp_reset_query();
	}

	function two( $POST_ARRAY, $wp_query, $ARG_ARRAY ) {
		$POST_LIMIT = 6;
		?>
		<div
			class="dima-big-grid-wrapper dima-big-grid-two boxed-blog clearfix <?php echo $ARG_ARRAY['hover_style'] ?>">
			<?php
			if ( $wp_query->have_posts() ) {
				?>
				<div class="main-post"><?php
					for ( $i = 0; $wp_query->have_posts() && $i < 2; $i ++ ) {
						$wp_query->the_post();
						dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'big-grid-content', 'main', $ARG_ARRAY );
					}
					?></div>
				<div class="posts-list">
					<?php
					for ( $i = 2; $wp_query->have_posts() && $i < $POST_LIMIT; $i ++ ) {
						$wp_query->the_post();
						dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'big-grid-content', 'list', $ARG_ARRAY );
					}
					?>
				</div>
				<?php
				wp_reset_postdata();
			} else {
				dima_helper::dima_get_view( 'global', '_content-none' );
			}
			?>
		</div>
		<?php
		wp_reset_query();
	}

	function three( $POST_ARRAY, $wp_query, $ARG_ARRAY ) {
		$POST_LIMIT = 5;
		?>
		<div
			class="dima-big-grid-wrapper dima-big-grid-three boxed-blog clearfix <?php echo $ARG_ARRAY['hover_style'] ?>">
			<?php
			if ( $wp_query->have_posts() ) {
				?>
				<div class="main-post"><?php
					$wp_query->the_post();
					dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'big-grid-content', 'main', $ARG_ARRAY );
					?></div>
				<div class="posts-list">
					<?php
					for ( $i = 1; $wp_query->have_posts() && $i < $POST_LIMIT; $i ++ ) {
						$wp_query->the_post();
						dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'big-grid-content', 'list', $ARG_ARRAY );
					}
					?>
				</div>
				<?php
				wp_reset_postdata();
			} else {
				dima_helper::dima_get_view( 'global', '_content-none' );
			}
			?>
		</div>
		<?php
		wp_reset_query();
	}

	function style_for( $POST_ARRAY, $wp_query, $ARG_ARRAY ) {
		$POST_LIMIT = 3;
		?>
		<div
			class="dima-big-grid-wrapper dima-big-grid-for boxed-blog clearfix <?php echo $ARG_ARRAY['hover_style'] ?>">
			<?php
			if ( $wp_query->have_posts() ) {
				?>
				<div class="main-post"><?php
					for ( $i = 0; $wp_query->have_posts() && $i < $POST_LIMIT; $i ++ ) {
						$wp_query->the_post();
						dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'big-grid-content', 'main', $ARG_ARRAY );
					} ?></div>
				<?php
				wp_reset_postdata();
			} else {
				dima_helper::dima_get_view( 'global', '_content-none' );
			}
			?>
		</div>
		<?php
		wp_reset_query();
	}

	function style_five( $POST_ARRAY, $wp_query, $ARG_ARRAY ) {
		$POST_LIMIT = 2;
		?>
		<div
			class="dima-big-grid-wrapper dima-big-grid-five boxed-blog clearfix <?php echo $ARG_ARRAY['hover_style'] ?>">
			<?php
			if ( $wp_query->have_posts() ) {
				?>
				<div class="main-post"><?php
					for ( $i = 0; $wp_query->have_posts() && $i < $POST_LIMIT; $i ++ ) {
						$wp_query->the_post();
						dima_helper::dima_get_view_with_args( $POST_ARRAY['template'], 'big-grid-content', 'main', $ARG_ARRAY );
					} ?></div>
				<?php
				wp_reset_postdata();
			} else {
				dima_helper::dima_get_view( 'global', '_content-none' );
			}
			?>
		</div>
		<?php
		wp_reset_query();
	}
}

new DIMA_BigGrid();
?>