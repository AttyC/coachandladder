<?php

/**
 * Class DIMA_Social_Widget.
 *
 * @package Dima Framework
 * @subpackage Widget
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */
class DIMA_Social_Widget extends WP_Widget {

	function __construct() {
		$widget_ops  = array( 'classname' => 'social-icons-widget' );
		$control_ops = array( 'width' => 250, 'height' => 400 );
		parent::__construct( false, $name = DIMA_THEME_NAME . ' - ' . esc_html__( 'Social Icons', 'okab' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
		$boxed = empty( $instance['boxed'] ) ? '' : $instance['boxed'];
		if ( empty( $instance['circle'] ) ) {
			$circle = '';
		} else {
			$circle = 'circle-social';
		}
		$bottom_margin = '';
		$size          = empty( $instance['size'] ) ? 'medium' : $instance['size'];

		if ( ! $boxed ) {
			echo $before_widget;
		} else {
			$bottom_margin = "add-bottom-margin";
		}

		if ( ! empty( $title ) ) {
			echo $before_title . esc_attr( $title ) . $after_title;
		};
		?>
		<div class="social-media social-<?php echo esc_attr( $size ); ?> <?php echo esc_attr( $circle );
		echo ' ';
		echo esc_attr( $bottom_margin ); ?>">
			<ul class="inline clearfix">
				<?php
				dima_get_global_social();
				?>
			</ul>
		</div>
		<?php
		if ( ! $boxed ) {
			echo $after_widget;
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance           = $old_instance;
		$instance['title']  = strip_tags( $new_instance['title'] );
		$instance['boxed']  = strip_tags( $new_instance['boxed'] );
		$instance['circle'] = strip_tags( $new_instance['circle'] );
		$instance['size']   = strip_tags( $new_instance['size'] );

		return $instance;
	}

	function form( $instance ) {
		$defaults = array(
			'title' => esc_html__( 'Social', 'okab' ),
			'size'  => 'medium'
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$size     = esc_attr( $instance['size'] );
		?>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			       value="<?php if ( ! empty( $instance['title'] ) ) {
				       echo esc_attr( $instance['title'] );
			       } ?>" class="widefat"
			       type="text"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'circle' ) ); ?>"><?php esc_html_e( 'Circle Icon:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'circle' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'circle' ) ); ?>"
			       value="true" <?php if ( ! empty( $instance['circle'] ) ) {
				echo 'checked="checked"';
			} ?> type="checkbox"/>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Icon size', 'okab' ); ?>
				:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" class="widefat">
				<option value="small" <?php selected( 'small', $size ) ?>><?php esc_html_e( 'Small', 'okab' ); ?></option>
				<option value="medium" <?php selected( 'medium', $size ) ?>><?php esc_html_e( 'Medium', 'okab' ); ?></option>
				<option value="big" <?php selected( 'big', $size ) ?>><?php esc_html_e( 'Big', 'okab' ); ?></option>
			</select>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'boxed' ) ); ?>"><?php esc_html_e( 'No box:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'boxed' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'boxed' ) ); ?>"
			       value="true" <?php if ( ! empty( $instance['boxed'] ) ) {
				echo 'checked="checked"';
			} ?> type="checkbox"/>
		</p>
		<?php
	}
}

add_action( 'widgets_init', 'DIMA_Social_Widget_box' );
function DIMA_Social_Widget_box() {
	register_widget( 'DIMA_Social_Widget' );
}

?>