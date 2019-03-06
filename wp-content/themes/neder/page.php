<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */

 get_header(); 
 
 # Load Metabox Value
 $sidebar = get_post_meta( get_the_id(), 'neder-sidebar', true ); 
 if(!isset($sidebar) || $sidebar == '') : $sidebar = 'sidebar-none'; endif; 

 $layout_type = get_post_meta( get_the_id(), 'neder-layout-type', true );
 if(!isset($layout_type) || $layout_type == '') : $layout_type = 'neder-page'; endif;
 if($layout_type != 'neder-page') : $layout_class = 'blog-layout'; else : $layout_class = ''; endif;  

 $top_content = get_post_meta( get_the_id(), 'neder-top-content-active', true );
 ?>
 
 <!-- start:page section -->
 <section class="neder-container neder-wrap-container neder-page <?php echo esc_html($layout_class); ?> neder-<?php echo esc_html($sidebar); ?> element-no-padding">
 
	<?php if($top_content == 'on') :
		get_template_part('elements/top-content');
	endif; ?>
 
	<div class="neder-container-content">
		 <?php if($sidebar == 'sidebar-none') : ?> 
		 <!-- start:sidebar none - full width -->
			<div class="neder-content col-xs-12 post-full-width <?php echo esc_html($layout_type); ?>">
				 <!-- start:page content -->
				 <?php 
					 if($layout_type == 'neder-page') 			: get_template_part('elements/page-content'); 	endif; 
					 if($layout_type == 'neder-blog')			: get_template_part('elements/blog'); 			endif;	 
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
					 if($layout_type == 'neder-page') 			: get_template_part('elements/page-content'); 	endif; 
					 if($layout_type == 'neder-blog')			: get_template_part('elements/blog'); 			endif;			 
				 ?>
				 <!-- end:page content --> 
			</div>
		 <!-- end:sidebar left -->
		 <?php endif; ?>
	 


	 
		 <?php if($sidebar == 'sidebar-right') : ?>    
		 <!-- start:sidebar right -->
			<div class="neder-content col-xs-9 <?php echo esc_html($layout_type); ?>"> 
				 <!-- start:page content -->
				 <?php 
					 if($layout_type == 'neder-page') 			: get_template_part('elements/page-content'); 	endif; 
					 if($layout_type == 'neder-blog') 			: get_template_part('elements/blog'); 			endif;		 
				 ?>
				 <!-- end:page content --> 
			</div>    
			<?php get_template_part('sidebar'); ?>
		 <!-- end:sidebar right -->
		 <?php endif; ?>
		 
		<div class="clearfix"></div>
	</div>
 </section>
 <!-- end:page section -->
 
 
 <?php get_footer(); ?>