<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */
 global $neder_theme;
 if(!isset($neder_theme['menu-sticky'])) : $neder_theme['menu-sticky'] = 'menu-sticky'; endif; 
 ?>
 
 <!-- start:menu desktop -->
 <nav class="menu-desktop <?php echo esc_html($neder_theme['menu-sticky']); ?>">
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
			'walker' 		  => new My_Walker_Nav_Menu()
        );
		if ( function_exists( 'wp_nav_menu' ) && has_nav_menu('main-menu') )  {
        	wp_nav_menu( $defaults );
		}
      ?>
 </nav>	
 <!-- end:menu desktop -->