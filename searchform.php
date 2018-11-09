<?php
/**
 * Main partial for blog post listings
 *
 * @package streamlining-templating
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}
?>
<form role="search" method="get" id="searchform" class="searchform form-inline mb-3" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group mr-sm-2">
		<label class="screen-reader-text" for="s"><?php echo esc_html_x( 'Search for:', 'label', 'cameronjonesweb-wcbne18' ); ?>'</label>
		<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="form-control" />
	</div>
	<input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'cameronjonesweb-wcbne18' ); ?>" class="btn btn-primary" />
</form>
