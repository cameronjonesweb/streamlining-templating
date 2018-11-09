<?php
/**
 * Theme Customizer config
 *
 * @package streamlining-templating
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

add_action( 'customize_register', 'theme_customize_sections' );
add_action( 'customize_register', 'theme_customize_settings' );
add_action( 'customize_register', 'theme_customize_controls' );
add_action( 'customize_register', 'theme_customize_partials' );

/**
 * Add Customizer sections
 *
 * @param WP_Customize_Manager $wp_customize The WP_Customize_Manager object.
 */
function theme_customize_sections( WP_Customize_Manager $wp_customize ) {
	$wp_customize->add_section(
		'theme-settings',
		[
			'title'       => __( 'Theme Settings', 'streamlining-templating' ),
			'priority'    => 30,
			'description' => __( 'Unique theme settings', 'streamlining-templating' ),
		]
	);
}

/**
 * Add Customizer settings
 *
 * @param WP_Customize_Manager $wp_customize The WP_Customize_Manager object.
 */
function theme_customize_settings( WP_Customize_Manager $wp_customize ) {
	$wp_customize->add_setting(
		'show_sidebar',
		[
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_attr',
			'default'           => 'none',
		]
	);
}

/**
 * Add Customizer controls
 *
 * @param WP_Customize_Manager $wp_customize The WP_Customize_Manager object.
 */
function theme_customize_controls( WP_Customize_Manager $wp_customize ) {
	$wp_customize->add_control(
		'show_sidebar',
		[
			'label'   => __( 'Display Sidebar' ),
			'section' => 'theme-settings',
			'type'    => 'select',
			'choices' => [
				'none'  => __( 'None', 'streamlining-templating' ),
				'left'  => __( 'Left', 'streamlining-templating' ),
				'right' => __( 'Right', 'streamlining-templating' ),
			],
		]
	);
}

/**
 * Add Customizer partial refresh callbacks
 *
 * @param WP_Customize_Manager $wp_customize The WP_Customize_Manager object.
 */
function theme_customize_partials( WP_Customize_Manager $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->selective_refresh->add_partial(
		'blogname',
		[
			'selector'            => '.jumbotron h1',
			'container_inclusive' => false,
			'render_callback'     => function() {
				bloginfo( 'title', 'display' );
			},
		]
	);

	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		[
			'selector'            => '.jumbotron p',
			'container_inclusive' => false,
			'render_callback'     => function() {
				bloginfo( 'description', 'display' );
			},
		]
	);

	$wp_customize->get_setting( 'header_image' )->transport = 'postMessage';
	$wp_customize->selective_refresh->add_partial(
		'header_image',
		[
			'selector'            => '.jumbotron',
			'container_inclusive' => true,
			'render_callback'     => 'theme_hero',
		]
	);

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->selective_refresh->add_partial(
		'header_textcolor',
		[
			'selector'            => '.jumbotron',
			'container_inclusive' => true,
			'render_callback'     => 'theme_hero',
		]
	);
}
