<?php
/**
* Plugin Name: Insomnia Shortcodes
* Plugin URI: http://themeforest.net/user/DankovThemes
* Description: Visual Composer Extantion.
* Version: 1.0.1
* Author: DankovThemes
* Author URI: http://themeforest.net/user/DankovThemes
* License: 
*/
/* ------------------------------------------------------------------------ */
/* Plugin Scripts */
/* ------------------------------------------------------------------------ */

add_action('wp_enqueue_scripts', 'insomnia_shortcodes_scripts');
if ( !function_exists( 'insomnia_shortcodes_scripts' ) ) {
	function insomnia_shortcodes_scripts() {
		wp_enqueue_script('insomnia_vc_custom',plugin_dir_url( __FILE__ ).'vc_extend/vc_custom.js', false, null , true);
		wp_enqueue_script('insomnia_classie',plugin_dir_url( __FILE__ ).'vc_extend/classie.js', false, null , true);
		wp_enqueue_script('insomnia_AnimOnScroll',plugin_dir_url( __FILE__ ).'vc_extend/AnimOnScroll.js', false, null , true);
		wp_enqueue_script('insomnia_imagesloaded',plugin_dir_url( __FILE__ ).'vc_extend/imagesloaded.js', false, null , true);
	}    
};
function insomnia_enqueue_sstyle() {
    wp_enqueue_style( 'dankov-vs-style', plugin_dir_url( __FILE__ ) . 'vc_extend/vc.css', array(), '1', 'all' );
}
add_action( 'wp_enqueue_scripts', 'insomnia_enqueue_sstyle' );

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		include( plugin_dir_path( __FILE__ ).'vc_extend/vc.php'); //Visual Composer
	}



?>