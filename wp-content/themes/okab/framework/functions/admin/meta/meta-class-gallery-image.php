<?php
/**
 * Gallery Images
 *
 * Display the gallery images meta box.
 *
 * @package Dima Framework
 * @subpackage Admin Meta
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class DIMA_Meta_Gallery {

	/**
	 * Output the metabox
	 */
	public static function output( $post ) {
		?>
		<div id="post_images_container">
			<ul class="post_images">
				<?php
				if ( metadata_exists( 'post', $post->ID, '_post_image_gallery' ) ) {
					$post_image_gallery = get_post_meta( $post->ID, '_post_image_gallery', true );
				} else {
					// Backwards compat
					$attachment_ids     = get_posts( 'post_parent=' . $post->ID . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids&meta_key=_woocommerce_exclude_image&meta_value=0' );
					$attachment_ids     = array_diff( $attachment_ids, array( get_post_thumbnail_id() ) );
					$post_image_gallery = implode( ',', $attachment_ids );
				}

				$attachments = array_filter( explode( ',', $post_image_gallery ) );

				if ( ! empty( $attachments ) ) {
					foreach ( $attachments as $attachment_id ) {
						echo '<li class="image" data-attachment_id="' . esc_attr( $attachment_id ) . '">
                                ' . wp_get_attachment_image( $attachment_id, 'thumbnail' ) . '
                                <ul class="actions">
                                    <li><a href="#" class="delete tips" data-tip="' . esc_attr__( 'Delete image', 'okab' ) . '">' . esc_html__( 'Delete', 'okab' ) . '</a></li>
                                </ul>
                            </li>';
					}
				}
				?>
			</ul>

			<input type="hidden" id="post_image_gallery" name="post_image_gallery"
			       value="<?php echo esc_attr( $post_image_gallery ); ?>"/>

		</div>
		<p class="add_post_images hide-if-no-js">
			<a href="#" data-choose="<?php esc_attr_e( 'Add Images to Post Gallery', 'okab' ); ?>"
			   data-update="<?php esc_attr_e( 'Add to gallery', 'okab' ); ?>"
			   data-delete="<?php esc_attr_e( 'Delete image', 'okab' ); ?>"
			   data-text="<?php esc_attr_e( 'Delete', 'okab' ); ?>"><?php esc_html_e( 'Add post gallery images', 'okab' ); ?></a>
		</p>
		<?php
	}

	/**
	 * Save meta box data
	 */
	public static function save( $post_id, $post ) {
		$attachment_ids = isset( $_POST['post_image_gallery'] ) ? array_filter( explode( ',', sanitize_text_field( $_POST['post_image_gallery'] ) ) ) : array();
		update_post_meta( $post_id, '_post_image_gallery', implode( ',', $attachment_ids ) );
	}

}

class DIMA_Admin_Meta_Boxes {

	private static $_saved = false;
	public static $meta_box_errors = array();

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ), 30 );
		add_action( 'save_post', array( $this, 'save_meta_boxes' ), 1, 2 );
		add_action( 'dima_gallery_post_meta', 'DIMA_Meta_Gallery::save', 20, 2 );
	}

	public static function save( $post_id, $post ) {
		$attachment_ids = isset( $_POST['post_image_gallery'] ) ? array_filter( explode( ',', sanitize_text_field( $_POST['post_image_gallery'] ) ) ) : array();
		update_post_meta( $post_id, '_post_image_gallery', implode( ',', $attachment_ids ) );
	}


	public function add_meta_boxes() {
		add_meta_box( 'dima-post-images', esc_html__( 'Post Gallery', 'okab' ), 'DIMA_Meta_Gallery::output', 'post', 'side', 'low' );
	}

	public function save_meta_boxes( $post_id, $post ) {

		// $post_id and $post are required
		if ( empty( $post_id ) || empty( $post ) || self::$_saved ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the post being saved
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}

		// Check user has permission to edit
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		// For saveing event once to avoid potential endless loops
		self::$_saved = true;

		do_action( 'dima_gallery_post_meta', $post_id, $post );

	}

}

new DIMA_Admin_Meta_Boxes();
