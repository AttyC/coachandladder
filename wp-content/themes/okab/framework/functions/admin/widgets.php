<?php
/**
 * Register Widget.
 *
 * @package Dima Framework
 * @subpackage Admin
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

if ( ! function_exists( 'dima_footer_widget_areas_count' ) ) :
	function dima_footer_widget_areas_count() {

		return dima_helper::dima_get_option( 'dima_footer_widget_areas' );

	}
endif;

/**
 * Register Widget Areas
 */
if ( ! function_exists( 'dima_widgets_init' ) ) :
	function dima_widgets_init() {

		/**
		 * Default Sidebar
		 */

		register_sidebar( array(
			'name'          => esc_html__( 'Main Sidebar', 'okab' ),
			'id'            => 'sidebar-main',
			'description'   => esc_html__( 'Appears on posts and pages that include the sidebar.', 'okab' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		if ( class_exists( 'Woocommerce' ) ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Shop - For WooCommerce Pages', 'okab' ),
				'id'            => 'shop-widget-area',
				'description'   => esc_html__( 'This widget area uses in the WooCommerce pages .', 'okab' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			) );
		}

		if ( class_exists( 'bbPress' ) ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Forums - For Forums Pages', 'okab' ),
				'id'            => 'forums-widget-area',
				'description'   => esc_html__( 'This widget area uses in the forums pages .', 'okab' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			) );
		}

		$i = 0;
		while ( $i < 4 ) : $i ++;
			register_sidebar( array(
				'name'          => esc_html__( 'Footer Area #', 'okab' ) . $i,
				'id'            => 'footer-' . $i,
				'description'   => esc_html__( 'Widgetized footer area.', 'okab' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			) );
		endwhile;

	}

	add_action( 'widgets_init', 'dima_widgets_init' );
endif;