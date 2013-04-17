	
	</div>
</div>
<footer>
	<div class="container">
		<div class="grid">
			<?php echo do_shortcode('[wpv-view name="Menu-Parent-Category"]'); ?>
			<div class="col-1-5">
				<div class="module">
				<h4><span>Navigation</span></h4>
				<?php wp_nav_menu(array(
				    'container'=> 'nav',
				    'container_class' => 'footer',
				    'menu_id' =>'dropmenu',
				    'menu_class' =>'child-categories',
				    'theme_location' => 'footer'
				)); ?>
				</div>
			</div>
		</div>
	</div>
</footer>
