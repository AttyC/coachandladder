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
		<div class="page-section-content">
			<div class=" dima-container full not-found text-center" role="main">
				<?php dima_helper::dima_get_view( 'dima-global', 'content-404' ); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>