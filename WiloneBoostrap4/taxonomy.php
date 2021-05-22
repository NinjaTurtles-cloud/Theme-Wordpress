
<?php get_header(); ?>

<div class="row">
	<h1 class="centerAuto COa0">hello</h1>
</div>

	    <section>
	    <?php 	if(have_posts()): ?>
	     	<div class="container">
	     		<div class="row">

	     	<?php 
	     	     	while (have_posts()): 
     				the_post(); ?>

						<?php get_template_part("template-parts/content-3col-thumbBG"); ?>

	     		<?php endwhile; ?>
	     	</div><!--  Container -->
	     	</div>

	     	<?php else: echo 'y a pas de resultats';
	     	endif; ?>
	    </section> 

<?php get_footer();  ?>

