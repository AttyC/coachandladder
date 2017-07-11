<?php
/**
 * Shortcodes
 *
 * @package core
 * @subpackage shortcodes
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

/**
 * Dropcap
 *
 * @param $atts
 *
 * @return string
 */
function dima_shortcode_dropcap( $atts ) {
	extract( shortcode_atts( array(
		'id'        => '',
		'class'     => '',
		'character' => '',
		'type'      => '',//dropcap-1,dropcap-3,dropcap-3
		'style'     => ''
	), $atts, 'dropcap' ) );

	$id        = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class     = ( $class != '' ) ? 'dropcap ' . esc_attr( $class ) : 'dropcap';
	$character = ( $character == '' ) ? '!' : esc_attr( $character );
	$type      = ( $type != '' ) ? ' ' . esc_attr( $type ) : ' dropcap-1';
	$style     = ( $style != '' ) ? 'style="' . $style . '"' : '';

	$output = "<span {$id} class=\"{$class}{$type}\" {$style}>{$character}</span>";

	return $output;
}

add_shortcode( 'dropcap', 'dima_shortcode_dropcap' );


/**
 * Line
 */
function dima_shortcode_line( $atts ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'type'  => '',//double,dashed
		'style' => ''
	), $atts, 'line' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'divider ' . esc_attr( $class ) : 'divider';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';

	if ( $type != '' ) {
		$output = "<div {$id} class=\"{$class}\" {$style}>"
		          . "<div class=\"{$type}\"></div>"
		          . "</div>";
	} else {
		$output = "<hr>";
	}

	return $output;
}

add_shortcode( 'line', 'dima_shortcode_line' );

function dima_shortcode_divider( $atts ) {
	extract( shortcode_atts( array(
		'id'               => '',
		'class'            => '',
		'icon'             => '',
		'icon_fontawesome' => '',
		'direction'        => '',//end,center,start
		'full'             => '',
		'icon_size'        => '',
		'style'            => ''
	), $atts, 'divider' ) );

	$id               = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class            = ( $class != '' ) ? 'dima-divider ' . esc_attr( $class ) : 'dima-divider ';
	$style            = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$icon_size        = ( $icon_size != '' ) ? 'style="font-size:' . $icon_size . '"' : '';
	$icon             = ( $icon != '' ) ? '<i ' . $icon_size . ' class="' . $icon . '"></i>' : '';
	$icon_fontawesome = ( $icon_fontawesome != '' ) ? '<i ' . $icon_size . ' class="' . $icon_fontawesome . '"></i>' : '';
	$icon             = ( $icon == '' ) ? $icon_fontawesome : $icon;
	$class            .= ( $full == 'true' ) ? 'full-divider ' : '';

	if ( $icon != '' ) {
		switch ( $direction ) {
			case 'end':
				$direction = "hr-end";
				break;
			case 'center':
				$direction = "topaz-line";
				break;

			default:
				$direction = "hr-start";
				break;
		}
	} else {
		switch ( $direction ) {
			case 'end':
				$direction = "line-end line-hr";
				break;
			case 'center':
				$direction = "line-hr";
				break;

			default:
				$direction = "line-start line-hr";
				break;
		}
	}
	$output = "<div {$id} class=\"{$class}{$direction}\" {$style}>"
	          . "{$icon}"
	          . "</div>";

	return $output;
}

add_shortcode( 'divider', 'dima_shortcode_divider' );

/**
 * Clear
 */

function dima_shortcode_clear( $atts ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'by'    => ''
	), $atts, 'clear' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'dima-clear ' . esc_attr( $class ) : 'dima-clear';
	$by    = ( $by != '' ) ? 'style="padding-bottom:' . $by . '"' : '';

	$output = "<div {$id} class=\"{$class}\" {$by}></div>";

	return $output;
}

add_shortcode( 'clear', 'dima_shortcode_clear' );

/**
 * Highlight
 */

function dima_shortcode_highlight( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'style' => '',
	), $atts, 'highlight' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'dima-mark ' . esc_attr( $class ) : 'dima-mark';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';

	$output = "<mark {$id} class=\"{$class}\" {$style}>{$content}</mark>";

	return $output;
}

add_shortcode( 'highlight', 'dima_shortcode_highlight' );


/**
 * Testimonial
 *
 * @param $atts
 * @param null $content
 *
 * @return string
 */
function dima_shortcode_testimonial( $atts, $content = null ) { // 1
	extract( shortcode_atts( array(
		'id'              => '',
		'class'           => '',
		'style'           => '',
		'author'          => '',
		'job'             => '',
		'image'           => '',
		'image_circle'    => '',
		'icon'            => '',
		'url'             => '',
		'target'          => '',
		'border'          => '',
		'theme_color'     => '',
		'big_testimonial' => '',
		'float'           => ''
	), $atts, 'testimonial' ) );

	$id           = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$style        = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$image        = ( $image != '' ) ? $image : '';
	$author       = ( $author != '' ) ? '<strong>' . $author . "</strong>" : '';
	$job          = ( $job != '' ) ? '<span><span> - </span>' . $job . '<span>' : '';
	$image_circle = ( $image_circle == 'true' ) ? ' circle' : '';
	$icon         = ( $icon == 'false' ) ? ' class="without-icon"' : '';
	$class        = ( $class != '' ) ? ' ' . esc_attr( $class ) : '';
	$class        .= ( $big_testimonial == '1' ) ? ' quote-style' : '';

	if ( is_numeric( $image ) ) {
		$bg_image_info = wp_get_attachment_image_src( $image, 'full' );
		$image         = $bg_image_info[0];
	}

	switch ( $float ) {
		case 'end' :
			$_style = ' quote-end text-end';
			break;
		case 'start' :
			$_style = ' quote-start text-start';
			break;
		case 'top-center' :
			$_style = ' quote-top-center-arrow text-center';
			break;
		case 'top-start' :
			$_style = ' quote-start-top text-start';
			break;
		case 'top-end' :
			$_style = ' quote-end-top text-end';
			break;
		case 'bottom-center' :
			$_style = ' quote-bottom-center-arrow text-center';
			break;
		case 'bottom-start' :
			$_style = ' quote-start-bottom text-start';
			break;
		case 'bottom-end' :
			$_style = ' quote-end-bottom text-end';
			break;
		default :
			$_style = ' quote-start';
	}

	if ( ! empty( $url ) ) {
		$author = "<a  href=\"$url\" {$target} >$author</a>";
	}
	if ( $border == '1' ) {
		$border = " testimonial-side quote-text";
		$class  .= ( $theme_color == 'true' ) ? ' dima-theme-testimonial' : '';
	} else {
		$border = "no-arrow quote-text";
	}
	if ( ! empty( $image ) ) {
		$image = "<span data-element-bg=\"$image\" class=\"dima-testimonial-image{$image_circle}\">" .
		         "</span>";
	} else {
		$class .= " no-arrow";
	}
	if ( $float === "bottom-start" || $float === "bottom-end" || $float === "bottom-center" ) {
		$output = "<div {$id} {$style} class=\"dima-testimonial {$_style} {$border}{$class}\">" .
		          "<blockquote {$icon}>" .
		          "<div class=\"quote-content\">" .
		          "<p>" . do_shortcode( $content ) . "</p>" .
		          "<span class=\"dima-testimonial-meta\">" .
		          $author . " " . $job .
		          "</span>" .
		          "</span>" .
		          "</span>" .
		          "</div>" .
		          "</blockquote>" .
		          $image .
		          "</div>";

	} else {
		$output = "<div {$id} {$style} class=\"dima-testimonial {$_style} {$border}{$class}\">" .
		          $image .
		          "<blockquote {$icon}>" .
		          "<div class=\"quote-content\">" .
		          "<p>" . do_shortcode( $content ) . "</p>" .
		          "<span class=\"dima-testimonial-meta\">" .
		          $author . " " . $job .
		          "</span>" .
		          "</span>" .
		          "</span>" .
		          "</div>" .
		          "</blockquote>" .
		          "</div>";
	}

	return $output;
}

add_shortcode( 'testimonial', 'dima_shortcode_testimonial' );

/**
 * Blockquote
 */
function dima_shortcode_blockquote( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'        => '',
		'class'     => '',
		'style'     => '',
		'cite'      => '',
		'type'      => '',
		'direction' => ''
	), $atts, 'blockquote' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$cite  = ( $cite != '' ) ? '<cite>' . $cite . '</cite>' : '';

	switch ( $direction ) {
		case 'end' :
			$direction = ' text-end';
			break;
		case 'start' :
			$direction = ' text-start';
			break;
		default :
			$direction = ' text-center';
	}
	if ( $type == "pull" ) {
		$class  = ( $class != '' ) ? 'post-quote ' . esc_attr( $class ) : 'post-quote';
		$output = "<blockquote {$id} class=\"{$class}{$direction}\" {$style}><p>" . do_shortcode( $content ) . "</p>" . $cite . ""
		          . "</blockquote>";

	} else {
		$class = ( $class != '' ) ? 'blog-style ' . esc_attr( $class ) : 'blog-style ';

		$output = "<blockquote {$id} class=\"{$class}{$direction}\" {$style}><p>" . do_shortcode( $content ) . "</p>" . $cite . ""
		          . "<div class=\"topaz-border\"></div>"
		          . "</blockquote>";
	}

	return $output;
}

add_shortcode( 'blockquote', 'dima_shortcode_blockquote' );

/**
 * Alert
 *
 * @param $atts
 * @param null $content
 *
 * @return string
 */
function dima_shortcode_alert( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'               => '',
		'class'            => '',
		'style'            => '',
		'type'             => '',
		'is_icon'          => '',
		'bg_color'         => '',
		'heading'          => '',
		'icon'             => '',
		'icon_fontawesome' => '',
		'close'            => ''
	), $atts, 'alert' ) );

	$id               = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class            = ( $class != '' ) ? 'dima-alert ' . esc_attr( $class ) : 'dima-alert';
	$style            = ( $bg_color != '' ) ? "background:$bg_color;" : '';
	$style            = ( $style != '' ) ? 'style="' . $style . '' . $bg_color . '"' : '';
	$type             = ( $type != '' ) ? ' dima-alert-' . $type : ' dima-alert-info';
	$heading          = ( $heading != '' ) ? $heading = '<em class="header-alert">' . $heading . '</em>' : $heading = '';
	$icon_fontawesome = ( $icon_fontawesome != '' ) ? '<i class="' . $icon_fontawesome . '"></i>' : '';
	$icon             = ( $icon == '' ) ? $icon_fontawesome : $icon;

	if ( $is_icon == 'true' ) {

		switch ( $type ) {
			case ' dima-alert-warning':
				$is_icon = '<i class="fa fa-warning"></i>';
				break;
			case ' dima-alert-info':
				$is_icon = '<i class="fa fa-info-circle"></i>';
				break;
			case ' dima-alert-error':
				$is_icon = '<i class="fa fa-times-circle"></i>';
				break;
			case ' dima-alert-success':
				$is_icon = '<i class="fa fa-check-circle"></i>';
				break;
			case ' dima-alert-custom':
				$is_icon = $icon;
				break;
			default:
				$is_icon = "";
				break;
		}
	} else {
		$is_icon = '';
	}

	if ( $close == 'true' ) {
		$close     = ' fade in';
		$close_btn = '<button type="button" class="close" data-dismiss="alert">&times;</button>';
	} else {
		$close     = ' alert-close-block';
		$close_btn = '';
	}

	$output = "<div {$id} class=\"{$class}{$type}{$close}\" {$style}>{$is_icon}{$close_btn}{$heading}" . do_shortcode( $content ) . "</div>";

	return $output;
}

add_shortcode( 'alert', 'dima_shortcode_alert' );

/**
 * TEAM
 *   1 Meat The Team
 *   2 Team Member
 *
 * @param $atts
 * @param null $content
 *
 * @return string
 */
