<?php
require('editor/shortcodes-editor.php');

// BACKEND ASSETS JS
add_action('admin_enqueue_scripts', 'neder_shortcodes_backend_scripts');

function neder_shortcodes_backend_scripts() {
	
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'backend', ADT_FC_URL . '/shortcodes/editor/assets/js/backend.js', array('jquery'), false, true );	
    wp_enqueue_script( 'neder-color-picker-script', ADT_FC_URL . '/shortcodes/editor/assets/js/colorpicker.js', array( 'wp-color-picker' ), false, true ); 
	
}

// BACKEND ASSETS CSS
add_action( 'admin_enqueue_scripts', 'neder_backend_styles' );

function neder_backend_styles() {
	
	wp_register_style( 'neder-backend-style',  ADT_FC_URL . '/shortcodes/editor/assets/css/backend.css' );
    wp_enqueue_style( 'neder-backend-style' );
	
}

require('functions/shortcodes.php');

?>