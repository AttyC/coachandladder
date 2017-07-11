<?php

/**
 * Sets up the options for Customizer.
 *
 * @package Dima Framework
 * @subpackage Admin customizer
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
/************************************************************************
 * [i]: $DIMA[][] is a table 2D
 *      Content 4 type of variables
 *              1: Settings
 *              2: Sections
 *              3: Controls
 *              3: Panel
 *
 * $DIMA['sections'][] = array($sections_id,title,priority,$id_panel);
 * $DIMA['settings'][] = array($settings_id,default,transport);
 * $DIMA['controls'][] = array($controls_id,type,label,$sections_id,choices);
 * $DIMA['panel'][]    = array($id_panel, titel, description, priority);
 *
 ************************************************************************/

/**
 * Choices
 */
$list_all_font_weights         = dima_get_font_weights();
$list_all_font_weight_selected = dima_get_font_weight_selected();
$list_all_google_font_name     = dima_get_googlefonts_name();
$list_font_weights_and_name    = dima_get_googlefonts();
$list_font_subsets             = dima_get_font_subsets();


$Choices_template = array(
	'okab' => esc_html__( 'Okab', 'okab' ),
);

$Choices_demo = array(
	'okab'                => 'Okab',
	'business'            => 'Business',
	'business_rtl'        => 'Business (RTL)',
	'construction'        => 'Construction',
	'minimal_portfolio'   => 'Minimal Portfolio',
	'business_finance'    => 'Business Finance',
	'business_consulting' => 'Consulting',
	'cosmetic'            => 'Cosmetic',
	'app'                 => 'App',
	'restaurant'          => 'Restaurant',
	'hosting'             => 'Hosting',
	'magazine'            => 'Magazine',
	'minimal_blog'        => 'Minimal Blog',
	'photography'         => 'Photography',
	'shop'                => 'Shop',
	'resume'              => 'Resume'
);

$Choices_on_off = array(
	'1' => esc_html__( 'On', 'okab' ),
	'0' => esc_html__( 'Off', 'okab' )
);

$Choices_dark_light = array(
	'dark'  => esc_html__( 'Dark', 'okab' ),
	'light' => esc_html__( 'Light', 'okab' )
);

$Choices_shop_product_layout = array(
	'grid' => 'Grid',
	'list' => 'List'
);

$Choices_left_right_float = array(
	'left'  => esc_html__( 'Left', 'okab' ),
	'right' => esc_html__( 'Right', 'okab' )
);

$Choices_site_layouts = array(
	'full-width' => esc_html__( 'Fullwidth', 'okab' ),
	'boxed'      => esc_html__( 'Boxed', 'okab' )
);

$Choices_of_blog_styles = array(
	'standard'  => esc_html__( 'Standard', 'okab' ),
	'masonry'   => esc_html__( 'Masonry', 'okab' ),
	'timeline'  => esc_html__( 'Time Line', 'okab' ),
	'imageside' => esc_html__( 'Image On The Side', 'okab' )
);

$Choices_of_section_layouts = array(
	''              => esc_html__( 'Default', 'okab' ),
	'mini'          => esc_html__( 'Mini', 'okab' ),
	'right-sidebar' => esc_html__( 'Right Sidebar', 'okab' ),
	'left-sidebar'  => esc_html__( 'Left Sidebar', 'okab' ),
	'no-sidebar'    => esc_html__( 'No Sidebar', 'okab' ),
);

$Choices_of_content_layouts = array(
	'no-sidebar'    => esc_html__( 'No Sidebar', 'okab' ),
	'right-sidebar' => esc_html__( 'Right Sidebar', 'okab' ),
	'left-sidebar'  => esc_html__( 'Left Sidebar', 'okab' ),
);

$Choices_of_content_shop_layouts = array(
	''              => esc_html__( 'Default', 'okab' ),
	'right-sidebar' => esc_html__( 'Right Sidebar', 'okab' ),
	'left-sidebar'  => esc_html__( 'Left Sidebar', 'okab' ),
	'no-sidebar'    => esc_html__( 'No Sidebar', 'okab' ),
);

