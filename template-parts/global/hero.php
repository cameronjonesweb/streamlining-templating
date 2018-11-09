<?php
/**
 * Theme jumbotron hero
 *
 * @package streamlining-templating
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

$style = '';

if ( has_header_image() ) {
	$style .= sprintf( 'background: url(%1$s) no-repeat center;', get_header_image() );
	$style .= 'background-size: cover;';
}

if ( get_header_textcolor() ) {
	$style .= sprintf( 'color: #%1$s;', get_header_textcolor() );
}
?>
<div class="jumbotron rounded-0 mb-0" style="<?php echo esc_attr( $style ); ?>">
	<div class="container">
		<h1 class="display-3"><?php bloginfo( 'name' ); ?></h1>
		<p><?php bloginfo( 'description' ); ?></p>
	</div>
</div>
