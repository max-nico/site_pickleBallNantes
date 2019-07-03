(function($) {

    "use strict";

    $(document).ready(function() {

        $("#status").css('display', 'block');
        $("#preloader").css('display', 'block');

        $('.default_page').css('visibility', 'visible');
        $("#status").fadeOut("slow");
        $("#preloader").fadeOut("slow");

        $('.vc_row[data-vc-full-width="true"]').addClass('insomnia_full_row_vc');

        $(window).on('load resize',function() {
            $('.vc_row[data-vc-full-width="true"]').addClass('insomnia_full_row_vc');
        });


        var introHeader = $('.tag_line_image');
        var intro = $('.tag_line_image');

        buildModuleHeader(introHeader);

        $(window).resize(function() {
            var width = Math.max($(window).width(), window.innerWidth);
            buildModuleHeader(introHeader);
        });

        intro.each(function(i) {
            if ($(this).attr('data-background')) {
                $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
                $('body').addClass('tag_line_active');
            }
        });

        function buildModuleHeader(introHeader) {

        }

        function effectsModuleHeader(introHeader, scrollTopp) {
            if (introHeader.length > 0) {
                var homeSHeight = introHeader.height();
                var topScroll = $(document).scrollTop();

                if ((introHeader.hasClass('tag_line_image')) && ($(scrollTopp).scrollTop() <= homeSHeight)) {
                    introHeader.css('top', (topScroll * .4));
                }

                if (introHeader.hasClass('tag_line_image') && ($(scrollTopp).scrollTop() <= homeSHeight)) {
                    introHeader.css('opacity', (1 - topScroll / introHeader.height() * 1));
                }
            }
        }

        $('.loop').owlCarousel({
            center: false,
            items: 3,
            loop: false,
            dots: false,
            autoplay: true,
            margin: 30,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    center: false
                },
                600: {
                    items: 2,
                    center: false
                },
                992: {
                    items: 3,
                    center: false,
                    margin: 30
                },
                1300: {
                    items: 3
                }
            }
        });

        var el = $('.circle');
        var inited = false;

        el.appear({
            force_process: true
        });
        el.on('appear', function() {
            if (!inited) {
                el.circleProgress();
                inited = true;
            }
        });




        $('.circle').circleProgress({
            size: 125,
            fill: {
                color: insomnia_theme.color
            },
            emptyFill: "#eee",
            startAngle: 300,
            animation: {
                duration: 4000
            }
        }).on('circle-animation-progress', function(event, progress, stepValue) {
            $(this).find('span').text((stepValue * 100).toFixed(1));
        });

        $(document).on('click', '.close-black-block', function(event) {
            event.preventDefault();
            $('.search-icon-header').removeClass('open');
            $(".focus-input").focus();
        });

        $(document).on('click', '.search-icon-header > a', function(event) {
            event.preventDefault();
            $('.search-icon-header').addClass('open');
            $(".focus-input").focus();
        });

        //Header Search
        $('.search-btn-style7').on("click", function() {
            $('body').toggleClass('active-search');
            $(".focus-input").focus();
        });

        $('.gallery-slider').owlCarousel({
            loop: true,
            items: 1,
            margin: 0,
            nav: true,
            autoplay: true,
            dots: false,
            autoplayTimeout: 4000,
            navText: [
                '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'
            ],
            autoplaySpeed: 1000
        });

        $("a[data-gal^='prettyphoto']").prettyPhoto();
        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({
            animation_speed: 'fast',
            theme: 'light_square',
            autoplay_slideshow: false
        });
        $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({
            animation_speed: 'normal',
            slideshow: 10000,
            hideflash: true
        });



        if ($(".tag_line").hasClass('none')) {
            $('body').addClass('tag_line_none');
        }



        $('.margin').css('margin-top', (($('.home .navbar').height())) + 60)
        $('.blog-middle').css('height', (($('.blog-main.multi .blog-images').height())))

        $(window).on('load resize',function() {
            $('.margin').css('margin-top', (($('.home .navbar').height())) + 60)
            $('.blog-middle').css('height', (($('.blog-main.multi .blog-images').height())))
        });




    if (insomnia_theme.menu_style == 'style1' || insomnia_theme.menu_style == 'style2' || insomnia_theme.menu_style == 'style3' || insomnia_theme.menu_style == 'style4' || insomnia_theme.menu_style == 'style6') {
        $(window).on('load resize scroll',function() {

                if ($("body").hasClass('admin-bar')) {
                    $('.navbar-fixed-top').css('top', (($('#wpadminbar').height())))
                } else {
                    $('.navbar-fixed-top').css('top','0px')
                }
        });
    };

    if (insomnia_theme.menu_style == 'style5' || insomnia_theme.menu_style == 'style7' || insomnia_theme.menu_style == 'style8') {
        $(window).on('load resize scroll',function() {
                if ($("body").hasClass('admin-bar')) {
                    if ($(".navbar-fixed-top").hasClass('sticky-menu')) {
                        $('.navbar-fixed-top').css('top', (($('#wpadminbar').height())))
                    } else {
                        $('.navbar-fixed-top').css('top','0px')
                    }
                }
        });
    };

        if (insomnia_theme.menu_style == 'style1' || insomnia_theme.menu_style == 'style2') {

            var insomnia_sticky_menu_offset_top = $('.navbar-wrap').offset().top > 50;
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
            });

            $('body').addClass('menu-style12');


            $(window).on('load resize',function() {
                $('.burger_insomnia_normal_holder').css('height', (($('.menu-style12 .navbar .logo').height())))
            });

            if ($(".tag_line").hasClass('none')) {
                $(window).on('load resize',function() {
                    $('.menu-no-transparent .tag_line.none').css('margin-top', (($('.navbar').height())));
                });
            } else {
                $(window).on('load resize',function() {
                    $('.menu-no-transparent .main-content').css('margin-top', (($('.navbar').height())));
                });
            }

            $(window).on('load resize',function() {
                if ($(".tag_line").hasClass('none')) {
                    $('.menu-transparent .tag_line.none').css('margin-top', (($('.navbar').height())));
                }
            });

        };



    if (insomnia_theme.menu_style == 'style4') {
        $('body').addClass('menu-style4');

            $(window).on('load resize',function() {
                $('.burger_insomnia_normal_holder').css('height', (($('.menu-style4 .navbar .logo').height())))
                $('.search-menu-style4 #searchform').css('height', (($('.menu-style4 .navbar .logo').height())))
            });

            if ($(".tag_line").hasClass('none')) {
                $(window).on('load resize',function() {
                    $('.menu-no-transparent .tag_line.none').css('margin-top', (($('.navbar').height())));
                });
            } else {
                $(window).on('load resize',function() {
                    $('.menu-no-transparent .main-content').css('margin-top', (($('.navbar').height())));
                });
            }

            $(window).on('load resize',function() {
                if ($(".tag_line").hasClass('none')) {
                    $('.menu-transparent .tag_line.none').css('margin-top', (($('.navbar').height())));
                }
            });




        var insomnia_sticky_menu_offset_top = $('.navbar-wrap').offset().top > 50;

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
        });

        };




    if (!insomnia_theme.menu_transparent) {
      $('body').addClass('menu-no-transparent');
    } else {
      $('body').addClass('menu-transparent');
    }



        if (insomnia_theme.menu_style !== 'style5' && insomnia_theme.menu_style !== 'style7' && insomnia_theme.menu_style !== 'style8') {

            $(window).scroll(function() {
                effectsModuleHeader(introHeader, this);
            });
        };

        if (insomnia_theme.menu_style == 'style5' || insomnia_theme.menu_style == 'style7' || insomnia_theme.menu_style == 'style8') {
            $('body').removeClass('menu-transparent');
            $('.menu-wrapper').css('height', (($('.navbar').height()) + 2))

            $(window).on('load resize',function() {
                $('.menu-wrapper').css('height', (($('.navbar').height())))
            });

            var insomnia_sticky_menu_offset_top = $('.navbar').offset().top;

            insomnia_sticky_menu = function() {
                var scroll_top = $(window).scrollTop();

                $('.navbar-custom').removeClass('top-nav-collapse');

                if (scroll_top > insomnia_sticky_menu_offset_top) {
                    $('.navbar-custom').addClass('sticky-menu');
                } else {
                    $('.navbar-custom').removeClass('sticky-menu');
                }
            };

            insomnia_sticky_menu();

            $(window).scroll(function() {
                insomnia_sticky_menu();
            });
        };

        if (insomnia_theme.menu_style == 'style7') {
            $('body').addClass('menu-style7');
        };

        if (insomnia_theme.menu_style == 'style8') {
            $('body').addClass('menu-style8');
            $(window).on('load resize',function() {
                $('.burger_insomnia_normal_holder').css('height', (($('.menu-style8 .navbar .logo').height())))
            });



        };

        function scrollTop() {

            var offset = 500,
                scroll_top_duration = 350,
                $back_to_top = $('.scroll-top');

            $(window).on('scroll', function() {
                if ($(this).scrollTop() > offset) {

                    $back_to_top.addClass('scroll-top-visible').removeClass('scroll-top-hidden');

                } else {

                    $back_to_top.addClass('scroll-top-hidden').removeClass('scroll-top-visible');

                }
            });

            $back_to_top.on('click', function() {
                $('html, body').animate({
                    scrollTop: 0
                }, scroll_top_duration);
                return false;
            });

        }

        scrollTop();

        if (insomnia_theme.menu_style == 'style3' || insomnia_theme.menu_style == 'style6') {

            $('body').addClass('menu-style36');

        if ($(".tag_line").hasClass('none')) {
            $(window).on('load resize',function() {
                $('.menu-no-transparent .tag_line.none').css('margin-top', (($('.navbar').height())));
            });
        } else {
            $(window).on('load resize',function() {
                $('.menu-no-transparent .main-content').css('margin-top', (($('.navbar').height())));

            });
        }

        if ($(".tag_line").hasClass('none')) {
            $('.menu-transparent .tag_line.none').css('margin-top', (($('.navbar').height())));
        }

            $(window).on('load resize',function() {
            if ($(".tag_line").hasClass('none')) {
                $('.menu-transparent .tag_line.none').css('margin-top', (($('.navbar').height())));
            }
        });

            var insomnia_sticky_menu_offset_top = $('.navbar-wrap').offset().top > 50;

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
            });

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

        if (insomnia_theme.menu_style == 'style6') {

            $('.burger_insomnia_normal_holder').css('height', (($('.burger-menu.style6 .logo').height())))
            $('.search-icon-header').css('height', (($('.burger-menu.style6 .logo').height())))

            $(window).on('load resize',function() {
                $('.burger_insomnia_normal_holder').css('height', (($('.burger-menu.style6 .logo').height())))
                $('.search-icon-header').css('height', (($('.burger-menu.style6 .logo').height())))
            });

        };

        if (insomnia_theme.menu_style == 'style3') {

            $('.burger_insomnia_normal_holder').css('height', (($('.burger-menu.style3 .logo').height())))

            $(window).on('load resize',function() {
                $('.burger_insomnia_normal_holder').css('height', (($('.burger-menu.style3 .logo').height())))
            });

        };



        var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true, // act on asynchronously loaded content (default is true)
            callback: function(box) {
                // the callback is fired every time an animation is started
                // the argument that is passed in is the DOM node being animated
            },
            scrollContainer: null // optional scroll container selector, otherwise use window
        });
        wow.init();


        retina();


    });
})(jQuery);
