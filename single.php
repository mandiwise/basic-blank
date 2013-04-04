<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<header>
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			</header>

			<?php get_template_part('meta', 'pub'); ?>

			<section class="entry">
				<?php edit_post_link('Edit this entry','','.'); ?>
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				<?php the_tags( 'Tags: ', ', ', ''); ?>
			</section>
			
			<?php get_template_part('meta', 'post'); ?>
			
		</article>

	<?php comments_template(); ?>

	<?php endwhile; endif; ?>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>