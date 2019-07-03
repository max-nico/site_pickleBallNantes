<?php
/* ======================================= */
/* Insomnia Theme Functions */
/* ======================================= */
if ( ! isset( $content_width ) ) $content_width = 1220; /* pixels */

/* Makes theme available for translation. */
add_action('after_setup_theme', 'insomnia_theme_setup');
function insomnia_theme_setup(){

load_theme_textdomain( 'insomnia', get_template_directory() . '/language' );
}

/*=======================================
  TGM Plugins Activations
=======================================*/
require_once get_template_directory() . '/framework/functions/tgma/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'insomnia_register_required_plugins' );
function insomnia_register_required_plugins() {

  $plugins = array(

    array(
      'name'               => 'Kirki Customizer', // The plugin name
      'slug'               => 'kirki', // The plugin slug (typically the folder name)
      'required'           => true, // If false, the plugin is only 'recommended' instead of required
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
      'force_deactivation' => true, // If true, plugin is deactivated upon theme activation and cannot be deactivated until theme switch
    ),
     array(
      'name'               => 'WPBakery Page Builder', // The plugin name
      'slug'               => 'js_composer', // The plugin slug (typically the folder name)
      'source'             => 'js_composer.zip',
      'required'           => true, // If false, the plugin is only 'recommended' instead of required
      'version'            => '5.6',
      'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
      'force_deactivation' => false, // If true, plugin is deactivated upon theme activation and cannot be deactivated until theme switch
    ),

    array(
      'name'               => 'Ultimate Addons for WPBakery Page Builder', // The plugin name
      'slug'               => 'Ultimate_VC_Addons', // The plugin slug (typically the folder name)
      'source'             => 'Ultimate_VC_Addons.zip',
      'required'           => true, // If false, the plugin is only 'recommended' instead of required
      'version'            => '3.17.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
      'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
      'force_deactivation' => false, // If true, plugin is deactivated upon theme activation and cannot be deactivated until theme switch
    ),

    array(
      'name'               => 'Slider Revolution', // The plugin name
      'slug'               => 'revslider', // The plugin slug (typically the folder name)
      'source'             => 'revslider.zip',
      'required'           => true, // If false, the plugin is only 'recommended' instead of required
      'version'            => '5.4.8.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
      'force_deactivation' => false, // If true, plugin is deactivated upon theme activation and cannot be deactivated until theme switch
    ),

    array(
      'name'               => 'Insomnia Shortcodes', // The plugin name
      'slug'               => 'wp-insomnia-shortcodes', // The plugin slug (typically the folder name)
      'source'             => 'wp-insomnia-shortcodes.zip', // The plugin source
      'required'           => true, // If false, the plugin is only 'recommended' instead of required
      'version'            => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
      'force_deactivation' => true, // If true, plugin is deactivated upon theme activation and cannot be deactivated until theme switch
    ),

    array(
      'name'               => 'Insomnia Portfolio', // The plugin name
      'slug'               => 'insomnia-portfolio', // The plugin slug (typically the folder name)
      'source'             => 'insomnia-portfolio.zip', // The plugin source
      'required'           => true, // If false, the plugin is only 'recommended' instead of required
      'version'            => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
      'force_deactivation' => true, // If true, plugin is deactivated upon theme activation and cannot be deactivated until theme switch
    ),

    array(
      'name'               => 'Insomnia Testimonials', // The plugin name
      'slug'               => 'insomnia-testimonials', // The plugin slug (typically the folder name)
      'source'             => 'insomnia-testimonials.zip', // The plugin source
      'required'           => true, // If false, the plugin is only 'recommended' instead of required
      'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
      'force_deactivation' => true, // If true, plugin is deactivated upon theme activation and cannot be deactivated until theme switch
    ),

    array(
      'name'               => 'Insomnia Widgets', // The plugin name
      'slug'               => 'insomnia-widgets', // The plugin slug (typically the folder name)
      'source'             => 'insomnia-widgets.zip', // The plugin source
      'required'           => true, // If false, the plugin is only 'recommended' instead of required
      'version'            => '1.0.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
      'force_deactivation' => true, // If true, plugin is deactivated upon theme activation and cannot be deactivated until theme switch
    ),

    array(
      'name'            => 'Contact Form 7', // The plugin name
      'slug'            => 'contact-form-7', // The plugin slug (typically the folder name)
      'required'        => false, // If false, the plugin is only 'recommended' instead of required
    ),

    array(
      'name'            => 'Envato Market', // The plugin name
      'slug'            => 'envato-market', // The plugin slug (typically the folder name)
      'source'          => 'envato-market.zip', // The plugin source
      'required'        => false, // If false, the plugin is only 'recommended' instead of required
    ),
    
    array(
      'name'            => 'WP Instagram Widget', // The plugin name
      'slug'            => 'wp-instagram-widget', // The plugin slug (typically the folder name)
      'required'        => false, // If false, the plugin is only 'recommended' instead of required
    ),

  );

  $config = array(
    'id'           => 'insomnia',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => dirname( __FILE__ ) . '/framework/functions/tgma/plugins/',
    'menu'         => 'tgmpa-install-plugins',
    'parent_slug'  => 'themes.php',
    'capability'   => 'edit_theme_options',
    'has_notices'  => true,
    'dismissable'  => true,
    'dismiss_msg'  => '',
    'is_automatic' => true,
    'message'      => '',
  );

  tgmpa( $plugins, $config );
}


