
	    <footer class="bg-primary">

		    <div class="container">
		    	<div class="row">

		    	<?php if(is_active_sidebar('widgetized-footer')): ?>

		    		<?php dynamic_sidebar('widgetized-footer'); ?>

		    	<?php else: ?>

			    	<div class="col-12">
			    		<p>This is thegfdsfgsdf Footer</p>
			    	</div>

			    <?php  endif; ?>	
			    </div>
		    </div>

	    </footer>	
<?php wp_footer(); ?>
	</body>
</html>