<?php get_header(); ?>

<section>
	<div class="container">
		<div class="jumbotron">
			<h1>La page que vous cherchez n'existe pas.</h1>
			<img src="<?php echo get_template_directory_uri();?>/assets/aa/404.png" alt="">
		</div>

		<div class="row">
			<!-- Affiche les 6 dernier articles -->
				<?php $args_blog =array(
					'post_type'=> 'post',
					'posts_per_page' => 6
					); 
				$req_blog = new WP_Query($args_blog); ?>
			<!-- Fin Affiche les 6 dernier articles -->

			<?php if ($req_blog->have_posts()): // Contdition d'affichage de post ?>
		    <section id="blog-front">
		    
		     	<div class="container">	    
	     			<div class="row">
	     				<?php 	while($req_blog->have_posts()): $req_blog->the_post(); ?>
		     				<div class="col-xs-6"><!-- La vignette Thumbnail et metadonné -->
		     					<div class="panel panel-default">
		     						<div class="panel-heading">
		     							<h2 class="text-center"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
		     						</div>
		     						<div class="panel-body">
		     							<a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium', array('class' => 'img-responsive aligncenter'));//('taille', tableau pour ajouter la valeur class pour la balise img) ?></a>
		     							<?php the_excerpt(); ?>
		     						</div>
		     						<div class="panel-footer">
		     							<p>	     				
		     							<?php echo wilone_give_me_meta_01(
		     													esc_attr( get_the_date('c') ),
		     													esc_html( get_the_date()),
		     													get_the_category_list(', '), 
		     													get_the_tag_list('', ', ')
		     													); //Afiche les meta ?>
		     							</p>
		     						</div>
		     					</div>							
							</div><!-- Fin La vignette Thumbnail et metadonné -->
						<?php endwhile; wp_reset_postdata();?>
					</div><!-- ROW -->	     		
		     	</div><!--  Container -->
		    </section> 
			<?php endif; //Fin Condition d'affichage de post cpt discographie ?>

			<section>
				<div class="container">
					<?php if(have_posts()): ?>
						<?php while( have_posts()): the_post(); ?>
					<div class="row">
						<div class="col-xs-12">
							<?php the_title('<h1 class="text-center">', '</h1>');?>
							<?php the_content();?>
						</div>
					</div>

				<?php endwhile; ?>
				<?php else: ?>

					<div class="row">
						<div class="col-xs-12">
							<p>Il n'y a pas de résultats.</p>
						</div>
					</div>
				
					<?php endif; //Fin Condition d'affichage de post ?>
				
				</div><!-- Fin container -->
			</section>
				<?php get_footer();  ?>
		</div><!-- ROW -->
	</div><!-- Fin container -->
</section>