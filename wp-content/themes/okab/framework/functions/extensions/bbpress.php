<?php
/**
 * DIMA Framework
 * WARNING: This file is part of the DIMA Core Framework.
 * Do not edit the core files.
 *
 * @package Dima Framework
 * @subpackage Extensions
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */


// Removes the single forum description.
if ( ! function_exists( 'dima_bbp_remove_single_forum_description' ) ) :
	function dima_bbp_remove_single_forum_description() {
		return;
	}
endif;

add_filter( 'bbp_get_single_forum_description', 'dima_bbp_remove_single_forum_description' );


// Filters the output of the subscription link.
if ( ! function_exists( 'dima_bbp_filter_subscribe_link' ) ) :
	function dima_bbp_filter_subscribe_link( $r ) {

		$r['before'] = '';

		return $r;

	}
endif;

add_filter( 'bbp_before_get_user_subscribe_link_parse_args', 'dima_bbp_filter_subscribe_link' );


if ( ! function_exists( 'dima_remove_bbp_single_topic_description' ) ) :
	function dima_remove_bbp_single_topic_description() {
		return;
	}
endif;

add_filter( 'bbp_get_single_topic_description', 'dima_remove_bbp_single_topic_description' );


// Filters the output of the topic tags.
if ( ! function_exists( 'dima_bbp_filter_get_topic_tag_list' ) ) :
	function dima_bbp_filter_get_topic_tag_list( $r ) {

		$r['before'] = '<div class="bbp-topic-tags"><span>' . esc_html__( 'Topic Tags : ', 'okab' ) . '</span>';
		$r['sep']    = '';
		$r['after']  = '</div>';

		return $r;

	}
endif;

add_filter( 'bbp_before_get_topic_tag_list_parse_args', 'dima_bbp_filter_get_topic_tag_list' );


// Add reply actions to the replies loop.
if ( ! function_exists( 'dima_bbp_add_actions_replies' ) ) :
	function dima_bbp_add_actions_replies() { ?>

		<?php if ( ! bbp_show_lead_topic() && ! bbp_is_single_user_replies() && ! ( function_exists( 'bp_is_user' ) && bp_is_user() ) ) : ?>

			<div class="dima-bbp-header">
				<div class="actions">
					<a href="<?php echo bbp_get_forum_permalink( bbp_get_topic_forum_id() ); ?>"><?php esc_html_e( 'To Parent Forum', 'okab' ); ?></a>
					<?php bbp_topic_subscription_link(); ?>
					<?php bbp_user_favorites_link(); ?>
				</div>
			</div>

		<?php endif; ?>

	<?php }
endif;

add_filter( 'bbp_template_before_replies_loop', 'dima_bbp_add_actions_replies' );


// Add forum actions to the single forum.
if ( ! function_exists( 'dima_bbp_add_actions_single_forum' ) ) :
	function dima_bbp_add_actions_single_forum() { ?>

		<div class="dima-bbp-header">
			<div class="actions">
				<a href="<?php echo get_post_type_archive_link( bbp_get_forum_post_type() ); ?>"><?php esc_html_e( 'To Forums List', 'okab' ); ?></a>
				<?php bbp_forum_subscription_link(); ?>
			</div>
		</div>

	<?php }
endif;

add_filter( 'bbp_template_before_single_forum', 'dima_bbp_add_actions_single_forum' );