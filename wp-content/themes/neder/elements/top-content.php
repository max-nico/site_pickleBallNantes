<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 
 
 global $post;
 global $neder_theme;
 
 $top_content_layout_style 	= get_post_meta($post->ID, "neder-top-content-layout-style", true);
 $top_content_category 		= get_post_meta($post->ID, "neder-top-content-category", true);
 $top_content_orderby 		= get_post_meta($post->ID, "neder-top-content-orderby", true);
 $top_content_orderdir 		= get_post_meta($post->ID, "neder-top-content-orderdir", true);
 
 if($top_content_layout_style == 'neder-top-content-layout1') : $top_content_num_posts = 4; endif;
 if($top_content_layout_style == 'neder-top-content-layout2') : $top_content_num_posts = 4; endif;
 if($top_content_layout_style == 'neder-top-content-layout3') : $top_content_num_posts = 4; endif;
 if($top_content_layout_style == 'neder-top-content-layout4') : $top_content_num_posts = '';
	/* RTL */	
	if ($neder_theme['rtl']) :  $rtl = 'rtl:true,'; else : $rtl = ''; endif;  
	/* #RTL */
	
	if($neder_theme['neder_lazy_load']) : $lazyLoad = 'lazyLoad:true,'; else : $lazyLoad = ''; endif;
	
 	wp_enqueue_style( 'owl-carousel' );
	wp_enqueue_script( 'owl-carousel-script' );
	
	$script_top_content = 'jQuery(document).ready(function($){
			$(\'.neder-top-content-layout4\').owlCarousel({
				loop:true,
				margin:4,
				nav:true,
				'.$lazyLoad.'
				dots:false,
				autoplay: true,
				autoplayTimeout: 2000,
				smartSpeed: 2000,
				'.$rtl.'
				navText: [\'<i class="nedericon fa-angle-left"></i>\',\'<i class="nedericon fa-angle-right"></i>\'],
				responsive:{
							0:{
								items:1
							},
							480:{
								items:2
							}							
				}
			});
		});';		
	
	wp_add_inline_script( 'owl-carousel-script', $script_top_content );
 endif;
 
 if($top_content_layout_style == 'neder-top-content-layout5') : $top_content_num_posts = 3; endif;
 
 if($top_content_layout_style == 'neder-top-content-layout6') : $top_content_num_posts = 1; endif;

 if($top_content_category == '') :
	$top_content_category = get_terms(
		array( 'category' ), 
		array( 'fields' => 'ids' )
	);
 endif;
 
 
  # WP Query
 if($top_content_orderby == 'meta_value_num') :

	 $top_content_query = array(
					'post_type' 		=> 'post', 
					'cat' 				=> $top_content_category,
					'orderby'			=> $top_content_orderby,
					'order'				=> $top_content_orderdir,
					'meta_key' 			=> 'wpb_post_neder_views_count',
					'posts_per_page' 	=> $top_content_num_posts					
				); 
 
 else :

	 $top_content_query = array(
					'post_type' 		=> 'post', 
					'cat' 				=> $top_content_category,
					'orderby'			=> $top_content_orderby,
					'order'				=> $top_content_orderdir,
					'posts_per_page' 	=> $top_content_num_posts					
				); 
 
 endif;
 
 ?>
 
 <div class="neder-element-top-content <?php echo esc_html($top_content_layout_style); ?> element-no-padding">
 
 <?php
 
 
 $top_content_loop = new WP_Query($top_content_query);
 
 $top_content_count = 0; 
 if ( $top_content_loop ) :
	while ( $top_content_loop->have_posts() ) : $top_content_loop->the_post(); 
	$link = get_permalink(); 
 ?>
 
 <?php if($top_content_layout_style == 'neder-top-content-layout1') :?>
 
 		<?php 
		# First Post
		if($top_content_count == '0') :	?>		
					
			<article class="item-header first-element-header col-xs-7">
				<?php echo neder_thumbs('neder-vc-header'); ?>
				<?php echo neder_check_format(); ?>
				<div class="article-category"><?php echo neder_category(1); ?></div>
				<div class="article-info">
					<div class="article-info-top">
						<h2 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h2>						
						<div class="neder-clear"></div></div>
						<div class="article-info-bottom">
							<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
							<div class="article-separator">|</div><div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
							<div class="neder-clear"></div>
						</div>	
				</div>
				<a href="<?php echo esc_url($link); ?>" class="header-pattern"></a>
			</article>
						
		<?php 
		# Second post
		elseif($top_content_count == '1') : ?>	
		
			<article class="item-header second-element-header col-xs-5">
				<?php echo neder_thumbs('neder-vc-header-medium'); ?>
				<?php echo neder_check_format(); ?>
				<div class="article-category"><?php echo neder_category(1); ?></div>
				<div class="article-info">
					<div class="article-info-top">
						<h2 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h2>						
						<div class="neder-clear"></div>
					</div>
					<div class="article-info-bottom">
						<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
						<div class="article-separator">|</div><div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
						<div class="neder-clear"></div>
					</div>	
				</div>
				<a href="<?php echo esc_url($link); ?>" class="header-pattern"></a>						
			</article>					
				
		<?php else : ?>
				
			<article class="item-header others-element-header col-xs-2">
				<?php echo neder_thumbs('neder-vc-header-small'); ?>
				<?php echo neder_check_format(); ?>
				<div class="article-info">
					<div class="article-info-top">
						<h2 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h2>
						<div class="neder-clear"></div>
					</div>	
				</div>
				<a href="<?php echo esc_url($link); ?>" class="header-pattern"></a>
			</article>					
				
	<?php endif; ?>
 
 
 <?php elseif($top_content_layout_style == 'neder-top-content-layout2') :?>
 
	<?php	
		# First Post
		if($top_content_count == '0') :	?>

			<article class="item-header first-element-header col-xs-12">
				<?php echo neder_thumbs('neder-preview-post'); ?>
				<?php echo neder_check_format(); ?>
				<div class="article-category"><?php echo neder_category(1); ?></div>
				<div class="article-info">
					<div class="article-info-top">
						<h2 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h2>						
						<div class="neder-clear"></div>
					</div>
					<div class="article-info-bottom">
						<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
						<div class="article-separator">|</div><div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
						<div class="neder-clear"></div>
					</div>	
				</div>
				<a href="<?php echo esc_url($link); ?>" class="header-pattern"></a>
			</article>

	<?php	else : ?>
					
			<article class="item-header others-element-header col-xs-4">
				<?php echo neder_thumbs('neder-vc-header'); ?>
				<?php echo neder_check_format(); ?>
				<div class="article-category"><?php echo neder_category(1); ?></div>
				<div class="article-info">
					<div class="article-info-top">
						<h2 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h2>						
						<div class="neder-clear"></div>
					</div>
					<div class="article-info-bottom">
						<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
						<div class="article-separator">|</div><div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
						<div class="neder-clear"></div>
					</div>	
				</div>
				<a href="<?php echo esc_url($link); ?>" class="header-pattern"></a>
			</article>					
					
	<?php endif; ?>
 
 <?php elseif($top_content_layout_style == 'neder-top-content-layout3') :?>

	<?php				
	# First Post
	if($top_content_count == '0') : ?>	

		<article class="item-header first-element-header col-xs-12">
			<?php echo neder_thumbs('neder-preview-post'); ?>
			<?php echo neder_check_format(); ?>
			<div class="article-category"><?php echo neder_category(1); ?></div>
			<div class="article-info">
				<div class="article-info-top">
					<h2 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h2>					
					<div class="neder-clear"></div>
				</div>	
				<div class="article-info-bottom">
					<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
					<div class="article-separator">|</div>
					<div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
					<div class="neder-clear"></div>
				</div>	
			</div>
			<a href="<?php echo esc_url($link); ?>" class="header-pattern"></a>
		</article>

	<?php	else : ?>
					
		<article class="item-header others-element-header col-xs-4">
			<?php echo neder_thumbs('neder-vc-header'); ?>
			<?php echo neder_check_format(); ?>
			<div class="article-info-type3">
				<div class="article-info-top">
					<h2 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h2>					
					<div class="neder-clear"></div>
				</div>	
			</div>
		</article>				
					
	<?php 	endif; ?>
	
	
 <?php elseif($top_content_layout_style == 'neder-top-content-layout4') :?>	
	
		<article class="item-header first-element-header col-xs-12">
			<?php echo neder_thumbs_nll('neder-preview-post'); ?>
			<?php echo neder_check_format(); ?>
			<div class="article-category"><?php echo neder_category(1); ?></div>
			<div class="article-info">
				<div class="article-info-top">
					<h2 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h2>					
					<div class="neder-clear"></div>
				</div>	
				<div class="article-info-bottom">
					<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
					<div class="article-separator">|</div>
					<div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
					<div class="neder-clear"></div>
				</div>	
			</div>
			<a href="<?php echo esc_url($link); ?>" class="header-pattern"></a>
		</article>
		
 <?php elseif($top_content_layout_style == 'neder-top-content-layout5') :?>	
 
	<?php
	# First Post
	if($top_content_count == '0') : ?>		
					
		<article class="item-header first-element-header col-xs-7">
			<?php echo neder_thumbs('neder-vc-header'); ?>
			<?php echo neder_check_format(); ?>
			<div class="article-category"><?php echo neder_category(1); ?></div>
			<div class="article-info">
				<div class="article-info-top">
					<h2 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h2>
					<div class="neder-clear"></div>
				</div>
				<div class="article-info-bottom">
					<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
					<div class="article-separator">|</div><div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
					<div class="neder-clear"></div>
				</div>	
			</div>
			<a href="<?php echo esc_url($link); ?>" class="header-pattern"></a>
		</article>
						
	<?php 
	# Other post
	else : ?>
						
		<article class="item-header second-element-header col-xs-5">
			<?php echo neder_thumbs('neder-vc-header-medium'); ?>
			<?php echo neder_check_format(); ?>
			<div class="article-category"><?php echo neder_category(1); ?></div>
			<div class="article-info">
				<div class="article-info-top">
					<h2 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h2>					
					<div class="neder-clear"></div>
				</div>
				<div class="article-info-bottom">
					<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
					<div class="article-separator">|</div><div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>
					<div class="neder-clear"></div>
				</div>
			</div>
			<a href="<?php echo esc_url($link); ?>" class="header-pattern"></a>						
		</article>			
				
	<?php	endif; ?>
	
 <?php elseif($top_content_layout_style == 'neder-top-content-layout6') :?>	

		<article class="item-header col-xs-12">
			<?php echo neder_thumbs('neder-preview-post'); ?>
			<?php echo neder_check_format(); ?>
			<div class="article-category"><i class="nedericon fa-tag"></i><?php echo neder_category(1); ?></div>
			<div class="article-info">
				<div class="article-info-top">
					<h2 class="article-title"><a href="<?php echo esc_url($link); ?>"><?php echo get_the_title(); ?></a></h2>
					
					<div class="neder-clear"></div>
				</div>
				<div class="article-info-bottom">
					<div class="article-data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></div>
					<div class="article-separator">|</div>
					<div class="article-comments"><i class="nedericon fa-comment-o"></i><?php echo neder_get_num_comments(); ?></div>			
					<div class="neder-clear"></div>
				</div>
			</div>
			<a href="<?php echo esc_url($link); ?>" class="header-pattern"></a>					
		</article>	
 
 <?php endif; ?>
 
 <?php
	$top_content_count++;
	endwhile;
 endif;
 wp_reset_query();
 ?>
 </div>