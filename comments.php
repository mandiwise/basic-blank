<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		This post is password protected. Enter the password to view comments.
	<?php
		return;
	}
?>

<section id="comments">

	<?php if ( have_comments() ) : ?>
		
		<h3><?php comments_number('No comments yet', 'This post has 1 comment', 'This post has % comments' );?></h3>
	
		<ol class="commentlist">
			<?php wp_list_comments('type=comment&callback=format_comment'); ?>
		</ol>
	
		<nav class="comments-nav">
			<div class="prev-comments"><?php previous_comments_link( '&larr Older Comments;', 0 ) ?></div>
			<div class="nav-comments"><?php next_comments_link( 'Newer Comments &rarr;', 0 ) ?></div>
		</nav>
		
	 <?php else : // this is displayed if there are no comments so far ?>
	
		<?php if ( comments_open() ) : ?>
			<!-- If comments are open, but there are no comments. -->
	
		 <?php else : // comments are closed ?>
			<p>Comments are closed.</p>
	
		<?php endif; ?>
		
	<?php endif; ?>
	
	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
	?>
	
	<?php	
		$fields =  array(
			'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' .
						'<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">*</span></p>' : '' ),
			'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' .
						'<label for="email">' . __( 'Email (will never be published)' ) . '</label> ' . ( $req ? '<span class="required">*</span></p>' : '' ),
			'url'    => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />' .
						'<label for="url">' . __( 'Website' ) . '</label></p>',
		); 
	?>

	<?php
		$arguments = array(
			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'cancel_reply_link' => __( '[Cancel reply]' ),
			'title_reply' => __( 'Post Your Comment' ),
			'title_reply_to' => __( 'Respond to %s' ),
			'label_submit' => __( 'Submit' ),
		);
	?>

	<?php comment_form($arguments); ?>

</section>