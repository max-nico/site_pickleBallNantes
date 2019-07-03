<?php 
/*Services*/
add_shortcode('insomnia_services_four', 'insomnia_services_four_f');
function insomnia_services_four_f( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_icons' => 'pe-7s-light',
			'insomnia_name'  => 'Minimal Design',
			'insomnia_text'  => 'Remainder household zealously the own unwilling roused escalate',
			"css" => null
		), $atts)
	);


	$output ='<div class="new-services">
	              <div class="new-services-icon"><span class="'. esc_attr($insomnia_icons) .'"></span></div>
	              <div class="new-services-line"></div>
	              <div class="new-services-name">'. esc_attr($insomnia_name) .'</div>
	              <div class="new-services-text">'. esc_attr($insomnia_text) .'</div>
            </div>';
	return $output;


};

/*Services*/
vc_map( array(
	"name" => __("Services Style #4",'insomnia'),
	"base" => "insomnia_services_four",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"param_name" => "insomnia_icons",
			"heading" => __("Icon", 'insomnia'),
			"value" => 'pe-7s-light',
			'description' => __( 'Select icon from <a href="https://dankov-themes.com/icon/insomnia/index.html" target="_blank">here</a>.', 'insomnia' ),
			"admin_label" => true,
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_name",
			"heading" => __("Name", 'insomnia'),
			"value" => 'Minimal Design',
			"admin_label" => true,
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_text",
			"heading" => __("Text", 'insomnia'),
			"value" => 'Remainder household zealously the own unwilling roused escalate',
			"admin_label" => true,
		),
	)
) );
