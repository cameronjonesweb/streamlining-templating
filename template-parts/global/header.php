<?php
/**
 * Theme header bar
 *
 * @package streamlining-templating
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}
?>
<header>
	<!-- Fixed navbar -->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<div class="container">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			} else {
				printf(
					'<a class="navbar-brand" href="%1$s">%2$s</a>',
					esc_url( home_url() ),
					esc_html( get_bloginfo( 'name' ) )
				);
			}
			?>
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php
			wp_nav_menu(
				[
					'theme_location'  => 'header',
					'fallback_cb'     => false,
					'container_class' => 'navbar-collapse collapse',
					'menu_class'      => 'navbar-nav ml-auto',
					'container_id'    => 'navbarCollapse',
				]
			);
			?>
			<!-- <div class="navbar-collapse collapse" id="navbarCollapse" style="">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Dropdown
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#">Disabled</a>
					</li>
				</ul>
			</div> -->
		</div>
	</nav>
</header>
