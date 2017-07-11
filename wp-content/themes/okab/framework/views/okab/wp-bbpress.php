<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

get_header();
?>
<div class="container">
	<div class="page-section-content">
		<div class="<?php dima_main_content_class(); ?>" role="main">
			<?php while ( have_posts() ):the_post(); ?>
				<?php dima_helper::dima_get_view( 'dima-global', 'content', 'bbpress' ); ?>
			<?php endwhile; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
?>
