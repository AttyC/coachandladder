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


if ( ! function_exists( 'dima_vc_map_shortcodes' ) && dima_vc_config_on() ) {

	function dima_vc_map_shortcodes() {

		$class_des = esc_html__( '(Optional) Enter a unique class name.', 'okab' );
		$id_des    = esc_html__( '(Optional) Enter a unique ID.', 'okab' );
		GLOBAL $dima_vc;


		/**
		 * Container.
		 */
		vc_map(
			array(
				'base'            => 'container',
				'name'            => esc_html__( 'Container', 'okab' ),
				'weight'          => 990,
				'class'           => 'dima-vc-element',
				'icon'            => 'container',
				'category'        => esc_html__( 'Structure', 'okab' ),
				'description'     => esc_html__( 'Include a container in your content to work with a custom columns', 'okab' ),
				'as_parent'       => array(
					'only' => 'column'
				),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'no_margin',
						'heading'     => esc_html__( 'Marginless Columns', 'okab' ),
						'description' => esc_html__( 'Select to remove the spacing between columns.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'false'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Column.
		 */
		vc_map(
			array(
				'base'            => 'column',
				'name'            => esc_html__( 'column', 'okab' ),
				'weight'          => 990,
				'class'           => 'dima-vc-element dima-vc-element-columns',
				'icon'            => 'columns',
				'category'        => esc_html__( 'Structure', 'okab' ),
				'description'     => esc_html__( 'Create a custom columns', 'okab' ),
				'as_child'        => array( 'only' => 'container' ),
				'as_parent'       => array(
					'except' => 'container,vc_row_inner,vc_row,accordion_item,tab_nav_item,client'
				),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'animation',
						'heading'     => esc_html__( 'Animation', 'okab' ),
						'description' => esc_html__( 'Select the type of animation you want to use.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => $dima_vc->dima_animate_list,
					),
					array(
						'param_name'  => 'delay',
						'heading'     => esc_html__( 'Delay Animation', 'okab' ),
						'description' => esc_html__( 'Set when the animation start (milliseconds)', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'delay_offset',
						'heading'     => esc_html__( 'Delay Animation Offset', 'okab' ),
						'description' => esc_html__( 'Set the number ( px,%..) from the top of the viewport where the animation start.', 'okab' ) . "<a href='http://imakewebthings.com/waypoints/api/offset-option/' target='_blank' >" . esc_html__( 'Read More', 'okab' ) . "</a>",
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'xld',
						'heading'     => esc_html__( 'Extra Large devices', 'okab' ),
						'group'       => esc_html__( 'Responsive Width', 'okab' ),
						'description' => esc_html__( 'Select column width for Extra Large devices Desktops ( ≥1600px ).', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => $dima_vc->vc_column_width_list,
						'std'         => ''
					),
					array(
						'param_name'  => 'ld',
						'heading'     => esc_html__( 'Large devices', 'okab' ),
						'group'       => esc_html__( 'Responsive Width', 'okab' ),
						'description' => esc_html__( 'Select column width for Large devices Desktops ( ≥1140px ).', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => $dima_vc->vc_column_width_list,
						'std'         => ''
					),
					array(
						'param_name'  => 'md',
						'heading'     => esc_html__( 'Medium Devise', 'okab' ),
						'group'       => esc_html__( 'Responsive Width', 'okab' ),
						'description' => esc_html__( 'Select column width for medium devise ( ≥989px ).', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => $dima_vc->vc_column_width_list,
						'std'         => ''
					),
					array(
						'param_name'  => 'sd',
						'heading'     => esc_html__( 'Small devices Tablets', 'okab' ),
						'group'       => esc_html__( 'Responsive Width', 'okab' ),
						'description' => esc_html__( 'Select column width for Small devices Tablets ( ≥768px ).', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => $dima_vc->vc_column_width_list,
						'std'         => '6'
					),
					array(
						'param_name'  => 'xsd',
						'heading'     => esc_html__( 'Extra small devices Phones', 'okab' ),
						'group'       => esc_html__( 'Responsive Width', 'okab' ),
						'description' => esc_html__( 'Select column width for Extra small devices Phones ( <768px ).', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => $dima_vc->vc_column_width_list,
						'std'         => '12'
					),
					//***offset
					array(
						'param_name'  => 'offset_xld',
						'heading'     => esc_html__( 'Extra Large devices', 'okab' ),
						'group'       => esc_html__( 'Responsive Offset', 'okab' ),
						'description' => esc_html__( 'Select column offset for Extra Large devices Desktops ( ≥1600px ).', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => $dima_vc->vc_column_width_list,
						'std'         => ''
					),
					array(
						'param_name'  => 'offset_ld',
						'heading'     => esc_html__( 'Large devices Desktops  ', 'okab' ),
						'group'       => esc_html__( 'Responsive Offset', 'okab' ),
						'description' => esc_html__( 'Select column offset for Large devices Desktops ( ≥1140px ).', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => $dima_vc->vc_column_width_list,
						'std'         => ''
					),
					array(
						'param_name'  => 'offset_md',
						'heading'     => esc_html__( 'Medium Devise', 'okab' ),
						'group'       => esc_html__( 'Responsive Offset', 'okab' ),
						'description' => esc_html__( 'Select column offset for medium devise ( ≥989px ).', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => $dima_vc->vc_column_width_list,
						'std'         => ''
					),
					//***visibility
					array(
						'param_name'  => 'visibility_xld',
						'heading'     => esc_html__( 'Extra Large devices', 'okab' ),
						'group'       => esc_html__( 'Responsive Visibility', 'okab' ),
						'description' => esc_html__( 'Choose column visibility for Extra Large devices Desktops ( ≥1600px ).', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => $dima_vc->vc_column_visibility,
						'std'         => ''
					),
					array(
						'param_name'  => 'visibility_ld',
						'heading'     => esc_html__( 'Large devices', 'okab' ),
						'group'       => esc_html__( 'Responsive Visibility', 'okab' ),
						'description' => esc_html__( 'Choose column visibility for Large devices Desktops ( ≥1140px ).', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => $dima_vc->vc_column_visibility,
						'std'         => ''
					),
					array(
						'param_name'  => 'visibility_md',
						'heading'     => esc_html__( 'Medium Devise', 'okab' ),
						'group'       => esc_html__( 'Responsive Visibility', 'okab' ),
						'description' => esc_html__( 'Choose column visibility for medium devise ( ≥989px ).', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => $dima_vc->vc_column_visibility,
						'std'         => ''
					),
					array(
						'param_name'  => 'visibility_sd',
						'heading'     => esc_html__( 'Small devices', 'okab' ),
						'group'       => esc_html__( 'Responsive Visibility', 'okab' ),
						'description' => esc_html__( 'Choose column visibility for Small devices Tablets ( ≥768px ).', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => $dima_vc->vc_column_visibility,
						'std'         => ''
					),
					array(
						'param_name'  => 'visibility_xsd',
						'heading'     => esc_html__( 'Extra small devices', 'okab' ),
						'group'       => esc_html__( 'Responsive Visibility', 'okab' ),
						'description' => esc_html__( 'Choose column visibility for Extra small devices Phones ( <768px ).', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => $dima_vc->vc_column_visibility,
						'std'         => ''
					),
					///****
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Line.
		 */
		vc_map(
			array(
				'base'        => 'line',
				'name'        => esc_html__( 'Line', 'okab' ),
				'weight'      => 980,
				'class'       => 'dima-vc-element dima-vc-element-line',
				'icon'        => 'line',
				'category'    => esc_html__( 'Structure', 'okab' ),
				'description' => esc_html__( 'Place a horizontal line in your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'type',
						'heading'     => esc_html__( 'Line Style', 'okab' ),
						'description' => esc_html__( 'Choose line style.', 'okab' ),
						'type'        => 'dropdown',
						'save_always' => true,
						'value'       => array(
							esc_html__( 'Default', 'okab' ) => '',
							esc_html__( 'Double', 'okab' )  => 'double',
							esc_html__( 'Dashed', 'okab' )  => 'dashed',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Divider.
		 */
		vc_map(
			array(
				'base'        => 'divider',
				'name'        => esc_html__( 'Divider', 'okab' ),
				'weight'      => 980,
				'class'       => 'dima-vc-element dima-vc-element-divider',
				'icon'        => 'divider',
				'category'    => esc_html__( 'Structure', 'okab' ),
				'description' => esc_html__( 'Place a horizontal divider in your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'direction',
						'heading'     => esc_html__( 'Divider Position', 'okab' ),
						'description' => esc_html__( 'Select the Position of the divider and icon.', 'okab' ),
						'type'        => 'dropdown',
						'save_always' => true,
						'value'       => array(
							esc_html__( 'Select Option', 'okab' ) => '',
							esc_html__( 'Start', 'okab' )         => 'start',
							esc_html__( 'Center', 'okab' )        => 'center',
							esc_html__( 'End', 'okab' )           => 'end',
						),
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'full',
						'heading'     => esc_html__( 'Full Width', 'okab' ),
						'description' => esc_html__( 'Check to make the divider full-width.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'direction',
							'value'   => 'center',
						),
						'value'       => array(
							'' => 'true'
						)
					),

					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Icons library', 'okab' ),
						'value'       => array(
							esc_html__( 'Font Awesome', 'okab' ) => 'fontawesome',
							esc_html__( 'Custom Font', 'okab' )  => 'customfont',
						),
						'param_name'  => 'icon_type',
						'description' => esc_html__( 'Select icons library.', 'okab' ),
					),
					array(
						'param_name'  => 'icon',
						'heading'     => esc_html__( 'Icon Class', 'okab' ),
						'description' => esc_html__( 'Enter Icon Class from Font Awesome or Simple Line Icons.', 'okab' ),
						'value'       => 'simple-icon-user',
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'customfont',
						),
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'type'        => 'iconpicker',
						'heading'     => esc_html__( 'Icon', 'okab' ),
						'param_name'  => 'icon_fontawesome',
						'value'       => 'simple-icon-user', // default value to backend editor admin_label
						'settings'    => array(
							'emptyIcon'    => true,
							// default true, display an "EMPTY" icon?
							'value'        => 'fontawesome',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'fontawesome',
						),
						'description' => esc_html__( 'Select icon from library.', 'okab' ),
					),
					array(
						'param_name'  => 'icon_size',
						'heading'     => esc_html__( 'Icon Size', 'okab' ),
						'description' => esc_html__( 'Enter icon size ( Max 15px )', 'okab' ),
						'value'       => '13px',
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => $id_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => $class_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);


		/**
		 * Clear.
		 */
		vc_map(
			array(
				'base'        => 'clear',
				'name'        => esc_html__( 'Clear', 'okab' ),
				'weight'      => 960,
				'class'       => 'dima-vc-element dima-vc-element-clear',
				'icon'        => 'clear',
				'category'    => esc_html__( 'Structure', 'okab' ),
				'description' => esc_html__( 'Clear floated elements in your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'by',
						'heading'     => esc_html__( 'Size', 'okab' ),
						'description' => esc_html__( 'Enter the space size (Pixels, ems or percentages).', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'value'       => '15px',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Meat The team.
		 */
		vc_map(
			array(
				'base'            => 'meet_the_team',
				'name'            => esc_html__( 'Team member', 'okab' ),
				'weight'          => 960,
				'class'           => 'dima-vc-element dima-vc-element-team',
				'icon'            => 'team',
				'as_parent'       => array( 'only' => 'inline_item_icon' ),
				'content_element' => true,
				'category'        => esc_html__( 'Content', 'okab' ),
				'description'     => esc_html__( 'Add team members in your content', 'okab' ),
				'params'          => array(
					array(
						'param_name'  => 'name',
						'heading'     => esc_html__( 'Member Name', 'okab' ),
						'description' => esc_html__( 'Enter the member\'s name', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'description',
						'heading'     => esc_html__( 'Member Description', 'okab' ),
						'description' => esc_html__( 'Enter the member\'s description', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'job',
						'heading'     => esc_html__( 'Member Position', 'okab' ),
						'description' => esc_html__( 'Enter the member\'s position', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'image',
						'heading'     => esc_html__( 'Member Photo', 'okab' ),
						'description' => esc_html__( 'Add member\'s photo', 'okab' ),
						'save_always' => true,
						'type'        => 'attach_image',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'bg_color',
						'heading'     => esc_html__( 'Background Color', 'okab' ),
						'description' => esc_html__( 'Choose background color for the text', 'okab' ),
						'type'        => 'colorpicker',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'name_color',
						'heading'     => esc_html__( 'Name Text Color', 'okab' ),
						'description' => esc_html__( 'Choose color for the text', 'okab' ),
						'type'        => 'colorpicker',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'text_color',
						'heading'     => esc_html__( 'Description Text Color', 'okab' ),
						'description' => esc_html__( 'Choose color for the text', 'okab' ),
						'type'        => 'colorpicker',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'no_border',
						'heading'     => esc_html__( 'Remove Border', 'okab' ),
						'description' => esc_html__( 'Check to remove the border on team hover', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'info_boxed',
						'heading'     => esc_html__( 'Info Boxed', 'okab' ),
						'description' => esc_html__( 'Check to display the member\'s information in a box.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'boxed',
						'heading'     => esc_html__( 'Boxed', 'okab' ),
						'description' => esc_html__( 'Check to display the member\'s content in a box.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => $id_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => $class_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				),
				'js_view'         => 'VcColumnView',

			)
		);

		/**
		 * Inline item icon.
		 */
		vc_map(
			array(
				'base'            => 'inline_item_icon',
				'name'            => esc_html__( 'Item Icon', 'okab' ),
				'weight'          => 960,
				'class'           => 'dima-vc-element dima-vc-element-item_icon',
				'icon'            => 'item_icon',
				'as_child'        => array( 'only' => 'meet_the_team', 'inline_icons' ),
				'category'        => esc_html__( 'Structure', 'okab' ),
				'description'     => esc_html__( 'Add Icon', 'okab' ),
				'content_element' => true,
				'params'          => array(
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Icons library', 'okab' ),
						'value'       => array(
							esc_html__( 'Font Awesome', 'okab' ) => 'fontawesome',
							esc_html__( 'Custom Font', 'okab' )  => 'customfont',
						),
						'param_name'  => 'icon_type',
						'description' => esc_html__( 'Select icons library.', 'okab' ),
					),
					array(
						'param_name'  => 'icon',
						'heading'     => esc_html__( 'Icon Class', 'okab' ),
						'description' => esc_html__( 'Enter Icon Class from Font Awesome or Simple Line Icons.', 'okab' ),
						'value'       => 'simple-icon-user',
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'customfont',
						),
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'type'        => 'iconpicker',
						'heading'     => esc_html__( 'Icon', 'okab' ),
						'param_name'  => 'icon_fontawesome',
						'value'       => 'simple-icon-user', // default value to backend editor admin_label
						'settings'    => array(
							'emptyIcon'    => true,
							// default true, display an "EMPTY" icon?
							'value'        => 'fontawesome',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'fontawesome',
						),
						'description' => esc_html__( 'Select icon from library.', 'okab' ),
					),
					array(
						'param_name'  => 'title',
						'heading'     => esc_html__( 'Icon Title', 'okab' ),
						'description' => esc_html__( 'Add title to the icon (the title will be displayed as a tooltip)', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'href',
						'heading'     => esc_html__( 'URL Link', 'okab' ),
						'description' => esc_html__( 'Add URL Link', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'target',
						'heading'     => esc_html__( 'Open link in a new tab', 'okab' ),
						'description' => esc_html__( 'Check to open your link in a new tab.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'blank'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => $id_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => $class_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Counter.
		 */
		vc_map(
			array(
				'base'        => 'counter',
				'name'        => esc_html__( 'Counter', 'okab' ),
				'weight'      => 960,
				'class'       => 'dima-vc-element dima-vc-element-item_icon',
				'icon'        => 'counter',
				'category'    => esc_html__( 'Structure', 'okab' ),
				'description' => esc_html__( 'Add counters to your page', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'float',
						'heading'     => esc_html__( 'Counter Contents Position', 'okab' ),
						'description' => esc_html__( 'Optionally choose the position of counter contents.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'None', 'okab' )              => '',
							esc_html__( 'Start', 'okab' )             => 'text-start',
							esc_html__( 'Center', 'okab' )            => 'text-center',
							esc_html__( 'End', 'okab' )               => 'text-end',
						)
					),

					array(
						'param_name'  => 'icon_type',
						'heading'     => esc_html__( 'Icons library', 'okab' ),
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'Font Awesome', 'okab' ) => 'fontawesome',
							esc_html__( 'Custom Font', 'okab' )  => 'customfont',
						),
						'description' => esc_html__( 'Select icons library.', 'okab' ),
					),
					array(
						'param_name'  => 'icon',
						'heading'     => esc_html__( 'Icon Class', 'okab' ),
						'description' => esc_html__( 'Enter Icon Class from Font Awesome or Simple Line Icons.', 'okab' ),
						'value'       => 'simple-icon-user',
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'customfont',
						),
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'type'        => 'iconpicker',
						'heading'     => esc_html__( 'Icon', 'okab' ),
						'param_name'  => 'icon_fontawesome',
						'value'       => 'simple-icon-user', // default value to backend editor admin_label
						'settings'    => array(
							'emptyIcon'    => true,
							// default true, display an "EMPTY" icon?
							'value'        => 'fontawesome',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'fontawesome',
						),
						'description' => esc_html__( 'Select icon from library.', 'okab' ),
					),
					array(
						'param_name'  => 'icon_color',
						'heading'     => esc_html__( 'Counter Icon Color', 'okab' ),
						'description' => esc_html__( 'Choose the icon color', 'okab' ),
						'save_always' => true,
						'type'        => 'colorpicker',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'num_start',
						'heading'     => esc_html__( 'Counter Starting Number', 'okab' ),
						'description' => esc_html__( 'Set the counter value to start from', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'num_end',
						'heading'     => esc_html__( 'Counter Ending Number', 'okab' ),
						'description' => esc_html__( 'Set the counter value to end in', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'num_color',
						'heading'     => esc_html__( 'Counter Number Color', 'okab' ),
						'description' => esc_html__( 'Choose the counter number\'s color', 'okab' ),
						'save_always' => true,
						'type'        => 'colorpicker',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'text',
						'heading'     => esc_html__( 'Counter Description', 'okab' ),
						'description' => esc_html__( 'Add description text', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'text_color',
						'heading'     => esc_html__( 'Counter Description Color', 'okab' ),
						'description' => esc_html__( 'Choose the description\'s color', 'okab' ),
						'save_always' => true,
						'type'        => 'colorpicker',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'num_speed',
						'heading'     => esc_html__( 'Counter Speed', 'okab' ),
						'description' => esc_html__( 'Set the counter speed(ms)', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'num_before',
						'heading'     => esc_html__( 'Text Before the Counter Number', 'okab' ),
						'description' => esc_html__( 'Add text before the number', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'num_after',
						'heading'     => esc_html__( 'Text After the Counter Number', 'okab' ),
						'description' => esc_html__( 'Add text after the number', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'border',
						'heading'     => esc_html__( 'Remove Border', 'okab' ),
						'description' => esc_html__( 'Check to remove the border', 'okab' ),
						'save_always' => true,
						'type'        => 'checkbox',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => $id_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => $class_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * circle Bar.
		 */
		vc_map(
			array(
				'base'        => 'progress_circle',
				'name'        => esc_html__( 'Progress Circle', 'okab' ),
				'weight'      => 760,
				'class'       => 'dima-vc-element dima-vc-element-skill-bar',
				'icon'        => 'progress-circle',
				'category'    => esc_html__( 'Information', 'okab' ),
				'description' => esc_html__( 'Include an informational skill bar', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'heading',
						'heading'     => esc_html__( 'Progress Circle Title', 'okab' ),
						'description' => esc_html__( 'Enter the title of your progress circle.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'percent',
						'heading'     => esc_html__( 'Percent', 'okab' ),
						'description' => esc_html__( 'Enter the percentage of your progress (i.e. 77%).', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'color',
						'heading'     => esc_html__( 'Color', 'okab' ),
						'description' => esc_html__( 'Choose the color of the progress circle', 'okab' ),
						'save_always' => true,
						'type'        => 'colorpicker',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'size',
						'heading'     => esc_html__( 'Progress Circle Size', 'okab' ),
						'description' => esc_html__( 'Enter the size of the progress circle (px)', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'value'       => '120',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Progress Bar.
		 */
		vc_map(
			array(
				'base'        => 'progress_bar',
				'name'        => esc_html__( 'Progress Bar', 'okab' ),
				'weight'      => 760,
				'class'       => 'dima-vc-element dima-vc-element-skill-bar',
				'icon'        => 'progress-bar',
				'category'    => esc_html__( 'Information', 'okab' ),
				'description' => esc_html__( 'Include an informational skill bar', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'type',
						'heading'     => esc_html__( 'Progress Bar Style', 'okab' ),
						'description' => esc_html__( 'Select the style of your progress bar.', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'Select Option', 'okab' ) => '',
							esc_html__( 'Style One', 'okab' )     => 'style-1',
							esc_html__( 'Style Two', 'okab' )     => 'style-2',
						),

						'holder' => 'div'
					),
					array(
						'param_name'  => 'heading',
						'heading'     => esc_html__( 'Progress Bar Title', 'okab' ),
						'description' => esc_html__( 'Enter the title of your progress bar.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'percent',
						'heading'     => esc_html__( 'Percent', 'okab' ),
						'description' => esc_html__( 'Enter the percentage of your progress (i.e. 77%).', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'color',
						'heading'     => esc_html__( 'Color', 'okab' ),
						'description' => esc_html__( 'Choose the color of the progress bar.', 'okab' ),
						'save_always' => true,
						'type'        => 'colorpicker',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'shadow',
						'heading'     => esc_html__( 'Drop Shadow', 'okab' ),
						'description' => esc_html__( 'Check to add drop shadow effect', 'okab' ),
						'save_always' => true,
						'type'        => 'checkbox',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'striped',
						'heading'     => esc_html__( 'Striped', 'okab' ),
						'description' => esc_html__( 'Check to add striped effect.', 'okab' ),
						'save_always' => true,
						'type'        => 'checkbox',
						'holder'      => 'div'
					),


					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);


		/**
		 * Inline item icon.
		 */
		vc_map(
			array(
				'base'            => 'inline_icons',
				'name'            => esc_html__( 'Inline Icons', 'okab' ),
				'weight'          => 960,
				'class'           => 'dima-vc-element dima-vc-element-item_icon',
				'icon'            => 'inline_icon',
				'category'        => esc_html__( 'Structure', 'okab' ),
				'description'     => esc_html__( 'Add icons to your content', 'okab' ),
				'as_parent'       => array( 'only' => 'inline_item_icon' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'size',
						'heading'     => esc_html__( 'Icon Size', 'okab' ),
						'description' => esc_html__( 'Select the icon size', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'Select Option', 'okab' ) => '',
							esc_html__( 'Small', 'okab' )         => 'small',
							esc_html__( 'Medium', 'okab' )        => 'medium',
							esc_html__( 'Big', 'okab' )           => 'big',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'float',
						'heading'     => esc_html__( 'Icon Alignment', 'okab' ),
						'description' => esc_html__( 'Text alignment.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Start', 'okab' )             => 'text-start',
							esc_html__( 'Center', 'okab' )            => 'text-center',
							esc_html__( 'End', 'okab' )               => 'text-end',
						)
					),

					array(
						'param_name'  => 'circle',
						'heading'     => esc_html__( 'Circle Style', 'okab' ),
						'description' => esc_html__( 'Check to use circle around the icon instead of square', 'okab' ),
						'save_always' => true,
						'type'        => 'checkbox',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => $id_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => $class_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Gallery
		 */
		vc_map(
			array(
				'base'            => 'dima_gallery',
				'name'            => esc_html__( 'Gallery', 'okab' ),
				'weight'          => 960,
				'class'           => 'dima-vc-element dima-vc-element-item_icon',
				'icon'            => 'gallery',
				'as_parent'       => array( 'only' => 'image', 'vc_row' ),
				'category'        => esc_html__( 'Structure', 'okab' ),
				'description'     => esc_html__( 'Include an images gallery in your content', 'okab' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'column',
						'heading'     => esc_html__( 'Columns', 'okab' ),
						'description' => esc_html__( 'Select number of columns for the image gallery.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( '1 column', 'okab' )          => '1',
							esc_html__( '2 columns', 'okab' )         => '2',
							esc_html__( '3 columns', 'okab' )         => '3',
							esc_html__( '4 columns', 'okab' )         => '4',
							esc_html__( '5 columns', 'okab' )         => '5',
							esc_html__( '6 columns', 'okab' )         => '6',
						)
					),

					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => $id_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => $class_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Images
		 */
		vc_map(
			array(
				'base'        => 'image',
				'name'        => esc_html__( 'Image', 'okab' ),
				'weight'      => 700,
				'class'       => 'dima-vc-element dima-vc-element-image',
				'icon'        => 'image',
				'category'    => esc_html__( 'Media', 'okab' ),
				'description' => esc_html__( 'Include an image in your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'src',
						'heading'     => esc_html__( 'Image', 'okab' ),
						'description' => esc_html__( 'Upload your image.', 'okab' ),
						'type'        => 'attach_image',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'float',
						'heading'     => esc_html__( 'Image Float', 'okab' ),
						'description' => esc_html__( 'Optionally float the image.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Start', 'okab' )             => 'start',
							esc_html__( 'Center', 'okab' )            => 'center',
							esc_html__( 'End', 'okab' )               => 'end'
						)
					),
					array(
						'param_name'  => 'alt',
						'heading'     => esc_html__( 'Alt', 'okab' ),
						'description' => esc_html__( 'Enter in the alt text for your image.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'is_gallert_item',
						'heading'     => esc_html__( 'Gallery Item', 'okab' ),
						'description' => esc_html__( 'Check to display the images as a gallery.', 'okab' ),
						'save_always' => true,
						'type'        => 'checkbox',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'lightbox',
						'heading'     => esc_html__( 'Lightbox Type', 'okab' ),
						'description' => esc_html__( 'Select your lightbox type (iframe: for youtube, map,..)', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							'None'                                    => '',
							'image'                                   => 'image',
							'iframe'                                  => 'iframe',
							'ajax'                                    => 'ajax'
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'href',
						'heading'     => esc_html__( 'URL Link', 'okab' ),
						'description' => esc_html__( 'If using this for a lightbox, enter the URL link of your media here (e.g. YouTube URL, Image URL,...). Leave it blank if you want to link to the image uploaded.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'target',
						'heading'     => esc_html__( 'Open link in a new tab', 'okab' ),
						'description' => esc_html__( 'Check to open your image link in a new tab.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'blank'
						)
					),
					array(
						'param_name'  => 'title',
						'heading'     => esc_html__( 'Popup Info Title', 'okab' ),
						'description' => esc_html__( 'Enter in the title attribute you want for your image (This will apply as title for popover or tooltip if you have active it from -Popup Info type-).', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'popup_type',
						'heading'     => esc_html__( 'Popup Info type', 'okab' ),
						'description' => esc_html__( 'Select to choose the type of popup info', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							'None'                                    => '',
							'Popover'                                 => 'popover',
							'Tooltip'                                 => 'tooltip'
						)
					),
					array(
						'param_name'  => 'popup_trigger',
						'heading'     => esc_html__( 'Popup Trigger', 'okab' ),
						'description' => esc_html__( 'Select what actions you want to trigger the popover or tooltip.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							'Hover'                                   => 'hover',
							'Click'                                   => 'click',
							'Focus'                                   => 'focus'
						)
					),
					array(
						'param_name'  => 'popup_place',
						'heading'     => esc_html__( 'Popup Position', 'okab' ),
						'description' => esc_html__( 'Select the popup position.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							'Top'                                     => 'top',
							'Left'                                    => 'left',
							'Right'                                   => 'right',
							'Bottom'                                  => 'bottom'
						)
					),
					array(
						'param_name'  => 'popup_content',
						'heading'     => esc_html__( 'Info Content', 'okab' ),
						'description' => esc_html__( 'Extra content for the popover.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'width',
						'heading'     => esc_html__( 'Image Width', 'okab' ),
						'description' => esc_html__( 'Select to choose image width', 'okab' ),
						'save_always' => true,
						'group'       => esc_html__( 'Style & hover', 'okab' ),
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( '1/1 (100%)', 'okab' )        => '1',
							esc_html__( '1/2 (50%)', 'okab' )         => '2',
							esc_html__( '1/3 (33.33%)', 'okab' )      => '3',
							esc_html__( '1/4 (25%)', 'okab' )         => '4',
							esc_html__( '1/5 (20%)', 'okab' )         => '5',
							esc_html__( '1/6 (16.66%)', 'okab' )      => '6',
						),
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'shape',
						'heading'     => esc_html__( 'Image Shape', 'okab' ),
						'description' => esc_html__( 'Select the image shape.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'group'       => esc_html__( 'Style & hover', 'okab' ),
						'value'       => array(
							esc_html__( 'None', 'okab' )   => '',
							esc_html__( 'Box', 'okab' )    => 'img-boxed',
							esc_html__( 'Radius', 'okab' ) => 'rounded',
							esc_html__( 'Circle', 'okab' ) => 'circle'
						)
					),
					array(
						'param_name'  => 'hover',
						'heading'     => esc_html__( 'Image Hover', 'okab' ),
						'description' => esc_html__( 'Select the image hover.', 'okab' ),
						'type'        => 'dropdown',
						'group'       => esc_html__( 'Style & hover', 'okab' ),
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'None', 'okab' )              => 'none',
							esc_html__( 'Default', 'okab' )           => '',
							esc_html__( 'Zoom-out', 'okab' )          => 'zoom-out',
							esc_html__( 'Zoom-in', 'okab' )           => 'zoom-in',
							esc_html__( 'Opacity', 'okab' )           => 'effect-opacity',
						)
					),
					array(
						'param_name'  => 'apply_gray',
						'heading'     => esc_html__( 'Grayscale Effect', 'okab' ),
						'description' => esc_html__( 'Check to apply grayscale image effect', 'okab' ),
						'type'        => 'checkbox',
						'group'       => esc_html__( 'Style & hover', 'okab' ),
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),

				)
			)
		);

		/**
		 * Text
		 */
		vc_map(
			array(
				'base'        => 'text',
				'name'        => esc_html__( 'Text', 'okab' ),
				'weight'      => 940,
				'class'       => 'dima-vc-element dima-vc-element-text-output',
				'icon'        => 'text',
				'category'    => esc_html__( 'Content', 'okab' ),
				'description' => esc_html__( 'Add a text in your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Text', 'okab' ),
						'description' => esc_html__( 'Enter your text.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					)
				)
			)
		);


		/**
		 * Blog
		 */
		vc_map(
			array(
				'base'        => 'blog',
				'name'        => esc_html__( 'Blog', 'okab' ),
				'weight'      => 490,
				'class'       => 'dima-vc-element dima-vc-element-recent-posts',
				'icon'        => 'blog',
				'category'    => esc_html__( 'Content', 'okab' ),
				'description' => esc_html__( 'Display your blog posts or recent posts', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'blog_style',
						'heading'     => esc_html__( 'Blog Style', 'okab' ),
						'description' => esc_html__( 'Choose your blog style to show.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => 'standard',
							esc_html__( 'Standard', 'okab' )          => 'standard',
							esc_html__( 'Masonry', 'okab' )           => 'masonry',
							esc_html__( 'Timeline', 'okab' )          => 'timeline',
							esc_html__( 'Image Side', 'okab' )        => 'imageside',
							esc_html__( 'Grid', 'okab' )              => 'grid',
							esc_html__( 'Block 1', 'okab' )           => 'postslist',
							esc_html__( 'Block 2', 'okab' )           => 'postslist_side',
							esc_html__( 'Block 3', 'okab' )           => 'postslist_grid',
							esc_html__( 'News in images', 'okab' )    => 'news_in_images',
							esc_html__( 'Slide', 'okab' )             => 'slide',
						)
					),
					array(
						'param_name'  => 'dark',
						'heading'     => esc_html__( 'Dark background', 'okab' ),
						'description' => esc_html__( 'Check if you use dark background section', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'blog_style',
							'value'   => array( 'slide' ),
						),
						'value'       => array(
							'' => 'false'
						)
					),
					array(
						'param_name'  => 'count',
						'heading'     => esc_html__( 'Post Count', 'okab' ),
						'description' => esc_html__( 'Type how many posts to display.', 'okab' ),
						'type'        => 'textfield',
						'holder'      => 'div',
					),
					array(
						'param_name'  => 'column',
						'heading'     => esc_html__( 'Post Columns', 'okab' ),
						'description' => esc_html__( 'Select columns number', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'blog_style',
							'value'   => array( 'grid', 'masonry', 'slide' ),
						),
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							'1'                                       => '1',
							'2'                                       => '2',
							'3'                                       => '3',
							'4'                                       => '4'
						)
					),
					array(
						'param_name'  => 'show_meta',
						'heading'     => esc_html__( 'Hide Meta box', 'okab' ),
						'description' => esc_html__( 'Check to hide the metabox.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'blog_style',
							'value'   => array(
								'grid',
								'standard',
								'masonry',
								'slide',
								'timeline',
								'postslist',
								'postslist_side',
								'postslist_grid',
								''
							),
						),
						'value'       => array(
							'' => 'false'
						)
					),
					array(
						'param_name'  => 'no_border',
						'heading'     => esc_html__( 'Remove Border From Hover', 'okab' ),
						'description' => esc_html__( 'Check to remove the border on blog hover', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'img_hover',
						'heading'     => esc_html__( 'Featured Image hover', 'okab' ),
						'description' => esc_html__( 'Select the image hover style', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'none', 'okab' )              => 'none',
							esc_html__( 'default', 'okab' )           => '',
							esc_html__( 'zoom-out', 'okab' )          => 'zoom-out',
							esc_html__( 'zoom-in', 'okab' )           => 'zoom-in',
							esc_html__( 'gray', 'okab' )              => 'gray',
						)
					),
					array(
						'param_name'  => 'elm_hover',
						'heading'     => esc_html__( 'Element hover', 'okab' ),
						'description' => esc_html__( 'Select the element hover style', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'default', 'okab' )           => '',
							esc_html__( 'none', 'okab' )              => 'none',
						)
					),
					array(
						'param_name'  => 'words',
						'heading'     => esc_html__( 'Excerpts length', 'okab' ),
						'description' => esc_html__( 'Enter number of words in excerpt', 'okab' ),
						'save_always' => true,
						'dependency'  => array(
							'element' => 'blog_style',
							'value'   => array(
								'grid',
								'standard',
								'masonry',
								'imageside',
								'slide',
								'timeline',
								'postslist',
								'postslist_side',
								'postslist_grid',
								''
							),
						),
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'items_margin',
						'heading'     => esc_html__( 'Items Margin', 'okab' ),
						'description' => esc_html__( 'Enter the margin value between elements (px)', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'dependency'  => array(
							'element' => 'blog_style',
							'value'   => 'grid',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'category',
						'heading'     => esc_html__( 'Category', 'okab' ),
						'description' => esc_html__( 'To filter your posts by category, enter the slug of your desired category. To filter by multiple categories, enter your slugs separated by a comma.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'tag',
						'heading'     => esc_html__( 'Tag', 'okab' ),
						'description' => esc_html__( 'To filter your posts by tag, enter the slug of your desired tag. To filter by multiple tags, enter your slugs separated by a comma.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'offset',
						'heading'     => esc_html__( 'Offset', 'okab' ),
						'description' => esc_html__( 'Accepts a numerical value to show how many posts to skip.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'paging',
						'heading'     => esc_html__( 'Display Pagination', 'okab' ),
						'description' => esc_html__( 'Check to display pagination', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'order',
						'heading'     => esc_html__( 'Sort by', 'okab' ),
						'description' => esc_html__( 'Choose what posts you want to display first', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Popular', 'okab' )           => 'popular',
							esc_html__( 'Top view', 'okab' )          => 'top-view',
						)
					),
					array(
						'param_name'  => 'show_image',
						'heading'     => esc_html__( 'Remove Featured Image', 'okab' ),
						'description' => esc_html__( 'Check to remove the featured image.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'blog_style',
							'value'   => array(
								'grid',
								'standard',
								'masonry',
								'slide',
								'timeline',
								'postslist',
								'postslist_side',
								'postslist_grid',
								''
							),
						),
						'value'       => array(
							'' => 'false'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'post_class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Portfolio
		 */
		vc_map(
			array(
				'base'        => 'portfolio',
				'name'        => esc_html__( 'Portfolio', 'okab' ),
				'weight'      => 490,
				'class'       => 'dima-vc-element dima-vc-element-portfolio',
				'icon'        => 'portfolio',
				'category'    => esc_html__( 'Content', 'okab' ),
				'description' => esc_html__( 'Display your Portfolio posts', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'portfolio_style',
						'heading'     => esc_html__( 'Portfolio Style', 'okab' ),
						'description' => esc_html__( 'Choose your portfolio style.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => 'masonry',
							esc_html__( 'Grid', 'okab' )              => 'grid',
							esc_html__( 'Masonry', 'okab' )           => 'masonry',
							esc_html__( 'Slide', 'okab' )             => 'slide',
						)
					),
					array(
						'param_name'  => 'auto_play',
						'heading'     => esc_html__( 'AutoPlay', 'okab' ),
						'description' => esc_html__( 'Check to animate the slides automatically', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'portfolio_style',
							'value'   => array( 'slide' ),
						),
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'dark',
						'heading'     => esc_html__( 'Dark background', 'okab' ),
						'description' => esc_html__( 'Check if you use dark background section', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'portfolio_style',
							'value'   => array( 'slide' ),
						),
						'value'       => array(
							'' => 'false'
						)
					),
					array(
						'param_name'  => 'slide_pagination',
						'heading'     => esc_html__( 'Slider Bullets', 'okab' ),
						'description' => esc_html__( 'Check to remove slider Bullets', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'portfolio_style',
							'value'   => array( 'slide' ),
						),
						'value'       => array(
							'' => 'false'
						)
					),
					array(
						'param_name'  => 'items_margin',
						'heading'     => esc_html__( 'Items Margin', 'okab' ),
						'description' => esc_html__( 'Enter the margin value between elements (px)', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'dependency'  => array(
							'element' => 'portfolio_style',
							'value'   => array( 'slide' ),
						),
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'count',
						'heading'     => esc_html__( 'Portfolio Post Count', 'okab' ),
						'description' => esc_html__( 'Select how many posts to display.', 'okab' ),
						'type'        => 'textfield',
						'holder'      => 'div',
						'value'       => '6',
					),
					array(
						'param_name'  => 'column',
						'heading'     => esc_html__( 'Portfolio Post Columns', 'okab' ),
						'description' => esc_html__( 'Select columns number', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '2',
							'1'                                       => '1',
							'2'                                       => '2',
							'3'                                       => '3',
							'4'                                       => '4'
						)
					),
					array(
						'param_name'  => 'filters',
						'heading'     => esc_html__( 'Hide filters', 'okab' ),
						'description' => esc_html__( 'Check to hide the filters.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'portfolio_style',
							'value'   => array( 'masonry', 'grid' ),
						),
						'value'       => array(
							'' => 'false'
						)
					),
					array(
						'param_name'  => 'no_margin',
						'heading'     => esc_html__( 'No margin', 'okab' ),
						'description' => esc_html__( 'Check to remove the margin between portfolio posts', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'portfolio_style',
							'value'   => array( 'masonry', 'grid' ),
						),
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'no_border',
						'heading'     => esc_html__( 'Remove Border From Hover', 'okab' ),
						'description' => esc_html__( 'Check to remove the border from portfolio hover', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'img_hover',
						'heading'     => esc_html__( 'Image hover style', 'okab' ),
						'description' => esc_html__( 'Select your image hover style', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'none', 'okab' )              => 'none',
							esc_html__( 'default', 'okab' )           => '',
							esc_html__( 'zoom-out', 'okab' )          => 'zoom-out',
							esc_html__( 'zoom-in', 'okab' )           => 'zoom-in',
							esc_html__( 'gray', 'okab' )              => 'gray',
						)
					),
					array(
						'param_name'  => 'elm_hover',
						'heading'     => esc_html__( 'Element hover', 'okab' ),
						'description' => esc_html__( 'Select portfolio elements hover style', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'With Icon', 'okab' )         => '',
							esc_html__( 'With Title', 'okab' )        => 'title',
							esc_html__( 'none', 'okab' )              => 'none',
						)
					),
					array(
						'param_name'  => 'category',
						'heading'     => esc_html__( 'Category', 'okab' ),
						'description' => esc_html__( 'To filter your posts by category, enter in the slug of your desired category. To filter by multiple categories, enter in your slugs separated by a comma.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'offset',
						'heading'     => esc_html__( 'Offset', 'okab' ),
						'description' => esc_html__( 'Accepts a numerical value to show how many posts to skip.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'paging',
						'heading'     => esc_html__( 'Pagination', 'okab' ),
						'description' => esc_html__( 'Check to activate pagination', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'post_class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
				)
			)
		);


		/**
		 * Woo
		 */
		vc_map(
			array(
				'base'        => 'dima_woo',
				'name'        => esc_html__( 'Products', 'okab' ),
				'weight'      => 490,
				'class'       => 'dima-vc-element dima-vc-element-portfolio',
				'icon'        => 'shopping',
				'category'    => esc_html__( 'Content', 'okab' ),
				'description' => esc_html__( 'Show multiple products', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'woo_style',
						'heading'     => esc_html__( 'Product Style', 'okab' ),
						'description' => esc_html__( 'Choose your style.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => 'masonry',
							esc_html__( 'Grid', 'okab' )              => 'grid',
							esc_html__( 'List', 'okab' )              => 'list_style',
							esc_html__( 'Slide', 'okab' )             => 'slide',
						)
					),
					array(
						'param_name'  => 'dark',
						'heading'     => esc_html__( 'Dark background', 'okab' ),
						'description' => esc_html__( 'Check if you use dark background section', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'woo_style',
							'value'   => array( 'slide' ),
						),
						'value'       => array(
							'' => 'false'
						)
					),
					array(
						'param_name'  => 'auto_play',
						'heading'     => esc_html__( 'AutoPlay', 'okab' ),
						'description' => esc_html__( 'Check to animate the slides automatically', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'woo_style',
							'value'   => array( 'slide' ),
						),
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'slide_pagination',
						'heading'     => esc_html__( 'Slider Bullets', 'okab' ),
						'description' => esc_html__( 'Check to remove slider Bullets', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'woo_style',
							'value'   => array( 'slide' ),
						),
						'value'       => array(
							'' => 'false'
						)
					),
					array(
						'param_name'  => 'count',
						'heading'     => esc_html__( 'Products Count', 'okab' ),
						'description' => esc_html__( 'Select how many products display.', 'okab' ),
						'type'        => 'textfield',
						'holder'      => 'div',
						'value'       => '6',
					),
					array(
						'param_name'  => 'column',
						'heading'     => esc_html__( 'Product Columns', 'okab' ),
						'description' => esc_html__( 'Select columns number', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '2',
							'2'                                       => '2',
							'3'                                       => '3',
							'4'                                       => '4'
						)
					),
					array(
						'param_name'  => 'filters',
						'heading'     => esc_html__( 'Hide filters', 'okab' ),
						'description' => esc_html__( 'Check to remove the filters.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'woo_style',
							'value'   => array( 'list_style', 'grid' ),
						),
						'value'       => array(
							'' => 'false'
						)
					),
					array(
						'param_name'  => 'category',
						'heading'     => esc_html__( 'Category', 'okab' ),
						'description' => esc_html__( 'To filter your products by category, enter in the slug of your desired category. To filter by multiple categories, enter in your slugs separated by a comma.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'paging',
						'heading'     => esc_html__( 'Pagination', 'okab' ),
						'description' => esc_html__( 'Check to activate pagination', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'woo_style',
							'value'   => array( 'list_style', 'grid' ),
						),
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'orderby',
						'heading'     => esc_html__( 'Order by', 'okab' ),
						'description' => esc_html__( 'Choose what products you want to display first', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'woo_style',
							'value'   => array( 'list_style', 'grid' ),
						),
						'value'       => array(
							'',
							__( 'Date', 'okab' )          => 'date',
							__( 'ID', 'okab' )            => 'ID',
							__( 'Author', 'okab' )        => 'author',
							__( 'Title', 'okab' )         => 'title',
							__( 'Modified', 'okab' )      => 'modified',
							__( 'Random', 'okab' )        => 'rand',
							__( 'Comment count', 'okab' ) => 'comment_count',
							__( 'Menu order', 'okab' )    => 'menu_order',
						)
					),
					array(
						'param_name'  => 'order',
						'heading'     => esc_html__( 'Sort By', 'okab' ),
						'description' => esc_html__( 'Choose what products you want to display first', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'woo_style',
							'value'   => array( 'list_style', 'grid' ),
						),
						'value'       => array(
							'',
							__( 'Descending', 'okab' ) => 'DESC',
							__( 'Ascending', 'okab' )  => 'ASC',
						)
					),
					array(
						'param_name'  => 'post_class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
				)
			)
		);
		/**
		 * Clinets
		 */
		vc_map(
			array(
				'base'            => 'clients',
				'name'            => esc_html__( 'Clients', 'okab' ),
				'weight'          => 900,
				'class'           => 'dima-vc-element dima-vc-element-tabs',
				'icon'            => 'clients',
				'category'        => esc_html__( 'Content', 'okab' ),
				'description'     => esc_html__( 'Add clients logos to your content', 'okab' ),
				'as_parent'       => array( 'only' => 'client' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'columns',
						'heading'     => esc_html__( 'Clients Columns', 'okab' ),
						'description' => esc_html__( 'Select number of columns for the clients images.', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '3',
							'1'                                       => '1',
							'2'                                       => '2',
							'3'                                       => '3',
							'4'                                       => '4',
							'5'                                       => '5',
							'6'                                       => '6',
							'7'                                       => '7',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Clinet
		 */
		vc_map(
			array(
				'base'            => 'client',
				'name'            => esc_html__( 'Client Element', 'okab' ),
				'weight'          => 960,
				'class'           => 'dima-vc-element dima-vc-element-clients',
				'icon'            => 'client',
				'as_child'        => array( 'only' => 'clients' ),
				'category'        => esc_html__( 'Content', 'okab' ),
				'description'     => esc_html__( 'Add Client Element', 'okab' ),
				'content_element' => true,
				'params'          => array(
					array(
						'param_name'  => 'src',
						'heading'     => esc_html__( 'Client Image', 'okab' ),
						'description' => esc_html__( 'Add client image.', 'okab' ),
						'type'        => 'attach_image',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'alt',
						'heading'     => esc_html__( 'Alt text ', 'okab' ),
						'description' => '',
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'href',
						'heading'     => esc_html__( 'URL Link ', 'okab' ),
						'description' => esc_html__( 'Add client URL link', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'target',
						'heading'     => esc_html__( 'Open link in a new tab', 'okab' ),
						'description' => esc_html__( 'Check to open the link in a new tab.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'blank'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => $id_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => $class_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Banner
		 */
		vc_map(
			array(
				'base'            => 'dima_banner',
				'name'            => esc_html__( 'Banner', 'okab' ),
				'weight'          => 710,
				'class'           => 'dima-vc-element dima-vc-element-callout',
				'icon'            => 'callout',
				'category'        => esc_html__( 'Marketing', 'okab' ),
				'as_parent'       => array(
					'except' => 'container,vc_row_inner,vc_row,accordion_item,tab_nav_item,client'
				),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'description'     => esc_html__( 'Include a Banner into your content', 'okab' ),
				'params'          => array(
					array(
						'param_name'  => 'bg_type',
						'heading'     => esc_html__( 'Banner Background Type', 'okab' ),
						'description' => esc_html__( 'Select background type.', 'okab' ),
						'type'        => 'dropdown',
						'save_always' => true,
						'value'       => array(
							esc_html__( 'Covered Background Image', 'okab' ) => 'bg_image',
							esc_html__( 'Background Video', 'okab' )         => 'bg_video',
						),
						'holder'      => 'div',
					),
					array(
						'param_name'  => 'bg_image',
						'heading'     => esc_html__( 'Banner Background Image', 'okab' ),
						'description' => esc_html__( 'Add a background image to your Banner', 'okab' ),
						'save_always' => true,
						'dependency'  => array(
							'element' => 'bg_type',
							'value'   => 'bg_image',
						),
						'type'        => 'attach_image',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'bg_video',
						'heading'     => esc_html__( 'Background Video', 'okab' ),
						'description' => esc_html__( 'Include the path to your background video.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'dependency'  => array(
							'element' => 'bg_type',
							'value'   => 'bg_video',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'height',
						'heading'     => esc_html__( 'Banner Height', 'okab' ),
						'description' => esc_html__( 'Set banner height (%,px,em)', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'parallax',
						'heading'     => esc_html__( 'Parallax', 'okab' ),
						'description' => esc_html__( 'Select to activate the parallax effect (Applied only for background patterns and images)', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Parallax', 'okab' )          => 'parallax',
							esc_html__( 'Fixed Parallax', 'okab' )    => 'fixed_parallax',
						)
					),
					array(
						'param_name'  => 'link',
						'heading'     => esc_html__( 'URL Link', 'okab' ),
						'description' => esc_html__( 'Enter in the URL you want your banner link to.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'target',
						'heading'     => esc_html__( 'Open link in a new tab', 'okab' ),
						'description' => esc_html__( 'Check to open your link in a new tab.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'blank'
						)
					),
					array(
						'param_name'  => 'hover',
						'heading'     => esc_html__( 'Hover', 'okab' ),
						'description' => esc_html__( 'Check to activate hover', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array( '' => 'true' )
					),
					array(
						'param_name'  => 'text_color',
						'heading'     => esc_html__( 'Text Color', 'okab' ),
						'description' => esc_html__( '', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'light', 'okab' )             => 'light',
							esc_html__( 'dark', 'okab' )              => 'dark',
						)
					),
					array(
						'param_name'  => 'text_width',
						'heading'     => esc_html__( 'Text Width', 'okab' ),
						'description' => esc_html__( 'Set banner text width (%,px,em)', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'text_align',
						'heading'     => esc_html__( 'Contents Alignment', 'okab' ),
						'description' => esc_html__( 'Select the alignment for your banner contents.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Start', 'okab' )             => 'start',
							esc_html__( 'Center', 'okab' )            => 'center',
							esc_html__( 'End', 'okab' )               => 'end'
						)
					),
					array(
						'param_name'  => 'flaot',
						'heading'     => esc_html__( 'Content Float', 'okab' ),
						'description' => esc_html__( 'Select the float for your banner contents.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Start', 'okab' )             => 'start',
							esc_html__( 'Center', 'okab' )            => 'center',
							esc_html__( 'End', 'okab' )               => 'end'
						)
					),
					array(
						'param_name'  => 'animation',
						'heading'     => esc_html__( 'Content Animation', 'okab' ),
						'description' => esc_html__( 'Select the type of animation you want to use.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => $dima_vc->dima_animate_list,
					),
					array(
						'param_name'  => 'delay',
						'heading'     => esc_html__( 'Delay Animation', 'okab' ),
						'description' => esc_html__( 'Set when the animation start (milliseconds)', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'offset',
						'heading'     => esc_html__( 'Delay Animation Offset', 'okab' ),
						'description' => esc_html__( 'Set the number ( px,%..) from the top of the viewport where the animation start.', 'okab' ) . "<a href='http://imakewebthings.com/waypoints/api/offset-option/' target='_blank' >" . esc_html__( 'Read More', 'okab' ) . "</a>",
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);
		/**
		 * OWL SLIDER
		 */
		vc_map(
			array(
				'base'            => 'owl_slider',
				'name'            => esc_html__( 'Owl Slider', 'okab' ),
				'weight'          => 900,
				'class'           => 'dima-vc-element dima-vc-element-slider',
				'icon'            => 'slider',
				'category'        => esc_html__( 'Slideshow', 'okab' ),
				'description'     => esc_html__( 'Add slider to your contents', 'okab' ),
				'as_parent'       => array( 'only' => 'owl_slide' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'pagination',
						'heading'     => esc_html__( 'Slider Bullets ', 'okab' ),
						'description' => esc_html__( 'Check to display slider Bullets', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'auto_play',
						'heading'     => esc_html__( 'AutoPlay', 'okab' ),
						'description' => esc_html__( 'Check to animate the slides automatically', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'navigation',
						'heading'     => esc_html__( 'Slider Arrows', 'okab' ),
						'description' => esc_html__( 'Check to display navigation arrows', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => '1'
						)
					),
					array(
						'param_name'  => 'inner',
						'heading'     => esc_html__( 'Inner Slider Arrows', 'okab' ),
						'description' => esc_html__( 'Check to diplay navigation arrows inside the container', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'navigation',
							'value'   => '1',
						),
						'value'       => array(
							'' => '1'
						)
					),
					array(
						'param_name'  => 'loop',
						'heading'     => esc_html__( 'Loop', 'okab' ),
						'description' => esc_html__( 'Check to activate slider loop', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'mouse_wheel',
						'heading'     => esc_html__( 'Mouse Wheel', 'okab' ),
						'description' => esc_html__( 'Check to activate navigation using mouse wheel', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'dark',
						'heading'     => esc_html__( 'Dark background', 'okab' ),
						'description' => esc_html__( 'Check if you use dark background section', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'false'
						)
					),
					array(
						'param_name'  => 'items',
						'heading'     => esc_html__( 'Elements Number', 'okab' ),
						'description' => esc_html__( 'Enter the number of elements to display(Numeric value only)', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'items_phone',
						'heading'     => esc_html__( 'Elements Number in Phone', 'okab' ),
						'description' => esc_html__( 'Enter the number of elements to display in phone (Numeric value only)', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'items_tablet',
						'heading'     => esc_html__( 'Elements Number in Tablet', 'okab' ),
						'description' => esc_html__( 'Enter the number of elements to display in tablet (Numeric value only)', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'items_margin',
						'heading'     => esc_html__( 'Elements Margin', 'okab' ),
						'description' => esc_html__( 'Enter the margin value between elements (px)', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'smartphone',
						'heading'     => esc_html__( 'Devices', 'okab' ),
						'description' => esc_html__( 'Select device type', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Dark Phone', 'okab' )        => 'phone',
							esc_html__( 'Light phone', 'okab' )       => 'flat-phone',
							esc_html__( 'Dark Phone Land', 'okab' )   => 'phone-land',
							esc_html__( 'Light Phone Land', 'okab' )  => 'flat-phone-land',
							esc_html__( 'Dark Tablet', 'okab' )       => 'tablet',
							esc_html__( 'Light Tablet', 'okab' )      => 'flat-tablet',
							esc_html__( 'Dark Tablet Land', 'okab' )  => 'tablet-land',
							esc_html__( 'Light Tablet Land', 'okab' ) => 'flat-tablet-land',
							esc_html__( 'Flat Laptop', 'okab' )       => 'laptop',
							esc_html__( 'Flat Desktop', 'okab' )      => 'desktop',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * owl_slide
		 */
		vc_map(
			array(
				'base'            => 'owl_slide',
				'name'            => esc_html__( 'Slide Element', 'okab' ),
				'weight'          => 960,
				'class'           => 'dima-vc-element dima-vc-element-owl_slide',
				'icon'            => 'slider',
				'as_child'        => array( 'only' => 'owl_slider' ),
				'as_parent'       => array( 'except' => 'owl_slide' ),
				'category'        => esc_html__( 'Slideshow', 'okab' ),
				'description'     => esc_html__( 'Slide element settings', 'okab' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => $id_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => $class_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * FLEX SLIDER
		 */
		vc_map(
			array(
				'base'            => 'slider',
				'name'            => esc_html__( 'Flex Slider', 'okab' ),
				'weight'          => 900,
				'class'           => 'dima-vc-element dima-vc-element-slider',
				'icon'            => 'slider',
				'category'        => esc_html__( 'Slideshow', 'okab' ),
				'description'     => esc_html__( 'Add slider to your contents', 'okab' ),
				'as_parent'       => array( 'only' => 'slide' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'animation',
						'heading'     => esc_html__( 'Slider Animation Type', 'okab' ),
						'description' => esc_html__( 'Controls the animation type, "fade" or "slide"', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Fade', 'okab' )              => 'fade',
							esc_html__( 'Slide', 'okab' )             => 'slide',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'animation_speed',
						'heading'     => esc_html__( 'Animation Speed', 'okab' ),
						'description' => esc_html__( 'Set the speed of animations, in milliseconds', 'okab' ),
						'save_always' => true,
						'value'       => '600',
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'slide_show_speed',
						'heading'     => esc_html__( 'Slide Movement Speed', 'okab' ),
						'description' => esc_html__( 'Set the speed of the slideshow cycling, in milliseconds', 'okab' ),
						'save_always' => true,
						'value'       => '7000',
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'slideshow',
						'heading'     => esc_html__( 'AutoPlay', 'okab' ),
						'description' => esc_html__( 'Check to animate the slides automatically', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'control_nav',
						'heading'     => esc_html__( 'Navigation Control', 'okab' ),
						'description' => esc_html__( 'Select navigation for paging control of each slide', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( 'Hide', 'okab' )       => 'false',
							esc_html__( 'Bullets', 'okab' )    => 'true',
							esc_html__( 'Thumbnails', 'okab' ) => 'thumbnails',
						)
					),
					array(
						'param_name'  => 'thumbnails_num',
						'heading'     => esc_html__( 'Thumbnails Columns', 'okab' ),
						'description' => esc_html__( '', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'dependency'  => array(
							'element' => 'control_nav',
							'value'   => 'thumbnails',
						),
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Six Columns', 'okab' )       => '6',
							esc_html__( 'Nine Columns', 'okab' )      => '9',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'direction_nav',
						'heading'     => esc_html__( 'Navigation Direction', 'okab' ),
						'description' => esc_html__( 'Check to display previous/next arrow navigation.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'boxed',
						'heading'     => esc_html__( 'Boxed', 'okab' ),
						'description' => esc_html__( 'Check to add a box around the slider', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),

					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 *Flex slide
		 */
		vc_map(
			array(
				'base'            => 'slide',
				'name'            => esc_html__( 'Flex Slide Element', 'okab' ),
				'weight'          => 960,
				'class'           => 'dima-vc-element dima-vc-element-owl_slide',
				'icon'            => 'slider',
				'as_child'        => array( 'only' => 'slider' ),
				'as_parent'       => array( 'except' => 'slide', 'slider' ),
				'category'        => esc_html__( 'Slideshow', 'okab' ),
				'description'     => esc_html__( 'Slide item settings', 'okab' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'thumb',
						'heading'     => esc_html__( 'Image Thumbnail', 'okab' ),
						'description' => esc_html__( 'Display the image within the navigation items', 'okab' ),
						'save_always' => true,
						'type'        => 'attach_image',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => $id_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => $class_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Pricing table
		 */
		vc_map(
			array(
				'base'            => 'pricing_table_column',
				'name'            => esc_html__( 'Pricing Table', 'okab' ),
				'weight'          => 670,
				'class'           => 'dima-vc-element dima-vc-element-pricing-table-column',
				'icon'            => 'pricing-table',
				'category'        => esc_html__( 'Marketing', 'okab' ),
				'as_parent'       => array( 'only' => 'button,icon_list,clear,iconbox_header,google_maptwo,text' ),
				'js_view'         => 'VcColumnView',
				'description'     => esc_html__( 'Include a pricing table column', 'okab' ),
				'content_element' => true,
				'params'          => array(
					array(
						'param_name'  => 'type',
						'heading'     => esc_html__( 'Pricing Table Style', 'okab' ),
						'description' => esc_html__( 'Select the style of your pricing table', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							'Default' => '',
							'Zebra'   => 'zibra',
							'Callout' => 'callout',
							'Offers'  => 'offers',
						)
					),
					array(
						'param_name'  => 'href_callout',
						'heading'     => esc_html__( 'URL Link', 'okab' ),
						'description' => esc_html__( 'Enter in the URL you want your pricing table to link to.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'dependency'  => array(
							'element' => 'type',
							'value'   => 'callout',
						),

						'holder' => 'div'
					),

					array(
						'param_name'  => 'target',
						'heading'     => esc_html__( 'Open link in a new tab', 'okab' ),
						'description' => esc_html__( 'Select to open your button link in a new tab.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'type',
							'value'   => 'callout',
						),
						'value'       => array(
							'' => 'blank'
						)
					),
					array(
						'param_name'  => 'title',
						'heading'     => esc_html__( 'Pricing Table Title', 'okab' ),
						'description' => esc_html__( 'Include a title for your pricing table.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'dependency'  => array(
							'element' => 'type',
							'value'   => array( 'callout', 'zibra', '' ),
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'color_class',
						'heading'     => esc_html__( 'Pricing Table Title Background Color', 'okab' ),
						'description' => esc_html__( 'Choose Header Background color', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'dependency'  => array(
							'element' => 'type',
							'value'   => array( 'callout', 'zibra', '' ),
						),
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Default', 'okab' )           => '',
							esc_html__( 'Header', 'okab' )            => 'di_header',
							esc_html__( 'Green', 'okab' )             => 'di_green',
							esc_html__( 'Blue', 'okab' )              => 'di_blue',
							esc_html__( 'Yellow', 'okab' )            => 'di_yellow',
							esc_html__( 'Red', 'okab' )               => 'di_red',
							esc_html__( 'Purple', 'okab' )            => 'di_purple',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'featured',
						'heading'     => esc_html__( 'Popular Pricing Table Type', 'okab' ),
						'description' => esc_html__( 'Choose to make this your popular offer.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'type',
							'value'   => array( 'callout', 'zibra', '' ),
						),
						'value'       => array(
							'None'            => '',
							'Colored'         => 'true',
							'Colored & Large' => 'larg'
						)
					),
					array(
						'param_name'  => 'price',
						'heading'     => esc_html__( 'Price', 'okab' ),
						'description' => esc_html__( 'Enter the price for this pricing table.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'dependency'  => array(
							'element' => 'type',
							'value'   => array( 'callout', 'zibra', '' ),
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'currency',
						'heading'     => esc_html__( 'Currency Symbol', 'okab' ),
						'description' => esc_html__( 'Enter the currency symbol you want to use.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'dependency'  => array(
							'element' => 'type',
							'value'   => array( 'callout', 'zibra', '' ),
						),
						'value'       => '$',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'interval',
						'heading'     => esc_html__( 'Interval', 'okab' ),
						'description' => esc_html__( 'Enter the time period that this pricing table is for.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'dependency'  => array(
							'element' => 'type',
							'value'   => array( 'callout', 'zibra', '' ),
						),
						'holder'      => 'div',
						'value'       => esc_html__( 'Per Month', 'okab' )
					),
					array(
						'param_name'  => 'shadow',
						'heading'     => esc_html__( 'Drop Shadow', 'okab' ),
						'description' => esc_html__( 'Check to add drop shadow effect to the table', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'type',
							'value'   => array( 'callout', 'zibra', '' ),
						),
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'full_line',
						'heading'     => esc_html__( 'Full width separator', 'okab' ),
						'description' => esc_html__( 'Check to display the separator Full width.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Buttons
		 */
		vc_map(
			array(
				'base'        => 'button',
				'name'        => esc_html__( 'Button', 'okab' ),
				'weight'      => 720,
				'class'       => 'dima-vc-element dima-vc-element-button',
				'icon'        => 'button',
				'category'    => esc_html__( 'Marketing', 'okab' ),
				'description' => esc_html__( 'Add a clickable button to your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'text',
						'heading'     => esc_html__( 'Button Text', 'okab' ),
						'description' => esc_html__( 'Enter your button text.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div',
						'value'       => 'Enter your text'
					),
					array(
						'param_name'  => 'type',
						'heading'     => esc_html__( 'Button Style', 'okab' ),
						'description' => esc_html__( 'Select the button style.', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							'Fill'                                    => 'fill',
							'Outline'                                 => 'stroke',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'direction',
						'heading'     => esc_html__( 'Animation Direction', 'okab' ),
						'description' => esc_html__( 'Select button animation direction (Applied in Outline style only)', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'dependency'  => array(
							'element' => 'type',
							'value'   => 'stroke',
						),
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Up', 'okab' )                => 'up',
							esc_html__( 'Down', 'okab' )              => 'down',
							esc_html__( 'Start', 'okab' )             => 'start',
							esc_html__( 'End', 'okab' )               => 'end',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'size',
						'heading'     => esc_html__( 'Button Size', 'okab' ),
						'description' => esc_html__( 'Select the button size.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Mini', 'okab' )              => 'mini',
							esc_html__( 'Small', 'okab' )             => 'small',
							esc_html__( 'Large', 'okab' )             => 'large',
							esc_html__( 'Big', 'okab' )               => 'big',
							esc_html__( 'Huge', 'okab' )              => 'huge',
						)
					),
					array(
						'param_name'  => 'shape',
						'heading'     => esc_html__( 'Button Shape', 'okab' ),
						'description' => esc_html__( 'Select the button shape.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Square', 'okab' )            => 'dima-btn-no-rounded',
							esc_html__( 'Radius', 'okab' )            => 'dima-btn-rounded',
							esc_html__( 'Pill', 'okab' )              => 'dima-btn-pill'
						)
					),
					array(
						'param_name'  => 'color_class',
						'heading'     => esc_html__( 'Button Color', 'okab' ),
						'description' => esc_html__( 'Choose button color', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Default', 'okab' )           => '',
							esc_html__( 'Header', 'okab' )            => 'di_header',
							esc_html__( 'White', 'okab' )             => 'di_white',
							esc_html__( 'Green', 'okab' )             => 'di_green',
							esc_html__( 'Blue', 'okab' )              => 'di_blue',
							esc_html__( 'Yellow', 'okab' )            => 'di_yellow',
							esc_html__( 'Red', 'okab' )               => 'di_red',
							esc_html__( 'Purple', 'okab' )            => 'di_purple',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'float',
						'heading'     => esc_html__( 'Button Float', 'okab' ),
						'description' => esc_html__( 'Optionally float the button.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'None', 'okab' )              => 'none',
							esc_html__( 'Start', 'okab' )             => 'start',
							esc_html__( 'Center', 'okab' )            => 'center',
							esc_html__( 'End', 'okab' )               => 'end'
						)
					),
					array(
						'param_name'  => 'href',
						'heading'     => esc_html__( 'URL Link', 'okab' ),
						'description' => esc_html__( 'Enter in the URL you want your button to link to.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'target',
						'heading'     => esc_html__( 'Open link in a new tab', 'okab' ),
						'description' => esc_html__( 'Check to open your button link in a new tab.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'blank'
						)
					),

					array(
						'param_name'  => 'block',
						'heading'     => esc_html__( 'Block', 'okab' ),
						'description' => esc_html__( 'Check to make the button occupy the column width.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'disabled',
						'heading'     => esc_html__( 'Disabled Button', 'okab' ),
						'description' => esc_html__( 'Check to activate disabled button (Applied only for button fill style.)', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'type',
							'value'   => 'fill',
						),
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Icons library', 'okab' ),
						'value'       => array(
							esc_html__( 'Font Awesome', 'okab' ) => 'fontawesome',
							esc_html__( 'Custom Font', 'okab' )  => 'customfont',
						),
						'param_name'  => 'icon_type',
						'description' => esc_html__( 'Select icons library.', 'okab' ),
					),
					array(
						'param_name'  => 'icon',
						'heading'     => esc_html__( 'Icon Class', 'okab' ),
						'description' => esc_html__( 'Enter Icon Class from Font Awesome or Simple Line Icons.', 'okab' ),
						'value'       => 'simple-icon-user',
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'customfont',
						),
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'type'        => 'iconpicker',
						'heading'     => esc_html__( 'Icon', 'okab' ),
						'param_name'  => 'icon_fontawesome',
						'value'       => '', // default value to backend editor admin_label
						'settings'    => array(
							'emptyIcon'    => true,
							// default true, display an "EMPTY" icon?
							'value'        => 'fontawesome',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'fontawesome',
						),
						'description' => esc_html__( 'Select icon from library.', 'okab' ),
					),
					array(
						'param_name'  => 'lightbox',
						'heading'     => esc_html__( 'Lightbox Type', 'okab' ),
						'description' => esc_html__( 'Select your lightbox type (iframe: for youtube, map,..)', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							'None'                                    => '',
							'image'                                   => 'image',
							'iframe'                                  => 'iframe',
							'ajax'                                    => 'ajax'
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'popup_type',
						'heading'     => esc_html__( 'Popup Info type', 'okab' ),
						'description' => esc_html__( 'Select to choose the type of popup info.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							'None'                                    => '',
							'Popover'                                 => 'popover',
							'Tooltip'                                 => 'tooltip'
						)
					),

					array(
						'param_name'  => 'title',
						'heading'     => esc_html__( 'Popup Info Title', 'okab' ),
						'description' => esc_html__( 'Enter in the title attribute you want for your button (This will apply as title for popover or tooltip if you have active it from -Popup Info type-).', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'popup_trigger',
						'heading'     => esc_html__( 'Popup Trigger', 'okab' ),
						'description' => esc_html__( 'Select what actions you want to trigger the popover or tooltip.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							'Hover'                                   => 'hover',
							'Click'                                   => 'click',
							'Focus'                                   => 'focus'
						)
					),
					array(
						'param_name'  => 'popup_place',
						'heading'     => esc_html__( 'Popup Position', 'okab' ),
						'description' => esc_html__( 'Select the popup position.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							'Top'                                     => 'top',
							'Left'                                    => 'left',
							'Right'                                   => 'right',
							'Bottom'                                  => 'bottom'
						)
					),
					array(
						'param_name'  => 'popup_content',
						'heading'     => esc_html__( 'Info Content', 'okab' ),
						'description' => esc_html__( 'Extra content for the popover.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);


		/**
		 * CallOut
		 */
		vc_map(
			array(
				'base'            => 'callout',
				'name'            => esc_html__( 'Callout', 'okab' ),
				'weight'          => 710,
				'class'           => 'dima-vc-element dima-vc-element-callout',
				'icon'            => 'callout',
				'category'        => esc_html__( 'Marketing', 'okab' ),
				'as_parent'       => array( 'only' => 'button,clear' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'description'     => esc_html__( 'Include a callout into your content', 'okab' ),
				'params'          => array(
					array(
						'param_name'  => 'type',
						'heading'     => esc_html__( 'Callout Type', 'okab' ),
						'description' => esc_html__( 'Select the callout type.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' )    => '',
							esc_html__( 'Button on the bottom', 'okab' ) => 'style_one',
							esc_html__( 'Button on the side', 'okab' )   => 'style_two',
							esc_html__( 'No button', 'okab' )            => 'style_three',
						)
					),
					array(
						'param_name'  => 'direction',
						'heading'     => esc_html__( 'Contents Alignment', 'okab' ),
						'description' => esc_html__( 'Select the alignment for your callout contents.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Start', 'okab' )             => 'start',
							esc_html__( 'Center', 'okab' )            => 'center',
							esc_html__( 'End', 'okab' )               => 'end'
						)
					),
					array(
						'param_name'  => 'title',
						'heading'     => esc_html__( 'Callout Title', 'okab' ),
						'description' => esc_html__( 'Enter the title for your callout.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'message',
						'heading'     => esc_html__( 'Callout text', 'okab' ),
						'description' => esc_html__( 'Enter the text for your callout.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'bg_color',
						'heading'     => esc_html__( 'Callout Background color', 'okab' ),
						'description' => esc_html__( 'Choose the background color for your callout', 'okab' ),
						'save_always' => true,
						'type'        => 'colorpicker',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'title_color',
						'heading'     => esc_html__( 'Callout Title Color', 'okab' ),
						'description' => esc_html__( 'Choose the title color for your callout', 'okab' ),
						'save_always' => true,
						'type'        => 'colorpicker',
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'text_color',
						'heading'     => esc_html__( 'Callout Text color', 'okab' ),
						'description' => esc_html__( 'Choose the text color for your callout', 'okab' ),
						'save_always' => true,
						'type'        => 'colorpicker',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'bg_image',
						'heading'     => esc_html__( 'Callout Background Image', 'okab' ),
						'description' => esc_html__( 'Add a background image to your callout', 'okab' ),
						'save_always' => true,
						'type'        => 'attach_image',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'parallax',
						'heading'     => esc_html__( 'Parallax', 'okab' ),
						'description' => esc_html__( 'Select to activate the parallax effect (Applied only for background patterns and images)', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Parallax', 'okab' )          => 'parallax',
							esc_html__( 'Fixed Parallax', 'okab' )    => 'fixed_parallax',
						)
					),
					array(
						'param_name'  => 'cover',
						'heading'     => esc_html__( 'Cover Background', 'okab' ),
						'description' => esc_html__( 'Check to activate the cover above the background patterns and images.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array( '' => 'true' )
					),
					array(
						'param_name'  => 'no_border',
						'heading'     => esc_html__( 'Remove Border', 'okab' ),
						'description' => esc_html__( 'Check to remove the border of the callout', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array( '' => 'true' )
					),
					array(
						'param_name'  => 'dima_box_shadow',
						'heading'     => esc_html__( 'Drop Shadow', 'okab' ),
						'description' => esc_html__( 'Check to add drop shadow effect to the callout', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array( '' => 'true' )
					),
					array(
						'param_name'  => 'full',
						'heading'     => esc_html__( 'Full-Width', 'okab' ),
						'description' => esc_html__( 'Check to make the callout full-width', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array( '' => 'true' )
					),
					array(
						'param_name'  => 'href',
						'heading'     => esc_html__( 'URL Link', 'okab' ),
						'description' => esc_html__( 'Enter in the URL you want your callout button to link to.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'target',
						'heading'     => esc_html__( 'Open link in a new tab', 'okab' ),
						'description' => esc_html__( 'Check to open your callout link button in a new tab.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'blank'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Alert
		 */
		vc_map(
			array(
				'base'        => 'alert',
				'name'        => esc_html__( 'Alert Box', 'okab' ),
				'weight'      => 650,
				'class'       => 'dima-vc-element dima-vc-element-alert',
				'icon'        => 'alert',
				'category'    => esc_html__( 'Information', 'okab' ),
				'description' => esc_html__( 'Show information to users with alerts', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Text', 'okab' ),
						'description' => esc_html__( 'Enter your text.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'heading',
						'heading'     => esc_html__( 'Alert Box Title', 'okab' ),
						'description' => esc_html__( 'Enter the title of your alert box.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'type',
						'heading'     => esc_html__( 'Alert Box Type', 'okab' ),
						'description' => esc_html__( 'Select the alert box type.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( 'Info', 'okab' )    => 'info',
							esc_html__( 'Success', 'okab' ) => 'success',
							esc_html__( 'Warning', 'okab' ) => 'warning',
							esc_html__( 'Error', 'okab' )   => 'error',
							esc_html__( 'Custom', 'okab' )  => 'custom',
						)
					),
					array(
						'param_name'  => 'is_icon',
						'heading'     => esc_html__( 'Alert Box Icon', 'okab' ),
						'description' => esc_html__( 'Check to display alert icon.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'icons library', 'okab' ),
						'value'       => array(
							esc_html__( 'Font Awesome', 'okab' ) => 'fontawesome',
							esc_html__( 'Custom Font', 'okab' )  => 'customfont',
						),
						'dependency'  => array(
							'element' => 'type',
							'value'   => 'custom',
						),
						'param_name'  => 'icon_type',
						'description' => esc_html__( 'Select icons library.', 'okab' ),
					),
					array(
						'param_name'  => 'icon',
						'heading'     => esc_html__( 'Icon Class', 'okab' ),
						'description' => esc_html__( 'Enter Icon Class from Font Awesome or Simple Line Icons.', 'okab' ),
						'value'       => 'simple-icon-user',
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'customfont',
						),
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'type'        => 'iconpicker',
						'heading'     => esc_html__( 'Icon', 'okab' ),
						'param_name'  => 'icon_fontawesome',
						'value'       => '',
						'settings'    => array(
							'emptyIcon'    => true,
							'value'        => 'fontawesome',
							'iconsPerPage' => 4000,
						),
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'fontawesome',
						),
						'description' => esc_html__( 'Select icon from library.', 'okab' ),
					),
					array(
						'param_name'  => 'bg_color',
						'heading'     => esc_html__( 'Background Color', 'okab' ),
						'description' => esc_html__( 'Choose background color for the text', 'okab' ),
						'type'        => 'colorpicker',
						'dependency'  => array(
							'element' => 'type',
							'value'   => 'custom',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'close',
						'heading'     => esc_html__( 'Alert box Close Icon', 'okab' ),
						'description' => esc_html__( 'Check to display the close icon.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Google Map
		 */
		vc_map(
			array(
				'base'            => 'google_maptwo',
				'name'            => esc_html__( 'Google Map', 'okab' ),
				'weight'          => 530,
				'class'           => 'dima-vc-element dima-vc-element-google-map',
				'icon'            => 'google-map',
				'category'        => esc_html__( 'Media', 'okab' ),
				'description'     => esc_html__( 'Embed a customizable Google map', 'okab' ),
				'as_parent'       => array( 'only' => 'google_map_marker' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'lat',
						'heading'     => esc_html__( 'Latitude', 'okab' ),
						'description' => esc_html__( 'Enter the center latitude of your map.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'lng',
						'heading'     => esc_html__( 'Longitude', 'okab' ),
						'description' => esc_html__( 'Enter the center longitude of your map.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'shape',
						'heading'     => esc_html__( 'Shape', 'okab' ),
						'description' => esc_html__( 'Select map shape', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'//circle
						)

					),
					array(
						'param_name'  => 'drag',
						'heading'     => esc_html__( 'Draggable', 'okab' ),
						'description' => esc_html__( 'Check to allow users drag the map view.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'zoom',
						'heading'     => esc_html__( 'Zoom Level', 'okab' ),
						'description' => esc_html__( 'Choose the initial zoom level of your map. This value should be between 1 and 18. 1 is fully zoomed out and 18 is right at street level.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'zoom_control',
						'heading'     => esc_html__( 'Zoom Control', 'okab' ),
						'description' => esc_html__( 'Check to activate the zoom control for the map.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'height',
						'heading'     => esc_html__( 'Height', 'okab' ),
						'description' => esc_html__( 'Choose an optional height for your map. If no height is selected, a responsive, proportional unit will be used. Any type of unit is acceptable (e.g. 450px, 30em, 40%, et cetera).', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'width',
						'heading'     => esc_html__( 'Width', 'okab' ),
						'description' => esc_html__( 'Choose an optional width for your map. If no height is selected, a responsive, proportional unit will be used. Any type of unit is acceptable (e.g. 450px, 30em, 40%, et cetera).', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'hue',
						'heading'     => esc_html__( 'Custom Color', 'okab' ),
						'description' => esc_html__( 'Choose an optional custom color for your map.', 'okab' ),
						'type'        => 'colorpicker',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'boxed',
						'heading'     => esc_html__( 'Boxed', 'okab' ),
						'description' => esc_html__( 'Check to add a box around the map', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
				)
			)
		);

		/**
		 * Google Map Marker
		 */
		vc_map(
			array(
				'base'            => 'google_map_marker',
				'name'            => esc_html__( 'Google Map Marker', 'okab' ),
				'weight'          => 530,
				'class'           => 'dima-vc-element dima-vc-element-google-map-marker',
				'icon'            => 'google-map-marker',
				'category'        => esc_html__( 'Media', 'okab' ),
				'description'     => esc_html__( 'Place a location marker on your Google map', 'okab' ),
				'as_child'        => array( 'only' => 'google_map' ),
				'content_element' => true,
				'params'          => array(
					array(
						'param_name'  => 'lat',
						'heading'     => esc_html__( 'Marker Latitude', 'okab' ),
						'description' => esc_html__( 'Enter the latitude of your marker.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'lng',
						'heading'     => esc_html__( 'Marker Longitude', 'okab' ),
						'description' => esc_html__( 'Enter the longitude of your marker.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'info',
						'heading'     => esc_html__( 'Additional Information', 'okab' ),
						'description' => esc_html__( 'Optional description text to appear in a popup when your marker is clicked on.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'image',
						'heading'     => esc_html__( 'Custom Marker Image', 'okab' ),
						'description' => esc_html__( 'Utilize a custom marker image instead of the default provided by Google.', 'okab' ),
						'type'        => 'attach_image',
						'holder'      => 'div'
					),
				)
			)
		);

		/**
		 * Google Map Embed
		 */
		vc_map(
			array(
				'base'        => 'map',
				'name'        => esc_html__( 'Map', 'okab' ),
				'weight'      => 530,
				'class'       => 'dima-vc-element dima-vc-element-map',
				'icon'        => 'map',
				'category'    => esc_html__( 'Media', 'okab' ),
				'description' => esc_html__( 'Embed a map from a third-party provider', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Code', 'okab' ),
						'description' => esc_html__( 'Switch to the "text" editor and do not place anything else here other than your &lsaquo;iframe&rsaquo; or &lsaquo;embed&rsaquo; code.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'boxed',
						'heading'     => esc_html__( 'Box', 'okab' ),
						'description' => esc_html__( 'Check to add box around the map', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
				)
			)
		);
		vc_map(
			array(
				'base'        => 'custom_heading',
				'name'        => esc_html__( 'Custom heading', 'okab' ),
				'weight'      => 530,
				'class'       => 'dima-vc-element dima-vc-element-text',
				'icon'        => 'text',
				'category'    => esc_html__( 'Typography', 'okab' ),
				'description' => esc_html__( 'Include a custom headline in your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Text', 'okab' ),
						'description' => esc_html__( 'Enter your text', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'level',
						'heading'     => esc_html__( 'Heading Level', 'okab' ),
						'description' => esc_html__( 'Select which level to use for your heading.', 'okab' ),
						'type'        => 'dropdown',
						'value'       => array(
							'h1' => 'h1',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6'
						)
					),
					array(
						'param_name'  => 'float',
						'heading'     => esc_html__( 'Heading Alignment', 'okab' ),
						'description' => esc_html__( 'Select heading alignment.', 'okab' ),
						'type'        => 'dropdown',
						'value'       => array(
							'Start'  => 'start',
							'Center' => 'center',
							'End'    => 'end'
						)
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Icons library', 'okab' ),
						'value'       => array(
							esc_html__( 'Font Awesome', 'okab' ) => 'fontawesome',
							esc_html__( 'Custom Font', 'okab' )  => 'customfont',
						),
						'param_name'  => 'icon_type',
						'description' => esc_html__( 'Select icons library.', 'okab' ),
					),
					array(
						'param_name'  => 'icon',
						'heading'     => esc_html__( 'Icon Class', 'okab' ),
						'description' => esc_html__( 'Enter Icon Class from Font Awesome or Simple Line Icons.', 'okab' ),
						'value'       => 'simple-icon-user',
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'customfont',
						),
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'type'        => 'iconpicker',
						'heading'     => esc_html__( 'Icon', 'okab' ),
						'param_name'  => 'icon_fontawesome',
						'value'       => '', // default value to backend editor admin_label
						'settings'    => array(
							'emptyIcon'    => true,
							// default true, display an "EMPTY" icon?
							'value'        => 'fontawesome',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'fontawesome',
						),
						'description' => esc_html__( 'Select icon from library.', 'okab' ),
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
				)
			)
		);

		/**
		 * iconbox
		 */
		vc_map(
			array(
				'base'            => 'iconbox',
				'name'            => esc_html__( 'Iconbox', 'okab' ),
				'weight'          => 530,
				'class'           => 'dima-vc-element dima-vc-element-iconbox',
				'icon'            => 'iconbox',
				'category'        => esc_html__( 'Media', 'okab' ),
				'description'     => esc_html__( 'Add iconbox to your content', 'okab' ),
				'as_parent'       => array( 'only' => 'iconbox_header,iconbox_content,google_maptwo' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'boxed',
						'heading'     => esc_html__( 'Add box', 'okab' ),
						'description' => esc_html__( 'Check to add box around the iconbox', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'box_bg',
						'heading'     => esc_html__( 'Background Color', 'okab' ),
						'description' => esc_html__( 'Choose box background color.', 'okab' ),
						'type'        => 'colorpicker',
						'dependency'  => array(
							'element' => 'boxed',
							'value'   => 'true',
						)
					),
					array(
						'param_name'  => 'align',
						'heading'     => esc_html__( 'Icon Alignment', 'okab' ),
						'description' => esc_html__( 'Select the alignment of the icon', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( 'Select Options', 'okab' ) => '',
							esc_html__( 'Start', 'okab' )          => 'start',
							esc_html__( 'Center', 'okab' )         => 'center',
							esc_html__( 'End', 'okab' )            => 'end',
						)
					),
					array(
						'param_name'  => 'href',
						'heading'     => esc_html__( 'URL Link', 'okab' ),
						'description' => esc_html__( 'Enter in the URL you want your iconbox to link to.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'target',
						'heading'     => esc_html__( 'Open link in a new tab', 'okab' ),
						'description' => esc_html__( 'Check to open your image link in a new tab.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'blank'
						)
					),
					array(
						'param_name'  => 'hover',
						'heading'     => esc_html__( 'No Hover', 'okab' ),
						'description' => esc_html__( 'Check to remove the iconbox hover', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'boxed',
							'value'   => 'true',
						),
						'value'       => array(
							'' => 'false'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
				)
			)
		);

		/**
		 * Iconbox header
		 */
		vc_map(
			array(
				'base'        => 'iconbox_header',
				'name'        => esc_html__( 'Iconbox header', 'okab' ),
				'weight'      => 530,
				'class'       => 'dima-vc-element dima-vc-element-iconbox_header',
				'icon'        => 'iconbox-header',
				'category'    => esc_html__( 'Media', 'okab' ),
				'description' => esc_html__( 'Add header to the iconbox', 'okab' ),
				'params'      => array(
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Header Type', 'okab' ),
						'value'       => array(
							esc_html__( 'Icon', 'okab' )  => 'icon',
							esc_html__( 'Image', 'okab' ) => 'image',
						),
						'param_name'  => 'icon_or_image',
						'description' => esc_html__( 'Select type of iconbox header', 'okab' ),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Icons library', 'okab' ),
						'value'       => array(
							esc_html__( 'Font Awesome', 'okab' ) => 'fontawesome',
							esc_html__( 'Custom Font', 'okab' )  => 'customfont',
						),
						'dependency'  => array(
							'element' => 'icon_or_image',
							'value'   => 'icon',
						),
						'param_name'  => 'icon_type',
						'description' => esc_html__( 'Select icons library.', 'okab' ),
					),
					array(
						'param_name'  => 'icon',
						'heading'     => esc_html__( 'Icon Class', 'okab' ),
						'description' => esc_html__( 'Enter Icon Class from Font Awesome or Simple Line Icons.', 'okab' ),
						'value'       => 'simple-icon-user',
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'customfont',
						),
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'type'        => 'iconpicker',
						'heading'     => esc_html__( 'Icon', 'okab' ),
						'param_name'  => 'icon_fontawesome',
						'value'       => '', // default value to backend editor admin_label
						'settings'    => array(
							'emptyIcon'    => true,
							// default true, display an "EMPTY" icon?
							'value'        => 'fontawesome',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'fontawesome',
						),
						'description' => esc_html__( 'Select icon from library.', 'okab' ),
					),
					array(
						'param_name'  => 'hover',
						'heading'     => esc_html__( 'No Hover', 'okab' ),
						'description' => esc_html__( 'Check to remove the icon/image hover', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'false'
						)
					),
					array(
						'param_name'  => 'size',
						'heading'     => esc_html__( 'Icon Size', 'okab' ),
						'description' => esc_html__( 'Choose size of the icon', 'okab' ),
						'type'        => 'dropdown',
						'dependency'  => array(
							'element' => 'icon_or_image',
							'value'   => 'icon',
						),
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => 'normal',
							esc_html__( 'Default', 'okab' )           => 'normal',
							esc_html__( 'Small', 'okab' )             => 'small',
							esc_html__( 'Medium', 'okab' )            => 'medium',
							esc_html__( 'Large', 'okab' )             => 'larg',
						)
					),
					array(
						'param_name'  => 'image',
						'heading'     => esc_html__( 'Use Image', 'okab' ),
						'description' => esc_html__( 'Use image for the iconbox', 'okab' ),
						'type'        => 'attach_image',
						'dependency'  => array(
							'element' => 'icon_or_image',
							'value'   => 'image',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'alt',
						'heading'     => esc_html__( 'Alt Text', 'okab' ),
						'description' => '',
						'type'        => 'textfield',
						'dependency'  => array(
							'element' => 'icon_or_image',
							'value'   => 'image',
						),
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'image_size',
						'heading'     => esc_html__( 'Image size', 'okab' ),
						'description' => esc_html__( 'Choose size of the image', 'okab' ),
						'type'        => 'dropdown',
						'dependency'  => array(
							'element' => 'icon_or_image',
							'value'   => 'image',
						),
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => 'medium',
							esc_html__( 'Small', 'okab' )             => 'small',
							esc_html__( 'Medium', 'okab' )            => 'medium',
							esc_html__( 'Large', 'okab' )             => 'larg',
						)
					),
					array(
						'param_name'  => 'type',
						'heading'     => esc_html__( 'Shape', 'okab' ),
						'description' => esc_html__( 'Select the shape around the icon/Image', 'okab' ),
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'None', 'okab' )              => '',
							esc_html__( 'Circle', 'okab' )            => 'circle',
							esc_html__( 'Square', 'okab' )            => 'square',
						)
					),
					array(
						'param_name'  => 'icon_color',
						'heading'     => esc_html__( 'Icon Color', 'okab' ),
						'description' => esc_html__( 'Choose icon color.', 'okab' ),
						'dependency'  => array(
							'element' => 'icon_or_image',
							'value'   => 'icon',
						),
						'type'        => 'colorpicker',
					),
					array(
						'param_name'  => 'icon_bg',
						'heading'     => esc_html__( 'Icon Background', 'okab' ),
						'description' => esc_html__( 'Choose icon background color.', 'okab' ),
						'type'        => 'colorpicker',
						'dependency'  => array(
							'element' => 'type',
							'value'   => array( 'circle', 'square' ),
						)
					),
					array(
						'param_name'  => 'shadow_color',
						'heading'     => esc_html__( 'Icon Border', 'okab' ),
						'description' => esc_html__( 'Choose icon border color.', 'okab' ),
						'type'        => 'colorpicker',
						'dependency'  => array(
							'element' => 'type',
							'value'   => array( 'circle', 'square' ),
						)
					),
				)
			)
		);

		/**
		 * Iconbox content
		 */
		vc_map(
			array(
				'base'            => 'iconbox_content',
				'name'            => esc_html__( 'Iconbox Content', 'okab' ),
				'weight'          => 530,
				'class'           => 'dima-vc-element dima-vc-element-iconbox_content',
				'icon'            => 'iconbox',
				'category'        => esc_html__( 'Media', 'okab' ),
				'description'     => esc_html__( 'Iconbox content settings', 'okab' ),
				'as_child'        => array( 'only' => 'iconbox,process' ),
				'content_element' => true,
				'params'          => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Text', 'okab' ),
						'description' => esc_html__( 'Enter your text', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'title',
						'heading'     => esc_html__( 'Iconbox Title', 'okab' ),
						'description' => esc_html__( 'Add iconbox title', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'title_color',
						'heading'     => esc_html__( 'Title Color ', 'okab' ),
						'description' => esc_html__( 'Choose header title color', 'okab' ),
						'type'        => 'colorpicker',
					),
					array(
						'param_name'  => 'title_hover',
						'heading'     => esc_html__( 'No Hover', 'okab' ),
						'description' => esc_html__( 'Check to remove the title hover', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'false'
						)
					),
				)
			)
		);

		/**
		 * Date Timeline
		 */
		vc_map(
			array(
				'base'            => 'date_timeline',
				'name'            => esc_html__( 'Timeline', 'okab' ),
				'weight'          => 530,
				'class'           => 'dima-vc-element dima-vc-element-date_timeline',
				'icon'            => 'date-timeline',
				'category'        => esc_html__( 'Media', 'okab' ),
				'description'     => esc_html__( 'Add timeline to your content', 'okab' ),
				'as_parent'       => array( 'only' => 'date_timeline_item' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => $id_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
				)
			)
		);

		/**
		 * Date Timeline Item
		 */
		vc_map(
			array(
				'base'            => 'date_timeline_item',
				'name'            => esc_html__( 'Timeline Item', 'okab' ),
				'weight'          => 530,
				'class'           => 'dima-vc-element dima-vc-element-date_timeline_item',
				'icon'            => 'date-timeline',
				'category'        => esc_html__( 'Media', 'okab' ),
				'description'     => esc_html__( 'Date timtline item settings', 'okab' ),
				'as_child'        => array( 'only' => 'date_timeline' ),
				'content_element' => true,
				'params'          => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Code', 'okab' ),
						'description' => esc_html__( 'Add timeline item content', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'date',
						'heading'     => esc_html__( 'Date', 'okab' ),
						'description' => esc_html__( 'Add date to display in timeline item.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'float',
						'heading'     => esc_html__( 'Float', 'okab' ),
						'description' => esc_html__( 'Select the position of timeline item.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'None', 'okab' )              => '',
							esc_html__( 'Start', 'okab' )             => 'start',
							esc_html__( 'End', 'okab' )               => 'end',
						)
					),
					array(
						'param_name'  => 'boxed',
						'heading'     => esc_html__( 'Remove Border', 'okab' ),
						'description' => esc_html__( 'Check to remove the border around the timeline item', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),

					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => $id_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
				)
			)
		);

		/**
		 * Icon Timeline
		 */
		vc_map(
			array(
				'base'            => 'process',
				'name'            => esc_html__( 'Process', 'okab' ),
				'weight'          => 530,
				'class'           => 'dima-vc-element dima-vc-element-process',
				'icon'            => 'icon-timeline',
				'category'        => esc_html__( 'Media', 'okab' ),
				'description'     => esc_html__( 'Add icon timeline to your content', 'okab' ),
				'as_parent'       => array( 'only' => 'iconbox' ),
				'js_view'         => 'VcColumnView',
				'content_element' => true,
				'params'          => array(
					array(
						'param_name'  => 'vh',
						'heading'     => esc_html__( 'Process Style', 'okab' ),
						'description' => esc_html__( '', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Vertical', 'okab' )          => 'process-v',
							esc_html__( 'Horizontal', 'okab' )        => 'process-h',
						)
					),
					array(
						'param_name'  => 'columns',
						'heading'     => esc_html__( 'Columns', 'okab' ),
						'description' => esc_html__( '', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'vh',
							'value'   => 'process-h',
						),
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Three', 'okab' )             => 'columns-3',
							esc_html__( 'Four', 'okab' )              => 'columns-4',
							esc_html__( 'Five', 'okab' )              => 'columns-5',
						)
					),

					array(
						'param_name'  => 'float',
						'heading'     => esc_html__( 'Float', 'okab' ),
						'description' => esc_html__( 'Select the position of the process', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'vh',
							'value'   => 'process-v',
						),
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'None', 'okab' )              => '',
							esc_html__( 'Start', 'okab' )             => 'start',
							esc_html__( 'End', 'okab' )               => 'end',
						)
					),
					array(
						'param_name'  => 'type',
						'heading'     => esc_html__( 'Icon Size', 'okab' ),
						'description' => esc_html__( 'Select the size of icon', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Small', 'okab' )             => 'small',
							esc_html__( 'Large', 'okab' )             => 'larg',
							esc_html__( 'Medium', 'okab' )            => 'mediam',
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => $id_des,
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
				)
			)
		);


		/**
		 * Video player.
		 */
		vc_map(
			array(
				'base'        => 'dima_video_player',
				'name'        => esc_html__( 'Video (Self Hosted)', 'okab' ),
				'weight'      => 570,
				'class'       => 'dima-vc-element dima-vc-element-video-player',
				'icon'        => 'video-player',
				'category'    => esc_html__( 'Media', 'okab' ),
				'description' => esc_html__( 'Include responsive video into your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'm4v',
						'heading'     => esc_html__( 'M4V', 'okab' ),
						'description' => esc_html__( 'Enter URL Link .m4v version of your video.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'ogv',
						'heading'     => esc_html__( 'OGV', 'okab' ),
						'description' => esc_html__( 'Enter URL Link .ogv version of your video for additional native browser support.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'poster',
						'heading'     => esc_html__( 'Poster Image', 'okab' ),
						'description' => esc_html__( 'Add a poster image for your self-hosted video.', 'okab' ),
						'type'        => 'attach_image',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'hide_controls',
						'heading'     => esc_html__( 'Hide Controls', 'okab' ),
						'description' => esc_html__( 'Check to hide the controls on your self-hosted video.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'muted',
						'heading'     => esc_html__( 'Muted', 'okab' ),
						'description' => esc_html__( 'Check to mute the video', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'loop',
						'heading'     => esc_html__( 'Auto Replay', 'okab' ),
						'description' => esc_html__( 'Check to activate auto replay for your self-hosted video', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'autoplay',
						'heading'     => esc_html__( 'Autoplay', 'okab' ),
						'description' => esc_html__( 'Check to automatically play your self-hosted video.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'boxed',
						'heading'     => esc_html__( 'Remove Border', 'okab' ),
						'description' => esc_html__( 'Check to remove the border around the video.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Video embed
		 */
		vc_map(
			array(
				'base'        => 'dima_embed_video',
				'name'        => esc_html__( 'Video (Embedded)', 'okab' ),
				'weight'      => 560,
				'class'       => 'dima-vc-element dima-vc-element-video-embed',
				'icon'        => 'video-embed',
				'category'    => esc_html__( 'Media', 'okab' ),
				'description' => esc_html__( 'Include responsive video into your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Code', 'okab' ),
						'description' => esc_html__( 'Switch to the "text" editor and do not place anything else here other than your &lsaquo;iframe&rsaquo; or &lsaquo;embed&rsaquo; code.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'boxed',
						'heading'     => esc_html__( 'Boxed', 'okab' ),
						'description' => esc_html__( 'Check to add a box around the video.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Audio player
		 */
		vc_map(
			array(
				'base'        => 'dima_audio_player',
				'name'        => esc_html__( 'Audio (Self Hosted)', 'okab' ),
				'weight'      => 550,
				'class'       => 'dima-vc-element dima-vc-element-audio-player',
				'icon'        => 'audio-player',
				'category'    => esc_html__( 'Media', 'okab' ),
				'description' => esc_html__( 'Place audio files into your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'mp3',
						'heading'     => esc_html__( 'MP3', 'okab' ),
						'description' => esc_html__( 'Enter URL Link .mp3 version of your audio.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'oga',
						'heading'     => esc_html__( 'OGA', 'okab' ),
						'description' => esc_html__( 'Enter URL Link .oga version of your audio for additional native browser support.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'loop',
						'heading'     => esc_html__( 'Auto Replay', 'okab' ),
						'description' => esc_html__( 'Check to activate auto replay for your self-hosted audio', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'autoplay',
						'heading'     => esc_html__( 'Autoplay', 'okab' ),
						'description' => esc_html__( 'Check to automatically play your self-hosted audio.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'boxed',
						'heading'     => esc_html__( 'Remove Border', 'okab' ),
						'description' => esc_html__( 'Check to remove the border around the audio.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Audio embed
		 */
		vc_map(
			array(
				'base'        => 'dima_embed_audio',
				'name'        => esc_html__( 'Audio (Embedded)', 'okab' ),
				'weight'      => 540,
				'class'       => 'dima-vc-element dima-vc-element-audio-embed',
				'icon'        => 'audio-embed',
				'category'    => esc_html__( 'Media', 'okab' ),
				'description' => esc_html__( 'Place audio files into your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Code', 'okab' ),
						'description' => esc_html__( 'Switch to the "text" editor and do not place anything else here other than your &lsaquo;iframe&rsaquo; or &lsaquo;embed&rsaquo; code.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Share
		 */
		vc_map(
			array(
				'base'        => 'share',
				'name'        => esc_html__( 'Social Sharing', 'okab' ),
				'weight'      => 500,
				'class'       => 'dima-vc-element dima-vc-element-share',
				'icon'        => 'share',
				'category'    => esc_html__( 'Social', 'okab' ),
				'description' => esc_html__( 'Include social sharing into your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'facebook',
						'heading'     => esc_html__( 'Facebook', 'okab' ),
						'description' => esc_html__( 'Check to activate Facebook sharing link.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'twitter',
						'heading'     => esc_html__( 'Twitter', 'okab' ),
						'description' => esc_html__( 'Check to activate Twitter sharing link.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'google_plus',
						'heading'     => esc_html__( 'Google Plus', 'okab' ),
						'description' => esc_html__( 'Check to activate Google Plus sharing link.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'linkedin',
						'heading'     => esc_html__( 'LinkedIn', 'okab' ),
						'description' => esc_html__( 'Check to activate LinkedIn sharing link.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'pinterest',
						'heading'     => esc_html__( 'Pinterest', 'okab' ),
						'description' => esc_html__( 'Check to activate Pinterest sharing link.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'reddit',
						'heading'     => esc_html__( 'Reddit', 'okab' ),
						'description' => esc_html__( 'Check to activate Reddit sharing link.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'email',
						'heading'     => esc_html__( 'Email', 'okab' ),
						'description' => esc_html__( 'Check to activate email sharing link.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'size',
						'heading'     => esc_html__( 'Size', 'okab' ),
						'description' => esc_html__( 'Choose social icon size', 'okab' ),
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => 'medium',
							esc_html__( 'Small', 'okab' )             => 'small',
							esc_html__( 'Big', 'okab' )               => 'big',
							esc_html__( 'Medium', 'okab' )            => 'medium',
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Tabs
		 */
		vc_map(
			array(
				'base'            => 'tabs',
				'name'            => esc_html__( 'Tabs', 'okab' ),
				'weight'          => 900,
				'class'           => 'dima-vc-element dima-vc-element-tabs',
				'icon'            => 'tabs',
				'category'        => esc_html__( 'Content', 'okab' ),
				'description'     => esc_html__( 'Include a tabs container after your tab nav', 'okab' ),
				'as_parent'       => array( 'only' => 'tab' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Tab
		 */
		vc_map(
			array(
				'base'            => 'tab',
				'name'            => esc_html__( 'Tab', 'okab' ),
				'weight'          => 890,
				'class'           => 'dima-vc-element dima-vc-element-tab',
				'icon'            => 'tabs',
				'category'        => esc_html__( 'Content', 'okab' ),
				'description'     => esc_html__( 'Include a tab into your tabs container', 'okab' ),
				'as_child'        => array( 'only' => 'tabs' ),
				'content_element' => true,
				'params'          => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Text', 'okab' ),
						'description' => esc_html__( 'Enter your text.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'active',
						'heading'     => esc_html__( 'Active', 'okab' ),
						'description' => esc_html__( 'Select to make this tab active.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Tab nav
		 */
		vc_map(
			array(
				'base'            => 'tab_nav',
				'name'            => esc_html__( 'Tab Nav', 'okab' ),
				'weight'          => 920,
				'class'           => 'dima-vc-element dima-vc-element-tab-nav',
				'icon'            => 'tabs',
				'category'        => esc_html__( 'Content', 'okab' ),
				'description'     => esc_html__( 'Include a tab nav into your content', 'okab' ),
				'as_parent'       => array( 'only' => 'tab_nav_item' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'model',
						'heading'     => esc_html__( 'Tab Style', 'okab' ),
						'description' => esc_html__( 'Select your tab nav style', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'Select Option', 'okab' ) => '',
							esc_html__( 'Default', 'okab' )       => 'default',
							esc_html__( 'Line', 'okab' )          => 'line',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'float',
						'heading'     => esc_html__( 'Tab Nav Position', 'okab' ),
						'description' => esc_html__( 'Select the position of your tab nav.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( 'Horizontal', 'okab' )     => '',
							esc_html__( 'Start Vertical', 'okab' ) => 'start',
							esc_html__( 'End Vertical', 'okab' )   => 'end'
						)
					),
					array(
						'param_name'  => 'type',
						'heading'     => esc_html__( 'Tab Nav Items Per Row', 'okab' ),
						'description' => esc_html__( 'If your tab nav is on top, select how many tab nav items you want per row.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'model',
							'value'   => array( 'default', '' )
						),
						'value'       => array(
							esc_html__( 'Default', 'okab' ) => '',
							esc_html__( 'Two', 'okab' )     => 'columns-2-tab',
							esc_html__( 'Three', 'okab' )   => 'columns-3-tab',
							esc_html__( 'Four', 'okab' )    => 'columns-4-tab',
							esc_html__( 'Five', 'okab' )    => 'columns-5-tab',
							esc_html__( 'Six', 'okab' )     => 'columns-6-tab'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Tab nav item
		 */
		vc_map(
			array(
				'base'            => 'tab_nav_item',
				'name'            => esc_html__( 'Tab Nav Item', 'okab' ),
				'weight'          => 910,
				'class'           => 'dima-vc-element dima-vc-element-tab-nav-item',
				'icon'            => 'tabs',
				'category'        => esc_html__( 'Content', 'okab' ),
				'description'     => esc_html__( 'Include a tab nav item into your tab nav', 'okab' ),
				'as_child'        => array( 'only' => 'tab_nav' ),
				'content_element' => true,

				'params' => array(
					array(
						'param_name'  => 'title',
						'heading'     => esc_html__( 'Title', 'okab' ),
						'description' => esc_html__( 'Include a title for your tab nav item.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'active',
						'heading'     => esc_html__( 'Active', 'okab' ),
						'description' => esc_html__( 'Check to make this tab nav item active.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Icons Library', 'okab' ),
						'value'       => array(
							esc_html__( 'Font Awesome', 'okab' ) => 'fontawesome',
							esc_html__( 'Custom Font', 'okab' )  => 'customfont',
						),
						'param_name'  => 'icon_type',
						'description' => esc_html__( 'Select icons library.', 'okab' ),
					),
					array(
						'param_name'  => 'icon',
						'heading'     => esc_html__( 'Icon Class', 'okab' ),
						'description' => esc_html__( 'Enter Icon Class from Font Awesome or Simple Line Icons.', 'okab' ),
						'value'       => 'simple-icon-user',
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'customfont',
						),
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'type'        => 'iconpicker',
						'heading'     => esc_html__( 'Icon', 'okab' ),
						'param_name'  => 'icon_fontawesome',
						'value'       => '', // default value to backend editor admin_label
						'settings'    => array(
							'emptyIcon'    => true,
							// default true, display an "EMPTY" icon?
							'value'        => 'fontawesome',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'fontawesome',
						),
						'description' => esc_html__( 'Select icon from library.', 'okab' ),
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);


		/**
		 * Accordion
		 */
		vc_map(
			array(
				'base'            => 'accordion',
				'name'            => esc_html__( 'Accordion', 'okab' ),
				'weight'          => 930,
				'class'           => 'dima-vc-element dima-vc-element-accordion',
				'icon'            => 'accordion',
				'category'        => esc_html__( 'Content', 'okab' ),
				'description'     => esc_html__( 'Include an accordion into your content', 'okab' ),
				'as_parent'       => array( 'only' => 'accordion_item' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'model',
						'heading'     => esc_html__( 'Accordion Style', 'okab' ),
						'description' => esc_html__( '', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'Default', 'okab' )               => 'default',
							esc_html__( 'Default no Background', 'okab' ) => 'border',
							esc_html__( 'Line', 'okab' )                  => 'line',
							esc_html__( 'Icon', 'okab' )                  => 'janobi',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'type',
						'heading'     => esc_html__( 'Accordion icon type', 'okab' ),
						'description' => esc_html__( 'Select accordion icon type', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'Select Option', 'okab' ) => '',
							esc_html__( 'Arrwo icon', 'okab' )    => '',
							esc_html__( 'Plus icon', 'okab' )     => 'plus',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'separated',
						'heading'     => esc_html__( 'Separated', 'okab' ),
						'description' => esc_html__( 'Check to separate the individual accordion items each others.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'model',
							'value'   => 'default',
						),
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'circle',
						'heading'     => esc_html__( 'Circle', 'okab' ),
						'description' => esc_html__( 'Select the circle style', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'model',
							'value'   => 'janobi',
						),
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);


		/**
		 * Accordion item
		 */
		vc_map(
			array(
				'base'            => 'accordion_item',
				'name'            => esc_html__( 'Accordion Individual Item', 'okab' ),
				'weight'          => 940,
				'class'           => 'dima-vc-element dima-vc-element-accordion-item',
				'icon'            => 'accordion',
				'category'        => esc_html__( 'Content', 'okab' ),
				'description'     => esc_html__( 'Include an accordion individual item in your accordion', 'okab' ),
				'as_child'        => array( 'only' => 'accordion' ),
				'content_element' => true,
				'params'          => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Text', 'okab' ),
						'description' => esc_html__( 'Enter your text.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'parent_id',
						'heading'     => esc_html__( 'Parent ID', 'okab' ),
						'description' => esc_html__( 'Optionally include an ID given to the parent accordion to only allow one toggle to be open at a time.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'title',
						'heading'     => esc_html__( 'Individual Accordion title.', 'okab' ),
						'description' => esc_html__( 'Include a title for your individual accordion item.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'open',
						'heading'     => esc_html__( 'Open the Individual Accordion', 'okab' ),
						'description' => esc_html__( 'Check for the individual accordion item to be open by default.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);


		/**
		 * big grid
		 */
		vc_map(
			array(
				'base'        => 'big-grid',
				'name'        => esc_html__( 'Big Grid', 'okab' ),
				'weight'      => 490,
				'class'       => 'dima-vc-element dima-vc-element-recent-posts',
				'icon'        => 'blog',
				'category'    => esc_html__( 'Content', 'okab' ),
				'description' => esc_html__( 'Display your blog posts', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'blog_style',
						'heading'     => esc_html__( 'Big Grid Style', 'okab' ),
						'description' => esc_html__( 'Choose your blog style to show.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'One', 'okab' )               => 'one',
							esc_html__( 'One with padding', 'okab' )  => 'one_padding',
							esc_html__( 'Two', 'okab' )               => 'two',
							esc_html__( 'Three', 'okab' )             => 'three',
							esc_html__( 'Four ', 'okab' )             => 'style_for',
							esc_html__( 'Five ', 'okab' )             => 'style_five',
						)
					),
					array(
						'param_name'  => 'category',
						'heading'     => esc_html__( 'Category', 'okab' ),
						'description' => esc_html__( 'To filter your posts by category, enter the slug of your desired category. To filter by multiple categories, enter your slugs separated by a comma.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'tag',
						'heading'     => esc_html__( 'Tag', 'okab' ),
						'description' => esc_html__( 'To filter your posts by tag, enter the slug of your desired tag. To filter by multiple tags, enter your slugs separated by a comma.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'offset',
						'heading'     => esc_html__( 'Offset', 'okab' ),
						'description' => esc_html__( 'Accepts a numerical value to show how many posts to skip.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'order',
						'heading'     => esc_html__( 'Sort by', 'okab' ),
						'description' => esc_html__( 'Choose what posts you want to display first', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Popular', 'okab' )           => 'popular',
							esc_html__( 'Top view', 'okab' )          => 'top-view',
						)
					)
				)
			)
		);

		/**
		 * big grid slide
		 */
		vc_map(
			array(
				'base'        => 'big-grid-slide',
				'name'        => esc_html__( 'Big Grid Slide', 'okab' ),
				'weight'      => 490,
				'class'       => 'dima-vc-element dima-vc-element-recent-posts',
				'icon'        => 'blog',
				'category'    => esc_html__( 'Content', 'okab' ),
				'description' => esc_html__( 'Display your blog posts', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'blog_style',
						'heading'     => esc_html__( 'Blog Style', 'okab' ),
						'description' => esc_html__( 'Choose your blog style to show.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'One', 'okab' )               => 'slide_one',
							esc_html__( 'Two', 'okab' )               => 'slide_two',
							esc_html__( 'Three', 'okab' )             => 'slide_three',
							esc_html__( 'Four', 'okab' )              => 'slide_for',
						)
					),
					array(
						'param_name'  => 'count',
						'heading'     => esc_html__( 'Post Count', 'okab' ),
						'description' => esc_html__( 'Type how many posts to display.', 'okab' ),
						'type'        => 'textfield',
						'holder'      => 'div',
					),
					array(
						'param_name'  => 'hover_style',
						'heading'     => esc_html__( 'Hover', 'okab' ),
						'description' => esc_html__( 'Select the hover style', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Hover One', 'okab' )         => 'hover-two',
							esc_html__( 'Hover Two', 'okab' )         => 'hover-one',
						)
					),
					array(
						'param_name'  => 'category',
						'heading'     => esc_html__( 'Category', 'okab' ),
						'description' => esc_html__( 'To filter your posts by category, enter the slug of your desired category. To filter by multiple categories, enter your slugs separated by a comma.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'tag',
						'heading'     => esc_html__( 'Tag', 'okab' ),
						'description' => esc_html__( 'To filter your posts by tag, enter the slug of your desired tag. To filter by multiple tags, enter your slugs separated by a comma.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'offset',
						'heading'     => esc_html__( 'Offset', 'okab' ),
						'description' => esc_html__( 'Accepts a numerical value to show how many posts to skip.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'order',
						'heading'     => esc_html__( 'Sort by', 'okab' ),
						'description' => esc_html__( 'Choose what posts you want to display first', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Popular', 'okab' )           => 'popular',
							esc_html__( 'Top view', 'okab' )          => 'top-view',
						)
					),
					array(
						'param_name'  => 'animation',
						'group'       => esc_html__( 'Slide Options', 'okab' ),
						'heading'     => esc_html__( 'Animation', 'okab' ),
						'description' => esc_html__( 'Controls the animation type, "fade" or "slide"', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'dependency'  => array(
							'element' => 'blog_style',
							'value'   => 'slide_one',
						),
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Fade', 'okab' )              => 'fade',
							esc_html__( 'Slide', 'okab' )             => 'slide',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'navigation',
						'group'       => esc_html__( 'Slide Options', 'okab' ),
						'heading'     => esc_html__( 'Slider Arrows', 'okab' ),
						'description' => esc_html__( 'Check to display navigation arrows', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'blog_style',
							'value'   => array( 'slide_two', 'slide_three', 'slide_for', '' ),
						),
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'pagination',
						'group'       => esc_html__( 'Slide Options', 'okab' ),
						'heading'     => esc_html__( 'Slider Bullets ', 'okab' ),
						'description' => esc_html__( 'Check to display slider Bullets', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'blog_style',
							'value'   => array( 'slide_two', 'slide_three', 'slide_for', '' ),
						),
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'items_margin',
						'heading'     => esc_html__( 'Items Margin', 'okab' ),
						'group'       => esc_html__( 'Slide Options', 'okab' ),
						'description' => esc_html__( 'Enter the margin value between elements (px)', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'dependency'  => array(
							'element' => 'blog_style',
							'value'   => array( 'slide_two', 'slide_three', 'slide_for', '' ),
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'auto_play',
						'heading'     => esc_html__( 'Autoplay', 'okab' ),
						'group'       => esc_html__( 'Slide Options', 'okab' ),
						'description' => esc_html__( 'Check to animate the slides automatically', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'loop',
						'heading'     => esc_html__( 'Loop', 'okab' ),
						'group'       => esc_html__( 'Slide Options', 'okab' ),
						'description' => esc_html__( 'Check to activate slider loop', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'blog_style',
							'value'   => array( 'slide_two', 'slide_three', 'slide_for', '' ),
						),
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'mouse_wheel',
						'group'       => esc_html__( 'Slide Options', 'okab' ),
						'heading'     => esc_html__( 'Mouse Wheel', 'okab' ),
						'description' => esc_html__( 'Check to activate navigation using mouse wheel', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'blog_style',
							'value'   => array( 'slide_two', 'slide_three', 'slide_for', '' ),
						),
						'value'       => array(
							'' => 'true'
						)
					)
				)
			)
		);

		/**
		 * Author
		 */
		vc_map(
			array(
				'base'        => 'author',
				'name'        => esc_html__( 'Author', 'okab' ),
				'weight'      => 510,
				'class'       => 'dima-vc-element dima-vc-element-author',
				'icon'        => 'author',
				'category'    => esc_html__( 'Social', 'okab' ),
				'description' => esc_html__( 'Include post author information', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'author_id',
						'heading'     => esc_html__( 'Author ID', 'okab' ),
						'description' => esc_html__( 'By default the author of the post or page will be output by leaving this input blank. If you would like to output the information of another author, enter in their user ID here.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Dropcap
		 */
		vc_map(
			array(
				'base'        => 'dropcap',
				'name'        => esc_html__( 'Drop cap', 'okab' ),
				'weight'      => 510,
				'class'       => 'dima-vc-element dima-vc-element-dropcap',
				'icon'        => 'dropcap',
				'category'    => esc_html__( 'Social', 'okab' ),
				'description' => esc_html__( 'Add drop cap to your paragraph', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'type',
						'heading'     => esc_html__( 'Drop cap Style', 'okab' ),
						'description' => esc_html__( 'Select drop cap style', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'Select Option', 'okab' ) => '',
							esc_html__( 'None', 'okab' )          => 'dropcap-1',
							esc_html__( 'Circle', 'okab' )        => 'dropcap-2',
							esc_html__( 'Square', 'okab' )        => 'dropcap-3',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'character',
						'heading'     => esc_html__( 'Character', 'okab' ),
						'description' => esc_html__( 'Type the first character of the paragraph ', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Link
		 */
		vc_map(
			array(
				'base'        => 'link',
				'name'        => esc_html__( 'link', 'okab' ),
				'weight'      => 700,
				'class'       => 'dima-vc-element dima-vc-element-link',
				'icon'        => 'link',
				'category'    => esc_html__( 'Media', 'okab' ),
				'description' => esc_html__( 'Add text link to your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Text', 'okab' ),
						'description' => esc_html__( 'Enter your text.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'href',
						'heading'     => esc_html__( 'URL Link', 'okab' ),
						'description' => esc_html__( 'Enter in the URL you want your link to link to.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'target',
						'heading'     => esc_html__( 'Open link in a new tab', 'okab' ),
						'description' => esc_html__( 'Check to open your image link in a new tab.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'blank'
						)
					),
					array(
						'param_name'  => 'lightbox',
						'heading'     => esc_html__( 'Lightbox Type', 'okab' ),
						'description' => esc_html__( 'Select your lightbox type (iframe: for youtube, map,..)', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							'None'                                    => '',
							'image'                                   => 'image',
							'iframe'                                  => 'iframe',
							'ajax'                                    => 'ajax'
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'popup_type',
						'heading'     => esc_html__( 'Popup Info Type', 'okab' ),
						'description' => esc_html__( 'Select to choose the type of popup info', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							'None'                                    => '',
							'Popover'                                 => 'popover',
							'Tooltip'                                 => 'tooltip'
						)
					),
					array(
						'param_name'  => 'title',
						'heading'     => esc_html__( 'Popup Info Title', 'okab' ),
						'description' => esc_html__( 'Enter in the title attribute for your URL (This will apply as title for popover or tooltip if you have active it from -Popup Info type-).', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'popup_trigger',
						'heading'     => esc_html__( 'Popup Trigger', 'okab' ),
						'description' => esc_html__( 'Select what actions you want to trigger the popover or tooltip.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							'Hover'                                   => 'hover',
							'Click'                                   => 'click',
							'Focus'                                   => 'focus'
						)
					),
					array(
						'param_name'  => 'popup_place',
						'heading'     => esc_html__( 'Popup Position', 'okab' ),
						'description' => esc_html__( 'Select the popup position.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							'Top'                                     => 'top',
							'Left'                                    => 'left',
							'Right'                                   => 'right',
							'Bottom'                                  => 'bottom'
						)
					),
					array(
						'param_name'  => 'popup_content',
						'heading'     => esc_html__( 'Info Content', 'okab' ),
						'description' => esc_html__( 'Extra content for the popover.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
				)
			)
		);

		/**
		 * Code
		 */
		vc_map(
			array(
				'base'        => 'code',
				'name'        => esc_html__( 'Code', 'okab' ),
				'weight'      => 740,
				'class'       => 'dima-vc-element dima-vc-element-code',
				'icon'        => 'code',
				'category'    => esc_html__( 'Typography', 'okab' ),
				'description' => esc_html__( 'Add a block of example code to your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Text', 'okab' ),
						'description' => esc_html__( 'Enter your text.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * LABELS
		 */
		vc_map(
			array(
				'base'        => 'labels',
				'name'        => esc_html__( 'Labels', 'okab' ),
				'weight'      => 740,
				'class'       => 'dima-vc-element dima-vc-element-code',
				'icon'        => 'tag',
				'category'    => esc_html__( 'Typography', 'okab' ),
				'description' => esc_html__( 'Add a Labels to your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'text',
						'heading'     => esc_html__( 'Text', 'okab' ),
						'description' => esc_html__( 'Enter your text', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'type',
						'heading'     => esc_html__( 'Type', 'okab' ),
						'description' => esc_html__( 'Choose your label style to show.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Default', 'okab' )           => 'default',
							esc_html__( 'Warning', 'okab' )           => 'warning',
							esc_html__( 'Info', 'okab' )              => 'info',
							esc_html__( 'Error', 'okab' )             => 'error',
						)
					),
					array(
						'param_name'  => 'bg_color',
						'heading'     => esc_html__( 'Background Color', 'okab' ),
						'description' => esc_html__( 'Choose background color for the text', 'okab' ),
						'type'        => 'colorpicker',
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Blockquote
		 */
		vc_map(
			array(
				'base'        => 'blockquote',
				'name'        => esc_html__( 'Blockquote', 'okab' ),
				'weight'      => 810,
				'class'       => 'dima-vc-element dima-vc-element-blockquote',
				'icon'        => 'blockquote',
				'category'    => esc_html__( 'Typography', 'okab' ),
				'description' => esc_html__( 'Include a blockquote in your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Text', 'okab' ),
						'description' => esc_html__( 'Enter your text.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'cite',
						'heading'     => esc_html__( 'Cite', 'okab' ),
						'description' => esc_html__( 'Cite the person you are quoting.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'type',
						'heading'     => esc_html__( 'Blockquote Style', 'okab' ),
						'description' => esc_html__( 'Select blockquote style ', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Default', 'okab' )           => '',
							esc_html__( 'Pull', 'okab' )              => 'pull',
						)
					),
					array(
						'param_name'  => 'direction',
						'heading'     => esc_html__( 'Alignment', 'okab' ),
						'description' => esc_html__( 'Select the alignment of the blockquote contents.', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Start', 'okab' )             => 'start',
							esc_html__( 'Center', 'okab' )            => 'center',
							esc_html__( 'End', 'okab' )               => 'end'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);


		/**
		 * testimonials
		 */
		vc_map(
			array(
				'base'        => 'testimonial',
				'name'        => esc_html__( 'Testimonial', 'okab' ),
				'weight'      => 810,
				'class'       => 'dima-vc-element dima-vc-element-testimonials',
				'icon'        => 'testimonials',
				'category'    => esc_html__( 'Typography', 'okab' ),
				'description' => esc_html__( 'Include a testimonials in your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Text', 'okab' ),
						'description' => esc_html__( 'Enter your text.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'float',
						'heading'     => esc_html__( 'Testimonial Style', 'okab' ),
						'description' => esc_html__( 'Choose testimonial style (Position of  photo,text.. )', 'okab' ),
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '',
							esc_html__( 'Start', 'okab' )             => 'start',
							esc_html__( 'End', 'okab' )               => 'end',
							esc_html__( 'Top center', 'okab' )        => 'top-center',
							esc_html__( 'Top start', 'okab' )         => 'top-start',
							esc_html__( 'Top end', 'okab' )           => 'top-end',
							esc_html__( 'Bottom center', 'okab' )     => 'bottom-center',
							esc_html__( 'Bottom start', 'okab' )      => 'bottom-start',
							esc_html__( 'Bottom end', 'okab' )        => 'bottom-end',
						)
					),
					array(
						'param_name'  => 'big_testimonial',
						'heading'     => esc_html__( 'Big Testimonial', 'okab' ),
						'description' => esc_html__( 'Check to make the font bigger', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => '1'
						)
					),

					array(
						'param_name'  => 'author',
						'heading'     => esc_html__( 'Author Name', 'okab' ),
						'description' => esc_html__( 'Enter the author name', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'job',
						'heading'     => esc_html__( 'Author Position', 'okab' ),
						'description' => esc_html__( 'Enter the author position', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'image',
						'heading'     => esc_html__( 'Author Photo', 'okab' ),
						'description' => esc_html__( 'Add the author photo', 'okab' ),
						'type'        => 'attach_image',
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'image_circle',
						'heading'     => esc_html__( 'Photo Circle', 'okab' ),
						'description' => esc_html__( 'Check to display the photo as a circle', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'border',
						'heading'     => esc_html__( 'Add Border', 'okab' ),
						'description' => esc_html__( 'Check to add a border around the text', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => '1'
						)
					),
					array(
						'param_name'  => 'theme_color',
						'heading'     => esc_html__( 'Theme color', 'okab' ),
						'description' => esc_html__( 'Check to use your theme color style', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'dependency'  => array(
							'element' => 'border',
							'value'   => '1',
						),
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'icon',
						'heading'     => esc_html__( 'Hide quotre icon', 'okab' ),
						'description' => esc_html__( 'Check to hide Quote icon', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'false'
						)
					),
					array(
						'param_name'  => 'url',
						'heading'     => esc_html__( 'URL Link', 'okab' ),
						'description' => esc_html__( 'Add external URL link to the author', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'target',
						'heading'     => esc_html__( 'Open link in a new tab', 'okab' ),
						'description' => esc_html__( 'Check to open your image link in a new tab.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'blank'
						)
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Search
		 */
		vc_map(
			array(
				'base'        => 'search',
				'name'        => esc_html__( 'Search', 'okab' ),
				'weight'      => 480,
				'class'       => 'dima-vc-element dima-vc-element-search',
				'icon'        => 'search',
				'category'    => esc_html__( 'Content', 'okab' ),
				'description' => esc_html__( 'Include a search field in your content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Protected content
		 */
		vc_map(
			array(
				'base'        => 'protect',
				'name'        => esc_html__( 'Protect', 'okab' ),
				'weight'      => 840,
				'class'       => 'dima-vc-element dima-vc-element-protect',
				'icon'        => 'protect',
				'category'    => esc_html__( 'Content', 'okab' ),
				'description' => esc_html__( 'Protect content from non logged in users', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Text', 'okab' ),
						'description' => esc_html__( 'Enter your text.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Icon List
		 */
		vc_map(
			array(
				'base'            => 'icon_list',
				'name'            => esc_html__( 'Icon List', 'okab' ),
				'weight'          => 780,
				'class'           => 'dima-vc-element dima-vc-element-protect',
				'icon'            => 'icon-list',
				'category'        => esc_html__( 'Typography', 'okab' ),
				'description'     => esc_html__( 'Include an icon list in your content', 'okab' ),
				'as_parent'       => array( 'only' => 'icon_list_item' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Icon list item
		 */
		vc_map(
			array(
				'base'            => 'icon_list_item',
				'name'            => esc_html__( 'Icon List Item', 'okab' ),
				'weight'          => 770,
				'class'           => 'dima-vc-element dima-vc-element-protect',
				'icon'            => 'icon-list',
				'category'        => esc_html__( 'Typography', 'okab' ),
				'description'     => esc_html__( 'Include an icon list item in your icon list', 'okab' ),
				'as_child'        => array( 'only' => 'icon_list' ),
				'content_element' => true,
				'params'          => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Text', 'okab' ),
						'description' => esc_html__( 'Enter your text.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),

					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Icons library', 'okab' ),
						'value'       => array(
							esc_html__( 'Font Awesome', 'okab' ) => 'fontawesome',
							esc_html__( 'Custom Font', 'okab' )  => 'customfont',
						),
						'param_name'  => 'icon_type',
						'description' => esc_html__( 'Select icons library.', 'okab' ),
					),
					array(
						'param_name'  => 'icon',
						'heading'     => esc_html__( 'Icon Class', 'okab' ),
						'description' => esc_html__( 'Enter Icon Class from Font Awesome or Simple Line Icons.', 'okab' ),
						'value'       => 'simple-icon-user',
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'customfont',
						),
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'type'        => 'iconpicker',
						'heading'     => esc_html__( 'Icon', 'okab' ),
						'param_name'  => 'icon_fontawesome',
						'value'       => '', // default value to backend editor admin_label
						'settings'    => array(
							'emptyIcon'    => true,
							// default true, display an "EMPTY" icon?
							'value'        => 'fontawesome',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),
						'dependency'  => array(
							'element' => 'icon_type',
							'value'   => 'fontawesome',
						),
						'description' => esc_html__( 'Select icon from library.', 'okab' ),
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Product Menu
		 */
		vc_map(
			array(
				'base'            => 'product_menu',
				'name'            => esc_html__( 'Product Menu', 'okab' ),
				'weight'          => 780,
				'class'           => 'dima-vc-element dima-vc-element-list',
				'icon'            => 'icon-list',
				'category'        => esc_html__( 'Marketing', 'okab' ),
				'description'     => esc_html__( 'Include a product menu in your content', 'okab' ),
				'as_parent'       => array( 'only' => 'product_menu_item' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'title',
						'heading'     => esc_html__( 'Menu Title', 'okab' ),
						'description' => esc_html__( 'Add Menu Title', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'boxed',
						'heading'     => esc_html__( 'Boxed', 'okab' ),
						'description' => esc_html__( 'Check to add a box around the element', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'true'
						)
					),
					array(
						'param_name'  => 'bg_color',
						'heading'     => esc_html__( 'Background color', 'okab' ),
						'description' => esc_html__( 'Choose the background color for your callout', 'okab' ),
						'save_always' => true,
						'type'        => 'colorpicker',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'bg_image',
						'heading'     => esc_html__( 'Background Image', 'okab' ),
						'description' => esc_html__( 'Add a background image', 'okab' ),
						'save_always' => true,
						'type'        => 'attach_image',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * Product Menu item
		 */
		vc_map(
			array(
				'base'            => 'product_menu_item',
				'name'            => esc_html__( 'Menu item', 'okab' ),
				'weight'          => 770,
				'class'           => 'dima-vc-element dima-vc-element-protect',
				'icon'            => 'icon-list',
				'category'        => esc_html__( 'Marketing', 'okab' ),
				'description'     => esc_html__( 'Include a "Menu item" in your icon list', 'okab' ),
				'as_child'        => array( 'only' => 'product_menu' ),
				'content_element' => true,
				'params'          => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Text', 'okab' ),
						'description' => esc_html__( 'Enter your text.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'title',
						'heading'     => esc_html__( 'Menu Title', 'okab' ),
						'description' => esc_html__( 'Add Menu Title', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'href',
						'heading'     => esc_html__( 'URL Link', 'okab' ),
						'description' => esc_html__( 'Enter in the URL Link you want your title button to link to', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'target',
						'heading'     => esc_html__( 'Open link in a new tab', 'okab' ),
						'description' => esc_html__( 'Check to open your title link in a new tab.', 'okab' ),
						'type'        => 'checkbox',
						'holder'      => 'div',
						'value'       => array(
							'' => 'blank'
						)
					),
					array(
						'param_name'  => 'notification',
						'heading'     => esc_html__( 'Notification', 'okab' ),
						'description' => esc_html__( 'Add a notification word.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'image',
						'heading'     => esc_html__( 'Item Image', 'okab' ),
						'description' => esc_html__( 'Add a item image', 'okab' ),
						'save_always' => true,
						'type'        => 'attach_image',
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'price',
						'heading'     => esc_html__( 'Price', 'okab' ),
						'description' => esc_html__( 'Enter the price for this pricing table.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),

					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);
		/**
		 * List
		 */
		vc_map(
			array(
				'base'            => 'list',
				'name'            => esc_html__( 'List', 'okab' ),
				'weight'          => 780,
				'class'           => 'dima-vc-element dima-vc-element-list',
				'icon'            => 'icon-list',
				'category'        => esc_html__( 'Typography', 'okab' ),
				'description'     => esc_html__( 'Include a list in your content', 'okab' ),
				'as_parent'       => array( 'only' => 'list_item' ),
				'content_element' => true,
				'js_view'         => 'VcColumnView',
				'params'          => array(
					array(
						'param_name'  => 'type',
						'heading'     => esc_html__( 'List Style', 'okab' ),
						'description' => esc_html__( 'Choose icon for list item', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'Default', 'okab' )    => '',
							esc_html__( 'Star', 'okab' )       => 'stars',
							esc_html__( 'Angle', 'okab' )      => 'angle',
							esc_html__( 'Check', 'okab' )      => 'check',
							esc_html__( 'Thumb-tack', 'okab' ) => 'thumb-tack',
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * list item
		 */
		vc_map(
			array(
				'base'            => 'list_item',
				'name'            => esc_html__( 'List Item', 'okab' ),
				'weight'          => 770,
				'class'           => 'dima-vc-element dima-vc-element-protect',
				'icon'            => 'icon-list',
				'category'        => esc_html__( 'Typography', 'okab' ),
				'description'     => esc_html__( 'Include an icon list item in your icon list', 'okab' ),
				'as_child'        => array( 'only' => 'list' ),
				'content_element' => true,
				'params'          => array(
					array(
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Text', 'okab' ),
						'description' => esc_html__( 'Enter your text.', 'okab' ),
						'save_always' => true,
						'type'        => 'textarea_html',
						'holder'      => 'div',
						'value'       => ''
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

		/**
		 * related posts
		 */
		vc_map(
			array(
				'base'        => 'related_posts',
				'name'        => esc_html__( 'Related posts', 'okab' ),
				'weight'      => 490,
				'class'       => 'dima-vc-element dima-vc-element-related_posts',
				'icon'        => 'related-posts',
				'category'    => esc_html__( 'Content', 'okab' ),
				'description' => esc_html__( 'Add related posts to your post content', 'okab' ),
				'params'      => array(
					array(
						'param_name'  => 'is_slide',
						'heading'     => esc_html__( 'Slide', 'okab' ),
						'description' => esc_html__( 'Check to display related posts as a slide', 'okab' ),
						'save_always' => true,
						'type'        => 'checkbox',
						'value'       => array(
							'' => 'true'
						),
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'column',
						'heading'     => esc_html__( 'Column', 'okab' ),
						'description' => esc_html__( 'Select columns number', 'okab' ),
						'save_always' => true,
						'type'        => 'dropdown',
						'holder'      => 'div',
						'value'       => array(
							esc_html__( '- Select Option -', 'okab' ) => '2',
							esc_html__( 'Two', 'okab' )               => '2',
							esc_html__( 'Three', 'okab' )             => '3',
							esc_html__( 'Four', 'okab' )              => '4',
							esc_html__( 'Five', 'okab' )              => '5',
							esc_html__( 'Six', 'okab' )               => '6'
						)
					),
					array(
						'param_name'  => 'count',
						'heading'     => esc_html__( 'Count', 'okab' ),
						'description' => esc_html__( 'Select how many posts to display.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'items_margin',
						'heading'     => esc_html__( 'Items Margin', 'okab' ),
						'description' => esc_html__( 'Enter the margin value between elements (px)', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'id',
						'heading'     => esc_html__( 'ID', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique ID.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'class',
						'heading'     => esc_html__( 'Class', 'okab' ),
						'description' => esc_html__( '(Optional) Enter a unique class name.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					),
					array(
						'param_name'  => 'style',
						'heading'     => esc_html__( 'Style', 'okab' ),
						'description' => esc_html__( '(Optional) Enter inline CSS.', 'okab' ),
						'save_always' => true,
						'type'        => 'textfield',
						'holder'      => 'div'
					)
				)
			)
		);

	}

	add_action( 'vc_before_init', 'dima_vc_map_shortcodes' );

	/**
	 * Extend container class (parents).
	 */
	class WPBakeryShortCode_Container extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Column extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Product_Menu extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Meet_The_Team extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Inline_Icons extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Dima_Gallery extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Clients extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Owl_Slider extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Owl_Slide extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Slider extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Slide extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_callout extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Google_Maptwo extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Iconbox extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Date_Timeline extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Process extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Tab_Nav extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Tabs extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Accordion extends WPBakeryShortCodesContainer {
	}


	class WPBakeryShortCode_Icon_List extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_List extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Dima_Banner extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Pricing_Table_Column extends WPBakeryShortCodesContainer {
	}


	/**
	 * Extend shortcode class (children).
	 */
	class WPBakeryShortCode_Inline_Item_Icon extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Client extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Google_Map_Marker extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Iconbox_Content extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Accordion_Item extends WPBakeryShortCode {
	}

}
?>