function dima_shortcode_meet_the_team( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'          => '',
		'class'       => '',
		'bg_color'    => '',
		'text_color'  => '',
		'name_color'  => '',
		'name'        => '',
		'image'       => '',
		'job'         => '',
		'description' => '',
		'boxed'       => '',
		'info_boxed'  => '',
		'no_border'   => 'false',
		'style'       => ''
	), $atts, 'meet_the_team' ) );

	$id          = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class       = ( $class != '' ) ? 'dima-team ' . esc_attr( $class ) : 'dima-team';
	$style       = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$job         = ( $job != '' ) ? "<span class=\"member-function\">" . $job . "</span>" : '';
	$boxed       = ( $boxed != 'true' ) ? '' : ' box';
	$no_border   = ( $no_border != 'true' ) ? 'false' : 'true';
	$bg_color    = ( $bg_color != '' ) ? 'background-color:' . $bg_color . '' : '';
	$text_color  = ( $text_color != '' ) ? 'color:' . $text_color . '' : '';
	$name_color  = ( $name_color != '' ) ? 'color:' . $name_color . '' : '';
	$info_boxed  = ( $info_boxed != 'true' ) ? '' : ' box';
	$info_style  = 'style="' . $text_color . ';' . $bg_color . '"';
	$name_style  = 'style="' . $name_color . ';"';
	$text_name   = $name;
	$name        = ( $name != '' ) ? "<div class=\"member-name\"><h5 " . $name_style . ">" . $name . "</h5></div>" : '';
	$description = ( $description != '' ) ? "<p " . $info_style . ">" . $description . "</p>" : '';
	$image       = ( $image != '' ) ? $image : '';

	if ( is_numeric( $image ) ) {
		$bg_image_info = wp_get_attachment_image_src( $image, 'full' );
		$image         = $bg_image_info[0];
	}

	$team_image = "<div class=\"dima-team-member\">"
	              . "<div class=\"team-img\">"
	              . "<div class=\"fix-chrome\">"
	              . "<figure>"
	              . "<img src=\"{$image}\" alt=\"{$text_name}\">"
	              . "</figure>"
	              . "<div class=\"post-icon link_overlay\">"
	              . "<ul class=\"icons-media\">"
	              . do_shortcode( $content )
	              . "</ul>";
	if ( $no_border == 'false' ) {
		$team_image .= ' <span class="topaz-hover" ></span >';
	}
	$team_image .= "</div>"
	               . "</div>"
	               . "</div>"
	               . "</div>";

	$output = "<div {$id} class=\"{$class}{$boxed}\" {$style}>"
	          . $team_image
	          . "<div class=\"dima-team-content text-center{$info_boxed}\" {$info_style}>"
	          . $name
	          . $job
	          . $description
	          . "</div>"
	          . "</div>";

	return $output;
}

add_shortcode( 'meet_the_team', 'dima_shortcode_meet_the_team' );

/**
 * Maps
 *   1 Embed
 *   2 Google map
 *   3 Google map marker
 */
function dima_shortcode_map( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'style' => '',
		'boxed' => ''
	), $atts, 'map' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'dima-maps ' . esc_attr( $class ) : 'dima-maps';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$boxed = ( $boxed != 'true' ) ? '' : ' box';

	$output = "<div {$id} class=\"{$class}{$boxed}\" {$style}><div class=\"dima-map-inner\">{$content}</div></div>";

	return $output;
}

add_shortcode( 'map', 'dima_shortcode_map' );

function dima_shortcode_google_map( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'class'        => '',
		'style'        => '',
		'lat'          => '',
		'lng'          => '',
		'drag'         => '',
		'zoom'         => '',
		'zoom_control' => '',
		'height'       => '',
		'width'        => '',
		'hue'          => '',
		'shape'        => '',
		'boxed'        => ''
	), $atts, 'google_maptwo' ) );

	$class = ( $class != '' ) ? 'dima-maps dima-google-map ' . esc_attr( $class ) : 'dima-maps dima-google-map';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$boxed = ( $boxed != 'true' ) ? '' : ' box';
	$shape = ( $shape != 'true' ) ? '' : 'circle';

	$js_data = array(
		'lat'         => ( $lat != '' ) ? $lat : '40.7056308',
		'lng'         => ( $lng != '' ) ? $lng : '-73.9780035',
		'zoom'        => ( $zoom != '' ) ? $zoom : '7',
		'zoomControl' => ( $zoom_control == 'true' ),
		'hue'         => ( $hue != '' ) ? $hue : '',
		'height'      => ( $height != '' ) ? $height : '200px',
		'width'       => ( $width != '' ) ? $width : '100%',
		'drag'        => ( $drag == 'true' )
	);

	$data = dima_creat_data_attributes( 'google_map', $js_data );

	wp_enqueue_script( 'vendor-google-maps' );

	static $count = 0;
	$count ++;

	$output = "<div id=\"dima-gmap-{$count}\" class=\"{$class}{$boxed}\" {$data} {$style}>"
	          . "<div id=\"dima-gmap-in-{$count}\" class=\"{$shape} dima-gmap-in\">"
	          . "</div>" . do_shortcode( $content ) . "</div>";

	return $output;
}

add_shortcode( 'google_maptwo', 'dima_shortcode_google_map' );

/**
 * @param $atts
 *
 * @return string
 */
function dima_shortcode_google_map_marker( $atts ) {
	extract( shortcode_atts( array(
		'lat'   => '',
		'lng'   => '',
		'info'  => '',
		'image' => '',
	), $atts, 'google_map_marker' ) );

	$js_data = array(
		'lat'  => ( $lat != '' ) ? $lat : '40.7056308',
		'lng'  => ( $lng != '' ) ? $lng : '-73.9780035',
		'info' => ( $info != '' ) ? $info : ''
	);

	if ( is_numeric( $image ) ) {
		$image_info       = wp_get_attachment_image_src( $image, 'full' );
		$js_data['image'] = $image_info[0];
	} else if ( $image != '' ) {
		$js_data['image'] = $image;
	}

	$data = dima_creat_data_attributes( 'google_map_marker', $js_data );

	$output = "<div class=\"dima-gmap-marker\" {$data}></div>";

	return $output;
}

add_shortcode( 'google_map_marker', 'dima_shortcode_google_map_marker' );


/**
 * Progress Bar
 * Progress Circle
 */

function dima_shortcode_progress_bar( $atts ) {
	extract( shortcode_atts( array(
		'id'      => '',
		'class'   => '',
		'style'   => '',
		'type'    => '',//style-1,style-2
		'heading' => '',
		'color'   => '',
		'striped' => '',//0,1
		'shadow'  => '',//0,1
		'percent' => ''
	), $atts, 'progress_bar' ) );

	$id      = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class   = ( $class != '' ) ? 'progress ' . esc_attr( $class ) : 'progress';
	$shadow  = ( $shadow != '' ) ? ' progress-shadow' : '';
	$striped = ( $striped != '' ) ? ' progress-striped active' : '';
	$style   = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$color   = ( $color != '' ) ? $color : '';

	$dec = str_replace( '%', '', $percent );
	if ( $type == "style-1" ) {
		$heading = ( $heading != '' ) ? '<h6 class="h-skill-bar">' . $heading . '</h6>' : '';

		$output = "<div class=\"dima-progressbar\"><div class=\"{$class}{$shadow}{$striped} \" data-color-val=\"{$color}\">"
		          . "<div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"{$dec}\" aria-valuemin=\"0\" aria-valuemax=\"100\">"
		          . "<div class=\"percent\">$percent"
		          . "<span></span>"
		          . "</div>"
		          . "</div>"
		          . "</div>"
		          . $heading
		          . "</div>";
	} else {
		$heading = ( $heading != '' ) ? "<h6 class=\"h-skill\">{$heading}<span class=\"percent-end\">{$percent}</span></h6>" : '';
		$output  = "<div class=\"dima-progressbar\"><div {$id} class=\"{$class}{$shadow}{$striped} \" data-color-val=\"{$color}\" {$style} >"
		           . "<div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"{$dec}\" aria-valuemin=\"0\" aria-valuemax=\"100\">"
		           . "</div>"
		           . "</div>"
		           . $heading
		           . "</div>";
	}

	return $output;
}

add_shortcode( 'progress_bar', 'dima_shortcode_progress_bar' );

function dima_shortcode_progress_circle( $atts ) {
	extract( shortcode_atts( array(
		'id'       => '',
		'class'    => '',
		'style'    => '',
		'heading'  => '',
		'color'    => '',
		'size'     => '',
		'bar_text' => '',
		'percent'  => ''
	), $atts, 'progress_circle' ) );

	$id      = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class   = ( $class != '' ) ? 'circular-bar ' . esc_attr( $class ) : 'circular-bar';
	$style   = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$heading = ( $heading != '' ) ? '<strong>' . $heading . '</strong>' : '';
	$color   = ( $color != '' ) ? $color : '#ff5733';
	$size    = ( $size != '' ) ? $size : '120';

	$dec = str_replace( '%', '', $percent );

	$output = "<div class=\"dima-progressbar text-center\"><div {$id} class=\"{$class}\" {$style}>"
	          . "<input type=\"text\" class=\"dial\" data-fgColor=\"{$color}\" data-width=\"{$size}\" data-height=\"{$size}\" value=\"{$dec}\">"
	          . "<div class=\"circular-bar-content\">"
	          . "<label></label>"
	          . "</div>"
	          . $heading
	          . "</div>"
	          . "</div>";

	return $output;
}

add_shortcode( 'progress_circle', 'dima_shortcode_progress_circle' );


/**
 * Code
 *
 * @param $atts
 * @param null $content
 *
 * @return string
 */
function dima_shortcode_code( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'style' => '',
	), $atts, 'code' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? esc_attr( $class ) : '';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';

	$output = "<pre {$id} class=\"{$class}\" {$style}><code>{$content}</code></pre>";

	return $output;
}

add_shortcode( 'code', 'dima_shortcode_code' );

/**
 * Gallery
 *   1 Gallery Item (image)
 *
 * @param $atts
 * @param null $content
 *
 * @return string
 */
