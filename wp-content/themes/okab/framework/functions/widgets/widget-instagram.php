<?php

/**
 * Class DIMA_Instagram_Widget.
 *
 * @package Dima Framework
 * @subpackage Widget
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

class DIMA_Instagram_Widget extends WP_Widget {

function __construct() {
	$widget_ops  = array(
		'description' => esc_html__( 'Display your latest Instagram photos', 'okab' ),
		'classname'   => 'instagram-widget'
	);
	$control_ops = array( 'width' => 250, 'height' => 400 );
	parent::__construct( false, $name = DIMA_THEME_NAME . ' - ' . esc_html__( 'Instagram', 'okab' ), $widget_ops, $control_ops );
}

function widget( $args, $instance ) {

extract( $args, EXTR_SKIP );

$title    = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
$username = empty( $instance['username'] ) ? '' : $instance['username'];
$limit    = empty( $instance['number'] ) ? 9 : $instance['number'];
$columns  = empty( $instance['columns'] ) ? 3 : $instance['columns'];
$size     = empty( $instance['size'] ) ? 'large' : $instance['size'];
$target   = empty( $instance['target'] ) ? '_self' : $instance['target'];
$link     = empty( $instance['link'] ) ? '' : $instance['link'];

echo $before_widget;
if ( ! empty( $title ) ) {
	echo $before_title . esc_attr( $title ) . $after_title;
};

if ( $username != '' ) {

$media_array = $this->scrape_instagram( $username, $limit );

if ( is_wp_error( $media_array ) ) {

	echo $media_array->get_error_message();

} else {
/*images only*/
if ( $images_only = apply_filters( 'dima_insta_images_only', false ) ) {
	$media_array = array_filter( $media_array, array( $this, 'images_only' ) );
}

$insta_classes = apply_filters( 'dima_insta_images_class', 'dima-instagram-images dima-instagram-size-' . $size );
$row_classes   = apply_filters( 'dima_insta_row_class', 'dima-instagram-row' );
$child_classes = apply_filters( 'dima_insta_image_class', 'dima-instagram-image' );
$aclass        = apply_filters( 'dima_insta_a_class', '' );
$imgclass      = apply_filters( 'dima_insta_imag_class', '' );

