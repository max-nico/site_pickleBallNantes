(function($) {"use strict";
    $(document).ready(function() {

function demo_f() {

            $('.tag_line').css('margin-top', (($('.no-transparent .burger-menu').height())))

            $(window).resize(function() {
                $('.tag_line').css('margin-top', (($('.no-transparent .burger-menu').height())))
            });

           /* var insomnia_sticky_menu_offset_top = $('.navbar-wrap').offset().top > 50;

            var insomnia_sticky_menu = function() {
                var scroll_top = $(window).scrollTop();

                if (scroll_top > insomnia_sticky_menu_offset_top) {
                    $('.navbar-fixed-top').addClass('top-nav-collapse');
                } else {
                    $('.navbar-fixed-top').removeClass('top-nav-collapse');
                }
            };

            insomnia_sticky_menu();

            $(window).scroll(function() {
                insomnia_sticky_menu();
            }); */

            function insomniaMenu() {
                $('.burger_insomnia_menu_overlay_normal').find('.menu-item-has-children > a').on('click', function(e) {
                    e.preventDefault();
                    if ($(this).next('ul').is(':visible')) {
                        $(this).removeClass('sub-active').next('ul').slideUp(250);
                    } else {
                        $('.menu-item-has-children > a').removeClass('sub-active').next('ul').slideUp(250);
                        $(this).addClass('sub-active').next('ul').slideToggle(250);
                    }
                });
            }

            insomniaMenu();

            function insomnia_burger_responsive() {
                $('#open-button').click(function(e) {
                    e.preventDefault();

                    $(this).toggleClass('active');
                    $('body').toggleClass('show-menu');
                });
            }

            insomnia_burger_responsive();

            $(".burger_insomnia_main_menu > li").each(function(i) {
                $(this).css({
                    "transform": "translate3d(0, " + (i + 1) * 45 + "px, 0)"
                });
            });
        };


   $(window).on('load', demo_f);



    });
})(jQuery);