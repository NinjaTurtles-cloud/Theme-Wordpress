<?php

function wilone_save_options()	{

	

	if(!current_user_can('publish_pages')){ //Si l'utilisateur n'a pas les droit suffisants'
		wp_die('Vous n\'êtes pas autorisé à effectuer cette action');//
	}
	check_admin_referer('wilone_options_verify'); // communique avec wp_nonce_field('wilone_options_verify'); CF (includes/buil_options_pages) Pour se sécuriser contre les pirates

	$opts = get_option('wilone_opts');

	//Sauvegard la légende ( function.php ACTIVER LES OPTIONS)
	$opts['legend_01'] = sanitize_text_field($_POST["wilone_legend_01"]);//legend_01 = function.php tableau activ-option
	// wilone_legend_01 =  name" " du formulaire build-options-pages.php


	//Sauvegard l'image ( adin option.js)
	$opts['image_01_url'] = sanitize_text_field($_POST["wilone_image_url_01"]);//legend_01 = function.php tableau activ-option


	update_option('wilone_opts', $opts);//Met a jour la BDD le Tableau ACTIVER OPTIONS

	wp_redirect(admin_url('admin.php?page=wilone_theme_opts&status=1'));
	exit; // Redirection vers l'URL ... 

} // Fin fonction wilone_save_options 