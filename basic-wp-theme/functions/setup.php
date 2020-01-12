<?php

// enables adding a custom logo to the header
add_theme_support( 'custom-logo' );

// remove uneeded links from the head tag
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version
remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
// remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
// remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
// remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
// remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
// remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// remove the REST API endpoint since we aren't using them.
remove_action( 'rest_api_init', 'wp_oembed_register_route' );

// remove all of the oembed meta tags that we don't need
add_filter( 'embed_oembed_discover', '__return_false' );
remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
// add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

// remove auto loaded gutenberg styles
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}

// stop loading wp-embed.min.js and jQuery
function wp_base_stop_loading_wp_embed_and_jquery() {
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
		// wp_deregister_script('jquery');  // Bonus: remove jquery too if it's not required
	}
}
add_action('init', 'wp_base_stop_loading_wp_embed_and_jquery');

// remove wp emoji scripts and styles
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

