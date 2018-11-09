<?php
/**
 * Theme sidebar template file
 *
 * @package streamlining-templating
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

if ( is_active_sidebar( 'sidebar' ) ) {
	$display_sidebar = get_theme_mod( 'show_sidebar', 'none' );
	if ( 'left' === $display_sidebar ) {
		$col_order = 0;
	} elseif ( 'right' === $display_sidebar ) {
		$col_order = 12;
	}
	?>
	<aside id="sidebar" class="col-md-4 order-12 order-md-<?php echo esc_attr( $col_order ); ?>">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</aside>
	<?php
}
