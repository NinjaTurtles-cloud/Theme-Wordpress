<?php // Requette pour la création du slider CLient (Afficher les image du CPT) 
    $args = array(
      'post_type'     => 'wilone_slider_1',
      'posts_per_page' => -1,
      'orderby'       => 'menu_order',
      'order'         => 'ASC'
      );
    $slider_query_1 = new WP_Query($args);

if($slider_query_1->have_posts()): ?>




  <section id="home-carousel">
      <div class='container'>

        <div id="slider_1-01" class="carousel slide">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <?php $indicator_1_index = 0;
            while ($slider_query_1->have_posts() ) : $slider_query_1->the_post(); 
                echo '<li data-target="#slider_1-01" data-slide-to="' 

                //. $indicator_1_index 
                .$slider_query_1->current_post
                 
                //.'"class="' . ($indicator_1_index == 0 ? "active" : "" ) . '">'.$slider_query_1->current_post.'</li>';

                .'"class="' . ($slider_query_1->current_post == 0 ? "active" : "" ) . '"></li>'; ?>
            

            <!-- <li data-target="#slider_1-01" data-slide-to="0" class="active"></li>
            <li data-target="#slider_1-01" data-slide-to="1"></li>
            <li data-target="#slider_1-01" data-slide-to="2"></li>
            <li data-target="#slider_1-01" data-slide-to="3"></li> -->

                <?php $indicator_1_index++; endwhile; ?>
          </ol>

          <?php rewind_posts(); ?>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">

            <?php //$active_test = true;
             while ($slider_query_1->have_posts() ) : $slider_query_1->the_post();

                if($thumbnail_1_html = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'front-slider_1')):
                    $thumbnail_src_1 = $thumbnail_1_html['0'];
                    $alt_val_1 = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt');
                    $alt_val_1 = $alt_val_1[0];?>

              <div class="carousel-item<?php echo ($slider_query_1->current_post == 0 ? " active" : ""); // Si $active test est vraie j'affiche " active" sinon ""  ?>">
                <img class="d-block w-100" src="<?php echo $thumbnail_src_1; ?>" alt="<?php echo $alt_val_1 ?>">
                <div class="carousel-caption">
                <!-- La methode jQuer .data() permet de recuper le contenu de l'attribut Exemple : 
                .data('animation') récupère la valeur de l'attribut HTML5 data-animation -->
                  <h3 data-animation="animated bounceInDown"><?php echo the_title() ?></h3>
                  <h4 data-animation="animated bounceInDown"><?php echo the_field('sous_titre'); ?></h4>
                </div>
              </div>
            <?php //$active_test = false; 
              endif;
                  endwhile; wp_reset_postdata(); ?>
          
          </div>

          <!-- Controls -->
          <a class="carousel-control-prev" href="#slider_1-01" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#slider_1-01" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div><!-- container -->
  </section>

<?php endif; ?>