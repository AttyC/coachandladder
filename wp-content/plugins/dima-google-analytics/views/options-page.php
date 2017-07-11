<?php

if ( ! current_user_can( 'manage_options' ) ) {
	wp_die( 'You do not have sufficient permissions to access this page.' );
}

require( DIMA_GOOGLE_ANALYTICS_PATH . '/functions/options.php' );

?>

<div id="dima-plugin" class="wrap dima-plugin dima-google-analytics">
	<h2><?php _e( 'Google Analytics', '_DIMA_' ); ?></h2>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<form name="dima_google_analytics_form" method="post" action="">
				<input name="dima_google_analytics_submitted" type="hidden" value="submitted">
				<?php require( 'options-page-main.php' ); ?>
			</form>
		</div>
		<br class="clear">
	</div>
</div>