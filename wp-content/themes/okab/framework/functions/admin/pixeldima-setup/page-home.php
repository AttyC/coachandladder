<?php
/**
 * Setup : Welcome Page
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

function pixeldima_setup_page_home() {
	global $dima_allowed_HTML_tags;
	$pixeldima_setup_path = DIMA_TEMPLATE_PATH . '/framework/functions/admin/pixeldima-setup';
	require_once( $pixeldima_setup_path . '/dima_nav_tab.php' );
	?>

	<div class="about-wrap pixeldima-home">

		<header class="pixeldima-header">
			<div class="pixeldima-header-text">
				<h1><?php echo esc_html__( 'Welcome to Okab!', 'okab' ); ?></h1>
				<div class="about-text">
					<?php echo esc_html__( 'Thanks for using our theme! We´ve worked very hard to release this great product and we´ll do our absolute best to support this theme and fix all the issues.', 'okab' ); ?></div>
			</div>
			<div class="pixeldima-logo">
				<div class="logo"></div>
				<div class="text">Version<?php echo DIMA_VERSION; ?></div>
			</div>
		</header>

		<?php ob_start(); ?>


		<div class="changelog">
			<div class="feature-section">

				<div class="three">
					<h3><span
							class="dashicons dashicons dashicons-book"></span><?php esc_html_e( 'Knowledge Base', 'okab' ); ?>
					</h3>
					<p><?php echo wp_kses( __( 'Our <a href="http://pixeldima.com/knowledgebase/" target="_blank">Knowledge Base</a> include more specific and unique information for the theme.', 'okab' ), $dima_allowed_HTML_tags ); ?></p>
					<a href="http://pixeldima.com/knowledgebase/" target="_blank"
					   class="button button-primary"><?php esc_html_e( 'Open Knowledge Base', 'okab' ); ?></a>
				</div>

				<div class="three">
					<h3><span class="dashicons dashicons-sos"></span> <?php echo esc_html__( 'Support Forum', 'okab' ); ?>
					</h3>
					<p><?php esc_html_e( 'Join the PixelDima community.We offer outstanding support through our forum. To get support first you need to register (create an account) and open a thread in the OKAB WordPress Section.', 'okab' ); ?></p>
					<a href="http://pixeldima.com/forums/" target="_blank"
					   class="button button-primary"><?php esc_html_e( 'Open Support Forum', 'okab' ); ?></a>

				</div>

				<div class="three">
					<h3><span
							class="dashicons dashicons-tickets-alt"></span> <?php echo esc_html__( 'Submit A Ticket', 'okab' ); ?>
					</h3>
					<p><?php echo wp_kses( __( 'We strive to give our customers excellent support through our ticket system. Make sure to register your purchase at <a href="http://pixeldima.com/support/" target="_blank">support page</a>  to access our support services.', 'okab' ), $dima_allowed_HTML_tags ); ?></p>
					<a href="http://pixeldima.com/support/" target="_blank"
					   class="button button-primary"><?php esc_html_e( 'Submit A Ticket', 'okab' ); ?></a>
				</div>

			</div>
		</div>


		<?php $output = ob_get_contents();
		ob_end_clean(); ?>

		<?php echo apply_filters( 'dima_addons_home_content', $output ); ?>

	</div>

<?php }