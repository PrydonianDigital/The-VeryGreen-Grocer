<?php

	// Register Custom Post Type
	function produce() {

		$labels = array(
			'name'                  => _x( 'Produce', 'Post Type General Name', 'tvgg' ),
			'singular_name'         => _x( 'Produce', 'Post Type Singular Name', 'tvgg' ),
			'menu_name'             => __( 'Produce', 'tvgg' ),
			'name_admin_bar'        => __( 'Produce', 'tvgg' ),
			'archives'              => __( 'Produce Archives', 'tvgg' ),
			'parent_item_colon'     => __( 'Parent Item:', 'tvgg' ),
			'all_items'             => __( 'All Produce', 'tvgg' ),
			'add_new_item'          => __( 'Add New Produce', 'tvgg' ),
			'add_new'               => __( 'Add New', 'tvgg' ),
			'new_item'              => __( 'New Produce', 'tvgg' ),
			'edit_item'             => __( 'Edit Produce', 'tvgg' ),
			'update_item'           => __( 'Update Produce', 'tvgg' ),
			'view_item'             => __( 'View Produce', 'tvgg' ),
			'search_items'          => __( 'Search Produce', 'tvgg' ),
			'not_found'             => __( 'Not found', 'tvgg' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'tvgg' ),
			'featured_image'        => __( 'Featured Image', 'tvgg' ),
			'set_featured_image'    => __( 'Set featured image', 'tvgg' ),
			'remove_featured_image' => __( 'Remove featured image', 'tvgg' ),
			'use_featured_image'    => __( 'Use as featured image', 'tvgg' ),
			'insert_into_item'      => __( 'Insert into item', 'tvgg' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'tvgg' ),
			'items_list'            => __( 'Items list', 'tvgg' ),
			'items_list_navigation' => __( 'Items list navigation', 'tvgg' ),
			'filter_items_list'     => __( 'Filter items list', 'tvgg' ),
		);
		$args = array(
			'label'                 => __( 'Produce', 'tvgg' ),
			'description'           => __( 'Produce Description', 'tvgg' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'publicize' ),
			'taxonomies'            => array(  ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'				=> 'dashicons-carrot',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'rewrite' 				=> array( 'slug' => 'produce', 'with_front' => false ),
			'has_archive'			=> 'produce',
		);
		register_post_type( 'produce', $args );

	}
	add_action( 'init', 'produce', 0 );

	function extras() {

		$labels = array(
			'name'                  => _x( 'Extras', 'Post Type General Name', 'tvgg' ),
			'singular_name'         => _x( 'Extras', 'Post Type Singular Name', 'tvgg' ),
			'menu_name'             => __( 'Extras', 'tvgg' ),
			'name_admin_bar'        => __( 'Extras', 'tvgg' ),
			'archives'              => __( 'Extras Archives', 'tvgg' ),
			'parent_item_colon'     => __( 'Parent Item:', 'tvgg' ),
			'all_items'             => __( 'All Extras', 'tvgg' ),
			'add_new_item'          => __( 'Add New Extras', 'tvgg' ),
			'add_new'               => __( 'Add New', 'tvgg' ),
			'new_item'              => __( 'New Extras', 'tvgg' ),
			'edit_item'             => __( 'Edit Extras', 'tvgg' ),
			'update_item'           => __( 'Update Extras', 'tvgg' ),
			'view_item'             => __( 'View Extras', 'tvgg' ),
			'search_items'          => __( 'Search Extras', 'tvgg' ),
			'not_found'             => __( 'Not found', 'tvgg' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'tvgg' ),
			'featured_image'        => __( 'Featured Image', 'tvgg' ),
			'set_featured_image'    => __( 'Set featured image', 'tvgg' ),
			'remove_featured_image' => __( 'Remove featured image', 'tvgg' ),
			'use_featured_image'    => __( 'Use as featured image', 'tvgg' ),
			'insert_into_item'      => __( 'Insert into item', 'tvgg' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'tvgg' ),
			'items_list'            => __( 'Items list', 'tvgg' ),
			'items_list_navigation' => __( 'Items list navigation', 'tvgg' ),
			'filter_items_list'     => __( 'Filter items list', 'tvgg' ),
		);
		$args = array(
			'label'                 => __( 'Extras', 'tvgg' ),
			'description'           => __( 'Extras Description', 'tvgg' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'publicize' ),
			'taxonomies'            => array(  ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'				=> 'dashicons-carrot',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'rewrite' 				=> array( 'slug' => 'extras', 'with_front' => false ),
			'has_archive'			=> 'extras',
		);
		register_post_type( 'extras', $args );

	}
	add_action( 'init', 'extras', 0 );

	function supplier() {

		$labels = array(
			'name'                  => _x( 'Suppliers', 'Post Type General Name', 'tvgg' ),
			'singular_name'         => _x( 'Supplier', 'Post Type Singular Name', 'tvgg' ),
			'menu_name'             => __( 'Suppliers', 'tvgg' ),
			'name_admin_bar'        => __( 'Suppliers', 'tvgg' ),
			'archives'              => __( 'Suppliers Archives', 'tvgg' ),
			'parent_item_colon'     => __( 'Parent Item:', 'tvgg' ),
			'all_items'             => __( 'All Suppliers', 'tvgg' ),
			'add_new_item'          => __( 'Add New Supplier', 'tvgg' ),
			'add_new'               => __( 'Add New', 'tvgg' ),
			'new_item'              => __( 'New Supplier', 'tvgg' ),
			'edit_item'             => __( 'Edit Supplier', 'tvgg' ),
			'update_item'           => __( 'Update Supplier', 'tvgg' ),
			'view_item'             => __( 'View Supplier', 'tvgg' ),
			'search_items'          => __( 'Search Suppliers', 'tvgg' ),
			'not_found'             => __( 'Not found', 'tvgg' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'tvgg' ),
			'featured_image'        => __( 'Featured Image', 'tvgg' ),
			'set_featured_image'    => __( 'Set featured image', 'tvgg' ),
			'remove_featured_image' => __( 'Remove featured image', 'tvgg' ),
			'use_featured_image'    => __( 'Use as featured image', 'tvgg' ),
			'insert_into_item'      => __( 'Insert into item', 'tvgg' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'tvgg' ),
			'items_list'            => __( 'Items list', 'tvgg' ),
			'items_list_navigation' => __( 'Items list navigation', 'tvgg' ),
			'filter_items_list'     => __( 'Filter items list', 'tvgg' ),
		);
		$args = array(
			'label'                 => __( 'Suppliers', 'tvgg' ),
			'description'           => __( 'Supplier Description', 'tvgg' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'publicize' ),
			'taxonomies'            => array(  ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'				=> 'dashicons-groups',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'suppliers', $args );

	}
	add_action( 'init', 'supplier', 0 );

	function review() {

		$labels = array(
			'name'                  => _x( 'Reviews', 'Post Type General Name', 'tvgg' ),
			'singular_name'         => _x( 'Review', 'Post Type Singular Name', 'tvgg' ),
			'menu_name'             => __( 'Reviews', 'tvgg' ),
			'name_admin_bar'        => __( 'Reviews', 'tvgg' ),
			'archives'              => __( 'Reviews Archives', 'tvgg' ),
			'parent_item_colon'     => __( 'Parent Item:', 'tvgg' ),
			'all_items'             => __( 'All Reviews', 'tvgg' ),
			'add_new_item'          => __( 'Add New Review', 'tvgg' ),
			'add_new'               => __( 'Add New', 'tvgg' ),
			'new_item'              => __( 'New Review', 'tvgg' ),
			'edit_item'             => __( 'Edit Review', 'tvgg' ),
			'update_item'           => __( 'Update Review', 'tvgg' ),
			'view_item'             => __( 'View Review', 'tvgg' ),
			'search_items'          => __( 'Search Reviews', 'tvgg' ),
			'not_found'             => __( 'Not found', 'tvgg' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'tvgg' ),
			'featured_image'        => __( 'Featured Image', 'tvgg' ),
			'set_featured_image'    => __( 'Set featured image', 'tvgg' ),
			'remove_featured_image' => __( 'Remove featured image', 'tvgg' ),
			'use_featured_image'    => __( 'Use as featured image', 'tvgg' ),
			'insert_into_item'      => __( 'Insert into item', 'tvgg' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'tvgg' ),
			'items_list'            => __( 'Items list', 'tvgg' ),
			'items_list_navigation' => __( 'Items list navigation', 'tvgg' ),
			'filter_items_list'     => __( 'Filter items list', 'tvgg' ),
		);
		$args = array(
			'label'                 => __( 'Reviews', 'tvgg' ),
			'description'           => __( 'Review Description', 'tvgg' ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'taxonomies'            => array(  ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'				=> 'dashicons-carrot',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'reviews', $args );

	}
	add_action( 'init', 'review', 0 );

	function recipe() {

		$labels = array(
			'name'                  => _x( 'Recipes', 'Post Type General Name', 'tvgg' ),
			'singular_name'         => _x( 'Recipe', 'Post Type Singular Name', 'tvgg' ),
			'menu_name'             => __( 'Recipes', 'tvgg' ),
			'name_admin_bar'        => __( 'Recipes', 'tvgg' ),
			'archives'              => __( 'Recipes Archives', 'tvgg' ),
			'parent_item_colon'     => __( 'Parent Item:', 'tvgg' ),
			'all_items'             => __( 'All Recipes', 'tvgg' ),
			'add_new_item'          => __( 'Add New Recipe', 'tvgg' ),
			'add_new'               => __( 'Add New', 'tvgg' ),
			'new_item'              => __( 'New Recipe', 'tvgg' ),
			'edit_item'             => __( 'Edit Recipe', 'tvgg' ),
			'update_item'           => __( 'Update Recipe', 'tvgg' ),
			'view_item'             => __( 'View Recipe', 'tvgg' ),
			'search_items'          => __( 'Search Recipes', 'tvgg' ),
			'not_found'             => __( 'Not found', 'tvgg' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'tvgg' ),
			'featured_image'        => __( 'Featured Image', 'tvgg' ),
			'set_featured_image'    => __( 'Set featured image', 'tvgg' ),
			'remove_featured_image' => __( 'Remove featured image', 'tvgg' ),
			'use_featured_image'    => __( 'Use as featured image', 'tvgg' ),
			'insert_into_item'      => __( 'Insert into item', 'tvgg' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'tvgg' ),
			'items_list'            => __( 'Items list', 'tvgg' ),
			'items_list_navigation' => __( 'Items list navigation', 'tvgg' ),
			'filter_items_list'     => __( 'Filter items list', 'tvgg' ),
		);
		$args = array(
			'label'                 => __( 'Recipes', 'tvgg' ),
			'description'           => __( 'Recipe Description', 'tvgg' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'publicize' ),
			'taxonomies'            => array(  ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'				=> 'dashicons-book-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'recipes', $args );

	}
	add_action( 'init', 'recipe', 0 );

	function product_produce() {
	    p2p_register_connection_type( array(
	        'name' => 'product_produce',
	        'from' => 'product',
	        'to' => 'produce'
	    ) );
	}
	add_action( 'p2p_init', 'product_produce' );

	function extras_produce() {
	    p2p_register_connection_type( array(
	        'name' => 'extras_produce',
	        'from' => 'product',
	        'to' => 'extras'
	    ) );
	}
	add_action( 'p2p_init', 'extras_produce' );

	function supplier_produce() {
	    p2p_register_connection_type( array(
	        'name' => 'supplier_produce',
	        'from' => 'suppliers',
	        'to' => 'produce'
	    ) );
	}
	add_action( 'p2p_init', 'supplier_produce' );

	function supplier_extras() {
	    p2p_register_connection_type( array(
	        'name' => 'supplier_extras',
	        'from' => 'suppliers',
	        'to' => 'extras'
	    ) );
	}
	add_action( 'p2p_init', 'supplier_extras' );

	function supplier_product() {
	    p2p_register_connection_type( array(
	        'name' => 'supplier_product',
	        'from' => 'suppliers',
	        'to' => 'product'
	    ) );
	}
	add_action( 'p2p_init', 'supplier_product' );

	function recipe_produce() {
	    p2p_register_connection_type( array(
	        'name' => 'recipe_produce',
	        'from' => 'recipes',
	        'to' => 'produce'
	    ) );
	}
	add_action( 'p2p_init', 'recipe_produce' );

	add_post_type_support( 'recipes', 'comments' );

// Register Custom Taxonomy
function produce_cat() {

	$labels = array(
		'name'                       => _x( 'Produce Categories', 'Taxonomy General Name', 'vgg' ),
		'singular_name'              => _x( 'Produce Category', 'Taxonomy Singular Name', 'vgg' ),
		'menu_name'                  => __( 'Produce Categories', 'vgg' ),
		'all_items'                  => __( 'Produce Categories', 'vgg' ),
		'parent_item'                => __( 'Produce Category', 'vgg' ),
		'parent_item_colon'          => __( 'Parent Produce Category:', 'vgg' ),
		'new_item_name'              => __( 'New Produce CategoryName', 'vgg' ),
		'add_new_item'               => __( 'Add New Produce Category', 'vgg' ),
		'edit_item'                  => __( 'Edit Produce Category', 'vgg' ),
		'update_item'                => __( 'Update Produce Category', 'vgg' ),
		'view_item'                  => __( 'View Produce Category', 'vgg' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'vgg' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'vgg' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'vgg' ),
		'popular_items'              => __( 'Popular Items', 'vgg' ),
		'search_items'               => __( 'Search Items', 'vgg' ),
		'not_found'                  => __( 'Not Found', 'vgg' ),
		'no_terms'                   => __( 'No items', 'vgg' ),
		'items_list'                 => __( 'Items list', 'vgg' ),
		'items_list_navigation'      => __( 'Items list navigation', 'vgg' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
		'rewrite'					 => array( 'slug' => 'produce_category', 'with_front' => false ),
	);
	register_taxonomy( 'produce_category', array( 'produce' ), $args );

}
add_action( 'init', 'produce_cat', 0 );

function wpa_show_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'show' ){
        $terms = wp_get_object_terms( $post->ID, 'produce_category' );
        if( $terms ){
            return str_replace( '%produce_category%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'wpa_show_permalinks', 1, 2 );