function dima_shortcode_gallery( $atts, $content = null ) { // 1
	extract( shortcode_atts( array(
		'id'     => '',
		'class'  => '',
		'column' => '',
		'style'  => ''
	), $atts, 'dima_gallery' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'magnific-gallery ' . esc_attr( $class ) : 'magnific-gallery';
	$class .= ( $column != '' ) ? ' columns-' . esc_attr( $column ) : '';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';

	$output = "<div data-lightbox=\"gallery\" {$id} class=\"{$class}\" {$style}>" . do_shortcode( $content )
	          . "</div>";

	return $output;
}

add_shortcode( 'dima_gallery', 'dima_shortcode_gallery' );

function image_shortcode_image( $atts ) {
	extract( shortcode_atts( array(
		'id'              => '',
		'class'           => '',
		'style'           => '',
		'type'            => '',
		'width'           => '',
		'float'           => '',
		'src'             => '',
		'alt'             => '',
		'href'            => '',
		'shape'           => '',
		'title'           => '',
		'target'          => '',
		'popup_type'      => '',
		'popup_place'     => '',
		'popup_trigger'   => '',
		'popup_content'   => '',
		'hover'           => '',
		'lightbox'        => '',
		'is_gallert_item' => 'false',
		'apply_gray'      => 'false',

	), $atts, 'image' ) );

	$id         = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class      = ( $class != '' ) ? ' dima-img ' . esc_attr( $class ) : 'dima-img ';
	$width      = ( $width != '' ) ? ' columns-' . esc_attr( $width ) : '';
	$style      = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$shape      = ( $shape != '' ) ? ' ' . $shape : '';
	$float      = ( $float != '' ) ? esc_attr( $float ) : '';
	$src        = ( $src != '' ) ? $src : '';
	$alt        = ( $alt != '' ) ? 'alt="' . $alt . '"' : 'alt=""';
	$title      = ( $title != '' ) ? 'title="' . $title . '"' : '';
	$target     = ( $target == 'blank' ) ? 'target="_blank"' : '';
	$apply_gray = ( $apply_gray == 'true' ) ? ' apply-gray' : '';
	$lightbox   = ( $lightbox != '' ) ? 'data-lightbox=' . $lightbox : '';

	if ( is_numeric( $src ) ) {
		$poster_info = wp_get_attachment_image_src( $src, 'full' );
		$src         = $poster_info[0];
		$img_width   = 'width="' . $poster_info[1] . '"';
		$img_height  = 'height="' . $poster_info[2] . '"';
	} else {
		$poster_info = dima_helper::dima_get_attachment_info_by_url( $src );
		$img_width   = 'width="' . $poster_info[1] . '"';
		$img_height  = 'height="' . $poster_info[2] . '"';
	}

	$tooltip_attr = ( $popup_type != '' ) ? dima_tooltip_data( $popup_type, $popup_trigger, $popup_place, '', $popup_content ) : '';

	switch ( $float ) {
		case 'end' :
			$float = ' text-end';
			break;
		case 'start' :
			$float = ' text-start';
			break;
		default :
			$float = ' text-center';
	}

	if ( ! empty( $lightbox ) ) {
		wp_enqueue_script( 'magnific-js' );
		$href = ( $href == '' ) ? $src : $href;
	}
	if ( $is_gallert_item == 'true' ) {
		$lightbox = '';
		$class    .= ' dima-gallery-item';
	}
	if ( ! empty( $href ) ) {
		if ( ! empty( $hover ) ) {

			if ( $hover == 'zoom-out' ) {
				$output = "<div class=\"effect-roxy\"><a {$lightbox} {$id} class=\"{$class}{$float}\" {$style} href=\"{$href}\" {$title} {$target} {$tooltip_attr}><img src=\"{$src}\" {$alt} $img_width $img_height></a></div>";
			} elseif ( $hover == 'zoom-in' ) {
				$output = "<div class=\"effect-julia\"><a {$lightbox} {$id} class=\"{$class}{$float}\" {$style} href=\"{$href}\" {$title} {$target} {$tooltip_attr}><img src=\"{$src}\" {$alt} $img_width $img_height></a></div>";
			} elseif ( $hover == 'effect-opacity' ) {
				$output = "<div class=\"gray-opacity\"><a {$lightbox} {$id} class=\"{$class}{$float}\" {$style} href=\"{$href}\" {$title} {$target} {$tooltip_attr}><img src=\"{$src}\" {$alt} $img_width $img_height></a></div>";
			} elseif ( $hover == 'none' ) {
				$output = "<a {$lightbox} {$id} class=\"{$class}\" {$style} href=\"{$href}\" {$title} {$target} {$tooltip_attr}><img src=\"{$src}\" {$alt} $img_width $img_height></a>";
			}

		} else {
			$output = "<a {$lightbox} {$id} class=\"overlay {$class}{$shape}\" {$style} href=\"{$href}\" {$title} {$target} {$tooltip_attr}><img src=\"{$src}\" {$alt} $img_width $img_height></a>";
		}
	} else {
		$output = "<img $img_width $img_height {$id} class=\"{$class}\" src=\"{$src}\" {$tooltip_attr} {$style} {$alt}>";
	}

	return "<div class=\"column-item overflow-hidden{$float}{$width}{$apply_gray}{$shape}\">" . $output . "</div>";
}

add_shortcode( 'image', 'image_shortcode_image' );

/**
 * Link Popovers and Tooltips
 *
 * @param $atts
 * @param null $content
 *
 * @return string
 */
function dima_shortcode_dima_link( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'            => '',
		'class'         => '',
		'style'         => '',
		'href'          => '',
		'title'         => '',
		'target'        => '',
		'popup_type'    => '',
		'popup_place'   => '',
		'popup_trigger' => '',
		'popup_content' => '',
		'lightbox'      => '',
	), $atts, 'link' ) );

	$id       = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class    = ( $class != '' ) ? ' ' . esc_attr( $class ) : '';
	$style    = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$title    = ( $title != '' ) ? 'title="' . $title . '"' : '';
	$target   = ( $target == 'blank' ) ? 'target="_blank"' : '';
	$lightbox = ( $lightbox != '' ) ? 'data-lightbox=' . $lightbox : '';

	$tooltip_attr = ( $popup_type != '' ) ? dima_tooltip_data( $popup_type, $popup_trigger, $popup_place, '', $popup_content ) : '';

	if ( ! empty( $lightbox ) ) {
		wp_enqueue_script( 'magnific-js' );
		$href = ( $href == '' ) ? $src : $href;
	}

	$output = "<a {$lightbox} {$id} class=\"{$class}\" href=\"{$href}\" {$target} {$tooltip_attr} {$title} {$style}>" . do_shortcode( $content ) . "</a>";

	return $output;
}

add_shortcode( 'link', 'dima_shortcode_dima_link' );


/**
 * Button
 */
/**
 * Button
 *
 * @param $atts
 *
 * @return string
 */
function dima_shortcode_button( $atts ) {
	extract( shortcode_atts( array(
		'id'               => '',
		'class'            => '',
		'style'            => '',
		'type'             => '',
		'direction'        => '',
		'color_class'      => '',
		'size'             => '',
		'float'            => '',
		'block'            => '',
		'shape'            => '',
		'icon'             => '',
		'href'             => '',
		'disabled'         => '',
		'title'            => '',
		'text'             => '',
		'target'           => '',
		'popup_type'       => '',
		'popup_place'      => '',
		'popup_trigger'    => '',
		'popup_content'    => '',
		'lightbox'         => '',
		'icon_fontawesome' => '',
	), $atts, 'button' ) );

	$id               = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class            = ( $class != '' ) ? ' button ' . esc_attr( $class ) : 'dima-button ';
	$class            .= ( $color_class != '' ) ? '' . esc_attr( $color_class ) . ' ' : '';
	$style            = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$type             = ( $type != '' ) ? $type : 'fill';
	$direction        = ( $direction != '' ) ? $direction : 'down';
	$size             = ( $size != '' ) ? ' dima-btn-' . $size : ' dima-btn-small';
	$lightbox         = ( $lightbox != '' ) ? 'data-lightbox=' . $lightbox : '';
	$icon             = ( $icon != '' ) ? '<i class="' . $icon . '"></i>' : '';
	$icon_fontawesome = ( $icon_fontawesome != '' ) ? '<i class="' . $icon_fontawesome . '"></i>' : '';
	$icon             = ( $icon == '' ) ? $icon_fontawesome : $icon;
	$icon_class       = ( $icon != '' ) ? ' icon' : '';
	if ( ! empty( $lightbox ) ) {
		wp_enqueue_script( 'magnific-js' );
	}

	switch ( $float ) {
		case 'end' :
			$float = ' float-end';
			break;
		case 'start' :
			$float = ' float-start';
			break;
		case 'center' :
			$float = ' float-center';
			break;
		default :
			$float = '';
	}

	$block        = ( $block == 'true' ) ? ' button-block' : '';
	$disabled     = ( $disabled == 'true' ) ? ' disabled' : '';
	$shape        = ( $shape != '' ) ? ' ' . $shape . ' ' : '';
	$href         = ( $href != '' ) ? $href : '#';
	$title        = ( $title != '' ) ? 'title="' . $title . '"' : '';
	$target       = ( $target == 'blank' ) ? 'target="_blank"' : '';
	$tooltip_attr = ( $popup_type != '' ) ? dima_tooltip_data( $popup_type, $popup_trigger, $popup_place, '', $popup_content ) : '';

	$output = "<a {$lightbox} {$id} data-direction=\"{$direction}\" class=\"{$class}{$shape}{$type}{$size}{$block}{$disabled}{$float}{$icon_class}\" {$style} href=\"{$href}\" {$title} {$target} {$tooltip_attr} >{$icon}{$text}</a>";

	return $output;
}

add_shortcode( 'button', 'dima_shortcode_button' );


/**
 * Callout
 */
/**
 * @param $atts
 * @param null $content
 *
 * @return string
 */
function dima_shortcode_callout( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'              => '',
		'class'           => '',
		'style'           => '',
		'direction'       => '',
		'type'            => '',
		'title'           => '',
		'message'         => '',
		'parallax'        => false,
		'no_border'       => 'false',
		'dima_box_shadow' => 'false',
		'href'            => '',
		'bg_color'        => '',
		'bg_image'        => '',
		'text_color'      => '',
		'title_color'     => '',
		'cover'           => '',
		'full'            => '',
		'target'          => ''
	), $atts, 'callout' ) );

	$id              = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class           = ( $class != '' ) ? 'dima-callout ' . esc_attr( $class ) : 'dima-callout';
	$bg_color        = ( $bg_color != '' ) ? 'background-color:' . $bg_color . ';' : '';
	$title_color     = ( $title_color != '' ) ? 'style="color:' . $title_color . ';"' : '';
	$text_color      = ( $text_color != '' ) ? 'style="color:' . $text_color . ';"' : '';
	$style           = $bg_color;
	$style           = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$title           = ( $title != '' ) ? $title : '';
	$message         = ( $message != '' ) ? $message : 'Don\'t forget to enter in your text.';
	$href            = ( $href != '' ) ? $href : '#';
	$target          = ( $target == 'blank' ) ? 'target="_blank"' : '';
	$bg_image        = ( $bg_image != '' ) ? $bg_image : '';
	$cover           = ( $cover == 'true' ) ? '<div class="dima-section-cover"></div>' : '';
	$no_border       = ( $no_border == 'true' ) ? 'no-border ' : '';
	$dima_box_shadow = ( $dima_box_shadow == 'true' ) ? ' dima-box-shadow' : '';
	$class           .= ( $full == 'true' ) ? ' dima-full-callout' : '';
	$bg              = '';

	if ( is_numeric( $bg_image ) ) {
		$bg_image_info = wp_get_attachment_image_src( $bg_image, 'full' );
		$bg_image      = $bg_image_info[0];
	}

	switch ( $direction ) {
		case 'center' :
			$direction = ' text-center';
			break;
		case 'end' :
			$direction = ' text-end';
			break;
		default :
			$direction = ' text-start';
	}
	if ( $bg_image != '' ) {
		if ( $parallax == 'parallax' ) {
			$bg = "$cover"
			      . '<div class="background-image-hide background-cover parallax-background" data-bg-image="' . $bg_image . '">'
			      . '</div>';
		} elseif ( $parallax == 'fixed_parallax' ) {
			$bg = "$cover"
			      . '<div class="background-image-hide background-cover fixed-parallax" data-bg-image="' . $bg_image . '">'
			      . '</div>';

		} else {
			$bg = "$cover"
			      . '<div class="background-image-hide background-cover" data-bg-image="' . $bg_image . '">'
			      . '</div>';
		}
	}
	if ( ! empty( $title ) ) {
		$title = "<h3 class=\"h-callout\" {$title_color}>{$title}</h3>";
	}

	switch ( $type ) {
		case 'style_two' :
			$output = "<div {$id} class=\"{$no_border}{$class}{$direction}{$dima_box_shadow}\" {$style}>"
			          . $bg
			          . "<div class=\"dima-callout-clm1\">"
			          . $title
			          . "<p class=\"p-callout\" {$text_color}>{$message}</p>"
			          . "</div>"
			          . "<div class=\"dima-callout-clm2 text-end\">"
			          . do_shortcode( $content )
			          . '</div></div>';
			break;
		case 'style_three' :
			$output = "<a href=\"{$href}\" {$target}>"
			          . "<div {$id} class=\"topaz-hover hover-callout {$no_border}{$class}{$direction}{$dima_box_shadow}\" {$style}>"
			          . $bg
			          . $title
			          . "<p class=\"p-callout\" {$text_color}>{$message}</p>"
			          . '</div></a>';
			break;
		default :
			$output = "<div {$id} class=\"{$no_border}{$class}{$direction}{$dima_box_shadow}\" {$style}>"
			          . $bg
			          . $title
			          . "<p class=\"p-callout\" {$text_color}>{$message}</p>"
			          . do_shortcode( $content )
			          . '</div>';

	};

	return $output;
}

add_shortcode( 'callout', 'dima_shortcode_callout' );


/**
 * Dima Icon
 * Font awesome
 */

function dima_shortcode_icon( $atts ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'style' => '',
		'href'  => '',
		'size'  => '',
		'type'  => '',
		'shape' => '',//square,circle
		'icon'  => ''
	), $atts, 'icon' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? esc_attr( $class ) : '';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$href  = ( $href != '' ) ? $href : '';
	$shape = ( $shape != '' ) ? 'box-' . esc_attr( $shape ) : 'box-circle';
	$size  = ( $size != '' ) ? ' icon-box-' . $size : ' icon-box-medium';
	$icon  = ( $icon != '' ) ? $icon : '';
	$space = ' ';

	if ( $type == "dima-icon" ) {
		$output = "<div class=\"box-square {$class}{$space}{$shape}\" {$style} >"
		          . "<header>"
		          . "<a href=\"$href\"><i {$id} class=\"{$icon}{$size}\" ><span class=\"topaz-hover\"></span></i></a>"
		          . "</header>"
		          . "</div>";
	} else {
		if ( ! empty( $href ) ) {
			$output = "<a href=\"$href\"><i {$id} class=\"{$class}{$space}{$icon}\" {$style}></a></i>";
		} else {
			$output = "<i {$id} class=\"{$class}{$space}{$icon}\" {$style}></i>";
		}
	}

	return $output;
}

add_shortcode( 'icon', 'dima_shortcode_icon' );

/**
 * Inline Icons
 *   1 Inline Icon
 */

