<footer class="page-footer academy-page-footer">
  <div class="wrapper clearfix">
    <div>
      <div class="col-30 footer-contact">
        <h5>
          <img src="<?php echo get_template_directory_uri(); ?>/images/logo_akademia.svg" class="footer-logo"
               alt="mfind" />
        </h5>
        <ul class="menu-items">
          <li>
            <a href="tel:<?php echo mfind_get_option('link-phone-without'); ?>" title="Telefon">
              <span class="fa fa-phone"></span> <?php echo mfind_get_option('link-phone-with'); ?>
            </a>
          </li>
          <li>
            <a href="mailto:<?php echo mfind_get_option('link-email'); ?>" title="Email">
              <span class="fa fa-envelope"></span> <?php echo mfind_get_option('link-email'); ?>
            </a>
          </li>
          <li>
            <a href="<?php echo mfind_get_option('link-facebook'); ?>" title="Mfind Facebook" target="blank">
              <span class="fa fa-facebook-square"></span> Polub nas na Facebooku
            </a>
          </li>
          <li>
            <a href="<?php echo mfind_get_option('link-twitter'); ?>" title="Mfind Twitter" target="blank">
              <span class="fa fa-twitter-square"></span> Obserwuj nas na Twitterze
            </a>
          </li>
          <li>
            <a href="<?php echo mfind_get_option('link-wykop'); ?>" title="Mfind Wykop" target="blank">
              <span class="fa fa-square"><i class="footer-wykop-icon"></i></span> Mirkuj z nami na Wykopie
            </a>
          </li>
        </ul>
      </div>
      <div class="col-19">
        <div class="b-title">
          <h5 class="col-title">O nas</h5>
        </div>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-left', 'menu_class' => 'menu-items', 'menu_id' => 'footer-menu-left' ) ); ?>
      </div>
      <div class="col-25">
        <div class="b-title">
          <h5 class="col-title">Poczytaj o ubezpieczeniach</h5>
        </div>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-center', 'menu_class' => 'menu-items', 'menu_id' => 'footer-menu-center' ) ); ?>
      </div>
      <div class="col-25">
        <div class="b-title">
          <h5 class="col-title">Produkty mfind</h5>
        </div>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-right', 'menu_class' => 'menu-items', 'menu_id' => 'footer-menu-right' ) ); ?>
      </div>
    </div>
  </div>
  <div class="footer-last-line">
    <div class="last-line-wrapper clearfix">
      <div class="left-text">© <?php echo date('Y'); ?> mfind it sp. z o.o.</div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
