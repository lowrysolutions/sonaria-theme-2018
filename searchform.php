<?php
/**
 * The template for displaying search form
 *
 * @package Sonaria_Theme_2018
 * @since FoundationPress 1.0.0
 */
 ?>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="input-group">
		<input type="text" class="input-group-field" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'sonaria-theme-2018' ); ?>">
		<div class="input-group-button">
			<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'sonaria-theme-2018' ); ?>" class="button">
		</div>
	</div>
</form>