class InsomniaTheme_VC {


  public function __construct() {

    // set hooks
    add_action( 'vc_before_init', array( $this, 'set_vc_as_bundled' ) );
    add_action( 'vc_build_admin_page', array( $this, 'remove_vc_core_widgets' ) );
    add_action( 'vc_load_shortcode', array( $this, 'remove_vc_core_widgets' ) );
    remove_action( 'admin_init', 'vc_page_welcome_redirect');
    remove_action( 'vc_activation_hook', 'vc_page_welcome_set_redirect');


    // add custom param type
    if ( function_exists( 'vc_add_shortcode_param' ) ) {
      vc_add_shortcode_param( 'hidden_textfield', array( $this, 'hidden_field_param_cb' ) );
    }
  }


  /**
   * Setup VC as "bundled with theme"
   */
  public function set_vc_as_bundled() {
    if ( function_exists( 'vc_manager' ) ) {
      vc_manager()->disableUpdater( true );
      vc_manager()->setIsAsTheme( true );

    }
    vc_set_as_theme();
  }


  /**
   * Remove rude VC built-in elements
   */
  public function remove_vc_core_widgets() {
    vc_remove_element( 'vc_gallery' );
    vc_remove_element( 'vc_images_carousel' );
    vc_remove_element( 'vc_cta' );
    vc_remove_element( 'vc_posts_slider' );
  }

}
new InsomniaTheme_VC();

/*-----------------------------------------------------------------------------------*/
/*  Insomnia Includes
/*-----------------------------------------------------------------------------------*/

include( get_template_directory() . '/framework/functions/theme-options.php');
include( get_template_directory() . '/framework/meta/metabox-class.php');
include( get_template_directory() . '/framework/meta/classes.php');
if(get_theme_mod('insomnia_breadcrumbs','enable') == true)  {
  include( get_template_directory() . '/framework/functions/breadcrumbs.php');
}; 
include( get_template_directory() . '/framework/functions/sidebars.php');
if ( class_exists( 'WooCommerce' ) ) {
  include (get_template_directory() . '/framework/functions/woocommerce.php');
};

/*-----------------------------------------------------------------------------------*/
/*  Insomnia Register menu
/*-----------------------------------------------------------------------------------*/

if( !function_exists('insomnia_register_menu') ) {
  function insomnia_register_menu() {
    register_nav_menus(
      array(
      'menu' => esc_html__('Main Menu', 'insomnia' )
      )
    );
  }
  add_action( 'init', 'insomnia_register_menu' );
}

/*
|--------------------------------------------------------------------------
| Insomnia Audio Function
|--------------------------------------------------------------------------
*/

if(!function_exists('insomnia_audio')) {
  function insomnia_audio($postid) {

    $single_audio_item = get_post_meta($postid, 'insomnia_external_audio_block', true);

    if(($single_audio_item != '')) {
      if( strpos($single_audio_item, 'soundcloud') ) {

        $id = $single_audio_item;

        echo '<div class="post-audio"> ' .$id. ' </div>';
      }
    }

  }
}


