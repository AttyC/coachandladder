<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
if ( dima_helper::dima_get_option( 'dima_news_display' )
     &&
     ( ! dima_helper::dima_get_option( 'dima_news_display_home' ) ||
       ( dima_helper::dima_get_option( 'dima_news_display_home' ) && is_home() )
       || is_front_page() )
):

	$query = dima_helper::dima_get_option( 'dima_news_query' );
	$cat = dima_helper::dima_get_option( 'dima_news_cat_list' );
	$title = dima_helper::dima_get_option( 'dima_news_title' );
	$tag = dima_helper::dima_get_option( 'dima_news_tag_list' );
	$count = dima_helper::dima_get_option( 'dima_news_count' );
	$effect = dima_helper::dima_get_option( 'dima_news_animation' );
	$speed = '4500';
	$timeout = '500';
	$control_nav = false;
	$slideshow = true;
	$random = true;
	$direction_nav = true;

	$js_data = array(
		'animation'      => ( $effect == 'fade' ) ? 'fade' : 'slide',
		'slideshowSpeed' => ( $speed != '' ) ? $speed : '7000',
		'slideSpeed'     => ( $timeout != '' ) ? $timeout : '6000',
		'controlNav'     => ( $control_nav != true ) ? $control_nav : true,
		'directionNav'   => ( $direction_nav == true ),
		'slideshow'      => ( $slideshow == true ),
		'random'         => ( $random == true ),
	);

	$data = dima_creat_data_attributes( 'slider', $js_data );
	?>

	<div class="dima-breaking-news">
		<div class="container">

			<span class="side-color"></span>
			<span class="dima-breaking-news-title">
			<i class="breaking-news-icon fa fa-bullhorn" aria-hidden="true"></i>
			<span><?php echo esc_attr( $title ); ?></span>
		</span>
			<?php
			global $post;
			$_post     = $post;
			$tags_list = '';
			?>

			<?php
			if ( $query == 'tag' && ! empty( $tag ) ) {
				$tags = explode( ',', $tag );
				foreach ( $tags as $tag ) {
					$sep = ',';
					$tags_list .= $sep . $tag;
				}
				$args = array(
					'tag'            => $tags_list,
					'posts_per_page' => $count,
					'no_found_rows'  => 1
				);
			} else {
				$args = array(
					'category__in'   => $cat,
					'posts_per_page' => $count,
					'no_found_rows'  => 1
				);
			}

			$global_query = array(
				'post_type' => 'post',
			);

			$the_query = new wp_query( $args );

			if ( $the_query->have_posts() ) : $count = 0; ?>
				<div class="flexslider direction-side" <?php echo $data ?>>
					<ul class="slides">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post();
							$count ++; ?>
							<li class="slide-item"><a href="<?php the_permalink() ?>"
							                          title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile;
						wp_reset_postdata(); ?>
					</ul>
				</div>
			<?php endif; ?>

			<?php $post = $_post; ?>

		</div>
	</div>
<?php endif; ?>