<?php
/**
 * @package Dima Framework
 * @subpackage views global
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>

<?php

$dima_menu_display = esc_attr( dima_helper::dima_get_option( 'dima_footer_menu_display' ) );
$dima_copyright    = dima_helper::dima_get_option( 'dima_footer_content_text' );
$dima_class        = "float-start";
$allowed_tags      = array(
	'strong' => array(),
	'br'     => array(),
	'em'     => array(),
	'p'      => array( 'a' => true ),
	'a'      => array(
		'href'   => true,
		'target' => true,
		'title'  => true,
	)
);

if ( $dima_menu_display != '1' ) {
	$dima_class = "text-center";
}
?>
<footer class="<?php dima_footer_class(); ?>" itemscope="itemscope" itemtype="https://schema.org/WPFooter">
	<div class="container">

		<?php if ( dima_helper::dima_get_option( 'dima_footer_content_display' ) == '1' ) : ?>
			<div class="copyright <?php echo esc_attr( $dima_class ) ?>">
				<?php echo
				wp_kses( $dima_copyright, $allowed_tags );
				?>
			</div>
		<?php endif; ?>

		<?php if ( $dima_menu_display == '1' ) : ?>
			<?php dima_helper::dima_get_view( 'dima-global', 'nav', 'footer' ); ?>
		<?php endif; ?>

	</div>
</footer>



