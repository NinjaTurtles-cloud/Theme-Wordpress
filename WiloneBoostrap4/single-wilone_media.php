
<?php get_header(); ?>
	    <section>
	    <?php 	if(have_posts()): ?>
	     	<div class="container">
	     	<?php // Afficher date et catégorie
	     	     	while (have_posts()): 
     				the_post(); 

     					$date = sprintf('<time class="entry-date" datetime="%1$s">%2$s</time>', esc_attr( get_the_date('c')), esc_html( get_the_date() ));
     					?>

	     		<div class="row col-md-12">
	     			<div class="col-xs-12">


	     				<?php the_post_thumbnail('full', array('class' => 'img-responsive aligncenter mb-30'));//('taille', tableau pour ajouter la valeur class pour la balise img) ?>
	     				<h1 class="text-center"><?php the_title(); ?></h1>

	     				<p class="text-center mb-30">
	     				<?php echo wilone_give_me_meta_01(
	     													esc_attr( get_the_date('c') ),
	     													esc_html( get_the_date()),
	     													get_the_category_list(' , '),
	     													get_the_tag_list('', ', ')); ?>
	     				</p>
	     				<p><?php the_content(); ?></p>
	     			</div>
	     		</div> <!--  ROW -->

	     		<?php endwhile; ?>
	     		<div class="row">
	     			<div class="col-xs-12">
	     				<nav>
	     					<ul class="machin-pager">
	     						<li class="pull-left"><?php previous_post_link(); ?></li>
	     						<li class="pull-right"><?php next_post_link(); ?></li>
	     					</ul>
	     				</nav>
	     			</div>	
	     		</div>



	     	</div><!--  Container -->

	     	<?php else: echo 'y a pas de resultats';
	     	endif; ?>
	    </section> 


<?php get_footer();  ?>