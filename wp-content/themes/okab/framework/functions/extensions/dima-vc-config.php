<?php
/**
 * DIMA Framework
 * WARNING: This file is part of the DIMA Core Framework.
 * Do not edit the core files.
 *
 * @package Dima Framework
 * @subpackage Extensions
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

/**
 * override directory where Visual Composer should look for template
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) && dima_vc_config_on() ) {

	$dir = get_stylesheet_directory() . '/vc_templates';
	vc_set_shortcodes_templates_dir( $dir );
}


function dima_vc_update() {
	if ( defined( 'WPB_VC_VERSION' ) && version_compare( WPB_VC_VERSION, '4.10', '<' ) ) {
		do_action( 'vc_before_init' );
	}
}

add_action( 'admin_init', 'dima_vc_update' );


function dima_vc_config_on() {
	return get_option( 'wpb_js_dima_config', true );
}

function dima_vc_sanitize_checkbox( $value ) {
	return $value;
}


/**
 * Remove "Design options", "Custom CSS" tabs and prompt message to activate Visual Compos
 */

function dima_vc_setAsTheme() {
	if ( dima_vc_config_on() ) {
		vc_set_as_theme();
	} else {
		add_action( 'admin_notices', 'dima_vc_stop_update_notice', - 99 );
		vc_manager()->disableUpdater();
	}
}

add_action( 'vc_before_init', 'dima_vc_setAsTheme' );

function dima_vc_stop_update_notice() {
	remove_action( 'admin_notices', array( vc_license(), 'adminNoticeLicenseActivation' ) );
}

/**
 * [dima_vc_add_options_tab add OKAB config tab]
 *
 * @param $tabs
 *
 * @return mixed
 */
function dima_vc_add_options_tab( $tabs ) {
	$tabs['okab-config'] = 'OKAB';

	return $tabs;
}

add_filter( 'vc_settings_tabs', 'dima_vc_add_options_tab' );


/**
 * Tab: OKAB Config Settings
 *
 * @param $vc_config
 */
function dima_vc_add_setting_fields( $vc_config ) {
	$tab = 'okab-config';
	$vc_config->addSection( $tab );
	$vc_config->addField( $tab, esc_html__( 'OKAB Integration', 'okab' ), 'dima_config', 'dima_vc_sanitize_checkbox', 'dima_vc_dima_config' );
}

add_action( 'vc_settings_tab-okab-config', 'dima_vc_add_setting_fields' );


function dima_vc_options_des() {
	return '<div class="pixeldima-important-notice">
        <div class="pixeldima-notice-side"><span class="dashicons dashicons-info"></span></div>
        <p>To be able to use OKAB-Shortcodes with Visual Composer you need to turn the OKAB integration on.</p>
      </div>';
}


/**
 * [dima_vc_options checkbox function]
 *
 * @param  [type] $setting_id  []
 * @param  [type] $default     []
 * @param  [type] $label       []
 * @param  [type] $description []
 */
function dima_vc_options( $setting_id, $default, $label, $description ) {
	$checked = ( $checked = get_option( 'wpb_js_' . $setting_id, $default ) ) ? $checked : false; ?>

	<label>
		<input type="checkbox"<?php echo( $checked ? ' checked="checked";' : '' ) ?> value="1"
		       id="wpb_js_<?php echo $setting_id ?>" name="<?php echo 'wpb_js_' . esc_attr( $setting_id ) ?>">
		<?php echo esc_attr( $label ); ?>
	</label>
	<br/>
	<p class="dima-des description indicator-hint"><?php echo esc_html( $description ); ?></p>

	<?php
}

function dima_vc_dima_config() {
	return dima_vc_options( 'dima_config', true, esc_html__( 'Enable', 'okab' ), esc_html__( 'To be able to use OKAB-Shortcodes with Visual Composer you need to turn the OKAB integration on.', 'okab' ) );
}

/**
 *
 */
function dima_vc_disable_frontend_editor() {
	return dima_vc_options( 'dima_disable_frontend_editor', false, esc_html__( 'Remove', 'okab' ), esc_html__( 'Remove the Frontend editor.', 'okab' ) );
}


/**
 * Remove Default VC elements
 */
if ( ! function_exists( 'dima_vc_remove_default_shortcodes' && dima_vc_config_on() ) ) {

	function dima_vc_remove_default_shortcodes() {
		vc_remove_element( "vc_tta_accordion" );
		vc_remove_element( "vc_tta_tour" );
		vc_remove_element( "vc_tta_tabs" );
		vc_remove_element( "vc_tta_pageable" );
		//vc_remove_element( "vc_round_chart" );
		//vc_remove_element( "vc_line_chart" );
		vc_remove_element( "vc_text_separator" );
		vc_remove_element( "vc_facebook" );
		vc_remove_element( "vc_tweetmeme" );
		vc_remove_element( "vc_googleplus" );
		vc_remove_element( "vc_pinterest" );
		vc_remove_element( "vc_toggle" );
		vc_remove_element( "vc_images_carousel" );
		vc_remove_element( "vc_tour" );
		vc_remove_element( "vc_teaser_grid" );
		vc_remove_element( "vc_posts_grid" );
		vc_remove_element( "vc_carousel" );
		vc_remove_element( "vc_posts_slider" );
		vc_remove_element( "vc_button2" );
		vc_remove_element( "vc_button" );
		vc_remove_element( "vc_accordion" );
		vc_remove_element( "vc_tabs" );
		vc_remove_element( "vc_cta" );
		vc_remove_element( "vc_btn" );
		vc_remove_element( "vc_cta_button" );
		vc_remove_element( "vc_cta_button2" );
		vc_remove_element( "vc_video" );
		vc_remove_element( "vc_basic_grid" );
		vc_remove_element( "vc_media_grid" );
		vc_remove_element( "vc_masonry_grid" );
		vc_remove_element( "vc_masonry_media_grid" );
	}

	//Allow only OKAB elements to be used on this site.
	add_action( 'vc_before_init', 'dima_vc_remove_default_shortcodes' );

}

/**
 * Remove Default Templates
 */
add_filter( 'vc_load_default_templates', '__return_empty_array', 1 );

if ( dima_vc_config_on() ) {

	/**
	 * [dima_vc_is_frontend check if frontend editing is active]
	 * @return bool
	 */
	function dima_vc_is_frontend() {
		return ( function_exists( 'vc_manager' ) && vc_manager()->mode() == 'page_editable' );
	}

	function dima_vc_custom_configure() {

		if ( ! dima_vc_is_frontend() ) {
			return;
		}
		add_action( 'wp_enqueue_scripts', 'dima_vc_libs', 999 );
		add_action( 'dima_head_css', 'dima_vc_custom_css', 999 );
	}

	add_action( 'init', 'dima_vc_custom_configure' );

	function dima_vc_libs() {
		wp_enqueue_script( 'mediaelement' );
	}

	function dima_vc_custom_css() {

		?>
		[class*="vc_col-"] [class*="ok-"] {
		width: 100%;
		}

		.vc_element:hover:before {
		content: '';
		margin: 0;
		padding: 0;
		position: absolute;
		z-index: 0;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		outline: #ccc dashed 1px;
		}

		.vc_element .topaz-hover:hover:before, .vc_element .topaz-hover:hover:after {
		z-index: -1;
		}

		.vc_vc_column:last-of-type {
		margin-right: 0;
		}


		@media (max-width: 767px) {
		.vc_vc_column[class*="vc_col"] {
		float: none;
		width: 100%;
		margin-right: 0;
		}
		}
		<?php
	}
}
?>