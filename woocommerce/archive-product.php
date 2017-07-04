<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
global $woocommerce;
?>

<div class="row align-middle page">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php
		$my_postid = $product;
		$currency = get_woocommerce_currency_symbol();
		$price = get_post_meta( $post->ID, '_regular_price', true);
		if($price == '0' && $post->post_title == 'MixedBox') {
			$currency = '';
			$price = '£10 Minimum spend';
		}
		if($price == '0' && $post->post_title == 'Buy from the Van') {
			$currency = '';
			$price = '&nbsp;';
		}
	?>
	<div class="small-12 medium-6 large-3 columns">
		<div class="card">
			<div class="card-divider text-center">
				<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
			</div>
			<div class="text-center">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('shop'); ?></a>
			</div>
			<div class="card-section text-center">
				<p class="price subtitle"><?php echo $currency . '' . $price; ?><?php echo get_post_meta( $post->ID, '_text_field3', true ); ?></p>
			</div>
			<div class="card-divider text-center">
				<a href="<?php the_permalink(); ?>"><h6>
				<?php
					echo get_post_meta( $post->ID, '_text_field', true );
				?>
				</h6></a>
			</div>
		</div>
	</div>
	<?php endwhile; ?>

	<?php endif; ?>
	</div>

<?php get_footer(); ?>