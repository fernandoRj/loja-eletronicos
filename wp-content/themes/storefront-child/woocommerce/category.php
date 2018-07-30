<?php
/* 
Template Name: categorias
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
                 

 


	


     <div class="tamanho col-xs-12 col-md-6">
    <div class="thumbnail1">
	  <?php woocommerce_template_loop_product_link_open ()?>
        
      <?php woocommerce_template_loop_product_thumbnail()?> 
            
      <div class="caption" id="caption1">
	  
        <h1 > <?php woocommerce_template_loop_product_title()?> </h1>
		<p class="price1"><?php woocommerce_template_loop_price()?> </p>
        <p><?php woocommerce_template_loop_rating()?></p>
		<p> <?php the_content() ?></p>
      
      </div>
    
	  <?php woocommerce_template_loop_add_to_cart ()?>
        
    </div>
   




</div>


	


 
<?php endwhile; // end of the loop. ?>


 </div>	
</div>


</div>
<?php get_footer(); ?>