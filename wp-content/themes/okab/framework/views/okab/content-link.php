<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
if ( is_singular() && ! is_page() ) {
	$args = dima_helper::get_featured_args();
} else {
	$args = dima_helper::get_featured_args( $this );
}
$link = get_post_meta( get_the_ID(), '_dima_link_url', true );

?>
<article <?php post_class( $args['post_class'] ); ?> >

	<?php
	dima_helper::dima_get_admin_edit();
	if ( $args['show_image'] && $args['show_image'] != 'imageside' ) {
		dima_featured_image( array(
			'post_type' => $args['blog_type'],
			'img_hover' => $args['img_hover'],
			'elm_hover' => $args['elm_hover'],
			'no_border' => $args['no_border'],
		) );
		?>
		<?php
	} ?>

	<div class="dima-link">
		<div class="topaz-border"></div>
		<h4 class="entry-title"><a href="<?php the_permalink(); ?>"
		                           title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to: "%s"', 'okab' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a>
		</h4>
		<p><a href="<?php echo esc_url( $link ) ?>"
		      title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to: "%s"', 'okab' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php echo esc_url( $link ); ?></a>
		</p>
	</div>
	<?php if ( is_single() ): ?>
		<?php dima_get_entry_meta( $args['meta'] ); ?>
		<div class="<?php dima_pots_content_class(); ?>">
			<?php dima_helper::dima_get_view( 'okab', '_content', 'post-header' ); ?>
			<?php dima_get_post_content( $args['is_full_post_content_blog'], $args['words'] ); ?>
			<?php dima_helper::dima_get_view( 'okab', '_content', 'post-footer' ); ?>
		</div>
	<?php endif; ?>

</article>