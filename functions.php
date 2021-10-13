<?php

// style and scripts
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles() {

  // style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

  // Compiled Bootstrap
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/css/lib/bootstrap.min.css'));
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/lib/bootstrap.min.css', array('parent-style'), $modified_bootscoreChildCss);

  // custom.js
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);
}


    register_nav_menu('main-menu', 'Main menu');
    register_nav_menu('events-menu', 'Events menu');
    register_nav_menu('footer-menu', 'Footer menu');
    register_nav_menu('footer-nav', 'Footer Nav 1');
    register_nav_menu('footer-nav2', 'Footer Nav 2');
    register_nav_menu('footer-nav3', 'Footer Nav 3');
    register_nav_menu('footer-nav4', 'Footer Nav 4');
add_action('after_setup_theme', 'register_navwalker');
// Register Bootstrap 5 Nav Walker END

add_filter( 'nav_menu_link_attributes', 'bootstrap5_dropdown_fix' );
function bootstrap5_dropdown_fix( $atts ) {
     if ( array_key_exists( 'data-toggle', $atts ) ) {
         unset( $atts['data-toggle'] );
         $atts['data-bs-toggle'] = 'dropdown';
     }
     return $atts;
}