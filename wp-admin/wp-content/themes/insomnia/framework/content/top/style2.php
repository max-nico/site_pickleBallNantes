<nav class="navbar navbar-wrap navbar-custom navbar-fixed-top menu-wrap style2">
<div class="container">
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 pull-left">
      <?php if(get_theme_mod('insomnia_logo_image', 'enable') == true)  { ?>
        <div class="logo">
          <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo esc_url(get_theme_mod('insomnia_logo_upload', get_template_directory_uri() . '/assets/images/logo.png')); ?>" data-rjs="<?php echo esc_url(get_theme_mod('insomnia_retina_logo_upload',get_template_directory_uri() . '/assets/images/logo@2x.png')); ?>" class="logowhite" alt="<?php bloginfo( 'name' ) ?>" />
            <img src="<?php echo esc_url(get_theme_mod('insomnia_logo_dark_upload', get_template_directory_uri() . '/assets/images/logo.png')); ?>" data-rjs="<?php echo esc_url(get_theme_mod('insomnia_retina_logo_dark_upload',get_template_directory_uri() . '/assets/images/logo@2x.png')); ?>" class="logodark" alt="<?php bloginfo( 'name' ) ?>" /> <span><?php echo get_theme_mod('insomnia_logo_text', esc_html__( 'Insomnia', 'insomnia' )); ?></span>
          </a>
        </div>
      <?php } else  { ?>
        <?php if(get_theme_mod('insomnia_logo') == true) { ?>
          <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_theme_mod('insomnia_logo_text', esc_html__( 'Insomnia', 'insomnia' )); ?></a></div>
        <?php  } ?> 
      <?php } ?>  
    </div>
    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-6 pull-right">
            <div class="menu-responsive desktop">
              <div class="collapse navbar-collapse navbar-main-collapse responsive-menu">
                      <?php wp_nav_menu( array(
                        'theme_location' => 'menu',
                        'container' => false,
                        'menu_class' => 'nav navbar-nav',
                        'sort_column' => 'menu_order',
                        'walker' => new Insomnia_My_Walker_Nav_Menu(),
                        'fallback_cb' => 'insomnia_MenuFallback'
                      )); ?> 
              </div>
            </div>
            <div class="menu-responsive mobile">
              <div class="burger_insomnia_normal_holder"><a href="#" class="nav-icon3" id="open-button"><span></span><span></span><span></span><span></span><span></span><span></span></a></div>
                <div class="burger_insomnia_menu_overlay_normal">
                  <div class="burger_insomnia_menu_vertical">
                    <?php wp_nav_menu( array(
                      'theme_location' => 'menu',
                      'container' => true,
                      'menu_class' => 'burger_insomnia_main_menu',
                      'depth' => 2,
                    )); ?>
                  </div>
                </div>
            </div>
    </div>
  </div> 
</div>
</nav>
