<?php
/**
 * OKAB  Walekr nav menu
 *
 * @package Dima Framework
 * @subpackage Functions
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */


/**
 * Class DIMA_Walker_Nav_Menu
 * Example: dima-mega-menu col-3
 */
if ( ! class_exists( 'DIMA_Walker_Nav_Menu' ) ) {
	class DIMA_Walker_Nav_Menu extends Walker_Nav_Menu {

		private $is_megamenu = "";
		private $columns = 6;
		private $dima_megamenu_title = '';
		private $dima_megamenu_icon = '';
		private $dima_megamenu_style = '';
		private $dima_megamenu_textclass = '';
		private $dima_megamenu_background = '';
		private $is_mobile = 6;

		public function __construct( $is_mobile ) {
			$this->is_mobile = $is_mobile;
		}

		/**
		 * If submenu add class sub-icon to display the arrow icon on the item
		 *
		 * @param object $element
		 * @param array $children_elements
		 * @param int $max_depth
		 * @param int $depth
		 * @param array $args
		 * @param string $output
		 */
		function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
			$id_field = $this->db_fields['id'];
			if ( ! empty( $children_elements[ $element->$id_field ] ) ) {
				$element->classes[] = 'sub-icon';
			}
			Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );

			$icon             = '';
			$icon_rtl         = '';
			$prepend          = '';
			$append           = '';
			$image            = '';
			$disable_megamenu = false;

			$this->dima_megamenu_background = get_post_meta( $item->ID, '_dima_megamenu_item_background', true );
			if ( $this->dima_megamenu_background != "" ) {
				$image_id = attachment_url_to_postid( $this->dima_megamenu_background );
				list( $this->dima_megamenu_background, $background_width, $background_height ) = wp_get_attachment_image_src( $image_id, "full" );
				$image = "<span class='custom-item-{$item->ID} dima-custom-item-image'><img src='" . esc_url( $this->dima_megamenu_background ) . "' alt='" . apply_filters( 'the_title', $item->title, $item->ID ) . "' width='" . esc_attr( $background_width ) . "' height='" . esc_attr( $background_height ) . "' /></span>";
			}

			$depth_classes     = array(
				( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
				'menu-item-depth-' . $depth
			);
			$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

			// Passed classes.
			$classes                       = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names                   = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
			$this->dima_megamenu_style     = esc_attr( get_post_meta( $item->ID, '_dima_megamenu_item_style', true ) );
			$this->dima_megamenu_textclass = esc_attr( get_post_meta( $item->ID, '_dima_megamenu_item_textclass', true ) );

			if ( ! $disable_megamenu ) {

				if ( $depth === 0 ) {
					$this->is_megamenu = get_post_meta( $item->ID, '_dima_megamenu_item_ismega', true );
					$this->columns     = get_post_meta( $item->ID, '_dima_megamenu_item_columns', true );

					if ( $this->is_megamenu == "enabled" ) {
						$class_names .= " dima-mega-menu col-" . $this->columns . "";
					}
					$this->dima_megamenu_title = get_post_meta( $item->ID, '_dima_megamenu_item_title', true );

				}

				$this->dima_megamenu_icon = get_post_meta( $item->ID, '_dima_megamenu_item_icon', true );


			} else {
				$this->is_megamenu        = 'disabled';
				$this->dima_megamenu_icon = get_post_meta( $item->ID, '_dima_megamenu_item_icon', true );
			}
			//add icon
			if ( $this->dima_megamenu_icon != "" ) {
				if ( ! is_rtl() ) {
					$icon     = do_shortcode( '[icon class="' . esc_attr( $this->dima_megamenu_icon ) . '"]' );
					$icon_rtl = "";
				} else {
					$icon_rtl = do_shortcode( '[icon class="' . esc_attr( $this->dima_megamenu_icon ) . '"]' );
					$icon     = '';
				}
			}

			if ( $depth === 1 && $this->is_megamenu == "enabled" ) {
				$menu_id = '';
				if ( ! $this->is_mobile ) {
					$menu_id = 'id="nav-menu-item-' . $item->ID . '"';
				}
				$output .= $indent . '<li ' . $menu_id . ' class="dima-megamenu-item ' . $depth_class_names . ' ' . $class_names . '">';

				$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
				$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
				$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
				$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
				$attributes .= '';

				if ( $this->dima_megamenu_title != 'disabled' ) {
					$output .= '<a class="dima-menu-title">' . $icon;
					$output .= $args->link_before . $prepend . apply_filters( 'the_title', $this->_parse_string( $item->title ), $item->ID ) . $append;
					$output .= $args->link_after;
					$output .= $icon_rtl . '</a>';
				} else {
					$output .= '<a' . $attributes . '>' . $icon;
					$output .= $args->link_before . $prepend . apply_filters( 'the_title', $this->_parse_string( $item->title ), $item->ID ) . $append;
					$output .= $args->link_after;
					$output .= $icon_rtl . '</a>';

				}
				$item_output = is_object( $args ) ? $args->after : '';
				// Build HTML output and pass through the proper filter.
				$output .= apply_filters( 'DIMA_Walker_Nav_Menu', $item_output, $item, $depth, $args );

			} else {
				// Build HTML.
				$menu_id = '';
				if ( ! $this->is_mobile ) {
					$menu_id = 'id="nav-menu-item-' . $item->ID . '"';
				}

				$output .= $indent . '<li ' . $menu_id . ' class="' . $depth_class_names . ' ' . $class_names . '">';
				$classes = '';

				// Link attributes.
				$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
				$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
				$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
				$attributes .= ! empty( $item->url ) ? ' href="' . esc_url( $item->url ) . '"' : '';
				$attributes .= '';

				if ( $depth === 0 ) {
					$classes .= $this->dima_megamenu_textclass . ' ';
					if ( $this->dima_megamenu_style ) {
						$classes .= sprintf( 'dima-menu-span dima-button fill %s', str_replace( 'fusion-', '', $this->dima_megamenu_style ) );
					} else {
						$classes .= 'dima-menu-span';
					}

					$item_output_before = sprintf( '<span class="%s">', $classes );
					$item_output_after  = '</span>';
					// Normal menu item
				} else {
					$item_output_before = sprintf( '<span class="%s">', $classes );
					$item_output_after  = '</span>';
				}
				$args = (object) $args;
				$output .= '<a' . $attributes . '>';
				$output .= $args->link_before . $item_output_before . $icon . apply_filters( 'the_title', $this->_parse_string( $item->title ), $item->ID ) . $icon_rtl . $item_output_after;
				$output .= $args->link_after;
				$output .= '</a>' . $image;


				$item_output = is_object( $args ) ? $args->after : '';

				// Build HTML output and pass through the proper filter.
				$output .= apply_filters( 'DIMA_Walker_Nav_Menu', $item_output, $item, $depth, $args );
			}
		}

		/**
		 * @param $string
		 *
		 * @return string
		 */
		protected function _parse_string( $string ) {
			return nl2br( $string );
		}

	}
}

