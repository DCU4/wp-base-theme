<?php

function fishtaco_scripts() {

  wp_register_script( 'fishtaco-main', get_template_directory_uri() . '/dist/main.bundle.js', array(), date("H:i:s"), true );
  wp_register_script( 'fishtaco-home', get_template_directory_uri() . '/dist/home.bundle.js', array(), date("H:i:s"), true );
  wp_register_script( 'fishtaco-press', get_template_directory_uri() . '/dist/press.bundle.js', array(), date("H:i:s"), true );

  if(is_front_page()){
    wp_enqueue_style( 'fishtaco-home-style', get_template_directory_uri() . '/dist/css/home.css', array(), date("H:i:s"));
    wp_enqueue_script('fishtaco-home');
  } else if (is_page('press') || is_single()) {
    wp_enqueue_style( 'fishtaco-press', get_template_directory_uri() . '/dist/css/press.css', array(), date("H:i:s"));
    wp_enqueue_script('fishtaco-press');
  } else {
    wp_enqueue_style( 'fishtaco-style', get_template_directory_uri() . '/dist/css/main.css', array(), date("H:i:s"));
    wp_enqueue_script('fishtaco-main');
  }
}

add_action( 'wp_enqueue_scripts', 'fishtaco_scripts' );