function dima_shortcode_inline_icons( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'     => '',
		'class'  => '',
		'size'   => '',//big,medium,small
		'circle' => '',//0,1
		'float'  => '',//0,1
		'style'  => ''
	), $atts, 'inline_icons' ) );

	$id     = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class  = ( $class != '' ) ? 'social-media ' . esc_attr( $class ) : 'social-media';
	$class  .= ( $float == '' ) ? '' : ' ' . $float;
	$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$size   = ( $size != '' ) ? ' social-' . esc_attr( $size ) : ' social-medium';
	$circle = ( $circle == true ) ? " circle-social" : '';

	$output = "<div {$id} class=\"{$class}{$size}{$circle}\" {$style}><ul class=\"inline clearfix\" >" . do_shortcode( $content ) . "</ul></div>";

	return $output;
}

add_shortcode( 'inline_icons', 'dima_shortcode_inline_icons' );

function dima_shortcode_inline_item_icon( $atts ) {
	extract( shortcode_atts( array(
		'id'               => '',
		'class'            => '',
		'style'            => '',
		'href'             => '',
		'title'            => '',
		'icon'             => '',
		'target'           => '',
		'icon_fontawesome' => '',
	), $atts, 'inline_item_icon' ) );


	$tooltip_attr = dima_tooltip_data( 'tooltip', 'hover', 'bottom' );

	$id               = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class            = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
	$style            = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$href             = ( $href != '' ) ? $href : '';
	$title            = ( $title != '' ) ? $title : '';
	$icon             = ( $icon != '' ) ? '<i class="' . $icon . '"></i>' : '';
	$icon_fontawesome = ( $icon_fontawesome != '' ) ? '<i class="' . $icon_fontawesome . '"></i>' : '';
	$icon             = ( $icon == '' ) ? $icon_fontawesome : $icon;
	$target           = ( $target == 'blank' ) ? 'target="_blank"' : '';

	$output = "<li {$id} {$class} {$style} ><a href=\"{$href}\" {$tooltip_attr} target=\"{$target}\" title=\"{$title}\">{$icon}</a></li>";

	return $output;
}

add_shortcode( 'inline_item_icon', 'dima_shortcode_inline_item_icon' );


/**
 * List
 * 1 List Item
 */
function dima_shortcode_list( $atts, $content = null ) { // 1
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'type'  => '',
		'style' => ''
	), $atts, 'list' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'list-style ' . esc_attr( $class ) : 'list-style';
	$type  = ( $type != '' ) ? ' ' . esc_attr( $type ) : '';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';

	$output = "<ul {$id} class=\"{$class}{$type}\" {$style}>" . do_shortcode( $content ) . "</ul>";

	return $output;
}

add_shortcode( 'list', 'dima_shortcode_list' );

function dima_shortcode_list_item( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'style' => '',
	), $atts, 'list_item' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';

	$output = "<li {$id} {$class} {$style}>" . do_shortcode( $content ) . "</li>";

	return $output;
}

add_shortcode( 'list_item', 'dima_shortcode_list_item' );


/**
 * Icon List
 *   1 Icon List Item
 */

function dima_shortcode_icon_list( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'style' => ''
	), $atts, 'icon_list' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'icon-list ' . esc_attr( $class ) : 'icon-list';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';

	$output = "<ul {$id} class=\"{$class}\" {$style}>" . do_shortcode( $content ) . "</ul>";

	return $output;
}

add_shortcode( 'icon_list', 'dima_shortcode_icon_list' );

function dima_shortcode_icon_list_item( $atts, $content = null ) { // 2
	extract( shortcode_atts( array(
		'id'               => '',
		'class'            => '',
		'style'            => '',
		'icon'             => '',
		'icon_fontawesome' => '',
	), $atts, 'icon_list_item' ) );

	$id               = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class            = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
	$style            = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$icon             = ( $icon != '' ) ? $icon : '';
	$icon_fontawesome = ( $icon_fontawesome != '' ) ? $icon_fontawesome : '';
	$icon             = ( $icon == '' ) ? $icon_fontawesome : $icon;

	if ( ! empty( $icon ) ) {
		$icon = "<i class=\"{$icon}\"></i>";
	} else {
		$icon = "";
	}
	$output = "<li {$id} {$class} {$style}>{$icon}" . do_shortcode( $content ) . "</li>";

	return $output;
}

add_shortcode( 'icon_list_item', 'dima_shortcode_icon_list_item' );

/**
 * Video
 *   1 Embed Video
 */

function dima_shortcode_video_player( $atts ) {
	extract( shortcode_atts( array(
		'id'            => '',
		'class'         => '',
		'style'         => '',
		'type'          => '',
		'm4v'           => '',
		'ogv'           => '',
		'poster'        => '',
		'preload'       => '',
		'hide_controls' => '',
		'autoplay'      => '',
		'loop'          => '',
		'muted'         => '',
		'boxed'         => ''
	), $atts, 'dima_video_player' ) );

	$id            = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class         = ( $class != '' ) ? 'dima-video player ' . esc_attr( $class ) : 'dima-video player';
	$style         = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$type          = '';
	$m4v           = ( $m4v != '' ) ? '<source src="' . $m4v . '" type="video/mp4">' : '';
	$ogv           = ( $ogv != '' ) ? '<source src="' . $ogv . '" type="video/ogg">' : '';
	$poster        = ( $poster != '' ) ? $poster : '';
	$preload       = ( $preload != '' ) ? ' preload="' . $preload . '"' : ' preload="none"';
	$hide_controls = ( $hide_controls == 'true' ) ? ' hide-controls' : '';
	$autoplay      = ( $autoplay == 'true' ) ? ' autoplay' : '';
	$loop          = ( $loop == 'true' ) ? ' loop' : '';
	$muted         = ( $muted == 'true' ) ? ' muted' : '';
	$boxed         = ( $boxed == 'true' ) ? ' box' : '';

	if ( is_numeric( $poster ) ) {
		$poster_info = wp_get_attachment_image_src( $poster, 'full' );
		$poster      = $poster_info[0];
	}

	$poster_attr = ( $poster != '' ) ? ' poster="' . $poster . '"' : '';

	wp_enqueue_script( 'mediaelement-js' );
	wp_enqueue_style( 'mediaelement-css' );

	$data = dima_creat_data_attributes( 'audio-video' );

	$output = "<div {$id} class=\"{$class}{$hide_controls}{$boxed}\" {$data} {$style}>"
	          . "<div class=\"dima-video-wrapper dima-self-hosted{$type}\">"
	          . "<video class=\" audio-video\"{$poster_attr}{$preload}{$autoplay}{$loop}{$muted}>"
	          . $m4v
	          . $ogv
	          . '</video>'
	          . '</div>'
	          . '</div>';

	return $output;
}

add_shortcode( 'dima_video_player', 'dima_shortcode_video_player' );

function dima_shortcode_embed_video( $atts, $content = null ) { // 2
	extract( shortcode_atts( array(
		'id'     => '',
		'class'  => '',
		'style'  => '',
		'poster' => '',
		'boxed'  => ''
	), $atts, 'dima_embed_video' ) );

	$id          = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class       = ( $class != '' ) ? 'dima-video embed ' . esc_attr( $class ) : 'dima-video embed';
	$style       = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$boxed       = ( $boxed != 'true' ) ? '' : ' box';
	$poster      = ( $poster != '' ) ? $poster : '';
	$oembed_size = dima_get_dummy_size( $content );

	static $count = 0;

	$count ++;
	if ( ! empty( $poster ) ) {
		$output = "<div class='video-overlay' data-bg=\"{$poster}\">"
		          . "<div class='video-overlay-hover'>"
		          . "<a href='#' class='video-play-button'></a>"
		          . "</div>"
		          . "</div>"
		          . "<div {$id}  class=\"{$class}{$boxed}\" {$style}><div class=\"dima-video-wrapper\" style=\"padding-top: {$oembed_size["dummy"]}%\">{$content}</div>"
		          . "</div>";
	} else {
		$output = "<div {$id}  class=\"{$class}{$boxed}\" {$style}><div class=\"dima-video-wrapper\" style=\"padding-top: {$oembed_size["dummy"]}%\">{$content}</div>"
		          . "</div>";
	}

	return $output;
}

add_shortcode( 'dima_embed_video', 'dima_shortcode_embed_video' );


/**
 * 1. Accordion.
 *   2. Accordion item.
 */

function dima_shortcode_accordion( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'        => '',
		'class'     => '',
		'type'      => '',
		'separated' => '',
		'model'     => '',
		'circle'    => '',
		'style'     => ''
	), $atts, 'accordion' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'dima-accordion ' . esc_attr( $class ) : 'dima-accordion';
	$class .= ( $type == 'plus' ) ? ' dima-acc-plus' : ' dima-acc-arrow';
	$model = ( $model == '' ) ? '' : $model;
	$class .= ( $circle == 'true' ) ? ' acc-circle' : '';
	if ( $model == 'default' ) {
		$class .= ( $separated == 'true' ) ? ' dima-acc-separated' : ' dima-acc-sample';
	}

	switch ( $model ) {
		case 'line':
			$class .= ' dima-acc-clear';
			break;
		case 'janobi':
			$class .= ' dima-acc-janobi';
			break;
		case 'border':
			$class .= ' no-acc-border dima-acc-separated';
			break;
	}
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';

	$output = "<ul {$id} class=\"{$class}\" {$style}>" . do_shortcode( $content ) . "</ul>";

	return $output;
}

add_shortcode( 'accordion', 'dima_shortcode_accordion' );


function dima_shortcode_accordion_item( $atts, $content = null ) { // 2
	extract( shortcode_atts( array(
		'id'        => '',
		'class'     => '',
		'style'     => '',
		'parent_id' => '',
		'title'     => '',
		'open'      => ''
	), $atts, 'accordion_item' ) );

	$id        = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class     = ( $class != '' ) ? 'panel dima-accordion-group ' . esc_attr( $class ) : 'panel dima-accordion-group';
	$style     = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$parent_id = ( $parent_id != '' ) ? 'data-parent="#' . $parent_id . '"' : '';
	$title     = ( $title != '' ) ? $title : 'Make Sure to Set a Title';
	$open      = ( $open == 'true' ) ? 'collapse in' : 'collapse';

	static $count = 0;
	$count ++;

	if ( $open == 'collapse in' ) {

		$output = "<li {$id} class=\"{$class}\" {$style}>"
		          . '<div class="dima-accordion-header">'
		          . "<a class=\"dima-accordion-toggle\" data-toggle=\"collapse\" {$parent_id} href=\"#collapse-{$count}\">{$title}</a>"
		          . '</div>'
		          . "<div id=\"collapse-{$count}\" class=\"dima-accordion-content {$open}\">"
		          . '<div class="dima-accordion-inner">'
		          . do_shortcode( $content )
		          . '</div>'
		          . '</div>'
		          . '</li>';

	} else {

		$output = "<li {$id} class=\"{$class}\" {$style}>"
		          . '<div class="dima-accordion-header">'
		          . "<a class=\"dima-accordion-toggle collapsed\" data-toggle=\"collapse\" {$parent_id} href=\"#collapse-{$count}\">{$title}</a>"
		          . '</div>'
		          . "<div id=\"collapse-{$count}\" class=\"dima-accordion-content {$open}\">"
		          . '<div class="dima-accordion-inner">'
		          . do_shortcode( $content )
		          . '</div>'
		          . '</div>'
		          . '</li>';

	}

	return $output;
}

add_shortcode( 'accordion_item', 'dima_shortcode_accordion_item' );

/**
 * Tab nav
 *   1 Tab nav item
 *   2 Tabs
 *   3 Tab
 */

function dima_shortcode_tab_nav( $atts, $content = null ) { // 1
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'style' => '',
		'type'  => '',
		'model' => '',
		'float' => ''
	), $atts, 'tab_nav' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'dima-tabs ' . esc_attr( $class ) : 'dima-tabs ';
	$model = ( $model != '' ) ? $model : '';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$type  = ( $type != '' ) ? ' ' . $type : '';
	$float = ( $float != '' ) ? $float : ' top';

	switch ( $model ) {
		case 'line':
			$class .= " dima-tab-line-style";
			break;
		default:
			$class .= " dima-tab-style";
			break;
	}
	switch ( $float ) {
		case 'end':
			$float = " float-end";
			break;
		case 'start':
			$float = " float-start";
			break;

		default:
			$float = " top";
			break;
	}
	$output = "<div {$id} class=\"{$class}{$type}\" {$style}>"
	          . "<ul class=\"dima-tab-nav{$float}\">" . do_shortcode( $content ) . "</ul>"
	          . "";

	return $output;
}

