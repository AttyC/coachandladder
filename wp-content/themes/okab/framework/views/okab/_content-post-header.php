<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>
<header>
	<?php

	$second_title = apply_filters( 'dima_second_title', true );
	if ( is_single() ) {
		if ( $second_title ) {
			$breadcrumbs_display = dima_helper::dima_get_breadcrumbs_display();
			if ( $breadcrumbs_display === 'on' ) {
				?>
                <h2 class="entry-title single-post-title"><?php the_title(); ?></h2>
				<?php
			} else {
				?>
                <h1 class="entry-title single-post-title"><?php the_title(); ?></h1>
				<?php
			}
		}
		?>
	<?php } else { ?>
        <h4 class="entry-title">
            <a href="<?php the_permalink(); ?>"
               title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to: "%s"', 'okab' ), the_title_attribute( 'echo=0' ) ) ); ?>">
				<?php echo get_the_title(); ?>
            </a>
        </h4>
	<?php } ?>
</header>