$lightboxdata = "";
if ( $target == "lightbox" ) {
	$_target       = "";
	$lightboxClass = "dima-gallery-item";
	$aclass .= $lightboxClass;
	$lightboxdata = 'data-lightbox=gallery';
}
?>
<div class="<?php echo esc_attr( $insta_classes ); ?>" <?php echo esc_attr( $lightboxdata ); ?>><?php

	$last_id = end( $media_array );
	$last_id = $last_id['id'];

	$row_count = 0;
	foreach ( $media_array as $item ) {
		if ( $row_count == 0 ) {
			echo "<div class='{$row_classes}'>";
		}

		$row_count ++;

		if ( $target == "lightbox" ) {
			$item['link'] = $item['original'];
		}
		echo '<div class="' . esc_attr( $child_classes ) . '">';
		echo '<a href="' . esc_url( $item['link'] ) . '" ' . esc_attr( $_target ) . '   class="' . esc_attr( $aclass ) . '">';
		echo '<img src="' . esc_url( $item[ $size ] ) . '"  alt="' . esc_attr( $item['description'] ) . '" title="' . esc_attr( $item['description'] ) . '"  class="' . esc_attr( $imgclass ) . '"/>';
		echo '</a></div>';

		if ( $row_count % $columns == 0 || $last_id == $item['id'] ) {
			echo '</div>';
			$row_count = 0;
		}

	}
	echo '</div>';
	}
	}

	if ( $link != '' ) {
		?>
		<a class="instagram-button no-rounded button-block fill small button"
		   href="//instagram.com/<?php echo esc_attr( trim( $username ) ); ?>" rel="me"
		   target="<?php echo esc_attr( $target ); ?>"><?php echo esc_attr( $link ); ?></a><?php
	}
	echo $after_widget;
	}



	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, array(
				'title'    => esc_html__( 'Instagram', 'okab' ),
				'username' => '',
				'size'     => 'large',
				'link'     => esc_html__( 'Follow Me!', 'okab' ),
				'number'   => 9,
				'target'   => 'lightbox',
				'columns'  => 3
			)
		);

		$title    = $instance['title'];
		$username = $instance['username'];
		$number   = $instance['number'];
		$size     = $instance['size'];
		$target   = $instance['target'];
		$link     = $instance['link'];
		$columns  = $instance['columns'];
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'okab' ); ?>:
				<input
					class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
					name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
					value="<?php echo esc_attr( $title ); ?>"/></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( 'Username', 'okab' ); ?>:
				<input
					class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"
					name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" type="text"
					value="<?php echo esc_attr( $username ); ?>"/></label></p>
		<p><label
				for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of photos', 'okab' ); ?>
				:
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text"
				       value="<?php echo absint( $number ); ?>"/></label></p>
		<p><label
				for="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>"><?php esc_html_e( 'Number of columns', 'okab' ); ?>
				:
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'columns' ) ); ?>" type="text"
				       value="<?php echo esc_attr( $columns ); ?>"/></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Photo size', 'okab' ); ?>
				:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" class="widefat">
				<option
					value="thumbnail" <?php selected( 'thumbnail', $size ) ?>><?php esc_html_e( 'Thumbnail', 'okab' ); ?></option>
				<option value="small" <?php selected( 'small', $size ) ?>><?php esc_html_e( 'Small', 'okab' ); ?></option>
				<option value="large" <?php selected( 'large', $size ) ?>><?php esc_html_e( 'Large', 'okab' ); ?></option>
				<option
					value="original" <?php selected( 'original', $size ) ?>><?php esc_html_e( 'Original', 'okab' ); ?></option>
			</select>
		</p>
		<p><label
				for="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>"><?php esc_html_e( 'Open links in', 'okab' ); ?>
				:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'target' ) ); ?>" class="widefat">
				<option
					value="lightbox" <?php selected( 'lightbox', $target ) ?>><?php esc_html_e( 'Lightbox', 'okab' ); ?></option>
				<option
					value="_self" <?php selected( '_self', $target ) ?>><?php esc_html_e( 'Current window', 'okab' ); ?></option>
				<option
					value="_blank" <?php selected( '_blank', $target ) ?>><?php esc_html_e( 'New window', 'okab' ); ?></option>
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Link text', 'okab' ); ?>:
				<input
					class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"
					name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text"
					value="<?php echo esc_attr( $link ); ?>"/></label></p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance             = $old_instance;
		$instance['title']    = strip_tags( $new_instance['title'] );
		$instance['username'] = trim( strip_tags( $new_instance['username'] ) );
		$instance['number']   = ! absint( $new_instance['number'] ) ? 9 : $new_instance['number'];
		$instance['columns']  = ! absint( $new_instance['columns'] ) ? 3 : $new_instance['columns'];

		if ( $instance['columns'] > 6 ) {
			$instance['columns'] = 6;
		}
		if ( $instance['columns'] < 1 ) {
			$instance['columns'] = 1;
		}


		$instance['size']   = ( ( $new_instance['size'] == 'thumbnail' || $new_instance['size'] == 'large' || $new_instance['size'] == 'small' || $new_instance['size'] == 'original' ) ? $new_instance['size'] : 'large' );
		$instance['target'] = ( ( $new_instance['target'] == '_self' || $new_instance['target'] == '_blank' || $new_instance['target'] == 'lightbox' ) ? $new_instance['target'] : '_self' );
		$instance['link']   = strip_tags( $new_instance['link'] );

		return $instance;
	}

	// based on https://gist.github.com/cosmocatalano/4544576
	function scrape_instagram( $username, $slice = 9 ) {

		$username = strtolower( $username );
		$username = str_replace( '@', '', $username );
		if ( false === ( $instagram = get_transient( 'dima_insta_' . sanitize_title_with_dashes( $username ) ) ) ) {

			$remote = wp_remote_get( 'http://instagram.com/' . trim( $username ) );

			if ( is_wp_error( $remote ) ) {
				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'okab' ) );
			}

			if ( 200 != wp_remote_retrieve_response_code( $remote ) ) {
				return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'okab' ) );
			}

			$shards      = explode( 'window._sharedData = ', $remote['body'] );
			$insta_json  = explode( ';</script>', $shards[1] );
			$insta_array = json_decode( $insta_json[0], true );

			if ( ! $insta_array ) {
				return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'okab' ) );
			}

			if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
				$images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
			} else {
				return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'okab' ) );
			}

			if ( ! is_array( $images ) ) {
				return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'okab' ) );
			}

			$instagram = array();

			foreach ( $images as $image ) {

				$image['thumbnail_src'] = preg_replace( "/^https:/i", "", $image['thumbnail_src'] );
				$image['thumbnail']     = str_replace( 's640x640', 's160x160', $image['thumbnail_src'] );
				$image['small']         = str_replace( 's640x640', 's320x320', $image['thumbnail_src'] );
				$image['large']         = $image['thumbnail_src'];
				$image['display_src']   = preg_replace( "/^https:/i", "", $image['display_src'] );

				if ( $image['is_video'] == true ) {
					$type = 'video';
				} else {
					$type = 'image';
				}

				$caption = esc_html__( 'Instagram Image', 'okab' );
				if ( ! empty( $image['caption'] ) ) {
					$caption = $image['caption'];
				}

				$instagram[] = array(
					'description' => $caption,
					'link'        => '//instagram.com/p/' . $image['code'],
					'time'        => $image['date'],
					'comments'    => $image['comments']['count'],
					'likes'       => $image['likes']['count'],
					'thumbnail'   => $image['thumbnail'],
					'small'       => $image['small'],
					'large'       => $image['large'],
					'original'    => $image['display_src'],
					'type'        => $type,
					'id'          => $image['id']
				);
			}

			// do not set an empty transient - should help catch private or empty accounts
			if ( ! empty( $instagram ) ) {
				$instagram = serialize( $instagram );
				set_transient( 'dima_insta_' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
			}
		}

		if ( ! empty( $instagram ) ) {
			$instagram = unserialize( $instagram );

			return array_slice( $instagram, 0, $slice );

		} else {

			return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'okab' ) );

		}
	}

	function images_only( $media_item ) {
		if ( $media_item['type'] == 'image' ) {
			return true;
		}

		return false;
	}
	}

	add_action( 'widgets_init', 'DIMA_Instagram_Widget' );
	function DIMA_Instagram_Widget() {
		register_widget( 'DIMA_Instagram_Widget' );
	}

	?>
