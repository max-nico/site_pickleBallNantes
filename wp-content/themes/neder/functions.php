<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 

define( 'NEDER_DIR', get_template_directory() . '/' );
define( 'NEDER_URL', get_template_directory_uri() . '/' );

define( 'NEDER_FUNCTIONS_DIR', get_template_directory() . '/functions/' );
define( 'NEDER_FUNCTIONS_URL', get_template_directory_uri() . '/functions/' );

define( 'NEDER_CSS_DIR', get_template_directory() . '/assets/css/' );
define( 'NEDER_CSS_URL', get_template_directory_uri() . '/assets/css/' );

define( 'NEDER_IMG_DIR', get_template_directory() . '/assets/img/' );
define( 'NEDER_IMG_URL', get_template_directory_uri() . '/assets/img/' );

define( 'NEDER_JS_DIR', get_template_directory() . '/assets/js/' );
define( 'NEDER_JS_URL', get_template_directory_uri() . '/assets/js/' );

add_action( 'after_setup_theme', 'neder_theme_setup' );
if ( ! function_exists( 'neder_theme_setup' ) ) {
    function neder_theme_setup() {
		
        # Redux framework
        if ( class_exists( 'Redux' ) ) {

            require_once(get_template_directory() . '/framework/redux-options.php');

        }		

		# Content Width
		if (!isset($content_width)) {
			$content_width = 860;
		}
		
		# Domain & Language
		global $theme_text_domain;
		$theme_text_domain = 'neder';		
        load_theme_textdomain($theme_text_domain, get_template_directory() . '/lang');
		
		
		# Theme Support
		add_theme_support('post-formats', 
								array(  'image',
							   			'video', 
							   			'audio' 
							   )
		); 
		
		# Add Theme Support
		add_theme_support( 'post-thumbnails' ); 
		add_theme_support( 'custom-background' ); 
		add_theme_support( 'custom-header' ) ;
        add_theme_support( 'automatic-feed-links' ); 
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) ); 
		add_theme_support( 'title-tag' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		
		# Add Image Size
		add_image_size( 'neder-preview-post', 1200, 800, true );	
		add_image_size( 'neder-widget-thumb', 70, 70, true );
		add_image_size( 'neder-vc-posts-medium', 600, 500, true );
		add_image_size( 'neder-vc-normal', 800 , 800 , true);
		add_image_size( 'neder-vc-posts-medium-large', 800 , 350 , true);
		add_image_size( 'neder-vc-header', 800 , 600 , true);
		add_image_size( 'neder-vc-header-medium', 446 , 248 , true);
		add_image_size( 'neder-vc-header-small', 300 , 200 , true);
		add_image_size( 'neder-vc-blog-large', 1600 , 914 , true);
		add_image_size( 'neder-vc-blog-medium', 700 , 400 , true);
		add_image_size( 'neder-vc-blog-medium-type3', 700 , 600 , true);
		add_image_size( 'neder-vc-blog-medium-type5', 700 , 800 , true);
		add_image_size( 'neder-vc-blog-medium-no-sidebar', 700 , 506 , true);
		add_image_size( 'neder-vc-blog-small', 325 , 235 , true);
		add_image_size( 'neder-post-full-image', 2000, 600, true );
		add_image_size( 'neder-post-medium-image', 1100, 500, true );
		
		# Register Menus Position		
        register_nav_menus(
            array( 'main-menu' => esc_html__('Main Menu', 'neder') )
		); 	
		
		# Register Default Sidebar
		register_sidebar(
			array(
				'name'          => esc_html__('Default Sidebar', 'neder'),
				'id'            => 'neder-default',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => "</div>",
				'before_title'  => '<h3 class="widget-title"><span class="ndwp-title-widget">',
				'after_title'   => '</span></h3>',
			)
		);

		# Register Footer First Column
		register_sidebar(
			array(
				'name'          => esc_html__('Footer First Column', 'neder'),
				'id'            => 'neder-footer-1',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => "</div>",
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		# Register Footer Second Column
		register_sidebar(
			array(
				'name'          => esc_html__('Footer Second Column', 'neder'),
				'id'            => 'neder-footer-2',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => "</div>",
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		# Register Footer Third Column
		register_sidebar(
			array(
				'name'          => esc_html__('Footer Third Column', 'neder'),
				'id'            => 'neder-footer-3',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => "</div>",
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		# Register Sidebar Help Vc Page
		register_sidebar(
			array(
				'name'          => esc_html__('Sidebar VC 1', 'neder'),
				'id'            => 'sidebar-vc-1-1',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => "</div>",
				'before_title'  => '<h3 class="widget-title"><span class="ndwp-title-widget">',
				'after_title'   => '</span></h3>',
			)
		);		

		register_sidebar(
			array(
				'name'          => esc_html__('Sidebar VC 2', 'neder'),
				'id'            => 'sidebar-vc-2-2',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => "</div>",
				'before_title'  => '<h3 class="widget-title"><span class="ndwp-title-widget">',
				'after_title'   => '</span></h3>',
			)
		);	
		
		if ( class_exists( 'bbPress' ) ) {
			register_sidebar(
				array(
					'name'          => esc_html__('bbPress Sidebar', 'neder'),
					'id'            => 'neder-bbpress',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => "</div>",
					'before_title'  => '<h3 class="widget-title"><span class="ndwp-title-widget">',
					'after_title'   => '</h3>',
				)
			);		
		}
		
		if ( class_exists( 'BuddyPress' ) ) {
			register_sidebar(
				array(
					'name'          => esc_html__('BuddyPress Sidebar', 'neder'),
					'id'            => 'neder-buddypress',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => "</div>",
					'before_title'  => '<h3 class="widget-title"><span class="ndwp-title-widget">',
					'after_title'   => '</h3>',
				)
			);		
		}		
	}
}

# Load Assets
require_once(get_template_directory() . '/assets/assets.php');

# Load Global Functions
require_once(get_template_directory() . '/framework/global-functions.php');
require_once(get_template_directory() . '/framework/ajax-login-register.php');
require_once(get_template_directory() . '/framework/class/class-display.php');
require_once(get_template_directory() . '/framework/metabox/metabox.php');
require_once(get_template_directory() . '/framework/metabox/metabox-functions.php');

# Load Plugin Activation
require_once(get_template_directory() . '/framework/tgm-required-plugin-activation-load.php');

# Load Widget
require_once(get_template_directory() . '/elements/widget.php');

/* POLYLANG SUPPORT */
if ( defined( 'POLYLANG_VERSION' ) ) :
	function neder_polylang() {
		global $neder_theme;
		pll_register_string('Footer Translation', $neder_theme['footer-text'] , 'option panel', true);
	}
	add_action ( 'admin_init', 'neder_polylang' );
endif;

/* SUPPORT WP REVIEW */
function neder_new_review_colors($colors, $id) {
	global $neder_theme;
	
	$main_color 					= $neder_theme['main-color'];
	$header_bottom_line 			= $neder_theme['header_bottom_line'];
	$content_text					= $neder_theme['content_text'];
	$content_navigation_background 	= $neder_theme['content_navigation_background'];		
	$content_post 					= $neder_theme['content_post'];	
	
	$colors['color'] = $main_color;
	$colors['fontcolor'] = $content_text;
	$colors['bgcolor1'] = $content_post;
	$colors['bgcolor2'] = $content_navigation_background;
	$colors['bordercolor'] = $content_text;
	return $colors;
}
add_filter( 'wp_review_colors', 'neder_new_review_colors', 10, 2 );
add_filter( 'wp_review_remove_branding', '__return_true' );


?>