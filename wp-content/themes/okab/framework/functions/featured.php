<?php
/**
 * Output a featured Image bsed on post type.
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

if ( ! function_exists( 'dima_featured_image' ) ) :
	function dima_featured_image( $args = array() ) {

		$default_args = array(
			'post_type' => '',
			'img_hover' => '',
			'elm_hover' => '',
			'no_border' => '',
			'class'     => array(),
		);

		$args = wp_parse_args( $args, $default_args );

		if ( has_post_thumbnail() ) {

			$thumb = dima_helper::dima_get_thumb( $args );

			if ( is_singular() && ! is_page() ) {
				printf( '<div class="post-img"><div class="entry-thumb">%s</div></div>', $thumb );
			} else {
				/**
				 * Image Hover Style
				 */
				switch ( $args['img_hover'] ) {
					case 'zoom-out':
						$args['img_hover'] = " effect-roxy";
						break;
					case 'zoom-in':
						$args['img_hover'] = " effect-julia";
						break;
					case 'gray':
						$args['img_hover'] = " apply-gray";
						break;
					case 'none':
					default:
						$args['img_hover'] = " post-feature";
						break;
				}
				/**
				 * Element Hover
				 */
				switch ( $args['elm_hover'] ) {
					case 'none':
						$hover = '<div class="post-img"><div class="' . $args['img_hover'] . '"><a href="%1$s">%3$s</a></div></div>';
						break;
					default:

						$hover = '<div class="post-img">
                        <div class="' . $args['img_hover'] . '">
                            <a href="%1$s" class="entry-thumb" title="%2$s">%3$s</a>
                        <div class="post-icon link_overlay">
                        <ul class="icons-media">
                        <li>
                            <a href="%1$s" title="%2$s">
                                <i class="fa fa-link"></i>
                            </a>
                        </li>
                        </ul> ';
						if ( $args['no_border'] == 'false' ) {
							$hover .= ' <span class="topaz-hover"></span >';
						}
						$hover .= '
                        </div >
                        </div >
                        </div > ';
				}
				printf( $hover,
					esc_url( get_permalink() ),
					esc_attr( sprintf( esc_html__( 'Permalink to: "%s"', 'okab' ), the_title_attribute( 'echo=0' ) ) ),
					$thumb
				);
			}
		}
	}
endif;

if ( ! function_exists( 'dima_featured_gallery' ) ) :
	function dima_featured_gallery( $args = array() ) {

		$default_args = array(
			'post_type' => '',
			'class'     => array(),
		);

		$args = wp_parse_args( $args, $default_args );

		$_ID = get_the_ID();

		$Animation      = esc_attr( get_post_meta( $_ID, '_dima_flex_slide_animation', true ) );
		$SlideshowSpeed = esc_attr( get_post_meta( $_ID, '_dima_flex_slide_show_speed', true ) );
		$AnimationSpeed = esc_attr( get_post_meta( $_ID, '_dima_flex_slide_animation_speed', true ) );
		$ControlNav     = esc_attr( get_post_meta( $_ID, '_dima_flex_slide_control_nav', true ) );
		$Gallery_List   = get_post_meta( $_ID, '_post_image_gallery', true );
		$attachments    = array_filter( explode( ',', $Gallery_List ) );

		$js_data = array(
			'animation'      => ( $Animation == 'fade' ) ? 'fade' : 'slide',
			'slideshowSpeed' => ( $SlideshowSpeed != '' ) ? $SlideshowSpeed : '7000',
			'slideSpeed'     => ( $AnimationSpeed != '' ) ? $AnimationSpeed : '600',
			'controlNav'     => ( $ControlNav != 'true' ) ? false : true,
		);

		$data = dima_creat_data_attributes( 'slider', $js_data );

		if ( $attachments ) {
			echo '<div class="post-img"><div class="flexslider sample-slide small-control" ' . $data . '><ul class="slides">';
			foreach ( $attachments as $attachment ) {

				echo '<li class="slide-item">';
				$thumb = dima_helper::dima_get_thumb_gallery( $args, $attachment );
				echo $thumb;
				echo '</li>';
			}
			echo '</ul></div></div>';
		} else if ( has_post_thumbnail() ) {
			$thumb = dima_helper::dima_get_thumb( $args );
			printf( '<div class="post-img"><div class="entry-thumb">%s</div></div>', $thumb );
		}

	}
