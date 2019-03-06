<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */

 global $neder_theme;
 get_header(); 
  
 $sidebar = $neder_theme['neder_panel_archive_sidebar_position'];
 if(!isset($sidebar) || $sidebar == '') : $sidebar = 'sidebar-right'; endif;
 
 $layout_class = 'blog-layout';
 $layout_type = 'blog-layout';
?>
 
 <!-- start:page section -->
 <section class="neder-container neder-wrap-container neder-page <?php echo esc_html($layout_class); ?> neder-<?php echo esc_html($sidebar); ?> element-no-padding">
 
	 <?php if($sidebar == 'sidebar-none') : ?> 
     <!-- start:sidebar none - full width -->
        <div class="neder-content col-xs-12 post-full-width <?php echo esc_html($layout_type); ?>">
		    <h2 class="neder-title-page-container">
				<span class="neder-title-page"><?php
                        if ( is_day() ) :
                            printf( esc_html__( 'Daily Archives: %s', 'neder' ), get_the_date() );
                        elseif ( is_month() ) :
                            printf( esc_html__( 'Monthly Archives: %s', 'neder' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'neder' ) ) );
                        elseif ( is_year() ) :
                            printf( esc_html__( 'Yearly Archives: %s', 'neder' ), get_the_date( _x( 'Y', 'yearly archives date format', 'neder' ) ) );
                        elseif ( has_post_format('image') ) :
							esc_html_e( 'Format Image', 'neder' );
                        elseif ( has_post_format('video') ) :
							esc_html_e( 'Format Video', 'neder' );
                        elseif ( has_post_format('audio') ) :
							esc_html_e( 'Format Audio', 'neder' );
                        elseif ( has_post_format('gallery') ) :
							esc_html_e( 'Format Gallery', 'neder' );
                        elseif ( has_post_format('quote') ) :
							esc_html_e( 'Format Quote', 'neder' );
                        elseif ( has_post_format('link') ) :
							esc_html_e( 'Format Link', 'neder' );																																										
						else :
                            esc_html_e( 'Archives', 'neder' );
                        endif;
                    ?></span>
            </h2>
            <!-- start:page content -->
            <?php get_template_part('elements/loop-general'); ?>
            <!-- end:page content -->	
        </div>
     <!-- end:sidebar none - full width -->
     <?php endif; ?>
 
	 <?php if($sidebar == 'sidebar-left') : ?> 
     <!-- start:sidebar left -->
        <?php get_template_part('sidebar'); ?> 
        <div class="neder-content col-xs-9 <?php echo esc_html($layout_type); ?>"> 
		    <h2 class="neder-title-page-container">
				<span class="neder-title-page"><?php
                        if ( is_day() ) :
                            printf( esc_html__( 'Daily Archives: %s', 'neder' ), get_the_date() );
                        elseif ( is_month() ) :
                            printf( esc_html__( 'Monthly Archives: %s', 'neder' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'neder' ) ) );
                        elseif ( is_year() ) :
                            printf( esc_html__( 'Yearly Archives: %s', 'neder' ), get_the_date( _x( 'Y', 'yearly archives date format', 'neder' ) ) );
                        elseif ( has_post_format('image') ) :
							esc_html_e( 'Format Image', 'neder' );
                        elseif ( has_post_format('video') ) :
							esc_html_e( 'Format Video', 'neder' );
                        elseif ( has_post_format('audio') ) :
							esc_html_e( 'Format Audio', 'neder' );
                        elseif ( has_post_format('gallery') ) :
							esc_html_e( 'Format Gallery', 'neder' );
                        elseif ( has_post_format('quote') ) :
							esc_html_e( 'Format Quote', 'neder' );
                        elseif ( has_post_format('link') ) :
							esc_html_e( 'Format Link', 'neder' );																																										
						else :
                            esc_html_e( 'Archives', 'neder' );
                        endif;
                    ?></span>
            </h2>
            <!-- start:page content -->
			<?php get_template_part('elements/loop-general'); ?>
            <!-- end:page content --> 
        </div>
     <!-- end:sidebar left -->
     <?php endif; ?>
 


 
	 <?php if($sidebar == 'sidebar-right') : ?>    
     <!-- start:sidebar left -->
        <div class="neder-content col-xs-9 <?php echo esc_html($layout_type); ?>">
		    <h2 class="neder-title-page-container">
				<span class="neder-title-page"><?php
                        if ( is_day() ) :
                            printf( esc_html__( 'Daily Archives: %s', 'neder' ), get_the_date() );
                        elseif ( is_month() ) :
                            printf( esc_html__( 'Monthly Archives: %s', 'neder' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'neder' ) ) );
                        elseif ( is_year() ) :
                            printf( esc_html__( 'Yearly Archives: %s', 'neder' ), get_the_date( _x( 'Y', 'yearly archives date format', 'neder' ) ) );
                        elseif ( has_post_format('image') ) :
							esc_html_e( 'Format Image', 'neder' );
                        elseif ( has_post_format('video') ) :
							esc_html_e( 'Format Video', 'neder' );
                        elseif ( has_post_format('audio') ) :
							esc_html_e( 'Format Audio', 'neder' );
                        elseif ( has_post_format('gallery') ) :
							esc_html_e( 'Format Gallery', 'neder' );
                        elseif ( has_post_format('quote') ) :
							esc_html_e( 'Format Quote', 'neder' );
                        elseif ( has_post_format('link') ) :
							esc_html_e( 'Format Link', 'neder' );																																										
						else :
                            esc_html_e( 'Archives', 'neder' );
                        endif;
                    ?></span>
            </h2>
            <!-- start:page content -->
			<?php get_template_part('elements/loop-general'); ?>
            <!-- end:page content --> 
        </div>    
        <?php get_template_part('sidebar'); ?>
     <!-- end:sidebar left -->
     <?php endif; ?>
     
 	<div class="clearfix"></div>
 </section>
 <!-- end:page section -->
 
 
 <?php get_footer(); ?>