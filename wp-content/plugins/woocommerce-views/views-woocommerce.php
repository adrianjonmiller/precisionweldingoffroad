<?php 
/*
  Plugin Name: WooCommerce Views
  Plugin URI: http://wp-types.com/documentation/views-inside/woocommerce-views/
  Description: Let's you display WooCommerce products in a table, a grid or with sliders. <a href="http://wp-types.com/documentation/views-inside/woocommerce-views/">Documentation</a>
  Author: ICanLocalize
  Author URI: http://www.wp-types.com/
  Version: 1.2.3
 */

add_action('plugins_loaded', 'wcviews_init', 2);
define('WPV_WOOCOMERCE_VIEWS_SHORTCODE', 'wpv-wooaddcart');
define('WPV_WOOCOMERCEBOX_VIEWS_SHORTCODE', 'wpv-wooaddcartbox');

function wcviews_init(){

    if(!class_exists('woocommerce')){
		add_action('admin_notices', 'wcviews_no_woocommerce');
		return false;
	}
	
	
	if(get_option('dismiss_wcviews_notice') == 'no' || !get_option('dismiss_wcviews_notice')){
		add_action('admin_notices', 'wcviews_help_admin_notice');
	}
	
	//add_filter('wpv_add_media_buttons', 'add_media_button');
	add_action('init', 'additional_css_js');
}


/**
 * Adds admin notice.
 */
function wcviews_no_woocommerce(){
?>
	<div class="message error"><p><?php printf(__('WooCommerce Views is enabled but not effective. It requires <a href="%s">WooCommerce</a> in order to work.', 'plugin woocommerce'), 
	'http://www.woothemes.com/woocommerce/'); ?></p></div>
<?php
}

/**
 * Adds admin notice.
 */
function wcviews_help_admin_notice(){
	if(!get_option('dismiss_wcviews_notice')){
		add_option('dismiss_wcviews_notice', 'no', '', 'yes');
	}

	if(@$_POST['dismiss_wcviews_notice']) {
		update_option('dismiss_wcviews_notice', 'yes');
	}
	
	if(get_option('dismiss_wcviews_notice') == 'no'){
	?>
		<br clear="all" />
		<div id="message" class="updated message fade" style="clear:both; margin-top: 5px;">
		<p><a href="http://wp-types.com/documentation/views-inside/woocommerce-views/" target="_blank"><?php _e('Learn how to add product sliders, grids and tables to your site', 'woocommerce views'); ?></a></p>

		<p><form action="" method="post">
			<input type="submit" name="dismiss_wcviews_notice" value="<?php _e('Dismiss', 'woocommerce views') ?>" class="button-primary" />
		</form></p>
		
		</div>
<?php
	}
}

/**
 * Adds question mark icon
 * @return <type>
 */
function add_media_button($output){
	// avoid duplicated question mark icons (post-new.php)
	$pos = strpos($output, "Insert Types Shortcode");
	
	if($pos == false && !(isset($_GET['post_type']) && $_GET['post_type'] == 'view')){
		$output .= '<ul class="editor_addon_wrapper"><li><img src="'. plugins_url() . '/' . basename(dirname(__FILE__)) . "/res/img/question-mark-icon.png" .'"><ul class="editor_addon_dropdown"><li><div class="title">Learn how to use these Views</div><div class="close">&nbsp;</div></li><li><div>These Views let you insert product sliders, grids and tables to your content. <br /><br /><a href="http://wp-types.com/documentation/views-inside/woocommerce-views/" target="_blank" style="text-decoration: underline; font-weight: bold; color: blue;">Learn how to use these Views</a></div></li></ul></li></ul>';
	}

	return $output;
}

/**
 * Adds CSS and Custom JS for Views
 */
function additional_css_js() {
	$stylesheet = plugins_url() . '/' . basename(dirname(__FILE__)) . '/res/css/wcviews-style.css';	
	wp_enqueue_style('wcviews-style', $stylesheet);
	wp_enqueue_script('jquery');	
}

