<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>

<script type="text/javascript" src="http://yourjavascript.com/21051171187/jquery-touchswipe-min.js"></script>
<script type="text/javascript" src="http://yourjavascript.com/11873115711/jquery-1-12-4-min.js"></script>
<script type="text/javascript" src="http://yourjavascript.com/71712155041/responsive-bootstrap-carousel.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri ();?>/woocommerce/img/jquery-3.2.1.js"></script>



<meta content="text/html; charset=utf-8">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<meta name="google-site-verification" content="6j1586rOvR5ueF3H_zTFmaSU9nBjCOlv-k5ID6OgJew" />



<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
 <link rel="shortcut icon" type="image/ico" href="<?php echo get_stylesheet_directory_uri ();?>/woocommerce/img/animated_favicon1.gif">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	
	

		
			
		
			

			<?php do_action( 'storefront_before_site' ); ?>


	<?php do_action( 'storefront_before_header' ); ?>
	
	
	
	
	
			

		<div class="header clearfix" style="height: auto;">

        <!-- TOPBAR -->
        <div class="topBar">
          <div class="container">
            <div class="row">
              <div class="col-xs-6  tamanho2">
            	
    <div class="dropdown dprin1 ">
	
	
	<a class="btn  btnmenu  data-toggle="dropdown"" href="#">
  Contato</a>
	
	
  
    <ul class="dropdown-menu dprmn1">
     <div class="container-fluid indoconta">
	<h4>Atendimento ao cliente</h4>
	<p><b>Tel: (31) 3351.3072/ whatsapp:(31) 997354628</b></p>
	 
	 <h4>Horario de atendimento</h4>
	 <p>Horario de atendimento: segunda a sexta: 09:00 as 18:00 Exceto feriados</p>
	 
	 <h4>email</h4>
	 <p><b>reclamacoes@digitalmobiletecnologia.com.br<b></p>
				<p><b>sugestaoes@digitalmobiletecnologia.com.br<b></p>
				
				
				
				 <h4>endereço</h4>
	 <p><b>Endereco: Rua Guajajaras, 1470 - LOJA 116. Belo Horizonte - MG. CEP: 30180-101</b></p><br>
	 
	 <h4>cnpj</h4>
	 <p><b>08.026.771/0001-60</b></p>
			</div>	
		</ul>		
				
	 
	 

   
 
  </div>
              </div>
              <div class="col-xs-6 tamanho1">
                <ul class="list-inline float-right top-right tamanho25">
                  <li class="account-login"><span><a data-toggle="modal" href="https://digitalmobiletecnologia.com.br/my-account/">Log in</a><small>ou</small><a data-toggle="modal" href="https://digitalmobiletecnologia.com.br/checkout/">pagamento</a></span></li>
                  <li class="searchBox">
                    <a data-toggle="dropdown" href="#"><i class="fa fa-search"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right dprmn1">
                      <li>
                        <span class="input-group">
                          <input type="text" class="form-control" placeholder="Search…" aria-describedby="basic-addon2">
                          <button type="submit" class="input-group-addon">Submit</button>
                        </span>
                      </li>
                    </ul>
                  </li>
              
                </ul>
				
				   
                   <?php storefront_header_cart()?>
                  
              </div>
            </div>
          </div>
        </div>

        <!-- NAVBAR -->
        
      <nav class="navbar navbar-default" role="navigation" style="opacity: 1;">
	  <div class="container">
	  
	    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand">
            <img  class="imghdr3 img-fluid" alt="Responsive image" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        </a>
			
  
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar3" id="botao">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  
	  
		
	
     <div class="collapse navbar-collapse" id="myNavbar3">
      <ul class="nav navbar-nav nave98 navbar-right">
        <li class="active"><a href="https://digitalmobiletecnologia.com.br/categoria-produto/samsung/"><b>samsung</b></a></li>
        <li><a href="https://digitalmobiletecnologia.com.br/categoria-produto/apple/"><b>Apple</b></a></li>
      
       
      </ul>
    
    </div>
		
		
		
		
        </div>
        </nav>
		
		


		
		</div>
	
	<script>



$( document ).ready(function() {
	


$("#hover").hover(function(){
  $("#box").slideDown();

},function(){
     $("#box").slideUp(); 
});
	 
	 
	 
	 
	 
	 
	$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(0).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(0).fadeOut(500);
  

});
 
	 
	 
	 
	 
	 
	 
	 
	 $('.dprin1').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(0).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(0).fadeOut(500);
  

});
 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
});




</script>


	<?php
	
