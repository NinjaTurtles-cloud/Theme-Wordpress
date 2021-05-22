 <!-- Project One -->
             <?php 
              while (have_posts()): 
            the_post(); ?>
 <div class="row">
        <div class="col-md-7">
          <a href="<?php echo get_permalink() ?>">
            <?php the_post_thumbnail( 'one-col-thumb', array( 'class'=> 'img-fluid rounded mb-3 mb-md-0')); ?>
          </a>
        </div>
        <div class="col-md-5">
          <h3><?php the_title(); ?></h3>
            <?php
the_excerpt(); ?>
          <a class="btn btn-primary" href="<?php echo get_permalink() ?>">View Project</a>
        </div>
      </div>
      <!-- /.row -->
      <hr>
           <?php endwhile; ?>