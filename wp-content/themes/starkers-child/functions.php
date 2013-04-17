<?php

	//Making jQuery Google API
	function modify_jquery() {
		if (!is_admin()) {
			// comment out the next two lines to load the local copy of jQuery
//			wp_deregister_script('jquery');
//			wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false, '1.8.1');
//			wp_enqueue_script('jquery');
		}
	}
	add_action('init', 'modify_jquery');
	
	
	function register_my_menus() {
	  register_nav_menus(
	    array(
	      'primary' => __( 'Primary Menu' ),
	      'secondary' => __( 'Secondary Menu' ),
	      'footer' => __('Footer Menu'),
	      'logged-in' => __('Logged In'),
	      'logged-out' => __('Logged Out')
	    )
	  );
	}
	add_action( 'init', 'register_my_menus' );
	
	function starkers_script_enqueuer() {		
		wp_register_script( 'site', get_stylesheet_directory_uri().'/js/site.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'site' );
		
		wp_register_script( 'flexslider', get_stylesheet_directory_uri().'/js/jquery.flexslider-min.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'flexslider' );
		
//		wp_register_script( 'backgroundPosition', get_stylesheet_directory_uri().'/js/jquery.backgroundPosition.js', array( 'jquery' ),'', true );
//		wp_enqueue_script( 'backgroundPosition' );
		
//		wp_register_script( 'masonry', get_stylesheet_directory_uri().'/js/jquery.masonry.min.js', array( 'jquery' ),'' ,'', true );
//		wp_enqueue_script( 'masonry' );
		
		wp_register_style( 'flexslider', get_stylesheet_directory_uri().'/css/flexslider.css', '', '', 'screen' );
		wp_enqueue_style( 'flexslider' );
		
		wp_register_style( 'fonts', get_stylesheet_directory_uri().'/css/fonts/stylesheet.css', '', '', 'screen' );
		wp_enqueue_style( 'fonts' );
		
		wp_register_style( 'screen', get_stylesheet_directory_uri().'/css/screen.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
        
        
	}
	
	add_action( 'widgets_init', 'my_register_sidebars' );
	
	function my_register_sidebars() {
	
		/* Register the 'primary' sidebar. */
		register_sidebar(
			array(
				'id' => 'primary',
				'name' => __( 'Primary' ),
				'description' => __( 'Primary side bar for product pages.' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			)
		);
		
		register_sidebar(
			array(
				'id' => 'secondary',
				'name' => __( 'Secondary' ),
				'description' => __( 'Secondary side bar for account pages.' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			)
		);
	
		/* Repeat register_sidebar() code for additional sidebars. */
	}
	
	add_filter(‘bcn_display’, ‘wptexturize’);
?>