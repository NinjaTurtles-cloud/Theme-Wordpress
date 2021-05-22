<?php 
/*
Template Name: Liste Par Style
*/

get_header(); ?>
 
<?php $wilone_term_list = get_terms(array('taxonomy' => 'genre_mus', 'hide_empty' => true,));
if(count($wilone_term_list) > 0 ):

	foreach($wilone_term_list as $the_term): ?>
		<section class="media-front"> 

			<?php	$args_taxo_rupt 	= array(
					'post_type'			=> 'wilone_media',
					'posts_per_page' 	=> -1,
					'tax_query' 		=> array(
						array(
							'taxonomy' 		=> 'genre_mus',
							'field'    		=> 'slug',
							'terms'			=> $the_term->slug
							)
						)
					);
				$req_taxo_rupt = new WP_Query($args_taxo_rupt);

				if($req_taxo_rupt->have_posts()): ?>

				<div class="container">
					<div cass="row">
						<div class="col-12">
							<h1><?php echo $the_term->name; ?></h1>
						</div>
						<?php while($req_taxo_rupt->have_posts()):?>

							<?php $req_taxo_rupt->the_post(); ?>

						<article class="col-12 col-sm-6 col-lg-3 d-flex mb-3">
							<div class="card">
								<?php the_post_thumbnail('medium-large', array('class' => 'img-fluid card-img-top')); ?>
								<div class="card-footer h-100">
									<h1 class="h4 text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								</div>
							</div>
						</article>

					<?php endwhile; wp_reset_postdata() ?>
					</div>
				</div>
			<?php endif; ?>

		</section>

	<?php endforeach;
	endif;
	?>

<?php get_footer(); ?>