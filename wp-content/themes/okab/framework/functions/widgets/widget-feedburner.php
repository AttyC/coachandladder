<?php
/**
 * Class DIMA_Feedburner_Widget_box.
 *
 * @package Dima Framework
 * @subpackage Widget
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

add_action( 'widgets_init', 'DIMA_Feedburner_Widget_box' );
function DIMA_Feedburner_Widget_box() {
	register_widget( 'DIMA_Feedburner_Widget' );
}

class DIMA_Feedburner_Widget extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'   => 'widget-feedburner',
			'description' => 'Subscribe to feedburner via email'
		);
		$control_ops = array( 'width' => 250, 'height' => 400 );
		parent::__construct( false, $name = DIMA_THEME_NAME . ' - ' . esc_html__( 'Feedburner', 'okab' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		global $dima_allowed_HTML_tags;

		extract( $args );
		$title = empty( $instance['title'] ) ? esc_html__( 'FeedBurner Widget', 'okab' ) : apply_filters( 'widget_title', $instance['title'] );
		if ( function_exists( 'icl_t' ) ) {
			$sub_title = icl_t( DIMA_THEME_NAME, 'widget_content_' . $this->id, $instance['sub_title'] );
		} else {
			$sub_title = empty( $instance['sub_title'] ) ? '' : $instance['sub_title'];
		}
		$feedburner = empty( $instance['feedburner'] ) ? '' : $instance['feedburner'];
		ob_start();

		echo $before_widget;
		if ( ! empty( $title ) ) {
			echo $before_title . wp_kses( $title, $dima_allowed_HTML_tags ) . $after_title;
		};
		$protocol = is_ssl() ? 'https' : 'http';
		echo '<div class="widget-feedburner-counter">
		<p>' . do_shortcode( $sub_title ) . '</p>'; ?>
		<form action="<?php echo $protocol ?>://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow"
		      onsubmit="window.open('<?php echo $protocol ?>://feedburner.google.com/fb/a/mailverify?uri=<?php echo esc_attr( $feedburner ); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
			<p id="form-row-wide">
				<input class="feedburner-email" type="text" name="email"
				       value="<?php echo esc_html__( 'Enter your e-mail address', 'okab' ); ?>"
				       onfocus="if (this.value == '<?php echo esc_html__( 'Enter your e-mail address', 'okab' ); ?>') {this.value = '';}"
				       onblur="if (this.value == '') {this.value = '<?php echo esc_html__( 'Enter your e-mail address', 'okab' ); ?>';}">
			</p>
			<p id="form-row-wide-hidden">
				<input type="hidden" value="<?php echo esc_attr( $feedburner ); ?>" name="uri">
			</p>
			<input type="hidden" name="loc" value="en_US">
			<input class="no-rounded button-block fill small dima-button feedburner-subscribe" type="submit"
			       name="submit" value="<?php echo esc_html__( 'Subscribe', 'okab' ); ?>">
		</form>
		</div>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance               = $old_instance;
		$instance['title']      = strip_tags( $new_instance['title'] );
		$instance['sub_title']  = $new_instance['sub_title'];
		$instance['feedburner'] = strip_tags( $new_instance['feedburner'] );

		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( DIMA_THEME_NAME, 'widget_content_' . $this->id, $new_instance['sub_title'] );
		}

		return $instance;
	}

	function form( $instance ) {
		$defaults = array(
			'title'     => esc_html__( 'FeedBurner Widget', 'okab' ),
			'sub_title' => esc_html__( 'Subscribe to our email newsletter.', 'okab' )
		);
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
				for="<?php echo esc_attr( $this->get_field_id( 'sub_title' ) ); ?>"><?php esc_html_e( 'Text above Email Input Field:', 'okab' ) ?>
				<small><?php esc_html_e( '( Supports : Html & Shortcodes )', 'okab' ) ?></small>
			</label>
			<textarea rows="5" id="<?php echo esc_attr( $this->get_field_id( 'sub_title' ) ); ?>"
			          name="<?php echo esc_attr( $this->get_field_name( 'sub_title' ) ); ?>"
			          class="widefat"><?php if ( ! empty( $instance['sub_title'] ) ) {
					echo esc_attr( $instance['sub_title'] );
				} ?></textarea>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'feedburner' ) ); ?>"><?php esc_html_e( 'Feedburner ID:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'feedburner' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'feedburner' ) ); ?>"
			       value="<?php if ( ! empty( $instance['feedburner'] ) ) {
				       echo esc_attr( $instance['feedburner'] );
			       } ?>" class="widefat"
			       type="text"/>
		</p>


		<?php
	}
}

?>