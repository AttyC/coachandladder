<?php
/**
 * @package    Dima Framework
 * @subpackage views global
 * @version    1.0.0
 * @since      1.0.0
 * @author     PixelDima <info@pixeldima.com>
 */
if ( DIMA_REVOLUTION_SLIDER_IS_ACTIVE ) :
	$id = dima_helper::dima_get_the_ID();
	$slider_active = esc_attr( get_post_meta( $id, '_dima_slider_above', true ) );
	$slider = ( $slider_active == '' ) ? 'Off' : $slider_active;

	if ( $slider != 'Off' ) :
		?>
		<div class="tp-banner-container">

			<?php echo do_shortcode( dima_helper::dima_get_slider_shortcode( $slider ) ); ?>

		</div>
	<?php endif;

endif;