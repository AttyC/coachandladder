<?php

/**
 * Class DIMA_slider_Widget.
 *
 * @package Dima Framework
 * @subpackage Widget
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */
class DIMA_slider_Widget extends WP_Widget {

	function __construct() {
		$widget_ops  = array( 'classname' => 'news-slider-widget', 'description' => '' );
		$control_ops = array( 'width' => 250, 'height' => 400 );
		parent::__construct( false, $name = DIMA_THEME_NAME . ' - ' . esc_html__( 'Slider', 'okab' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		global $post;
		$no_of_posts    = $instance['no_of_posts'];
		$cats_id        = $instance['cats_id'];
		$boxed          = $instance['boxed'];
		$orig_post      = $post;
		$argss          = array( 'posts_per_page' => $no_of_posts, 'cat' => $cats_id, 'no_found_rows' => 1 );
		$featured_query = new WP_Query( $argss );

		$js_data = array(
			'animation'      => 'slide',
			'slideshowSpeed' => '7000',
			'slideSpeed'     => '600',
			'controlNav'     => false,
			'directionNav'   => true,
			'slideshow'      => false,
			'random'         => true,
		);
		if ( ! $boxed ) {
			echo $before_widget;
		}
		$data = dima_creat_data_attributes( 'slider', $js_data );
		?>
		<div
			class="flexslider sample-slide small-control boxed-blog dima-big-grid-wrapper boxed-blog clearfix hover-two" <?php echo "$data"; ?>
			id="<?php echo $args['widget_id']; ?>">
			<ul class="slides">
				<?php while ( $featured_query->have_posts() ) : $featured_query->the_post() ?>

					<li class="slide-item main-post">
						<?php
						$post_format = get_post_format();
						dima_helper::dima_get_admin_edit();

						if ( has_post_thumbnail() ) {
							echo dima_helper::dima_get_post_thumb( array(
								'size'                       => 'dima-side-magazine-image',
								'a_class'                    => '',
								'post_format_thumb_fallback' => false,
								'popup_type'                 => 'tooltip',
								'is_linked'                  => false,
							) );
							?>
							<div class="dima-meta-info-container">
								<div class="big-grid-meta">
									<h5 class="no-bottom-margin entry-title">
										<a href="<?php the_permalink(); ?>" rel="bookmark"
										   title="<?php the_title(); ?>"><?php the_title(); ?></a>
									</h5></div>
							</div>
							<?php
						} else {
							$thumb_src = dima_helper::dima_get_post_format_thumb( $post_format );
							?>
							<img src="<?php echo esc_url( $thumb_src ) ?>" alt="">
							<?php the_post_thumbnail( 'dima-side-magazine-image' ); ?>
							<div class="dima-meta-info-container">
								<div class="big-grid-meta">
									<h5 class="no-bottom-margin entry-title">
										<a href="<?php the_permalink(); ?>" rel="bookmark"
										   title="<?php the_title(); ?>"><?php the_title(); ?></a>
									</h5></div>
							</div>
							<?php
						} ?>

						<?php if ( function_exists( "has_post_thumbnail" ) && has_post_thumbnail() ) : ?>
						<?php endif; ?>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
		<?php
		wp_reset_query(); ?>
		<?php
		$post = $orig_post;
		wp_reset_query();
		if ( ! $boxed ) {
			echo $after_widget;
		}
	}


	function update( $new_instance, $old_instance ) {
		$instance                    = $old_instance;
		$instance['cat_posts_title'] = strip_tags( $new_instance['cat_posts_title'] );
		$instance['no_of_posts']     = strip_tags( $new_instance['no_of_posts'] );
		$instance['cats_id']         = implode( ',', $new_instance['cats_id'] );
		$instance['boxed']           = strip_tags( $new_instance['boxed'] );

		return $instance;
	}

	function form( $instance ) {
		$defaults       = array( 'no_of_posts' => '5', 'cats_id' => '1' );
		$instance       = wp_parse_args( (array) $instance, $defaults );
		$categories_obj = get_categories();
		$categories     = array();

		foreach ( $categories_obj as $pn_cat ) {
			$categories[ $pn_cat->cat_ID ] = $pn_cat->cat_name;
		}
		?>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'no_of_posts' ) ); ?>"><?php _e( 'Number of posts to show:', 'okab' ) ?> </label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'no_of_posts' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'no_of_posts' ) ); ?>"
			       value="<?php if ( ! empty( $instance['no_of_posts'] ) ) {
				       echo esc_attr( $instance['no_of_posts'] );
			       } ?>" type="text" size="3"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'boxed' ) ); ?>"><?php esc_html_e( 'No Box', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'boxed' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'boxed' ) ); ?>"
			       value="true" <?php if ( ! empty( $instance['boxed'] ) ) {
				echo 'checked="checked"';
			} ?> type="checkbox"/>
		</p>
		<p>
			<?php $cats_id = explode( ',', $instance['cats_id'] ); ?>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'cats_id' ) ); ?>"><?php _e( 'Category:', 'okab' ) ?></label>
			<select multiple="multiple" id="<?php echo esc_attr( $this->get_field_id( 'cats_id' ) ); ?>[]"
			        name="<?php echo esc_attr( $this->get_field_name( 'cats_id' ) ); ?>[]">
				<?php foreach ( $categories as $key => $option ) { ?>
					<option value="<?php echo esc_attr( $key ) ?>" <?php if ( in_array( $key, $cats_id ) ) {
						echo ' selected="selected"';
					} ?>><?php echo esc_attr( $option ); ?></option>
				<?php } ?>
			</select>
		</p>
		<?php
	}
}

add_action( 'widgets_init', 'DIMA_Slider_Widget_widget' );
function DIMA_Slider_Widget_widget() {
	register_widget( 'DIMA_slider_Widget' );
}