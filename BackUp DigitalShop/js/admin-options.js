jQuery(document).ready(function($) {


	/******************************************************* */
	/***	      Ajouter une image dans la page             */
	/******************************************************* */
	/* CF function.php  Ajout de la taille medium large dans la catégorie */
	var frame		= wp.media({
			title: 'Sélectionne une image Pélo', //Titre
			button: {
				text: "Tu veux utiliser ce média pélo ?" //Texte du boutton
			},
			multiple: false //Qu'une seul image a la fois 
		});

	$("#form-wilone-options #btn_img_01").click(function(e) {
		e.preventDefault(); //Quand on clique sur l'évenement

		frame.open(); // On déclench l'evenement OPEN
	});

	frame.on('select', function() {

		var objImg = frame.state().get('selection').first().toJSON();

		var mon_url = objImg.sizes.medium_large.url;

		$("img#img_preview_01").attr('src', mon_url); /* je cible l'élement imgcf build options pages.php*/
		$('input#wilone_image_01').attr('value', mon_url); /* Je cible l'élément input pour changer value avec mon url // cf build options pages.php*/
		$('input#wilone_image_url_01').attr('value', mon_url); /* Je cible l'élément input pour changer value avec mon url // cf build options pages.php*/

	});

});