//
//
//
//
//
//
// Merged with other plugin
function wpv_woo_add_to_cart($atts) {

	global $post, $wp_query, $wpdb;
	
	$product_id = $post->ID;
	$current_page = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	$current_page = strpos($current_page, '?') ? $current_page . '&' : $current_page . '?';
	
	$get_variation_term_name = $wpdb->get_row("SELECT term_id FROM $wpdb->terms WHERE name = 'variable'");
	$get_variation_term_id = $get_variation_term_name->term_id;
	
	$is_product_with_variations = $wpdb->get_row("SELECT * FROM $wpdb->term_relationships WHERE object_id = '$product_id' AND term_taxonomy_id = '$get_variation_term_id'");
	if(!empty($is_product_with_variations)) $is_product_with_variations = TRUE;
	
	if(!$is_product_with_variations){
		$out = '<a href="'. $current_page .'add-to-cart='. $product_id .'" rel="nofollow" data-product_id="'. $product_id .'" class="button add_to_cart_button product_type_simple">'. __('Add to cart', 'woocommerce') .'</a>';
	} else {
		$out = '<a href="'. get_permalink($product_id) .'" rel="nofollow" data-product_id="'. $product_id .'" class="button add_to_cart_button product_type_variable">'. __('Select options', 'woocommerce') .'</a>';
	}
	
	return $out;
}

add_shortcode('wpv-wooaddcart', 'wpv_woo_add_to_cart');

function wpv_woo_add_to_cart_box($atts) {

	global $post, $wpdb, $woocommerce;
	
	if ( ! isset( $atts['style'] ) ) $atts['style'] = 'border:4px solid #ccc; padding: 12px;';
	
	if ( 'product' == $post->post_type ) {

		$product = $woocommerce->setup_product_data( $post );

		ob_start();
		?>
		<p class="product woocommerce" style="<?php echo $atts['style']; ?>">

			<?php echo $product->get_price_html(); ?>

			<?php woocommerce_template_loop_add_to_cart(); ?>

		</p><?php

		return ob_get_clean();

	} elseif ( 'product_variation' == $post->post_type ) {

		$product = get_product( $post->post_parent );

		$GLOBALS['product'] = $product;

		$variation = get_product( $post );

		ob_start();
		?>
		<p class="product product-variation" style="<?php echo $atts['style']; ?>">

			<?php echo $product->get_price_html(); ?>

			<?php

			$link 	= $product->add_to_cart_url();

			$label 	= apply_filters('add_to_cart_text', __( 'Add to cart', 'woocommerce' ));

			$link = add_query_arg( 'variation_id', $variation->variation_id, $link );

			foreach ($variation->variation_data as $key => $data) {
				if ($data) $link = add_query_arg( $key, $data, $link );
			}

			printf('<a href="%s" rel="nofollow" data-product_id="%s" class="button add_to_cart_button product_type_%s">%s</a>', esc_url( $link ), $product->id, $product->product_type, $label);

			?>

		</p><?php

		return ob_get_clean();

	}
}

add_shortcode('wpv-wooaddcartbox', 'wpv_woo_add_to_cart_box');

function wpv_woo_remove_from_cart($atts) {
	
}

add_shortcode('wpv-wooremovecart', 'wpv_woo_remove_from_cart');

function wpv_woo_cart_url($atts) {
	
}

add_shortcode('wpv-woo-carturl', 'wpv_woo_cart_url');


function wpv_woo_add_shortcode_in_views_popup($items){

	$items['WooCommerce']['image'] = array(
		'Add to cart button',
		'wpv-wooaddcart',
		'Basic',
		''
	);
	$items['WooCommerce']['addcartbox'] = array(
		__('Add to cart box', 'wpv-views'),
		'wpv-wooaddcartbox',
		__('Basic', 'wpv-views'),
		''
	);
	return $items;

}

add_filter('editor_addon_menus_wpv-views', 'wpv_woo_add_shortcode_in_views_popup');
