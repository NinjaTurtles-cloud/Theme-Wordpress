<!-- Script Boostrap Info Bulle-->
<script>$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})</script>


<?php $telechargement_label_terms = get_field( 'telechargement_label' ); ?>


<?php 
        // Requetes pour Affiché l'image a la une
         if ($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'three-col-thumb')) :
        $thumbnail_src = $thumbnail_html['0'];?>
        
        <div class="col-lg-4 col-12 portfolio-item" style="padding-bottom: 15px;">
          <div class="row">
            <a href="<?php the_permalink(); ?>" class="text-center centerAuto pad15rem BGc2 COt1 COa2H decoNone" style=" width: 80%"><h4 class="zoom decoNone"><?php the_title(); ?></h4></a>
          </div>
        <div class="card text-center" style="width: 100%;">
  <a href="http://www.google.fr"></a><div class="card-body" style="background-size: cover; background-image:url(<?php echo $thumbnail_src; ?>)">
<div class="row"><!--Play Button -->
      <?php if( have_rows('demo') ): ?>

          <?php while( have_rows('demo') ): the_row(); 

    // vars 
          $link = get_sub_field('files22');
          $name = get_sub_field('name');

          ?>
        <?php endwhile; ?>
        
<a href="<?php echo $link; ?>" title="Play &quot;Office Lobby&quot;" class="centerAuto"><i class="far fa-play-circle  centerAuto COt2 COa2H" style="font-size: 12rem; padding-bottom: 2rem; opacity: 0.7;"></i>
</a>

    <?php endif; ?>
    <!-- End Player Demo List Button --></div>
<div class="row">
<a href="<?php the_permalink(); ?>" style="   margin:0 auto;
    display:block;"><button  type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" title='<p class="text-left">Artiste : <?php the_author(); ?></p>
      <p class="text-left">Label : <?php $telechargement_label_terms = get_field( 'telechargement_label' );?>
<?php if ( $telechargement_label_terms ): ?>
  <?php foreach ( $telechargement_label_terms as $telechargement_label_term ): ?>
    <?php echo $telechargement_label_term->name; ?>
  <?php endforeach; ?>
<?php endif; ?></p>
<p class="text-left">Genre : <?php $ACF_telechargement_genre_terms = get_field( 'ACF_telechargement_genre' ); ?>
<?php if ( $ACF_telechargement_genre_terms ): ?>
  <?php foreach ( $ACF_telechargement_genre_terms as $ACF_telechargement_genre_term ): ?>
    <?php echo $ACF_telechargement_genre_term->name; ?>
  <?php endforeach; ?>
<?php endif; ?></p>
<p class="text-left">Contenu : <?php $ACF_telechargement_contenu_terms = get_field( 'ACF_telechargement_contenu' ); ?>
<?php if ( $ACF_telechargement_contenu_terms ): ?>
  <?php foreach ( $ACF_telechargement_contenu_terms as $ACF_telechargement_contenu_term ): ?>
    <?php echo $ACF_telechargement_contenu_term->name; ?>
  <?php endforeach; ?>
<?php endif; ?></p>
<p class="text-left"> format : <?php $ACF_telechargement_format_terms = get_field( 'ACF_telechargement_format' ); ?>
<?php if ( $ACF_telechargement_format_terms ): ?>
  <?php foreach ( $ACF_telechargement_format_terms as $ACF_telechargement_format_term ): ?>
    <?php echo $ACF_telechargement_format_term->name; ?>
  <?php endforeach; ?>
<?php endif; ?></p>'>
  Informations
</button></a>
<!--Boutton Buy -->
<span style="margin: 0 auto;">
    <?php echo do_shortcode( '[purchase_link id="'.get_the_ID().'" style="" class="btn BGa2 COt1 right-align" color="blue" text="Buy"]' ); ?>
  </span>
<!--Fin /Boutton Buy  -->



</div><!--Fin /row -->
  </div><!--Fin /Card Body -->
</div>
        </div>



 <?php endif; ?>

            
          