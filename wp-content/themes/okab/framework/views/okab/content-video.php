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
if ( is_singular() && ! is_page() ) {
	$args = dima_helper::get_featured_args();
} else {
	$args = dima_helper::get_featured_args( $this );
}
$single = '';


?>
<article <?php post_class( $args['post_class'] ); ?> >
	<?php dima_helper::dima_get_admin_edit();?>
	<div class="post-img">
		<?php dima_featured_video(); ?>
	</div>
	<?php dima_get_entry_meta( $args['meta'] ); ?>
	<div class="<?php dima_pots_content_class(); ?>">
		<?php dima_helper::dima_get_view( 'okab', '_content', 'post-header' ); ?>
		<?php dima_get_post_content( $args['is_full_post_content_blog'], $args['words'] ); ?>
		<?php dima_helper::dima_get_view( 'okab', '_content', 'post-footer' ); ?>
	</div>
</article>