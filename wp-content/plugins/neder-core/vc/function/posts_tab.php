<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 
 
 class neder_posts_tab_display_class_function extends neder_posts_tab_display_class {
	public function neder_posts_tab_display_function ( $attr ) {	
		
		static $instance = 0;
		$instance++;	
				
		extract(
			shortcode_atts(
				array(
					"type"					=> 'type1',
					"name"					=> '',
					
					// QUERY
					"name_tab_1"			=> '',					
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

					// QUERY TAB 2		
					"name_tab_2"				=> '',
					"source_tab2" 				=> 'post',
					"posts_source_tab2" 		=> 'all_posts',
					"post_type_tab2" 			=> '',
					"categories_tab2" 			=> '',									
					"categories_post_type_tab2" => '',
					"pagination_tab2" 			=> 'off',
					"pagination_type_tab2" 		=> 'numeric',
					"num_posts_page_tab2" 		=> '',
					"num_posts_tab2" 			=> '', 	
					"orderby_tab2" 				=> 'date',
					"order_tab2" 				=> 'DESC',	
					
					// QUERY TAB 3
					"name_tab_3"				=> '',
					"source_tab3" 				=> 'post',
					"posts_source_tab3" 		=> 'all_posts',
					"post_type_tab3" 			=> '',
					"categories_tab3" 			=> '',									
					"categories_post_type_tab3" => '',
					"pagination_tab3" 			=> 'off',
					"pagination_type_tab3" 		=> 'numeric',
					"num_posts_page_tab3" 		=> '',
					"num_posts_tab3" 			=> '', 	
					"orderby_tab3" 				=> 'date',
					"order_tab3" 				=> 'DESC',						

					
					// OPTIONS	
					"date_format" 			=> 'F j, Y',				
					
					), 
					$attr)
		);	
		
		$posts_layout_type = '';
		
		$return = '';
		
		/************************* SCRIPT LOAD **************************/
		
		wp_enqueue_style('neder-vc-element');	

		$return .= "<script type=\"text/javascript\">
		jQuery(document).ready(function($){
					$('.ndwp-vc-element-posts-tab-1-instance-".$instance."').on('click', function(event) {
						$('.ndwp-vc-element-posts-tab-1-".$instance."').fadeIn();
						$('.ndwp-vc-element-posts-tab-2-".$instance."').css(\"display\",\"none\");
						$('.ndwp-vc-element-posts-tab-3-".$instance."').css(\"display\",\"none\");
						$('.ndwp-vc-element-posts-tab-1-instance-".$instance."').addClass('neder_ndwp_tab_active');
						$('.ndwp-vc-element-posts-tab-2-instance-".$instance."').removeClass('neder_ndwp_tab_active');
						$('.ndwp-vc-element-posts-tab-3-instance-".$instance."').removeClass('neder_ndwp_tab_active');
					});
					$('.ndwp-vc-element-posts-tab-2-instance-".$instance."').on('click', function(event) {
						$('.ndwp-vc-element-posts-tab-1-".$instance."').css(\"display\",\"none\");
						$('.ndwp-vc-element-posts-tab-2-".$instance."').fadeIn();
						$('.ndwp-vc-element-posts-tab-3-".$instance."').css(\"display\",\"none\");
						$('.ndwp-vc-element-posts-tab-2-instance-".$instance."').addClass('neder_ndwp_tab_active');
						$('.ndwp-vc-element-posts-tab-1-instance-".$instance."').removeClass('neder_ndwp_tab_active');
						$('.ndwp-vc-element-posts-tab-3-instance-".$instance."').removeClass('neder_ndwp_tab_active');						
					});
					$('.ndwp-vc-element-posts-tab-3-instance-".$instance."').on('click', function(event) {
						$('.ndwp-vc-element-posts-tab-1-".$instance."').css(\"display\",\"none\");
						$('.ndwp-vc-element-posts-tab-2-".$instance."').css(\"display\",\"none\");
						$('.ndwp-vc-element-posts-tab-3-".$instance."').fadeIn();
						$('.ndwp-vc-element-posts-tab-3-instance-".$instance."').addClass('neder_ndwp_tab_active');
						$('.ndwp-vc-element-posts-tab-1-instance-".$instance."').removeClass('neder_ndwp_tab_active');
						$('.ndwp-vc-element-posts-tab-2-instance-".$instance."').removeClass('neder_ndwp_tab_active');						
					});											
		});
		</script>";
			
		$return .= '<div class="neder-vc-element-posts-tab-title-box title-box-'.$instance.'">';
		
			$return .= '<h2>'.$name.'</h2>';

			$return .= '<div class="neder-vc-element-posts-tab-title-tabs">';
				if($name_tab_1 != '') : $return .= '<span class="ndwp-vc-element-posts-tab-1-instance-'.$instance.' neder_ndwp_tab_active">'.$name_tab_1.'</span>'; endif;
				if($name_tab_2 != '') : $return .= '<span class="ndwp-vc-element-posts-tab-2-instance-'.$instance.'">'.$name_tab_2.'</span>'; endif;
				if($name_tab_3 != '') : $return .= '<span class="ndwp-vc-element-posts-tab-3-instance-'.$instance.'">'.$name_tab_3.'</span>'; endif;
			$return .= '</div>';
		
		$return .= '</div>';
		
		$return .= '<div class="neder-vc-element-posts-tab '.$posts_layout_type.' neder-vc-element-posts-tab-'.$instance.' element-no-padding">';		
		
		// TAB 1
		if($name_tab_1 != '') :
		
				$return .= '<div class="ndwp-vc-element-posts-tab-container ndwp-vc-element-posts-tab-1-'.$instance.' ndwp-vc-element-posts-tab-container-tab1" style="display:block">';
		
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
		
		
				$loop = new WP_Query($query);
				
				if($loop) :
					while ( $loop->have_posts() ) : $loop->the_post();				

						$id_post = get_the_id();
						$link = get_permalink(); 					
						
						$return .= '<article class="item-posts first-element-posts col-xs-4">';
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
										$return .= '<div class="neder-clear"></div>';	
								$return .= '</div>';
							$return .= '</div>';
						$return .= '</article>';						
				
					endwhile;
				endif;				
				$return .= '</div>';			
				wp_reset_query();
				
		endif;
		
		// TAB 2
		if($name_tab_1 != '') :
		
				$return .= '<div class="ndwp-vc-element-posts-tab-container ndwp-vc-element-posts-tab-2-'.$instance.' ndwp-vc-element-posts-tab-container-tab2" style="display:none">';
		
				// LOOP QUERY
				$query = neder_vc_query( $source_tab2,
											$posts_source_tab2, 
											$post_type_tab2, 
											$categories_tab2,
											$categories_post_type_tab2, 
											$order_tab2, 
											$orderby_tab2, 
											$pagination_tab2, 
											$pagination_type_tab2,
											$num_posts_tab2, 
											$num_posts_page_tab2 );		
		
		
				$loop = new WP_Query($query);
				
				if($loop) :
					while ( $loop->have_posts() ) : $loop->the_post();				
				
						$id_post = get_the_id();
						$link = get_permalink();
						
						$return .= '<article class="item-posts first-element-posts col-xs-4">';
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
										$return .= '<div class="neder-clear"></div>';	
								$return .= '</div>';
							$return .= '</div>';
						$return .= '</article>';	
				
					endwhile;
				endif;				
				$return .= '</div>';				
				wp_reset_query();
				
		endif;		
		
		// TAB 3
		if($name_tab_1 != '') :
		
				$return .= '<div class="ndwp-vc-element-posts-tab-container ndwp-vc-element-posts-tab-3-'.$instance.' ndwp-vc-element-posts-tab-container-tab3" style="display:none">';
		
				// LOOP QUERY
				$query = neder_vc_query( $source_tab3,
											$posts_source_tab3, 
											$post_type_tab3, 
											$categories_tab3,
											$categories_post_type_tab3, 
											$order_tab3, 
											$orderby_tab3, 
											$pagination_tab3, 
											$pagination_type_tab3,
											$num_posts_tab3, 
											$num_posts_page_tab3 );		
		
		
				$loop = new WP_Query($query);
				
				if($loop) :
					while ( $loop->have_posts() ) : $loop->the_post();				
				
						$id_post = get_the_id();
						$link = get_permalink();
						
						$return .= '<article class="item-posts first-element-posts col-xs-4">';
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
										$return .= '<div class="neder-clear"></div>';	
								$return .= '</div>';
							$return .= '</div>';
						$return .= '</article>';	
				
					endwhile;					
				endif;
				$return .= '</div>';				
				wp_reset_query();
				
		endif;		
		
		$return .= '</div>';
		
		$return .= '<div class="neder-clear"></div>';
		return $return;
		
	}
 }
 
 new neder_posts_tab_display_class_function();			