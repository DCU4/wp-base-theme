<?php

add_theme_support('post-thumbnails');

add_action( 'init', 'create_menu_category_tax' );

function create_menu_category_tax() {
  $labels = array(
		'name'              => _x( 'Menu Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Menu Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Menu Categories', 'textdomain' ),
		'all_items'         => __( 'All Menu Categoriess', 'textdomain' ),
		'parent_item'       => __( 'Parent Menu Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Menu Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Menu Category', 'textdomain' ),
		'update_item'       => __( 'Update Menu Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Menu Category', 'textdomain' ),
		'new_item_name'     => __( 'New Menu Category Name', 'textdomain' ),
		'menu_name'         => __( 'Menu Categories', 'textdomain' ),
	);
	register_taxonomy(
		'menu_category',
		'menu_item',
		array(
			'labels' => $labels,
			'rewrite' => array( 'slug' => 'menu_category' ),
      'hierarchical' => true,
      'show_ui'           => true,
		  'show_admin_column' => true,
		  'query_var'         => true,
		)
	);
}

function create_menu_posttype() {
  register_post_type( 'menu_item',
    array(
      'labels' => array(
        'name' => __( 'Menu Items' ),
        'singular_name' => __( 'Menu Item' ),
        'search_items'      => __( 'Search Menu Items', 'textdomain' ),
		    'all_items'         => __( 'All Menu Items', 'textdomain' ),
		    'parent_item'       => __( 'Parent Menu Items', 'textdomain' ),
		    'parent_item_colon' => __( 'Parent Menu Items:', 'textdomain' ),
		    'edit_item'         => __( 'Edit Menu Item', 'textdomain' ),
		    'update_item'       => __( 'Update Menu Items', 'textdomain' ),
		    'add_new_item'      => __( 'Add New Menu Item', 'textdomain' ),
		    'new_item_name'     => __( 'New Menu Menu Items Name', 'textdomain' ),
		    'menu_name'         => __( 'Menu Items', 'textdomain' ),
      ),
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions',
        'custom-fields',
      ),
      'public' => true,
      'has_archive' => false,
      'capability_type' => 'page',
      'taxonomies'  => array( 'menu_category' ),
    )
  );
}

add_action( 'init', 'create_menu_posttype' );

