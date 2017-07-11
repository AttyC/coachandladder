<?php

function dima_uc_admin_notices() { ?>

	<?php if ( isset( $_POST['dima_uc_form_submitted'] ) ) : ?>
		<?php if ( strip_tags( $_POST['dima_uc_form_submitted'] ) == 'submitted' && current_user_can( 'manage_options' ) ) : ?>

			<div class="updated">
				<p><?php _e( 'All settings have been successfully saved.', '_dima_' ); ?></p>
			</div>

		<?php endif; ?>
	<?php endif; ?>

<?php }

add_action( 'admin_notices', 'dima_uc_admin_notices' );