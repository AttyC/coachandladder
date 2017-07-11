<?php

/**
 * Class DIMA_Facebook_Widget.
 *
 * @package Dima Framework
 * @subpackage Widget
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */
class DIMA_Facebook_Widget extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'description' => esc_html__( 'Displays Facebook', 'okab' ),
			'classname'   => 'facebook-widget'
		);
		$control_ops = array( 'width' => 250, 'height' => 400 );
		parent::__construct( false, $name = DIMA_THEME_NAME . ' - ' . esc_html__( 'Facebook', 'okab' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_html__( 'Find us on Facebook', 'okab' ) : $instance['title'] );
		$url   = empty( $instance['page_url'] ) ? '' : $instance['page_url'];
		$faces = 'false';
		if ( ! empty( $instance['faces'] ) ) {
			$faces = 'true';
		}
		$smallHeader = empty( $instance['smallheader'] ) ? '' : $instance['smallheader'];
		$cover       = empty( $instance['cover'] ) ? '' : $instance['cover'];
		$boxed       = empty( $instance['boxed'] ) ? '' : $instance['boxed'];
		$height      = "220px";
		$tabs        = empty( $instance['tabs'] ) ? '' : $instance['tabs'];
		if ( ! empty( $instance['height'] ) ) {
			$height = $instance['height'];
		}
		$bottom_margin = '';

		if ( ! $boxed ) {
			echo $before_widget;
		} else {
			$bottom_margin = "add-bottom-margin";
		}

		if ( $title ) {
			echo $before_title;
			echo esc_html( $title );
			echo $after_title;
		} ?>
		<div class="facebook-box clearfix <?php echo esc_attr( $bottom_margin ); ?>">
			<script>(function (d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s);
					js.id = id;
					js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
			</script>
			<?php
			echo '<div class="dima_facebook_widget fb-page" data-height="' . esc_attr( $height ) . '" data-href="' . esc_url( $url ) . '" data-small-header="' . esc_attr( $smallHeader ) . '" data-adapt-container-width="true" data-hide-cover="' . esc_attr( $cover ) . '" data-show-facepile="' . esc_attr( $faces ) . '" data-tabs="' . esc_attr( $tabs ) . '"></div>
            <div id="fb-root"></div>';
			?>
		</div>

		<?php
		if ( ! $boxed ) {
			echo $after_widget;
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance                = $old_instance;
		$instance['title']       = strip_tags( $new_instance['title'] );
		$instance['page_url']    = strip_tags( $new_instance['page_url'] );
		$instance['cover']       = strip_tags( $new_instance['cover'] );
		$instance['smallheader'] = strip_tags( $new_instance['smallheader'] );
		$instance['boxed']       = strip_tags( $new_instance['boxed'] );
		$instance['faces']       = strip_tags( $new_instance['faces'] );
		$instance['tabs']        = strip_tags( $new_instance['tabs'] );
		$instance['height']      = strip_tags( $new_instance['height'] );

		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => esc_html__( 'Find us on Facebook', 'okab' ) );
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
				for="<?php echo esc_attr( $this->get_field_id( 'page_url' ) ); ?>"><?php esc_html_e( 'Page URL :', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'page_url' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'page_url' ) ); ?>"
			       value="<?php if ( ! empty( $instance['page_url'] ) ) {
				       echo esc_url( $instance['page_url'] );
			       } ?>" class="widefat"
			       type="text"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>"><?php esc_html_e( 'Height :', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'height' ) ); ?>"
			       value="<?php if ( ! empty( $instance['height'] ) ) {
				       echo esc_attr( $instance['height'] );
			       } ?>" class="widefat"
			       type="text"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'tabs' ) ); ?>"><?php esc_html_e( 'Tabs :', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'tabs' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'tabs' ) ); ?>"
			       value="<?php if ( ! empty( $instance['tabs'] ) ) {
				       echo esc_attr( $instance['tabs'] );
			       } ?>" class="widefat"
			       type="text"/>
			<small>e.g., timeline, messages, events</small>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'cover' ) ); ?>"><?php esc_html_e( 'Hide Cover Photo', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'cover' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'cover' ) ); ?>"
			       value="true" <?php if ( ! empty( $instance['cover'] ) ) {
				echo 'checked="checked"';
			} ?> type="checkbox"/>
			<br>
			<small><?php esc_html_e( 'Hide the cover photo in the header', 'okab' ) ?></small>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'smallheader' ) ); ?>"><?php esc_html_e( 'Use Small Header', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'smallheader' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'smallheader' ) ); ?>"
			       value="true" <?php if ( ! empty( $instance['smallheader'] ) ) {
				echo 'checked="checked"';
			} ?>
			       type="checkbox"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'faces' ) ); ?>"><?php esc_html_e( 'Show Friend\'s Faces', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'faces' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'faces' ) ); ?>"
			       value="true" <?php if ( ! empty( $instance['faces'] ) ) {
				echo 'checked="checked"';
			} ?> type="checkbox"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'boxed' ) ); ?>"><?php esc_html_e( 'No Box ?', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'boxed' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'boxed' ) ); ?>"
			       value="true" <?php if ( ! empty( $instance['boxed'] ) ) {
				echo 'checked="checked"';
			} ?> type="checkbox"/>
		</p>

		<?php
	}
}

add_action( 'widgets_init', 'DIMA_Facebook_Widget' );
function DIMA_Facebook_Widget() {
	register_widget( 'DIMA_Facebook_Widget' );
}

?>