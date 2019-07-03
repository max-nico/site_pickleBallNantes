jQuery.noConflict()(function($){
"use strict";
	$(document).ready(function() {
		$('.insomnia_vc_button').each(function(index, element) {
			var insomnia_color = $( this ).css( "color" );
			var insomnia_bg = $( this ).css( "background-color" );
			var insomnia_border_color = $( this ).css( "borderTopColor" );
			$(element).hover(
				function() {
					$(this).css({
						'color' :$( this ).attr('data-title-color-hover'),
						'background' :$( this ).attr('data-bg-color-hover'),
						'border-color' :$( this ).attr('data-border-c-hover'),
					});
				},
				function() {
					$(this).css({
						'color' :insomnia_color,
						'background' :insomnia_bg,
						'border-color' :insomnia_border_color,
					});
				}
			);
		});
		
		$( ".insomnia_custom_heading_holder" ).each(function( index ) {
			if($(this).height()>40){
			$(this).find(".insomnia_heading_icon:not(.insomnia_heading_icon_center)").css('margin-top',($(this).height()-$(this).find('i').height())/2);
			}else{
				$(this).find(".insomnia_heading_icon:not(.insomnia_heading_icon_center)").css('margin-top',-2);
				$(this).find(".insomnia_heading_icon:not(.insomnia_heading_icon_center)").css('margin-right',5);
			}
		});
		
		$(".insomnia_over").append('<div class="insomnia_overlay"></div>')
		
		
		$('.insomnia_owl_slider').each(function(index, element) {
			var id =$(element).attr('id');
			if ( $('#'+id).attr('data-arrows') == 'true' ) {
				$( '<i class="fa fa-angle-right"></i>' ).css('font-size',$(element).attr('data-icon-size')).appendTo( $('#'+id+' .owl-next') );
				$( '<i class="fa fa-angle-left"></i>' ).css('font-size',$(element).attr('data-icon-size')).appendTo( $('#'+id+' .owl-prev') );
				var insomnia_color = $( this ).attr('data-color');
				var insomnia_color_h = $( this ).attr('data-color-hover');
				$('#'+id+' .owl-nav i').hover(
					function() {
						$(this).css({
							'color' :insomnia_color_h,
						});
					},
					function() {
						$(this).css({
							'color' :insomnia_color
						});
					}
				);
			}
		});
		
		
		
		$.fn.equalizeHeights = function () {
			return this.height(Math.max.apply(this, $(this).map(function (i, e) {
				return $(e).height()
			}).get()))
		};
		$('.insomnia_inner_equalize_heights .wpb_column').equalizeHeights();

	});


	
	        /***********************************************
         *  jQuery Animated Number
         *  Developers: Arun David, Boobalan
         ***********************************************/

        $(window).on("load",function(){
            $(document).scrollzipInit();
            $(document).rollerInit();
        });
        $(window).on("load scroll resize", function(){
            $('.numscroller').scrollzip({
                showFunction    :   function() {
                    numberRoller($(this).attr('data-slno'));
                },
                wholeVisible    :     false,
            });
        });
        $.fn.scrollzipInit=function(){
            $('body').prepend("<div style='position:fixed;top:0;left:0;width:0;height:0;' id='scrollzipPoint'></div>" );
        };
        $.fn.rollerInit=function(){
            var i=0;
            $('.numscroller').each(function() {
                i++;
                $(this).attr('data-slno',i);
                $(this).addClass("roller-title-number-"+i);
            });
        };
        $.fn.scrollzip = function(options){
            var settings = $.extend({
                showFunction    : null,
                hideFunction    : null,
                showShift       : 0,
                wholeVisible    : false,
                hideShift       : 0
            }, options);
            return this.each(function(i,obj){

                var numbers = $('#scrollzipPoint');
                if (numbers.length) {

                    $(this).addClass('scrollzip');
                    if (!(!$.isFunction(settings.showFunction) || $(this).hasClass('isShown') || $(window).outerHeight() + $('#scrollzipPoint').offset().top - settings.showShift <= $(this).offset().top + (settings.wholeVisible ? $(this).outerHeight() : 0) || $('#scrollzipPoint').offset().top + (settings.wholeVisible ? $(this).outerHeight() : 0) >= $(this).outerHeight() + $(this).offset().top - settings.showShift)) {
                        $(this).addClass('isShown');
                        settings.showFunction.call(this);
                    }
                    if ($.isFunction(settings.hideFunction) && $(this).hasClass('isShown') && ($(window).outerHeight() + $('#scrollzipPoint').offset().top - settings.hideShift < $(this).offset().top + (settings.wholeVisible ? $(this).outerHeight() : 0) || $('#scrollzipPoint').offset().top + (settings.wholeVisible ? $(this).outerHeight() : 0) > $(this).outerHeight() + $(this).offset().top - settings.hideShift)) {
                        $(this).removeClass('isShown');
                        settings.hideFunction.call(this);
                    }
                    return this;
                }
            });
        };

        function numberRoller(slno){
            var min=$('.roller-title-number-'+slno).attr('data-min');
            var max=$('.roller-title-number-'+slno).attr('data-max');
            var timediff=$('.roller-title-number-'+slno).attr('data-delay');
            var increment=$('.roller-title-number-'+slno).attr('data-increment');
            var numdiff=max-min;
            var timeout=(timediff*1000)/numdiff;
            //if(numinc<10){
            //increment=Math.floor((timediff*1000)/10);
            //}//alert(increment);
            numberRoll(slno,min,max,increment,timeout);
        }
        function numberRoll(slno,min,max,increment,timeout){//alert(slno+"="+min+"="+max+"="+increment+"="+timeout);
            if(min<=max){
                $('.roller-title-number-'+slno).html(min);
                min=parseInt(min, 10)+parseInt(increment, 10)
                setTimeout(function(){numberRoll(eval(slno),eval(min),eval(max),eval(increment),eval(timeout))},timeout);
            }else{
                $('.roller-title-number-'+slno).html(max);
            }
        }
});