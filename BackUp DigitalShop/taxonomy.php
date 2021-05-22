
<?php get_header(); ?>

	    <section>
	    <?php 	if(have_posts()): ?>
	     	<div class="container">
	     		<div class="row">
	     	<?php 
	     	     	while (have_posts()): 
     				the_post(); ?>

						<?php get_template_part("template-parts/content-3col-thumb"); ?>

	     		<?php endwhile; ?>
	     	</div><!--  Container -->
	     	</div>

	     	<?php else: echo 'y a pas de resultats';
	     	endif; ?>
	    </section> 

<?php get_footer();  ?>

