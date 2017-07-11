<?php
/**
 * Setup : OKAB Custoimzer manager page output
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

ob_start();

/**
 * [pixeldima_page_customizer_manager Page Output]
 */
function pixeldima_page_customizer_backup() {
	$pixeldima_setup_path = DIMA_TEMPLATE_PATH . '/framework/functions/admin/pixeldima-setup';
	require_once( $pixeldima_setup_path . '/dima_nav_tab.php' );
	?>
	<div class="about-wrap pixeldima-home">

		<header class="pixeldima-header">
			<div class="pixeldima-header-text">
				<h1><?php esc_html_e( 'Backup', 'okab' ); ?></h1>
				<div class="about-text">
					<?php echo esc_html__( 'Easily export or import your WordPress customizer settings!.', 'okab' ); ?>
				</div>
			</div>
		</header>
		<!-- Call import,export,reset sections -->
		<div class="pixeldima-customizer-backup-content">
			<?php pixeldima_customizer_backup_export_output(); ?>
			<?php pixeldima_customizer_backup_import_output(); ?>
			<?php pixeldima_customizer_backup_reset_output(); ?>
		</div>

	</div>
	<?php
}

function pixeldima_customizer_backup_import_output() { ?>

	<?php if ( isset( $_FILES['import'] ) && check_admin_referer( 'pixeldima-backup-import' ) ) {
		if ( $_FILES['import']['error'] > 0 ) {
			wp_die( 'ERROR: An import error occured. Please try again.' );
		} else {
			$file_name      = $_FILES['import']['name'];
			$file_array     = explode( '.', $file_name );
			$file_extantion = strtolower( end( $file_array ) );
			$file_size      = $_FILES['import']['size'];
			if ( ( $file_extantion == 'json' ) && ( $file_size < 500000 ) ) {
				$encoded_options = get_local_file_contents( $_FILES['import']['tmp_name'] );
				$options         = json_decode( $encoded_options, true );
				foreach ( $options as $key => $value ) {
					update_option( $key, $value );
				}
				echo '<div class="updated"><p>Successfully restored!</p></div>';
			} else {
				echo '<div class="error"><p>Invalid file type provided or file size too big. Please try again.</p></div>';
			}
		}
	}
	?>
	<div class="inside">
		<h3><span class="dashicons dashicons-upload"></span> <span>Import</span></h3>
		<form method="post" enctype="multipart/form-data">
			<?php wp_nonce_field( 'pixeldima-backup-import' ); ?>
			<p>Upload your OKAB Customizer Settings (.json) file and we&apos;ll import the customizer options into
				this
				site.</p>
			<p><input type="file" id="pixeldima-backup-import" name="import"></p>
			<p class="submit">
				<input type="submit" name="submit" id="pixeldima-backup-import-submit" class="button button-primary"
				       value="Upload File and Import" disabled>
			</p>
		</form>
	</div>

	<?php
}

/**
 * [pixeldima_customizer_backup_export_output Export]
 */
function pixeldima_customizer_backup_export_output() {

	if ( ! isset( $_POST['export'] ) ) {
		?>

		<div class="pixeldima-customizer-backup export">
		<h3 class="title"><span>Customizer Backup</span></h3>
		<div class="inside">
			<h3><span class="dashicons dashicons-download"></span> <span>Export</span></h3>
			<form method="post">
				<?php wp_nonce_field( 'pixeldima-backup-export' ); ?>
				<p>Clicking the button below will create a JSON file that contain all customizer settings.</p>
				<p class="submit">
					<input type="submit" name="export" class="button button-primary" value="Download json File">
				</p>
			</form>
		</div>
		<?php
	} elseif ( check_admin_referer( 'pixeldima-backup-export' ) ) {
		$blogname  = strtolower( str_replace( ' ', '-', get_option( 'blogname' ) ) );
		$file_name = $blogname . '-customizer';
		$options   = dima_customizer_options_list();

		foreach ( $options as $option ) {
			$value           = maybe_unserialize( get_option( $option ) );
			$data[ $option ] = $value;
		}

		$json_data = json_encode( $data );

		//Clean (erase) the output buffer
		ob_clean();

		echo $json_data;

		header( 'Content-Type: text/json; charset=' . get_option( 'blog_charset' ) );
		header( 'Content-Disposition: attachment; filename="' . $file_name . '.json"' );

		exit();
	}
}

/**
 * [pixeldima_customizer_backup_reset_output Alert ]
 */
function pixeldima_customizer_backup_reset_output() { ?>

	<?php

	// Action
	if ( isset( $_POST['reset'] ) && check_admin_referer( 'pixeldima-backup-reset' ) ) {

		$options = dima_customizer_options_list();

		foreach ( $options as $option ) {
			delete_option( $option );
		}

		echo '<div class="updated"><p>Successfully reset.</p></div>';
	} ?>
	<div class="inside">
		<h3><span class="dashicons dashicons-update"></span> <span>Reset</span></h3>
		<form method="post">
			<?php wp_nonce_field( 'pixeldima-backup-reset' ); ?>
			<p>When you click the button below WordPress will reset your Customizer settings as if it were a new
				installation (you can also import/export your custom configurations)</p>
			<p class="submit">
				<input type="submit" id="pixeldima-backup-reset-submit"
				       class="cd-popup-trigger button button-primary" value="Reset Customizer Settings">
				<input type="hidden" name="reset" value="reset">
			</p>
		</form>
	</div>
	</div>

	<?php
}

