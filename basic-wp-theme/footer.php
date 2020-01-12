</main>
  <footer>

    <section class="footer-top">
      <?php if (dynamic_sidebar('tagline_image_widget')) : else : endif; ?>

      <nav class="footer-nav">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'footer-menu'
          )
        );
        ?>
      </nav>
    </section>


    <section class="footer-bottom">
      <section class="copyright">
        <span>
          &#169; Fish Taco. All Rights Reserved. <span class="pipe">|</span>
          <a href="#">Privacy Policy</a> <span class="pipe">|</span> <a href="#">Terms of Use</a>
        </span>
      </section>
      <section class="social-icons">
        <?php if (dynamic_sidebar('social_widget')) : else : endif; ?>
      </section>
    </section>
  </footer>
  <?php wp_footer(); ?>
  </body>

</html>