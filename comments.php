<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!', 'hemingway'));

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'hemingway'); ?><p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>

	<ol id="comments" class="commentlist">

	<?php foreach ($comments as $comment) : ?>
		<li id="comment-<?php comment_ID() ?>">
			<cite>
                		<span class="avatarspan"><?php echo get_avatar( $comment, 32 ); ?></span>
				<span class="author"><?php comment_author_link() ?></span>
				<span class="date"><?php comment_date('n.j.y') ?> / <?php comment_date('ga') ?></span>
			</cite>
			<div class="content">
				<?php if ($comment->comment_approved == '0') : ?>
				<em><?php _e('Your comment is awaiting moderation.', 'hemingway'); ?></em>
				<?php endif; ?>
				<?php comment_text() ?>
			</div>
			<div class="clear"></div>
		</li>


	<?php /* Changes every other comment to a different class */	
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php elseif (!is_page()) : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed', 'hemingway'); ?></p>
		
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

		<div id="comment-form">
			<h3 class="formhead"><?php _e('Have your say', 'hemingway'); ?></h3>
			<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: %s', 'hemingway'), allowed_tags()); ?></small></p>
			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'hemingway'), get_option('siteurl'). '/wp-login.php?redirect_to=' . get_the_permalink()); ?></p>
			<?php else : ?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if ( $user_ID ) : ?>
			<p><?php printf(__('Logged in as <a href="%s">%s</a>.', 'hemingway'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account', 'hemingway'); ?>"><?php _e('Logout &raquo;', 'hemingway'); ?></a></p>
			<?php else : ?>
			
			<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" class="textfield" tabindex="1" /><label class="text"><?php _e('Name', 'hemingway'); ?> <?php if ($req) _e('(required)', 'hemingway'); ?></label><br />
			<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" class="textfield" tabindex="2" /><label class="text"><?php _e('Email', 'hemingway'); ?> <?php if ($req) _e('(required)', 'hemingway'); ?></label><br />
			<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" class="textfield" tabindex="3" /><label class="text"><?php _e('Website', 'hemingway'); ?></label><br />
			
			<?php endif; ?>
			
			<textarea name="comment" id="comment" class="commentbox" tabindex="4"></textarea>
			<div class="formactions">
				<span style="visibility:hidden"><?php _e('Safari hates me', 'hemingway'); ?></span>
				<input type="submit" name="submit" tabindex="5" class="submit" value="<?php _e('Add your comment', 'hemingway'); ?>" />
			</div>
			<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
			<?php do_action('comment_form', $post->ID); ?>
			</form>
		</div>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
