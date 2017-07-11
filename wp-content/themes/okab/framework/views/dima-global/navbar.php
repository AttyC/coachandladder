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
$is_one_page_nav  = dima_is_one_page_navigation();
$full_width_class = dima_helper::dima_get_header_content_wrapper();
$logo_positioning = dima_get_logo_positioning();

$offset_id   = dima_helper::dima_get_option( 'dima_header_navbar_offset_by_id' );
$offset_px   = dima_helper::dima_get_option( 'dima_header_navbar_offset_by_px' );
$data_offset = "";
if ( $offset_id != "" ) {
	$data_offset = 'data-offsetBy="' . esc_attr( $offset_id ) . '"';
} elseif ( $offset_px != "" ) {
	$offset_px = 'data-offsetBy-px="' . esc_attr( $offset_px ) . '"';
}
?>

<?php if ( ( $header_position == 'fill-width' || $header_position == 'floating' || $header_position == 'static-top' || $header_position == 'fixed-top' ) && $logo_position != 'logo-on-top' ): ?>

	<div class="<?php dima_navbar_class(); ?>" <?php echo esc_attr( $data_offset );
	echo esc_attr( $offset_px ); ?>>
		<?php dima_helper::dima_get_view( 'dima-global', 'topbar' ); ?>
		<div class="clearfix dima-nav-fixed"></div>
		<div class="dima-navbar-global <?php echo esc_attr( $full_width_class ) ?>">
			<!-- Nav bar button -->
			<!-- LOGO -->
			<div class="logo">
				<p class="site-title">
					<?php dima_helper::dima_get_view( 'dima-global', 'brand' ); ?>
				</p>
			</div>
			<!-- Manue -->
			<?php dima_helper::dima_get_view( 'dima-global', 'nav', 'primary' ); ?>

		</div>
		<!-- container -->

		<!-- Search box -->
		<div class="search-box">
			<div class="container">
				<form method="get" id="searchform" class="form-search center-text"
				      action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" id="s" placeholder="<?php echo esc_html__( 'Start Typing...', 'okab' ); ?>"
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

	<?php
elseif ( $logo_position == 'logo-on-top' && $header_position != 'fixed-left' && $header_position != 'fixed-right' ): ?>
	<div class="<?php dima_navbar_class(); ?>">
		<?php dima_helper::dima_get_view( 'dima-global', 'topbar' ); ?>
		<div class="clearfix dima-nav-fixed"></div>
		<div class="logo_on_top clearfix">
			<!-- LOGO -->
			<div class="logo">
				<p>
					<?php dima_helper::dima_get_view( 'dima-global', 'brand' ); ?>
				</p>
			</div>
			<!--! LOGO -->

			<!-- NAVBAR BUTTON -->
			<!-- NAVBAR BUTTON -->
			<?php dima_helper::dima_get_view( 'dima-global', 'nav', 'primary' ); ?>

		</div>
		<!-- Search box -->
		<div class="search-box">
			<div class="container">
				<form method="get" id="searchform" class="form-search center-text"
				      action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" id="s" placeholder="<?php echo esc_html__( 'Start Typing...', 'okab' ); ?>"
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

	<?php
else:
	$bg = dima_helper::dima_get_option( "dima_navbar_background_image" );
	?>
	<div class="dima-navbar dima-navbar-vertical" id="sly-frame">
		<div class="vertical-content">
			<?php
			if ( ! empty( $bg ) ) {
				?>
				<div class="background-image-hide background-cover">
					<img class="data-centerbackground-image" alt="" src="<?php echo esc_url( $bg ); ?>">
				</div>
				<?php
			}
			?>
			<div class="clearfix dima-nav-fixed"></div>

			<!-- LOGO -->
			<div class="logo">
				<p>
					<?php dima_helper::dima_get_view( 'dima-global', 'brand' ); ?>
				</p>
			</div>
			<!--! LOGO -->

			<!-- NAVBAR BUTTON -->
			<a class="dima-btn-nav" href="#"><i class="fa fa-bars"></i></a>
			<!-- NAVBAR BUTTON -->
			<?php dima_helper::dima_get_view( 'dima-global', 'nav', 'primary' ); ?>
			<?php dima_helper::dima_get_view( 'dima-global', 'vertical-menu-info' ); ?>
			<div class="dima-clear"></div>
		</div>

		<!-- Search box -->
		<div class="search-box">
			<div class="container">
				<form method="get" id="searchform" class="form-search center-text"
				      action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" id="s" placeholder="<?php echo esc_html__( 'Typing...', 'okab' ); ?>" name="s">
				</form>
				<div class="close-search-box">
					<a href="#">
						<i class="fa fa-times"></i>
					</a>
				</div>
			</div>
		</div>
		<!-- !Search box -->
		<div class="scrollbar">
			<div class="handle"></div>
		</div>

	</div>

	<?php
endif; ?>

