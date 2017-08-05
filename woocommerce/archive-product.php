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

$page_id = get_page_by_title( 'Shop' );
$id =  $page->ID;
$page_object = get_page( $page_id );
if(is_shop()){
?>



<div class="row align-middle page">

	<div class="small-12 columns">
		<?php echo $page_object->post_content; ?>
	</div>

</div>

<?php
}
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
		if($price == '0' && $post->post_title == 'Shop on Wheels') {
			$currency = '';
			$price = '&nbsp;';
		}
	?>
	<div class="small-12 medium-6 large-3 columns">
		<div class="card card-user-profile">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('shop', array('class' => 'card-user-profile-img')); ?></a>
			<div class="card-user-profile-content card-section">
				<p class="card-user-profile-name"><?php the_title(); ?></p>
				<p class="card-user-profile-status"><?php echo $currency . '' . $price; ?><?php echo get_post_meta( $post->ID, '_text_field3', true ); ?></p>
			</div>
			<div class="card-user-profile-actions">
				<a href="<?php the_permalink(); ?>" class="card-user-profile-button button hollow">
				<?php
					echo get_post_meta( $post->ID, '_text_field', true );
				?>
				</a>
			</div>
		</div>

	</div>
	<?php endwhile; ?>

	<?php endif; ?>
	</div>

<?php get_footer(); ?>