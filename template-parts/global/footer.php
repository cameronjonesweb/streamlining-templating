<?php
/**
 * Theme footer
 *
 * @package cameronjonesweb-wcbne18
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}
?>
<footer class="text-center text-sm-left border-top pt-4 pb-4 bg-light text-muted">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-9">
				<?php
				wp_nav_menu(
					[
						'theme_location' => 'footer',
						'depth'          => -1,
						'menu_class'     => 'card-columns list-unstyled',
						'fallback_cb'    => false,
					]
				);
				?>
			</div>
			<div class="col-12 col-md-3">
				<p>
					<?php
					printf(
						/* translators: 1.  */
						esc_html__( 'Copyright &copy; %1$s.%5$sWebsite by %2$sCameron Jones%3$s for %4$sWordCamp Brisbane 2018%3$s' ),
						esc_html( current_time( 'Y' ) ),
						'<a href="https://cameronjonesweb.com.au" target="_blank" rel="noopener">',
						'</a>',
						'<a href="https://2018.brisbane.wordcamp.org" target="_blank" rel="noopener">',
						'<br/>'
					);
					?>
				</p>
			</div>
		</div>
	</div>
</footer>
