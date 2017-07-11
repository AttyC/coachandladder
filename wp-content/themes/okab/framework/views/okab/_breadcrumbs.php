<?php

/**
 * Display dima_Breadcrumbs
 *
 * @package Dima Framework
 * @subpackage views okab
 * @author        PixelDIma
 * @copyright    (c) Copyright by PixelDIma
 * @link        http://pixeldima.com
 * @since      Version 1.0
 */
?>

<?php if ( ! is_front_page() ) : ?>

	<?php
	dima_breadcrumbs();
	?>

<?php endif; ?>
