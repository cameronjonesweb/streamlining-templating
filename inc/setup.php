<?php
/**
 * Main functions file
 *
 * @package cameronjonesweb-wcbne18
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

add_action( 'after_setup_theme', 'theme_supports' );
add_action( 'after_setup_theme', 'register_menus' );
add_action( 'wp_head', 'meta_tags', 1 );
add_action( 'widgets_init', 'register_widget_areas' );

/**
 * Adds the theme support
 */
function theme_supports() {
	add_theme_support( 'title-tag' );
	add_theme_support(
		'custom-logo',
		[
			'width'  => 171,
			'height' => 36,
		]
	);
	add_theme_support(
		'custom-header',
		[
			'width'  => 1920,
			'height' => 300,
		]
	);
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ] );
}

/**
 * Register the theme's menu areas
 */
function register_menus() {
	register_nav_menus(
		[
			'header' => 'Header Menu',
			'footer' => 'Footer Menu',
		]
	);
}

/**
 * Adds all the meta tags
 */
function meta_tags() {
	?>
	<meta charset=<?php bloginfo( 'charset' ); ?>>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
}

/**
 * Register widget areas
 */
function register_widget_areas() {
	register_sidebar(
		[
			'name'          => __( 'Sidebar', 'cameronjonesweb-wcbne18' ),
			'id'            => 'sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);
}
