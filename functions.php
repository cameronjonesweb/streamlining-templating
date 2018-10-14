<?php
/**
 * Main functions file
 *
 * @package cameronjonesweb-wcbne18
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/**
 * Include file responsible for enqueuing resources
 */
require_once 'inc/assets.php';

/**
 * Include file responsible for adding Bootstrap classes
 */
require_once 'inc/bootstrap-compat.php';

/**
 * Include file responsible for Customizer setup
 */
require_once 'inc/customizer.php';

/**
 * Include file responsible for main theme setup
 */
require_once 'inc/setup.php';

/**
 * Include file responsible for templating
 */
require_once 'inc/templating.php';

/**
 * Include file responsible for widgets
 */
require_once 'inc/widgets.php';
