<?php
/**
 * Main functions file
 *
 * @package cameronjonesweb-wcbne18
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts_and_styles' );

/**
 * Add all the scripts and styles for the theme
 */
function enqueue_scripts_and_styles() {
	// Styles.
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', [], '4.1.3' );
	wp_enqueue_style( 'theme-css', get_stylesheet_uri(), [], filemtime( trailingslashit( get_stylesheet_directory() ) . 'style.css' ) );

	// Scripts.
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', [ 'jquery' ], '4.1.3', true );
}