add_shortcode( 'tab_nav', 'dima_shortcode_tab_nav' );


function dima_shortcode_tab_nav_item( $atts ) {
	extract( shortcode_atts( array(
		'id'               => '',
		'class'            => '',
		'style'            => '',
		'icon'             => '',
		'icon_fontawesome' => '',
		'title'            => '',
		'active'           => ''
	), $atts, 'tab_nav_item' ) );

	$id               = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class            = ( $class != '' ) ? 'tab ' . esc_attr( $class ) : 'tab';
	$style            = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$title            = ( $title != '' ) ? $title : 'Title Here';
	$active           = ( $active == 'true' ) ? ' active' : '';
	$icon             = ( $icon != '' ) ? '<i class="' . $icon . '"></i>' : '';
	$icon_fontawesome = ( $icon_fontawesome != '' ) ? '<i class="' . $icon_fontawesome . '"></i>' : '';
	$icon             = ( $icon == '' ) ? $icon_fontawesome : $icon;

	static $count = 0;
	$count ++;

	$output = "<li {$id} class=\"{$class}{$active}\" {$style}><a href=\"#tab-{$count}\" data-toggle=\"tab\">{$icon}{$title}</a></li>";

	return $output;
}

add_shortcode( 'tab_nav_item', 'dima_shortcode_tab_nav_item' );

function dima_shortcode_tabs( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'style' => ''
	), $atts, 'tabs' ) );

	$id     = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class  = ( $class != '' ) ? 'dima-tab-content ' . esc_attr( $class ) : 'dima-tab-content';
	$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$output = "<div {$id} class=\"{$class}\" {$style}>" . do_shortcode( $content ) . "</div></div>";

	return $output;
}

add_shortcode( 'tabs', 'dima_shortcode_tabs' );


function dima_shortcode_tab( $atts, $content = null ) { // 4
	extract( shortcode_atts( array(
		'class'  => '',
		'style'  => '',
		'active' => ''
	), $atts, 'tab' ) );

	$class  = ( $class != '' ) ? 'tab-pane fade in clearfix dima-tab_content ' . esc_attr( $class ) : 'tab-pane fade in clearfix dima-tab_content';
	$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$active = ( $active == 'true' ) ? ' fade in active' : '';

	static $count = 0;
	$count ++;

	$output = "<div id=\"tab-{$count}\" class=\"{$class}{$active}\" {$style}>" . do_shortcode( $content ) . "</div>";

	return $output;
}

add_shortcode( 'tab', 'dima_shortcode_tab' );


/**
 * OK Grids
 *   1 Container
 *   2 Row
 *   3 Column
 */
/**
 * @param $atts
 * @param null $content
 *
 * @return string
 */
function dima_shortcode_container( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'        => '',
		'class'     => '',
		'style'     => '',
		'no_margin' => '',
	), $atts, 'container' ) );

	$id        = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class     = ( esc_attr( $class ) ) ? 'container ' . esc_attr( $class ) : 'container';
	$style     = ( $style != '' ) ? 'style=' . $style : '';
	$no_margin = ( $no_margin == 'false' ) ? ' no-margin' : '';

	$output = "<div {$id} class=\"{$class}\" {$style}><div class=\"ok-row{$no_margin}\">" . do_shortcode( $content ) . "</div></div>";

	return $output;
}

add_shortcode( 'container', 'dima_shortcode_container' );


/*function dima_shortcode_content_row( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'     => '',
		'class'  => '',
		'style'  => '',
		'margin' => '',
	), $atts, 'row' ) );

	$id     = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class  = ( esc_attr( $class ) ) ? 'ok-row ' . esc_attr( $class ) : 'ok-row';
	$style  = ( $style != '' ) ? 'style=' . $style : '';
	$margin = ( $margin == 'false' ) ? ' no-margin' : '';

	$output = "<div {$id} class=\"{$class}{$margin}\" {$style}>" . do_shortcode( $content ) . "</div>";

	return $output;
}

add_shortcode( 'row', 'dima_shortcode_content_row' );*/

function dima_shortcode_content_columns( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'             => '',
		'class'          => '',
		'style'          => '',
		'xld'            => '',
		'ld'             => '',
		'md'             => '',
		'sd'             => '6',
		'xsd'            => '12',
		'visibility_xld' => '',
		'visibility_ld'  => '',
		'visibility_md'  => '',
		'visibility_sd'  => '',
		'visibility_xsd' => '',
		'offset_xld'     => '',
		'offset_ld'      => '',
		'offset_md'      => '',
		'offset_sd'      => '',
		'offset_xsd'     => '',
		'animation'      => '',
		'delay'          => '',
		'offset'         => '',
		'bg_image'       => '',
	), $atts, 'column' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( esc_attr( $class ) ) ? esc_attr( $class ) : '';
	$class .= ( esc_attr( $xld ) ) ? ' ok-xld-' . esc_attr( $xld ) : '';
	$class .= ( esc_attr( $ld ) ) ? ' ok-ld-' . esc_attr( $ld ) : '';
	$class .= ( esc_attr( $md ) ) ? ' ok-md-' . esc_attr( $md ) : '';
	$class .= ( esc_attr( $sd ) ) ? ' ok-sd-' . esc_attr( $sd ) : '';
	$class .= ( esc_attr( $xsd ) ) ? ' ok-xsd-' . esc_attr( $xsd ) : '';

	if ( $visibility_xld != '' ) {
		$visibility_xld = explode( ',', $visibility_xld );
		$class          .= ( esc_attr( $visibility_xld[0] ) != '' ) ? ' ' . esc_attr( $visibility_xld[0] ) . '-xld' : '';
	}
	if ( $visibility_ld != '' ) {
		$visibility_ld = explode( ',', $visibility_ld );
		$class         .= ( esc_attr( $visibility_ld[0] ) != '' ) ? ' ' . esc_attr( $visibility_ld[0] ) . '-ld' : '';
	}
	if ( $visibility_md != '' ) {
		$visibility_md = explode( ',', $visibility_md );
		$class         .= ( esc_attr( $visibility_md[0] ) != '' ) ? ' ' . esc_attr( $visibility_md[0] ) . '-md' : '';
	}
	if ( $visibility_sd != '' ) {
		$visibility_sd = explode( ',', $visibility_sd );
		$class         .= ( esc_attr( $visibility_sd[0] ) != '' ) ? ' ' . esc_attr( $visibility_sd[0] ) . '-sd' : '';
	}
	if ( $visibility_xsd != '' ) {
		$visibility_xsd = explode( ',', $visibility_xsd );
		$class          .= ( esc_attr( $visibility_xsd[0] ) != '' ) ? ' ' . esc_attr( $visibility_xsd[0] ) . '-xsd' : '';
	}

	$class     .= ( esc_attr( $offset_xld ) != '' ) ? ' ok-offset-xld-' . esc_attr( $offset_xld ) : '';
	$class     .= ( esc_attr( $offset_ld ) != '' ) ? ' ok-offset-ld-' . esc_attr( $offset_ld ) : '';
	$class     .= ( esc_attr( $offset_md ) != '' ) ? ' ok-offset-md-' . esc_attr( $offset_md ) : '';
	$style     = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$animation = ( $animation != '' ) ? 'data-animate=' . $animation . '' : '';
	$delay     = ( $delay != '' ) ? ' data-delay=' . $delay . '' : '';
	$offset    = ( $offset != '' ) ? ' data-offset=' . $offset . '' : '';
	$bg_image  = ( $bg_image != '' ) ? $bg_image : '';
	$bg_holder = '';
	if ( ! empty( $bg_image ) ) {
		$bg_holder = '<div class="background-image-holder">'
		             . '<img src="' . $bg_image . '" alt="">'
		             . '</div>';
		$class     .= ' set-parent-height';
	}
	$output = "<div {$id} class=\"{$class}\" {$style} {$animation}{$delay}{$offset}>"
	          . $bg_holder
	          . do_shortcode( $content )
	          . "</div>";


	return $output;
}

add_shortcode( 'column', 'dima_shortcode_content_columns' );

/**
 * Slider
 *   1 slide
 * Owl Slider
 *   1 Owl Slide
 */

function dima_shortcode_slider( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'               => '',
		'class'            => '',
		'style'            => '',
		'animation'        => '',
		'slide_show_speed' => '',
		'animation_speed'  => '',
		'slideshow'        => '',
		'random'           => '',
		'control_nav'      => '',
		'direction_nav'    => '',
		'thumbnails_num'   => '',//6-9
		'boxed'            => ''
	), $atts, 'slider' ) );

	wp_enqueue_script( 'dima-flexslider' );

	static $count = 0;
	$count ++;

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? esc_attr( $class ) : "dima-flexslider";
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$boxed = ( $boxed != 'true' ) ? '' : ' box';

	$js_data = array(
		'animation'      => ( $animation == 'fade' ) ? 'fade' : 'slide',
		'slideshowSpeed' => ( $slide_show_speed != '' ) ? $slide_show_speed : '7000',
		'slideSpeed'     => ( $animation_speed != '' ) ? $animation_speed : '600',
		'controlNav'     => ( $control_nav != 'true' ) ? $control_nav : 'true',
		'directionNav'   => ( $direction_nav == 'true' ),
		'slideshow'      => ( $slideshow == 'true' ),
		'random'         => ( $random == 'true' ),
	);
	if ( $control_nav === 'thumbnails' ) {
		$control_nav = ' slider-thumb';
	}

	if ( $thumbnails_num == '9' ) {
		$thumbnails_num = ' dima-nine-thumb';
	} else {
		$thumbnails_num = ' dima-six-thumb';
	}

	$data = dima_creat_data_attributes( 'slider', $js_data );

	$output = "<div  class=\"{$class}{$boxed}\">"
	          . "<div {$id} class=\"flexslider sample-slide small-control flexslider-{$count}{$control_nav}{$thumbnails_num}\" $data {$style}>"
	          . '<ul class="slides">'
	          . do_shortcode( $content )
	          . '</ul>'
	          . '</div>'
	          . '</div>';

	return $output;
}

add_shortcode( 'slider', 'dima_shortcode_slider' );

function dima_shortcode_slide( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'thumb' => '',
		'style' => ''
	), $atts, 'slide' ) );

	if ( is_numeric( $thumb ) ) {
		$thumb_info = wp_get_attachment_image_src( $thumb, 'dima-thumbnails-small' );
		$thumb      = $thumb_info[0];
	}

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'slide-item ' . esc_attr( $class ) : 'slide-item';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$thumb = ( $thumb != '' ) ? 'data-thumb="' . $thumb . '"' : '';

	$output = "<li {$thumb} {$id} class=\"{$class}\" {$style}>" . do_shortcode( $content ) . "</li>";

	return $output;
}

add_shortcode( 'slide', 'dima_shortcode_slide' );

