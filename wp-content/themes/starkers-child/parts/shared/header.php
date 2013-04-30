
<header class="animate top">
	<div class="container">
	<div class="grid">
		<h1><a href="/" id="logo"><img src="/wp-content/themes/starkers-child/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
<!--		<div class="blog-description"><?php bloginfo( 'description' ); ?></div>-->
		<?php 
		
		if( is_user_logged_in() ) {
		    $menu = 'logged-in';
		    $search = '120px';
		    
		} else {
		    $menu = 'logged-out';
		    $search = '60px';
		}
		
		wp_nav_menu(array(
		    'container'=> 'div',
		    'container_class' => '',
		    'menu_id' =>'my-account-menu',
		    'menu_class' =>'',
		    'theme_location' => $menu
		)); ?>
		
		<div class="logo-small"><a href="/" id="logo"><img src="/wp-content/themes/starkers-child/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a></div>
		<?php wp_nav_menu(array(
		    'container'=> 'nav',
		    'container_class' => '',
		    'menu_id' =>'dropmenu',
		    'menu_class' =>'',
		    'theme_location' => 'primary'
		)); ?>
		
		<?php 
			wp_nav_menu_select(
			    array(
			        'theme_location' => 'primary',
			        'menu_class' => 'select-menu'
			    )
			);
		?>
<!--	<?php bloginfo( 'description' ); ?>-->
		<div id="search-form" style="right: <?php echo $search; ?>;">
			<?php get_search_form(); ?>
		</div>
	</div>
	</div>
</header>
<div id="main" role="main">
	<div class="container">

	
