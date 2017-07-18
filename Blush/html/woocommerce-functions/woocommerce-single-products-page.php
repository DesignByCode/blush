<?php


add_action(
  'after_setup_theme',
  'woocommerce_support' );

function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}



remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
// remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );


function blush_flash_sales(){
  global $post, $product;
  if ( $product->is_on_sale() ) :
  echo '<span class="onsale-banner">' . esc_html__( 'Sale!', 'blush' ) . '</span>';
  endif;
}

add_action('woocommerce_before_shop_loop_item_title', 'blush_flash_sales', 10);
add_action('woocommerce_before_single_product_summary', 'blush_flash_sales', 10);
