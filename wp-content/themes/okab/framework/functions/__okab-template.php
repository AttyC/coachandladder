<?php
/**
 * OKAB specific functions.
 *
 * @package Dima Framework
 * @subpackage Functions
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * views : Print Entry Meta for OKAB Template
 */
if ( ! function_exists( 'dima_get_grid_meta' ) ):
	function dima_get_grid_meta( $show_meta ) {
		$date = sprintf( '<li><time class="entry-date" datetime="%1$s"> %2$s</time></li>', esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ) );

		/**
		 * Comments link
		 */
		if ( comments_open() ) {
			$post_title     = apply_filters( 'dima_meta_comments_title', get_the_title() );
			$comments_link  = apply_filters( 'dima_comments_link', get_comments_link() );
			$nb_of_comments = apply_filters( 'dima_comments_number', get_comments_number() );
			$text           = $nb_of_comments;
			$comments       = sprintf( '<li class="post-comments"><i class="fa fa-comments"></i><a href="%1$s" title="%2$s" class="meta-comments"> %3$s</a></li>', esc_url( $comments_link ), esc_attr( sprintf( esc_html__( 'Leave a comment on: &ldquo;%s&rdquo;', 'okab' ), $post_title ) ), $text );
		} else {
			$comments = '';
		}

		$categories        = get_the_category();
		$separator         = ', ';
		$categories_output = '';
		$categories_list   = '';

		if ( is_single() && dima_helper::dima_get_option( 'dima_blog_enable_post_meta_cat' ) == '1' ) {
			$i = 1;
			foreach ( $categories as $category ) {
				$categories_output .= '<a href="'
				                      . get_category_link( $category->term_id )
				                      . '" title="'
				                      . esc_attr( sprintf( esc_html__( "View all posts in: &ldquo;%s&rdquo;", 'okab' ), $category->name ) )
				                      . '"> '
				                      . $category->name
				                      . '</a>'
				                      . $separator;
				if ( $i ++ == 3 ) {
					break;
				}
			}
			$categories_list = sprintf( '<li class="post-view"><i class="fa fa-folder-open"></i>%1$s</li>', trim( $categories_output, $separator ) );
		}

		$viwes = '';
		if ( dima_helper::dima_get_option( 'dima_blog_enable_post_meta_viwe' ) == '1' ) {
			$nb_viwes   = intval( dima_get_post_views( get_the_ID() ) );
			$viwes_text = $nb_viwes;
			$viwes      = sprintf( '<li class="post-view"><i class="fa fa fa-eye"></i> %1$s</li>', $viwes_text );
		}
		$post_title      = get_the_title( get_the_ID() );
		$post_url        = get_permalink( get_the_ID() );
		$post_title_html = '<h4 class="entry-title"><a href="' . esc_url( $post_url ) . '" rel="bookmark" title="' . esc_attr( $post_title ) . '">' . esc_attr( $post_title ) . '</a></h4>';
		/**
		 * Output
		 */
		if ( dima_hide_entry_meta( $show_meta ) ) {
			return;
		} else {
			printf( '<div class="big-grid-meta">%1$s<ul>%2$s%3$s%4$s%5$s</ul></div>', $post_title_html, $date, $categories_list, $viwes, $comments );
		}
	}
endif;


