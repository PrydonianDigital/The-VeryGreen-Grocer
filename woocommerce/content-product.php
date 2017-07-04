<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php post_class('small-12 medium-4 columns'); ?>>
		<div class="card">
			<div class="card-divider text-center">
				<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
			</div>
			<div class="text-center">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('shop'); ?></a>
			</div>
			<div class="card-section text-center">
				<p class="price subtitle"><?php echo $product->get_price_html(); ?></p>
			</div>
			<div class="card-divider text-center">
				<a href="<?php the_permalink(); ?>"><h6>Order or Customise Now</h6></a>
			</div>
		</div>
</div>
