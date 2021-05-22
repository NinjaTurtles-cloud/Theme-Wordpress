
	    <footer>

		    <div class="container ">
		    	<div class="row">

		    	<?php if(is_active_sidebar('widgetized-footer')): ?>

		    		<?php dynamic_sidebar('widgetized-footer'); ?>

		    	<?php else: ?>

			    	<div class="col-12 col-lg-6  BGb">
			    		<p style="padding-top: 8px;">Audio Place est une plateforme de vente en ligne de produit digital</p>
			    	</div>
			    	<div class="col-12 col-lg-6 BGb">
			    		<ul class="nav">
			    			<li class="nav-item">
			    				<a class="nav-link active" href="<?php echo get_page_link(165); ?>">Contact</a>
			    			</li>
			    			<li class="nav-item">
			    				<a class="nav-link" href="#">Team</a>
			    			</li>
			    			<li class="nav-item">
			    				<a class="nav-link" href="#">Privacy</a>
			    			</li>
			    						    			<li class="nav-item">
			    				<a class="nav-link" href="<?php echo get_page_link(178); ?>">About</a>
			    			</li>
			    			<li class="nav-item">
			    				<a class="nav-link" href="#">License</a>
			    			</li>
			    		</ul>
			    	</div>
			    	<div class="col-12 BGa1">
			    		<p class="text-center h3 COta2">Suivez nous</p>
			    		<p class="text-center h2 COt1"><a href="www.facebook.com"><i class="fab fa-facebook-f"></i></a></p>
			    	</div>

			    <?php  endif; ?>	
			    </div>
		    </div>

	    </footer>	
<?php wp_footer(); ?>
	</body>
</html>