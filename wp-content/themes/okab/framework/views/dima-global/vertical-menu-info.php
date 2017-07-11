<?php
/**
 * @package     Dima Framework
 * @subpackage  views global
 * @version     1.0.0
 * @since       1.0.0
 * @author      PixelDima <info@pixeldima.com>
 */
$full_width_class    = dima_helper::dima_get_header_content_wrapper();
$adr_show            = dima_helper::dima_get_option( 'dima_navbar_option_address_display_topbar' ) == '1';
$tel_show            = dima_helper::dima_get_option( 'dima_navbar_option_tel_display_topbar' ) == '1';
$today_show          = dima_helper::dima_get_option( 'dima_navbar_option_today_display_topbar' ) == '1';
$myaccount_show      = dima_helper::dima_get_option( 'dima_navbar_option_myaccount_display_topbar' ) == '1';
$social_show         = dima_helper::dima_get_option( 'dima_navbar_option_social_display_topbar' ) == '1';
$adr_string          = dima_helper::dima_get_option( 'dima_navbar_option_address_text_topbar' );
$tel_string          = dima_helper::dima_get_option( 'dima_navbar_option_tel_text_topbar' );
$today_format_string = dima_helper::dima_get_option( 'dima_navbar_option_today_text_topbar' );

if ( dima_helper::dima_get_option( 'dima_navbar_topbar' ) == '1' ) : ?>
	<?php $class = ''; ?>

	<div class="header-vertical text-center">
		<ul class="with-border">
			<?php if ( $today_show ) { ?>
				<li>
					<i class="fa fa-calendar"></i><?php echo date_i18n( $today_format_string, current_time( 'timestamp' ) ); ?>
				</li>
			<?php } ?>
			<?php if ( $adr_show && $adr_string != '' ) { ?>
				<li><a href="#"><i class="fa fa-map-marker"></i><?php echo esc_attr( $adr_string ); ?></a>
				</li>
			<?php } ?>
			<?php if ( $tel_show && $tel_string != '' ) { ?>
				<li><a href="#"><i class="fa fa-phone"></i><?php echo esc_attr( $tel_string ); ?></a>
				</li>
			<?php } ?>
		</ul>
		<?php if ( $social_show ): $class = " social-media circle-social social-medium"; ?>
			<div class="social-media circle-social social-medium ">
				<ul class="inline clearfix">
					<?php dima_get_global_social(); ?>
				</ul>
			</div>
		<?php endif ?>

	</div>
<?php endif; ?>