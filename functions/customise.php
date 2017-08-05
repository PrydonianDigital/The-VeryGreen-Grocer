<?php

	function vgg_theme_customiser( $wp_customize ) {

		$wp_customize->add_panel( 'vgg_schema', array(
			'priority'			=> 30,
			'theme_supports'	=> '',
			'title'				=> __( 'VGG Options', 'ch' ),
			'capability'		=> 'edit_theme_options',
		) );

		$wp_customize->add_section( 'vgg_schema_section' , array(
			'title'				=> __( 'Hide Extras', 'ch' ),
			'priority'			=> 30,
			'description'		=> 'This section allows you to quickly hide an extras section).',
			'panel'				=> 'vgg_schema',
		) );
		$wp_customize->add_setting( 'vgg_extra1' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vgg_extra1', array(
			'label'				=> __( 'Extra 1', 'ch' ),
			'section'			=> 'vgg_schema_section',
			'settings'			=> 'vgg_extra1',
			'type'					=> 'input',
		) ) );
		$wp_customize->add_setting( 'vgg_extra2' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vgg_extra2', array(
			'label'				=> __( 'Extra 2', 'ch' ),
			'section'			=> 'vgg_schema_section',
			'settings'			=> 'vgg_extra2',
			'type'					=> 'input',
		) ) );
		$wp_customize->add_setting( 'vgg_extra3' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vgg_extra3', array(
			'label'				=> __( 'Extra 3', 'ch' ),
			'section'			=> 'vgg_schema_section',
			'settings'			=> 'vgg_extra3',
			'type'					=> 'input',
		) ) );
		$wp_customize->add_setting( 'vgg_extra4' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vgg_extra4', array(
			'label'				=> __( 'Extra 4', 'ch' ),
			'section'			=> 'vgg_schema_section',
			'settings'			=> 'vgg_extra4',
			'type'					=> 'input',
		) ) );
		$wp_customize->add_setting( 'vgg_extra5' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vgg_extra5', array(
			'label'				=> __( 'Extra 5', 'ch' ),
			'section'			=> 'vgg_schema_section',
			'settings'			=> 'vgg_extra5',
			'type'					=> 'input',
		) ) );

	}
	add_action( 'customize_register', 'vgg_theme_customiser' );