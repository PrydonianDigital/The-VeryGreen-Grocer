<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class('row align-top post page'); ?>>

	<div class="small-12 medium-4 columns">

		<?php the_post_thumbnail('square'); ?>

	</div>

	<div class="small-12 medium-8 columns">

		<h4><?php the_title(); ?></h4>
		<?php the_content(); ?>
	</div>

</div>

<?php endwhile; ?>
<div class="row align-middle post">
	<div class="small-12 medium-6 columns text-center"><?php previous_post_link(); ?></div>
	<div class="small-12 medium-6 columns text-center"><?php next_post_link() ?></div>
</div>
<?php endif; ?>

<?php get_footer(); ?>