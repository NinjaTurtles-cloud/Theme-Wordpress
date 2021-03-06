
<?php get_header(); ?>

    <div class="container">

      <!-- Heading Row -->
      <div class="row my-4">
        <div class="col-lg-8">
          <img class="img-fluid rounded" src="http://placehold.it/900x400" alt="">
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
          <h1>Business Name or Tagline</h1>
          <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
          <a class="btn btn-primary btn-lg" href="#">Call to Action!</a>
        </div>
        <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->

      <!-- Call to Action Well -->
      <div class="card text-white bg-secondary my-4 text-center">
        <div class="card-body">
          <p class="text-white m-0">This call to action card is a great place to showcase some important information or display a clever tagline!</p>
        </div>
      </div>

      </div><!-- /.container -->


<br>

<!--Content-->
<div class="container">
	<div class="row">

<!--Query from "cards" category-->
<?php 
$args = array(
'orderby'          => 'date',
'order'            => 'ASC',
'posts_per_page'   => 3,
'category_name'  => 'cards'
);

// The Query
$query2 = new WP_Query( $args );

if ( $query2->have_posts() ) {
    // The Loop
while ( $query2->have_posts() ) {
    $query2->the_post();
    ?>

<?php  get_template_part("template-parts/content-3col-thumb"); ?> 


    <?php
}
wp_reset_postdata();
} ?>
<!--/.Dynamic query listing posts from "cards" category-->
              
    </div><!--/.row-->
    </div><!--/.Container-->

              
<?php get_footer();  ?>