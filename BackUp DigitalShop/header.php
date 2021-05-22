<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php wp_head(); ?>
	<link async href="http://fonts.googleapis.com/css?family=Fredoka%20One" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
	<link async href="http://fonts.googleapis.com/css?family=Nova%20Flat" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

</head>
<body class="BGa">
	<header>
		<nav class="navbar navbar-expand-lg bg-faded">
			<div class="container">
				<a class="navbar-brand COa0" href="<?php echo bloginfo( 'url' ); ?>"><i class="fab fa-github-square"></i> AudioZone</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				
<?php
wp_nav_menu( array(
	'menu'				=> 'top menu',
    'theme_location'	=> 'primary',
    'depth'				=> 2, // 1 = with dropdowns, 0 = no dropdowns.
	'container'			=> 'div',
	'container_class'	=> 'collapse navbar-collapse',
	'container_id'		=> 'navbar',
	'menu_class'		=> 'nav navbar-nav ml-auto',
    'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
    'walker'			=> new WP_Bootstrap_Navwalker()
) );
?>
		</div> <!-- Container -->
			</nav>


	</header>

 