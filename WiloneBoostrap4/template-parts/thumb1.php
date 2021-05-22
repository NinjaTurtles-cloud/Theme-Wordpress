<div class="row">
        <div class="col-md-7">
	<?php if ($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'heading-thumb')) :
	$thumbnail_src = $thumbnail_html['0'];?>


          <a href="<?php the_permalink(); ?>">
            <img class="img-fluid rounded mb-3 mb-md-0 image" src="<?php echo $thumbnail_src; ?>" alt="">
          </a><?php endif; ?>
        </div>
        <div class="col-md-5">
          <h3 class="m-up-reset"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p><?php  the_excerpt(); ?></p>
          <a class="btn btn-primary" href="#">View Project</a>
        </div>
      </div>
      <hr>