				<div class="wrap-content">
			<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
			<?php $defaults = array( 'link_before' => '<span>',	'link_after'  => '</span>','before'   => '<div class="insomnia_pg_single" >',	'after' => '</div>',); wp_link_pages( $defaults );?>
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			?>
		
		<?php endwhile; // end of the loop. ?>

				</div>