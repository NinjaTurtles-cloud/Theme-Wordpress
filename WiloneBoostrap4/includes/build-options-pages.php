<?php 

function wilone_build_options_pages() {	

	$theme_opts = get_option('wilone_opts'); ?>

	<div class="wrap">
		<div class="container">

			<?php if(isset($_GET['status']) && $_GET['status'] == 1) { //Si la variable status a la valeur 1 on affiche : 
					echo '<div class="alert alert-success"> Mise à jour effectué avec succès</div>';
				} ?>

			<div class="jumbotron">
				<h1 class="h2">Parmètres du site Toto</h1>
			</div>

			<form id="form-wilone-options" class="form-horizontal" method="post" action="admin-post.php"><!-- action=URL -->
				<input type="hidden" name="action" value="wilone_save_options"> <!-- Champ caché avec la variable action $POST avec la valeur wilone_save_value -->
				<?php 	// attribut value = "fonction utilisé pour sauveegarder les options"
						// add_action('admin_post_wilone_options', 'my-function');
				
					wp_nonce_field('wilone_options_verify'); //Verifie que ce n'st pas un piate quienvoi le formulaire
				?>

				<div class="col-xs-12">					
					<h1 class="h2">Image du logo en page d'accueil (haut de la page)</h1>
					<div class="row">
						<div class="col-lg-5">

							<img style="margin-bottom:20px;" id="img_preview_01"
							src="<?php echo $theme_opts['image_01_url']; ?>"
							class="img-responsive img-thumbnail" alt=""><!-- Contient l'image avec la l'url de la clé theme_opts -->

						</div>

						<div class="col-lg-6 col-lg-offset-1">							
							<button class="btn btn-primary btn-lg btn-select-img" id="btn_img_01">choisir ton logo</button>
						</div>

					</div><!--- ROW -->

					<div class="form-group">
						<label for="wilone_image_01" class="col-sm-2 control-label">image sauvegardée</label>
						<div class="col-sm-10">
							
							<input type="text" width="300px" id="wilone_image_01" name="wilone_image_01" disabled value="<?php echo $theme_opts['image_01_url']; ?>" style="width:100%;"/>
							
							<input type="hidden" width="300px" id="wilone_image_url_01" name="wilone_image_url_01" value="<?php echo $theme_opts['image_01_url']; ?>" style="width:100%;"/>


						</div>
					</div>
				</div>


				<div class="col-xs-12"><!-- Element du formulaire -->
					<div class="form-group">
						<label for="wilone_legend_01" class="col-sm-2 control-label">Légende</label>
						<div class="col-sm-10">
							<input type="text" id="wilone_legend_01" name="wilone_legend_01" value="<?php echo $theme_opts['legend_01']; ?>" style="width:100%;" ><!-- Stock l'URL de l'image -->
						</div>
					</div>
				</div><!---Fin Element du formulaire col-xs-12 -->


				<div>
					<button id="validator" type="submit" class="btn btn-success btn-lg">Mettre à jour les options</button>
				</div>

		 	</form>

		</div> <!-- Container -->
	</div> <!-- /wrap --> 

<?php
} //Fin fonction wilone_build_options_page