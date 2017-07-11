<?php

/**
 * Class and Function List:
 * Function list:
 * - dima_shortcode_related_posts()
 * Classes list:
 */
class DIMA_RelatedPosts {

	public function __construct() {
		add_shortcode( 'related_posts', array( $this, 'dima_shortcode_related_posts' ) );
	}

	function dima_shortcode_related_posts( $atts ) {

		extract( shortcode_atts( array(
			'id'           => '',
			'is_slide'     => false,
			'class'        => '',
			'style'        => '',
			'column'       => 3,
			'items_margin' => 30,
			'count'        => 3,
		), $atts, 'related_posts' ) );

		$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class = ( $class != '' ) ? 'boxed-blog blog-list ' . esc_attr( $class ) : 'boxed-blog blog-list';
		$style = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$clm = dima_get_clm( $column );
		if ( $is_slide ) {
			wp_enqueue_script( 'dima-owl' );
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
		);
		ob_start();

		$this->show_posts( $ARG_ARRAY );

		return ob_get_clean();
	}

	public function show_posts( $ARG_ARRAY ) {
		$this->related_posts( $ARG_ARRAY );
	}

	public static function related_posts( $ARG_ARRAY ) {
		$related_posts = dima_helper::dima_get_post_related_posts( $ARG_ARRAY['count'] );
		$owl_class     = '';
		$data          = '';
		$ok_row        = 'ok-row ';

		if ( $related_posts ) {
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
			}
			$owl_class .= $ok_row;
			?>
            <div class="<?php echo "$owl_class"; ?>related-entry clearfix" <?php echo $data; ?>>
				<?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                    <div class='related-post <?php echo $ARG_ARRAY['clm']; ?>'>
                        <div class="related-entry-media">
                            <div class="related-entry-thumbnail">
								<?php
								echo dima_helper::dima_get_post_thumb( array(
									'size'                       => 'dima-side-magazine-image',
									'a_class'                    => array( 'overlay' ),
									'post_format_thumb_fallback' => true,
								) );
								?>
                            </div>
                        </div>
                        <div class="related-entry-title">
                            <h6 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                        </div>
                        <p class="date"><?php echo esc_html( get_the_date() ); ?></p>
                    </div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
            </div>
			<?php
		}
	}

}

new DIMA_RelatedPosts();
?>