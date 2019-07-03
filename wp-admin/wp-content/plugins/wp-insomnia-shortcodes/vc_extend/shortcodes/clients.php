<?php
add_shortcode('vc_clients_item', 'vc_clients_item_f');
function vc_clients_item_f( $atts, $content = null)
{
	extract(shortcode_atts(
		array(
			'logo' => '',
			'opacity' => null,
		), $atts)
	);

	if ($opacity) $opacity = 'opacity';

	$image_done = wp_get_attachment_image($logo, 'img-responsive logos ' . $opacity. '');


	$output =''.$image_done.'';
	return $output;
};

vc_map( array(
	"name" => __("Clients Logo",'insomnia'),
	"base" => "vc_clients_item",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "attach_image",
			"param_name" => "logo",
			"heading" => __("Clients", 'insomnia'),
			"value" => '',
			"admin_label" => true,
			"description" => __( "Select logo", 'insomnia' )
		),
        array(
            "type" => "checkbox",
            "heading" => __("Opacity", 'insomnia'),
            "param_name" => "opacity",
            "group" => __("Settings", 'insomnia'),
            "value" => array("Yes" => true),
            "admin_label" => true,
            ),
        )
	) 
);