/**
 * Get One Page Navigation Menu
 */
if ( ! function_exists( 'dima_get_one_page_navigation_menu' ) ) :
	/**
	 * Get One Page Navigation Menu
	 * @return mixed|string
	 */
	function dima_get_one_page_navigation_menu() {

		$meta = get_post_meta( get_the_ID(), '_dima_one_page_navigation', true );

		$menu = ( $meta == 'Off' ) ? 'off' : $meta;

		return $menu;

	}
endif;

if ( ! function_exists( 'dima_is_one_page_navigation' ) ) :
	function dima_is_one_page_navigation() {

		$one_page_navigation = dima_get_one_page_navigation_menu();
		if ( $one_page_navigation == 'off' || $one_page_navigation == '' ) {
			$output = false;
		} else {
			$output = true;
		}

		return $output;

	}
endif;

if ( ! function_exists( 'dima_is_transparent_navigation' ) ) :
	function dima_is_transparent_navigation() {
		$is_transparent_menu = "off";
		if ( is_singular( 'page' ) ) {
			$is_transparent_menu = get_post_meta( get_the_ID(), '_dima_page_transparent_menu', true );
		} elseif ( is_singular( 'post' ) ) {
			$is_transparent_menu = get_post_meta( get_the_ID(), '_dima_post_transparent_menu', true );
		} elseif ( is_singular( 'dima-portfolio' ) ) {
			$is_transparent_menu = get_post_meta( get_the_ID(), '_dima_portfolio_transparent_menu', true );
		}

		$transparent_navigation = dima_helper::dima_get_option( 'dima_header_navbar_transparent' );

		if ( $transparent_navigation == '1' || $is_transparent_menu == 'on' ) {
			$output = true;
		} else {
			$output = false;
		}

		return $output;

	}
