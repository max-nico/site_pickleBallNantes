<?php 
/*Promo Title*/
add_shortcode('insomnia_promo', 'insomnia_promo_f');
function insomnia_promo_f( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_promo_text' => 'Our Portfolio',
			'insomnia_promo_paragraph' => 'Attended no do thoughts me on dissuade scarcely',
			'white' => null,
			"css" => null
		), $atts)
	);
	
	if ($white) $white = 'white';

	$output ='<div class="promo-block '. esc_attr($white) .'">
                	<div class="promo-text">'. esc_attr($insomnia_promo_text) .'</div>
                	<div class="promo-paragraph">'. esc_attr($insomnia_promo_paragraph) .'</div>
                	<div class="center-line"></div>
              </div>';
	return $output;


};


/*Promo Title*/
vc_map( array(
	"name" => __("Promo Title",'insomnia'),
	"base" => "insomnia_promo",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"param_name" => "insomnia_promo_text",
			"heading" => __("Text", 'insomnia'),
			"value" => 'Our Portfolio',
			"admin_label" => true,
		),
		array(
			"type" => "textarea",
			"param_name" => "insomnia_promo_paragraph",
			"heading" => __("Paragraph", 'insomnia'),
			"value" => 'Attended no do thoughts me on dissuade scarcely',
			"admin_label" => true,
		),

		array(
			"type" => "checkbox",
			"heading" => __("White fonts", 'insomnia'),
			"param_name" => "white",
			"admin_label" => true,
			"value" => array("Yes" => true),
		),	
	)
) );