function dima_shortcode_owl_slider( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'           => '',
		'class'        => '',
		'style'        => '',
		'pagination'   => '',
		'auto_play'    => '',
		'navigation'   => '',
		'inner'        => '',
		'loop'         => '',
		'mouse_wheel'  => '',
		'dark'         => '',
		'items'        => '',
		'items_phone'  => '',
		'items_tablet' => '',
		'items_margin' => '',
		'smartphone'   => '',
	), $atts, 'owl_slider' ) );

	static $count = 0;
	$count ++;
	wp_enqueue_script( 'dima-owl' );

	$id         = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class      = ( $class != '' ) ? esc_attr( $class ) : "owl-slider";
	$style      = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$dark       = ( $dark == '' ) ? 'true' : $dark;
	$smartphone = ( $smartphone != '' ) ? $smartphone : '';
	$class      .= ( $inner == '1' ) ? ' inner' : '';

	$js_data = array(
		'pagination'   => ( $pagination == 'true' ),
		'auto_play'    => ( $auto_play == 'true' ),
		'navigation'   => ( $navigation == '1' ),
		'loop'         => ( $loop == 'true' ),
		'mouse_wheel'  => ( $mouse_wheel == 'true' ),
		'items'        => ( $items == '' ) ? 1 : $items,
		'items_phone'  => ( $items_phone == '' ) ? 1 : $items_phone,
		'items_tablet' => ( $items_tablet == '' ) ? 1 : $items_tablet,
		'items_margin' => ( $items_margin == '' ) ? 0 : $items_margin,
		'is_rtl'       => is_rtl()
	);

	$data = dima_creat_data_attributes( 'owl_slider', $js_data );

	if ( $dark == "true" ) {
		$dark = " owl-darck";
	} else {
		$dark = "";
	}
	if ( empty( $smartphone ) ) {
		$output = "<div  class=\"{$class}\">"
		          . "<ul class=\"owl-carousel owl-theme owl-rtl{$dark}\" {$data} data-owl-namber=\"3\">"
		          . do_shortcode( $content )
		          . "</ul>"
		          . '</div>';
	} else {
		$devices_class = "flat-phone";
		switch ( $smartphone ) {
			case 'flat-tablet':
			case 'tablet':
				$devices_class = "tablet";
				break;
			case 'tablet-land':
			case 'flat-tablet-land':
				$devices_class = "tablet-land";
				break;
			case 'phone':
			case 'flat-phone':
				$devices_class = "phone";
				break;
			case 'phone-land':
			case 'flat-phone-land':
				$devices_class = "phone-land";
				break;
			case 'laptop':
				$devices_class = "laptop";
				break;
			case 'desktop':
				$devices_class = "desktop";
				break;
		}
		$path   = DIMA_SHORTCODES_TEMPLATE_URI;
		$space  = " ";
		$output = "<div {$id} class=\"dima-phone-template\" {$style} ><div class=\"dima-{$devices_class}-cont\"><img src=\"{$path}//framework//images//devices//{$smartphone}.png\" class=\"topaz-div-bg\" alt=\"\">"
		          . "<div class=\"device-content {$devices_class}{$space}{$class}\">"
		          . "<ul class=\"owl-carousel owl-theme owl-rtl{$dark}\" {$data} data-owl-namber=\"3\" >"
		          . do_shortcode( $content )
		          . "</ul>"
		          . '</div></div></div>';
	}

	return $output;
}

add_shortcode( 'owl_slider', 'dima_shortcode_owl_slider' );

function dima_shortcode_owl_slide( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'thumb' => '',
		'style' => ''
	), $atts, 'owl_slide' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'owl-item ' . esc_attr( $class ) : 'owl-item';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$thumb = ( $thumb != '' ) ? 'data-thumb="' . $thumb . '"' : '';

	$output = "<li {$thumb} {$id} class=\"{$class}\" {$style}>" . do_shortcode( $content ) . "</li>";

	return $output;
}

add_shortcode( 'owl_slide', 'dima_shortcode_owl_slide' );


/**
 * clients
 *   1 client
 */

function dima_shortcode_clients( $atts, $content = null ) { // 2
	extract( shortcode_atts( array(
		'id'      => '',
		'class'   => '',
		'columns' => '',//7,6,5,4,3
		'style'   => ''
	), $atts, 'clients' ) );

	$id      = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class   = ( $class != '' ) ? 'clients-wrapper grid ' . esc_attr( $class ) : 'clients-wrapper grid';
	$columns = ( $columns != '' ) ? '  client-clm-' . esc_attr( $columns ) : ' client-clm-6';
	$style   = ( $style != '' ) ? 'style="' . $style . '"' : '';

	$output = "<div {$id} class=\"{$class}{$columns}\" {$style}>"
	          . "<ul>" . do_shortcode( $content ) . "</ul>"
	          . "</div>";

	return $output;
}

add_shortcode( 'clients', 'dima_shortcode_clients' );

function dima_shortcode_client( $atts, $content = null ) { // 2
	extract( shortcode_atts( array(
		'id'     => '',
		'class'  => '',
		'href'   => '',
		'target' => '',
		'src'    => '',
		'alt'    => '',
		'style'  => ''
	), $atts, 'client' ) );

	$id     = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class  = ( $class != '' ) ? 'slide-item ' . esc_attr( $class ) : 'slide-item';
	$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$href   = ( $href != '' ) ? $href : '';
	$alt    = ( $alt != '' ) ? esc_attr( $alt ) : '';
	$src    = ( $src != '' ) ? $src : '';
	$target = ( $target == 'blank' ) ? 'target="_blank"' : '';

	if ( is_numeric( $src ) ) {
		$src_info = wp_get_attachment_image_src( $src, 'full' );
		$src      = $src_info[0];
	}

	if ( empty( $href ) ) {
		$output = "<li  {$id} class=\"{$class}\" {$style}><img src=\"{$src}\" alt=\"\"></li>";
	} else {
		$output = "<li  {$id} class=\"{$class}\" {$style}><a href=\"$href\" {$target}><img src=\"{$src}\" alt=\"{$alt}\"></a></li>";
	}

	return $output;
}

add_shortcode( 'client', 'dima_shortcode_client' );

function dima_shortcode_audio_player( $atts ) { // 1
	extract( shortcode_atts( array(
		'id'       => '',
		'class'    => '',
		'style'    => '',
		'mp3'      => '',
		'oga'      => '',
		'preload'  => '',
		'autoplay' => '',
		'loop'     => ''
	), $atts, 'dima_audio_player' ) );

	$id       = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class    = ( $class != '' ) ? 'dima-audio player ' . esc_attr( $class ) : 'dima-audio player';
	$style    = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$mp3      = ( $mp3 != '' ) ? '<source src="' . $mp3 . '" type="audio/mpeg">' : '';
	$oga      = ( $oga != '' ) ? '<source src="' . $oga . '" type="audio/ogg">' : '';
	$preload  = ( $preload != '' ) ? ' preload="' . $preload . '"' : ' preload="none"';
	$autoplay = ( $autoplay == 'true' ) ? ' autoplay' : '';
	$loop     = ( $loop == 'true' ) ? ' loop' : '';

	wp_enqueue_script( 'mediaelement-js' );
	wp_enqueue_style( 'mediaelement-css' );
	$data = dima_creat_data_attributes( 'audio-video' );

	$output = "<div {$id} class=\"{$class}{$autoplay}{$loop}\" {$data} {$style}>"
	          . "<audio class=\"audio-video\" {$preload} {$autoplay}{$loop}>"
	          . $mp3
	          . $oga
	          . '</audio>'
	          . '</div>';

	return $output;
}

add_shortcode( 'dima_audio_player', 'dima_shortcode_audio_player' );


function dima_shortcode_embed_audio( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'style' => ''
	), $atts, 'dima_embed_audio' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'dima-audio embed ' . esc_attr( $class ) : 'x-audio embed';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';

	$output = "<div {$id} class=\"{$class}\" {$style}>{$content}</div>";

	return $output;
}

add_shortcode( 'dima_embed_audio', 'dima_shortcode_embed_audio' );


/**
 * @param $atts
 * @param null $content
 *
 * @return string
 */
function dima_shortcode_pricing_table_column( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'           => '',
		'class'        => '',
		'style'        => '',
		'color_class'  => '',
		'featured'     => '',
		'shadow'       => '',
		'interval'     => '',
		'title'        => '',
		'href_callout' => '',
		'target'       => '',
		'currency'     => '',
		'price'        => '',
		'full_line'    => '',
		'type'         => '',//two,three,offers
	), $atts, 'pricing_table_column' ) );

	$id           = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class        = ( $class != '' ) ? ' ' . esc_attr( $class ) : '';
	$color_class  = ( $color_class != '' ) ? '' . esc_attr( $color_class ) . ' ' : '';
	$style        = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$shadow       = ( $shadow == 'true' ) ? ' box-shadow' : '';
	$full_line    = ( $full_line == 'true' ) ? ' full-line' : '';
	$interval     = ( $interval != '' ) ? '' . $interval : '';
	$type         = ( $type != '' ) ? $type : '';
	$title        = ( $title != '' ) ? $title : '';
	$currency     = ( $currency != '' ) ? $currency : '';
	$price        = ( $price != '' ) ? $price : '';
	$href_callout = ( $href_callout == '' ) ? '' : $href_callout;
	$target       = ( $target == 'blank' ) ? 'target="_blank"' : '';
	switch ( $type ) {
		case 'zibra':
			$type = " pricing-style-two";
			break;
		case 'callout':
			$type = " pricing-style-callout";
			break;
		case 'offers':
			$type = " dima-offers";
			break;

		default:
			$type = "";
			break;
	}
	switch ( $featured ) {
		case 'larg':
			$featured = " featured-larg";
			break;
		case 'true':
			$featured = " featured";
			break;

		default:
			$featured = "";
			break;
	}
	$_price = '<div class="dima-pricing-row  ' . $color_class . '"><span class="pricing"><span class="currency">' . $currency . '</span>' . $price . '</span><span class="interval">' . $interval . '</span></div>';

	$_price = ( $price != '' ) ? $_price : '';
	if ( $type != " dima-offers" ) {
		$output = "<div {$id} class=\"dima-pricing-col {$type}{$featured}{$shadow}\">"
		          . '<div class="header ' . $color_class . '">'
		          . '<h4 class="dima-table-title">' . $title . '</h4>'
		          . '</div>'
		          . '<div class="dima-pricing-col-info ' . $full_line . '">'
		          . $_price
		          . do_shortcode( $content )
		          . '</div>'
		          . '</div>';
	} else {
		$output = "<div {$id} class=\"dima-pricing-col {$type}{$featured}{$shadow}\">"
		          . '<div class="dima-pricing-col-info ' . $full_line . '">'
		          . do_shortcode( $content )
		          . '</div>'
		          . '</div>';
	}

	if ( ! empty( $href_callout ) && $type == ' pricing-style-callout' ) {
		$output = "<a href=\"{$href_callout}\" {$target}>" . $output . "</a>";

	}
	$output = "<div {$id} class=\"dima-pricing-table {$class}\" {$style}>" . $output . "</div>";

	return $output;


}

add_shortcode( 'pricing_table_column', 'dima_shortcode_pricing_table_column' );

/**
 * Iconbox
 *   Iconbox Header
 *   Iconbox Content
 */

function dima_shortcode_iconbox( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'     => '',
		'class'  => '',
		'style'  => '',
		'align'  => '',
		'href'   => '',
		'target' => '',
		'hover'  => '',
		'boxed'  => '',//no-box,
		'box_bg' => '',//no-box,
	), $atts, 'iconbox' ) );

	$id     = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class  = ( $class != '' ) ? 'dima-iconbox ' . esc_attr( $class ) : 'dima-iconbox';
	$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$hover  = ( $hover == 'false' || $boxed == '' ) ? '' : ' background-hover topaz-hover';
	$boxed  = ( $boxed == 'true' ) ? ' features-box' : ' no-box';
	$box_bg = ( $box_bg != '' ) ? $box_bg : '';
	$href   = ( $href == '' ) ? '' : $href;
	$target = ( $target == 'blank' ) ? 'target="_blank"' : '';

	if ( ! empty( $box_bg ) ) {
		$box_bg = "background-color:$box_bg;box-shadow: none;";
	}

	if ( ! empty( $box_bg ) || ! empty( $style ) ) {
		$style = "style=\"$box_bg$style\"";
	}

	switch ( $align ) {
		case 'end':
			$align = " text-end";
			$float = " features-end";
			break;
		case 'start':
			$align = " text-start";
			$float = " features-start";
			break;
		default:
			$align = " text-center";
			$float = " features-box";
			break;
	}
	if ( $href != '' ) {
		$output = "<a href='{$href}' {$target}><div {$id} class=\"{$class}{$hover}{$boxed}{$align}{$float}\" {$style}>"
		          . do_shortcode( $content )
		          . "</div></a>";

	} else {
		$output = "<div {$id} class=\"{$class}{$hover}{$boxed}{$align}{$float}\" {$style}>"
		          . do_shortcode( $content )
		          . "</div>";
	}

	return $output;
}

add_shortcode( 'iconbox', 'dima_shortcode_iconbox' );

