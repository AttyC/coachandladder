<?php
/**
 * Theme setup settings.
 *
 * @package Dima Framework
 * @subpackage Admin Setup
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );

class DIMA_Importer_Admin_ {
	public $message;
	public $debugMessage;
	const VERSION = '1.0.0';

	/**/
	protected $session_id;
	public $session_data;
	protected $registry;
	protected $processor;

	/**/

	function __construct() {
		add_action( 'wp_ajax_dima_import_demo', array( $this, 'ajax_dima_importer' ) );
	}

	function debug_to_console( $data ) {

		if ( is_array( $data ) ) {
			$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data ) . "' );</script>";
		} else {
			$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
		}

		echo $output;
	}

	/**
	 * @param $sizes
	 *
	 * @return array
	 */
	function dima_stop_image_sizes( $sizes ) {
		return array();
	}


	/**
	 * Respond to AJAX requests.
	 */
	function ajax_dima_importer() {
		if ( current_user_can( 'manage_options' ) ) {
			if ( ! defined( 'WP_LOAD_IMPORTERS' ) ) {
				define( 'WP_LOAD_IMPORTERS', true );
			} // we are loading importers

			if ( ! class_exists( 'WP_Importer' ) ) {
				$wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
				/** @noinspection PhpIncludeInspection */
				include $wp_importer;
			}

			if ( ! class_exists( 'WP_Import' ) ) {
				$wp_import = get_template_directory() . '/data/wordpress-importer.php';
				/** @noinspection PhpIncludeInspection */
				include $wp_import;
			}

			if ( class_exists( 'WP_Importer' ) && class_exists( 'WP_Import' ) ) {

				if ( ! isset( $_POST['demo_type'] ) || trim( $_POST['demo_type'] ) == '' ) {
					$demo_type = 'okab';
				} else {
					$demo_type = $_POST['demo_type'];
				}

				switch ( $demo_type ) {
					case 'business':
						$is_shop_demo     = false;
						$woopages         = array( '' );
						$demo_name        = 'business';
						$demo_shop_name   = '';
						$homepage_title   = 'Home';
						$revslider_exists = true;

						break;
					case 'business_finance':
						$is_shop_demo     = false;
						$woopages         = array( '' );
						$demo_name        = 'business_finance';
						$demo_shop_name   = '';
						$homepage_title   = 'Home';
						$revslider_exists = true;

						break;
					case 'business_consulting':
						$is_shop_demo     = false;
						$woopages         = array( '' );
						$demo_name        = 'business_consulting';
						$demo_shop_name   = '';
						$homepage_title   = 'Consulting';
						$revslider_exists = true;

						break;
					case 'app':
						$is_shop_demo     = false;
						$woopages         = array( '' );
						$demo_name        = 'app';
						$demo_shop_name   = '';
						$homepage_title   = 'Home';
						$revslider_exists = true;

						break;
					case 'resume':
						$is_shop_demo     = false;
						$woopages         = array( '' );
						$demo_name        = 'resume';
						$demo_shop_name   = '';
						$homepage_title   = 'Home';
						$revslider_exists = false;

						break;
					case 'business_rtl':
						$is_shop_demo     = false;
						$woopages         = array( '' );
						$demo_name        = 'business_rtl';
						$demo_shop_name   = '';
						$homepage_title   = 'الرئيسية';
						$revslider_exists = true;
						break;
					case 'construction':
						$is_shop_demo     = false;
						$woopages         = array( '' );
						$demo_name        = 'construction';
						$demo_shop_name   = '';
						$homepage_title   = 'Home';
						$revslider_exists = true;
						break;
					case 'minimal_portfolio':
						$is_shop_demo     = false;
						$woopages         = array( '' );
						$demo_name        = 'minimal_portfolio';
						$demo_shop_name   = '';
						$homepage_title   = 'Portfolio';
						$revslider_exists = false;
						break;
					case 'magazine':
						$is_shop_demo     = false;
						$woopages         = array( '' );
						$demo_name        = 'magazine';
						$demo_shop_name   = '';
						$homepage_title   = 'Home';
						$revslider_exists = false;
						break;
					case 'minimal_blog':
						$is_shop_demo     = false;
						$woopages         = array( '' );
						$demo_name        = 'minimal_blog';
						$demo_shop_name   = '';
						$homepage_title   = 'Home';
						$revslider_exists = false;
						break;
					case 'photography':
						$is_shop_demo     = false;
						$woopages         = array( '' );
						$demo_name        = 'photography';
						$demo_shop_name   = '';
						$homepage_title   = 'Home';
						$revslider_exists = true;
						break;
					case 'hosting':
						$is_shop_demo     = false;
						$woopages         = array( '' );
						$demo_name        = 'hosting';
						$demo_shop_name   = '';
						$homepage_title   = 'Home';
						$revslider_exists = true;
						break;
					case 'restaurant':
						$is_shop_demo     = false;
						$woopages         = array( '' );
						$demo_name        = 'restaurant';
						$demo_shop_name   = '';
						$homepage_title   = 'Home';
						$revslider_exists = true;
						break;
					case 'shop':
						$is_shop_demo     = true;
						$woopages         = array(
							'woocommerce_shop_page_id'            => 'Shop',
							'woocommerce_cart_page_id'            => 'Cart',
							'woocommerce_checkout_page_id'        => 'Checkout',
							'woocommerce_pay_page_id'             => 'Checkout Pay',
							'woocommerce_thanks_page_id'          => 'Order Received',
							'woocommerce_myaccount_page_id'       => 'My Account',
							'woocommerce_edit_address_page_id'    => 'Edit My Address',
							'woocommerce_view_order_page_id'      => 'View Order',
							'woocommerce_change_password_page_id' => 'Change Password',
							'woocommerce_logout_page_id'          => 'Logout',
							'woocommerce_lost_password_page_id'   => 'Lost Password'
						);
						$demo_name        = 'shop';
						$demo_shop_name   = 'shop';
						$homepage_title   = 'Home';
						$revslider_exists = true;
						break;
					case 'cosmetic':
						$is_shop_demo     = true;
						$woopages         = array(
							'woocommerce_shop_page_id'            => 'Shop',
							'woocommerce_cart_page_id'            => 'Cart',
							'woocommerce_checkout_page_id'        => 'Checkout',
							'woocommerce_pay_page_id'             => 'Checkout Pay',
							'woocommerce_thanks_page_id'          => 'Order Received',
							'woocommerce_myaccount_page_id'       => 'My Account',
							'woocommerce_edit_address_page_id'    => 'Edit My Address',
							'woocommerce_view_order_page_id'      => 'View Order',
							'woocommerce_change_password_page_id' => 'Change Password',
							'woocommerce_logout_page_id'          => 'Logout',
							'woocommerce_lost_password_page_id'   => 'Lost Password'
						);
						$demo_name        = 'cosmetic';
						$demo_shop_name   = 'cosmetic';
						$homepage_title   = 'Home';
						$revslider_exists = true;
						break;

					//It's okab
					default:
						$is_shop_demo = true;
						//https://docs.woothemes.com/document/woocommerce-shortcodes/
						$woopages         = array(
							'woocommerce_shop_page_id'            => 'Shop',
							'woocommerce_cart_page_id'            => 'Cart',
							'woocommerce_checkout_page_id'        => 'Checkout',
							'woocommerce_pay_page_id'             => 'Checkout Pay',
							'woocommerce_thanks_page_id'          => 'Order Received',
							'woocommerce_myaccount_page_id'       => 'My Account',
							'woocommerce_edit_address_page_id'    => 'Edit My Address',
							'woocommerce_view_order_page_id'      => 'View Order',
							'woocommerce_change_password_page_id' => 'Change Password',
							'woocommerce_logout_page_id'          => 'Logout',
							'woocommerce_lost_password_page_id'   => 'Lost Password'
						);
						$demo_name        = 'okab';
						$demo_shop_name   = 'okab';
						$homepage_title   = 'Home';
						$revslider_exists = true;
				}
				add_filter( 'intermediate_image_sizes_advanced', 'dima_stop_image_sizes' );


				/* Import Woocommerce if WooCommerce Exists */
				if ( class_exists( 'WooCommerce' ) && $is_shop_demo == true ) {
					$this->dima_import_woo_content( $demo_shop_name, $woopages );
					flush_rewrite_rules();
				} else {
					/* Import Posts, Pages, Portfolio,Media, Menus */
					$this->dima_import_content( $demo_name );

					flush_rewrite_rules();
				}

				$this->dima_import_menu( $demo_name );

				$this->dima_import_widget( $demo_name );

				$this->dima_import_customizer( $demo_name );

				$this->dima_import_revslider( $revslider_exists, $demo_name );

				// et home & blog page
				$homepage = get_page_by_title( $homepage_title );
				if ( isset( $homepage ) && $homepage->ID ) {
					update_option( 'page_on_front', $homepage->ID );
					update_option( 'show_on_front', 'page' );
				}
				//page_for_posts

				echo esc_html__( 'Have Fan ♥', 'okab' );
				dima_demo_name::update_demo( $demo_name );
				exit;
			}
		}
	}

	public function message() {
		return $this->message;
	}

	public function debugMessage() {
		return $this->debugMessage;
	}

	/**
	 * imported menus
	 *
	 * @param string $demo_name
	 */
	function dima_import_menu( $demo_name = 'okab' ) {

		$locations = get_theme_mod( 'nav_menu_locations' );
		$menus     = wp_get_nav_menus();
		print_r( $menus );
		print_r( $locations );

		if ( $menus ) {

			if ( $demo_name == 'okab' ) {
				$ona_page_menu = get_page_by_title( 'One Page' );
			}

			foreach ( $menus as $menu ) {
				switch ( $demo_name ) {
					case 'okab':
						if ( $menu->name == 'primary' ) {
							$locations['primary'] = $menu->term_id;
						}
						// Assign One Page Menu
						if ( isset( $ona_page_menu ) && $ona_page_menu->ID && $menu->name == 'One Page' ) {
							update_post_meta( $ona_page_menu->ID, '_dima_one_page_navigation', $menu->term_id );
						}
						break;
					case 'construction':
						if ( $menu->name == 'primary' ) {
							$locations['primary'] = $menu->term_id;
						}
						break;
					case 'minimal_portfolio':
						if ( $menu->name == 'primary' ) {
							$locations['primary'] = $menu->term_id;
						}
						break;
					case 'app':
						$ona_page_menu = get_page_by_title( 'Home' );
						if ( $menu->name == 'primary' ) {
							$locations['primary'] = $menu->term_id;
						}
						if ( isset( $ona_page_menu ) && $ona_page_menu->ID && $menu->name == 'primary' ) {
							update_post_meta( $ona_page_menu->ID, '_dima_one_page_navigation', $menu->term_id );
						}
						break;
					case 'resume':
						if ( $menu->name == 'primary' ) {
							$locations['primary'] = $menu->term_id;
						}
						break;
					case 'restaurant':
						if ( $menu->name == 'primary' ) {
							$locations['primary'] = $menu->term_id;
						}
						break;
					case 'hosting':
						if ( $menu->name == 'primary' ) {
							$locations['primary'] = $menu->term_id;
						}
						break;
					case 'minimal_blog':
						if ( $menu->name == 'primary' ) {
							$locations['primary'] = $menu->term_id;
						}
						break;
					case 'photography':
						if ( $menu->name == 'primary' ) {
							$locations['primary'] = $menu->term_id;
						}
						break;
					default:
						if ( $menu->name == 'primary' ) {
							$locations['primary'] = $menu->term_id;
						} else if ( $menu->name == 'footer' ) {
							$locations['footer'] = $menu->term_id;
						}

						break;
				}
			}
		}

		set_theme_mod( 'nav_menu_locations', $locations ); // set menus to locations
	}

	/**
	 * Based on our current seesion, come up with the next response
	 * to the client.
	 *
	 * @param string $demo_name
	 * @param $woopages :array Array containing data for the client.
	 */
	function dima_import_woo_content( $demo_name = '', $woopages ) {
		$theme_xml_file = get_template_directory() . '/data/demos/' . $demo_name . '/content.xml';
		/** @noinspection PhpUndefinedClassInspection */
		$import                    = new WP_Import();
		$xml                       = $theme_xml_file;
		$import->fetch_attachments = true;
		ob_start();
		$import->import( $xml );
		ob_end_clean();

		foreach ( $woopages as $woo_page_name => $woo_page_title ) {
			$woopage = get_page_by_title( $woo_page_title );
			if ( isset( $woopage ) && $woopage->ID ) {
				update_option( $woo_page_name, $woopage->ID ); // Front Page
			}
		}
		// We no longer need to install pages
		delete_option( '_wc_needs_pages' );
		delete_transient( '_wc_activation_redirect' );
	}

	/* Import Posts, Pages, Portfolio Content, Images, Menus */

	function dima_import_content( $demo_name = '' ) {
		$xml_file = get_template_directory() . '/data/demos/' . $demo_name . '/content.xml';
		/** @noinspection PhpUndefinedClassInspection */
		$import                    = new WP_Import();
		$xml                       = $xml_file;
		$import->fetch_attachments = true;
		ob_start();
		$import->import( $xml );
		ob_end_clean();
	}

	function dima_import_widget( $demo_name = '' ) {
		$widgets_file = get_template_directory() . '/data/demos/' . $demo_name . '/widget_data.json';

		if ( isset( $widgets_file ) && $widgets_file ) {
			$widgets_json = $widgets_file; // widgets data file
			$widgets_json = get_local_file_contents( $widgets_json );
			$widget_data  = $widgets_json;
			$this->dima_import_widget_data( $widget_data );
		}
	}

	function dima_import_customizer( $demo_name ) {
		$okab_customizer_file = get_template_directory() . '/data/demos/' . $demo_name . '/okab-customizer.json';
		if ( ! empty( $okab_customizer_file ) ) {
			$file_name       = $okab_customizer_file;
			$encoded_options = get_local_file_contents( $file_name );
			$options         = json_decode( $encoded_options, true );
			foreach ( $options as $key => $value ) {
				update_option( $key, $value );
			}
		}
	}

	function dima_import_revslider( $revslider_exists = '', $demo_name = 'okab' ) {

		if ( ! class_exists( 'RevSliderSlider' ) ) {
			return false;
		}

		$rev_directory = get_template_directory() . '/data/demos/' . $demo_name . '/revsliders/';

		// IF revslider is activated
		if ( class_exists( 'UniteFunctionsRev' ) && $revslider_exists == true ) {

			$slider_array = $this->dima_get_import_files( $rev_directory, 'zip' );
			$slider       = new RevSlider();
			foreach ( $slider_array as $filepath ) {
				try {
					ob_start();
					$slider->importSliderFromPost( true, true, $filepath );
					ob_clean();
					ob_end_clean();

				} catch ( Exception $e ) {
					return new WP_Error( 'okab', $e->getMessage() );
				}
			}
		}
		$this->message = esc_html__( 'Revolution Slider downloaded...', 'okab' );

		return 'text';
	}


	/** ---------------------------------------------------------------------------
	 * Parse JSON import file
	 * http://wordpress.org/plugins/widget-settings-importexport/
	 *
	 * @param $json_data
	 */
	function dima_import_widget_data( $json_data ) {
		$json_data    = json_decode( $json_data, true );
		$sidebar_data = $json_data[0];
		$widget_data  = $json_data[1];
		// prepare widgets table
		$widgets = array();
		foreach ( $widget_data as $widget_data_title => $widget_data_value ) {
			$widgets[ $widget_data_title ] = '';
			foreach ( $widget_data_value as $widget_data_key => $widget_data_array ) {
				if ( is_int( $widget_data_key ) ) {
					$widgets[ $widget_data_title ][ $widget_data_key ] = 'on';
				}
			}
		}
		unset( $widgets[""] );
		// sidebars
		foreach ( $sidebar_data as $title => $sidebar ) {
			$count = count( $sidebar );
			for ( $i = 0; $i < $count; $i ++ ) {
				$widget               = array();
				$widget['type']       = trim( substr( $sidebar[ $i ], 0, strrpos( $sidebar[ $i ], '-' ) ) );
				$widget['type-index'] = trim( substr( $sidebar[ $i ], strrpos( $sidebar[ $i ], '-' ) + 1 ) );
				if ( ! isset( $widgets[ $widget['type'] ][ $widget['type-index'] ] ) ) {
					unset( $sidebar_data[ $title ][ $i ] );
				}
			}
			$sidebar_data[ $title ] = array_values( $sidebar_data[ $title ] );
		}
		// widgets
		foreach ( $widgets as $widget_title => $widget_value ) {
			foreach ( $widget_value as $widget_key => $this->$widget_value ) {
				$widgets[ $widget_title ][ $widget_key ] = $widget_data[ $widget_title ][ $widget_key ];
			}
		}

		$sidebar_data = array( array_filter( $sidebar_data ), $widgets );

		$this->dima_parse_import_data( $sidebar_data );
	}

	/** ---------------------------------------------------------------------------
	 * Import widgets
	 * http://wordpress.org/plugins/widget-settings-importexport/
	 *
	 * @param $import_array
	 *
	 * @return bool
	 */
	function dima_parse_import_data( $import_array ) {
		global $wp_registered_sidebars;
		$sidebars_data    = $import_array[0];
		$widget_data      = $import_array[1];
		$current_sidebars = get_option( 'sidebars_widgets' );
		$new_widgets      = array();

		foreach ( $sidebars_data as $import_sidebar => $import_widgets ) :

			foreach ( $import_widgets as $import_widget ) :
				//if the sidebar exists
				if ( isset( $wp_registered_sidebars[ $import_sidebar ] ) ) :
					$title               = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
					$index               = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );
					$current_widget_data = get_option( 'widget_' . $title );
					$new_widget_name     = $this->dima_get_new_widget_name( $title, $index );
					$new_index           = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );

					if ( ! empty( $new_widgets[ $title ] ) && is_array( $new_widgets[ $title ] ) ) {
						while ( array_key_exists( $new_index, $new_widgets[ $title ] ) ) {
							$new_index ++;
						}
					}
					$current_sidebars[ $import_sidebar ][] = $title . '-' . $new_index;
					if ( array_key_exists( $title, $new_widgets ) ) {
						$new_widgets[ $title ][ $new_index ] = $widget_data[ $title ][ $index ];
						$multiwidget                         = $new_widgets[ $title ]['_multiwidget'];
						unset( $new_widgets[ $title ]['_multiwidget'] );
						$new_widgets[ $title ]['_multiwidget'] = $multiwidget;
					} else {
						$current_widget_data[ $new_index ] = $widget_data[ $title ][ $index ];
						$current_multiwidget               = isset( $current_widget_data['_multiwidget'] ) ? $current_widget_data['_multiwidget'] : false;
						$new_multiwidget                   = isset( $widget_data[ $title ]['_multiwidget'] ) ? $widget_data[ $title ]['_multiwidget'] : false;
						$multiwidget                       = ( $current_multiwidget != $new_multiwidget ) ? $current_multiwidget : 1;
						unset( $current_widget_data['_multiwidget'] );
						$current_widget_data['_multiwidget'] = $multiwidget;
						$new_widgets[ $title ]               = $current_widget_data;
					}

				endif;
			endforeach;
		endforeach;

		if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
			update_option( 'sidebars_widgets', $current_sidebars );

			foreach ( $new_widgets as $title => $content ) {
				update_option( 'widget_' . $title, $content );
			}

			return true;
		}

		return false;
	}

	/** ---------------------------------------------------------------------------
	 * Get new widget name
	 * http://wordpress.org/plugins/widget-settings-importexport/
	 *
	 * @param $widget_name
	 * @param $widget_index
	 *
	 * @return string
	 */
	function dima_get_new_widget_name( $widget_name, $widget_index ) {
		$current_sidebars = get_option( 'sidebars_widgets' );
		$all_widget_array = array();
		foreach ( $current_sidebars as $sidebar => $widgets ) {
			if ( ! empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
				foreach ( $widgets as $widget ) {
					$all_widget_array[] = $widget;
				}
			}
		}
		while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {
			$widget_index ++;
		}
		$new_widget_name = $widget_name . '-' . $widget_index;

		return $new_widget_name;
	}

	/**
	 * Work on php 5.2.11 and above
	 *
	 * @param $directory
	 * @param $extension
	 *
	 * @return array
	 */
	function dima_get_import_files( $directory, $extension ) {
		$files              = array();
		$extension          = '/^.*\.' . $extension . '$/';
		$directory_iterator = new RecursiveDirectoryIterator( $directory );
		$recusive_iterator  = new RecursiveIteratorIterator( $directory_iterator );
		$regex_iterator     = new RegexIterator( $recusive_iterator, $extension );

		foreach ( $regex_iterator as $file ) {
			$files[] = $file->getPathname();
		}

		return $files;
	}


	/**
	 * Display demo
	 *
	 * @param string $demo
	 * @param string $name
	 * @param string $image
	 * @param string $url
	 */
	public function dima_display_demo( $demo = 'okab', $name = 'Okab', $image = '', $url = '' ) {
		$active_theme = dima_demo_name::get_installed_demo();
		$class        = '';
		$button       = '';
		if ( $active_theme == $demo ) {
			$class     = " isactive_theme";
			$installed = '<span class="status active">' . esc_html__( 'Active', 'okab' ) . '</span>';
			if ( $demo = "okab" ) {
				$button = '<input  type="submit" value="' . esc_html__( "Install", "okab" ) . '"  class="standard button"  data-demo-name="' . esc_attr( $demo ) . '">';
			}
		} else {
			$button    = '<input  type="submit" value="' . esc_html__( "Install", "okab" ) . '"  class="standard button"  data-demo-name="' . esc_attr( $demo ) . '">';
			$installed = '';
		}

		$Preview = '<a href="' . esc_url( $url ) . '" target="_blank" class="demo-preview button" >' . esc_html__( 'Preview', 'okab' ) . '</a>';

		echo ' <li class="pixeldima-demo' . $class . '" id="dima-demo-submit">'
		     . '<div class="pixeldima-demo-screenshot">'
		     . '' . $installed . ''
		     . '<img src="' . esc_url( $image ) . '" class="img">'
		     . '</div>'
		     . '<div class="info">'
		     . '<div class="btn"><h4 class="title">' . esc_attr( $name ) . '</h4></div>'
		     . '<div class="theme-actions">'
		     . '<div class="btn">' . html_entity_decode( $button ) . '</div>'
		     . '<div class="btn">' . html_entity_decode( $Preview ) . '</div>'
		     . '</div>'
		     . '</div>'
		     . '</li>';
	}

	public function dima_display_soon_demo( $image = '' ) {
		echo ' <li class="pixeldima-demo" id="dima-demo-submit">'
		     . '<div class="pixeldima-demo-screenshot">'
		     . '<img src="' . esc_url( $image ) . '" class="img">'
		     . '</div>'
		     . '</li>';
	}

}

