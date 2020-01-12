<?php

function wp_base_scripts() {

  wp_register_script( 'wp_base-main', get_template_directory_uri() . '/dist/main.bundle.js', array(), date("H:i:s"), true );
  wp_register_script( 'wp_base-home', get_template_directory_uri() . '/dist/home.bundle.js', array(), date("H:i:s"), true );
  wp_register_script( 'wp_base-press', get_template_directory_uri() . '/dist/press.bundle.js', array(), date("H:i:s"), true );

  if(is_front_page()){
    wp_enqueue_style( 'wp_base-home-style', get_template_directory_uri() . '/dist/css/home.css', array(), date("H:i:s"));
    wp_enqueue_script('wp_base-home');
  } else if (is_page('press') || is_single()) {
    wp_enqueue_style( 'wp_base-press', get_template_directory_uri() . '/dist/css/press.css', array(), date("H:i:s"));
    wp_enqueue_script('wp_base-press');
  } else {
    wp_enqueue_style( 'wp_base-style', get_template_directory_uri() . '/dist/css/main.css', array(), date("H:i:s"));
    wp_enqueue_script('wp_base-main');
  }
}

add_action( 'wp_enqueue_scripts', 'wp_base_scripts' );
