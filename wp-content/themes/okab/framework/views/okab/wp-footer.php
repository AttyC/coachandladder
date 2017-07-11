<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>
<?php // close dima-main ?>
</div>
<?php
if ( dima_helper::dima_get_option( 'dima_footer_big' ) == '1' ) {
	dima_helper::dima_get_view( 'dima-global', 'footer', 'widget-areas' );
}

if ( dima_helper::dima_get_option( 'dima_footer_bottom' ) == '1' ) :
	dima_helper::dima_get_view( 'dima-global', 'footer' );
endif;

if ( dima_helper::dima_get_option( 'dima_footer_go_to_top' ) == '1' ) {
	dima_helper::dima_get_view( 'dima-global', 'footer', 'scroll-top' );
}
?>
<?php // close all_contenter ?>
</div>
<?php wp_footer(); ?>
</body>
</html>