function dima_shortcode_iconbox_header( $atts ) {
	extract( shortcode_atts( array(
		'id'               => '',
		'class'            => '',
		'style'            => '',
		'icon'             => '',
		'icon_fontawesome' => '',
		'image'            => '',
		'hover'            => '',
		'image_size'       => '',
		'alt'              => '',
		'size'             => '',
		'icon_bg'          => '',
		'icon_color'       => '',
		'shadow_color'     => '',
		'type'             => '',
	), $atts, 'iconbox_header' ) );

	$id               = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class            = ( $class != '' ) ? 'icon-box-header ' . esc_attr( $class ) . '"' : 'icon-box-header';
	$style            = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$icon             = ( $icon != '' ) ? $icon : '';
	$alt              = ( $alt != '' ) ? esc_attr( $alt ) : '';
	$icon_fontawesome = ( $icon_fontawesome != '' ) ? $icon_fontawesome : '';
	$type             = ( $type != '' ) ? ' box-' . $type : '';
	$line_hover       = ( $size != 'small' ) ? "<span class=\"topaz-hover\"></span>" : '';
	$hover            = ( $hover == 'false' ) ? '' : ' icon-box-hover';
	$size             = ( $size != '' ) ? ' icon-box-' . $size : ' icon-box-medium';
	$image_size       = ( $image_size != '' ) ? ' ' . $image_size : ' medium';
	$icon_bg          = ( $icon_bg != '' ) ? $icon_bg : '';
	$icon_color       = ( $icon_color != '' ) ? $icon_color : '';
	$shadow_color     = ( $shadow_color != '' ) ? $shadow_color : '';
	$image            = ( $image != '' ) ? $image : '';

	$style_bg    = '';
	$style_color = '';
	$icon_style  = '';

	if ( ! empty( $icon_bg ) ) {
		$style_bg = "background-color:$icon_bg;";
	}
	if ( ! empty( $shadow_color ) ) {
		$style_bg .= "box-shadow: 0 0 0 1px $shadow_color;";
	}

	if ( ! empty( $icon_color ) ) {
		$style_color = "color:$icon_color;";
	}

	if ( ! empty( $style_bg ) || ! empty( $style_color ) ) {
		$icon_style = "style=\"$style_bg$style_color\"";
	}

	if ( is_numeric( $image ) ) {
		$src_info   = wp_get_attachment_image_src( $image, 'full' );
		$image      = $src_info[0];
		$img_width  = 'width="' . $src_info[1] . '"';
		$img_height = 'height="' . $src_info[2] . '"';
	} else {
		$poster_info = dima_helper::dima_get_attachment_info_by_url( $image );
		$img_width   = 'width="' . $poster_info[1] . '"';
		$img_height  = 'height="' . $poster_info[2] . '"';
	}


	$icon = ( $icon == '' ) ? $icon_fontawesome : $icon;

	//apply-gray
	if ( ! empty( $image ) ) {
		$icon = '<div class="image-cropper thumb ' . $image_size . ' ' . $type . ' " ' . $icon_style . '>'
		        . '<img class="background-image" src="' . $image . '" ' . $img_width . ' ' . $img_height . ' alt="' . $alt . '">'
		        . '</div>';

	} elseif ( ! empty( $type ) ) {
		$icon = '<i ' . $icon_style . ' class="' . $icon . '' . $type . ' ' . $size . ' ' . $hover . '">' . $line_hover . '</i>';
	} else {
		$icon = '<i ' . $icon_style . ' class="' . $icon . '' . $type . ' ' . $size . '' . $hover . '"></i>';
	}


	$output = '<header ' . $id . ' class="' . $class . '" ' . $style . '>'
	          . $icon
	          . '</header>';

	return $output;
}

add_shortcode( 'iconbox_header', 'dima_shortcode_iconbox_header' );

function dima_shortcode_iconbox_content( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'          => '',
		'class'       => '',
		'style'       => '',
		'title'       => '',
		'title_hover' => '',
		'title_color' => '',
	), $atts, 'iconbox_content' ) );

	$id          = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class       = ( $class != '' ) ? esc_attr( $class ) . ' ' : '';
	$style       = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$title       = ( $title != '' ) ? $title : '';
	$title_hover = ( $title_hover == 'false' ) ? ' no-title-hover' : '';
	$title_color = ( $title_color != '' ) ? 'style="color:' . $title_color . ';"' : '';

	$output = '<div ' . $id . ' class="' . $class . 'features-content" ' . $style . '>'
	          . '<h5 class="features-title' . $title_hover . '" ' . $title_color . '>' . $title . '</h5>';
	$output .= do_shortcode( shortcode_unautop( $content ) );
	$output .= '</div>';

	return $output;
}

add_shortcode( 'iconbox_content', 'dima_shortcode_iconbox_content' );

/**
 * TimeLine
 *   Process
 *   Date TimeLine
 */

function dima_shortcode_process( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'      => '',
		'class'   => '',
		'style'   => '',
		'float'   => '',
		'vh'      => '',
		'columns' => '',
		'type'    => '',//small,larg, mediam
	), $atts, 'process' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'dima-timeline-list ' . esc_attr( $class ) : 'dima-timeline-list';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$float = ( $float == 'end' ) ? ' timeline-end' : '';
	$type  = ( $type != '' ) ? ' ' . $type : '';
	$class .= ( $columns != '' ) ? ' ' . $columns : '';
	$class .= ( $vh != '' ) ? ' ' . $vh : '';

	$output = "<div {$id} class=\"{$class}{$float}{$type}\" {$style}>"
	          . do_shortcode( $content )
	          . "</div>";

	return $output;
}

add_shortcode( 'process', 'dima_shortcode_process' );

function dima_shortcode_date_timeline( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'style' => '',
	), $atts, 'date_timeline' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'dima-timeline clearfix dima-timeline-date ' . esc_attr( $class ) : 'dima-timeline clearfix dima-timeline-date';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';

	$output = "<div {$id} class=\"{$class}\" {$style}>"
	          . "<div class=\"h-line\"></div>"
	          . do_shortcode( $content )
	          . "</div>";

	return $output;
}

add_shortcode( 'date_timeline', 'dima_shortcode_date_timeline' );

function dima_shortcode_date_timeline_item( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'style' => '',
		'float' => '',
		'boxed' => '',
		'date'  => '',
	), $atts, 'date_timeline_item' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'dima-timeline clearfix dima-timeline-date ' . esc_attr( $class ) : 'dima-timeline clearfix dima-timeline-date';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$float = ( $float != '' ) ? 'timeline_element_' . $float : 'timeline_element_start';
	$date  = ( $date != '' ) ? $date : '';
	$boxed = ( $boxed == 'true' ) ? ' dima-no-box ' : '';

	$output = '<div ' . $id . ' class="' . $class . ' ' . $float . ' " ' . $style . '>'
	          . '<div class="timeline_element-content">'
	          . '<div class="post box' . $boxed . '">'
	          . '' . do_shortcode( $content ) . ''
	          . '</div>'
	          . '<div class="date">'
	          . '<h5>' . $date . '</h5>'
	          . '</div>'
	          . '</div>'
	          . '</div>';

	return $output;
}

add_shortcode( 'date_timeline_item', 'dima_shortcode_date_timeline_item' );

/**
 * Menu
 */
/**
 * @param $atts
 * @param null $content
 *
 * @return string
 */
function dima_shortcode_product_menu( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'       => '',
		'class'    => '',
		'style'    => '',
		'bg_image' => '',
		'bg_color' => '',
		'boxed'    => 'true',
		'title'    => 'Add Title Here',
	), $atts, 'product_menu' ) );

	$id       = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class    = ( $class != '' ) ? 'last-menu box-with-marge ' . esc_attr( $class ) : 'last-menu box-with-marge';
	$bg_color = ( $bg_color != '' ) ? 'background-color:' . $bg_color . ';' : '';
	$style    = $style . $bg_color;
	$style    = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$title    = ( $title != '' ) ? $title : '';
	$boxed    = ( $boxed == 'true' ) ? ' box' : ' no-box';

	$class    .= $boxed;
	$bg_image = ( $bg_image != '' ) ? $bg_image : '';

	if ( is_numeric( $bg_image ) ) {
		$bg_image_info = wp_get_attachment_image_src( $bg_image, 'full' );
		$bg_image      = "data-element-bg=\"{$bg_image_info[0]}\"";
	}

	$output = "<div {$id} class=\"{$class}\" {$style} {$bg_image}>"
	          . "<h3 class=\"box-titel\">{$title}</h3>"
	          . "<ul class=\"with-border dashed-border\">"
	          . do_shortcode( $content )
	          . "</ul>"
	          . "</div>";

	return $output;
}

add_shortcode( 'product_menu', 'dima_shortcode_product_menu' );

function dima_shortcode_product_menu_item( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'           => '',
		'class'        => '',
		'style'        => '',
		'price'        => '',
		'image'        => '',
		'title'        => 'Title Here',
		'notification' => '',
		'href'         => '',
		'target'       => '',
	), $atts, 'product_menu_item' ) );

	$id           = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class        = ( $class != '' ) ? 'dima-timeline clearfix dima-timeline-date ' . esc_attr( $class ) : 'dima-timeline clearfix dima-timeline-date';
	$style        = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$target       = ( $target == 'blank' ) ? 'target="_blank"' : '';
	$title        = ( $title == '' ) ? '' : $title;
	$href         = ( $href == '' ) ? '#' : $href;
	$price        = ( $price == '' ) ? '' : '<span class="menu-price" >' . $price . '</span >';
	$notification = ( $notification == '' ) ? '' : '<span class="label">' . $notification . '</span >';
	$image        = ( $image != '' ) ? $image : '';

	if ( is_numeric( $image ) ) {
		$image_info = wp_get_attachment_image_src( $image, 'dima-thumbnails-small' );
		$image      = '<img class="attachment-menu" src="' . $image_info[0] . '" alt="' . $title . '">';
	} else {
		$image = '<img class="attachment-menu" src="' . $image . '" alt="' . $title . '">';
	}

	$header = "<h5>"
	          . "<a href = \"{$href}\" {$target}>{$title}</a >"
	          . $image
	          . $notification
	          . $price
	          . "</h5>";
	$output = ' <li ' . $id . ' class="' . $class . '"  ' . $style . ' > '
	          . $header
	          . do_shortcode( $content )
	          . '</li > ';

	return $output;
}

add_shortcode( 'product_menu_item', 'dima_shortcode_product_menu_item' );


/**
 * Post Author
 */

