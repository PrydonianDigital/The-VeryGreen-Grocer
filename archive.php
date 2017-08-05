<?php get_header(); ?>

<div class="row page">

	<div class="small-12 columns">
		<h3><?php the_archive_title(); ?></h3>
	</div>

</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class('row align-middle post'); ?>>

	<div class="small-12 medium-4 columns">

		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('square'); ?></a>

	</div>

	<div class="small-12 medium-8 columns">

		<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
		<?php the_excerpt(); ?>
		<?php
		$connected = new WP_Query( array(
		  'connected_type' => 'supplier_produce',
		  'connected_items' => $post,
		  'nopaging' => true,
		) );
		if ( $connected->have_posts() ) :
		?>
		<div class="row align-top">
			<div class="small-12 columns text-center">
				<p><?php the_title(); ?> supplies:</p>
			</div>
		<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
		    <div class="small-3 medium-2 columns text-center tiny">
			    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('tiny'); } ?> <br/><?php the_title(); ?></a>
		    </div>
		<?php endwhile; ?>
		</div>

		<?php
		// Prevent weirdness
		wp_reset_postdata();

		endif;
		?>
		<?php
		$connected = new WP_Query( array(
		  'connected_type' => 'supplier_extras',
		  'connected_items' => $post,
		  'nopaging' => true,
		) );
		if ( $connected->have_posts() ) :
		?>
		<div class="row align-top">
			<div class="small-12 columns text-center">
				<p><?php the_title(); ?> supplies:</p>
			</div>
		<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
		    <div class="small-3 medium-2 columns text-center tiny">
			    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('tiny'); } ?> <br/><?php the_title(); ?></a>
		    </div>
		<?php endwhile; ?>
		</div>

		<?php
		// Prevent weirdness
		wp_reset_postdata();

		endif;
		?>
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