<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class('row align-middle post page'); ?>>

	<div class="small-12 medium-4 columns">

		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('square'); ?></a>

	</div>

	<div class="small-12 medium-8 columns">

		<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
		<?php the_excerpt(); ?>
		<?php echo wpdocs_custom_taxonomies_terms_links(); ?>
	</div>

</div>

<?php endwhile; ?>
<div class="row align-middle post">
	<div class="small-12 medium-6 columns text-center"><?php previous_posts_link('&laquo; Previous') ?></div>
	<div class="small-12 medium-6 columns text-center"><?php next_posts_link('Next &raquo;','') ?></div>
</div>
<?php endif; ?>

<?php get_footer(); ?>