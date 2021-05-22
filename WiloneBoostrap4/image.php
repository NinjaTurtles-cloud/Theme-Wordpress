<?php get_header(); ?>

	<section>
		<div class="container">
			<div class="row">
			<?php if (have_posts()): ?>
			<?php while (have_posts()): the_post(); ?>
				<?php $alt_text = get_post_meta($post->ID, '_wp_attachment_image_alt', true); 
				$big_metadata = wp_get_attachment_metadata($post->ID);
				$month_upload = substr($big_metadata['file'],0,7); //echo $month_upload;
				$base_path = wp_upload_dir($month_upload)['url'].'/'; echo $base_path;
				$full_file = $base_path . substr($big_metadata['file'], 8); ?>

				<div class="mb-30">
					<!-- ************************** -->
					<!-- DESCRIPTION DE L'image -*- -->
					<!-- ************************** -->
					<div class="col-xs-12"><!-- La vignette IMAGE A LA UNE -->
						<h1><b>Image Principale</b></h1>
					</div>
					<div class="col-sm-2 col-md-4">
						<img class="img-responsive img-thumbnail" src="<?php echo $full_file; ?>" alt="">
					</div>
					<div class="col-sm-10 col-md-8">
						<h2 class="m-up-reset"><?php the_title();?></h2>
						<p><b>width :</b> <?php echo $big_metadata['width']; ?> px | 
						<b>height :</b> <?php echo $big_metadata['height']; ?> px</p>
						<p>
							<b>Image principale</b>(id:<?php echo$post->ID; ?>)</p><p><?php echo $full_file; ?>
						</p>
						<div>
							<p><b>Description:</b> <?php the_content();	?></p>
						</div>
						<div>
							<p><b>Légende:</b></p> <?php the_excerpt();?>
						</div>

						<div>
							<p><b>téléversée le :</b> <?php echo esc_html(get_the_date()); ?></p>
							<p><b>Texte alternatif :</b> <?php echo $alt_text; ?></p> 
						</div>
					</div>
				</div>						
			</div> <!--  /ROW -->

			<?php if(current_user_can('edit_posts')): ?>
			<div class="row">
					<!-- ************************** -->
					<!-- Autres tailles de l'image -*- -->
					<!-- ************************** -->
				<div class="col-xs-12">
					<h1>Autres tailles</h1>
				</div>


				<?php foreach ($big_metadata['sizes'] as $key=>$value) : ?>
					<div class="col-xs-12">
						<h2><?php echo $key; ?></h2>
						<p><?php echo $base_path.$value['file']; ?></p>
						<p class="lead"><?php echo $value['width'];?> X <?php echo $value['height']; ?></p>
					</div>
					<div class="col-xs-12 col-lg-8">
						<img clss="img-responsive img-thumbnail" src="<?php echo $base_path.$value['file']; ?>">
					</div>
				<?php endforeach; ?>
			</div> <!-- /ROW -->

				<?php 
					$tab_temp = array();
					$tab_test = get_post_meta($post->ID);
					foreach ($tab_test as $key => $value) {
						$tab_temp[] = $key;
					}
					if(in_array("_wp_attachment_backup_sizes", $tab_temp)): 
				?>
					<!-- ************************** -->
					<!-- 		Image Back-Up	    -->
					<!-- ************************** -->
			<div class="row">
				<div class="col-xs-12">
					<h1>Fichiers BackUp</h1>
				</div>

				<?php						
				$tab_origine = array();
				$tab_others = array();

				foreach (get_post_meta($post->ID, '_wp_attachment_backup_sizes', true) as $key => $value):
					if (substr($key, -5) == '-orig'):
						$tab_origine[] = array($key, $value['file']);
					else: 
						$tab_others[]  = array($key, $value['file']);
					endif;
				endforeach;

				if(count($tab_origine) > 0): ?>
					<div class="col-xs-12">
						<h2>Fichier Origineaux</h2>
						<table class="table">
							<?php foreach($tab_origine as $origine): ?>
								<tr>
									<td><?php echo $origine[0]; ?></td>
									<td><?php echo $origine[1]; ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div><!--col-xs-12-->
				<?php endif;//Count tab origin ?>

				<?php if (count($tab_others) > 0): ?>
					<div class="col-xs-12">
						<table class="table">
							<h2>Ancien fichier modifié</h2>
							<?php foreach($tab_others as $others): ?>
								<tr>
									<td><?php echo $others[0]; ?></td>
									<td><?php echo $others[1]; ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div><!--col-xs-12-->
				<?php endif;//Count tab others ?>
			</div><!--Row-->
			<?php endif;// can_edit_post ?>
			<?php endif;?>
			<?php endwhile;// boucle principale ?>	
			<?php endif;// If have post  ?>
		</div><!-- /container -->
	</section>

<?php get_footer(); ?>