<?php
/**
 * Theme 404 page content
 *
 * @package cameronjonesweb-wcbne18
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}
?>
<h1><?php echo esc_html__( '404 Page Not Found', 'cameronjonesweb-wcbne18' ); ?></h1>
<p><?php echo esc_html__( 'The page you were looking for could not be found. I\'m sorry, it\'s not your fault... probably.', 'cameronjonesweb-wcbne18' ); ?></p>
<p><?php echo esc_html__( 'Perhaps try searching for what you were looking for?', 'cameronjonesweb-wcbne18' ); ?></p>
<?php
get_search_form();
