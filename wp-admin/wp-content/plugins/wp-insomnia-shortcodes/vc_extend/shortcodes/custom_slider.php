<?php
/*Custom Slider*/
add_shortcode('insomnia_custom_slider', 'insomnia_custom_slider_f');
function insomnia_custom_slider_f( $atts, $content = null)
{
	extract(shortcode_atts(
		array(
			'insomnia_id' => 'example_id_for_element',
			'dots_nav' =>'Dots',
			'insomnia_slider_nav' =>'Arrows',
			'insomnia_slider_dots_nav' =>'Dots',
			'insomnia_descr' => "Show",
			'insomnia_slider_nav_s' =>'100px',
			'insomnia_slider_nav_m' =>'-60px',
			'insomnia_slider_nav_p' =>'120px',
			'insomnia_slider_nav_c' =>'#e0e0e0',
			'insomnia_slider_nav_ch' =>'#000',
			'insomnia_autoplay' =>'true',
			'insomnia_margin' =>'0',
			'insomnia_time' =>'5000',
			'insomnia_items_1400' =>'1',
			'insomnia_items_m_1400' =>'0',
			'insomnia_items_1200' =>'1',
			'insomnia_items_m_1200' =>'0',
			'insomnia_items_800' =>'1',
			'insomnia_items_m_800' =>'0',
			'insomnia_items_600' =>'1',
			'insomnia_items_m_600' =>'0',
			'insomnia_items_0' =>'1',
			'insomnia_items_m_0' =>'0',
			
		), $atts)
	);
	$arrow_nav ='false';
	$insomnia_dots_nav ='false';
	$output = '';
	if($insomnia_slider_nav =="Arrows"){
		$arrow_nav ='true';
	}
	if($insomnia_slider_dots_nav =="Dots"){
		$insomnia_dots_nav ='true';
	}


	$extra_class='';
	if($insomnia_descr == 'None'){$extra_class ='do_not_show_hover';}
	$output .='<style>';
		if($insomnia_slider_nav =="Arrows"){
			$output .='#'.$insomnia_id.' { padding:0px '.$insomnia_slider_nav_p.';}';
		}
		$output .= '#'.$insomnia_id.' .owl-nav .owl-prev, #'.$insomnia_id.' .owl-nav .owl-next { margin-top:'.$insomnia_slider_nav_m.' !important; } ';
		$output .='#'. $insomnia_id.' .owl-nav .owl-prev, #'.$insomnia_id.' .owl-nav .owl-next i {color:'.$insomnia_slider_nav_c.'}';
	$output .='</style>';
	
	$output .='<div class="owl-carousel '.$extra_class.' " data-icon-size="'.$insomnia_slider_nav_s.'" data-color-hover="'.$insomnia_slider_nav_ch.'" data-arrows="'.$arrow_nav.'" data-dots="'.$insomnia_dots_nav.'"  data-color="'.$insomnia_slider_nav_c.'" class="insomnia_owl_slider" id="'.$insomnia_id.'">'.do_shortcode($content).'</div>';
	$output .='<script>
jQuery(window).load(function(){
		jQuery("#'.$insomnia_id.'").owlCarousel({
			loop:true,
			autoplay:'.$insomnia_autoplay.',
			margin:'.$insomnia_margin.',
			nav:'.$arrow_nav.',
			autoHeight: true,
			autoplayTimeout:'.$insomnia_time.',
			dots:'.$insomnia_dots_nav.',
			navText:[,],
			responsive: {
				0: {
					margin: '.$insomnia_items_m_0.',
					items: '.$insomnia_items_0.'
				},
				600: {
					margin: '.$insomnia_items_m_600.',
					items: '.$insomnia_items_600.'
				},
				800: {
					margin: '.$insomnia_items_m_800.',
					items: '.$insomnia_items_800.'
				},
				1200: {
					margin: '.$insomnia_items_m_1200.',
					items: '.$insomnia_items_1200.'
				},
				1400: {
					margin: '.$insomnia_items_m_1400.',
					items: '.$insomnia_items_1400.'
				}
			}
		});
		});
	</script>';
	
	return $output;
};

