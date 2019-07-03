<?php get_header(); $layout_value_index = get_theme_mod( 'insomnia_post_type' ); ?>
    <?php if ($layout_value_index == 'tiles' || $layout_value_index == 'minimal' ){ ?>
        <div class="container content-wrap">
    <?php } else { ?>
        <div class="container content-wrap">
    <?php } ?>
            <div class="row">
        <?php if(get_theme_mod( 'insomnia_slider_sticky') == true) : ?>
            <div class="col-lg-12 col-md-12 col col-sm-12 col-xs-12">
                <?php get_template_part( 'framework/content/slider');?>
            </div>
        <?php endif; ?>
            <?php $layout_value = get_theme_mod( 'insomnia_sidebars', 'sidebar-right' ); ?>
             <?php if ($layout_value == 'sidebar-left'): ?>
                <div class="col-lg-9 col-md-9 col col-sm-12 col-xs-12 sidebar-left">
                    <?php get_template_part( 'framework/content/content');?>
                </div>
                <?php get_sidebar(); ?>
            <?php elseif ($layout_value == 'sidebar-right'): ?>
                <div class="col-lg-9 col-md-9 col col-sm-12 col-xs-12 sidebar-right">
                    <?php get_template_part( 'framework/content/content');?>
                </div>
                <?php get_sidebar(); ?>
            <?php else: ?>
                <?php if ($layout_value_index == 'masonry' || $layout_value_index == 'tiles') {?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tiles_masonry no-sidebar">
                        <?php get_template_part( 'framework/content/content');?>
                    </div>  
                <?php } else { ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-sidebar">
                        <?php get_template_part( 'framework/content/content');?>
                    </div>  
                <?php } ?>
            <?php endif; ?>
        </div>                
    </div>
<?php get_footer(); ?>

