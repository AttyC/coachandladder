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
class dima_custom_control_color_alpha extends WP_Customize_Color_Control {
	public $type = 'color-alpha';
	public $palette = true;

	protected function render() {
		$id    = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );
		$class = 'customize-control customize-control-' . esc_attr( $this->type ); ?>
		<li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<?php $this->render_content(); ?>
		</li>
		<?php
	}

	public function render_content() { ?>
		<label>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>
			<?php if ( ! empty( $this->description ) ): ?>
				<span
					class="description customize-control-description"><?php echo esc_attr( $this->description ); ?></span>
			<?php endif; ?>

			<input class="dima-color-control" data-alpha="true" type="text"
			       data-palette="<?php echo esc_attr( $this->palette ); ?>"
			       data-default-color="<?php echo esc_attr( $this->setting->default ); ?>"
			       value="<?php echo intval( $this->value() ); ?>" <?php $this->link(); ?> />
		</label>
		<?php
	}
}

class dima_custom_control_multiple_select extends WP_Customize_Color_Control {
	public $type = 'multiple-select';
	public $palette = true;

	/**
	 * Displays the multiple select on the customize screen.
	 */
	public function render_content() {

		if ( empty( $this->choices ) ) {
			return;
		}
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
				<?php
				foreach ( $this->choices as $value => $label ) {
					$selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
					echo '<option value="' . esc_attr( $value ) . '"' . esc_attr( $selected ) . '>' . esc_attr( $label ) . '</option>';
				}
				?>
			</select>
		</label>
	<?php }
}