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

class DIMA_VC {

	public $dima_animate_list;
	public $vc_column_width_list;
	public $vc_column_visibility;

	public $id_des;
	public $class_des;
	public $style_des;

	public function __construct() {
		$this->id_des    = esc_html__( '(Optional) Enter a unique ID.', 'okab' );
		$this->class_des = esc_html__( '(Optional) Enter a unique class name.', 'okab' );
		$this->style_des = esc_html__( '(Optional) Enter inline CSS.', 'okab' );

		$this->vc_column_width_list = array(
			esc_html__( 'Inherit from smaller', 'okab' ) => '',
			esc_html__( '1 column - 1/12', 'okab' )      => '1',
			esc_html__( '2 columns - 1/6', 'okab' )      => '2',
			esc_html__( '3 columns - 1/4', 'okab' )      => '3',
			esc_html__( '4 columns - 1/3', 'okab' )      => '4',
			esc_html__( '5 columns - 5/12', 'okab' )     => '5',
			esc_html__( '6 columns - 1/2', 'okab' )      => '6',
			esc_html__( '7 columns - 7/12', 'okab' )     => '7',
			esc_html__( '8 columns - 2/3', 'okab' )      => '8',
			esc_html__( '9 columns - 3/4', 'okab' )      => '9',
			esc_html__( '10 columns - 5/6', 'okab' )     => '10',
			esc_html__( '11 columns - 11/12', 'okab' )   => '11',
			esc_html__( '12 columns - 1/1', 'okab' )     => '12'
		);

		$this->vc_column_visibility = array(
			esc_html__( 'hidden', 'okab' )  => 'hidden',
			esc_html__( 'visible', 'okab' ) => 'visible',
		);

		$this->dima_animate_list = array(
			esc_html__( '- Select Option -', 'okab' ) => '',
			'bounce'                                  => 'bounce',
			'flash'                                   => 'flash',
			'pulse'                                   => 'pulse',
			'rubberBand'                              => 'rubberBand',
			'shake'                                   => 'shake',
			'headShake'                               => 'headShake',
			'swing'                                   => 'swing',
			'tada'                                    => 'tada',
			'wobble'                                  => 'wobble',
			'jello'                                   => 'jello',
			'bounceIn'                                => 'bounceIn',
			'bounceInDown'                            => 'bounceInDown',
			'bounceInLeft'                            => 'bounceInLeft',
			'bounceInRight'                           => 'bounceInRight',
			'bounceInUp'                              => 'bounceInUp',
			'bounceOut'                               => 'bounceOut',
			'bounceOutDown'                           => 'bounceOutDown',
			'bounceOutLeft'                           => 'bounceOutLeft',
			'bounceOutRight'                          => 'bounceOutRight',
			'bounceOutUp'                             => 'bounceOutUp',
			'fadeIn'                                  => 'fadeIn',
			'fadeInDown'                              => 'fadeInDown',
			'fadeInDownBig'                           => 'fadeInDownBig',
			'fadeInLeft'                              => 'fadeInLeft',
			'fadeInLeftBig'                           => 'fadeInLeftBig',
			'fadeInRight'                             => 'fadeInRight',
			'fadeInRightBig'                          => 'fadeInRightBig',
			'fadeInUp'                                => 'fadeInUp',
			'fadeInUpBig'                             => 'fadeInUpBig',
			'fadeOut'                                 => 'fadeOut',
			'fadeOutDown'                             => 'fadeOutDown',
			'fadeOutDownBig'                          => 'fadeOutDownBig',
			'fadeOutLeft'                             => 'fadeOutLeft',
			'fadeOutLeftBig'                          => 'fadeOutLeftBig',
			'fadeOutRight'                            => 'fadeOutRight',
			'fadeOutRightBig'                         => 'fadeOutRightBig',
			'fadeOutUp'                               => 'fadeOutUp',
			'fadeOutUpBig'                            => 'fadeOutUpBig',
			'flipInX'                                 => 'flipInX',
			'flipInY'                                 => 'flipInY',
			'flipOutX'                                => 'flipOutX',
			'flipOutY'                                => 'flipOutY',
			'lightSpeedIn'                            => 'lightSpeedIn',
			'lightSpeedOut'                           => 'lightSpeedOut',
			'rotateIn'                                => 'rotateIn',
			'rotateInDownLeft'                        => 'rotateInDownLeft',
			'rotateInDownRight'                       => 'rotateInDownRight',
			'rotateInUpLeft'                          => 'rotateInUpLeft',
			'rotateInUpRight'                         => 'rotateInUpRight',
			'rotateOut'                               => 'rotateOut',
			'rotateOutDownLeft'                       => 'rotateOutDownLeft',
			'rotateOutDownRight'                      => 'rotateOutDownRight',
			'rotateOutUpLeft'                         => 'rotateOutUpLeft',
			'rotateOutUpRight'                        => 'rotateOutUpRight',
			'hinge'                                   => 'hinge',
			'rollIn'                                  => 'rollIn',
			'rollOut'                                 => 'rollOut',
			'zoomIn'                                  => 'zoomIn',
			'zoomInDown'                              => 'zoomInDown',
			'zoomInLeft'                              => 'zoomInLeft',
			'zoomInRight'                             => 'zoomInRight',
			'zoomInUp'                                => 'zoomInUp',
			'zoomOut'                                 => 'zoomOut',
			'zoomOutDown'                             => 'zoomOutDown',
			'zoomOutLeft'                             => 'zoomOutLeft',
			'zoomOutRight'                            => 'zoomOutRight',
			'zoomOutUp'                               => 'zoomOutUp',
			'slideInDown'                             => 'slideInDown',
			'slideInLeft'                             => 'slideInLeft',
			'slideInRight'                            => 'slideInRight',
			'slideInUp'                               => 'slideInUp',
			'slideOutDown'                            => 'slideOutDown',
			'slideOutLeft'                            => 'slideOutLeft',
			'slideOutRight'                           => 'slideOutRight',
			'slideOutUp'                              => 'slideOutUp'
		);

		add_action( 'admin_init', array( $this, 'dima_vc_update_row' ) );
		add_action( 'admin_init', array( $this, 'dima_vc_update_row_inner' ) );
		add_action( 'admin_init', array( $this, 'dima_vc_update_column' ) );
		add_action( 'admin_init', array( $this, 'dima_vc_update_column_inner' ) );
		add_action( 'admin_init', array( $this, 'dima_vc_update_existing_shortcodes' ) );
		add_action( 'admin_init', array( $this, 'dima_vc_update_widget' ) );
	}

