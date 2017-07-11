<?php

/**
 * Class dima_Breadcrumbs
 * Breadcrumb trails on a page indicate the page's
 *
 * @package Dima Framework
 * @subpackage Functions
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class dima_Breadcrumbs_Class {
	/**
	 * @var mixed Current post object
	 */
	private $post;
	/**
	 * @var boolean True to shown terms in breadcrumb
	 */
	private $show_terms;
	private $home_label;
	private $tag_archive_text;
	private $search_text;
	private $error_text;
	private $options;
	private $separator;
	private $html_output;

	/**
	 * Class Constructor
	 */
	public function __construct() {

		// Initialize
		$this->post    = ( isset( $GLOBALS['post'] ) ? $GLOBALS['post'] : null );
		$this->options = $this->dima_get_bc_options();

		// Setup default array for changeable variables
		$_options = array(
			'separator'        => $this->options['bc_separator'],
			'show_terms'       => $this->options['bc_show_categories'],
			'home_label'       => esc_html__( 'Home', 'okab' ),
			'tag_archive_text' => esc_html__( 'Tag:', 'okab' ),
			'search_text'      => esc_html__( 'Search:', 'okab' ),
			'error_text'       => esc_html__( '404 - Page not Found', 'okab' ),
		);

		$args     = apply_filters( 'dima_breadcrumbs_defaults', $_options );
		$_options = wp_parse_args( $args, $_options );

		$this->separator        = $_options['separator'];
		$this->show_terms       = $_options['show_terms'];
		$this->home_label       = $_options['home_label'];
		$this->tag_archive_text = $_options['tag_archive_text'];
		$this->search_text      = $_options['search_text'];
		$this->error_text       = $_options['error_text'];
	}

	/**
	 * get options from post meta and customizer.
	 * @return array
	 */
	public function dima_get_bc_options() {
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

		//$breadcrumbs_display      = esc_attr( get_post_meta( $_ID, '_dima' . $page_type . 'breadcumbs_display', true ) );
		$breadcrumbs_list_display = esc_attr( get_post_meta( $_ID, '_dima' . $page_type . 'breadcumbs_list_display', true ) );
		$breadcrumbs_position     = esc_attr( get_post_meta( $_ID, '_dima' . $page_type . 'breadcumbs_position', true ) );
		if ( $breadcrumbs_position == 'default' || empty( $breadcrumbs_position ) ) {
			$breadcrumbs_position = esc_attr( dima_helper::dima_get_option( 'dima_breadcrumb_position' ) );
		}

		if ( $breadcrumbs_list_display == '' || empty( $breadcrumbs_list_display ) ) {
			$breadcrumbs_list_display = esc_attr( dima_helper::dima_get_option( 'dima_breadcrumb_display' ) );
			$breadcrumbs_list_display = ( $breadcrumbs_list_display == '1' ) ? 'on' : 'off';
		}

		/*if ( $breadcrumbs_display == '' || empty( $breadcrumbs_display ) ) {
			$breadcrumbs_display = esc_attr( dima_helper::dima_get_option( 'dima_page_title_display' ) );
			$breadcrumbs_display = ( $breadcrumbs_display == '1' ) ? 'on' : 'off';
		}*/

		$breadcrumbs_display = dima_helper::dima_get_breadcrumbs_display();

		if ( $breadcrumbs_position != 'start' ) {
			$position = 'center';
		} else {
			$position = 'end';
		}

		$data_options = array(
			'bc_separator'                    => '/',
			'bc_show_categories'              => 'true',
			'disable_date_rich_snippet_pages' => 'true',
			'dima_page_type_op'               => $page_type,
			'breadcrumbs_display'             => $breadcrumbs_display,
			'breadcrumbs_position'            => $breadcrumbs_position,
			'breadcumbs_list_display'         => $breadcrumbs_list_display,
			'position_class'                  => $position
		);

		return $data_options;
	}

	public function dima_get_page_title_content( $post_id ) {

		$this->options = $this->dima_get_bc_options();
		$type          = $this->options['dima_page_type_op'];

		$title    = '';
		$subtitle = esc_attr( get_post_meta( $post_id, '_dima' . $type . 'breadcumbs_subtitle', true ) );

		if ( ! $title ) {
			$title = get_the_title();

			if ( is_search() ) {
				$title = sprintf( esc_html__( 'Search results for: %s', 'okab' ), get_search_query() );
			} elseif ( is_404() ) {
				$title = esc_html__( 'Error 404 Page', 'okab' );
			} elseif ( is_archive() && ! dima_helper::dima_is_bbpress() && ! is_search() ) {
				if ( is_day() ) {
					$title = sprintf( esc_html__( 'Daily Archives: %s', 'okab' ), '<span>' . get_the_date() . '</span>' );
				} else if ( is_month() ) {
					$title = sprintf( esc_html__( 'Monthly Archives: %s', 'okab' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'okab' ) ) . '</span>' );
				} elseif ( is_year() ) {
					$title = sprintf( esc_html__( 'Yearly Archives: %s', 'okab' ), '<span> ' . get_the_date( _x( 'Y', 'yearly archives date format', 'okab' ) ) . '</span>' );
				} elseif ( is_author() ) {
					$curauth = get_user_by( 'id', get_query_var( 'author' ) );
					$title   = $curauth->nickname;
				} elseif ( is_post_type_archive() ) {
					$title = post_type_archive_title( '', false );
				} else {
					$title = single_cat_title( '', false );
				}
			} elseif ( class_exists( 'WooCommerce' ) && ( dima_helper::dima_is_product() || dima_helper::dima_is_shop() ) && ! is_search() ) {
				if ( ! dima_helper::dima_is_product() ) {
					$title = woocommerce_page_title( false );
				}
			}
		}

		return array( $title, $subtitle );
	}


	public function dima_get_title_breadcrumb( $breadcrumbs_style ) {
		$post_id = get_queried_object_id();
		$title   = $this->dima_get_page_title_content( $post_id );
		global $dima_allowed_HTML_tags;
		if ( ! empty( $title[1] ) ) {
			return '<h1 class="undertitle text-' . esc_attr( $breadcrumbs_style ) . '">' . wp_kses( $title[0], $dima_allowed_HTML_tags ) . '</h1>
        	    <span class="dima-subtitle undertitle text-' . esc_attr( $breadcrumbs_style ) . '">' . esc_attr( $title[1] ) . '</span>';
		} else {
			return '<h1 class="undertitle text-' . esc_attr( $breadcrumbs_style ) . '">' . wp_kses( $title[0], $dima_allowed_HTML_tags ) . '</h1>';
		}
	}


	/**
	 * [dima_get_background_breadcrumb Add Background for All Page Title with options like parallax scrolling and more]
	 *
	 * @param $type
	 *
	 * @return string
	 */
	function dima_get_background_breadcrumb( $type ) {
		if ( ! is_archive() ) {
			$entry_id            = get_the_ID();
			$background_position = get_post_meta( $entry_id, '_dima' . $type . 'breadcumbs_image_style', true );

			$breadcrumbs_image = get_post_meta( $entry_id, '_dima' . $type . 'breadcumbs_image', true );
			if ( empty( $breadcrumbs_image ) ) {
				$breadcrumbs_image = esc_attr( dima_helper::dima_get_option( 'dima_breadcrumb_background_image' ) );
			}

			if ( ! empty( $breadcrumbs_image ) ) {
				switch ( $background_position ) {
					case 'fixed':
						$calss         = "background-image-hide background-cover fixed-parallax ";
						$parallax_data = 'data-bg-image="' . esc_url( $breadcrumbs_image ) . '"';
						break;
					case 'parallax':
						$calss         = "background-image-hide background-cover parallax-background";
						$parallax_data = 'data-bg-image="' . esc_url( $breadcrumbs_image ) . '"';
						break;
					default:
						$calss         = "background-image-hide background-cover";
						$parallax_data = 'data-bg-image="' . esc_url( $breadcrumbs_image ) . '"';
						break;
				}

				return '<div class="' . esc_attr( $calss ) . '" ' . $parallax_data . ' ">
                    </div>';
			} else {
				return '';
			}
		} else {
			return '';
		}
	}

	/**
	 * Get the full breadcrumb HTML markup
	 * @return void
	 */
	public function dima_get_breadcrumbs() {
		$this->options = $this->dima_get_bc_options();
		$display       = $this->options['breadcrumbs_display'];
		if ( $display != 'off' ) {

			// Get the Wordpres SEO options
			$options = get_option( 'wpseo_internallinks' );

			// Support for Yoast Breadcrumbs
			//class_exists( 'WPSEO_Breadcrumbs' )
			if ( function_exists( 'yoast_breadcrumb' ) &&
			     $options &&
			     $options['breadcrumbs-enable'] === true
			) {
				ob_start();
				yoast_breadcrumb();
				$this->html_output = ob_get_clean();

				// PixelDIma Breadcrumbs
			} else {
				$this->dima_initialize_bc_output();
			}

			$this->dima_external_breadcrumbs();
			echo $this->html_output;
		}
	}


	public function dima_get_title_breadcrumb_list( $position ) {
		$line    = '';
		$bc_list = $this->options['breadcumbs_list_display'];

		if ( $bc_list != 'on' ) {
			return null;
		}
		if ( $position == 'center' ) {
			$line = '<div class="topaz-line">
                  <i class="fa fa-stop"></i>
                </div>';
		}
		$output = '' . $line . ''
		          . '<div class="dima-breadcrumbs breadcrumbs-' . esc_attr( $position ) . ' text-' . esc_attr( $position ) . '">
						<span>%s</span>
					 </div>';

		return $output;
	}


	/**
	 * Initialize the markup of breadcrumb path
	 * @return void
	 */
	private function dima_initialize_bc_output() {
		/**
		 * Home path
		 */
		$this->html_output .= $this->dima_get_bc_home();

		/**
		 * woo path
		 */
		if ( dima_helper::dima_is_woo() && ( ( is_woocommerce() && is_archive() && ! dima_helper::dima_is_shop() ) || is_cart() || is_checkout() || is_account_page() ) ) {
			$this->html_output .= $this->dima_get_woo_shop_page();
		}

		/**
		 * bbPress path (okab 2.0)
		 */
		if ( dima_helper::dima_is_bbpress() && ( bbp_is_topic_archive() || bbp_is_single_user() || bbp_is_search() ) ) {
			$this->html_output .= $this->dima_get_bbpress_main_archive_page();
		}

		/**
		 * All Single Posts and Pages
		 */
		if ( is_singular() ) {

			// Post doesn't have parents
			if ( isset( $this->post->post_parent ) &&
			     $this->post->post_parent == 0
			) {
				$this->html_output .= $this->dima_get_post_terms();
			} else {
				$this->html_output .= $this->dima_get_post_ancestors();
			}

			$this->html_output .= $this->dima_get_crumb_html();
		} else {
			/**
			 * Archives path
			 */
			if ( is_post_type_archive() ) {
				$this->html_output .= $this->dima_get_post_archive_output( false );
				if ( is_search() ) {
					$this->html_output .= $this->dima_get_crumb_html( 'search' );
				}
			} elseif ( is_tax() || is_tag() || is_category() ) {
				if ( is_tag() ) {
					$this->html_output .= $this->tag_archive_text;
				}
				$this->html_output .= $this->dima_get_taxonomies();
				$this->html_output .= $this->dima_get_crumb_html( 'term' );
			} elseif ( is_date() ) {
				global $wp_locale;
				$year  = esc_html( get_query_var( 'year' ) );
				$month = $month_name = '';
				if ( is_month() ||
				     is_day()
				) {
					$month      = get_query_var( 'monthnum' );
					$month_name = $wp_locale->get_month( $month );
				}
				if ( is_year() ) {
					$this->html_output .= $this->dima_get_crumb_html( 'year' );
				} elseif ( is_month() ) {
					$this->html_output .= $this->dima_get_single_markup( $year, get_year_link( $year ) );
					$this->html_output .= $this->dima_get_crumb_html( 'month' );
				} elseif ( is_day() ) {
					$this->html_output .= $this->dima_get_single_markup( $year, get_year_link( $year ) );
					$this->html_output .= $this->dima_get_single_markup( $month_name, get_month_link( $year, $month ) );
					$this->html_output .= $this->dima_get_crumb_html( 'day' );
				}
			} elseif ( is_author() ) {
				$this->html_output .= $this->dima_get_crumb_html( 'author' );
			} elseif ( is_search() ) {
				$this->html_output .= $this->dima_get_crumb_html( 'search' );
			} elseif ( is_404() ) {
				$this->html_output .= $this->dima_get_crumb_html( '404' );
				//OKAB 2.0
			} elseif ( class_exists( 'bbPress' ) ) {
				if ( bbp_is_search() ) {
					$this->html_output .= $this->dima_get_crumb_html( 'bbpress_search' );
				} elseif ( bbp_is_single_user() ) {
					$this->html_output .= $this->dima_get_crumb_html( 'bbpress_user' );
				}
			}
		}
	}

	/**
	 * External breadcrumb HTML markup
	 */
	private function dima_external_breadcrumbs() {


		if ( $this->options['breadcrumbs_position'] != 'start' ) {
			$position = 'center';
		} else {
			$position = 'end';
		}
		$floating_output = '';
		$nav_positioning = dima_helper::dima_get_header_style();
		if ( dima_is_transparent_navigation() ) {
			$floating_output = 'dima-transparent-breadcrumbs ';
		}

		if ( $nav_positioning == 'floating' ) {
			$floating_output .= 'dima-floating-breadcrumbs ';
		}

		$this->html_output = sprintf( '
			<section class="title_container ' . $floating_output . $this->options['breadcrumbs_position'] . '-style' . '"' . '>
				<div class="page-section-content overflow-hidden">
					' . $this->dima_get_background_breadcrumb( $this->options['dima_page_type_op'] ) . '
					<div class="container page-section">
					' . $this->dima_get_title_breadcrumb( $this->options['breadcrumbs_position'] ) . '
					' . $this->dima_get_title_breadcrumb_list( $position ) . '
					</div>
				</div>
			</section>
			',
			$this->html_output );
	}

	/**
	 * Get the markup of the "Home" Link
	 * @return string
	 */
	private function dima_get_bc_home() {
		$home_link = "";
		if ( ! is_front_page() ) {
			$home_link = $this->dima_get_single_markup( $this->home_label, get_home_url() );
		} elseif ( is_home() ) {
			$home_link = $this->dima_get_single_markup( $this->options['blog_title'] );
		}

		return $home_link;
	}

	/**
	 * Construct the full post term tree path and add its HTML markup
	 */
	private function dima_get_post_terms() {
		$terms_markup = '';

		// Get the post terms
		if ( $this->post->post_type == 'post' ) {
			$taxonomy = 'category';
			// Dima Portfolio
		} elseif ( $this->post->post_type == 'dima-portfolio' ) {
			$taxonomy = 'portfolio-category';
			// Woocommerce
		} elseif ( $this->post->post_type == 'product' && class_exists( 'WooCommerce' ) ) {
			$taxonomy = 'product_cat';
			// For other post types don't return a terms tree to reduce possible errors
		} else {
			return $terms_markup;
		}

		$terms = wp_get_object_terms( $this->post->ID, $taxonomy );

		// If post does not have any terms assigned; possible e.g. portfolio posts
		if ( empty( $terms ) ) {
			return $terms_markup;
		}

		// Check if the terms are all part of one term tree, i.e. only related terms are selected
		$terms_by_id = array();
		foreach ( $terms as $term ) {
			$terms_by_id[ $term->term_id ] = $term;
		}

		// Unset all terms that are parents of some term
		foreach ( $terms as $term ) {
			unset( $terms_by_id[ $term->parent ] );
		}

		// If only one term is left, we have a single term tree
		if ( count( $terms_by_id ) == 1 ) {
			unset( $terms );
			$terms[0] = array_shift( $terms_by_id );
		}

		// The post is only in one term
		if ( count( $terms ) == 1 ) {

			$term_parent = $terms[0]->parent;

			// If the term has a parent we need its ancestors for a full tree
			if ( $term_parent ) {
				// Get space separated string of term tree in slugs
				$term_tree   = get_ancestors( $terms[0]->term_id, $taxonomy );
				$term_tree   = array_reverse( $term_tree );
				$term_tree[] = get_term( $terms[0]->term_id, $taxonomy );

				// Loop through the term tree
				foreach ( $term_tree as $term_id ) {
					// Get the term object by its slug
					$term_object = get_term( $term_id, $taxonomy );

					// Add it to the term breadcrumb markup string
					$terms_markup .= $this->dima_get_single_markup( $term_object->name, get_term_link( $term_object ) );
				}
				// We have a single term, so put it out
			} else {
				$terms_markup = $this->dima_get_single_markup( $terms[0]->name, get_term_link( $terms[0] ) );
			}
			// The post has multiple terms
		} else {
			// The lexicographically smallest term will be part of the breadcrump rich snippet path
			$terms_markup = $this->dima_get_single_markup( $terms[0]->name, get_term_link( $terms[0] ), false );
			// Drop the first index
			array_shift( $terms );

			// Loop through the rest of the terms, and add them to string comma separated
			$max_index = count( $terms );
			$i         = 0;
			foreach ( $terms as $term ) {

				// For the last index also add the separator
				if ( ++ $i == $max_index ) {
					$terms_markup .= ', ' . $this->dima_get_single_markup( $term->name, get_term_link( $term ), true );
				} else {
					$terms_markup .= ', ' . $this->dima_get_single_markup( $term->name, get_term_link( $term ), false );
				}
			}
		}

		return $terms_markup;
	}


	/**
	 * Get the full post of ancestors tree path.
	 * @return string : markup of ancestors tree
	 */
	private function dima_get_post_ancestors() {
		$ancestors_tree = '';

		// Array of IDs or empty if no ancestors are found.
		$post_ids = array_reverse( get_post_ancestors( $this->post ) );

		// get the full ancestors tree
		foreach ( $post_ids as $post_id ) {
			$post           = get_post( $post_id );
			$ancestors_tree .= $this->dima_get_single_markup( $post->post_title, get_permalink( $post->ID ) );
		}

		return $ancestors_tree;
	}

	/**
	 * Construct the full term ancestors tree path and add its HTML markup
	 * @return string The HTML markup of the term ancestors tree
	 */
	private function dima_get_taxonomies() {
		global $wp_query;
		//get the currently-queried object
		$term_opject  = $wp_query->get_queried_object();
		$terms_markup = '';

		if ( $term_opject->parent != 0 &&
		     is_taxonomy_hierarchical( $term_opject->taxonomy )
		) {
			$term_ancestors = get_ancestors( $term_opject->term_id, $term_opject->taxonomy );
			$term_ancestors = array_reverse( $term_ancestors );
			// Get the full tree
			foreach ( $term_ancestors as $term_ancestor ) {
				$term_object  = get_term( $term_ancestor, $term_opject->taxonomy );
				$terms_markup .= $this->dima_get_single_markup( $term_object->name, get_term_link( $term_object->term_id, $term_opject->taxonomy ) );
			}
		}

		return $terms_markup;
	}

	/**
	 * Get markup of a post type archive
	 *
	 * @param bool $linked
	 *
	 * @return string :HTML markup
	 */
	private function dima_get_post_archive_output( $linked = true ) {
		global $wp_query;

		$post_type        = $wp_query->query_vars['post_type'];
		$post_type_object = get_post_type_object( $post_type );
		$link             = $archive_title = '';

		if ( is_object( $post_type_object ) ) {
			if (
				$post_type == 'product'
				&& $woocommerce_shop_page = $this->dima_get_woo_shop_page( $linked )
			) {
				return $woocommerce_shop_page;
			}

			// bbPress: okab 2.0
			if ( class_exists( 'bbPress' ) &&
			     $post_type == 'topic'
			) {
				$archive_title = bbp_get_forum_archive_title();
				if ( $linked ) {
					$link = get_post_type_archive_link( bbp_get_forum_post_type() );
				}

				return $this->dima_get_single_markup( $archive_title, $link );
			}

			if ( isset( $post_type_object->label ) &&
			     $post_type_object->label !== ''
			) {
				$archive_title = $post_type_object->label;
			} elseif ( isset( $post_type_object->labels->menu_name ) &&
			           $post_type_object->labels->menu_name !== ''
			) {
				$archive_title = $post_type_object->labels->menu_name;
			} else {
				$archive_title = $post_type_object->name;
			}
		}

		// linked breadcrumb
		if ( $linked ) {
			$link = get_post_type_archive_link( $post_type );
		}

		return $this->dima_get_single_markup( $archive_title, $link );
	}

	/**
	 * Adds  markup for woocommerce shop page
	 *
	 * @param bool $linked
	 *
	 * @return string
	 */
	private function dima_get_woo_shop_page( $linked = true ) {
		$post_type        = 'product';
		$post_type_object = get_post_type_object( $post_type );
		$woo_page_markup  = $link = '';
		// if it's woocommerce page

		if ( is_object( $post_type_object ) &&
		     dima_helper::dima_is_woo() &&
		     dima_helper::dima_is_woo_pages()
		) {
			// Get shop page name
			$shop_page_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';

			if ( ! $shop_page_name ) {
				$shop_page_name = $post_type_object->labels->name;
			}

			// linked breadcrumb
			if ( $linked ) {
				$link = get_post_type_archive_link( $post_type );
			}

			$woo_page_markup = $this->dima_get_single_markup( $shop_page_name, $link );
		}

		return $woo_page_markup;
	}


	/**
	 * Adds the markup of the breadcrumb leaf
	 *
	 * @param string $type
	 *
	 * @return string
	 */
	private function dima_get_crumb_html( $type = '' ) {
		global $wp_query, $wp_locale;

		switch ( $type ) {
			case 'term':
				$term  = $wp_query->get_queried_object();
				$title = $term->name;
				break;
			case 'day':
				$title = get_query_var( 'day' );
				break;
			case 'month':
				$title = $wp_locale->get_month( get_query_var( 'monthnum' ) );
				break;
			case 'year':
				$title = esc_html( get_query_var( 'year' ) );
				break;
			case 'author':
				$user  = $wp_query->get_queried_object();
				$title = $user->display_name;
				break;
			case 'search':
				$title = sprintf( '%s %s', $this->search_text, esc_html( get_search_query() ) );
				break;
			case '404':
				$title = $this->error_text;
				break;
			/* okab 2.0*/
			case 'bbpress_search':
				$title = sprintf( '%s %s', $this->search_text, esc_html( get_query_var( 'bbp_search' ) ) );
				break;
			case 'bbpress_user':
				$current_user = wp_get_current_user();
				$title        = $current_user->user_nicename;
				break;
			default:
				$title = get_the_title( $this->post->ID );
				break;
		}

		return sprintf( '<span class="breadcrumb-leaf">%s</span>', $title );
	}

	/**
	 * Adds the markup of a single breadcrumb
	 *
	 * @param $title : The title that should be displayed
	 * @param string $link : The URL of the breadcrumb
	 * @param bool $separator :Set to TRUE to show the separator at the end of the breadcrumb
	 *
	 * @return string
	 */
	private function dima_get_single_markup( $title, $link = '', $separator = true ) {
		$separator_markup = '';
		$bc_content       = sprintf( '<span>%s</span>', $title );
		if ( $link ) {
			$bc_content = sprintf( '<a href="' . esc_url( rawurldecode( $link ) ) . '">%s</a>', $bc_content );
		}
		if ( $separator ) {
			$separator_markup = sprintf( '<span class="sep">%s</span>', $this->separator );
		}

		return sprintf( '<span>%s</span>%s', $bc_content, $separator_markup );
	}

	/**
	 * (OKAB 2.0)
	 * Adds the markup of the bbpress main forum archive
	 * @return string The HTML markup of the bbpress main forum archive
	 */
	private function dima_get_bbpress_main_archive_page() {
		//return $this->dima_get_single_markup( bbp_get_forum_archive_title(), get_post_type_archive_link( 'forum' ) );
	}


}

if ( ! function_exists( 'dima_breadcrumbs' ) ) {
	/**
	 * Render the breadcrumbs
	 * @return void
	 */

	function dima_breadcrumbs() {
		$breadcrumbs = new dima_Breadcrumbs_Class();
		$breadcrumbs->dima_get_breadcrumbs();
	}
}