<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class('row align-top post page'); ?>>

	<div class="small-12 medium-4 columns">

		<?php the_post_thumbnail('square'); ?>

	</div>

	<div class="small-12 medium-8 columns">

		<h4><?php the_title(); ?></h4>
		<?php the_content(); ?>
		<?php
		$connected = new WP_Query( array(
		  'connected_type' => 'supplier_produce',
		  'connected_items' => get_queried_object(),
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
		  'connected_items' => get_queried_object(),
		  'nopaging' => true,
		) );
		if ( $connected->have_posts() ) :
		?>
		<div class="row align-top">
			<div class="small-12 columns text-center">
				<p><?php the_title(); ?> is provided by:</p>
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

	</div>

</div>

<?php endwhile; ?>
<div class="row align-middle post">
	<div class="small-12 medium-6 columns text-center"><?php previous_post_link(); ?></div>
	<div class="small-12 medium-6 columns text-center"><?php next_post_link() ?></div>
</div>
<?php endif; ?>

<?php get_footer(); ?>