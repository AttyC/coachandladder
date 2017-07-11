<?php
/**
 * Dima_Maintenance Class : Display a Maintenance page whene a
 * Dima_Shortcodes not installed or not activated.
 *
 * @package Dima Framework
 * @subpackage Functions
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Dima_Maintenance {

	private $users_msg = '';
	private $admin_msg = '';

	/**
	 * @access public
	 *
	 * @param $is_maintenance_mode     bool
	 * @param $users_msg   string
	 * @param $admin_msg   string
	 */
	public function __construct( $is_maintenance_mode = false, $users_msg = '', $admin_msg = '' ) {

		if ( $is_maintenance_mode !== true ) {
			return;
		}

		if ( is_admin() ) {
			return;
		}

		$this->maintenance = $is_maintenance_mode;
		$this->users_msg   = $users_msg;
		$this->admin_msg   = $admin_msg;

		if ( is_admin() || ( in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ) ) {
			return;
		}

		$this->dima_maintenance_page();

	}

	public function dima_maintenance_page() { ?>
		<style>
			html {
				background: #f1f1f1;
				border: 20px solid #FFF;
			}
		</style>
		<div class="dimawrapper" style="width:800px;margin:auto;margin-top:200px;">
			<div class="dima-inner"
			     style="text-align: center;font-family: 'Open Sans',sans-serif;padding:30px;font-size:18px;color:#a1a1a1;line-height: 2.2rem;">
				<h3 style="color: #707070;font-size: 28px;line-height: 1.25em;"><?php esc_html_e( 'Website Under Maintenance', 'okab' ) ?></h3>
				<?php if ( current_user_can( 'install_plugins' ) ) : // current user is an admin ?>
					<p><?php echo esc_attr($this->admin_msg); ?></p>
				<?php else : ?>
					<p><?php echo esc_attr($this->users_msg); ?></p>
				<?php endif; ?>
			</div>
		</div>
		<?php
		exit;
	}
}

$is_maintenance_mode = false;
$admin_msg           = "";
$users_msg           = esc_html__( 'Hi, our Website is currently undergoing scheduled maintenance Please check back very soon. Sorry for the inconvenience!.', 'okab' );

if ( ! DIMA_SHORTCODES_IS_ACTIVE ) {
	$is_maintenance_mode = true;
	$admin_msg           = sprintf( esc_html__( 'The Dima_Shortcodes plugin is required to be installed and activated before your site can exit maintenance mode. Please <a %s>follow this link</a> to install and activate it. <br><em>"That message shows only to you"</em>', 'okab' ), 'href = "' . admin_url( 'themes.php?page=install-required-plugins' ) . '" style = "color:#707070;font-weight:bold;"' );
}

if ( $is_maintenance_mode ) {
	//new Dima_Maintenance( true, $users_msg, $admin_msg );
}
