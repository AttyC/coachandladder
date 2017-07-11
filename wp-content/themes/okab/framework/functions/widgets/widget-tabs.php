<?php

/**
 * Class DIMA_Widget_Tabs.
 *
 * @package Dima Framework
 * @subpackage Widget
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */
class DIMA_Widget_Tabs extends WP_Widget {
	function __construct() {
		$widget_ops  = array( 'classname' => 'social-icons-widget', 'description' => 'Most Popular, Comments, Tags' );
		$control_ops = array( 'width' => 250, 'height' => 400 );
		parent::__construct( false, $name = DIMA_THEME_NAME . ' - ' . esc_html__( 'Tabs', 'okab' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {

		$posts_order = ! empty( $instance['posts_order'] ) ? $instance['posts_order'] : 'popular';

		if ( empty( $instance['count'] ) || $instance['count'] == ' ' || ! is_numeric( $instance['count'] ) ) {
			$count = 5;
		} else {
			$count = $instance['count'];
		}
		$show_image  = empty( $instance['show_image'] ) ? '' : $instance['show_image'];
		$show_avatar = empty( $instance['show_avatar'] ) ? '' : $instance['show_avatar'];
		$show_p_tab  = empty( $instance['show_p_tab'] ) ? '' : $instance['show_p_tab'];
		$show_c_tab  = empty( $instance['show_c_tab'] ) ? '' : $instance['show_c_tab'];
		$show_t_tab  = empty( $instance['show_t_tab'] ) ? '' : $instance['show_t_tab'];
		$active      = ' active';

		?>
		<div class="widget-container add-bottom-margin">
			<div class="dima-tabs dima-tab-style responsive-tab columns-3-tab">
				<ul class="dima-tab-nav top">
					<?php
					$tabs_order = 'popular,comments,tags';
					if ( ! empty( $instance['tabs_order'] ) ) {
						$tabs_order = $instance['tabs_order'];
					}
					$tabs_order_list = explode( ',', $tabs_order );
					foreach ( $tabs_order_list as $tab ) {

						if ( $tab == 'popular' && $show_p_tab ) {
							echo '<li class="tab ' . esc_attr( $active ) . '"><a href="#tab-1" data-toggle="tab">' . esc_html__( 'Popular', 'okab' ) . '</a></li>';
							$active = '';
						}

						if ( $tab == 'comments' && $show_c_tab ) {
							echo '<li class="tab' . esc_attr( $active ) . '"><a href="#tab-2" data-toggle="tab">' . esc_html__( 'Comments', 'okab' ) . '</a></li>';
							$active = '';
						}

						if ( $tab == 'tags' && $show_t_tab ) {
							echo '<li class="tab' . esc_attr( $active ) . '"><a href="#tab-3" data-toggle="tab">' . esc_html__( 'Tags', 'okab' ) . '</a></li>';
							$active = '';
						}

					}
					?>
				</ul>
				<div class="dima-tab-content">
					<?php
					$active = ' active';
					foreach ( $tabs_order_list as $tab ) {
						?>
						<?php
						if ( $tab == 'popular' && $show_p_tab ) : ?>
							<div id="tab-1"
							     class="tab-pane clearfix dima-tab_content <?php echo esc_attr( $active ) ?>">
								<ul>
									<?php
									echo do_shortcode( '[blog blog_style="smallpostslist" show_image="' . esc_attr( $show_image ) . '" elm_hover="ming" order="' . esc_attr( $posts_order ) . '" count="' . esc_attr( $count ) . '" ]' );
									$active = '';
									?>
								</ul>
							</div>
						<?php endif;

						if ( $tab == 'comments' && $show_c_tab ) : ?>
							<div id="tab-2"
							     class="tab-pane clearfix dima-tab_content <?php echo esc_attr( $active ) ?>">
								<ul class="with-border a_p_hover">
									<?php
									DIMA_most_commented( $count, 60, $show_avatar );
									$active = '';
									?>
								</ul>
							</div>
						<?php endif;

						if ( $tab == 'tags' && $show_t_tab ) : ?>
							<div id="tab-3"
							     class="tab-pane clearfix dima-tab_content <?php echo esc_attr( $active ) ?>">
								<ul class="tags tagcloud">
									<?php wp_tag_cloud( $args = array(
										'largest' => 8,
										'number'  => 25,
										'orderby' => 'count',
										'order'   => 'DESC'
									) ); ?>
								</ul>
							</div>
						<?php endif;
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance                = $old_instance;
		$instance['count']       = strip_tags( $new_instance['count'] );
		$instance['posts_order'] = strip_tags( $new_instance['posts_order'] );
		$instance['tabs_order']  = strip_tags( $new_instance['tabs_order'] );
		$instance['show_avatar'] = strip_tags( $new_instance['show_avatar'] );
		$instance['show_image']  = strip_tags( $new_instance['show_image'] );
		$instance['show_c_tab']  = strip_tags( $new_instance['show_c_tab'] );
		$instance['show_p_tab']  = strip_tags( $new_instance['show_p_tab'] );
		$instance['show_t_tab']  = strip_tags( $new_instance['show_t_tab'] );

		return $instance;
	}

	function form( $instance ) {
		$id        = explode( "-", $this->get_field_id( "widget_id" ) );
		$widget_id = $this->get_field_id( "widget_id" );
		$defaults  = array(
			'posts_order' => 'popular',
			'count'       => 5,
			'show_image'  => true,
			'show_avatar' => true
		);
		$instance  = wp_parse_args( (array) $instance, $defaults );
		?>

		<script type="text/javascript">
			jQuery(document).ready(function ($) {

				jQuery("#<?php echo esc_attr( $widget_id ) ?>-order").sortable({
					stop: function () {
						var data = "";
						jQuery("#<?php echo esc_attr( $widget_id ) ?>-order li").each(function () {
							var _tab = jQuery(this).data('tab');
							data += _tab + ",";
						});

						jQuery("#<?php echo esc_attr( $widget_id ) ?>-tabs-order").val(data.slice(0, -1));
					}
				});

			});
		</script>

		<div id="<?php echo esc_attr( $widget_id ) ?>-tabs">
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'tabs_order' ) ); ?>"><?php esc_html_e( 'Tabs order:', 'okab' ) ?></label>
				<?php if ( $id[2] == '__i__' )
					echo '<p style="background-color: #FFFFFF;padding: 5px;color: #ffbc00;border: 1px solid #ffbc00;">' . esc_html__( "click Save button to be able to change the order of tabs .", "okab" ) . '</p>' ?>

				<input id="<?php echo esc_attr( $widget_id ) ?>-tabs-order"
				       name="<?php echo esc_attr( $this->get_field_name( 'tabs_order' ) ); ?>"
				       value="<?php if ( ! empty( $instance['tabs_order'] ) ) {
					       echo esc_attr( $instance['tabs_order'] );
				       } ?>"
				       type="hidden"/>

			<ul id="<?php echo esc_attr( $widget_id ) ?>-order"
			    class="tab_sortable" <?php if ( $id[2] == '__i__' )
				echo 'style="opacity:.5;"' ?>>
				<?php
				$tabs_order = 'popular,comments,tags';

				if ( ! empty( $instance['tabs_order'] ) ) {
					$tabs_order = esc_attr( $instance['tabs_order'] );
				}
				$tabs_order_list = explode( ',', $tabs_order );
				foreach ( $tabs_order_list as $tab ) {

					if ( $tab == 'popular' ) {
						echo '<li data-tab="popular"> ' . esc_html__( "Popular", 'okab' ) . '
                                     <input id="' . esc_attr( $this->get_field_id( 'show_p_tab' ) ) . '"
                   name="' . esc_attr( $this->get_field_name( 'show_p_tab' ) ) . '"
                   value="true" ' . ( ( ! empty( $instance['show_p_tab'] ) ) ? 'checked="checked"' : "" ) . '
                   type="checkbox"/>

                        </li>';
					}
					if ( $tab == 'comments' ) {
						echo '<li data-tab="comments"> ' . esc_html__( "Comments", 'okab' ) . '
                         <input id="' . esc_attr( $this->get_field_id( 'show_c_tab' ) ) . '"
                   name="' . esc_attr( $this->get_field_name( 'show_c_tab' ) ) . '"
                   value="true" ' . ( ( ! empty( $instance['show_c_tab'] ) ) ? 'checked="checked"' : "" ) . '
                   type="checkbox"/>
                   </li>';
					}

					if ( $tab == 'tags' ) {
						echo '<li data-tab="tags"> ' . esc_html__( "Tags", 'okab' ) . '
                         <input id="' . esc_attr( $this->get_field_id( 'show_t_tab' ) ) . '"
                   name="' . esc_attr( $this->get_field_name( 'show_t_tab' ) ) . '"
                   value="true" ' . ( ( ! empty( $instance['show_t_tab'] ) ) ? 'checked="checked"' : "" ) . '
                   type="checkbox"/>
                   </li>';
					}
				}
				?>
			</ul>
			</p>
		</div>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_html_e( 'Number of items to show :', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>"
			       value="<?php if ( ! empty( $instance['count'] ) ) {
				       echo esc_attr( $instance['count'] );
			       } ?>" size="3"
			       type="text"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'show_image' ) ); ?>"><?php esc_html_e( 'Show Post Image:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'show_image' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'show_image' ) ); ?>"
			       value="true" <?php if ( ! empty( $instance['show_image'] ) ) {
				echo 'checked="checked"';
			} ?>
			       type="checkbox"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'show_avatar' ) ); ?>"><?php esc_html_e( 'Show user avatar:', 'okab' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'show_avatar' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'show_avatar' ) ); ?>"
			       value="true" <?php if ( ! empty( $instance['show_avatar'] ) ) {
				echo 'checked="checked"';
			} ?>
			       type="checkbox"/>
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'posts_order' ) ); ?>"><?php esc_html_e( 'Popular Posts order :', 'okab' ) ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'posts_order' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'posts_order' ) ); ?>">
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

add_action( 'widgets_init', 'DIMA_Widget_Tabs_box' );

function DIMA_Widget_Tabs_box() {
	register_widget( 'DIMA_Widget_Tabs' );
}

?>
