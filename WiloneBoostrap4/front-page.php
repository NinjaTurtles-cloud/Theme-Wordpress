
<?php get_header(); ?>

    <div class="container">

      <!-- Heading Row -->
      <div class="row my-4">
        <div class="col-lg-8">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">

<!--Dynamic query listing posts from "carousel" category-->
<?php 
$counter = 1;
$args = array(
    'orderby'          => 'date',
    'order'            => 'ASC',
    'posts_per_page'   => 3,
    'category_name'  => 'carousel'
    );

// The Query
$query1 = new WP_Query( $args );

if ( $query1->have_posts() ) {
    // The Loop
    while ( $query1->have_posts() ) {
        $query1->the_post();
        ?>
        <!-- Looping slide -->
        <div class="carousel-item <?php echo $counter==1 ? "active": ""; ?>">
  <a href="<?php the_permalink(); ?>"><img class="d-block w-100" src="<?php the_post_thumbnail_url( 'smallBiz' ) ?>" alt="First slide"></a>
   <div class="carousel-caption d-none d-md-block">
    <h5><?php echo the_title( ); ?></h5>
    <p><?php echo the_title( ); ?></p>
  </div>

        </div>
        <!--/.Looping slide-->
        <?php
        $counter++;
    }
    wp_reset_postdata();
} ?>
<!--/.Dynamic query listing posts from "carousel" category-->




  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
          <h1 class="COt1">Market Place #Audio</h1>
          <p class="COt1">This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
          <a class="btn btn-primary btn-lg" href="#">Call to Action!</a>
        </div>
        <!-- /.col-md-4 -->

      </div>
      <!-- /.row -->

      <!-- Call to Action Well -->
      <div class="card text-white bg-secondary my-4 text-center">
        <div class="card-body">
          <p class="text-white m-0">Devenez un producteur en nous envoyant un streaming SoundClound, Youtube de vos demos</p>
        </div>
      </div>

      <div class="row">
        
<?php  ?>

      </div>

      </div><!-- /.container -->


<br>

<!--Content-->
<div class="container">
	<div class="row">

    <?php  get_template_part("template-parts/content-form-filter"); ?>    

<!--Query from "cards" category-->
<?php 
$args = array(
'post_type' => 'download'
);

// The Query
$query2 = new WP_Query( $args );

if ( $query2->have_posts() ) {
    // The Loop
while ( $query2->have_posts() ) {
    $query2->the_post();
    ?>

 

<?php  get_template_part("template-parts/content-3col-thumbBG-edd"); ?>



    <?php
}
wp_reset_postdata();
} ?>
<!--/.Dynamic query listing posts from "cards" category-->
      
    </div><!--/.row-->
    </div><!--/.Container-->

              
<?php get_footer();  ?>