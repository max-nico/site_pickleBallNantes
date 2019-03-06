<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */

 global $neder_theme;
 get_header(); 
  
 $sidebar = $neder_theme['neder_panel_image_sidebar_position'];
 if(!isset($sidebar) || $sidebar == '') : $sidebar = 'sidebar-right'; endif;
 
 $layout_class = 'blog-layout';
 $layout_type = 'blog-layout';
?>
 
 <!-- start:page section -->
 <section class="neder-container neder-wrap-container neder-page <?php echo esc_html($layout_class); ?> neder-<?php echo esc_html($sidebar); ?> element-no-padding">
 
	 <?php if(esc_html($sidebar) == 'sidebar-none') : ?> 
     <!-- start:sidebar none - full width -->
        <div class="neder-content col-xs-12 post-full-width <?php echo esc_html($layout_type); ?>">	
            <!-- start:page content -->
			<?php if ( have_posts() ) : ?>
					<h2 class="neder-title-page-container">
						<span class="neder-title-page"><?php the_title(); ?></span>
					</h2>                                     
					<div class="attachment-image">
						<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id()); ?>" alt="image" >
					</div>
					<div class="text attachment-container">
						<?php $thumb_array = get_post( get_post_thumbnail_id() ); ?>
						<span class="attachment-image-id"><?php echo esc_html__('ID: ','neder'); ?><?php echo esc_html($thumb_array->ID); ?></span>
						<span class="attachment-image-author"><?php echo esc_html__('Author: ','neder'); ?><?php echo the_author_meta( 'display_name', esc_html($thumb_array->post_author) ); ?></span>                          
						<span class="attachment-image-date"><?php echo esc_html__('Date: ','neder'); ?><?php echo esc_html($thumb_array->post_date); ?></span>                          
						<span class="attachment-image-description"><?php echo esc_html__('Description: ','neder'); ?><?php echo esc_html($thumb_array->post_content); ?></span>                          
						<span class="attachment-image-caption"><?php echo esc_html__('Caption: ','neder'); ?><?php echo esc_html($thumb_array->post_excerpt); ?></span>                          
						<span class="attachment-image-type"><?php echo esc_html__('Type: ','neder'); ?><?php echo esc_html($thumb_array->post_mime_type); ?></span>                
					</div>                           
				 <!-- end:page content -->
			<?php endif; ?>     
            <!-- end:page content -->	
        </div>
     <!-- end:sidebar none - full width -->
     <?php endif; ?>
 
	 <?php if(esc_html($sidebar) == 'sidebar-left') : ?> 
     <!-- start:sidebar left -->
        <?php get_template_part('sidebar'); ?> 
        <div class="neder-content col-xs-9 <?php echo esc_html($layout_type); ?>">
            <!-- start:page content -->
			<?php if ( have_posts() ) : ?>
					<h2 class="neder-title-page-container">
						<span class="neder-title-page"><?php the_title(); ?></span>
					</h2>                                     
					<div class="attachment-image">
						<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id()); ?>" alt="image" >
					</div>
					<div class="text attachment-container">
						<?php $thumb_array = get_post( get_post_thumbnail_id() ); ?>
						<span class="attachment-image-id"><?php echo esc_html__('ID: ','neder'); ?><?php echo esc_html($thumb_array->ID); ?></span>
						<span class="attachment-image-author"><?php echo esc_html__('Author: ','neder'); ?><?php echo the_author_meta( 'display_name', esc_html($thumb_array->post_author) ); ?></span>                          
						<span class="attachment-image-date"><?php echo esc_html__('Date: ','neder'); ?><?php echo esc_html($thumb_array->post_date); ?></span>                          
						<span class="attachment-image-description"><?php echo esc_html__('Description: ','neder'); ?><?php echo esc_html($thumb_array->post_content); ?></span>                          
						<span class="attachment-image-caption"><?php echo esc_html__('Caption: ','neder'); ?><?php echo esc_html($thumb_array->post_excerpt); ?></span>                          
						<span class="attachment-image-type"><?php echo esc_html__('Type: ','neder'); ?><?php echo esc_html($thumb_array->post_mime_type); ?></span>                
					</div>                            
				 <!-- end:page content -->
			<?php endif; ?>     
            <!-- end:page content --> 
        </div>
     <!-- end:sidebar left -->
     <?php endif; ?>
 


 
	 <?php if(esc_html($sidebar) == 'sidebar-right') : ?>    
     <!-- start:sidebar left -->
        <div class="neder-content col-xs-9 <?php echo esc_html($layout_type); ?>">
            <!-- start:page content -->
			<?php if ( have_posts() ) : ?>
					<h2 class="neder-title-page-container">
						<span class="neder-title-page"><?php the_title(); ?></span>
					</h2>                                     
					<div class="attachment-image">
						<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id()); ?>" alt="image" >
					</div>
					<div class="text attachment-container">
						<?php $thumb_array = get_post( get_post_thumbnail_id() ); ?>
						<span class="attachment-image-id"><?php echo esc_html__('ID: ','neder'); ?><?php echo esc_html($thumb_array->ID); ?></span>
						<span class="attachment-image-author"><?php echo esc_html__('Author: ','neder'); ?><?php echo the_author_meta( 'display_name', esc_html($thumb_array->post_author) ); ?></span>                          
						<span class="attachment-image-date"><?php echo esc_html__('Date: ','neder'); ?><?php echo esc_html($thumb_array->post_date); ?></span>                          
						<span class="attachment-image-description"><?php echo esc_html__('Description: ','neder'); ?><?php echo esc_html($thumb_array->post_content); ?></span>                          
						<span class="attachment-image-caption"><?php echo esc_html__('Caption: ','neder'); ?><?php echo esc_html($thumb_array->post_excerpt); ?></span>                          
						<span class="attachment-image-type"><?php echo esc_html__('Type: ','neder'); ?><?php echo esc_html($thumb_array->post_mime_type); ?></span>                
					</div>                               
				 <!-- end:page content -->
			<?php endif; ?>     
            <!-- end:page content --> 
        </div>    
        <?php get_template_part('sidebar'); ?>
     <!-- end:sidebar left -->
     <?php endif; ?>
     
 	<div class="clearfix"></div>
 </section>
 <!-- end:page section -->
 
 
 <?php get_footer(); ?>