endif;

if ( ! function_exists( 'dima_portfolio_featured_image' ) ) :
	function dima_portfolio_featured_image( $args = array() ) {
		$default_args = array(
			'post_type' => '',
			'img_hover' => '',
			'elm_hover' => '',
			'no_border' => '',
			'class'     => array()
		);

		$args = wp_parse_args( $args, $default_args );
		$url  = wp_get_attachment_url( get_post_thumbnail_id() );
		if ( has_post_thumbnail() ) {

			if ( dima_helper::dima_is_single_portfolio() && $args['related'] != "true" ) {
				$thumb = dima_helper::dima_get_post_thumb( array(
					'size'      => 'dima-big-image-single',
					'is_linked' => false
				) );
			} elseif ( $args['post_type'] === 'grid' ) {
				$thumb = dima_helper::dima_get_post_thumb( array(
					'size'      => 'dima-portfolio-grid-image',
					'is_linked' => false
				) );
			} else {
				$thumb = dima_helper::dima_get_post_thumb( array(
					'size'      => 'dima-massonry-image',
					'is_linked' => false
				) );
			}

			if ( is_singular() && ! is_page() && $args['related'] != "true" ) {
				printf( '<div class="post-img"><div class="entry-thumb">%s</div></div>', $thumb );
			} else {

				switch ( $args['img_hover'] ) {
					case 'zoom-out':
						$args['img_hover'] = " effect-roxy";
						break;
					case 'zoom-in':
						$args['img_hover'] = " effect-julia";
						break;
					case 'gray':
						$args['img_hover'] = " apply-gray";
						break;
					case 'none':
					default:
						$args['img_hover'] = " post-feature";
						break;
				}

				dima_get_portfolio_item( $args, $url, $thumb );

			}
		}

	}
endif;

if ( ! function_exists( 'dima_get_portfolio_item' ) ) {
	function dima_get_portfolio_item( $args = array(), $url, $thumb ) {
		$_ID = get_the_ID();

		$terms    = get_the_terms( $_ID, 'portfolio-category' );
		$ext_link = dima_portfolio_item_project_link();
		$target   = $ext_link == '' ? '' : 'target="_blank"';
		$ext_link = $ext_link == '' ? get_permalink() : $ext_link;

		switch ( $args['elm_hover'] ) {
			case 'none':
				$hover = '<div class="post-img"><div class="' . $args['img_hover'] . '"><a href="%1$s">%3$s</a></div></div>';
				break;

			case 'title':
				$hover = '<div class="work-item title-style">                
                          <div class="' . $args['img_hover'] . '">
                            <a href="%1$s" class="entry-thumb" title="%2$s">
                              %3$s
                            </a>
                            <div class="link_overlay">
                            <div class="work-info">
                              <div class="work-title text-center">
                                <p><a href="%1$s" title="%2$s">%4$s</a></p>
                              </div>';

				$hover .= '<span class="cat-sep"></span>';
				$hover .= '<ul class="porftfolio-cat text-center">';
				if ( isset( $terms[0]->slug ) ) {
					if ( sizeof( $terms ) == 1 ) {
						$portfolio_category = get_term_link( rawurldecode( $terms[0]->slug ), 'portfolio-category' );

						$hover .= '<li>
                                    <a href="?portfolio-category=' . rawurldecode( $portfolio_category ) . '">' . $terms[0]->name . '</a>
                               </li>';

					} elseif ( sizeof( $terms ) > 1 ) {

						foreach ( $terms as $term ) {
							$portfolio_category = get_term_link( rawurldecode( $term->slug ), 'portfolio-category' );

							$hover .= '<li>
                                    <a href="' . rawurldecode( $portfolio_category ) . '">' . $term->name . '</a>
                               </li>';
							$hover .= '<li><span class="sep">,</span></li> ';
						}
					}
				}
				$hover .= '</ul>
                            </div>';
				if ( $args['no_border'] == 'false' ) {
					$hover .= '<span class="topaz-hover"></span>';
				}

				$hover .= '</div>
                            </div>
                         </div>';
				break;
			default:
				$hover = '<div class="work-item">
                         <div class="' . $args['img_hover'] . '">
                            <a href="%1$s" class="entry-thumb" title="%2$s">
                              %3$s
                            </a>
                            <div class="post-icon link_overlay">
                                <ul class="icons-media">
                                  <li>
                                    <a data-lightbox="image" href="' . $url . '">
                                      <i class="fa fa-search"></i>
                                    </a>
                                  </li>
                                  <li>
                                    <a data-load="true" href="%1$s" ' . esc_attr( $target ) . 'title="%2$s">
                                      <i class="fa fa-link"></i>
                                    </a>
                                  </li>
                                </ul>';
				if ( $args['no_border'] == 'false' ) {
					$hover .= '<span class="topaz-hover"></span>';
				}
				$hover .= '</div>
                            </div>
                         </div>';

		}

		printf( $hover,
			esc_url( rawurldecode( $ext_link ) ),
			esc_attr( sprintf( esc_html__( 'Permalink to: "%s"', 'okab' ), the_title_attribute( 'echo=0' ) ) ),
			$thumb,
			the_title_attribute( 'echo=0' )
		);

	}
}

