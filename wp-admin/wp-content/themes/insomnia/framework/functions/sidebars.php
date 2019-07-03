<?php
/*=======================================
	Register Sidebar UNLIMITED 
=======================================*/

add_action( 'widgets_init', 'insomnia_widgets_init' );
function insomnia_widgets_init() {


	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'insomnia' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'insomnia' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-line"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	) );


if(get_theme_mod('insomnia_menu_widgets','enable') == true)  {

	register_sidebar( array(
		'name' => __( 'Banner Area', 'insomnia' ),
		'id' => 'widget-banner',
		'description' => __( 'If you choose Menu: "Style 7", you can add banner to header. Please use "Text" widget with yours code (AdSense, simple HTML/CSS, etc).', 'insomnia' ),
		'before_widget' => '<div id="%1$s" class="widget banner">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
};


	register_sidebar( array(
		'name' => __( 'Footer Sidebar 1', 'insomnia' ),
		'id' => 'footer-1',
		'description' => __( 'Appears on all pages at the bottom of site.', 'insomnia' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


	register_sidebar( array(
		'name' => __( 'Footer Sidebar 2', 'insomnia' ),
		'id' => 'footer-2',
		'description' => __( 'Appears on all pages at the bottom of site.', 'insomnia' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar 3', 'insomnia' ),
		'id' => 'footer-3',
		'description' => __( 'Appears on all pages at the bottom of site.', 'insomnia' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar 4', 'insomnia' ),
		'id' => 'footer-4',
		'description' => __( 'Appears on all pages at the bottom of site.', 'insomnia' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'WooCommerce Sidebar', 'insomnia' ),
		'id' => 'woo-sidebar',
		'description' => __( 'Add your widgets to shop page', 'insomnia' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-line"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	) );
	
};

?>