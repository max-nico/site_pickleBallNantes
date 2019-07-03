<?php get_header(); ?>
    <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container-full learning">
        <div class="row">
            <?php the_content(); ?>
            <a href="<?php get_permalink($post, $leavename) ?>" class="btn-danger btn-e-learning">e-learning</a>
        </div>
        <?php endwhile; endif; ?>
    </div>              
<?php get_footer(); ?>
