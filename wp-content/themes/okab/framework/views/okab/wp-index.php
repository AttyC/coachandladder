<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>
<?php get_header(); ?>
	<div class="container">
		<main class="page-section-content">
			<?php $demo = dima_helper::dima_get_demo() ?>
			<div class="<?php dima_main_content_class(); ?>" role="main">
				<?php dima_helper::dima_get_view( $demo, '_archive-header' ); ?>
				<?php dima_helper::dima_get_view( 'dima-global', 'index' ); ?>
			</div>
			<?php get_sidebar(); ?>
		</main>
	</div>
<?php get_footer(); ?>