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
$post_format = ( get_post_format() != '' ) ? get_post_format() : 'standard';
?>

<article class="post <?php echo esc_attr( $args['post_class'] ); ?>">

	<?php
	$post_format = get_post_format();
	dima_helper::dima_get_admin_edit();

	if ( has_post_thumbnail() ) {
		$thumb = get_the_post_thumbnail( null, 'dima-post-standard-image', null );
		$url   = wp_get_attachment_image_src( get_post_thumbnail_id(), 'dima-post-standard-image' );
		?>
		<div class="post-img" data-bg="<?php echo esc_url( $url[0] ) ?>">
			<a class="big-cover" href="<?php the_permalink(); ?>"
			   title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to: "%s"', 'okab' ), the_title_attribute( 'echo=0' ) ) ); ?>">
			</a>
			<div class="dima-meta-info-container">
				<?php dima_get_grid_meta( $args['meta'] ); ?>
			</div>
		</div>
		<?php
	} else {
		$thumb_src = dima_helper::dima_get_post_format_thumb( $post_format );
		$url       = wp_get_attachment_image_src( get_post_thumbnail_id(), 'dima-post-standard-image' );
		?>
		<div class="post-img" data-bg="<?php echo esc_url( $thumb_src ) ?>">
			<a class="big-cover" href="<?php the_permalink(); ?>"
			   title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to: "%s"', 'okab' ), the_title_attribute( 'echo=0' ) ) ); ?>">
			</a>
			<div class="dima-meta-info-container">
				<?php dima_get_grid_meta( $args['meta'] ); ?>
			</div>

		</div>
		<?php
	}
	?>
</article>