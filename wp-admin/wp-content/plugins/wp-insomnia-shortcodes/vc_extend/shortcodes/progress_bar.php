<?php
/*Progress bar*/
add_shortcode('insomnia_progress', 'insomnia_progress_f');
function insomnia_progress_f( $atts, $content = null)
{
	extract(shortcode_atts(
		array(
			'progress_title' => "Marketing",
         'progress_per' => '69',
         'biggest' => '69',
		), $atts)
	);
   
   if ($biggest) $biggest = 'biggest';

	$output ='<div class="progress-per"><div class="prog-name">'.$progress_title.'</div><div class="prog-per">'.$progress_per.'%</div></div>
	<div class="progress '. esc_attr($biggest) .'"><div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$progress_per.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$progress_per.'%"></div></div>';
	return $output;
};

vc_map( array(
   "name" => __("Progress Bar",'insomnia'),
   "base" => "insomnia_progress",
   "category" => __('Insomnia','insomnia'),
   "params" => array(
	  array(
         "type" => "textfield",
         "heading" => __("Progress Title",'insomnia'),
         "param_name" => "progress_title",
         "value" => "Marketing",
         "admin_label" => true,
      ),
	  array(
         "type" => "textfield",
         "heading" => __("Progress Value",'insomnia'),
         "param_name" => "progress_per",
         "value" => "69",
         "admin_label" => true,
      ),

      array(
         "type" => "checkbox",
         "heading" => __("Biggest gap", 'insomnia'),
         "param_name" => "biggest",
         "group" => __("Settings", 'insomnia'),
         "value" => array("Yes" => true),
         "admin_label" => true,
      ),  
   )
) );





