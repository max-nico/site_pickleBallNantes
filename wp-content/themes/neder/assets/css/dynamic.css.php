<?php
	//prevent direct access
	header('Content-type: text/css');
	global $neder_theme;
	
	/* Color Preset */
	$preset = $neder_theme['preset'];
	if(!isset($preset)) : $preset = 'default'; endif;
	if(!isset($neder_theme['bg-types'])) : $neder_theme['bg-types'] = 'color'; endif;
	if(!isset($neder_theme['header-middle-bg-types'])) : $neder_theme['header-middle-bg-types'] = 'color'; endif;
	if($preset == 'default') : 
		$main_color = '#6a84a4';
		$secondary_color = '#4d627b';
		
		$header_top_background 	= '#000000';
		$header_top_text 		= '#1e73be';
		$header_top_line 		= '#ffffff';
		
		$header_bottom_background 	= '#ffffff';		
		$header_bottom_line 		= '#ffffff';		
		
		$header_bottom_text_menu 			= '#6a84a4';
		$header_bottom_main_text_menu 		= '#333333';
		$header_bottom_text_submenu 		= '#333333';
		$header_bottom_background_submenu 	= '#FFFFFF';
		$header_bottom_border_submenu		= '#f4f4f4';
		
		$content_background 			= '#FFFFFF';
		$content_title 					= '#333333';
		$content_text					= '#747474';
		$content_text_info 				= '#646464';		
		$content_navigation_background 	= '#f4f4f4';		
		$content_post 					= '#ffffff';		
		
		$footer_top_background			= '#282828';
		$footer_top_title				= '#FFFFFF';
		$footer_top_text				= '#949494';
		$footer_top_line				= '#333333';
		
		$footer_bottom_background		= '#000000';
		$footer_bottom_text				= '#b7b7b7';
		$footer_bottom_line				= '#333333';
		
	endif;
	
	if($preset == 'custom') :
		$main_color = $neder_theme['main-color']; // #e7685d
		$secondary_color = $neder_theme['secondary-color']; // ##c9564c
		
		$header_top_background 	= $neder_theme['header_top_background'];
		$header_top_text 		= $neder_theme['header_top_text'];
		$header_top_line 		= $neder_theme['header_top_line'];
		
		$header_bottom_background 	= $neder_theme['header_bottom_background'];		
		$header_bottom_line 		= $neder_theme['header_bottom_line'];		
		
		$header_bottom_text_menu 			= $neder_theme['header_bottom_text_menu'];
		$header_bottom_main_text_menu 		= $neder_theme['header_bottom_main_text_menu'];
		$header_bottom_text_submenu 		= $neder_theme['header_bottom_text_submenu'];
		$header_bottom_background_submenu 	= $neder_theme['header_bottom_background_submenu'];
		$header_bottom_border_submenu		= $neder_theme['header_bottom_border_submenu'];
		$header_bottom_text_menu 			= $neder_theme['header_bottom_text_menu'];
		
		
		$content_background 			= $neder_theme['content_background'];
		$content_title 					= $neder_theme['content_title'];
		$content_text					= $neder_theme['content_text'];
		$content_text_info 				= $neder_theme['content_text_info'];		
		$content_navigation_background 	= $neder_theme['content_navigation_background'];		
		$content_post 					= $neder_theme['content_post'];		
		
		$footer_top_background			= $neder_theme['footer_top_background'];
		$footer_top_title				= $neder_theme['footer_top_title'];
		$footer_top_text				= $neder_theme['footer_top_text'];
		$footer_top_line				= $neder_theme['footer_top_line'];
		
		$footer_bottom_background		= $neder_theme['footer_bottom_background'];
		$footer_bottom_text				= $neder_theme['footer_bottom_text'];
		$footer_bottom_line				= $neder_theme['footer_bottom_line'];
		
	endif;
	
?>	
	<?php if($neder_theme['bg-types'] == 'image') : ?>
    
        body {
            background-image:url('<?php echo esc_url($neder_theme['bg-image']['url']);?>');
        	background-attachment:fixed;
			background-size:cover;
        }
    
	<?php 
	elseif ($neder_theme['bg-types'] == 'color') : 
	
	if(empty($neder_theme['bg-color']['rgba'])) : $neder_theme['bg-color']['rgba'] = '#FFFFFF'; endif;
	
	?>
    body {
    	background-color:<?php echo esc_html($neder_theme['bg-color']['rgba']); ?>;
    }	
	
	<?php else : ?>
	
    body {
    	background-image:url(<?php echo NEDER_URL . 'assets/img/patterns/'.$neder_theme['bg-pattern'].''; ?>);
    	background-repeat:repeat;
    }
	
	<?php endif; ?>
	

    
    <?php // Font Family ?>
    body,
	.comment-name {
    	font-family:<?php echo esc_html($neder_theme['main-typography']['font-family']); ?>;
    }
	p,
	.neder-footer-top .widget_text .textwidget,
	.author-post-container .author-description,
	ul.neder_arrow,
	.neder-post ul,
	.neder-post ol,
	.neder-page ul,
	.neder-page ol	{
		font-family:<?php echo esc_html($neder_theme['p-typography']['font-family']); ?>;
	}
	
	/* Header Middle Background */
	<?php if($neder_theme['header-middle-bg-types'] == 'image') : ?>
    
        .neder-header-middle {
            background-image:url('<?php echo esc_url($neder_theme['header-middle-bg-image']['url']);?>');
			background-size:cover;
        }
		.neder-header-middle .neder-wrap-container {
			background:none;
		}
    
	<?php 
	elseif ($neder_theme['header-middle-bg-types'] == 'color') : 
	if(empty($neder_theme['header-middle-bg-color']['rgba'])) : $neder_theme['header-middle-bg-color']['rgba'] = '#FFFFFF'; endif;
	
	?>
    .neder-header-middle,
	.neder-header-middle .neder-wrap-container {
    	background-color:<?php echo esc_html($neder_theme['header-middle-bg-color']['rgba']); ?>;
    }	
	
	<?php else : ?>
	
    .neder-header-middle {
    	background-image:url(<?php echo NEDER_URL . 'assets/img/patterns/'.$neder_theme['header-middle-bg-pattern'].''; ?>);
    	background-repeat:repeat;
    }
	
	<?php endif; ?>
	
	
