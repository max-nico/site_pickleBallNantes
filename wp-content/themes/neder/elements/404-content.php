<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 ?>
 
 <!-- start:loop 404 page -->			
 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <!-- Page Title -->
		<h2 class="neder-title-page-container">
			<span class="neder-title-page"><?php printf( esc_html__( '404 - Page Not found', 'neder' ), single_tag_title( '', false ) ); ?></span>
        </h2>	
        
        <!-- Page Content -->                
        <div class="post-text text-content">                  
            <div class="text">
                <div class="not-found">                    
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'neder' ); ?></p>
    
                    <p><?php esc_html_e('You can go to the','neder'); ?> <a href="<?php echo esc_url(get_home_url()); ?>"><?php esc_html_e('Home Page', 'neder'); ?></a></p> 
                </div>
				<?php
				
					$query = array(
							'post_type' 		=> 'post',
							'orderby'			=> 'date',
							'order'				=> 'DESC',				 
							'paged' 			=> $paged,
							'posts_per_page' 	=> 9					
					); 
				?>
				<!-- Page Title -->
				<h2 class="neder-title-page-container">
						<span class="neder-title-page"><?php esc_html_e('Latest Posts','neder'); ?></span>
				</h2>				
				
				<div class="neder-element-posts neder-posts-layout1 neder-blog-3-col element-no-padding">
				<?php 
					$loop = new WP_Query($query);
					$count = 1; 
					if ( $loop ) :
						while ( $loop->have_posts() ) : $loop->the_post(); 
							$link = get_permalink(); 				
				?>
					 <article class="item-posts first-element-posts col-xs-4">
						<div class="article-image">
								<?php if(has_post_thumbnail()) : ?>
									<?php echo neder_thumbs('neder-preview-post'); ?>
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
				<?php if(($count % 3) == 0) : ?> <div class="neder-clear"></div> 
				<?php endif; 
					$count++;
					endwhile; 
				endif;	
				?>  
				
				</div>
 			</div>
        </div>        
 
 	</article>
 <!-- end:loop 404 page -->