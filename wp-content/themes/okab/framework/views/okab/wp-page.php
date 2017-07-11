<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

$layout         = dima_get_content_layout();
$section_layout = dima_get_section_layout_meta();

if ( $section_layout == 'full-width' ) {
	get_header();
	dima_helper::dima_display_shortcode_above_sidebar();
	?>
	<div class="<?php dima_main_content_class(); ?>" role="main">
		<?php
		$header_positioning = dima_get_header_positioning();
		if ( $header_positioning == "fixed-left" || $header_positioning == "fixed-right" ) {
			dima_helper::dima_get_view( 'dima-global', 'slider-above' );
		}
		?>

		<?php while ( have_posts() ):the_post(); ?>
			<?php dima_helper::dima_get_view( 'okab', 'content', 'page' ); ?>
			<?php dima_helper::dima_get_view( 'dima-global', 'comments-template' ); ?>
		<?php endwhile; ?>
	</div>
	<?php get_sidebar(); ?>
	<?php
	get_footer();
} else {
	get_header();
	?>
	<div class="container">
		<div class="page-section-content">
			<?php dima_helper::dima_display_shortcode_above_sidebar(); ?>
			<div class="<?php dima_main_content_class(); ?>" role="main">
				<?php
				$header_positioning = dima_get_header_positioning();
				if ( $header_positioning == "fixed-left" || $header_positioning == "fixed-right" ) {
					dima_helper::dima_get_view( 'dima-global', 'slider-above' );
				}
				?>
				<?php while ( have_posts() ):the_post(); ?>
					<?php dima_helper::dima_get_view( 'okab', 'content', 'page' ); ?>
					<?php dima_helper::dima_get_view( 'dima-global', 'comments-template' ); ?>
				<?php endwhile; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
	<?php
	get_footer();
}
?>
