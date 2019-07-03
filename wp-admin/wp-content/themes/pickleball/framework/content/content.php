<?php $layout_value = get_theme_mod( 'insomnia_post_type' ); ?>
<?php if ($layout_value == 'masonry' || $layout_value == 'tiles' ){ ?>
    <div class="wrap-content insomnia_mas_container">
<?php } else { ?>
    <div class="wrap-content">
<?php } ?>


                                <?php
                                    $get_cats_for_filter = array(
                                        'type'                     => 'post',
                                        'child_of'                 => 0,
                                        'parent'                   => '',
                                        'orderby'                  => 'name',
                                        'order'                    => 'ASC',
                                        'hide_empty'               => 1,
                                        'hierarchical'             => 0,
                                        'exclude'                  => '',
                                        'include'                  => '',
                                        'number'                   => 4,
                                        'taxonomy'                 => 'category',
                                        'pad_counts'               => false 
                                    );
                                    $get_cats_for_filter = get_categories($get_cats_for_filter);
                                ?>


           
                    <?php if ( !is_archive() ) { 

                    if(get_theme_mod( 'insomnia_slider_sticky_ignore') == true) { 

                        $stickies = get_option('sticky_posts');
                        $paged = ( get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;

                        $args = array(
                            'post__not_in' => $stickies,
                            'ignore_sticky_posts' => 1,
                            'cat' => $cat,
                            'paged'          => $paged
                        );
                        query_posts( $args );

            
                    }  else {

                        $paged = ( get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
                        $args = array(
                            'cat' => $cat,
                            'paged'          => $paged
                        );

                        query_posts( $args );

                     };
                };
                    if (!(have_posts())) { ?><h3 class="page_title"><?php esc_html_e('Nothing was found','insomnia')?></h3><?php }   
                    if ( have_posts() ) : while ( have_posts() ) : the_post();?>
                    
                        <?php get_template_part( 'framework/formats/format', get_post_format() );   ?>
            
                    <?php endwhile; endif;?>
                                                
    </div>
    <div class="insomnia_pg"><?php insomnia_wp_corenavi(); ?></div>






