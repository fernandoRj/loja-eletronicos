<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package storefront
 */
if ( ! is_active_sidebar( 'lateral-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'novo1' ); ?>
</div><!-- #secondary -->