function dima_shortcode_author( $atts ) {
	extract( shortcode_atts( array(
		'id'        => '',
		'class'     => '',
		'style'     => '',
		'title'     => '',
		'author_id' => ''
	), $atts, 'author' ) );

	$id        = ( $id != '' ) ? 'id = "' . esc_attr( $id ) . '"' : '';
	$class     = ( $class != '' ) ? 'dima-author-box box clearfix ' . esc_attr( $class ) : 'dima-author-box box clearfix';
	$style     = ( $style != '' ) ? 'style = "' . $style . '"' : '';
	$title     = ( $title != '' ) ? $title : __( 'Author: ', 'dimashortcodes' );
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

add_shortcode( 'author', 'dima_shortcode_author' );


/**
 * Share
 */

function dima_shortcode_share_post( $atts ) {
	extract( shortcode_atts( array(
		'id'          => '',
		'class'       => '',
		'style'       => '',
		'float'       => 'center',
		'size'        => '',
		'circle'      => '',
		'facebook'    => '',
		'twitter'     => '',
		'google_plus' => '',
		'linkedin'    => '',
		'pinterest'   => '',
		'reddit'      => '',
		'email'       => ''
	), $atts, 'share' ) );

	$share_url        = urlencode( get_permalink() );
	$share_title      = urlencode( get_the_title() );
	$share_source     = urlencode( get_bloginfo( 'name' ) );
	$share_content    = urlencode( get_the_excerpt() );
	$share_image_info = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
	$share_image      = ( function_exists( 'dima_helper::dima_get_featured_image_url' ) ) ? urlencode( dima_helper::dima_get_featured_image_url() ) : urlencode( $share_image_info[0] );

	$tooltip_attr = dima_tooltip_data( 'tooltip', 'hover', 'bottom' );

	$id          = ( $id != '' ) ? 'id = "' . esc_attr( $id ) . '"' : '';
	$class       = ( $class != '' ) ? 'social-media ' . esc_attr( $class ) : 'social-media';
	$size        = ( $size != '' ) ? ' social-' . esc_attr( $size ) : ' social-medium';
	$circle      = ( $circle == true ) ? ' circle-social' : '';
	$style       = ( $style != '' ) ? 'style = "' . $style . '"' : '';
	$facebook    = ( $facebook == 'true' ) ? "<li><a href=\"#share\" {$tooltip_attr} title=\"" . __( 'Share on Facebook', 'dimashortcodes' ) . "\" onclick=\"window.open('http://www.facebook.com/sharer.php?u={$share_url}&amp;t={$share_title}', 'popupFacebook', 'width=650, height=270, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"fa fa-facebook\"></i></a></li>" : '';
	$twitter     = ( $twitter == 'true' ) ? "<li><a href=\"#share\" {$tooltip_attr} title=\"" . __( 'Share on Twitter', 'dimashortcodes' ) . "\" onclick=\"window.open('https://twitter.com/intent/tweet?text={$share_title}&amp;url={$share_url}', 'popupTwitter', 'width=500, height=370, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"fa fa-twitter\"></i></a></li>" : '';
	$google_plus = ( $google_plus == 'true' ) ? "<li><a href=\"#share\" {$tooltip_attr} title=\"" . __( 'Share on Google+', 'dimashortcodes' ) . "\" onclick=\"window.open('https://plus.google.com/share?url={$share_url}', 'popupGooglePlus', 'width=650, height=226, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"fa fa-google-plus\"></i></a></li>" : '';
	$linkedin    = ( $linkedin == 'true' ) ? "<li><a href=\"#share\" {$tooltip_attr} title=\"" . __( 'Share on LinkedIn', 'dimashortcodes' ) . "\" onclick=\"window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url={$share_url}&amp;title={$share_title}&amp;summary={$share_content}&amp;source={$share_source}', 'popupLinkedIn', 'width=610, height=480, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"fa fa-linkedin\"></i></a></li>" : '';
	$pinterest   = ( $pinterest == 'true' ) ? "<li><a href=\"#share\" {$tooltip_attr} title=\"" . __( 'Share on Pinterest', 'dimashortcodes' ) . "\" onclick=\"window.open('http://pinterest.com/pin/create/button/?url={$share_url}&amp;media={$share_image}&amp;description={$share_title}', 'popupPinterest', 'width=750, height=265, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"fa fa-pinterest\"></i></a></li>" : '';
	$reddit      = ( $reddit == 'true' ) ? "<li><a href=\"#share\" {$tooltip_attr} title=\"" . __( 'Share on Reddit', 'dimashortcodes' ) . "\" onclick=\"window.open('http://www.reddit.com/submit?url={$share_url}', 'popupReddit', 'width=875, height=450, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"fa fa-reddit\"></i></a></li>" : '';
	$email       = ( $email == 'true' ) ? "<li><a href=\"mailto:?subject=" . get_the_title() . "&amp;body=" . __( 'Hey, thought you might enjoy this! Check it out when you have a chance:', 'dimashortcodes' ) . " " . get_permalink() . "\" {$tooltip_attr} class=\"email\" title=\"" . __( 'Share via Email', 'dimashortcodes' ) . "\"><span><i class=\"fa fa-envelope\"></i></span></a>" : '';


	switch ( $float ) {
		case 'end' :
			$float = ' text-end';
			break;
		case 'start' :
			$float = ' text-start';
			break;
		case 'center' :
			$float = ' text-center';
			break;
		default :
			$float = '';

	}

	$output = "<div {$id} class=\"{$class}{$float}\" {$style}>"
	          . "<div class=\"social-media dima-social-post{$size}{$circle}\">"
	          . "<ul class=\"inline clearfix\">"
	          . $facebook . $twitter . $google_plus . $linkedin . $pinterest . $reddit . $email
	          . "</ul>"
	          . "</div>"
	          . "</div>";

	return $output;
}

add_shortcode( 'share', 'dima_shortcode_share_post' );

/**
 * Search
 */
function dima_shortcode_search( $atts ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'style' => ''
	), $atts, 'search' ) );

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'search-query ' . esc_attr( $class ) : 'search-query';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';

	$output = "<div {$id} class=\"{$class}\" {$style}>" . get_search_form( false ) . '</div>';

	return $output;
}

add_shortcode( 'search', 'dima_shortcode_search' );

/**
 * Counter
 */

function dima_shortcode_counter( $atts ) {
	extract( shortcode_atts( array(
		'id'               => '',
		'class'            => '',
		'style'            => '',
		'icon'             => '',
		'icon_fontawesome' => '',
		'num_color'        => '',
		'text_color'       => '',
		'icon_color'       => '',
		'num_start'        => '',
		'num_end'          => '',
		'num_speed'        => '',
		'num_before'       => '',
		'num_after'        => '',
		'border'           => '',
		'float'            => '',
		'text'             => ''
	), $atts, 'counter' ) );

	$id               = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class            = ( $class != '' ) ? 'countUp ' . esc_attr( $class ) : 'countUp ';
	$style            = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$num_before       = ( $num_before != '' ) ? $num_before : '';
	$num_after        = ( $num_after != '' ) ? $num_after : '';
	$class            .= ( $float != '' ) ? $float : '';
	$num_color        = ( $num_color != '' ) ? 'style="color: ' . $num_color . ';"' : '';
	$num_start        = ( $num_start != '' ) ? $num_start : 0;
	$num_end          = ( $num_end != '' ) ? $num_end : 0;
	$num_speed        = ( $num_speed != '' ) ? $num_speed : 1500;
	$text_color       = ( $text_color != '' ) ? 'style="color: ' . $text_color . ';"' : '';
	$icon_color       = ( $icon_color != '' ) ? 'style="color: ' . $icon_color . ';"' : '';
	$icon             = ( $icon != '' ) ? '<i ' . $icon_color . ' class="icon-count ' . $icon . '"></i>' : '';
	$icon_fontawesome = ( $icon_fontawesome != '' ) ? '<i ' . $icon_color . ' class="icon-count ' . $icon_fontawesome . '"></i>' : '';
	$icon             = ( $icon == '' ) ? $icon_fontawesome : $icon;

	$text       = ( $text != '' ) ? '<div class="text" ' . $text_color . '>' . $text . '</div>' : '';
	$icon_class = ( $icon != '' ) ? " with-icon" : '';
	$border     = ( $border == true ) ? " no-border" : '';

	$output = "<div {$id} class=\"{$class}{$icon_class}{$border}\" {$style}>"
	          . $icon
	          . "<div class=\"number\" {$num_color}>"
	          . "$num_before"
	          . "<span class=\"number-count\" data-from=\"{$num_start}\" data-to=\"{$num_end}\" data-speed=\"{$num_speed}\" data-refresh-interval=\"50\">{$num_start}</span>"
	          . "$num_after"
	          . $text
	          . '</div>'
	          . '</div>';

	return $output;
}

add_shortcode( 'counter', 'dima_shortcode_counter' );


/**
 * LABELS
 *
 * @param $atts
 * @param null $content
 *
 * @return string
 */
function dima_shortcode_labels( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'       => '',
		'class'    => '',
		'style'    => '',
		'bg_color' => '',
		'type'     => '',//success,default,warning,info,error,okab
		'text'     => 'Add Text Here',
	), $atts, 'product_menu' ) );

	$id       = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class    = ( $class != '' ) ? 'label  ' . esc_attr( $class ) : 'label ';
	$bg_color = ( $bg_color != '' ) ? 'background-color:' . $bg_color . ';' : '';
	$style    = $style . $bg_color;
	$style    = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$text     = ( $text != '' ) ? $text : '';
	$type     = ( $type != '' ) ? $type : '';

	if ( $type != '' )
		switch ( $type ) {
			case 'success':
				$type = 'dima-alert-success';
				break;
			case 'info':
				$type = 'dima-alert-info';
				break;
			case 'warning':
				$type = 'dima-alert-warning';
				break;
			case 'error':
				$type = 'dima-alert-error';
				break;
			case 'dima':
				$type = 'dima-alert-error';
				break;
			default:
				$type = '';
				break;
		}

	$class  .= $type;
	$output = "<span {$id} class=\"{$class}\" {$style}>"
	          . $text
	          . "</span>";

	return $output;
}

add_shortcode( 'labels', 'dima_shortcode_labels' );

/**
 * Text
 *
 * @param null $content
 *
 * @return string
 */
function dima_shortcode_text( $atts, $content = null ) {

	$output = do_shortcode( wpautop( $content ) );

	return $output;

}

add_shortcode( 'text', 'dima_shortcode_text' );


function dima_shortcode_custom_heading( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'               => '',
		'class'            => '',
		'style'            => '',
		'float'            => '',
		'level'            => '',
		'icon'             => '',
		'icon_fontawesome' => '',
	), $atts, 'custom_heading' ) );

	$id               = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class            = ( $class != '' ) ? 'dima-custom-heading ' . esc_attr( $class ) : 'dima-custom-heading';
	$style            = ( $style != '' ) ? 'style="' . $style . '"' : '';
	$icon             = ( $icon != '' ) ? '<i  class="' . $icon . '"></i>' : '';
	$icon_fontawesome = ( $icon_fontawesome != '' ) ? '<i class="' . $icon_fontawesome . '"></i>' : '';
	$icon             = ( $icon == '' ) ? $icon_fontawesome : $icon;
	$level            = ( $level != '' ) ? $level : 'h1';
	$float            = ( $float != '' ) ? $float : '';

	switch ( $float ) {
		case 'end' :
			$float = ' text-end';
			break;
		case 'start' :
			$float = ' text-start';
			break;
		case 'center' :
			$float = ' text-center';
			break;
		default :
			$float = '';

	}

	$output = "<{$level} {$id} class=\"{$class}{$float}\" {$style}>{$icon}" . do_shortcode( $content ) . "</{$level}>";

	return $output;

}

add_shortcode( 'custom_heading', 'dima_shortcode_custom_heading' );


/**
 * Protected Content
 *
 *
 * @param $atts
 * @param null $content
 *
 * @return string
 */
function dima_shortcode_protected( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id'    => '',
		'class' => '',
		'style' => ''
	), $atts, 'protect' ) );

	GLOBAL $user_login;

	$id    = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class = ( $class != '' ) ? 'dima-protect ' . esc_attr( $class ) : 'dima-protect';
	$style = ( $style != '' ) ? 'style="' . $style . '"' : '';

	if ( is_user_logged_in() ) {
		$output = do_shortcode( $content );
	} else {
		$output = "<div {$id} class=\"box {$class}\" {$style}>"
		          . '<form action="' . esc_url( site_url( 'wp-login.php' ) ) . '" method="post" class="mbn">'
		          . '<h3>' . esc_html__( 'Restricted Content Login', 'dimashortcodes' ) . '</h3>'
		          . '<p class="form-row-wide">'
		          . '<label for="username">' . esc_html__( 'Username or email address', 'dimashortcodes' ) . ' <span class="required">*</span></label>'
		          . '<input class="input-text" name="username" id="username" value="' . esc_attr( $user_login ) . '" type="text">'
		          . '</p>'

		          . '<p class="form-row-wide">'
		          . '  <label for="password">' . esc_html__( 'Password', 'dimashortcodes' ) . ' <span class="required">*</span></label>'
		          . '  <input class="input-text" name="password" id="password" type="password">'
		          . '</p>'
		          . '<p class="form-row no-bottom-margin">'
		          . '<input type="hidden" name="redirect_to" value="' . esc_url( get_permalink() ) . '">'
		          . '<input class="button" name="login" value="' . esc_html__( 'Login', 'dimashortcodes' ) . '" type="submit">'
		          . '</p>'
		          . '</form>'
		          . '</div>';
	}

	return $output;
}

add_shortcode( 'protect', 'dima_shortcode_protected' );


if ( ! function_exists( 'dima_add_contact_methods' ) ) :
	function dima_add_contact_methods( $user_contactmethods ) {

		unset( $user_contactmethods['yim'] );
		unset( $user_contactmethods['aim'] );
		unset( $user_contactmethods['jabber'] );

		$user_contactmethods['facebook']   = 'Facebook Profile';
		$user_contactmethods['twitter']    = 'Twitter Profile';
		$user_contactmethods['googleplus'] = 'Google+ Profile';
		$user_contactmethods['linkedin']   = 'Linkedin Profile';
		$user_contactmethods['instagram']  = 'Instagram Profile';

		return $user_contactmethods;

	}

	add_filter( 'user_contactmethods', 'dima_add_contact_methods' );
endif;


function dima_shortcode_recent_posts( $atts ) {
	ob_start();
	extract( shortcode_atts( array(
		'id' => ''
	), $atts, 'recent_posts' ) );

	?>
    <div class="boxed-blog blog-list"><?php
	dima_helper::dima_get_view( 'global', '_content-none' );
	?></div><?php
	return ob_get_clean();
}

include_once 'shortcodes/blog-shortcode.php';
include_once 'shortcodes/banner-shortcode.php';
include_once 'shortcodes/big-grid-shortcode.php';
include_once 'shortcodes/big-grid-slide-shortcode.php';
include_once 'shortcodes/related-posts.php';
include_once 'shortcodes/portfolio-shortcode.php';
include_once 'shortcodes/related-portfolio.php';
include_once 'shortcodes/section-shortcode.php';
include_once 'shortcodes/woo-shortcode.php';