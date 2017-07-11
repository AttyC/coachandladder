<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://pixeldima.com
 * @since      1.0.0
 *
 * @package    DIMA_Portfolio
 * @subpackage DIMA_Portfolio/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    DIMA_Portfolio
 * @subpackage DIMA_Portfolio/includes
 * @author     PixelDima
 */
class DIMA_CORE_PORTFOLIO {
	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $plugin_name The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	protected $slug_name;
	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $version The current version of the plugin.
	 */
	protected $version;

	public function __construct() {
		$this->plugin_name = 'dima_portfolio';
		$this->slug_name   = 'dima-portfolio';
		$this->version     = '1.0.0';

		add_action( 'init', array( $this, 'dima_portfolio_create_portfolio' ) );
		add_action( 'init', array( $this, 'dima_portfolio_category_taxonomies' ) );
		add_action( 'init', array( $this, 'dima_portfolio_tag_taxonomies' ) );
		add_action( 'init', array( $this, 'dima_portfolio_flush_rewrite_rules' ) );

		add_filter( 'manage_dima-portfolio_posts_columns', array(
			$this,
			'dima_portfolio_add_thumbnail_admin'
		), 10, 1 );
		add_action( 'manage_dima-portfolio_posts_custom_column', array(
			$this,
			'dima_portfolio_add_thumbnail_admin_content'
		), 10, 1 );
	}

