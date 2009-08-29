<?php get_header(); ?>

	<div id="content" class="widecolumn">
				
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="navigation">
			<div class="alignleft">&nbsp;</div>
			<div class="alignright">&nbsp;</div>
		</div>
<?php $attachment_link = get_the_attachment_link($post->ID, true, array(450, 800)); // This also populates the iconsize for the next line ?>
<?php $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; // This lets us style narrow icons specially ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'hemingway'), get_the_title()); ?>"><?php the_title(); ?></a></h2>
			<div class="entrytext">
				<p class="<?php echo $classname; ?>"><?php echo $attachment_link; ?><br /><?php echo basename($post->guid); ?></p>

				<?php the_content('<p class="serif">' . __('Read the rest of this entry &raquo;', 'hemingway') . '</p>'); ?>
	
				<?php link_pages('<p><strong>' . __('Pages:', 'hemingway') . '</strong> ', '</p>', 'number'); ?>
	
				<p class="postmetadata alt">
					<small>
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */

						printf(__('This entry was posted on %s at %s and is filed under %s%s.', 'hemingway'), get_the_time('l, F jS, Y'), get_the_time(), get_the_category_list(', '), is_callable('the_tags') ? the_tags(__(' with tags ', 'hemingway'), ', ') : '');
						
						printf(__('You can follow any responses to this entry through the <a href="%s">RSS 2.0</a> feed.', 'hemingway'), get_post_comments_feed_link());
						?>

						<?php if (('open' == $post->comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open
							printf(__('You can <a href="#comment-form">leave a comment</a>, or <a href="%s" rel="trackback">trackback</a> from your own site.', 'hemingway'), get_trackback_url());
						} elseif (!('open' == $post->comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open
							printf(__('Comments are currently closed, but you can <a href="%s" rel="trackback">trackback</a> from your own site.', 'hemingway'), get_trackback_url());
						} elseif (('open' == $post->comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not
							_e('You can <a href="#comment-form">leave a comment</a>. Pinging is currently not allowed.', 'hemingway');
						} elseif (!('open' == $post->comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open
							_e('Both comments and trackbacks are currently closed.', 'hemingway');
						} edit_post_link(__('Edit this entry.', 'hemingway'),'',''); ?>
						
					</small>
				</p>
	
			</div>
		</div>
		
	<?php comments_template(); ?>
	
	<?php endwhile; else: ?>
	
		<p><?php _e('Sorry, no attachments matched your criteria.', 'hemingway'); ?></p>
	
<?php endif; ?>
	
	</div>

<?php get_footer(); ?>
