
/* 
Color H1
jQuery(document).ready(function($) {
	$("h1").css('color',"red");
}); 


/********************************************************************/
/*			Code javaScript associé au theme Wilone				    /
/******************************************************************/

/*SLIDER */
/* Code javaScript */
jQuery(document).ready(function($) {

	/*Si l'id slider-01 existe alors execute ce code*/
	if(document.getElementById("slider-01")){

		var $myCarousel = $('.carousel');// variable $myCarousel stock l'élement .carousel

		// starts the carousel Cf BootStrap
		$myCarousel.carousel({
			interval: 3000 //milliseconde
		});


		$myCarousel.on('slide.bs.carousel', function (e) {
			//Stock dans la var animatingElems la diapositive (H3 H4)
			var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");			
			doAnimations($animatingElems);
		});

		var $firstAnimatedElement = $myCarousel.find(".carousel-item:first").find("[data-animation ^= 'animated']");
		doAnimations($firstAnimatedElement);


		function doAnimations(elems){
			var animEndEv = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
			elems.each(function() {
				var $this = $(this);
				$animationType = $this.data('animation');
				$this.addClass($animationType).one(animEndEv, function(){
					$this.removeClass($animationType);
				});
			}); // Fin du eech
		} //Fin Do Animation 

		

	} // Fin document.getElementById






/********************************************************************/
/*		Ajustement des image avec caption (image avec legende)		/
/******************************************************************/
if(document.getElementById('can-have-caption')){

	var imageSet = $("#can-have-caption .wp-caption img");

	imageSet.each(function(index, elem) {
	$this = $(this);
	var realWidth = $this.attr('width');

	var cssWidth = realWidth + 'px';
	$this.parent().css('max-width', cssWidth); 
	
		}); //

	} //if #can-have-option


}); //Fin du Ready




/**/
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})