$Choices_look = array(
	'light' => esc_html__( 'Light', 'okab' ),
	'dark'  => esc_html__( 'Dark', 'okab' )
);

$Choices_sizing_content_width = array(
	'min'  => '50',
	'max'  => '95',
	'step' => '1'
);

$Choices_max_sizing_content_width = array(
	'min'  => '600',
	'max'  => '1500',
	'step' => '10'
);

$Choices_boxed_margin = array(
	'min'  => '0',
	'max'  => '80',
	'step' => '5'
);

$Choices_navbar_hight = array(
	'min'  => '20',
	'max'  => '500',
	'step' => '5'
);

$Choices_masonry_columns = array(
	2 => esc_html__( 'Two', 'okab' ),
	3 => esc_html__( 'Three', 'okab' ),
	4 => esc_html__( 'Four', 'okab' )
);

$Choices_navbar_position = array(
	'static-top'  => esc_html__( 'Default', 'okab' ),
	'fill-width'  => esc_html__( 'Full-Width', 'okab' ),
	'floating'    => esc_html__( 'Floating', 'okab' ),
	'fixed-left'  => esc_html__( 'Fixed Left', 'okab' ),
	'fixed-right' => esc_html__( 'Fixed Right', 'okab' )
);

$Choices_navbar_animation = array(
	'static-top'       => esc_html__( 'Static Top', 'okab' ),
	'fixed-top'        => esc_html__( 'Fixed Top', 'okab' ),
	'fixed-top-offset' => esc_html__( 'Fixed Top (Animated)', 'okab' ),
);

$Choices_logo_position = array(
	'logo-on-inline' => esc_html__( 'Logo On Inline', 'okab' ),
	'logo-on-top'    => esc_html__( 'Logo On Top', 'okab' ),
	'logo-on-center' => esc_html__( 'Logo On Center', 'okab' ),
);

$Choices_widget_areas = array(
	0 => esc_html__( 'None', 'okab' ),
	1 => esc_html__( 'One', 'okab' ),
	2 => esc_html__( 'Two', 'okab' ),
	3 => esc_html__( 'Three', 'okab' ),
	4 => esc_html__( 'Four', 'okab' )
);

$Choices_breadcrumb = array(
	"start"  => esc_html__( 'Start', 'okab' ),
	"center" => esc_html__( 'Center', 'okab' ),
);

$Choices_font_style = array(
	'bold'      => esc_html__( 'Bold', 'okab' ),
	'italic'    => esc_html__( 'Italic', 'okab' ),
	'uppercase' => esc_html__( 'Uppercase', 'okab' ),
	'underline' => esc_html__( 'Underline', 'okab' ),
);

$Choices_element_hover = array(
	"none" => esc_html__( 'None', 'okab' ),
	"okab" => esc_html__( 'Okab', 'okab' ),
);

$Choices_element_hover_related_projects = array(
	"none"  => esc_html__( 'None', 'okab' ),
	"title" => esc_html__( 'With Title', 'okab' ),
	"okab"  => esc_html__( 'With icon', 'okab' ),
);


$Choices_image_hover = array(
	"none"     => esc_html__( 'none', 'okab' ),
	"zoom-in"  => esc_html__( 'Zoom-in', 'okab' ),
	"zoom-out" => esc_html__( 'Zoom-out', 'okab' ),
	"gray"     => esc_html__( 'Black And White', 'okab' ),
);

$Choices_news_query_type = array(
	"categorie" => esc_html__( 'Categories', 'okab' ),
	"tag"       => esc_html__( 'Tags', 'okab' ),
);

$Choices_slide_animation = array(
	"slide" => esc_html__( 'Slide', 'okab' ),
	"fade"  => esc_html__( 'Fade', 'okab' ),
);

$Choices_related_projects_style = array(
	"slide" => esc_html__( 'Slide', 'okab' ),
	"grid"  => esc_html__( 'Grid', 'okab' ),
);

$categories_obj = get_categories( 'hide_empty=0' );
$categories     = array();
foreach ( $categories_obj as $pn_cat ) {
	$categories[ $pn_cat->cat_ID ] = $pn_cat->cat_name;
}
$Choices_category = $categories;