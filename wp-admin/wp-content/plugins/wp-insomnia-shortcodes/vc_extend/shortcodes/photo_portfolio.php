<?php 
/*photo*/
add_shortcode('insomnia_photo', 'insomnia_photo_f');
function insomnia_photo_f( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_load' => null,
			'padding' => null,
			"css" => null
		), $atts)
	);

	if ($padding) $padding = 'padding';

    if ($insomnia_load && count($insomnia_load) > 0) {
          $insomnia_load = explode(',', $insomnia_load);
        } else {
          return
            '<div class="photo-none">' .
              '<p>'. __("You didn't select any image.", 'insomnia') . '</p>' .
            '</div>';
        }

	$output ='<ul class="grid effect-2 '. esc_attr($padding) .'" id="grid">';
	            foreach ($insomnia_load as $attach_id) {
                	$thumb = wp_get_attachment_image_src($attach_id, 'img-responsive full', true);
                	$thumb = $thumb[0];
                	$output .= '<li><div class="insomnia-photo-image"><div class="insomnia-photo-mark"></div><div class="insomnia-photo-action"><span><a href="'. esc_url($thumb) .'" data-gal="prettyphoto"><i class="icon-magnifier"></i></a></span></div><img src="'. esc_url($thumb) .'" alt=""></div></li>';
              	}
	$output .='</ul>';


	$output .='<script>
jQuery.noConflict()(function($){
"use strict";
      new AnimOnScroll( document.getElementById( "grid" ), {
        minDuration : 0.4,
        maxDuration : 0.6,
        viewportFactor : 0.3
      } );
});
	</script>';

	return $output;

};

/*photo*/
vc_map( array(
	"name" => __("Photo Portfolio",'insomnia'),
	"base" => "insomnia_photo",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "attach_images",
			"param_name" => "insomnia_load",
			"heading" => __("Add image", 'insomnia'),
			"admin_label" => true,
		),	
        array(
            "type" => "checkbox",
            "heading" => __("No padding", 'insomnia'),
            "param_name" => "padding",
            "group" => __("Settings", 'insomnia'),
			"value" => array("Yes" => true),
        ),
	)
) );