if ( ! function_exists( 'dima_featured_portfolio' ) ) :
	/**
	 * Featured Portfolio
	 *
	 * @param array $args
	 */
	function dima_featured_portfolio( $args = array() ) {

		dima_portfolio_featured_image( array(
			'post_type' => $args['post_type'],
			'img_hover' => $args['img_hover'],
			'elm_hover' => $args['elm_hover'],
			'no_border' => $args['no_border'],
		) );
	}
endif;

if ( ! function_exists( 'dima_featured_realated_portfolio' ) ) :
	/**
	 * Featured Portfolio
	 *
	 * @param array $args
	 */
	function dima_featured_realated_portfolio( $args = array() ) {

		dima_portfolio_featured_image( array(
			'post_type' => $args['post_type'],
			'img_hover' => $args['img_hover'],
			'elm_hover' => $args['elm_hover'],
			'no_border' => $args['no_border'],
			'related'   => $args['related'],
		) );
	}
endif;

/**
 * Featured Video
 */
if ( ! function_exists( 'dima_featured_video' ) ) :
	function dima_featured_video( $post_type = 'video' ) {
		$_ID = get_the_ID();
		//$aspect_ratio = get_post_meta($_ID, '_dima_' . $post_type . '_aspect_ratio', true);
		$m4v      = get_post_meta( $_ID, '_dima_' . $post_type . '_m4v', true );
		$ogv      = get_post_meta( $_ID, '_dima_' . $post_type . '_ogv', true );
		$embed    = get_post_meta( $_ID, '_dima_' . $post_type . '_embed', true );
		$thumb_id = get_post_thumbnail_id();


		$thumb_url = wp_get_attachment_image_src( $thumb_id, 'full', null );


		if ( $embed != '' ) {
			echo "<div class='post-img'>"
			     . do_shortcode( '[dima_embed_video  poster="' . $thumb_url[0] . '"]' . stripslashes( htmlspecialchars_decode( $embed ) ) . '[/dima_embed_video]' )
			     . "</div>";
		} elseif ( $m4v != '' || $ogv != '' ) {
			echo "<div class='post-img'>"
			     . do_shortcode( '[dima_video_player m4v="' . $m4v . '" ogv="' . $ogv . '" poster="' . $thumb_url[0] . '" preload="none" hide_controls="false" autoplay="false" loop="false" muted="false" class="mvn"]' )
			     . "</div>";
		}
	}
endif;

/**
 * Featured Audio
 */
if ( ! function_exists( 'dima_featured_audio' ) ) :
	function dima_featured_audio() {

		$_ID   = get_the_ID();
		$mp3   = get_post_meta( $_ID, '_dima_audio_mp3', true );
		$ogg   = get_post_meta( $_ID, '_dima_audio_ogg', true );
		$embed = get_post_meta( $_ID, '_dima_audio_embed', true );

		if ( $embed != '' ) {
			echo "<div class='post-audio post-img'>" . do_shortcode( '[dima_embed_audio class="mvn"]' . stripslashes( htmlspecialchars_decode( $embed ) ) . '[/dima_embed_audio]' ) . "</div>";
		} elseif ( $mp3 != '' || $ogg != '' ) {
			echo "<div class='post-audio post-img'>" . do_shortcode( '[dima_audio_player mp3="' . $mp3 . '" oga="' . $ogg . '" preload="none" autoplay="false" loop="false" class="mvn"]' ) . "</div>";
		}

	}
endif;

