<?php 
/*Button*/
add_shortcode('insomnia_vc_button', 'insomnia_vc_button_f');
function insomnia_vc_button_f( $atts, $content = null)
{
	
	extract(shortcode_atts(
		array(
			'insomnia_icon' => 'fa-shopping-basket',
			'insomnia_title' => 'Try it now!',
			'insomnia_title_size'=>'16px',
			'insomnia_title_color'=>'#fff',
			'insomnia_bg_color'=>'#5AC8FB',
			'insomnia_url' => '#',
			'insomnia_display' => 'block',
			'insomnia_target'=>'_self',
			'insomnia_padding'=>'7px 15px',
			'insomnia_margin'=>'10px 0 0 0',
			'insomnia_border_w' => '1px',
			'insomnia_border_s' => 'solid',
			'insomnia_border_c' => '#5AC8FB',
			'insomnia_border_r' => '4px',
			'insomnia_title_color_hover'=>'#555',
			'insomnia_bg_color_hover'=>'#fff',
			'insomnia_border_c_hover' => '#555',

		), $atts)
	);
	$content = '';

	$content .='<a class="insomnia_vc_button" data-title-color-hover="'.$insomnia_title_color_hover.'" data-bg-color-hover="'.$insomnia_bg_color_hover.'" data-border-c-hover="'.$insomnia_border_c_hover.'"  href="'.$insomnia_url.'" target="'.$insomnia_target.'" style="display:'.$insomnia_display.'; font-size:'.$insomnia_title_size.'; line-heigth:'.$insomnia_title_size.'; color:'.$insomnia_title_color.'; background-color:'.$insomnia_bg_color.'; padding:'.$insomnia_padding.'; margin:'.$insomnia_margin.'; border-width:'.$insomnia_border_w.'; border-style:'.$insomnia_border_s.'; border-color:'.$insomnia_border_c.'; border-radius:'.$insomnia_border_r.'"><i class="fa '.$insomnia_icon.'"></i> '.$insomnia_title.'';

	$content .='</a>';
	return $content;
};


/*Button*/
vc_map( array(
	"name" => __("Button",'insomnia'),
	"base" => "insomnia_vc_button",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"param_name" => "insomnia_url",
			"heading" => __("URL", 'insomnia'),
			"value" => '#',
			"group" => "General",
			"admin_label" => true,
		),
		array(
			'type' => 'dropdown',
			'heading' => "Target",
			'param_name' => 'insomnia_target',
			'value' => array( "_blank", "_self" ),
			'std' => '_self',
			"group" => "General",
			"admin_label" => true,
		),
		array(
			'type' => 'dropdown',
			'heading' => "Display",
			'param_name' => 'insomnia_display',
			'value' => array( "block", "inline-block" ),
			'std' => 'block',
			"group" => "General",
		),
		
		array(
			"type" => "textfield",
			"param_name" => "insomnia_padding",
			"heading" => __("Padding", 'insomnia'),
			"value" => '10px 20px',
			"group" => "General",
		),

		
		array(
			"type" => "textfield",
			"param_name" => "insomnia_margin",
			"heading" => __("Margin", 'insomnia'),
			"value" => '0px',
			"group" => "General",
		),

		array(
			"type" => "textfield",
			"param_name" => "insomnia_icon",
			"heading" => __("Icon", 'insomnia'),
			"value" => 'fa-shopping-basket',
			"description" => __( 'Select icon from <a href="https://dankov-themes.com/icon/insomnia/" target="_blank">here</a>.', 'insomnia' ),
			"group" => "Title",
			"admin_label" => true,
		),

		array(
			"type" => "textfield",
			"param_name" => "insomnia_title",
			"heading" => __("Title", 'insomnia'),
			"value" => 'Button',
			"group" => "Title",
			"admin_label" => true,
		),
		
		array(
			"type" => "textfield",
			"param_name" => "insomnia_title_size",
			"heading" => __("Font Size", 'insomnia'),
			"value" => '16px',
			"group" => "Title"
		),
		array(
			"type" => "colorpicker",
			"param_name" => "insomnia_title_color",
			"heading" => __("Title Color", 'insomnia'),
			"value" => '#fff',
			"group" => "Title",
			"admin_label" => true,
		),
		array(
			"type" => "colorpicker",
			"param_name" => "insomnia_title_color_hover",
			"heading" => __("Hover Title Color", 'insomnia'),
			"value" => '#fff',
			"group" => "Title"
		),
		
		array(
			"type" => "colorpicker",
			"param_name" => "insomnia_bg_color",
			"heading" => __("Background Color", 'insomnia'),
			"value" => '#000',
			"group" => "Background",
			"admin_label" => true,
		),
		array(
			"type" => "colorpicker",
			"param_name" => "insomnia_bg_color_hover",
			"heading" => __("HOVER Background Color", 'insomnia'),
			"value" => '#00f6ff',
			"group" => "Background"
		),
		
		array(
			"type" => "textfield",
			"param_name" => "insomnia_border_w",
			"heading" => __("Border Width", 'insomnia'),
			"value" => '1px',
			"group" => "Border"
		),

		array(
			"type" => "colorpicker",
			"param_name" => "insomnia_border_c",
			"heading" => __("Border Color", 'insomnia'),
			"value" => '#000',
			"group" => "Border"
		),
		array(
			"type" => "colorpicker",
			"param_name" => "insomnia_border_c_hover",
			"heading" => __("HOVER Border Color", 'insomnia'),
			"value" => '#00f6ff',
			"group" => "Border"
		),
		array(
			'type' => 'dropdown',
			'heading' => "Border Style",
			'param_name' => 'insomnia_border_s',
			'value' => array( "solid", "dotted", "dashed"),
			"group" => "Border"
		),
		
		array(
			"type" => "textfield",
			"param_name" => "insomnia_border_r",
			"heading" => __("Border radius", 'insomnia'),
			"value" => '3px',
			"group" => "Border"
		),
	)
) );


