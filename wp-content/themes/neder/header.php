<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */
  
 global $neder_theme;
 require(get_template_directory() . '/framework/load_default_var.php');
 
 ?>
 <!doctype html>
 <html class="no-js" <?php language_attributes(); ?>>
 <head>
 
 <!-- start:global -->
 <meta charset="<?php bloginfo( 'charset' );?>" />
 <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"><![endif]-->
 <!-- end:global -->
 
 <!-- start:responsive web design -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- end:responsive web design --> 
 
 <!-- start:head info -->
 <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 <?php if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) : ?>
 	<link rel="shortcut icon" href="<?php echo esc_url($neder_theme['favicon']['url']); ?>">
 <?php endif; ?>
 <!-- end:head info -->
 
 <!-- start:wp_head -->
 <?php wp_head(); ?>
 <!-- end:wp_head --> 
 
 </head>
 <body <?php body_class() ?>>
 
 <!-- start:preloader -->
 <?php get_template_part('elements/preloader'); ?>
 <!-- end:preloader --> 
 
 <!-- start:outer wrap -->
 <div id="neder-outer-wrap" <?php echo neder_check_color(); ?>>
 
 <!-- start:header content -->
 <?php get_template_part('elements/header'); ?>
 <!-- end:header content -->   