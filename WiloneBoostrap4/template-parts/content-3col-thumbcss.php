



  <div class="col-sm-6 col-lg-3 noPadding">
    <a href="<?php the_permalink(); ?>"><div class="card h-100">
      <div class="card-body bgcard" style="background-image: url(<?php the_post_thumbnail_url( '' ) ?>);    background-repeat: no-repeat;
    background-size: 100% 100%;
        padding-bottom: 0px;
        padding-right: 15px;

">
<div class="dataContain">
        <h5 class="card-title text-center thumbcss"><?php the_title(); ?></h5>
        <p class="thumcss">Artist</p>
        <p class="thumbss">Label</p>
</div>
<div class="row" style="
    margin-top: 10px; margin-bottom: 10px;">
  <div class="col-9 "><!-- Buy Button -->
<?php $downloads = get_field( 'downloads' ); ?>
            <?php if ( $downloads ): ?>
  <?php foreach ( $downloads as $p ): ?>
    <?php echo do_shortcode( '[purchase_link id="'.$p.'" style="" class="btn btn-primary" color="red" text="Buy"]' ); ?>
  <?php endforeach; ?>
<?php endif; ?> 
</div>

<div class="col-3 text-center" style="background-color:;"> <h3>
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
<a href="<?php echo $link; ?>" title="Play &quot;Office Lobby&quot;" class="sm2_button"><i class="far fa-play-circle"></i>
</a>

    <?php endif; ?>
    <!-- End Player Demo List Button --></h3></div>
</div>

      </div><!-- Card Body -->
    </div><!-- End Card 100 --></a>
  </div>



