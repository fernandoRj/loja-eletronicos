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





add_action( 'widgets_init', 'register_new_sidebars' );

function register_new_sidebars() {

  register_sidebar(array(
    'id' => 'lateral-1',
    'name' => __( 'lateral-1', 'storefront' ),
    'description' => __( 'Sidebar 2.', 'storefront' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));
}

function so_25700650_remove_sidebar(){
    if( is_checkout() || is_cart() || is_product() ){
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    }
}
add_action('woocommerce_before_main_content', 'so_25700650_remove_sidebar' );


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





function scripts() {

wp_enqueue_script( 'fontawesome-all', get_template_directory_uri() . '/js/fontawesome-all.js', array(), '1.0.0', true );

}

add_action( 'wp_enqueue_scripts', 'scripts' );



require_once('wp-bootstrap-navwalker.php');





register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'storefront-child' ),
) );









function campos( $meta_boxes ) {
	$prefix = 'prefix-';

	$meta_boxes[] = array(
		'id' => 'campos',
		'title' => esc_html__( 'campos', 'metabox-online-generator' ),
		'post_types' => array( 'page' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => 'login',
				'type' => 'url',
				'name' => esc_html__( 'login-link', 'metabox-online-generator' ),
				'desc' => esc_html__( 'insira link para o login', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'insira um link', 'metabox-online-generator' ),
				'size' => 15,
				'attributes' => array(),
			),
            
            	array(
				'id' => 'pagamento',
				'type' => 'url',
				'name' => esc_html__( 'pagamento-link', 'metabox-online-generator' ),
				'desc' => esc_html__( 'insira link para o pagamento', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'insira um link', 'metabox-online-generator' ),
				'size' => 15,
				'attributes' => array(),
			),
            
            array(
				'id' => 'texto',
				'type' => 'text',
				'name' => esc_html__( 'texto-login', 'metabox-online-generator' ),
				'desc' => esc_html__( 'texto-login', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'insira o texto', 'metabox-online-generator' ),
				'size' => 15,
			),
            
            
              array(
				'id' => 'texto-pg',
				'type' => 'text',
				'name' => esc_html__( 'texto-pg', 'metabox-online-generator' ),
				'desc' => esc_html__( 'texto-pg', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'insira o texto', 'metabox-online-generator' ),
				'size' => 15,
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'campos' );







function footer( $meta_boxes ) {
	$prefix = 'prefix-';

	$meta_boxes[] = array(
		'id' => 'footer',
		'title' => esc_html__( 'footer', 'metabox-online-generator' ),
		'post_types' => array( 'page' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => 'url1',
				'type' => 'url',
				'name' => esc_html__( 'URL', 'metabox-online-generator' ),
				'desc' => esc_html__( 'insira a url', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'insira a url', 'metabox-online-generator' ),
				'size' => 30,
              
			),
            
            	array(
				'id' => 'url2',
				'type' => 'url',
				'name' => esc_html__( 'URL', 'metabox-online-generator' ),
				'desc' => esc_html__( 'insira a url', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'insira a url', 'metabox-online-generator' ),
				'size' => 30,
              
			),
            
            	array(
				'id' => 'url3',
				'type' => 'url',
				'name' => esc_html__( 'URL', 'metabox-online-generator' ),
				'desc' => esc_html__( 'insira a url', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'insira a url', 'metabox-online-generator' ),
				'size' => 30,
              
			),
            
            	array(
				'id' => 'url4',
				'type' => 'url',
				'name' => esc_html__( 'URL', 'metabox-online-generator' ),
				'desc' => esc_html__( 'insira a url', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'insira a url', 'metabox-online-generator' ),
				'size' => 30,
              
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'footer' );





function wpb_widgets_init() {
 
    register_sidebar( array(
        'name'          => 'Custom Header Widget Area',
        'id'            => 'custom-header-widget',
        'before_widget' => '<div class="">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="chw-title">',
        'after_title'   => '</h2>',
    ) );
 
}
add_action( 'widgets_init', 'wpb_widgets_init' );






function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'footer-widget',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		 'before_title'  => '<h2 class="chw-title">',
        'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );