<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *Template Name: footer
 * @package storefront
 */
?>

	


	

	
		



<div class="footer clearfix">
				<div class="container">
					<div class="row">
					
    <?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
                        
    <div id="" class="footer-widget" >
       
    <?php dynamic_sidebar( 'home_right_1' ); ?>
          
    </div>
     
<?php endif; ?>
					
					</div>
				</div>
			</div>
			
		
			
			<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5Dyro4muNr1jD737ko6Axfotpb3y6IzE";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>

	


<?php wp_footer(); ?>

</body>
</html>
	

	

