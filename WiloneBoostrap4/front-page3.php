
<?php get_header(); ?>
<div class="container">
      <!-- Heading Row -->
      <div class="row my-4">
        <div class="col-lg-8">
          <img class="img-fluid rounded" src="http://placehold.it/900x400" alt="">
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
          <h1>Business Name or Tagline</h1>
          <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
          <a class="btn btn-primary btn-lg" href="#">Call to Action!</a>
        </div>
        <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->
      <!-- Call to Action Well -->
      <div class="card text-white bg-secondary my-4 text-center">
        <div class="card-body">
          <p class="text-white m-0">This call to action card is a great place to showcase some important information or display a clever tagline!</p>
        </div>
      </div>




<?php

	$args_media_front		= array(
		'post_type' 		=> 'wilone_media',
		'posts_per_page' 	=> 3,
		'orderby' 			=> 'rand'
		);
	$req_media_front = new WP_Query($args_media_front);

	if($req_media_front->have_posts()): ?>

      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">Card One</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">More Info</a>
            </div>
          </div>
        </div>




			<div class="container">
				<div class="row">
					<?php while($req_media_front->have_posts()) : $req_media_front->the_post(); ?>
						<div class="col-md-4 mb-4">
							<div class="card h-100">
								<div class="card-body">
									<h2 class="card-title"><?php the_title(); ?></h2>
									<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
									            <div class="card-footer">
              <a href="<?php the_permalink(); ?>" class="btn btn-primary">More Info</a>
            </div>
          </div>
        </div>
        </div><!-- /.col-md-4 -->

					<?php endwhile; wp_reset_postdata(); ?>
				</div><!---Fin Row  -->
			</div><!---Fin Container  -->

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
					<?php while($req_media_front->have_posts()) : $req_media_front->the_post(); ?>
						<div class="col-md-4 mb-4">
							<div class="card h-100">
								<div class="card-body">
									<h2 class="card-title"><?php the_title(); ?></h2>
									<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
									            <div class="card-footer">
              <a href="<?php the_permalink(); ?>" class="btn btn-primary">More Info</a>
            </div>
          </div>
        </div>
        </div><!-- /.col-md-4 -->

					<?php endwhile; wp_reset_postdata(); ?>
				</div><!---Fin Row  -->
			</div><!---Fin Container  -->

	    </section> 
<?php endif; //Fin Condition d'affichage de post cpt discographie ?>



		<section>
			<div class="container">
				<div class="row">
					<?php while($req_media_front->have_posts()) : $req_media_front->the_post(); ?>
						<div class="col-md-4 mb-4">
							<div class="card h-100">
								<div class="card-body">
									<h2 class="card-title"><?php the_title(); ?></h2>
									<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
									            <div class="card-footer">
              <a href="<?php the_permalink(); ?>" class="btn btn-primary">More Info</a>
            </div>
          </div>
        </div>
        </div><!-- /.col-md-4 -->

					<?php endwhile; wp_reset_postdata(); ?>
				</div><!---Fin Row  -->
			</div><!---Fin Container  -->

			
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

		</div>
<?php get_footer();  ?>