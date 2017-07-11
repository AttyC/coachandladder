<?php
/**
 * @package Dima Framework
 * @subpackage views global
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>

<nav class="clearfix">
	<?php dima_output_primary_navigation( true ); ?>
    <ul class="dima-nav-end">
		<?php if ( dima_helper::dima_get_option( 'dima_header_search_enable' ) == '1' ) { ?>
            <li class="search-btn"><a href="#"><i class="fa fa-search"></i></a>
            </li>
		<?php } ?>
		<?php
		if ( DIMA_WC_IS_ACTIVE && dima_helper::dima_get_option( 'dima_shop_menu' ) == '1' ) {
			echo dima_wc_navbar_cart( "0" );
		}
		?>
    </ul>
</nav>


