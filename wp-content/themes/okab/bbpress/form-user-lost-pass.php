<?php

/**
 * User Lost Password Form
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div class="dima-bbp-form box">
	<form method="post" action="<?php bbp_wp_login_action( array( 'action' => 'lostpassword', 'context' => 'login_post' ) ); ?>" class="bbp-login-form">
		<fieldset class="bbp-form">
			<legend><?php esc_html_e( 'Lost Password', 'bbpress' ); ?></legend>

			<div class="bbp-template-notice">
				<p><?php esc_html_e( 'Enter in your username or email address below then select the &ldquo;Reset&rdquo; button.', 'okab' ) ?></p>
			</div>

			<p class="dima-bbp-username">
				<label for="user_login"><?php esc_html_e( 'Username or Email', 'bbpress' ); ?>: </label>
				<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="<?php bbp_tab_index(); ?>" />
			</p>

			<?php do_action( 'login_form', 'resetpass' ); ?>

			<div class="dima-bbp-submit-wrapper">

				<button type="submit" tabindex="<?php bbp_tab_index(); ?>" name="user-submit" class="button submit user-submit"><?php esc_html_e( 'Reset', 'okab' ); ?></button>

				<?php bbp_user_lost_pass_fields(); ?>

			</div>
		</fieldset>
	</form>
</div>