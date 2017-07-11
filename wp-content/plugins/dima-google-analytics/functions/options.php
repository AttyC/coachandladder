<?php

GLOBAL $DIMA_GL_GA_OPTIONS;

if ( isset( $_POST['dima_google_analytics_submitted'] ) ) {
	if ( strip_tags( $_POST['dima_google_analytics_submitted'] ) == 'submitted' && current_user_can( 'manage_options' ) ) {
		$DIMA_GL_GA_OPTIONS['dima_google_analytics_code']     = stripslashes( wp_kses( $_POST['dima_google_analytics_code'], array( 'script' => array() ) ) );
		$DIMA_GL_GA_OPTIONS['dima_google_analytics_enable']   = ( empty( $DIMA_GL_GA_OPTIONS['dima_google_analytics_code'] ) ) ? '' : '1';
		$DIMA_GL_GA_OPTIONS['dima_google_analytics_position'] = strip_tags( $_POST['dima_google_analytics_position'] );
		update_option( 'dima_google_analytics', $DIMA_GL_GA_OPTIONS );
	}
}


$DIMA_GL_GA_OPTIONS = apply_filters( 'DIMA_GL_GA_OPTIONS', get_option( 'dima_google_analytics' ) );

if ( $DIMA_GL_GA_OPTIONS != '' ) {

	$dima_google_analytics_enable   = $DIMA_GL_GA_OPTIONS['dima_google_analytics_enable'];
	$dima_google_analytics_position = $DIMA_GL_GA_OPTIONS['dima_google_analytics_position'];
	$dima_google_analytics_code     = $DIMA_GL_GA_OPTIONS['dima_google_analytics_code'];

}