<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

$args = dima_helper::get_featured_args_portfolio( $this );
?>

<article <?php post_class( $args['post_class'] ); ?> >
	<?php

	dima_featured_realated_portfolio( array(
		'post_type' => $args['blog_type'],
		'img_hover' => $args['img_hover'],
		'elm_hover' => $args['elm_hover'],
		'no_border' => $args['no_border'],
		'related'   => 'true',
	) );
	?>
</article>