if ( ! function_exists( 'dima_get_entry_meta' ) ):

	/**
	 * [Print Entry Meta]
	 */
	function dima_get_entry_meta( $show_meta ) {
		$author = sprintf( '<li class="post-on">' . esc_html__( 'By', 'okab' ) . ' <a href="%1$s" rel="author" class="vcard"><span  class="fn">%2$s</span></a>', get_author_posts_url( get_the_author_meta( 'ID' ) ), get_the_author() );
		$date   = sprintf( ' / <time class="entry-date" datetime="%1$s"> %2$s</time></li>', esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ) );

		/**
		 * Comments link
		 */
		if ( comments_open() ) {
			$Comment  = '';
			$Comments = '';
			if ( is_single() ) {
				$Comment  = esc_html__( 'Comment', 'okab' );
				$Comments = esc_html__( 'Comments', 'okab' );
			}
			$post_title     = apply_filters( 'dima_meta_comments_title', get_the_title() );
			$comments_link  = apply_filters( 'dima_comments_link', get_comments_link() );
			$nb_of_comments = apply_filters( 'dima_comments_number', get_comments_number() );

			if ( $nb_of_comments == 0 ) {
				$text = esc_html__( '0', 'okab' );
			} else if ( $nb_of_comments == 1 ) {
				$text = $nb_of_comments . ' ' . $Comment;
			} else {
				$text = $nb_of_comments . ' ' . $Comments;
			}

			$comments = sprintf( '<li class="post-comments"><i class="fa fa-comments"></i><a href="%1$s" title="%2$s" class="meta-comments"> %3$s</a></li>', esc_url( $comments_link ), esc_attr( sprintf( esc_html__( 'Leave a comment on: &ldquo;%s&rdquo;', 'okab' ), $post_title ) ), $text );
		} else {
			$comments = '';
		}

		$categories        = get_the_category();
		$separator         = ', ';
		$categories_output = '';
		$categories_list   = '';

		if ( is_single() && dima_helper::dima_get_option( 'dima_blog_enable_post_meta_cat' ) == '1' ) {
			$i = 1;
			foreach ( $categories as $category ) {
				$categories_output .= '<a href="'
				                      . get_category_link( $category->term_id )
				                      . '" title="'
				                      . esc_attr( sprintf( esc_html__( "View all posts in: &ldquo;%s&rdquo;", 'okab' ), $category->name ) )
				                      . '" rel="category tag"> '
				                      . $category->name
				                      . '</a>'
				                      . $separator;
				if ( $i ++ == 3 ) {
					break;
				}

			}
			$categories_list = sprintf( '<li class="post-view"><i class="fa fa-folder-open"></i>%1$s</li>', trim( $categories_output, $separator ) );
		}

		$_Viwe  = '';
		$_Viwes = '';
		$viwes  = '';
		if ( dima_helper::dima_get_option( 'dima_blog_enable_post_meta_viwe' ) == '1' ) {

			if ( is_single() ) {
				$_Viwe  = esc_html__( 'View', 'okab' );
				$_Viwes = esc_html__( 'Views', 'okab' );
			}
			$nb_viwes = intval( dima_get_post_views( get_the_ID() ) );
			if ( $nb_viwes == 0 ) {
				$viwes_text = esc_html__( '0', 'okab' );
			} elseif ( $nb_viwes == 1 ) {
				$viwes_text = $nb_viwes . ' ' . $_Viwe;
			} else {
				$viwes_text = $nb_viwes . ' ' . $_Viwes;
			}
			$viwes = sprintf( '<li class="post-view"><i class="fa fa fa-eye"></i> %1$s</li>', esc_attr( $viwes_text ) );
		}
		/**
		 * Output
		 */
		if ( dima_hide_entry_meta( $show_meta ) ) {
			return;
		} else {
			printf( '<div class="post-meta box"><ul>%1$s%2$s%3$s%4$s%5$s</ul></div>', $author, $date, $categories_list, $viwes, $comments );
		}
	}
endif;

/** views : use this in widget  */
if ( ! function_exists( 'dima_get_front_meta' ) ):

	/**
	 * [Print Entry Meta]
	 */
	function dima_get_front_meta() {
		$author = sprintf( '<li class="post-on">' . esc_html__( 'By', 'okab' ) . ' <a href="%1$s" rel="author" class="vcard"><span  class="fn">%2$s / </span></a>', get_author_posts_url( get_the_author_meta( 'ID' ) ), get_the_author() );
		$date   = sprintf( '<time class="entry-date" datetime="%1$s"> %2$s</time></li>', esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ) );
		/**
		 * Comments link
		 */
		if ( comments_open() ) {
			$Comment        = '';
			$Comments       = '';
			$post_title     = apply_filters( 'dima_meta_comments_title', get_the_title() );
			$comments_link  = apply_filters( 'dima_comments_link', get_comments_link() );
			$nb_of_comments = apply_filters( 'dima_comments_number', get_comments_number() );

			if ( $nb_of_comments == 0 ) {
				$text = esc_html__( '0', 'okab' );
			} else if ( $nb_of_comments == 1 ) {
				$text = $nb_of_comments . ' ' . $Comment;
			} else {
				$text = $nb_of_comments . ' ' . $Comments;
			}

			$comments = sprintf( '<li class="post-comments"><a href="%1$s" title="%2$s" class="meta-comments"><i class="fa fa-comments"></i> %3$s</a></li>', esc_url( $comments_link ), esc_attr( sprintf( esc_html__( 'Leave a comment on: &ldquo;%s&rdquo;', 'okab' ), $post_title ) ), $text );
		} else {
			$comments = '';
		}
		$categories_list = '';
		$_Viwe           = '';
		$_Viwes          = '';
		$viwes           = '';
		if ( dima_helper::dima_get_option( 'dima_blog_enable_post_meta_viwe' ) == '1' ) {

			$nb_viwes = intval( dima_get_post_views( get_the_ID() ) );
			if ( $nb_viwes == 0 ) {
				$viwes_text = esc_html__( '0', 'okab' );
			} elseif ( $nb_viwes == 1 ) {
				$viwes_text = $nb_viwes . ' ' . $_Viwe;
			} else {
				$viwes_text = $nb_viwes . ' ' . $_Viwes;
			}
			$viwes = sprintf( '<li class="post-view"><i class="fa fa fa-eye"></i> %1$s</li>', $viwes_text );
		}
		printf( '<div class="post-meta box"><ul>%1$s%2$s%3$s%4$s%5$s</ul></div>', $author, $date, $categories_list, $viwes, $comments );

	}
