<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 global $post;
 global $neder_theme;
 $title_page = get_post_meta( get_the_id(), 'neder-title-page', true );
 if($title_page == '') : $title_page = 'no'; endif;
 
 $blog_type 	= get_post_meta($post->ID, "neder-blog-posts-type", true);
 $blog_layout	= get_post_meta($post->ID, "neder-blog-posts-layout", true);
 
 $columns 		= get_post_meta($post->ID, "neder-blog-columns", true);  
 if($columns == '1') : $columns_class = 'col-xs-12'; $container_class = 'neder-blog-1-col'; endif;
 if($columns == '2') : $columns_class = 'col-xs-6'; $container_class = 'neder-blog-2-col'; endif;
 if($columns == '3') : $columns_class = 'col-xs-4'; $container_class = 'neder-blog-3-col'; endif;
 if($columns == '4') : $columns_class = 'col-xs-3'; $container_class = 'neder-blog-4-col'; endif;
 
 $category 		= get_post_meta($post->ID, "neder-category", true);
 $orderby 		= get_post_meta($post->ID, "neder-orderby", true);
 $orderdir 		= get_post_meta($post->ID, "neder-orderdir", true);
 $num_posts		= get_post_meta($post->ID, "neder-num-posts", true);
 
 $pagination 	= get_post_meta($post->ID, "neder-pagination", true);
 
 if($category 	== '') 		: $category 	= ''; 		endif;
 if($orderby 	== 'none') 	: $orderby 		= 'none'; 	endif;
 if($orderdir 	== 'DESC') 	: $orderdir 	= 'DESC'; 	endif;
 if($pagination == '') 		: $pagination 	= 'yes'; 	endif;

 # Pagination value
 if ( get_query_var('paged') ) {	
		$paged = get_query_var('paged');	
 } elseif ( get_query_var('page') ) {	
		$paged = get_query_var('page');	
 } else {	
		$paged = 1;	
 }

 # WP Query
 if($orderby == 'meta_value_num') :

	 $query = array(
					'post_type' 		=> 'post', 
					'cat' 				=> $category,
					'orderby'			=> $orderby,
					'order'				=> $orderdir,
					'meta_key' 			=> 'wpb_post_neder_views_count', 
					'paged' 			=> $paged,
					'posts_per_page' 	=> $num_posts					
				); 
 
 else :

	 $query = array(
					'post_type' 		=> 'post', 
					'cat' 				=> $category,
					'orderby'			=> $orderby,
					'order'				=> $orderdir,				 
					'paged' 			=> $paged,
					'posts_per_page' 	=> $num_posts					
				); 
 
 endif;
 
 $class_load_more = '';
 $class_item_load_more = '';
 if($pagination == 'load-more') :
	$class_load_more = 'neder-load-more';
	$class_item_load_more = 'neder-item-load-more';	
 endif;
 
 $class_item_masonry = '';
 if($blog_type == 'masonry') :
	$class_item_masonry = 'neder-element-posts-masonry';
	wp_enqueue_script( 'masonry' );
 endif; ?>

<!-- Page Title -->
<?php if($title_page == 'yes') : ?>
	<h2 class="neder-title-page-container">
		<span class="neder-title-page"><?php the_title(); ?></span>
	</h2>
<?php endif; ?>
		
<div class="neder-element-posts <?php echo esc_html($class_item_masonry); ?> <?php echo esc_html($class_load_more); ?> <?php echo esc_html($blog_layout); ?> <?php echo esc_html($container_class); ?> element-no-padding">

