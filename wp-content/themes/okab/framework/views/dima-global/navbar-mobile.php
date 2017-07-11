<?php
/**
 * @package Dima Framework
 * @subpackage views global
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
// Outputs the navbar.
$header_position  = dima_get_header_positioning();
$logo_position    = dima_get_logo_positioning();
$full_width_class = dima_helper::dima_get_header_content_wrapper();
?>


<div class="<?php dima_navbar_class(); ?>">
	<?php dima_helper::dima_get_view( 'dima-global', 'topbar' ); ?>
	<div class="clearfix dima-nav-fixed"></div>
	<div class="<?php echo esc_attr( $full_width_class ) ?>">
		<!-- Nav bar button -->
		<a class="dima-btn-nav" href="#"><i class="fa fa-bars"></i></a>

		<!-- LOGO -->
		<div class="logo">
			<p>
				<?php dima_helper::dima_get_view( 'dima-global', 'brand-mobile' ); ?>
			</p>
		</div>
		<!-- Manue -->
		<?php dima_helper::dima_get_view( 'dima-global', 'nav', 'primary-mobile' ); ?>

	</div>
	<!-- container -->

	<!-- Search box -->
	<div class="search-box">
		<div class="container">
			<form method="get" id="searchform_mobile" class="form-search center-text"
			      action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" id="s_mobile" placeholder="<?php echo esc_html__( 'Start Typing...', 'okab' ); ?>"
				       name="s">
			</form>

			<div class="close-search-box">
				<a href="#">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
	</div>
	<!-- !Search box -->
</div>

