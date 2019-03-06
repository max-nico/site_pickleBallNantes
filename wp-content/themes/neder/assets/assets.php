<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */



//********************************************************************************//
// CSS
//********************************************************************************//


// Frontend
add_action( 'wp_enqueue_scripts', 'neder_frontend_styles' );

function neder_frontend_styles() {
	global $neder_theme; 
	
	if($neder_theme['neder_min_assets']) :
	
		wp_enqueue_style( 'neder-style',  NEDER_CSS_URL . 'style.min.css' );
		wp_enqueue_style( 'owl-carousel',  NEDER_CSS_URL . 'owl.carousel.min.css' );
		wp_register_style( 'neder-vc-element',  NEDER_CSS_URL . 'vc_element.min.css' );
		
	else :
	
		wp_enqueue_style( 'bootstrap',  NEDER_CSS_URL . 'bootstrap.css' );
		wp_enqueue_style( 'neder-style',  NEDER_CSS_URL . 'style.css' );		
		wp_enqueue_style( 'neder-fonts',  NEDER_CSS_URL . 'fonts.css' );					
		wp_enqueue_style( 'owl-carousel',  NEDER_CSS_URL . 'owl.carousel.css' );
		wp_register_style( 'neder-vc-element',  NEDER_CSS_URL . 'vc_element.css' );
		
	endif;
	
	wp_enqueue_style( 'neder-dynamic',  NEDER_CSS_URL . 'dynamic.css' );
	
	
	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'neder-woocommerce',  NEDER_CSS_URL . 'woocommerce.css' );
	}
	if ( class_exists( 'bbPress' ) ) {
		wp_enqueue_style( 'neder-bbPress',  NEDER_CSS_URL . 'bbpress.css' );
	}
	if ( class_exists( 'BuddyPress' ) ) {
		wp_enqueue_style( 'neder-buddypress',  NEDER_CSS_URL . 'buddypress.css' );
	}	
}

//********************************************************************************//
// JS
//********************************************************************************//


// Frontend
add_action('wp_enqueue_scripts', 'neder_frontend_scripts');

function neder_frontend_scripts() {
	
	global $neder_theme;
	wp_enqueue_script('jquery-masonry');
	wp_enqueue_script('neder-main-js', NEDER_JS_URL . 'main.js', array('jquery'), '', true);
	if ( is_singular() ) : wp_enqueue_script( "comment-reply" ); endif;
	wp_enqueue_script('owl-carousel-script', NEDER_JS_URL . 'owl.carousel.min.js', array('jquery'), '', true);
	if($neder_theme['neder_lazy_load']) :
		wp_enqueue_script('neder-lazyload', NEDER_JS_URL . 'jquery.lazyload.min.js', array('jquery'), '', true);
		$lazyload_script = 'jQuery(document).ready(function($){
					$("img.neder-lazy-load").lazyload({
						effect : "fadeIn"
					});
		
					$(document).on(\'ajaxStop\', function() {
						$("img.neder-lazy-load").lazyload({
							effect: \'fadeIn\'
						});		
					});	

					$(\'.menu-item-object-category\').on(\'mouseover\', function() {
						$(".menu-item-object-category img.neder-lazy-load").lazyload({
							delay:0
						});		
					});
					
		});';
		wp_add_inline_script( 'neder-lazyload', $lazyload_script );
		
	endif;
	wp_localize_script('neder-main-js', 'ptajax', array( 
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	));
	
	/* RTL */	
	if ($neder_theme['rtl']) :  $rtl = 'rtl:true,'; else : $rtl = ''; endif;  
	/* #RTL */		
	if($neder_theme['neder_lazy_load']) : $lazyLoad = 'lazyLoad:true,'; else : $lazyLoad = ''; endif;
	
	$script = 'jQuery(document).ready(function($){
		$(\'.related-item-container\').owlCarousel({
				loop:true,
				margin:20,
				nav:true,
				'.$lazyLoad.'
				dots:true,
				autoplay: true,
				autoplayTimeout: 2000,
				speed:2000,
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
   wp_add_inline_script( 'owl-carousel-script', $script );
   
}