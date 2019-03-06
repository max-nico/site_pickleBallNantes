<?php
/*
Plugin Name: Fast Carousel
Plugin URI: http://demo.ad-theme.com/plugin/fastcarousel/
Description: Fast Carousel - Premium Wordpress Carousel Plugin
Author: Ad-theme.com
Version: 1.0
Author URI: http://www.ad-theme.com
Compatibility: WP 3.9.x - WP 4.0.x
*/

// Basic plugin definitions 
define ('PLG_NAME_fastcarousel', 'fastcarousel');
define( 'PLG_VERSION_fastcarousel', '1.0' );
define( 'AD_FC_URL', WP_PLUGIN_URL . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));
define( 'AD_FC_DIR', WP_PLUGIN_DIR . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));

// LANGUAGE
add_action('init', 'fc_localization_init');
function fc_localization_init() {
    $path = dirname(plugin_basename( __FILE__ )) . '/languages/';
    $loaded = load_plugin_textdomain( 'fastcarousel', false, $path);
}

// Plugin INIT

require_once(AD_FC_DIR.'install.php');