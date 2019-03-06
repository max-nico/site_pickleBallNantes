<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */
 ?>
 
 <!-- start:menu responsive -->
 <div class="menu-responsive-container"> 
    <div class="open-menu-responsive"><i class="nedericon fa-navicon"></i></div> 
    <div class="close-menu-responsive"><i class="nedericon fa-remove"></i></div>              
    <div class="menu-responsive">  
     <?php
        // Top Navigation
        $defaults = array(
            'theme_location'  => 'main-menu',
            'container'       => 'ul',
            'container_class' => 'neder-menu',
            'container_id'    => '',
            'fallback_cb'     => 'nav_fallback',
            'menu_class'      => 'neder-menu',
            'menu_id'         => '',
            'echo'            => true,
            'depth'           => 0,
			'walker' 		  => new My_Walker_Nav_Menu_Mobile()
        );
		if ( function_exists( 'wp_nav_menu' ) && has_nav_menu('main-menu') )  {
        	wp_nav_menu( $defaults );
		}
      ?>
 	</div>
 </div>
 <!-- end:menu responsive --> 