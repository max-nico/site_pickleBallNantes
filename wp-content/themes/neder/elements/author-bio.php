<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 global $neder_theme;
?>

 <!-- start:author bio -->
 <div class="author-post-container">
	<div class="author-post">
           <div class="author-image">
                <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'adt_author_bio_avatar_size', 100 ) ); ?>
           </div>
		   <div class="author-info">
				<span class="author-name"><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php printf( esc_html__( '%s', 'neder' ), get_the_author() ); ?></a></span>
				<span class="author-description"><?php the_author_meta( 'description' ); ?></span>
                <span class="author-social">  
                
                	<?php if(get_the_author_meta( 'facebook_profile' ) != '') : ?>					
						<a href="<?php echo get_the_author_meta( 'facebook_profile' ); ?>"><i class="nedericon fa-facebook"></i></a>                   
					<?php endif; ?>
                    
                	<?php if(get_the_author_meta( 'twitter_profile' ) != '') : ?>					
						<a href="<?php echo get_the_author_meta( 'twitter_profile' ); ?>"><i class="nedericon fa-twitter"></i></a>                   
					<?php endif; ?>                    
                    
                	<?php if(get_the_author_meta( 'google_plus_profile' ) != '') : ?>					
						<a href="<?php echo get_the_author_meta( 'google_plus_profile' ); ?>"><i class="nedericon fa-google-plus"></i></a>                   
					<?php endif; ?>                    
                    
                	<?php if(get_the_author_meta( 'vimeo_profile' ) != '') : ?>					
						<a href="<?php echo get_the_author_meta( 'vimeo_profile' ); ?>"><i class="nedericon fa-vimeo"></i></a>                   
					<?php endif; ?>                    

                	<?php if(get_the_author_meta( 'linkedin_profile' ) != '') : ?>					
						<a href="<?php echo get_the_author_meta( 'linkedin_profile' ); ?>"><i class="nedericon fa-linkedin"></i></a>                   
					<?php endif; ?>
                     
				</span>
		   </div>
    <div class="clearfix"></div>
    </div>
 </div>
 <!-- end:author bio -->