endif;
/**
 * views : Comments
 */
if ( ! function_exists( 'dima_okab_comment' ) ):
	/**
	 *  Comments.
	 *
	 * @param $comment
	 * @param $args
	 * @param $depth
	 */
	function dima_okab_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		GLOBAL $post;
		if ( DIMA_WC_IS_ACTIVE ) :
			$rating = esc_attr( get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true ) );
		endif;
		?>
        <li id="li-comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
        <div class="content-comment post-content">
			<?php
			if ( ! dima_helper::dima_is_product() ) {
				printf(
					'<div class="dima-comment-img">%1$s %2$s</div>',
					'<span class="avatar-wrap cf">' . get_avatar( $comment, 120 ) . '</span>', ( $comment->user_id === $post->post_author ) ? '<span class="dima-post-author">' . esc_html__( 'Author', 'okab' ) . '</span>' : ''
				);
			} else {
				printf(
					'<div class="dima-comment-img ">%1$s %2$s</div>',
					'<span class="avatar-wrap cf">' . get_avatar( $comment, 120 ), '' );
			}
			?>
            <div class="dima-comment-entry">
                <article id="comment-<?php comment_ID(); ?>">
                    <header class="dima-comment-header">
                        <ul class="user-comment-titel">
                            <li>
                                <h6><?php printf( '<cite class="dima-comment-author">%1$s</cite>', get_comment_author_link() ); ?></h6>
                            </li>
							<?php
							printf( '<li><a href="%1$s"><time class="comment-time" datetime="%2$s">%3$s</time></a></li>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								sprintf( esc_html__( '%1$s at %2$s', 'okab' ),
									get_comment_date(), get_comment_time() ) );
							?>
                            <li>
								<?php if ( ! dima_helper::dima_is_product() ) : ?>
                                <div class="dima-reply">
									<?php echo " / ";
									$allowed_tags = array(
										'span' => array(),
									);

									comment_reply_link( array_merge( $args, array(
										'reply_text' => wp_kses( __( 'Reply <span class="comment-reply-link-after"></span>', 'okab' ), $allowed_tags ),
										'depth'      => $depth,
										'max_depth'  => $args['max_depth']
									) ) ); ?>
                                </div>
                            </li>
						<?php endif; ?>
                            <li><span> / </span><?php edit_comment_link( esc_html__( 'Edit', 'okab' ) ); ?></li>
							<?php if ( dima_helper::dima_is_product() && get_option( 'woocommerce_enable_review_rating' ) == 'yes' ) : ?>
                                <div class="float-end">
                                    <div class="star-rating"
                                         title="<?php echo sprintf( esc_html__( 'Rated %d out of 5', 'okab' ), $rating ) ?>">
                                                <span
                                                        style="width:<?php echo ( intval( get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true ) ) / 5 ) * 100; ?>%"><strong><?php echo intval( get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true ) ); ?></strong> <?php esc_html_e( 'out of 5', 'okab' ); ?></span>
                                    </div>
                                </div>
							<?php endif; ?>
                        </ul>
                    </header>
					<?php if ( '0' == $comment->comment_approved ): ?>
                        <p class="dima-comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'okab' ); ?></p>
					<?php endif; ?>
                    <section class="dima-comment-content">
						<?php comment_text(); ?>
                    </section>
                </article>
            </div>
        </div>
		<?php
	}
endif;


