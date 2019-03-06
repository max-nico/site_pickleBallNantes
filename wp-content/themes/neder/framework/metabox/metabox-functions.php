<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 # Function Metabox Enqueue
 if ( ! function_exists( 'neder_metabox_enqueue' ) ) {
	 function neder_metabox_enqueue() {
		global $typenow;
		if( $typenow == 'post' || $typenow == 'page') {		
			wp_enqueue_script( 'neder-metabox-js', NEDER_URL . '/framework/metabox/metabox-admin.js' );
			wp_enqueue_style( 'neder-metabox-css',  NEDER_URL . '/framework/metabox/metabox-admin.css' );		
		}
	}
	add_action( 'admin_enqueue_scripts', 'neder_metabox_enqueue' );
 }