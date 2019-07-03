<?php               
    // Template Name: Homepage
?>

<?php get_header();?>
<div class="default_page">
<div>HELLO</div>
    <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <?php the_content();  ?>
            <div class="clearfix"></div>
        </div>
    <?php endwhile; endif; ?>
</div>
<?php  get_footer(); ?>