<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 global $neder_theme;
 
 $post_layout = get_post_meta( get_the_id(), 'neder_post_layout', true );
 
 if(!isset($post_layout) || $post_layout == '') : $post_layout = 'neder-post-layout1'; endif; 
 if($post_layout == 'default') :
	$post_layout = $neder_theme['neder_panel_post_layout']; 
 endif;
 $format = '';
 if(has_post_format('Image',$post->ID)) : $format = 'Image'; endif;
 if(has_post_format('Standard',$post->ID)) : $format = 'Standard'; endif;
 if(has_post_format('Video',$post->ID)) : $format = 'Video'; endif;
 if(has_post_format('Audio',$post->ID)) : $format = 'Audio'; endif;
 if(empty($format)) : $format = 'Standard'; endif;
 ?>
 
 <!-- start:loop post -->			
 <?php while ( have_posts() ) : the_post(); ?>
 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if($post_layout == 'neder-post-layout3' && ($format == 'Image' || $format == 'Standard')) : ?>
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

		<?php if($format != 'Image' && $format != 'Standard') : ?>
			<div class="article-info neder-post-title-page">
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
		<?php endif; ?>

		<?php if($post_layout == 'neder-post-layout3' && ($format == 'Video' || $format == 'Audio')) : ?>
			<div class="neder-posts-content-embed-wrap-post-layout-3"> 
				<?php 
					global $wp_embed;
					if($format == 'Video') : 
						$url_embed = get_post_meta( get_the_id(), 'neder-url-video-embed', true );
					else :
						$url_embed = get_post_meta( get_the_id(), 'neder-url-audio-embed', true );
					endif;
					echo $wp_embed->run_shortcode('[embed width="760"]'.$url_embed.'[/embed]');
				?>
			</div>
		<?php endif; ?>
		
        <div class="post-text text-content">                           	
            <?php 
				if($neder_theme['advertisement-content-top'] == 'all' || $neder_theme['advertisement-content-top'] == 'post') :
					echo neder_advertisement_content_top();
				endif;			
			
				the_content(); 
			
				if($neder_theme['advertisement-content'] == 'all' || $neder_theme['advertisement-content'] == 'post') :
					echo neder_advertisement_content();
				endif;
			
				if($neder_theme['neder_panel_post_show_tags'] == true) : 
					$tags_list = get_the_tag_list( '', esc_html__( ', ', 'neder' ) );
					if ( $tags_list ) {
								printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
									esc_html__( 'Tags:', 'neder'),
									$tags_list
								);
					}
				endif;
                
				wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'neder' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '%',
							'separator'   => '<span class="screen-reader-text">, </span>',
				) );   
			?> 			
            <div class="clearfix"></div>
        </div> 
		
		<?php if($neder_theme['neder_panel_post_social_share'] == true) : ?>
 		<div class="social-post">
			<?php echo neder_post_social(); ?>
			<div class="clearfix"></div>
		</div>
		<?php endif; ?>
		
    	<?php 
		if($neder_theme['neder_panel_post_pagination'] == true) :
			echo neder_post_nav(); 
		endif;
		?>

    	<?php 
		if($neder_theme['neder_panel_post_author_bio'] == 'hidden' && get_the_author_meta( 'description' ) != '') :
			get_template_part('elements/author-bio');
		elseif($neder_theme['neder_panel_post_author_bio'] == 'on') :
			get_template_part('elements/author-bio');
		endif;
		?>
        
        <?php
		if($neder_theme['neder_panel_post_related_posts'] == true) :
			get_template_part('elements/related-posts'); 
		endif;
		?>
        
        <?php 
		if(comments_open() || get_comments_number() != 0) :
			comments_template(); 
		endif;	
		?>      

    
    </article>
 <?php endwhile; ?>
 <!-- end:loop post -->