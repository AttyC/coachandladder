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
	dima_helper::dima_get_admin_edit();

	$url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'dima-side-post-image' );

	$post_title      = get_the_title( get_the_ID() );
	$post_url        = get_permalink( get_the_ID() );
	$post_title_html = '<h5 class="entry-title"><a href="' . esc_url( $post_url ) . '" rel="bookmark" title="' . esc_attr( $post_title ) . '">' . esc_attr( $post_title ) . '</a></h5>';
	$post_format     = get_post_format();
	if ( has_post_thumbnail() ) {
		?>
		<div class="post-img" data-bg="<?php echo esc_url( $url[0] ) ?>">
			<a class="big-cover" href="<?php the_permalink(); ?>"
			   title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to: "%s"', 'okab' ), the_title_attribute( 'echo=0' ) ) ); ?>">
			</a>
			<div class="dima-meta-info-container">
				<div class="big-grid-meta">
					<?php echo $post_title_html ?>
				</div>
			</div>
		</div>
		<?php
	} else {
		$thumb_src = dima_helper::dima_get_post_format_thumb( $post_format );
		?>
		<div class="post-img" data-bg="<?php echo esc_attr( $thumb_src ) ?>">
			<a class="big-cover" href="<?php the_permalink(); ?>"
			   title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to: "%s"', 'okab' ), the_title_attribute( 'echo=0' ) ) ); ?>">
			</a>
			<div class="dima-meta-info-container">
				<div class="big-grid-meta">
					<?php echo $post_title_html ?>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</article>