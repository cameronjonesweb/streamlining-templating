<?php
/**
 * File responsible for templating
 *
 * @package streamlining-templating
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

// Fix empty pages to fire the same hooks.
add_action( 'loop_no_results', 'theme_loop_no_results_start', -1000 );
add_action( 'loop_no_results', 'theme_loop_no_results_end', 1000 );

// Header.
add_action( 'loop_start', 'theme_header', -10 );

// Hero.
add_action( 'loop_start', 'theme_hero', -5 );

// Main wrap.
add_action( 'loop_start', 'theme_main_wrap_start', 0 );
add_action( 'loop_end', 'theme_main_wrap_close', 15 );

// Main content.
add_action( 'loop_start', 'theme_content_wrap_start', 1 );
add_action( 'loop_end', 'theme_content_wrap_close', 11 );

// Sidebar.
add_action( 'template_redirect', 'theme_maybe_show_sidebar' );

// Footer.
add_action( 'loop_end', 'theme_footer', 20 );

// Add search form to search results.
add_action( 'loop_start', 'theme_search_bar', 10 );

// Main 404 content.
add_action( 'loop_no_results', 'theme_404_content', 10 );

// Pagination.
add_action( 'loop_end', 'theme_archive_pagnination', 9 );
add_action( 'loop_end', 'theme_pagination_within_a_post', 5 );

/**
 * Main theme render function
 * This function controls all the functionality required to display the site rather than relying on the template heirarchy
 */
function render() {
	get_header();
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content/content' );
		}
	}
	get_footer();
}

/**
 * Gets the theme header
 */
function theme_header() {
	get_template_part( 'template-parts/global/header' );
}

/**
 * Gets the theme hero
 */
function theme_hero() {
	get_template_part( 'template-parts/global/hero' );
}

/**
 * Gets the theme footer
 */
function theme_footer() {
	get_template_part( 'template-parts/global/footer' );
}

/**
 * Gets the theme sidebar
 */
function theme_sidebar() {
	get_sidebar();
}

/**
 * Adds the sidebar
 */
function theme_maybe_show_sidebar() {
	$display_sidebar = get_theme_mod( 'show_sidebar', 'none' );
	if ( 'none' !== $display_sidebar ) {
		add_action( 'loop_end', 'theme_sidebar', 14 );
	}
}

/**
 * Opens the main content wrap
 */
function theme_main_wrap_start() {
	echo '<main class="container pt-4 pb-4"><div class="row">';
}

/**
 * Closes the main content wrap
 */
function theme_main_wrap_close() {
	echo '</div></main>';
}

/**
 * Opens the main content wrap
 */
function theme_content_wrap_start() {
	$width           = '';
	$display_sidebar = get_theme_mod( 'show_sidebar', 'none' );
	if ( 'none' !== $display_sidebar ) {
		$width = 'col-md-8';
	}
	printf( '<article class="col %1$s order-6">', sanitize_html_class( $width ) );
}

/**
 * Closes the main content wrap
 */
function theme_content_wrap_close() {
	echo '</article>';
}

/**
 * Adds the search form on search pages
 */
function theme_search_bar() {
	if ( is_search() ) {
		printf(
			'<h1>%1$s</h1>',
			esc_html__( 'Search', 'streamlining-templating' )
		);
		get_search_form();
	}
}

/**
 * Gets the 404 page template
 */
function theme_404_content() {
	if ( is_404() ) {
		get_template_part( 'template-parts/content/misc/404' );
	}
}

/**
 * Runs the loop_start hook on pages with an empty loop
 */
function theme_loop_no_results_start() {
	do_action( 'loop_start' );
}

/**
 * Runs the loop_end hook on pages with an empty loop
 */
function theme_loop_no_results_end() {
	do_action( 'loop_end' );
}

/**
 * Adds pagination on archive pages
 */
function theme_archive_pagnination() {
	if ( is_search() || is_home() || is_archive() ) {
		get_template_part( 'template-parts/content/archive/pagination' );
	}
}

/**
 * Adds pagination for pages with <!--nextpage--> markup
 */
function theme_pagination_within_a_post() {
	if ( is_singular() ) {
		wp_link_pages(
			[
				'before' => '<nav><ul class="pagination">',
				'after'  => '</ul></nav>',
			]
		);
	}
}
