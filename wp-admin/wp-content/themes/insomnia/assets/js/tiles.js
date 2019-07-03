    jQuery(document).ready(function() {

            var $container = jQuery('.insomnia_mas_container');
        
            if($container.length) {
                $container.waitForImages(function() {
                    
                    // initialize isotope
                    $container.isotope({
                      itemSelector : '.tiles-style',
                      layoutMode : 'masonry',
                    });
                    
                    
                },null,true);
            };
     
    });