<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>
<?php if ( is_single() ): ?>

	<?php if ( has_tag() ): ?>
		<div class="tags">
			<?php echo get_the_tag_list(); ?>
		</div>
		<?php

	endif;
	if ( dima_helper::dima_get_option( 'dima_shear_icons_post' ) == '1' ) {
		if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) {
			?>
			<div class="text-center post-share">
				<?php
				ADDTOANY_SHARE_SAVE_KIT( array( 'no_universal_button' => false, 'no_small_icons' => false ) );
				?>
			</div>
			<?php
		} else {
			if ( DIMA_SHORTCODES_IS_ACTIVE ) {
				echo do_shortcode( '[share title="Share this Post" facebook="true" twitter="true" google_plus="true" linkedin="true" pinterest="true" reddit="true" email="true"]' );
			}
		}
	}


endif; ?>
