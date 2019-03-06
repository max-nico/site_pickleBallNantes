<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 global $neder_theme;
 $title_page = get_post_meta( get_the_id(), 'neder-title-page', true );
 if($title_page == '') : $title_page = 'yes'; endif;
 ?>
 
 <!-- start:loop page -->			
 <?php while ( have_posts() ) : the_post(); ?>
 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	
        <!-- Page Features Image --> 
		<?php if(has_post_thumbnail()) : ?> 
         	<div class="post-image">
                	<?php echo neder_thumbs(); ?> 
         	</div>
 		<?php endif; ?>
        
        <!-- Page Title -->
		<?php
		if($title_page == 'yes') : ?>
			<h2 class="neder-title-page-container">
				<span class="neder-title-page"><?php the_title(); ?></span>
			</h2>
		<?php endif; ?>
		
        <!-- Page Content -->                
        <div class="post-text text-content">                  
            <div class="text">
            	<?php 
				if($neder_theme['advertisement-content-top'] == 'all' || $neder_theme['advertisement-content-top'] == 'page') :
					echo neder_advertisement_content_top();
				endif;
				
				the_content(); 
				
				if($neder_theme['advertisement-content'] == 'all' || $neder_theme['advertisement-content'] == 'page') :
					echo neder_advertisement_content();
				endif;
				
				?>                
 			</div>
            <div class="clearfix"></div>
        </div>     
           
 		<?php 
		if(comments_open() || get_comments_number() != 0) :
			comments_template(); 
		endif;
		?>
 	
    </article>
 <?php endwhile; ?>
 <!-- end:loop page -->