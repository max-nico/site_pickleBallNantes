<?php
/*
Templtate name: landing-top
*/
?>

<?php get_header(); ?>
<div class="container content-wrap">
    <div class="row">
        <?php $layout_value = get_theme_mod( 'insomnia_sidebars', 'sidebar-right' ); ?>
        <div class="col-lg-12 col-md-12 col col-sm-12 col-xs-12 sidebar-left">
            <?php get_template_part( 'framework/content/page');?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
