<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 global $neder_theme;
 
 # Load Metabox Value
 $sidebar = get_post_meta( get_the_id(), 'neder-sidebar', true );
 if(!isset($sidebar) || $sidebar == '') : $sidebar = 'sidebar-none'; endif; 
 
 wp_enqueue_style('owl-carousel');
 wp_enqueue_script('owl-carousel-script'); 
 wp_enqueue_style('neder-vc-element'); 
 
 /* RTL */	
 if ($neder_theme['rtl']) :  $rtl = 'rtl:true,'; else : $rtl = ''; endif;  
 /* #RTL */ 

 $orig_post = $post;
 global $post;
 $tags = wp_get_post_tags($post->ID);
   
 if ($tags) :
  
 ?>
  
 <h2 class="neder-title-page-container">
  	<span class="neder-title-page"><?php esc_html_e('Related Article','neder'); ?></span>
 </h2>
	
 <?php 
 $tag_ids = array();
 foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	
 $args=array(
		  'tag__in' => $tag_ids,
		  'post__not_in' => array($post->ID),
 );
   
 $related_query = new wp_query( $args ); ?>
	
	<?php if($related_query->have_posts()) : ?>
	
		<div class="related-item-container neder-vc-element-posts-carousel neder-element-posts neder-posts-layout2 element-no-padding">
		
		<?php 
		while( $related_query->have_posts() ) :
		$related_query->the_post();		
		$link = get_permalink();
		?>
	  
		<article class="item-posts first-element-posts">
			<div class="article-image">
					<?php if(has_post_thumbnail()) : ?>
						<?php echo neder_related_thumbs('neder-preview-post'); ?>
						<?php echo neder_check_format(); ?>
						<div class="article-category"><?php echo neder_category(1); ?></div>
					<?php endif; ?>
				<div class="article-info-top">
					<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
					<div class="article-separator">|</div>
					<div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
					<div class="neder-clear"></div>
				</div>				
			</div>
			<div class="article-info">
				<div class="article-info-bottom">	
					<h3 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h3>
					<div class="neder-clear"></div>	
				</div>
			</div>
		</article>
			   	   
		<?php endwhile; ?>	
	
		</div>
		
	<?php else : ?>
	
		<p><?php esc_html_e('No Related Article','neder'); ?></p>
	
	<?php endif; ?>		
		
		
 <?php
 endif;
 $post = $orig_post;
 wp_reset_postdata();
 ?>
 
 <div class="clearfix"></div>