<?php 
 $readtext 		= esc_html__('Read More','neder');
 $loading 		= esc_html__('Loading posts...','neder');
 $nomoreposts 	= esc_html__('No more posts to load.','neder');
 
 $loop = new WP_Query($query);

 // Lazy LOAD
 if($pagination == 'load-more') : 
			wp_enqueue_script(
				'neder-load-posts',
				NEDER_JS_URL . 'load-posts.js',
				array('jquery'),
				'1.0',
				true
			);		
					
			$max = $loop->max_num_pages;
			$paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
			
			// Add some parameters for the JS.
			wp_localize_script(
				'neder-load-posts',
				'neder_ndwp_',
				array(
					'startPage' => $paged,
					'maxPages' => $max,
					'nextLink' => next_posts($max, false),
					'readtext'		=> $readtext,
					'loading'		=> $loading,
					'nomoreposts'	=> $nomoreposts
				)
			);
 endif; 
 
 $count = 1; 
 if ( $loop ) :
 while ( $loop->have_posts() ) : $loop->the_post(); 
 $link = get_permalink(); 
 ?>
 
 <?php if($blog_layout == 'neder-posts-layout1') :?>
 
	 <article class="item-posts first-element-posts <?php echo esc_html($columns_class); ?> <?php echo esc_html($class_item_load_more); ?>">
		<div class="article-image">
				<?php echo neder_thumbs('neder-preview-post'); ?>
				<?php echo neder_check_format(); ?>
			<div class="article-category"><?php echo neder_category(1); ?></div>
			<div class="article-info-top">
				<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
				<div class="article-separator">|</div>
				<div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
				<div class="neder-clear"></div>
			</div>		
		</div>
		<div class="article-info">
			<div class="article-info-bottom">
				<h3 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h3>
				<div class="neder-clear"></div>	
			</div>
		</div>
	 </article>
 
 <?php elseif($blog_layout == 'neder-posts-layout2') : ?>
 
	<article class="item-posts first-element-posts <?php echo esc_html($columns_class); ?> <?php echo esc_html($class_item_load_more); ?>">
		<div class="article-image">
			<?php echo neder_thumbs('neder-preview-post'); ?>
			<?php echo neder_check_format(); ?>
			<div class="article-category"><?php echo neder_category(1); ?></div>
			<div class="article-info-top">
				<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
				<div class="article-separator">|</div>
				<div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
				<div class="neder-clear"></div>
			</div>			
		</div>
		<div class="article-info">
			<div class="article-info-bottom">	
				<h3 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h3>
				<div class="neder-clear"></div>	
			</div>
		</div>
	</article>
 
 <?php elseif($blog_layout == 'neder-posts-layout3') : ?>

	<article class="item-posts first-element-posts <?php echo esc_html($columns_class); ?> <?php echo esc_html($class_item_load_more); ?>">
		<div class="article-image">
			<?php echo neder_thumbs('neder-preview-post'); ?>
			<?php echo neder_check_format(); ?>
			<div class="article-category"><?php echo neder_category(1); ?></div>
			<div class="article-info-top">
				<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
				<div class="article-separator">|</div>
				<div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
					<div class="neder-clear"></div>
			</div>			
		</div>
		<div class="article-info">
			<div class="article-info-bottom">		
				<h3 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h3>
				<p class="article-excerpt"><?php echo neder_ndwp_excerpt(150); ?></p>
				<div class="neder-clear"></div>	
			</div>
		</div>
	</article>	 
 
 <?php elseif($blog_layout == 'neder-posts-layout4') : ?>
 
 	<article class="item-posts first-element-posts <?php echo esc_html($columns_class); ?> <?php echo esc_html($class_item_load_more); ?>">
		<div class="article-image col-xs-4">
			<?php echo neder_thumbs('neder-preview-post'); ?>
			<?php echo neder_check_format(); ?>
			<div class="article-category"><?php echo neder_category(1); ?></div>
		</div>
		<div class="article-info col-xs-8">
			<div class="article-info-top">
				<h3 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h3>
				<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
					<div class="neder-clear"></div>
			</div>
		</div>
	</article>
 
 <?php elseif($blog_layout == 'neder-posts-layout5') : ?>

		<?php if($count <= $columns) : ?>
				
			<article class="item-posts first-element-posts first-row <?php echo esc_html($columns_class); ?> <?php echo esc_html($class_item_load_more); ?>">
				<div class="article-image">
					<?php 
						if($columns != 3) :
							echo neder_vc_thumbs('neder-vc-blog-medium');
								else :
							echo neder_vc_thumbs('neder-vc-header-medium');							
						endif; 
					?>
					<?php echo neder_check_format(); ?>
					<div class="article-category"><?php echo neder_category(1); ?></div>
					<div class="article-info-top">
						<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
								<div class="article-separator">|</div>
								<div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
								<div class="neder-clear"></div>
					</div>					
				</div>
				<div class="article-info">
					<div class="article-info-bottom">	
						<h3 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h3>
						<p class="article-excerpt">
						<?php 
							if($columns != 1) :
								echo neder_ndwp_excerpt(150);
							else :
								echo neder_ndwp_excerpt(350);						
							endif;
						?>
						<div class="neder-clear"></div>
					</div>
				</div>
			</article>

		<?php else : ?>
			
			<?php $class_other_rows = ''; if($count >= $columns) : $class_other_rows = 'other-rows'; endif; ?>
			
			<article class="item-posts first-element-posts <?php echo esc_html($class_other_rows); ?> <?php echo esc_html($columns_class); ?> <?php echo esc_html($class_item_load_more); ?>">
				<div class="article-image col-xs-5">
					<?php
						if($columns != 1) :
							echo neder_vc_thumbs('neder-vc-header-small');
						else :
							echo neder_vc_thumbs('neder-vc-header-medium');							
						endif;
					?>
					<?php echo neder_check_format(); ?>
					<div class="article-category"><?php echo neder_category(1); ?></div>
				</div>
				<div class="article-info col-xs-7">
					<div class="article-info-top">
						<h3 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h3>
						<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
						<?php				
							if($columns == 1) :
								echo '<div class="neder-clear"></div><p class="article-excerpt">' . neder_ndwp_excerpt(150) . '</p>';
							endif;
						?>
						<div class="neder-clear"></div>
					</div>
				</div>
			</article>				
										
		<?php endif; ?>				 
 
 <?php endif; ?>
 
 <?php if(($count % $columns) == 0 && $blog_type != 'masonry') : ?> <div class="neder-clear"></div> <?php endif; ?>
 
<?php 
 $count++;
 endwhile; 
 ?>  
 
 <div class="neder-clear"></div>
 <?php if($blog_type == 'masonry') : ?> </div> <?php endif; ?>
 <?php
 # start:pagination active
 if($pagination == 'yes') :
	 echo '<div class="neder-clear"></div><div class="neder-pagination">';
	 # start:pagination
	 if($neder_theme['pagination'] == 'standard') :
		echo '<div class="neder-pagination-normal">';
						echo get_next_posts_link( 'Older posts', $loop->max_num_pages );
						echo get_previous_posts_link( 'Newer posts' );
		echo '</div>';
	 else :
		echo neder_posts_numeric_pagination($pages = '', $range = 2,$loop,$paged);
	 endif;
	 # end:pagination
	 echo '<div class="neder-clear"></div></div>';	 
 endif; 
 # end:pagination active
 
 
 endif; 
 
 wp_reset_query();
?>
<?php if($blog_type != 'masonry') : ?> </div> <?php endif; ?>