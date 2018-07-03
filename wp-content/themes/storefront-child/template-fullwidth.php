<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Full width
 *
 * @package storefront
 */

get_header(); ?>


<div class="row">
<div class="container-fluids">



<div class="col-full">

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active" style="background-image:url('http://placehold.it/1024x300');">
      <div class="custom-caption">
        Hello..Slide 1
      </div>
    </div>
    <div class="item" style="background-image:url('http://placehold.it/1024x300');">
      <div class="custom-caption">
        Slide 2
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  </a>
</div>
<div class="container" id="main">
    <h1>This Content is inside the container</h1>
</div>





















	
		
	<div class="row">

<?php $new_query = new WP_Query( array(
    'posts_per_page' => 14,
    'post_type'      => product,
	'class' =>'row',
    
) ); 
 $i = 0;
while ( $new_query->have_posts() ) : $new_query->the_post();      ?>





































	
	
	<div class="row">
	


  <div class="col-xs-3">
    <div class="thumbnail1">
	  <?php woocommerce_template_loop_product_link_open ()?>
      <?php woocommerce_template_loop_product_thumbnail()?> 
      <div class="caption" id="caption1">
	  
        <h1 > <?php woocommerce_template_loop_product_title()?> </h1>
		<p class="price1"><?php woocommerce_template_loop_price()?> </p>
        <p><?php woocommerce_template_loop_rating()?></p>
		<p> <?php the_content() ?></p>
        <p><?php woocommerce_template_loop_add_to_cart ()?></p>
      </div>
    </div>
  
</div>







<?php endwhile;  
wp_reset_postdata();?>
				
			
	</div>		
			
	
</div>
	



<?php get_footer(); ?>
