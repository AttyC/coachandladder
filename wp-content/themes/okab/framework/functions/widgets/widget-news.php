<?php

/**
 * Class DIMA_News_Widget.
 *
 * @package Dima Framework
 * @subpackage Widget
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */
class DIMA_News_Widget extends WP_Widget {

	function __construct() {
		$widget_ops  = array( 'classname' => 'news-pic-widget', 'description' => '' );
		$control_ops = array( 'width' => 250, 'height' => 400 );
		parent::__construct( false, $name = DIMA_THEME_NAME . ' - ' . esc_html__( 'News in Pictures', 'okab' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title       = empty( $instance['title'] ) ? esc_html__( 'News in Pictures', 'okab' ) : apply_filters( 'widget_title', $instance['title'] );
		$nb_of_posts = empty( $instance['nb_of_posts'] ) ? '6' : $instance['nb_of_posts'];
		$cats_slug   = empty( $instance['cats_slug'] ) ? '' : $instance['cats_slug'];
		$tags_slug   = empty( $instance['tags_slug'] ) ? '' : $instance['tags_slug'];
		$posts_order = empty( $instance['posts_order'] ) ? 'latest' : $instance['posts_order'];

		echo $before_widget;

		echo $before_title;
		echo esc_attr( $title );
		echo $after_title;
		echo do_shortcode( '[blog blog_style="news_in_images_widget"  order="' . esc_attr( $posts_order ) . '" count="' . esc_attr( $nb_of_posts ) . '" offset="" category="' . esc_attr( $cats_slug ) . '" tag="' . esc_attr( $tags_slug ) . '" ]' )
		?>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance                = $old_instance;
		$instance['title']       = strip_tags( $new_instance['title'] );
		$instance['nb_of_posts'] = strip_tags( $new_instance['nb_of_posts'] );
		$instance['cats_slug']   = implode( ',', $new_instance['cats_slug'] );
		$instance['tags_slug']   = implode( ',', $new_instance['tags_slug'] );
		$instance['posts_order'] = strip_tags( $new_instance['posts_order'] );

		return $instance;
	}

	function form( $instance ) {
		$defaults = array(
			'title'       => esc_html__( 'News in Pictures', 'okab' ),
			'nb_of_posts' => '9',
			'cats_slug'   => '1',
			'posts_order' => 'latest'
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$categories_obj = get_categories();
		$categories     = array();

		foreach ( $categories_obj as $pn_cat ) {
			$categories[ $pn_cat->slug ] = $pn_cat->cat_name;
		}
		?>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			       value="<?php if ( ! empty( $instance['title'] ) ) {
				       echo esc_attr( $instance['title'] );
			       } ?>" class="widefat"
			       type="text"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'nb_of_posts' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'nb_of_posts' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'nb_of_posts' ) ); ?>"
			       value="<?php if ( ! empty( $instance['nb_of_posts'] ) ) {
				       echo esc_attr( $instance['nb_of_posts'] );
			       } ?>" type="text"
			       size="3"/>
		</p>
		<p>
			<?php $cats_slug = explode( ',', $instance['cats_slug'] ); ?>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'cats_slug' ) ); ?>"><?php esc_html_e( 'Category:', 'okab' ) ?></label>
			<select multiple="multiple" id="<?php echo esc_attr( $this->get_field_id( 'cats_slug' ) ); ?>[]"
			        name="<?php echo esc_attr( $this->get_field_name( 'cats_slug' ) ); ?>[]">
				<?php foreach ( $categories as $key => $option ) { ?>
					<option value="<?php echo esc_attr( $key ) ?>" <?php if ( in_array( $key, $cats_slug ) ) {
						echo ' selected="selected"';
					} ?>><?php echo esc_attr( $option ); ?></option>
				<?php } ?>
			</select>
			<br>
			<small><?php echo esc_html__( 'To filter your posts by category, select the slug of your desired category.', 'okab' ) ?></small>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'tags_slug' ) ); ?>"><?php esc_html_e( 'Tags:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'tags_slug' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'tags_slug' ) ); ?>"
			       value="<?php if ( ! empty( $instance['tags_slug'] ) ) {
				       echo esc_attr( $instance['tags_slug'] );
			       } ?>" class="widefat"
			       type="text"/>
			<br>
			<small><?php echo esc_html__( 'To filter your posts by tag, enter the slug of your desired tag. To filter by multiple tags, enter your slugs separated by a comma.', 'okab' ) ?></small>

		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'posts_order' ) ); ?>"><?php esc_html_e( 'Order :', 'okab' ) ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'posts_order' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'posts_order' ) ); ?>">
				<option
					value="" <?php if ( $instance['posts_order'] == '' ) {
					echo "selected=\"selected\"";
				} else {
					echo "";
				} ?>><?php esc_html_e( 'Most Recent', 'okab' ) ?></option>
				<option
					value="popular" <?php if ( $instance['posts_order'] == 'popular' ) {
					echo "selected=\"selected\"";
				} else {
					echo "";
				} ?>><?php esc_html_e( 'Most Commented', 'okab' ) ?></option>
				<option
					value="top-view" <?php if ( $instance['posts_order'] == 'top-view' ) {
					echo "selected=\"selected\"";
				} else {
					echo "";
				} ?>><?php esc_html_e( 'Most Viewed', 'okab' ) ?></option>
			</select>
		</p>

		<?php
	}
}

add_action( 'widgets_init', 'DIMA_News_Widget_widget' );
function DIMA_News_Widget_widget() {
	register_widget( 'DIMA_News_Widget' );
}

?>