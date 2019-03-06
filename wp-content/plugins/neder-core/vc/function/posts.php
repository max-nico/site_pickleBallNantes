<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 
 
 class neder_posts_display_class_function extends neder_posts_display_class {
	public function neder_posts_display_function ( $attr ) {	
		
		static $instance = 0;
		$instance++;	
				
		extract(
			shortcode_atts(
				array(
					"type"					=> 'type1',
					"name"					=> '',
					"columns"				=> '1',
					
					// QUERY					
					"source" 				=> 'post',
					"posts_source" 			=> 'all_posts',
					"post_type" 			=> '',
					"categories" 			=> '',									
					"categories_post_type" 	=> '',
					"pagination" 			=> 'off',
					"pagination_type" 		=> 'numeric',
					"num_posts_page" 		=> '',
					"num_posts" 			=> '', 	
					"orderby" 				=> 'date',
					"order" 				=> 'DESC',		 			
					
					// OPTIONS	
					"date_format" 			=> 'F j, Y'				
											
					), 
					$attr)
		);	
		
		$return = '';

		/************************* SCRIPT LOAD **************************/
		
		wp_enqueue_style('neder-vc-element');	

		if($type == 'type1') { $num_posts = 6;	$columns = 6; $posts_layout_type = 'neder-posts-type1'; }
		if($type == 'type2') { 
					if(empty($num_posts)) : 
						$num_posts = 3; 
					endif;	
					$posts_layout_type = 'neder-posts-type2'; 					
		}
		if($type == 'type3') { 
					if(empty($num_posts)) : 
						$num_posts = 2; 
					endif;				
					$posts_layout_type = 'neder-posts-type3'; 
		}
		if($type == 'type4') { 
					if(empty($num_posts)) : 
						$num_posts = 2; 
					endif;
					$posts_layout_type = 'neder-posts-type4'; 
		}
		if($type == 'type5') { 
					if(empty($num_posts)) : 
						$num_posts = 2; 
					endif;
					$posts_layout_type = 'neder-posts-type5'; 
		}
		if($type == 'type6') { 
					if(empty($num_posts)) : 
						$num_posts = 6; 
					endif;
					$posts_layout_type = 'neder-posts-type6'; 
		}	
		$container_class = '';
		if($columns == '1') : $columns_class = 'col-xs-12'; $container_class = 'neder-vc-posts-1-col'; endif;
		if($columns == '2') : $columns_class = 'col-xs-6'; $container_class = 'neder-vc-posts-2-col'; endif;
		if($columns == '3') : $columns_class = 'col-xs-4'; $container_class = 'neder-vc-posts-3-col'; endif;

		 
		// PAGINATION		
		if($pagination == 'yes') {
			if ( get_query_var('paged') ) {
				$paged = get_query_var('paged');				
			} elseif ( get_query_var('page') ) {			
				$paged = get_query_var('page');			
			} else {			
				$paged = 1;			
			}
		}
		// #PAGINATION	
			
		// LOOP QUERY
		$query = neder_vc_query( $source,
								    $posts_source, 
								    $post_type, 
								    $categories,
								    $categories_post_type, 
								    $order, 
									$orderby, 
									$pagination, 
									$pagination_type,
									$num_posts, 
									$num_posts_page );

								
		$class_load_more = '';
		$class_item_load_more = '';
		if($pagination == 'load-more') :
			$class_load_more = 'neder-load-more-'.$type.'';
			$class_item_load_more = 'neder-item-load-more-'.$type.'';	
		endif;
		
		$return .= '<div class="wpmp-clear"></div>';
		
		$count = 0;
		
		$return .= '<div class="neder-vc-element-posts '.$class_load_more.' '.$posts_layout_type.' '.$container_class.' neder-vc-element-posts-'.$instance.' element-no-padding">';		
		
		if($name != '') :
			$return .= '<div class="neder-vc-element-posts-title-box title-box-'.$instance.'"><h2>'.$name.'</h2></div>';
		endif;
		
		$return .= '<div class="neder-vc-element-posts-article-container">';
		
		$loop = new WP_Query($query);
		
		$readtext 		= esc_html__('Read More','neder-core');
		$loading 		= esc_html__('Loading posts...','neder-core');
		$nomoreposts 	= esc_html__('No more posts to load.','neder-core');

		// Lazy LOAD
		
		if($pagination == 'load-more') : 
			
			wp_enqueue_script(
				'neder-load-posts-'.$type.'',
				NEDER_JS_URL . 'vc-load-posts-post-'.$type.'.js',
				array('jquery'),
				'1.0',
				true
			);		
					
			$max = $loop->max_num_pages;
			$paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
			
			// Add some parameters for the JS.
			wp_localize_script(
				'neder-load-posts-'.$type.'',
				'neder_ndwp_',
				array(
					'startPage' 	=> $paged,
					'maxPages' 		=> $max,
					'nextLink' 		=> next_posts($max, false),
					'readtext'		=> $readtext,
					'loading'		=> $loading,
					'nomoreposts'	=> $nomoreposts
				)
			);
		endif;

		// END LAZY LOAD
		
		if($loop) :
			while ( $loop->have_posts() ) : $loop->the_post();
		
				$id_post = get_the_id();
				$link = get_permalink(); 
				if($count & 1) : $class_odd = "vc-element-post-even"; else : $class_odd = "vc-element-post-odd"; endif;
				
				/**********************************************************************/
				/******************************** TYPE 1 ******************************/
				/**********************************************************************/
				
				if($type == 'type1') :

					# First Post
					if($count == '0') :			
					
						$return .= '<article class="item-posts first-element-posts col-xs-8 '.$class_item_load_more.'">';
							$return .= '<div class="article-image">';
								$return .= neder_vc_thumbs('neder-vc-header');
								$return .= neder_check_format();
								$return .= '<div class="article-category">'.neder_vc_category($source,$post_type).'</div>';
								$return .= '<div class="article-info-top">';
										$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
										$return .= '<div class="article-separator">|</div>';
										$return .= '<div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_vc_get_num_comments().'</div>';
								$return .= '<div class="neder-clear"></div></div>';								
							$return .= '</div>';
							$return .= '<div class="article-info">';

								$return .= '<div class="article-info-bottom">';		
										$return .= '<h3 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h3>';
										$return .= '<p class="article-excerpt">' . neder_ndwp_excerpt(250) . '</p>';
										$return .= '<div class="neder-clear"></div>';	
								$return .= '</div>';
							$return .= '</div>';
						$return .= '</article>';
						
					# Others post
					else :

						$return .= '<article class="item-header others-element-header col-xs-4 '.$class_item_load_more.'">';
						$return .= '<div class="article-image">'.neder_vc_thumbs('neder-vc-posts-medium') . neder_check_format() .'</div>';
						$return .= '<div class="article-info">';
							$return .= '<div class="article-info-top">';
								$return .= '<h3 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h3>';
							$return .= '<div class="neder-clear"></div></div>';	
							$return .= '<div class="article-info-bottom">';
								$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
							$return .= '<div class="neder-clear"></div></div>';	
						$return .= '</div>';
						$return .= '</article>';					
										
					endif;
					
				endif;
				
				/**********************************************************************/
				/******************************** TYPE 2 ******************************/
				/**********************************************************************/				
		
				if($type == 'type2') :
						$return .= '<article class="item-posts first-element-posts '.$columns_class.' '.$class_item_load_more.' '.$class_odd.'">';
							$return .= '<div class="article-image">';
								if($columns != 1) :
									$return .= neder_vc_thumbs('neder-vc-header-medium');
								else :
									$return .= neder_vc_thumbs('neder-vc-blog-medium');							
								endif;
								$return .= neder_check_format();
								$return .= '<div class="article-category">'.neder_vc_category($source,$post_type).'</div>';
								$return .= '<div class="article-info-top">';
										$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
										$return .= '<div class="article-separator">|</div>';
										$return .= '<div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_vc_get_num_comments().'</div>';
								$return .= '<div class="neder-clear"></div></div>';											
							$return .= '</div>';
							$return .= '<div class="article-info">';

								$return .= '<div class="article-info-bottom">';		
										$return .= '<h3 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h3>';
										$return .= '<div class="neder-clear"></div>';	
								$return .= '</div>';
							$return .= '</div>';
						$return .= '</article>';				
								
				endif;

				/**********************************************************************/
				/******************************** TYPE 3 ******************************/
				/**********************************************************************/				

				if($type == 'type3') :
				
						$return .= '<article class="item-posts first-element-posts '.$columns_class.' '.$class_item_load_more.' '.$class_odd.'">';
							$return .= '<div class="article-image">';
								if($columns != 1) :
									$return .= neder_vc_thumbs('neder-vc-header-medium');
								else :
									$return .= neder_vc_thumbs('neder-vc-blog-medium');							
								endif;
								$return .= neder_check_format();
								$return .= '<div class="article-category">'.neder_vc_category($source,$post_type).'</div>';
								$return .= '<div class="article-info-top">';
										$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
										$return .= '<div class="article-separator">|</div>';
										$return .= '<div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_vc_get_num_comments().'</div>';
								$return .= '<div class="neder-clear"></div></div>';														
							$return .= '</div>';
							$return .= '<div class="article-info">';
								$return .= '<div class="article-info-bottom">';		
										$return .= '<h3 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h3>';
										$return .= '<div class="neder-clear"></div>';	
								$return .= '</div>';
							$return .= '</div>';
						$return .= '</article>';				
								
				endif;

				/**********************************************************************/
				/******************************** TYPE 4 ******************************/
				/**********************************************************************/	
				
				if($type == 'type4') :
				
						$return .= '<article class="item-posts first-element-posts '.$columns_class.' '.$class_item_load_more.' '.$class_odd.'">';
							$return .= '<div class="article-image">';
								if($columns != 1) :
									$return .= neder_vc_thumbs('neder-vc-header-medium');
								else :
									$return .= neder_vc_thumbs('neder-vc-posts-medium-large');							
								endif;
								$return .= neder_check_format();
								$return .= '<div class="article-category">'.neder_vc_category($source,$post_type).'</div>';
								$return .= '<div class="article-info-top">';
										$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
										$return .= '<div class="article-separator">|</div>';
										$return .= '<div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_vc_get_num_comments().'</div>';
								$return .= '<div class="neder-clear"></div></div>';								
							$return .= '</div>';
							$return .= '<div class="article-info">';
								$return .= '<div class="article-info-bottom">';		
										$return .= '<h3 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h3>';
										if($columns != 1) :
											$return .= '<p class="article-excerpt">' . neder_ndwp_excerpt(150) . '</p>';
										else :
											$return .= '<p class="article-excerpt">' . neder_ndwp_excerpt(300) . '</p>';						
										endif;
										$return .= '<div class="neder-clear"></div>';	
								$return .= '</div>';
							$return .= '</div>';
						$return .= '</article>';	
				
				endif;

				/**********************************************************************/
				/******************************** TYPE 5 ******************************/
				/**********************************************************************/	
				
				if($type == 'type5') :
				
						$return .= '<article class="item-posts first-element-posts '.$columns_class.' '.$class_item_load_more.' '.$class_odd.'">';
							$return .= '<div class="article-image col-xs-5">';
								if($columns != 1) :
									$return .= neder_vc_thumbs('neder-vc-header-small');
								else :
									$return .= neder_vc_thumbs('neder-vc-header-medium');							
								endif;
								$return .= neder_check_format();
								$return .= '<div class="article-category">'.neder_vc_category($source,$post_type).'</div>';
							$return .= '</div>';
							$return .= '<div class="article-info col-xs-7">';
								$return .= '<div class="article-info-top">';
										$return .= '<h3 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h3>';
										$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
										if($columns == 1) :
											$return .= '<div class="neder-clear"></div><p class="article-excerpt">' . neder_ndwp_excerpt(150) . '</p>';
										elseif($columns == 2) :
											$return .= '<div class="neder-clear"></div><p class="article-excerpt">' . neder_ndwp_excerpt(75) . '</p>';										
										endif;
								$return .= '<div class="neder-clear"></div></div>';
							$return .= '</div>';
						$return .= '</article>';				
				
				endif;

				/**********************************************************************/
				/******************************** TYPE 6 ******************************/
				/**********************************************************************/	
				
				if($type == 'type6') :

					if($count < $columns) :
				
						$return .= '<article class="item-posts first-element-posts first-row-posts '.$columns_class.' '.$class_item_load_more.' '.$class_odd.'">';
							$return .= '<div class="article-image">';
								if($columns != 3) :
									$return .= neder_vc_thumbs('neder-vc-blog-medium');
								else :
									$return .= neder_vc_thumbs('neder-vc-header-medium');							
								endif;
								$return .= neder_check_format();								
								$return .= '<div class="article-category">'.neder_vc_category($source,$post_type).'</div>';
								$return .= '<div class="article-info-top">';
										$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
										$return .= '<div class="article-separator">|</div>';
										$return .= '<div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_vc_get_num_comments().'</div>';
								$return .= '<div class="neder-clear"></div></div>';								
							$return .= '</div>';
							$return .= '<div class="article-info">';
								$return .= '<div class="article-info-bottom">';		
										$return .= '<h3 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h3>';
										if($columns != 1) :
											$return .= '<p class="article-excerpt">' . neder_ndwp_excerpt(150) . '</p>';
										else :
											$return .= '<p class="article-excerpt">' . neder_ndwp_excerpt(350) . '</p>';						
										endif;
										$return .= '<div class="neder-clear"></div>';	
								$return .= '</div>';
							$return .= '</div>';
						$return .= '</article>';

					else :
					
						$return .= '<article class="item-posts first-element-posts others-post '.$columns_class.' '.$class_item_load_more.' '.$class_odd.'">';
							$return .= '<div class="article-image col-xs-5">';
								if($columns != 1) :
									$return .= neder_vc_thumbs('neder-vc-header-small');
								else :
									$return .= neder_vc_thumbs('neder-vc-header-medium');							
								endif;
								$return .= neder_check_format();								
							$return .= '</div>';
							$return .= '<div class="article-info col-xs-7">';
								$return .= '<div class="article-info-top">';	
										$return .= '<h3 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h3>';									
										$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
										if($columns == 1) :
											$return .= '<div class="neder-clear"></div><p class="article-excerpt">' . neder_ndwp_excerpt(150) . '</p>';
										endif;								
								$return .= '<div class="neder-clear"></div></div>';
							$return .= '</div>';
							
						$return .= '</article>';					
										
					endif;						
				
				endif;				
				
				$count_clear = $count + 1;
				if(($count_clear % $columns) == 0) : $return .= '<div class="neder-clear"></div>'; endif;
			
			$count++;
			endwhile;
		endif;	
		
		$return .= '</div><div class="neder-clear"></div>';
		
		/**********************************************************************/
		/****************************** PAGINATION ****************************/
		/**********************************************************************/ 
		if($pagination == 'yes') {
				$return .= '<div class="neder-clear"></div><div class="neder-posts-display-'.$instance.' neder-vc-pagination">';
				if($pagination_type == 'numeric') {
					$return .= neder_posts_numeric_pagination($pages = '', $range = 2,$loop,$paged);
				} else {
					$return .= '<div class="neder-pagination-normal">';
						$return .= get_next_posts_link( 'Older posts', $loop->max_num_pages );
						$return .= get_previous_posts_link( 'Newer posts' );
					$return .= '</div>';
				}
				$return .= '<div class="neder-clear"></div></div>';
		}
		/**********************************************************************/
		/***************************** #PAGINATION ****************************/
		/**********************************************************************/ 
		
		$return .= '</div>';
		wp_reset_query();
		return $return;	
	}
 }
 
 new neder_posts_display_class_function();		