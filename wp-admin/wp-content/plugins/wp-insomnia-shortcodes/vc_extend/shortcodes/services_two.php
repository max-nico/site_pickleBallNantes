<?php 
/*Services*/
add_shortcode('insomnia_services_two', 'insomnia_services_two_f');
function insomnia_services_two_f( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_icons' => 'pe-7s-plugin',
			'insomnia_name' => 'Visual Composer',
			'insomnia_text' => 'Remainder household direction zealously the unwilling roused enabl estate old county females',
			'insomnia_desc_pad' => null,
			'insomnia_icon_box' => null,
			'insomnia_margin' => null,
			'insomnia_right' => null,
			"css" => null,
		), $atts)
	);


	if ($insomnia_icon_box) $insomnia_icon_box = 'insomnia_icon_box';
	if ($insomnia_desc_pad) $insomnia_desc_pad = 'insomnia_desc_pad';
	if ($insomnia_right) $insomnia_right = 'mobile-right';

	$output ='
	<div class="'. esc_attr($insomnia_right) .' '. esc_attr($insomnia_icon_box) .'" style="margin:'. esc_attr($insomnia_margin) .'">
			<div class="multi-serv-icon"><i class="'. esc_attr($insomnia_icons) .'"></i></div>
                <div class="multi-serv-block-list">
                <h2 class="multi-serv-name">'. esc_attr($insomnia_name) .'</h2>
                <p class="multi-serv-desc '. esc_attr($insomnia_desc_pad) .'">'. esc_attr($insomnia_text) .'</p>
            </div></div>';
	return $output;

};





/*Services*/
vc_map( array(
	"name" => __("Services Style #2",'insomnia'),
	"base" => "insomnia_services_two",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"param_name" => "insomnia_icons",
			"heading" => __("Icon", 'insomnia'),
			"value" => 'pe-7s-plugin',
			"admin_label" => true,
			'description' => __( 'Select icon from <a href="https://dankov-themes.com/icon/insomnia/index.html" target="_blank">here</a>.', 'insomnia' ),
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_name",
			"heading" => __("Name", 'insomnia'),
			"value" => 'Visual Composer',
			"admin_label" => true,
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_text",
			"heading" => __("Text", 'insomnia'),
			"value" => 'Remainder household direction zealously the unwilling roused enabl estate old county females',
			"admin_label" => true,
		),
		array(
			"type" => "checkbox",
			"heading" => __("Padding for description", 'insomnia'),
			"param_name" => "insomnia_desc_pad",
			"value" => array("Yes" => true),
			"group" => __("Settings", 'insomnia'),
			"description" => __( 'For Mobile Block', 'insomnia' ),
		),
   		array(
			"type" => "checkbox",
			"heading" => __("Right text align", 'insomnia'),
			"param_name" => "insomnia_right",
        	"group" => __("Settings", 'insomnia'),
			"value" => array("Yes" => true),
			"description" => __( 'For Mobile Block', 'insomnia' ),
		),
		array(
			"type" => "textfield",
			"heading" => __("Margin", 'insomnia'),
			"param_name" => "insomnia_margin",
			"group" => __("Settings", 'insomnia'),
			"value" => '',
			"description" => __( 'For Mobile Block', 'insomnia' ),
		),
		array(
			"type" => "checkbox",
			"heading" => __("Icon in box", 'insomnia'),
			"param_name" => "insomnia_icon_box",
			"group" => __("Settings", 'insomnia'),
			"value" => array("Yes" => true),
		),
	)
) );



























