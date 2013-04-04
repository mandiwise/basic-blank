<?php get_header(); ?>

		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; ?>

			<?php if (is_category()) { ?>
				<h3 class="archive-title">Archive for the &#8220;<?php single_cat_title(); ?>&#8221; category &rarr;</h3>

			<?php } elseif( is_tag() ) { ?>
				<h3 class="archive-title">Posts tagged &#8220;<?php single_tag_title(); ?>&#8221; &rarr;</h3>

			<?php } elseif (is_day()) { ?>
				<h3 class="archive-title">Archive for <?php the_time('jS F Y'); ?> &rarr;</h3>

			<?php } elseif (is_month()) { ?>
				<h3 class="archive-title">Archive for <?php the_time('F Y'); ?> &rarr;</h3>

			<?php } elseif (is_year()) { ?>
				<h3 class="archive-title">Archive for <?php the_time('Y'); ?> &rarr;</h3>

			<?php } elseif (is_author()) { ?>
				<h3 class="archive-title">Author Archive &rarr;</h3>

			<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h3 class="archive-title">Blog Archives &rarr;</h3>
			
			<?php } ?>

			<?php while (have_posts()) : the_post(); ?>
			
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
