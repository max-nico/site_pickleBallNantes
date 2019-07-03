<nav class="navbar navbar-wrap navbar-custom navbar-fixed-top menu-wrap style6">
<div class="burger-menu style6">
  <div id="nav-container" class="nav-container">
    <div class="sticky-nav">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-left">
            <div class="burger_insomnia_normal_holder"><a href="#" class="nav-icon3" id="open-button"><span></span><span></span><span></span><span></span><span></span><span></span></a> <i>Menu</i></div>
              <div class="burger_insomnia_menu_overlay_normal">
                <div class="burger_insomnia_menu_vertical">
                  <?php wp_nav_menu( array(
                    'theme_location' => 'menu',
                    'container' => true,
                    'menu_class' => 'burger_insomnia_main_menu',
                  )); ?>
                </div>
              </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
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
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <div class="pull-right">
                <div class="search-icon-header">
                  <a href="#"><i class="icon-magnifier"></i></a>
                  <div class="black-search-block">
                    <div class="black-search-table">
                      <div class="black-search-table-cell">
                        <div>
                          <form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" >
                            <input type="text" autofocus placeholder="Some keywords..." value="<?php echo get_search_query() ?>" name="s" id="s" />
                            <input type="submit" id="searchsubmit" value="" />
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="close-black-block"><a href="#"><i class="pe-7s-close"></i></a></div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div> 
    </div>
  </div>
</div>

