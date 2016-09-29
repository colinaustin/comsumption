<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<script src="https://use.typekit.net/kko8gpw.js"></script>
<script>try{Typekit.load({ async: false });}catch(e){}</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<nav id="header-menu" class="navbar navbar-default primary-navigation" role="navigation">
	<button id="nav-close">X</button>
  <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'nav nav-pills nav-stacked', 'menu_id' => 'primary-menu','fallback_cb' => 'wp_bootstrap_navwalker::fallback', 'walker' => new wp_bootstrap_navwalker() ) ); ?>
</nav>
<div id="page" class="container-fluid">
<div class="row">
  <div class="header-main">
    <div class="col-xs-6">
      <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <?php bloginfo( 'name' ); ?>
        </a></div>
    </div>
    <div class="col-xs-6">
      <button type="button" class="search-toggle collapsed" data-toggle="collapse" data-target="#search-container" aria-expanded="false"> <span class="sr-only">Toggle search</span> <span class="glyphicon glyphicon-search"></span></button>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-menu-nav-wrapper" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="glyphicon glyphicon-menu-hamburger"></span></button>
    </div>
  </div>
  <div class="col-xs-12">
    <div id="search-container" class="search-box-wrapper hide">
      <div class="search-box">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</div>
<div id="main-wrapper">
<div id="main" class="row site-main"  style="background:url(<?php echo get_the_post_thumbnail_url($post->ID,'full') ?>) 0 0 no-repeat; background-size: 100% auto")">
