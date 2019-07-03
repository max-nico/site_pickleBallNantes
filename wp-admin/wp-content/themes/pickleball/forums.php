<?php get_header(); ?>
        <div class="container">
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4 class="tag_line_title"><?php/* the_title() ?></h4>
                    <div class="breadcrumbs"><div class="breadcrumbs_bbp_title"><?php esc_html_e( 'Vous êtes ici :', 'insomnia' ) ?></div> <?php bbp_breadcrumb(); */?></div>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part( 'framework/content/forums/forums-header2'); ?>
	<div class="container content-wrap">
		<div class="row-fluid">
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

			