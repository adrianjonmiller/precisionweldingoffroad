
<header class="animate top">
	<div class="container">
	<div class="grid">
		<h1><a href="/" id="logo"><img src="<?php echo get_stylesheet_directory_uri().'/img/logo.png'; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
<!--		<div class="blog-description"><?php bloginfo( 'description' ); ?></div>-->
		
		
		<nav>
			<?php echo(render_view(array("title" => "Menu-Parent-Category"))); ?>
		</nav>
		
		
		<?php 
			wp_nav_menu_select(
			    array(
			        'theme_location' => 'primary',
			        'menu_class' => 'select-menu'
			    )
			);
		?>
		
		
		<?php 
		
		if( is_user_logged_in() ) {
		    $menu = 'logged-in';
		    $search = '150px';
		    
		} else {
		    $menu = 'logged-out';
		    $search = '90px';
		}
		
		?>		
		
		<div id="search-form" style="right: <?php echo $search; ?>;">
			<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
						<div>
							<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
							<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php _e( 'Search', 'woocommerce' ); ?>" />
							<input type="submit" id="searchsubmit" value="<?php echo esc_attr__( 'Search' ); ?>" />
							<input type="hidden" name="post_type" value="product" />
						</div>
			</form>
		</div>
		
		<?php
		wp_nav_menu(array(
		    'container'=> 'div',
		    'container_class' => '',
		    'menu_id' =>'my-account-menu',
		    'menu_class' =>'',
		    'theme_location' => $menu
		)); ?>
		
		
	</div>
	</div>
</header>
<div id="main" role="main">
	<div class="container">
		<div class="grid">

	
