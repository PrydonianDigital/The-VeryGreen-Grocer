<?php
	/*
	Template Name: Home Page
	*/
	get_header();
	global $woocommerce;
?>

<div class="row align-middle page">

	<div class="small-12 columns">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; ?>

		<?php endif; ?>

	</div>

</div>

<?php
$entries = get_post_meta( get_the_ID(), '_home_home', true );

foreach ( (array) $entries as $key => $entry ) {

	$text = $product = $check = '';

	if ( isset( $entry['_prod'] ) ) {
		$check = esc_html( $entry['_prod'] );
	}

	if ( isset( $entry['_product'] ) ) {
		$product = esc_html( $entry['_product'] );
	}

	if ( isset( $entry['_reason'] ) ) {
		$text = wpautop( $entry['_reason'] );
	}

	if($check == 'on') {
		$my_postid = $product;
		$currency = get_woocommerce_currency_symbol();
		$price = get_post_meta( $my_postid, '_regular_price', true);
		if($price == '0') {
			$currency = '';
			$price = '£10 Minimum spend';
		}
	?>
<div class="small-12 columns">
	<div class="callout" style="background: url(<?php echo get_the_post_thumbnail_url( $my_postid, 'top' ) ?>)">
		<div class="bg">
	<?php
		echo '<h2 class="text-center"><a href="'.get_permalink( $my_postid ).'">' . get_the_title( $my_postid ) . '</a></h2>';
		echo '<h4 class="text-center">' . $currency . '' . $price . '</h4>';
		echo '<p class="text-center">' . get_the_excerpt( $my_postid ) . '</p>';
		echo '<p class="text-center"><a href="'.get_permalink( $my_postid ).'" class="button primary">' . get_post_meta( $my_postid, '_text_field', true ) . '</a></p>';
	?>
		</div>
	</div>
</div>
	<?php
	} else {
	?>
<div class="row align-middle">

	<div class="small-12 columns">

	<?php

		echo $text;
	?>
	</div>

</div>
	<?php
	}

}
?>

<div class="row align-top">

<?php
// WP_Query arguments
$args = array (
	'post_type' => 'reviews',
	'posts_per_page' => '4'
);
// The Query
$review = new WP_Query( $args );
// The Loop
if ( $review->have_posts() ) {
?>
<div class="small-12 columns text-center">
	<hr />
	<h4>Latest Reviews</h4>
</div>
<?php
	while ( $review->have_posts() ) {
		$review->the_post();
?>
	<div <?php post_class('small-12 medium-3 columns'); ?>>
		<div class="callout regular">
		<h5 itemprop="name"><?php echo the_title(); ?></h5>
		<h6>By: <?php global $post; $name = get_post_meta( $post->ID, '_reviews_name', true ); echo $name; ?></h6>
		<?php $review_text = get_post_meta( $post->ID, '_reviews_home', true ); echo nl2br($review_text); ?>
		<?php
			$review_product = get_post_meta( $post->ID, '_reviews_product', true );
			$post = get_post( $review_product );
			$title = $post->post_title;
			echo '<br /><i class="fa fa-arrow-right" aria-hidden="true"></i> <a href="' . get_permalink( $review_product ) . '">' . $title . '</a>';
		?>
		</div>
	</div>
<?php
	}
} else {
	// no posts found
}
// Restore original Post Data
wp_reset_postdata();
?>

</div>

<?php get_footer(); ?>