<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="container-fluid">
<div class="row">
  <header id="masthead" class="site-header" role="banner">
    <div class="header-main">
      <div class="col-md-4">
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <?php bloginfo( 'name' ); ?>
          </a></h1>
      </div>
      <div class="col-md-4">
        <p>Summat</p>
      </div>
      <div class="col-md-4">
        <div class="search-toggle"> <a href="#search-container" class="screen-reader-text" aria-expanded="false" aria-controls="search-container">
          <?php _e( 'Search', 'twentyfourteen' ); ?>
          </a> </div>
        <nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
          <button class="menu-toggle">
          <?php _e( 'Primary Menu', 'twentyfourteen' ); ?>
          </button>
          <a class="screen-reader-text skip-link" href="#content">
          <?php _e( 'Skip to content', 'twentyfourteen' ); ?>
          </a>
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div id="search-container" class="search-box-wrapper hide">
          <div class="search-box">
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- #masthead --> 
</div>
<div id="main" class="site-main">
