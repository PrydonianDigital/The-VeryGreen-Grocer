<?php

	// Set content width value based on the theme's design
	if ( ! isset( $content_width ) )
		$content_width = 870;

	// Register Theme Features
	function vgg_theme()	{
		add_theme_support( 'woocommerce' );
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 870, 250, array( 'center', 'top') );
		add_image_size( 'top', 1130, 800, array( 'center', 'center') );
		add_image_size( 'tiny', 60, 60);
		add_image_size( 'related', 265, 199, array( 'center', 'center') );
		add_image_size( 'squared', 265, 265, array( 'center', 'top') );
		add_image_size( 'shop', 355, 222 );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'title-tag' );
		show_admin_bar(false);
		load_theme_textdomain( 'vgg', get_template_directory() . '/language' );
		add_theme_support( 'custom-logo', array(
			'height'			=> 150,
			'width'			 => 500,
			'flex-width' => true,
		) );
		add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
		add_filter('max_srcset_image_width', create_function('', 'return 1;'));
	}
	add_action( 'after_setup_theme', 'vgg_theme' );

	// Register Style
	function vgg_css() {
		wp_register_style( 'grid', get_template_directory_uri() . '/css/grid.css', false, '6.3.1' );
		wp_register_style( 'libre', 'https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700', false, '6.3.1' );
		wp_enqueue_style( 'grid' );
		wp_enqueue_style( 'libre' );
	}
	add_action( 'wp_enqueue_scripts', 'vgg_css' );

	// Register JS
	function vgg_js() {
		wp_enqueue_script( 'what', get_template_directory_uri() . '/js/vendor/what-input.js', false, '6.3.1', true );
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/vendor/foundation.min.js', false, '6.3.1', true );
		wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/bfa003177d.js', false, '4.7.0', false );
		wp_enqueue_script( 'vgg', get_template_directory_uri() . '/js/vgg.js', false, '1', true );
		wp_enqueue_script( 'jq' );
		wp_enqueue_script( 'what' );
		wp_enqueue_script( 'fontawesome' );
		wp_enqueue_script( 'vgg' );
	}
	add_action( 'wp_enqueue_scripts', 'vgg_js' );

	// Register Navigation Menus
	function vgg_menus() {
		$locations = array(
			'headerl' => __( 'Header Menu Left', 'vgg' ),
			'headerr' => __( 'Header Menu Right', 'vgg' ),
			'social' => __( 'Social Media Menu', 'vgg' ),
			'footer' => __( 'Footer Menu', 'vgg' ),
		);
		register_nav_menus( $locations );
	}
	add_action( 'init', 'vgg_menus' );

	function my_nav_wrap() {
		$wrap  = '<ul id="%1$s" class="%2$s">';
		$wrap .= '%3$s';
		$wrap .= '<li><a class="cart-customlocation" href="'. wc_get_cart_url() .'" title="View your shopping cart">'. sprintf ( _n( '%d <i class="fa fa-shopping-cart" aria-hidden="true"></i>', '%d <i class="fa fa-shopping-cart" aria-hidden="true"></i>', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ).'</a></li>';
		$wrap .= '</ul>';
		return $wrap;
	}

	function wpdocs_custom_taxonomies_terms_links() {
			// Get post by post ID.
			$post = get_post( $post->ID );

			// Get post type by post.
			$post_type = $post->post_type;

			// Get post type taxonomies.
			$taxonomies = get_object_taxonomies( $post_type, 'objects' );

			$out = array();

			foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){

					// Get the terms related to post.
					$terms = get_the_terms( $post->ID, $taxonomy_slug );

					if ( ! empty( $terms ) ) {
							$out[] = 'Category: ';
							foreach ( $terms as $term ) {
									$out[] = sprintf( '<a href="%1$s">%2$s</a>',
											esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
											esc_html( $term->name )
									);
							}
							$out[] = "\n</ul>\n";
					}
			}
			return implode( '', $out );
	}

	function grd_custom_archive_title( $title ) {
		// Remove any HTML, words, digits, and spaces before the title.
		return preg_replace( '#^[\w\d\s]+:\s*#', '', strip_tags( $title ) );
	}
	add_filter( 'get_the_archive_title', 'grd_custom_archive_title' );

	function vgg_sidebars() {
		$args = array(
			'id'			=> 'footer1',
			'class'		 => 'menu vertical',
			'name'			=> __( 'Footer Widgets 1', 'vgg' ),
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'footer2',
			'class'		 => 'menu vertical',
			'name'			=> __( 'Footer Widgets 2', 'vgg' ),
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		);
		register_sidebar( $args );
	}
	add_action( 'widgets_init', 'vgg_sidebars' );

	function disable_wp_emojicons() {
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
		add_filter( 'emoji_svg_url', '__return_false' );
	}
	add_action( 'init', 'disable_wp_emojicons' );

	function disable_emojicons_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
	}

	function pcChecker( $atts , $content = null ) {
		return '<div id="pcChecker"></div>';
	}
	add_shortcode( 'pcChecker', 'pcChecker' );