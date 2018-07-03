 <?php
/**
* The sidebar containing the second sidebar area.
*
* @package storefront
*/

if ( ! is_active_sidebar( 'sidebar2' ) ) {
    return;
}
?>


<div id="secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar2' ); ?>
</div><!-- #secondary -->