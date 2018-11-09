<?php
/**
 * Theme 404 page content
 *
 * @package streamlining-templating
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}
?>
<h1><?php echo esc_html__( '404 Page Not Found', 'streamlining-templating' ); ?></h1>
<p><?php echo esc_html__( 'The page you were looking for could not be found. I\'m sorry, it\'s not your fault... probably.', 'streamlining-templating' ); ?></p>
<p><?php echo esc_html__( 'Perhaps try searching for what you were looking for?', 'streamlining-templating' ); ?></p>
<?php
get_search_form();
