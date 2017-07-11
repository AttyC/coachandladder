<?php
/**
 * @package views
 * @category    global
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>
<article <?php post_class(); ?> >

	<div class="<?php dima_pots_content_class(); ?>">
		<header class="entry-header text-center">
			<h1 class="entry-title"><i class="fa fa-frown-o"></i></h1>
		</header>
		<div class="entry-content text-center">
			<h5><?php esc_html_e( 'Oops!, This Page Could Not Be Found', 'okab' ) ?></h5>
			<p><?php esc_html_e( 'The Page are looking for might have been removed, had its name change, or is temporarily unavailable.', 'okab' ) ?></p>
		</div>
	</div>

</article>

