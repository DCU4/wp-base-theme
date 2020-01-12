<?php
/**
 * The template for displaying a single press post
 *
 */
?>

<?php get_header(); ?>
<section class="press-single">
<?php if(have_posts()){ while (have_posts()) : the_post(); ?>
  <div class="press-single-content">
      <p class="date"><?php print get_the_date(); ?></p>
      <h2 class="press-title"><?php echo get_the_title(); ?></h2>
      <?php if (has_post_thumbnail( ) ): ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'press-single' ); ?>
        <img alt="<?php echo get_the_title(); ?>" src="<?php echo esc_url( $image[0] ); ?>"/>
      <?php endif; ?>
      <article>
        <?php the_content(); ?>
      </article>

    </div>

<?php endwhile; }?>


</section>


<?php get_footer(); ?>