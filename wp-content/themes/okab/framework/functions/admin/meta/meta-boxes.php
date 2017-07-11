<?php

/**
 * Registers the meta boxes for pages-posts- portfolio.
 *
 * Display the gallery images meta box.
 *
 * @package Dima Framework
 * @subpackage Admin Meta
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * [dima_meta_boxes_in_post description]
 */

function dima_meta_boxes_in_post() {

	$sidebars_name = array( '' => esc_html__( 'Default', 'okab' ) );
	$sidebars_id   = array( '' => '' );
	foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
		$sidebars_name[ $sidebar['id'] ] = ucwords( $sidebar['name'] );
		$sidebars_id[ $sidebar['id'] ]   = ucwords( $sidebar['id'] );
	}

	/**
	 * Pages
	 */
	$meta_box = array(
		'id'          => 'dima-meta-box-page',
		'title'       => esc_html__( 'Page Settings', 'okab' ),
		'description' => esc_html__( 'Here you will find various options you can use to create different page styles.', 'okab' ),
		'page'        => 'page',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'name' => esc_html__( 'Body CSS Class(es)', 'okab' ),
				'desc' => esc_html__( 'Add a custom CSS class to the &lt;body&gt; element. Separate multiple class names with a space.', 'okab' ),
				'id'   => '_dima_entry_body_css_class',
				'type' => 'text',
				'std'  => ''
			),
			array(
				'name'    => esc_html__( 'Site Layout', 'okab' ),
				'desc'    => esc_html__( 'Choose your site layout', 'okab' ),
				'id'      => '_dima_page_site_layout',
				'type'    => 'select',
				'values'  => array( '', 'full-width', 'boxed' ),
				'std'     => '',
				'options' => array( 'Default', 'Fullwidth', 'Boxed' )
			),

			array(
				'name'    => esc_html__( 'Header Styles', 'okab' ),
				'desc'    => esc_html__( 'Using this option you can choose your header style', 'okab' ),
				'id'      => '_dima_page_header_style',
				'type'    => 'select',
				'std'     => '',
				'values'  => array( '', 'fill-width', 'floating', 'fixed-left', 'fixed-right' ),
				'options' => array(
					''            => esc_html__( 'Default', 'okab' ),
					'fill-width'  => esc_html__( 'Full-Width', 'okab' ),
					'floating'    => esc_html__( 'Floating', 'okab' ),
					'fixed-left'  => esc_html__( 'Fixed Left', 'okab' ),
					'fixed-right' => esc_html__( 'Fixed Right', 'okab' )
				)
			),

			array(
				'name' => esc_html__( 'Transparent Menu?', 'okab' ),
				'desc' => esc_html__( 'Enabling this option will add padding before page title.', 'okab' ),
				'id'   => '_dima_page_transparent_menu',
				'type' => 'checkbox',
				'std'  => ''
			),

			array(
				'name' => esc_html__( 'One Page Navigation', 'okab' ),
				'desc' => esc_html__( 'Choose your One Page navigation menu', 'okab' ),
				'id'   => '_dima_one_page_navigation',
				'type' => 'menus',
				'std'  => 'Deactivated'
			),

			array(
				'name' => esc_html__( 'Body Background Image', 'okab' ),
				'desc' => esc_html__( 'Select an image to use for the outer background (For boxed layout only).', 'okab' ),
				'id'   => '_dima_page_background_image',
				'type' => 'uploader',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Repeated Background', 'okab' ),
				'desc' => esc_html__( 'Check to apply repeated background image (For boxed layout only)', 'okab' ),
				'id'   => '_dima_page_background_image_repeated',
				'type' => 'checkbox',
				'std'  => ''
			),


			array(
				'name' => esc_html__( 'Fullwidth Section', 'okab' ),
				'desc' => esc_html__( 'Check to apply fullwidth sections to this page (by checking this option, the sidebar will disappear)', 'okab' ),
				'id'   => '_dima_page_section_fullwidth',
				'type' => 'checkbox',
				'std'  => ''
			),
			array(
				'name'    => esc_html__( 'Content Layout', 'okab' ),
				'desc'    => esc_html__( 'If your global content layout includes a sidebar, selecting this options will affect this page only.', 'okab' ),
				'id'      => '_dima_page_layout',
				'type'    => 'select',
				'std'     => '',
				'values'  => array( '', 'mini', 'no-sidebar', 'left-sidebar', 'right-sidebar' ),
				'options' => array(
					esc_html__( 'Default', 'okab' ),
					__( 'Mini', 'okab' ),
					__( 'No Sidebar', 'okab' ),
					__( 'Left Sidebar', 'okab' ),
					__( 'Right Sidebar', 'okab' )
				)
			),
			array(
				'name'    => esc_html__( 'Sidebar', 'okab' ),
				'desc'    => esc_html__( 'Choose Sidebar.', 'okab' ),
				'id'      => '_dima_page_sidebar',
				'type'    => 'select',
				'std'     => '',
				'values'  => $sidebars_id,
				'options' => $sidebars_name
			),

			array(
				'name'    => esc_html__( 'Page Title Display', 'okab' ),
				'desc'    => esc_html__( 'Choose to show or hide the page title bar.', 'okab' ),
				'id'      => '_dima_page_breadcumbs_display',
				'type'    => 'select',
				'values'  => array( '', 'on', 'off' ),
				'options' => array(
					esc_html__( 'Default', 'okab' ),
					__( 'On', 'okab' ),
					__( 'Off', 'okab' )
				),
				'std'     => ''
			),
			array(
				'name'    => esc_html__( 'Breadcrumbs Display', 'okab' ),
				'desc'    => esc_html__( 'Choose to show or hide the breadcrumbs bar.', 'okab' ),
				'id'      => '_dima_page_breadcumbs_list_display',
				'type'    => 'select',
				'values'  => array( '', 'on', 'off' ),
				'options' => array(
					esc_html__( 'Default', 'okab' ),
					__( 'On', 'okab' ),
					__( 'Off', 'okab' )
				),
				'std'     => ''
			),
			array(
				'name' => esc_html__( 'Subtitle', 'okab' ),
				'desc' => esc_html__( 'Add your page subtitle', 'okab' ),
				'id'   => '_dima_page_breadcumbs_subtitle',
				'type' => 'text',
				'std'  => ''
			),
			array(
				'name' => esc_html__( 'Page Title Backgrounds', 'okab' ),
				'desc' => esc_html__( 'Upload your background image, or enter image URL lnik using the field.', 'okab' ),
				'id'   => '_dima_page_breadcumbs_image',
				'type' => 'uploader',
				'std'  => ''
			),
			array(
				'name'    => esc_html__( 'Page Title Backgrounds Parallax Style', 'okab' ),
				'desc'    => esc_html__( 'Choose the animation effect for the background image.', 'okab' ),
				'id'      => '_dima_page_breadcumbs_image_style',
				'type'    => 'select',
				'values'  => array( '', 'parallax', 'fixed' ),
				'std'     => '',
				'options' => array(
					esc_html__( 'None', 'okab' ),
					__( 'Parallax', 'okab' ),
					esc_html__( 'Fixed Parallax', 'okab' )
				)
			),
			array(
				'name'    => esc_html__( 'Page Title Position', 'okab' ),
				'desc'    => esc_html__( 'You can change Page Title position to start (left) or center', 'okab' ),
				'id'      => '_dima_page_breadcumbs_position',
				'type'    => 'select',
				'values'  => array( '', 'start', 'center' ),
				'std'     => '',
				'options' => array(
					esc_html__( 'default', 'okab' ),
					__( 'start', 'okab' ),
					__( 'center', 'okab' )
				)
			),
			array(
				'name' => esc_html__( 'Element Shortcode Above the Sidebar', 'okab' ),
				'desc' => esc_html__( 'Enter here a shortcode created by OKAB to display it above the sidebar and below page title.', 'okab' ),
				'id'   => '_dima_page_shortcode_above_sidebar',
				'type' => 'textarea',
				'std'  => ''
			)

		)
	);

	dima_add_meta_box( $meta_box );

	/**
	 * Post Settings
	 */
	$page_and_post = array( 'post', 'page' );

	$meta_box = array(
		'id'          => 'dima-meta-box-post',
		'title'       => esc_html__( 'Post Settings', 'okab' ),
		'description' => esc_html__( 'Here you will find various options you can use to create different Post styles.', 'okab' ),
		'page'        => 'post',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'name' => esc_html__( 'Body CSS Class(es)', 'okab' ),
				'desc' => esc_html__( 'Add a custom CSS class to the &lt;body&gt; element. Separate multiple class names with a space.', 'okab' ),
				'id'   => '_dima_entry_body_css_class',
				'type' => 'text',
				'std'  => ''
			),
			array(
				'name'    => esc_html__( 'Content Layout', 'okab' ),
				'desc'    => esc_html__( 'If your global content layout includes a sidebar, selecting this options will affect this page only.', 'okab' ),
				'id'      => '_dima_post_layout',
				'type'    => 'select',
				'std'     => '',
				'values'  => array( '', 'mini', 'no-sidebar', 'left-sidebar', 'right-sidebar' ),
				'options' => array(
					esc_html__( 'Default', 'okab' ),
					__( 'Mini', 'okab' ),
					__( 'No Sidebar', 'okab' ),
					__( 'Left Sidebar', 'okab' ),
					__( 'Right Sidebar', 'okab' )
				)
			),

			array(
				'name' => esc_html__( 'Transparent Menu?', 'okab' ),
				'desc' => esc_html__( 'Enabling this option will add padding before page title', 'okab' ),
				'id'   => '_dima_post_transparent_menu',
				'type' => 'checkbox',
				'std'  => ''
			),

			array(
				'name' => esc_html__( 'Custom Post', 'okab' ),
				'desc' => esc_html__( 'Enabling this option will remove padding from post content and hide the post title', 'okab' ),
				'id'   => '_dima_post_custom_menu',
				'type' => 'checkbox',
				'std'  => ''
			),

			array(
				'name'    => esc_html__( 'Sidebar', 'okab' ),
				'desc'    => esc_html__( 'Choose Sidebar.', 'okab' ),
				'id'      => '_dima_post_sidebar',
				'type'    => 'select',
				'std'     => '',
				'values'  => $sidebars_id,
				'options' => $sidebars_name
			),

			array(
				'name'    => esc_html__( 'Page Title Display', 'okab' ),
				'desc'    => esc_html__( 'Choose to show or hide the page title bar.', 'okab' ),
				'id'      => '_dima_post_breadcumbs_display',
				'type'    => 'select',
				'values'  => array( '', 'on', 'off' ),
				'options' => array(
					esc_html__( 'Default', 'okab' ),
					__( 'On', 'okab' ),
					__( 'Off', 'okab' )
				),
				'std'     => ''
			),
			array(
				'name'    => esc_html__( 'Breadcrumbs Display', 'okab' ),
				'desc'    => esc_html__( 'Choose to show or hide the breadcrumbs bar.', 'okab' ),
				'id'      => '_dima_post_breadcumbs_list_display',
				'type'    => 'select',
				'values'  => array( '', 'on', 'off' ),
				'options' => array(
					esc_html__( 'Default', 'okab' ),
					__( 'On', 'okab' ),
					__( 'Off', 'okab' )
				),
				'std'     => ''
			),
			array(
				'name' => esc_html__( 'Subtitle', 'okab' ),
				'desc' => esc_html__( 'Add your page subtitle', 'okab' ),
				'id'   => '_dima_post_breadcumbs_subtitle',
				'type' => 'text',
				'std'  => ''
			),
			array(
				'name' => esc_html__( 'Page Title Backgrounds', 'okab' ),
				'desc' => esc_html__( 'Upload your background image, or enter image URL lnik using the field.', 'okab' ),
				'id'   => '_dima_post_breadcumbs_image',
				'type' => 'uploader',
				'std'  => ''
			),
			array(
				'name'    => esc_html__( 'Page Title Backgrounds Parallax Style', 'okab' ),
				'desc'    => esc_html__( 'Choose the animation effect for the background image.', 'okab' ),
				'id'      => '_dima_post_breadcumbs_image_style',
				'type'    => 'select',
				'values'  => array( '', 'parallax', 'fixed' ),
				'std'     => '',
				'options' => array(
					esc_html__( 'None', 'okab' ),
					__( 'Parallax', 'okab' ),
					esc_html__( 'Fixed', 'okab' )
				)
			),
			array(
				'name'    => esc_html__( 'Page Title Position', 'okab' ),
				'desc'    => esc_html__( 'You can change Page Title position to left (start) or center', 'okab' ),
				'id'      => '_dima_post_breadcumbs_position',
				'type'    => 'select',
				'values'  => array( '', 'start', 'center' ),
				'std'     => '',
				'options' => array(
					esc_html__( 'default', 'okab' ),
					__( 'start', 'okab' ),
					__( 'center', 'okab' )
				)
			)
		)
	);

	dima_add_meta_box( $meta_box );


	/**
	 * Portfolio Items
	 */
	$meta_box = array(
		'id'          => 'dima-meta-box-post',
		'title'       => esc_html__( 'Portfolio Settings', 'okab' ),
		'description' => esc_html__( 'Here you will find various options you can use to create different page styles.', 'okab' ),
		'page'        => 'dima-portfolio',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'name' => esc_html__( 'Body CSS Class(es)', 'okab' ),
				'desc' => esc_html__( 'Add a custom CSS class to the &lt;body&gt; element. Separate multiple class names with a space.', 'okab' ),
				'id'   => '_dima_entry_body_css_class',
				'type' => 'text',
				'std'  => ''
			),
			array(
				'name' => esc_html__( 'Fullwidth Section', 'okab' ),
				'desc' => esc_html__( 'Check to apply full width to this section (by checking this option, the sidebar will disappear)', 'okab' ),
				'id'   => '_dima_portfolio_section_fullwidth',
				'type' => 'checkbox',
				'std'  => ''
			),
			array(
				'name'    => esc_html__( 'Content Layout', 'okab' ),
				'desc'    => esc_html__( 'If your global content layout includes a sidebar, selecting this options will affect this page only.', 'okab' ),
				'id'      => '_dima_portfolio_layout',
				'type'    => 'select',
				'std'     => '',
				'values'  => array( '', 'mini', 'no-sidebar', 'left-sidebar', 'right-sidebar' ),
				'options' => array(
					esc_html__( 'Default', 'okab' ),
					__( 'Mini', 'okab' ),
					__( 'No Sidebar', 'okab' ),
					__( 'Left Sidebar', 'okab' ),
					__( 'Right Sidebar', 'okab' )
				)
			),
			array(
				'name' => esc_html__( 'Transparent Menu?', 'okab' ),
				'desc' => esc_html__( 'Enabling this option will add padding before page title', 'okab' ),
				'id'   => '_dima_portfolio_transparent_menu',
				'type' => 'checkbox',
				'std'  => ''
			),
			array(
				'name'    => esc_html__( 'Sidebar', 'okab' ),
				'desc'    => esc_html__( 'Choose Sidebar.', 'okab' ),
				'id'      => '_dima_portfolio_sidebar',
				'type'    => 'select',
				'std'     => '',
				'values'  => $sidebars_id,
				'options' => $sidebars_name
			),
			array(
				'name'    => esc_html__( 'Page Title Display', 'okab' ),
				'desc'    => esc_html__( 'Choose to show or hide the page title bar.', 'okab' ),
				'id'      => '_dima_portfolio_breadcumbs_display',
				'type'    => 'select',
				'values'  => array( '', 'on', 'off' ),
				'options' => array(
					esc_html__( 'Default', 'okab' ),
					__( 'On', 'okab' ),
					__( 'Off', 'okab' )
				),
				'std'     => ''
			),
			array(
				'name'    => esc_html__( 'Breadcrumbs Display', 'okab' ),
				'desc'    => esc_html__( 'Choose to show or hide the breadcrumbs bar.', 'okab' ),
				'id'      => '_dima_portfolio_breadcumbs_list_display',
				'type'    => 'select',
				'values'  => array( '', 'on', 'off' ),
				'options' => array(
					esc_html__( 'Default', 'okab' ),
					__( 'On', 'okab' ),
					__( 'Off', 'okab' )
				),
				'std'     => ''
			),
			array(
				'name' => esc_html__( 'Subtitle', 'okab' ),
				'desc' => esc_html__( 'Add your page subtitle', 'okab' ),
				'id'   => '_dima_portfolio_breadcumbs_subtitle',
				'type' => 'text',
				'std'  => ''
			),
			array(
				'name' => __( 'Project Link', 'okab' ),
				'desc' => __( 'Provide an external link to the project you worked on if one is available.', 'okab' ),
				'id'   => '_dima_portfolio_project_link',
				'type' => 'text',
				'std'  => ''
			),
			array(
				'name' => esc_html__( 'Page Title Backgrounds', 'okab' ),
				'desc' => esc_html__( 'Upload your background image, or enter image URL lnik using the field.', 'okab' ),
				'id'   => '_dima_portfolio_breadcumbs_image',
				'type' => 'uploader',
				'std'  => ''
			),
			array(
				'name'    => esc_html__( 'Page Title Backgrounds Parallax Style', 'okab' ),
				'desc'    => esc_html__( 'Choose the animation effect for the background image.', 'okab' ),
				'id'      => '_dima_portfolio_breadcumbs_image_style',
				'type'    => 'select',
				'values'  => array( '', 'parallax', 'fixed' ),
				'std'     => '',
				'options' => array(
					esc_html__( 'None', 'okab' ),
					__( 'Parallax', 'okab' ),
					esc_html__( 'Fixed', 'okab' )
				)
			),
			array(
				'name'    => esc_html__( 'Page Title Position', 'okab' ),
				'desc'    => esc_html__( 'You can change Page Title position to left (start) or center', 'okab' ),
				'id'      => '_dima_portfolio_breadcumbs_position',
				'type'    => 'select',
				'values'  => array( '', 'start', 'center' ),
				'std'     => '',
				'options' => array(
					esc_html__( 'default', 'okab' ),
					__( 'start', 'okab' ),
					__( 'center', 'okab' )
				)
			)
		)
	);

	dima_add_meta_box( $meta_box );

	/**
	 * Product Items
	 */
	$meta_box = array(
		'id'          => 'dima-meta-box-post',
		'title'       => esc_html__( 'Product Settings', 'okab' ),
		'description' => esc_html__( 'Here you will find various options you can use to create different product page styles.', 'okab' ),
		'page'        => 'product',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'name' => esc_html__( 'Body CSS Class(es)', 'okab' ),
				'desc' => esc_html__( 'Add a custom CSS class to the &lt;body&gt; element. Separate multiple class names with a space.', 'okab' ),
				'id'   => '_dima_entry_body_css_class',
				'type' => 'text',
				'std'  => ''
			),
			array(
				'name' => esc_html__( 'Fullwidth Section', 'okab' ),
				'desc' => esc_html__( 'Check to apply full width to this section (by checking this option, the sidebar will disappear)', 'okab' ),
				'id'   => '_dima_product_section_fullwidth',
				'type' => 'checkbox',
				'std'  => ''
			),
			array(
				'name'    => esc_html__( 'Content Layout', 'okab' ),
				'desc'    => esc_html__( 'If your global content layout includes a sidebar, selecting this options will affect this page only.', 'okab' ),
				'id'      => '_dima_product_layout',
				'type'    => 'select',
				'std'     => '',
				'values'  => array( '', 'mini', 'no-sidebar', 'left-sidebar', 'right-sidebar' ),
				'options' => array(
					esc_html__( 'Default', 'okab' ),
					esc_html__( 'Mini', 'okab' ),
					esc_html__( 'No Sidebar', 'okab' ),
					esc_html__( 'Left Sidebar', 'okab' ),
					esc_html__( 'Right Sidebar', 'okab' )
				)
			),
			array(
				'name'    => esc_html__( 'Sidebar', 'okab' ),
				'desc'    => esc_html__( 'Choose Sidebar.', 'okab' ),
				'id'      => '_dima_product_sidebar',
				'type'    => 'select',
				'std'     => '',
				'values'  => $sidebars_id,
				'options' => $sidebars_name
			),

			array(
				'name'    => esc_html__( 'Page Title Display', 'okab' ),
				'desc'    => esc_html__( 'Choose to show or hide the page title bar.', 'okab' ),
				'id'      => '_dima_product_breadcumbs_display',
				'type'    => 'select',
				'values'  => array( '', 'on', 'off' ),
				'options' => array(
					esc_html__( 'Default', 'okab' ),
					__( 'On', 'okab' ),
					__( 'Off', 'okab' )
				),
				'std'     => ''
			),
			array(
				'name'    => esc_html__( 'Breadcrumbs Display', 'okab' ),
				'desc'    => esc_html__( 'Choose to show or hide the breadcrumbs bar.', 'okab' ),
				'id'      => '_dima_product_breadcumbs_list_display',
				'type'    => 'select',
				'values'  => array( '', 'on', 'off' ),
				'options' => array(
					esc_html__( 'Default', 'okab' ),
					__( 'On', 'okab' ),
					__( 'Off', 'okab' )
				),
				'std'     => ''
			),
			array(
				'name' => esc_html__( 'Subtitle', 'okab' ),
				'desc' => esc_html__( 'Add your page subtitle', 'okab' ),
				'id'   => '_dima_product_breadcumbs_subtitle',
				'type' => 'text',
				'std'  => ''
			),
			array(
				'name' => esc_html__( 'Page Title Backgrounds', 'okab' ),
				'desc' => esc_html__( 'Upload your background image, or enter image URL lnik using the field.', 'okab' ),
				'id'   => '_dima_product_breadcumbs_image',
				'type' => 'uploader',
				'std'  => ''
			),
			array(
				'name'    => esc_html__( 'Page Title Backgrounds Parallax Style', 'okab' ),
				'desc'    => esc_html__( 'Choose the animation effect for the background image.', 'okab' ),
				'id'      => '_dima_product_breadcumbs_image_style',
				'type'    => 'select',
				'values'  => array( '', 'parallax', 'fixed' ),
				'std'     => '',
				'options' => array(
					esc_html__( 'None', 'okab' ),
					esc_html__( 'Parallax', 'okab' ),
					esc_html__( 'Fixed', 'okab' )
				)
			),
			array(
				'name'    => esc_html__( 'Page Title Position', 'okab' ),
				'desc'    => esc_html__( 'You can change Page Title position to left (start) or center', 'okab' ),
				'id'      => '_dima_product_breadcumbs_position',
				'type'    => 'select',
				'values'  => array( '', 'start', 'center' ),
				'std'     => '',
				'options' => array(
					esc_html__( 'default', 'okab' ),
					esc_html__( 'start', 'okab' ),
					esc_html__( 'center', 'okab' )
				)
			)
		)
	);

	dima_add_meta_box( $meta_box );


	/**
	 * Gallery Post
	 */

	$meta_box = array(
		'id'          => 'dima-meta-box-gallery',
		'title'       => esc_html__( 'Gallery Settings', 'okab' ),
		'description' => esc_html__( 'Gallery Post Settings.', 'okab' ),
		'page'        => 'post',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'name'    => esc_html__( 'Animation', 'okab' ),
				'desc'    => esc_html__( 'Controls the animation type, "fade" or "slide"', 'okab' ),
				'id'      => '_dima_flex_slide_animation',
				'type'    => 'select',
				'std'     => 'fade',
				'values'  => array( 'fade', 'slide' ),
				'options' => array( 'Fade', 'Slide' )
			),
			array(
				'name' => esc_html__( 'slide show Speed', 'okab' ),
				'desc' => esc_html__( 'Set the speed of the slideshow cycling, in milliseconds', 'okab' ),
				'id'   => '_dima_flex_slide_show_speed',
				'type' => 'text',
				'std'  => '7000'
			),
			array(
				'name' => esc_html__( 'Animation Speed', 'okab' ),
				'desc' => esc_html__( 'Set the speed of animations, in milliseconds.', 'okab' ),
				'id'   => '_dima_flex_slide_animation_speed',
				'type' => 'text',
				'std'  => '700'
			),
			array(
				'name'    => esc_html__( 'Display Navigation Bullets ', 'okab' ),
				'desc'    => esc_html__( 'Choose to show or hide the navigation bullets.', 'okab' ),
				'id'      => '_dima_flex_slide_control_nav',
				'type'    => 'select',
				'values'  => array( 'true', 'false' ),
				'options' => array( 'True', 'False' ),
				'std'     => 'true',

			)
		)
	);

	dima_add_meta_box( $meta_box );

	/**
	 * Quote
	 */
	$meta_box = array(
		'id'          => 'dima-meta-box-quote',
		'title'       => esc_html__( 'Quote Post Settings', 'okab' ),
		'description' => esc_html__( 'Input your quote.', 'okab' ),
		'page'        => 'post',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'name' => esc_html__( 'The Quote', 'okab' ),
				'desc' => esc_html__( 'Input your quote.', 'okab' ),
				'id'   => '_dima_quote_quote',
				'type' => 'textarea',
				'std'  => ''
			),
			array(
				'name' => esc_html__( 'Citation', 'okab' ),
				'desc' => esc_html__( 'Specify who originally said the quote.', 'okab' ),
				'id'   => '_dima_quote_cite',
				'type' => 'text',
				'std'  => ''
			)
		)
	);

	dima_add_meta_box( $meta_box );


	/**
	 * link
	 */
	$meta_box = array(
		'id'          => 'dima-meta-box-link',
		'title'       => esc_html__( 'Link Post Settings', 'okab' ),
		'description' => esc_html__( 'Input your link.', 'okab' ),
		'page'        => 'post',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'name' => esc_html__( 'The Link', 'okab' ),
				'desc' => esc_html__( 'Insert your link URL, e.g. http://www.themeforest.net.', 'okab' ),
				'id'   => '_dima_link_url',
				'type' => 'text',
				'std'  => ''
			)
		)
	);

	dima_add_meta_box( $meta_box );


	/**
	 * Video
	 */

	$meta_box = array(
		'id'          => 'dima-meta-box-video',
		'title'       => esc_html__( 'Video Post Settings', 'okab' ),
		'description' => esc_html__( 'These settings enable you to embed videos into your posts.', 'okab' ),
		'page'        => 'post',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'name' => esc_html__( 'M4V File URL', 'okab' ),
				'desc' => esc_html__( 'The URL to the .m4v video file.', 'okab' ),
				'id'   => '_dima_video_m4v',
				'type' => 'text',
				'std'  => ''
			),
			array(
				'name' => esc_html__( 'OGV File URL', 'okab' ),
				'desc' => esc_html__( 'The URL to the .ogv video file.', 'okab' ),
				'id'   => '_dima_video_ogv',
				'type' => 'text',
				'std'  => ''
			),
			array(
				'name' => esc_html__( 'Embedded Video Code', 'okab' ),
				'desc' => esc_html__( 'If you are using something other than self hosted video such as YouTube, Vimeo, or Wistia, paste the embed code here. This field will override the above.', 'okab' ),
				'id'   => '_dima_video_embed',
				'type' => 'textarea',
				'std'  => ''
			)
		)
	);

	dima_add_meta_box( $meta_box );

	/**
	 * Audio
	 */

	$meta_box = array(
		'id'          => 'dima-meta-box-audio',
		'title'       => esc_html__( 'Audio Post Settings', 'okab' ),
		'description' => esc_html__( 'These settings enable you to embed audio into your posts.', 'okab' ),
		'page'        => 'post',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'name' => esc_html__( 'MP3 File URL', 'okab' ),
				'desc' => esc_html__( 'The URL to the .mp3 audio file.', 'okab' ),
				'id'   => '_dima_audio_mp3',
				'type' => 'text',
				'std'  => ''
			),
			array(
				'name' => esc_html__( 'OGA File URL', 'okab' ),
				'desc' => esc_html__( 'The URL to the .oga or .ogg audio file.', 'okab' ),
				'id'   => '_dima_audio_ogg',
				'type' => 'text',
				'std'  => ''
			),
			array(
				'name' => esc_html__( 'Embedded Audio Code', 'okab' ),
				'desc' => esc_html__( 'If you are using something other than self hosted audio such as Soundcloud paste the embed code here. This field will override the above.', 'okab' ),
				'id'   => '_dima_audio_embed',
				'type' => 'textarea',
				'std'  => ''
			)
		)
	);

	dima_add_meta_box( $meta_box );

	/**
	 * Slide
	 */
	if ( DIMA_REVOLUTION_SLIDER_IS_ACTIVE ) {
		$meta_box = array(
			'id'          => 'dima-meta-box-slider-below',
			'title'       => esc_html__( 'Slider Settings', 'okab' ),
			'description' => esc_html__( 'Select your options to display a slider.', 'okab' ),
			'page'        => 'page',
			'context'     => 'normal',
			'priority'    => 'high',
			'fields'      => array(
				array(
					'name' => esc_html__( 'Slider : Above The Menu', 'okab' ),
					'desc' => esc_html__( 'Select an option from the dropdown.', 'okab' ),
					'id'   => '_dima_slider_above',
					'type' => 'sliders',
					'std'  => esc_html__( 'Deactivated', 'okab' )
				),
				array(
					'name' => esc_html__( 'Slider : Below The Menu', 'okab' ),
					'desc' => esc_html__( 'Select an option from the dropdown.', 'okab' ),
					'id'   => '_dima_slider_below',
					'type' => 'sliders',
					'std'  => esc_html__( 'Deactivated', 'okab' )
				)

			)
		);

		dima_add_meta_box( $meta_box );
	}
}

add_action( 'add_meta_boxes', 'dima_meta_boxes_in_post' );