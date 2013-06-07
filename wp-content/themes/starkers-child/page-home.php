<?php
/*
Template Name: Home
*/
?>


<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
	<div class="banner">
	<?php echo(render_view(array("title" => "Rotating Banner"))); ?>
	</div>
</div> 
</div>
<div id="home">
	<div class="container">
		<div class="grid obj_sameHeights">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div class="col-1-2">
		  <article class="module">
		    <h2><?php single_post_title(); ?></h2>
		    <?php the_content(); ?>
		  </article>
		</div>
		<?php endwhile; ?>
		<div class="col-1-4 side-column">
		  <div class="module">
		  <h3>Recent Products</h3>
		  <?php echo(render_view(array("title" => "Recent Product"))); ?>
		  </div>
		</div>
		<div class="col-1-4 side-column">
		  <div class="module facebook-feed">
		    <?php dynamic_sidebar( 'home' ); ?>
		  </div>
		</div>
		
		</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
