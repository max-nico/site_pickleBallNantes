<div class="top_block">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-7 col-sm-7 col-xs-12 pull-left">
              <div class="contant-top-block">
                <ul class="contact-top">
                  <?php if(get_theme_mod('insomnia_top_adress_2','enable') == true) {?><li><i class="pe-7s-home"></i> <?php echo get_theme_mod('insomnia_top_adress_2','455 Martinson, Los Angeles') ?></li><?php }; ?>
                  <?php if(get_theme_mod('insomnia_top_mobile_2','enable') == true) {?><li><i class="pe-7s-phone"></i> <?php echo get_theme_mod('insomnia_top_mobile_2','8 (043) 567 - 89 - 30') ?></li><?php }; ?>
                  <?php if(get_theme_mod('insomnia_top_email_2','enable') == true) {?><li><i class="pe-7s-mail"></i> <?php echo get_theme_mod('insomnia_top_email_2','support@email.com') ?></li><?php }; ?>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12 pull-right">
              <ul class="social-links-style7">
                  <?php if(get_theme_mod('insomnia_menu_soc_style8_twitter','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_style8_twitter','http://twitter.com'))) ?>"><i class="ti-twitter"></i></a></li><?php }; ?> 
                  <?php if(get_theme_mod('insomnia_menu_soc_style8_tumblr','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_style8_tumblr','http://tumblr.com'))) ?>"><i class="ti-tumblr"></i></a></li><?php }; ?> 
                  <?php if(get_theme_mod('insomnia_menu_soc_style8_dropbox','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_style8_dropbox','http://dropbox.com'))) ?>"><i class="ti-dropbox"></i></a></li><?php }; ?> 
                  <?php if(get_theme_mod('insomnia_menu_soc_style8_dribbble','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_style8_dribbble','http://dribbble.com'))) ?>"><i class="ti-dribbble"></i></a></li><?php }; ?> 
                  <?php if(get_theme_mod('insomnia_menu_soc_style8_vimeo','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_style8_vimeo','http://vimeo.com'))) ?>"><i class="ti-vimeo"></i></a></li><?php }; ?> 
                  <?php if(get_theme_mod('insomnia_menu_soc_style8_instagram','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_style8_instagram','http://instagram.com'))) ?>"><i class="ti-instagram"></i></a></li><?php }; ?>                    
              </ul>
            </div>
          </div>
        </div>
      </div>
<div class="menu-wrapper style8">
  <nav class="navbar navbar-wrap navbar-custom navbar-fixed-top menu-wrap">
    <div class="container">
      <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-9 pull-left">
              <?php if(get_theme_mod('insomnia_logo_image', 'enable') == true)  { ?>
                <div class="logo center">
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
            <div class="col-lg-9 col-md-9 col-sm-6 col-xs-3">
            <div class="menu-responsive desktop">
              <div class="collapse navbar-collapse navbar-main-collapse pull-right responsive-menu">
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
            <div class="menu-responsive mobile pull-right">
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
</div>