<?php 
/*Promo Title*/
add_shortcode('insomnia_travel', 'insomnia_travel_f');
function insomnia_travel_f( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_travel_deals_image' => '',
			'insomnia_travel_deals_name' => 'Miami',
			'insomnia_travel_deals_text' => 'Attended no do thoughts me on dissuade scarcely',
			'insomnia_travel_deals_list_1' => '$799',
			'insomnia_travel_deals_list_2' => '8 Days',
			'insomnia_travel_deals_list_3' => '12-21 October',
			"css" => null
		), $atts)
	);
	
    $thumb = wp_get_attachment_image_src($insomnia_travel_deals_image, 'img-responsive full', true);
	$thumb = $thumb[0];

	$output ='<div class="travel-deals-block">
                	<div class="travel-deals-image insomnia-photo-image"><div class="insomnia-photo-mark"></div><div class="insomnia-photo-action"><span><a href="'. esc_url($thumb) .'" data-gal="prettyphoto"><i class="icon-magnifier"></i></a></span></div><img src="'. esc_url($thumb) .'" alt=""></div>
                	<div class="travel-deals-text"><a href="#">'. esc_attr($insomnia_travel_deals_name) .'</a></div>
                	<div class="travel-deals-paragraph">'. esc_attr($insomnia_travel_deals_text) .'</div>
                	<div class="travel-deals-list">
                		<ul>
                			<li><i class="pe-7s-date"></i> '. esc_attr($insomnia_travel_deals_list_2) .'</li>
                 			<li><i class="pe-7s-credit"></i> '. esc_attr($insomnia_travel_deals_list_1) .'</li>
                			<li><i class="pe-7s-plane"></i> '. esc_attr($insomnia_travel_deals_list_3) .'</li>
                		</ul>
                	</div>
              </div>';
	return $output;

};

/*Promo Title*/
vc_map( array(
	"name" => __("Travel Hot Deals",'insomnia'),
	"base" => "insomnia_travel",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "attach_image",
			"param_name" => "insomnia_travel_deals_image",
			"heading" => __("Add image", 'insomnia'),
			"admin_label" => true,
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_travel_deals_name",
			"heading" => __("Name", 'insomnia'),
			"value" => 'Miami',
			"admin_label" => true,
		),
		array(
			"type" => "textarea",
			"param_name" => "insomnia_travel_deals_text",
			"heading" => __("Description", 'insomnia'),
			"value" => 'Attended no do thoughts me on dissuade scarcely',
			"admin_label" => true,
		),
		array(
			"type" => "textarea",
			"param_name" => "insomnia_travel_deals_list_1",
			"heading" => __("Cost", 'insomnia'),
			"value" => '$799',
			"admin_label" => true,
		),
		array(
			"type" => "textarea",
			"param_name" => "insomnia_travel_deals_list_2",
			"heading" => __("How Long", 'insomnia'),
			"value" => '8 Days',
			"admin_label" => true,
		),
		array(
			"type" => "textarea",
			"param_name" => "insomnia_travel_deals_list_3",
			"heading" => __("When", 'insomnia'),
			"value" => '12-21 October',
			"admin_label" => true,
		),
	)
) );