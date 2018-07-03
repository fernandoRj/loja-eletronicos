<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

    <header class="woocommerce-products-header">

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>

		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>

    </header>
	
	

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>
			
			

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/**
						 * woocommerce_shop_loop hook.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
					?>
					
					

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>
			
			

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
			
			

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php
				/**
				 * woocommerce_no_products_found hook.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
	



	<div class="container-fluid">
    <div class="row">
        <div class="row">
            <div class="col-md-9">
                <h3 class="titulocarosel">
                   Produtos mais vendidos</h3>
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
			
			<?php $posts_slides = new wp_Query(array('post_type' => 'product', 'posts_per_page'=>6)); 

$i=1;
while($posts_slides ->have_posts()) :$posts_slides->the_post();

?>
          <div class="item <?php if($i == 1) echo 'active';?>">
		  
                    <div class="row">
		
                        <div class="col-sm-3 col-xs-12">

                            <div class="col-item">
                                <div class="photo">
                                    <?php woocommerce_template_loop_product_thumbnail()?> 
                                </div>
                                <div class="info">
							
                                    <div class="row">
                                        <div class="price2 col-md-12">
                                       <h2 class="titulo1"><?php woocommerce_template_loop_product_title()?></h2>
									  
										
										 
                                        </div>
										
										  <p> <?php the_content() ?></p>
									   
									   
                                         <p class="preço1"><?php woocommerce_template_loop_price()?> </p>
										
										
                                       
                                    </div>
									
                                    <div class="separator clear-left" id="botao2">
                                      
                                            <?php woocommerce_template_loop_add_to_cart ()?>
                                        
                                    </div>
                                    <div class="clearfix">
                                    </div>
									
                                </div>
								
                            </div>
							  
                        </div>

			
                        <div class="col-sm-3 col-xs-12">
                     <div class="col-item">
                                <div class="photo">
                                    <?php woocommerce_template_loop_product_thumbnail()?> 
                                </div>
                                <div class="info">
							
                                    <div class="row">
                                        <div class="price2 col-md-12">
                                       <h2 class="titulo1"><?php woocommerce_template_loop_product_title()?></h2>
									  
										
										 
                                        </div>
										
										  <p> <?php the_content() ?></p>
									   
									   
                                         <p class="preço1"><?php woocommerce_template_loop_price()?> </p>
										
										
                                       
                                    </div>
									
                                    <div class="separator clear-left" id="botao2">
                                      
                                            <?php woocommerce_template_loop_add_to_cart ()?>
                                        
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
								
                            </div>
							
                        </div>
						
                        <div class="col-sm-3">
                        <div class="col-item">
                                <div class="photo">
                                    <?php woocommerce_template_loop_product_thumbnail()?> 
                                </div>
                                <div class="info">
							
                                    <div class="row">
                                        <div class="price2 col-md-12">
                                       <h2 class="titulo1"><?php woocommerce_template_loop_product_title()?></h2>
									  
										
										 
                                        </div>
										
										  <p> <?php the_content() ?></p>
									   
									   
                                         <p class="preço1"><?php woocommerce_template_loop_price()?> </p>
										
										
                                       
                                    </div>
									
                                    <div class="separator clear-left" id="botao2">
                                      
                                            <?php woocommerce_template_loop_add_to_cart ()?>
                                        
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                         <div class="col-item">
                                <div class="photo">
                                    <?php woocommerce_template_loop_product_thumbnail()?> 
                                </div>
                                <div class="info">
							
                                    <div class="row">
                                        <div class="price2 col-md-12">
                                       <h2 class="titulo1"><?php woocommerce_template_loop_product_title()?></h2>
									  
										
										 
                                        </div>
										
										  <p> <?php the_content() ?></p>
									   
									   
                                         <p class="preço1"><?php woocommerce_template_loop_price()?> </p>
										
										
                                       
                                    </div>
									
                                    <div class="separator clear-left" id="botao2">
                                      
                                            <?php woocommerce_template_loop_add_to_cart ()?>
                                        
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
						
                    </div>
                </div>
				    <?php $i++; endwhile;   ?>
                <div class="item">
                    <div class="row">
                        <div class="col-sm-3">
                           <div class="col-item">
                                <div class="photo">
                                    <?php woocommerce_template_loop_product_thumbnail()?> 
                                </div>
                                <div class="info">
							
                                    <div class="row">
                                        <div class="price2 col-md-12">
                                       <h2 class="titulo1"><?php woocommerce_template_loop_product_title()?></h2>
									  
										
										 
                                        </div>
										
										  <p> <?php the_content() ?></p>
									   
									   
                                         <p class="preço1"><?php woocommerce_template_loop_price()?> </p>
										
										
                                       
                                    </div>
									
                                    <div class="separator clear-left" id="botao2">
                                      
                                            <?php woocommerce_template_loop_add_to_cart ()?>
                                        
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                        <div class="col-item">
                                <div class="photo">
                                    <?php woocommerce_template_loop_product_thumbnail()?> 
                                </div>
                                <div class="info">
							
                                    <div class="row">
                                        <div class="price2 col-md-12">
                                       <h2 class="titulo1"><?php woocommerce_template_loop_product_title()?></h2>
									  
										
										 
                                        </div>
										
										  <p> <?php the_content() ?></p>
									   
									   
                                         <p class="preço1"><?php woocommerce_template_loop_price()?> </p>
										
										
                                       
                                    </div>
									
                                    <div class="separator clear-left" id="botao2">
                                      
                                            <?php woocommerce_template_loop_add_to_cart ()?>
                                        
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                         <div class="col-item">
                                <div class="photo">
                                    <?php woocommerce_template_loop_product_thumbnail()?> 
                                </div>
                                <div class="info">
							
                                    <div class="row">
                                        <div class="price2 col-md-12">
                                       <h2 class="titulo1"><?php woocommerce_template_loop_product_title()?></h2>
									  
										
										 
                                        </div>
										
										  <p> <?php the_content() ?></p>
									   
									   
                                         <p class="preço1"><?php woocommerce_template_loop_price()?> </p>
										
										
                                       
                                    </div>
									
                                    <div class="separator clear-left" id="botao2">
                                      
                                            <?php woocommerce_template_loop_add_to_cart ()?>
                                        
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="col-item">
                                <div class="photo">
                                    <?php woocommerce_template_loop_product_thumbnail()?> 
                                </div>
                                <div class="info">
							
                                    <div class="row">
                                        <div class="price2 col-md-12">
                                       <h2 class="titulo1"><?php woocommerce_template_loop_product_title()?></h2>
									  
										
										 
                                        </div>
										
										  <p> <?php the_content() ?></p>
									   
									   
                                         <p class="preço1"><?php woocommerce_template_loop_price()?> </p>
										
										
                                       
                                    </div>
									
                                    <div class="separator clear-left" id="botao2">
                                      
                                            <?php woocommerce_template_loop_add_to_cart ()?>
                                        
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php echo do_shortcode('[wa-wps id=236]');?>
</div>
<?php get_footer( 'shop' ); ?>