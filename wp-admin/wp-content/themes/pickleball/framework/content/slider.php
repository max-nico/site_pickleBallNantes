<?php

                        if ( get_option('sticky_posts') ) {

                            $st_query_args = array(
                                'post__in'              => get_option('sticky_posts'),
                                'order'                 => 'DESC',
                                'orderby'               => 'date',
                                'paged'                 => 1,
                                'post_status'           => 'publish',
                            );

                            $st_sliderQuery = new WP_Query( $st_query_args ); ?>

                        <div class="loop owl-carousel slider-wrappper">
                            <?php if ($st_sliderQuery->have_posts()) : ?>
                                <?php
                                        while ( $st_sliderQuery->have_posts() ) : $st_sliderQuery->the_post();  
											$post_cats = wp_get_post_categories( $post->ID );

                                            if ($post_cats && count($post_cats) > 0) {                                      
                                                $post_cat  =  $post_cats[0];
                                                $post_cat_name = get_cat_name( $post_cat );
                                                $post_cat_link = get_category_link( $post_cat );
                                            } else {
                                                $post_cat_name = null;
                                                $post_cat_link = null;
                                            }
                                            $post_views   =  insomnia_get_post_views( $post->ID );

                                            // Feat image
                                            if ( has_post_thumbnail() ) {
                                                $st_ID = get_post_thumbnail_id( $post->ID );
                                                $image = wp_get_attachment_image_src( $st_ID, $st_sliderQuery->found_posts == 1 ? 'large' : 'project-medium' );
                                                $image = $image[0];
                                            } else {

                                                $image =  get_template_directory_uri() . '/assets/images/noimage.png';

                                            }

                                            // Compose thumb
                                            $slideBody =
                                                '<div class="post slider-wrap">
                                                    <div class="img-slide"><a href="' . get_permalink() . '" style="background:url('. esc_url($image) .')"></a></div>
                                                    <h4 class="title-slide"><a href="' . get_permalink() . '">' . esc_html(get_the_title()) . '</a></h4>
                                                        <ul class="rsBlock-meta">';
                                                            $slideBody .= '<li><i class="icon-eye"></i> <span><a href="'. get_permalink() .'">'.$post_views.'</a></span></li>';
                                                            if ($post_cat_name && $post_cat_link) {
                                                                $slideBody .= '<li><i class="icon-folder"></i> <span><a href="'. $post_cat_link .'">'. $post_cat_name .'</a></span></li>';
                                                            }
                                                            $slideBody .= '<li><i class="icon-arrow-right"></i> <span><a href="'. get_permalink() .'">More</a></span></li>
                                                        </ul>
                                                    </div>';
                                            echo $slideBody;
                                        endwhile;
                                ?>
                        </div> 
                            <?php endif; } ?>