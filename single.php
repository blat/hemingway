<?php get_header(); ?>

	<div id="primary" class="single-post">
		<div class="inside">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="primary">
				<h1><?php the_title(); ?></h1>
				<?php the_content('<p class="serif">' . __('Read the rest of this entry &raquo;', 'hemingway') . '</p>'); ?>
				<?php wp_link_pages(); ?>
			</div>
			<hr class="hide" />
			<div class="secondary">
				<h2><?php _e('About this entry', 'hemingway'); ?></h2>
				<div class="featured">
					<p><?php printf(__('You&rsquo;re currently reading &ldquo;%s&rdquo;, an entry on %s', 'hemingway'), get_the_title(), get_option('blogname')); ?></p>
					<dl>
						<dt><?php _e('Published:', 'hemingway'); ?></dt>
						<dd><?php the_time('n.j.y') ?> / <?php the_time('ga') ?></dd>
					</dl>
					<dl>
						<dt><?php _e('Category:', 'hemingway'); ?></dt>
						<dd><?php the_category(', ') ?></dd>
					</dl>
					<?php if (is_callable('the_tags')) : ?>
					<dl>
						<dt><?php _e('Tags:', 'hemingway'); ?></dt>
						<dd><?php the_tags(''); ?></dd>
					</dl>
					<?php endif; ?>
					<?php edit_post_link(__('Edit this entry.', 'hemingway'), '<dl><dt>' . __('Edit:', 'hemingway') . '</dt><dd> ', '</dd></dl>'); ?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!-- [END] #primary -->
	
	<hr class="hide" />
	<div id="secondary">
		<div class="inside">
			<?php if ('open' == $post->comment_status) {
				// Comments are open ?>
				<div class="comment-head">
					<h2><?php comments_number(__('No comments', 'hemingway'),__('1 Comment', 'hemingway'),__('% Comments', 'hemingway')); ?></h2>
					<span class="details"><a href="#comment-form"><?php _e('Jump to comment form', 'hemingway'); ?></a> | <?php comments_rss_link(__('comments rss', 'hemingway')); ?> <a href="#what-is-comment-rss" class="help">[?]</a> <?php if ('open' == $post->ping_status): ?>| <a href="<?php trackback_url(true); ?>"><?php _e('trackback uri', 'hemingway'); ?></a> <a href="#what-is-trackback" class="help">[?]</a><?php endif; ?></span>
				</div>
			<?php } else {
				// Neither Comments, nor Pings are open ?>
				<div class="comment-head">
					<h2><?php _e('Comments are closed', 'hemingway'); ?></h2>
					<span class="details"><?php _e('Comments are currently closed on this entry.', 'hemingway'); ?></span>
				</div>	
			<?php } ?>
			
			<?php comments_template(); ?>
			
			<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.', 'hemingway'); ?></p>
			<?php endif; ?>
		</div>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
