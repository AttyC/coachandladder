<?php
/**
 * Functions pertaining to content output.
 *
 * @package Dima Framework
 * @subpackage Functions
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

if ( ! function_exists( 'dima_the_alternate_title' ) ) :
	function dima_the_alternate_title() {
		$meta  = esc_attr( get_post_meta( get_the_ID(), '_dima_entry_alternate_index_title', true ) );
		$title = ( $meta != '' ) ? $meta : get_the_title();
		echo $title;
	}
endif;

if ( ! function_exists( 'dima_hide_entry_meta' ) ) {
	/**
	 * Returns true if a statement is met where displaying the entry meta data is not desirable.
	 *
	 * @param $show_meta
	 *
	 * @return bool
	 */
	function dima_hide_entry_meta( $show_meta ) {
		if ( empty( $show_meta ) ) {
			$is_meta_enable = esc_attr( dima_helper::dima_get_option( 'dima_blog_enable_post_meta' ) ) == '1' ? false : true;

			return $is_meta_enable;
		} elseif ( is_single() || $show_meta ) {
			return false;
		} else {
			return true;
		}
	}
}

/**
 * Link Pages
 */
if ( ! function_exists( 'dima_link_pages' ) ) {
	function dima_link_pages() {
		$defaults = array(
			'before'      => '<div class="page-links clearfix"><span class="page-links-title">' . esc_html__( 'Pages:', 'okab' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>'
		);
		wp_link_pages( $defaults );
	}
}

/**
 * Entry Navigation
 */
if ( ! function_exists( 'dima_post_navigation' ) ) {

	/**
	 *
	 */
	function dima_post_navigation() {
		$left_icon      = '<span class="icon-wrap"><i class="fa fa-angle-left"></i></span>';
		$right_icon     = '<span class="icon-wrap"><i class="fa fa-angle-right"></i></span>';
		$is_ltr         = ! is_rtl();
		$prev_post      = get_adjacent_post( false, '', false );
		$next_post      = get_adjacent_post( false, '', true );
		$prev_icon_html = ( $is_ltr ) ? $left_icon : $right_icon;
		$next_icon_html = ( $is_ltr ) ? $right_icon : $left_icon;

		if ( dima_helper::dima_get_option( 'dima_pagination_post' ) ) { ?>
			<nav class="nav-reveal">
				<?php if ( $prev_post ) {
					$prevthumbnail         = get_the_post_thumbnail( $prev_post->ID, 'dima-thumbnails-small' );
					$prev_post_format_name = get_post_format( $prev_post->ID );;
					$quote = esc_attr( get_post_meta( $prev_post->ID, '_dima_quote_quote', true ) );
					?>

					<a class="prev" href="<?php echo get_permalink( $prev_post ); ?>">
						<?php echo $prev_icon_html; ?>
						<?php switch ( $prev_post_format_name ) {

							case 'quote':
								echo "<div>";
								echo "<h3>" . wp_trim_words( $quote, $num_words = 8, $more = '… ' ) . "</h3>";
								echo '<span class="dima-post-format"><i class="fa fa-quote-left"></i></span>';
								echo "</div>";
								break;
							case 'link':
								echo "<div>";
								echo "<h3>" . $prev_post->post_title . "</h3>";
								echo '<span class="dima-post-format"><i class="fa fa-link"></i></span>';
								echo "</div>";
								break;
							case 'video':
								echo "<div>";
								echo "<h3>" . $prev_post->post_title . "</h3>";
								echo '<span class="dima-post-format"><i class="fa fa-play-circle-o"></i></span>';
								echo "</div>";
								break;
							case 'audio':
								echo "<div>";
								echo "<h3>" . $prev_post->post_title . "</h3>";
								echo '<span class="dima-post-format"><i class="fa fa-volume-down"></i></span>';
								echo "</div>";
								break;
							case 'gallery':
								echo "<div>";
								echo "<h3>" . $prev_post->post_title . "</h3>";
								if ( ! empty( $prevthumbnail ) ) {
									echo $prevthumbnail;
								} else {
									echo '<span class="dima-post-format"><i class="fa fa-arrows-h"></i></span>';
								}
								echo "</div>";
								break;
							default:
								echo "<div>";
								echo "<h3>" . $prev_post->post_title . "</h3>";
								if ( ! empty( $prevthumbnail ) ) {
									echo $prevthumbnail;
								} else {
									echo '<span class="dima-post-format"><i class="fa fa-paragraph"></i></span>';
								}
								echo "</div>";
								break;
						} ?>
					</a>
					<?php
				}
				if ( $next_post ) {
					$nextthumbnail         = get_the_post_thumbnail( $next_post->ID, 'dima-thumbnails-small' );
					$next_post_format_name = get_post_format( $next_post->ID );
					$quote                 = esc_attr( get_post_meta( $next_post->ID, '_dima_quote_quote', true ) );
					?>
					<a class="next" href="<?php echo get_permalink( $next_post ); ?>">
						<?php echo $next_icon_html; ?>
						<?php switch ( $next_post_format_name ) {
							case 'quote':
								echo "<div>";
								echo "<h3>" . wp_trim_words( $quote, $num_words = 8, $more = '… ' ) . "</h3>";
								echo '<span class="dima-post-format"><i class="fa fa-quote-left"></i></span>';
								echo "</div>";
								break;
							case 'link':
								echo "<div>";
								echo "<h3>" . $next_post->post_title . "</h3>";
								echo '<span class="dima-post-format"><i class="fa fa-link"></i></span>';
								echo "</div>";
								break;
							case 'video':
								echo "<div>";
								echo "<h3>" . $next_post->post_title . "</h3>";
								echo '<span class="dima-post-format"><i class="fa fa-play-circle-o"></i></span>';
								echo "</div>";
								break;
							case 'audio':
								echo "<div>";
								echo "<h3>" . $next_post->post_title . "</h3>";
								echo '<span class="dima-post-format"><i class="fa fa-volume-down"></i></span>';
								echo "</div>";
								break;
							case 'gallery':
								echo "<div>";
								echo "<h3>" . $next_post->post_title . "</h3>";
								if ( ! empty( $nextthumbnail ) ) {
									echo $nextthumbnail;
								} else {
									echo '<span class="dima-post-format"><i class="fa fa-arrows-h"></i></span>';
								}
								echo "</div>";
								break;
							default:
								echo "<div>";
								echo "<h3>" . $next_post->post_title . "</h3>";
								if ( ! empty( $nextthumbnail ) ) {
									echo $nextthumbnail;
								} else {
									echo '<span class="dima-post-format"><i class="fa fa-paragraph"></i></span>';
								}
								echo "</div>";
								break;
						} ?>
					</a>
					<?php
				} ?>
			</nav>
			<?php
		}
	}
}

/**
 * Post Content
 */
if ( ! function_exists( 'dima_get_post_content' ) ) {
	/**
	 * @param $is_full_post_content
	 * @param int $excerpt_length
	 *
	 * @return array|mixed|string
	 */
	function dima_get_post_content( $is_full_post_content, $excerpt_length = 55 ) {
		$content_excerpted = false;

		if ( $is_full_post_content != '1' ) {
			$content_excerpted = true;
		}

		if ( is_singular() && ! is_page() ) {
			$content_excerpted = false;
		}

		if ( $content_excerpted ) {
			dima_get_post_content_excerpt( $excerpt_length );
		} else {
			dima_helper::dima_get_view( 'dima-global', 'content' );
		}
	}
}

if ( ! function_exists( 'dima_get_post_content_excerpt' ) ) {
	/**
	 * @param $limit
	 *
	 * @return array|mixed|string
	 */
	function dima_get_post_content_excerpt( $limit = 150 ) {
		$custom_read_more = false;
		$post             = get_post( get_the_ID() );
		$more_tag         = strpos( $post->post_content, '<!--more-->' );
		$more_text        = apply_filters( 'dima_blog_read_more_excerpt', '...' );

		$limit = intval( $limit );

		if ( $limit === 0 ) {
			return '';
		}

		$read_more = ' ' . $more_text;
		$content   = wp_filter_nohtml_kses( get_the_content( $read_more ) );
		//remove ShortCode ''
		$content = preg_replace( '/\[(.*?)\]/i', '', $content );
		if ( $post->post_excerpt || $more_tag !== false ) {
			if ( ! $more_tag ) {
				$content = wp_filter_nohtml_kses( rtrim( get_the_excerpt(), '[&hellip;]' ) );
			}
			$custom_read_more = true;
		}


		if ( $content && $custom_read_more == false ) {

			$content = explode( ' ', $content, $limit );
			if ( count( $content ) >= $limit ) {
				array_pop( $content );
				$content = implode( ' ', $content );

				if ( $limit != 0 ) {
					$content .= $read_more;
				}
			} else {
				$content = implode( ' ', $content );
			}
			echo $content;
		}

		// If we have a custom excerpt <!--more--> tag
		if ( $custom_read_more == true ) {
			//remove ShortCode ''
			$content = str_replace( '/\[(.*?)\]/i', '', $content );
			echo apply_filters( 'the_content', $content );
		}

		return $content;
	}
}
?>