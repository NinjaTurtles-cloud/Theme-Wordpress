<div class="row col-md-12">
	<div class="col-xs-2"><!-- La vignette IMAGE A LA UNE -->

	<?php if ($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'thumbnail')) :
	$thumbnail_src = $thumbnail_html['0'];?>
	<a href="<?php the_permalink(); ?>"><img class="img-responive img-thumbnail" src="<?php echo $thumbnail_src; ?>" alt=""></a><?php endif; ?>
	</div>
	<div class="col-xs-10">
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	     				<p>
	     				<?php echo wilone_give_me_meta_01(
	     													esc_attr( get_the_date('c') ),
	     													esc_html( get_the_date()),
	     													get_the_category_list(', '), 
	     													get_the_tag_list('', ', ')
	     													); ?>
	     				</p>

		<p><?php  the_excerpt(); ?></p>
	</div>
</div> <!--  ROW -->