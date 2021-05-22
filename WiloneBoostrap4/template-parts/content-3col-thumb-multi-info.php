

<div class="col-lg-4 col-sm-6 portfolio-item">
<div class="card" style="width: 18rem;">
  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'three-col-thumb', array( 'class'=> 'img-fluid rounded card-img-top')); ?></a>
  <div class="card-body">
    <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Artist</li>
    <li class="list-group-item">Label</li>
    <li class="list-group-item">Contenu</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
</div>

        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">

            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'three-col-thumb', array( 'class'=> 'img-fluid rounded card-img-top')); ?></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h4>
              <h3>
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
<a href="<?php echo $link; ?>" title="Play &quot;Office Lobby&quot;" class="sm2_button"><i class="fas fa-headphones"></i> Démo
</a>

    <?php endif; ?>
    <!-- End Player Demo List Button --></h3>
              <p class="card-text">            <?php
the_excerpt(); ?></p>
<div><!-- Buy Button -->
<?php $downloads = get_field( 'downloads' ); ?>
            <?php if ( $downloads ): ?>
  <?php foreach ( $downloads as $p ): ?>
    <?php echo do_shortcode( '[purchase_link id="'.$p.'" style="" color="red" text="Buy"]' ); ?>
  <?php endforeach; ?>
<?php endif; ?> 
<!-- End Buy Button-->

</div>
            </div>
          </div>
        </div>



