<?php
/**
 * Setup : system status
 *
 * @package Dima Framework
 * @subpackage Admin Setup
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class dima_system_status {
	static $system_status = array();

	static function add( $section, $status_array ) {
		self::$system_status[ $section ] [] = $status_array;
	}

	static function dima_render_tables() {
		foreach ( self::$system_status as $section_name => $section_statuses ) {
			?>
			<table class="widefat dima-status-table" cellspacing="0">
				<thead>
				<tr>
					<th colspan="4"><?php echo esc_attr( $section_name ) ?></th>
				</tr>
				</thead>
				<tbody>
				<?php

				foreach ( $section_statuses as $status_params ) {
					?>
					<tr>
						<td class="dima-system-status-name">
							<?php echo esc_attr( $status_params['check_name'] ) ?>
						</td>
						<td class="dima-system-status-help">
							<?php
							switch ( $status_params['status'] ) {
								case 'green':
									echo '<div class="dima-system-status-green dima-tooltip"  title="' . esc_attr( $status_params['tooltip'] ) . '"><span class="dashicons dashicons-yes"></span></div>';
									break;
								case 'yellow':
									echo '<div class="dima-system-status-yellow dima-tooltip"  title="' . esc_attr( $status_params['tooltip'] ) . '"><span class="dashicons dashicons-warning"></span></div>';
									break;
								case 'red' :
									echo '<div class="dima-system-status-red dima-tooltip"  title="' . esc_attr( $status_params['tooltip'] ) . '"><span class="dashicons dashicons-dismiss"></span></div>';
									break;
								case 'info':
									echo '<div class="dima-system-status-info dima-tooltip"  title="' . esc_attr( $status_params['tooltip'] ) . '"><span class="dashicons dashicons-editor-help"></span></div>';
									break;
							}
							?>
						</td>
						<td class="dima-system-status-value">
							<?php
							switch ( $status_params['status'] ) {
								case 'green':
									echo '<div class="dima-system-status-green">' . esc_attr( $status_params['value'] ) . ' </div>';
									break;
								case 'red' :
									echo '<div class="dima-system-status-red">' . esc_attr( $status_params['value'] ) . '</div>';
									break;
								default:
									echo $status_params['value'];
									break;
							}
							?>
						</td>
					</tr>
					<?php
				}

				?>
				</tbody>
			</table>
			<?php
		}
	}

	static function dima_let_to_num( $size ) {
		$l   = substr( $size, - 1 );
		$ret = substr( $size, 0, - 1 );
		switch ( strtoupper( $l ) ) {
			case 'P':
				$ret *= 1024;
			case 'T':
				$ret *= 1024;
			case 'G':
				$ret *= 1024;
			case 'M':
				$ret *= 1024;
			case 'K':
				$ret *= 1024;
		}

		return $ret;
	}
}


function pixeldima_setup_page_system_status() {
	$pixeldima_setup_path = DIMA_TEMPLATE_PATH . '/framework/functions/admin/pixeldima-setup';
	require_once( $pixeldima_setup_path . '/dima_nav_tab.php' );
	?>

	<div class="wrap about-wrap pixeldima-home">
		<header class="pixeldima-header">
			<h1><?php esc_html_e( 'Okab system status', 'okab' ) ?> </h1>
			<div class="about-text" style="margin-bottom: 32px;">
				<p>
					<?php
					esc_html_e( 'Here you can check the system status.', 'okab' );
					?>
				</p>
			</div>
		</header>
		<?php

		// Theme name
		dima_system_status::add( 'Theme config', array(
			'check_name' => 'Theme name',
			'tooltip'    => 'Theme name',
			'value'      => DIMA_THEME_NAME,
			'status'     => 'info'
		) );

		// Theme version
		dima_system_status::add( 'Theme config', array(
			'check_name' => 'Theme version',
			'tooltip'    => 'Theme current version',
			'value'      => DIMA_VERSION,
			'status'     => 'info'
		) );

		$dima_shortcodes               = array(
			'dima_shortcodes/dima-shortcodes.php' => array(
				'name'   => 'Active',
				'status' => 'green',
			)
		);
		$dima_shortcodes_plugin        = 'This plugin is required to run OKAB. It provides a all the shortcodes used in OKAB';
		$dima_shortcodes_plugin_status = 'red';
		$active_plugins                = get_option( 'active_plugins' );

		foreach ( $active_plugins as $active_plugin ) {
			if ( isset( $dima_shortcodes[ $active_plugin ] ) ) {
				$dima_shortcodes_plugin        = $dima_shortcodes[ $active_plugin ]['name'];
				$dima_shortcodes_plugin_status = $dima_shortcodes[ $active_plugin ]['status'];
				break;
			}
		}

		$plugin_data    = get_plugin_data( WP_PLUGIN_DIR . '/dima_shortcodes/dima-shortcodes.php' );
		$plugin_version = $plugin_data['Version'];

		dima_system_status::add( 'Theme config', array(
			'check_name' => 'Dima Shortcodes',
			'tooltip'    => 'Dima Shortcodes',
			'value'      => $dima_shortcodes_plugin,
			'status'     => $dima_shortcodes_plugin_status
		) );
		dima_system_status::add( 'Theme config', array(
			'check_name' => 'Dima Shortcodes Version',
			'tooltip'    => 'Dima Shortcodes Version',
			'value'      => $plugin_version,
			'status'     => 'info'
		) );
		dima_system_status::add( 'php.ini configuration', array(
			'check_name' => 'Server software',
			'tooltip'    => 'Server software version',
			'value'      => esc_html( $_SERVER['SERVER_SOFTWARE'] ),
			'status'     => 'info'
		) );

		// php version
		dima_system_status::add( 'php.ini configuration', array(
			'check_name' => 'PHP Version',
			'tooltip'    => 'Recommended: PHP 5.4 or greater',
			'value'      => phpversion(),
			'status'     => 'info'
		) );
		dima_system_status::add( 'php.ini configuration', array(
			'check_name' => 'PHP Post Max Size:',
			'tooltip'    => 'The largest filesize that can be contained in one post.',
			'value'      => ini_get( 'post_max_size' ),
			'status'     => 'info'
		) );
		$max_execution_time = ini_get( 'max_execution_time' );
		if ( $max_execution_time == 0 or $max_execution_time >= 60 ) {
			dima_system_status::add( 'php.ini configuration', array(
				'check_name' => 'PHP Time Limit',
				'tooltip'    => 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups)',
				'value'      => $max_execution_time,
				'status'     => 'green'
			) );
		} else {
			dima_system_status::add( 'php.ini configuration', array(
				'check_name' => 'max_execution_time',
				'tooltip'    => 'This sets the maximum time in seconds.',
				'value'      => $max_execution_time,
				'status'     => 'yellow'
			) );
		}

		$max_input_vars = ini_get( 'max_input_vars' );
		if ( $max_input_vars == 0 or $max_input_vars >= 2000 ) {
			dima_system_status::add( 'php.ini configuration', array(
				'check_name' => 'PHP Max Input Vars',
				'tooltip'    => 'The maximum number of variables your server can use for a single function to avoid overloads.',
				'value'      => $max_input_vars,
				'status'     => 'green'
			) );
		} else {
			dima_system_status::add( 'php.ini configuration', array(
				'check_name' => 'PHP Max Input Vars',
				'tooltip'    => 'The maximum number of variables your server can use for a single function to avoid overloads.',
				'value'      => $max_input_vars,
				'status'     => 'yellow'
			) );
		}

		if ( extension_loaded( 'suhosin' ) !== true ) {
			dima_system_status::add( 'php.ini configuration', array(
				'check_name' => 'SUHOSIN installed',
				'tooltip'    => 'Suhosin is not installed on your server.',
				'value'      => 'false',
				'status'     => 'green'
			) );
		} else {
			dima_system_status::add( 'php.ini configuration', array(
				'check_name' => 'SUHOSIN Installed',
				'tooltip'    => 'Suhosin is an advanced protection system for PHP installations. It was designed to protect servers and users from known and unknown flaws in PHP applications and the PHP core. If it\'s installed on your host you have to increase the suhosin.post.max_vars and suhosin.request.max_vars parameters to 2000 or more.',
				'value'      => 'SUHOSIN is installed',
				'status'     => 'yellow'
			) );

			if ( ini_get( "suhosin.post.max_vars" ) >= 2000 ) {
				dima_system_status::add( 'php.ini configuration', array(
					'check_name' => 'suhosin.post.max_vars',
					'tooltip'    => 'This parameter is properly set',
					'value'      => ini_get( "suhosin.post.max_vars" ),
					'status'     => 'green'
				) );
			} else {
				dima_system_status::add( 'php.ini configuration', array(
					'check_name' => 'suhosin.post.max_vars',
					'tooltip'    => 'To avoid this increase suhosin.post.max_vars parameter to 2000 or more.',
					'value'      => ini_get( "suhosin.post.max_vars" ),
					'status'     => 'yellow'
				) );
			}

			if ( ini_get( "suhosin.request.max_vars" ) >= 2000 ) {
				dima_system_status::add( 'php.ini configuration', array(
					'check_name' => 'suhosin.request.max_vars',
					'tooltip'    => 'This parameter is properly set',
					'value'      => ini_get( "suhosin.request.max_vars" ),
					'status'     => 'green'
				) );
			} else {
				dima_system_status::add( 'php.ini configuration', array(
					'check_name' => 'suhosin.request.max_vars',
					'tooltip'    => 'To avoid this increase suhosin.post.max_vars parameter to 2000 or more.',
					'value'      => ini_get( "suhosin.request.max_vars" ),
					'status'     => 'yellow'
				) );
			}
		}

		dima_system_status::add( 'WordPress and plugins', array(
			'check_name' => 'WP Home URL',
			'tooltip'    => 'WordPress Address (URL)',
			'value'      => esc_url( home_url('/') ),
			'status'     => 'info'
		) );

		dima_system_status::add( 'WordPress and plugins', array(
			'check_name' => 'WP Site URL',
			'tooltip'    => 'Site Address (URL)',
			'value'      => esc_url( site_url() ),
			'status'     => 'info'
		) );

		if ( home_url() != site_url() ) {
			dima_system_status::add( 'WordPress and plugins', array(
				'check_name' => 'Home URL - Site URL',
				'tooltip'    => 'Home URL not equal to Site URL, this may indicate a problem with your WordPress configuration.',
				'value'      => 'Home URL != Site URL <span class="dima-status-small-text">Home URL not equal to Site URL, this may indicate a problem with your WordPress configuration.</span>',
				'status'     => 'yellow'
			) );
		}

		dima_system_status::add( 'WordPress and plugins', array(
			'check_name' => 'WP version',
			'tooltip'    => 'WordPress version',
			'value'      => get_bloginfo( 'version' ),
			'status'     => 'info'
		) );

		dima_system_status::add( 'WordPress and plugins', array(
			'check_name' => 'WP multisite enabled',
			'tooltip'    => 'WP multisite',
			'value'      => is_multisite() ? 'Yes' : 'No',
			'status'     => 'info'
		) );

		dima_system_status::add( 'WordPress and plugins', array(
			'check_name' => 'WP Language',
			'tooltip'    => 'WP Language',
			'value'      => get_locale(),
			'status'     => 'info'
		) );

		$memory_limit = dima_system_status::dima_let_to_num( WP_MEMORY_LIMIT );
		if ( $memory_limit < 67108864 ) {
			dima_system_status::add( 'WordPress and plugins', array(
				'check_name' => 'WP Memory Limit',
				'tooltip'    => 'By default in wordpress the PHP memory limit is set to 40MB. With some plugins this limit may be reached and this affects your website functionality. To avoid this increase the memory limit to at least 64MB.',
				'value'      => size_format( $memory_limit ) . '/request <span class="dima-status-small-text">- We recommend setting memory to at least 64MB. The theme is well tested with a 40MB/request limit, but if you are using multiple plugins that may not be enough. See: <a href="http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP" target="_blank">Increasing memory allocated to PHP</a>. You can also check our guide <a href="http://forum.tagdiv.com/system-status-parameters-guide/">here</a>.</span>',
				'status'     => 'yellow'
			) );
		} else {
			dima_system_status::add( 'WordPress and plugins', array(
				'check_name' => 'WP Memory Limit',
				'tooltip'    => 'This parameter is properly set.',
				'value'      => size_format( $memory_limit ) . '/request',
				'status'     => 'green'
			) );
		}

		if ( defined( 'WP_DEBUG' ) and WP_DEBUG === true ) {
			dima_system_status::add( 'WordPress and plugins', array(
				'check_name' => 'WP_DEBUG',
				'tooltip'    => 'The debug mode is intended for development and it may display unwanted messages. You should disable it on your side.',
				'value'      => 'WP_DEBUG is enabled.',
				'status'     => 'yellow'
			) );
		} else {
			dima_system_status::add( 'WordPress and plugins', array(
				'check_name' => 'WP_DEBUG',
				'tooltip'    => 'The debug mode is disabled.',
				'value'      => 'False',
				'status'     => 'green'
			) );
		}
		dima_system_status::dima_render_tables();
		?>

	</div>


	<?php

	$output = ob_get_contents();
	ob_end_clean(); ?>

	<?php echo apply_filters( 'dima_addons_home_content', $output ); ?>


<?php }