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


if ( ! defined( 'ABSPATH' ) ) {
	die;
}
/**
 * Add custom fields
 */
add_action( 'wp_nav_menu_item_custom_fields', 'dima_megamenu_fields', 20, 4 );

function dima_megamenu_fields( $item_id, $item ) {
	?>
	<div class="clear"></div>

	<p class="dima-megamenu-icon description description-wide">
		<label for="target-menu-item-megamenu-icon-<?php echo esc_attr( $item_id ); ?>">
			<?php esc_html_e( 'Menu Icon (Use font awesome or simple line icons name)', 'okab' ); ?>
			<input type="text" id="target-menu-item-megamenu-icon-<?php echo esc_attr( $item_id ); ?>"
			       class="widefat code target-menu-item-megamenu-icon"
			       name="menu-item-dima-mega-menu-icon[<?php echo esc_attr( $item_id ); ?>]"
			       value="<?php echo esc_attr( $item->dima_menu_item_icon ); ?>"/>
		</label>
	</p>

	<p class="dima-megamenu-textclass description description-wide">
		<label for="target-menu-item-megamenu-textclass-<?php echo esc_attr( $item_id ); ?>">
			<?php esc_html_e( 'Text Clasess', 'okab' ); ?>
			<input type="text" id="target-menu-item-megamenu-textclass-<?php echo esc_attr( $item_id ); ?>"
			       class="widefat code target-menu-item-megamenu-textclass"
			       name="menu-item-dima-mega-menu-textclass[<?php echo esc_attr( $item_id ); ?>]"
			       value="<?php echo esc_attr( $item->dima_menu_item_textclass ); ?>"/>
		</label>
	</p>

	<p class="description description-wide fusion-menu-style">
		<label for="target-menu-item-megamenu-style-<?php echo esc_attr( $item_id ); ?>">
			<?php esc_html_e( 'Menu First Level Style', 'okab' ); ?><br/>
			<select id="target-menu-item-megamenu-style-<?php echo esc_attr( $item_id ); ?>"
			        class="widefat edit-menu-item-target"
			        name="menu-item-dima-mega-menu-style[<?php echo esc_attr( $item_id ); ?>]">
				<option
					value="" <?php selected( $item->dima_menu_item_style, '' ); ?>><?php esc_html_e( 'Default Style', 'okab' ); ?></option>
				<option
					value="dima-btn-mini" <?php selected( $item->dima_menu_item_style, 'dima-btn-mini' ); ?> ><?php esc_html_e( 'Button Mini', 'okab' ); ?></option>
				<option
					value="dima-btn-small" <?php selected( $item->dima_menu_item_style, 'dima-btn-small' ); ?> ><?php esc_html_e( 'Button Small', 'okab' ); ?></option>
				<option
					value="dima-btn-large" <?php selected( $item->dima_menu_item_style, 'dima-btn-large' ); ?> ><?php esc_html_e( 'Button Large', 'okab' ); ?></option>
				<option
					value="dima-btn-big" <?php selected( $item->dima_menu_item_style, 'dima-btn-big' ); ?> ><?php esc_html_e( 'Button Big', 'okab' ); ?></option>
				<option
					value="dima-btn-huge" <?php selected( $item->dima_menu_item_style, 'dima-btn-huge' ); ?> ><?php esc_html_e( 'Button Huge', 'okab' ); ?></option>
			</select>
		</label>
	</p>

	<div class="dima-megamenu-options">

		<p class="dima-megamenu-ismega description description-wide">
			<label for="target-menu-item-megamenu-ismega-<?php echo esc_attr( $item_id ); ?>">
				<input type="checkbox" id="target-menu-item-megamenu-ismega-<?php echo esc_attr( $item_id ); ?>"
				       class="widefat code target-menu-item-megamenu-ismega"
				       name="menu-item-dima-mega-menu-ismega[<?php echo esc_attr( $item_id ); ?>]"
				       value="enabled" <?php checked( $item->dima_megamenu_ismega, 'enabled' ); ?> />
				<strong><?php esc_html_e( 'Enable OKAB Mega Menu', 'okab' ); ?></strong>
			</label>
		</p>

		<p class="dima-megamenu-title description description-wide">
			<label for="target-menu-item-megamenu-title-<?php echo esc_attr( $item_id ); ?>">
				<input type="checkbox" id="target-menu-item-megamenu-title-<?php echo esc_attr( $item_id ); ?>"
				       class="widefat code target-menu-item-megamenu-title"
				       name="menu-item-dima-mega-menu-title[<?php echo esc_attr( $item_id ); ?>]"
				       value="disabled" <?php checked( $item->dima_megamenu_title, 'disabled' ); ?> />
				<?php esc_html_e( 'Disable MegaMenu Title', 'okab' ); ?>
			</label>
		</p>

		<p class="dima-megamenu-columns description description-thin">
			<label for="target-menu-item-megamenu-columns-<?php echo esc_attr( $item_id ); ?>">
				<?php esc_html_e( 'Mega Menu Columns', 'okab' ); ?>
				<select id="target-menu-item-megamenu-columns-<?php echo esc_attr( $item_id ); ?>"
				        class="widefat code target-menu-item-megamenu-columns"
				        name="menu-item-dima-mega-menu-columns[<?php echo esc_attr( $item_id ); ?>]">
					<option value="1" <?php selected( $item->dima_megamenu_columns, '1' ); ?>>1</option>
					<option value="2" <?php selected( $item->dima_megamenu_columns, '2' ); ?>>2</option>
					<option value="3" <?php selected( $item->dima_megamenu_columns, '3' ); ?>>3</option>
					<option value="4" <?php selected( $item->dima_megamenu_columns, '4' ); ?>>4</option>
					<option value="5" <?php selected( $item->dima_megamenu_columns, '5' ); ?>>5</option>
					<option value="6" <?php selected( $item->dima_megamenu_columns, '6' ); ?>>6</option>
				</select>
			</label>
		</p>

		<div class="clear"></div>

		<a href="#" id="dima-media-upload-<?php echo esc_attr( $item_id ); ?>"
		   class="dima-open-media button button-secondary dima-megamenu-upload-background"><?php esc_html_e( 'Set MegaMenu Background', 'okab' ); ?></a>

		<p class="dima-megamenu-background description description-wide">
			<label for="target-menu-item-megamenu-background-<?php echo esc_attr( $item_id ); ?>">
				<input type="hidden" id="target-menu-item-megamenu-background-<?php echo esc_attr( $item_id ); ?>"
				       class="widefat code target-menu-item-megamenu-background"
				       name="menu-item-dima-mega-menu-background[<?php echo esc_attr( $item_id ); ?>]"
				       value="<?php echo esc_url( $item->dima_megamenu_background ); ?>"/>
				<img src="<?php echo esc_url( $item->dima_megamenu_background ); ?>"
				     id="dima-media-img-<?php echo esc_attr( $item_id ); ?>"
				     class="dima-megamenu-background"/>
				<a href="#" id="dima-media-remove-<?php echo esc_attr( $item_id ); ?>"
				   class="dima-remove-megamenu-background"
				>Remove Image</a>
			</label>
		</p>

	</div>

	<?php
}

