<?php
/**
 * Class DIMA_Adsense_Widget.
 *
 * @package Dima_Framework
 * @subpackage widgets
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 * @copyright    (c) Copyright by PixelDima
 *
 */
/*  Creating the widget  */

class DIMA_Adsense_Widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array( 'description' => esc_html__( 'Displays Adsense Ads', 'okab' ) );
		$control_ops = array( 'width' => 250, 'height' => 400 );
		parent::__construct( false, $name = DIMA_THEME_NAME . ' - ' . esc_html__( 'Adsense', 'okab' ), $widget_ops, $control_ops );
	}

	/**
	 * Creating widget front-end / This is where the action happens
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );
		$title        = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_html__( 'Adsense', 'okab' ) : esc_html( $instance['title'] ) );
		$adsense_code = empty( $instance['adsense_code'] ) ? '' : ( $instance['adsense_code'] );

		echo $before_widget;

		if ( $title ) {
			echo $before_title . esc_attr( $title ) . $after_title;
		}
		?>

		<div class="clearfix">
			<?php echo $adsense_code; ?>
		</div>
		<?php
		echo $after_widget;
	}

	/**
	 * Updating widget replacing old instances with new
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	function update( $new_instance, $old_instance ) {
		$instance                 = $old_instance;
		$instance['title']        = sanitize_text_field( $new_instance['title'] );
		$instance['adsense_code'] = current_user_can( 'unfiltered_html' ) ? $new_instance['adsense_code'] : stripslashes( wp_filter_post_kses( addslashes( $new_instance['adsense_code'] ) ) );

		return $instance;
	}

	/**
	 * Creates the form for the widget
	 */
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
			'title'        => esc_html__( 'Adsense', 'okab' ),
			'adsense_code' => ''
		) );
		echo '<p><label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">' . esc_html__( 'Title', 'okab' ) . ':' . '</label><input class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" type="text" value="' . esc_attr( $instance['title'] ) . '" /></p>';
		echo '<p><label for="' . esc_attr( $this->get_field_id( 'adsense_code' ) ) . '">' . esc_html__( 'Adsense Code', 'okab' ) . ':' . '</label><textarea cols="20" rows="12" class="widefat" id="' . esc_attr( $this->get_field_id( 'adsense_code' ) ) . '" name="' . esc_attr( $this->get_field_name( 'adsense_code' ) ) . '">' . esc_textarea( $instance['adsense_code'] ) . '</textarea></p>';
	}

}

/**
 * Register and load the widget
 */
function DIMA_Adsense_Widget_Register() {
	register_widget( 'DIMA_Adsense_Widget' );
}

add_action( 'widgets_init', 'DIMA_Adsense_Widget_Register' );