.neder-wrap-container {
	background:<?php echo esc_html($content_background); ?>;
}
.neder-header-top,
.neder-header-top .neder-wrap-container {
	background:<?php echo esc_html($header_top_background); ?>;
}
.neder-header-bottom,
.neder-header-bottom .neder-wrap-container {
	background:<?php echo esc_html($header_bottom_background); ?>;
	border-bottom: 2px solid <?php echo esc_html($main_color); ?>;
}
body,
p {
	color:<?php echo esc_html($content_text); ?>;
}
h1, h2, h3, h4, h5, h6 {
	color:<?php echo esc_html($content_title); ?>;
}
h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
	color:<?php echo esc_html($content_title); ?>;
}
a {
	color:<?php echo esc_html($secondary_color); ?>;
}
a:hover,
a:focus {
	color:<?php echo esc_html($main_color); ?>;
}
#preloader-container {
	background:<?php echo esc_html($content_background); ?>;
}
.cssload-thecube .cssload-cube:before {
	background:<?php echo esc_html($main_color); ?>;
}
.neder-top-menu li a {
    color: <?php echo esc_html($header_top_text); ?>;
}
.neder-top-menu li a:hover {
    color: <?php echo esc_html($main_color); ?>;
}
.header-mobile .neder-logo {
	background:<?php echo esc_html($header_bottom_background); ?>;
}
.header-mobile .news-ticker-item .news-ticker-item-title a {
    color: <?php echo esc_html($header_top_text); ?>;
}
.header-mobile .neder-ticker {
    background: <?php echo esc_html($header_top_background); ?>;
    border-top: 1px solid <?php echo esc_html($header_top_line); ?>;
}
.neder-header-sticky {
	background: <?php echo esc_html($header_bottom_background); ?>;
	border-bottom: 2px solid <?php echo esc_html($main_color); ?>;
}
.neder-header-sticky .neder-wrap-container {
	background:<?php echo esc_html($header_bottom_background); ?>;
}
.neder-header-sticky nav > ul {
	border-right:1px solid <?php echo esc_html($header_bottom_line); ?>;
}
nav > ul {
	border-left: 1px solid <?php echo esc_html($header_bottom_line); ?>;
}
.neder-rtl nav > ul {
	border-right: 1px solid <?php echo esc_html($header_bottom_line); ?>;
}
nav ul li.current_page_item,
nav ul li.current-menu-item,
nav li ul.submenu li.current-menu-item,
nav ul li.current-menu-ancestor,
nav li ul.submenu li.current-menu-ancestor {
    background: <?php echo esc_html($main_color); ?>;	
}
nav ul li.current_page_item > a,
nav ul li.current-menu-item > a,
nav li ul.submenu li.current-menu-item > a,
nav ul li.current-menu-ancestor > a,
nav li ul.submenu li.current-menu-ancestor > a {
	color:<?php echo esc_html($header_bottom_text_menu); ?>;
}
nav ul li a {
	color:<?php echo esc_html($header_bottom_main_text_menu); ?>;
}
nav ul li a:hover {
	color:<?php echo esc_html($header_bottom_text_menu); ?>;
	background: <?php echo esc_html($main_color); ?>;
}
ul.submenu,
.submenu {
	border:1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
	border-top:2px solid <?php echo esc_html($main_color); ?>;
}
ul.submenu .submenu {
	border-top:1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
ul.submenu li:first-child .submenu {
	border-top:1px solid <?php echo esc_html($main_color); ?>;
}
nav li ul.submenu li a {
	color:<?php echo esc_html($header_bottom_text_submenu); ?>;
}
nav li ul.submenu li a:hover {
	color:<?php echo esc_html($header_bottom_text_menu); ?>;
}
nav li ul.submenu li {
	background:<?php echo esc_html($header_bottom_background_submenu); ?>;
	border-bottom:1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.open-menu-responsive,
.close-menu-responsive {
	color:<?php echo esc_html($content_post); ?>;
	background:<?php echo esc_html($main_color); ?>;
}
.menu-responsive > ul {
	border-bottom:0;
}
.menu-responsive li a {
	color:<?php echo esc_html($header_bottom_text_submenu); ?>;
}
.menu-responsive li a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.header-mobile .menu-responsive-container .submenu {
    border-top: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
	border-left:0;
	border-right:0;
}
.menu-responsive li {
	background: <?php echo esc_html($header_bottom_border_submenu); ?>;
    border-bottom: 1px solid <?php echo esc_html($header_bottom_background_submenu); ?>;
}
.header-mobile .menu-responsive-container .submenu > li.menu-item-has-children > a:after {
	color: <?php echo esc_html($header_bottom_text_menu); ?>;
}
.neder-menu .menu-item-object-category .neder-mega-menu {
	background:<?php echo esc_html($header_bottom_background_submenu); ?>;
	border-bottom: 2px solid <?php echo esc_html($main_color); ?>;
}
.neder-mega-menu .neder-menu-element-posts-container .article-title a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-mega-menu .neder-menu-category-all-category-posts i {
	background:<?php echo esc_html($main_color); ?>;
	color:<?php echo esc_html($content_post); ?>;
}
.neder-menu-category-all-category-posts {
	border-top:1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.neder-menu-category-all-category-posts .neder-link-menu-category a {
	color:<?php echo esc_html($header_bottom_text_submenu); ?>;
}
.neder-menu-category-all-category-posts .neder-link-menu-category:hover a:first-child {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-mega-menu .neder-menu-category.owl-carousel.owl-theme .owl-controls .owl-nav [class*="owl-"] {
    border: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
	background:none;
	color: <?php echo esc_html($header_bottom_text_submenu); ?>;
}
.neder-mega-menu .neder-element-posts.owl-carousel.owl-theme article .article-title a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-mega-menu .neder-menu-category.owl-carousel.owl-theme .owl-controls .owl-nav .owl-prev:hover,
.neder-mega-menu .neder-menu-category.owl-carousel.owl-theme .owl-controls .owl-nav .owl-next:hover {
	background:<?php echo esc_html($main_color); ?>;
	border:1px solid <?php echo esc_html($main_color); ?>;
	color:<?php echo esc_html($content_post); ?>;
}
.neder-menu .neder-element-posts .article-title a {
	color:<?php echo esc_html($header_bottom_text_submenu); ?>;
}
.neder-search button {
	background: <?php echo esc_html($main_color); ?>;
}
.neder-search button:hover {
	background: <?php echo esc_html($secondary_color); ?>;
	color: <?php echo esc_html($content_post); ?>;
}
.neder-search button .fa-search,
.neder-search button .fa-search:hover {
	color: <?php echo esc_html($content_post); ?>;
}
.nedericon.fa-search {
	color: <?php echo esc_html($header_bottom_main_text_menu); ?>;
}
.nedericon.fa-search:hover, .nedericon.fa-close {
    color:<?php echo esc_html($header_bottom_text_menu); ?>;
}
 .nedericon.fa-close {
    background:<?php echo esc_html($main_color); ?>;
}
.nedericon.fa-search:hover {
	background:<?php echo esc_html($main_color); ?>;
}
.nedericon.fa-search:focus {
	background:<?php echo esc_html($main_color); ?>;
}
.neder-menu-style2 .nedericon.fa-search:hover, 
.neder-menu-style2 .nedericon.fa-search:focus,
.neder-menu-style2 .nedericon.fa-close {
	background:none;
}
.neder-search-menu-button {
    border-right: 1px solid <?php echo esc_html($header_bottom_line); ?>;
}
.neder-rtl .neder-search-menu-button {
    border-left: 1px solid <?php echo esc_html($header_bottom_line); ?>;
}
.neder-search form {
    border: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
	background:<?php echo esc_html($header_bottom_background_submenu); ?>;
}
.neder-search form {
	border-top:0;
}
.form-group-search {
    background: <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.neder-title-page-container {
	border-bottom: 2px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
 }
.neder-title-page {
	color: <?php echo esc_html($content_title); ?>;
	border-bottom: 2px solid <?php echo esc_html($main_color); ?>;
}
.neder-category-description {
	background: <?php echo esc_html($content_navigation_background); ?>;
}
.author-post-container .author-post {
    background: <?php echo esc_html($content_navigation_background); ?>;
}
.author-post-container .author-name a {
    color: <?php echo esc_html($content_title); ?>;
}
.author-post-container .author-description,
.flonews-login-register .flonews-login-register-logged a,
.flonews-login-register .flonews-login-register-logout a {
	color: <?php echo esc_html($content_text); ?>;
}
.flonews-login-register .flonews-login-register-logged a:hover,
.flonews-login-register .flonews-login-register-logout a:hover {
	color: <?php echo esc_html($main_color); ?>;
}
.author-post-container .author-social i {
    color: <?php echo esc_html($content_title); ?>;
}
.author-post-container .author-social i:hover,
.author-post-container .author-name a:hover {
    color: <?php echo esc_html($main_color); ?>;
}
.not-found input {
    border: none;
}
.not-found input.search-submit {
    background: <?php echo esc_html($main_color); ?>;
    color: <?php echo esc_html($content_post); ?>;
}
.not-found input.search-submit:hover {
    background: <?php echo esc_html($secondary_color); ?> !important;
}
.search-not-found input {
	border: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
/*
.neder-posts-content-wrap .article-title a,
.neder-posts-image-wrap .article-title a {
    color: <?php echo esc_html($content_post); ?>;
}
.neder-posts-content-wrap .article-title a:hover,
.neder-posts-image-wrap .article-title a:hover {
	color:<?php echo esc_html($main_color); ?>;
}	
.neder-posts-content-wrap .article-category a,
.neder-posts-image-wrap .article-category a {
	background: <?php echo esc_html($main_color); ?>;
    color: <?php echo esc_html($content_post); ?>;
}
.neder-posts-content-wrap .article-category a:hover,
.neder-posts-image-wrap .article-category a:hover {
	background:<?php echo esc_html($main_color); ?>;
}*/
.article-info.neder-post-title-page .article-info-top h2 {
	color:<?php echo esc_html($content_title); ?>;
}
.neder-wrap-container .article-info-top h2 {
    color: <?php echo esc_html($content_post); ?>;
}
.neder-posts-content-wrap .article-info-bottom,
.neder-posts-image-wrap .article-info-bottom {
    color: <?php echo esc_html($content_post); ?>;
}
.article-info.neder-post-title-page .article-info-bottom {
    color: <?php echo esc_html($content_text_info); ?>;
}
.neder-posts-content-wrap .article-info-bottom a,
.neder-posts-image-wrap .article-info-bottom a {
	color:<?php echo esc_html($content_post); ?>;
}
.article-info.neder-post-title-page .article-info-bottom a {
	color:<?php echo esc_html($content_title); ?>;
}
.neder-posts-content-wrap .article-info-bottom a:hover,
.neder-posts-image-wrap .article-info-bottom a:hover,
.article-info.neder-post-title-page .article-info-bottom a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-posts-content-wrap .article-info-bottom a:hover {
	color:<?php echo esc_html($secondary_color); ?>;
}
.neder-post .social-post a {
    border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
    color: <?php echo esc_html($main_color); ?>;
}
.navigation-post .prev-post {
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
}
.navigation-post .next-post {
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
}
.navigation-post .prev-post-text,
.navigation-post .next-post-text {
	color:<?php echo esc_html($content_text_info); ?>;
}
.navigation-post .prev-post-text:hover,
.navigation-post .next-post-text:hover {
	color:<?php echo esc_html($content_title); ?>;
}
.navigation-post .prev-post-text i {
    color: <?php echo esc_html($content_title); ?>;
}
.navigation-post .next-post-text i {
    color: <?php echo esc_html($content_title); ?>;
}
.navigation-post .name-post {
    color: <?php echo esc_html($content_title); ?>;
}
.navigation-post .name-post:hover {
    color: <?php echo esc_html($main_color); ?>;
}
@media screen and (min-width: 500px) and (max-width: 700px) {
	.ndwp-widget.neder_widget.neder_ndwp_mega_posts .box_post:last-child,
	.widget.ndwp-widget.neder_widget.neder_ndwp_tab .box_post:last-child {
		border-bottom:1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.footer-widget .ndwp-widget.neder_widget.neder_ndwp_mega_posts .box_post,
	.footer-widget .widget.ndwp-widget.neder_widget.neder_ndwp_tab .box_post {
		border-bottom:0;
	}
}
@media screen and (max-width: 1024px) {
	.neder-header-wrap-container.header-mobile {
		background: <?php echo esc_html($header_bottom_background); ?>;
	}
	.neder-menu > li.menu-item-has-children > a::after {
		color: <?php echo esc_html($header_bottom_text_submenu); ?>;
	}
	.neder-wrap-container .neder-top-menu.col-sm-3,
	.neder-wrap-container .neder-date.col-sm-3 {
		border-top:1px solid <?php echo esc_html($header_bottom_line); ?>;
	}
	ul.submenu li:first-child .submenu {
		border-top:1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
	}
}
@media screen and (max-width: 700px) {
	.neder-footer-top .neder-wrap-container .footer-widget.col-xs-4 {
		border-bottom: 1px solid <?php echo esc_html($footer_top_line); ?>;
	}
	.neder-header-wrap-container .neder-footer-bottom .neder-wrap-container .col-xs-4 {
		border-bottom: 1px solid <?php echo esc_html($footer_bottom_line); ?>;
	}
	.neder-container .neder-element-posts.neder-posts-layout2.neder-blog-2-col .item-posts.first-element-posts:nth-child(2) {
		border-top: 1px solid <?php echo esc_html($footer_top_line); ?>;
	}
}
.comment-form-email.col-xs-4 input, 
.comment-form-url.col-xs-4 input, 
.comment-form-author.col-xs-4 input {
    background: <?php echo esc_html($content_navigation_background); ?>;
}
.comment-form-comment textarea {
    background: <?php echo esc_html($content_navigation_background); ?>;
}
.comment-form .submit,
.wpcf7-submit {
    background: <?php echo esc_html($main_color); ?>;
    color: <?php echo esc_html($content_post); ?>;
}
.comment-form .submit:hover,
.wpcf7-submit:hover {
    background: <?php echo esc_html($secondary_color); ?>;
}
.comment-form-title,
.comment-reply-title {
	border-bottom: 2px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.comment-form-title h3,
.comment-reply-title .title-leave-a-comment {
	color: <?php echo esc_html($content_title); ?>;
	border-bottom: 2px solid <?php echo esc_html($main_color); ?>;
}
.comments-list, .no-comments {
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
}
.children .comments-list:before {
  border-top: 1px solid <?php echo esc_html($main_color); ?>;
}
.comment-date {
	color: <?php echo esc_html($main_color); ?>;
}
.comment-description i {
	color: <?php echo esc_html($main_color); ?>;
}
.comment-description i:hover {
	color: <?php echo esc_html($main_color); ?>;
}
.comment-edit-link {
    color: <?php echo esc_html($main_color); ?>;
}
.comment-edit-link:hover {
    color: <?php echo esc_html($main_color); ?>;
}
#commentform .logged-in-as a {
	color: <?php echo esc_html($content_title); ?>;
}
#commentform .logged-in-as a:hover {
	color: <?php echo esc_html($main_color); ?>;
}
.news-ticker-item .news-ticker-item-category a {
	background: <?php echo esc_html($main_color); ?>;
    color: <?php echo esc_html($header_bottom_text_menu); ?>;
}
.news-ticker-item .news-ticker-item-category a:hover {
	background:<?php echo esc_html($secondary_color); ?>;
}
.news-ticker-item .news-ticker-item-title a {
	color: <?php echo esc_html($header_top_text); ?>;
}
.news-ticker-item .news-ticker-item-title a:hover {
	color: <?php echo esc_html($main_color); ?>;
}
.news-ticker-item .news-ticker-item-date {
	color: <?php echo esc_html($header_top_text); ?>;
}
.neder-top-news-ticker.owl-theme .owl-controls .owl-nav [class*="owl-"] {
    color: <?php echo esc_html($header_top_text); ?>;
}
.neder-top-news-ticker.owl-theme .owl-controls .owl-nav [class*="owl-"]:hover {
    color: <?php echo esc_html($main_color); ?>;
}
.neder-header-top .col-sm-1, .neder-header-top .col-sm-2, 
.neder-header-top .col-sm-3, .neder-header-top .col-sm-4, 
.neder-header-top .col-sm-5, .neder-header-top .col-sm-6, 
.neder-header-top .col-sm-7, .neder-header-top .col-sm-8, 
.neder-header-top .col-sm-9, .neder-header-top .col-sm-10, 
.neder-header-top .col-sm-11, .neder-header-top .col-sm-12 {
	border-right:1px solid <?php echo esc_html($header_top_line); ?>;
}
.neder-header-top > div:first-child {
	border-left:1px solid <?php echo esc_html($header_top_line); ?>;
}
<?php if($neder_theme['header-top-align'] != 'default') : ?>
	.neder-header-top .neder-wrap-container > div {
		text-align:<?php echo esc_html($neder_theme['header-top-align']); ?>;
	}
<?php endif; ?>
.neder-date,
.flonews-login-register .flonews-login-register-logged {
    color: <?php echo esc_html($header_top_text); ?>;
}
.neder-social .neder-header-top-social a {
    color: <?php echo esc_html($header_top_text); ?>;
}
.neder-social .neder-header-top-social a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.tags-container a,
.tagcloud a {
	color: <?php echo esc_html($content_title); ?>;
}
.tags-container a:hover,
.tagcloud a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-sidebar .widget.widget_archive li, 
.neder-sidebar .widget.widget_categories li,
.neder-sidebar .widget.widget_nav_menu li,
.wpb_wrapper .widget.widget_nav_menu li,
.neder-sidebar .widget.widget_meta li,
.wpb_wrapper .widget.widget_meta li,
.neder-sidebar .widget.widget_pages li,
.wpb_wrapper .widget.widget_pages li,
.neder-sidebar .widget.widget_recent_comments li,
.wpb_wrapper .widget.widget_recent_comments li,
.neder-sidebar .widget.widget_recent_entries li,
.wpb_wrapper .widget.widget_recent_entries li,
.neder-sidebar .widget.widget_rss li,
.wpb_wrapper .widget.widget_rss li {
	border-bottom: 1px solid <?php echo esc_html($content_navigation_background); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.neder-sidebar .widget.widget_archive li a:hover, 
.neder-sidebar .widget.widget_categories li a:hover,
.neder-sidebar .widget.widget_nav_menu li a:hover,
.wpb_wrapper .widget.widget_nav_menu li a:hover,
.neder-sidebar .widget.widget_meta li a:hover,
.wpb_wrapper .widget.widget_meta li a:hover,
.neder-sidebar .widget.widget_pages li a:hover,
.wpb_wrapper .widget.widget_pages li a:hover,
.neder-sidebar .widget.widget_recent_comments li a:hover,
.wpb_wrapper .widget.widget_recent_comments li a:hover,
.neder-sidebar .widget.widget_recent_entries li a:hover,
.wpb_wrapper .widget.widget_recent_entries li a:hover,
.neder-sidebar .widget.widget_rss li a:hover,
.wpb_wrapper .widget.widget_rss li a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-sidebar .widget.widget_rss li a,
.wpb_wrapper .widget.widget_rss li a {
	color:<?php echo esc_html($content_title); ?>;
}
.neder-sidebar .widget.widget_recent_entries li .post-date,
.wpb_wrapper .widget.widget_recent_entries li .post-date {
	color:<?php echo esc_html($content_text_info); ?>;
}
.widget li a,
.widget_rss .rsswidget:hover {
	color:<?php echo esc_html($content_title); ?>;
}
.widget li a:hover,
.widget_rss .rsswidget {
	color:<?php echo esc_html($main_color); ?>;
}
.widget_rss .widget-title .rsswidget {
	color:<?php echo esc_html($header_bottom_text_menu); ?>;
}
.widget.widget_recent_comments .comment-author-link {
    color: <?php echo esc_html($content_text_info); ?>;
}
.widget select {
    border: 1px solid <?php echo esc_html($content_navigation_background); ?>;	
}
.widget_search input {
	border: 0;		
}
.widget_search label input {
	border-color: <?php echo esc_html($content_navigation_background); ?>;
	background: <?php echo esc_html($content_navigation_background); ?>;
}
.neder-post-sticky .article-info {
	background: <?php echo esc_html($content_navigation_background); ?>;
}
.neder-sidebar .search-form .search-submit,
.wpb_wrapper .search-form .search-submit {
    background: <?php echo esc_html($main_color); ?>;
    color: <?php echo esc_html($content_post); ?>;
}
.neder-sidebar .search-form .search-submit:hover,
.wpb_wrapper .search-form .search-submit:hover {
    background: <?php echo esc_html($secondary_color); ?>;
	color: <?php echo esc_html($content_post); ?>;
}
.widget_search input.search-submit:hover {
	background:<?php echo esc_html($secondary_color); ?>;	
}
.post-password-form input[type="submit"]:hover,
.not-found input[type="submit"]:hover {
	background:<?php echo esc_html($secondary_color); ?>;		
}
#wp-calendar #prev a {
	color:<?php echo esc_html($main_color); ?>;
}
#wp-calendar tr #today {
	color:<?php echo esc_html($main_color); ?>;
}
#wp-calendar #prev a:hover {
	color:<?php echo esc_html($secondary_color); ?>;	
}
.widget ul > li.menu-item-has-children > a:after {
    color: <?php echo esc_html($content_title); ?>;	
}
.ndwp-widget h4.widget-title,
.ndwp-widget h3.widget-title,
.widget h3 {
	border-bottom: 2px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.ndwp-title-widget {
	color: <?php echo esc_html($content_title); ?>;
	border-bottom: 2px solid <?php echo esc_html($main_color); ?>;
}
/*
@media only screen and (min-width : 801px) and (max-width : 1200px) {
	.neder_widget.neder_ndwp_advertisement .active {
		border: 1px solid;
	}
	.neder_widget.neder_ndwp_advertisement .mini-post.small-post.ad_one_third {
		border: 1px solid;
	}
	.neder_widget.neder_ndwp_advertisement .mini-post.small-post.ad_one_third.fourth {
		border-bottom: 1px solid !important;
	}
}
@media only screen and (max-width : 800px) {
	.neder_widget.neder_ndwp_advertisement .mini-post.small-post.ad_one_third {
		border:1px solid;
	}
	.neder_widget.neder_ndwp_advertisement .mini-post.small-post.ad_one_third.fourth {
		border-bottom: 1px solid !important;
	}
}*/
.neder_widget.neder_ndwp_archivies .box_archivies .box_archivies_item {
	border-bottom: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.neder_widget.neder_ndwp_archivies a,
.comment-name {
    color: <?php echo esc_html($content_title); ?>;
}
.neder_widget.neder_ndwp_archivies .box_archivies_item:hover a {
	color:<?php echo esc_html($main_color); ?>;	
}
.neder_widget.neder_ndwp_archivies .box_archivies .box_archivies_item:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder_widget.neder_ndwp_archivies .number-post {
    color: <?php echo esc_html($content_title); ?>;
}
.neder_widget.neder_ndwp_archivies .box_archivies .box_archivies_item:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder_widget.neder_ndwp_categories .box_categories .cat-item {
	border-bottom: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.neder_widget.neder_ndwp_categories a {
    color: <?php echo esc_html($content_title); ?>;
}
.neder_widget.neder_ndwp_categories .box_categories > li.cat-item:hover,
.neder_widget.neder_ndwp_categories .box_categories > li.cat-item:hover > a {
	color:<?php echo esc_html($main_color); ?>;
}
.neder_widget.neder_ndwp_categories .number-post {
    color: <?php echo esc_html($content_title); ?>;
}
.box_categories li .children .cat-item a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.box_categories li .children .cat-item:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder_widget.neder_ndwp_mega_posts .box_post {
    border-bottom: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.neder_widget.neder_ndwp_mega_posts .container_post.ad_one_one .box-info h4 a {
    color: <?php echo esc_html($content_title); ?>;
}
.neder_widget.neder_ndwp_mega_posts .container_post.ad_one_one .box-info a:hover {
    color: <?php echo esc_html($main_color); ?>;
}
.neder_widget.neder_ndwp_mega_posts .container_post.ad_one_one .data {
    color: <?php echo esc_html($content_text_info); ?>;
}
.neder_widget.neder_ndwp_mega_posts .container_post.ad_one_one .data i {
	color: <?php echo esc_html($main_color); ?>;
}
.neder_widget.neder_ndwp_mega_posts .container_post.ad_one_one .icon-calendar {
    color: <?php echo esc_html($main_color); ?>;
}
.neder_widget.neder_ndwp_slider_posts .category a {
    color: <?php echo esc_html($content_post); ?>;
}
.neder_widget.neder_ndwp_slider_posts .category a:hover {
	background:<?php echo esc_html($secondary_color); ?>;
	color: <?php echo esc_html($content_post); ?>;
}
.neder_widget.neder_ndwp_slider_posts .box-text h3 a {
	color: <?php echo esc_html($content_post); ?>;
}
.neder_widget.neder_ndwp_slider_posts .box-text h3 a:hover {
	color:<?php echo esc_html($main_color); ?> ;
}
.neder_widget.neder_ndwp_slider_posts .data {
	color: <?php echo esc_html($content_post); ?>;
}
.neder_widget.neder_ndwp_slider_posts .data:hover {
	color: <?php echo esc_html($content_post); ?>;
}
.neder_widget.neder_ndwp_slider_posts .icon-calendar {
	color: <?php echo esc_html($content_post); ?>;
}
.neder_widget.neder_ndwp_slider_posts .neder_widget-item.ad_one_one.ad_last.big-post i {
	color: <?php echo esc_html($content_post); ?>;
}
.neder_widget.neder_ndwp_slider_posts .owl-theme .owl-controls .owl-nav [class*="owl-"] {
	background: <?php echo esc_html($main_color); ?>;
}
.neder_widget.neder_ndwp_slider_posts .owl-theme .owl-controls .owl-nav [class*="owl-"] {
	color: <?php echo esc_html($content_post); ?>;
}
.neder_widget.neder_ndwp_slider_posts .owl-theme .owl-controls .owl-nav [class*="owl-"]:hover {
	background: <?php echo esc_html($secondary_color); ?>;
	transition: all 0.3s ease 0s;
}
.mc4wp-form-fields input[type="submit"] {
	background: <?php echo esc_html($main_color); ?>;
	color: <?php echo esc_html($header_bottom_text_menu); ?>;
}
.mc4wp-form-fields input[type="email"] {
	border:1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.mc4wp-form-fields input[type="submit"]:hover {
    background: <?php echo esc_html($secondary_color); ?>;
}
.neder-widget-social-style2 a {
	background: <?php echo esc_html($main_color); ?>;
    color: <?php echo esc_html($content_post); ?>;
}
.neder-widget-social-style2 a:hover {
	background:<?php echo esc_html($secondary_color); ?>;
	color:<?php echo esc_html($content_post); ?>;
}
.neder_widget.neder_ndwp_social .box_social.neder-widget-social-style3 a {
	color:<?php echo esc_html($content_title); ?>;
}
.neder_widget.neder_ndwp_social .box_social.neder-widget-social-style3 a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder_widget.neder_ndwp_tab .widget-title .ndwp-title-widget span:hover {
	background:<?php echo esc_html($secondary_color); ?>;	
}
.neder_widget.neder_ndwp_tab .neder_ndwp_tab_active {
	background:<?php echo esc_html($secondary_color); ?> !important;	
}
.neder_ndwp_tab .widget-title .ndwp-title-widget span {
    background: <?php echo esc_html($main_color); ?>;
}
.neder_widget.neder_ndwp_tab .box_post {
    border-bottom: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.neder_widget.neder_ndwp_tab .container_post.ad_one_one .box-info h4 a {
    color: <?php echo esc_html($content_title); ?>;
}
.neder_widget.neder_ndwp_tab .container_post.ad_one_one .box-info a:hover {
    color: <?php echo esc_html($main_color); ?>;
}
.neder_widget.neder_ndwp_tab .container_post.ad_one_one .data {
    color: <?php echo esc_html($content_text_info); ?>;
}
.neder_widget.neder_ndwp_tab .container_post.ad_one_one .icon-calendar {
    color: <?php echo esc_html($main_color); ?>;
}
.neder_widget.neder_ndwp_tab .content_tag {
    border: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.neder_widget.neder_ndwp_tab .content_tag a {
	color: <?php echo esc_html($content_title); ?>;
}
.neder_widget.neder_ndwp_tab .content_tag:hover {
    background: <?php echo esc_html($main_color); ?>;
	border: 1px solid <?php echo esc_html($main_color); ?>;
	color:<?php echo esc_html($header_bottom_text_menu); ?>;
}
.neder_widget.neder_ndwp_tab .content_tag:hover a {
	color:<?php echo esc_html($header_bottom_text_menu); ?>;
}
h4.widget-title span:hover {
	background:<?php echo esc_html($secondary_color); ?>;	
}
.neder_ndwp_tag .widget-title .ndwp-title-widget span {
    background: <?php echo esc_html($main_color); ?>;
}
.neder_widget.neder_ndwp_tag .box_post {
    border-bottom: 1px solid <?php echo esc_html($content_navigation_background); ?>;
}
.neder_widget.neder_ndwp_tag .container_post.ad_one_one .box-info h4 a {
    color: <?php echo esc_html($content_title); ?>;
}
.neder_widget.neder_ndwp_tag .container_post.ad_one_one .box-info a:hover {
	color: <?php echo esc_html($main_color); ?>;
}
.neder_widget.neder_ndwp_tag .container_post.ad_one_one .data {
    color: <?php echo esc_html($content_text_info); ?>;
}
.neder_widget.neder_ndwp_tag .container_post.ad_one_one .icon-calendar {
    color: <?php echo esc_html($main_color); ?>;
}
.neder_widget.neder_ndwp_tag .content_tag {
    border: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.neder_widget.neder_ndwp_tag .content_tag a {
	color: <?php echo esc_html($content_title); ?>;
}
.neder_widget.neder_ndwp_tag .content_tag:hover {
    background: <?php echo esc_html($main_color); ?>;
	border: 1px solid <?php echo esc_html($main_color); ?>;
	color:<?php echo esc_html($content_post); ?>;
}
.neder_widget.neder_ndwp_tag .content_tag:hover a {
	color:<?php echo esc_html($content_post); ?>;
}
.neder-element-posts .article-title a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-element-posts .article-category a,
.neder-vc-element-posts .first-element-posts .article-info-top .article-data,
.neder-vc-element-posts .first-element-posts .article-info-top .article-comments,
.neder-vc-element-posts .article-info-top .article-comments a,
.neder-vc-element-posts .article-info-top .article-data,
.neder-vc-element-posts .article-info-top .article-comments,
.neder-element-posts .article-info-top .article-comments a,
.neder-element-posts .article-info-top .article-data,
.neder-element-posts .article-info-top .article-comments,
.neder-vc-element-posts-carousel .article-data,
.neder-vc-element-posts-carousel .article-comments,
.neder-vc-element-posts-carousel .article-comments a, 
.neder-vc-element-posts-tab .article-data,
.neder-vc-element-posts-tab .article-comments,
.neder-vc-element-posts-tab .article-comments a {
	color: <?php echo esc_html($content_post); ?>;
}
.neder-element-posts .article-category a:hover {
	background:<?php echo esc_html($secondary_color); ?>;
	color: <?php echo esc_html($content_post); ?>;
}
.neder-element-posts .article-data {
	color: <?php echo esc_html($content_text_info); ?>;
}
.neder-element-posts .article-comments {
	color: <?php echo esc_html($content_text_info); ?>;	
}
.neder-element-posts .article-comments a {
	color: <?php echo esc_html($content_text_info); ?>;
}
.neder-element-posts .article-comments a:hover {
	color: <?php echo esc_html($main_color); ?>;
}
.neder-element-posts .article-info-bottom .article-excerpt a {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-element-posts .article-info-bottom .article-excerpt a:hover {
	color:<?php echo esc_html($secondary_color); ?>;
}
.neder-element-posts-title-box {
	border-bottom: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
	border-right: 1px solid <?php echo esc_html($main_color); ?>;
	border-top: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.neder-element-posts-title-box h2 {
	background: <?php echo esc_html($main_color); ?>;
	color: <?php echo esc_html($header_bottom_text_menu); ?>;
}
.neder-element-posts #neder-load-posts a {
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.neder-element-posts #neder-load-posts a:hover {
    background: <?php echo esc_html($content_navigation_background); ?>;
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
}
.neder-pagination a {
    border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.neder-pagination a:hover {
    background: <?php echo esc_html($content_navigation_background); ?>;
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
}
.ndwp-numeric-pagination .current {
	background:<?php echo esc_html($content_navigation_background); ?>;
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.ndwp-numeric-pagination i {
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.ndwp-numeric-pagination i:hover {
	background:<?php echo esc_html($content_navigation_background); ?>;
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
}
.neder-element-posts.neder-posts-layout2 .item-posts.first-element-posts {
    border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
}
@media screen and (max-width: 700px) {
	.neder-element-posts.neder-posts-layout2 .neder-element-posts-article-container article:nth-child(2) {
		border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.neder-element-posts.neder-posts-layout2.neder-blog-3-col .item-posts.first-element-posts:nth-child(2),
	.neder-element-posts.neder-posts-layout2.neder-blog-4-col .item-posts.first-element-posts:nth-child(2),
	.neder-element-posts.neder-posts-layout2.neder-blog-3-col .item-posts.first-element-posts:nth-child(3),
	.neder-element-posts.neder-posts-layout2.neder-blog-4-col .item-posts.first-element-posts:nth-child(3),
	.neder-element-posts.neder-posts-layout2.neder-blog-3-col .item-posts.first-element-posts:nth-child(4),
	.neder-element-posts.neder-posts-layout2.neder-blog-4-col .item-posts.first-element-posts:nth-child(4) {
		border-top:1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
}
@media screen and (min-width: 580px) and (max-width: 950px) {
	.neder-element-posts.neder-posts-layout2.neder-blog-4-col .item-posts.first-element-posts:nth-child(3),
	.neder-element-posts.neder-posts-layout2.neder-blog-4-col .item-posts.first-element-posts:nth-child(4) {
		border-top:1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
}
.neder-element-posts.neder-posts-layout3 .item-posts.first-element-posts {
    border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
}
@media screen and (max-width: 700px) {
	.neder-element-posts.neder-posts-layout3 .neder-element-posts-article-container article:nth-child(2) {
		border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.neder-element-posts.neder-posts-layout3.neder-blog-2-col .item-posts.first-element-posts:nth-child(2),
	.neder-element-posts.neder-posts-layout3.neder-blog-3-col .item-posts.first-element-posts:nth-child(2),
	.neder-element-posts.neder-posts-layout3.neder-blog-3-col .item-posts.first-element-posts:nth-child(3),
	.neder-element-posts.neder-posts-layout3.neder-blog-4-col .item-posts.first-element-posts:nth-child(2),
	.neder-element-posts.neder-posts-layout3.neder-blog-4-col .item-posts.first-element-posts:nth-child(3),
	.neder-element-posts.neder-posts-layout3.neder-blog-4-col .item-posts.first-element-posts:nth-child(4) {
		border-top:1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
}
@media screen and (min-width: 580px) and (max-width: 950px) {
	.neder-element-posts.neder-posts-layout3.neder-blog-4-col .item-posts.first-element-posts:nth-child(3),
	.neder-element-posts.neder-posts-layout3.neder-blog-4-col .item-posts.first-element-posts:nth-child(4) {
		border-top:1px solid <?php echo esc_html($content_navigation_background); ?>;
	}	
}
.neder-element-posts.neder-posts-layout4 .item-posts.first-element-posts {
    border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
}
@media screen and (max-width: 800px) {
	.neder-element-posts.neder-posts-layout4 article.item-posts.first-element-posts:nth-child(2) {
		border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.neder-element-posts.neder-posts-layout4.neder-blog-2-col .item-posts.first-element-posts:nth-child(2) {
		border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
}
@media screen and (max-width: 700px) {
	.neder-element-posts.neder-posts-layout4.neder-blog-3-col .item-posts.first-element-posts:nth-child(2),
	.neder-element-posts.neder-posts-layout4.neder-blog-3-col .item-posts.first-element-posts:nth-child(3),
	.neder-element-posts.neder-posts-layout4.neder-blog-4-col .item-posts.first-element-posts:nth-child(3),
	.neder-element-posts.neder-posts-layout4.neder-blog-4-col .item-posts.first-element-posts:nth-child(4) {
		border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
}
@media screen and (min-width: 701px) and (max-width: 950px) {
	.neder-element-posts.neder-posts-layout4.neder-blog-4-col .item-posts.first-element-posts:nth-child(3),
	.neder-element-posts.neder-posts-layout4.neder-blog-4-col .item-posts.first-element-posts:nth-child(4) {
		border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
}
@media screen and (max-width: 640px) {
	.neder-element-posts.neder-posts-layout4.neder-blog-3-col .item-posts.first-element-posts:nth-child(2),
	.neder-element-posts.neder-posts-layout4.neder-blog-3-col .item-posts.first-element-posts:nth-child(3),
	.neder-container .neder-element-posts.neder-posts-layout4.neder-blog-4-col .item-posts.first-element-posts:nth-child(2) {
		border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
}
@media screen and (min-width: 580px) and (max-width: 950px) {
	.neder-element-posts.neder-posts-layout3.neder-blog-4-col .item-posts.first-element-posts:nth-child(3),
	.neder-element-posts.neder-posts-layout3.neder-blog-4-col .item-posts.first-element-posts:nth-child(4) {
		border-top:1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
}
.neder-element-posts.neder-posts-layout5 .item-posts.first-element-posts {
    border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
}
@media screen and (max-width: 1000px) {
	.neder-element-posts.neder-posts-layout5.neder-blog-2-col article.item-posts.first-element-posts:nth-child(5) {
		border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
}
@media screen and (max-width: 700px) {
	.neder-element-posts.neder-posts-layout5 article.item-posts.first-element-posts:nth-child(2) {
		border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.neder-element-posts.neder-posts-layout5.neder-blog-2-col  article.item-posts.first-element-posts:nth-child(5) {
		border-top:1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
}
@media screen and (max-width: 500px) {
	.neder-element-posts.neder-posts-layout5 article.item-posts.first-element-posts.other-rows {
		border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
}
@media screen and (max-width: 900px) {
	.neder-element-posts.neder-posts-layout5.neder-blog-3-col  article.item-posts.first-element-posts.first-row,
	.neder-element-posts.neder-posts-layout5.neder-blog-3-col  article.item-posts.first-element-posts.other-rows {
		border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
}
.neder-element-top-content .article-title a,
.neder-vc-element-posts-carousel.neder-posts-carousel-type2 .article-title a {
    color: <?php echo esc_html($content_post); ?>;
}
.neder-element-top-content .article-title a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-element-top-content .article-category a {
    color: <?php echo esc_html($content_post); ?>;
}
.neder-element-top-content .article-category a:hover {
	background:<?php echo esc_html($secondary_color); ?>;
	color: <?php echo esc_html($content_post); ?>;
}
.neder-element-top-content .article-info-bottom a {
	color:<?php echo esc_html($content_post); ?>;
}
.neder-element-top-content .article-info-bottom a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-top-content-layout1 .article-title a {
    color: <?php echo esc_html($content_post); ?>;
}
.neder-top-content-layout1 .article-title a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-top-content-layout1 .article-category a {
    color: <?php echo esc_html($content_post); ?>;
}
.neder-top-content-layout1 .article-category a:hover {
	background:<?php echo esc_html($secondary_color); ?>;
	color: <?php echo esc_html($content_post); ?>;
}
.neder-top-content-layout1 .article-info-bottom {
    color: <?php echo esc_html($content_post); ?>;
}
.neder-top-content-layout1 .article-info-bottom a {
	color:<?php echo esc_html($content_post); ?>;
}
.neder-top-content-layout1 .article-info-bottom a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-top-content-layout3 .others-element-header {
	background:<?php echo esc_html($content_navigation_background); ?>;
}
.neder-top-content-layout3 .others-element-header .article-title a {
	color:<?php echo esc_html($content_title); ?>;	
}
.neder-top-content-layout3 .others-element-header .article-title a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-top-content-layout4 .owl-controls i {
	background: <?php echo esc_html($content_background); ?>;
	color: <?php echo esc_html($content_title); ?>;
}
.neder-top-content-layout4 .owl-controls i:hover {
	color: <?php echo esc_html($main_color); ?>;
}
<?php if($neder_theme['footer-image-background-active'] == true) : ?>
	.neder-footer-wrap .neder-footer-top {
		background: url('<?php echo esc_url($neder_theme['footer-bg-image']['url']); ?>');
		background-size:cover;
		position:relative;
		background-position: center;
	}
	.neder-footer-wrap .neder-footer-top .neder-wrap-container {
		background: none;
		position:relative;
		z-index:2;
	}
	.neder-banner-footer {
		position:relative;
		z-index:2;		
	}
	.neder-footer-wrap .neder-footer-top .footer-top-pattern {
		background: <?php echo esc_html($neder_theme['footer-pattern-color']['rgba']); ?>;
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index:1;
	}
<?php else : ?>
	.neder-footer-wrap .neder-footer-top,
	.neder-footer-wrap .neder-footer-top .neder-wrap-container {
		background: <?php echo esc_html($footer_top_background); ?>;
	}
<?php endif; ?>
.neder-footer-top h3.widget-title,
.neder-footer-top h3.widget-title a,
.neder-widget-contact-address-title h4 {
    color: <?php echo esc_html($footer_top_title); ?>;
}
.neder-footer-top .neder_widget.neder_ndwp_archivies .box_archivies .box_archivies_item,
.neder-footer-top .neder_widget.neder_ndwp_categories .box_categories .cat-item,
.neder-footer-top .widget.widget_nav_menu .menu-item,
.neder-footer-wrap .neder-footer-top .widget li,
.neder-footer-top .neder_widget_contact .neder-widget-contact-text {
	border-bottom:1px solid <?php echo esc_html($footer_top_line); ?>;
}
.neder-footer-top .neder_widget.neder_ndwp_archivies a,
.neder-footer-top .neder_widget.neder_ndwp_archivies .box_archivies .box_archivies_item,
.neder-footer-top .neder_widget.neder_ndwp_categories a,
.neder-footer-top .neder_widget.neder_ndwp_categories .box_categories .cat-item,
.neder-footer-top .widget.widget_nav_menu .menu-item a,
.neder-footer-wrap .neder-footer-top .widget li a,
.neder-footer-top .widget ul > li.menu-item-has-children > a:after {
	color: <?php echo esc_html($footer_top_title); ?>;
}
.neder-footer-top .neder_widget.neder_ndwp_archivies a:hover,
.neder-footer-top .neder_widget.neder_ndwp_archivies .box_archivies .box_archivies_item:hover,
.neder-footer-top .widget.widget_nav_menu .menu-item a:hover,
.neder-footer-wrap .neder-footer-top .widget li a:hover,
.neder-footer-top .widget ul > li.menu-item-has-children:hover > a:after  {
	color: <?php echo esc_html($main_color); ?>;
}
.neder-footer-top #wp-calendar {
	color:<?php echo esc_html($footer_top_title); ?>;
}
.neder-footer-top caption {
    border: 1px solid <?php echo esc_html($footer_top_line); ?>;
    color: <?php echo esc_html($footer_top_title); ?>;
}
.neder-footer-top .neder_widget.neder_ndwp_mega_posts .box_post,
.neder-footer-top .neder_widget.neder_ndwp_tab .box_post {
    border-bottom: 1px solid <?php echo esc_html($footer_top_line); ?>;
}
.neder-footer-top .neder_widget.neder_ndwp_mega_posts .container_post.ad_one_one .box-info h4,
.neder-footer-top .neder_widget.neder_ndwp_mega_posts .container_post.ad_one_one .box-info h4 a,
.neder-footer-top .neder_widget.neder_ndwp_tab .container_post.ad_one_one .box-info h4 a {
    color: <?php echo esc_html($footer_top_title); ?>;
}
.neder-footer-top .neder_widget.neder_ndwp_mega_posts .container_post.ad_one_one .box-info h4 a:hover,
.neder-footer-top .neder_widget.neder_ndwp_tab .container_post.ad_one_one .box-info h4 a:hover {
    color: <?php echo esc_html($main_color); ?>;
}
.neder-footer-top,
.neder-footer-top p,
.neder-footer-top .neder_widget.neder_ndwp_mega_posts .container_post.ad_one_one .data {
    color: <?php echo esc_html($footer_top_text); ?>;
}
.neder-footer-top .neder_widget.neder_ndwp_tag .content_tag,
.neder-footer-top .neder_widget.neder_ndwp_tab .content_tag {
    border: 1px solid <?php echo esc_html($footer_top_line); ?>;
}
.neder-footer-top .neder_widget.neder_ndwp_tag .content_tag a,
.neder-footer-top .neder_widget.neder_ndwp_tab .content_tag a {
    color: <?php echo esc_html($footer_top_title); ?>;
}
.neder-footer-top .neder_widget.neder_ndwp_tag .content_tag:hover a,
.neder-footer-top .neder_widget.neder_ndwp_tab .content_tag:hover a {
    color: <?php echo esc_html($footer_top_title); ?>;
}
.neder-footer-top .neder_widget.neder_ndwp_tag .content_tag:hover,
.neder-footer-top .neder_widget.neder_ndwp_tab .content_tag:hover {
    border:1px solid <?php echo esc_html($main_color); ?>;
}
.neder-footer-top .neder_widget.neder_ndwp_social .box-icon-social a {
    color: <?php echo esc_html($footer_top_title); ?>;
}
.neder-footer-top .widget.widget_meta li a {
    color: <?php echo esc_html($footer_top_title); ?>;
}
.neder-footer-top .widget.widget_meta li a:hover {
    color: <?php echo esc_html($main_color); ?>;
}
.neder-footer-top .widget.widget_meta ul li {
    border-bottom: 1px solid <?php echo esc_html($footer_top_line); ?>;
    color: <?php echo esc_html($footer_top_title); ?>;
}
.neder-footer-top .neder_ndwp_tab h3.widget-title {
    border: 1px solid <?php echo esc_html($footer_top_line); ?>;
}
.neder-footer-top .neder_ndwp_tab .neder_ndwp_title_recent,
.neder-footer-top .neder_ndwp_tab .neder_ndwp_title_popular,
.neder-footer-top .neder_ndwp_tab .neder_ndwp_title_tag {
    border-right: 1px solid <?php echo esc_html($footer_top_line); ?>;
}
.neder-footer-top .neder_ndwp_tab span:hover {
	background:<?php echo esc_html($main_color); ?>;
}
.neder-footer-top .neder_widget.neder_ndwp_tab .neder_ndwp_tab_active {
	background:<?php echo esc_html($main_color); ?> !important;
	color:<?php echo esc_html($footer_top_title); ?> !important;	
}
.neder-footer-top .widget.widget_recent_comments {
    color: <?php echo esc_html($footer_top_title); ?>;
}
.neder-footer-top .widget label {
	background:<?php echo esc_html($footer_top_title); ?>;
}
.neder-footer-top .widget select {
	background: <?php echo esc_html($footer_top_title); ?>;
    border: 1px solid <?php echo esc_html($footer_top_line); ?>;	
}
.neder-footer-top  .search-form .search-submit {
    background: <?php echo esc_html($main_color); ?>;
    color: <?php echo esc_html($footer_top_title); ?>;
}
.neder-footer-top  .search-form .search-submit:hover {
    background: <?php echo esc_html($secondary_color); ?>!important;
}
.neder-footer-top .widget_search input.search-submit:hover {
	color:<?php echo esc_html($footer_top_title); ?>;	
}
.neder-footer-top .widget_tag_cloud .tagcloud a {
	color:<?php echo esc_html($footer_top_title); ?>;
}
.neder-footer-top .widget_text .textwidget {
	color: <?php echo esc_html($footer_top_text); ?>;
}
.neder-footer-bottom .neder-wrap-container {
	background:<?php echo esc_html($footer_bottom_background); ?>;
}
.neder-footer-bottom {
    background: <?php echo esc_html($footer_bottom_background); ?>;
}
.neder-footer-bottom .neder-footer-social a,
.neder-footer-bottom .copyright {
    color: <?php echo esc_html($footer_bottom_text); ?>;
}
.neder-footer-bottom .col-xs-4:nth-child(2) {
	color: <?php echo esc_html($footer_bottom_text); ?>;
	border-left: 1px solid <?php echo esc_html($footer_bottom_line); ?>;
    border-right: 1px solid <?php echo esc_html($footer_bottom_line); ?>;
}
.neder-footer-bottom .col-xs-4:nth-child(3) {
	color: <?php echo esc_html($footer_bottom_text); ?>;
}
.neder-footer-bottom .neder-top-menu li a {
    color: <?php echo esc_html($footer_bottom_text); ?>;
}
.neder-footer-bottom a:hover {
    color: <?php echo esc_html($main_color); ?> !important;
}
.backtotop .nedericon.fa-angle-up {
    background: <?php echo esc_html($main_color); ?>;
    color: <?php echo esc_html($content_post); ?>;
}
.backtotop .nedericon.fa-angle-up:hover {
    background: <?php echo esc_html($secondary_color); ?>;
}




.neder-vc-element-header .article-title a {
    color: <?php echo esc_html($content_post); ?>;
}
.neder-vc-element-header .article-title a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-vc-element-header .article-category a {
	background: <?php echo esc_html($main_color); ?>;
    color: <?php echo esc_html($content_post); ?>;
}
.neder-vc-element-header .article-category a:hover {
	background: <?php echo esc_html($secondary_color); ?>;
	color: <?php echo esc_html($content_post); ?>;
}
.neder-vc-element-header .article-info-bottom {
    color: <?php echo esc_html($content_post); ?>;
}
.neder-vc-element-header .article-info-bottom a {
	color:<?php echo esc_html($content_post); ?>;
}
.neder-vc-element-header .article-info-bottom a:hover,
.neder-vc-element-header .article-info-bottom .article-comments a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-header-type1 .article-title a {
    color: <?php echo esc_html($content_post); ?>;
}
.neder-header-type1 .article-title a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-header-type1 .article-category a {
	background: <?php echo esc_html($main_color); ?>;
    color: <?php echo esc_html($content_post); ?>;
}
.neder-header-type1 .article-category a:hover {
	background: <?php echo esc_html($secondary_color); ?>;
	color: <?php echo esc_html($content_post); ?>;
}
.neder-header-type1 .article-info-bottom i {
	margin-right:10px;
}
.neder-header-type1 .article-info-bottom a {
	color:<?php echo esc_html($content_post); ?>;
}
.neder-header-type1 .article-info-bottom a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-header-type3 .others-element-header {
	background:<?php echo esc_html($content_navigation_background); ?>;
}
.neder-header-type3 .others-element-header .article-title a {
	color:<?php echo esc_html($content_title); ?>;
}
.neder-header-type3 .others-element-header .article-title a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-header-type4 .owl-controls i {
	background: <?php echo esc_html($content_background); ?>;
	color: <?php echo esc_html($content_title); ?>;
}
.neder-header-type4 .owl-controls i:hover {
	color: <?php echo esc_html($main_color); ?>;
}





.neder-vc-element-posts-carousel .article-title a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-vc-element-posts-carousel .article-category a {
	background: <?php echo esc_html($main_color); ?>;
	color: <?php echo esc_html($content_post); ?>;
}
.neder-vc-element-posts-carousel .article-category a:hover {
	background:<?php echo esc_html($secondary_color); ?>;
}
.neder-vc-element-posts-carousel .article-comments a:hover {
	color: <?php echo esc_html($main_color); ?>;
}
.neder-vc-element-posts-carousel .article-info-bottom .article-excerpt a {
	color:<?php echo esc_html($content_text_info); ?>;
}
.neder-vc-element-posts-carousel .article-info-bottom .article-excerpt a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-vc-element-posts-carousel-title-box {
	border-bottom: 2px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.neder-vc-element-posts-carousel-title-box h2 {
	color: <?php echo esc_html($content_title); ?>;
	border-bottom: 2px solid <?php echo esc_html($main_color); ?>;
}
.neder-vc-element-posts-carousel #neder-load-posts a {
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.neder-vc-element-posts-carousel #neder-load-posts a:hover {
    background: <?php echo esc_html($content_navigation_background); ?>;
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
}
.neder-vc-element-posts-carousel.owl-theme .owl-controls .owl-nav [class*="owl-"] {
    border: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.neder-vc-element-posts-carousel .owl-dot.active {
    border: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.neder-vc-element-posts-carousel .owl-dot {
    border: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.neder-vc-element-posts-carousel.owl-theme .owl-dots .owl-dot span {
    background: <?php echo esc_html($content_title); ?>;
}
.neder-vc-element-posts-carousel.owl-theme .owl-dots .owl-dot.active span,
.neder-vc-element-posts-carousel.owl-theme .owl-dots .owl-dot:hover span {
    background: <?php echo esc_html($main_color); ?>;
}
.neder-vc-element-posts-carousel.owl-theme .owl-controls .owl-nav [class*="owl-"]:hover {
	background:<?php echo esc_html($header_bottom_border_submenu); ?>;
}
@media screen and (max-width: 700px) {
	.neder-vc-element-posts-carousel.neder-posts-carousel-type1 .neder-vc-element-posts-carousel-article-container article:nth-child(2) {
		border-top: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
	}
}
.neder-vc-element-posts-tab article {
    border-top: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.neder-vc-element-posts-tab .article-title a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-vc-element-posts-tab .article-category a {
	background: <?php echo esc_html($main_color); ?>;
	color: <?php echo esc_html($content_post); ?>;
}
.neder-vc-element-posts-tab .article-category a:hover {
	background:<?php echo esc_html($secondary_color); ?>;
}
.neder-vc-element-posts-tab .article-info-bottom .article-excerpt a {
	color:<?php echo esc_html($content_text_info); ?>;
}
.neder-vc-element-posts-tab .article-info-bottom .article-excerpt a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-vc-element-posts-tab-title-box {
	border-bottom: 2px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.neder-vc-element-posts-tab-title-box h2 {
	color:  <?php echo esc_html($content_title); ?>;
	border-bottom: 2px solid <?php echo esc_html($main_color); ?>;
}
.neder-vc-element-posts-tab-title-tabs span {
	color: <?php echo esc_html($content_title); ?>;
	border-bottom: 2px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.neder-vc-element-posts-tab-title-tabs .neder_ndwp_tab_active,
.neder-vc-element-posts-tab-title-tabs span:hover  {
	border-bottom: 2px solid <?php echo esc_html($main_color); ?>;
}
@media screen and (max-width: 800px) {
	.neder-vc-element-posts-tab .ndwp-vc-element-posts-tab-container article:nth-child(2),
	.neder-vc-element-posts-tab .ndwp-vc-element-posts-tab-container article:nth-child(3) {
		border-top: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
	}
}
.neder-vc-element-posts .article-title a:hover {
	color:<?php echo esc_html($main_color); ?>;
}
.neder-vc-element-posts .article-category a {
	color: <?php echo esc_html($content_post); ?>;
}
.neder-vc-element-posts .article-category a:hover {
	background:<?php echo esc_html($secondary_color); ?>;
}
.neder-vc-element-posts .article-data,
.neder-vc-element-posts.neder-posts-type5 .article-info-top .article-data,
.neder-element-posts.neder-posts-layout4 .article-info-top .article-data,
.neder-element-posts.neder-posts-layout5 .others-post .article-data,
.neder-vc-element-posts.neder-posts-type6 .others-post .article-data {
	color: <?php echo esc_html($content_text_info); ?>;
}
.neder-vc-element-posts .article-comments {
	color: <?php echo esc_html($content_text_info); ?>;	
}
.neder-vc-element-posts .article-comments a:hover,
.neder-vc-element-posts .article-info-top .article-comments a:hover,
.neder-element-posts .article-info-top .article-comments a:hover {
	color: <?php echo esc_html($main_color); ?>;
}
.neder-vc-element-posts .article-info-bottom .article-excerpt a,
.neder-vc-element-posts .article-excerpt a {
	color:<?php echo esc_html($content_text); ?>;
}
.neder-vc-element-posts .article-info-bottom .article-excerpt a:hover,
.neder-vc-element-posts .article-excerpt a:hover {
	color:<?php echo esc_html($secondary_color); ?>;
}
.neder-vc-element-posts-title-box {
	border-bottom: 2px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
.neder-vc-element-posts-title-box h2 {
	color: <?php echo esc_html($content_title); ?>;
	border-bottom: 2px solid <?php echo esc_html($main_color); ?>;
}
.neder-vc-element-posts #neder-load-posts a {
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.neder-vc-element-posts #neder-load-posts a:hover {
    background: <?php echo esc_html($content_navigation_background); ?>;
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
}
.neder-vc-pagination a {
    border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.neder-vc-pagination a:hover {
    background: <?php echo esc_html($content_navigation_background); ?>;
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
}
.ndwp-numeric-pagination .current {
	background:<?php echo esc_html($content_navigation_background); ?>;
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.ndwp-numeric-pagination i {
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.ndwp-numeric-pagination i:hover {
	background:<?php echo esc_html($content_navigation_background); ?>;
	border:1px solid <?php echo esc_html($content_navigation_background); ?>;
}
.neder-posts-type1 article.col-xs-4 {
}
@media screen and (max-width: 900px) {
	.neder-posts-type1 article.col-xs-4 {
		border-bottom:1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
	}
	.neder-posts-type1 article.col-xs-4 {
		border-left: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
		border-right: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
	}
}
.neder-vc-element-posts.neder-posts-type3 .item-posts.first-element-posts {
    border-top: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
@media screen and (max-width: 700px) {
	.neder-vc-element-posts.neder-posts-type3 .neder-vc-element-posts-article-container article:nth-child(2) {
		border-top: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
	}
}
.neder-vc-element-posts.neder-posts-type4 .item-posts.first-element-posts {
    border-top: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
@media screen and (max-width: 700px) {
	.neder-vc-element-posts.neder-posts-type4 .neder-vc-element-posts-article-container article:nth-child(2) {
		border-top: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
	}
}
.neder-vc-element-posts.neder-posts-type5 .item-posts.first-element-posts {
    border-top: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
@media screen and (max-width: 800px) {
	.neder-vc-element-posts.neder-posts-type5 .neder-vc-element-posts-article-container article:nth-child(2) {
		border-top: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
	}
}
.neder-vc-element-posts.neder-posts-type6 .item-posts.first-element-posts {
    border-top: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
}
@media screen and (max-width: 700px) {
	.neder-vc-element-posts.neder-posts-type6 .neder-vc-element-posts-article-container article:nth-child(2) {
		border-top: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
	}
}
@media screen and (max-width: 400px) {
	.neder-vc-element-posts.neder-posts-type6 .neder-vc-element-posts-article-container article:nth-child(3), 
	.neder-vc-element-posts.neder-posts-type6 .neder-vc-element-posts-article-container article:nth-child(4) {
		border-top: 1px solid <?php echo esc_html($header_bottom_border_submenu); ?>;
	}
}
#neder-user-modal .modal-content {
	border: 3px solid <?php echo esc_html($main_color); ?>;
	background: <?php echo esc_html($content_background); ?>;
}
#neder_login_form label,
#neder_login_form .alignright,
.neder-register-footer,
#neder-user-modal .close,
.neder-register-footer > a,
#neder_login_form a {
	color: <?php echo esc_html($content_title); ?>;
}
.neder-register-footer > a:hover,
#neder_login_form a:hover {
	color: <?php echo esc_html($main_color); ?>;
}
.tags-links > a {
	color: <?php echo esc_html($content_title); ?>
}
.tags-links > a:hover {
	color: <?php echo esc_html($main_color); ?>;
}
.neder-post .social-post a:hover {
    border: 1px solid <?php echo esc_html($main_color); ?>;
    background: <?php echo esc_html($main_color); ?>;	
}
.neder-post .social-post .container-social:before, .neder-post .social-post .container-social:after {
	border-bottom: 1px solid <?php echo esc_html($content_navigation_background); ?>;
}
ul.neder_line li:before { 
	border-bottom:1px solid <?php echo esc_html($main_color); ?>;
}










<?php if ( class_exists( 'WooCommerce' ) ) { ?>
	.neder-woocommerce-add-to-cart-container.col-sm-1:hover a,
	.neder-woocommerce-add-to-cart-container.col-sm-1:hover a i {
		color:<?php echo esc_html($main_color); ?>;
	}
	.neder-woocommerce-menu a i {
		color: <?php echo esc_html($content_post); ?>;
	}
	.neder-woocommerce-menu a {
		color: <?php echo esc_html($content_post); ?>;
	}
	.woocommerce ul.products li.product .woocommerce-loop-product__title,
	.woocommerce ul.products li.product .price {
		color: <?php echo esc_html($content_title); ?>;
	}
	.woocommerce .star-rating {
		color: <?php echo esc_html($main_color); ?>;
	}
	.woocommerce #respond input#submit,
	.woocommerce a.button,
	.woocommerce button.button,
	.woocommerce input.button {
		background: <?php echo esc_html($main_color); ?>;
		color: <?php echo esc_html($content_post); ?>;
	}
	.woocommerce #respond input#submit:hover,
	.woocommerce a.button:hover,
	.woocommerce button.button:hover,
	.woocommerce input.button:hover {
		background: <?php echo esc_html($secondary_color); ?>;
		color:<?php echo esc_html($content_post); ?>;
	}
	.woocommerce span.onsale {
		background-color: <?php echo esc_html($main_color); ?>;
		color: <?php echo esc_html($content_post); ?>;
	}
	.woocommerce span.onsale:hover {
		background: <?php echo esc_html($secondary_color); ?>;
	}
	.woocommerce nav.woocommerce-pagination ul li a:focus,
	.woocommerce nav.woocommerce-pagination ul li a:hover,
	.woocommerce nav.woocommerce-pagination ul li span.current {
		background: <?php echo esc_html($content_navigation_background); ?>;
		color: <?php echo esc_html($content_title); ?>;
	}
	.woocommerce nav.woocommerce-pagination ul li a,
	.woocommerce nav.woocommerce-pagination ul li span {
		color: <?php echo esc_html($content_title); ?>;
	}
	.single-product.woocommerce .woocommerce-review-link {
		color: <?php echo esc_html($content_text); ?>;
	}
	.single-product.woocommerce ins .woocommerce-Price-amount.amount {
		color: <?php echo esc_html($content_title); ?>;
	}
	.single-product.woocommerce div.product p.price,
	.single-product.woocommerce div.product span.price {
		color: <?php echo esc_html($content_title); ?>;
	}
	.single-product.woocommerce #respond input#submit.alt,
	.single-product.woocommerce a.button.alt,
	.single-product.woocommerce button.button.alt,
	.single-product.woocommerce input.button.alt {
		background-color: <?php echo esc_html($main_color); ?>;
		color: <?php echo esc_html($content_post); ?>;
	}
	.single-product.woocommerce #respond input#submit.alt:hover,
	.single-product.woocommerce a.button.alt:hover,
	.single-product.woocommerce button.button.alt:hover,
	.single-product.woocommerce input.button.alt:hover {
		background-color: <?php echo esc_html($secondary_color); ?>;
	}
	.single-product.woocommerce .quantity .qty {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.woocommerce div.product .woocommerce-tabs ul.tabs li.active {
		background:<?php echo esc_html($secondary_color); ?>;
		color: <?php echo esc_html($content_post); ?>;
	}
	.woocommerce div.product .woocommerce-tabs ul.tabs li {
		background:<?php echo esc_html($main_color); ?>;
	}
	.woocommerce div.product .woocommerce-tabs ul.tabs li:hover {
		background:<?php echo esc_html($secondary_color); ?>;
	}
	.woocommerce div.product .woocommerce-tabs ul.tabs li a {
		color: <?php echo esc_html($content_post); ?>;
	}
	.woocommerce div.product .woocommerce-tabs ul.tabs li:hover a {
		color: <?php echo esc_html($content_post); ?>;
	}
	.single-product.woocommerce div.product .woocommerce-tabs ul.tabs {
		border-bottom: 1px solid <?php echo esc_html($content_navigation_background); ?>;
		border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
		border-right:1px solid <?php echo esc_html($main_color); ?>;
	}
	.summary.entry-summary .woocommerce-Price-amount.amount {
		color: <?php echo esc_html($content_title); ?>;
	}
	.woocommerce #reviews #comments ol.commentlist li .comment-text {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.comment-reply-title {
		border-left:1px solid <?php echo esc_html($content_navigation_background); ?>;
		border-bottom:1px solid <?php echo esc_html($content_navigation_background); ?>;
		border-top:1px solid <?php echo esc_html($content_navigation_background); ?>;
		border-right:1px solid <?php echo esc_html($main_color); ?>;
	}
	.woocommerce-message {
		border-top-color:<?php echo esc_html($main_color); ?>;
	}
	.woocommerce-message::before {
		color:<?php echo esc_html($main_color); ?>;
	}
	.woocommerce table.shop_table td {
		border-top: 1px dashed <?php echo esc_html($content_navigation_background); ?>;
	}
	.woocommerce table.shop_table th {
		border-bottom: 2px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.woocommerce .product-name a {
		color: <?php echo esc_html($content_title); ?>;
	}
	.woocommerce .product-name a:hover {
		color: <?php echo esc_html($main_color); ?>;
	}
	.woocommerce .input-text.qty.text {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.woocommerce a.button.alt {
		background-color:<?php echo esc_html($main_color); ?>;
	}
	.woocommerce a.button.alt:hover {
		background-color:<?php echo esc_html($secondary_color); ?>;
	}
	.woocommerce .checkout .input-text {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.woocommerce-info::before {
		color: <?php echo esc_html($main_color); ?>;
	}
	.woocommerce-info {
		border-top-color: <?php echo esc_html($main_color); ?>;
	}
	.woocommerce #respond input#submit.alt,
	.woocommerce a.button.alt,
	.woocommerce button.button.alt,
	.woocommerce input.button.alt {
		background-color: <?php echo esc_html($main_color); ?>;
		color: <?php echo esc_html($content_post); ?>;
	}
	.woocommerce #respond input#submit.alt:hover,
	.woocommerce a.button.alt:hover,
	.woocommerce button.button.alt:hover,
	.woocommerce input.button.alt:hover {
		background-color: <?php echo esc_html($secondary_color); ?>;
	}
	.woocommerce-account .neder-post .neder-content li,
	.woocommerce-account .neder-post .neder-content li,
	.woocommerce-account .neder-page .neder-content li,
	.woocommerce-account .neder-page .neder-content li {
		background: <?php echo esc_html($main_color); ?>;
	}
	.woocommerce-account .neder-post .neder-content li:hover,
	.woocommerce-account .neder-post .neder-content li:hover,
	.woocommerce-account .neder-page .neder-content li:hover,
	.woocommerce-account .neder-page .neder-content li:hover {
		background: <?php echo esc_html($secondary_color); ?>;
	}
	.woocommerce.widget_product_search input {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;		
	}
	.woocommerce.widget_product_search input[type="submit"] {
		background: <?php echo esc_html($main_color); ?>;
		color: <?php echo esc_html($content_post); ?>;
	}
	.woocommerce.widget_product_search input[type="submit"]:hover {
		background: <?php echo esc_html($secondary_color); ?>;
		color: <?php echo esc_html($content_post); ?>;
	}
	.woocommerce ul.product_list_widget li {
		border-bottom: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.widget.woocommerce .product_list_widget .product-title {
		color: <?php echo esc_html($content_title); ?>;
	}
	.widget.woocommerce .product_list_widget .product-title:hover {
		color:<?php echo esc_html($main_color); ?>;
	}
	.widget.woocommerce .product_list_widget del,
	.widget.woocommerce .product_list_widget ins {
		color: <?php echo esc_html($content_title); ?>;
	}
	.widget.woocommerce .product_list_widget .woocommerce-Price-amount.amount {
		color: <?php echo esc_html($content_title); ?>;	
	}
	.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content {
		background-color:<?php echo esc_html($main_color); ?>;
	}
	.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
	.woocommerce .widget_price_filter .ui-slider .ui-slider-range {
		background-color:<?php echo esc_html($secondary_color); ?>;
	}
	.woocommerce.widget_recent_reviews ul.product_list_widget li a {
		color: <?php echo esc_html($content_title); ?>;
	}
	.woocommerce div.product p.price,
	.woocommerce div.product .stock {
		color:<?php echo esc_html($content_title); ?>;
	}
	.woocommerce .single-product div.product .woocommerce-tabs ul.tabs {
		border-bottom: 1px solid <?php echo esc_html($content_navigation_background); ?>;
		border-top: 1px solid <?php echo esc_html($content_navigation_background); ?>;
		border-right:1px solid <?php echo esc_html($main_color); ?>;
	}
	.woocommerce .single-product div.product .woocommerce-tabs ul.tabs li.active {
		background:<?php echo esc_html($secondary_color); ?>;
		color: <?php echo esc_html($content_post); ?>;
	}
	.footer-widget .widget.woocommerce .product_list_widget .product-title {
		color: <?php echo esc_html($content_post); ?>;
	}
	.footer-widget .widget.woocommerce .product_list_widget .woocommerce-Price-amount.amount {
		color: <?php echo esc_html($content_text); ?>;
	}
	.footer-widget .widget.woocommerce .product_list_widget .product-title:hover {
		color:<?php echo esc_html($main_color); ?>;
	}
	.footer-widget .widget.woocommerce.widget_product_tag_cloud .tagcloud a {
		color: <?php echo esc_html($content_text); ?>;
	}
	.footer-widget .widget.woocommerce.widget_product_tag_cloud .tagcloud a:hover {
		color:<?php echo esc_html($main_color); ?>;
	}
<?php } ?>	


<?php if ( class_exists( 'bbPress' ) ) { ?>
	/* BBPRESS */
	#bbpress-forums .button {
		background:<?php echo esc_html($main_color); ?>;
		color: <?php echo esc_html($content_post); ?>;
	}
	#bbpress-forums #bbp-search-form #bbp_search {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	#bbpress-forums div.odd, #bbpress-forums ul.odd {
		background-color: <?php echo esc_html($content_post); ?>;
	}
	#bbpress-forums li.bbp-header {
		background: <?php echo esc_html($content_navigation_background); ?>;
		color: <?php echo esc_html($content_text); ?>;
	}
	#bbpress-forums .bbp-forum-title,
	#bbpress-forums .bbp-topic-permalink {
		color: <?php echo esc_html($content_title); ?>;
	}
	#bbpress-forums .bbp-forum-title:hover,
	#bbpress-forums .bbp-topic-permalink:hover {
		color: <?php echo esc_html($main_color); ?>;
	}
	#bbpress-forums .bbp-forum-info .bbp-forum-content,
	#bbpress-forums p.bbp-topic-meta,
	#bbpress-forums .bbp-topic-started-by {
		color: <?php echo esc_html($footer_bottom_text); ?>;
	}
	#bbpress-forums .bbp-forums-list li a {
		color:<?php echo esc_html($content_title); ?>;
	}
	#bbpress-forums .bbp-forums-list li a:hover {
		color:<?php echo esc_html($main_color); ?>;
	}
	#bbpress-forums .bbp-forum-topic-count,
	#bbpress-forums .bbp-forum-reply-count,
	#bbpress-forums .bbp-forum-freshness,
	#bbpress-forums .bbp-forum-info,
	#bbpress-forums .bbp-topic-title,
	#bbpress-forums .bbp-topic-voice-count,
	#bbpress-forums .bbp-topic-reply-count {
		color: <?php echo esc_html($content_title); ?>;
	}
	#bbpress-forums .bbp-forum-freshness > a,
	#bbpress-forums .bbp-topic-freshness > a {
		color: <?php echo esc_html($footer_bottom_text); ?>;
	}
	#bbpress-forums .bbp-author-name {
		color: <?php echo esc_html($content_title); ?>;
	}
	#bbpress-forums .bbp-author-name:hover {
		color: <?php echo esc_html($main_color); ?>;
	}
	#bbpress-forums #bbp-single-user-details #bbp-user-navigation li.current a,
	#bbpress-forums #bbp-single-user-details #bbp-user-navigation li a:hover {
		background:<?php echo esc_html($main_color); ?>;
		color:<?php echo esc_html($content_post); ?>;
	}
	#bbpress-forums #bbp-single-user-details #bbp-user-navigation li a {
		background:<?php echo esc_html($content_navigation_background); ?>;
		color:<?php echo esc_html($content_title); ?>;
	}
	#bbpress-forums .bbp-breadcrumb .bbp-breadcrumb-home,
	#bbpress-forums .bbp-breadcrumb-sep,
	#bbpress-forums .bbp-breadcrumb-current,
	#bbpress-forums .bbp-breadcrumb-root,
	#bbpress-forums .bbp-breadcrumb-forum,
	#bbpress-forums .bbp-topic-started-in > a {
		color: <?php echo esc_html($footer_bottom_text); ?>;
	}
	#bbpress-forums .bbp-breadcrumb .bbp-breadcrumb-home:hover,
	#bbpress-forums .bbp-breadcrumb-sep:hover,
	#bbpress-forums .bbp-breadcrumb-root:hover,
	#bbpress-forums .bbp-breadcrumb-forum:hover,
	#bbpress-forums .bbp-topic-started-in > a:hover {
		color: <?php echo esc_html($main_color); ?>;
	}
	#bbpress-forums .bbp-topics-front ul.super-sticky,
	#bbpress-forums .bbp-topics ul.super-sticky,
	#bbpress-forums .bbp-topics ul.sticky,
	#bbpress-forums .bbp-forum-content ul.sticky {
		background-color:<?php echo esc_html($content_post); ?> !important;
	}
	#bbpress-forums .status-closed,
	#bbpress-forums .status-closed a {
		color: <?php echo esc_html($content_title); ?>;
	}
	#bbpress-forums fieldset.bbp-form legend {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	#bbpress-forums fieldset.bbp-form {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	#bbpress-forums div.bbp-the-content-wrapper textarea.bbp-the-content {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	/* WIDGET BBPRESS */
	.widget.widget_display_search #bbp-search-form input#bbp_search {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.widget.widget_display_search #bbp-search-form input.button {
		background: <?php echo esc_html($main_color); ?>;
		color: <?php echo esc_html($content_post); ?>;
	}
	.widget.widget_display_forums li,
	.widget.widget_display_topics li,
	.widget.widget_display_views li,
	.widget.widget_display_replies li {
		border-bottom: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.widget.bbp_widget_login .bbp-logged-in a.button.logout-link {
		color:<?php echo esc_html($footer_bottom_text); ?>;
	}
	.widget.bbp_widget_login .bbp-logged-in a.button.logout-link:hover {
		color:<?php echo esc_html($main_color); ?>;
	}
	.widget.bbp_widget_login .bbp-login-form label {
		color: <?php echo esc_html($content_title); ?>;
	}
	.widget.bbp_widget_login .bbp-login-form input {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.widget.bbp_widget_login .bbp-login-form .bbp-remember-me > label {
		color: <?php echo esc_html($footer_bottom_text); ?>;
	}
	.widget.bbp_widget_login .bbp-login-form .bbp-submit-wrapper {
		background: <?php echo esc_html($main_color); ?>;
	}
	.widget.bbp_widget_login .bbp-login-form .bbp-submit-wrapper:hover,
	.widget.bbp_widget_login .bbp-login-form .bbp-submit-wrapper:hover .button {
		background: <?php echo esc_html($secondary_color); ?>;
	}
	.widget.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .button {
		background: <?php echo esc_html($main_color); ?>;
		color: <?php echo esc_html($content_post); ?>;
	}
	.widget.widget_display_stats dl dt {
		color: <?php echo esc_html($content_title); ?>;
	}
	.widget.widget_display_stats dl dd {
		color: <?php echo esc_html($content_title); ?>;
		border-bottom:1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.widget.bbp_widget_login .bbp-login-form .bbp-remember-me > label {
		color: <?php echo esc_html($footer_bottom_text); ?>;
	}
<?php } ?>


<?php if ( class_exists( 'BuddyPress' ) ) { ?>
	/* BUDDYPRESS */
	#buddypress div.item-list-tabs ul li.current a,
	#buddypress div.item-list-tabs ul li.selected a,
	#buddypress div.item-list-tabs ul li a,
	#buddypress div.item-list-tabs ul li span {
		background-color: <?php echo esc_html($main_color); ?>;
		color: <?php echo esc_html($content_post); ?>;
	}
	#buddypress div.item-list-tabs ul li.current a:hover,
	#buddypress div.item-list-tabs ul li.selected a:hover,
	#buddypress div.item-list-tabs ul li a:hover,
	#buddypress div.item-list-tabs ul li span:hover {
		background:<?php echo esc_html($secondary_color); ?>;
	}
	#buddypress div.item-list-tabs ul li a span {
		color: <?php echo esc_html($content_title); ?>;
	}
	#buddypress .comment-reply-link,
	#buddypress .generic-button a,
	#buddypress .standard-form button,
	#buddypress a.button,
	#buddypress input[type="button"],
	#buddypress input[type="reset"],
	#buddypress input[type="submit"],
	#buddypress ul.button-nav li a,
	#buddypress a.bp-title-button {
		background: <?php echo esc_html($main_color); ?>;
		color: <?php echo esc_html($content_post); ?>;
	}
	#buddypress .comment-reply-link:hover,
	#buddypress .standard-form button:hover,
	#buddypress a.button:focus,
	#buddypress a.button:hover,
	#buddypress div.generic-button a:hover,
	#buddypress input[type="button"]:hover,
	#buddypress input[type="reset"]:hover,
	#buddypress input[type="submit"]:hover,
	#buddypress ul.button-nav li a:hover,
	#buddypress ul.button-nav li.current a {
		background: <?php echo esc_html($secondary_color); ?>;
		color:<?php echo esc_html($content_post); ?>;
	}
	#buddypress div.dir-search input[type="text"],
	#buddypress li.groups-members-search input[type="text"] {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
		color: <?php echo esc_html($content_text); ?>;
	}
	#buddypress .item-list-tabs #groups-order-select label,
	#buddypress .item-list-tabs #members-order-select label,
	#buddypress .item-list-tabs #activity-filter-select label {
		color: <?php echo esc_html($content_title); ?>;
	}
	#buddypress div.item-list-tabs ul li.last select {
		color:<?php echo esc_html($content_title); ?>;
	}
	#buddypress div.item-list-tabs ul li.last select option {
		color: <?php echo esc_html($content_title); ?>;
	}
	#buddypress div.pagination .pag-count {
		color: <?php echo esc_html($content_title); ?>;
	}
	#buddypress div.pagination .pagination-links a,
	#buddypress div.pagination .pagination-links span {
		color: <?php echo esc_html($content_text); ?>;
	}
	#buddypress div.pagination .pagination-links .page-numbers.current {
		color: <?php echo esc_html($content_title); ?>;
	}
	#buddypress div.pagination .pagination-links .page-numbers.current:hover {
		color: <?php echo esc_html($content_title); ?>;
	}
	#buddypress div.pagination .pagination-links .page-numbers:hover {
		color:<?php echo esc_html($main_color); ?>;
	}
	#buddypress .groups.dir-list li .item .item-title a {
		color: <?php echo esc_html($content_title); ?>;
	}
	#buddypress .groups.dir-list li .item .item-meta .activity {
		color: <?php echo esc_html($footer_bottom_text); ?>;
	}
	#buddypress ul.item-list li div.meta {
		color: <?php echo esc_html($footer_bottom_text); ?>;
	}
	#buddypress .members.dir-list .item .item-title a {
		color: <?php echo esc_html($content_title); ?>;
	}
	#buddypress .members.dir-list .item .item-meta .activity {
		color: <?php echo esc_html($footer_bottom_text); ?>;
	}
	#buddypress .acomment-meta a,
	#buddypress .activity-header a,
	#buddypress .comment-meta a {
		color: <?php echo esc_html($content_title); ?>;
	}
	#buddypress a.activity-time-since {
		color: <?php echo esc_html($footer_bottom_text); ?>;
	}
	#buddypress a.activity-time-since:hover {
		color: <?php echo esc_html($main_color); ?>;
	}
	#buddypress ul.item-list li {
		border-bottom:1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	#buddypress .activity-list li.load-more a,
	#buddypress .activity-list li.load-newest a {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
		color: <?php echo esc_html($content_title); ?>;
	}
	#buddypress .activity-list li.load-more a:hover,
	#buddypress .activity-list li.load-newest a:hover {
		border: 1px solid <?php echo esc_html($main_color); ?>;
		background:<?php echo esc_html($main_color); ?>;
		color: <?php echo esc_html($content_post); ?>;
	}
	.buddypress.logged-in #buddypress #groups-personal span,
	.buddypress.logged-in #buddypress #members-personal span,
	.buddypress.logged-in #buddypress #activity-friends span,
	.buddypress.logged-in #buddypress #activity-groups span,
	.buddypress.logged-in .bp_members #buddypress #item-nav #object-nav li a span {
		background: <?php echo esc_html($content_post); ?>;
	}
	.buddypress.logged-in #buddypress form#whats-new-form textarea {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.buddypress.logged-in #buddypress #item-body .profile .profile-fields tr td.label {
		color:<?php echo esc_html($content_title); ?>;
	}
	.buddypress.logged-in #buddypress #item-body .profile .profile-fields tr td.data p a {
		color:<?php echo esc_html($content_title); ?>;
	}
	.buddypress.logged-in #buddypress #item-body .profile .profile-fields tr td.data p a:hover {
		color:<?php echo esc_html($main_color); ?>;
	}
	.buddypress.logged-in #buddypress #notifications-bulk-management .notifications tr th {
		color: <?php echo esc_html($content_title); ?>;
	}
	.buddypress.logged-in #buddypress #notifications-bulk-management .notifications .notification-description a,
	.buddypress.logged-in #buddypress #notifications-bulk-management .notifications .notification-actions .mark-read.primary {
		color:<?php echo esc_html($content_title); ?>;
	}
	.buddypress.logged-in #buddypress #notifications-bulk-management .notifications .notification-description a:hover,
	.buddypress.logged-in #buddypress #notifications-bulk-management .notifications .notification-actions .mark-read.primary:hover {
		color:<?php echo esc_html($main_color); ?>;
	}
	.buddypress.logged-in #buddypress #notifications-bulk-management .notifications-options-nav select {
		color: <?php echo esc_html($content_title); ?>;
	}
	.buddypress.logged-in #buddypress #item-body #subnav .message-search #search-message-form input#messages_search {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
		color: <?php echo esc_html($content_text); ?>;
	}
	.buddypress.logged-in #buddypress #messages-bulk-management #message-threads.messages-notices thead tr th {
		color: <?php echo esc_html($content_title); ?>;
	}
	.buddypress.logged-in #buddypress table#message-threads tr.unread td {
		background: <?php echo esc_html($content_post); ?>;
		border-bottom: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.buddypress.logged-in #buddypress #item-body .messages #messages-bulk-management #message-threads tbody a {
		color:<?php echo esc_html($content_title); ?>;
	}
	.buddypress.logged-in #buddypress #item-body .messages #messages-bulk-management #message-threads tbody a.delete {
		color:<?php echo esc_html($secondary_color); ?>;
	}
	.buddypress.logged-in #buddypress #item-body .messages #messages-bulk-management #message-threads tbody a:hover {
		color:<?php echo esc_html($main_color); ?>;
	}
	.buddypress.logged-in #buddypress #item-body .messages #messages-bulk-management .messages-options-nav select {
		color: <?php echo esc_html($content_title); ?>;
	}
	.buddypress.logged-in #buddypress #item-body .members.friends .item .item-title a {
		color:<?php echo esc_html($content_title); ?>;
	}
	.buddypress.logged-in #buddypress #item-body .members.friends .item .item-meta .activity {
		color:<?php echo esc_html($footer_bottom_text); ?>;
	}
	.buddypress.logged-in #buddypress #item-body #settings-form.standard-form label {
		color: <?php echo esc_html($content_title); ?>;
	}
	.buddypress.logged-in #buddypress #item-body #settings-form.standard-form .submit .auto {
		background:<?php echo esc_html($main_color); ?>;
	}
	.buddypress.logged-in #buddypress #item-body #settings-form.standard-form .submit .auto:hover {
		background:<?php echo esc_html($secondary_color); ?>;
	}
	/* BUDDYPRESS WIDGET*/
	.widget.widget_bp_groups_widget.buddypress.widget #groups-list li,
	.widget.widget_bp_core_friends_widget.buddypress.widget #friends-list .vcard,
	.widget.widget_bp_core_members_widget.buddypress.widget #members-list .vcard {
		border-bottom: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.widget.widget_bp_groups_widget.buddypress.widget #groups-list-options a,
	.widget.widget_bp_core_friends_widget.buddypress.widget #friends-list-options a,
	.widget.widget_bp_core_members_widget.buddypress.widget #members-list-options a {
		color: <?php echo esc_html($content_title); ?>;
	}
	.widget.widget_bp_groups_widget.buddypress.widget #groups-list-options a:hover,
	.widget.widget_bp_core_friends_widget.buddypress.widget #friends-list-options a:hover,
	.widget.widget_bp_core_members_widget.buddypress.widget #members-list-options a:hover,
	.widget.widget_bp_groups_widget.buddypress.widget #groups-list-options a.selected,
	.widget.widget_bp_core_members_widget.buddypress.widget #members-list-options a.selected {
		color: <?php echo esc_html($main_color); ?>;
	}
	.widget.widget_bp_groups_widget.buddypress.widget .public.group-has-avatar .item .item-meta .activity,
	.widget.widget_bp_core_friends_widget.buddypress.widget #friends-list .vcard .item .item-meta .activity,
	.widget.widget_bp_core_members_widget.buddypress.widget #members-list .vcard .item .item-meta .activity {
		color: <?php echo esc_html($footer_bottom_text); ?>;
	}
	.widget.widget_bp_core_login_widget.buddypress.widget .bp-login-widget-user-link a {
		color: <?php echo esc_html($content_title); ?>;
	}
	.widget.widget_bp_core_login_widget.buddypress.widget .bp-login-widget-user-links .bp-login-widget-user-logout .logout {
		color: <?php echo esc_html($footer_bottom_text); ?>;
	}
	.widget.widget_bp_core_login_widget.buddypress.widget .bp-login-widget-user-links .bp-login-widget-user-logout .logout:hover {
		color: <?php echo esc_html($main_color); ?>;
	}
	.widget.widget_bp_core_login_widget.buddypress.widget #bp-login-widget-form#bp-login-widget-form label {
		color: <?php echo esc_html($content_title); ?>;
	}
	.widget.widget_bp_core_login_widget.buddypress.widget #bp-login-widget-form#bp-login-widget-form input {
		border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
	}
	.widget.widget_bp_core_login_widget.buddypress.widget #bp-login-widget-form.standard-form#bp-login-widget-form .forgetmenot label {
		color: <?php echo esc_html($footer_bottom_text); ?>;
	}
	.widget.widget_bp_core_login_widget.buddypress.widget #bp-login-widget-form.standard-form#bp-login-widget-form input#bp-login-widget-submit {
		background: <?php echo esc_html($main_color); ?>;
		color: <?php echo esc_html($content_post); ?>;
	}
	.widget.widget_bp_core_login_widget.buddypress.widget #bp-login-widget-form.standard-form#bp-login-widget-form input#bp-login-widget-submit:hover {
		background: <?php echo esc_html($secondary_color); ?>;
	}