/*
|--------------------------------------------------------------------------
| Insomnia Video Function
|--------------------------------------------------------------------------
*/

if(!function_exists('insomnia_video')) {
  function insomnia_video($postid) {

    $single_video_item = get_post_meta($postid, 'insomnia_external_video_block', true);



        echo '<div class="post-video">'.$single_video_item.'</div>';

    }

  }

/*
|--------------------------------------------------------------------------
| Insomnia Gallery function
|--------------------------------------------------------------------------
*/

if ( !function_exists( 'insomnia_gallery' ) ) {
  function insomnia_gallery($postid) {

    $gallery_images = get_post_meta($postid, 'insomnia_gallery_block',true);

    if(!empty($gallery_images)) {

        echo '<div class="owl-carousel gallery-slider" id="gs-'.$postid.'">';

          foreach ($gallery_images as $gallery_item) {
            $item_url = $gallery_item['insomnia_gallery_post'];

              echo  '<img src="'. $item_url['url'] .'" class="img-responsive">';
          }

        echo  '</div>';
    }
  }
}


/*
|--------------------------------------------------------------------------
| Insomnia Core Navi
|--------------------------------------------------------------------------
*/


function insomnia_wp_corenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  $a = array();
  if (!$current = get_query_var('paged')) $current = 1;

  if( !empty($wp_query->query_vars['s']) ) {
     $a['add_args'] = array( 's' => str_replace(" ","+",get_query_var('s')), 'post_type' => get_query_var('post_type'));
  }

  if($wp_rewrite->using_permalinks()){
  $a['base'] = ''. add_query_arg('paged','%#%');
  }else{
    $a['base'] = add_query_arg('paged','%#%');
  }

  $a['total'] = $max;
  $a['current'] = $current;

  $total = 1;
  $a['mid_size'] = '3';
  $a['end_size'] = '1';
  $a['prev_text'] = '←';
  $a['next_text'] = '→';
  $a['total'] = $wp_query->max_num_pages;
  echo  paginate_links($a);
}


/*
|--------------------------------------------------------------------------
| Remove more link function
|--------------------------------------------------------------------------
*/

function insomnia_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'insomnia_excerpt_more');

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
  wp_enqueue_script( 'comment-reply' );

/*
|--------------------------------------------------------------------------
| Theme Stylesheets
|--------------------------------------------------------------------------
*/

