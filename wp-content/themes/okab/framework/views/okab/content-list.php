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
<li>
	<article class="post <?php echo esc_url( $args['post_class'] ); ?>">

		<?php
		if ( $args['show_image'] ) {

			$thumb = get_the_post_thumbnail( null, 'dima-thumbnails-small', null );
			if ( has_post_thumbnail() ) {
				?>
				<div class="post-img">
					<a href="<?php the_permalink(); ?>"
					   title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to: "%s"', 'okab' ), the_title_attribute( 'echo=0' ) ) ); ?>">
						<?php printf( '<div class="entry-thumb">%s</div>', $thumb ); ?>
					</a>
				</div>
				<?php
			} else {
				?>
				<div class="post-img no-image <?php echo 'post-' . esc_attr( $post_format ); ?>">
					<a href="<?php the_permalink(); ?>"
					   title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to: "%s"', 'okab' ), the_title_attribute( 'echo=0' ) ) ); ?>">
						<?php printf( '<div class="entry-thumb">%s</div>', $thumb ); ?>
					</a>
				</div>
				<?php
			}
		}
		?>

		<div class="posts-list-content text-start">
			<h6>
				<a href="<?php the_permalink(); ?>"
				   title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to: "%s"', 'okab' ), the_title_attribute( 'echo=0' ) ) ); ?>">
					<?php echo get_the_title(); ?>
				</a>
			</h6>
			<?php dima_get_front_meta(); ?>
		</div>

	</article>
</li>

