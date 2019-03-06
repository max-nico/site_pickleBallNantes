jQuery(document).ready(function($) {
	
	var pageNum = parseInt(neder_ndwp_.startPage) + 1;
	var max = parseInt(neder_ndwp_.maxPages);
	var nextLink = neder_ndwp_.nextLink;
	var readmore = neder_ndwp_.readtext;
	var loading = neder_ndwp_.loading;
	var nomoreposts = neder_ndwp_.nomoreposts;
	
	if(pageNum <= max) {
		$('.neder-load-more-type2 .neder-vc-element-posts-article-container')
			.append('<div class="neder-load-more-container neder-placeholder-'+ pageNum +'-type2"></div><div class="neder-clear"></div>')
			.append('<div id="neder-load-posts" class="neder-load-posts-type2"><a href="#">'+ readmore + '</a></div>');
	}
	
	$('.neder-load-posts-type2 a').click(function() {	
		if(pageNum <= max) {		
			$(this).text(loading);			
			$('.neder-placeholder-'+ pageNum +'-type2').load(nextLink + ' .neder-item-load-more-type2',
				function() {
					pageNum++;
					nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/'+ pageNum);
					$('.neder-load-posts-type2')
						.before('<div class="neder-load-more-container neder-placeholder-'+ pageNum +'-type2"></div><div class="neder-clear"></div>')
					if(pageNum <= max) {
						$('.neder-load-posts-type2 a').text(readmore);
					} else {
						$('.neder-load-posts-type2 a').text(nomoreposts);
					}
				}
			);
		} else {
			$('.neder-load-posts-type2 a').append('.');
		}	
		
		return false;
	});
	
});