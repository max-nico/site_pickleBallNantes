<?php $insomnia_dropcap = get_theme_mod( 'insomnia_dropcaps', '1'); ?>
<?php if ($insomnia_dropcap) { ?>
	<style>
		.single .post-content > p:first-child:first-letter {
			font-size: 85px;
			font-weight: 400;
			margin-right: 15px;
			margin-bottom: -7px;
			float: left;
			line-height: 1;
			font-family: serif;}
	</style>
<?php } ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php $post = get_post($id); $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'wall-portfolio-squre'); ?> 
    <?php if ( has_post_thumbnail()) { ?> 
        <div class="tag_line tag_line_image single" data-background="<?php echo esc_url($image[0]); ?>">
    <?php } else{ ?> 
	    <div class="tag_line none">
	<?php };?>
		    <div class="tag-body">
		        <div class="container">
		            <div class="row">
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="tag_line_date"><?php echo get_the_date('F j, Y') ?></div>
		                    <h4 class="tag_line_title"><?php the_title() ?></h4>
		                   	<div class="tag_line_author">by <?php the_author() ?> in <?php if ( has_category() ) : ?><a href="<?php echo get_category_link(1); ?>"><?php the_category(', '); ?></a><?php endif; ?></div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
    </div>    
</div>
<?php endwhile; endif; ?>
<?php $layout_value = get_theme_mod( 'insomnia_single_sidebars', 'sidebar-no' ); ?>
<div class="content">
	<div class="container">
		<div class="row">
             <?php if ($layout_value == 'sidebar-left'): ?>
                 <div class="container margin">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col col-sm-12 col-xs-12 sidebar-left">
							<div class="wrap-content">   
							 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<article id="post" class="single">
									<div class="entry-content">
										<?php get_template_part( 'framework/formats/format', get_post_format() ); ?>
									</div>
									<div class="post-commetns">
										<?php comments_template(); ?>
									</div>	
							<?php endwhile; else: ?>
									<div id="posts" class="single-post blog-page">
										<section>
											<article>
												<p><?php esc_html_e('Sorry, no posts. ', 'insomnia'); ?></p>
											</article>
										</section>
									</div>
									<?php endif; ?>				
								</article>
							</div>
		                </div>
		                <?php get_sidebar(); ?>
                    </div>                
                </div>
            <?php elseif ($layout_value == 'sidebar-right'): ?>
                 <div class="container margin">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col col-sm-12 col-xs-12 sidebar-right">
							<div class="wrap-content">   
							 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<article id="post" class="single">
									<div class="entry-content">
										<?php get_template_part( 'framework/formats/format', get_post_format() ); ?>
									</div>
									<div class="post-commetns">
										<?php comments_template(); ?>
									</div>	
							<?php endwhile; else: ?>
									<div id="posts" class="single-post blog-page">
										<section>
											<article>
												<p><?php esc_html_e('Sorry, no posts. ', 'insomnia'); ?></p>
											</article>
										</section>
									</div>
									<?php endif; ?>				
								</article>
							</div>
		                </div>
		                <?php get_sidebar(); ?>
                    </div>                
                </div>
                <?php else: ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xs-12 no-sidebar margin">
					<div class="wrap-content">    
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<article id="post" class="single">
							<div class="entry-content">
								<?php get_template_part( 'framework/formats/format', get_post_format() ); ?>
							</div>
							<div class="post-commetns">
								<?php comments_template(); ?>
							</div>	
						<?php endwhile; else: ?>
							<div id="posts" class="single-post blog-page">
								<section>
									<article>
										<p><?php esc_html_e('Sorry, no posts. ', 'insomnia'); ?></p>
									</article>
								</section>
							</div>
							<?php endif; ?>				
						</article>
					</div>
				</div>
            <?php endif; ?>
		</div>
	</div>
</div>