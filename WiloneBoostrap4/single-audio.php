<?php get_header(); ?>

<section>
	<div class="container">	
	<div class="row">
		<div class="col-lg-4">

									<div class=col-12>
						<!-- Preview Image -->
						<?php the_post_thumbnail('full', array('class' => 'img-fluid rounded mt15em')); ?>
						<hr></div>

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
			
		</div>
		<div class="col-lg-8">
			<?php if (have_posts()): ?>
			<?php while (have_posts()): the_post(); ?>
				<div class="row mb-30">
					<div class=col-lg-12>
						<!-- Title --><ul>
						<h1 class="mt-4 COt1"><?php the_title(); ?></h1>
						<!-- Author -->
						<p class="lead">
							Artist
							<a href="#"><?php the_author(); ?></a>
						</p>
						<p>	label : <?php $telechargement_label_terms = get_field( 'telechargement_label' ); ?>
<?php if ( $telechargement_label_terms ): ?>
	<?php foreach ( $telechargement_label_terms as $telechargement_label_term ): ?>
		<?php echo $telechargement_label_term->name; ?>
	<?php endforeach; ?>
<?php endif; ?> </p>

						<p>	genre : <?php $ACF_telechargement_genre_terms = get_field( 'ACF_telechargement_genre' ); ?>
<?php if ( $ACF_telechargement_genre_terms ): ?>
	<?php foreach ( $ACF_telechargement_genre_terms as $ACF_telechargement_genre_term ): ?>
		<?php echo $ACF_telechargement_genre_term->name; ?>
	<?php endforeach; ?>
<?php endif; ?></p>
						<p>contenu : <?php $ACF_telechargement_contenu_terms = get_field( 'ACF_telechargement_contenu' ); ?>
<?php if ( $ACF_telechargement_contenu_terms ): ?>
	<?php foreach ( $ACF_telechargement_contenu_terms as $ACF_telechargement_contenu_term ): ?>
		<?php echo $ACF_telechargement_contenu_term->name; ?>
	<?php endforeach; ?>
<?php endif; ?> </p>
						<hr>

						<?php the_content(); ?>

<!--Boutton Buy --><span style="margin: 0 auto;">
    <?php $downloads = get_field( 'downloads' ); ?>
            <?php if ( $downloads ): ?>
  <?php foreach ( $downloads as $p ): ?>
    <?php echo do_shortcode( '[purchase_link id="'.$p.'" style="" class="btn BGa2 COt1 CObH right-align" color="blue" text="Buy"]' ); ?>
  <?php endforeach; ?></span><!--Fin /Boutton Buy  -->
<?php endif; ?>
			

			
		</div>
	</div>
	</div>
</section>

	<!-- Page Content -->
	<div class="container">
		


						<hr>
						</div><!-- Lg-12 -->

						<!-- Post Content -->
						
						<hr>
				
				
			<?php endwhile; ?>


			
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