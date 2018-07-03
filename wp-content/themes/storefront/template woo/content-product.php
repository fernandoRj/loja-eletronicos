<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>


<li <?php post_class(); ?>>
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	

	

	
	?>
	
	
	
	


  <div class="col-xs-12">
    <div class="thumbnail">
	  <?php woocommerce_template_loop_product_link_open ()?>
      <?php woocommerce_template_loop_product_thumbnail()?> 
      <div class="caption">
	  
        <h1><?php woocommerce_template_loop_product_title()?> </h1>
		<p><?php woocommerce_template_loop_price()?> </p>
        <p><?php woocommerce_template_loop_rating()?></p>
		<p> <?php the_content(); ?></p>
        <p><?php woocommerce_template_loop_add_to_cart ()?></p>
      </div>
    </div>
  
</div>


</li>
