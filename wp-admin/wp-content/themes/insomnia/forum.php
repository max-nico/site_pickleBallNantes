<?php get_header(); ?>
    <?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'wall-portfolio-squre'); ?> 
      <?php if ( has_post_thumbnail() && is_bbpress()) { ?> 
        <div class="tag_line tag_line_image" data-background="<?php echo esc_url($image[0]); ?>">
      <?php } else{ ?> 
    <div class="tag_line none">
      <?php };?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4 class="tag_line_title"><?php the_title() ?></h4>
                    <div class="breadcrumbs"><div class="breadcrumbs_bbp_title"><?php esc_html_e( 'You are here:', 'insomnia' ) ?></div> <?php bbp_breadcrumb(); ?></div>
                </div>
            </div>
        </div>
    </div>
	<div class="container content-wrap">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
				<div class="wrap-content">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>