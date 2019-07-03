<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full'); ?>
<?php get_header(); $post = get_post($id); $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'wall-portfolio-squre'); ?> 
      <?php if(get_theme_mod('insomnia_single_portfolio_image') == true) { ?> 
            <div class="tag_line tag_line_image portfolio" data-background="<?php echo get_theme_mod('insomnia_single_portfolio_image') ?>">
      <?php } else { ?>
            <div class="tag_line tag_line_image portfolio" data-background="<?php echo esc_url($image[0]); ?>">
      <?php };?>
				<div class="tag-body">
					<div class="container">
		            	<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h4 class="tag_line_title"><?php if(get_theme_mod('insomnia_title_portfolio') == true) { echo get_theme_mod( 'insomnia_title_portfolio'); } else { the_title(); }; ?></h4>
								<?php if(get_theme_mod('insomnia_breadcrumbs','enable') == true)  { insomnia_breadcrumbs();  }; ?>  
							</div>
						</div>
					</div>
				</div>
			</div>
		<div class="content" style="padding-top:80px;">
			<div class="container ">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); do_shortcode(the_content()); ?>
						<div class="insomnia_portfolio_nav">
							<?php previous_post_link('%link', '<i class="fa fa-long-arrow-left"></i>', false); ?> 
							<a href="<?php echo get_theme_mod( 'insomnia_link_portfolio', '#'); ?>" title="To All Works"><i class="fa fa-th-large"></i></a> 
							<?php next_post_link('%link', '<i class="fa fa-long-arrow-right"></i>', false); ?>
				        </div>
						<?php endwhile; endif;?>
			    	</div>
				</div>
			</div>
		</div>
<?php get_footer(); ?>
