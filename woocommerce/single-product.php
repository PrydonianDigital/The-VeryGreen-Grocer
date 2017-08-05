<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<?php
global $post, $product;
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'top');
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'top' );
$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . $placeholder,
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );
?>

<style>
div.row[class*="<?php echo nl2br( get_theme_mod('vgg_extra1') ); ?>"] {display: none;}
div.row[class*="<?php echo nl2br( get_theme_mod('vgg_extra2') ); ?>"] {display: none;}
div.row[class*="<?php echo nl2br( get_theme_mod('vgg_extra3') ); ?>"] {display: none;}
div.row[class*="<?php echo nl2br( get_theme_mod('vgg_extra4') ); ?>"] {display: none;}
div.row[class*="<?php echo nl2br( get_theme_mod('vgg_extra5') ); ?>"] {display: none;}
</style>
	<div class="row align-middle page expanded">
		<div class="small-12 columns">
			<?php wc_print_notices(); do_action( 'woocommerce_before_cart' ); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php
					if(!is_single('Shop on Wheels')){
				?>
				<div class="hero-section" style="background: url(<?php echo $featured_img_url; ?>) no-repeat;">
				  <div class="hero-section-text">
				    <h1><?php the_title(); ?></h1>
				    <h5>
					<?php
						if(is_single('Shop on Wheels')){
					?>
				    <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
					<?php
						} else {
					?>
						<?php
							if(is_single('MixedBox')){
						?>
							<h4>£10 Minimum spend</h4>
						<?php
							} else {
						?>
							<h4><?php echo $product->get_price_html(); ?></h4>
						<?php
							}
						?>
						<?php
							}
						?>

				    </h5>
				  </div>
				</div>
				<?php
					}
				?>
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
				<?php
					if(is_single('Shop on Wheels')){
				?>
				<div class="row">
					<div class="small-12 columns">
						<h2><?php the_title(); ?></h2>
						<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
					</div>
				</div>
				<div class="row align-middle">
					<div class="small-12 columns">
						<?php do_action( 'woocommerce_single_product_summary' ); ?>
						<div class="callout success large"><?php the_content(); ?></div>
						<?php do_action( 'woocommerce_after_single_product_summary' ); ?>

						<?php do_action( 'woocommerce_after_single_product' ); ?>
					</div>
				</div>
				<?php
					} else {
				?>
				<div class="row">
					<div class="small-12 large-6 columns">
						<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
					</div>
					<div class="small-12 large-6 columns">
						<h5><?php echo get_post_meta( $post->ID, '_text_field2', true ); ?><br /><small>(scroll to see all items, then make your selection from the green boxes below)</small></h5>
						<ul class="tabs" data-tabs id="example-tabs">
							<li class="tabs-title is-active"><a href="#panel1" aria-selected="true"><?php echo get_post_meta( $post->ID, '_text_field4', true ); ?></a></li>
							<li class="tabs-title"><a href="#panel2">Add-On Items</a></li>
						</ul>
						<div class="tabs-content" data-tabs-content="example-tabs">
							<div class="tabs-panel is-active" id="panel1">
								<?php
								$connected = new WP_Query( array(
								  'connected_type' => 'product_produce',
								  'connected_items' => get_queried_object(),
								  'nopaging' => true,
								) );
								if ( $connected->have_posts() ) :
								?>
								<div class="row align-middle">
								<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
								    <div class="small-3 medium-2 columns text-center tiny">
									    <a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title(); ?>"><?php the_post_thumbnail('tiny'); ?> <br/><?php the_title(); ?></a>
								    </div>
								<?php endwhile; ?>
								</div>

								<?php
								// Prevent weirdness
								wp_reset_postdata();

								endif;
								?>
							</div>
							<div class="tabs-panel" id="panel2">
								<?php
								$connected = new WP_Query( array(
								  'connected_type' => 'supplier_product',
								  'connected_items' => get_queried_object(),
								  'nopaging' => true,
								) );
								if ( $connected->have_posts() ) :
								?>
								<div class="row align-middle">
								<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
								    <div class="small-3 medium-2 columns text-center tiny">
									    <a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title(); ?>"><?php the_post_thumbnail('tiny'); ?> <br/><?php the_title(); ?></a>
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
								  'connected_type' => 'extras_produce',
								  'connected_items' => get_queried_object(),
								  'nopaging' => true,
								) );
								if ( $connected->have_posts() ) :
								?>
								<div class="row align-middle">
								<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
								    <div class="small-3 medium-2 columns text-center tiny">
									    <a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('tiny'); } ?> <br/><?php the_title(); ?></a>
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
					</div>
				</div>

				<div class="row align-middle">

					<div class="small-12 columns text-center">
						<br/><h3>Select your <?php the_title(); ?> contents</h3>
					</div>

					<div class="small-12 columns">

						<?php do_action( 'woocommerce_single_product_summary' ); ?>

						<div class="callout success large"><?php the_content(); ?></div>

						<?php do_action( 'woocommerce_after_single_product_summary' ); ?>

						<?php do_action( 'woocommerce_after_single_product' ); ?>

					</div>
				</div>

				<?php
					}
				?>

			<?php endwhile; ?>

			<?php endif; ?>

			<?php
				if(!is_single('Shop on Wheels')){
			?>
			<?php echo comments_template('woocommerce/single-product-reviews'); ?>
			<?php
				}
			?>

		</div>
	</div>

<?php get_footer(); ?>