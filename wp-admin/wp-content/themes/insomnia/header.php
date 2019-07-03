<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php $allowed_html_array = wp_kses_allowed_html( 'post' )?>
  <?php if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {?><link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('insomnia_logo_favicon', get_template_directory_uri() . '/assets/images/favicon.png')); ?>"> <?php };?>
  <?php if(get_theme_mod('insomnia_logo_favicon'))  : ?><link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url(get_theme_mod('insomnia_logo_favicon', get_template_directory_uri() . '/assets/images/favicon.png')); ?>" /><?php endif; ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="preloader"><div id="status"></div></div>
<?php if(get_theme_mod('insomnia_scroll_up','enable') == true)  { ?><a href="#top" class="scroll-top scroll-top-hidden"><i class="fa fa-angle-up"></i></a><?php }; ?>  
<div class="wrapper">
<div class="header">  
<?php
    $insomnia_menu_style = get_theme_mod( 'insomnia_menu_style', 'style8' );
    if ($insomnia_menu_style == 'style1') {
        get_template_part( 'framework/content/top/style1');
    } elseif ($insomnia_menu_style == 'style2') {
        get_template_part( 'framework/content/top/style2');
    } elseif ($insomnia_menu_style == 'style3') {
        get_template_part( 'framework/content/top/style3');
    } elseif ($insomnia_menu_style == 'style4') {
        get_template_part( 'framework/content/top/style4');
    } elseif ($insomnia_menu_style == 'style5') {
        get_template_part( 'framework/content/top/style5');
    } elseif ($insomnia_menu_style == 'style6') {
        get_template_part( 'framework/content/top/style6');
    } elseif ($insomnia_menu_style == 'style7') {
        get_template_part( 'framework/content/top/style7');
    } elseif ($insomnia_menu_style == 'style8') {
        get_template_part( 'framework/content/top/style8');   
    } else {
        get_template_part( 'framework/content/top/style8');
    }
?>
	</div>
<?php if(!is_search()) {?>
<?php if(!is_front_page()) {?>
<?php if(!is_404()) {?>
<?php if(!is_single()) {?>
    <?php $post = get_post($id); $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'wall-portfolio-squre'); ?> 
      <?php if ( has_post_thumbnail() && is_page()) { ?> 
        <div class="tag_line tag_line_image" data-background="<?php echo esc_url($image[0]); ?>">
      <?php } elseif (class_exists( 'bbPress' ) && is_bbpress() ){?> 
    <div class="tag_line forums">
      <?php } elseif (class_exists( 'WooCommerce' ) && is_woocommerce() ){?> 
    <div class="tag_line woo">
      <?php } else {?>
    <div class="tag_line none">
      <?php };?>

      <div class="tag-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php if (is_page()){ ?>
                        <h4 class="tag_line_title"><?php the_title() ?></h4>
                    <?php } elseif (is_blog()) { if(is_archive()){ ?>
                        <h4 class="tag_line_title"><?php single_cat_title() ?></h4>
                    <?php } else {
                        $blog_page_id = get_option('page_for_posts');
                        echo '<h4 class="tag_line_title">'.get_page($blog_page_id)->post_title.'</h4>';};
                    } 
                    if(get_theme_mod('insomnia_breadcrumbs','enable') == true)  {
                      insomnia_breadcrumbs();
                    }; ?>
                </div>
            </div>
        </div>
    </div>
  </div>
  <?php };?>
  <?php };?>
  <?php };?>
<?php } else { ?>
    <div class="tag_line none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h4 class="tag_line_title">
                    <?php printf( wp_kses( __('Search Results for: <span class="colored">%s</span>', 'insomnia'), $allowed_html_array ), get_search_query() ); ?>
                  </h4>
                </div>
            </div>
        </div>
    </div>
<?php };?>
<?php if(get_theme_mod('insomnia_background_grey') == true)  { ?>
  <div class="main-content grey">
<?php } else  { ?>
  <div class="main-content">
<?php }; ?>  