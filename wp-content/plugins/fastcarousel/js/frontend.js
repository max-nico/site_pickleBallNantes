// JavaScript Document

jQuery(document).ready(function($){

	$('.fg-gallery-caption').on('mouseover mouseout', function(event) {
			if (event.type == 'mouseover') {
				$(this).parents('.gallery-icon').find('.fc_zoom').addClass('fc_over');
				return false;
			} else {
				$(this).parents('.gallery-icon').find('.fc_zoom').removeClass('fc_over');
				return false;				
			}
			
	});
	
});