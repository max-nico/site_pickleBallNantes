<?php
/*
File: inc/assets.php
Description: Assets inclusion
Plugin: FAST CAROUSEL
Author: Ad-theme.com
*/



//********************************************************************************//
// CSS
//********************************************************************************//


// Frontend
add_action( 'wp_enqueue_scripts', 'fastcarousel_frontend_styles' );

function fastcarousel_frontend_styles() {
	
	// Main
	wp_register_style( 'fastcarousel-main-style',  AD_FC_URL . 'css/style.css' );
    wp_enqueue_style( 'fastcarousel-main-style' );
	
	// CAROUSEL
	wp_register_style( 'fc-owl-carousel-css',  AD_FC_URL . 'css/owl.carousel.css' );	
	
	// PHOTOBOX
	wp_register_style( 'photobox',  AD_FC_URL . 'css/photobox.css' );
	wp_register_style( 'photoboxie',  AD_FC_URL . 'css/photobox.ie.css' );
	wp_register_style( 'photobox-style',  AD_FC_URL . 'css/photobox-style.css' );
	
	// PRETTYPHOTO
	wp_register_style( 'prettyPhoto',  AD_FC_URL . 'css/prettyPhoto.css' );
	
	// MAGNIFIC POPUP
	wp_register_style( 'magnific-popup',  AD_FC_URL . 'css/magnific-popup.css' );
	
	wp_register_style( 'fonts',  AD_FC_URL . 'css/fonts.css' );
    wp_enqueue_style( 'fonts' );			
}


// Backend
add_action( 'admin_enqueue_scripts', 'fastcarousel_backend_styles' );

function fastcarousel_backend_styles() {
	
	// Main
	wp_register_style( 'fastcarousel-backend-style',  AD_FC_URL . 'css/backend.css' );
    wp_enqueue_style( 'fastcarousel-backend-style' );
	
}



//********************************************************************************//
// JS
//********************************************************************************//


// Frontend
add_action('wp_enqueue_scripts', 'fastcarousel_frontend_scripts');

function fastcarousel_frontend_scripts() {
	
	// Load WP jQuery if not included
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-masonry');
	wp_enqueue_script('fastcarousel-frontend-script', AD_FC_URL . 'js/frontend.js', array('jquery'), '', true);
	
	// CAROUSEL
	wp_register_script('fc-owl.carousel-js', AD_FC_URL . 'js/owl.carousel.js', array('jquery'), '', true);
	
	// PHOTOBOX
	wp_register_script('photobox-js', AD_FC_URL . 'js/photobox.js', array('jquery'), '', true);
	// PRETTYPHOTO
	wp_register_script('prettyPhoto-js', AD_FC_URL . 'js/jquery.prettyPhoto.js', array('jquery'), '', true);
	// MAGNIFIC POPUP
	wp_register_script('magnific-popup-js', AD_FC_URL . 'js/jquery.magnific-popup.js', array('jquery'), '', true);
	
}

// Backend
add_action('admin_enqueue_scripts', 'fastcarousel_shortcodes_backend_scripts');

function fastcarousel_shortcodes_backend_scripts() {
	
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-script', AD_FC_URL . 'js/colorpicker.js', array( 'wp-color-picker' ), false, true );
	
}