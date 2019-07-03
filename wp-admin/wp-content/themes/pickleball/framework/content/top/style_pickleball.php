<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <?php wp_get_nav_menu_items($menu, $value = array());?>
            <?php foreach ($menu as $key => $value):?>
            <!-- <li class="nav-item mx-4 mt-4">
                <a class="nav-link " href="#"><?=$value?></a>
            </li> -->
            <?php wp_nav_menu( array( 
            'theme_location' => 'my-custom-menu', 
            'menu_class' => 'nav-item mx-4 mt-4',
            'sort_column' => 'menu_order' ) );
            /*wp_nav_menu( array(
                        'theme_location' => 'menu',
                        'container' => 'container-fluid',
                        'menu_class' => 'nav navbar-nav',
                        'sort_column' => 'menu_order',
                        'walker' => new Insomnia_My_Walker_Nav_Menu(),
                        'fallback_cb' => 'insomnia_MenuFallback'
                      ));*/?>
            <?php if($key >= sizeof($menu)/2 -1 && $key <= sizeof($menu)/2 - 1): ?>
                <?php if(get_theme_mod('insomnia_logo_image', 'enable') == true) : ?>
                <div class="logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home"><img
                            src="<?php echo esc_url(get_theme_mod('insomnia_logo_upload', get_template_directory_uri() . '/assets/images/logo.png')); ?>"
                            data-rjs="<?php echo esc_url(get_theme_mod('insomnia_retina_logo_upload',get_template_directory_uri() . '/assets/images/logo@2x.png')); ?>"
                            class="logowhite" alt="<?php bloginfo( 'name' ) ?>" />
                        <img src="<?php echo esc_url(get_theme_mod('insomnia_logo_dark_upload', get_template_directory_uri() . '/assets/images/logo.png')); ?>"
                            data-rjs="<?php echo esc_url(get_theme_mod('insomnia_retina_logo_dark_upload',get_template_directory_uri() . '/assets/images/logo@2x.png')); ?>"
                            class="logodark" alt="<?php bloginfo( 'name' ) ?>" />
                        <span><?php echo get_theme_mod('insomnia_logo_text', esc_html__( 'Insomnia', 'insomnia' )); ?></span>
                    </a>
                </div>
                <?php else : ?>
                    <?php if(get_theme_mod('insomnia_logo') == true): ?>
                    <div class="logo"><a
                            href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_theme_mod('insomnia_logo_text', esc_html__( 'Insomnia', 'insomnia' )); ?></a>
                    </div>
                    <?php endif ?>
                <?php endif ?>
            <?php endif ?>
            <?php endforeach ?>
        </ul>
    </div>
    <img class="img-fluid line" src="lines.svg" alt="" srcset="">
</nav>











<!-- // real code -->
<nav class="navbar navbar-expand-lg navbar-light bg-transparent ">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle navbar-left" data-toggle="collapse" data-target="#navbarNav">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      </div>
    
    <!-- <ul class="navbar-nav"> -->
            <!-- <li class="nav-item mx-4 mt-4">
                <a class="nav-link " href="#"><?=$value?></a>
            </li> -->
            <?php wp_nav_menu( array( 
              'theme_location' => 'my-custom-menu',
              'container_class' => 'collapse navbar-collapse justify-content-center',
              'container_id' => 'navbarNav',
              'menu_class' => 'nav navbar-nav'
            ));
            wp_get_nav_menu_items($menu, $value = array());
            
          /*wp_nav_menu( array(
            'theme_location' => 'menu',
            'container' => 'container-fluid',
            'menu_class' => 'nav navbar-nav',
            'sort_column' => 'menu_order',
                'walker' => new Insomnia_My_Walker_Nav_Menu(),
                'fallback_cb' => 'insomnia_MenuFallback'
              ));*/?>
      <!-- </ul> -->
    <!-- <img class="img-fluid line" src="lines.svg" alt="" srcset=""> -->
</nav>
</div>