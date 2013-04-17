<?php
/*
Template Name: Home
*/
?>


<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
	<div class="grid banner">
	<?php echo(render_view(array("title" => "Rotating Banner"))); ?>
	</div>
</div> 
</div>
<div id="home">
	<div class="container">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>