<?php
/**
 * Main partial for blog post listings
 *
 * @package cameronjonesweb-wcbne18
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}
?>
<div <?php post_class(); ?>>
	<h3 class="mb-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<p class="text-muted">
		<?php
		printf(
			/* translators: 1: Opening anchor for the link to the post. 2: The date. 3: The closing anchor. 4: Author's name */
			esc_html__( 'Posted %1$s%2$s%3$s by %4$s' ),
			sprintf( '<a href="%1$s">', esc_url( get_the_permalink() ) ),
			get_the_date(),
			'</a>',
			wp_kses_post( get_the_author_posts_link() )
		);
		?>
	</p>
	<?php the_excerpt(); ?>
	<p class="font-italic mb-0">
		<?php
		echo esc_html__( 'Posted in: ' );
		the_category( ', ' );
		?>
	</p>
	<p class="font-italic">
		<?php the_tags(); ?>
	</p>
</div>
