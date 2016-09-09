</div>
<!-- #main -->

<div class="row">
  <footer id="colophon" class="site-footer" role="contentinfo">
    <div class="col-md-4">
      <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
    </div>
    <div class="col-md-4">
      <nav id="header-menu" class="site-navigation primary-navigation" role="navigation">
        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'nav-menu', 'menu_id' => 'footer-menu' ) ); ?>
      </nav>
    </div>
    <div class="col-md-4">
      <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
    </div>
  </footer>
  <!-- #colophon --> 
</div>
</div>
<!-- #page -->

<?php wp_footer(); ?>
</body></html>