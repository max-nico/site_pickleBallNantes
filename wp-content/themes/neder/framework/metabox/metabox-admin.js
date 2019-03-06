/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 jQuery(document).ready(function($){
		"use strict";	
 		
		$('#neder-layout-type').on("click", function(){
 			var layout_type = $( "#neder-layout-type" ).val();
			if(layout_type != 'neder-page') {
				$('#blog-query').css('display','block');	
			} else {
				$('#blog-query').css('display','none');						
			}		
		});
		
		$('#neder-blog-columns').on("click", function(){
			var blog_columns = $( "#neder-blog-columns" ).val();
			if(blog_columns == '3' || blog_columns == '4') {
				$('#neder-sidebar').css('display','none');
			} else {
				$('#neder-sidebar').css('display','block');
			}
		});	
		
		$('#neder-blog-posts-type').on("click", function(){
			var blog_type = $( "#neder-blog-posts-type" ).val();
			if(blog_type == 'masonry') {
				$('.neder-load-more').css('display','none');
			} else {
				$('.neder-load-more').css('display','block');
			}
		});			
		
		$('#neder-top-content-active').on("click", function(){
			var neder_top_content = $( "#neder-top-content-active" ).val();
			if(neder_top_content == 'on') {
				$('#neder-top-content').css('display','block');
			} else {
				$('#neder-top-content').css('display','none');
			}		
		});

		$('#page_template').on('change', function() {
		   var template_value = $('#page_template').val(); 
		   if(template_value == 'page-fullwidth.php') {
			   $('#neder_layout').css('display','none');
			   $('#neder_top_content').css('display','none');
		   } else {
			   $('#neder_layout').css('display','block');
			   $('#neder_top_content').css('display','block');
		   }
		});
		
 });		