
<?php get_header(); ?>
	    <section>
	    <?php 	if(have_posts()): ?>
	     	<div class="container">
	     		<div class ="col-12">
	     			<p class="lead">Tag :  <?php single_tag_title(''); ?></p>
	     		</div>
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