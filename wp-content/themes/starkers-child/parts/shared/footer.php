
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
		<div class="grid">
			<div class="col-1">
				<div class="module copyright-address">
				&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved. <span class="address" style="float: right;">3189 Harms Avenue, Oroville, California 95966</span>
				</div>
			</div>
		</div>
	</div>
</footer>
