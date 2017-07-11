<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://pixeldima.com
 * @since      1.0.0
 *
 * @package    DIMA_Portfolio
 * @subpackage DIMA_Portfolio/includes
 */


class DIMA_Portfolio_i18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'dima-portfolio',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}
}
new DIMA_Portfolio_i18n;