if ( ! function_exists( 'dima_get_post_views' ) ) {
	/**
	 * @param $postID
	 *
	 * @return mixed|string
	 */
	function dima_get_post_views( $postID ) {
		$count_key = 'dima_post_views_count';
		$count     = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );

			return "0";
		}

		return $count;
	}
}

/**
 * @param int $login_only
 */
function dima_login_form( $login_only = 0 ) {
	global $user_ID, $user_identity;

	if ( $user_ID ) : ?>
		<?php if ( empty( $login_only ) ): ?>
            <div id="dima-user-login">
                <span class="dima-author-avatar">
                    <?php echo get_avatar( $user_ID, $size = '90' ); ?>
                </span>
                <div class="dima-user-login-content">
                    <h5 class="welcome-text"><?php echo esc_html__( 'Welcome', 'okab' ); ?>
                        : <?php echo esc_attr( $user_identity ) ?></h5>
                    <ul>
                        <li>
                            <a href="<?php echo esc_url( home_url( '/' ) ) ?>/wp-admin/"><?php echo esc_html__( 'Dashboard', 'okab' ) ?> </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( home_url( '/' ) ) ?>/wp-admin/profile.php"><?php echo esc_html__( 'Your Profile', 'okab' ) ?> </a>
                        </li>
                        <li>
                            <a href="<?php echo wp_logout_url(); ?>"><?php echo esc_html__( 'Logout', 'okab' ) ?> </a>
                        </li>
                    </ul>
                </div>
            </div>
		<?php endif; ?>
	<?php else: ?>
        <div id="dima-login-form">
            <form name="loginform" id="loginform" action="<?php echo esc_url( home_url( '/' ) ) ?>/wp-login.php"
                  method="post"
                  class="login">
                <p id="form-row-wide">
                    <input type="text" name="log" id="log" value="<?php echo esc_html__( 'Username', 'okab' ) ?>"
                           onfocus="if (this.value == ' <?php echo esc_html__( 'Username', 'okab' ) ?>') {this.value = '';}"
                           onblur="if (this.value == '') {this.value = '<?php echo esc_html__( 'Username', 'okab' ) ?>';}"/>
                </p>
                <p id="form-row-wide">
                    <input type="password" name="pwd" id="pwd" value="<?php echo esc_html__( 'Password', 'okab' ) ?>"
                           onfocus="if (this.value == '<?php echo esc_html__( 'Password', 'okab' ) ?>') {this.value = '';}"
                           onblur="if (this.value == '') {this.value = '<?php echo esc_html__( 'Password', 'okab' ) ?>';}"/>
                </p>
                <input type="submit" name="submit" value="<?php echo esc_html__( 'Login', 'okab' ) ?>"
                       class="button"/>
                <label for="rememberme"><input name="rememberme" id="login-rememberme" type="checkbox" checked="checked"
                                               value="forever"/> <?php echo esc_html__( 'Remember Me', 'okab' ) ?>
                </label>
                <input type="hidden" name="redirect_to" value="<?php echo esc_url( $_SERVER['REQUEST_URI'] ); ?>"/>
            </form>
            <ul class="login-links">
				<?php if ( get_option( 'users_can_register' ) ) : ?><?php echo wp_register() ?><?php endif; ?>
                <li>
                    <a href="<?php echo esc_url( home_url( '/' ) ) ?>/wp-login.php?action=lostpassword"><?php echo esc_html__( 'Lost your password?', 'okab' ) ?></a>
                </li>
            </ul>
        </div>
	<?php endif;
}

/**
 * Widget
 *
 * @param int $comment_posts
 * @param int $avatar_size
 * @param bool $with_avatar
 */
function DIMA_most_commented( $comment_posts = 5, $avatar_size = 40, $with_avatar = false ) {
	$comments = get_comments( 'status=approve&number=' . $comment_posts );
	foreach ( $comments as $comment ) { ?>
        <li>
			<?php if ( $with_avatar ) { ?>
                <div class="dima-author-avatar" style="width:<?php echo esc_attr( $avatar_size ) ?>px">
					<?php echo get_avatar( $comment, $avatar_size ); ?>
                </div>
			<?php } ?>
            <a href="<?php echo get_permalink( $comment->comment_post_ID ); ?>#comment-<?php echo esc_attr( $comment->comment_ID ); ?>">
				<?php echo strip_tags( $comment->comment_author ); ?>
                : <?php echo wp_html_excerpt( $comment->comment_content, 80 ); ?>... </a>
        </li>
	<?php }
}

