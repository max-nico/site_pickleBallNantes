<?php if(get_theme_mod('insomnia_menu_top_bar','enable') == true)  { ?>
<div class="top_block">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-7 col-sm-7 col-xs-12 pull-left">
              <div class="contant-top-block">
                <ul class="contact-top">
                  <?php if(get_theme_mod('insomnia_top_adress','enable') == true) {?><li><i class="pe-7s-home"></i> <?php echo get_theme_mod('insomnia_top_adress','455 Martinson, Los Angeles') ?></li><?php }; ?>
                  <?php if(get_theme_mod('insomnia_top_mobile','enable') == true) {?><li><i class="pe-7s-phone"></i> <?php echo get_theme_mod('insomnia_top_mobile','8 (043) 567 - 89 - 30') ?></li><?php }; ?>
                  <?php if(get_theme_mod('insomnia_top_email','enable') == true) {?><li><i class="pe-7s-mail"></i> <?php echo get_theme_mod('insomnia_top_email','support@email.com') ?></li><?php }; ?>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12 pull-right">
              <ul class="social-links-style7">
                  <?php if(get_theme_mod('insomnia_menu_soc_style7_twitter','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_style7_twitter','http://twitter.com'))) ?>"><i class="ti-twitter"></i></a></li><?php }; ?> 
                  <?php if(get_theme_mod('insomnia_menu_soc_style7_tumblr','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_style7_tumblr','http://tumblr.com'))) ?>"><i class="ti-tumblr"></i></a></li><?php }; ?> 
                  <?php if(get_theme_mod('insomnia_menu_soc_style7_dropbox','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_style7_dropbox','http://dropbox.com'))) ?>"><i class="ti-dropbox"></i></a></li><?php }; ?> 
                  <?php if(get_theme_mod('insomnia_menu_soc_style7_dribbble','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_style7_dribbble','http://dribbble.com'))) ?>"><i class="ti-dribbble"></i></a></li><?php }; ?> 
                  <?php if(get_theme_mod('insomnia_menu_soc_style7_vimeo','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_style7_vimeo','http://vimeo.com'))) ?>"><i class="ti-vimeo"></i></a></li><?php }; ?> 
                  <?php if(get_theme_mod('insomnia_menu_soc_style7_instagram','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_style7_instagram','http://instagram.com'))) ?>"><i class="ti-instagram"></i></a></li><?php }; ?>                    
              </ul>
            </div>
          </div>
        </div>
      </div>
<?php }; ?> 
<div class="container style5">
  <div class="row">
    <?php if(get_theme_mod('insomnia_menu_widgets','enable') == true)  { ?>
    <div class="logo-banner">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
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
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <?php if ( is_active_sidebar( 'widget-banner' ) ) : ?>
          <div class="banner-area">
            <?php dynamic_sidebar( 'widget-banner' ); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <?php } else  { ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php if(get_theme_mod('insomnia_logo_image', 'enable') == true)  { ?>
          <div class="logo center">
            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo esc_url(get_theme_mod('insomnia_logo_upload', get_template_directory_uri() . '/assets/images/logo.png')); ?>" data-rjs="<?php echo esc_url(get_theme_mod('insomnia_retina_logo_upload',get_template_directory_uri() . '/assets/images/logo@2x.png'));?>" alt="<?php bloginfo( 'name' ) ?>" /> <span><?php echo get_theme_mod('insomnia_logo_text', esc_html__( 'Insomnia', 'insomnia' )); ?></span></a>
          </div>
        <?php } else  { ?>
          <?php if(get_theme_mod('insomnia_logo') == true) { ?>
            <div class="logo center"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_theme_mod('insomnia_logo_text', esc_html__( 'Insomnia', 'insomnia' )); ?></a></div>
          <?php  } ?> 
        <?php } ?>  
    </div>
<?php }; ?> 
  </div>
</div>
<div class="menu-wrapper style5">
  <nav class="navbar navbar-wrap navbar-custom navbar-fixed-top menu-wrap">
    <div class="container">
      <div class="row">
<?php if(get_theme_mod('insomnia_menu_search_menu','enable') == true)  { ?>
        <div class="col-lg-11 col-md-11 col-sm-6 col-xs-6">
            <div class="menu-responsive desktop">
              <div class="collapse navbar-collapse navbar-main-collapse pull-left responsive-menu">
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
        <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 pull-right">
          <div class="search-btn-style7"><span></span></div>
          <div class="search-input-style7" id="search-input">
            <form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" >
                <input type="text" class="focus-input" value="<?php echo get_search_query() ?>" name="s" id="s" />
            </form>
          </div>
        </div>
<?php } else  { ?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="menu-responsive desktop">
              <div class="collapse navbar-collapse navbar-main-collapse pull-left responsive-menu">
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
<?php }; ?> 
      </div>
    </div>
  </nav>
</div>