if ( ! class_exists( 'DimaMainMegaMenus' ) ) {

	/**
	 * Class DimaMainMegaMenus
	 * Custom walker function
	 */
	class DimaMainMegaMenus extends Walker_Nav_Menu {
		/**
		 * @param string $output Passed by reference.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param array $args Not used.
		 */
		function start_lvl( &$output, $depth = 0, $args = array() ) {
		}

		/**
		 * @param string $output Passed by reference.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param array $args Not used.
		 */
		function end_lvl( &$output, $depth = 0, $args = array() ) {
		}

		/**
		 * Element output.
		 *
		 * @param string $output
		 * @param object $item
		 * @param int $depth
		 * @param array $args
		 * @param int $id
		 */
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $_wp_nav_menu_max_depth;
			$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;
			ob_start();
			$item_id      = $item->ID;
			$removed_args = array(
				'action',
				'customlink-tab',
				'target-menu-item',
				'menu-item',
				'page-tab',
				'_wpnonce',
			);

			$original_title = '';
			if ( 'taxonomy' == $item->type ) {
				$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
				if ( is_wp_error( $original_title ) ) {
					$original_title = false;
				}
			} elseif ( 'post_type' == $item->type ) {
				$original_object = get_post( $item->object_id );
				$original_title  = get_the_title( $original_object->ID );
			}

			$classes = array(
				'menu-item menu-item-depth-' . $depth,
				'menu-item-' . esc_attr( $item->object ),
				'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && esc_attr( $item_id ) == $_GET['edit-menu-item'] ) ? 'active' : 'inactive' ),
			);

			$title = $item->title;

			if ( ! empty( $item->_invalid ) ) {
				$classes[] = 'menu-item-invalid';
				/* translators: %s: title of menu item which is invalid */
				$title = sprintf( esc_html__( '%s (Invalid)', 'okab' ), $item->title );
			} elseif ( isset( $item->post_ismega ) && 'draft' == $item->post_ismega ) {
				$classes[] = 'pending';
				/* translators: %s: title of menu item in draft ismega */
				$title = sprintf( esc_html__( '%s (Pending)', 'okab' ), $item->title );
			}

			$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

			$submenu_text = '';
			if ( 0 == $depth ) {
				$submenu_text = 'style="display: none;"';
			}

			?>
		<li id="menu-item-<?php echo esc_attr( $item_id ); ?>" class="<?php echo implode( ' ', $classes ); ?>">
			<dl class="menu-item-bar">
				<dt class="menu-item-handle">
					<span class="item-title"><span
							class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span
							class="is-submenu" <?php echo $submenu_text; ?>><?php esc_html_e( 'sub item', 'okab' ); ?></span></span>
					<span class="item-controls">
							<span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
							<span class="item-order hide-if-js">
								<a href="<?php
								echo esc_url( wp_nonce_url(
									add_query_arg(
										array(
											'action'    => 'move-up-menu-item',
											'menu-item' => esc_attr( $item_id ),
										),
										remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								) );
								?>" class="item-move-up"><abbr title="<?php esc_attr_e( 'Move up', 'okab' ); ?>">
										&#8593;</abbr></a>
								|
								<a href="<?php
								echo esc_url( wp_nonce_url(
									add_query_arg(
										array(
											'action'    => 'move-down-menu-item',
											'menu-item' => esc_attr( $item_id ),
										),
										remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								) );
								?>" class="item-move-down"><abbr title="<?php esc_attr_e( 'Move down', 'okab' ); ?>">
										&#8595;</abbr></a>
							</span>
							<a class="item-edit" id="target-<?php echo esc_attr( $item_id ); ?>"
							   title="<?php esc_attr_e( 'Edit Menu Item', 'okab' ); ?>" href="<?php
							echo esc_url( ( isset( $_GET['target-menu-item'] ) && esc_attr( $item_id ) == $_GET['target-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'target-menu-item', esc_attr( $item_id ), remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . esc_attr( $item_id ) ) ) ) );
							?>"><?php esc_html_e( 'Edit Menu Item', 'okab' ); ?></a>
						</span>
				</dt>
			</dl>

			<div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr( $item_id ); ?>">
				<?php if ( 'custom' == $item->type ) : ?>
					<p class="field-url description description-wide">
						<label for="target-menu-item-url-<?php echo esc_attr( $item_id ); ?>">
							<?php esc_html_e( 'URL', 'okab' ); ?><br/>
							<input type="text" id="target-menu-item-url-<?php echo esc_attr( $item_id ); ?>"
							       class="widefat code target-menu-item-url"
							       name="menu-item-url[<?php echo esc_attr( $item_id ); ?>]"
							       value="<?php echo esc_attr( $item->url ); ?>"/>
						</label>
					</p>
				<?php endif; ?>
				<p class="description description-thin">
					<label for="target-menu-item-title-<?php echo esc_attr( $item_id ); ?>">
						<?php esc_html_e( 'Navigation Label', 'okab' ); ?><br/>
						<input type="text" id="target-menu-item-title-<?php echo esc_attr( $item_id ); ?>"
						       class="widefat target-menu-item-title"
						       name="menu-item-title[<?php echo esc_attr( $item_id ); ?>]"
						       value="<?php echo esc_attr( $item->title ); ?>"/>
					</label>
				</p>
				<p class="description description-thin">
					<label for="target-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>">
						<?php esc_html_e( 'Title Attribute', 'okab' ); ?><br/>
						<input type="text" id="target-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>"
						       class="widefat target-menu-item-attr-title"
						       name="menu-item-attr-title[<?php echo esc_attr( $item_id ); ?>]"
						       value="<?php echo esc_attr( $item->post_excerpt ); ?>"/>
					</label>
				</p>
				<p class="field-link-target description">
					<label for="target-menu-item-target-<?php echo esc_attr( $item_id ); ?>">
						<input type="checkbox" id="target-menu-item-target-<?php echo esc_attr( $item_id ); ?>"
						       value="_blank"
						       name="menu-item-target[<?php echo esc_attr( $item_id ); ?>]"<?php checked( $item->target, '_blank' ); ?> />
						<?php esc_html_e( 'Open link in a new window/tab', 'okab' ); ?>
					</label>
				</p>
				<p class="field-css-classes description description-thin">
					<label for="target-menu-item-classes-<?php echo esc_attr( $item_id ); ?>">
						<?php esc_html_e( 'CSS Classes (optional)', 'okab' ); ?><br/>
						<input type="text" id="target-menu-item-classes-<?php echo esc_attr( $item_id ); ?>"
						       class="widefat code target-menu-item-classes"
						       name="menu-item-classes[<?php echo esc_attr( $item_id ); ?>]"
						       value="<?php echo esc_attr( implode( ' ', $item->classes ) ); ?>"/>
					</label>
				</p>
				<p class="field-xfn description description-thin">
					<label for="target-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>">
						<?php esc_html_e( 'Link Relationship (XFN)', 'okab' ); ?><br/>
						<input type="text" id="target-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>"
						       class="widefat code target-menu-item-xfn"
						       name="menu-item-xfn[<?php echo esc_attr( $item_id ); ?>]"
						       value="<?php echo esc_attr( $item->xfn ); ?>"/>
					</label>
				</p>
				<p class="field-description description description-wide">
					<label for="target-menu-item-description-<?php echo esc_attr( $item_id ); ?>">
						<?php esc_html_e( 'Description', 'okab' ); ?><br/>
						<textarea id="target-menu-item-description-<?php echo esc_attr( $item_id ); ?>"
						          class="widefat target-menu-item-description" rows="3" cols="20"
						          name="menu-item-description[<?php echo esc_attr( $item_id ); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
						<span
							class="description"><?php esc_html_e( 'The description will be displayed in the menu if the current theme supports it.', 'okab' ); ?></span>
					</label>
				</p>

				<?php do_action( 'wp_nav_menu_item_custom_fields', esc_attr( $item_id ), $item, $depth, $args ); ?>

				<p class="field-move hide-if-no-js description description-wide">
					<label>
						<span><?php esc_html_e( 'Move', 'okab' ); ?></span>
						<a href="#" class="menus-move menus-move-up"
						   data-dir="up"><?php esc_html_e( 'Up one', 'okab' ); ?></a>
						<a href="#" class="menus-move menus-move-down"
						   data-dir="down"><?php esc_html_e( 'Down one', 'okab' ); ?></a>
						<a href="#" class="menus-move menus-move-left" data-dir="left"></a>
						<a href="#" class="menus-move menus-move-right" data-dir="right"></a>
						<a href="#" class="menus-move menus-move-top"
						   data-dir="top"><?php esc_html_e( 'To the top', 'okab' ); ?></a>
					</label>
				</p>

				<div class="menu-item-actions description-wide submitbox">
					<?php if ( 'custom' != $item->type && $original_title !== false ) : ?>
						<p class="link-to-original">
							<?php printf( esc_html__( 'Original: %s', 'okab' ), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
						</p>
					<?php endif; ?>
					<a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr( $item_id ); ?>"
					   href="<?php
					   echo esc_url( wp_nonce_url(
						   add_query_arg(
							   array(
								   'action'    => 'delete-menu-item',
								   'menu-item' => esc_attr( $item_id ),
							   ),
							   admin_url( 'nav-menus.php' )
						   ),
						   'delete-menu_item_' . esc_attr( $item_id )
					   ) ); ?>"><?php esc_html_e( 'Remove', 'okab' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a
						class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_attr( $item_id ); ?>"
						href="<?php echo esc_url( add_query_arg( array(
							'target-menu-item' => esc_attr( $item_id ),
							'cancel'           => time()
						), admin_url( 'nav-menus.php' ) ) );
						?>#menu-item-settings-<?php echo esc_attr( $item_id ); ?>"><?php esc_html_e( 'Cancel', 'okab' ); ?></a>
				</div>

				<input class="menu-item-data-db-id" type="hidden"
				       name="menu-item-db-id[<?php echo esc_attr( $item_id ); ?>]"
				       value="<?php echo esc_attr( $item_id ); ?>"/>
				<input class="menu-item-data-object-id" type="hidden"
				       name="menu-item-object-id[<?php echo esc_attr( $item_id ); ?>]"
				       value="<?php echo esc_attr( $item->object_id ); ?>"/>
				<input class="menu-item-data-object" type="hidden"
				       name="menu-item-object[<?php echo esc_attr( $item_id ); ?>]"
				       value="<?php echo esc_attr( $item->object ); ?>"/>
				<input class="menu-item-data-parent-id" type="hidden"
				       name="menu-item-parent-id[<?php echo esc_attr( $item_id ); ?>]"
				       value="<?php echo esc_attr( $item->menu_item_parent ); ?>"/>
				<input class="menu-item-data-position" type="hidden"
				       name="menu-item-position[<?php echo esc_attr( $item_id ); ?>]"
				       value="<?php echo esc_attr( $item->menu_order ); ?>"/>
				<input class="menu-item-data-type" type="hidden"
				       name="menu-item-type[<?php echo esc_attr( $item_id ); ?>]"
				       value="<?php echo esc_attr( $item->type ); ?>"/>
			</div>
			<ul class="menu-item-transport"></ul>


			<?php
			$output .= ob_get_clean();
		}
	}

}


// Don't duplicate me!
if ( ! class_exists( 'DimaMegaMenu' ) ) {

	/**
	 * @since 1.0
	 */
	class DimaMegaMenu {

		function __construct() {

			add_action( 'wp_update_nav_menu_item', array( $this, 'save_custom_menu_style_fields' ), 10, 3 );

			add_filter( 'wp_setup_nav_menu_item', array( $this, 'add_menu_style_data_to_menu' ) );

			add_filter( 'wp_setup_nav_menu_item', array( $this, 'add_megamenu_data_to_menu' ) );

			add_action( 'wp_update_nav_menu_item', array( $this, 'save_custom_megamenu_fields' ), 20, 3 );

			add_filter( 'wp_edit_nav_menu_walker', array( $this, 'add_custom_fields' ) );

			add_action( 'admin_enqueue_scripts', array( $this, 'register_assets' ) );

		}

		/**
		 * Function to replace normal edit nav walker for dima core mega menus
		 *
		 * @return string Class name of new navwalker
		 */
		function add_custom_fields() {

			return 'DimaMainMegaMenus';

		}

		/**
		 * Register megamenu javascript assets
		 * @since  1.0
		 */
		function register_assets( $hook ) {
			if ( $hook == 'nav-menus.php' ) {
				$theme_info = wp_get_theme();
				wp_enqueue_media();
				wp_register_script( 'dima-assets-megamenu', DIMA_TEMPLATE_URL . '/framework/asset/admin/js/mega-menu.js', array(), $theme_info->get( 'Version' ) );
				wp_enqueue_script( 'dima-assets-megamenu' );
				wp_enqueue_style( 'dima-assets-megamenu', DIMA_TEMPLATE_URL . '/framework/asset/admin/css/mega-menu.css', false, $theme_info->get( 'Version' ) );
			}
		}

		/**
		 * Add the custom menu style fields menu item data to fields in database
		 *
		 * @return void
		 */
		function save_custom_menu_style_fields( $menu_item_db_id, $args ) {
			//$field_names = array( 'menu-item-dima-mega-menu-icon' );
			if ( ! $args['menu-item-parent-id'] ) {
				$field_names = array( 'dima-megamenu-item-style', 'menu-item-dima-mega-menu-icon' );
			} else {
				$field_names = array( 'menu-item-dima-mega-menu-icon' );
			}

			foreach ( $field_names as $name ) {

				if ( ! isset( $_REQUEST[ $name ][ $menu_item_db_id ] ) ) {
					$_REQUEST[ $name ][ $menu_item_db_id ] = '';
				}
				$value = $_REQUEST[ $name ][ $menu_item_db_id ];

				update_post_meta( $menu_item_db_id, '_' . str_replace( '-', '_', $name ), $value );
			}

		}

		/**
		 * Add custom menu style fields data to the menu
		 *
		 * @return object the menu item
		 */
		function add_menu_style_data_to_menu( $menu_item ) {
			$menu_item->dima_menu_item_style     = get_post_meta( $menu_item->ID, '_dima_megamenu_item_style', true );
			$menu_item->dima_menu_item_icon      = get_post_meta( $menu_item->ID, '_dima_megamenu_item_icon', true );
			$menu_item->dima_menu_item_textclass = get_post_meta( $menu_item->ID, '_dima_megamenu_item_textclass', true );

			return $menu_item;
		}


		/**
		 * Save data
		 *
		 * @return void
		 */
		function save_custom_megamenu_fields( $menu_id, $menu_item_db_id, $args ) {

			$field_list = array( 'ismega', 'title', 'columns', 'icon', 'textclass', 'style', 'background' );

			foreach ( $field_list as $key ) {
				if ( ! isset( $_REQUEST[ 'menu-item-dima-mega-menu-' . $key ][ $menu_item_db_id ] ) ) {
					$_REQUEST[ 'menu-item-dima-mega-menu-' . $key ][ $menu_item_db_id ] = '';
				}

				$value = $_REQUEST[ 'menu-item-dima-mega-menu-' . $key ][ $menu_item_db_id ];
				update_post_meta( $menu_item_db_id, '_dima_megamenu_item_' . $key, $value );
			}
		}

		/**
		 * Add custom megamenu fields data to the menu
		 *
		 * @return object the menu item
		 */
		function add_megamenu_data_to_menu( $menu_item ) {
			$menu_item->dima_megamenu_ismega     = get_post_meta( $menu_item->ID, '_dima_megamenu_item_ismega', true );
			$menu_item->dima_megamenu_columns    = get_post_meta( $menu_item->ID, '_dima_megamenu_item_columns', true );
			$menu_item->dima_megamenu_title      = get_post_meta( $menu_item->ID, '_dima_megamenu_item_title', true );
			$menu_item->dima_menu_item_icon      = get_post_meta( $menu_item->ID, '_dima_megamenu_item_icon', true );
			$menu_item->dima_menu_item_textclass = get_post_meta( $menu_item->ID, '_dima_megamenu_item_textclass', true );
			$menu_item->dima_menu_item_style     = get_post_meta( $menu_item->ID, '_dima_megamenu_item_style', true );
			$menu_item->dima_megamenu_background = get_post_meta( $menu_item->ID, '_dima_megamenu_item_background', true );

			return $menu_item;
		}

	}

}

new DimaMegaMenu();