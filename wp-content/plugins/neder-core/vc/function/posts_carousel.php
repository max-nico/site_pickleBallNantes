<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 
 
 class neder_posts_carousel_display_class_function extends neder_posts_carousel_display_class {
	public function neder_posts_carousel_display_function ( $attr ) {	
		global $neder_theme;
		static $instance = 0;
		$instance++;	
				
		extract(
			shortcode_atts(
				array(
					"type"					=> 'type1',
					"name"					=> '',
					
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
					"date_format" 			=> 'F j, Y',				

					// CAROUSEL								
					"lazy_load"	 			=> 'false',   
					"item_show"				=> '1', 
					"item_show_900"			=> '1',
					"item_show_600"			=> '1',
					"autoplay"				=> '3000',
					"navigation"			=> 'true'
					
					), 
					$attr)
		);	
		
		$return = '';

		/************************* SCRIPT LOAD **************************/
		
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_script( 'owl-carousel-script' );		
		wp_enqueue_style('neder-vc-element');	

		if($type == 'type1') { $posts_layout_type = 'neder-posts-carousel-type1'; $margin = '25'; }
		if($type == 'type2') { $posts_layout_type = 'neder-posts-carousel-type2'; $margin = '4'; }
		
		if($item_show == 'default') { $item_show = '4'; }
		if($item_show_900 == 'default') { $item_show_900 = '3'; }
		if($item_show_600 == 'default') { $item_show_600 = '1'; }
		
		/* RTL */	
		if ($neder_theme['rtl']) :  $rtl = 'rtl:true,'; else : $rtl = ''; endif;  
		/* #RTL */
		
		if($neder_theme['neder_lazy_load']) : $lazyLoad = 'lazyLoad:true,'; else : $lazyLoad = ''; endif;
		
		$return = '<script type="text/javascript">
					jQuery(document).ready(function($){
					$(\'.neder-vc-element-posts-carousel-'.$instance.'\').owlCarousel({
						loop:true,
						smartSpeed: 2000,
						margin:'.$margin.',						
						nav:'.$navigation.',
						'.$lazyLoad.'
						'.$rtl.'
						dots:'.$navigation.',';					
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
								
		$return .= '<div class="wpmp-clear"></div>';
		
		$count = 0;
		
		if($name) :
			$return .= '<div class="neder-vc-element-posts-carousel-title-box title-box-'.$instance.'"><h2>'.$name.'</h2></div>';
		endif;
		
		$return .= '<div class="neder-vc-element-posts-carousel '.$posts_layout_type.' neder-vc-element-posts-carousel-'.$instance.' neder-vc-element-posts-carousel-item-show-'.$item_show.' element-no-padding">';		
				
		$loop = new WP_Query($query);
		
		if($loop) :
			while ( $loop->have_posts() ) : $loop->the_post();
		
				$id_post = get_the_id();
				$link = get_permalink(); 

				/**********************************************************************/
				/******************************** TYPE 1 ******************************/
				/**********************************************************************/
				
				if($type == 'type1') :

						$return .= '<article class="item-posts first-element-posts">';
							$return .= '<div class="article-image">';
								if($item_show == '1') :
									$return .= neder_vc_thumbs_nll('neder-vc-header');
								else :
									$return .= neder_vc_thumbs_nll('neder-vc-header');
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
				/******************************** TYPE 2 ******************************/
				/**********************************************************************/
				
				if($type == 'type2') :				

					$return .= '<article class="item-posts first-element-header col-xs-12">';
						if($item_show == '1') :
							$return .= neder_vc_thumbs_nll('neder-preview-post');
						else :
							$return .= neder_vc_thumbs_nll('neder-vc-header');
						endif;						
						$return .= neder_check_format();
						$return .= '<div class="article-category">'.neder_vc_category($source,$post_type).'</div>';
						$return .= '<div class="article-info">
							<div class="article-info-top">
								<h2 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h2>								
								<div class="neder-clear"></div>
							</div>	
							<div class="article-info-bottom">
								<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date().'</div>
								<div class="article-separator">|</div>
								<div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_vc_get_num_comments().'</div>
								<div class="neder-clear"></div>
							</div>	
						</div>
					</article>';				
				
				endif;
				
			$count++;
			endwhile;
		endif;	
		
		$return .= '</div>';		
		
		$return .= '<div class="neder-clear"></div>';
		wp_reset_query();
		return $return;
		
	}
 }
 
 new neder_posts_carousel_display_class_function();		