<?php get_header(); ?>

<div class="row align-middle page">

	<div class="small-12 columns">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h3><?php the_title(); ?></h3>

			<?php the_content(); ?>

		<?php endwhile; ?>

		<?php endif; ?>

	</div>

</div>

<?php get_footer(); ?>