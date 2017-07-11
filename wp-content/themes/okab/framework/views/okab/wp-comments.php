<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>

<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
	return;
}
global $current_user;
wp_get_current_user();
?>

<div id="comments" class="dima-comments-list box">

	<?php if ( have_comments() ) : ?>
        <h5 class="h-comment">
        <span>
        <small>(<?php echo number_format_i18n( get_comments_number() ); ?>)</small>
	        <?php esc_html_e( 'Comments', 'okab' ); ?>
        </span>
        </h5>

        <ol class="dima-comment">
			<?php
			wp_list_comments( array(
				'callback' => 'dima_okab_comment',
				'style'    => 'ol'
			) );
			?>
        </ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav class="dima-comments-navigation">
                <h6><?php esc_html_e( 'Comment navigation', 'okab' ); ?></h6>
                <div
                        class="text-start"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'okab' ) ); ?></div>
                <div class="text-end"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'okab' ) ); ?></div>
            </nav>
		<?php endif; ?>

	<?php endif; ?>

	<?php if ( ! comments_open() && '0' != get_comments_number() ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'okab' ); ?></p>
	<?php endif; ?>
	<?php

	/**
	 * @param $fields
	 *
	 * @return mixed
	 */
	function modify_comment_form_fields( $fields ) {
		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );

		$fields['author'] =
			'<div class="ok-row"><div class="ok-md-4 ok-xsd-12">
      <div class="field">
          <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . esc_html__( "Name*", "okab" ) . '" ' . ( $req ? 'aria-required="true"' : '' ) . ' required="" aria-required="true">
      </div>
   </div>';

		$fields['email'] =
			'<div class="ok-md-4 ok-xsd-12">
    <div class="field">
    <input type="text" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="' . esc_html__( "Email*", "okab" ) . '" size="22" tabindex="2" ' . ( $req ? 'aria-required="true"' : '' ) . ' required="" aria-required="true"  />
    </div></div>';

		$fields['url'] =
			'<div class="ok-md-4 ok-xsd-12">
    <div class="field">
    <input type="text" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_html__( "Website", "okab" ) . '" size="22" tabindex="3" class="input-website" />
    </div></div></div>';

		return $fields;
	}

	add_filter( 'comment_form_default_fields', 'modify_comment_form_fields' );

	$comments_args = array(
		'comment_notes_after'  => '',
		'comment_notes_before' => '',
		'must_log_in'          => '<p class="must-log-in">' . sprintf( esc_html__( "You must be %slogged in%s to post a comment.", "okab" ), '<a href="' . wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) . '">', '</a>' ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . esc_html__( "Logged in as", "okab" ) . ' <a href="' . admin_url( "profile.php" ) . '">' . esc_attr( $current_user->user_login ) . '</a>. <a href="' . wp_logout_url( get_permalink() ) . '" title="' . esc_html__( "Log out of this account", "okab" ) . '">' . esc_html__( "Log out &raquo;", "okab" ) . '</a></p>',
		//'title_reply'         => sprintf(__( "Leave a Comment","okab" ) ),
		//'title_reply_to'      => esc_html__( '<h5 class="leave-reply float-start">Leave a Comment To</h5>' ),
		'cancel_reply_link'    => '<p class="cancel-reply  text-end theme-color">' . sprintf( esc_html__( 'cancel reply', 'okab' ) ) . '</p>',
		'comment_field'        => '<div class="field"><textarea id="comment" name="comment" class="textarea" placeholder="' . esc_html__( "Comment...", "okab" ) . '" required="" aria-required="true"></textarea></div>',
		'id_submit'            => 'entry-comment-submit',
		'class_submit'         => 'button fill text-center',
		'label_submit'         => esc_html__( 'POST COMMENT', 'okab' ),
		'submit_button'        => '<div class="text-center"><input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" /></div>'
	);
	ob_start();
	comment_form( $comments_args );
	echo str_replace( 'class="comment-form"', 'class="comment-form form-small form"', ob_get_clean() );
	?>

</div>