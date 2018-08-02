<?php /* Template name: novo */ ?>
<?php get_header(); ?>


<?php print_r($posts_slides); ?>
<div id="myCarousel" class="carousel slide">
   <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="" contenteditable="false"></li>
      <li data-target="#myCarousel" data-slide-to="1" class="active" contenteditable="false"></li>
      <li data-target="#myCarousel" data-slide-to="2" class="" contenteditable="false"></li>
   </ol>
   <div class="carousel-inner">
      <div class="item active">
         <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 teste45">
               <a href="https://digitalmobiletecnologia.com.br/produto/iphone-7-plus-apple-32gb-preto-matte-4g-tela-5-5/"><img src="<?php echo get_stylesheet_directory_uri ();?>/woocommerce/img/teste1.png" class="img-fluid" id="bnrpq0"></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 legendaslider">
               <h1>iPhone 7 Plus Apple</h1>
               <p>32GB Preto Matte </p>
               <p>Por:R$2.800,00</p>
               <button type="button" class="btn btn-info btnslider center-block">Comprar</button>
            </div>
         </div>
      </div>
      <div class="item" style="">
         <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 teste45">
               <a href="https://digitalmobiletecnologia.com.br/produto/iphone-8-plus-apple-64gb-prata-4g-tela-55/"><img src="<?php echo get_stylesheet_directory_uri ();?>/woocommerce/img/teste2.png" class="img-fluid" id="bnrpq0"></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 legendaslider">
               <h1>iPhone 8 Plus Apple</h1>
               <p>64GB Prata </p>
               <p>Por:R$3.429,00</p>
               <button type="button" class="btn btn-info btnslider center-block">Comprar</button>
            </div>
         </div>
      </div>
      <div class="item" style="">
         <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 teste45">
               <a href="https://digitalmobiletecnologia.com.br/produto/iphone-6s-apple-128gb-prata-4g-tela-4-7-retina/"><img src="<?php echo get_stylesheet_directory_uri ();?>/woocommerce/img/teste3.jpg" class="img-fluid" id="bnrpq0"></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 legendaslider">
               <h1>iPhone 6s Apple</h1>
               <p>128GB Prata</p>
               <p>Por:R$1.800,00</p>
               <button type="button" class="btn btn-info btnslider center-block">Comprar</button>
            </div>
         </div>
      </div>
   </div>
   <a class="left carousel-control" href="#myCarousel" data-slide="prev">
   </a>
   <a class="fas fa-angle-double-right right carousel-control" href="#myCarousel" data-slide="next">
   </a>
</div>
<div class="row icones22">
   <div class="col-xs-6 col-md-3">
      <div class="features-block text-center">
         <div class="block-icon ease icon77">
            <i class="fas fa-ticket-alt"></i>
         </div>
         <!-- //.block-icon -->
         <span class="d-block font-alt letter-spacing-2 mt-4 text-uppercase title-medium"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Boleto bancario</font></font></span>
         <span class="bg-base-color d-inline-block mt-2 sep-line"></span>
      </div>
   </div>
   <div class="col-xs-6 col-md-3">
      <div class="features-block text-center">
         <div class="block-icon ease icon77">
            <i class="fas fa-rocket"></i>
         </div>
         <!-- //.block-icon -->
         <span class="d-block font-alt letter-spacing-2 mt-4 text-uppercase title-medium"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rapida entrega</font></font></span>
         <span class="bg-base-color d-inline-block mt-2 sep-line"></span>
      </div>
   </div>
   <div class="col-xs-6 col-md-3 espaco23">
      <div class="features-block text-center">
         <div class="block-icon ease icon77">
            <i class="fas fa-certificate"></i>
         </div>
         <!-- //.block-icon -->
         <span class="d-block font-alt letter-spacing-2 mt-4 text-uppercase title-medium"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">12 meses garantia</font></font></span>
         <span class="bg-base-color d-inline-block mt-2 sep-line"></span>
      </div>
   </div>
   <div class="col-xs-6 col-md-3 espaco23">
      <div class="features-block text-center">
         <div class="block-icon ease icon77">
            <i class="fas fa-lock"></i>
         </div>
         <!-- //.block-icon -->
         <span class="d-block font-alt letter-spacing-2 mt-4 text-uppercase title-medium"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Compra segura</font></font></span>
         <span class="bg-base-color d-inline-block mt-2 sep-line"></span>
      </div>
   </div>
</div>
<div class="row" id="areasite">
    <div class="vertical-menu col-md-2">
	<?php get_sidebar()?>
	</div>

    
   <div class="col-md-8 col-xs-12 principal1" >
     
      <div class="row coluna1">
         <div class="container-fluid">
            
             

		
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
             
	<?php 	/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );
			?>
                 
            

			<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

         
       
         </div>
          

			

<?php echo do_shortcode("[products limit='4' columns='4' orderby='popularity' class='quick-sale' on_sale='true' ]"); ?>
			
      </div>
    
   </div>

</div>

<script>
   $('#myCarousel').carousel();
   var winWidth = $(window).innerWidth();
   $(window).resize(function () {
   
       if ($(window).innerWidth() < winWidth) {
           $('.carousel-inner>.item>img').css({
               'min-width': winWidth, 'width': winWidth
           });
       }
       else {
           winWidth = $(window).innerWidth();
           $('.carousel-inner>.item>img').css({
               'min-width': '', 'width': ''
           });
       }
   });
   
   
   
</script>

 <script src="//code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>
      <script>
         // Add this to let the carousel start automatic
         $('.carousel').carousel();
      </script>
      <script src="//code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>
      <script>
         // Add this to let the carousel start automatic
         $('.carousel').carousel();
      </script>
<?php get_footer()?>
