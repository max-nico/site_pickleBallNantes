(function($){
    "use strict";
    $(document).ready(function() {

            var $container = jQuery('.insomnia_mas_container');
        
            if($container.length) {
                $container.waitForImages(function() {
                    
                    // initialize isotope
                    $container.isotope({
                      itemSelector : '.insomnia_mas_item',
                      layoutMode : 'masonry',
                    });
                    
                    
                },null,true);
            };
     

});

})(jQuery);