

        <div class="col-lg-4 col-sm-6 portfolio-item" style="padding-bottom: 15px;">
          <div class="card h-100">

            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'three-col-thumb', array( 'class'=> 'img-fluid rounded card-img-top')); ?></a>
            <div class="card-body BGc2">
              <h4 class="card-title COt1"><?php the_title(); ?>
              </h4>
              <p class="card-text COt2"><?php $telechargement_label_terms = get_field( 'telechargement_label' ); ?>
<?php if ( $telechargement_label_terms ): ?>
  <?php foreach ( $telechargement_label_terms as $telechargement_label_term ): ?>
    <?php echo $telechargement_label_term->name; ?>
  <?php endforeach; ?>
<?php endif; ?></p>
<div class="row" style="
    margin-top: 10px; margin-bottom: 10px;">
  <div class="col-9 "><!-- Buy Button -->
<?php $downloads = get_field( 'downloads' ); ?>
            <?php if ( $downloads ): ?>
  <?php foreach ( $downloads as $p ): ?>
    <?php echo do_shortcode( '[purchase_link id="'.$p.'" style="" class="btn btn-primary BGa2" color="red" text="Buy"]' ); ?>
  <?php endforeach; ?>
<?php endif; ?> 
</div><!-- Buy Button -->
<div class="col-3 text-center"> <h3>
                <!-- Player Demo List Button -->
      <?php if( have_rows('demo') ): ?>

        <ul class="graphic demo1">

          <?php while( have_rows('demo') ): the_row(); 

    // vars
          $link = get_sub_field('files22');
          $name = get_sub_field('name');

          ?>
        <?php endwhile; ?>
        </ul>
<a href="<?php echo $link; ?>" title="Play &quot;Office Lobby&quot;" class="sm2_button"><i class="far fa-play-circle COt2"></i>
</a>

    <?php endif; ?>
    <!-- End Player Demo List Button --></h3></div>
</div>

            </div>
          </div>
        </div>



