<?php

/**
 * Sets up custom meta boxes.
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

$meta_path = DIMA_TEMPLATE_PATH . '/framework/functions/admin/meta';

/*
  Add meta box
  Creat meta box
  save meta box
*/


/**
 * [dima_add_meta_box Add Entry Meta]
 *
 * @param $meta_box
 *
 * @return bool
 */
function dima_add_meta_box( $meta_box ) {

	if ( ! is_array( $meta_box ) ) {
		return false;
	}

	$callback = create_function( '$post,$meta_box', 'dima_create_meta_box_form( $post, $meta_box["args"] );' );
	if ( ! is_array( $meta_box['page'] ) ) {
		add_meta_box( $meta_box['id'],
			$meta_box['title'],
			$callback,
			$meta_box['page'],
			$meta_box['context'],
			$meta_box['priority'],
			$meta_box );
	} else {
		foreach ( $meta_box['page'] as $type ) {
			add_meta_box( $meta_box['id'],
				$meta_box['title'],
				$callback,
				$type,
				$meta_box['context'],
				$meta_box['priority'],
				$meta_box );
		}
	}
}


/**
 * [dima_create_meta_box_form Create Entry Meta]
 *
 * @param $post
 * @param $meta_box
 *
 * @return bool
 */
function dima_create_meta_box_form( $post, $meta_box ) {

	global $dima_allowed_HTML_tags;
	if ( ! is_array( $meta_box ) ) {
		return false;
	}

	if ( isset( $meta_box['description'] ) && $meta_box['description'] != '' ) {
		echo '<p class="dima-global-desc">' . esc_attr( $meta_box['description'] ) . '</p>';
	}

	wp_nonce_field( basename( __FILE__ ), 'dima_meta_box_nonce_form', true, true );

	echo '<div class="dima-meta-content">';

	/**
	 * Creat fields after extract all fields type
	 */
	foreach ( $meta_box['fields'] as $field ) {

		$meta = get_post_meta( $post->ID, $field['id'], true );

		echo '<div class="dima-meta-field"><div class="dima-meta-desc"><label for="' . esc_attr( $field['id'] ) . '"><strong>' . wp_kses( $field['name'], $dima_allowed_HTML_tags ) . '</strong>
        <span>' . wp_kses( $field['desc'], $dima_allowed_HTML_tags ) . '</span></label></div>';

		switch ( $field['type'] ) {
			case 'text':
				echo '<div class="dima-meta-data"><input type="text" name="dima_meta[' . esc_attr( $field['id'] ) . ']" id="' . esc_attr( $field['id'] ) . '" value="' . ( $meta ? $meta : $field['std'] ) . '" size="30" /></div>';
				break;

			case 'textarea':
				echo '<div class="dima-meta-data"><textarea name="dima_meta[' . esc_attr( $field['id'] ) . ']" id="' . esc_attr( $field['id'] ) . '" rows="8" cols="5">' . ( $meta ? $meta : $field['std'] ) . '</textarea></div>';
				break;

			case 'select':
				echo '<div class="dima-meta-data">
                <div class="dima-shortcodes-arrow"><i class="dashicons dashicons-arrow-down-alt2"></i></div>
                <select name="dima_meta[' . esc_attr( $field['id'] ) . ']" id="' . esc_attr( $field['id'] ) . '">';
				foreach ( array_combine( $field['options'], $field['values'] ) as $option => $value ) {
					echo '<option value="' . esc_attr( $value ) . '"';
					if ( $meta ) {
						if ( $meta == $value ) {
							echo ' selected="selected"';
						}
					} else {
						if ( $field['std'] == $option ) {
							echo ' selected="selected"';
						}
					}
					echo '>' . esc_attr( $option ) . '</option>';
				}
				echo '</select></div>';
				break;

			case 'radio':
				echo '<div class="dima-meta-data">';
				foreach ( $field['options'] as $option ) {
					echo '<label class="radio-label"><input type="radio" name="dima_meta[' . esc_attr( $field['id'] ) . ']" value="' . esc_attr( $option ) . '" class="radio"';
					if ( $meta ) {
						if ( $meta == $option ) {
							echo ' checked="yes"';
						}
					} else {
						if ( $field['std'] == $option ) {
							echo ' checked="yes"';
						}
					}
					echo ' /> ' . esc_attr( $option ) . '</label> ';
				}
				echo '</div>';
				break;


			case 'menus' :
				$menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );

				echo '<div class="dima-shortcodes-arrow"><i class="dashicons dashicons-arrow-down-alt2"></i></div>';
				echo '<div class="dima-meta-data"><select name="dima_meta[' . esc_attr( $field['id'] ) . ']" id="' . esc_attr( $field['id'] ) . '">';
				echo '<option value="off">' . esc_html__( 'Off', 'okab' ) . '</option>';
				//foreach ( array_combine( $field['options'], $field['values'] ) as $option => $value ) {
				foreach ( $menus as $menu ) {
					echo '<option value="' . esc_attr( $menu->slug ) . '"';
					if ( $meta ) {
						if ( $meta == $menu->name ) {
							echo ' selected="selected"';
						}
					} else {
						if ( $field['std'] == $menu->name ) {
							echo ' selected="selected"';
						}
					}
					echo '>' . esc_attr( $menu->name ) . '</option>';
				}
				echo '</select></div>';
				break;
			case 'checkbox' :
				echo '<div class="dima-meta-data">';
				$val = '';
				if ( $meta ) {
					if ( $meta == 'on' ) {
						$val = ' checked="yes"';
					}
				} else {
					if ( $field['std'] == 'on' ) {
						$val = ' checked="yes"';
					}
				}
				echo '<input type="hidden" name="dima_meta[' . esc_attr( $field['id'] ) . ']" value="off" />
                        <input type="checkbox" id="' . esc_attr( $field['id'] ) . '" name="dima_meta[' . esc_attr( $field['id'] ) . ']" value="on"' . esc_attr( $val ) . ' /> ';
				echo '</div>';
				break;

			case 'color':
				echo '<div class="dima-meta-data"><input type="text" name="dima_meta[' . esc_attr( $field['id'] ) . ']" id="' . esc_attr( $field['id'] ) . '" class="wp-color-picker" value="' . ( $meta ? $meta : $field['std'] ) . '" data-default-color="' . esc_attr( $field['std'] ) . '" size="30" /></div>';
				break;

			case 'file':
				echo '<div class="dima-meta-data"><input type="text" name="dima_meta[' . esc_attr( $field['id'] ) . ']" id="' . esc_attr( $field['id'] ) . '" value="' . ( $meta ? $meta : $field['std'] ) . '" size="30" class="file" /> <input type="button" class="button" name="' . esc_attr( $field['id'] ) . '_button" id="' . esc_attr( $field['id'] ) . '_button" value="Browse" /></div>';
				break;

			case 'images':
				echo '<div class="dima-meta-data"><input type="button" class="button" name="' . esc_attr( $field['id'] ) . '" id="dima_images_upload" value="' . esc_attr( $field['std'] ) . '" /></div>';
				break;

			case 'uploader':
				GLOBAL $post;
				echo '<div class="dima-meta-data"><div class="dima-table-cell">'
				     . '<input type="text" name="dima_meta[' . esc_attr( $field['id'] ) . ']" id="' . esc_attr( $field['id'] ) . '" value="' . ( $meta ? $meta : esc_attr( $field['std'] ) ) . '" class="file" />'
				     . '<div class="dima_upload_button_container"><input data-id="' . get_the_ID() . '"  type="button" class="dima-meta-button" name="' . esc_attr( $field['id'] ) . '_button" id="' . esc_attr( $field['id'] ) . '_upload" value="' . esc_html__( 'Browse', 'okab' ) . '" /></div></div>'
				     . '</div>';
				?>

				<script>

					jQuery(document).ready(function ($) {

						var _uploader;
						var wp_media_post_id = wp.media.model.settings.post.id;

						$('#<?php echo esc_attr( $field["id"] ) ?>_upload').on('click', function (e) {

							e.preventDefault();

							var _button = $(this);
							var set_to_post_id = _button.data('id');

							if (_uploader) {
								_uploader.uploader.uploader.param('post_id', set_to_post_id);
								_uploader.open();
								return;
							} else {
								wp.media.model.settings.post.id = set_to_post_id;
							}

							_uploader = wp.media.frames._uploader = wp.media({
								/*title    : 'Insert Media',*/
								button: {text: 'Select'},
								multiple: false
							});

							_uploader.on('select', function () {

								var selection = _uploader.state().get('selection');

								selection.map(function (attachment) {
									attachment = attachment.toJSON();
									_button.parents().prev().val(attachment.url);
								});

								wp.media.model.settings.post.id = wp_media_post_id; // 5

							});

							_uploader.open();

						});

						jQuery('a.add_media').on('click', function () {
							wp.media.model.settings.post.id = wp_media_post_id; // 6
						});

					});
				</script>

				<?php
				break;
			case 'select-portfolio-category':
				$categories = get_terms( 'portfolio-category' );
				$meta       = ( $meta == '' ) ? array( 0 => 'All Categories' ) : $meta;
				echo '<div class="dima-meta-data"><select name="dima_meta' . esc_attr( $field['id'] ) . '[]" id="' . esc_attr( $field['id'] ) . '" multiple="multiple">';
				echo '<option value="All Categories" ' . selected( $meta[0], 'All Categories', true ) . '>All Categories</option>';
				foreach ( $categories as $category ) {
					echo '<option value="' . esc_attr( $category->term_id ) . '"';
					if ( in_array( $category->term_id, $meta ) ) {
						echo ' selected="selected"';
					}
					echo '>' . esc_attr( $category->name ) . '</option>';
				}
				echo '</select></div>';
				break;
			case 'sliders' :
				$sliders = apply_filters( 'dima_sliders_meta', array() );
				echo '<div class="dima-meta-data">
                <div class="dima-shortcodes-arrow"><i class="dashicons dashicons-arrow-down-alt2"></i></div>
				<select name="dima_meta[' . esc_attr( $field['id'] ) . ']" id="' . esc_attr( $field['id'] ) . '">';
				echo '<option value="Off">' . esc_html__( 'Off', 'okab' ) . '</option>';
				foreach ( $sliders as $key => $value ) {
					echo '<option value="' . esc_attr( $key ) . '"';
					if ( $meta ) {
						if ( $meta == $key || $meta == $value['slug'] ) {
							echo ' selected="selected"';
						}
					}
					echo '>' . esc_attr( $value['source'] ) . ': ' . esc_attr( $value['name'] ) . '</option>';
				}
				echo '</select></div>';
				break;

			default :
				do_action( 'dima_add_meta_box_type', $field['type'] );
				break;
		}
		echo '</div>';
	}
	echo '</div>';
}


function dima_save_meta_box_data( $post_id ) {

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	//// Verify that the nonce is valid.
	if ( ! isset( $_POST['dima_meta'] ) || ! isset( $_POST['dima_meta_box_nonce_form'] ) || ! wp_verify_nonce( $_POST['dima_meta_box_nonce_form'], basename( __FILE__ ) ) ) {
		return;
	}

	// Check the user's permissions.
	if ( 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	foreach ( $_POST['dima_meta'] as $key => $val ) {
		if ( is_array( $val ) ) {
			update_post_meta( $post_id, $key, $val );
		} else {
			update_post_meta( $post_id, $key, stripslashes( htmlspecialchars( $val ) ) );
		}
	}
}

add_action( 'save_post', 'dima_save_meta_box_data' );

// Include Entry and Taxonomy Meta Box Setup
// =============================================================================
require_once( $meta_path . '/meta-class-gallery-image.php' );
require_once( $meta_path . '/meta-boxes.php' );