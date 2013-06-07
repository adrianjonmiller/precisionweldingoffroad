<?php
/*
Template Name: Page with Sidebar
*/
?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="grid">
	<div class="col-2-3">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; ?>
	</div>
	<div id="sidebar-primary" class="col-1-3">
	
		<?php dynamic_sidebar( 'primary' ); ?>
	
	</div>
</div>	
	
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
