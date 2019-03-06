jQuery(document).ready(function($){
	$('.neder_ndwp_title_recent').on('click', function(event) {
		$('.ndwp-recent').fadeIn();
		$('.ndwp-popular').css("display","none");
		$('.ndwp-tag').css("display","none");
		$('.neder_ndwp_title_recent').addClass('neder_ndwp_tab_active');
		$('.neder_ndwp_title_popular').removeClass('neder_ndwp_tab_active');
		$('.neder_ndwp_title_tag').removeClass('neder_ndwp_tab_active');
	});
	$('.neder_ndwp_title_popular').on('click', function(event) {
		$('.ndwp-recent').css("display","none");
		$('.ndwp-popular').fadeIn();
		$('.ndwp-tag').css("display","none");
		$('.neder_ndwp_title_popular').addClass('neder_ndwp_tab_active');
		$('.neder_ndwp_title_recent').removeClass('neder_ndwp_tab_active');
		$('.neder_ndwp_title_tag').removeClass('neder_ndwp_tab_active');						
	});
	$('.neder_ndwp_title_tag').on('click', function(event) {
		$('.ndwp-recent').css("display","none");
		$('.ndwp-popular').css("display","none");
		$('.ndwp-tag').fadeIn();
		$('.neder_ndwp_title_tag').addClass('neder_ndwp_tab_active');
		$('.neder_ndwp_title_recent').removeClass('neder_ndwp_tab_active');
		$('.neder_ndwp_title_popular').removeClass('neder_ndwp_tab_active');						
	});											
});