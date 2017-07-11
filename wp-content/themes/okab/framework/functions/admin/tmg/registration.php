<?php
/**
 * Sets up theme defaults
 *
 * @package tmg
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

// Registers the plugins to be included via the TMG Plugin Activation class.

if ( ! function_exists( 'dima_register_theme_plugins' ) ) :
	function dima_register_theme_plugins() {
		/**
		 * PixelDIma plugins
		 *  1-DIMA SHORTCODS
		 *  2-Slider Revolution
		 *  3-Visual Composer
		 */
		$plugins = array(
			/**
			 * DIMA SHORTCODS
			 */
			'dima-shortcode' => array(
				'name'                => 'DIMA Shortcodes',
				'slug'                => 'dima_shortcodes',
				'source'              => DIMA_TEMPLATE_URL . '/framework/plugins/dima_shortcodes.zip',
				'required'            => true,
				'version'             => '1.2.3',
				'force_activation'    => false,
				'force_deactivation'  => false,
				'external_url'        => 'pixeldima.com',
				'dima_plugin'         => 'dima_shortcodes/dima-shortcodes.php',
				'dima_author'         => 'PixelDIma',
				'dima_description'    => 'This plugin is required to run OKAB. It provides a all the shortcodes used in OKAB.',
				'dima_logo'           => DIMA_TEMPLATE_URL . '/framework/images/okab-shortcode.png',
				'dima_plugin_upgrade' => true
			),

			/**
			 * DIMA SHORTCODS
			 */
			'dima-portfolio' => array(
				'name'                => 'DIMA Portfolio',
				'slug'                => 'dima-portfolio',
				'source'              => DIMA_TEMPLATE_URL . '/framework/plugins/dima-portfolio.zip',
				'required'            => true,
				'version'             => '1.0.2',
				'force_activation'    => false,
				'force_deactivation'  => false,
				'external_url'        => 'pixeldima.com',
				'dima_plugin'         => 'dima-portfolio/dima-portfolio.php',
				'dima_author'         => 'PixelDIma',
				'dima_description'    => 'Add Portfolio posts to your existing site in minutes.',
				'dima_logo'           => DIMA_TEMPLATE_URL . '/framework/images/dima-portfolio.png',
				'dima_plugin_upgrade' => true
			),

			/**
			 * Visual Composer
			 */
			'js_composer'    => array(
				'name'                => 'Visual Composer',
				'slug'                => 'js_composer',
				'source'              => DIMA_TEMPLATE_URL . '/framework/plugins/visual_composer.zip',
				'required'            => false,
				'version'             => '5.1.1',
				'force_activation'    => false,
				'force_deactivation'  => false,
				'external_url'        => '',
				'dima_plugin'         => 'js_composer/js_composer.php',
				'dima_author'         => 'WPBakery',
				'dima_description'    => 'Visual Composer Page Builder Plugin for WordPress, with Frontend and Backend Editor.',
				'dima_logo'           => DIMA_TEMPLATE_URL . '/framework/images/Visual-Composer-Logo.png',
				'dima_plugin_upgrade' => true
			),

			/**
			 * Slider Revolution
			 */
			'revslider'      => array(
				'name'                => 'Slider Revolution',
				'slug'                => 'revslider',
				'source'              => DIMA_TEMPLATE_URL . '/framework/plugins/slider_revolution_responsive.zip',
				'required'            => false,
				'version'             => '5.4.3.1',
				'force_activation'    => false,
				'force_deactivation'  => false,
				'external_url'        => '',
				'dima_plugin'         => 'revslider/revslider.php',
				'dima_author'         => 'ThemePunch',
				'dima_description'    => 'Create responsive sliders with must-see-effects.',
				'dima_logo'           => DIMA_TEMPLATE_URL . '/framework/images/slider_revolution_responsive.png',
				'dima_plugin_upgrade' => true
			),

			'woocommerce' => array(
				'name'               => 'WooCommerce',
				'slug'               => 'woocommerce',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
				'dima_author'        => 'WooThemes',
				'dima_plugin'        => 'woocommerce/woocommerce.php',
				'dima_description'   => 'The world\'s favorite eCommerce solution that gives you complete control to sell anything.',
				'dima_logo'          => DIMA_TEMPLATE_URL . '/framework/images/woocommerce-Logo.png',
			),

			'contact-form-7' => array(
				'name'               => 'Contact Form 7',
				'slug'               => 'contact-form-7',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
				'dima_author'        => 'Takayuki Miyoshi',
				'dima_plugin'        => 'contact-form-7/wp-contact-form-7.php',
				'dima_description'   => 'Contact Form 7 can manage multiple contact forms, plus you can customize the form.',
				'dima_logo'          => DIMA_TEMPLATE_URL . '/framework/images/contactform7-Logo.png',
			),

			'bbPress' => array(
				'name'               => 'bbPress',
				'slug'               => 'bbpress',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
				'dima_author'        => 'The bbPress Community',
				'dima_plugin'        => 'bbpress/bbpress.php',
				'dima_description'   => 'bbPress is forum software with a twist from the creators of WordPress.',
				'dima_logo'          => DIMA_TEMPLATE_URL . '/framework/images/bbpree-Logo.png',
			),

			'add-to-any' => array(
				'name'               => 'Add To Any',
				'slug'               => 'add-to-any',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
				'dima_author'        => 'AddToAny',
				'dima_plugin'        => 'add-to-any/add-to-any.php',
				'dima_description'   => 'Share buttons for WordPress including the AddToAny sharing button, Facebook, Twitter, Google+, Pinterest, WhatsApp, many more',
				'dima_logo'          => DIMA_TEMPLATE_URL . '/framework/images/addtoany-Logo.png',
			),

			'mailchimp-for-wp'        => array(
				'name'               => 'MailChimp for WordPress',
				'slug'               => 'mailchimp-for-wp',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
				'dima_author'        => 'Pat Diven',
				'dima_plugin'        => 'mailchimp-for-wp/mailchimp-for-wp.php',
				'dima_description'   => 'MailChimp for WordPress, the absolute best. Subscribe your WordPress site visitors to your MailChimp lists, with ease.',
				'dima_logo'          => DIMA_TEMPLATE_URL . '/framework/images/mailchimp-logo.png',
			),
			'dima-google-analytics'   => array(
				'name'               => 'Dima – Google Analytics',
				'slug'               => 'dima-google-analytics',
				'source'             => DIMA_TEMPLATE_URL . '/framework/plugins/dima-google-analytics.zip',
				'required'           => false,
				'version'            => '1.0.0',
				'force_activation'   => false,
				'force_deactivation' => false,
				'dima_author'        => 'PixelDima',
				'dima_plugin'        => 'dima-google-analytics/dima-google-analytics.php',
				'dima_description'   => 'Connect Google Analytics with WordPress by adding your Google Analytics tracking code.',
				'dima_logo'          => DIMA_TEMPLATE_URL . '/framework/images/google-analytics.png',
			),
			'dima-under-construction' => array(
				'name'               => 'Dima – Under Construction',
				'slug'               => 'dima-under-construction',
				'source'             => DIMA_TEMPLATE_URL . '/framework/plugins/dima-under-construction.zip',
				'required'           => false,
				'version'            => '1.0.0',
				'force_activation'   => false,
				'force_deactivation' => false,
				'dima_author'        => 'PixelDima',
				'dima_plugin'        => 'dima-under-construction/dima-under-construction.php',
				'dima_description'   => 'Creates a \'Under Construction\' page that will show for all users who are not logged in.',
				'dima_logo'          => DIMA_TEMPLATE_URL . '/framework/images/under-construction.png',
			),
			'envato-market' => array(
				'name'               => 'Envato Market',
				'slug'               => 'envato-market',
				'source'             => DIMA_TEMPLATE_URL . '/framework/plugins/envato-market.zip',
				'required'           => false,
				'version'            => '1.0.0-RC2',
				'force_activation'   => false,
				'force_deactivation' => false,
				'dima_author'        => 'PixelDima',
				'dima_plugin'        => 'envato-market/envato-market.php',
				'dima_description'   => 'The Envato Market plugin can install WordPress themes and plugins purchased from ThemeForest & CodeCanyon.',
				'dima_logo'          => DIMA_TEMPLATE_URL . '/framework/images/envato.png',
			),

		);


		/**
		 * TMG configuration
		 */
		$config = array(
			'domain'       => 'okab',
			'default_path' => 'tgmpa-install-plugins',
			'parent_slug'  => 'themes.php',
			'menu'         => 'install-required-plugins',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => true,
			'message'      => '',
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'okab' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'okab' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'okab' ),
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'okab' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'okab' ),
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'okab' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'okab' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'okab' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'okab' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'okab' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'okab' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'okab' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'okab' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'okab' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'okab' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'okab' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'okab' ),
				'nag_type'                        => 'updated'
			)
		);

		tgmpa( $plugins, $config );

	}

	add_action( 'tgmpa_register', 'dima_register_theme_plugins' );
endif;


/**
 * Remove "Install Plugins" Submenu Item
 */
if ( ! function_exists( 'dima_remove_tgm_install_menu_item' ) ) :
	function dima_remove_tgm_install_menu_item() {
		remove_submenu_page( 'themes.php', 'install-required-plugins' );
	}

	add_action( 'admin_menu', 'dima_remove_tgm_install_menu_item', 9999 );
endif;