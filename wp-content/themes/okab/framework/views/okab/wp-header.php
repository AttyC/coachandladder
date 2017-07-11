<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>

<?php
dima_helper::dima_get_view( 'dima-global', 'header' );

if ( dima_helper::dima_get_option( 'dima_loading' ) == '1' ) {
	dima_helper::dima_get_view( 'dima-global', 'content', 'dima-loading' );
}
?>
<?php
echo apply_filters( 'dima_above_header_filters', '' );
?>
	<header id="header" class="clearfix" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
		<?php
		$header_positioning = dima_get_header_positioning();
		if ( $header_positioning != "fixed-left" && $header_positioning != "fixed-right" ) {
			dima_helper::dima_get_view( 'dima-global', 'slider-above' );
		}
		?>
		<div class="<?php dima_navbar_wrap_desk_class(); ?>">
			<?php dima_helper::dima_get_view( 'dima-global', 'navbar' ); ?>
		</div>
		<div class="<?php dima_navbar_wrap_mobile_class(); ?>">
			<?php dima_helper::dima_get_view( 'dima-global', 'navbar-mobile' ); ?>
		</div>
	</header>
<?php
echo apply_filters( 'dima_below_header_filters', '' );
?>
	<div class="dima-main clearfix">
<?php
dima_helper::dima_get_view( 'dima-global', 'slider-below' );
dima_helper::dima_get_view( 'okab', '_breadcrumbs' );
dima_helper::dima_get_view_with_args( 'okab', 'header', 'breaking-news' );

?>