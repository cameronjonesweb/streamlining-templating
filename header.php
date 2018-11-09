<?php
/**
 * Theme header file
 *
 * @package streamlining-templating
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
