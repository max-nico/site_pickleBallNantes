jQuery(document).ready(function($) {

	// The number of the next page to load (/page/x/).
	var pageNum = parseInt(neder_ndwp_.startPage) + 1;
	
	// The maximum number of pages the current query can return.
	var max = parseInt(neder_ndwp_.maxPages);
	
	// The link of the next page of posts.
	var nextLink 	= neder_ndwp_.nextLink;
	var readmore 	= neder_ndwp_.readtext;
	var loading 	= neder_ndwp_.loading;
	var nomoreposts = neder_ndwp_.nomoreposts;
	
	/**
	 * Replace the traditional navigation with our own,
	 * but only if there is at least one page of new posts to load.
	 */
	if(pageNum <= max) {
		// Insert the "More Posts" link.
		$('.neder-load-more')
			.append('<div class="neder-placeholder-'+ pageNum +'"></div><div class="neder-clear"></div>')
			.append('<div id="neder-load-posts"><a href="#">'+ readmore + '</a></div>');
	}
	
	
	/**
	 * Load new posts when the link is clicked.
	 */
	$('#neder-load-posts a').click(function() {
	
		// Are there more posts to load?
		if(pageNum <= max) {
		
			// Show that we're working.
			$(this).text(loading);
			
			$('.neder-placeholder-'+ pageNum).load(nextLink + ' .neder-item-load-more',
				function() {
					// Update page number and nextLink.
					pageNum++;
					nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/'+ pageNum);
					
					// Add a new placeholder, for when user clicks again.
					$('#neder-load-posts')
						.before('<div class="neder-placeholder-'+ pageNum +'"></div><div class="neder-clear"></div>')
					
					// Update the button message.
					if(pageNum <= max) {
						$('#neder-load-posts a').text(readmore);
					} else {
						$('#neder-load-posts a').text(nomoreposts);
					}
				}
			);
		} else {
			$('#neder-load-posts a').append('.');
		}	
		
		return false;
	});
});