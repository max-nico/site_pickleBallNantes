<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */

 global $neder_theme;
 get_header(); 
  
 $sidebar = $neder_theme['neder_panel_search_sidebar_position'];
 if(!isset($sidebar) || $sidebar == '') : $sidebar = 'sidebar-right'; endif;
 
 $layout_class = 'blog-layout';
 $layout_type = 'blog-layout';
?>
 
 <!-- start:page section -->
 <section class="neder-container neder-wrap-container neder-page <?php echo esc_html($layout_class); ?> neder-<?php echo esc_html($sidebar); ?> element-no-padding">
 
	 <?php if($sidebar == 'sidebar-none') : ?> 
     <!-- start:sidebar none - full width -->
        <div class="neder-content col-xs-12 post-full-width <?php echo esc_html($layout_type); ?>">
		    <h2 class="neder-title-page-container">
				<span class="neder-title-page"><?php printf( esc_html__( 'Search Results for: %s', 'neder' ), '<span>' . get_search_query() . '</span>' ); ?></span>
            </h2>		
            <!-- start:page content -->
            <?php get_template_part('elements/loop-search'); ?>
            <!-- end:page content -->	
        </div>
     <!-- end:sidebar none - full width -->
     <?php endif; ?>
 
	 <?php if($sidebar == 'sidebar-left') : ?> 
     <!-- start:sidebar left -->
        <?php get_template_part('sidebar'); ?> 
        <div class="neder-content col-xs-9 <?php echo esc_html($layout_type); ?>"> 
		    <h2 class="neder-title-page-container">
				<span class="neder-title-page"><?php printf( esc_html__( 'Search Results for: %s', 'neder' ), '<span>' . get_search_query() . '</span>' ); ?></span>
            </h2>
            <!-- start:page content -->
			<?php get_template_part('elements/loop-search'); ?>
            <!-- end:page content --> 
        </div>
     <!-- end:sidebar left -->
     <?php endif; ?>
 


 
	 <?php if($sidebar == 'sidebar-right') : ?>    
     <!-- start:sidebar left -->
        <div class="neder-content col-xs-9 <?php echo esc_html($layout_type); ?>">
		    <h2 class="neder-title-page-container">
				<span class="neder-title-page"><?php printf( esc_html__( 'Search Results for: %s', 'neder' ), '<span>' . get_search_query() . '</span>' ); ?></span>
            </h2>		
            <!-- start:page content -->
			<?php get_template_part('elements/loop-search'); ?>
            <!-- end:page content --> 
        </div>    
        <?php get_template_part('sidebar'); ?>
     <!-- end:sidebar left -->
     <?php endif; ?>
     
 	<div class="clearfix"></div>
 </section>
 <!-- end:page section -->
 
 
 <?php get_footer(); ?>