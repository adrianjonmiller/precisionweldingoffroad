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
		
		wp_register_script( 'modernizr', get_stylesheet_directory_uri().'/js/modernizr.custom.45125.js', array( 'jquery' ),'', false );
		wp_enqueue_script( 'modernizr' );
		
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
		
		register_sidebar(
			array(
				'id' => 'home',
				'name' => __( 'Home' ),
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


function wp_nav_menu_select_sort( $a, $b ) {
    return $a = $b;
}
	
function wp_nav_menu_select( $args = array() ) {
     
    $defaults = array(
        'theme_location' => '',
        'menu_class' => 'select-menu',
    );
     
    $args = wp_parse_args( $args, $defaults );
      
    if ( ( $menu_locations = get_nav_menu_locations() ) && isset( $menu_locations[ $args['theme_location'] ] ) ) {
        $menu = wp_get_nav_menu_object( $menu_locations[ $args['theme_location'] ] );
          
        $menu_items = wp_get_nav_menu_items( $menu->term_id );
         
        $children = array();
        $parents = array();
         
        foreach ( $menu_items as $id => $data ) {
            if ( empty( $data->menu_item_parent )  ) {
                $top_level[$data->ID] = $data;
            } else {
                $children[$data->menu_item_parent][$data->ID] = $data;
            }
        }
         
        foreach ( $top_level as $id => $data ) {
            foreach ( $children as $parent => $items ) {
                if ( $id == $parent  ) {
                    $menu_item[$id] = array(
                        'parent' => true,
                        'item' => $data,
                        'children' => $items,
                    );
                    $parents[] = $parent;
                }
            }
        }
         
        foreach ( $top_level as $id => $data ) {
            if ( ! in_array( $id, $parents ) ) {
                $menu_item[$id] = array(
                    'parent' => false,
                    'item' => $data,
                );
            }
        }
         
        uksort( $menu_item, 'wp_nav_menu_select_sort' ); 
         
        ?>
            <select id="mobile-menu-<?php echo $args['theme_location'] ?>" class="<?php echo $args['menu_class'] ?>">
                <option value=""><?php _e( 'Navigation' ); ?></option>
                <?php foreach ( $menu_item as $id => $data ) : ?>
                    <?php if ( $data['parent'] == true ) : ?>
                        <optgroup label="<?php echo $data['item']->title ?>">
                            <option value="<?php echo $data['item']->url ?>"><?php echo $data['item']->title ?></option>
                            <?php foreach ( $data['children'] as $id => $child ) : ?>
                                <option value="<?php echo $child->url ?>"><?php echo $child->title ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    <?php else : ?>
                        <option value="<?php echo $data['item']->url ?>"><?php echo $data['item']->title ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        <?php
    } else {
        ?>
            <select class="menu-not-found">
                <option value=""><?php _e( 'Menu Not Found' ); ?></option>
            </select>
        <?php
    }
}

?>
