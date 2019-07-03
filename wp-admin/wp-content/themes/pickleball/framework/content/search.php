<?php $layout_value = get_theme_mod( 'insomnia_post_type' ); ?>

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h3 class="archive-title archive-search"><?php printf( esc_html__( '%s', 'insomnia' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
			</header>
<?php if ($layout_value == 'masonry') {?>
    <div class="wrap-content insomnia_mas_container">
<?php } else { ?>
    <div class="wrap-content">
<?php } ?>


			<?php /* Start the Loop */
				 while ( have_posts() ) :
					the_post();
					get_template_part( 'framework/formats/format', get_post_format() );
			?>
			<?php endwhile; ?>

				</div>
		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="archive-header">
					<h3 class="archive-title archive-search"><?php esc_html_e( 'Nothing Found', 'insomnia' ); ?></h3>
				</header>

				<div class="search-content">
					<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'insomnia' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</article>

		<?php endif; ?>

		
				    <div class="insomnia_pg"><?php insomnia_wp_corenavi(); ?></div>
