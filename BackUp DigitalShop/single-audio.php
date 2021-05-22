<?php get_header(); ?>

<section>
	<div class="container">
		<div class="jumbotron BackGround0">
			<h1 class="col-xs-12 center custom-H1_main">Audio Shop</h1>
			<div class="row">       
				<h2 class="text-center custom-H2_main">By Wilone</h2>
			</div>
		</div>
	</div><!--  Container -->
</section>

<section>
	<div class="row">
		<div class="col-lg-4">
			
		</div>
		<div class="col-lg-8">
			
		</div>
	</div>
</section>

	<!-- Page Content -->
	<div class="container">
		<?php if (have_posts()): ?>
			<?php while (have_posts()): the_post(); ?>
				<div class="row mb-30">
					<div class=col-lg-12>
						<!-- Title -->
						<h1 class="mt-4"><a href="<?php the_permalink();?>"><?php the_title(); ?> 55</a>Single Audio</h1>
						<!-- Author -->
						<p class="lead">
							by
							<a href="#"><?php the_author(); ?></a>
						</p>
						<hr>
						<!-- Date/Time -->
						<p><?php the_date(); ?></p>
			<!-- Buy Button -->
			<?php $downloads = get_field( 'downloads' ); ?>
									<?php if ( $downloads ): ?>
				<?php foreach ( $downloads as $p ): ?>
					<?php echo do_shortcode( '[purchase_link id="'.$p.'" style="" color="" text="Buy"]' ); ?>
				<?php endforeach; ?>
			<?php endif; ?>	
			<!-- End Buy Button-->
			
			<!-- Player Demo List Button -->
			<?php if( have_rows('demo') ): ?>

				<ul class="boutonAudi">

					<?php while( have_rows('demo') ): the_row(); 

		// vars
					$link = get_sub_field('files22');
					$name = get_sub_field('name');

					?>
					<li>

						<a href="<?php echo $link; ?>" title="Play &quot;Office Lobby&quot;" class="sm2_button row" id="buttonPlay"><span class="playButton"><i class="fas fa-play-circle"></i></span><p class="playText">	<?php echo$name ?></p>
</a>
					</li>
				<?php endwhile; ?>
				</ul>


		<?php endif; ?>
		<!-- End Player Demo List Button -->


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