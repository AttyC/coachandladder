<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>

<?php if ( dima_get_content_layout() != 'no-sidebar' &&
           dima_get_content_layout() != 'mini'
):
	?>

	<aside class="<?php dima_sidebar_class(); ?>" role="complementary">
		<?php dima_helper::dima_get_sidebar(); ?>
	</aside>

<?php endif; ?>

