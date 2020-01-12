<?php

function social_widget() {

  register_sidebar( array(
    'name' => 'Social Menu',
    'id' => 'social_widget',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<span class="hide-title">',
    'after_title' => '</span>'
  ));
}
add_action( 'widgets_init', 'social_widget' );

// remove default paragraph tags around widget text
add_filter( 'widget_display_callback', 'remove_widget_default_markup', 10, 3 );
function remove_widget_default_markup( $instance, $widget, $args ) {
  $instance['filter'] = false;
  return $instance;
}

function tagline_image_widget() {

  register_sidebar( array(
    'name' => 'Tagline Image',
    'id' => 'tagline_image_widget',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<span class="hide-title">',
    'after_title' => '</span>'
  ));
}
add_action( 'widgets_init', 'tagline_image_widget' );