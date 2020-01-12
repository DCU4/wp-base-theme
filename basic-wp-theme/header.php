<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>wp_base</title>
  <?php wp_head(); ?>
</head>

  <body <?php body_class(); ?>>
    <header>
  <section class="desktop-menu">
      <?php
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
      ?>
      <a class="logo" href="/">
        <img src="<?php echo esc_url( $image[0] ); ?>" alt="wp_base">
      </a>
      <nav class="desktop-nav">
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'header-menu'
            )
          );
        ?>
      </nav>

  </section>

      <section class="mobile-menu">
        <button class="mobile-menu-btn menu-button" type="button">
          <span class="button-outer">
            <span class="button-inner"></span>
          </span>
        </button>
        <nav class="menu-drawer">
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'header-menu'
            )
          );
        ?>
        </nav>
        <?php
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
      ?>
      <a class="logo" href="/">
        <img src="<?php echo esc_url( $image[0] ); ?>" alt="wp_base">
      </a>
      <a class="order-now" href="/contact">ORDER NOW</a>
      </section>
    </header>
  <main>
