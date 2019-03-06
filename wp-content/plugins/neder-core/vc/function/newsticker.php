<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 
 
 class neder_newsticker_display_class_function extends neder_newsticker_display_class {
	public function neder_newsticker_display_function ( $attr ) {	
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
					"num_posts" 			=> '', 	
					"orderby" 				=> 'date',
					"order" 				=> 'DESC',		 			
					
					// OPTIONS					
					"autoplay"				=> ''						
					), 
					$attr)
		);	
		
		$return = '';
	
		/* RTL */	
		if ($neder_theme['rtl']) :  $rtl = 'rtl:true,'; else : $rtl = ''; endif;  
		/* #RTL */		
	
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_script( 'owl-carousel-script' );		
		if($autoplay == '') : $autoplay = '2000'; endif;
		
		/************************* SCRIPT LOAD **************************/
		
		wp_enqueue_style('neder-vc-element');	

		if($type == 'type1') { 					
					if(empty($num_posts)) : 
						$num_posts = 6; 
					endif;		
					$newsticker_layout_type = 'neder-newsticker-type1'; }
		if($type == 'type2') { 
					if(empty($num_posts)) : 
						$num_posts = 3; 
					endif;	
					$newsticker_layout_type = 'neder-newsticker-type2'; 					
		}
		if($type == 'type3') { 
					if(empty($num_posts)) : 
						$num_posts = 2; 
					endif;				
					$newsticker_layout_type = 'neder-newsticker-type3'; 
		}	
		$container_class = '';

		$post_id = get_the_id(); 
			
		// LOOP QUERY
		$query = neder_vc_query( $source,
								    $posts_source, 
								    $post_type, 
								    $categories,
								    $categories_post_type, 
								    $order, 
									$orderby, 
									'no', 
									'',
									$num_posts, 
									'' );
		
		$return .= '<div class="wpmp-clear"></div>';

		$loop = new WP_Query($query);
		
		if($type != 'type3') :
		
			if($loop->post_count === 1) :
				$return = '';
			else :
				$return = '<script type="text/javascript">jQuery(document).ready(function($){
							$(\'.neder-ticker-addon-'.$instance.'\').owlCarousel({
								loop:true,
								margin:0,
								nav:true,
								lazyLoad: false,
								dots:false,
								autoplay: true,
								smartSpeed: 2000,
								'.$rtl.'
								navText: [\'<i class="nedericon fa-angle-left"></i>\',\'<i class="nedericon fa-angle-right"></i>\'],
								autoplayTimeout: '.$autoplay.',
								responsive:{
										0:{
											items:1
										}							
									}
								});
							});</script>';
			endif;
		
			$return .= '<div class="neder-top-news-ticker-addon '.$newsticker_layout_type.' neder-ticker-addon-'.$instance.'">';
		
			if($loop) :
				while ( $loop->have_posts() ) : $loop->the_post();
			
					$id_post = get_the_id();
					$link = get_permalink(); 	
					
					/**********************************************************************/
					/******************************** TYPE 1 ******************************/
					/**********************************************************************/				
					if($type == 'type1') :
						$return .= '<div class="news-ticker-item">';
						
							$return .= '<div class="news-ticker-item-category">'.neder_category(1).'</div>';
							$return .= '<div class="news-ticker-item-title"><a href="'.$link.'">'.get_the_title().'</a></div>';
							
						$return .= '</div>';
					endif;

					/**********************************************************************/
					/******************************** TYPE 2 ******************************/
					/**********************************************************************/				
					if($type == 'type2') :
						$return .= '<div class="news-ticker-item">';
						
							$return .= '<div class="news-ticker-item-category">'.neder_category(1).'</div>';
							$return .= '<div class="news-ticker-item-title"><a href="'.$link.'">'.get_the_title().'</a></div>';
							
						$return .= '</div>';
					endif;
				
				endwhile;
			endif;	
	
			$return .= '</div>';
		

					/**********************************************************************/
					/******************************** TYPE 3 ******************************/
					/**********************************************************************/		
		
		else :

			wp_enqueue_script('neder-newsticker-js', NEDER_JS_URL . 'newsticker.js', array('jquery'), '', true);
			$return = '<script type="text/javascript">jQuery(document).ready(function($){
				$(\'#neder-top-news-ticker\').ticker({
														titleText: \''.esc_html__('Trending','neder-core').'\',
														'.$rtl.'
														pauseOnItems: '.$autoplay.'														
														});
			});</script>';		

			$return .= '<div class="neder-top-news-ticker neder-newsticker-type3"><ol id="neder-top-news-ticker" class="ticker">';
		
			if($loop) :
				while ( $loop->have_posts() ) : $loop->the_post();
			
					$id_post = get_the_id();
					$link = get_permalink(); 	
					
					$return .= '<li>';
					
						$return .= '<a class="news-ticker-item-title" href="'.$link.'">'.get_the_title().'</a>';
						
					$return .= '</li>';
		
				endwhile;
			endif;		
		
			$return .= '</ol></div>';		
			
		endif;

		wp_reset_query();
		return $return;	
	}
 }
 
 new neder_newsticker_display_class_function();		