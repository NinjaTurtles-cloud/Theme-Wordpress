<ol class="medias py-md-5 my-md-5 px-sm-0 mx-sm-0">
<?php 
  require_once('class-wp-bootstrap-comment-walker.php');

  wp_list_comments( array(
      'style'         => 'ol',
      'max_depth'     => 4,
      'short_ping'    => true,
      'avatar_size'   => '50',
      'walker'        => new Bootstrap_Comment_Walker(),
  ) );
?>
</ol>