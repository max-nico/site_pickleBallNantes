<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 


	/************************************************************/
	/************************ WP QUERY **************************/
	/************************************************************/

	function neder_vc_query( $source,
							    $posts_source, 
								$post_type, 
								$categories,
								$categories_post_type,
								$order, 
								$orderby, 
								$pagination, 
								$pagination_type,
								$num_posts, 
								$num_posts_page) {
								  
						if($orderby == 'views') { 
								$orderby = 'meta_value_num'; 
								$view_order = 'views';
						} else { $view_order = ''; }	
										
						if($source == 'wp_custom_posts_type') {
							$posts_source = 'all_posts';
						}
						
						if($posts_source == 'all_posts') {
						
							$query = 'post_type=Post&post_status=publish&ignore_sticky_posts=1&orderby='.$orderby.'&order='.$order.'';						
							
							// CUSTOM POST TYPE
							if($source == 'posts_type') {
								$query .= '&post_type='.$post_type.'';
							}

							if($view_order == 'views') { 
								$query .= '&meta_key=wpb_post_views_count';
							}
							
							// CATEGORIES POST TYPE
							if($categories_post_type != '' && !empty($categories_post_type) && $source == 'posts_type') {
								$taxonomy_names = get_object_taxonomies( $post_type );
								$query .= '&'.$taxonomy_names[0].'='.$categories_post_type.'';	
							}

							// CATEGORIES POSTS
							if($categories != '' && $categories != 'all' && !empty($categories) && $source == 'post') {
								$query .= '&category_name='.$categories.'';	
							}
								
							if($pagination == 'yes' || $pagination == 'load-more') {
								$query .= '&posts_per_page='.$num_posts_page.'';	
							} else {
								if($num_posts == '') { $num_posts = '-1'; }
								$query .= '&posts_per_page='.$num_posts.'';
							}
						
							// PAGINATION		
							if($pagination == 'yes' || $pagination == 'load-more') {
								if ( get_query_var('paged') ) {
									$paged = get_query_var('paged');
								
								} elseif ( get_query_var('page') ) {			
									$paged = get_query_var('page');			
								} else {			
									$paged = 1;			
								}			
								$query .= '&paged='.$paged.'';
							}
							// #PAGINATION	
						
						} else { // IF STICKY
							

							if($pagination == 'yes' || $pagination == 'load-more') {
								$num_posts = $num_posts_page;	
							} else {
								if($num_posts == '') { $num_posts = '-1'; }
								$num_posts = $num_posts;
							}

							// PAGINATION		
							
							if ( get_query_var('paged') ) {
								$paged = get_query_var('paged');							
							} elseif ( get_query_var('page') ) {			
								$paged = get_query_var('page');			
							} else {			
								$paged = 1;			
							}			
							
							// #PAGINATION	
												
							/* STICKY POST DA FARE ARRAY PER SCRITTURA IN ARRAY */
						
							$sticky = get_option( 'sticky_posts' );
							$sticky = array_slice( $sticky, 0, 5 );
							if($view_order == 'views') { 
								$query = array(
									'post_type' => 'post',
									'post_status' => 'publish',
									'orderby' 	=> $orderby,
									'order' => $order,
									'category_name' => $categories,
									'posts_per_page' => $num_posts,
									'meta_key' => 'wpb_post_views_count',
									'paged' => $paged, 
									'post__in'  => $sticky,
									'ignore_sticky_posts' => 1
								);
							} else {
								$query = array(
									'post_type' => 'post',
									'post_status' => 'publish',
									'orderby' 	=> $orderby,
									'order' => $order,
									'category_name' => $categories,
									'posts_per_page' => $num_posts,
									'paged' => $paged, 
									'post__in'  => $sticky,
									'ignore_sticky_posts' => 1
								);
							}						
							
						} // #all_posts
						
						return $query;	
	}

	
	
	/**************************************************************************/
	/************************ FUNCTIONS POST INFO *****************************/
	/**************************************************************************/

	function neder_vc_thumbs($thumbs_size = 'neder-vc-normal') {
		global $post;
		global $neder_theme; 
		$link = get_the_permalink();
		if(has_post_thumbnail()){ 
				$id_post = get_the_id();					
				$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), $thumbs_size );
				if($neder_theme['neder_lazy_load']) :
					$return = '<a href="'.$link.'"><img class="neder-vc-thumbs neder-lazy-load" data-original="'.$single_image[0].'" alt="'.get_the_title().'"></a>';
				else :
					$return = '<a href="'.$link.'"><img class="neder-vc-thumbs" src="'.$single_image[0].'" alt="'.get_the_title().'"></a>';
				endif;				
			} else {               
				$return = '';                 
		}
		return $return;
	}

	// URL

	function neder_vc_thumbs_url($id_post) {
		global $post;
		if(has_post_thumbnail()){  
				$id_post = get_the_id();					
				$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'neder-vc-header' );
				$return = $single_image[0];
			} else {               
				$return = '';                
		}
		return $return;
	}

	// No Lazy Load
	function neder_vc_thumbs_nll($thumbs_size = 'neder-vc-normal') {
		global $post;
		global $neder_theme;	
		$link = get_the_permalink();
		if(has_post_thumbnail()){ 
				$id_post = get_the_id();					
				$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), $thumbs_size );
				if($neder_theme['neder_lazy_load']) :
					$return = '<a href="'.$link.'"><img class="owl-lazy" data-src="'.$single_image[0].'" alt="'.get_the_title().'"></a>';
				else :
					$return = '<a href="'.$link.'"><img class="neder-vc-thumbs" src="'.$single_image[0].'" alt="'.get_the_title().'"></a>';
				endif;
			} else {               
				$return = '';                 
		}
		return $return;
	}		
	
	/************************************************************/
	/*********************** GET CATEGORIES *********************/
	/************************************************************/

	function neder_vc_category($source,$posts_type,$limit = 1) {
		$separator = ' ';
		$output = '';	
		$count = 1;
		if($source=='post') {			
			$categories = get_the_category();
			if($categories){
				foreach($categories as $category) {
					$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",'neder-core' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
					if($count == $limit) { break; }
					$count++;
				}
			}
		} elseif($source=='post_type') {
			global $post;
			$taxonomy_names = get_object_taxonomies( $posts_type );
			$term_list = wp_get_post_terms($post->ID,$taxonomy_names);
			if($term_list){
				foreach ($term_list as $tax_term) {
					$output .= '<a href="' . esc_attr(get_term_link($tax_term, $posts_type)) . '" title="' . sprintf( __( "View all posts in %s",'neder-core' ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a>'.$separator;
				}
			}
		}
		$return = trim($output, $separator);
		return $return;
	}

	/************************************************************/
	/*********************** GET N° COMMENTS ********************/
	/************************************************************/
	
	function neder_vc_get_num_comments() {
			$num_comments = get_comments_number(); // get_comments_number returns only a numeric value

			if ( $num_comments == 0 ) {
					$comments = esc_html__('No Comments','neder-core');
					$return = $comments;
			} elseif ( $num_comments > 1 ) {
					$comments = $num_comments . esc_html__(' Comments','neder-core');
					$return = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
			} else {
					$comments = esc_html__('1 Comment','neder-core');
					$return = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
			}
			return $return;
	}

	function neder_vc_get_only_num_comments() {
			$num_comments = get_comments_number(); // get_comments_number returns only a numeric value

			if ( $num_comments == 0 ) {
					$return = '<span>'.$num_comments.'</span>';
			} elseif ( $num_comments > 1 ) {
					$return = '<a href="' . get_comments_link() .'">'. $num_comments.'</a>';
			} else {
					$return = '<a href="' . get_comments_link() .'">'. $num_comments.'</a>';
			}
			return $return;
	}	
	
	
	/************************************************************/
	/************************** GET AUTHOR **********************/
	/************************************************************/
	
	function neder_vc_post_by() {
		$return = '<a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'display_name' ).'</a>';
		return $return;
	}

	/************************************************************/
	/************************** GET THUMBS **********************/
	/************************************************************/	
	
	function blogs_thumb($columns,$post_id) {
		global $post;
		$sidebar = get_post_meta( $post_id, 'neder-sidebar', true );
		if(!isset($sidebar) || $sidebar == '') : $sidebar = 'sidebar-none'; endif; 		
		if($columns == '1' && $sidebar != 'sidebar-none') :
			$return = neder_vc_thumbs('neder-vc-blog-medium');
		elseif($columns == '1') :
			$return = neder_vc_thumbs('neder-vc-blog-large');
		elseif($columns == '2' && $sidebar == 'sidebar-none') :
			$return = neder_vc_thumbs('neder-vc-blog-medium-no-sidebar');
		else :
			$return = neder_vc_thumbs('neder-vc-blog-small');
		endif;	
		return $return;
	}

	function blogs_thumb_type3($columns,$post_id) {
		global $post;
		$sidebar = get_post_meta( $post_id, 'neder-sidebar', true );
		if(!isset($sidebar) || $sidebar == '') : $sidebar = 'sidebar-none'; endif; 		
		if($columns == '1' && $sidebar != 'sidebar-none') :
			$return = neder_vc_thumbs('neder-vc-blog-medium-type3');
		elseif($columns == '1') :
			$return = neder_vc_thumbs('neder-vc-blog-medium-type3');
		elseif($columns == '2' && $sidebar == 'sidebar-none') :
			$return = neder_vc_thumbs('neder-vc-blog-medium-type3');
		else :
			$return = neder_vc_thumbs('neder-vc-blog-medium-type3');
		endif;	
		return $return;
	}

	
	/************************************************************/
	/************************* GET EXCERPT **********************/
	/************************************************************/
	function neder_blogs_excerpt($excerpt = 'default',$readmore = 'on') {
		global $post;
		if($excerpt == 'default') : 
			
			$return = get_the_excerpt();
		
		else :
		
			$return = substr(get_the_excerpt(), 0, $excerpt);
		
			if($readmore == 'on') :
		
				$return .= '<a class="article-read-more" href="'. get_permalink($post->ID) . '">'.esc_html__('Read More','neder-core').'</a>';
			
			else :
			
				$return .= '...';
			
			endif;
		
		endif;
		
		return $return;
	}

	/************************************************************/
	/************************* GET EXCERPT **********************/
	/************************************************************/
	function neder_vc_post_social() {
		
		$return = '<div class="container-social">
			<a target="_blank" href="http://www.facebook.com/sharer.php?u='.get_the_permalink().'&amp;t='.get_the_title().'" title="'.esc_html__('Click to share this post on Facebook','neder-core').'"><i class="nedericon fa-facebook"></i></a>
			<a target="_blank" href="http://twitter.com/home?status='.get_the_permalink().'" title="'.esc_html__('Click to share this post on Twitter','neder-core').'"><i class="nedericon fa-twitter"></i></a>
			<a target="_blank" href="https://plus.google.com/share?url='.get_the_permalink().'" title="'.esc_html__('Click to share this post on Google+','neder-core').'"><i class="nedericon fa-google-plus"></i></a>
			<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.get_the_permalink().'" title="'.esc_html__('Click to share this post on Linkedin','neder-core').'"><i class="nedericon fa-linkedin"></i></a></div>';
		
		return $return;
	}	
?>