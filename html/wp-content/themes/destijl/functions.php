<?php
function destijl_title() {
 add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'destijl_title' );

function destijl_enqueue_style() {
	wp_enqueue_style( 'bootstrap-style', '/wp-content/themes/destijl/bootstrap/css/bootstrap.css', false ); 
	wp_enqueue_style( 'ds-theme-style', '/wp-content/themes/destijl/style.css', false ); 
}

function destijl_enqueue_script() {
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false );
	wp_enqueue_script( 'bootstrap-js', '/wp-content/themes/destijl/bootstrap/js/bootstrap.min.js', false );
	wp_enqueue_script( 'ds-theme-script', '/wp-content/themes/destijl/js/scripts.js', false );
}

function destijl_register_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}


function destijl_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Footer Sidebar 1', 'destjl' ),
        'id' => 'footer-sidebar-1',
        'description' => __( 'Widgets in this area will be shown on the footer left / top on smaller screens.', 'destjl' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
    ) );
	
	register_sidebar( array(
        'name' => __( 'Footer Sidebar 2', 'destjl' ),
        'id' => 'footer-sidebar-2',
        'description' => __( 'Widgets in this area will be shown on the footer right / bottom on smaller screens.', 'destjl' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
    ) );
}

add_action( 'init', 'destijl_register_menus' );
add_action( 'widgets_init', 'destijl_widgets_init' );
add_action( 'wp_enqueue_scripts', 'destijl_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'destijl_enqueue_script' );