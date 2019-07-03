<?php
	$post_views = insomnia_get_post_views($post->ID);
    $getAllCats = wp_get_post_categories($post->ID);
	$type_class = '';
	$type_post = '';
	$image_height = '';
    $layout_value = get_theme_mod( 'insomnia_post_type', 'classic' ); 
	if ($layout_value == 'classic'): 
		$type_class = 'standart-post';

	elseif ($layout_value == 'medium'):
		$type_class = 'left-image-post';

	elseif ($layout_value == 'tiles'):
		$type_class = 'tiles-style';

	elseif ($layout_value == 'masonry'):
		$type_class = 'insomnia_mas_item';

	endif;
?>

			<?php if(is_single()) { ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class();?> >

			<?php } else  { ?>

					<?php if( has_post_thumbnail()) { ?>

						<article data-catslug-post="<?php echo implode(' ', $getAllCats) ?>" id="post-<?php the_ID();?>" <?php if($type_class != 'post-set') { echo post_class("post-set $type_class"); } ?>>
					
					<?php } else  { ?>

						<article data-catslug-post="<?php echo implode(' ', $getAllCats) ?>" id="post-<?php the_ID();?>" <?php if($type_class != 'post-set') { echo post_class("post-set no-thumbnail $type_class"); } ?>>

					<?php } ?>

			<?php } ?>


	<?php
		$thumbnail_id = get_post_thumbnail_id($post->ID);
		$image_url = wp_get_attachment_url($thumbnail_id);		
 		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), '');  		
 		$image_height = get_theme_mod( 'insomnia_post_height');

 
 			if(is_single()) { ?>
				<div class="post-content">
					<?php the_content(); ?>
					<?php $defaults = array( 'link_before' => '<span>',	'link_after'  => '</span>','before'   => '<div class="insomnia_pg_single" >',	'after' => '</div>',); wp_link_pages( $defaults );?>
				</div>
					<div class="entry-meta single">
						<ul>
							<li><i class="pe-7s-look"></i> <span><?php echo $post_views; ?></span></li>
							<li><i class="pe-7s-chat"></i> <span><?php comments_number ( 'No Comments', '1', '%' ); ?></span></li>
							<?php if ( has_tag() ) : ?>
								<li><i class="pe-7s-ticket"></i> <span><a href="<?php echo get_tag_link(1); ?>"><?php the_tags(''); ?></a></span></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="social-single">
					<?php $multicheck_value = get_theme_mod( 'insomnia_soc_link', array( 'facebook', 'twitter', 'pinterest', 'tumblr', 'google', 'linkedin') ); ?>
						<?php if ( ! empty( $multicheck_value ) ) : ?>
							<ul class="icon-links">
								<?php foreach ( $multicheck_value as $checked_value ) : ?>
							        <?php if ($checked_value == 'facebook'): ?>
										<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><span class="icon-social-facebook"></span></a></li>
							        <?php elseif ($checked_value == 'twitter'): ?>
										<li><a href="https://twitter.com/home?status=Check out this great post by <?php the_author() ?> <?php the_permalink(); ?>" target="_blank"><span class="icon-social-twitter"></span></a></li>
							        <?php elseif ($checked_value == 'pinterest'): ?>
							        	<li><a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo esc_url($image[0]) ?>&amp;description=<?php echo esc_html(get_the_title()); ?>" target="_blank"><span class="ti-pinterest"></span></a></li>
							        <?php elseif ($checked_value == 'tumblr'): ?>
										<li><a href="http://www.tumblr.com/share/link?url=<?php the_permalink(); ?>" target="_blank"><span class="icon-social-tumblr"></span></a></li>
							        <?php elseif ($checked_value == 'google'): ?>
							        	<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><span class="ti-google"></span></a></li>
							        <?php elseif ($checked_value == 'linkedin'): ?>
							        	<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php echo esc_html(get_the_title()); ?>&summary=&source=" target="_blank"><span class="ti-linkedin"></span></a></li>
							        <?php endif;?>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
			<?php } else { ?>
				<div class="post-thumbnail">
					<div class="post-hover">
						<a href="<?php the_permalink(); ?>" style="background:url(<?php echo esc_url($image[0]) ?>); height: <?php echo $image_height ?>;"></a>
					</div>
				<?php if ( has_post_thumbnail() ) { ?> 	
					<?php $multicheck_value = get_theme_mod( 'insomnia_soc_link', array( 'facebook', 'twitter', 'pinterest' ) ); ?>
						<?php if ( ! empty( $multicheck_value ) ) : ?>
							<ul class="icon-links">
								<?php foreach ( $multicheck_value as $checked_value ) : ?>
							        <?php if ($checked_value == 'facebook'): ?>
										<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><span class="icon-social-facebook"></span></a></li>
							        <?php elseif ($checked_value == 'twitter'): ?>
										<li><a href="https://twitter.com/home?status=Check out this great post by <?php the_author() ?> <?php the_permalink(); ?>" target="_blank"><span class="icon-social-twitter"></span></a></li>
							        <?php elseif ($checked_value == 'pinterest'): ?>
							        	<li><a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo esc_url($image[0]) ?>&amp;description=<?php echo esc_html(get_the_title()); ?>" target="_blank"><span class="ti-pinterest"></span></a></li>
							        <?php elseif ($checked_value == 'tumblr'): ?>
										<li><a href="http://www.tumblr.com/share/link?url=<?php the_permalink(); ?>" target="_blank"><span class="icon-social-tumblr"></span></a></li>
							        <?php elseif ($checked_value == 'google'): ?>
							        	<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><span class="ti-google"></span></a></li>
							        <?php elseif ($checked_value == 'linkedin'): ?>
							        	<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php echo esc_html(get_the_title()); ?>&summary=&source=" target="_blank"><span class="ti-linkedin"></span></a></li>
							        <?php endif;?>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					<?php if(get_theme_mod('insomnia_post_format', 'enable')) : ?><div class="paper-button-wrap"><div class="paper-button btn-next"><i class="pe-7s-photo"></i> <span><?php esc_html_e( "Image", "insomnia" ) ?><span></div></div><?php endif; ?>
				<?php } else { ?>	
					<?php $type_post = '<li><i class="pe-7s-photo"></i> <span>' . esc_html__( "Image", "insomnia" ) . '</span></li>'  ?>
				<?php } ?>
				</div>
				<div class="content-block">
					<h1 class="title">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo esc_html(get_the_title()); ?></a>
					</h1>
					<div class="post-content">
						<?php the_content(); ?>
					</div>
			<?php $multicheck_value = get_theme_mod( 'insomnia_meta', array( 'date', 'views', 'category', 'more' ) ); ?>
			<div class="entry-meta">
				<?php if(!is_single()) { ?>
					<?php if ( ! empty( $multicheck_value ) ) : ?>
						<ul>  
						<?php echo $type_post; ?>
						<?php foreach ( $multicheck_value as $checked_value ) : ?>
					        <?php if ($checked_value == 'author'): ?>
								<li><i class="pe-7s-user"></i> <span><?php the_author() ?></span></li>
					        <?php elseif ($checked_value == 'date'): ?>
								<li><i class="pe-7s-date"></i> <span><?php echo get_the_date('F, j') ?></span></li>
					        <?php elseif ($checked_value == 'views'): ?>
								<li><i class="pe-7s-look"></i> <span><?php echo $post_views; ?></span></li>
					        <?php elseif ($checked_value == 'category'): ?>
								<?php if ( has_category() ) : ?>
									<li><i class="pe-7s-folder"></i> <span><a href="<?php echo get_category_link(1); ?>"><?php the_category(', '); ?></a></span></li>
								<?php endif; ?>
					        <?php elseif ($checked_value == 'comments'): ?>
					            <li><i class="pe-7s-chat"></i> <span><?php comments_number ( 'No Comments', '1', '%' ); ?></span></li>
					        <?php elseif ($checked_value == 'tag'): ?>
								<?php if ( has_tag() ) : ?>
									<li><i class="pe-7s-ticket"></i> <span><a href="<?php echo get_tag_link(1); ?>"><?php the_tags(''); ?></a></span></li>
								<?php endif; ?>
					        <?php elseif ($checked_value == 'more'): ?>
								<li><i class="pe-7s-angle-right-circle"></i> <span><a href="<?php the_permalink() ?>">More</a></span></li>
					        <?php endif;?>
						<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				<?php } ?>
			</div>				
		</div>	
	<?php } ?>			
	<div class="clear"></div>
</article>