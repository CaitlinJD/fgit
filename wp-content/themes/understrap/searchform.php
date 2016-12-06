<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package understrap
 */

?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Search Site', 'understrap' ); ?>">


		<span class="input-group-btn">

			<input class="submit btn btn-primary header-icon" id="searchsubmit" type="submit" value="">

	</span>
	</div>
</form>