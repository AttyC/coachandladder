<?php

/**
 * Class DIMA_Text_Html_Widget.
 *
 * @package Dima Framework
 * @subpackage Widget
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */
class DIMA_Text_Html_Widget extends WP_Widget {

	function __construct() {
		$widget_ops  = array( 'classname' => 'text-html' );
		$control_ops = array( 'width' => 250, 'height' => 400 );
		parent::__construct( false, $name = DIMA_THEME_NAME . ' - ' . esc_html__( 'Text or HTML', 'okab' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {

		global $dima_allowed_HTML_tags;
		extract( $args );
		$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );

		if ( function_exists( 'icl_t' ) ) {
			$text_code = icl_t( DIMA_THEME_NAME, 'widget_content_' . $this->id, $instance['text_code'] );
		} else {
			$text_code = empty( $instance['text_code'] ) ?: wp_kses( $instance['text_code'], $dima_allowed_HTML_tags );
		}

		$boxed = $instance['boxed'];
		ob_start();

		if ( ! $boxed ) {
			echo $before_widget;
		}

		if ( $title ) {
			echo $before_title;
			echo esc_attr( $title );
			echo $after_title;
		}

		?>
		<div class="dima-text-code clearfix"><?php
			echo do_shortcode( $text_code );
			?>
		</div>
		<?php
		if ( ! $boxed ) {
			echo $after_widget;
		}

	}

	function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = strip_tags( $new_instance['title'] );
		$instance['text_code'] = $new_instance['text_code'];
		$instance['boxed']     = strip_tags( $new_instance['boxed'] );

		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( DIMA_THEME_NAME, 'widget_content_' . $this->id, $new_instance['text_code'] );
		}

		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => esc_html__( 'Text', 'okab' ) );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

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
				for="<?php echo esc_attr( $this->get_field_id( 'boxed' ) ); ?>"><?php esc_html_e( 'No Box', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'boxed' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'boxed' ) ); ?>"
			       value="true" <?php if ( ! empty( $instance['boxed'] ) ) {
				echo 'checked="checked"';
			} ?> type="checkbox"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'text_code' ) ); ?>"><?php esc_html_e( 'Text , Shortcodes or HTML code:', 'okab' ) ?></label>
			<textarea rows="15" id="<?php echo esc_attr( $this->get_field_id( 'text_code' ) ); ?>"
			          name="<?php echo esc_attr( $this->get_field_name( 'text_code' ) ); ?>"
			          class="widefat"><?php if ( ! empty( $instance['text_code'] ) ) {
					echo esc_attr( $instance['text_code'] );
				} ?></textarea>
		</p>


		<?php
	}
}

add_action( 'widgets_init', 'DIMA_Text_Html_Widget_widget' );
function DIMA_Text_Html_Widget_widget() {
	register_widget( 'DIMA_Text_Html_Widget' );
}

?>