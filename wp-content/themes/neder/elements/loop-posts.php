<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 global $post;
 global $neder_theme;
 
 $category = get_the_category(); 
 $category_id = $category[0]->cat_ID;
 $cat_data = get_option("category_$category_id"); 
 
 /* Layout */ 
 $blog_layout = $cat_data['neder_category_layout'];
 
 if($blog_layout == '' || $blog_layout == 'default') : 
	$blog_layout = $neder_theme['neder_panel_category_layout'];
	if(!isset($blog_layout) || $blog_layout == '') : $blog_layout = 'neder-posts-layout1'; endif; 
 endif;

 /* Columns */
 $columns = $cat_data['neder_category_columns'];
 if($columns == '' || $columns == 'default') : 
	$columns = $neder_theme['neder_panel_category_columns'];
	if(!isset($columns) || $columns == '') : $columns = '2'; endif; 
 endif; 

 if($columns == '1') : $columns_class = 'col-xs-12'; $container_class = 'neder-blog-1-col'; endif;
 if($columns == '2') : $columns_class = 'col-xs-6'; $container_class = 'neder-blog-2-col'; endif;
 if($columns == '3') : $columns_class = 'col-xs-4'; $container_class = 'neder-blog-3-col'; endif;
 if($columns == '4') : $columns_class = 'col-xs-3'; $container_class = 'neder-blog-4-col'; endif; 
 
 /* Layout Type */
 $blog_type = $cat_data['neder_category_layout_type'];
 
 if($blog_type == '' || $blog_type == 'default') : 
	$blog_type = $neder_theme['neder_panel_category_layout_type'];
	if(!isset($blog_type) || $blog_type == '') : $blog_type = 'grid'; endif; 
 endif; 
 
 # Pagination value
 if ( get_query_var('paged') ) {	
		$paged = get_query_var('paged');	
 } elseif ( get_query_var('page') ) {	
		$paged = get_query_var('page');	
 } else {	
		$paged = 1;	
 }
 
 $class_load_more = '';
 
 $class_item_masonry = '';
 if($blog_type == 'masonry') :
	$class_item_masonry = 'neder-element-posts-masonry';
	wp_enqueue_script( 'masonry' );
 endif; ?>
 
<div class="neder-element-posts <?php echo esc_html($class_item_masonry); ?> <?php echo esc_html($class_load_more); ?> <?php echo esc_html($blog_layout); ?> <?php echo esc_html($container_class); ?> element-no-padding">
 <?php 
 $count = 1; 
 if ( have_posts() ) :
 while ( have_posts() ) : the_post(); 
 $link = get_permalink();
 ?> 
 
  <?php if($blog_layout == 'neder-posts-layout1') :?>
 
	 <article class="item-posts first-element-posts <?php echo esc_html($columns_class); ?>">
		<div class="article-image">
			<?php if(has_post_thumbnail()) : ?>
				<?php echo neder_thumbs('neder-preview-post'); ?>
				<?php echo neder_check_format(); ?>	
				<div class="article-category"><?php echo neder_category(1); ?></div>
			<?php endif; ?>	
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
 
	<article class="item-posts first-element-posts <?php echo esc_html($columns_class); ?>">
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

	<article class="item-posts first-element-posts <?php echo esc_html($columns_class); ?>">
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
 
 	<article class="item-posts first-element-posts <?php echo esc_html($columns_class); ?>">
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
				
			<article class="item-posts first-element-posts first-row <?php echo esc_html($columns_class); ?>">
				<div class="article-image">
					<?php echo neder_thumbs('neder-preview-post'); ?>
					<?php echo neder_check_format(); ?>
						<div class="article-category"><?php echo neder_category(1); ?></div>
				</div>
				<div class="article-info">
					<div class="article-info-top">
						<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
								<div class="article-separator">|</div>
								<div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
								<div class="neder-clear"></div>
					</div>
					<div class="article-info-bottom">	
						<h3 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h3>
						<p class="article-excerpt"><?php echo neder_ndwp_excerpt(150); ?></p>
						<div class="neder-clear"></div>
					</div>
				</div>
			</article>

		<?php else : ?>
			
			<?php $class_other_rows = ''; if($count <= ($columns * 2)) : $class_other_rows = 'other-rows'; endif; ?>
			
			<article class="item-posts first-element-posts <?php echo esc_html($class_other_rows); ?> <?php echo esc_html($columns_class); ?>">
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
 $pagination = 'yes';
 # start:pagination active
 if($pagination == 'yes') :
	 echo '<div class="neder-clear"></div><div class="neder-pagination">';
	 # start:pagination
	 if($neder_theme['pagination'] == 'standard') :
		echo '<div class="neder-pagination-normal">';
						echo get_next_posts_link( 'Older posts', $wp_query->max_num_pages );
						echo get_previous_posts_link( 'Newer posts' );
		echo '</div>';
	 else :
		echo neder_posts_numeric_pagination($pages = '', $range = 2,$wp_query,$paged);
	 endif;
	 # end:pagination
	 echo '<div class="neder-clear"></div></div>';	 
 endif; 
 # end:pagination active
 
 
 endif; 
 
 wp_reset_query();
?>
<?php if($blog_type != 'masonry') : ?> </div> <?php endif; ?>