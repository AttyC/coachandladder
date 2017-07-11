<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>
<?php if ( is_author() ): ?>

	<?php
	dima_helper::dima_get_view( 'dima-global', 'about-the-author' );
	?>
	<div class="divider">
		<div class="dashed"></div>
	</div>
	<?php
	GLOBAL $author;
	$userdata = get_userdata( $author );
	?>
	<h5><?php echo esc_html__( 'Entries by', 'okab' ) ?> <a
			href=""><?php echo esc_attr( $userdata->display_name ) ?></a>
	</h5>
	<div class="double-clear"></div>
	<?php
elseif ( is_search() ): ?>
	<p><?php echo esc_html__( 'Not so happy with results? Search for a new keyword', 'okab' ); ?></p>
	<div class="dima-clear"></div>
	<?php get_search_form(); ?>
	<div class="clear-section"></div>
	<hr class="no-top-padding">
	<?php
	global $wp_query;
	$result = $wp_query->found_posts . ' ' . esc_html__( 'search results for', 'okab' );
	?>
	<h5><?php echo $result; ?>: <?php echo get_search_query() ?></h5>
	<div class="double-clear"></div>
	<?php
endif;