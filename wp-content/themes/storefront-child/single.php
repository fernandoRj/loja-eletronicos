<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post();

			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'single' );

			do_action( 'storefront_single_post_after' );?>
			

 
 
			
		
			<div class="row">
			<div class="container">
				<div class="col-xs-12">
				<h2><?php the_field('titulo'); ?></h2>
				<p><?php the_field('descricao'); ?></p>
				
				<div class="col-xs-3">
				<img src="<?php the_field('imagem'); ?>" alt="" class="img-circle"/>
					<p><?php the_field('infoproduto'); ?></p>
				</div>
				
				<div class="col-xs-3">
				</div>
				
				<div class="col-xs-3">
				</div>
				
				<div class="col-xs-3">
				</div>
			
			</div>
			</div>
			</div>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	

<?php
do_action( 'storefront_sidebar' );
get_footer();
