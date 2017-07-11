<?php
/**
 * @package    Dima Framework
 * @subpackage views global
 * @version    1.0.0
 * @since      1.0.0
 * @author     PixelDima <info@pixeldima.com>
 */
$full_width_class = dima_helper::dima_get_header_content_wrapper();
$adr_show         = esc_attr( dima_helper::dima_get_option( 'dima_navbar_option_address_display_topbar' ) ) == '1';
$tel_show         = esc_attr( dima_helper::dima_get_option( 'dima_navbar_option_tel_display_topbar' ) ) == '1';
$today_show       = esc_attr( dima_helper::dima_get_option( 'dima_navbar_option_today_display_topbar' ) ) == '1';
$myaccount_show   = esc_attr( dima_helper::dima_get_option( 'dima_navbar_option_myaccount_display_topbar' ) ) == '1';
$social_show      = esc_attr( dima_helper::dima_get_option( 'dima_navbar_option_social_display_topbar' ) ) == '1';

$adr_string          = esc_attr( dima_helper::dima_get_option( 'dima_navbar_option_address_text_topbar' ) );
$tel_string          = esc_attr( dima_helper::dima_get_option( 'dima_navbar_option_tel_text_topbar' ) );
$today_format_string = esc_attr( dima_helper::dima_get_option( 'dima_navbar_option_today_text_topbar' ) );

if ( dima_helper::dima_get_option( 'dima_navbar_topbar' ) == '1' ) : ?>
	<?php $class = ''; ?>

	<div class="dima-topbar">
		<div class="<?php echo esc_attr( $full_width_class ); ?>">
			<ul class="float-start text-start dima-menu">
				<?php if ( $today_show ) { ?>
					<li>
						<i class="fa fa-calendar"></i><?php echo date_i18n( $today_format_string, current_time( 'timestamp' ) ); ?>
					</li>
				<?php } ?>
				<?php if ( $adr_show && $adr_string != '' ) { ?>
					<li><i class="fa fa-map-marker"></i><?php echo esc_attr( $adr_string ); ?>
					</li>
				<?php } ?>
				<?php if ( $tel_show && $tel_string != '' ) { ?>
					<li><i class="fa fa-phone"></i><?php echo esc_attr( $tel_string ); ?>
					</li>
				<?php } ?>
			</ul>
			<?php if ( $social_show ): $class = "dima-myaccount"; ?>
				<ul class="float-end text-end social-icons clearfix">
					<?php dima_get_global_social(); ?>
				</ul>
			<?php endif ?>
			<ul class="float-end text-end dima-menu <?php echo esc_attr( $class ); ?>">
				<?php if ( $myaccount_show ) { ?>
					<li><a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>"><i
								class="fa fa-user"></i><?php echo esc_html__( 'My Account', 'okab' ) ?></a>
					</li>
				<?php } ?>
			</ul>

		</div>
	</div>

<?php endif; ?>