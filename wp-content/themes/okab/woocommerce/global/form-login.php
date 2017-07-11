<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see        http://docs.woothemes.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_user_logged_in() ) {
	return;
}

?>
<form method="post" class="login box box-with-marge login-box hide" <?php if ( $hidden ) {
	echo 'style="display:none;"';
} ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>
	<?php if ( $message ) {
		echo wpautop( wptexturize( $message ) );
	} ?>
	<div class="ok-row">
		<div class="ok-md-6 ok-xsd-12">
			<p class="form-row form-row-first">
				<label for="username"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="text" class="input-text" name="username" id="username"
				       placeholder="<?php _e( 'Username or email', 'woocommerce' ); ?>"/>
			</p>
		</div>
		<div class="ok-md-6 ok-xsd-12">
			<p class="form-row form-row-last">
				<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input class="input-text" type="password" name="password" id="password"
				       placeholder="<?php _e( 'Password', 'woocommerce' ); ?>"/>
			</p>
		</div>
	</div>

	<?php do_action( 'woocommerce_login_form' ); ?>
	<div class="dima-clear"></div>
	<div class="form-row">
		<?php wp_nonce_field( 'woocommerce-login' ); ?>
		<input type="submit" class="button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"/>
		<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>"/>
		<label for="rememberme" class="inline dima-rememberme">
			<input name="rememberme" type="checkbox" id="rememberme"
			       value="forever"/> <?php _e( 'Remember me', 'woocommerce' ); ?>
		</label>
	</div>
	<div class="lost_password">
		<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
	</div>
	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>
