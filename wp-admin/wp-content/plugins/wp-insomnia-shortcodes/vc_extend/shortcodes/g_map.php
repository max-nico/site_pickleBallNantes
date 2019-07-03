<?php
/*GOOGLE MAP*/
add_shortcode('vc_g_map', 'vc_g_map_f');
function vc_g_map_f( $atts, $content = null)
{
	extract(shortcode_atts(
		array(
			'address' => '7th Ave, New York, NY',
			'zoom' => '13',
			'height' => '450px',
		), $atts)
	);
	$content ='<div id="map" style="height:'.$height.'">
			   </div>
			   <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
			   <script>
				jQuery.noConflict()(function($){
				$("#map").gmap3({
					
					marker:{     
					// address:"93 Worth St, New York, NY",
					address :"'.$address.'", 
					options:{ icon: "'.get_template_directory_uri().'/framework/css/img/marker.png"}},
					map:{
					options:{
					styles: [ {
					stylers: [ { "saturation":-100 }, { "lightness": 0 }, { "gamma": 0.5 }]},
					],
					zoom: '.$zoom.',
					scrollwheel:false,
					draggable: true }
					}
					});	
				});
				</script>';
	return $content;
};

vc_map( array(
	"name" => __("Google Map",'insomnia'),
	"base" => "vc_g_map",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"param_name" => "address",
			"heading" => __("Addres", 'insomnia'),
			"value" => '7th Ave, New York, NY',
			"admin_label" => true,
		),
		array(
			"type" => "textfield",
			"param_name" => "zoom",
			"heading" => __("Zoom", 'insomnia'),
			"value" => '13',
			"admin_label" => true,
		),
		array(
			"type" => "textfield",
			"param_name" => "height",
			"heading" => __("Map Height", 'insomnia'),
			"value" => '450px',
			"admin_label" => true,
		),
	)
) );


