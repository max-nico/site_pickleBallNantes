<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */
 
 # Load Empty General Var 
 if(!isset($neder_theme['layout-type'])) : $neder_theme['layout-type'] = 'neder-fullwidth'; endif;
 if(!isset($neder_theme['layout-content'])) : $neder_theme['layout-content'] = 'neder-layout-default'; endif;
 if(!isset($neder_theme['preloader'])) : $neder_theme['preloader'] = true; endif;
 if(!isset($neder_theme['preloader-type'])) : $neder_theme['preloader-type'] = 'image'; endif; 
 if(!isset($neder_theme['preloader-image'])) : $neder_theme['preloader-image']['url'] = get_template_directory_uri().'/assets/img/preloader.png'; endif; 
 if(!isset($neder_theme['preloader-image-effect'])) : $neder_theme['preloader-image-effect'] = 'neder-bounce'; endif; 
 if(!isset($neder_theme['favicon']['url'])) : $neder_theme['favicon']['url'] = ''; endif;
 if(!isset($neder_theme['logo']['url'])) : $neder_theme['logo']['url'] = ''; endif;
 if(!isset($neder_theme['logo-mobile']['url'])) : $neder_theme['logo-mobile']['url'] = ''; endif;
 if(!isset($neder_theme['pagination'])) : $neder_theme['pagination'] = 'standard'; endif;
 if(!isset($neder_theme['bg-types'])) : $neder_theme['bg-types'] = 'color'; endif;
 if(!isset($neder_theme['bg-color']['rgba'])) : $neder_theme['bg-color']['rgba'] = 'rgba(255,255,255,1)'; endif;
 if(!isset($neder_theme['bg-pattern'])) : $neder_theme['bg-pattern'] = ''; endif;
 if(!isset($neder_theme['bg-image']['url'])) : $neder_theme['bg-image']['url'] = ''; endif;
 if(!isset($neder_theme['rtl'])) : $neder_theme['rtl'] = false; endif;
 if(!isset($neder_theme['header-slider'])) : $neder_theme['header-slider'] = false; endif;
 if(!isset($neder_theme['header-slider-position'])) : $neder_theme['header-slider-position'] = 'homepage'; endif;
 if(!isset($neder_theme['header-slider-shortcode'])) : $neder_theme['header-slider-shortcode'] = ''; endif;
 if(!isset($neder_theme['header-slider-container'])) : $neder_theme['header-slider-container'] = 'fullwidth'; endif;
 
 # Load Empty Header Var
 if(!isset($neder_theme['header-top-active'])) : $neder_theme['header-top-active'] = false; endif;
 if(!isset($neder_theme['header-date-format'])) : $neder_theme['header-date-format'] = 'l, F j, Y'; endif;
 if(!isset($neder_theme['news-ticker-style'])) : $neder_theme['news-ticker-style'] = 'style1'; endif;
 if(!isset($neder_theme['news-ticker-autoplay'])) : $neder_theme['news-ticker-autoplay'] = ''; endif;
 if(!isset($neder_theme['news-ticker-num-posts'])) : $neder_theme['news-ticker-num-posts'] = ''; endif;
 if(!isset($neder_theme['news-ticker-posts-source'])) : $neder_theme['news-ticker-posts-source'] = 'all_posts'; endif;
 if(!isset($neder_theme['news-ticker-categories'])) : $neder_theme['news-ticker-categories'] = ''; endif;
 if(!isset($neder_theme['news-ticker-order'])) : $neder_theme['news-ticker-order'] = 'DESC'; endif;
 if(!isset($neder_theme['news-ticker-orderby'])) : $neder_theme['news-ticker-orderby'] = 'date'; endif;
 if(!isset($neder_theme['type-header-top-right'])) : $neder_theme['type-header-top-right'] = 'social'; endif;
 if(!isset($neder_theme['header-login-register'])) : $neder_theme['header-login-register'] = '7'; endif;
 if(!isset($neder_theme['facebook'])) : $neder_theme['facebook'] = '#'; endif;
 if(!isset($neder_theme['twitter'])) : $neder_theme['twitter'] = '#'; endif;
 if(!isset($neder_theme['googleplus'])) : $neder_theme['googleplus'] = '#'; endif;
 if(!isset($neder_theme['instagram'])) : $neder_theme['instagram'] = '#'; endif;
 if(!isset($neder_theme['linkedin'])) : $neder_theme['linkedin'] = '#'; endif;
 if(!isset($neder_theme['vimeo'])) : $neder_theme['vimeo'] = '#'; endif;
 if(!isset($neder_theme['youtube'])) : $neder_theme['youtube'] = '#'; endif;
 if(!isset($neder_theme['top-menu'])) : $neder_theme['top-menu'] = ''; endif;
 if(!isset($neder_theme['header-top-order'])) : 
	$neder_theme['header-top-order'] = Array( 'enabled' => Array ( 	'placebo' => 'placebo',
																			'newsticker' 	=> 'News Ticker',
																			'date' 			=> 'Date',
																			'menu-social' 	=> 'Menu/Social',
																			'login' 		=> 'Login/Register'
																),
													'disable' => Array ( 'placebo' => 'placebo' )			
											);
 endif; 
 if(!isset($neder_theme['header-top-align'])) : $neder_theme['header-top-align'] = 'default'; endif;
 if(!isset($neder_theme['header-middle-logo-potision'])) : $neder_theme['header-middle-logo-potision'] = 'center'; endif;
 if(!isset($neder_theme['header-middle-bg-types'])) : $neder_theme['header-middle-bg-types'] = 'color'; endif;
 if(!isset($neder_theme['header-middle-bg-color'])) : $neder_theme['header-middle-bg-color'] = '#000000'; endif;
 if(!isset($neder_theme['header-middle-bg-pattern'])) : $neder_theme['header-middle-bg-pattern'] = ''; endif;
 if(!isset($neder_theme['header-middle-bg-image'])) : $neder_theme['header-middle-bg-image']['url'] = ''; endif;
 if(!isset($neder_theme['search'])) : $neder_theme['search'] = true; endif;
 if(!isset($neder_theme['header-menu-align'])) : $neder_theme['header-menu-align'] = 'neder-menu-left'; endif;
 if(!isset($neder_theme['header-menu-style'])) : $neder_theme['header-menu-style'] = 'neder-menu-style2'; endif;
 if(!isset($neder_theme['header-order'])) : 
	$neder_theme['header-order'] = Array( 'enabled' => Array ( 	'placebo' => 'placebo',
																	'header-top' => 'Header Top',
																	'header-middle' => 'Header Middle',
																	'header-bottom' => 'Header Bottom'
																)
											); 
 endif;
 if(!isset($neder_theme['header-sticky'])) : $neder_theme['header-sticky'] = true; endif;
 if(!isset($neder_theme['header-sticky-logo-position'])) : $neder_theme['header-sticky-logo-position'] = 'left'; endif;
 if(!isset($neder_theme['logo-sticky'])) : $neder_theme['logo-sticky']['url'] = ''; endif;
 
 # Load Empty Footer Var
 if(!isset($neder_theme['footer-top-active'])) : $neder_theme['footer-top-active'] = false; endif;
 if(!isset($neder_theme['footer-top-widget'])) : $neder_theme['footer-top-widget'] = 'footer-top-widget-3'; endif;
 if(!isset($neder_theme['back-to-top'])) : $neder_theme['back-to-top'] = true; endif;
 if(!isset($neder_theme['footer-bottom-active'])) : $neder_theme['footer-bottom-active'] = true; endif;
 if(!isset($neder_theme['footer-bottom-type'])) : 
	$neder_theme['footer-bottom-type'] = Array( 'enabled' => Array ( 	'placebo' => 'placebo',
																			'text' => 'Text',
																			'menu' => 'Menu'
																),
													'disable' => Array ( 'placebo' => 'placebo', 'social' => 'Social' )			
											);
 endif;
 if(!isset($neder_theme['footer-text'])) : $neder_theme['footer-text'] = ''; endif;
 if(!isset($neder_theme['footer-facebook'])) : $neder_theme['footer-facebook'] = '#'; endif;
 if(!isset($neder_theme['footer-twitter'])) : $neder_theme['footer-twitter'] = '#'; endif;
 if(!isset($neder_theme['footer-googleplus'])) : $neder_theme['footer-googleplus'] = '#'; endif;
 if(!isset($neder_theme['footer-instagram'])) : $neder_theme['footer-instagram'] = '#'; endif;
 if(!isset($neder_theme['footer-linkedin'])) : $neder_theme['footer-linkedin'] = '#'; endif;
 if(!isset($neder_theme['footer-vimeo'])) : $neder_theme['footer-vimeo'] = '#'; endif;
 if(!isset($neder_theme['footer-youtube'])) : $neder_theme['footer-youtube'] = '#'; endif;
 if(!isset($neder_theme['footer-top-menu'])) : $neder_theme['footer-top-menu'] = ''; endif;
 if(!isset($neder_theme['footer-image-background-active'])) : $neder_theme['footer-image-background-active'] = false; endif;
 
 # Load Empty Post Var
 if(!isset($neder_theme['neder_panel_post_sidebar'])) : $neder_theme['neder_panel_post_sidebar'] = 'sidebar-right'; endif;
 if(!isset($neder_theme['neder_panel_post_sidebar_name'])) : $neder_theme['neder_panel_post_sidebar_name'] = 'neder-default'; endif;
 if(!isset($neder_theme['neder_panel_post_layout'])) : $neder_theme['neder_panel_post_layout'] = 'neder-post-layout1'; endif;
 if(!isset($neder_theme['neder_panel_post_social_share'])) : $neder_theme['neder_panel_post_social_share'] = false; endif;
 if(!isset($neder_theme['neder_panel_post_pagination'])) : $neder_theme['neder_panel_post_pagination'] = true; endif;
 if(!isset($neder_theme['neder_panel_post_author_bio'])) : $neder_theme['neder_panel_post_author_bio'] = 'hidden'; endif;
 if(!isset($neder_theme['neder_panel_post_related_posts'])) : $neder_theme['neder_panel_post_related_posts'] = false; endif;
 if(!isset($neder_theme['neder_panel_post_article_info'])) : $neder_theme['neder_panel_post_article_info'] = false; endif;
 if(!isset($neder_theme['neder_panel_post_show_tags'])) : $neder_theme['neder_panel_post_show_tags'] = true; endif;
 
 # Load Empty General Var 
 if(!isset($neder_theme['neder_panel_404_sidebar_position'])) : $neder_theme['neder_panel_404_sidebar_position'] = 'sidebar-right'; endif;
 if(!isset($neder_theme['neder_panel_archive_sidebar_position'])) : $neder_theme['neder_panel_archive_sidebar_position'] = 'sidebar-right'; endif;
 if(!isset($neder_theme['neder_panel_archive_layout'])) : $neder_theme['neder_panel_archive_layout'] = 'neder-posts-layout1'; endif;
 if(!isset($neder_theme['neder_panel_archive_columns'])) : $neder_theme['neder_panel_archive_columns'] = '2'; endif;
 if(!isset($neder_theme['neder_panel_archive_layout_type'])) : $neder_theme['neder_panel_archive_layout_type'] = 'grid'; endif;
 if(!isset($neder_theme['neder_panel_author_sidebar_position'])) : $neder_theme['neder_panel_author_sidebar_position'] = 'sidebar-right'; endif;
 if(!isset($neder_theme['neder_panel_author_layout'])) : $neder_theme['neder_panel_author_layout'] = 'neder-posts-layout1'; endif;
 if(!isset($neder_theme['neder_panel_author_columns'])) : $neder_theme['neder_panel_author_columns'] = '2'; endif;
 if(!isset($neder_theme['neder_panel_author_layout_type'])) : $neder_theme['neder_panel_author_layout_type'] = 'grid'; endif;
 if(!isset($neder_theme['neder_panel_category_sidebar_position'])) : $neder_theme['neder_panel_category_sidebar_position'] = 'sidebar-right'; endif;
 if(!isset($neder_theme['neder_panel_category_layout'])) : $neder_theme['neder_panel_category_layout'] = 'neder-posts-layout1'; endif;
 if(!isset($neder_theme['neder_panel_category_columns'])) : $neder_theme['neder_panel_category_columns'] = '2'; endif;
 if(!isset($neder_theme['neder_panel_category_layout_type'])) : $neder_theme['neder_panel_category_layout_type'] = 'grid'; endif;
 if(!isset($neder_theme['neder_panel_category_description'])) : $neder_theme['neder_panel_category_description'] = 'off'; endif;
 if(!isset($neder_theme['neder_panel_image_sidebar_position'])) : $neder_theme['neder_panel_image_sidebar_position'] = 'sidebar-right'; endif;
 if(!isset($neder_theme['neder_panel_search_sidebar_position'])) : $neder_theme['neder_panel_search_sidebar_position'] = 'sidebar-right'; endif;
 if(!isset($neder_theme['neder_panel_search_layout'])) : $neder_theme['neder_panel_search_layout'] = 'neder-posts-layout1'; endif;
 if(!isset($neder_theme['neder_panel_search_columns'])) : $neder_theme['neder_panel_search_columns'] = '2'; endif;
 if(!isset($neder_theme['neder_panel_search_layout_type'])) : $neder_theme['neder_panel_search_layout_type'] = 'grid'; endif;
 if(!isset($neder_theme['neder_panel_tag_sidebar_position'])) : $neder_theme['neder_panel_tag_sidebar_position'] = 'sidebar-right'; endif;
 if(!isset($neder_theme['neder_panel_tag_layout'])) : $neder_theme['neder_panel_tag_layout'] = 'neder-posts-layout1'; endif;
 if(!isset($neder_theme['neder_panel_tag_columns'])) : $neder_theme['neder_panel_tag_columns'] = '2'; endif;
 if(!isset($neder_theme['neder_panel_tag_layout_type'])) : $neder_theme['neder_panel_tag_layout_type'] = 'grid'; endif;
 
 # Load Empty Style Var 
 if(!isset($neder_theme['preset'])) : $neder_theme['preset'] = 'default'; endif;
 if(!isset($neder_theme['main-color'])) : $neder_theme['main-color'] = '#6a84a4'; endif;
 if(!isset($neder_theme['secondary-color'])) : $neder_theme['secondary-color'] = '#4d627b'; endif;
 if(!isset($neder_theme['header_top_background'])) : $neder_theme['header_top_background'] = '#000000'; endif;
 if(!isset($neder_theme['header_top_text'])) : $neder_theme['header_top_text'] = '#1e73be'; endif;
 if(!isset($neder_theme['header_top_line'])) : $neder_theme['header_top_line'] = '#ffffff'; endif;
 if(!isset($neder_theme['header_bottom_background'])) : $neder_theme['header_bottom_background'] = '#ffffff'; endif;
 if(!isset($neder_theme['header_bottom_line'])) : $neder_theme['header_bottom_line'] = '#ffffff'; endif;
 if(!isset($neder_theme['header_bottom_text_menu'])) : $neder_theme['header_bottom_text_menu'] = '#6a84a4'; endif;
 if(!isset($neder_theme['header_bottom_main_text_menu'])) : $neder_theme['header_bottom_main_text_menu'] = '#333333'; endif;
 if(!isset($neder_theme['header_bottom_text_submenu'])) : $neder_theme['header_bottom_text_submenu'] = '#333333'; endif;
 if(!isset($neder_theme['header_bottom_background_submenu'])) : $neder_theme['header_bottom_background_submenu'] = '#FFFFFF'; endif;
 if(!isset($neder_theme['header_bottom_border_submenu'])) : $neder_theme['header_bottom_border_submenu'] = '#f4f4f4'; endif;
 if(!isset($neder_theme['content_background'])) : $neder_theme['content_background'] = '#FFFFFF'; endif;
 if(!isset($neder_theme['content_title'])) : $neder_theme['content_title'] = '#333333'; endif;
 if(!isset($neder_theme['content_text'])) : $neder_theme['content_text'] = '#747474'; endif;
 if(!isset($neder_theme['content_text_info'])) : $neder_theme['content_text_info'] = '#646464'; endif;
 if(!isset($neder_theme['content_navigation_background'])) : $neder_theme['content_navigation_background'] = '#f4f4f4'; endif;
 if(!isset($neder_theme['content_post'])) : $neder_theme['content_post'] = '#ffffff'; endif;
 if(!isset($neder_theme['footer_top_background'])) : $neder_theme['footer_top_background'] = '#282828'; endif;
 if(!isset($neder_theme['footer_top_title'])) : $neder_theme['footer_top_title'] = '#FFFFFF'; endif;
 if(!isset($neder_theme['footer_top_text'])) : $neder_theme['footer_top_text'] = '#949494'; endif;
 if(!isset($neder_theme['footer_top_line'])) : $neder_theme['footer_top_line'] = '#333333'; endif;
 if(!isset($neder_theme['footer_bottom_background'])) : $neder_theme['footer_bottom_background'] = '#000000'; endif;
 if(!isset($neder_theme['footer_bottom_text'])) : $neder_theme['footer_bottom_text'] = '#b7b7b7'; endif;
 if(!isset($neder_theme['footer_bottom_line'])) : $neder_theme['footer_bottom_line'] = '#333333'; endif;
 if(!isset($neder_theme['main-typography'])) : $neder_theme['main-typography'] = array('font-style' => '','font-family' => 'lato', 'font-weight' => '', 'subsets' => '', 'google' => false); endif;
 if(!isset($neder_theme['p-typography'])) : $neder_theme['p-typography'] = array('font-style' => '','font-family' => 'lato', 'font-weight' => '', 'subsets' => '', 'google' => false); endif; 
 
 # Load Empty ADV Var 
 if(!isset($neder_theme['advertisement-top'])) : $neder_theme['advertisement-top'] = false; endif;
 if(!isset($neder_theme['advertisement-top-type'])) : $neder_theme['advertisement-top-type'] = 'banner-image'; endif;
 if(!isset($neder_theme['advertisement-top-banner'])) : $neder_theme['advertisement-top-banner']['url'] = ''; endif;
 if(!isset($neder_theme['advertisement-top-banner-link'])) : $neder_theme['advertisement-top-banner-link'] = '#'; endif;
 if(!isset($neder_theme['advertisement-top-banner-link-target'])) : $neder_theme['advertisement-top-banner-link-target'] = '_blank'; endif;
 if(!isset($neder_theme['advertisement-top-banner-custom-code'])) : $neder_theme['advertisement-top-banner-custom-code'] = ''; endif;
 if(!isset($neder_theme['advertisement-content'])) : $neder_theme['advertisement-content'] = 'all'; endif;
 if(!isset($neder_theme['advertisement-content-bottom-type'])) : $neder_theme['advertisement-content-bottom-type'] = 'banner-image'; endif;
 if(!isset($neder_theme['advertisement-content-banner'])) : $neder_theme['advertisement-content-banner']['url'] = ''; endif;
 if(!isset($neder_theme['advertisement-content-banner-link'])) : $neder_theme['advertisement-content-banner-link'] = '#'; endif;
 if(!isset($neder_theme['advertisement-content-banner-link-target'])) : $neder_theme['advertisement-content-banner-link-target'] = '_blank'; endif;
 if(!isset($neder_theme['advertisement-content-bottom-banner-custom-code'])) : $neder_theme['advertisement-content-bottom-banner-custom-code'] = ''; endif;
 if(!isset($neder_theme['advertisement-content-top'])) : $neder_theme['advertisement-content-top'] = 'disable'; endif;
 if(!isset($neder_theme['advertisement-content-top-type'])) : $neder_theme['advertisement-content-top-type'] = 'banner-image'; endif;
 if(!isset($neder_theme['advertisement-content-top-banner'])) : $neder_theme['advertisement-content-top-banner']['url'] = ''; endif;
 if(!isset($neder_theme['advertisement-content-top-banner-link'])) : $neder_theme['advertisement-content-top-banner-link'] = '#'; endif;
 if(!isset($neder_theme['advertisement-content-top-banner-link-target'])) : $neder_theme['advertisement-content-top-banner-link-target'] = '_blank'; endif;
 if(!isset($neder_theme['advertisement-content-top-banner-custom-code'])) : $neder_theme['advertisement-content-top-banner-custom-code'] = ''; endif;
 if(!isset($neder_theme['advertisement-footer'])) : $neder_theme['advertisement-footer'] = false; endif;
 if(!isset($neder_theme['advertisement-footer-type'])) : $neder_theme['advertisement-footer-type'] = 'banner-image'; endif;
 if(!isset($neder_theme['advertisement-footer-banner'])) : $neder_theme['advertisement-footer-banner']['url'] = ''; endif;
 if(!isset($neder_theme['advertisement-footer-banner-link'])) : $neder_theme['advertisement-footer-banner-link'] = '#'; endif;
 if(!isset($neder_theme['advertisement-footer-banner-link-target'])) : $neder_theme['advertisement-footer-banner-link-target'] = '_blank'; endif;
 if(!isset($neder_theme['advertisement-footer-banner-custom-code'])) : $neder_theme['advertisement-footer-banner-custom-code'] = ''; endif; 
 
 # Load Empty Sidebar Var
 if(!isset($neder_theme['custom-sidebar-name'])) : $neder_theme['custom-sidebar-name'] = ''; endif;

 # Load Empty Slide Panel Var
 if(!isset($neder_theme['slide_panel_position'])) : $neder_theme['slide_panel_position'] = 'none'; endif; 
 if(!isset($neder_theme['slide_panel_sidebar'])) : $neder_theme['slide_panel_sidebar'] = ''; endif; 
 
 # Load Empty WooCommerce Var
 if(!isset($neder_theme['neder_woocommerce_sidebar_position'])) : $neder_theme['neder_woocommerce_sidebar_position'] = 'sidebar-right'; endif; 
 if(!isset($neder_theme['neder_woocommerce_add_to_cart'])) : $neder_theme['neder_woocommerce_add_to_cart'] = false; endif;

 # Load Empty bbPress Var
 if(!isset($neder_theme['neder_bbpress_sidebar_position'])) : $neder_theme['neder_bbpress_sidebar_position'] = 'sidebar-right'; endif; 
 if(!isset($neder_theme['neder_bbpress_sidebar_name'])) : $neder_theme['neder_bbpress_sidebar_name'] = 'neder-bbpress'; endif;

 # Load Empty BuddyPress Var
 if(!isset($neder_theme['neder_buddypress_sidebar_position'])) : $neder_theme['neder_buddypress_sidebar_position'] = 'sidebar-right'; endif; 
 if(!isset($neder_theme['neder_buddypress_sidebar_name'])) : $neder_theme['neder_buddypress_sidebar_name'] = 'neder-buddypress'; endif;

 # Load Empty Custom Code Var 
 if(!isset($neder_theme['css-custom-code'])) : $neder_theme['css-custom-code'] = ''; endif;
 if(!isset($neder_theme['js-custom-code'])) : $neder_theme['js-custom-code'] = ''; endif;

 # Load Empty Speed Site
 if(!isset($neder_theme['neder_lazy_load'])) : $neder_theme['neder_lazy_load'] = false; endif;
 if(!isset($neder_theme['neder_min_assets'])) : $neder_theme['neder_min_assets'] = false; endif;
 
?>