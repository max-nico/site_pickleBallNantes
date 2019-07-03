<?php
/**
** activation theme
**/
/* FIXME: is fixed ! Add child stylesheet add your stylesheet in this function TODO: MaxNico 04/05/2019 */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', PHP_INT_MAX );
function theme_enqueue_styles() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 wp_enqueue_style('childbbpress', get_stylesheet_directory_uri() . '/css/childbbpress.css', array('parent-style')); 
 wp_enqueue_style('childtheme-style', get_stylesheet_directory_uri() . '/css/childtheme-style.css', array('parent-style')); 
 wp_enqueue_style('childresponsive', get_stylesheet_directory_uri() . '/css/childresponsive.css', array('parent-style')); 

}

/*------------------------------------------------------------------------------------*/
/*Mon Menu pickleball*/
/*------------------------------------------------------------------------------------*/

function wpb_custom_new_menu() {
  register_nav_menu('my-custom-menu',__( 'Menu PickleBall' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

function add_classes_on_li($classes, $item, $args)
{
  $classes[] = 'nav-item';
  return $classes;
}
add_filter('nav_menu_css_class', 'add_classes_on_li', 1, 3);
  

/* FIXME: is fixed ! ADD editor post in BBPRESS TODO:Nico 04/05/2019 */
function bbp_enable_visual_editor( $args = array() ) {
    $args['tinymce'] = true;
    $args['media_buttons'] = true;
    return $args;
}
add_filter( 'bbp_after_get_the_content_parse_args', 'bbp_enable_visual_editor' );

function rk_bbp_topic_stats() {
  $stats = bbp_get_statistics();
  echo "<dl role='main'><dt>Topics</dt><dd><strong>";
  echo esc_html( $stats['topic_count'] );
  echo "</strong></dd></dl>";
}

add_shortcode('bbp-topic-stats', 'rk_bbp_topic_stats'); 
