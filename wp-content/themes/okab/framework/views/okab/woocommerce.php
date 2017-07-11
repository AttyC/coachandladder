<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
$layout = dima_get_content_layout();

if ( $layout == 'full-width' ) {
	get_header();
	?>
	<div class="<?php dima_main_content_class(); ?>" role="main">
		<?php woocommerce_content(); ?>
	</div>
	<?php get_sidebar(); ?>
	<?php
	get_footer();
} else {
	get_header();
	?>
	<div class="container">
		<div class="page-section-content">
			<div class="<?php dima_main_content_class(); ?>" role="main">
				<?php woocommerce_content(); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
	<?php
	get_footer();
}
?>
