<?php

/**
 * Custom Control .
 *
 * @package Dima Framework
 * @subpackage Admin customizer
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */
class dima_custom_control_font_style extends WP_Customize_Control {
	public $type = 'font_style';

	public function render_content() {
		?>
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif;
			if ( ! empty( $this->description ) ) : ?>
				<span
					class="description customize-control-description"><?php echo esc_attr( $this->description ); ?></span>
			<?php endif; ?>
		</label>
		<?php $current_values = explode( '|', $this->value() );
		if ( empty( $this->choices ) ) {
			return;
		}
		foreach ( $this->choices as $value => $label ) :
			$checked_class = in_array( $value, $current_values ) ? ' dima_font_style_checkbox' : '';
			?>
			<span class="dima_customize_font_style dima_customize_font_value_<?php echo esc_attr( $value );
			echo esc_attr( $checked_class ); ?>">
						<input type="checkbox" class="dima_font_style_checkbox"
						       value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $current_values ) ); ?> />
					</span>
			<?php
		endforeach;
		?>
		<input type="hidden" class="dima_customize_font_style_list" <?php $this->input_attrs(); ?>
		       value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
		<?php

	}
}