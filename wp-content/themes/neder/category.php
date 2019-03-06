<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */

 global $neder_theme;
 global $wp_query;
 get_header(); 
 
 $category_id = $wp_query->query_vars['cat'];
 $cat_data = get_option("category_$category_id"); 
 
 $sidebar 		= $cat_data['neder_category_sidebar_position'];
 $description 	= $cat_data['neder_category_description'];
 
 if($sidebar == '' || $sidebar == 'default') : 
	$sidebar = $neder_theme['neder_panel_category_sidebar_position'];
	if(!isset($sidebar) || $sidebar == '') : $sidebar = 'sidebar-right'; endif; 
 endif;

 if($description == '' || $description == 'default') : 
	$description = $neder_theme['neder_panel_category_description'];
	if(!isset($description) || $description == '') : $description = 'on'; endif; 
 endif;
 
 $layout_class = 'blog-layout';
 $layout_type = 'blog-layout';
?>
 
 <!-- start:page section -->
 <section class="neder-container neder-wrap-container neder-page <?php echo esc_html($layout_class); ?> neder-<?php echo esc_html($sidebar); ?> element-no-padding">
 
	 <?php if(esc_html($sidebar) == 'sidebar-none') : ?> 
     <!-- start:sidebar none - full width -->
        <div class="neder-content col-xs-12 post-full-width <?php echo esc_html($layout_type); ?>">			
			<?php if ( category_description() && esc_html($description) == 'on') : ?>
				<div class="neder-category-description"><?php echo category_description(); ?></div>
			<?php endif; ?> 
		    <h2 class="neder-title-page-container">
				<span class="neder-title-page"><?php printf( esc_html__( 'Category: %s', 'neder' ), single_cat_title( '', false ) ); ?></span>
            </h2>			
            <!-- start:page content -->
            <?php get_template_part('elements/loop-posts'); ?>
            <!-- end:page content -->	
        </div>
     <!-- end:sidebar none - full width -->
     <?php endif; ?>
 
	 <?php if(esc_html($sidebar) == 'sidebar-left') : ?> 
     <!-- start:sidebar left -->
        <?php get_template_part('sidebar'); ?> 
        <div class="neder-content col-xs-9 <?php echo esc_html($layout_type); ?>"> 			
			<?php if ( category_description() && esc_html($description) == 'on') : ?>
				<div class="neder-category-description"><?php echo category_description(); ?></div>
			<?php endif; ?> 
		    <h2 class="neder-title-page-container">
				<span class="neder-title-page"><?php printf( esc_html__( 'Category: %s', 'neder' ), single_cat_title( '', false ) ); ?></span>
            </h2>			
            <!-- start:page content -->
			<?php get_template_part('elements/loop-posts'); ?>
            <!-- end:page content --> 
        </div>
     <!-- end:sidebar left -->
     <?php endif; ?>
 


 
	 <?php if(esc_html($sidebar) == 'sidebar-right') : ?>    
     <!-- start:sidebar left -->
        <div class="neder-content col-xs-9 <?php echo esc_html($layout_type); ?>">			
			<?php if ( category_description() && esc_html($description) == 'on') : ?>
				<div class="neder-category-description"><?php echo category_description(); ?></div>
			<?php endif; ?> 
		    <h2 class="neder-title-page-container">
				<span class="neder-title-page"><?php printf( esc_html__( 'Category: %s', 'neder' ), single_cat_title( '', false ) ); ?></span>
            </h2>		
            <!-- start:page content -->
			<?php get_template_part('elements/loop-posts'); ?>
            <!-- end:page content --> 
        </div>    
        <?php get_template_part('sidebar'); ?>
     <!-- end:sidebar left -->
     <?php endif; ?>
     
 	<div class="clearfix"></div>
 </section>
 <!-- end:page section -->
 
 
 <?php get_footer(); ?>