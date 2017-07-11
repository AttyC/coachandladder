<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
$section_layout = dima_get_section_layout_meta();

if ( $section_layout == 'full-width' ) {
	get_header();
	?>
	<div class="<?php dima_main_content_class(); ?>" role="main">
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
			<div class="<?php dima_main_content_class(); ?>" role="main">
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
