<?php 
/*Food*/
add_shortcode('insomnia_food', 'insomnia_food_f');
function insomnia_food_f( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_food_deals_image' => '',
			'insomnia_food_deals_name' => 'Black, Big, Burger. (BBB)',
			'insomnia_food_deals_text' => 'Advantage old had otherwise sincerity dependent additions.',
			'insomnia_food_deals_list_1' => '$9.99',
			"css" => null
		), $atts)
	);
	
    $thumb = wp_get_attachment_image_src($insomnia_food_deals_image, 'img-responsive full', true);
	$thumb = $thumb[0];

	$output ='<div class="food-deals-block">
                	<div class="food-deals-image insomnia-photo-image"><div class="insomnia-photo-mark"></div><div class="insomnia-photo-action"><span><a href="'. esc_url($thumb) .'" data-gal="prettyphoto"><i class="icon-magnifier"></i></a></span></div><img src="'. esc_url($thumb) .'" alt=""></div>
                	<div class="food-deals-text"><a href="#">'. esc_attr($insomnia_food_deals_name) .'</a></div>
                	<div class="food-deals-paragraph">'. esc_attr($insomnia_food_deals_text) .'</div>
                	<div class="food-deals-list">
                	<div class="food-deals-price">'. esc_attr($insomnia_food_deals_list_1) .'</div>
                		</ul>
                	</div>
              </div>';
	return $output;

};

/*Food*/
vc_map( array(
	"name" => __("Food Deals",'insomnia'),
	"base" => "insomnia_food",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "attach_image",
			"param_name" => "insomnia_food_deals_image",
			"heading" => __("Add image", 'insomnia'),
			"admin_label" => true,
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_food_deals_name",
			"heading" => __("Name", 'insomnia'),
			"value" => 'Black, Big, Burger. (BBB)',
			"admin_label" => true,
		),
		array(
			"type" => "textarea",
			"param_name" => "insomnia_food_deals_text",
			"heading" => __("Description", 'insomnia'),
			"value" => 'Advantage old had otherwise sincerity dependent additions.',
			"admin_label" => true,
		),
		array(
			"type" => "textarea",
			"param_name" => "insomnia_food_deals_list_1",
			"heading" => __("Cost", 'insomnia'),
			"value" => '$9.99',
			"admin_label" => true,
		),
	)
) );