/**
 * @param $result
 * @param $tag
 *
 * @return mixed
 */
function dima_custom_email_confirmation_validation_filter( $result, $tag ) {
	$tag = new WPCF7_Shortcode( $tag );

	if ( 'your-email-confirm' == $tag->name ) {
		$your_email         = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';
		$your_email_confirm = isset( $_POST['your-email-confirm'] ) ? trim( $_POST['your-email-confirm'] ) : '';
		if ( $your_email != $your_email_confirm ) {
			$result->invalidate( $tag, "Are you sure this is the correct address?" );
		}
	}

	return $result;
}

add_filter( 'wpcf7_validate_email*', 'dima_custom_email_confirmation_validation_filter', 20, 2 );

/**
 * [dima_portfolio_filters Display list of filters by category]
 *
 * @param  array $filters_array []
 */

function dima_portfolio_filters( $filters_array = array(), $type = "portfolio" ) {
	$show_filters = $filters_array['filters'];

	if ( is_archive() ) {
		$show_filters = 'false';
	}
	if ( $type == "portfolio" ) {
		$terms = get_terms( 'portfolio-category' );
		$class = ".portfolio-category-";
	} else {
		$terms = get_terms( 'product_cat' );
		$class = ".product_cat-";
	}
	if ( $show_filters != 'false' ) {

		?>
        <nav class="filters-box filters" id="filters">
            <ul>
                <li class="current"><a data-filter="*"><?php esc_html_e( 'All', 'okab' ); ?></a></li>
				<?php foreach ( $terms as $term ) { ?>
                    <li>
                        <a data-filter="<?php echo esc_attr( $class ) . esc_attr( $term->slug ); ?>"><?php echo esc_attr( $term->name ); ?></a>
                    </li>
				<?php } ?>
            </ul>
        </nav>
		<?php

	}
}

/**
 * Output Portfolio Item Project Link
 */
function dima_portfolio_item_project_link() {
	$project_link = get_post_meta( get_the_ID(), '_dima_portfolio_project_link', true );

	if ( $project_link ) {
		return $project_link;
	} else {
		return '';
	}
}


/**
 * Customizing Category Widget
 *
 * @param $output
 *
 * @return mixed
 */
function cat_count_span_inline( $output ) {
	$output = str_replace( '</a> (', '<span class="float-end text-end"> ', $output );
	$output = str_replace( ')', '</span></a> ', $output );

	return $output;
}

add_filter( 'wp_list_categories', 'cat_count_span_inline' );

/**
 * Remove some markup and styling from WordPress
 */

/**
 * Remove 'style=' from Tag Cloud
 */
if ( ! function_exists( 'dima_remove_tag_cloud_inline_style' ) ) :
	function dima_remove_tag_cloud_inline_style( $tag_string ) {
		return preg_replace( "/style='font-size:.+pt;'/", '', $tag_string );
	}

	add_filter( 'wp_generate_tag_cloud', 'dima_remove_tag_cloud_inline_style', 10, 1 );
endif;


/**
 * Remove Recent Comments Style
 */
if ( ! function_exists( 'dima_remove_recent_comments_style' ) ) :
	function dima_remove_recent_comments_style() {
		GLOBAL $wp_widget_factory;
		remove_action( 'wp_head', array(
			$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
			'recent_comments_style'
		) );
	}

	add_action( 'widgets_init', 'dima_remove_recent_comments_style' );
endif;

/**
 * Remove Gallery Style
 */
if ( ! function_exists( 'dima_remove_gallery_style' ) ) :
	function dima_remove_gallery_style() {
		add_filter( 'use_default_gallery_style', '__return_false' );
	}

	add_action( 'init', 'dima_remove_gallery_style' );
endif;


/**
 * Remove Gallery <br> Tags
 */
if ( ! function_exists( 'dima_remove_br_gallery' ) ) :
	function dima_remove_br_gallery( $output ) {
		return preg_replace( '/<br style=(.*?)>/mi', '', $output );
	}

	add_filter( 'the_content', 'dima_remove_br_gallery', 11, 2 );
endif;

/**
 * @param $fields
 *
 * @return mixed
 * WP Version 4.4.0
 */
function dima_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;

	return $fields;
}

add_filter( 'comment_form_fields', 'dima_move_comment_field_to_bottom' );
