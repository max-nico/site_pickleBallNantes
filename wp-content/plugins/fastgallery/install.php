<?php
/*
File: inc/install.php
Description: Install functions
Plugin: FAST GALLERY
Author: Ad-theme.com
*/


//***************************************************************************
// Options Install/Unistall
//***************************************************************************

register_activation_hook(__FILE__,'fastgallery_install_options');
register_deactivation_hook(__FILE__, 'fastgallery_uninstall_options');


// Install Options Function
function fastgallery_install_options() {
	
	// Force to uninstall past options
    fastgallery_uninstall_options();
	
	// Add the options
	add_option('fastgallery_custom_css','');
	
	// Update the revrite rules on activation
	flush_rewrite_rules();
	
}

// Uninstall Options Function
function fastgallery_uninstall_options() { 

	// Remove Options
	delete_option('fastgallery_custom_css');
	
	// Update the revrite rules on deactivation
	flush_rewrite_rules();
	
}



//***************************************************************************
// Plugin INIT
//***************************************************************************

// ASSETS
require_once(AD_FG_DIR.'assets.php');

// FUNCTION
require_once(AD_FG_DIR.'functions.php');

// CUSTOM MEDIA OPTIONS
require_once(AD_FG_DIR.'media_options.php');

// CUSTOM MEDIA FIELDS
require_once(AD_FG_DIR.'medias_fields.php');