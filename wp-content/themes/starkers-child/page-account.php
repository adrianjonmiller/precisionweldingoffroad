<?php
/*
Template Name: Account
*/
?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="grid">
	<div class="col-2-3 my-account">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; ?>
	</div>
	<div id="sidebar-secondary" class="col-1-3">
	
		<?php dynamic_sidebar( 'secondary' ); ?>
	
	</div>
	
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>