<?php } ?>	

.neder-menu-style2 nav ul li a:hover {
	color: <?php echo esc_html($header_bottom_text_menu); ?>;
}
.neder-menu-style2 nav ul.submenu li a:hover,
.neder-menu-style2 nav li ul.submenu li.current-menu-item > a:hover, 
.neder-menu-style2 nav li ul.submenu li.current-menu-ancestor > a:hover {
	color: <?php echo esc_html($main_color); ?>;
}
.neder-menu-style2 nav li ul.submenu li.current-menu-item > a,  
.neder-menu-style2 nav li ul.submenu li.current-menu-ancestor > a {
	color: <?php echo esc_html($header_bottom_text_submenu); ?>;
	background: <?php echo esc_html($header_bottom_background_submenu); ?>;
}
.neder-menu-style2 nav > ul > li:hover:before,
.neder-menu-style2 nav > ul > li.current_page_item:before, 
.neder-menu-style2 nav > ul > li.current-menu-item:before,  
.neder-menu-style2 nav > ul > li.current-menu-ancestor:before {
	background-color: <?php echo esc_html($main_color); ?>;
}
.neder-menu-style3 nav ul li a:hover,
.neder-menu-style3 .nedericon.fa-search:hover,
.neder-menu-style3 .nedericon.fa-close {
	color: <?php echo esc_html($main_color); ?>;
}
.neder-menu-style3 .neder-element-posts .article-category a:hover {
	color: <?php echo esc_html($content_post); ?>;
}
.neder-menu-style3 nav li.current-menu-ancestor > a,
.neder-menu-style3 nav ul.submenu li a:hover,
.neder-menu-style3 nav li ul.submenu li.current-menu-item > a:hover, 
.neder-menu-style3 nav li ul.submenu li.current-menu-ancestor > a:hover, 
.neder-menu-style3 nav li ul.submenu li.current-menu-item > a,  
.neder-menu-style3 nav li ul.submenu li.current-menu-ancestor > a {
	color: <?php echo esc_html($main_color); ?>;
}
.neder-menu-style3 nav li ul.submenu li.current-menu-item > a,  
.neder-menu-style3 nav li ul.submenu li.current-menu-ancestor > a {
	background: <?php echo esc_html($header_bottom_background_submenu); ?>;
}


