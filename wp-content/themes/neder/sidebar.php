<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 global $neder_theme;
 ?>

 <div class="neder-sidebar col-xs-3">
	<?php 
	
		if(is_single()) :
			 $neder_sidebar_name = get_post_meta( get_the_id(), 'neder-sidebar-name', true ); 
			 if(!isset($neder_sidebar_name) || $neder_sidebar_name == '') : $neder_sidebar_name = $neder_theme['neder_panel_post_sidebar_name']; endif; 
			 if($neder_sidebar_name == 'sidebar-default-panel-name') :
				$neder_sidebar_name = $neder_theme['neder_panel_post_sidebar_name']; 
			 endif;	
		else :
			$neder_sidebar_name 	= get_post_meta($post->ID, "neder-sidebar-name", true);
			
			if(!isset($neder_sidebar_name) || $neder_sidebar_name == '') : 
				$neder_sidebar_name = 'neder-default'; 
			else : 
				$neder_sidebar_name 	= get_post_meta($post->ID, "neder-sidebar-name", true);
			endif;
		endif;
		
		if(is_category()) : $neder_sidebar_name = 'neder-default'; endif;
		
		if(is_attachment()) : $neder_sidebar_name = 'neder-default'; endif;
		
		if ( class_exists( 'bbPress' ) ) {
			if(is_bbpress()) {
				$neder_sidebar_name = $neder_theme['neder_bbpress_sidebar_name'];
			}
		}
		
		if ( class_exists( 'BuddyPress' ) ) {
			if(is_buddypress()) {
				$neder_sidebar_name = $neder_theme['neder_buddypress_sidebar_name'];
			}
		}		
		
		if ( is_active_sidebar( $neder_sidebar_name ) ) {
			
			$checkWidget = wp_get_sidebars_widgets();
			if (!empty($checkWidget[$neder_sidebar_name])) {               
				dynamic_sidebar($neder_sidebar_name);                
			}
			
		} else {
			
			echo '<p>'.esc_html__('This is a Sidebar position. Add your widgets in this position using Default Sidebar or a custom sidebar.','neder').'</p>';
		
		}
    ?>
 </div>