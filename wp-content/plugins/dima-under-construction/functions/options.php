<?php

GLOBAL $DIMA_G_UC_OPTIONS;
if ( isset( $_POST['dima_uc_form_submitted'] ) ) {
	if ( strip_tags( $_POST['dima_uc_form_submitted'] ) == 'submitted' && current_user_can( 'manage_options' ) ) {
		$DIMA_G_UC_OPTIONS['dima_uc_enable']           = ( isset( $_POST['dima_uc_enable'] ) ) ? strip_tags( $_POST['dima_uc_enable'] ) : '';
		$DIMA_G_UC_OPTIONS['dima_uc_social_enable']    = ( isset( $_POST['dima_uc_social_enable'] ) ) ? strip_tags( $_POST['dima_uc_social_enable'] ) : '';
		$DIMA_G_UC_OPTIONS['dima_uc_cpyright_enable']  = ( isset( $_POST['dima_uc_cpyright_enable'] ) ) ? strip_tags( $_POST['dima_uc_cpyright_enable'] ) : '';
		$DIMA_G_UC_OPTIONS['dima_uc_heading']          = strip_tags( $_POST['dima_uc_heading'] );
		$DIMA_G_UC_OPTIONS['dima_uc_subheading']       = strip_tags( $_POST['dima_uc_subheading'] );
		$DIMA_G_UC_OPTIONS['dima_uc_background_image'] = strip_tags( $_POST['dima_uc_background_image'] );
		$DIMA_G_UC_OPTIONS['dima_uc_background_color'] = strip_tags( $_POST['dima_uc_background_color'] );
		$DIMA_G_UC_OPTIONS['dima_uc_heading_color']    = strip_tags( $_POST['dima_uc_heading_color'] );
		$DIMA_G_UC_OPTIONS['dima_uc_subheading_color'] = strip_tags( $_POST['dima_uc_subheading_color'] );
		$DIMA_G_UC_OPTIONS['dima_uc_shortcodes']       = stripslashes( html_entity_decode( $_POST['dima_uc_shortcodes'] ) );

		update_option( 'dima_uc', $DIMA_G_UC_OPTIONS );
	}
}

/**
 * Get Options
 */
$DIMA_G_UC_OPTIONS = get_option( 'dima_uc' );

if ( $DIMA_G_UC_OPTIONS != '' ) {
	$dima_uc_enable           = $DIMA_G_UC_OPTIONS['dima_uc_enable'];
	$dima_uc_heading          = $DIMA_G_UC_OPTIONS['dima_uc_heading'];
	$dima_uc_subheading       = $DIMA_G_UC_OPTIONS['dima_uc_subheading'];
	$dima_uc_background_image = $DIMA_G_UC_OPTIONS['dima_uc_background_image'];
	$dima_uc_background_color = $DIMA_G_UC_OPTIONS['dima_uc_background_color'];
	$dima_uc_heading_color    = $DIMA_G_UC_OPTIONS['dima_uc_heading_color'];
	$dima_uc_subheading_color = $DIMA_G_UC_OPTIONS['dima_uc_subheading_color'];
	$dima_uc_shortcodes       = $DIMA_G_UC_OPTIONS['dima_uc_shortcodes'];
	$dima_uc_social_enable    = $DIMA_G_UC_OPTIONS['dima_uc_social_enable'];
	$dima_uc_cpyright_enable  = $DIMA_G_UC_OPTIONS['dima_uc_cpyright_enable'];
}