function insomnia_scripts_styles(){

  $theme_info = wp_get_theme();

  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('insomnia-style', get_stylesheet_uri(), array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('insomnia-style-css', get_template_directory_uri() . '/assets/css/theme-style.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('fontawesome-icons', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('simple-icons', get_template_directory_uri() . '/assets/css/simple-line-icons.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('pe-icons-icons', get_template_directory_uri() . '/assets/css/pe-icon-7-stroke.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('insomnia-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('insomnia-bbpress', get_template_directory_uri() . '/assets/css/bbpress.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('insomnia-buddypress', get_template_directory_uri() . '/assets/css/buddypress.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('insomnia-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), $theme_info->get( 'Version' )); 

  $color = get_theme_mod('insomnia_theme_color');
  if ($color) {
    $custom_skin_css =
      "a:hover, button:hover {color: $color}\n" .
      ".search-area form > div:before {color: $color}\n" .
      ".navbar-custom.top-nav-collapse.transparent .nav > li > a:hover {color:$color}\n" .
      ".dropdown-menu {border-top: 3px solid $color}\n" .
      "ul#menu-main-menu > .current-menu-ancestor > a {color:$color}\n" .
      ".navbar-toggle {background: $color}\n" .
      ".head-search span:hover:before {color: $color}\n" .
      ".posts .widget-title {border-bottom: 1px solid $color;}\n" .
      ".posts .widget > h5 { border-bottom: 2px solid $color}\n" .
      ".sidebar .widget-title:after {background: $color}\n" .
      ".sidebar a:hover {color: $color}\n" .
      ".archive-tags:before {color: $color;}\n" .
      ".archive-date:before {color: $color;}\n" .
      ".archive-search:before {color: $color;}\n" .
      ".archive-404:before {color: $color;}\n" .
      ".archive-category:before {color: $color;}\n" .
      ".error-404 {color: $color}\n" .
      ".left-image-post .title a:hover {color: $color}\n" .
      ".standart-post .title:hover a, .standart-post .title:hover {color: $color}\n" .
      ".entry-meta ul li i {color: $color}\n" .
      ".nav-previous a:hover {background: $color;}\n" .
      ".nav-next a:hover {background: $color;}\n" .
      ".image-slider a.video-thumb:hover:before,.image-slider a.video-thumb:hover:after {background: $color;}\n" .
      ".image-slider a.video-thumb:before {color: $color}\n" .
      ".meta-slider i {color: $color}\n" .
      ".button, html input[type='button'],input[type='reset'],input[type='submit'] {border-color: $color;background: $color}\n" .
      ".widget_search form > div:before {color: $color}\n" .
      ".search-content form > div:before {color: $color}\n" .
      ".tagcloud a:hover {color: $color}\n" .
      ".insomnia_image_wrapper {background: $color}\n" .
      ".tweet_list li:before {color: $color;}\n" .
      ".tweet_text a { color: $color}\n" .
      ".rsBlock-meta li i {color: $color}\n" .
      ".gallery-slider .owl-nav [class*='owl-']:hover {background: $color;}\n" .
      "ul.social-links li a:hover {color: $color}\n" .
      ".center-line {background: $color}\n" .
      ".hi-icon.ver-industrial {background: $color;}\n" .
      ".hi-icon-effect .hi-icon.ver-industrial:hover {background: $color;}\n" .
      ".hi-icon-effect .hi-icon {color: $color}\n" .
      ".hi-icon-effect .hi-icon:hover {color: $color}\n" .
      ".insomnia_icon_box .multi-serv-icon { background: $color}\n" .
      ".multi-serv-icon i { color: $color}\n" .
      "figure.effect-goliath p {background: $color}\n" .
      ".portfolio-dankov .icon-links a i {color: $color}\n" .
      ".small-block.creative .small-title-sub{color: $color}\n" .
      ".small-list ul li i {color: $color;}\n" .
      ".small-title:before {background-color: $color}\n" .
      ".about-us-title:before {background-color: $color}\n" .
      ".about-us-list ul li i {color: $color;}\n" .
      ".color-bold {color: $color}\n" .
      ".stats-desc.onepage .stats-icon {color: $color}\n" .
      ".serv-marg i {color: $color}\n" .
      ".serv-icon i { color: $color}\n" .
      ".blog-name a:hover {color: $color}\n" .
      ".blog-desc li i{color:$color}\n" .
      ".progress-bar {background-color: $color}\n" .
      ".tag_line_author a{color: $color}\n" .
      ".breadcrumbs a {color:$color;}\n" .
      ".woocommerce-breadcrumb a {color:$color}\n" .
      ".soc-about li a:hover { color: $color}\n" .
      ".insomnia_pg a:hover { color: $color; border-color: $color; }\n" .
      ".insomnia_pg span { color: $color !important; border-color: $color; }\n" .
      ".insomnia_pg_single span { border: 1px solid $color;}\n" .
      ".insomnia_pg_single a:hover > span { border: 1px solid $color}\n" .
      ".soc-footer li a:hover {color: $color}\n" .
      ".post-set:hover ul.icon-links li a:hover,.post-set:hover ul.icon-links li a:focus {color: $color}\n" .
      ".blog-main:hover ul.icon-links li a:hover,.blog-main:hover ul.icon-links li a:focus {color: $color}\n" .
      ".new-services .new-services-icon span{color:$color;}\n" .
      ".new-services .new-services-icon:after {background: $color}\n" .
      ".contact-icon {background: $color;}\n" .
      ".pricing_tables_name {color:$color;}\n" .
      ".pricing_tables_buttons a {background: $color}\n" .
      ".burger_insomnia_menu_overlay_normal .burger_insomnia_main_menu a:hover {color: $color}\n" .
      ".burger_insomnia_menu_overlay_normal .burger_insomnia_main_menu li.menu-item-has-children > a.sub-active {color: $color;}\n" .
      ".burger_insomnia_menu_overlay_normal li.current-menu-item > a,.burger_insomnia_menu_overlay_normal li.current-page-item > a {color: $color}\n" .
      ".search-menu-style4 form > div:before {color: $color}\n" .
      ".tag_line_one .navbar-custom.transparent .search-menu-style4 form > div:before {color:$color;}\n" .
      ".tag_line_none .navbar-custom.transparent .search-menu-style4 form > div:before {color:$color}\n" .
      ".navbar-custom.transparent.top-nav-collapse .search-menu-style4 form > div:before {color:$color}\n" .
      "ul.social-links-style7 li a:hover {color: $color}\n" .
      ".search-btn-style7 span {color: $color}\n" .
      ".scroll-top {background-color: $color}\n" .
      ".travel-deals-list ul li i{color:$color}\n" .
      ".food-deals-list {color:$color;}\n" .
      ".food-deals-list i{color:$color;}\n" .
      ".bbp-forum-info a {color: $color;}\n" .
      ".bbp-topic-title > a {color:$color;}\n" .
      ".product-category  > a:hover h3 {background: $color;}\n" .
      ".woocommerce .woocommerce-breadcrumb a {color:$color !important;}\n" .
      ".up-sells.products h2:after {background: $color;}\n" .
      ".woocommerce .products .product .onsale {background: $color !important;}\n" .
      ".woocommerce a.added_to_cart {background: $color;}\n" .
      ".woocommerce-error, .woocommerce-info, .woocommerce-message {border-top: 3px solid $color !important;}\n" .
      ".insomnia_cart_icon {background: $color;}\n" .
      ".insomnia_cart_widget {border-top: 3px solid $color;}\n" .
      ".insomnia_cart_widget .buttons a {background: $color !important;}\n" .
      ".related.products h2:after {background: $color;}\n" .
      ".woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current {border: 1px solid $color;}\n" .
      ".woocommerce-product-search:before {color: $color;}\n" .
      ".woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button {background-color: $color !important;}\n" .
      ".woocommerce .widget_price_filter .ui-slider .ui-slider-range {background-color: $color !important;}\n" .
      ".woocommerce .widget_price_filter .ui-slider .ui-slider-handle {border: 2px solid $color !important;}\n" .
      ".woocommerce-info {border-top-color: $color !important;}\n" .
      ".woocommerce-info:before {color: $color !important;}\n" .
      "#buddypress form#whats-new-form textarea:focus {border-color: $color !important;outline-color: $color !important;}\n" .
      "#buddypress div.item-list-tabs ul li.current a, #buddypress div.item-list-tabs ul li.selected a {background-color: $color !important;}\n" .
      "#buddypress #reply-title small a span, #buddypress a.bp-primary-action span {background: $color !important;}\n" .
      ".owl-dots .owl-dot span{border: 1px solid $color;}\n" .
      ".owl-dots .owl-dot.active span,.owl-theme .owl-dots .owl-dot:hover span{background: $color;}";

    wp_add_inline_style( 'insomnia-responsive', "/* Custom CSS */\n $custom_skin_css \n/* Custom CSS END */" );
  }
}
add_action( 'wp_enqueue_scripts', 'insomnia_scripts_styles', 90 );

function equip_admin() {
  $theme_info = wp_get_theme(); 
  wp_enqueue_style( 'insomnia-admin-styles', get_template_directory_uri() . '/assets/css/admin/styles.css', array(), $theme_info->get( 'Version' )); 
};
add_action('admin_enqueue_scripts', 'equip_admin', 10000 );

/*
|--------------------------------------------------------------------------
| Theme Scripts
|--------------------------------------------------------------------------
*/



if ( !function_exists( 'insomnia_load_scripts' ) ) {
  function insomnia_load_scripts() {

    $theme_info = wp_get_theme(); 

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('viewportchecker', get_template_directory_uri() . '/assets/js/viewportchecker.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('fitvids',  get_template_directory_uri() . '/assets/js/jquery.fitvids.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('circle',  get_template_directory_uri() . '/assets/js/jquery.circle-progress.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('smartmenus', get_template_directory_uri() . '/assets/js/jquery.smartmenus.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('prettyphoto', get_template_directory_uri() . '/assets/js/jquery.prettyphoto.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('countdown', get_template_directory_uri() . '/assets/js/jquery.countdown.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('insomnia-typed',  get_template_directory_uri() . '/assets/js/typed.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('retina',  get_template_directory_uri() . '/assets/js/retina.js', array('jquery'), $theme_info->get( 'Version' ), true);


    if (get_theme_mod('insomnia_sticky_footer', false )){wp_enqueue_script('sticky_footer', get_template_directory_uri() . '/assets/js/sticky-footer.js', array('jquery'), $theme_info->get( 'Version' ), true);}

    wp_enqueue_script('insomnia_woo', get_template_directory_uri().'/woocommerce/woo.js', array('jquery'), $theme_info->get( 'Version' ), true);
    $blog_style = get_theme_mod('insomnia_post_type');
    if ($blog_style=='tiles'){
      wp_enqueue_script('insomnia-tiles', get_template_directory_uri() . '/assets/js/tiles.js', array('jquery'), $theme_info->get( 'Version' ), true);
    } else {
      wp_enqueue_script('insomnia-masonry', get_template_directory_uri() . '/assets/js/masonry.js', array('jquery'), $theme_info->get( 'Version' ), true);
    }
    $responsive_js = get_theme_mod('insomnia_menu_style');
    if ($responsive_js !='style3' && $responsive_js !='style6'){
      wp_enqueue_script('insomnia-responsive', get_template_directory_uri() . '/assets/js/responsive.js', array('jquery'), $theme_info->get( 'Version' ), true);
    };
    wp_enqueue_script('insomnia-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $theme_info->get( 'Version' ), true);

    $insomnia_js_menu_style = get_theme_mod('insomnia_menu_style');
    $insomnia_js_theme_color = get_theme_mod('insomnia_theme_color', '#5AC8FB');

    $insomnia_theme = array(
      'theme_url' => get_template_directory_uri(),
      'color' => $insomnia_js_theme_color,
      'menu_style' => $insomnia_js_menu_style
    );

  if ($insomnia_js_menu_style == 'style1' && get_theme_mod('insomnia_transparent_1') == "1") {
    $insomnia_theme['menu_transparent'] = true;
  } elseif ($insomnia_js_menu_style == 'style2' && get_theme_mod('insomnia_transparent_2') == "1") {
    $insomnia_theme['menu_transparent'] = true;
  } elseif ($insomnia_js_menu_style == 'style3' && get_theme_mod('insomnia_transparent_3') == "1") {
    $insomnia_theme['menu_transparent'] = true;
  } elseif ($insomnia_js_menu_style == 'style4' && get_theme_mod('insomnia_transparent_4') == "1") {
    $insomnia_theme['menu_transparent'] = true;
  } elseif ($insomnia_js_menu_style == 'style6' && get_theme_mod('insomnia_transparent_6') == "1") {
    $insomnia_theme['menu_transparent'] = true;
  } else {
    $insomnia_theme['menu_transparent'] = false;
  }

  if (get_theme_mod('insomnia_transparent_5') ||
    get_theme_mod('insomnia_transparent_7') ||
    get_theme_mod('insomnia_transparent_8')
  )
  {
    $insomnia_theme['menu_transparent'] = false;
  }
      wp_localize_script( 'insomnia-main', 'insomnia_theme', $insomnia_theme );
  }


}
add_action('wp_enqueue_scripts', 'insomnia_load_scripts');


/*
|--------------------------------------------------------------------------
| Insomnia page menu
|--------------------------------------------------------------------------
*/

function insomnia_page_menu_args( $args ) {
  if ( ! isset( $args['show_home'] ) )
    $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'insomnia_page_menu_args' );

/*
|--------------------------------------------------------------------------
| Insomnia content navigation
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'insomnia_content_nav' ) ) :

function insomnia_content_nav( $html_id ) {
  global $wp_query;

  $html_id = esc_attr( $html_id );

  if ( $wp_query->max_num_pages > 1 ) : ?>
    <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
      <div class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span>'.esc_html__('Older posts', 'insomnia' ) ); ?></div>
      <div class="nav-next"><?php previous_posts_link( esc_html__( 'Newer posts', 'insomnia' ) . '<span class="meta-nav">&rarr;</span>' ); ?></div>
    </nav>
  <?php endif;
}
endif;

/*
|--------------------------------------------------------------------------
| Insomnia comments
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'insomnia_comment' ) ) :
function insomnia_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' :
  ?>
  <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
    <p><?php esc_html_e( 'Pingback:', 'insomnia' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'insomnia' ), '<span class="edit-link">', '</span>' ); ?></p>
  <?php
      break;
    default :
    global $post;
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <article id="comment-<?php comment_ID(); ?>" class="comment">
      <header class="comment-meta comment-author vcard">
        <?php
          echo get_avatar( $comment, 75 );
          printf( '<div class="author-card">%1$s</div>',
            get_comment_author_link(),
            ( $comment->user_id === $post->post_author ) ? '<span>' . esc_html__( 'Post author', 'insomnia' ) . '</span>' : ''
          );
          printf( '<div class="comment-time">%3$s</div>',
            esc_url( get_comment_link( $comment->comment_ID ) ),
            get_comment_time( 'c' ),
            sprintf( esc_html__( '%1$s at %2$s', 'insomnia' ), get_comment_date(), get_comment_time() )
          );
        ?>
      </header>

      <?php if ( '0' == $comment->comment_approved ) : ?>
        <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'insomnia' ); ?></p>
      <?php endif; ?>

      <section class="comment-content comment">
        <?php comment_text(); ?>
        <?php edit_comment_link( esc_html__( 'Edit', 'insomnia' ), '<div class="edit-link">', '</div>' ); ?>
        <div class="reply">
          <?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'insomnia' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div><!-- .reply -->
      </section><!-- .comment-content -->
    </article><!-- #comment-## -->
  <?php
    break;
  endswitch; // end comment_type check
}
endif;

function is_blog() {
  global $post;
  $posttype = get_post_type( $post );
  return ( ( $posttype == 'post' ) && ( is_home() || is_single() || is_archive() || is_category() || is_tag() || is_author() ) ) ? true : false;
}

function insomnia_fix_blog_link_on_cpt( $classes, $item, $args ) {
  if( !is_blog() ) {
    $blog_page_id = intval( get_option('page_for_posts') );
    if( $blog_page_id != 0 && $item->object_id == $blog_page_id )
      unset($classes[array_search('current_page_parent', $classes)]);
  }
  return $classes;
}
add_filter( 'nav_menu_css_class', 'insomnia_fix_blog_link_on_cpt', 10, 3 );
/*
|--------------------------------------------------------------------------
| Insomnia post types and functions
|--------------------------------------------------------------------------
*/

function insomnia_setup() {
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( "title-tag" );
  add_theme_support( "custom-header");
  add_theme_support( "custom-background");
  add_theme_support( 'post-formats', array( 'image', 'link', 'quote', 'video', 'audio', 'gallery' ) );
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 680, 9999 ); // Unlimited height, soft crop
}

add_action( 'after_setup_theme', 'insomnia_setup' );



// post by views functionality
function insomnia_set_post_views($postID) {
    $count_key = 'insomnia_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function insomnia_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }
    insomnia_set_post_views($post_id);
}
add_action( 'wp_head', 'insomnia_track_post_views');

function insomnia_get_post_views($postID){
    $count_key = 'insomnia_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}


/*-----------------------------------------------------------------------------------*/
/*  Exclude Pages from Search Results
/*-----------------------------------------------------------------------------------*/

function insomnia_search_filter($query) {
  if ($query->is_search) {
    $query->set('post_type', 'post');
  }
  return $query;
};
add_filter('pre_get_posts','insomnia_search_filter');


/*-----------------------------------------------------------------------------------*/
/*  Other Functions
/*-----------------------------------------------------------------------------------*/

add_filter('wp_list_categories', 'insomnia_add_span_cat_count');
function insomnia_add_span_cat_count($links) {
$links = str_replace('</a> (', '</a> <span class="insomnia_cat_count">', $links);
$links = str_replace(')', '</span>', $links);
return $links;
}


function insomnia_MenuFallback ($args) {
  echo '<ul id="menu-all-pages" class="nav navbar-nav"><li id="menu-item-968" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-968"><a href="'. get_home_url() .'">' . esc_html__('Home', 'insomnia') . '</a></li>
</ul>';
}


class Insomnia_My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = Array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
}