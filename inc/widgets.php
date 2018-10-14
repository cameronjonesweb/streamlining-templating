<?php
/**
 * File responsible for widgets
 *
 * @package cameronjonesweb-wcbne18
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

add_action( 'widgets_init', 'theme_register_widgets' );

/**
 * Register our sidebars and widgetized areas.
 */
function theme_register_widgets() {

	register_sidebar(
		[
			'name'          => __( 'Sidebar', 'cameronjonesweb-wcbne18' ),
			'id'            => 'sidebar',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		]
	);

}
