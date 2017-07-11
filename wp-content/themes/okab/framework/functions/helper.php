<?php

/**
 * Define a function to get options and other hellper function.
 *
 * @package Dima Framework
 * @subpackage Functions
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $dima_allowed_HTML_tags;
$dima_allowed_HTML_tags = array(
	'a'      => array(
		'href'        => array(),
		'class'       => array(),
		'style'       => array(),
		'title'       => array(),
		'data-filter' => array(),
	),
	'div'    => array(
		'class' => array(),
		'style' => array(),
	),
	'span'   => array(
		'class' => array(),
		'value' => array(),
		'style' => array(),
	),
	'h4'     => array(
		'class' => array(),
		'style' => array(),
	),
	'br'     => array(),
	'p'      => array(
		'class' => array(),
		'style' => array(),
	),
	'button' => array(
		'class' => array(),
		'style' => array(),
	),
	'li'     => array(
		'class' => array(),
		'style' => array(),
	),
	'ol'     => array(
		'class' => array(),
		'style' => array(),
	),
	'ul'     => array(
		'class' => array(),
		'style' => array(),
	),
	'source' => array(
		'class' => array(),
		'style' => array(),
		'src'   => array(),
		'type'  => array()
	),
	'img'    => array(
		'class'  => array(),
		'id'     => array(),
		'style'  => array(),
		'alt'    => array(),
		'src'    => array(),
		'srcset' => array(),
		'height' => array(),
		'width'  => array(),
	),
	'i'      => array(
		'class' => array(),
		'style' => array(),
	),
	'dl'     => array(
		'class' => array(),
		'style' => array(),
	),
	'dd'     => array(
		'class' => array(),
		'style' => array(),
	),
	'dt'     => array(
		'class' => array(),
		'style' => array(),
	),
);


if ( ! class_exists( 'dima_helper' ) ) {
	class dima_helper {
		/**
		 * Display edit button above the post to send the current user to edit page.
		 */
		static function dima_get_admin_edit() {
			$buffy = '';
			if ( current_user_can( 'edit_posts' ) && ! is_single() ) {
				$buffy .= '<a class="dima-admin-edit" href="' . get_edit_post_link() . '">' . esc_html__( 'Edit', 'okab' ) . '</a>';
			}
			echo $buffy;
		}

		/**
		 * Get Option
		 *
		 * @param $option
		 *
		 * @return mixed|void
		 */
		static function dima_get_option( $option ) {
			GLOBAL $dima_customizer_data;
			$default = $dima_customizer_data[ $option ];
			$output  = get_option( $option, $default );

			return apply_filters( 'dima_option_' . $option, $output );
		}

		/**
		 * Get Demo
		 */
		static function dima_get_demo() {
			return dima_helper::dima_get_option( 'dima_template' );
		}

		/**
		 * @param $url
		 *
		 * @return array|false
		 */
		static function dima_get_attachment_info_by_url( $url ) {
			$id   = attachment_url_to_postid( $url );
			$info = wp_get_attachment_image_src( $id );

			return $info;
		}

		/**
		 * @param $url
		 *
		 * @return mixed
		 */
		static function dima_protocol_relative( $url ) {
			$new_url = str_replace( array( 'http://', 'https://' ), '//', $url );

			return $new_url;
		}

		/**
		 * @param $option
		 *
		 * @return mixed|void
		 */
		static function dima_get_theme( $option ) {
			$theme_obj = wp_get_theme()->get( $option );

			return apply_filters( 'dima_theme_' . $option, $theme_obj );
		}

		/**
		 * Plugin Exists
		 *
		 * @param $plugin
		 *
		 * @return bool
		 */
		static function dima_is_plugin_exists( $plugin ) {

			if ( file_exists( WP_PLUGIN_DIR . '/' . $plugin ) ) {
				return true;
			} else {
				return false;
			}

		}

		/**
		 * Gets the ID of the current page, post,blog,shop
		 * @return int|mixed|null|void
		 */
		static function dima_get_the_ID() {
			GLOBAL $post;
			if ( is_home() ) {
				$id = get_option( 'page_for_posts' );
			} elseif ( dima_helper::dima_is_shop() ) {
				$id = wc_get_page_id( 'shop' );
			} elseif ( is_404() ) {
				return null;
			} else {
				if ( $post != '' ) {
					$id = $post->ID;
				} else {
					$id = null;
				}
			}

			return $id;
		}

		/**
		 * @param $post_format
		 *
		 * @return string
		 */
		static function dima_get_post_format_thumb( $post_format ) {
			if ( in_array( $post_format, array( 'video', 'quote', 'link', 'audio' ) ) ) {
				$img = 'post-format-thumb-' . $post_format . '.svg';
			} else {
				$img = 'post-format-thumb-text.svg';
			}

			return DIMA_TEMPLATE_URL . '/framework/images/' . $img;
		}

		/*Conditionals*/

		/**
		 * @return bool
		 */
		static function dima_is_single_portfolio() {
			if ( is_singular( 'dima-portfolio' ) ) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Is Shop
		 * @return bool
		 */
		static function dima_is_shop() {
			if ( function_exists( 'is_shop' ) && is_shop() ) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Is woo
		 * @return bool
		 */
		static function dima_is_woo() {
			if ( class_exists( 'WooCommerce' ) ) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Is Shop
		 * @return bool
		 */
		static function dima_is_woo_pages() {
			if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Is Product
		 * @return bool
		 */
		static function dima_is_product() {
			if ( function_exists( 'is_product' ) && is_product() ) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Is product category
		 * @return bool
		 */
		static function dima_is_product_category() {
			if ( function_exists( 'is_product_category' ) && is_product_category() ) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * @return bool
		 */
		static function dima_is_product_tag() {
			if ( function_exists( 'is_product_tag' ) && is_product_tag() ) {
				return true;
			} else {
				return false;
			}
		}

		/*OKAB Version 2.0*/
		static function dima_is_bbpress() {
			if ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * @param $url
		 * @param $param_name
		 * @param $param_value
		 *
		 * @return string
		 */
		static function dima_add_url_parameter( $url, $param_name, $param_value ) {
			$data = parse_url( $url );
			if ( ! isset( $data["query"] ) ) {
				$data["query"] = "";
			}

			$params = array();
			parse_str( $data['query'], $params );

			if ( is_array( $param_value ) ) {
				$param_value = $param_value[0];
			}

			$params[ $param_name ] = $param_value;

			if ( $param_name == 'product_count' ) {
				$params['paged'] = '1';
			}

			$data['query'] = http_build_query( $params );

			return dima_helper::dima_make_url( $data );
		}

		/**
		 * @param $data
		 *
		 * @return string
		 */
		static function dima_make_url( $data ) {
			$url = '';
			if ( isset( $data['host'] ) ) {
				$url .= $data['scheme'] . '://';
				if ( isset ( $data['user'] ) ) {
					$url .= $data['user'];
					if ( isset( $data['pass'] ) ) {
						$url .= ':' . $data['pass'];
					}
					$url .= '@';
				}
				$url .= $data['host'];
				if ( isset ( $data['port'] ) ) {
					$url .= ':' . $data['port'];
				}
			}

			if ( isset( $data['path'] ) ) {
				$url .= $data['path'];
			}

			if ( isset( $data['query'] ) ) {
				$url .= '?' . $data['query'];
			}

			if ( isset( $data['fragment'] ) ) {
				$url .= '#' . $data['fragment'];
			}

			return $url;
		}

		static function dima_get_view_with_args( $style, $base, $extension = '', $args = array() ) {
			$template = new DIMA_GetView( $style, $base, $extension, $args );
			$template->render();
		}

		/**
		 * @param int $clm 5 use in shortcode -dima_shortcode-
		 *
		 * @param string $post_type
		 *
		 * @return bool|WP_Query
		 */
		static function dima_get_post_related_posts( $clm = 3, $post_type = 'post' ) {

			if ( $post_type == "dima-portfolio" ) {
				$taxonomy = "portfolio-category";
			} else {
				$taxonomy = "category";
			}

			$post_id = get_the_ID();
			$terms   = get_the_terms( $post_id, $taxonomy );

			$term_ids = array();
			if ( is_array( $terms ) ) {
				foreach ( $terms as $term ) {
					$term_ids[] = $term->term_id;
				}
			}

			$related_posts = new WP_Query( array(
				'tax_query'      => array(
					array(
						'taxonomy' => $taxonomy,
						'field'    => 'id',
						'terms'    => $term_ids,
						'operator' => 'IN',
					),
				),
				'post_type'      => $post_type,
				'post__not_in'   => array( $post_id ),
				'posts_per_page' => $clm,
				'orderby'        => 'rand',
			) );

			if ( $related_posts->have_posts() ) {
				return $related_posts;
			} else {
				return false;
			}
		}

		/**
		 * @param array $args
		 *
		 * @return string
		 */
		static function dima_get_post_thumb( $args = array() ) {
			$default_args = array(
				'post_id'                    => 0,
				'size'                       => '',
				'height'                     => 100,
				'width'                      => 100,
				'title'                      => '',
				'is_linked'                  => false,
				'permalink'                  => '',
				'a_class'                    => array(),
				'img_class'                  => array(),
				'img_style'                  => '',
				'post_format_thumb_fallback' => false,
				'fallback'                   => '',
				'thumb_src'                  => '',
				'popup_type'                 => '',
			);

			/*extracting all args*/
			$args      = wp_parse_args( $args, $default_args );
			$post_id   = $args['post_id'] ? $args['post_id'] : get_the_ID();
			$permalink = ! empty( $args['permalink'] ) ? $args['permalink'] : get_the_permalink( $post_id );
			$title     = ! empty( $args['title'] ) ? $args['title'] : get_the_title( $post_id );
			$width     = (int) apply_filters( 'dima_post_thumbnail_width', $args['width'] );
			$height    = (int) apply_filters( 'dima_post_thumbnail_height', $args['height'] );

			$size      = ! empty( $args['size'] ) ? $args['size'] : array( $width, $height );
			$thumb_src = $args['thumb_src'];

			$img_style    = $args['img_style'];
			$tooltip_attr = ( $args['popup_type'] != '' ) ? dima_tooltip_data(
				$args['popup_type'],
				'hover',
				'top', '',
				'popup_content' ) : '';

			$thumbnail_id = get_post_thumbnail_id( $post_id );
			if ( ! $thumbnail_id && ! $args['thumb_src'] ) {
				if ( $args['post_format_thumb_fallback'] ) {
					$post_format = get_post_format();
					if ( in_array( $post_format, array( 'video', 'quote', 'link', 'audio' ) ) ) {
						$thumb_src = dima_helper::dima_get_post_format_thumb( $post_format );
					} else {
						$thumb_src = dima_helper::dima_get_post_format_thumb( 'text' );
					}
				} else if ( ! empty( $args['fallback'] ) ) {
					return $args['fallback'];
				} else {
					$thumb_src = dima_helper::dima_get_post_format_thumb( 'text' );
				}
			}

			if ( $thumbnail_id ) {
				$image_output = get_the_post_thumbnail( $post_id, $size, null );
			} else {
				$image_output = sprintf(
					'<img  width="230px" height="150px" src="%1$s" alt="%2$s"%3$s %4$s/>',
					esc_attr( $thumb_src ),
					esc_attr( $title ),
					( ! empty( $args['img_class'] ) ? sprintf( ' class="%s"', esc_attr( implode( ' ', $args['img_class'] ) ) ) : '' ),
					( ! empty( $img_style ) ? sprintf( ' style="%s"', esc_attr( $img_style ) ) : '' )
				);
			}
			if ( $args['is_linked'] ) {
				$image_output = sprintf(
					'<a href="%1$s" title="%2$s"%3$s%5$s%6$s>
               %4$s
               </a>',
					esc_attr( $permalink ),
					esc_attr( $title ),
					( ! empty( $args['a_class'] ) ? sprintf( ' class="%s"', esc_attr( implode( ' ', $args['a_class'] ) ) ) : '' ),
					$image_output,
					( ! empty( $img_style ) ? sprintf( ' style="%s"', esc_attr( $img_style ) ) : '' ),
					$tooltip_attr
				);
			}

			return $image_output;
		}

		static function dima_get_thumb( $args ) {

			$fullwidth = ( in_array( 'dima-full-width-active', get_body_class() ) ) ? true : false;
			$opt       = get_post_meta( get_the_ID(), '_dima_post_layout', true );
			if ( $opt == "no-sidebar" && ( is_singular() && ! is_page() ) ) {
				$fullwidth = true;
			}
			if ( is_single() ) {
				$thumb = dima_helper::dima_get_post_thumb( array(
					'size' => 'dima-big-image-single',
				) );
			} else {
				switch ( $args['post_type'] ) {
					case 'standard':
					case 'grid':
						$thumb = dima_helper::dima_get_post_thumb( array(
							'size' => 'dima-post-standard-image',
						) );
						break;
					case 'imageside':
					case 'timeline':
						$thumb = dima_helper::dima_get_post_thumb( array(
							'size' => 'dima-side-post-image',
						) );
						break;
					case 'postslist_side':
					case 'postslist_grid':
					case 'postslist':
						$thumb = dima_helper::dima_get_post_thumb( array(
							'size' => 'dima-side-magazine-image',
						) );
						break;
					case 'masonry':
						$thumb = dima_helper::dima_get_post_thumb( array(
							'size' => 'dima-massonry-image',
						) );
						break;

					default:
						$thumb = dima_helper::dima_get_post_thumb( array(
							'size' => 'full',
						) );
						break;
				}
			}

			return $thumb;
		}

		static function dima_get_thumb_gallery( $args, $attachment ) {

			/*$fullwidth = ( in_array( 'dima-full-width-active', get_body_class() ) ) ? true : false;
			$opt       = get_post_meta( get_the_ID(), '_dima_post_layout', true );
			if ( $opt == "no-sidebar" && ( is_singular() && ! is_page() ) ) {
				$fullwidth = true;
			}*/

			switch ( $args['post_type'] ) {
				case 'standard':
				case 'grid':
					$thumb = wp_get_attachment_image( $attachment, 'dima-post-standard-image', false, false );;
					break;
				case 'imageside':
				case 'timeline':
					$thumb = wp_get_attachment_image( $attachment, 'dima-side-post-image', false, false );;
					break;
				case 'postslist_side':
				case 'postslist_grid':
				case 'postslist':
					$thumb = wp_get_attachment_image( $attachment, 'dima-side-magazine-image', false, false );;
					break;
				case 'masonry':
					$thumb = wp_get_attachment_image( $attachment, 'dima-massonry-image', false, false );;
					break;

				default:
					$thumb = wp_get_attachment_image( $attachment, 'full', false, false );;
					break;
			}

			return $thumb;

		}

		/**
		 * @param string $_this
		 *
		 * @return array
		 */
		static function get_featured_args( $_this = '' ) {

			if ( is_singular() && ! is_page() ) {
				$default_args = array(
					'is_full_post_content_blog' => "",
					'meta'                      => "",
					'words'                     => intval( dima_helper::dima_get_option( 'dima_blog_blog_excerpt' ) ),
					'elm_hover'                 => "",
					'img_hover'                 => "",
					'show_image'                => true,
					'blog_type'                 => esc_attr( dima_helper::dima_get_option( 'dima_blog_style' ) ),
					'post_class'                => '',
					'no_border'                 => '',
				);
			} else {
				$default_args = array(
					'is_full_post_content_blog' => dima_helper::dima_get_option( 'dima_blog_enable_full_post_index' ),
					'meta'                      => ( isset( $_this->show_meta ) ) ? $_this->show_meta : true,
					'words'                     => ( isset( $_this->words ) ) ? $_this->words : intval( esc_attr( dima_helper::dima_get_option( 'dima_blog_blog_excerpt' ) ) ),
					'elm_hover'                 => ( isset( $_this->elm_hover ) ) ? $_this->elm_hover : '',
					'img_hover'                 => ( isset( $_this->img_hover ) ) ? $_this->img_hover : '',
					'show_image'                => ( isset( $_this->show_image ) ) ? $_this->show_image : true,
					'blog_type'                 => ( isset( $_this->blog_style ) ) ? $_this->blog_style : esc_attr( dima_helper::dima_get_option( 'dima_blog_style' ) ),
					'post_class'                => ( isset( $_this->post_class ) ) ? $_this->post_class : '',
					'no_border'                 => ( isset( $_this->no_border ) ) ? $_this->no_border : '',
				);
			}

			return $default_args;
		}

		static function get_featured_args_portfolio( $_this = '' ) {

			if ( $_this == '' ) {
				$default_args = array(
					'is_full_post_content_blog' => "",
					'elm_hover'                 => "",
					'img_hover'                 => "",
					'blog_type'                 => 'grid',
					'post_class'                => '',
					'no_border'                 => '',
					'no_margin'                 => '',
				);
			} else {
				$default_args = array(
					'is_full_post_content_blog' => dima_helper::dima_get_option( 'dima_blog_enable_full_post_index' ),
					'elm_hover'                 => ( isset( $_this->elm_hover ) ) ? $_this->elm_hover : '',
					'img_hover'                 => ( isset( $_this->img_hover ) ) ? $_this->img_hover : '',
					'blog_type'                 => ( isset( $_this->blog_type ) ) ? $_this->blog_type : 'grid',
					'post_class'                => ( isset( $_this->post_class ) ) ? $_this->post_class : '',
					'no_border'                 => ( isset( $_this->no_border ) ) ? $_this->no_border : '',
					'no_margin'                 => ( isset( $_this->no_margin ) ) ? $_this->no_margin : '',
				);
			}

			return $default_args;
		}

		static function dima_get_featured_image_url( $size = 'medium' ) {
			$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), $size );

			return $featured_image[0];
		}

		/**
		 * Get Slider Shortcode (rev_slider)
		 *
		 * @param $string
		 *
		 * @return string
		 */
		static function dima_get_slider_shortcode( $string ) {
			$Slide_Alias = strpos( $string, 'dima-revolution-slider-' ) !== false;
			if ( $Slide_Alias ) {
				$string_pieces = explode( '-', $string );
				$slider_name   = end( $string_pieces );
			} else {
				$slider_name = end( $string );
			}

			return "[rev_slider alias=\"{$slider_name}\"]";
		}

		/**
		 * Get View
		 * https://codex.wordpress.org/Function_Reference/get_template_part
		 *
		 * @param $style
		 * @param $base
		 * @param string $extension
		 */
		static function dima_get_view( $style, $base, $extension = '' ) {
			get_template_part( 'framework/views/' . $style . '/' . $base, $extension );
		}

		/**
		 * Use in menu and content
		 * @return string
		 */
		static function dima_get_header_content_wrapper() {
			$if_full_width = dima_helper::dima_get_header_style() == 'fill-width';
			if ( $if_full_width ) {
				$class = 'full-wrapper';
			} else {
				$class = 'container';
			}

			return $class;
		}

		/**
		 * @return string
		 */
		static function dima_get_header_style() {
			$HS = esc_attr( dima_helper::dima_get_option( 'dima_header_navbar_position' ) );

			if ( is_singular( 'page' ) ) {
				$HS_META = get_post_meta( get_the_ID(), '_dima_page_header_style', true );
				if ( ! empty( $HS_META ) ) {
					$HS = $HS_META;
				}
			}

			return $HS;
		}

		static function dima_display_shortcode_above_sidebar() {
			$id         = dima_helper::dima_get_the_ID();
			$big_active = get_post_meta( $id, '_dima_page_shortcode_above_sidebar', true );
			$big_active = ( $big_active == '' ) ? 'Off' : $big_active;
			if ( $big_active != 'Off' ) :
				?>
                <div class="above_sidebar-container">
					<?php
					echo do_shortcode( html_entity_decode( $big_active ) );
					?>
                </div>
                <div class="clear-section"></div>
			<?php endif;
		}

		static function dima_get_sidebar( $name = "0" ) {
			wp_reset_query();
			if ( $name != "0" ) {
				dynamic_sidebar( $name );

				return;
			}
			if ( is_home() ) {
				dynamic_sidebar( 'sidebar-main' );
			} elseif ( is_singular( 'page' ) ) {
				$sidebar_id = get_post_meta( get_the_ID(), '_dima_page_sidebar', true );
				if ( $sidebar_id == '' ) {
					dynamic_sidebar( 'sidebar-main' );
				} else {
					dynamic_sidebar( $sidebar_id );
				}
			} elseif ( is_singular( 'post' ) ) {
				$sidebar_id = get_post_meta( get_the_ID(), '_dima_post_sidebar', true );
				if ( $sidebar_id == '' ) {
					dynamic_sidebar( 'sidebar-main' );
				} else {
					dynamic_sidebar( $sidebar_id );
				}
			} elseif ( is_singular( 'dima-portfolio' ) ) {
				$sidebar_id = get_post_meta( get_the_ID(), '_dima_portfolio_sidebar', true );
				if ( $sidebar_id == '' ) {
					dynamic_sidebar( 'sidebar-main' );
				} else {
					dynamic_sidebar( $sidebar_id );
				}
			} elseif ( dima_helper::dima_is_shop() || dima_helper::dima_is_product() ) {
				$sidebar_id = get_post_meta( get_the_ID(), '_dima_product_sidebar', true );
				if ( $sidebar_id == '' ) {
					dynamic_sidebar( 'shop-widget-area' );
				} else {
					dynamic_sidebar( $sidebar_id );
				}

			} elseif ( dima_helper::dima_is_bbpress() ) {
				$sidebar_id = get_post_meta( get_the_ID(), '_dima_product_sidebar', true );
				if ( $sidebar_id == '' ) {
					dynamic_sidebar( 'forums-widget-area' );
				} else {
					dynamic_sidebar( $sidebar_id );
				}

			} else {
				dynamic_sidebar( 'sidebar-main' );
			}
		}

		/**
		 * Google structured
		 */
		static function dima_get_google_article() {
			return $data = 'role="article" itemprop="hasPart" itemscope="" itemtype="http://schema.org/Article"';
		}

		static function dima_get_google_meta() {
			echo $data = "<meta itemscope='itemscope' itemprop='mainEntityOfPage' itemType='https://schema.org/WebPage'/>";
		}

		/**
		 * @return string
		 */
		static function dima_get_breadcrumbs_display() {
			$_ID = get_the_ID();

			if ( is_page() ) {
				$page_type = '_page_';
			} elseif ( dima_helper::dima_is_single_portfolio() ) {
				$page_type = '_portfolio_';
			} elseif ( dima_helper::dima_is_product() ) {
				$page_type = '_product_';
			} else {
				$page_type = '_post_';
			}
			$breadcrumbs_display = esc_attr( get_post_meta( $_ID, '_dima' . $page_type . 'breadcumbs_display', true ) );

			if ( $breadcrumbs_display == '' || empty( $breadcrumbs_display ) ) {
				$breadcrumbs_display = esc_attr( dima_helper::dima_get_option( 'dima_page_title_display' ) );
				$breadcrumbs_display = ( $breadcrumbs_display == '1' ) ? 'on' : 'off';
			}

			return $breadcrumbs_display;
		}
	}
}

//!--End Class Dima_helper//

if ( ! class_exists( 'DIMA_GetView' ) ) {
	/**
	 * Include a file and(optionally) pass arguments to it.
	 */
	class DIMA_GetView {
		private $args;
		private $style;
		private $base;
		private $extension;

		public function __get( $name ) {
			return $this->args[ $name ];
		}

		public function __construct( $style, $base, $extension = '', $args = array() ) {
			$this->style     = $style;
			$this->base      = $base;
			$this->extension = $extension;
			$this->args      = $args;
		}

		public function __isset( $name ) {
			return isset( $this->args[ $name ] );
		}

		public function render() {
			if ( empty( $this->extension ) ) {
				$file = 'framework/views/' . $this->style . '/' . $this->base . '.php';
			} else {
				$file = 'framework/views/' . $this->style . '/' . $this->base . '-' . $this->extension . '.php';
			}

			if ( locate_template( $file ) ) {
				include( locate_template( $file ) );//Theme Check free. Child themes support.
			}
		}
	}
}

if ( ! class_exists( 'dima_demo_name' ) ) {
	class dima_demo_name {

		static function update_demo( $demo_nem ) {
			update_option( 'dima_demo_name', $demo_nem );
		}

		/**
		 * @return bool|array
		 */
		static function get_installed_demo() {
			$demo_nem = esc_attr( dima_helper::dima_get_option( 'dima_demo_name' ) );
			if ( $demo_nem != '' ) {
				return $demo_nem;
			}

			return 'okab';
		}
	}
}


/**
 * Remove Query Strings From Static Resources
 *
 * @param $src
 *
 * @return mixed
 */
function _remove_script_version( $src ) {
	$parts = explode( '?ver', $src );

	return $parts[0];
}

function _remove_script_version_and( $src ) {
	$parts = explode( '&ver', $src );

	return $parts[0];
}

function dima_wp_title( $title ) {

	if ( is_front_page() ) {
		return get_bloginfo( 'name' ) . '&#32;|&#32;' . get_bloginfo( 'description' );
	} elseif ( is_feed() ) {
		return ' | RSS Feed';
	} else {
		return trim( $title ) . ' | ' . get_bloginfo( 'name' );
	}

}

add_filter( 'wp_title', 'dima_wp_title' );

if ( ! is_admin() ) {
	add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
	add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
	add_filter( 'script_loader_src', '_remove_script_version_and', 15, 1 );
	add_filter( 'style_loader_src', '_remove_script_version_and', 15, 1 );
}

/**
 * Fixes empty <p> and <br> tags showing before and after shortcodes in the
 * output content.
 */
function dima_the_content_filter( $content ) {
	// array of custom shortcodes requiring the fix
	$block = join( "|", array( 'iconbox_content', 'list_item', 'text' ) );
	// opening tag
	$rep = preg_replace( "/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/", "[$2$3]", $content );

	// closing tag
	$rep = preg_replace( "/(<p>)?\[\/($block)](<\/p>|<br \/>)?/", "[/$2]", $rep );

	return $rep;
}

add_filter( 'the_content', 'dima_the_content_filter' );

function dima_get_filesystem() {
	$access_type = get_filesystem_method();
	if ( $access_type === 'direct' ) {
		/* you can safely run request_filesystem_credentials() without any issues and don't need to worry about passing in a URL */
		$creds = request_filesystem_credentials( site_url() . '/wp-admin/', '', false, false, array() );
		/* initialize the API */
		if ( ! WP_Filesystem( $creds ) ) {
			/* any problems and we exit */
			return false;
		}

		return true;
	} else {
		return false;
	}
}

function get_local_file_contents( $file_path ) {
	ob_start();
	include $file_path;
	$contents = ob_get_clean();

	return $contents;
}


/**
 * @param $element
 * @param array $params
 *
 * @return string
 */
function dima_creat_data_attributes( $element, $params = array() ) {
	$data = 'data-dima-element="' . $element . '"';

	if ( ! empty( $params ) ) {
		$params_json = htmlspecialchars( json_encode( $params ), ENT_QUOTES, 'UTF-8' );
		$data        .= ' data-dima-params="' . $params_json . '"';
	}

	return $data;
}

if ( ! function_exists( 'dima_get_featured_and_opengraph_image' ) ) :
	/**
	 * @param string $size
	 *
	 * @return mixed|void
	 */
	function dima_get_featured_and_opengraph_image( $size = 'full' ) {
		$featured_image_url = dima_helper::dima_get_featured_image_url( $size );

		if ( $featured_image_url != null ) {
			$image_url = $featured_image_url;
		} else {
			$image_url = get_option( 'dima_opengraph_image' );
		}

		return $image_url;

	}
endif;

/**
 * @param string $clm
 *
 * @return string
 */
function dima_get_clm( $clm = '', $clm_sd = '2', $clm_xsd = '1' ) {
	$nb_clm = 12;
	if ( $clm != 0 ) {
		$clm     = $nb_clm / $clm;
		$clm_sd  = $nb_clm / $clm_sd;
		$clm_xsd = $nb_clm / $clm_xsd;
	} else {
		$clm_xsd = $clm_sd = $clm = 12;
	}

	return 'ok-md-' . $clm . ' ok-sd-' . $clm_sd . ' ok-xsd-' . $clm_xsd . '';
}

if ( ! function_exists( 'dima_get_global_social' ) ) :
	/**
	 * @param bool $colored
	 */
	function dima_get_global_social( $colored = false ) {
		$facebook    = dima_helper::dima_get_option( 'dima_social_facebook' );
		$twitter     = dima_helper::dima_get_option( 'dima_social_twitter' );
		$google_plus = dima_helper::dima_get_option( 'dima_social_googleplus' );
		$linkedin    = dima_helper::dima_get_option( 'dima_social_linkedin' );
		$youtube     = dima_helper::dima_get_option( 'dima_social_youtube' );
		$vimeo       = dima_helper::dima_get_option( 'dima_social_vimeo' );
		$foursquare  = dima_helper::dima_get_option( 'dima_social_foursquare' );
		$instagram   = dima_helper::dima_get_option( 'dima_social_instagram' );
		$pinterest   = dima_helper::dima_get_option( 'dima_social_pinterest' );
		$dribbble    = dima_helper::dima_get_option( 'dima_social_dribbble' );
		$flickr      = dima_helper::dima_get_option( 'dima_social_flickr' );
		$behance     = dima_helper::dima_get_option( 'dima_social_behance' );
		$tumblr      = dima_helper::dima_get_option( 'dima_social_tumblr' );
		$whatsapp    = dima_helper::dima_get_option( 'dima_social_whatsapp' );
		$soundcloud  = dima_helper::dima_get_option( 'dima_social_soundcloud' );
		$rss         = dima_helper::dima_get_option( 'dima_social_rss' );

		$output         = '';
		$facebook_color = $twitter_color = $google_plus_color
			= $linkedin_color = $youtube_color = $vimeo_color = $foursquare_color
			= $instagram_color = $pinterest_color = $dribbble_color = $flickr_color
			= $flickr_color = $behance_color = $rss_color = $tumblr_color = $whatsapp_color = $soundcloud_color
			= '';
		if ( $colored ) {
			if ( $facebook )    : $facebook_color = 'class="facebook"';endif;
			if ( $twitter )    : $twitter_color = 'class="twitter"';endif;
			if ( $google_plus )    : $google_plus_color = 'class="google"';endif;
			if ( $linkedin )    : $linkedin_color = 'class="linkedin"';endif;
			if ( $youtube )    : $youtube_color = 'class="youtube"';endif;
			if ( $vimeo )    : $vimeo_color = 'class="vimeo"';endif;
			if ( $foursquare )    : $foursquare_color = 'class="foursquare"';endif;
			if ( $instagram )    : $instagram_color = 'class="instagram"';endif;
			if ( $pinterest )    : $pinterest_color = 'class="pinterest"';endif;
			if ( $dribbble )    : $dribbble_color = 'class="dribbble"';endif;
			if ( $flickr )    : $flickr_color = 'class="flickr"';endif;
			if ( $behance )    : $behance_color = 'class="behance"';endif;
			if ( $tumblr )    : $tumblr_color = 'class="tumblr"';endif;
			if ( $whatsapp )    : $whatsapp_color = 'class="whatsapp"';endif;
			if ( $soundcloud )    : $soundcloud_color = 'class="soundcloud"';endif;
			if ( $rss )    : $rss_color = 'class="rss"';endif;
		}
		if ( $facebook )    : $output .= '<li ' . $facebook_color . '><a href="' . esc_url( $facebook ) . '" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>'; endif;
		if ( $twitter )     : $output .= '<li ' . $twitter_color . '><a href="' . esc_url( $twitter ) . '" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>'; endif;
		if ( $google_plus ) : $output .= '<li ' . $google_plus_color . '><a href="' . esc_url( $google_plus ) . '" title="Google+" target="_blank"><i class="fa fa-google-plus"></i></a></li>'; endif;
		if ( $linkedin )    : $output .= '<li ' . $linkedin_color . '><a href="' . esc_url( $linkedin ) . '" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a></li>'; endif;
		if ( $foursquare )  : $output .= '<li ' . $foursquare_color . '><a href="' . esc_url( $foursquare ) . '" title="Foursquare" target="_blank"><i class="fa fa-foursquare"></i></a></li>'; endif;
		if ( $youtube )     : $output .= '<li ' . $youtube_color . '><a href="' . esc_url( $youtube ) . '" title="YouTube" target="_blank"><i class="fa fa-youtube"></i></a></li>'; endif;
		if ( $vimeo )       : $output .= '<li ' . $vimeo_color . '><a href="' . esc_url( $vimeo ) . '" title="Vimeo" target="_blank"><i class="fa fa-vimeo"></i></a></li>'; endif;
		if ( $instagram )   : $output .= '<li ' . $instagram_color . '><a href="' . esc_url( $instagram ) . '" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>'; endif;
		if ( $pinterest )   : $output .= '<li ' . $pinterest_color . '><a href="' . esc_url( $pinterest ) . '" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li>'; endif;
		if ( $dribbble )    : $output .= '<li ' . $dribbble_color . '><a href="' . esc_url( $dribbble ) . '" title="Dribbble" target="_blank"><i class="fa fa-dribbble"></i></a></li>'; endif;
		if ( $flickr )      : $output .= '<li ' . $flickr_color . '><a href="' . esc_url( $flickr ) . '" title="Flickr" target="_blank"><i class="fa fa-flickr"></i></a></li>'; endif;
		if ( $behance )     : $output .= '<li ' . $behance_color . '><a href="' . esc_url( $behance ) . '" title="Behance" target="_blank"><i class="fa fa-behance"></i></a></li>'; endif;
		if ( $tumblr )      : $output .= '<li ' . $tumblr_color . '><a href="' . esc_url( $tumblr ) . '" title="Tumblr" target="_blank"><i class="fa fa-tumblr"></i></a></li>'; endif;
		if ( $whatsapp )    : $output .= '<li ' . $whatsapp_color . '><a href="' . esc_url( $whatsapp ) . '" title="Whatsapp" target="_blank"><i class="fa fa-whatsapp"></i></a></li>'; endif;
		if ( $soundcloud )  : $output .= '<li ' . $soundcloud_color . '><a href="' . esc_url( $soundcloud ) . '" title="SoundCloud" target="_blank"><i class="fa fa-soundcloud"></i></a></li>'; endif;
		if ( $rss )         : $output .= '<li ' . $rss_color . '><a href="' . esc_url( $rss ) . '" title="RSS" target="_blank"><i class="fa fa-rss"></i></a></li>'; endif;

		$html_output = $output;
		echo $html_output;
	}
endif;

if ( ! function_exists( 'dima_get_dummy_size' ) ) {
	function dima_get_dummy_size( $media_oembed = '' ) {
		$dummy = $width = $height = 0;
		if ( $dummy == 0 ) {
			preg_match_all( '/width="([^"]*)"/i', $media_oembed, $iWidth );
			$width = ( isset( $iWidth[1][0] ) ) ? $iWidth[1][0] : 1;
			preg_match_all( '/height="([^"]*)"/i', $media_oembed, $iHeight );
			$height = ( isset( $iHeight[1][0] ) ) ? $iHeight[1][0] : 1;
			if ( (int) $width !== 0 ) {
				$oembed_size['dummy'] = round( ( $height / $width ) * 100, 2 );
				$dummy                = $oembed_size['dummy'];
			}
		}

		return array(
			'dummy'  => $dummy,
			'width'  => $width,
			'height' => $height,
		);
	}
}