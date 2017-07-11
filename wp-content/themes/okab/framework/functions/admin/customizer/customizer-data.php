<?php
/**
 * Get customizer options based on theme style and demo name.
 *
 * @package Dima Framework
 * @subpackage Admin customizer
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

$is_dark = esc_attr( dima_helper::dima_get_option( 'dima_dark_style' ) ) == 'dark';

$list_all_font_weights      = dima_get_font_weights();
$list_all_google_font_name  = dima_get_googlefonts_name();
$list_font_weights_and_name = dima_get_googlefonts();
$list_font_subsets          = dima_get_font_subsets();

$dima_customizer_data = array(
	'dima_footer_content_top_bg'                  => '#252525',
	'dima_footer_content_bottom_bg'               => '#1C1C1A',
	'dima_footer_content_body_color'              => '#a1a1a1',
	'dima_footer_content_link_color'              => '#FFFFFF',
	'dima_footer_widget_header_color'             => '#FFFFFF',
	'dima_footer_widget_body_color'               => '#707070',
	'dima_footer_widget_link_color'               => '#a1a1a1',
	'dima_footer_widget_border_color'             => '#363636',
	'dima_news_title_bg'                          => '#ff5733',
	'dima_news_title_text_color'                  => '#ffffff',
	'dima_news_text_bg'                           => '#fafafa',
	'dima_news_text_color'                        => '#929088',
	'dima_body_background_color'                  => '#fafafa',
	'dima_body_text_color'                        => '#a1a1a1',
	'dima_body_link_color'                        => '#ff5733',
	'dima_body_link_color_hover'                  => '#ff5733',
	'dima_navbar_text_color'                      => '#707070',
	'dima_navbar_text_color_after'                => '#707070',
	'dima_navbar_text_hover_color'                => '#ff5733',
	'dima_submenu_bg_color'                       => '#ffffff',
	'dima_submenu_text_color'                     => '#707070',
	'dima_submenu_text_hover_color'               => '#ff5733',
	'dima_transparent_navbar_background_color'    => 'rgba(40, 44, 55, 0)',
	'dima_transparent_navbar_text_color'          => '#707070',
	'dima_navbar_background_color'                => '#FFFFFF',
	'dima_logo_on_top_background_color'           => '#fafafa',
	'dima_navbar_background_color_after'          => '#FFFFFF',
	'dima_navbar_topbar_color'                    => '#707070',
	'dima_navbar_topbar_background'               => '#fafafa',
	'dima_navbar_background_image'                => '',
	'dima_heading_text_color'                     => '#707070',
	'dima_logo_text_color'                        => '#707070',
	'dima_hover_overlay_bg'                       => '#ff5733',
	'dima_navbar_font_list'                       => 'Lato',
	'dima_heading_font_list'                      => 'Open Sans',
	'dima_logo_font_list'                         => 'Open Sans',
	'dima_body_subsets_list'                      => 'latin',
	'dima_body_font_list'                         => 'Lato',
	'dima_layout_site'                            => 'full-width',
	'dima_layout_content'                         => 'right-sidebar',
	'dima_layout_bbpress_content'                 => 'right-sidebar',
	'dima_header_navbar_position'                 => 'static-top',
	'dima_header_navbar_animation'                => 'static-top',
	'dima_header_navbar_offset_by_id'             => '',
	'dima_header_navbar_offset_by_px'             => '',
	'dima_header_search_enable'                   => '1',
	'dima_header_logo'                            => '',
	'dima_header_navbar_transparent'              => '0',
	'dima_header_sticky_logo'                     => '',
	'dima_header_mobile_logo'                     => '',
	'dima_header_logo_retina'                     => '',
	'dima_header_sticky_logo_retina'              => '',
	'dima_header_mobile_logo_retina'              => '',
	'dima_header_logo_width_rtl'                  => '107',
	'dima_header_logo_rtl'                        => '',
	'dima_header_sticky_logo_rtl'                 => '',
	'dima_header_mobile_logo_rtl'                 => '',
	'dima_header_logo_retina_rtl'                 => '',
	'dima_header_sticky_logo_retina_rtl'          => '',
	'dima_header_mobile_logo_retina_rtl'          => '',
	'dima_header_logo_width'                      => '107',
	'dima_navbar_max_height'                      => '110',
	'dima_navbar_shrink_height'                   => '10',
	'dima_logo_position'                          => '#logo-on-inline',
	'dima_navbar_topbar'                          => '0',
	'dima_navbar_option_address_display_topbar'   => '1',
	'dima_navbar_option_tel_display_topbar'       => '1',
	'dima_navbar_option_today_display_topbar'     => '1',
	'dima_navbar_option_myaccount_display_topbar' => '1',
	'dima_navbar_option_social_display_topbar'    => '1',
	'dima_navbar_option_address_text_topbar'      => '',
	'dima_navbar_option_tel_text_topbar'          => '',
	'dima_navbar_option_today_text_topbar'        => 'l , F j Y',
	'dima_page_title_display'                     => '1',
	'dima_breadcrumb_display'                     => '1',
	'dima_breadcrumb_background_image'            => '',
	'dima_breadcrumb_position'                    => 'center',
	'dima_news_display'                           => '0',
	'dima_news_display_home'                      => '0',
	'dima_news_title'                             => esc_html__( 'Breaking', 'okab' ),
	'dima_news_count'                             => '10',
	'dima_news_animation'                         => 'fade',
	'dima_news_query'                             => 'categories',
	'dima_news_cat_list'                          => 'categorie',
	'dima_news_tag_list'                          => '',
	'dima_template'                               => 'okab',
	'dima_demo_name'                              => 'okab',
	'dima_body_background_pattern'                => '',
	'dima_body_background_image'                  => '',
	'dima_boxed_margin'                           => '20',
	'dima_content_width'                          => '90',
	'dima_content_max_width'                      => '1200',
	'dima_loading'                                => '1',
	'dima_dark_style'                             => 'light',
	'dima_smoothscroll'                           => '0',
	'dima_main_color'                             => '',
	'dima_custom_font'                            => '0',
	'dima_body_weights_list'                      => '300,400,400italic,300italic',
	'dima_body_text_size'                         => '14',
	'dima_navbar_text_style'                      => '',
	'dima_navbar_weights_list'                    => '400',
	'dima_navbar_text_size'                       => '14',
	'dima_heading_text_style'                     => 'bold',
	'dima_heading_weights_list'                   => '700',
	'dima_heading_letter_spacing'                 => '0',
	'dima_logo_text_style'                        => '0',
	'dima_logo_weights_list'                      => '700',
	'dima_logo_text_size'                         => '50',
	'dima_logo_letter_spacing'                    => '0',
	'dima_blog_style'                             => 'standard',
	'dima_blog_layout'                            => '',
	'dima_blog_masonry_columns'                   => '2',
	'dima_blog_enable_full_post_index'            => '0',
	'dima_blog_blog_excerpt'                      => '55',
	'dima_blog_enable_post_meta'                  => '1',
	'dima_blog_enable_post_meta_cat'              => '1',
	'dima_blog_enable_post_meta_viwe'             => '1',
	'dima_blog_enable_featured_image'             => '1',
	'dima_elm_hover'                              => 'okab',
	'dima_img_hover'                              => 'none',
	'dima_pagination_post'                        => '1',
	'dima_shear_icons_post'                       => '1',
	'dima_shear_icons_shop'                       => '1',
	'dima_shop_slide_animation'                   => 'fade',
	'dima_author_post'                            => '1',
	'dima_post_related_display'                   => '1',
	'dima_post_related_is_slide'                  => '1',
	'dima_post_related_columns'                   => '3',
	'dima_post_related_count'                     => '4',
	'dima_sidebar_widget_header_size'             => '18',
	'dima_sidebar_widget_header_uppercase'        => '1|bold',
	'dima_sidebar_widget_body_size'               => '14',
	'dima_sidebar_widget_body_uppercase'          => '0',
	'dima_shop_menu'                              => '1',
	'dima_shop_menu_price'                        => '1',
	'dima_shop_sub_menu'                          => '1',
	'dima_shop_layout'                            => '',
	'dima_shop_columns'                           => '3',
	'dima_shop_posts_per_page'                    => '12',
	'dima_shop_sort'                              => '1',
	'dima_shop_product_layout'                    => 'grid',
	'dima_shop_product_tap_display'               => '1',
	'dima_shop_description_tap_display'           => '1',
	'dima_shop_info_tap_display'                  => '1',
	'dima_shop_reviews_tap_display'               => '1',
	'dima_shop_related_products_display'          => '1',
	'dima_shop_related_product_columns'           => '3',
	'dima_shop_related_product_count'             => '12',
	'dima_shop_upsells_display'                   => '1',
	'dima_shop_upsells_columns'                   => '3',
	'dima_shop_upsells_count'                     => '4',
	'dima_shop_cart_display'                      => '1',
	'dima_shop_cart_columns'                      => '3',
	'dima_shop_cart_count'                        => '4',
	'dima_footer_big'                             => '1',
	'dima_footer_bottom_center'                   => '0',
	'dima_footer_bottom'                          => '1',
	'dima_footer_menu_display'                    => '1',
	'dima_footer_go_to_top'                       => '1',
	'dima_footer_content_display'                 => '1',
	'dima_footer_content_text'                    => 'Copyright © 2016 <a href="https://pixeldima.com/">PixelDima</a>. Powered by WordPress.',
	'dima_footer_widget_areas'                    => '4',
	'dima_footer_widget_header_size'              => '18',
	'dima_footer_widget_header_uppercase'         => '1',
	'dima_footer_widget_body_size'                => '14',
	'dima_footer_widget_body_uppercase'           => '0',
	'dima_open_graph_meta_tag'                    => '0',
	 //WP-UNDER-4.7
	'dima_custom_style'                           => '',
	'dima_custom_js'                              => '',
	'dima_space_before_head'                      => '',
	'dima_space_before_body'                      => '',
	'dima_google_map_api_key'                     => '',
	'dima_social_facebook'                        => '',
	'dima_social_twitter'                         => '',
	'dima_social_googleplus'                      => '',
	'dima_social_linkedin'                        => '',
	'dima_social_youtube'                         => '',
	'dima_social_vimeo'                           => '',
	'dima_social_foursquare'                      => '',
	'dima_social_tumblr'                          => '',
	'dima_social_instagram'                       => '',
	'dima_social_dribbble'                        => '',
	'dima_social_flickr'                          => '',
	'dima_social_behance'                         => '',
	'dima_social_pinterest'                       => '',
	'dima_social_whatsapp'                        => '',
	'dima_social_soundcloud'                      => '',
	'dima_social_rss'                             => '',
	'dima_favicon'                                => '',
	'dima_iphone_icon'                            => '',
	'dima_iphone_retina_icon'                     => '',
	'dima_ipad_icon'                              => '',
	'dima_ipad_retina_icon'                       => '',
	'dima_opengraph_image'                        => '',
	'dima_body_font_and_weight_list'              => $list_font_weights_and_name,
	'dima_logo_font_and_weight_list'              => $list_font_weights_and_name,
	'dima_navbar_font_and_weight_list'            => $list_font_weights_and_name,
	'dima_heading_font_and_weight_list'           => $list_font_weights_and_name,
	'dima_body_weight_selected'                   => '300',
	'dima_logo_weight_selected'                   => '700',
	'dima_navbar_weight_selected'                 => '300',
	'dima_heading_weight_selected'                => '700',
	'dima_projects_related_display'               => '1',
	'dima_projects_related_style'                 => 'grid',
	'dima_projects_related_columns'               => '3',
	'dima_projects_related_count'                 => '3',
	'dima_projects_related_elm_hover'             => '',
	'dima_projects_related_img_hover'             => '',
	'dima_projects_related_border'                => '1',
	'dima_projects_slug_name'                     => 'dima-portfolio'
);

if ( $is_dark ) {
	$customizer_data_dark = array(
		'dima_navbar_background_color'  => '#252525',
		'dima_navbar_topbar_background' => '#3D3D39',
		'dima_news_title_bg'            => '#ff5733',
		'dima_news_title_text_color'    => '#FFFFFF',
		'dima_heading_text_color'       => '#FFFFFF',
		'dima_news_text_bg'             => '#dedcd6',
		'dima_news_text_color'          => '#929088',
		'dima_body_text_color'          => '#bbbbbb',

	);
	$dima_customizer_data = array_merge( $dima_customizer_data, $customizer_data_dark );
	//print_r($customizer_data);
}

if ( is_rtl() ) {
	$body_default_font    = 'Droid Arabic Naskh';
	$heading_default_font = 'Droid Arabic Kufi';
	$customizer_data_dark = array(
		'dima_navbar_font_list'  => $body_default_font,
		'dima_heading_font_list' => $heading_default_font,
		'dima_logo_font_list'    => $heading_default_font,
		'dima_body_font_list'    => $body_default_font,
	);
	$dima_customizer_data = array_merge( $dima_customizer_data, $customizer_data_dark );
}
?>