<?php

function destijl_enqueue_style() {
	wp_enqueue_style( 'bootstrap', '/wp-content/themes/destijl/bootstrap/css/bootstrap.css', false ); 
	wp_enqueue_style( 'ds-theme-style', '/wp-content/themes/destijl/style.css', false ); 
}

function destijl_enqueue_script() {
	wp_enqueue_script( 'ds-theme-script', '/wp-content/themes/destijl/js/scripts.js', false );
}

add_action( 'wp_enqueue_scripts', 'destijl_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'destijl_enqueue_script' );