<script>$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})</script>
<?php 
        // Requetes pour Affiché l'image a la une
         if ($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'three-col-thumb')) :
        $thumbnail_src = $thumbnail_html['0'];?>
        
        <div class="col-lg-4 col-12 portfolio-item" style="padding-bottom: 15px;">
          <div class="row">
            <h4 class="text-center centerAuto pad15rem BGc2 COt1" style=" width: 80%"><?php the_title(); ?></h4>
          </div>
        <div class="card text-center" style="width: 100%;">
  <div class="card-body" style="background-size: cover; background-image:url(<?php echo $thumbnail_src; ?>)">
<div class="row"><!--Play Button -->
      <?php if( have_rows('demo') ): ?>

          <?php while( have_rows('demo') ): the_row(); 

    // vars 
          $link = get_sub_field('files22');
          $name = get_sub_field('name');

          ?>
        <?php endwhile; ?>
        
<a href="<?php echo $link; ?>" title="Play &quot;Office Lobby&quot;" class="centerAuto"><i class="far fa-play-circle  centerAuto COt2" style="font-size: 12rem; padding-bottom: 2rem; opacity: 0.7;"></i>
</a>

    <?php endif; ?>
    <!-- End Player Demo List Button --></div>
<div class="row"> 
<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" title="<em>Tooltip</em> <u>with</u> <b>HTML</b>">
  Info
</button>
    <span class="playButton" style="float: left;"><?php $downloads = get_field( 'downloads' ); ?>
            <?php if ( $downloads ): ?>
  <?php foreach ( $downloads as $p ): ?>
    <?php echo do_shortcode( '[purchase_link id="'.$p.'" style="" class="btn btn-primary BGa2" color="red" text="Buy"]' ); ?>
  <?php endforeach; ?>
<?php endif; ?></span></div>
  </div>
</div>
        </div>

 <?php endif; ?>
 

