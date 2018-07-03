
<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>



<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>




<div class="row" id="areasite">
    
	
<div class="row">
	<div class="col-md-2">
	<?php get_sidebar()?>
	</div>



	        <div class="col-md-10 col-xs-12  p27">
			<div class="col-md-4" id="fotopd">
			
				<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>
			</div>
	
<div class="col-xs-1">
</div>
	
		<div class="col-md-7" id="infopd">
		<div class="titulocp">
		<?php woocommerce_template_single_title()?>
		</div>
		
		<div class="votacaocp">
		<?php woocommerce_template_single_rating()?>
		</div>
		
		<div class="precocp">
		<p>Por:<?php  woocommerce_template_single_price ()?></p>
		</div>
		
		<div class="desccp">
		<?php the_content()?>
		<?php woocommerce_template_single_meta()?>
		</div>
		
		<div class="compracp">
		<?php woocommerce_template_single_add_to_cart()?>
		<?php woocommerce_template_single_sharing()?>
		</div>
		
		
		

		
		</div>
		
		
		
		<div class="col-xs-12 precao1">
		
		  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Comentarios</a></li>
    <li><a data-toggle="tab" href="#menu1">Informação adicional</a></li>
    <li><a data-toggle="tab" href="#menu2">Descrição produto</a></li>
   
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
	
	
	
	
       <?php woocommerce_output_product_data_tabs();?>
		 <?php woocommerce_upsell_display()?>
    </div>
    <div id="menu1" class="tab-pane fade">
     <?php Woocommerce_product_additional_information_tab();?>
    </div>
    <div id="menu2" class="tab-pane fade">
       <?php woocommerce_template_single_excerpt();?>
    </div>
   
  </div>
		
		
		
		
		</div>
		
		
		<div class="col-xs-12">
		<?php woocommerce_output_related_products(); ?>
		</div>

		
	         </div>
			 
			 
			 
			 
			 
			 
		</div>	 
	
			 </div>
			 
			
			 
		 <?php get_footer()?>
			 