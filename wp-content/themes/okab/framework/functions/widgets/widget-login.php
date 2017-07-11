<?php

/**
 * Class DIMA_Login_Widget.
 *
 * @package Dima Framework
 * @subpackage Widget
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */
class DIMA_Login_Widget extends WP_Widget {

	function __construct() {
		$widget_ops  = array( 'classname' => 'login-widget' );
		$control_ops = array( 'width' => 250, 'height' => 400 );
		parent::__construct( false, $name = DIMA_THEME_NAME . ' - ' . esc_html__( 'Login', 'okab' ), $widget_ops, $control_ops );
	}


	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;
		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		};
		dima_login_form();
		echo $after_widget;

	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => esc_html__( 'Login', 'okab' ) );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			       value="<?php if ( ! empty( $instance['title'] ) ) {
				       echo esc_attr( $instance['title'] );
			       } ?>" class="widefat" type="text"/>
		</p>
		<?php
	}
}


add_action( 'widgets_init', 'DIMA_Login_Widget_box' );
function DIMA_Login_Widget_box() {
	register_widget( 'DIMA_Login_Widget' );
}

?>