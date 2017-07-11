<?php
/**
 * Setup : OKAB Plugins
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

function pixeldima_setup_plugins() {
	$pixeldima_setup_path = DIMA_TEMPLATE_PATH . '/framework/functions/admin/pixeldima-setup';
	require_once( $pixeldima_setup_path . '/dima_nav_tab.php' );
	?>
	<div class="about-wrap pixeldima-home">

		<header class="pixeldima-header">
			<div class="pixeldima-header-text">
				<h1>
					<?php
					echo esc_html__( 'OKAB Plugins', 'okab' )
					?>
				</h1>
				<div class="about-text">
					<?php
					echo esc_html__( 'All the plugins are well tested to work with the theme and we keep them up to date. The themes comes packed with the following premium and free plugins:', 'okab' )
					?>
				</div>
			</div>
		</header>

		<ul class="pixeldima-extensions-list">
			<?php
			$plugins = TGM_Plugin_Activation::$instance->plugins;
			foreach ( $plugins as $plugin ) : ?>
				<?php
				//Installed
				if ( dima_helper::dima_is_plugin_exists( $plugin['dima_plugin'] ) ) :

					if ( is_plugin_active( $plugin['dima_plugin'] ) ) {
						$status         = 'active';
						$status_message = 'Active';
					} else {
						$status         = 'inactive';
						$status_message = 'Inactive';
					}
					$button = '<a class="button" href="' . admin_url( 'plugins.php' ) . '">Manage Plugin</a>';
				//Not Installed
				else :
					$install_type = 'install';

					$url            =
						wp_nonce_url(
							add_query_arg(
								array(
									'page'                   => urlencode( TGM_Plugin_Activation::$instance->menu ),
									'plugin'                 => urlencode( $plugin['slug'] ),
									'plugin_name'            => urlencode( $plugin['name'] ),
									'plugin_source'          => urlencode( $plugin['source'] ),
									'tgmpa-install'          => 'install-plugin',
									'tgmpa-' . $install_type => $install_type . '-plugin',
								)
								, admin_url( TGM_Plugin_Activation::$instance->parent_slug )
							),
							'tgmpa-' . $install_type,
							'tgmpa-nonce'
						);
					$text           = 'Install Plugin';
					$class          = 'button button-primary';
					$status         = 'not-installed';
					$status_message = 'Not Installed';
					$button         = '<a class="' . $class . '" href="' . esc_url( $url ) . '">' . esc_attr( $text ) . '</a>';
				endif;

				?>

				<li class="pixeldima-extension <?php echo esc_attr( $status ); ?>"
				    id="<?php echo esc_attr( $plugin['slug'] ); ?>">
					<div class="pixeldima-extension-content">
						<img src="<?php echo esc_url( $plugin['dima_logo'] ); ?>" class="img">
						<div class="info">
							<h4 class="title"><?php echo esc_attr( $plugin['name'] ); ?><span
									class="plugin-author">-<?php echo esc_attr( $plugin['dima_author'] ); ?>-</span>
							</h4>
							<span
								class="status <?php echo esc_attr( $status ); ?>"><?php echo esc_attr( $status_message ); ?></span>
							<p class="desc"><?php echo esc_attr( $plugin['dima_description'] ); ?></p>
						</div>
						<div class="btn"><?php echo html_entity_decode( $button ); ?></div>
					</div>

				</li>

			<?php endforeach; ?>

		</ul>

	</div>

<?php }