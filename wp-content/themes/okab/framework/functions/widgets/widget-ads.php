<?php

/**
 * Class DIMA_Ads_125_Widget.
 * Class DIMA_Ads_300_Widget.
 *
 * @package Dima_Framework
 * @subpackage widgets
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 * @copyright    (c) Copyright by PixelDima
 *
 */
class DIMA_Ads_125_Widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array(
			'description' => esc_html__( 'Displays Advertisements', 'okab' ),
			'classname'   => 'dima-dsa'
		);
		$control_ops = array( 'width' => 250, 'height' => 400 );
		parent::__construct( false, $name = DIMA_THEME_NAME . ' - ' . esc_html__( 'Advertisements (125 x 125)', 'okab' ), $widget_ops, $control_ops );
	}

	/**
	 * Creating widget front-end / This is where the action happens
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );
		$title    = empty( $instance['title'] ) ? esc_html__( 'Advertisement', 'okab' ) : apply_filters( 'widget_title', $instance['title'] );
		$boxed    = esc_attr( $instance['boxed'] );
		$nofollow = esc_attr( $instance['nofollow'] );
		$target   = ' target="_blank" ';

		if ( $nofollow ) {
			$nofollow = 'rel="nofollow"';
		} else {
			$nofollow = '';
		}

		if ( ! $boxed ) {
			echo $before_widget;
		}

		if ( $title ) {
			echo $before_title . esc_attr( $title ) . $after_title;
		}

		?>

		<div <?php if ( $boxed ) {
			echo 'id="' . esc_attr( $args['widget_id'] ) . '"';
		} ?>
			class="clearfix dima-dsa-widget-content dima-dsa125-widget">
			<?php for ( $i = 0; $i < 10; $i ++ ) { ?>
				<?php if ( ! empty( $instance[ 'ads' . $i . '_code' ] ) ) { ?>
					<div class="dima-dsa-cell">
						<?php echo do_shortcode( $instance[ 'ads' . $i . '_code' ] ); ?>
					</div>
				<?php } elseif ( ! empty( $instance[ 'ads' . $i . '_img' ] ) ) { ?>
					<div class="dima-dsa-cell">
						<?php if ( $instance[ 'ads' . $i . '_url' ] ){ ?><a
							href="<?php echo esc_url( dima_helper::dima_protocol_relative( $instance[ 'ads' . $i . '_url' ] ) ) ?>" <?php echo esc_attr( $target ) ?> <?php echo esc_attr( $nofollow ) ?>><?php } ?>
							<img src="<?php echo esc_url( $instance[ 'ads' . $i . '_img' ] ) ?>" alt=""/>
							<?php if ( $instance[ 'ads' . $i . '_url' ] ){ ?></a><?php } ?>
					</div>
					<?php
				}
			} ?>
		</div>
		<?php
		if ( ! $boxed ) {
			echo $after_widget;
		}
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
		$instance             = $old_instance;
		$instance['title']    = strip_tags( $new_instance['title'] );
		$instance['boxed']    = strip_tags( $new_instance['boxed'] );
		$instance['nofollow'] = strip_tags( $new_instance['nofollow'] );

		for ( $i = 0; $i < 10; $i ++ ) {
			$instance[ 'ads' . $i . '_img' ]  = strip_tags( $new_instance[ 'ads' . $i . '_img' ] );
			$instance[ 'ads' . $i . '_url' ]  = strip_tags( $new_instance[ 'ads' . $i . '_url' ] );
			$instance[ 'ads' . $i . '_code' ] = $new_instance[ 'ads' . $i . '_code' ];
		}

		return $instance;
	}

	/**
	 * Creates the form for the widget
	 */
	function form( $instance ) {
		$defaults = array( 'title' => esc_html__( ' Advertisement', 'okab' ) );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			       value="<?php if ( ! empty( $instance['title'] ) ) {
				       echo esc_attr( $instance['title'] );
			       } ?>" class="widefat"
			       type="text"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'boxed' ) ); ?>"><?php _e( 'No box:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'boxed' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'boxed' ) ); ?>"
			       value="true" <?php if ( ! empty( $instance['boxed'] ) ) {
				echo 'checked="checked"';
			} ?> type="checkbox"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'nofollow' ) ); ?>"><?php _e( 'Nofollow:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'nofollow' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'nofollow' ) ); ?>"
			       value="true" <?php if ( ! empty( $instance['nofollow'] ) ) {
				echo 'checked="checked"';
			} ?> type="checkbox"/>
		</p>
		<?php
		for ( $i = 0; $i < 10; $i ++ ) { ?>
			<strong><?php _e( 'ADS', 'okab' ) ?> <?php echo $i; ?> :</strong>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'ads' . $i . '_img' ) ); ?>"><?php _e( 'Ad image URL:', 'okab' ) ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'ads' . $i . '_img' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'ads' . $i . '_img' ) ); ?>"
				       value="<?php if ( ! empty( $instance[ 'ads' . $i . '_img' ] ) ) {
					       echo esc_attr( $instance[ 'ads' . $i . '_img' ] );
				       } ?>"
				       class="widefat" type="text"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'ads' . $i . '_url' ) ); ?>"><?php _e( 'Ad Link URL:', 'okab' ) ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'ads' . $i . '_url' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'ads' . $i . '_url' ) ); ?>"
				       value="<?php if ( ! empty( $instance[ 'ads' . $i . '_url' ] ) ) {
					       echo esc_attr( $instance[ 'ads' . $i . '_url' ] );
				       } ?>"
				       class="widefat" type="text"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'ads' . $i . '_code' ) ); ?>"><?php _e( 'Ad Adsense code:', 'okab' ) ?></label>
				<textarea id="<?php echo esc_attr( $this->get_field_id( 'ads' . $i . '_code' ) ); ?>"
				          name="<?php echo esc_attr( $this->get_field_name( 'ads' . $i . '_code' ) ); ?>"
				          class="widefat"><?php if ( ! empty( $instance[ 'ads' . $i . '_code' ] ) ) {
						echo esc_attr( $instance[ 'ads' . $i . '_code' ] );
					} ?></textarea>
			</p>
		<?php } ?>
		<?php
	}
}

