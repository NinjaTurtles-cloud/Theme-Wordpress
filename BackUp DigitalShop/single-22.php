<?php get_header(); ?>

<section>
	<!-- Page Content -->
	<div class="container">
		<?php if (have_posts()): ?>
			<?php while (have_posts()): the_post(); ?>
				<div class="row mb-30">
					<div class=col-lg-12>
						<!-- Title -->
						<h1 class="mt-4"><a href="<?php the_permalink();?>"><?php the_title(); ?></a>Toto</h1>
						<!-- Author -->
						<p class="lead">
							by
							<a href="#"><?php the_author(); ?></a>
						</p>
						<hr>
						<!-- Date/Time -->
						<p><?php the_date(); ?></p>
						<?php echo do_shortcode( '[purchase_link]' ); ?>
						<?php echo do_shortcode( '[download_cart] ' ); ?>
						
						<hr>
						</div><!-- Lg-12 -->
						<div class=col-lg-8>
						<!-- Preview Image -->
						<?php the_post_thumbnail('blog-post', array('class' => 'img-fluid rounded mt15em')); ?>
						<hr>
						<!-- Post Content -->
						<?php the_content(); ?>
						<hr>
					</div>
					<!--.Sidebar-->
					<div class="col-md-4">
						<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar' ); ?>
						<?php endif; ?>
					</div>
				</div><!-- /row -->
				
			<?php endwhile; ?>


			<!-- Pagination -->

			<div class="row">
				<div class="col-lg-8">
					<nav>
						<ul class="wilone-pager">
							<li class="float-left"><?php previous_post_link(); ?></li>
							<li class="float-right"><?php next_post_link(); ?></li>
						</ul>
					</nav>
				</div>	
			</div>
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