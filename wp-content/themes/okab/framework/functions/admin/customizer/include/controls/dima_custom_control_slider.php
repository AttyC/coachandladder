<?php

/**
 * Custom Control .
 *
 *
 * @package Dima Framework
 * @subpackage Admin customizer
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */
class dima_custom_control_slider extends WP_Customize_Control {
	public $type = 'slider';

	public function enqueue() {
		wp_enqueue_script( 'jquery-ui' );
		wp_enqueue_script( 'jquery-ui-slider' );
	}

	public function render_content() { ?>
		<label>

      <span class="customize-control-title">
        <?php echo esc_html( $this->label ); ?>
	      <?php if ( ! empty( $this->description ) ): ?>
		      <span
			      class="description customize-control-description"><?php echo esc_attr( $this->description ); ?></span>
		      <?php
	      endif; ?>
      </span>

			<input type="text" class="" id="input_<?php echo $this->id; ?>" disabled
			       value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?>/>

		</label>

		<div id="slider_<?php echo $this->id; ?>" class="dima-slider"></div>
		<script>
			jQuery(document).ready(function ($) {
				$('[id="slider_<?php echo $this->id; ?>"]').slider({
					value: <?php echo intval( esc_attr( $this->value() ) ); ?>,
					min: <?php echo intval( esc_attr( $this->choices['min'] ) ); ?>,
					max: <?php echo intval( esc_attr( $this->choices['max'] ) ); ?>,
					step: <?php echo esc_attr( $this->choices['step'] ); ?>,
					slide: function (event, ui) {
						$('[id="input_<?php echo $this->id; ?>"]').val(ui.value).keyup();
					}
				});
				$('[id="input_<?php echo $this->id; ?>"]').val($('[id="slider_<?php echo $this->id; ?>"]').slider("value"));
			});
		</script>
		<?php
	}
}

