<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 

# Walker Menu for Menu
class My_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = $class_category_id = '';
		if($item->type == 'taxonomy') : $category_id = $item->object_id; $class_category_id = 'neder-menu-item-category-id-'.$category_id.''; endif;

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . ' '.$class_category_id.'"';

		$output .= $indent . '<li ' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		
		if($item->type == 'taxonomy' && $item->classes[0] == 'mega-menu') : $category_id = $item->object_id; 
			$item_output .= neder_get_category_menu_posts($category_id);
		endif;
		if($item->type == 'taxonomy' && $item->classes[0] == 'mega-menu-carousel') : $category_id = $item->object_id; 
			$item_output .= neder_get_category_menu_carousel_posts($category_id,'header-desktop');
		endif;		

		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id = 0);
	}
}

# Walker Menu for Menu
class My_Walker_Nav_Menu_Sticky extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = $class_category_id = '';
		if($item->type == 'taxonomy') : $category_id = $item->object_id; $class_category_id = 'neder-menu-item-category-id-'.$category_id.''; endif;
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . ' '.$class_category_id.'"';

		$output .= $indent . '<li ' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		
		if($item->type == 'taxonomy' && $item->classes[0] == 'mega-menu') : $category_id = $item->object_id; 
			$item_output .= neder_get_category_menu_posts($category_id);
		endif;
		if($item->type == 'taxonomy' && $item->classes[0] == 'mega-menu-carousel') : $category_id = $item->object_id; 
			$item_output .= neder_get_category_menu_carousel_posts($category_id,'neder-header-sticky');
		endif;		

		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id = 0);
	}
}

function neder_get_category_menu_posts($category_id) {
			$item_output = '<div class="submenu neder-mega-menu">';
				 $item_menu_query_args = array(
					'post_type' 		=> 'post', 
					'cat' 				=> $category_id,
					'orderby'			=> 'date',
					'posts_per_page'	=> '4' 
				);
				$item_output .= '<div class="neder-menu-category neder-element-posts neder-posts-layout2">';
				$item_output .= '<div class="neder-menu-element-posts-container">';
				$item_menu_query = new WP_Query($item_menu_query_args);
				if ( $item_menu_query ) :
					while ( $item_menu_query->have_posts() ) : $item_menu_query->the_post(); 
					$link = get_permalink(); 
						$item_output .= '<article class="item-posts col-xs-3">';
							$item_output .= '<div class="article-image">';
								$item_output .= neder_thumbs('neder-vc-header-small');
								$item_output .= neder_check_format();
								$item_output .= '<div class="article-category">'.neder_category(1).'';
								$item_output .= '</div>';
								$item_output .= '<div class="article-info-top">';
									$item_output .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date().'</div>';
									$item_output .= '<div class="article-separator">|</div>';
									$item_output .= '<div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_get_num_comments().'</div>';
									$item_output .= '<div class="neder-clear"></div>';
								$item_output .= '</div>';								
							$item_output .= '</div>';
							$item_output .= '<div class="article-info">';
								$item_output .= '<div class="article-info-bottom">';	
									$item_output .= '<h3 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h3>';
									$item_output .= '<div class="neder-clear"></div>';	
								$item_output .= '</div>';
							$item_output .= '</div>';
						$item_output .= '</article>';
					endwhile;
				endif;
				wp_reset_query();
					$item_output .= '<div class="clearfix"></div>';
					$item_output .= '</div>';
					$item_output .= '<div class="neder-menu-category-all-category-posts">
										<span class="neder-link-menu-category">
											<a href="'.get_category_link($category_id).'">'.esc_html__('All Posts','neder').'</a>
											<a href="'.get_category_link($category_id).'"><i class="nedericon fa-plus"></i></a>
										</span>
									</div>';
					$item_output .= '<div class="clearfix"></div>';
				$item_output .= '</div>';
			$item_output .= '</div>';	
	return $item_output;
}

