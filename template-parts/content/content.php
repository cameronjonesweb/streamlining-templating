<?php
/**
 * Main theme template routing
 *
 * @package cameronjonesweb-wcbne18
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

if ( is_singular() ) {
	get_template_part( 'template-parts/content/single/single', get_post_type() );
} elseif ( is_archive() || is_home() ) {
	get_template_part( 'template-parts/content/archive/archive', get_post_type() );
} elseif ( is_search() ) {
	get_template_part( 'template-parts/content/archive/archive', 'search' );
}
