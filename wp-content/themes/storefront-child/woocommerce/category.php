<?php
/* 
Template Name: Archives
*/
get_header(); ?>
<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="row" id="areasite">



<div class="vertical-menu col-md-2 col-xs-12">
<?php get_sidebar();?>
</div>



<div class="principal col-md-9 col-xs-12">
 


<div class="container-fluid">
 
<?php while ( have_posts() ) : the_post(); ?>
                 

 


	

  <div class="col-md-4 col-sm-6 col-xs-12 thumbdiv1">
    <div class="thumbnail1">
	  <?php woocommerce_template_loop_product_link_open ()?>
      <?php woocommerce_template_loop_product_thumbnail()?> 
      <div class="caption" id="caption1">
	  
         <?php woocommerce_template_loop_product_title()?> 
		<?php woocommerce_template_loop_price()?> 
		<?php woocommerce_template_loop_product_link_close ()?>
        <?php woocommerce_template_loop_rating()?>
		
        <?php woocommerce_template_loop_add_to_cart ()?>
      </div>
    </div>
  
</div>

	


 
<?php endwhile; // end of the loop. ?>


 </div>	
</div>


</div>
<?php get_footer(); ?>