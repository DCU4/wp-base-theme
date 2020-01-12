<?php
/*
  Template Name: Press
  */
?>

<?php get_header(); ?>
<?php if(have_posts()){ while (have_posts()) : the_post(); ?>

<section class="press-hero">
  <h1><?php echo the_title(); ?></h1>
</section>
<?php endwhile; }?>
<section class="press-page" >
<div class="press-post-basic" >
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 6,
  'post_status' => 'publish',
  'paged'           => $paged,
);
  $postslist = new WP_Query( $args );
  if ( $postslist->have_posts() ) :
    while ( $postslist->have_posts() ) : $postslist->the_post();
  ?>


    <div class="press-post-content">
      <?php if (has_post_thumbnail( ) ): ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'press' ); ?>
        <a href="<?php the_permalink(); ?>"><img alt="<?php echo get_the_title(); ?>" src="<?php echo esc_url( $image[0] ); ?>"/></a>
      <?php endif; ?>
      <p class="date"><?php print get_the_date(); ?></p>
      <a href="<?php the_permalink(); ?>"><h2 class="press-title"><?php echo get_the_title(); ?></h2></a>

    </div>

  <?php  endwhile; ?>
  </div>
  <div class="pagination">
        <?php

          echo paginate_links( array(
              'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
              'total'        => $postslist->max_num_pages,
              'current'      => max( 1, get_query_var( 'paged' ) ),
              'format'       => '?paged=%#%',
              'show_all'     => true,
              'type'         => 'plain',
              'end_size'     => 3,
              'mid_size'     => 2,
              'prev_next'    => true,
              'prev_text'    => sprintf( '<i></i> %1$s', __( '<', 'text-domain' ) ),
              'next_text'    => sprintf( '%1$s <i></i>', __( '>', 'text-domain' ) ),
              'add_args'     => false,
              'add_fragment' => '',
          ) );
        ?>
      </div>
  <?php wp_reset_postdata(); endif; ?>

</section>

<?php get_footer(); ?>