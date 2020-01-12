<?php
function fishtaco_setup_image_sizes() {

  add_image_size( 'press', 351, 263, true );

  add_image_size('press-single', 1080, 650, true );


}

add_action( 'after_setup_theme', 'fishtaco_setup_image_sizes' );
