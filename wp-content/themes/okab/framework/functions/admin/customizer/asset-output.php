<?php
/**
 * Creat Output Css
 *
 * @package Dima Framework
 * @subpackage Admin customizer
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

function dima_customizer_generated_css() {
	$output_css_path = DIMA_TEMPLATE_PATH . '/framework/functions/admin/customizer/css-var';
	require_once( $output_css_path . '/var.php' );

	ob_start();
	echo '<style id="dima-customizer-generated-css" type="text/css">';
	require_once( $output_css_path . '/' . dima_helper::dima_get_demo() . '.php' );
	require_once( $output_css_path . '/general.php' );
	require_once( $output_css_path . '/navbar.php' );
	require_once( $output_css_path . '/widgets.php' );
	require_once( $output_css_path . '/footer.php' );
	require_once( $output_css_path . '/breaking_news.php' );
	require_once( $output_css_path . '/page.php' );

	do_action( 'dima_head_css' );
	//WP-UNDER-4.7
	if ( ! function_exists( "wp_get_custom_css" ) ) {
		echo rawurldecode( dima_helper::dima_get_option( 'dima_custom_style' ) );
	}

	echo '</style>';
	$css = ob_get_contents();
	ob_end_clean();

	// Remove comments
	$output = preg_replace( '#/\*.*?\*/#s', '', $css );
	// Remove whitespace
	$output = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output );
	// Remove trailing whitespace at the start
	$output = preg_replace( '/\s\s+(.*)/', '$1', $output );
	// Remove unnecesairy ;'s
	$output = str_replace( ';}', '}', $output );

	echo $output;

}

add_action( 'wp_head', 'dima_customizer_generated_css', 1112, 0 );


function dima_customizer_generated_js() {

	$dima_custom_scripts = dima_helper::dima_get_option( 'dima_custom_js' );
	if ( ! empty( $dima_custom_scripts ) ) {
		//first lets test is the js code is clean or has <script> tags and such
		//if we have <script> tags than we will not enclose it in anything - raw output
		if ( strpos( $dima_custom_scripts, '</script>' ) !== false ) {
			echo $dima_custom_scripts . "\n";
		} else {
			echo "<script id=\"dima-customizer-js\" type=\"text/javascript\">\n;(function($){\n" . remove_accents( html_entity_decode( $dima_custom_scripts ) ) . "\n})(jQuery);\n</script>\n";
		}
	}
}

add_action( 'wp_footer', 'dima_customizer_generated_js', 9999, 0 );

function dima_load_custom_js_footer() {
	$dima_custom_scripts = dima_helper::dima_get_option( 'dima_space_before_body' );
	if ( ! empty( $dima_custom_scripts ) ) {
		//first lets test is the js code is clean or has <script> tags and such
		//if we have <script> tags than we will not enclose it in anything - raw output
		if ( strpos( $dima_custom_scripts, '</script>' ) !== false ) {
			echo remove_accents( html_entity_decode( $dima_custom_scripts ) ) . "\n";
		} else {
			echo "<script id=\"dima-customizer-js\" type=\"text/javascript\">\n;(function($){\n" . remove_accents( html_entity_decode( $dima_custom_scripts ) ) . "\n})(jQuery);\n</script>\n";
		}
	}
}

add_action( 'wp_footer', 'dima_load_custom_js_footer', 999, 0 );

function dima_load_custom_js_head() {
	$dima_custom_scripts = dima_helper::dima_get_option( 'dima_space_before_head' );
	if ( ! empty( $dima_custom_scripts ) ) {
		//first lets test is the js code is clean or has <script> tags and such
		//if we have <script> tags than we will not enclose it in anything - raw output
		if ( strpos( $dima_custom_scripts, '</script>' ) !== false ) {
			echo remove_accents( html_entity_decode( $dima_custom_scripts ) ) . "\n";
		} else {
			echo "<script id=\"dima-customizer-head-js\" type=\"text/javascript\">\n;(function($){\n" . remove_accents( html_entity_decode( $dima_custom_scripts ) ) . "\n})(jQuery);\n</script>\n";
		}
	}
}

add_action( 'wp_head', 'dima_load_custom_js_head', 999, 0 );


