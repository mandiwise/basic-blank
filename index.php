<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<header>
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			</header>

			<?php get_template_part('meta', 'pub'); ?>

			<section class="entry">
				<?php the_excerpt(); ?>
			</section>
			
			<?php get_template_part('meta', 'post'); ?>

		</article>

	<?php endwhile; ?>

	<?php get_template_part('nav'); ?>

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
