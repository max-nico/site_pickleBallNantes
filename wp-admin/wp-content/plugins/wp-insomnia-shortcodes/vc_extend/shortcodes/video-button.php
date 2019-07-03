<?php 
/*Video Button*/
add_shortcode('insomnia_video', 'insomnia_video_f');
function insomnia_video_f( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_video_text' => 'Are You Need Smart Solution? Take A Tour!',
			'insomnia_video_sub_text' => 'Her inquietude our shy yet sentiments collecting.',
			'insomnia_video_link' => 'https://www.youtube.com/watch?v=nrJtHemSPW4',
			"css" => null
		), $atts)
	);
	
	if ($white) $white = 'white';

	$output ='<div class="video-block">
              <div class="prlx-name">'. esc_attr($insomnia_video_text) .'</div>
              <div class="prlx-text">'. esc_attr($insomnia_video_sub_text) .'</div>
              <div class="video-button"><a href="'. esc_url($insomnia_video_link) .'"><span><i class="pe-7s-play"></i></span></a></div>
              </div>';
	return $output;


};


/*Video Button*/
vc_map( array(
	"name" => __("Video Button",'insomnia'),
	"base" => "insomnia_video",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"param_name" => "insomnia_video_text",
			"heading" => __("Title", 'insomnia'),
			"value" => 'Are You Need Smart Solution? Take A Tour!',
			"admin_label" => true,
		),
		array(
			"type" => "textarea",
			"param_name" => "insomnia_video_sub_text",
			"heading" => __("Sub Text", 'insomnia'),
			"value" => 'Her inquietude our shy yet sentiments collecting.',
			"admin_label" => true,
		),
		array(
			"type" => "textarea",
			"param_name" => "insomnia_video_link",
			"heading" => __("Link to video", 'insomnia'),
			"value" => 'https://www.youtube.com/watch?v=nrJtHemSPW4',
			"admin_label" => true,
		),
	)
) );





