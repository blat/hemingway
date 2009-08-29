<?php get_header(); ?>

	<div id="primary">
	<div class="inside">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'hemingway') . '</p>'); ?>
	
		<?php link_pages('<p><strong>' . __('Pages:', 'hemingway') . '</strong> ', '</p>', 'number'); ?>
		<br class="clear" />
		<?php edit_post_link(__('Edit this entry.', 'hemingway'), '<p>', '</p>'); ?>

	<?php endwhile; endif; ?>
	</div>
	</div>

	<hr class="hide" />
	<div id="secondary">
		<div class="inside">
			
			<?php if ('open' == $post->comment_status) {
				// Comments are open ?>
				<div class="comment-head">
					<h2><?php comments_number(__('No comments', 'hemingway'),__('1 Comment', 'hemingway'),__('% Comments', 'hemingway')); ?></h2>
					<span class="details"><a href="#comment-form"><?php _e('Jump to comment form', 'hemingway'); ?></a> | <?php comments_rss_link(__('comments rss', 'hemingway')); ?> <a href="#what-is-comment-rss" class="help">[?]</a> <?php if ('open' == $post->ping_status): ?>| <a href="<?php trackback_url(true); ?>"><?php _e('trackback uri', 'hemingway'); ?></a> <a href="#what-is-trackback" class="help">[?]</a><?php endif; ?></span>
				</div>
			<?php } elseif ('open' != $post->comment_status) { ?>
			<?php } ?>
			
			<?php comments_template(); ?>
	</div>
	</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
