<?php
/**
 * @package Dima Framework
 * @subpackage views global
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
if ( has_nav_menu( 'footer' ) ) :
	wp_nav_menu( array(
		'theme_location' => 'footer',
		'container'      => false,
		'menu_class'     => 'dima-menu',
		'depth'          => 1
	) );
else :
	echo '<ul class="dima-menu"><li><a href="' . esc_url( home_url( '/' ) ) . 'wp-admin/nav-menus.php">Assign a Menu</a></li></ul>';
endif;

?>