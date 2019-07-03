<div class="container style5">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php if(get_theme_mod('insomnia_logo_image', 'enable') == true)  { ?>
        <div class="logo center">
          <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo esc_url(get_theme_mod('insomnia_logo_upload', get_template_directory_uri() . '/assets/images/logo.png')); ?>" data-rjs="<?php echo esc_url(get_theme_mod('insomnia_retina_logo_upload',get_template_directory_uri() . '/assets/images/logo@2x.png')); ?>" class="logowhite" alt="<?php bloginfo( 'name' ) ?>" />
            <img src="<?php echo esc_url(get_theme_mod('insomnia_logo_dark_upload', get_template_directory_uri() . '/assets/images/logo.png')); ?>" data-rjs="<?php echo esc_url(get_theme_mod('insomnia_retina_logo_dark_upload',get_template_directory_uri() . '/assets/images/logo@2x.png')); ?>" class="logodark" alt="<?php bloginfo( 'name' ) ?>" /> <span><?php echo get_theme_mod('insomnia_logo_text', esc_html__( 'Insomnia', 'insomnia' )); ?></span>
          </a>
        </div>
        <?php } else  { ?>
          <?php if(get_theme_mod('insomnia_logo') == true) { ?>
            <div class="logo center"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_theme_mod('insomnia_logo_text', esc_html__( 'Insomnia', 'insomnia' )); ?></a></div>
          <?php  } ?> 
        <?php } ?>  
    </div>
  </div>
</div>
<div class="menu-wrapper style5">
  <nav class="navbar navbar-wrap navbar-custom navbar-fixed-top menu-wrap">
    <div class="container">
      <div class="row">
<?php if(get_theme_mod('insomnia_menu_soc','enable') == true)  { ?>
        <div class="col-lg-9 col-md-9 col-sm-3 col-xs-3 pull-left">
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
            <div class="menu-responsive mobile pull-left">
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
        <div class="col-lg-3 col-md-3 col-sm-9 col-xs-9 pull-right">
            <div class="menu-social-link">
                <ul>
                  <?php if(get_theme_mod('insomnia_menu_soc_facebook','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_facebook','http://facebook.com'))) ?>" title="facebook" target="_blank"><i class="icon-social-facebook"></i></a></li><?php }; ?>
                  <?php if(get_theme_mod('insomnia_menu_soc_twitter','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_twitter','http://twitter.com'))) ?>" title="twitter" target="_blank"><i class="icon-social-twitter"></i></a></li><?php }; ?>
                  <?php if(get_theme_mod('insomnia_menu_soc_dribbble','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_dribbble','http://dribbble.com'))) ?>" title="dribbble" target="_blank"><i class="icon-social-dribbble"></i></a></li><?php }; ?>
                  <?php if(get_theme_mod('insomnia_menu_soc_instagram','enable') == true) {?><li class="instagram"><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_instagram','http://instagram.com'))) ?>" title="instagram" target="_blank"><i class="fa fa-instagram"></i></a></li><?php }; ?>
                  <?php if(get_theme_mod('insomnia_menu_soc_tumblr') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_tumblr'))) ?>" title="tumblr" target="_blank"><i class="icon-social-tumblr"></i></a></li><?php }; ?>
                  <?php if(get_theme_mod('insomnia_menu_soc_youtube') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_youtube'))) ?>" title="youtube-play" target="_blank"><i class="icon-social-youtube"></i></a></li><?php }; ?>
                  <?php if(get_theme_mod('insomnia_menu_soc_behance') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_behance'))) ?>" title="behance" target="_blank"><i class="fa fa-behance"></i></a></li><?php }; ?>
                  <?php if(get_theme_mod('insomnia_menu_soc_googleplus') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_googleplus'))) ?>" title="google-plus" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php }; ?>
                  <?php if(get_theme_mod('insomnia_menu_soc_linkedin') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_linkedin'))) ?>" title="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php }; ?>
                  <?php if(get_theme_mod('insomnia_menu_soc_vk') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_vk'))) ?>" title="vk" target="_blank"><i class="fa fa-vk"></i></a></li><?php }; ?>
                  <?php if(get_theme_mod('insomnia_menu_soc_pinterest') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('insomnia_menu_soc_pinterest'))) ?>" title="pinterest-p" target="_blank"><i class="fa fa-pinterest-p"></i></a></li><?php }; ?>
                </ul>
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
            <div class="menu-responsive mobile  pull-left">
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






















