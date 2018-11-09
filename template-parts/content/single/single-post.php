<?php
/**
 * Main partial for single blog posts
 *
 * @package streamlining-templating
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}
?>
<div <?php post_class(); ?>>
	<h1><?php the_title(); ?></h1>
	<p class="text-muted">
		<?php
		printf(
			/* translators: 1: The date. 2: Author's name */
			esc_html__( 'Posted %1$s by %2$s', 'streamlining-templating' ),
			get_the_date(),
			wp_kses_post( get_the_author_posts_link() )
		);
		?>
	</p>
	<?php the_content(); ?>
	<p class="font-italic mb-0">
		<?php
		echo esc_html__( 'Posted in: ', 'streamlining-templating' );
		the_category( ', ' );
		?>
	</p>
	<p class="font-italic">
		<?php the_tags(); ?>
	</p>
</div>
