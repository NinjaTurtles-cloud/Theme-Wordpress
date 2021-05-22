<?php 
get_header(); ?>

<section>
	<!-- Page Content -->
	<div class="container">
		<?php if (have_posts()): ?>
			<?php while (have_posts()): the_post(); ?>
				<div class="row mb-30">
					<div class=col-lg-12>
						<!-- Title -->
						<h1 class="mt-4"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
						<hr>
						<!-- Preview Image -->
						<?php the_post_thumbnail('blog-post', array('class' => 'img-fluid rounded')); ?>
						<hr>
						<!-- Post Content -->
						<?php the_content(); ?>
						<hr>
					</div>
				</div><!-- /row -->
				
			<?php endwhile; ?>






		</div><!-- /container-->


	
	<?php else: ?>
		<div class="row">
			<div class="col-12">
				<p>il n'y a pas de résultats</p>
			</div>
		</div>
	</div><!-- /container -->
	<?php endif; ?>	



</section>

<?php get_footer(); ?>