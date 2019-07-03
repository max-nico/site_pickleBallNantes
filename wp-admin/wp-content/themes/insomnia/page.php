<?php get_header(); ?>
    <div class="container content-wrap">
        <div class="row">
            <?php $layout_value = get_theme_mod( 'insomnia_sidebars', 'sidebar-right' ); ?>
             <?php if ($layout_value == 'sidebar-left'): ?>
                <div class="col-lg-9 col-md-9 col col-sm-12 col-xs-12 sidebar-left">
                <?php get_template_part( 'framework/content/page');?>
                </div>
                <?php get_sidebar(); ?>
            <?php elseif ($layout_value == 'sidebar-right'): ?>
                <div class="col-lg-9 col-md-9 col col-sm-12 col-xs-12 sidebar-right">
                <?php get_template_part( 'framework/content/page');?>
                </div>
                <?php get_sidebar(); ?>
            <?php else: ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-sidebar">
                <?php get_template_part( 'framework/content/page');?>
                </div>    
            <?php endif; ?>
        </div>                
    </div>
<?php get_footer(); ?>