	/**
	 * Enable the Portfolio custom post type.
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	public function dima_portfolio_create_portfolio() {
		$THEME_ARRY = array( 'okab Child', 'OKAB', 'PixelDima' );
		if ( in_array( wp_get_theme(), $THEME_ARRY ) ) {
			$this->slug_name = dima_helper::dima_get_option( 'dima_projects_slug_name' );
		} else {
			$this->slug_name = "dima-portfolio";
		}
		$gallery_icon = ( floatval( get_bloginfo( 'version' ) ) >= '3.8' ) ? 'dashicons-portfolio' : null;

		$labels = array(
			'name'               => esc_html__( 'Portfolio', 'dima-portfolio' ),
			'singular_name'      => esc_html__( 'Portfolio Item', 'dima-portfolio' ),
			'add_new'            => esc_html__( 'Add New Item', 'dima-portfolio' ),
			'add_new_item'       => esc_html__( 'Add New Portfolio Item', 'dima-portfolio' ),
			'edit_item'          => esc_html__( 'Edit Portfolio Item', 'dima-portfolio' ),
			'new_item'           => esc_html__( 'Add New Portfolio Item', 'dima-portfolio' ),
			'view_item'          => esc_html__( 'View Item', 'dima-portfolio' ),
			'search_items'       => esc_html__( 'Search Portfolio', 'dima-portfolio' ),
			'not_found'          => esc_html__( 'No portfolio items found', 'dima-portfolio' ),
			'not_found_in_trash' => esc_html__( 'No portfolio items found in trash', 'dima-portfolio' )
		);

		$args = array(
			'labels'          => $labels,
			'public'          => true,
			'show_ui'         => true,
			'supports'        => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'comments',
				'author',
				'custom-fields',
				'revisions'
			),/* ,'custom-fields' */
			'capability_type' => 'post',
			'hierarchical'    => false,
			'rewrite'         => array( 'slug' => $this->slug_name, 'with_front' => false ),
			'menu_position'   => 5,
			'menu_icon'       => $gallery_icon,
			'has_archive'     => true
		);

		$args = apply_filters( 'dima_portfolio_post_type_args', $args );

		register_post_type( 'dima-portfolio', $args );

		// different post FORMAT support for different post TYPES
		add_post_type_support( 'dima-portfolio', 'post-formats', array( 'audio', 'gallery', 'image', 'video' ) );

	}

	/**
	 *  Create the Portfolio Category Taxonomy
	 */
	public function dima_portfolio_category_taxonomies() {

		// Create the Portfolio Category Taxonomy.
		$taxonomy_portfolio_category_labels = array(
			'name'                       => esc_html__( 'Portfolio Categories', 'dima-portfolio' ),
			'singular_name'              => esc_html__( 'Portfolio Category', 'dima-portfolio' ),
			'search_items'               => esc_html__( 'Search Portfolio Categories', 'dima-portfolio' ),
			'popular_items'              => esc_html__( 'Popular Portfolio Categories', 'dima-portfolio' ),
			'all_items'                  => esc_html__( 'All Portfolio Categories', 'dima-portfolio' ),
			'parent_item'                => esc_html__( 'Parent Portfolio Category', 'dima-portfolio' ),
			'parent_item_colon'          => esc_html__( 'Parent Portfolio Category:', 'dima-portfolio' ),
			'edit_item'                  => esc_html__( 'Edit Portfolio Category', 'dima-portfolio' ),
			'update_item'                => esc_html__( 'Update Portfolio Category', 'dima-portfolio' ),
			'add_new_item'               => esc_html__( 'Add New Portfolio Category', 'dima-portfolio' ),
			'new_item_name'              => esc_html__( 'New Portfolio Category Name', 'dima-portfolio' ),
			'separate_items_with_commas' => esc_html__( 'Separate portfolio categories with commas', 'dima-portfolio' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove portfolio categories', 'dima-portfolio' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used portfolio categories', 'dima-portfolio' ),
			'menu_name'                  => esc_html__( 'Portfolio Categories', 'dima-portfolio' ),
		);

		$taxonomy_portfolio_category_args = array(
			'labels'            => $taxonomy_portfolio_category_labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_tagcloud'     => true,
			'hierarchical'      => true,
			'rewrite'           => array( 'slug' => $this->slug_name . '-category', 'with_front' => false ),
			'query_var'         => true
		);

		register_taxonomy( 'portfolio-category', array( 'dima-portfolio' ), $taxonomy_portfolio_category_args );
	}


	/**
	 * Create the Portfolio Tag Taxonomy.
	 */
	public function dima_portfolio_tag_taxonomies() {
		// Create the Portfolio Tag Taxonomy.
		$taxonomy_portfolio_tag_labels = array(
			'name'                       => esc_html__( 'Portfolio Tags', 'dima-portfolio' ),
			'singular_name'              => esc_html__( 'Portfolio Tag', 'dima-portfolio' ),
			'search_items'               => esc_html__( 'Search Portfolio Tags', 'dima-portfolio' ),
			'popular_items'              => esc_html__( 'Popular Portfolio Tags', 'dima-portfolio' ),
			'all_items'                  => esc_html__( 'All Portfolio Tags', 'dima-portfolio' ),
			'parent_item'                => esc_html__( 'Parent Portfolio Tag', 'dima-portfolio' ),
			'parent_item_colon'          => esc_html__( 'Parent Portfolio Tag:', 'dima-portfolio' ),
			'edit_item'                  => esc_html__( 'Edit Portfolio Tag', 'dima-portfolio' ),
			'update_item'                => esc_html__( 'Update Portfolio Tag', 'dima-portfolio' ),
			'add_new_item'               => esc_html__( 'Add New Portfolio Tag', 'dima-portfolio' ),
			'new_item_name'              => esc_html__( 'New Portfolio Tag Name', 'dima-portfolio' ),
			'separate_items_with_commas' => esc_html__( 'Separate portfolio tags with commas', 'dima-portfolio' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove portfolio tags', 'dima-portfolio' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used portfolio tags', 'dima-portfolio' ),
			'menu_name'                  => esc_html__( 'Portfolio Tags', 'dima-portfolio' )
		);

		$taxonomy_portfolio_tag_args = array(
			'labels'            => $taxonomy_portfolio_tag_labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => false,
			'rewrite'           => array( 'slug' => $this->slug_name . '-tag', 'with_front' => false ),
			'show_admin_column' => true,
			'query_var'         => true
		);

		register_taxonomy( 'portfolio-tag', array( 'dima-portfolio' ), $taxonomy_portfolio_tag_args );
	}

	/**
	 * [dima_portfolio_add_thumbnail_admin Thumbnails to the Admin Screen]
	 */
	public function dima_portfolio_add_thumbnail_admin( $columns ) {
		$thumb   = array( 'thumb' => esc_html__( 'Thumbnail', 'dima-portfolio' ) );
		$columns = array_slice( $columns, 0, 2 ) + $thumb + array_slice( $columns, 1 );

		return $columns;
	}

	public function dima_portfolio_add_thumbnail_admin_content( $column ) {
		if ( $column == 'thumb' ) {
			echo '<a href="' . get_edit_post_link() . '">' . get_the_post_thumbnail( get_the_ID(), array(
					200,
					200
				) ) . '</a>';
		}
	}

	public function dima_portfolio_flush_rewrite_rules() {
		// Flush rewrite rules if portfolio slug is updated.
		if ( get_transient( 'dima_portfolio_slug_before' ) != get_transient( 'dima_portfolio_slug_after' ) ) {
			flush_rewrite_rules( false );
			delete_transient( 'dima_portfolio_slug_before' );
			delete_transient( 'dima_portfolio_slug_after' );
		}
	}

}

new DIMA_CORE_PORTFOLIO;