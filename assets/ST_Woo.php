<?php

add_theme_support( 'woocommerce' );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action('woocommerce_before_main_content', 'my_content_wrapper_start', 10);
function my_content_wrapper_start() {
echo '<section id="primary">';
}

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_after_main_content', 'my_content_wrapper_end', 10);
function my_content_wrapper_end() {
echo '</section>';
}


function nimber_show_per_row(){
	if(is_shop()){
	$woo_layout =  ot_get_option('woo_layout');
	}elseif(is_product_category() || is_product_tag()){
	$woo_layout =  ot_get_option('woo_archive_layout');
	}else{
	$woo_layout =  4;
		}
	
	return $woo_layout;
	
	}
	
add_action('loop_shop_columns', 'nimber_show_per_row');	


function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
	$woo_related_product_column =  ot_get_option('woo_related_product_column');
	$woo_related_product_number =  ot_get_option('woo_related_product_number');
	if(!empty($woo_related_product_number)){
	$args['posts_per_page'] = $woo_related_product_number; // 4 related products
	}else{
	$args['posts_per_page'] = 3; // 4 related products
	}
	if(!empty($woo_related_product_column)){
	$args['columns'] = $woo_related_product_column; // arranged in 2 columns
	}else{
	$args['columns'] = 3; // arranged in 3 columns
		}
	return $args;
}

function woo_buttons_class(){
	global $product;
  $button_type = ot_get_option('button_type');
	$output =  sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="%s product_type_%s %s">%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( $product->id ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button btn btn-primary btn-lg ' : '',
		esc_attr( $product->product_type ),
		esc_attr( $button_type ),
		esc_html( $product->add_to_cart_text() )
	);
	
	
	return $output;
	}

add_filter('woocommerce_loop_add_to_cart_link', 'woo_buttons_class');

