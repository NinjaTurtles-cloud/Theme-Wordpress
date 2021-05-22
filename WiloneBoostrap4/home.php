
<?php get_header(); ?>

	    <section>
	    <?php 	if(have_posts()): ?>
	     	<div class="container">

	     	<!-- <pre><?php // var_dump($wp_query);?></pre> -->


	     	<?php //Boucle
	     	     	while (have_posts()): 
     				the_post(); ?>


						<?php get_template_part("content"); ?>

	     		<?php endwhile; ?>

	     	

	     	<?php else: ?>
	     		<div class="row">
	     			<div class="col-xs-12"> 
	     				<p>y a pas de resultats</p>
	     			</div>
	     		</div>
	    	 <?php endif; //FinBoucle ?>
				
				<div class="row">
				<?php 	global $wp_query;
				$big 	= 999999999; // need an unlikely integer
				$total_pages = $wp_query->max_num_pages;

				if ($total_pages > 1): ?>
					<div class="col-xs-12 wilone_pagination">
						<?php echo paginate_links( array(
							'base' 				 => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' 			 => '/paged/%#%',
							'current'			 => max( 1, get_query_var('paged') ),
							'total' 			 => $total_pages,
							'prev_next'          => true,
							'prev_text'          => '« Page Précédente',
							'next_text'          =>  ' Page Suivante',

						) ); ?>	
					</div>
				<?php 	endif; // Fin Bloc pagination ?>
				</div><!-- Fin Row -->

	     	</div> <!-- Fin container -->
	    </section> 


<?php get_footer();  ?>