<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		This post is password protected. Enter the password to view comments.
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>

	<div class="comments Box mt10">
		<h2 class="BoxTitle">
			《<?php the_title(); ?>》上的 <?php comments_number( "0", "1","%" ); ?>  条评论 / Comments:
		</h2>
		<ol class="commentlist">
			<?php wp_list_comments('callback=mydiy_comment'); ?>
		</ol>
	</div>
	
<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
			<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed ?>
			<!-- comments are closed -->

	<?php endif; ?>
	
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="respond" class="respond">

		<div class="cancel-comment-reply">
			<?php cancel_comment_reply_link(); ?>
		</div>

		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if ( is_user_logged_in() ) : ?>
			<p class="logged BoxTitle">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Log out of this account">Log out &raquo;</a></p>
			<div>
			<?php else : ?>
			<div>
				<div class="respond-item">
					<label for="author" class="BoxTitle">Name <?php if ($req) echo "<span>(*)</span>"; ?>:</label>
					<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				</div>
				<div class="respond-item">
					<label for="email" class="BoxTitle">Email <?php if ($req) echo "<span>(*)</span>"; ?>:</label>
					<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
					
				</div>
				<div class="respond-item">
					<label for="url" class="BoxTitle">URL:</label>
					<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
				</div>
			<?php endif; ?>

				<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->

				<div class="respond-item">
					<label for="comment" class="BoxTitle">Comment:</label>
					<textarea name="comment" id="comment" cols="30" rows="10" tabindex="4"></textarea>
				</div>
				<div class="respond-item">
					<input name="submit" type="submit" id="submit" tabindex="5" value="提交评论" />
					<?php comment_id_fields(); ?>
				</div>
			</div>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
	<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; ?>