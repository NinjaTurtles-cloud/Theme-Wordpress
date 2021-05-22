
<?php get_header(); ?>

<?php get_template_part('slider', 'home'); ?>
 <?php  get_template_part('slider_1', 'home'); ?> 



<?php

	$args_media_front		= array(
		'post_type' 		=> 'wilone_media',
		'posts_per_page' 	=> 4,
		'orderby' 			=> 'rand'
		);
	$req_media_front = new WP_Query($args_media_front);

	if($req_media_front->have_posts()): ?>
		<section class="media-front mb-30">
			<div class="container">
				<div class="row">
					<?php while($req_media_front->have_posts()) : $req_media_front->the_post(); ?>
						<article class="col-12 col-sm-6 col-md-3 d-flex">
							<div class="panel panel-default">
								<?php the_post_thumbnail('medium-large', array('class' => 'img-fluid card-img-top'));?>
								<div class="card-footer h-100">
									<h1 class="h4 text-center"><?php the_title(); ?></h1>
								</div>							
							</div>
						</article>
					<?php endwhile; wp_reset_postdata(); ?>
				</div><!---Fin Row  -->
			</div><!---Fin Container  -->
		</section>
	<?php endif;?>


<?php $args_blog =array(
	'post_type'=> 'post',
	'posts_per_page' => 8
	); 
$req_blog = new WP_Query($args_blog); ?>

<?php if ($req_blog->have_posts()): // Contdition d'affichage de post ?>
	    <section id="blog-front">
	    
	     	<div class="container">	    
     			<div class="row">
     				<?php 	while($req_blog->have_posts()): $req_blog->the_post(); ?>
	     				<div class="col-xs-6"><!-- La vignette Thumbnail et metadonné -->
	     					<div class="card">
	     						<div class="card-header">
	     							<h2 class="text-center"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
	     						</div>
	     						<div class="card-body">
	     							<a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium', array('class' => 'img-fluid aligncenter'));//('taille', tableau pour ajouter la valeur class pour la balise img) ?></a>
	     							<?php the_excerpt(); ?>
	     						</div>
	     						<div class="card-footer">
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
					<div class="col-12">
						<?php the_title('<h1 class="text-center">', '</h1>');?>
						<?php the_content();?>
					</div>
				</div>

			<?php endwhile; ?>
			<?php else: ?>

				<div class="row">
					<div class="col-12">
						<p>Il n'y a pas de résultats.</p>
					</div>
				</div>
			
				<?php endif; //Fin Condition d'affichage de post ?>
			
			</div><!-- Fin container -->
		</section>
<?php get_footer();  ?>