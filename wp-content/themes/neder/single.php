<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 global $post;
 get_header(); 
 
 # Sidebar Position
 $sidebar = get_post_meta( get_the_id(), 'neder-sidebar', true ); 
 if(!isset($sidebar) || $sidebar == '') : $sidebar = $neder_theme['neder_panel_post_sidebar']; endif; 
 if($sidebar == 'sidebar-panel') :
	$sidebar = $neder_theme['neder_panel_post_sidebar']; 
 endif;
 
 # Top Content
 $top_content = get_post_meta( get_the_id(), 'neder-top-content-active', true );
 if(!isset($top_content) || $top_content == '') : $top_content = 'off'; endif;  
 
 # Post Layout
 $post_layout = get_post_meta( get_the_id(), 'neder_post_layout', true );
 if(!isset($post_layout) || $post_layout == '') : $post_layout = $neder_theme['neder_panel_post_layout']; endif; 
 if($post_layout == 'default') :
	$post_layout = $neder_theme['neder_panel_post_layout']; 
 endif;
 $format = '';
 if(has_post_format('Image',$post->ID)) : $format = 'Image'; endif;
 if(has_post_format('Standard',$post->ID)) : $format = 'Standard'; endif;
 if(has_post_format('Video',$post->ID)) : $format = 'Video'; endif;
 if(has_post_format('Audio',$post->ID)) : $format = 'Audio'; endif;
 if(empty($format)) : $format = 'Standard'; endif;
 $layout_type = '';
 
 ?>
 
 <?php if($post_layout == 'neder-post-layout1' && ($format == 'Image' || $format == 'Standard')) : ?>
	<div class="neder-posts-content-wrap <?php echo esc_html($post_layout); ?>" <?php echo neder_thumbs_url_inline(); ?>>		
		<div class="neder-wrap-container">
			<article class="item-header col-xs-12">	
				<div class="article-info">
					<div class="article-info-top">
						<h2 class="article-title"><?php echo get_the_title(); ?></h2>					
						<div class="neder-clear"></div>
					</div>
					<div class="article-info-bottom">
						<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
						<div class="article-separator">|</div>
						<div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
						<div class="article-separator">|</div>
						<div class="article-features-category"><i class="nedericon fa-ticket"></i><?php echo neder_category(2); ?></div>
						<div class="neder-clear"></div>
					</div>
				</div>
								
			</article>
		</div>
		<div class="header-pattern"></div>		
	</div>
 <?php endif; ?>
 <?php if($post_layout == 'neder-post-layout1' && ($format == 'Video' || $format == 'Audio')) : ?>
	<div class="neder-posts-content-embed-wrap-post-layout-1"> 
		<?php 
			global $wp_embed;
			if($format == 'Video') : 
				$url_embed = get_post_meta( get_the_id(), 'neder-url-video-embed', true );
			else :
				$url_embed = get_post_meta( get_the_id(), 'neder-url-audio-embed', true );
			endif;
			echo $wp_embed->run_shortcode('[embed width="1920"]'.$url_embed.'[/embed]');
		?>
	</div>
 <?php endif; ?>
 <!-- start:page section -->
 <section class="neder-container neder-wrap-container neder-post neder-<?php echo esc_html($sidebar); ?> element-no-padding">

	<?php if($top_content == 'on') :
		get_template_part('elements/top-content');
	endif; ?>
 
	<?php if($post_layout == 'neder-post-layout2' && ($format == 'Image' || $format == 'Standard')) : ?>
		<div class="neder-posts-image-wrap <?php echo esc_html($post_layout); ?>">
			<?php echo neder_thumbs('neder-post-medium-image'); ?>
			<div class="neder-wrap-container">
				<article class="item-header col-xs-12">	
					<div class="article-info">
						<div class="article-info-top">
							<h2 class="article-title"><?php echo get_the_title(); ?></h2>					
							<div class="neder-clear"></div>
						</div>
						<div class="article-info-bottom">
							<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
							<div class="article-separator">|</div>
							<div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
							<div class="article-separator">|</div>
							<div class="article-features-category"><i class="nedericon fa-ticket"></i><?php echo neder_category(2); ?></div>
							<div class="neder-clear"></div>
						</div>
					</div>											
				</article>
			</div>
			<div class="header-pattern"></div>		
		</div>			
	<?php endif; ?>

	 <?php if($post_layout == 'neder-post-layout2' && ($format == 'Video' || $format == 'Audio')) : ?>
		<div class="neder-posts-content-embed-wrap-post-layout-2"> 
			<?php
				global $wp_embed;
				if($format == 'Video') : 
					$url_embed = get_post_meta( get_the_id(), 'neder-url-video-embed', true );
				else :
					$url_embed = get_post_meta( get_the_id(), 'neder-url-audio-embed', true );
				endif;
				echo $wp_embed->run_shortcode('[embed width="1180"]'.$url_embed.'[/embed]');				
			?>
		</div>
	 <?php endif; ?>
	 
	 <div class="neder-container-content">
		 <?php if($sidebar == 'sidebar-none') : ?> 
		 <!-- start:sidebar none - full width -->
			<div class="neder-content col-xs-12 post-full-width <?php echo esc_html($layout_type); ?>">	
				<!-- start:page content -->
				<?php get_template_part('elements/post-content'); ?>
				<!-- end:page content -->	
			</div>
		 <!-- end:sidebar none - full width -->
		 <?php endif; ?>
	 
	 
	 
	 
		 <?php if($sidebar == 'sidebar-left') : ?> 
		 <!-- start:sidebar left -->
			<?php get_template_part('sidebar'); ?> 
			<div class="neder-content col-xs-9 <?php echo esc_html($layout_type); ?>">			
				<!-- start:page content -->
				<?php get_template_part('elements/post-content'); ?>
				<!-- end:page content --> 
			</div>
		 <!-- end:sidebar left -->
		 <?php endif; ?>
	 


	 
		 <?php if($sidebar == 'sidebar-right') : ?>    
		 <!-- start:sidebar right -->
			<div class="neder-content col-xs-9 <?php echo esc_html($layout_type); ?>"> 
				<!-- start:page content -->
				<?php get_template_part('elements/post-content'); ?>
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