/* Ticker Style 2 */
.neder-top-news-ticker .ticker {
	background-color: <?php echo esc_html($header_top_background); ?>;
}
.neder-top-news-ticker .ticker-title {
	background-color: <?php echo esc_html($header_top_background); ?>;
}
.neder-top-news-ticker .ticker-content a {
	color: <?php echo esc_html($header_top_text); ?>;
}
.neder-top-news-ticker .ticker-content a:hover {	
	color: <?php echo esc_html($main_color); ?>;
}
.neder-top-news-ticker .ticker-swipe {
	background-color: <?php echo esc_html($header_top_background); ?>;
}
.neder-top-news-ticker .ticker-swipe span {
	background-color: <?php echo esc_html($header_top_text); ?>;
}
.neder-top-news-ticker .ticker-controls li.jnt-prev:before {
	color: <?php echo esc_html($header_top_text); ?>;
}
.neder-top-news-ticker .ticker-controls li.jnt-prev.over:before {
	color: <?php echo esc_html($main_color); ?>;
}
.neder-top-news-ticker .ticker-controls li.jnt-next:before {
	color: <?php echo esc_html($header_top_text); ?>;
}
.neder-top-news-ticker .ticker-controls li.jnt-next.over:before {
	color: <?php echo esc_html($main_color); ?>;
}
.neder-top-news-ticker .no-js-news { 
	color: <?php echo esc_html($header_top_text); ?>;
}
.neder-top-news-ticker .ticker-title span {
	background: <?php echo esc_html($main_color); ?>;
    color: <?php echo esc_html($content_post); ?>;
}

