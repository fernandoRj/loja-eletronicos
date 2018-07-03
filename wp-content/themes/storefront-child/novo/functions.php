<?php 














function theme_enqueue_styles() {

    $parent_style = 'parent-style';


    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}


add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );







add_action ('storefront_footer', 'remove_my_action');
function remove_my_action () {
	remove_action ('storefront_footer', 'storefront_credit',20);

}


add_filter( 'woocommerce_enqueue_styles', '__return_false' );





function novo() {
    register_sidebar(
        array (
            'name' => __( 'novo1', 'your-theme-domain' ),
            'id' => 'novo1',
            'description' => __( 'Custom Sidebar', 'your-theme-domain' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'novo' );







function isa_woo_get_one_pa(){
  
    // Edit below with the title of the attribute you wish to display
    $desired_att = 'celular-nokia';
   
    global $product;
    $attributes = $product->get_attributes();
     
    if ( ! $attributes ) {
        return;
    }
      
    $out = '';
   
    foreach ( $attributes as $attribute ) {
        $name = $attribute->get_name();
        if ( $attribute->is_taxonomy() ) {
          
            // sanitize the desired attribute into a taxonomy slug
            $tax_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $desired_att)));
          
            // if this is desired att, get value and label
            if ( $name == 'pa_' . $tax_slug ) {
              
                $terms = wp_get_post_terms( $product->get_id(), $name, 'all' );
                // get the taxonomy
                $tax = $terms[0]->taxonomy;
                // get the tax object
                $tax_object = get_taxonomy( $tax );
                // get tax label
                if ( isset ( $tax_object->labels->singular_name ) ) {
                    $tax_label = $tax_object->labels->singular_name;
                } elseif ( isset( $tax_object->label ) ) {
                    $tax_label = $tax_object->label;
                    // Trim label prefix since WC 3.0
                    if ( 0 === strpos( $tax_label, 'Product ' ) ) {
                       $tax_label = substr( $tax_label, 8 );
                    }
                }
                  
                foreach ( $terms as $term ) {
       
                    $out .= $tax_label . ': ';
                    $out .= $term->name . '<br />';
                       
                }           
              
            } // our desired att
              
        } else {
          
            // for atts which are NOT registered as taxonomies
              
            // if this is desired att, get value and label
            if ( $name == $desired_att ) {
                $out .= $name . ': ';
                $out .= esc_html( implode( ', ', $attribute->get_options() ) );
            }
        }       
          
      
    }
      
    echo $out;
}

add_action('woocommerce_single_product_summary', 'isa_woo_get_one_pa');








 add_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
 add_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
 add_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta', 10 );
add_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 10 );
 

add_theme_support( 'custom-background' );









/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Register a shortcode that creates a product categories dropdown list
 *
 * Use: [product_categories_dropdown orderby="title" count="0" hierarchical="0"]
 *
 */
add_shortcode( 'product_categories_dropdown', 'woo_product_categories_dropdown' );
function woo_product_categories_dropdown( $atts ) {
  extract(shortcode_atts(array(
    'count'         => '0',
    'hierarchical'  => '0',
    'orderby' 	    => ''
    ), $atts));
	
	ob_start();
	
	$c = $count;
	$h = $hierarchical;
	$o = ( isset( $orderby ) && $orderby != '' ) ? $orderby : 'order';
		
	// Stuck with this until a fix for http://core.trac.wordpress.org/ticket/13258
	woocommerce_product_dropdown_categories( $c, $h, 0, $o );
	?>
	<script type='text/javascript'>
	/* <![CDATA[ */
		var product_cat_dropdown = document.getElementById("dropdown_product_cat");
		function onProductCatChange() {
			if ( product_cat_dropdown.options[product_cat_dropdown.selectedIndex].value !=='' ) {
				location.href = "<?php echo home_url(); ?>/?product_cat="+product_cat_dropdown.options[product_cat_dropdown.selectedIndex].value;
			}
		}
		product_cat_dropdown.onchange = onProductCatChange;
	/* ]]> */
	</script>
	<?php
	
	return ob_get_clean();
	
}







add_action( 'after_setup_theme', 'yourtheme_setup' );
 
function yourtheme_setup() {
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}