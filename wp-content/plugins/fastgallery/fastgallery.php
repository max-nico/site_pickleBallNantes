<?php
/*
Plugin Name: Fast Gallery
Plugin URI: http://demo.ad-theme.com/plugin/fastgallery/
Description: Fast Gallery - Premium Wordpress Gallery Plugin
Author: Ad-theme.com
Version: 1.3
Author URI: http://www.ad-theme.com
Compatibility: WP 3.9.x - WP 4.0.x
*/

// Basic plugin definitions 
define ('PLG_NAME_FASTGALLERY', 'fastgallery');
define( 'PLG_VERSION_FASTGALLERY', '1.3' );
define( 'AD_FG_URL', WP_PLUGIN_URL . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));
define( 'AD_FG_DIR', WP_PLUGIN_DIR . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));

// LANGUAGE
add_action('init', 'fg_localization_init');
function fg_localization_init() {
    $path = dirname(plugin_basename( __FILE__ )) . '/languages/';
    $loaded = load_plugin_textdomain( 'fastgallery', false, $path);
}

// Plugin INIT

require_once(AD_FG_DIR.'install.php');