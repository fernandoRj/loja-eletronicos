 <?php /* Template name: blog */ ?>
 
 
 

 
 
 
 <?php get_header();?>
 
 
 <div class="row">
 
 
 
 <div class="container">
 
 <div class="col-xs-8"> 
 
 
 
 <?php

global $post;
$args = array('orderby' => 'date', );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>


<div class="post1">


<?php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'alignleft' ) );?>
<h1><a href="<?php the_permalink();?>">  <?php the_title(); ?> </a></h1>
 <p><?php the_excerpt();?></p>
  <p><?php the_author(); ?> </p>
 <p> <?php the_date(); ?></p>

</div>
<?php endforeach; 
wp_reset_postdata();?>
 
 
 
 
 
 
 

 </div>
 
 
 <div class="col-xs-4">
 <h2>oi</h2>
 </div>
 
 
 </div>
 </div>

<?php get_footer();?> 

 