(function($) {

    "use strict";

    $(document).ready(function() {

        $('body').addClass('sticky-footer'); 

            function contentMb() {
                if ($(window).width() > 767){
                    $('.wrapper').css({
                        marginBottom: $('footer').height()+'px'

                    });   
                }

                else{
                    $('.wrapper').css({
                        marginBottom:'0px'
                    }); 
                }
            }

            function stickyFooter() {

                $('footer').css({
                    position:'fixed',
                    bottom:'0px',
                    zIndex: 0
                });
                
                contentMb();

                setInterval(function() {
                    contentMb();
                },500);


                $(window).on('resize', function() {
                    contentMb();
                });

                $(window).on('scroll resize', function() {

                    var opa = (($(document).height() - $(window).height()) - $(window).scrollTop());
                    opa = opa / $('footer').height();
                    opa = 1 - opa;
                    if(opa < 0) {
                        opa = 0;
                    }

                    $('footer .footer').css({ 
                        opacity: opa 
                    });

                });

            }

        stickyFooter();
            $(window).resize(function(){
                stickyFooter();
            });
    });
})(jQuery);