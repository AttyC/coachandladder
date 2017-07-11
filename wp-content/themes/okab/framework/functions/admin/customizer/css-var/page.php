<?php
/**
 * Genirated CSS
 *
 * @package PHP-CSS
 * @subpackage general
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */
?>

<?php if ( is_singular( 'page' ) ) {
	$BG       = get_post_meta( get_the_ID(), '_dima_page_background_image', true );
	$repeated = get_post_meta( get_the_ID(), '_dima_page_background_image_repeated', true );
	if ( ! empty( $BG ) ) {
		?>
		body{
		background: url(<?php echo esc_url( $BG ); ?>) 0% 0% fixed;
		<?php
		if ( ! $repeated ) {
			?>
			background-size: cover !important;
			<?php
		}

	} ?>
	<?php
} ?>