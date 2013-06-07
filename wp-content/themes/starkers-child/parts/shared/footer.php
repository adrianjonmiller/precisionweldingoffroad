		</div>
	</div>
</div>
<footer>
	<div class="container">
		<div class="grid obj_sameHeights">
			<div class="col-1-3">
				<article class="module">
					<h4><span>Connect with us:</span></h4>
						<a href="https://www.facebook.com/pages/Precision-Welding-Offroad/158777317510200" id="facebook-link" target="_blank">facebook</a>
						<a href="#" id="twitter-link">twitter</a>
				</article>
			</div>
			<div class="col-1-3">
				<article class="module">
					<h4><span>Contact Information</span></h4>
					<div class="contact-info"><label class="contact-label">Address </label><br />3189 Harms Avenue<br />
					Oroville, California 95966
					</div>
					<div class="contact-info"><label class="contact-label">Phone </label><br /> 530.534.8960</div>
				</article>
			</div>
			<div class="col-1-3">
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
				<span>&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved. </span><span class="address" style="float: right;">3189 Harms Avenue, Oroville, California 95966</span>
				</div>
			</div>
		</div>
	</div>
</footer>
