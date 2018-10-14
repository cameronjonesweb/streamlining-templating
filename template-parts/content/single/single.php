<?php
/**
 * Main partial for single pages
 *
 * @package cameronjonesweb-wcbne18
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}
?>
<div <?php post_class(); ?>>
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
</div>
