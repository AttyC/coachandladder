<?php
/**
 *DESCRIPTION: Branding logo (Display logo if selected and the website name if not ).
 * @package Dima Framework
 * @subpackage views global
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
if ( is_rtl() ) {
	$website_name        = get_bloginfo( 'name' );
	$website_description = get_bloginfo( 'description' );
	$logo                = dima_helper::dima_get_option( 'dima_header_logo_rtl' );
	$logo_retina         = dima_helper::dima_get_option( 'dima_header_logo_retina_rtl' );
	$logo_info           = dima_helper::dima_get_attachment_info_by_url( $logo );
	$logo_retina_info    = dima_helper::dima_get_attachment_info_by_url( $logo_retina );

	if ( $logo_retina != '' ) {
		$website_logo        = '<img width="' . esc_attr( $logo_info[1] ) . '" height="' . esc_attr( $logo_info[2] ) . '" class="dima-logo-1x" src="' . esc_url( $logo ) . '" alt="' . esc_attr( $website_description ) . '">';
		$website_logo_retina = '<img width="' . esc_attr( $logo_retina_info[1] ) . '" height="' . esc_attr( $logo_retina_info[2] ) . '" class="dima-logo-2x" src="' . esc_url( $logo_retina ) . '" alt="' . esc_attr( $website_description ) . '">';
	} else {
		$website_logo        = '<img width="' . esc_attr( $logo_info[1] ) . '" height="' . esc_attr( $logo_info[2] ) . '" src="' . esc_url( $logo ) . '" alt="' . esc_attr( $website_description ) . '">';
		$website_logo_retina = '';
	}

	$logo_two        = dima_helper::dima_get_option( 'dima_header_sticky_logo_rtl' );
	$logo_two_retina = dima_helper::dima_get_option( 'dima_header_sticky_logo_retina_rtl' );

	if ( $logo_two_retina != '' ) {
		$website_logo_two        = '<img width="' . esc_attr( $logo_info[1] ) . '" height="' . esc_attr( $logo_info[2] ) . '" class="dima-logo-1x" src="' . esc_url( $logo_two ) . '" alt="' . esc_attr( $website_description ) . '">';
		$website_logo_two_retina = '<img width="' . esc_attr( $logo_retina_info[1] ) . '" height="' . esc_attr( $logo_retina_info[2] ) . '" class="dima-logo-2x" src="' . esc_url( $logo_two_retina ) . '" alt="' . esc_attr( $website_description ) . '">';
	} else {
		$website_logo_two        = '<img width="' . esc_attr( $logo_info[1] ) . '" height="' . esc_attr( $logo_info[2] ) . '" src="' . esc_url( $logo_two ) . '" alt="' . esc_attr( $website_description ) . '">';
		$website_logo_two_retina = '';
	}

	?>

	<a class="dima-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"
	   title="<?php echo esc_attr( $website_description ); ?>">
		<?php if ( ! dima_is_transparent_navigation() || $logo_two == '' ) {
			echo ( $logo == '' ) ? $website_name : $website_logo;
		} else {
			?>
			<span class="no-fixed-logo">
			<?php echo ( $logo_two == '' ) ? $website_name : $website_logo_two; ?>
			<?php echo $website_logo_two_retina; ?>
		</span>

			<span class="fixed-logo">
			<?php echo ( $logo == '' ) ? $website_name : $website_logo; ?>
			<?php echo $website_logo_retina; ?>
		</span>
		<?php } ?>

	</a>
	<?php

} else {
	$website_name        = get_bloginfo( 'name' );
	$website_description = get_bloginfo( 'description' );
	$logo                = dima_helper::dima_get_option( 'dima_header_logo' );
	$logo_retina         = dima_helper::dima_get_option( 'dima_header_logo_retina' );
	$logo_info           = dima_helper::dima_get_attachment_info_by_url( $logo );
	$logo_retina_info    = dima_helper::dima_get_attachment_info_by_url( $logo_retina );

	if ( $logo_retina != '' ) {
		$website_logo        = '<img width="' . esc_attr( $logo_info[1] ) . '" height="' . esc_attr( $logo_info[2] ) . '" class="dima-logo-1x" src="' . esc_url( $logo ) . '" alt="' . esc_attr( $website_description ) . '">';
		$website_logo_retina = '<img width="' . esc_attr( $logo_retina_info[1] ) . '" height="' . esc_attr( $logo_retina_info[2] ) . '" class="dima-logo-2x" src="' . esc_url( $logo_retina ) . '" alt="' . esc_attr( $website_description ) . '">';
	} else {
		$website_logo        = '<img width="' . esc_attr( $logo_info[1] ) . '" height="' . esc_attr( $logo_info[2] ) . '" src="' . esc_url( $logo ) . '" alt="' . esc_attr( $website_description ) . '">';
		$website_logo_retina = '';
	}

	$logo_two        = dima_helper::dima_get_option( 'dima_header_sticky_logo' );
	$logo_two_retina = dima_helper::dima_get_option( 'dima_header_sticky_logo_retina' );

	if ( $logo_two_retina != '' ) {
		$website_logo_two        = '<img width="' . esc_attr( $logo_info[1] ) . '" height="' . esc_attr( $logo_info[2] ) . '" class="dima-logo-1x" src="' . esc_url( $logo_two ) . '" alt="' . esc_attr( $website_description ) . '">';
		$website_logo_two_retina = '<img width="' . esc_attr( $logo_retina_info[1] ) . '" height="' . esc_attr( $logo_retina_info[2] ) . '" class="dima-logo-2x" src="' . esc_url( $logo_two_retina ) . '" alt="' . esc_attr( $website_description ) . '">';
	} else {
		$website_logo_two        = '<img width="' . esc_attr( $logo_info[1] ) . '" height="' . esc_attr( $logo_info[2] ) . '" src="' . esc_url( $logo_two ) . '" alt="' . esc_attr( $website_description ) . '">';
		$website_logo_two_retina = '';
	}

	?>
	<a class="dima-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"
	   title="<?php echo esc_attr( $website_description ); ?>">
		<?php if ( dima_is_transparent_navigation() && $logo_two != '' ) {
			?>
			<span class="no-fixed-logo">
			<?php echo ( $logo_two == '' ) ? $website_name : $website_logo_two; ?>
			<?php echo $website_logo_two_retina; ?>
		</span>
			<span class="fixed-logo">
			<?php echo ( $logo == '' ) ? $website_name : $website_logo; ?>
			<?php echo $website_logo_retina; ?>
		</span>
		<?php } else {
			echo ( $logo == '' ) ? $website_name : $website_logo;
			echo $website_logo_retina;
		} ?>

	</a>
	<?php
}