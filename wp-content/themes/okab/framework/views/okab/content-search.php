<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
$is_full_post_content_blog = false;
$meta                      = ( isset( $this->show_meta ) ) ? $this->show_meta : true;
$words                     = ( isset( $this->words ) ) ? $this->words : dima_helper::dima_get_option( 'dima_blog_blog_excerpt' );
?>
<article <?php post_class(); ?> >

	<?php
	dima_get_entry_meta( $meta );
	?>
	<div class="<?php dima_pots_content_class(); ?>">
		<?php dima_helper::dima_get_view( 'okab', '_content', 'post-header' ); ?>
		<?php
		//if ( get_post_type() == 'post' ) {
		dima_get_post_content( $is_full_post_content_blog, $words );
		//}
		?>
		<?php dima_helper::dima_get_view( 'okab', '_content', 'post-footer' ); ?>
	</div>
</article>

