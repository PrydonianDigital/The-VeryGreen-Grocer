<?php get_header(); ?>

<div class="row page">

	<div class="small-12 columns">
		<h3><?php the_archive_title(); ?></h3>
	</div>

</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class('row align-middle post'); ?>>

	<div class="small-12 medium-4 columns">

		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('squared'); ?></a>

	</div>

	<div class="small-12 medium-8 columns">

		<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
		<?php the_excerpt(); ?>
		<?php echo wpdocs_custom_taxonomies_terms_links(); ?>
	</div>

</div>

		<?php endwhile; ?>
		<div class="row align-middle post">
			<div class="small-12 columns text-center">
				<ul class="pagination text-center" role="navigation" aria-label="Pagination"><?php foundation_pagination(); ?></ul>
			</div>
		</div>
		<?php endif; ?>

<?php get_footer(); ?>