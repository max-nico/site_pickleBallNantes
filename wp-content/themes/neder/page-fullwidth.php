<?php
/**
 * neder Theme
 *
 * Template Name: Full Width
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */

 get_header(); 
 
 ?>
 
 <!-- start:page section -->
 <section class="neder-page element-no-padding">
     <!-- start:sidebar none - full width -->
        <div class="neder-one-page-wrap-container">
             <!-- start:page content -->
			 <?php echo the_content(); ?>
             <!-- end:page content -->	
        </div>
     <!-- end:sidebar none - full width -->
 </section>
 <!-- end:page section -->
 
 
 <?php get_footer(); ?>