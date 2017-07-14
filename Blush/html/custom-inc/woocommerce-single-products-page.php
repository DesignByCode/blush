<?php

$woo =  $woocommerce;

add_action(
  'after_setup_theme',
  'woocommerce_support' );

function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}



remove_action(
  'woocommerce_before_main_content',
  'woocommerce_output_content_wrapper',
  10);

remove_action(
  'woocommerce_after_main_content',
  'woocommerce_output_content_wrapper_end',
  10);


add_action('woocommerce_before_main_content', 'blush_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'blush_wrapper_end', 10);

function blush_wrapper_start() {
  echo '<section id="main">';
}

function blush_wrapper_end() {
  echo '</section>';
}

add_action('woocommerce_before_main_content', 'blush_row_start', 12);
add_action('woocommerce_after_main_content', 'blush_row_end', 12);

function blush_row_start() {
  echo '<div id="row zzzzzz">';
}

function blush_row_end() {
  echo '</div>';
}

add_action('woocommerce_before_main_content', 'blush_content_start', 14);
add_action('woocommerce_after_main_content', 'blush_content_end', 14);

function blush_content_start() {
  echo '<div id="primary" class="content-area content-area-right md-col-8 lg-col-9">';
}

function blush_content_end() {
  echo '</div>';
}
