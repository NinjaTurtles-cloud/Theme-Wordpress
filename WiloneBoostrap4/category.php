
<?php get_header(); ?>
	    <section>
	    <?php 	if(have_posts()): ?>
	     	<div class="container">
	     		<div class ="col-12">
	     			<h2 class="lead text-center"><?php single_cat_title( '', true); ?></h2>
	     		</div>


          <div class="row">


        <?php 
              while (have_posts()): 
            the_post(); ?>

	     				<?php get_template_part("template-parts/content-3col-thumb"); ?>

	     				
          <?php endwhile; ?>
            
          </div><!--/Row -->

	     			


	     	</div><!--  Container -->

	     	<?php else: echo 'y a pas de resultats';
	     	endif; ?>
	    </section> 


<?php get_footer();  ?>