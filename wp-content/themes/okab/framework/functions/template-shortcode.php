<?php
/**
 * Default shortcodes.
 *
 * @package Dima Framework
 * @subpackage Functions
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

function duma_blog_shortcode_theme( $search = false ) {
	$style          = esc_attr( dima_helper::dima_get_option( 'dima_blog_style' ) );
	$columns        = esc_attr( dima_helper::dima_get_option( 'dima_blog_masonry_columns' ) );
	$img_hover      = esc_attr( dima_helper::dima_get_option( 'dima_img_hover' ) );
	$elm_hover      = esc_attr( dima_helper::dima_get_option( 'dima_elm_hover' ) );
	$excerpt        = esc_attr( dima_helper::dima_get_option( 'dima_blog_blog_excerpt' ) );
	$featured_image = esc_attr( dima_helper::dima_get_option( 'dima_blog_enable_featured_image' ) ) == '1' ? 'true' : '';
	$count          = get_option( 'posts_per_page ' );
	$blog_meta      = esc_attr( dima_helper::dima_get_option( 'dima_blog_enable_post_meta' ) );
	$show_meta      = ( $blog_meta == '1' ) ? 'true' : 'false';
	$template       = esc_attr( dima_helper::dima_get_demo() );

	if ( DIMA_SHORTCODES_IS_ACTIVE ) {
		if ( $search ) {
			echo do_shortcode( '[blog blog_style="search" show_meta="' . $show_meta . '" elm_hover="' . $elm_hover . '" img_hover="' . $img_hover . '" words="' . $excerpt . '" column="' . $columns . '" count="' . $count . '" paging="true"  show_image="' . $featured_image . '"]' );
		} else {
			echo do_shortcode( '[blog blog_style="' . $style . '" show_meta="' . $show_meta . '" elm_hover="' . $elm_hover . '" img_hover="' . $img_hover . '" words="' . $excerpt . '" column="' . $columns . '" count="' . $count . '" paging="true" show_image="' . $featured_image . '"]' );
		}
	} else {
		$ARG_ARRAY = array(
			'show_meta'  => $show_meta,
			'show_image' => "true",
			'no_border'  => "",
			'elm_hover'  => $elm_hover,
			'img_hover'  => $img_hover,
			'words'      => $excerpt,
			'blog_style' => $style,
			'post_class' => "",
		);
		?>
		<div class="boxed-blog blog-list"><?php

		if ( have_posts() ) {
			while ( have_posts() ):
				the_post();
				dima_helper::dima_get_view_with_args( $template, 'content', get_post_format(), $ARG_ARRAY );
			endwhile;
			wp_reset_postdata();
		} else {
			dima_helper::dima_get_view( 'global', '_content-none' );
		}
		?></div><?php
		dima_pagination();
	}

}


function dima_shortcode_author_theme( $atts ) {
	extract( shortcode_atts( array(
		'id'        => '',
		'class'     => '',
		'style'     => '',
		'title'     => '',
		'author_id' => ''
	), $atts ) );

	$id        = ( $id != '' ) ? 'id = "' . esc_attr( $id ) . '"' : '';
	$class     = ( $class != '' ) ? 'dima-author-box box clearfix ' . esc_attr( $class ) : 'dima-author-box box clearfix';
	$style     = ( $style != '' ) ? 'style = "' . $style . '"' : '';
	$title     = ( $title != '' ) ? $title : esc_html__( 'Author: ', 'okab' );
	$author_id = ( $author_id != '' ) ? $author_id : get_the_author_meta( 'ID' );

	$description  = get_the_author_meta( 'description', $author_id );
	$display_name = get_the_author_meta( 'display_name', $author_id );
	$facebook     = get_the_author_meta( 'facebook', $author_id );
	$instagram    = get_the_author_meta( 'instagram', $author_id );
	$linkedin     = get_the_author_meta( 'linkedin', $author_id );
	$twitter      = get_the_author_meta( 'twitter', $author_id );
	$googleplus   = get_the_author_meta( 'googleplus', $author_id );

	$facebook_output   = ( $facebook ) ? "<li><a href=\"{$facebook}\"  title=\"Visit the Facebook Profile for {$display_name}\" target=\"_blank\"><i class=\"fa fa-facebook\"></i></a></li>" : '';
	$twitter_output    = ( $twitter ) ? "<li><a href=\"{$twitter}\"  title=\"Visit the Twitter Profile for {$display_name}\" target=\"_blank\"><i class=\"fa fa-twitter\"></i></a></li>" : '';
	$googleplus_output = ( $googleplus ) ? "<li><a href=\"{$googleplus}\"  title=\"Visit the Google+ Profile for {$display_name}\" target=\"_blank\"><i class=\"fa fa-google-plus\"></i></a></li>" : '';
	$instagram_output  = ( $instagram ) ? "<li><a href=\"{$instagram}\"  title=\"Visit the instagram Profile for {$display_name}\" target=\"_blank\"><i class=\"fa fa-instagram\"></i></a></li>" : '';
	$linkedin_output   = ( $linkedin ) ? "<li><a href=\"{$linkedin}\"  title=\"Visit the linkedin Profile for {$display_name}\" target=\"_blank\"><i class=\"fa fa-linkedin\"></i></a></li>" : '';

	if ( empty( $description ) ) {
		return '';
	}

	$output = "<section {$id} class=\"{$class}\" {$style}>"
	          . "<div class=\"dima-about-image overlay\">"
	          . get_avatar( $author_id, 180 )
	          . "</div>"
	          . "<div class=\"dima-author-info\">"
	          . "<h4 class=\"dima-author-name\">{$title}<a href=\"" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "\">{$display_name}</a></h4>"
	          . "<p>{$description}</p>"
	          . "<div class=\"social-media dima-social-author social-small\">"
	          . "<ul class=\"inline clearfix\">"
	          . $facebook_output
	          . $twitter_output
	          . $googleplus_output
	          . $instagram_output
	          . $linkedin_output
	          . "</ul>"
	          . "</div>"
	          . "</div >"
	          . "</section >";

	return $output;
}