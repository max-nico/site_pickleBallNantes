<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 
 
 class neder_header_display_class_function extends neder_header_display_class {
	public function neder_header_display_function ( $attr ) {	
		
		static $instance = 0;
		$instance++;	
				
		extract(
			shortcode_atts(
				array(
					"type"					=> 'type1',
					
					// QUERY					
					"source" 				=> 'post',
					"posts_source" 			=> 'all_posts',
					"post_type" 			=> '',
					"categories" 			=> '',
					"tags" 					=> '',									
					"categories_post_type" 	=> '',
					"pagination" 			=> 'off',
					"pagination_type" 		=> 'numeric',
					"num_posts_page" 		=> '',
					"num_posts" 			=> '', 	
					"orderby" 				=> 'date',
					"order" 				=> 'DESC',		 			
					
					// OPTIONS		
					"date" 					=> 'true',		
					"date_format" 			=> 'F j, Y',									
					"comments" 				=> 'true',
					"author" 				=> 'true',
					"view" 					=> 'true',
					"category_show" 		=> 'true',
					"social" 				=> 'true',
					
					// CAROUSEL								
					"lazy_load"	 			=> 'false',   
					"item_show"				=> '1', 
					"item_show_900"			=> '1',
					"item_show_600"			=> '1',
					"autoplay"				=> '2000',
					"navigation"			=> 'true'
					
											
					), 
					$attr)
		);	
		
		$return = '';
		
		/************************* SCRIPT LOAD **************************/
		
		wp_enqueue_style('neder-vc-element');
		
		if($type == 'type1') { $num_posts = 4;	$header_type = 'neder-header-type1'; }
		if($type == 'type2') { $num_posts = 4;	$header_type = 'neder-header-type2'; }
		if($type == 'type3') { $num_posts = 4;	$header_type = 'neder-header-type3'; }
		if($type == 'type4') {
					$header_type = 'neder-header-type4';
					wp_enqueue_style( 'owl-carousel' );
					wp_enqueue_script( 'owl-carousel-script' );
					$return .= neder_vc_header_custom_js($instance,$item_show,$item_show_900,$item_show_600,$autoplay,$navigation);
		}
		if($type == 'type5') { $num_posts = 3;	$header_type = 'neder-header-type5'; }
		
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
									$num_posts_page);		
		
		$return .= '<div class="wpmp-clear"></div>';
		
		$count = 0;
		
		$return .= '<div class="neder-vc-element-header '.$header_type.' neder-vc-element-header-'.$instance.' element-no-padding">';		
		
		$loop = new WP_Query($query);
		
		if($loop) :
			while ( $loop->have_posts() ) : $loop->the_post();
		
				$id_post = get_the_id();
				$link = get_permalink(); 

				/**********************************************************************/
				/******************************** TYPE 1 ******************************/
				/**********************************************************************/
				
				if($type == 'type1') :
					
					# First Post
					if($count == '0') :			
					
						$return .= '<article class="item-header first-element-header col-xs-7">';
						$return .= neder_vc_thumbs('neder-vc-header');
						$return .= neder_check_format();
						$return .= '<div class="article-category">'.neder_vc_category($source,$post_type).'</div>';
						$return .= '<div class="article-info">';
							$return .= '<div class="article-info-top">';
								$return .= '<h2 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h2>';								
							$return .= '<div class="neder-clear"></div></div>';	
							$return .= '<div class="article-info-bottom">';
								$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
								$return .= '<div class="article-separator">|</div><div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_vc_get_num_comments().'</div>';
							$return .= '<div class="neder-clear"></div></div>';	
						$return .= '</div>';
						$return .= '<a href="'.$link.'" class="header-pattern"></a>';
						$return .= '</article>';
						
					# Second post
					elseif($count == '1') :
						
						$return .= '<article class="item-header second-element-header col-xs-5">';
						$return .= neder_vc_thumbs('neder-vc-header-medium');
						$return .= neder_check_format();
						$return .= '<div class="article-category">'.neder_vc_category($source,$post_type).'</div>';
						$return .= '<div class="article-info">';
							$return .= '<div class="article-info-top">';
								$return .= '<h2 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h2>';								
							$return .= '<div class="neder-clear"></div></div>';	
							$return .= '<div class="article-info-bottom">';
								$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
								$return .= '<div class="article-separator">|</div><div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_vc_get_num_comments().'</div>';
							$return .= '<div class="neder-clear"></div></div>';	
						$return .= '</div>';
						$return .= '<a href="'.$link.'" class="header-pattern"></a>';						
						$return .= '</article>';					
				
					else :
				
						$return .= '<article class="item-header others-element-header col-xs-2">';
						$return .= neder_vc_thumbs('neder-vc-header-small');
						$return .= neder_check_format();
						$return .= '<div class="article-info">';
							$return .= '<div class="article-info-top">';
								$return .= '<h2 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h2>';								
							$return .= '<div class="neder-clear"></div></div>';
						$return .= '</div>';
						$return .= '<a href="'.$link.'" class="header-pattern"></a>';
						$return .= '</article>';						
				
					endif;
					
				endif;
				
				/**********************************************************************/
				/******************************** TYPE 2 ******************************/
				/**********************************************************************/				
				
				if($type == 'type2') :
					
					# First Post
					if($count == '0') :	

						$return .= '<article class="item-header first-element-header col-xs-12">';
						$return .= neder_vc_thumbs('neder-preview-post');
						$return .= neder_check_format();
						$return .= '<div class="article-category">'.neder_vc_category($source,$post_type).'</div>';
						$return .= '<div class="article-info">';
							$return .= '<div class="article-info-top">';
								$return .= '<h2 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h2>';								
							$return .= '<div class="neder-clear"></div></div>';	
							$return .= '<div class="article-info-bottom">';
								$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
								$return .= '<div class="article-separator">|</div><div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_vc_get_num_comments().'</div>';
							$return .= '<div class="neder-clear"></div></div>';	
						$return .= '</div>';
						$return .= '<a href="'.$link.'" class="header-pattern"></a>';
						$return .= '</article>';

					else :
					
						$return .= '<article class="item-header others-element-header col-xs-4">';
						$return .= neder_vc_thumbs('neder-vc-header');
						$return .= neder_check_format();
						$return .= '<div class="article-category">'.neder_vc_category($source,$post_type).'</div>';
						$return .= '<div class="article-info">';
							$return .= '<div class="article-info-top">';
								$return .= '<h2 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h2>';								
							$return .= '<div class="neder-clear"></div></div>';	
							$return .= '<div class="article-info-bottom">';
								$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
								$return .= '<div class="article-separator">|</div><div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_vc_get_num_comments().'</div>';
							$return .= '<div class="neder-clear"></div></div>';	
						$return .= '</div>';
						$return .= '<a href="'.$link.'" class="header-pattern"></a>';
						$return .= '</article>';					
					
					endif;
					
				endif;
				
				/**********************************************************************/
				/******************************** TYPE 3 ******************************/
				/**********************************************************************/				
				
				if($type == 'type3') :
					
					# First Post
					if($count == '0') :	

						$return .= '<article class="item-header first-element-header col-xs-12">';
						$return .= neder_vc_thumbs('neder-preview-post');
						$return .= neder_check_format();
						$return .= '<div class="article-category">'.neder_vc_category($source,$post_type).'</div>';
						$return .= '<div class="article-info">';
							$return .= '<div class="article-info-top">';
								$return .= '<h2 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h2>';								
							$return .= '<div class="neder-clear"></div></div>';	
							$return .= '<div class="article-info-bottom">';
								$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
								$return .= '<div class="article-separator">|</div><div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_vc_get_num_comments().'</div>';
							$return .= '<div class="neder-clear"></div></div>';	
						$return .= '</div>';
						$return .= '<a href="'.$link.'" class="header-pattern"></a>';
						$return .= '</article>';

					else :
					
						$return .= '<article class="item-header others-element-header col-xs-4">';
						$return .= neder_vc_thumbs('neder-vc-header');
						$return .= neder_check_format();
						$return .= '<div class="article-info-type3">';
							$return .= '<div class="article-info-top">';
								$return .= '<h2 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h2>';
							$return .= '<div class="neder-clear"></div></div>';	
						$return .= '</div>';
						$return .= '</article>';					
					
					endif;
					
				endif;				

				/**********************************************************************/
				/******************************** TYPE 4 ******************************/
				/**********************************************************************/			
				
				if($type == 'type4') :

						$return .= '<article class="item-header first-element-header col-xs-12">';
						$return .= neder_vc_thumbs_nll('neder-preview-post');
						$return .= neder_check_format();
						$return .= '<div class="article-category">'.neder_vc_category($source,$post_type).'</div>';
						$return .= '<div class="article-info">';
							$return .= '<div class="article-info-top">';
								$return .= '<h2 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h2>';								
							$return .= '<div class="neder-clear"></div></div>';	
							$return .= '<div class="article-info-bottom">';
								$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
								$return .= '<div class="article-separator">|</div><div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_vc_get_num_comments().'</div>';
							$return .= '<div class="neder-clear"></div></div>';	
						$return .= '</div>';
						$return .= '<a href="'.$link.'" class="header-pattern"></a>';
						$return .= '</article>';
						
				endif;

				/**********************************************************************/
				/******************************** TYPE 5 ******************************/
				/**********************************************************************/			
				
				if($type == 'type5') :

					# First Post
					if($count == '0') :			
					
						$return .= '<article class="item-header first-element-header col-xs-7">';
						$return .= neder_vc_thumbs('neder-vc-header');
						$return .= neder_check_format();
						$return .= '<div class="article-category">'.neder_vc_category($source,$post_type).'</div>';
						$return .= '<div class="article-info">';
							$return .= '<div class="article-info-top">';
								$return .= '<h2 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h2>';								
							$return .= '<div class="neder-clear"></div></div>';	
							$return .= '<div class="article-info-bottom">';
								$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
								$return .= '<div class="article-separator">|</div><div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_vc_get_num_comments().'</div>';
							$return .= '<div class="neder-clear"></div></div>';	
						$return .= '</div>';
						$return .= '<a href="'.$link.'" class="header-pattern"></a>';
						$return .= '</article>';
						
					# Second post
					else :
						
						$return .= '<article class="item-header second-element-header col-xs-5">';
						$return .= neder_vc_thumbs('neder-vc-header-medium');
						$return .= neder_check_format();
						$return .= '<div class="article-category">'.neder_vc_category($source,$post_type).'</div>';
						$return .= '<div class="article-info">';
							$return .= '<div class="article-info-top">';
								$return .= '<h2 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h2>';								
							$return .= '<div class="neder-clear"></div></div>';	
							$return .= '<div class="article-info-bottom">';
								$return .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date($date_format).'</div>';
								$return .= '<div class="article-separator">|</div><div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_vc_get_num_comments().'</div>';
							$return .= '<div class="neder-clear"></div></div>';	
						$return .= '</div>';
						$return .= '<a href="'.$link.'" class="header-pattern"></a>';						
						$return .= '</article>';				
				
					endif;
								
				endif;
				
			$count++;	
			endwhile;
		endif;
		
		if($type != 'type4') :
			$return .= '<div class="neder-clear"></div>';
		endif;
		
		$return .= '</div>';
		
		if($type == 'type4') :
			$return .= '<div class="neder-clear"></div>';
		endif;		
		wp_reset_query();
		return $return;
		
	}
 }
 
 new neder_header_display_class_function();
 
 function neder_vc_header_custom_js($instance,$item_show,$item_show_900,$item_show_600,$autoplay,$navigation) {
		global $neder_theme;
		
		if($item_show == 'default') { $item_show = '4'; }
		if($item_show_900 == 'default') { $item_show_900 = '3'; }
		if($item_show_600 == 'default') { $item_show_600 = '1'; }	
		
		/* RTL */	
		if ($neder_theme['rtl']) :  $rtl = 'rtl:true,'; else : $rtl = ''; endif;  
		/* #RTL */	
		
		if($neder_theme['neder_lazy_load']) : $lazyLoad = 'lazyLoad:true,'; else : $lazyLoad = ''; endif;
		
		$return = '<script type="text/javascript">
					jQuery(document).ready(function($){
					$(\'.neder-vc-element-header-'.$instance.'\').owlCarousel({
						loop:true,
						smartSpeed: 2000,
						margin:4,
						nav:'.$navigation.',
						'.$lazyLoad.'
						'.$rtl.'
						dots:false,';
		if(!empty($autoplay) || $autoplay != '') { 
				$return .= 'autoplay: true,
				autoplayTimeout: '.$autoplay.',';
		}
		$return .= 'navText: [\'<i class="nedericon fa-angle-left"></i>\',\'<i class="nedericon fa-angle-right"></i>\'],
						responsive:{
							0:{
								items:'.$item_show_600.'
							},
							600:{
								items:'.$item_show_600.'
							},
							700:{
								items:'.$item_show_600.'
							},
							800:{
								items:'.$item_show_900.'
							},
							900:{
								items:'.$item_show_900.'
							},
							1000:{
								items:'.$item_show_900.'
							},
							1200:{
								items:'.$item_show.'
							}
							
						}
					});
				});		
				</script>';	
	
	
	
	
	return $return;
}

 
?>