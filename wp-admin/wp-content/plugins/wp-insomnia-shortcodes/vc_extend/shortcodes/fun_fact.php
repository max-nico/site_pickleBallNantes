<?php 
/*Fun Facts*/
add_shortcode('insomnia_fun', 'insomnia_fun_f');
function insomnia_fun_f( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_fun_icon' => 'pe-7s-like2',
			'insomnia_fun_count' => '841',
			'insomnia_fun_count_delay' => '5',
			'insomnia_fun_count_increment' => '1',
			'insomnia_fun_text' => 'Happy Clients',
			'white' => null,
			'biggest' => null,
			"css" => null
		), $atts)
	);

	if ($white) $white = 'white';
	if ($biggest) $biggest = 'biggest';

	$output ='<div class="stats-insomnia">
                  <div class="stats-block stats-top">
                    <div class="stats-desc '. esc_attr($white) .'">
                      <div class="stats-icon-effect"><div class="stats-icon '. esc_attr($insomnia_fun_icon) .'"></div></div>
                      <div class="stats-number number-counter '. esc_attr($biggest) .'"><span data-min="0" data-max="'. esc_attr($insomnia_fun_count) .'" data-delay="'. esc_attr($insomnia_fun_count_delay) .'" data-increment="'. esc_attr($insomnia_fun_count_increment) .'" class="numscroller">0</span></div>
                      <div class="stats-text '. esc_attr($biggest) .'">'. esc_attr($insomnia_fun_text) .'</div>
                    </div>
                  </div>
                </div>';
	return $output;

};

/*Fun Facts*/
vc_map( array(
	"name" => __("Fun Facts (Countdown)",'insomnia'),
	"base" => "insomnia_fun",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"param_name" => "insomnia_fun_icon",
			"heading" => __("Icon", 'insomnia'),
			"value" => 'pe-7s-like2',
			"admin_label" => true,
			"description" => __( 'Select icon from <a href="https://dankov-themes.com/icon/insomnia/index.html" target="_blank">here</a>.', 'insomnia' ),
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_fun_count",
			"heading" => __("Count", 'insomnia'),
			"value" => '841',
			"admin_label" => true,
		),	

		array(
			"type" => "textfield",
			"param_name" => "insomnia_fun_count_delay",
			"heading" => __("Delay (speed)", 'insomnia'),
			"value" => '5',
			"admin_label" => true,
		),

		array(
			"type" => "textfield",
			"param_name" => "insomnia_fun_count_increment",
			"heading" => __("Increment", 'insomnia'),
			"value" => '1',
			"admin_label" => true,
		),

		array(
			"type" => "textfield",
			"param_name" => "insomnia_fun_text",
			"heading" => __("Text", 'insomnia'),
			"value" => 'Happy Clients',
			"admin_label" => true,
		),
                    
		array(
			"type" => "checkbox",
			"heading" => __("White fonts", 'insomnia'),
			"param_name" => "white",
			"admin_label" => true,
			"value" => array("Yes" => true),
		),	
		array(
			"type" => "checkbox",
			"heading" => __("Biggest font size", 'insomnia'),
			"param_name" => "biggest",
			"value" => array("Yes" => true),
		),
	)
) );


