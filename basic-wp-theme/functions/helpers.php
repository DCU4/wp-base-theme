<?php
/**
 * Get a posts's featured image url. Note: only works for page's featured image
 * @param int $id the post's id
 * @param string $size (optional) image size, defaults to full
 * @return string returns escapted image url
 */
function background_img($id = null, $size = 'full') {
  return esc_url(
    wp_get_attachment_image_src(
      get_post_thumbnail_id($id),
      $size
    )[0]
  );
}

/**
 * Get a post's custom field by post id and custom field name
 * @param int $id the post's id
 * @param string $name the name of the custom field
 * @param bool $single (optional) whether or not to return first matching custom field, defaults to true
 * @return string returns html escaped string
 */

function post_meta_helper($id, $name, $single = true) {
  return esc_html(
    get_post_meta(
      $id, $name, $single
    )
  );
}

/**
 * Add markup around list of words, pulled from a custom field
 * @param string $text the list of words
 * @param string $markup the name of tag to wrap around words (ex: span)
 * @return string $final_text text wrapped with html tags
 */

function add_markup_around_words($text, $markup) {
  $pieces = explode("\n", $text);
  $final_text = "";
  foreach($pieces as $piece) {
    $piece = trim(preg_replace('/\s\s+/', ' ', $piece));
    $final_text .= '<' . $markup . ' class="split-words">' . esc_html($piece) . '</' . $markup . '>';
  };
  return $final_text;
}

/**
 * Allow custom post type to be filtered by taxonomy in admin menu
 * @param string $post_type
 * @return void
 */

add_action( 'restrict_manage_posts', 'filter_backend_by_taxonomies' , 99, 2);

function filter_backend_by_taxonomies( $post_type ) {

  if ( $post_type !== 'menu_item' )
    return;

  $taxonomies = array( 'menu_category' );
  foreach ( $taxonomies as $taxonomy_slug ) {

    $taxonomy_obj = get_taxonomy( $taxonomy_slug );
    $taxonomy_name = $taxonomy_obj->labels->name;
    $terms = get_terms( $taxonomy_slug );

    echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
    echo '<option value="">' . sprintf( esc_html__( 'Show All %s', 'text_domain' ), $taxonomy_name ) . '</option>';
    foreach ( $terms as $term ) {
      printf(
        '<option value="%1$s" %2$s>%3$s (%4$s)</option>',
        $term->slug,
        ( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
        $term->name,
        $term->count
      );
    }
      echo '</select>';
  }
}
