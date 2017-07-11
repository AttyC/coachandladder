<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>


<?php
dima_helper::dima_get_view( 'dima-global', 'header' );
?>

<?php dima_helper::dima_get_view( 'dima-global', 'slider-above' ); ?>
<?php dima_helper::dima_get_view( 'dima-global', 'slider-below' ); ?>

<div class="dima-container full" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php dima_helper::dima_get_view( 'dima-global', 'content', 'the-content' ); ?>

	<?php endwhile; ?>

</div>

<?php
dima_helper::dima_get_view( 'dima-global', 'footer', 'scroll-top' );

wp_footer();
?>

