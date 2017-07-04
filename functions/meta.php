<?php

	add_action( 'cmb2_init', 'home_page' );
	function home_page() {
		$prefix = '_home_';
		$cmb_home = new_cmb2_box( array(
			'id'			=> 'home',
			'title'		 => 'Page Sections',
			'object_types'  => array( 'page' ),
			'show_on'	  => array( 'key' => 'page-template', 'value' => 'page-home.php' ),
		) );

		$home_group = $cmb_home->add_field( array(
			'id' => $prefix . 'home',
			'type' => 'group',
			'options'	 => array(
				'group_title'   => __( 'Section {#}', 'bci' ),
				'add_button'	=> __( 'Add New Section', 'bci' ),
				'remove_button' => __( 'Remove Section', 'bci' ),
				'sortable'	  => true,
			),
		) );
		$cmb_home->add_group_field( $home_group, array(
			'name' => 'Tick if Product section',
			'id'   => '_prod',
			'type' => 'checkbox',
		) );
		$cmb_home->add_group_field( $home_group, array(
			'name' => 'Text Section',
			'id'   => '_reason',
			'type' => 'wysiwyg',
		) );
		$cmb_home->add_group_field( $home_group, array(
			'name'	   => 'Show Product',
			'id'		 => '_product',
			'type'	   => 'select',
			'options_cb' => 'att_link',
		) );
	}

	add_action( 'cmb2_admin_init', 'reviews' );
	function reviews() {
		$prefix = '_reviews_';
		$cmb_home = new_cmb2_box( array(
			'id'		=> $prefix . 'review',
			'title'		 => 'Review Details',
			'object_types'  => array( 'reviews' ),
		) );
		$cmb_home->add_field(array(
			'name' => 'Reviewer name',
			'id'   => $prefix . 'name',
			'type' => 'text',
		) );
		$cmb_home->add_field(array(
			'name' => 'Review',
			'id'   => $prefix . 'home',
			'type' => 'textarea',
		) );
		$cmb_home->add_field(array(
			'name'	   => 'Product reviewed',
			'id'		=> $prefix . 'product',
			'type'	   => 'select',
			'options_cb' => 'att_link',
		) );
	}

	function att_link_start( $query_args ) {
		$args = wp_parse_args( $query_args, array(
			'post_type'   => 'product',
			'numberposts' => -1,
		) );
		$posts = get_posts( $args );
		$post_options = array();
		if ( $posts ) {
			foreach ( $posts as $post ) {
			  $post_options[ $post->ID ] = $post->post_title;
			}
		}
		return $post_options;
	}
	function att_link() {
		return att_link_start( array( 'post_type' => 'product', 'numberposts' => -1 ) );
	}

