
<?php get_header(); ?>
	    <section>
	    <?php 	if(have_posts()): ?>
	     	<div class="container">
	     	<?php 
	     	     	while (have_posts()): 
     				the_post(); ?>

						<?php get_template_part("content"); ?>

	     		<?php endwhile; ?>
	     	</div><!--  Container -->

	     	<?php else: echo 'y a pas de resultats';
	     	endif; ?>
	    </section> 


<?php get_footer();  ?>



