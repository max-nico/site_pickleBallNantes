<?php
/*
Plugin Name: Neder Core Functions
Plugin URI: http://themeforest.net/user/ad-theme/portfolio/?ref=ad-theme
Description: Neder Core
Author: AD-THEME
Version: 1.0
Author URI: http://themeforest.net/user/ad-theme/portfolio/?ref=ad-theme
*/

// Basic plugin definitions
define ('ADT_FC_PLG_NAME', 'neder-core');
define( 'ADT_FC_PLG_VERSION', '1.0' );
define( 'ADT_FC_URL', WP_PLUGIN_URL . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));
define( 'ADT_FC_DIR', WP_PLUGIN_DIR . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));

// LANGUAGE
add_action('init', 'neder_core_localization_init');
function neder_core_localization_init() {
    $path = dirname(plugin_basename( __FILE__ )) . '/languages/';
    $loaded = load_plugin_textdomain( 'neder-core', false, $path);
}

function neder_import_files() {
  return array(    
	array(
      'import_file_name'           => 'Default',
      'categories'                 => array( 'News', 'Full Width' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/default/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/default/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/default/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/default/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/',
    ),
    array(
      'import_file_name'           => 'Sport',
      'categories'                 => array( 'News', 'Full Width' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/sport/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/sport/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/sport/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/sport/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/sport/',
    ),
    array(
      'import_file_name'           => 'Food',
      'categories'                 => array( 'News', 'Blog', 'Boxed' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/food/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/food/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/food/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/food/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/food/',
    ),
    array(
      'import_file_name'           => 'Travel',
      'categories'                 => array( 'News', 'Boxed', 'Full Width' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/travel/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/travel/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/travel/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/travel/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/travel/',
    ),
    array(
      'import_file_name'           => 'Cars',
      'categories'                 => array( 'News', 'Boxed', 'Full Width' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/cars/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/cars/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/cars/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/cars/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/cars/',
    ),
    array(
      'import_file_name'           => 'Arts',
      'categories'                 => array( 'News', 'Blog', 'Full Width' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/arts/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/arts/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/arts/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/arts/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/arts/',
    ),
    array(
      'import_file_name'           => 'Animals',
      'categories'                 => array( 'News', 'Blog', 'Full Width' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/animals/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/animals/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/animals/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/animals/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/animals/',
    ),
    array(
      'import_file_name'           => 'Fashion',
      'categories'                 => array( 'News', 'Blog', 'Full Width' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/fashion/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/fashion/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/fashion/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/fashion/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/fashion/',
    ),
    array(
      'import_file_name'           => 'Wedding',
      'categories'                 => array( 'News', 'Blog', 'Full Width' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/wedding/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/wedding/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/wedding/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/wedding/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/wedding/',
    ),
    array(
      'import_file_name'           => 'Architecture',
      'categories'                 => array( 'News', 'Blog', 'Full Width' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/architecture/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/architecture/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/architecture/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/architecture/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/architecture/',
    ),
    array(
      'import_file_name'           => 'Fitness',
      'categories'                 => array( 'News', 'Blog', 'Boxed' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/fitness/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/fitness/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/fitness/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/fitness/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/fitness/',
    ),
    array(
      'import_file_name'           => 'Business',
      'categories'                 => array( 'News', 'Full Width', 'Boxed' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/business/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/business/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/business/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/business/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/business/',
    ),
    array(
      'import_file_name'           => 'Music',
      'categories'                 => array( 'News', 'Blog', 'Boxed' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/music/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/music/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/music/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/music/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/music/',
    ),
    array(
      'import_file_name'           => 'Health',
      'categories'                 => array( 'News', 'Full Width' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/health/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/health/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/health/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/health/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/health/',
    ),
    array(
      'import_file_name'           => 'Technology',
      'categories'                 => array( 'News', 'Blog', 'Boxed' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/technology/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/technology/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/technology/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/technology/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/technology/',
    ),
    array(
      'import_file_name'           => 'Photography',
      'categories'                 => array( 'Blog', 'Full Width' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/photography/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/photography/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/photography/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/photography/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/photography/',
    ),
    array(
      'import_file_name'           => 'Travel 2',
      'categories'                 => array( 'Blog', 'Full Width' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/travel2/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/travel2/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/travel2/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/travel2/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/travel2/',
    ),
    array(
      'import_file_name'           => 'Breaking News',
      'categories'                 => array( 'News', 'Boxed' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/breakingnews/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/breakingnews/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/breakingnews/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/breakingnews/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/breakingnews/',
    ),
    array(
      'import_file_name'           => 'Sport 2',
      'categories'                 => array( 'News', 'Blog', 'Boxed' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/sport2/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/sport2/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/sport2/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/sport2/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/sport2/',
    ),
    array(
      'import_file_name'           => 'Report',
      'categories'                 => array( 'News', 'Blog', 'Boxed' ),
      'import_file_url'            => 'http://themes.ad-theme.com/wp/democontent/neder/report/content.xml',     
      'import_redux'               => array(
        array(
          'file_url'    => 'http://themes.ad-theme.com/wp/democontent/neder/report/redux.json',
          'option_name' => 'neder_theme',
        ),
      ),
	  'import_widget_file_url'     => 'http://themes.ad-theme.com/wp/democontent/neder/report/widgets.json',
      'import_preview_image_url'   => 'http://themes.ad-theme.com/wp/democontent/neder/report/preview.jpg',
      'preview_url'                => 'http://themes.ad-theme.com/wp/democontent/neder/report/',
    ),		
  );
}
add_filter( 'pt-ocdi/import_files', 'neder_import_files' );

function neder_after_import_setup($selected_import) {

	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'main-menu' => $main_menu->term_id,
		)
	);

	if ( 'Travel' === $selected_import['import_file_name'] ) {	
		set_theme_mod('neder_theme_css', '.neder-boxed .neder-header-middle{padding:50px}.neder-container.neder-wrap-container.neder-page.neder-sidebar-none.element-no-padding{box-shadow:0 0 20px rgba(0,0,0,.5);margin-bottom:30px}.neder-footer-wrap .neder-footer-top,.neder-footer-wrap .neder-footer-top .neder-wrap-container{width:80%;margin:0 auto;text-align:center}.neder-header-middle{padding:50px 0}');		
	}
	if ( 'Sport' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-boxed #neder-outer-wrap{box-shadow:0 0 20px rgba(0,0,0,.8)}.neder-boxed .neder-header-top .neder-wrap-container{border-bottom:1px solid #f4f4f4}.neder-header-middle{padding:80px 0}');
	}
	if ( 'Cars' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-container{margin-bottom:50px;margin-top:50px;box-shadow:0 0 20px rgba(0,0,0,.8)}.neder-header-middle{padding:80px 0}');		
	}
	if ( 'Arts' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-menu-style3 .neder-header-bottom,.neder-menu-style3 .neder-header-sticky{border-bottom:1px solid #f9f9f9}.neder-header-middle{padding:80px 0}');
	}
	if ( 'Animals' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-boxed .neder-header-middle{padding:50px}.neder-header-middle{padding:50px 0}.neder-footer-top .footer-widget .box_categories .cat-item{padding-top:0}');
	}
	if ( 'Fashion' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-header-middle{padding:50px 0 80px}.neder-menu-style3 .neder-header-bottom,.neder-menu-style3 .neder-header-sticky{border-bottom:1px solid #f4f4f4}');
	}
	if ( 'Wedding' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', 'nav ul>li a{font-weight:400;letter-spacing:1px}.neder-header-middle{padding:150px 0}.neder-menu .menu-item>a{font-size:18px;padding:15px 25px 13px}.neder-menu nav li:hover ul.submenu li a{font-size:14px;font-weight:400}nav li:hover>.submenu,nav li:hover>ul.submenu{margin-top:-2px}.menu-sticky #menu-main-menu-1 .submenu{margin-top:4px}');
	}
	if ( 'Arts' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-menu-style3 .neder-header-bottom,.neder-menu-style3 .neder-header-sticky{border-bottom:1px solid #f9f9f9}.neder-header-middle{padding:80px 0}');
	}	
	if ( 'Architecture' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-content-no-padding .neder-container{padding-top:0}.neder-header-middle{padding:50px 0}.neder-container{box-shadow:0 0 25px rgba(0,0,0,.85);margin:50px auto}.neder-menu-style3 .neder-header-bottom,.neder-menu-style3 .neder-header-sticky{border-bottom:1px solid #f4f4f4}');
	}
	if ( 'Fitness' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-boxed .neder-header-middle{padding:80px 0}.neder-boxed #neder-outer-wrap{width:1180px;margin:50px auto;box-shadow:0 0 20px rgba(0,0,0,.8)}');
	}	
	if ( 'Business' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-boxed .neder-header-middle,.neder-content-no-padding .neder-footer-wrap .neder-footer-top .neder-wrap-container{padding:50px;border-top:1px solid #f4f4f4;border-bottom:1px solid #f4f4f4}.neder-boxed #neder-outer-wrap{border:1px solid #f4f4f4}.neder-menu-style3 .neder-header-bottom,.neder-menu-style3 .neder-header-sticky{border-bottom:1px solid #f4f4f4}');
	}
	if ( 'Music' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-footer-wrap .neder-footer-top .neder-wrap-container,.neder-header-middle{padding:50px 0}.neder-container{margin-top:50px;margin-bottom:50px;box-shadow:0 0 20px rgba(0,0,0,.8)}.neder-vc-element-posts .article-title a{font-size:20px}');
	}
	if ( 'Health' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-container{box-shadow:0 0 25px rgba(0,0,0,.8);margin-bottom:50px}.neder-header-middle{padding:80px 0}.neder-footer-wrap .neder-footer-top .neder-wrap-container{padding:50px 0}');
	}	
	if ( 'Technology' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-boxed #neder-outer-wrap{box-shadow:0 0 20px rgba(0,0,0,.8)}.neder-boxed .neder-header-middle{padding:80px 50px}');
	}
	if ( 'Photography' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-header-middle{padding:100px 0}.neder-menu-style3 .neder-header-bottom,.neder-menu-style3 .neder-header-sticky{border-bottom:1px solid #f4f4f4}.neder-footer-wrap .neder-footer-top .neder-wrap-container{padding:50px 0}');
	}
	if ( 'Travel 2' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-header-bottom.neder-wrap-container{border-top:1px solid #efefef!important}.neder-menu-style3 .neder-header-bottom,.neder-menu-style3 .neder-header-sticky{border-bottom:1px solid #efefef}.neder-header-middle{padding:40px 0}.neder-header-wrap-container.header-desktop{margin-bottom:50px}.neder-vc-element-posts-carousel.neder-posts-carousel-type2.neder-vc-element-posts-carousel-2.neder-vc-element-posts-carousel-item-show-4.element-no-padding.owl-carousel.owl-theme.owl-loaded{margin-bottom:-25px}.neder-vc-element-posts .article-title a,.neder-vc-element-posts.neder-posts-type2.neder-vc-posts-1-col h3 a{font-size:24px}.neder-footer-wrap .neder-footer-top .neder-wrap-container{padding:0 0 25px}.vc_row.wpb_row.vc_row-fluid{box-shadow:0 0 25px rgba(0,0,0,.7)}');
	}
	if ( 'Breaking News' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-boxed #neder-outer-wrap{margin:0 auto;box-shadow:0 0 20px rgba(0,0,0,8)}.neder-header-top>div:first-child,.neder-menu-style3 .neder-header-bottom{border-bottom:1px solid #f4f4f4}.neder-boxed .neder-header-middle{padding:50px}');
	}	
	if ( 'Sport 2' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-boxed #neder-outer-wrap{box-shadow:0 0 20px rgba(0,0,0,.8)}.neder-boxed .neder-header-top .neder-wrap-container{border-bottom:1px solid #f4f4f4}.neder-header-middle{padding:80px 0}');
	}
	if ( 'Report' === $selected_import['import_file_name'] ) {
		set_theme_mod('neder_theme_css', '.neder-boxed .neder-header-middle{padding:80px 50px}');
	}	
	$front_page_id = get_page_by_title( 'Home' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'neder_after_import_setup' );

function neder_confirmation_dialog_options ( $options ) {
	return array_merge( $options, array(
		'width'       => 300,
		'dialogClass' => 'neder-wp-dialog',
		'resizable'   => false,
		'height'      => 'auto',
		'modal'       => true,
	) );
}
add_filter( 'pt-ocdi/confirmation_dialog_options', 'neder_confirmation_dialog_options', 10, 1 );

function neder_add_menu_item() {
    add_menu_page( 'Neder Import Demo', 'Neder Import Demo', 'activate_plugins', 'neder_import', 'neder_import_output' );
}
add_action( 'admin_menu', 'neder_add_menu_item', 9 );

function neder_import_output() { }

function neder_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'neder_import';
	$default_settings['page_title']  = esc_html__( 'Import Demo' , 'neder-core' );
	$default_settings['menu_title']  = esc_html__( 'Import Demo' , 'neder-core' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'neder_import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'neder_plugin_page_setup' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

# Load Visual Composer Addons
require_once(ADT_FC_DIR . '/vc/vc_functions.php');
require_once(ADT_FC_DIR . '/vc/class/header.php');
require_once(ADT_FC_DIR . '/vc/function/header.php');
require_once(ADT_FC_DIR . '/vc/class/posts.php');
require_once(ADT_FC_DIR . '/vc/function/posts.php');
require_once(ADT_FC_DIR . '/vc/class/posts_carousel.php');
require_once(ADT_FC_DIR . '/vc/function/posts_carousel.php');
require_once(ADT_FC_DIR . '/vc/class/posts_tab.php');
require_once(ADT_FC_DIR . '/vc/function/posts_tab.php');
require_once(ADT_FC_DIR . '/vc/class/newsticker.php');
require_once(ADT_FC_DIR . '/vc/function/newsticker.php');

# Load Shortcode
require_once(ADT_FC_DIR . '/shortcodes/shortcodes-functions.php');

?>