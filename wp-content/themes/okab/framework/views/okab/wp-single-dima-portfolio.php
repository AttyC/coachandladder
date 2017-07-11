<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

$section_layout = dima_get_section_layout_meta();
if ( $section_layout != 'full-width' ) {
	?>

	<?php
	get_header(); ?>

	<div class="page-section-content boxed-blog blog-list">
		<div class="container">
			<?php
			if ( is_single() ):
				dima_post_navigation();
			endif;
			?>

			<div class="<?php dima_main_content_class(); ?>" role="main">

				<?php
				while ( have_posts() ):
					the_post();
					dima_helper::dima_get_view( 'okab', 'content', 'portfolio' );
				endwhile;
				?>

			</div>
			<?php get_sidebar(); ?>
		</div>

	</div>
	<?php
	dima_helper::dima_get_view( 'dima-global', 'related-portfolio' );
	get_footer();
	dima_set_post_views( get_the_ID() );
	?>
	<?php
} else {
	?>
	<?php
	get_header(); ?>

	<?php
	if ( is_single() ):
		dima_post_navigation();
	endif;
	?>

	<div class="<?php dima_main_content_class(); ?>" role="main">

		<?php
		while ( have_posts() ):
			the_post();
			dima_helper::dima_get_view( 'okab', 'content', 'portfolio' );
		endwhile;
		?>

	</div>
	<?php get_sidebar(); ?>
	</div>

	<?php
	dima_helper::dima_get_view( 'dima-global', 'related-portfolio' );
	get_footer();
	dima_set_post_views( get_the_ID() );
	?>

<?php } ?>