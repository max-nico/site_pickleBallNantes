<?php
/**
 * BBPress: Page template
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 global $neder_theme;
 get_header(); 

 # Load Metabox Value
 $sidebar = $neder_theme['neder_bbpress_sidebar_position'];
 if(!isset($sidebar) || $sidebar == '') : $sidebar = 'sidebar-none'; endif; 

 $layout_type = $layout_class = 'neder-page';

 ?>
 
 <!-- start:page section -->
 <section class="neder-container neder-wrap-container neder-page <?php echo esc_html($layout_class); ?> neder-<?php echo esc_html($sidebar); ?> element-no-padding">
 
	<div class="neder-container-content">
		 <?php if($sidebar == 'sidebar-none') : ?> 
		 <!-- start:sidebar none - full width -->
			<div class="neder-content col-xs-12 post-full-width <?php echo esc_html($layout_type); ?>">
				 <!-- start:page content -->
				 <?php 
					 get_template_part('elements/page-content');	 
				 ?>
				 <!-- end:page content -->	
			</div>
		 <!-- end:sidebar none - full width -->
		 <?php endif; ?>
	 
	 
	 
	 
		 <?php if($sidebar == 'sidebar-left') : ?> 
		 <!-- start:sidebar left -->
			<?php get_template_part('sidebar'); ?> 
			<div class="neder-content col-xs-9 <?php echo esc_html($layout_type); ?>"> 
				 <!-- start:page content -->
				 <?php 
					 get_template_part('elements/page-content');			 
				 ?>
				 <!-- end:page content --> 
			</div>
		 <!-- end:sidebar left -->
		 <?php endif; ?>
	 


	 
		 <?php if($sidebar == 'sidebar-right') : ?>    
		 <!-- start:sidebar left -->
			<div class="neder-content col-xs-9 <?php echo esc_html($layout_type); ?>"> 
				 <!-- start:page content -->
				 <?php 
					 get_template_part('elements/page-content');		 
				 ?>
				 <!-- end:page content --> 
			</div>    
			<?php get_template_part('sidebar'); ?>
		 <!-- end:sidebar left -->
		 <?php endif; ?>
		 
		<div class="clearfix"></div>
	</div>
 </section>
 <!-- end:page section -->
 
 
 <?php get_footer(); ?>