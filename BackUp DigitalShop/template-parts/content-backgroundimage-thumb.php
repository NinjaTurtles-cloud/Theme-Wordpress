<div class="card w-75" style="background-image:url(<?php echo $thumbnail_src; ?>)">
	<a href="<?php the_post_thumbnail( 'three-col-thumb', array( 'class'=> 'img-fluid rounded card-img-top')); ?>"></a>
  <div class="card-body">
    <h5 class="card-title"><?php the_title(); ?></h5>
    <p class="card-text"><?php the_excerpt(); ?></p>
    <a href="#" class="btn btn-primary">Button</a>
  </div>
</div>

<div class="card w-50">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Button</a>
  </div>
</div>