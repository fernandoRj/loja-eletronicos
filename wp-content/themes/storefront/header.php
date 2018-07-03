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
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri ();?>/woocommerce/img/jquery.bootpag.js"></script>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
 <link rel="shortcut icon" type="image/ico" href="<?php echo get_stylesheet_directory_uri ();?>/woocommerce/img/animated_favicon1.gif">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



	
	

		
			
		
			

			<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>
	
	
	
	
	
			

		<div class="row">	
  
  
  	<nav class="navbar navbar-default" role="navigation">
	
  	<div class="container-fluid">
	
    <!-- Brand and toggle get grouped for better mobile display -->
	
	
	
	
    <div class="navbar-header nav1" >
      <button type="button" class="navbar-toggle" data-toggle="collapse"  data-target="#myNavbar1" id="botao">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	
  <i class="fa fa-truck fa-1x fast p56" aria-hidden="true"></i><p class="p55">Rapida entrega</p>
	
	</div>
	 <div class="collapse navbar-collapse" id="myNavbar1">
	
	
   	<div id="botaonav" class="navbar-right">
        <?php
		

            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => '',
                'container_id'      => '',
                'menu_class'        => 'nav navbar-nav ',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker())
            );
			

		
			
			
        ?>

		
	</div>
	</div>
		
</div>
		
</nav>


   
	
</div>	
	
	</div>
	
	
	
	
	
	
	
	

			

		<div class="row">	
  
  
  	<nav class="navbar navbar-default nave22" role="navigation">
	
  	<div class="container-fluid">
	
    <!-- Brand and toggle get grouped for better mobile display -->
	
	
	
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar3" id="botao">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  
	  
		
	
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
            <img  class="logo img-fluid" alt="Responsive image" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        </a>
		
		
		
		</div>
		
		
	
  
	
	   
	   
	   
	   
	
		<div class="collapse navbar-collapse" id="myNavbar3">
		
		

		<div class="col-md-6 col-xs-12">
		
		
		

 
        <form class="navbar-form " method="get" accept-charset="utf-8" id="searchform" role="search" action="<?php echo home_url( '/' ); ?>">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="s" id="formulario" value="<?php the_search_query(); ?>">
			
            <div class="input-group-btn">
                <button class="btn btn-default botao"  type="submit" value="Search"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
		
		
   
    </div>
	
	<div class="col-md-2 col-xs-12">

		<?php storefront_header_cart()?>
		</div>
		</div>
	
	
		
</div>
		
</nav>


   
	
</div>	
</div>


<div class="row">	
<nav class="navbar navbar-inverse">
<div class="container-fluid">


    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar2" id="botao">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
	  



	  
	
	 
	  
    </div>
    <div class="collapse navbar-collapse" id="myNavbar2">
      <div id="botaonav2" class="navbar-center">
	  
	  
         <?php
		

            wp_nav_menu( array(
                'menu'              => 'second',
                'theme_location'    => 'second',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => '',
                'container_id'      => '',
                'menu_class'        => 'nav navbar-nav nave2',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker())
            );
			

		
			
			
        ?>
		
		
    
    </div>
  </div>
  </div>
  
  
</nav>
</div>	
	</header><!-- #masthead -->

	<?php
	
