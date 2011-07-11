<?php get_header(); ?>


	<div id="primary" class="twocol-stories">
		<div class="inside">
			<?php if (have_posts()) : ?>
				<?php $i = 0; ?>
				<?php while (have_posts()) : the_post(); ?>
					<div class="story <?php echo ($i % 2) ? "right" : "left" ?>">
						<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'hemingway'), get_the_title()); ?>"><?php the_title(); ?></a></h3>
						<?php the_excerpt() ?>
						<div class="details">
							<?php printf(__('Posted at %s on %s', 'hemingway'), get_the_time(), get_the_date()); ?> | <a href="<?php !get_comments_number() && !comments_open() && !pings_open() ? the_permalink() : comments_link(); ?>"><?php comments_number(__('No comments', 'hemingway'),__('1 Comment', 'hemingway'),__('% Comments', 'hemingway')); ?></a> | <?php printf(__('Filed Under: %s', 'hemingway'), get_the_category_list(', ')); ?> | <?php if (is_callable('the_tags')) the_tags(__('tagged', 'hemingway') . ' ', ', ', ' | '); ?> <span class="read-on"><a href="<?php the_permalink() ?>"><?php _e('read on', 'hemingway'); ?></a></span>
						</div>
					</div>
					<?php $i++; ?>
				<?php endwhile; ?>
		</div>
				
			<?php else : ?>
		
				<h2 class="center"><?php _e('Not Found', 'hemingway'); ?></h2>
				<p class="center"><?php _e('Sorry, no posts matched your criteria.', 'hemingway'); ?></p>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		
			<?php endif; ?>
				
			<div class="clear"></div>
		</div>
	</div>
	<!-- [END] #primary -->



<?php get_sidebar(); ?>

<?php get_footer(); ?>
