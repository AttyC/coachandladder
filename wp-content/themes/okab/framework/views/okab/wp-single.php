<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>

<?php get_header();

?>
	<div class="page-section-content boxed-blog blog-list">
		<div class="container">
			<?php
			if ( is_single() ):
				dima_post_navigation();
			endif; ?>
			<div class="<?php dima_main_content_class(); ?>" role="main">

				<?php
				while ( have_posts() ):
					the_post(); ?>
					<?php
					dima_helper::dima_get_view( 'okab', 'content', get_post_format() );
					dima_helper::dima_get_view( 'dima-global', 'about-the-author' );
					dima_helper::dima_get_view( 'dima-global', 'related-post' );
					dima_helper::dima_get_view( 'dima-global', 'comments-template' ); ?>
					<?php
				endwhile; ?>

			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php
get_footer();

dima_set_post_views( get_the_ID() );

?>