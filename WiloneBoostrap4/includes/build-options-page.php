<?php 

function wilone_build_options_pages() {	

	$theme_opts = get_option('wilone_opts'); ?>

	<div class="wrap">
		<div class="container">

			<div class="jumbotron">
				<h1 class="h2">Parmètres du site</h1>
			</div>

			<form id="form-wilone-options" class="form-horizontal" method="post" action="admin-post.php">
				<input type="hidden" name="action" value="wilone_save_options"> <!-- Champ caché avec la variable action $POST avec la valeur wilone_save_value -->
				<?php 	// attribut value = "fonction utilisé pour sauveegarder les options"
						// add_action('admin_post_wilone_options', 'my-function');
						 
				?>

				<div class="col-xs-12"><!-- Element du formulaire -->
					<div class="form-group">
						<label for="wilone_legend_01" class="col-sm-2 control-label">Légende</label>
						<div class="col-sm-10">
							<input type="text" id="wilone_legend_01" name="wilone_legend_01" value="<?php echo $theme_opts['legend_01']; ?>" style="width:100%;">
						</div>
					</div>
				</div><!---Fin Element du formulaire col-xs-12 -->


				<div>
					<button id="validator" type="submit" class="btn btn-success btn-lg">Mettre a jour les options</button>
				</div>

		 	</form>

		</div> <!-- Container -->
	</div> <!-- /wrap --> <?php

} //Fin fonction wilone_build_options_page