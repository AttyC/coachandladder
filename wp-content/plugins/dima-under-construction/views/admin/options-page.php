<?php

if ( ! current_user_can( 'manage_options' ) ) {
	wp_die( 'You do not have sufficient permissions to access this page.' );
}

/**
 * Require Options
 */
require( DIMA_UNDER_CONSTRUCTION_PATH . '/functions/options.php' );

/**
 * Options Page Output
 */
?>

<div id="dima-plugin" class="wrap dima-plugin">
	<h2><?php _e( 'Under Construction', '_dima_' ); ?></h2>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<form name="dima_uc_form" method="post" action="">
				<input name="dima_uc_form_submitted" type="hidden" value="submitted">

				<?php require( 'options-page-main.php' ); ?>
				<?php require( 'options-page-sidebar.php' ); ?>

			</form>
		</div>
		<br class="clear">
	</div>
</div>