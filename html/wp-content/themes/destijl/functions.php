<?php
//include required files
// Register Custom Navigation Walker - adds Bootstrap support to WP nav
require_once('wp_bootstrap_navwalker.php');

// add theme support
add_theme_support( 'post-thumbnails' );


//theme functions
function destijl_title() {
 add_theme_support( 'title-tag' );
}

function destijl_enqueue_style() {
	wp_enqueue_style( 'bootstrap-style', '/wp-content/themes/destijl/bootstrap/css/bootstrap.css', false ); 
	wp_enqueue_style( 'ds-theme-style', '/wp-content/themes/destijl/style.css', false ); 
}

function destijl_enqueue_script() {
	wp_deregister_script( 'jquery' );
	
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js','','1.12.4', true );
	wp_enqueue_script( 'bootstrap-js', '/wp-content/themes/destijl/bootstrap/js/bootstrap.min.js', '', '3.3.7', true );
	wp_enqueue_script( 'navgoco', '/wp-content/themes/destijl/js/jquery.navgoco.js','jquery','0.1.12',true);
	wp_enqueue_script( 'ds-theme-script', '/wp-content/themes/destijl/js/scripts.js', array('jquery'), '1.1', true );
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
        'name' => __( 'Main Sidebar', 'destjl' ),
        'id' => 'main-sidebar-1',
        'description' => __( 'Widgets in this area will be shown on the sidebar / below content on smaller screens.', 'destjl' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
    ) );
	
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

//housekeeping - remove emoji scripts etc
function disable_wp_emojicons() {
  // ref: http://wordpress.stackexchange.com/questions/185577/disable-emojicons-introduced-with-wp-4-2
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}

function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

// theme customization options etc
function destijl_customize_register( $wp_customize ) {
	// add postMessage for preview support on existing functions	
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	
	$wp_customize->add_setting( 'body_backgroundcolor' , array(
		'default'     => '#ffffff',
		'transport'   => 'postMessage',
	) );
	$wp_customize->add_setting( 'h1_textcolor' , array(
		'default'     => '#000000',
		'transport'   => 'postMessage',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_backgroundcolor_control', array(
		'label'        => __( 'Body Background Color', 'destijl' ),
		'section'    => 'colors',
		'settings'   => 'body_backgroundcolor',
	) ) );
		
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'h1_color_control', array(
		'label'        => __( 'H1 Color', 'destijl' ),
		'section'    => 'colors',
		'settings'   => 'h1_textcolor',
	) ) );
	
	
	
}


function destijl_customize_css(){
		?>
<?php echo "\r \n"; ?>
    <style type="text/css">
/* customizer theme options */
<?php generate_css('body', 'background-color', 'body_backgroundcolor', '');
?>  <?php generate_css('h1', 'color', 'h1_textcolor', '');
?>
</style>
    <?php
}

function destijl_customizer_live_preview(){
		wp_enqueue_script( 
			  'destijl-themecustomizer',
			  get_template_directory_uri().'/js/theme-customize.js',
			  array( 'jquery','customize-preview' ),				//Dependencies
			  '1.0',												//Define a version (optional) 
			  true													// Script in footer = true
		);
}

function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
// generate valid css styles from theme mod options
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         	}
		 }
      return $return;
 }


//add actions
add_action( 'init', 'destijl_register_menus' );
add_action( 'init', 'disable_wp_emojicons' );
add_action( 'after_setup_theme', 'destijl_title' );
add_action( 'widgets_init', 'destijl_widgets_init' );
add_action( 'wp_enqueue_scripts', 'destijl_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'destijl_enqueue_script' );
add_action( 'customize_register', 'destijl_customize_register' );
add_action( 'wp_head','destijl_customize_css' );
add_action( 'customize_preview_init', 'destijl_customizer_live_preview' );