	function dima_vc_update_existing_shortcodes() {

		vc_map_update( 'vc_raw_html', array(
			'name'        => esc_html__( 'Raw HTML', 'okab' ),
			'weight'      => 939,
			'icon'        => 'raw-html',
			'category'    => esc_html__( 'Content', 'okab' ),
			'description' => esc_html__( 'Output raw HTML code on your page', 'okab' )
		) );

		//
		// [vc_raw_js]
		//

		vc_map_update( 'vc_raw_js', array(
			'name'        => esc_html__( 'Raw JavaScript', 'okab' ),
			'weight'      => 938,
			'icon'        => 'raw-js',
			'category'    => esc_html__( 'Content', 'okab' ),
			'description' => esc_html__( 'Output raw JavaScript code on your page', 'okab' )
		) );

		/**
		 * Revolution Slider
		 */
		if ( DIMA_REVOLUTION_SLIDER_IS_ACTIVE ) :

			vc_map_update( 'rev_slider_vc', array(
				'name'        => esc_html__( 'Revolution Slider', 'okab' ),
				'weight'      => 600,
				'icon'        => 'revslider',
				'category'    => esc_html__( 'Slideshow', 'okab' ),
				'description' => esc_html__( 'Place a Revolution Slider element into your content', 'okab' )
			) );

			vc_remove_param( 'rev_slider_vc', 'title' );
			vc_remove_param( 'rev_slider_vc', 'el_class' );

		endif;


		//
		// [contact-form-7]
		//

		if ( DIMA_CONTACT_FORM_7_IS_ACTIVE ) :

			vc_map_update( 'contact-form-7', array(
				'name'        => esc_html__( 'Contact Form 7', 'okab' ),
				'weight'      => 520,
				'icon'        => 'contact-form-7',
				'category'    => esc_html__( 'Social', 'okab' ),
				'description' => esc_html__( 'Place one of your contact forms into your content', 'okab' )
			) );

		endif;

		//
		// [gravityform]
		//

		if ( DIMA_GRAVITY_FORMS_IS_ACTIVE ) :

			$param_gf_forms_value = array( '- Select Option -' => '' );
			$forms                = RGFormsModel::get_forms( null, 'title' );
			foreach ( $forms as $form ) {
				$param_gf_forms_value[ $form->title ] = $form->id;
			}

			vc_map(
				array(
					'base'        => 'gravityform',
					'name'        => esc_html__( 'Gravity Form', 'okab' ),
					'weight'      => 600,
					'class'       => 'dima-vc-element dima-vc-element-gravity-form',
					'icon'        => 'gravity-form',
					'category'    => esc_html__( 'Social', 'okab' ),
					'description' => esc_html__( 'Place one of your Gravity Forms into your content', 'okab' ),
					'params'      => array(
						array(
							'param_name'  => 'id',
							'heading'     => 'Form',
							'description' => esc_html__( 'Select which form you would like to display.', 'okab' ),
							'type'        => 'dropdown',
							'holder'      => 'div',
							'value'       => $param_gf_forms_value
						),
						array(
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Disable Title', 'okab' ),
							'description' => esc_html__( 'Select to disable the title of your form.', 'okab' ),
							'type'        => 'checkbox',
							'holder'      => 'div',
							'value'       => array(
								'' => 'false'
							)
						),
						array(
							'param_name'  => 'description',
							'heading'     => esc_html__( 'Disable Description', 'okab' ),
							'description' => esc_html__( 'Select to disable the description of your form.', 'okab' ),
							'type'        => 'checkbox',
							'holder'      => 'div',
							'value'       => array(
								'' => 'false'
							)
						),
						array(
							'param_name'  => 'ajax',
							'heading'     => esc_html__( 'Enable AJAX', 'okab' ),
							'description' => esc_html__( 'Select to enable the AJAX functionality of your form.', 'okab' ),
							'type'        => 'checkbox',
							'holder'      => 'div',
							'value'       => array(
								'' => 'true'
							)
						)
					)
				)
			);

		endif;
	}