endif;


/**
 * Get Navbar Positioning
 */
if ( ! function_exists( 'dima_get_header_positioning' ) ):
	function dima_get_header_positioning() {
		$output = dima_helper::dima_get_header_style();

		return $output;
	}

	add_action( 'customize_save', 'dima_get_header_positioning' );
endif;

/**
 * Get Navbar animation
 */
if ( ! function_exists( 'dima_get_header_animation' ) ):
	function dima_get_header_animation() {
		$menu_model = dima_get_header_positioning();

		//avoid side menu with animation
		if ( $menu_model == 'fixed-left' || $menu_model == 'fixed-right' ) {
			$output = '';
		} else {
			$output = dima_helper::dima_get_option( 'dima_header_navbar_animation' );
		}

		return $output;
	}

	add_action( 'customize_save', 'dima_get_header_animation' );
endif;


// Get Logo and Navigation Layout
// =============================================================================

if ( ! function_exists( 'dima_get_logo_positioning' ) ):
	function dima_get_logo_positioning() {
		return dima_helper::dima_get_option( 'dima_logo_position' );
	}
endif;

/**
 * Output Primary Navigation
 */
if ( ! function_exists( 'dima_output_primary_navigation' ) ):
	function dima_output_primary_navigation( $is_mobile = false ) {
		if ( dima_is_one_page_navigation() ) {
			wp_nav_menu( array(
				'menu'           => dima_get_one_page_navigation_menu(),
				'theme_location' => 'primary',
				'depth'          => 0,
				'container'      => false,
				'menu_class'     => 'dima-nav',
				'echo'           => true,
				'before'         => '',
				'after'          => '',
				'link_before'    => '',
				'link_after'     => '',
				'walker'         => new DIMA_Walker_Nav_Menu( $is_mobile ),
			) );
		} elseif ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'depth'          => 0,
				'container'      => false,
				'menu_class'     => 'dima-nav',
				'echo'           => true,
				'before'         => '',
				'after'          => '',
				'link_before'    => '',
				'link_after'     => '',
				'walker'         => new DIMA_Walker_Nav_Menu( $is_mobile ),
			) );
		} else {
			echo '<ul class="dima-nav-end"><li><a href="' . esc_url( home_url( '/' ) ) . 'wp-admin/nav-menus.php">Assign a Menu</a>
        </li>';
		}
	}
endif;

/**
 * Navbar Search Navigation Item
 */
if ( ! function_exists( 'dima_navbar_search_li' ) ) :
	/**
	 * @param $items
	 * @param $args
	 *
	 * @return string
	 */
	$logo_position = dima_get_logo_positioning();

	function dima_navbar_search_li( $items, $args ) {
		$is_search_active = dima_helper::dima_get_option( 'dima_header_search_enable' ) == '1';
		$search_class     = "";
		if ( $is_search_active ) {
			$search_class = " add-border";
		}
		if ( $args->theme_location == 'primary' ) {
			$items .= '<li><ul class="dima-nav-end' . $search_class . '">';
			if ( $is_search_active ) {
				$items .= '<li class="search-btn">'
				          . '<a  href="#"><i class="fa fa-search"></i></a>'
				          . '</li>';
			}
			if ( DIMA_WC_IS_ACTIVE && dima_helper::dima_get_option( 'dima_shop_menu' ) == '1' ) {
				$items .= dima_wc_navbar_cart();
			}
			$items .= '</ul></li>';
		}

		return $items;
	}

	function dima_navbar_search_li_top( $items, $args ) {
		$is_search_active = dima_helper::dima_get_option( 'dima_header_search_enable' ) == '1';

		if ( $args->theme_location == 'primary' ) {
			if ( $is_search_active ) {
				$items .= '<li class="search-btn">'
				          . '<a  href="#"><i class="fa fa-search"></i></a>'
				          . '</li>';
			}
			if ( DIMA_WC_IS_ACTIVE && dima_helper::dima_get_option( 'dima_shop_menu' ) == '1' ) {
				$items .= dima_wc_navbar_cart();
			}
		}

		return $items;
	}

	if ( $logo_position == "logo-on-top" || $logo_position == "logo-on-center" ) {
		add_filter( 'wp_nav_menu_items', 'dima_navbar_search_li_top', 9998, 2 );
	} else {
		add_filter( 'wp_nav_menu_items', 'dima_navbar_search_li', 9998, 2 );
	}
endif;