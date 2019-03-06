<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */
 global $neder_theme;
 ?>

 <div id="neder_slidepanel" class="neder-sidebar neder_slidepanel_hidden-style neder_slidepanel_<?php echo esc_html($neder_theme['slide_panel_position']); ?>">
	<div id="neder_slidepanel_container">
	<?php
 		if ( is_active_sidebar( esc_html($neder_theme['slide_panel_sidebar']) ) ) {
			
			$checkWidget = wp_get_sidebars_widgets();
			if (!empty($checkWidget[esc_html($neder_theme['slide_panel_sidebar'])])) {               
				dynamic_sidebar(esc_html($neder_theme['slide_panel_sidebar']));                
			}
			
		}
	?>
	</div>
	<div class="box-title">
    
		<div class="style-toggle neder_slidepanel_close" style="display:none;">
			<i class="nedericon fa-minus"></i>
		</div>
		<div class="style-toggle neder_slidepanel_open">  
			<i class="nedericon fa-bars"></i>		
		</div> 
   
	</div>
 </div>
 <div class="overlay-body-panel"></div>