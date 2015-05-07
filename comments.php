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

	<div class="comments mt10">
		<h2 class="BoxTitle1 bgp p10">
			《<?php the_title(); ?>》上的 <?php comments_number( "0", "1","%" ); ?>  条评论 / Comments:
		</h2>
		<ol class="commentlist mt10">
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

<div id="respond" class="respond bgp p10">

		<div class="text-right cancel-comment-reply">
			<span class=" btn btn-xs btn-primary"><?php cancel_comment_reply_link(); ?></span>
		</div>

		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if ( is_user_logged_in() ) : ?>
			<p class="logged BoxTitle">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php" class="label label-primary"><?php echo $user_identity; ?></a> <a href="<?php echo wp_logout_url( get_permalink() ); ?>" class="label label-primary" title="Log out of this account">Log out &raquo;</a></p>
			<div>
			<?php else : ?>
			<div>
				<div class="form-group">
					<label for="author">Name <?php if ($req) echo "<span>(*)</span>"; ?>:</label>
					<input type="text" class="form-control" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				</div>
				<div class="form-group">
					<label for="email">Email <?php if ($req) echo "<span>(*)</span>"; ?>:</label>
					<input type="text" class="form-control" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
				</div>
				<div class="form-group">
					<label for="url">URL:</label>
					<input type="text" class="form-control" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
				</div>
			<?php endif; ?>

				<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->

				<div class="form-group">
					<label for="comment">Comment:</label>
					<textarea name="comment" class="form-control" id="comment" cols="30" rows="10" tabindex="4"></textarea>
				</div>
				<div class="text-right mt10">
					<input name="submit" type="submit" id="submit" tabindex="5" class="btn btn-sm btn-primary" value="提交评论" />
					<?php comment_id_fields(); ?>
				</div>
			</div>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
	<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; ?>