function neder_get_category_menu_carousel_posts($category_id,$type) {
	global $neder_theme;
	wp_enqueue_style( 'owl-carousel' );
	wp_enqueue_script( 'owl-carousel-script' );
	/* RTL */	
	if ($neder_theme['rtl']) :  $rtl = 'rtl:true,'; else : $rtl = ''; endif;  
	/* #RTL */	
	
	if($neder_theme['neder_lazy_load']) : $lazyLoad = 'lazyLoad:true,'; else : $lazyLoad = ''; endif;
	
			$script_menu_carousel = 'jQuery(document).ready(function($){
						$( ".'.$type.' .mega-menu-carousel.neder-menu-item-category-id-'.$category_id.'" ).mouseover(function() {
							$(\'.'.$type.' .neder-menu-element-carousel-posts-'.$category_id.'\').owlCarousel({
								loop:true,
								margin:25,
								nav:true,
								'.$lazyLoad.'
								dots:false,
								autoplay: false,
								'.$rtl.'
								navText: [\'<i class="nedericon fa-angle-left"></i>\',\'<i class="nedericon fa-angle-right"></i>\'],
								responsive:{
											0:{
												items:1
											},
											600:{
												items:2
											},										
											1000:{
												items:4
											}							
								}
							});
						});	
					});';	
			
			wp_add_inline_script( 'owl-carousel-script', $script_menu_carousel );			
			$item_output = '';	
			$item_output .= '<div class="submenu neder-mega-menu">';
				 $item_menu_query_args = array(
					'post_type' 		=> 'post', 
					'cat' 				=> $category_id,
					'orderby'			=> 'date',
					'posts_per_page'	=> '4' 
				);
				$item_output .= '<div class="neder-menu-category neder-menu-element-carousel-posts-'.$category_id.' neder-element-posts neder-posts-layout2">';
				$item_menu_query = new WP_Query($item_menu_query_args);
				if ( $item_menu_query ) :
					while ( $item_menu_query->have_posts() ) : $item_menu_query->the_post(); 
					$link = get_permalink(); 
						$item_output .= '<article class="item-posts">';
							$item_output .= '<div class="article-image">';
								$item_output .= neder_thumbs_nll('neder-vc-header-small');
								$item_output .= neder_check_format();
								$item_output .= '<div class="article-category">'.neder_category(1).'';
								$item_output .= '</div>';
								$item_output .= '<div class="article-info-top">';
									$item_output .= '<div class="article-data"><i class="nedericon fa-calendar-o"></i>'.get_the_date().'</div>';
									$item_output .= '<div class="article-separator">|</div>';
									$item_output .= '<div class="article-comments"><i class="nedericon fa-comment-o"></i>'.neder_get_num_comments().'</div>';
									$item_output .= '<div class="neder-clear"></div>';
								$item_output .= '</div>';								
							$item_output .= '</div>';
							$item_output .= '<div class="article-info">';
								$item_output .= '<div class="article-info-bottom">';	
									$item_output .= '<h3 class="article-title"><a href="'.$link.'">'.get_the_title().'</a></h3>';
									$item_output .= '<div class="neder-clear"></div>';	
								$item_output .= '</div>';
							$item_output .= '</div>';
						$item_output .= '</article>';
					endwhile;
				endif;
				wp_reset_query();
					$item_output .= '</div>';
					$item_output .= '<div class="neder-menu-category-all-category-posts">
										<span class="neder-link-menu-category">
											<a href="'.get_category_link($category_id).'">'.esc_html__('All Posts','neder').'</a>
											<a href="'.get_category_link($category_id).'"><i class="nedericon fa-plus"></i></a>
										</span>
									</div>';
					$item_output .= '<div class="clearfix"></div>';
			$item_output .= '</div>';	
	return $item_output;
}



# Walker Menu for Menu Mobile
class My_Walker_Nav_Menu_Mobile extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li ' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		if(in_array('menu-item-has-children', $item->classes)) { $item_output .= '<span class="nedericon fa-angle-down"></span><span class="nedericon fa-angle-up"></span>'; }
		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id = 0 );
	}
}