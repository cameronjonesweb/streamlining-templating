<?php
/**
 * Adds Bootstrap classes to things that need it
 *
 * @package cameronjonesweb-wcbne18
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

add_filter( 'do_shortcode_tag', 'theme_add_figure_classes_to_images', 10, 4 );
add_filter( 'post_class', 'theme_add_clearfix_to_posts' );
add_filter( 'the_content', 'theme_add_img_fluid_class' );
add_filter( 'the_content', 'theme_add_table_class' );
add_filter( 'the_content', 'theme_add_blockquote_class' );
add_filter( 'wp_link_pages_link', 'theme_bootstrap_link_pages', 10, 2 );
add_filter( 'post_class', 'theme_add_border_to_archive_posts' );

// Header nav meun.
add_filter( 'nav_menu_css_class', 'theme_menu_item_class', 10, 4 );
add_filter( 'nav_menu_link_attributes', 'theme_menu_item_anchor_class', 10, 4 );
add_filter( 'nav_menu_submenu_css_class', 'theme_submenu_class', 10, 3 );

/**
 * Adds Bootrstrap figure classes to images with captions
 *
 * @param string       $output Shortcode output.
 * @param string       $tag The shortcode tag.
 * @param string|array $attr Shortcode attributes.
 * @param array        $m Regular expression match array.
 * @return string
 */
function theme_add_figure_classes_to_images( $output, $tag, $attr, $m ) {
	if ( 'caption' === $tag ) {
		$output = str_replace( 'wp-caption-text', 'figure-caption', $output );
		$output = str_replace( 'wp-caption', 'wp-caption figure', $output );
		$output = str_replace( 'wp-image', 'figure-img wp-image', $output );
		$output = str_replace( 'figure-caption', 'wp-caption-text figure-caption', $output );
	}
	return $output;
}

/**
 * Adds a clearfix class to the post class to clear any floats
 *
 * @param array $classes Array of post classes.
 * @return array
 */
function theme_add_clearfix_to_posts( $classes ) {
	$classes[] = 'clearfix';
	return $classes;
}

/**
 * Adds the fluid class to images in the content
 *
 * @param string $content Post content.
 * @return string
 */
function theme_add_img_fluid_class( $content ) {
	$content = str_replace( 'wp-image', 'img-fluid wp-image', $content );
	return $content;
}

/**
 * Adds the table class to tables in the content
 *
 * @param string $content Post content.
 * @return string
 */
function theme_add_table_class( $content ) {
	$content = str_replace( '<table>', '<table class="table">', $content );
	return $content;
}

/**
 * Adds the blockquote class to blockquotes in the content
 *
 * @param string $content Post content.
 * @return string
 */
function theme_add_blockquote_class( $content ) {
	$content = str_replace( '<blockquote', '<blockquote class="blockquote"', $content );
	return $content;
}

/**
 * Custom pagination template to take advantage of Bootstrap styles
 *
 * @param bool $echo Display or return pagination.
 * @return string|void
 */
function theme_bootstrap_pagination( $echo = true ) {
	$return     = '';
	$pagination = paginate_links(
		[
			'type'     => 'array',
			'mid_size' => 1,
		]
	);
	if ( ! empty( $pagination ) ) {
		$return .= sprintf( '<nav aria-label="%1$s" class="mt-4">', __( 'Posts navigation' ) );
		$return .= '<ul class="pagination">';
		foreach ( $pagination as $p ) {
			$custom_class = [];
			if ( is_numeric( strpos( $p, 'dots' ) ) ) {
				$custom_class[] = 'disabled';
			}
			if ( is_numeric( strpos( $p, 'current' ) ) ) {
				$custom_class[] = 'active';
			}
			$return .= sprintf(
				'<li class="page-item %2$s">%1$s</li>',
				str_replace( 'page-numbers', 'page-numbers page-link', $p ),
				implode( ' ', $custom_class )
			);
		}
		$return .= '</ul>';
		$return .= '</nav>';
	}
	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}
}

/**
 * Updates the markup of wp_link_pages to use Bootstrap's pagination styles
 *
 * @param string $link The link markup.
 * @param int    $i Page number.
 * @return string
 */
function theme_bootstrap_link_pages( $link, $i ) {
	$custom_class = [];
	if ( is_numeric( strpos( $link, '<a' ) ) ) {
		$link = str_replace( '<a', '<a class="page-link"', $link );
	} else { // Assume that it's the current page.
		$link           = sprintf( '<span class="page-link">%1$s</span>', $link );
		$custom_class[] = 'active';
	}
	return sprintf(
		'<li class="page-item %2$s">%1$s</li>',
		$link,
		implode( ' ', $custom_class )
	);
}

/**
 * Adds a border to the bottom of posts in an archive list
 *
 * @param array $classes Array of post classes.
 * @return array
 */
function theme_add_border_to_archive_posts( $classes ) {
	if ( is_archive() || is_home() || is_search() ) {
		$classes[] = 'mb-3';
		$classes[] = 'border-bottom';
	}
	return $classes;
}

/**
 * Adds the Bootstrap classes to the `<li>` element in the navbar menu
 *
 * @param array    $classes The CSS classes that are applied to the menu item's `<li>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @param int      $depth Depth of menu item. Used for padding.
 */
function theme_menu_item_class( $classes, $item, $args, $depth ) {
	if ( 'header' === $args->theme_location ) {
		if ( 0 === $depth ) {
			$classes[] = 'nav-item';
		}
		if ( in_array( 'menu-item-has-children', $classes, true ) ) {
			$classes[] = 'dropdown';
		}
	}
	return $classes;
}

/**
 * Adds the Bootstrap classes to the `<a>` element in the navbar menu
 *
 * @param array    $atts The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @param int      $depth Depth of menu item. Used for padding.
 */
function theme_menu_item_anchor_class( $atts, $item, $args, $depth ) {
	if ( 'header' === $args->theme_location ) {
		$atts['class'] = ! isset( $atts['class'] ) ? '' : $atts['class'];
		if ( 0 === $depth ) {
			$atts['class'] .= ' nav-link';
		}
		if ( $depth > 0 ) {
			$atts['class'] .= ' dropdown-item';
		}
		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
			$atts['class']        .= ' dropdown-toggle';
			$atts['role']          = 'button';
			$atts['data-toggle']   = 'dropdown';
			$atts['aria-haspopup'] = 'true';
			$atts['aria-expanded'] = 'false';
		}
	}
	return $atts;
}

/**
 * Adds the Bootstrap classes to the `<ul>` submenu element in the navbar menu
 *
 * @param array    $classes The CSS classes that are applied to the menu `<ul>` element.
 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
 * @param int      $depth   Depth of menu item. Used for padding.
 */
function theme_submenu_class( $classes, $args, $depth ) {
	if ( 'header' === $args->theme_location ) {
		$classes[] = 'dropdown-menu';
	}
	return $classes;
}

add_filter( 'wp_nav_menu_objects', 'theme_duplicate_parent_menu_item', 10, 2 );

function theme_duplicate_parent_menu_item( $sorted_menu_items, $args ) {
	return $sorted_menu_items;
}
