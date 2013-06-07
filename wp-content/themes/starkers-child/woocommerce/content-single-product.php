<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked woocommerce_show_messages - 10
	 */
	 do_action( 'woocommerce_before_single_product' );
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="grid single-product">
		<div class="col-1-2">
			<div class="module product-image">
				<?php woocommerce_show_product_images(); ?>
				
			</div>
		</div>
		<div class="col-1-2">
			<div class="module ">
				<div class="product-price-add-to-cart">
					<?php woocommerce_template_single_price(); ?>
					<?php woocommerce_simple_add_to_cart(); ?>
				</div>
				<div class="product-description">
					<?php woocommerce_template_single_title(); ?>
					<?php woocommerce_product_description_tab(); ?>
					<?php woocommerce_template_single_sharing(); ?>
					<?php woocommerce_template_single_add_to_cart(); ?>
				</div>
				
			</div>
		</div>
	</div>

			


</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>