$dima_demo_import_class = new DIMA_Importer_Admin_();
/**
 * [List Of Options for backUp]
 */
function dima_customizer_options_list() {
	$options = array(
		'dima_footer_content_top_bg',
		'dima_footer_content_bottom_bg',
		'dima_footer_content_body_color',
		'dima_footer_content_link_color',
		'dima_footer_widget_header_color',
		'dima_footer_widget_body_color',
		'dima_footer_widget_link_color',
		'dima_footer_widget_border_color',
		'dima_news_title_bg',
		'dima_news_title_text_color',
		'dima_news_text_bg',
		'dima_news_text_color',
		'dima_body_background_color',
		'dima_body_text_color',
		'dima_body_link_color',
		'dima_body_link_color_hover',
		'dima_navbar_text_color',
		'dima_navbar_text_color_after',
		'dima_navbar_text_hover_color',
		'dima_submenu_bg_color',
		'dima_submenu_text_color',
		'dima_submenu_text_hover_color',
		'dima_navbar_background_color',
		'dima_logo_on_top_background_color',
		'dima_transparent_navbar_background_color',
		'dima_transparent_navbar_text_color',
		'dima_navbar_background_color_after',
		'dima_navbar_topbar_color',
		'dima_navbar_topbar_background',
		'dima_navbar_background_image',
		'dima_heading_text_color',
		'dima_logo_text_color',
		'dima_hover_overlay_bg',
		'dima_navbar_font_list',
		'dima_heading_font_list',
		'dima_logo_font_list',
		'dima_body_subsets_list',
		'dima_header_navbar_transparent',
		'dima_body_font_list',
		'dima_layout_site',
		'dima_layout_content',
		'dima_header_logo_width',
		'dima_header_logo',
		'dima_header_sticky_logo',
		'dima_header_mobile_logo',
		'dima_header_logo_retina',
		'dima_header_sticky_logo_retina',
		'dima_header_mobile_logo_retina',
		'dima_layout_bbpress_content',
		'dima_header_navbar_position',
		'dima_header_navbar_animation',
		'dima_header_search_enable',
		'dima_header_navbar_offset_by_id',
		'dima_header_navbar_offset_by_px',
		'dima_header_logo',
		'dima_header_sticky_logo',
		'dima_header_mobile_logo',
		'dima_header_logo_retina',
		'dima_header_sticky_logo_retina',
		'dima_header_mobile_logo_retina',
		'dima_header_logo_width',
		'dima_navbar_max_height',
		'dima_navbar_shrink_height',
		'dima_logo_position',
		'dima_navbar_topbar',
		'dima_navbar_option_address_display_topbar',
		'dima_navbar_option_tel_display_topbar',
		'dima_navbar_option_today_display_topbar',
		'dima_navbar_option_myaccount_display_topbar',
		'dima_navbar_option_social_display_topbar',
		'dima_navbar_option_address_text_topbar',
		'dima_navbar_option_tel_text_topbar',
		'dima_navbar_option_today_text_topbar',
		'dima_page_title_display',
		'dima_breadcrumb_display',
		'dima_breadcrumb_background_image',
		'dima_breadcrumb_position',
		'dima_news_display',
		'dima_news_display_home',
		'dima_news_title',
		'dima_news_count',
		'dima_news_animation',
		'dima_news_query',
		'dima_news_cat_list',
		'dima_news_tag_list',
		'dima_template',
		'dima_demo_name',
		'dima_body_background_pattern',
		'dima_body_background_image',
		'dima_boxed_margin',
		'dima_content_width',
		'dima_content_max_width',
		'dima_loading',
		'dima_dark_style',
		'dima_custom_font',
		'dima_body_weights_list',
		'dima_body_text_size',
		'dima_navbar_text_style',
		'dima_navbar_weights_list',
		'dima_navbar_text_size',
		'dima_heading_text_style',
		'dima_heading_weights_list',
		'dima_heading_letter_spacing',
		'dima_logo_text_style',
		'dima_logo_weights_list',
		'dima_logo_text_size',
		'dima_logo_letter_spacing',
		'dima_blog_style',
		'dima_blog_layout',
		'dima_blog_masonry_columns',
		'dima_blog_enable_full_post_index',
		'dima_blog_blog_excerpt',
		'dima_blog_enable_post_meta',
		'dima_blog_enable_post_meta_cat',
		'dima_blog_enable_post_meta_viwe',
		'dima_blog_enable_featured_image',
		'dima_elm_hover',
		'dima_img_hover',
		'dima_pagination_post',
		'dima_shear_icons_post',
		'dima_author_post',
		'dima_shear_icons_shop',
		'dima_shop_slide_animation',
		'dima_post_related_display',
		'dima_post_related_is_slide',
		'dima_post_related_columns',
		'dima_post_related_count',
		'dima_sidebar_widget_header_size',
		'dima_sidebar_widget_header_uppercase',
		'dima_sidebar_widget_body_size',
		'dima_sidebar_widget_body_uppercase',
		'dima_shop_menu',
		'dima_shop_menu_price',
		'dima_shop_sub_menu',
		'dima_shop_layout',
		'dima_shop_columns',
		'dima_shop_posts_per_page',
		'dima_shop_sort',
		'dima_shop_product_layout',
		'dima_shop_product_tap_display',
		'dima_shop_description_tap_display',
		'dima_shop_info_tap_display',
		'dima_shop_reviews_tap_display',
		'dima_shop_related_products_display',
		'dima_shop_related_product_columns',
		'dima_shop_related_product_count',
		'dima_shop_upsells_display',
		'dima_shop_upsells_columns',
		'dima_shop_upsells_count',
		'dima_shop_cart_display',
		'dima_shop_cart_columns',
		'dima_shop_cart_count',
		'dima_footer_big',
		'dima_footer_bottom_center',
		'dima_footer_bottom',
		'dima_footer_menu_display',
		'dima_footer_go_to_top',
		'dima_footer_content_display',
		'dima_footer_content_text',
		'dima_footer_widget_areas',
		'dima_footer_widget_header_size',
		'dima_footer_widget_header_uppercase',
		'dima_footer_widget_body_size',
		'dima_footer_widget_body_uppercase',
		'dima_open_graph_meta_tag',
		////WP-UNDER-4.7
		'dima_custom_style',
		'dima_custom_js',
		'dima_space_before_head',
		'dima_space_before_body',
		'dima_google_map_api_key',
		'dima_social_facebook',
		'dima_social_twitter',
		'dima_social_googleplus',
		'dima_social_linkedin',
		'dima_social_youtube',
		'dima_social_vimeo',
		'dima_social_foursquare',
		'dima_social_tumblr',
		'dima_social_instagram',
		'dima_social_dribbble',
		'dima_social_flickr',
		'dima_social_behance',
		'dima_social_pinterest',
		'dima_social_whatsapp',
		'dima_social_soundcloud',
		'dima_social_rss',
		'dima_favicon',
		'dima_iphone_icon',
		'dima_iphone_retina_icon',
		'dima_ipad_icon',
		'dima_ipad_retina_icon',
		'dima_opengraph_image',
		'dima_body_font_and_weight_list',
		'dima_body_weight_selected',
		'dima_body_weight_selected',
		'dima_logo_weight_selected',
		'dima_navbar_weight_selected',
		'dima_heading_weight_selected',
		'dima_logo_font_and_weight_list',
		'dima_navbar_font_and_weight_list',
		'dima_heading_font_and_weight_list',
		'dima_projects_related_display',
		'dima_projects_related_style',
		'dima_projects_related_columns',
		'dima_projects_related_count',
		'dima_projects_related_elm_hover',
		'dima_projects_related_img_hover',
		'dima_projects_related_border',
		'dima_projects_slug_name',
		'dima_header_logo_width_rtl',
		'dima_header_logo_rtl',
		'dima_header_sticky_logo_rtl',
		'dima_header_mobile_logo_rtl',
		'dima_header_logo_retina_rtl',
		'dima_header_sticky_logo_retina_rtl',
		'dima_header_mobile_logo_retina_rtl',
	);

	return $options;
}