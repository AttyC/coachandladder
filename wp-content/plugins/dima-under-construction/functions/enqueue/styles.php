<?php

/**
 * @param $hook
 * Enqueue Admin Styles
 */
function dima_under_construction_enqueue_admin_styles( $hook ) {
	if ( $hook == 'okab_page_pixeldima-under-construction' ) {

		wp_enqueue_style( 'dima-under-construction-admin-css', DIMA_UNDER_CONSTRUCTION_URL . '/css/admin-style.css', null, null, 'all' );

	}

}

add_action( 'admin_enqueue_scripts', 'dima_under_construction_enqueue_admin_styles' );


function dima_under_construction_output_site_styles() {

	require( DIMA_UNDER_CONSTRUCTION_PATH . '/functions/options.php' );

	if ( isset( $dima_uc_enable ) && $dima_uc_enable == 1 && ! is_user_logged_in() ) {

		$admin_bar_is_showing = is_admin_bar_showing();

		?>

		/*
		// Import font.
		*/

		@import url(http://fonts.googleapis.com/css?family=Lato:300,700);

		/*
		// Disable browser scroll.
		*/

		html,
		body {
		overflow: hidden !important;
		height: 100% !important;
		background: none;
		}

		/*
		// Base styles.
		*/

		body {
		background-color: <?php echo $dima_uc_background_color; ?>;
		<?php if ( $dima_uc_background_image != '' ) : ?>
			background-image: url(<?php echo $dima_uc_background_image; ?>);
			background-position: 50% 50%;
			background-repeat: no-repeat;
			-webkit-background-size: cover;
			background-size: cover;
		<?php endif; ?>
		}

		<?php if ( $dima_uc_background_image != '' ) : ?>
			#bg-pattern {
			position: absolute;
			opacity: .5;
			background: url(http://creazione.avanzare.co/gravity/demo/kenburns/white/assets/img/pattern/pattern.png) repeat;
			width: 100%;
			height: 100%;
			z-index: -3;
			}
		<?php endif; ?>

		.dima-uc-overlay {
		position: fixed;
		top: <?php echo ( $admin_bar_is_showing ) ? '32px' : '0'; ?>;
		left: 0;
		right: 0;
		bottom: 0;
		overflow-x: hidden;
		overflow-y: auto;
		z-index: 99999;
		}

		.dima-uc-wrap-outer {
		display: table;
		width: 100%;
		height: 100%;
		}

		.dima-uc-wrap-inner {
		display: table-cell;
		vertical-align: middle;
		padding: 5em 3em;
		}

		.dima-uc {
		display: block;
		overflow: auto;
		margin: 0 auto;
		max-width: 600px;
		font-family: Lato, "Helvetica Neue", Helvetica, sans-serif;
		text-align: center;
		}


		/*
		// Components.
		*/

		.dima-uc h1 {
		margin: 0 0 25px;
		font-family: Lato, "Helvetica Neue", Helvetica, sans-serif;
		font-size: 48px;
		font-weight: 300;
		line-height: 1;
		color: <?php echo $dima_uc_heading_color; ?>;
		}

		.dima-uc h2 {
		margin: 0;
		font-family: Lato, "Helvetica Neue", Helvetica, sans-serif;
		font-size: 24px;
		font-weight: 300;
		line-height: 1.4;
		color: <?php echo $dima_uc_subheading_color; ?>;
		}

		/*
		// Responsive.
		*/

		<?php if ( $admin_bar_is_showing ) : ?>

			@media (max-width: 782px) {
			.dima-uc-overlay {
			top: 46px;
			}
			}

			@media (max-width: 600px) {
			.dima-uc-overlay {
			top: 0;
			}
			}

		<?php endif; ?>

		@media (max-width: 768px) {
		.dima-uc h1 {
		font-size: 32px;
		}

		.dima-uc h2 {
		font-size: 21px;
		}
		}
		<?php
	}

}

add_action( 'dima_head_css', 'dima_under_construction_output_site_styles' );