/*Custom Slider*/
vc_map( array(
    "name" => __("Custom Slider", 'insomnia'),
    "base" => "insomnia_custom_slider",
	"category" => __('Insomnia','insomnia'),
    "as_parent" => array('only' => 'vc_testimonial_item, vc_portfolio_item, vc_clients_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
		array(
			"type" => "textfield",
			"param_name" => "insomnia_id",
			"group" => "General",
			"heading" => __("Slider ID", 'insomnia'),
			"value" => 'example_id_for_element',
			"admin_label" => true,
			"description" => __( "Please set slider ID", 'insomnia' )
		),
		array(
			'type' => 'dropdown',
			'heading' => "Autoplay",
			'param_name' => 'insomnia_autoplay',
			"group" => "General",
			'value' => array( "true", "false"),
			'std' => 'true',
			"admin_label" => true,
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_time",
			"group" => "General",
			"heading" => __("Autoplay Timeout", 'insomnia'),
			"value" => '5000',
			"admin_label" => true,
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_margin",
			"group" => "General",
			"heading" => __("Margin", 'insomnia'),
			"value" => '0',
		),

		array(
			'type' => 'dropdown',
			'heading' => "Navigation Dots",
			'param_name' => 'insomnia_slider_dots_nav',
			"group" => "Navigation",
			'value' => array( "Show", "Hide"),
			'std' => 'Hide',
			"admin_label" => true,
		),

		array(
			'type' => 'dropdown',
			'heading' => "Navigation Arrows",
			'param_name' => 'insomnia_slider_nav',
			"group" => "Navigation",
			'value' => array( "Show", "Hide"),
			'std' => 'Hide',
			"admin_label" => true,
		),
		
		array(
			"type" => "textfield",
			"group" => "Navigation",
			"param_name" => "insomnia_slider_nav_s",
			"heading" => __("Arrows Size", 'insomnia'),
			"value" => '100px',
			"description" => __( "Size in px", 'insomnia' )
		),
		array(
			"type" => "textfield",
			"group" => "Navigation",
			"param_name" => "insomnia_slider_nav_p",
			"heading" => __("Arrows side margin", 'insomnia'),
			"value" => '120px',
			"description" => __( "Size in px", 'insomnia' )
		),
		array(
			"type" => "textfield",
			"group" => "Navigation",
			"param_name" => "insomnia_slider_nav_m",
			"heading" => __("Arrows top margin", 'insomnia'),
			"value" => '-60px',
			"description" => __( "Size in px", 'insomnia' )
		),
		
		array(
			"type" => "colorpicker",
			"group" => "Navigation",
			"param_name" => "insomnia_slider_nav_c",
			"heading" => __("Arrows Color", 'insomnia'),
			"value" => '#e0e0e0',
		),
		array(
			"type" => "colorpicker",
			"group" => "Navigation",
			"param_name" => "insomnia_slider_nav_ch",
			"heading" => __("Arrows Color on Hover", 'insomnia'),
			"value" => '#000',
		),
		array(
			"type" => "textfield",
			"group" => "Responsive",
			"param_name" => "insomnia_items_1400",
			"heading" => __("Items per row for 1400px wide screen", 'insomnia'),
			"value" => '1',
			"admin_label" => true,
			"description" => __( "For big desktops", 'insomnia' )
		),
		array(
			"type" => "textfield",
			"group" => "Responsive",
			"param_name" => "insomnia_items_m_1400",
			"heading" => __("Space between for items 1400px wide screen", 'insomnia'),
			"value" => '0',
			"description" => __( "For big desktops", 'insomnia' )
		),
		
		array(
			"type" => "textfield",
			"group" => "Responsive",
			"param_name" => "insomnia_items_1200",
			"heading" => __("Items per row for 1200px wide screen", 'insomnia'),
			"value" => '1',
			"description" => __( "For standard desktops", 'insomnia' )
		),
		array(
			"type" => "textfield",
			"group" => "Responsive",
			"param_name" => "insomnia_items_m_1200",
			"heading" => __("Space between for items 1200px wide screen", 'insomnia'),
			"value" => '0',
			"description" => __( "For standard desktops", 'insomnia' )
		),
		
		array(
			"type" => "textfield",
			"group" => "Responsive",
			"param_name" => "insomnia_items_800",
			"heading" => __("Items per row for 800px wide screen", 'insomnia'),
			"value" => '1',
			"description" => __( "For landscape tablet view", 'insomnia' )
		),
		array(
			"type" => "textfield",
			"group" => "Responsive",
			"param_name" => "insomnia_items_m_800",
			"heading" => __("Space between items for 800px wide screen", 'insomnia'),
			"value" => '0',
			"description" => __( "For landscape tablet view", 'insomnia' )
		),
		
		array(
			"type" => "textfield",
			"group" => "Responsive",
			"param_name" => "insomnia_items_600",
			"heading" => __("Items per row for 600px wide screen", 'insomnia'),
			"value" => '1',
			"description" => __( "For portrait tablet view", 'insomnia' )
		),
		array(
			"type" => "textfield",
			"group" => "Responsive",
			"param_name" => "insomnia_items_m_600",
			"heading" => __("Space between items for 600px wide screen", 'insomnia'),
			"value" => '0',
			"description" => __( "For portrait tablet view", 'insomnia' )
		),
		
		array(
			"type" => "textfield",
			"group" => "Responsive",
			"param_name" => "insomnia_items_0",
			"heading" => __("Items per row for mobile", 'insomnia'),
			"value" => '1',
			"description" => __( "For mobile", 'insomnia' )
		),
		array(
			"type" => "textfield",
			"group" => "Responsive",
			"param_name" => "insomnia_items_m_0",
			"heading" => __("Space between items for mobile", 'insomnia'),
			"value" => '0',
			"description" => __( "For mobile", 'insomnia' )
		),
    ),
    "js_view" => 'VcColumnView'
) );