.neder-top-news-ticker-addon .news-ticker-item .news-ticker-item-category a {
	background: <?php echo esc_html($main_color); ?>;
	color: <?php echo esc_html($content_post); ?>;
}
.neder-top-news-ticker-addon .news-ticker-item .news-ticker-item-title a {
	color: <?php echo esc_html($content_title); ?>;
}
.neder-top-news-ticker-addon .news-ticker-item .news-ticker-item-title a:hover {
	color: <?php echo esc_html($main_color); ?>;
}
.neder-top-news-ticker-addon .news-ticker-item .news-ticker-item-date {
	color: <?php echo esc_html($content_title); ?>;
}
.neder-top-news-ticker-addon.owl-theme .owl-controls .owl-nav [class*="owl-"] {
    color: <?php echo esc_html($content_title); ?>;
}

/*style 2*/

.neder-top-news-ticker-addon.neder-newsticker-type2.owl-theme .owl-controls .owl-nav [class*="owl-"] {
    border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.neder-top-news-ticker-addon.neder-newsticker-type2.owl-theme .owl-controls .owl-nav .owl-prev:hover,
.neder-top-news-ticker-addon.neder-newsticker-type2.owl-theme .owl-controls .owl-nav .owl-next:hover {
    background: <?php echo esc_html($main_color); ?>;
	color:<?php echo esc_html($content_post); ?>;
	border:1px solid <?php echo esc_html($main_color); ?>;
}
.neder-top-news-ticker-addon.neder-newsticker-type2.owl-carousel.owl-theme.owl-loaded {
    border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
}



/*style 3*/

.neder-top-news-ticker.neder-newsticker-type3 {
	border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
}

.neder-top-news-ticker.neder-newsticker-type3 .ticker-content a {
	color: <?php echo esc_html($content_title); ?>;
}
.neder-top-news-ticker.neder-newsticker-type3 .ticker-swipe {
	background:<?php echo esc_html($content_background); ?>;
	border-left:1px solid <?php echo esc_html($content_title); ?>;
}
.neder-top-news-ticker.neder-newsticker-type3 .ticker-controls li {
    border: 1px solid <?php echo esc_html($content_navigation_background); ?>;
    color: <?php echo esc_html($content_title); ?>;
}
.neder-top-news-ticker.neder-newsticker-type3 .ticker-controls li:hover {
    background: <?php echo esc_html($main_color); ?>;
    border: 1px solid <?php echo esc_html($main_color); ?>;
}
.neder-top-news-ticker.neder-newsticker-type3 .ticker-controls li a:hover {
	color:<?php echo esc_html($content_post); ?>;
}
.neder-top-news-ticker.neder-newsticker-type3 .ticker-controls li.jnt-prev::before,
.neder-top-news-ticker.neder-newsticker-type3 .ticker-controls li.jnt-next::before {
	color:<?php echo esc_html($content_title); ?>;
}
.neder-top-news-ticker.neder-newsticker-type3 .ticker-controls li.jnt-prev:hover::before,
.neder-top-news-ticker.neder-newsticker-type3 .ticker-controls li.jnt-next:hover::before {
	color:<?php echo esc_html($content_post); ?>;
}

#neder_slidepanel .style-toggle {
	background:<?php echo esc_html($main_color); ?>;
	color:<?php echo esc_html($content_post); ?>;
	transition: all 0.3s ease-in-out;
}
#neder_slidepanel .style-toggle:hover {
	background:<?php echo esc_html($secondary_color); ?>;
	transition: all 0.3s ease-in-out;
}
.neder-widget-contact-address i, 
.neder-widget-contact-mail i, 
.neder-widget-contact-mail i, 
.neder-widget-contact-tel-number i, 
.neder-widget-contact-cell-number i {
	color:<?php echo esc_html($main_color); ?>;
}