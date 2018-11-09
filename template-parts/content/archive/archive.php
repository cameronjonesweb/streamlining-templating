<?php
/**
 * Main partial for archive listings
 *
 * @package streamlining-templating
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}
?>
<div <?php post_class(); ?>>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php the_excerpt(); ?>
</div>