/**
 * Register and load the widget
 */
function DIMA_Ads_125_Widget_Register() {
	register_widget( 'DIMA_Ads_125_Widget' );
}

add_action( 'widgets_init', 'DIMA_Ads_125_Widget_Register' );


//**********//

class DIMA_Ads_300_Widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array(
			'description' => esc_html__( 'Displays Advertisements', 'okab' ),
			'classname'   => 'dima-dsa'
		);
		$control_ops = array( 'width' => 250, 'height' => 400 );
		parent::__construct( false, $name = DIMA_THEME_NAME . ' - ' . esc_html__( 'Advertisements (300 x 250)', 'okab' ), $widget_ops, $control_ops );
	}

	/**
	 * Creating widget front-end / This is where the action happens
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );
		$title    = apply_filters( 'widget_title', $instance['title'] );
		$boxed    = esc_attr( $instance['boxed'] );
		$nofollow = esc_attr( $instance['nofollow'] );
		$target   = ' target="_blank" ';

		if ( $nofollow ) {
			$nofollow = 'rel="nofollow"';
		} else {
			$nofollow = '';
		}

		if ( ! $boxed ) {
			echo $before_widget;
			if ( $title ) {
				echo $before_title . esc_attr( $title ) . $after_title;
			}
		} ?>
		<div <?php if ( $boxed ) {
			echo 'id="' . esc_attr( $args['widget_id'] ) . '"';
		} ?>
			class="clearfix dima-dsa-widget-content dima-dsa300-widget">
			<?php for ( $i = 0; $i < 5; $i ++ ) { ?>
				<?php if ( ! empty( $instance[ 'ads' . $i . '_code' ] ) ) { ?>
					<div class="dima-dsa-cell">
						<?php echo do_shortcode( $instance[ 'ads' . $i . '_code' ] ); ?>

					</div>
				<?php } elseif ( ! empty( $instance[ 'ads' . $i . '_img' ] ) ) { ?>
					<div class="dima-dsa-cell">
						<?php if ( $instance[ 'ads' . $i . '_url' ] ){ ?><a
							href="<?php echo esc_url( dima_helper::dima_protocol_relative( $instance[ 'ads' . $i . '_url' ] ) ) ?>" <?php echo esc_attr( $target ) ?> <?php echo esc_attr( $nofollow ) ?>><?php } ?>
							<img src="<?php echo esc_url( $instance[ 'ads' . $i . '_img' ] ) ?>" alt=""/>
							<?php if ( $instance[ 'ads' . $i . '_url' ] ){ ?></a><?php } ?>
					</div>
					<?php
				}
			} ?>
		</div>
		<?php
		if ( ! $boxed ) {
			echo $after_widget;
		}
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
		$instance             = $old_instance;
		$instance['title']    = strip_tags( $new_instance['title'] );
		$instance['boxed']    = strip_tags( $new_instance['boxed'] );
		$instance['nofollow'] = strip_tags( $new_instance['nofollow'] );

		for ( $i = 0; $i < 5; $i ++ ) {
			$instance[ 'ads' . $i . '_img' ]  = strip_tags( $new_instance[ 'ads' . $i . '_img' ] );
			$instance[ 'ads' . $i . '_url' ]  = strip_tags( $new_instance[ 'ads' . $i . '_url' ] );
			$instance[ 'ads' . $i . '_code' ] = $new_instance[ 'ads' . $i . '_code' ];
		}

		return $instance;
	}

	/**
	 * Creates the form for the widget
	 */
	function form( $instance ) {
		$defaults = array( 'title' => esc_html__( ' Advertisement', 'okab' ) );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			       value="<?php if ( ! empty( $instance['title'] ) ) {
				       echo esc_attr( $instance['title'] );
			       } ?>" class="widefat"
			       type="text"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'boxed' ) ); ?>"><?php _e( 'Hide box and title:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'boxed' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'boxed' ) ); ?>"
			       value="true" <?php if ( ! empty( $instance['boxed'] ) ) {
				echo 'checked="checked"';
			} ?> type="checkbox"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'nofollow' ) ); ?>"><?php _e( 'Nofollow:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'nofollow' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'nofollow' ) ); ?>"
			       value="true" <?php if ( ! empty( $instance['nofollow'] ) ) {
				echo 'checked="checked"';
			} ?> type="checkbox"/>
		</p>
		<?php
		for ( $i = 0; $i < 5; $i ++ ) { ?>
			<strong><?php _e( 'ADS', 'okab' ) ?> <?php echo $i; ?> :</strong>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'ads' . $i . '_img' ) ); ?>"><?php _e( 'Ad image URL:', 'okab' ) ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'ads' . $i . '_img' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'ads' . $i . '_img' ) ); ?>"
				       value="<?php if ( ! empty( $instance[ 'ads' . $i . '_img' ] ) ) {
					       echo esc_attr( $instance[ 'ads' . $i . '_img' ] );
				       } ?>"
				       class="widefat" type="text"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'ads' . $i . '_url' ) ); ?>"><?php _e( 'Ad Link URL:', 'okab' ) ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'ads' . $i . '_url' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'ads' . $i . '_url' ) ); ?>"
				       value="<?php if ( ! empty( $instance[ 'ads' . $i . '_url' ] ) ) {
					       echo esc_attr( $instance[ 'ads' . $i . '_url' ] );
				       } ?>"
				       class="widefat" type="text"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'ads' . $i . '_code' ) ); ?>"><?php _e( 'Ad Adsense code:', 'okab' ) ?></label>
				<textarea id="<?php echo esc_attr( $this->get_field_id( 'ads' . $i . '_code' ) ); ?>"
				          name="<?php echo esc_attr( $this->get_field_name( 'ads' . $i . '_code' ) ); ?>"
				          class="widefat"><?php if ( ! empty( $instance[ 'ads' . $i . '_code' ] ) ) {
						echo esc_attr( $instance[ 'ads' . $i . '_code' ] );
					} ?></textarea>
			</p>
		<?php } ?>
		<?php
	}
}

/**
 * Register and load the widget
 */
function DIMA_Ads_300_Widget_Register() {
	register_widget( 'DIMA_Ads_300_Widget' );
}

add_action( 'widgets_init', 'DIMA_Ads_300_Widget_Register' );
?>