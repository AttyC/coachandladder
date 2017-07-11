<?php
/**
 * @package Dima Framework
 * @subpackage views global
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>
<article <?php post_class(); ?> >
	<?php dima_helper::dima_get_view( 'dima-global', 'content', 'the-content' ); ?>
</article>