	public function dima_vc_update_row_inner() {

		vc_map_update( 'vc_row_inner', array(
			'name'        => esc_html__( 'Section Row', 'okab' ),
			'weight'      => 1000,
			'class'       => 'dima-vc-element dima-vc-element-section-row',
			'icon'        => 'section-row',
			'category'    => esc_html__( 'Structure', 'okab' ),
			'description' => esc_html__( 'Place and structure your shortcodes inside of a row', 'okab' ),
			'js_view'     => 'DimaRowView'
		) );

		vc_remove_param( 'vc_row_inner', 'gap' );
		vc_remove_param( 'vc_row_inner', 'equal_height' );
		vc_remove_param( 'vc_row_inner', 'bg_color' );
		vc_remove_param( 'vc_row_inner', 'font_color' );
		vc_remove_param( 'vc_row_inner', 'padding' );
		vc_remove_param( 'vc_row_inner', 'margin_bottom' );
		vc_remove_param( 'vc_row_inner', 'bg_image' );
		vc_remove_param( 'vc_row_inner', 'bg_image_repeat' );
		vc_remove_param( 'vc_row_inner', 'el_class' );
		vc_remove_param( 'vc_row_inner', 'css' );
		vc_remove_param( 'vc_row_inner', 'full_width' );
		vc_remove_param( 'vc_row_inner', 'full_height' );
		vc_remove_param( 'vc_row_inner', 'content_placement' );
		vc_remove_param( 'vc_row_inner', 'video_bg' );
		vc_remove_param( 'vc_row_inner', 'video_bg_url' );
		vc_remove_param( 'vc_row_inner', 'video_bg_parallax' );
		vc_remove_param( 'vc_row_inner', 'parallax' );
		vc_remove_param( 'vc_row_inner', 'parallax_image' );
		vc_remove_param( 'vc_row_inner', 'el_id' );


		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'no_margin',
			'heading'     => esc_html__( 'Marginless Columns', 'okab' ),
			'description' => esc_html__( 'Check to remove the spacing between columns.', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => array(
				'' => 'true'
			)
		) );

		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'full_width',
			'heading'     => esc_html__( 'Section Width', 'okab' ),
			'description' => esc_html__( 'Choose your section width', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'value'       => array(
				esc_html__( 'Default', 'okab' )    => '',
				'Full width no padding'            => 'full_width',
				'Full width with wrap and padding' => 'wrap'
			)
		) );


		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'id',
			'heading'     => esc_html__( 'ID', 'okab' ),
			'description' => $this->id_des,
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div'
		) );
		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'class',
			'heading'     => esc_html__( 'Class', 'okab' ),
			'description' => $this->class_des,
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div'
		) );
		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'style',
			'heading'     => esc_html__( 'Style', 'okab' ),
			'description' => $this->style_des,
			'save_always' => true,
			'type'        => 'textarea',
			'holder'      => 'div'
		) );

		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'dark',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Dark Background', 'okab' ),
			'description' => esc_html__( 'Check if you will work in dark background section (This will affect elements style)', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => array(
				'' => 'true'
			)
		) );
		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'equal_height',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Columns with equal height', 'okab' ),
			'description' => esc_html__( 'Check this to have columns that are all equally tall, matching the height of the tallest', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => array(
				'' => 'true'
			)
		) );

		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'top_and_bottom_padding',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Padding Top And Bottom', 'okab' ),
			'description' => esc_html__( 'Set the top and bottom padding of the content (leave blank to keep default).', 'okab' ),
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div',
			'value'       => ''
		) );

		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'left_and_right_padding',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Padding Left And Right', 'okab' ),
			'description' => esc_html__( 'Set the Left and right padding of the content (leave blank to keep default).', 'okab' ),
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div',
			'value'       => ''
		) );

		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'bg_type',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Background Type', 'okab' ),
			'description' => esc_html__( 'Select background type.', 'okab' ),
			'type'        => 'dropdown',
			'save_always' => true,
			'value'       => array(
				esc_html__( '- Select Option -', 'okab' )        => '',
				esc_html__( 'Background Color', 'okab' )         => 'bg_color',
				esc_html__( 'Covered Background Image', 'okab' ) => 'bg_image',
				esc_html__( 'Repeated Background', 'okab' )      => 'bg_pattern',
				esc_html__( 'Background Video', 'okab' )         => 'bg_video',
			),
			'holder'      => 'div',
		) );

		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'bg_color',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Background Color', 'okab' ),
			'description' => esc_html__( 'Select the background color of your section (leave blank for transparent)', 'okab' ),
			'type'        => 'colorpicker',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => 'bg_color',
			),
			'holder'      => 'div'
		) );

		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'bg_image',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Background Image', 'okab' ),
			'description' => esc_html__( 'Upload a background image to your content band (this will overwrite your Background Pattern).', 'okab' ),
			'type'        => 'attach_image',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => 'bg_image',
			),
			'holder'      => 'div'
		) );
		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'bg_pattern',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Background Pattern', 'okab' ),
			'description' => esc_html__( 'Upload a background Pattern to your section (<a href="http://subtlepatterns.com/" target="_blank">Find Patterns</a>)', 'okab' ),
			'type'        => 'attach_image',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => 'bg_pattern',
			),
			'holder'      => 'div'
		) );
		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'bg_video',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Background Video Path', 'okab' ),
			'description' => esc_html__( 'Include the path to your background video.', 'okab' ),
			'save_always' => true,
			'type'        => 'textfield',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => 'bg_video',
			),
			'holder'      => 'div'
		) );

		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'cover',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Cover', 'okab' ),
			'description' => esc_html__( 'Select to activate the cover above the background patterns and images.', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => array( 'bg_image', 'bg_pattern', 'bg_video' )
			),
			'value'       => array( '' => 'true' )
		) );

		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'parallax',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Parallax', 'okab' ),
			'description' => esc_html__( 'Select to activate the parallax effect with background patterns and images.', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => array( 'bg_image', 'bg_pattern', 'bg_video' )
			),
			'value'       => array(
				esc_html__( '- Select Option -', 'okab' ) => '',
				esc_html__( 'Parallax', 'okab' )          => 'parallax',
				esc_html__( 'Fixed Parallax', 'okab' )    => 'fixed_parallax',
			)
		) );

		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'parallax_start',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Parallax Start', 'okab' ),
			'description' => esc_html__( '% or px', 'okab' ),
			'type'        => 'textfield',
			'holder'      => 'div',
			'dependency'  => array(
				'element' => 'parallax',
				'value'   => array( 'parallax' )
			),
			'value'       => '0%'
		) );
		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'parallax_center',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Parallax Center', 'okab' ),
			'description' => esc_html__( '% or px', 'okab' ),
			'type'        => 'textfield',
			'holder'      => 'div',
			'dependency'  => array(
				'element' => 'parallax',
				'value'   => array( 'parallax' )
			),
			'value'       => '50%'
		) );
		vc_add_param( 'vc_row_inner', array(
			'param_name'  => 'parallax_end',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Parallax End', 'okab' ),
			'description' => esc_html__( '% or px', 'okab' ),
			'type'        => 'textfield',
			'holder'      => 'div',
			'dependency'  => array(
				'element' => 'parallax',
				'value'   => array( 'parallax' )
			),
			'value'       => '100%'
		) );
	}

	public function dima_vc_update_row() {

		vc_map_update( 'vc_row', array(
			'name'        => esc_html__( 'Section Row', 'okab' ),
			'weight'      => 1000,
			'class'       => 'dima-vc-element dima-vc-element-section-row',
			'icon'        => 'section-row',
			'category'    => esc_html__( 'Structure', 'okab' ),
			'description' => esc_html__( 'Place and structure your shortcodes inside of a row', 'okab' ),
			'js_view'     => 'DimaRowView'
		) );

		vc_remove_param( 'vc_row', 'columns_placement' );
		vc_remove_param( 'vc_row', 'parallax_speed_video' );
		vc_remove_param( 'vc_row', 'parallax_speed_bg' );
		vc_remove_param( 'vc_row', 'gap' );
		vc_remove_param( 'vc_row', 'equal_height' );
		vc_remove_param( 'vc_row', 'bg_color' );
		vc_remove_param( 'vc_row', 'font_color' );
		vc_remove_param( 'vc_row', 'padding' );
		vc_remove_param( 'vc_row', 'margin_bottom' );
		vc_remove_param( 'vc_row', 'bg_image' );
		vc_remove_param( 'vc_row', 'bg_image_repeat' );
		vc_remove_param( 'vc_row', 'el_class' );
		vc_remove_param( 'vc_row', 'css' );
		vc_remove_param( 'vc_row', 'full_width' );
		vc_remove_param( 'vc_row', 'full_height' );
		vc_remove_param( 'vc_row', 'content_placement' );
		vc_remove_param( 'vc_row', 'video_bg' );
		vc_remove_param( 'vc_row', 'video_bg_url' );
		vc_remove_param( 'vc_row', 'video_bg_parallax' );
		vc_remove_param( 'vc_row', 'parallax' );
		vc_remove_param( 'vc_row', 'parallax_image' );
		vc_remove_param( 'vc_row', 'el_id' );

		vc_add_param( 'vc_row', array(
			'param_name'  => 'no_margin',
			'heading'     => esc_html__( 'Marginless Columns', 'okab' ),
			'description' => esc_html__( 'Check to remove the spacing between columns.', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => array(
				'' => 'true'
			)
		) );

		vc_add_param( 'vc_row', array(
			'param_name'  => 'full_width',
			'heading'     => esc_html__( 'Section Width', 'okab' ),
			'description' => esc_html__( 'Choose your section width', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'value'       => array(
				esc_html__( 'Default', 'okab' )    => '',
				'Full width no padding'            => 'full_width',
				'Full width with wrap and padding' => 'wrap'
			)
		) );


		vc_add_param( 'vc_row', array(
			'param_name'  => 'id',
			'heading'     => esc_html__( 'ID', 'okab' ),
			'description' => $this->id_des,
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div'
		) );
		vc_add_param( 'vc_row', array(
			'param_name'  => 'class',
			'heading'     => esc_html__( 'Class', 'okab' ),
			'description' => $this->class_des,
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div'
		) );
		vc_add_param( 'vc_row', array(
			'param_name'  => 'style',
			'heading'     => esc_html__( 'Style', 'okab' ),
			'description' => $this->style_des,
			'save_always' => true,
			'type'        => 'textarea',
			'holder'      => 'div'
		) );

		vc_add_param( 'vc_row', array(
			'param_name'  => 'dark',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Dark Background', 'okab' ),
			'description' => esc_html__( 'Check if you will work in dark background section (This will affect elements style)', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => array(
				'' => 'true'
			)
		) );
		vc_add_param( 'vc_row', array(
			'param_name'  => 'equal_height',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Columns with equal height', 'okab' ),
			'description' => esc_html__( 'Check this to have columns that are all equally tall, matching the height of the tallest', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => array(
				'' => 'true'
			)
		) );

		vc_add_param( 'vc_row', array(
			'param_name'  => 'top_and_bottom_padding',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Padding Top And Bottom', 'okab' ),
			'description' => esc_html__( 'Set the top and bottom padding of the content (leave blank to keep default).', 'okab' ),
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div',
			'value'       => ''
		) );

		vc_add_param( 'vc_row', array(
			'param_name'  => 'left_and_right_padding',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Padding Left And Right', 'okab' ),
			'description' => esc_html__( 'Set the Left and right padding of the content (leave blank to keep default).', 'okab' ),
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div',
			'value'       => ''
		) );

		vc_add_param( 'vc_row', array(
			'param_name'  => 'bg_type',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Background Type', 'okab' ),
			'description' => esc_html__( 'Select background type.', 'okab' ),
			'type'        => 'dropdown',
			'save_always' => true,
			'value'       => array(
				esc_html__( '- Select Option -', 'okab' )        => '',
				esc_html__( 'Background Color', 'okab' )         => 'bg_color',
				esc_html__( 'Covered Background Image', 'okab' ) => 'bg_image',
				esc_html__( 'Repeated Background', 'okab' )      => 'bg_pattern',
				esc_html__( 'Background Video', 'okab' )         => 'bg_video',
			),
			'holder'      => 'div',
		) );

		vc_add_param( 'vc_row', array(
			'param_name'  => 'bg_color',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Background Color', 'okab' ),
			'description' => esc_html__( 'Select the background color of your section (leave blank for transparent)', 'okab' ),
			'type'        => 'colorpicker',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => 'bg_color',
			),
			'holder'      => 'div'
		) );

		vc_add_param( 'vc_row', array(
			'param_name'  => 'bg_image',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Background Image', 'okab' ),
			'description' => esc_html__( 'Upload a background image to your content band (this will overwrite your Background Pattern).', 'okab' ),
			'type'        => 'attach_image',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => 'bg_image',
			),
			'holder'      => 'div'
		) );
		vc_add_param( 'vc_row', array(
			'param_name'  => 'bg_pattern',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Background Pattern', 'okab' ),
			'description' => esc_html__( 'Upload a background Pattern to your section (<a href="http://subtlepatterns.com/" target="_blank">Find Patterns</a>)', 'okab' ),
			'type'        => 'attach_image',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => 'bg_pattern',
			),
			'holder'      => 'div'
		) );
		vc_add_param( 'vc_row', array(
			'param_name'  => 'bg_video',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Background Video Path', 'okab' ),
			'description' => esc_html__( 'Include the path to your background video.', 'okab' ),
			'save_always' => true,
			'type'        => 'textfield',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => 'bg_video',
			),
			'holder'      => 'div'
		) );

		vc_add_param( 'vc_row', array(
			'param_name'  => 'cover',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Cover', 'okab' ),
			'description' => esc_html__( 'Select to activate the cover above the background patterns and images.', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => array( 'bg_image', 'bg_pattern', 'bg_video' )
			),
			'value'       => array( '' => 'true' )
		) );

		vc_add_param( 'vc_row', array(
			'param_name'  => 'parallax',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Parallax', 'okab' ),
			'description' => esc_html__( 'Select to activate the parallax effect with background patterns and images.', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => array( 'bg_image', 'bg_pattern', 'bg_video' )
			),
			'value'       => array(
				esc_html__( '- Select Option -', 'okab' ) => '',
				esc_html__( 'Parallax', 'okab' )          => 'parallax',
				esc_html__( 'Fixed Parallax', 'okab' )    => 'fixed_parallax',
			)
		) );

		vc_add_param( 'vc_row', array(
			'param_name'  => 'parallax_start',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Parallax Start', 'okab' ),
			'description' => esc_html__( '% or px', 'okab' ),
			'type'        => 'textfield',
			'holder'      => 'div',
			'dependency'  => array(
				'element' => 'parallax',
				'value'   => array( 'parallax' )
			),
			'value'       => '0%'
		) );
		vc_add_param( 'vc_row', array(
			'param_name'  => 'parallax_center',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Parallax Center', 'okab' ),
			'description' => esc_html__( '% or px', 'okab' ),
			'type'        => 'textfield',
			'holder'      => 'div',
			'dependency'  => array(
				'element' => 'parallax',
				'value'   => array( 'parallax' )
			),
			'value'       => '50%'
		) );
		vc_add_param( 'vc_row', array(
			'param_name'  => 'parallax_end',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Parallax End', 'okab' ),
			'description' => esc_html__( '% or px', 'okab' ),
			'type'        => 'textfield',
			'holder'      => 'div',
			'dependency'  => array(
				'element' => 'parallax',
				'value'   => array( 'parallax' )
			),
			'value'       => '100%'
		) );
	}

	public function dima_vc_update_column() {

		/**
		 * vc_column
		 */

		vc_map_update( 'vc_column', array(
			'name'        => esc_html__( 'Column', 'okab' ),
			'weight'      => 1000,
			'class'       => 'dima-vc-element dima-vc-element-section-row',
			'icon'        => 'section-row',
			'category'    => esc_html__( 'Structure', 'okab' ),
			'description' => esc_html__( 'Place and structure your shortcodes inside of a row', 'okab' ),
			'js_view'     => 'DimaColumnView'
		) );

		vc_remove_param( 'vc_column', 'width' );
		vc_remove_param( 'vc_column', 'font_color' );
		vc_remove_param( 'vc_column', 'el_class' );
		vc_remove_param( 'vc_column', 'css' );
		vc_remove_param( 'vc_column', 'offset' );


		//1-Animation List
		vc_add_param( 'vc_column', array(
			'param_name'  => 'animation',
			'heading'     => esc_html__( 'Animation', 'okab' ),
			'description' => esc_html__( 'Select the type of animation you want to use.', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'value'       => $this->dima_animate_list,
		) );
		//2-Delay Animation
		vc_add_param( 'vc_column', array(
				'param_name'  => 'delay',
				'heading'     => esc_html__( 'Delay Animation', 'okab' ),
				'description' => esc_html__( 'Set when the animation start (milliseconds)', 'okab' ),
				'save_always' => true,
				'type'        => 'textfield',
				'holder'      => 'div',
				'value'       => ''
			)
		);
		//3-Delay Animation Offset
		vc_add_param( 'vc_column', array(
			'param_name'  => 'delay_offset',
			'heading'     => esc_html__( 'Delay Animation Offset', 'okab' ),
			'description' => esc_html__( 'Set the number ( px,%..) from the top of the viewport where the animation start.', 'okab' ) . "<a href='http://imakewebthings.com/waypoints/api/offset-option/' target='_blank' >" . esc_html__( 'Read More', 'okab' ) . "</a>",
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div',
			'value'       => ''
		) );
		//4-ID
		vc_add_param( 'vc_column', array(
			'param_name'  => 'id',
			'heading'     => esc_html__( 'ID', 'okab' ),
			'description' => $this->id_des,
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div'
		) );
		//5-Class
		vc_add_param( 'vc_column', array(
			'param_name'  => 'class',
			'heading'     => esc_html__( 'Class', 'okab' ),
			'description' => $this->class_des,
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div'
		) );
		//Style
		vc_add_param( 'vc_column', array(
			'param_name'  => 'style',
			'heading'     => esc_html__( 'Style', 'okab' ),
			'description' => $this->style_des,
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div'
		) );


		//Style
		vc_add_param( 'vc_column', array(
			'param_name'  => 'dark',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Dark Background', 'okab' ),
			'description' => esc_html__( 'Check if you will work in dark background section (This will affect elements style)', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => array(
				'' => 'true'
			)
		) );

		vc_add_param( 'vc_column', array(
			'param_name'  => 'bg_type',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Background Type', 'okab' ),
			'description' => esc_html__( 'Select background type.', 'okab' ),
			'type'        => 'dropdown',
			'save_always' => true,
			'value'       => array(
				esc_html__( '- Select Option -', 'okab' )        => '',
				esc_html__( 'Background Color', 'okab' )         => 'bg_color',
				esc_html__( 'Covered Background Image', 'okab' ) => 'bg_image',
				esc_html__( 'Repeated Background', 'okab' )      => 'bg_pattern',
				esc_html__( 'Background Video', 'okab' )         => 'bg_video',
			),
			'holder'      => 'div',
		) );

		vc_add_param( 'vc_column', array(
			'param_name'  => 'bg_color',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Background Color', 'okab' ),
			'description' => esc_html__( 'Select the background color of your section (leave blank for transparent)', 'okab' ),
			'type'        => 'colorpicker',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => 'bg_color',
			),
			'holder'      => 'div'
		) );

		vc_add_param( 'vc_column', array(
			'param_name'  => 'bg_image',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Background Image', 'okab' ),
			'description' => esc_html__( 'Upload a background image to your content band (this will overwrite your Background Pattern).', 'okab' ),
			'type'        => 'attach_image',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => 'bg_image',
			),
			'holder'      => 'div'
		) );
		vc_add_param( 'vc_column', array(
			'param_name'  => 'bg_pattern',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Background Pattern', 'okab' ),
			'description' => esc_html__( 'Upload a background Pattern to your section (<a href="http://subtlepatterns.com/" target="_blank">Find Patterns</a>)', 'okab' ),
			'type'        => 'attach_image',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => 'bg_pattern',
			),
			'holder'      => 'div'
		) );
		vc_add_param( 'vc_column', array(
			'param_name'  => 'bg_video',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Background Video Path', 'okab' ),
			'description' => esc_html__( 'Include the path to your background video.', 'okab' ),
			'save_always' => true,
			'type'        => 'textfield',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => 'bg_video',
			),
			'holder'      => 'div'
		) );

		vc_add_param( 'vc_column', array(
			'param_name'  => 'cover',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Cover', 'okab' ),
			'description' => esc_html__( 'Select to activate the cover above the background patterns and images.', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => array( 'bg_image', 'bg_pattern', 'bg_video' )
			),
			'value'       => array( '' => 'true' )
		) );

		vc_add_param( 'vc_column', array(
			'param_name'  => 'parallax',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Parallax', 'okab' ),
			'description' => esc_html__( 'Select to activate the parallax effect with background patterns and images.', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'dependency'  => array(
				'element' => 'bg_type',
				'value'   => array( 'bg_image', 'bg_pattern', 'bg_video' )
			),
			'value'       => array(
				esc_html__( '- Select Option -', 'okab' ) => '',
				esc_html__( 'Parallax', 'okab' )          => 'parallax',
				esc_html__( 'Fixed Parallax', 'okab' )    => 'fixed_parallax',
			)
		) );

		vc_add_param( 'vc_column', array(
			'param_name'  => 'parallax_start',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Parallax Start', 'okab' ),
			'description' => esc_html__( '% or px', 'okab' ),
			'type'        => 'textfield',
			'holder'      => 'div',
			'dependency'  => array(
				'element' => 'parallax',
				'value'   => array( 'parallax' )
			),
			'value'       => '0%'
		) );

		vc_add_param( 'vc_column', array(
			'param_name'  => 'parallax_center',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Parallax Center', 'okab' ),
			'description' => esc_html__( '% or px', 'okab' ),
			'type'        => 'textfield',
			'holder'      => 'div',
			'dependency'  => array(
				'element' => 'parallax',
				'value'   => array( 'parallax' )
			),
			'value'       => '50%'
		) );

		vc_add_param( 'vc_column', array(
			'param_name'  => 'parallax_end',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Parallax End', 'okab' ),
			'description' => esc_html__( '% or px', 'okab' ),
			'type'        => 'textfield',
			'holder'      => 'div',
			'dependency'  => array(
				'element' => 'parallax',
				'value'   => array( 'parallax' )
			),
			'value'       => '100%'
		) );


		vc_add_param( 'vc_column', array(
			'param_name'  => 'min_height',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Min Height', 'okab' ),
			'description' => esc_html__( 'Insert the row minimum height in pixel.', 'okab' ),
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div',
			'value'       => ''
		) );
		vc_add_param( 'vc_column', array(
			'param_name'  => 'top_and_bottom_padding',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Padding Top And Bottom', 'okab' ),
			'description' => esc_html__( 'Set the top and bottom padding of the content (leave blank to keep default).', 'okab' ),
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div',
			'value'       => ''
		) );

		vc_add_param( 'vc_column', array(
			'param_name'  => 'left_and_right_padding',
			'group'       => esc_html__( 'Style', 'okab' ),
			'heading'     => esc_html__( 'Padding Left And Right', 'okab' ),
			'description' => esc_html__( 'Set the Left and right padding of the content (leave blank to keep default).', 'okab' ),
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div',
			'value'       => ''
		) );

		//Width

		//1- Extra Large devices Desktops
		vc_add_param( 'vc_column', array(
			'param_name'  => 'xld',
			'heading'     => esc_html__( 'Extra Large devices', 'okab' ),
			'group'       => esc_html__( 'Responsive Width', 'okab' ),
			'description' => esc_html__( 'Select column width for Extra Large devices Desktops ( ≥1600px ).', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'value'       => $this->vc_column_width_list,
			'std'         => ''
		) );
		//2- Large devices Desktops    
		vc_add_param( 'vc_column', array(
			'param_name'  => 'ld',
			'heading'     => esc_html__( 'Large devices', 'okab' ),
			'group'       => esc_html__( 'Responsive Width', 'okab' ),
			'description' => esc_html__( 'Select column width for Large devices Desktops ( ≥1140px ).', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'value'       => $this->vc_column_width_list,
			'std'         => ''
		) );

		//4- Small devices    
		vc_add_param( 'vc_column', array(
			'param_name'  => 'sd',
			'heading'     => esc_html__( 'Small devices Tablets', 'okab' ),
			'group'       => esc_html__( 'Responsive Width', 'okab' ),
			'description' => esc_html__( 'Select column width for Small devices Tablets ( ≥768px ).', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'value'       => $this->vc_column_width_list,
			'std'         => ''
		) );
		//5- Extra small    
		vc_add_param( 'vc_column', array(
			'param_name'  => 'xsd',
			'heading'     => esc_html__( 'Extra small devices Phones', 'okab' ),
			'group'       => esc_html__( 'Responsive Width', 'okab' ),
			'description' => esc_html__( 'Select column width for Extra small devices Phones ( <768px ).', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'value'       => $this->vc_column_width_list,
			'std'         => '12'
		) );

		//hidden

		//1- Extra Large devices Desktops
		vc_add_param( 'vc_column', array(
			'param_name'  => 'visibility_xld',
			'heading'     => esc_html__( 'Extra Large devices', 'okab' ),
			'group'       => esc_html__( 'Responsive Visibility', 'okab' ),
			'description' => esc_html__( 'Choose column visibility for Extra Large devices Desktops ( ≥1600px ).', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => $this->vc_column_visibility,
			'std'         => ''
		) );


		//2- Large devices Desktops    
		vc_add_param( 'vc_column', array(
			'param_name'  => 'visibility_ld',
			'heading'     => esc_html__( 'Large devices', 'okab' ),
			'group'       => esc_html__( 'Responsive Visibility', 'okab' ),
			'description' => esc_html__( 'Choose column visibility for Large devices Desktops ( ≥1140px ).', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => $this->vc_column_visibility,
			'std'         => ''
		) );

		//3- Medium Devise    
		vc_add_param( 'vc_column', array(
			'param_name'  => 'visibility_md',
			'heading'     => esc_html__( 'Medium Devise', 'okab' ),
			'group'       => esc_html__( 'Responsive Visibility', 'okab' ),
			'description' => esc_html__( 'Choose column visibility for medium devise ( ≥989px ).', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => $this->vc_column_visibility,
			'std'         => ''
		) );

		//4- Small devices    
		vc_add_param( 'vc_column', array(
			'param_name'  => 'visibility_sd',
			'heading'     => esc_html__( 'Small devices', 'okab' ),
			'group'       => esc_html__( 'Responsive Visibility', 'okab' ),
			'description' => esc_html__( 'Choose column visibility for Small devices Tablets ( ≥768px ).', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => $this->vc_column_visibility,
			'std'         => ''
		) );

		//5- Extra small    
		vc_add_param( 'vc_column', array(
			'param_name'  => 'visibility_xsd',
			'heading'     => esc_html__( 'Extra small devices', 'okab' ),
			'group'       => esc_html__( 'Responsive Visibility', 'okab' ),
			'description' => esc_html__( 'Choose column visibility for Extra small devices Phones ( <768px ).', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => $this->vc_column_visibility,
			'std'         => ''
		) );

	}

	public function dima_vc_update_column_inner() {

		/**
		 * vc_column_inner
		 */
		vc_remove_param( 'vc_column_inner', 'width' );
		vc_remove_param( 'vc_column_inner', 'font_color' );
		vc_remove_param( 'vc_column_inner', 'el_class' );
		vc_remove_param( 'vc_column_inner', 'css' );
		vc_remove_param( 'vc_column_inner', 'offset' );


		//1-Animation List
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'animation',
			'heading'     => esc_html__( 'Animation', 'okab' ),
			'description' => esc_html__( 'Select the type of animation you want to use.', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'value'       => $this->dima_animate_list,
		) );
		//2-Delay Animation
		vc_add_param( 'vc_column_inner', array(
				'param_name'  => 'delay',
				'heading'     => esc_html__( 'Delay Animation', 'okab' ),
				'description' => esc_html__( 'Set when the animation start (milliseconds)', 'okab' ),
				'save_always' => true,
				'type'        => 'textfield',
				'holder'      => 'div',
				'value'       => ''
			)
		);
		//3-Delay Animation Offset
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'delay_offset',
			'heading'     => esc_html__( 'Delay Animation Offset', 'okab' ),
			'description' => esc_html__( 'Set the number ( px,%..) from the top of the viewport where the animation start.', 'okab' ) . "<a href='http://imakewebthings.com/waypoints/api/offset-option/' target='_blank' >" . esc_html__( 'Read More', 'okab' ) . "</a>",
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div',
			'value'       => ''
		) );
		//4-ID
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'id',
			'heading'     => esc_html__( 'ID', 'okab' ),
			'description' => $this->id_des,
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div'
		) );
		//5-Class
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'class',
			'heading'     => esc_html__( 'Class', 'okab' ),
			'description' => $this->class_des,
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div'
		) );
		//Style
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'style',
			'heading'     => esc_html__( 'Style', 'okab' ),
			'description' => $this->style_des,
			'save_always' => true,
			'type'        => 'textfield',
			'holder'      => 'div'
		) );

		//Width

		//1- Extra Large devices Desktops
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'xld',
			'heading'     => esc_html__( 'Extra Large devices', 'okab' ),
			'group'       => esc_html__( 'Responsive Width', 'okab' ),
			'description' => esc_html__( 'Select column width for Extra Large devices Desktops ( ≥1600px ).', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'value'       => $this->vc_column_width_list,
			'std'         => ''
		) );
		//2- Large devices Desktops    
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'ld',
			'heading'     => esc_html__( 'Large devices', 'okab' ),
			'group'       => esc_html__( 'Responsive Width', 'okab' ),
			'description' => esc_html__( 'Select column width for Large devices Desktops ( ≥1140px ).', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'value'       => $this->vc_column_width_list,
			'std'         => ''
		) );

		//4- Small devices    
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'sd',
			'heading'     => esc_html__( 'Small devices Tablets', 'okab' ),
			'group'       => esc_html__( 'Responsive Width', 'okab' ),
			'description' => esc_html__( 'Select column width for Small devices Tablets ( ≥768px ).', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'value'       => $this->vc_column_width_list,
			'std'         => '6'
		) );
		//5- Extra small    
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'xsd',
			'heading'     => esc_html__( 'Extra small devices Phones', 'okab' ),
			'group'       => esc_html__( 'Responsive Width', 'okab' ),
			'description' => esc_html__( 'Select column width for Extra small devices Phones ( <768px ).', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'value'       => $this->vc_column_width_list,
			'std'         => '12'
		) );


		//Offset

		//1- Extra Large devices Desktops
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'offset_xld',
			'heading'     => esc_html__( 'Extra Large devices', 'okab' ),
			'group'       => esc_html__( 'Responsive Offset', 'okab' ),
			'description' => esc_html__( 'Select column offset for Extra Large devices Desktops ( ≥1600px ).', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'value'       => $this->vc_column_width_list,
			'std'         => ''
		) );
		//2- Large devices Desktops    
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'offset_ld',
			'heading'     => esc_html__( 'Large devices Desktops  ', 'okab' ),
			'group'       => esc_html__( 'Responsive Offset', 'okab' ),
			'description' => esc_html__( 'Select column offset for Large devices Desktops ( ≥1140px ).', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'value'       => $this->vc_column_width_list,
			'std'         => ''
		) );
		//3- Medium Devise    
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'offset_md',
			'heading'     => esc_html__( 'Medium Devise', 'okab' ),
			'group'       => esc_html__( 'Responsive Offset', 'okab' ),
			'description' => esc_html__( 'Select column offset for medium devise ( ≥989px ).', 'okab' ),
			'type'        => 'dropdown',
			'holder'      => 'div',
			'value'       => $this->vc_column_width_list,
			'std'         => ''
		) );


		//hidden

		//1- Extra Large devices Desktops
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'visibility_xld',
			'heading'     => esc_html__( 'Extra Large devices', 'okab' ),
			'group'       => esc_html__( 'Responsive Visibility', 'okab' ),
			'description' => esc_html__( 'Select column width for Extra Large devices Desktops ( ≥1600px ).', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => $this->vc_column_visibility,
			'std'         => ''
		) );


		//2- Large devices Desktops    
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'visibility_ld',
			'heading'     => esc_html__( 'Large devices', 'okab' ),
			'group'       => esc_html__( 'Responsive Visibility', 'okab' ),
			'description' => esc_html__( 'Select column width for Large devices Desktops ( ≥1140px ).', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => $this->vc_column_visibility,
			'std'         => ''
		) );

		//3- Medium Devise    
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'visibility_md',
			'heading'     => esc_html__( 'Medium Devise', 'okab' ),
			'group'       => esc_html__( 'Responsive Visibility', 'okab' ),
			'description' => esc_html__( 'Select column width for medium devise ( ≥989px ).', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => $this->vc_column_visibility,
			'std'         => ''
		) );

		//4- Small devices    
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'visibility_sd',
			'heading'     => esc_html__( 'Small devices', 'okab' ),
			'group'       => esc_html__( 'Responsive Visibility', 'okab' ),
			'description' => esc_html__( 'Select column width for Small devices Tablets ( ≥768px ).', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => $this->vc_column_visibility,
			'std'         => ''
		) );

		//5- Extra small    
		vc_add_param( 'vc_column_inner', array(
			'param_name'  => 'visibility_xsd',
			'heading'     => esc_html__( 'Extra small devices', 'okab' ),
			'group'       => esc_html__( 'Responsive Visibility', 'okab' ),
			'description' => esc_html__( 'Select column width for Extra small devices Phones ( <768px ).', 'okab' ),
			'type'        => 'checkbox',
			'holder'      => 'div',
			'value'       => $this->vc_column_visibility,
			'std'         => ''
		) );
	}

	public function dima_vc_update_widget() {

		vc_map_update( 'vc_widget_sidebar', array(
			'name'        => esc_html__( 'Widget Area', 'okab' ),
			'weight'      => 950,
			'class'       => 'dima-vc-element dima-vc-element-widget-sidebar',
			'icon'        => 'dima-widget',
			'category'    => esc_html__( 'Content', 'okab' ),
			'description' => esc_html__( 'WordPress widgetised sidebar', 'okab' ),
		) );

		vc_remove_param( 'vc_widget_sidebar', 'title' );
		vc_remove_param( 'vc_widget_sidebar', 'el_class' );

	}

}

GLOBAL $dima_vc;
$dima_vc = new DIMA_VC();
$path    = DIMA_TEMPLATE_PATH . '/framework/functions/extensions/';
include_once $path . 'dima-vc-config.php';
// Map Shortcodes
include_once $path . 'dima-map-shortcodes.php';